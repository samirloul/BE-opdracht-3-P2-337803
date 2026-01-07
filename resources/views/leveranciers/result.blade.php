@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <div>
            <h1 class="card-title">{{ $isSuccess ? 'Gelukt' : 'Mislukt' }}</h1>
            <p class="card-subtitle">Je wordt automatisch teruggestuurd naar de details pagina.</p>
        </div>
        <span class="pill">Auto redirect: 3s</span>
    </div>

    <div class="card-body">
        <div class="alert {{ $isSuccess ? 'alert-success' : 'alert-danger' }}">
            <b>Melding:</b> {{ $message }}
        </div>

        <p class="small" style="margin-top:12px;">
            Als je niet wordt doorgestuurd:
            <a class="btn btn-ghost" style="padding:8px 10px; margin-left:8px;" href="{{ route('leveranciers.show', $id) }}">
                Ga terug
            </a>
        </p>
    </div>
</div>

<!-- eis: na 3 seconden terug naar details -->
<meta http-equiv="refresh" content="3;url={{ route('leveranciers.show', $id) }}">
@endsection
