<!doctype html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Jamin Manager' }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="container">
    <div class="topbar">
        <div class="brand">
            <div class="logo"></div>
            <div>
                <div style="font-size:16px; line-height:1;">Jamin Manager</div>
                <div class="small" style="margin-top:2px;">Leveranciers beheren</div>
            </div>
        </div>
        <div class="actions">
            <span class="badge">Laravel • PDO • Stored Procedures</span>
            <a class="btn btn-ghost" href="{{ route('leveranciers.index') }}">Overzicht</a>
        </div>
    </div>

    @yield('content')
</div>
</body>
</html>
