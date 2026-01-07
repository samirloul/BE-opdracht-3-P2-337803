@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <div>
            <h1 class="card-title">Wijzig leveranciergegevens</h1>
            <p class="card-subtitle">Pas mobiel en straatnaam aan en sla op.</p>
        </div>
        <div class="actions">
            <a class="btn btn-ghost" href="{{ route('leveranciers.show', $leverancier['Id']) }}">← Terug</a>
        </div>
    </div>

    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger" style="margin-bottom:14px;">
                <b>Er zitten fouten in je invoer:</b>
                <ul style="margin:10px 0 0;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="form" method="POST" action="{{ route('leveranciers.update', $leverancier['Id']) }}">
            @csrf

            <div class="field">
                <label>Mobiel</label>
                <input class="input" type="text" name="mobiel" value="{{ old('mobiel', $leverancier['Mobiel']) }}">
                <div class="help">Voorbeeld: 06-39398825</div>
            </div>

            <div class="field">
                <label>Straatnaam</label>
                <input class="input" type="text" name="straat" value="{{ old('straat', $leverancier['Straat']) }}">
                <div class="help">Voorbeeld: Den Dolderlaan</div>
            </div>

            <div class="actions" style="justify-content:flex-end; margin-top:6px;">
                <button class="btn btn-primary" type="submit">Sla op</button>
            </div>
        </form>
    </div>
</div>
@endsection
