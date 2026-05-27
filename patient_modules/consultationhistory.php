<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Consultation History | CLSU Infirmary Telemedicine System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        :root {
            --ink: #071438;
            --muted: #4e5b86;
            --green: #087d32;
            --green-dark: #006824;
            --green-soft: #e9f5e9;
            --blue: #173b93;
            --orange: #a75a00;
            --line: #e1e7ef;
            --page: #fbfcfa;
            --shadow: 0 14px 36px rgba(24, 39, 75, .08);
        }

        * { box-sizing: border-box; }

        body {
            min-height: 100vh;
            margin: 0;
            color: var(--ink);
            font-family: "Inter", "Segoe UI", system-ui, -apple-system, BlinkMacSystemFont, sans-serif;
            background: radial-gradient(circle at 88% 92%, rgba(255, 211, 67, .24), transparent 16rem), linear-gradient(180deg, #fbfdfb 0%, #f7faf5 100%);
        }

        a { color: inherit; text-decoration: none; }
        button, input, select { font: inherit; }

        .app-shell {
            display: grid;
            grid-template-columns: 280px minmax(0, 1fr);
            min-height: 100vh;
        }

        .sidebar {
            position: sticky;
            top: 0;
            height: 100vh;
            padding: 1.6rem 1.15rem;
            border-right: 1px solid var(--line);
            background: #fff;
            box-shadow: 8px 0 28px rgba(24, 39, 75, .04);
            overflow-y: auto;
            transition: padding .2s ease;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: .8rem;
            margin-bottom: 3rem;
        }

        .brand img {
            width: 58px;
            height: 58px;
            border-radius: 50%;
            object-fit: cover;
        }

        .brand strong {
            display: block;
            color: #111;
            font-size: 1.28rem;
            font-weight: 900;
            line-height: 1.1;
        }

        .brand span { color: #111; font-weight: 700; }

        .patient-mini {
            display: flex;
            align-items: center;
            gap: .95rem;
            margin-bottom: 2.4rem;
            padding-left: .15rem;
        }

        .avatar {
            display: grid;
            place-items: center;
            width: 64px;
            height: 64px;
            border: 1px solid #d4dbe7;
            border-radius: 50%;
            color: #fff;
            background: linear-gradient(135deg, #f3b79b 0%, #253055 100%);
            font-size: 1.85rem;
            overflow: hidden;
        }

        .patient-mini h2 {
            margin: 0 0 .2rem;
            font-size: 1rem;
            font-weight: 900;
        }

        .patient-mini p {
            margin: 0;
            color: var(--muted);
            font-size: .9rem;
        }

        .online {
            display: inline-flex;
            align-items: center;
            gap: .35rem;
            color: #2d405f;
            font-size: .82rem;
        }

        .online::before {
            content: "";
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: var(--green);
        }

        .sidebar-collapse {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: .55rem;
            width: 100%;
            min-height: 42px;
            margin: 0 0 1rem;
            border: 1px solid #d7e0ee;
            border-radius: 9px;
            color: var(--green-dark);
            background: #fff;
            font-weight: 950;
        }

        .nav-list {
            display: grid;
            gap: .55rem;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .nav-link {
            position: relative;
            display: flex;
            align-items: center;
            gap: 1rem;
            min-height: 58px;
            padding: .8rem 1rem;
            border-radius: 12px;
            color: #111;
            font-weight: 800;
        }

        .nav-link i {
            width: 28px;
            color: #5d697d;
            font-size: 1.45rem;
        }

        .nav-link.active {
            color: var(--green-dark);
            background: linear-gradient(90deg, #e5f8ec, #eefbf2);
        }

        .nav-link.active i { color: var(--green); }

        .nav-badge {
            display: grid;
            place-items: center;
            min-width: 24px;
            height: 24px;
            margin-left: auto;
            padding: 0 .38rem;
            border-radius: 999px;
            color: #fff;
            background: #ff1e22;
            font-size: .82rem;
            font-weight: 900;
        }

        .nav-divider {
            height: 1px;
            margin: 2.2rem .25rem;
            background: var(--line);
        }

        body.sidebar-collapsed .app-shell { grid-template-columns: 88px minmax(0, 1fr); }
        body.sidebar-collapsed .sidebar { padding-inline: .75rem; overflow-x: hidden; }
        body.sidebar-collapsed .brand { justify-content: center; gap: 0; margin-bottom: 1.5rem; }
        body.sidebar-collapsed .brand span,
        body.sidebar-collapsed .patient-mini > div:last-child,
        body.sidebar-collapsed .sidebar-collapse span { display: none; }
        body.sidebar-collapsed .brand img,
        body.sidebar-collapsed .avatar { width: 48px; height: 48px; }
        body.sidebar-collapsed .patient-mini { justify-content: center; gap: 0; margin-bottom: 1rem; }
        body.sidebar-collapsed .sidebar-collapse { width: 48px; margin-inline: auto; }
        body.sidebar-collapsed .nav-link { justify-content: center; gap: 0; padding-inline: .6rem; font-size: 0; }
        body.sidebar-collapsed .nav-link i { width: auto; font-size: 1.45rem; }
        body.sidebar-collapsed .nav-badge {
            position: absolute;
            top: 5px;
            right: 4px;
            min-width: 18px;
            height: 18px;
            margin-left: 0;
            padding: 0 .25rem;
            font-size: .62rem;
        }

        .main {
            min-width: 0;
            padding: 1.8rem 2rem;
        }

        .menu-toggle,
        .sidebar-overlay { display: none; }

        .topbar {
            display: grid;
            grid-template-columns: minmax(0, 1fr) minmax(260px, 430px) auto;
            align-items: center;
            gap: 1.4rem;
            margin-bottom: 2rem;
        }

        .page-title h1 {
            margin: 0 0 .35rem;
            color: #09194a;
            font-size: clamp(2.1rem, 3.2vw, 3.2rem);
            font-weight: 950;
            letter-spacing: 0;
        }

        .page-title p {
            margin: 0;
            color: #34426f;
            font-size: 1.02rem;
        }

        .search-box,
        .field {
            position: relative;
            display: block;
        }

        .search-box input,
        .field input,
        .field select {
            width: 100%;
            height: 50px;
            padding: 0 3.25rem 0 1.4rem;
            border: 1px solid #cfd8ea;
            border-radius: 10px;
            color: var(--ink);
            background: #fff;
            outline: none;
        }

        .field select {
            appearance: none;
            color: #7a8194;
        }

        .search-box i,
        .field i {
            position: absolute;
            top: 50%;
            right: 1rem;
            color: #12317f;
            font-size: 1.55rem;
            transform: translateY(-50%);
            pointer-events: none;
        }

        .top-actions {
            display: flex;
            align-items: center;
            gap: 1.35rem;
        }

        .bell {
            position: relative;
            border: 0;
            background: transparent;
            font-size: 1.75rem;
        }

        .bell span {
            position: absolute;
            top: -8px;
            right: -9px;
            display: grid;
            place-items: center;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            color: #fff;
            background: #ff1e22;
            font-size: .82rem;
            font-weight: 900;
        }

        .profile-dot {
            display: grid;
            place-items: center;
            width: 58px;
            height: 58px;
            border: 0;
            border-radius: 50%;
            color: #233d78;
            background: #dfe9f6;
            font-size: 2rem;
        }

        .history-layout {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 330px;
            gap: 1.6rem;
            align-items: start;
        }

        .panel {
            border: 1px solid var(--line);
            border-radius: 10px;
            background: #fff;
            box-shadow: var(--shadow);
        }

        .history-panel {
            padding: 1.45rem 1.35rem 1.1rem;
            overflow: hidden;
        }

        .history-list {
            display: grid;
            gap: 0;
        }

        .history-item {
            display: grid;
            grid-template-columns: 78px minmax(190px, 1.15fr) minmax(240px, 1fr) 168px;
            align-items: center;
            gap: 1.35rem;
            min-height: 114px;
            padding: 1.05rem .6rem;
            border-bottom: 1px solid var(--line);
        }

        .history-item:last-child { border-bottom: 0; }

        .record-icon {
            display: grid;
            place-items: center;
            width: 68px;
            height: 68px;
            border-radius: 50%;
            color: #173b93;
            background: #eef5ff;
            font-size: 1.8rem;
        }

        .record-icon.warn {
            color: #ff2d2d;
            background: #fff0f0;
        }

        .record-icon.time {
            color: #b66a00;
            background: #fff7e8;
        }

        .record-icon.good {
            color: var(--green);
            background: #e9f8ef;
        }

        .record-icon.purple {
            color: #263a9f;
            background: #f1edff;
        }

        .record-id {
            margin: 0 0 .55rem;
            color: #061642;
            font-size: clamp(1rem, 1.25vw, 1.25rem);
            font-weight: 950;
            letter-spacing: .02em;
        }

        .triage-pill,
        .complete-pill {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 28px;
            padding: .25rem .95rem;
            border-radius: 999px;
            font-size: .82rem;
            font-weight: 950;
            white-space: nowrap;
        }

        .triage-pill.level-1 {
            color: var(--green-dark);
            background: #ddf8e6;
        }

        .triage-pill.level-2 {
            color: #894600;
            background: #fff0d6;
        }

        .meta-stack {
            display: grid;
            gap: .75rem;
            color: #243562;
            font-size: .96rem;
        }

        .meta-line {
            display: flex;
            align-items: center;
            gap: .75rem;
            min-width: 0;
        }

        .meta-line i {
            color: #233d86;
            font-size: 1.15rem;
        }

        .status-actions {
            display: grid;
            justify-items: center;
            gap: .7rem;
        }

        .complete-pill {
            min-width: 142px;
            color: var(--green-dark);
            background: #def5e5;
        }

        .summary-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 148px;
            min-height: 38px;
            padding: 0 1rem;
            border: 1px solid #b9c4d6;
            border-radius: 8px;
            color: #020617;
            background: #fff;
            font-weight: 900;
        }

        .pagination-row {
            display: flex;
            justify-content: center;
            gap: .85rem;
            padding-top: 1.1rem;
        }

        .page-btn {
            display: grid;
            place-items: center;
            min-width: 42px;
            height: 36px;
            border: 1px solid #d7e0ee;
            border-radius: 6px;
            color: #071438;
            background: #fff;
            font-weight: 850;
        }

        .page-btn.active {
            border-color: #8bd5a3;
            color: var(--green-dark);
            background: #e8faee;
        }

        .filter-panel {
            padding: 1.45rem;
        }

        .filter-panel h2 {
            margin: 0 0 1.55rem;
            font-size: 1.25rem;
            font-weight: 950;
        }

        .filter-group {
            display: grid;
            gap: .65rem;
            margin-bottom: 1.35rem;
        }

        .filter-group label,
        .date-group > span {
            font-weight: 900;
        }

        .date-row {
            display: grid;
            grid-template-columns: minmax(0, 1fr) auto minmax(0, 1fr);
            align-items: center;
            gap: .55rem;
        }

        .date-row .field input {
            padding-inline: .85rem 2.4rem;
            font-size: .9rem;
        }

        .date-row .field i {
            right: .75rem;
            font-size: 1.15rem;
        }

        .apply-btn,
        .clear-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: .6rem;
            width: 100%;
            min-height: 44px;
            border-radius: 8px;
            font-weight: 950;
        }

        .apply-btn {
            margin-top: .5rem;
            border: 1px solid #9ed9af;
            color: var(--green-dark);
            background: #fff;
        }

        .clear-btn {
            margin: .7rem 0 1.6rem;
            border: 0;
            color: #3a55a0;
            background: transparent;
            font-weight: 500;
        }

        .note {
            display: grid;
            grid-template-columns: 36px 1fr;
            gap: .85rem;
            padding: 1.15rem;
            border-radius: 8px;
            color: var(--green-dark);
            background: linear-gradient(135deg, #edf8ef, #f8fcf4);
        }

        .note i {
            margin-top: .1rem;
            font-size: 1.25rem;
        }

        .note h3 {
            margin: 0 0 .45rem;
            font-size: .95rem;
            font-weight: 950;
        }

        .note p {
            margin: 0;
            color: #5f6878;
            font-size: .9rem;
            line-height: 1.55;
        }

        .empty-state {
            display: none;
            padding: 3rem 1rem 2rem;
            color: #34426f;
            text-align: center;
        }

        .empty-state i {
            display: block;
            margin-bottom: .75rem;
            color: #c1cbda;
            font-size: 2rem;
        }

        @media (max-width: 1320px) {
            .history-layout { grid-template-columns: 1fr; }
            .filter-panel { max-width: none; }
        }

        @media (max-width: 1180px) {
            .app-shell,
            body.sidebar-collapsed .app-shell { grid-template-columns: 1fr; }
            .sidebar-collapse { display: none; }
            .menu-toggle {
                position: fixed;
                top: 1rem;
                left: 1rem;
                z-index: 1100;
                display: grid;
                place-items: center;
                width: 48px;
                height: 48px;
                border: 1px solid var(--line);
                border-radius: 12px;
                color: var(--green-dark);
                background: #fff;
                box-shadow: 0 10px 24px rgba(24, 39, 75, .12);
                font-size: 1.55rem;
            }

            .sidebar-overlay {
                position: fixed;
                inset: 0;
                z-index: 1050;
                display: block;
                background: rgba(7, 20, 56, .42);
                opacity: 0;
                pointer-events: none;
                transition: opacity .2s ease;
            }

            body.sidebar-open .sidebar-overlay {
                opacity: 1;
                pointer-events: auto;
            }

            .sidebar {
                position: fixed;
                inset: 0 auto 0 0;
                z-index: 1060;
                width: min(82vw, 310px);
                height: 100vh;
                transform: translateX(-100%);
                transition: transform .24s ease;
                box-shadow: 12px 0 36px rgba(7, 20, 56, .18);
            }

            body.sidebar-open .sidebar { transform: translateX(0); }
            .main { padding-top: 5rem; }
        }

        @media (max-width: 900px) {
            .main { padding-inline: 1rem; }
            .topbar { grid-template-columns: 1fr; }
            .top-actions { display: none; }
            .history-item {
                grid-template-columns: 62px minmax(0, 1fr);
                gap: .9rem;
                align-items: start;
            }

            .record-icon {
                width: 56px;
                height: 56px;
                font-size: 1.5rem;
            }

            .meta-stack,
            .status-actions {
                grid-column: 2;
            }

            .status-actions {
                justify-items: start;
                grid-template-columns: auto auto;
                align-items: center;
            }
        }

        @media (max-width: 620px) {
            .sidebar { padding: 1rem; }
            .brand,
            .patient-mini { margin-bottom: 1.4rem; }
            .nav-link { min-height: 48px; padding: .65rem .85rem; }
            .page-title h1 { font-size: 2rem; }
            .history-panel,
            .filter-panel { padding: 1rem; }
            .date-row { grid-template-columns: 1fr; }
            .date-row > span { display: none; }
            .status-actions { grid-template-columns: 1fr; }
            .pagination-row { gap: .45rem; }
            .page-btn { min-width: 36px; }
        }
    </style>
</head>
<body>
    <button class="menu-toggle" type="button" aria-label="Open navigation" aria-controls="patientSidebar" aria-expanded="false">
        <i class="bi bi-list"></i>
    </button>

    <div class="app-shell">
        <aside class="sidebar" id="patientSidebar">
            <a class="brand" href="dashboard.php">
                <img src="../auth/assets/img/CLSU_Logo.jpg" alt="CLSU logo">
                <span>
                    <strong>CLSU Infirmary</strong>
                    Telemedicine System
                </span>
            </a>

            <div class="patient-mini">
                <div class="avatar" aria-hidden="true"><i class="bi bi-person-fill"></i></div>
                <div>
                    <h2>Jane Dela Cruz</h2>
                    <p>BSIT - 2A</p>
                    <span class="online">Online</span>
                </div>
            </div>

            <button class="sidebar-collapse" type="button" aria-label="Collapse sidebar" aria-expanded="true">
                <i class="bi bi-layout-sidebar-inset"></i>
                <span>Collapse</span>
            </button>

            <nav aria-label="Patient navigation">
                <ul class="nav-list">
                    <li><a class="nav-link" href="dashboard.php"><i class="bi bi-house-door"></i> Dashboard</a></li>
                    <li><a class="nav-link" href="newconsultation.php"><i class="bi bi-clipboard2-plus"></i> New Consultation</a></li>
                    <li><a class="nav-link" href="myconsultation.php"><i class="bi bi-chat-dots"></i> My Consultation</a></li>
                    <li><a class="nav-link active" href="consultationhistory.php"><i class="bi bi-clipboard2-pulse"></i> Consultation History</a></li>
                    <li>
                        <a class="nav-link" href="notification.php">
                            <i class="bi bi-bell"></i> Notifications
                            <span class="nav-badge">4</span>
                        </a>
                    </li>
                    <li><a class="nav-link" href="profile.php"><i class="bi bi-card-list"></i> Profile</a></li>
                </ul>
            </nav>

            <div class="nav-divider"></div>

            <ul class="nav-list">
                <li><a class="nav-link" href="#"><i class="bi bi-question-circle"></i> Help &amp; Support</a></li>
                <li><a class="nav-link" href="../auth/"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
            </ul>
        </aside>

        <main class="main">
            <header class="topbar">
                <div class="page-title">
                    <h1>Consultation History</h1>
                    <p>View your past consultations and their summaries.</p>
                </div>

                <label class="search-box" aria-label="Search consultations">
                    <input id="topSearch" type="search" placeholder="Search consultation...">
                    <i class="bi bi-search"></i>
                </label>

                <div class="top-actions">
                    <button class="bell" type="button" aria-label="Notifications">
                        <i class="bi bi-bell"></i>
                        <span>4</span>
                    </button>
                    <button class="profile-dot" type="button" aria-label="Profile">
                        <i class="bi bi-person-fill"></i>
                    </button>
                </div>
            </header>

            <div class="history-layout">
                <section class="panel history-panel" aria-labelledby="history-list-title">
                    <h2 class="visually-hidden" id="history-list-title">Completed consultations</h2>

                    <div class="history-list" id="historyList">
                        <article class="history-item" data-status="Completed" data-level="Level 2 - Urgent" data-search="CONS-2025-000123 Maria Santos physician urgent completed">
                            <span class="record-icon warn"><i class="bi bi-exclamation-triangle"></i></span>
                            <div>
                                <h3 class="record-id">CONS-2025-000123</h3>
                                <span class="triage-pill level-2">Level 2 - Urgent</span>
                            </div>
                            <div class="meta-stack">
                                <span class="meta-line"><i class="bi bi-calendar2-week"></i> May 16, 2025 &bull; 10:32 AM</span>
                                <span class="meta-line"><i class="bi bi-hospital"></i> Dr. Maria Santos (Physician)</span>
                            </div>
                            <div class="status-actions">
                                <span class="complete-pill">Completed</span>
                                <a class="summary-btn" href="myconsultation.php">View Summary</a>
                            </div>
                        </article>

                        <article class="history-item" data-status="Completed" data-level="Level 1 - Non-Urgent" data-search="CONS-2025-000098 Juan Dela Cruz physician non urgent completed">
                            <span class="record-icon"><i class="bi bi-clipboard2-plus"></i></span>
                            <div>
                                <h3 class="record-id">CONS-2025-000098</h3>
                                <span class="triage-pill level-1">Level 1 - Non-Urgent</span>
                            </div>
                            <div class="meta-stack">
                                <span class="meta-line"><i class="bi bi-calendar2-week"></i> May 10, 2025 &bull; 02:15 PM</span>
                                <span class="meta-line"><i class="bi bi-hospital"></i> Dr. Juan Dela Cruz (Physician)</span>
                            </div>
                            <div class="status-actions">
                                <span class="complete-pill">Completed</span>
                                <a class="summary-btn" href="myconsultation.php">View Summary</a>
                            </div>
                        </article>

                        <article class="history-item" data-status="Completed" data-level="Level 2 - Urgent" data-search="CONS-2025-000075 Maria Santos physician urgent completed">
                            <span class="record-icon time"><i class="bi bi-clock"></i></span>
                            <div>
                                <h3 class="record-id">CONS-2025-000075</h3>
                                <span class="triage-pill level-2">Level 2 - Urgent</span>
                            </div>
                            <div class="meta-stack">
                                <span class="meta-line"><i class="bi bi-calendar2-week"></i> May 2, 2025 &bull; 09:45 AM</span>
                                <span class="meta-line"><i class="bi bi-hospital"></i> Dr. Maria Santos (Physician)</span>
                            </div>
                            <div class="status-actions">
                                <span class="complete-pill">Completed</span>
                                <a class="summary-btn" href="myconsultation.php">View Summary</a>
                            </div>
                        </article>

                        <article class="history-item" data-status="Completed" data-level="Level 1 - Non-Urgent" data-search="CONS-2025-000051 Juan Dela Cruz physician non urgent completed">
                            <span class="record-icon good"><i class="bi bi-clipboard2-pulse"></i></span>
                            <div>
                                <h3 class="record-id">CONS-2025-000051</h3>
                                <span class="triage-pill level-1">Level 1 - Non-Urgent</span>
                            </div>
                            <div class="meta-stack">
                                <span class="meta-line"><i class="bi bi-calendar2-week"></i> Apr 25, 2025 &bull; 11:20 AM</span>
                                <span class="meta-line"><i class="bi bi-hospital"></i> Dr. Juan Dela Cruz (Physician)</span>
                            </div>
                            <div class="status-actions">
                                <span class="complete-pill">Completed</span>
                                <a class="summary-btn" href="myconsultation.php">View Summary</a>
                            </div>
                        </article>

                        <article class="history-item" data-status="Completed" data-level="Level 1 - Non-Urgent" data-search="CONS-2025-000032 Maria Santos physician non urgent completed">
                            <span class="record-icon"><i class="bi bi-clipboard2-plus"></i></span>
                            <div>
                                <h3 class="record-id">CONS-2025-000032</h3>
                                <span class="triage-pill level-1">Level 1 - Non-Urgent</span>
                            </div>
                            <div class="meta-stack">
                                <span class="meta-line"><i class="bi bi-calendar2-week"></i> Apr 18, 2025 &bull; 03:05 PM</span>
                                <span class="meta-line"><i class="bi bi-hospital"></i> Dr. Maria Santos (Physician)</span>
                            </div>
                            <div class="status-actions">
                                <span class="complete-pill">Completed</span>
                                <a class="summary-btn" href="myconsultation.php">View Summary</a>
                            </div>
                        </article>

                        <article class="history-item" data-status="Completed" data-level="Level 2 - Urgent" data-search="CONS-2025-000011 Juan Dela Cruz physician urgent completed">
                            <span class="record-icon purple"><i class="bi bi-clock"></i></span>
                            <div>
                                <h3 class="record-id">CONS-2025-000011</h3>
                                <span class="triage-pill level-2">Level 2 - Urgent</span>
                            </div>
                            <div class="meta-stack">
                                <span class="meta-line"><i class="bi bi-calendar2-week"></i> Apr 10, 2025 &bull; 08:30 AM</span>
                                <span class="meta-line"><i class="bi bi-hospital"></i> Dr. Juan Dela Cruz (Physician)</span>
                            </div>
                            <div class="status-actions">
                                <span class="complete-pill">Completed</span>
                                <a class="summary-btn" href="myconsultation.php">View Summary</a>
                            </div>
                        </article>
                    </div>

                    <div class="empty-state" id="emptyState">
                        <i class="bi bi-search"></i>
                        No consultations match your filters.
                    </div>

                    <div class="pagination-row" aria-label="History pagination">
                        <button class="page-btn" type="button" aria-label="Previous page"><i class="bi bi-chevron-left"></i></button>
                        <button class="page-btn active" type="button">1</button>
                        <button class="page-btn" type="button">2</button>
                        <button class="page-btn" type="button">3</button>
                        <button class="page-btn" type="button" aria-label="Next page"><i class="bi bi-chevron-right"></i></button>
                    </div>
                </section>

                <aside class="panel filter-panel" aria-labelledby="filter-title">
                    <h2 id="filter-title">Filter Consultations</h2>

                    <div class="filter-group">
                        <label for="sideSearch">Search</label>
                        <span class="field">
                            <input id="sideSearch" type="search" placeholder="Search by ID or doctor...">
                            <i class="bi bi-search"></i>
                        </span>
                    </div>

                    <div class="filter-group">
                        <label for="statusFilter">Status</label>
                        <span class="field">
                            <select id="statusFilter">
                                <option value="">All Statuses</option>
                                <option value="Completed">Completed</option>
                            </select>
                            <i class="bi bi-chevron-down"></i>
                        </span>
                    </div>

                    <div class="filter-group">
                        <label for="levelFilter">Triage Level</label>
                        <span class="field">
                            <select id="levelFilter">
                                <option value="">All Levels</option>
                                <option value="Level 1 - Non-Urgent">Level 1 - Non-Urgent</option>
                                <option value="Level 2 - Urgent">Level 2 - Urgent</option>
                            </select>
                            <i class="bi bi-chevron-down"></i>
                        </span>
                    </div>

                    <div class="filter-group date-group">
                        <span>Date Range</span>
                        <div class="date-row">
                            <span class="field">
                                <input type="text" placeholder="Start date" aria-label="Start date">
                                <i class="bi bi-calendar2-week"></i>
                            </span>
                            <span>-</span>
                            <span class="field">
                                <input type="text" placeholder="End date" aria-label="End date">
                                <i class="bi bi-calendar2-week"></i>
                            </span>
                        </div>
                    </div>

                    <button class="apply-btn" type="button" id="applyFilters">
                        <i class="bi bi-funnel"></i>
                        Apply Filters
                    </button>
                    <button class="clear-btn" type="button" id="clearFilters">Clear Filters</button>

                    <section class="note" aria-label="Consultation history note">
                        <i class="bi bi-info-circle"></i>
                        <div>
                            <h3>Note</h3>
                            <p>You can view details and summaries of your past consultations.</p>
                        </div>
                    </section>
                </aside>
            </div>
        </main>
    </div>

    <div class="sidebar-overlay" data-close-sidebar></div>
    <script>
        const menuToggle = document.querySelector(".menu-toggle");
        const sidebarCollapse = document.querySelector(".sidebar-collapse");
        const sidebarOverlay = document.querySelector(".sidebar-overlay");
        const sidebarLinks = document.querySelectorAll(".sidebar .nav-link, .sidebar .brand");

        const setSidebar = (isOpen) => {
            document.body.classList.toggle("sidebar-open", isOpen);
            menuToggle.setAttribute("aria-expanded", String(isOpen));
            menuToggle.setAttribute("aria-label", isOpen ? "Close navigation" : "Open navigation");
        };

        menuToggle.addEventListener("click", () => {
            setSidebar(!document.body.classList.contains("sidebar-open"));
        });

        const setSidebarCollapsed = (isCollapsed) => {
            document.body.classList.toggle("sidebar-collapsed", isCollapsed);
            sidebarCollapse.setAttribute("aria-expanded", String(!isCollapsed));
            sidebarCollapse.setAttribute("aria-label", isCollapsed ? "Expand sidebar" : "Collapse sidebar");
            sidebarCollapse.querySelector("span").textContent = isCollapsed ? "Expand" : "Collapse";
        };

        sidebarCollapse.addEventListener("click", () => {
            setSidebarCollapsed(!document.body.classList.contains("sidebar-collapsed"));
        });

        sidebarOverlay.addEventListener("click", () => setSidebar(false));
        sidebarLinks.forEach((link) => link.addEventListener("click", () => setSidebar(false)));

        document.addEventListener("keydown", (event) => {
            if (event.key === "Escape") {
                setSidebar(false);
            }
        });

        const topSearch = document.querySelector("#topSearch");
        const sideSearch = document.querySelector("#sideSearch");
        const statusFilter = document.querySelector("#statusFilter");
        const levelFilter = document.querySelector("#levelFilter");
        const applyFilters = document.querySelector("#applyFilters");
        const clearFilters = document.querySelector("#clearFilters");
        const records = document.querySelectorAll(".history-item");
        const emptyState = document.querySelector("#emptyState");

        const normalize = (value) => value.trim().toLowerCase();

        const filterRecords = () => {
            const query = normalize(`${topSearch.value} ${sideSearch.value}`);
            const status = statusFilter.value;
            const level = levelFilter.value;
            let visibleCount = 0;

            records.forEach((record) => {
                const matchesSearch = !query || normalize(record.dataset.search).includes(query);
                const matchesStatus = !status || record.dataset.status === status;
                const matchesLevel = !level || record.dataset.level === level;
                const isVisible = matchesSearch && matchesStatus && matchesLevel;

                record.hidden = !isVisible;
                if (isVisible) {
                    visibleCount += 1;
                }
            });

            emptyState.style.display = visibleCount ? "none" : "block";
        };

        topSearch.addEventListener("input", filterRecords);
        sideSearch.addEventListener("input", filterRecords);
        applyFilters.addEventListener("click", filterRecords);
        statusFilter.addEventListener("change", filterRecords);
        levelFilter.addEventListener("change", filterRecords);
        clearFilters.addEventListener("click", () => {
            topSearch.value = "";
            sideSearch.value = "";
            statusFilter.value = "";
            levelFilter.value = "";
            filterRecords();
        });
    </script>
</body>
</html>
