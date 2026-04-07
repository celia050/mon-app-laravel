<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini LMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --navy: #2F4156;
            --teal: #567C8D;
            --skyblue: #C8D9E6;
            --beige: #F5EFEB;
            --white: #FFFFFF;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--beige);
            min-height: 100vh;
        }

        /* SIDEBAR */
        .sidebar {
            position: fixed;
            top: 0; left: 0;
            width: 260px;
            height: 100vh;
            background: var(--navy);
            z-index: 100;
            box-shadow: 4px 0 24px rgba(47,65,86,0.15);
            display: flex;
            flex-direction: column;
        }

        .sidebar-brand {
            padding: 32px 28px 24px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .sidebar-brand h4 {
            color: var(--white);
            font-weight: 800;
            font-size: 1.3rem;
            margin: 0;
            letter-spacing: -0.5px;
        }

        .sidebar-brand span {
            color: var(--skyblue);
            font-size: 0.78rem;
            font-weight: 400;
        }

        .sidebar-user {
            padding: 20px 28px;
            border-bottom: 1px solid rgba(255,255,255,0.08);
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .user-avatar {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            background: var(--teal);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 1rem;
        }

        .user-info p {
            color: var(--white);
            font-size: 0.88rem;
            font-weight: 600;
            margin: 0;
        }

        .user-info small {
            color: var(--skyblue);
            font-size: 0.75rem;
        }

        .sidebar nav {
            padding: 20px 0;
            flex: 1;
        }

        .nav-section {
            padding: 10px 28px 6px;
            color: rgba(200,217,230,0.5);
            font-size: 0.68rem;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            font-weight: 600;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 12px 28px;
            color: rgba(200,217,230,0.8);
            text-decoration: none;
            font-size: 0.88rem;
            font-weight: 500;
            transition: all 0.2s;
            border-left: 3px solid transparent;
            margin: 2px 0;
        }

        .sidebar a:hover {
            background: rgba(255,255,255,0.07);
            color: var(--white);
            border-left-color: var(--teal);
        }

        .sidebar a i {
            width: 18px;
            text-align: center;
            color: var(--teal);
        }

        .sidebar-footer {
            padding: 20px 28px;
            border-top: 1px solid rgba(255,255,255,0.08);
        }

        .sidebar-footer form button {
            background: transparent;
            border: 1px solid rgba(200,217,230,0.3);
            color: var(--skyblue);
            padding: 10px 16px;
            border-radius: 10px;
            font-size: 0.85rem;
            cursor: pointer;
            width: 100%;
            transition: all 0.2s;
            font-family: 'Inter', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .sidebar-footer form button:hover {
            background: rgba(255,255,255,0.08);
            color: var(--white);
            border-color: rgba(200,217,230,0.5);
        }

        /* MAIN */
        .main-content {
            margin-left: 260px;
            min-height: 100vh;
        }

        .topbar {
            background: var(--white);
            padding: 18px 36px;
            box-shadow: 0 1px 12px rgba(47,65,86,0.08);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .topbar h5 {
            margin: 0;
            font-weight: 700;
            color: var(--navy);
            font-size: 1rem;
        }

        .topbar-badge {
            background: var(--teal);
            color: white;
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .content-area {
            padding: 36px;
        }

        /* CARDS */
        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 2px 16px rgba(47,65,86,0.07);
            background: var(--white);
        }

        .card-header {
            background: var(--white);
            border-bottom: 1px solid var(--skyblue);
            border-radius: 16px 16px 0 0 !important;
            padding: 18px 24px;
            font-weight: 700;
            color: var(--navy);
        }

        /* BUTTONS */
        .btn-primary {
            background: var(--navy);
            border: none;
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.88rem;
        }

        .btn-primary:hover {
            background: var(--teal);
            border: none;
        }

        .btn-success {
            background: var(--teal);
            border: none;
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.88rem;
        }

        .btn-success:hover {
            background: var(--navy);
            border: none;
        }

        .btn-warning { border-radius: 10px; font-size: 0.88rem; }
        .btn-danger { border-radius: 10px; font-size: 0.88rem; }
        .btn-info { border-radius: 10px; font-size: 0.88rem; background: var(--skyblue); border: none; color: var(--navy); }
        .btn-secondary { border-radius: 10px; font-size: 0.88rem; }

        /* TABLES */
        .table { border-radius: 12px; overflow: hidden; margin: 0; }

        .table thead th {
            background: var(--navy);
            color: var(--white);
            border: none;
            font-weight: 600;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            padding: 14px 16px;
        }

        .table tbody td {
            padding: 13px 16px;
            color: #374151;
            border-color: var(--skyblue);
            font-size: 0.9rem;
            vertical-align: middle;
        }

        .table tbody tr:hover { background: #f0f6fa; }

        /* FORMS */
        .form-control, .form-select {
            border-radius: 10px;
            border: 1.5px solid var(--skyblue);
            padding: 10px 14px;
            font-size: 0.9rem;
            transition: all 0.2s;
            font-family: 'Inter', sans-serif;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--teal);
            box-shadow: 0 0 0 3px rgba(86,124,141,0.15);
        }

        label {
            font-weight: 600;
            font-size: 0.83rem;
            color: var(--navy);
            margin-bottom: 6px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* ALERTS */
        .alert-success {
            background: #eef6f4;
            border: 1px solid #a8d5ca;
            color: #1a5c4f;
            border-radius: 12px;
            font-size: 0.9rem;
        }

        .alert-danger {
            background: #fef2f2;
            border: 1px solid #fca5a5;
            color: #991b1b;
            border-radius: 12px;
            font-size: 0.9rem;
        }

        /* PAGE TITLE */
        h2 {
            color: var(--navy);
            font-weight: 800;
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        h4 { color: var(--navy); font-weight: 700; }

        /* STAT CARDS */
        .stat-card {
            background: var(--white);
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 2px 16px rgba(47,65,86,0.07);
            display: flex;
            align-items: center;
            gap: 18px;
            transition: transform 0.2s;
        }

        .stat-card:hover { transform: translateY(-2px); }

        .stat-icon {
            width: 54px;
            height: 54px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            color: white;
        }

        .stat-icon.navy { background: var(--navy); }
        .stat-icon.teal { background: var(--teal); }
        .stat-icon.sky { background: var(--skyblue); color: var(--navy); }

        .stat-info h3 {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--navy);
            margin: 0;
        }

        .stat-info p {
            color: var(--teal);
            font-size: 0.82rem;
            font-weight: 500;
            margin: 0;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        textarea { resize: vertical; }
    </style>
</head>
<body>
@auth
<div class="sidebar">
    <div class="sidebar-brand">
        <h4>🎓 Mini LMS</h4>
        <span>Plateforme pédagogique</span>
    </div>

    <div class="sidebar-user">
        <div class="user-avatar">
            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
        </div>
        <div class="user-info">
            <p>{{ auth()->user()->name }}</p>
            <small>{{ auth()->user()->isAdmin() ? 'Administrateur' : '🎓 Apprenant' }}</small>
        </div>
    </div>

    <nav>
        @if(auth()->user()->isAdmin())
            <div class="nav-section">Administration</div>
            <a href="{{ route('dashboard') }}"><i class="fas fa-home"></i> Dashboard</a>
            <a href="{{ route('admin.formations.index') }}"><i class="fas fa-graduation-cap"></i> Formations</a>
            <a href="{{ route('admin.notes.index') }}"><i class="fas fa-star"></i> Notes</a>
            <a href="{{ route('admin.resultats.index') }}"><i class="fas fa-chart-line"></i> Résultats quiz</a>
            <div class="nav-section">Outils</div>
            <a href="{{ route('admin.ollama.form') }}"><i class="fas fa-magic"></i> Générer avec IA </a>
        @else
            <div class="nav-section">Mon espace</div>
            <a href="{{ route('dashboard') }}"><i class="fas fa-home"></i> Dashboard</a>
            <a href="{{ route('apprenant.formations') }}"><i class="fas fa-book"></i> Mes formations</a>
            <a href="{{ route('apprenant.notes') }}"><i class="fas fa-chart-bar"></i> Mes notes</a>
        @endif
    </nav>

    <div class="sidebar-footer">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"><i class="fas fa-sign-out-alt"></i> Déconnexion</button>
        </form>
    </div>
</div>

<div class="main-content">
    <div class="topbar">
        <h5>Mini LMS</h5>
        <span class="topbar-badge">
            {{ auth()->user()->isAdmin() ? 'Admin' : '🎓 Apprenant' }}
        </span>
    </div>

    <div class="content-area">
        @if(session('success'))
            <div class="alert alert-success mb-4">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger mb-4">
                <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
            </div>
        @endif

        @yield('content')
    </div>
</div>
@else
    <div style="margin-left:0; background: var(--beige); min-height:100vh;">
        <div style="padding: 36px;">
            @yield('content')
        </div>
    </div>
@endauth

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>