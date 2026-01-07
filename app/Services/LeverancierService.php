<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use PDO;

/**
 * Service voor leverancier bewerkingen via PDO + Stored Procedures
 */
class LeverancierService
{
    private function pdo(): PDO
    {
        return DB::connection()->getPdo();
    }

    public function countLeveranciers(): int
    {
        $stmt = $this->pdo()->prepare("CALL spLeverancierCount()");
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();

        return (int)($row['Total'] ?? 0);
    }

    public function getLeveranciersPaginated(int $offset, int $limit): array
    {
        $stmt = $this->pdo()->prepare("CALL spLeveranciersPaginated(:offset, :limit)");
        $stmt->execute(['offset' => $offset, 'limit' => $limit]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();

        return $rows;
    }

    public function getLeverancierById(int $id): ?array
    {
        $stmt = $this->pdo()->prepare("CALL spLeverancierById(:id)");
        $stmt->execute(['id' => $id]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();

        return $rows[0] ?? null;
    }

    public function updateLeverancier(int $id, string $mobiel, string $straat): void
    {
        $stmt = $this->pdo()->prepare("CALL spUpdateLeverancier(:id, :mobiel, :straat)");
        $stmt->execute([
            'id' => $id,
            'mobiel' => $mobiel,
            'straat' => $straat,
        ]);
        $stmt->closeCursor();
    }
}
