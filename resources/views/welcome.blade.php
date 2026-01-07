<!doctype html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jamin Manager</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="container">
    <div class="topbar">
        <div class="brand">
            <div class="logo"></div>
            <div>
                <div style="font-size:16px; line-height:1;">Jamin Manager</div>
                <div class="small" style="margin-top:2px;">Backend opdracht 3</div>
            </div>
        </div>
        <span class="badge">Welkom</span>
    </div>

    <div class="card">
        <div class="card-header">
            <div>
<h1 class="card-title">Startpagina</h1>
                <p class="card-subtitle">Ga naar de user story: wijzigen leverancier.</p>
            </div>
            <a class="btn btn-primary" href="{{ route('leveranciers.index') }}">Wijzigen Leveranciers</a>
        </div>
        <div class="card-body">
            <p class="small">Tip: Astra Sweets = succes • De Bron = foutmelding.</p>
        </div>
    </div>
</div>
</body>
</html>
