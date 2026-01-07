@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <div>
            <h1 class="card-title">Overzicht leveranciers</h1>
            <p class="card-subtitle">Klik op het potlood om details te bekijken en te wijzigen.</p>
        </div>
        <span class="pill">Pagination: max 4 per pagina</span>
    </div>

    <div class="card-body">
        <div class="table-wrap">
            <table>
                <thead>
                <tr>
                    <th>Naam</th>
                    <th>Contactpersoon</th>
                    <th>Leveranciernummer</th>
                    <th>Mobiel</th>
                    <th style="width:120px;">Actie</th>
                </tr>
                </thead>
                <tbody>
                @foreach($leveranciers as $l)
                    <tr>
                        <td><b>{{ $l['Naam'] }}</b></td>
                        <td>{{ $l['ContactPersoon'] }}</td>
                        <td><span class="pill">{{ $l['LeverancierNummer'] }}</span></td>
                        <td>{{ $l['Mobiel'] }}</td>
                        <td>
                            <a class="icon-btn" href="{{ route('leveranciers.show', $l['Id']) }}" title="Details">
                                <span class="icon">✏️</span>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="pagination">
            @if($page > 1)
                <a class="btn btn-ghost" href="{{ route('leveranciers.index', ['page' => $page - 1]) }}">← Vorige</a>
            @endif

            <span class="sep">|</span>
            <span class="small">Pagina <b>{{ $page }}</b> / {{ $totalPages }}</span>
            <span class="sep">|</span>

            @if($page < $totalPages)
                <a class="btn btn-ghost" href="{{ route('leveranciers.index', ['page' => $page + 1]) }}">Volgende →</a>
            @endif
        </div>
    </div>
</div>
@endsection
