<?php

namespace Tests\Unit;

use App\Services\LeverancierService;
use Tests\TestCase;

class LeverancierServiceTest extends TestCase
{
    /** @test */
    public function update_astra_sweets_succeeds()
    {
        $service = app(LeverancierService::class);

        // Astra Sweets = Id 2 (uit testdata)
        $service->updateLeverancier(2, '06-39398825', 'Den Dolderlaan');

        $this->assertTrue(true); // Als er geen exception is: test geslaagd
    }

    /** @test */
    public function update_de_bron_fails_with_technical_error()
    {
        $service = app(LeverancierService::class);

        $this->expectException(\Throwable::class);

        // De Bron = Id 5 (stored procedure gooit SIGNAL)
        $service->updateLeverancier(5, '06-11111111', 'Whateverstraat');
    }
}
