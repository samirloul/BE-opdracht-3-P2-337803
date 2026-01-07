<?php

namespace App\Http\Controllers;

use App\Services\LeverancierService;
use Illuminate\Http\Request;
use Throwable;

class LeverancierController extends Controller
{
    public function __construct(private LeverancierService $service) {}

    public function index(Request $request)
    {
        $page = max(1, (int)$request->query('page', 1));
        $limit = 4; // eis: max 4 records :contentReference[oaicite:8]{index=8}
        $offset = ($page - 1) * $limit;

        $total = $this->service->countLeveranciers();
        $totalPages = (int)ceil($total / $limit);

        $leveranciers = $this->service->getLeveranciersPaginated($offset, $limit);

        return view('leveranciers.index', compact('leveranciers', 'page', 'totalPages'));
    }

    public function show(int $id)
    {
        $leverancier = $this->service->getLeverancierById($id);
        abort_if(!$leverancier, 404);

        return view('leveranciers.show', compact('leverancier'));
    }

    public function edit(int $id)
    {
        $leverancier = $this->service->getLeverancierById($id);
        abort_if(!$leverancier, 404);

        return view('leveranciers.edit', compact('leverancier'));
    }

    public function update(Request $request, int $id)
    {
        $validated = $request->validate([
            'mobiel' => ['required', 'string', 'max:20'],
            'straat' => ['required', 'string', 'max:100'],
        ]);

        try {
            $this->service->updateLeverancier($id, $validated['mobiel'], $validated['straat']);

            // Scenario_01 succesmelding :contentReference[oaicite:9]{index=9}
            $message = "De wijzigingen zijn doorgevoerd";
            $isSuccess = true;
        } catch (Throwable $e) {
            // Scenario_02 foutmelding :contentReference[oaicite:10]{index=10}
            $message = "Door een technische storing is het niet mogelijk de wijziging door te voeren. Probeer het op een later moment nog eens";
            $isSuccess = false;
        }

        return view('leveranciers.result', [
            'id' => $id,
            'message' => $message,
            'isSuccess' => $isSuccess,
        ]);
    }
}
