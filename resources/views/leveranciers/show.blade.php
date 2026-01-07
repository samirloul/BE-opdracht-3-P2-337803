@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <div>
            <h1 class="card-title">Leverancier details</h1>
            <p class="card-subtitle">Bekijk gegevens en ga naar wijzigen.</p>
        </div>
        <div class="actions">
            <a class="btn btn-ghost" href="{{ route('leveranciers.index') }}">← Terug</a>
            <a class="btn btn-primary" href="{{ route('leveranciers.edit', $leverancier['Id']) }}">Wijzig</a>
        </div>
    </div>

    <div class="card-body">
        <div class="grid">
            <div class="kv">
                <div class="k">Naam</div><div class="v">{{ $leverancier['Naam'] }}</div>
                <div class="k">Contactpersoon</div><div class="v">{{ $leverancier['ContactPersoon'] }}</div>
                <div class="k">Leveranciernummer</div><div class="v">{{ $leverancier['LeverancierNummer'] }}</div>
                <div class="k">Mobiel</div><div class="v">{{ $leverancier['Mobiel'] }}</div>
            </div>

            <div class="kv">
                <div class="k">Adres</div>
                <div class="v">
                    {{ $leverancier['Straat'] }} {{ $leverancier['Huisnummer'] }}<br>
                    <span class="small">{{ $leverancier['Postcode'] }} {{ $leverancier['Stad'] }}</span>
                </div>
                <div class="k">Status</div>
                <div class="v"><span class="pill">Actief</span></div>
            </div>
        </div>
    </div>
</div>
@endsection
