<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Follow-up Requests | CLSU Infirmary Telemedicine System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        :root {
            --ink: #071438;
            --muted: #4e5b86;
            --green: #087d32;
            --green-dark: #006824;
            --line: #e1e7ef;
            --page: #fbfcfa;
            --blue: #2578e7;
            --orange: #ff8a00;
            --purple: #087d32;
            --red: #f52222;
            --shadow: 0 12px 30px rgba(24, 39, 75, .07);
        }

        * { box-sizing: border-box; }

        body {
            min-height: 100vh;
            margin: 0;
            color: var(--ink);
            font-family: "Inter", "Segoe UI", system-ui, -apple-system, BlinkMacSystemFont, sans-serif;
            background: radial-gradient(circle at 88% 92%, rgba(255,211,67,.26), transparent 16rem), linear-gradient(180deg, #fbfdfb 0%, #f7faf5 100%);
        }

        a { color: inherit; text-decoration: none; }

        .app-shell {
            display: grid;
            grid-template-columns: 300px minmax(0, 1fr);
            min-height: 100vh;
            transition: grid-template-columns .2s ease;
        }

        .sidebar {
            position: sticky;
            top: 0;
            height: 100vh;
            padding: 1.55rem 1.25rem;
            border-right: 1px solid var(--line);
            background: #fff;
            box-shadow: 8px 0 28px rgba(24, 39, 75, .04);
            overflow-y: auto;
            transition: padding .2s ease;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: .85rem;
            margin-bottom: 2.35rem;
        }

        .brand img {
            width: 62px;
            height: 62px;
            border-radius: 50%;
            object-fit: cover;
        }

        .brand strong {
            display: block;
            font-size: 1.36rem;
            font-weight: 950;
            line-height: 1.05;
        }

        .brand span {
            color: #111;
            font-size: 1rem;
            font-weight: 800;
        }

        .nurse-mini {
            display: grid;
            grid-template-columns: 64px minmax(0, 1fr);
            align-items: center;
            gap: .9rem;
            margin-bottom: 2rem;
        }

        .avatar,
        .mini-avatar {
            display: grid;
            place-items: center;
            border-radius: 50%;
            color: #fff;
            background: linear-gradient(145deg, #f3b79b, #253055);
            overflow: hidden;
        }

        .avatar {
            width: 64px;
            height: 64px;
            border: 1px solid #d4dbe7;
            font-size: 1.85rem;
        }

        .mini-avatar {
            width: 58px;
            height: 58px;
            font-size: 1.25rem;
        }

        .mini-avatar.male { background: linear-gradient(145deg, #f0b08f, #39415d); }

        .nurse-mini h2 {
            margin: 0 0 .18rem;
            font-size: 1rem;
            font-weight: 950;
        }

        .nurse-mini p {
            margin: 0 0 .25rem;
            color: var(--muted);
            font-size: .9rem;
        }

        .online {
            display: inline-flex;
            align-items: center;
            gap: .38rem;
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

        .nav-list {
            display: grid;
            gap: .52rem;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .nav-link {
            position: relative;
            display: flex;
            align-items: center;
            gap: 1rem;
            min-height: 54px;
            padding: .75rem .95rem;
            border-radius: 10px;
            color: #1d293f;
            font-weight: 850;
        }

        .nav-link i {
            width: 28px;
            color: #5d697d;
            font-size: 1.35rem;
        }

        .nav-link.active {
            color: var(--green-dark);
            background: linear-gradient(90deg, #e7f4e6, #f5faf3);
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
            background: var(--green);
            font-size: .78rem;
            font-weight: 950;
        }

        .shift-card {
            margin: 1.9rem 0 1.25rem;
            padding: 1rem;
            border: 1px solid #cfe8d8;
            border-radius: 10px;
            background: linear-gradient(135deg, #f5fff8, #eaf7ef);
        }

        .shift-card header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: .75rem;
            color: var(--green-dark);
            font-weight: 950;
        }

        .shift-status {
            display: flex;
            align-items: center;
            gap: .65rem;
            margin-bottom: .55rem;
            color: var(--green-dark);
            font-weight: 850;
        }

        .shift-status::before {
            content: "";
            width: 9px;
            height: 9px;
            border-radius: 50%;
            background: #34c76b;
        }

        .shift-card p {
            margin: .35rem 0 0 1.55rem;
            color: #26335f;
            font-size: .9rem;
        }

        .logout-link { margin-top: 6.5rem; }

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

        body.sidebar-collapsed .app-shell { grid-template-columns: 88px minmax(0, 1fr); }
        body.sidebar-collapsed .sidebar { padding-inline: .75rem; overflow-x: hidden; }
        body.sidebar-collapsed .brand { justify-content: center; gap: 0; margin-bottom: 1.5rem; }
        body.sidebar-collapsed .brand span,
        body.sidebar-collapsed .nurse-mini > div:last-child,
        body.sidebar-collapsed .shift-card,
        body.sidebar-collapsed .sidebar-collapse span { display: none; }
        body.sidebar-collapsed .brand img,
        body.sidebar-collapsed .avatar { width: 48px; height: 48px; }
        body.sidebar-collapsed .nurse-mini { grid-template-columns: 1fr; justify-items: center; margin-bottom: 1rem; }
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
        body.sidebar-collapsed .logout-link { margin-top: 2rem; }

        .main {
            min-width: 0;
            padding: 1.4rem 1.65rem 1rem;
        }

        .topbar {
            display: grid;
            grid-template-columns: minmax(320px, 1fr) auto auto;
            align-items: start;
            gap: 1.3rem;
            margin-bottom: 1.45rem;
        }

        .page-title h1 {
            margin: 0 0 .65rem;
            font-size: clamp(1.8rem, 2.4vw, 2.45rem);
            font-weight: 950;
        }

        .page-title p {
            margin: 0;
            color: #34426f;
            font-size: .98rem;
        }

        .bell {
            position: relative;
            display: grid;
            place-items: center;
            width: 46px;
            height: 50px;
            border: 0;
            color: #172447;
            background: transparent;
            font-size: 1.72rem;
        }

        .bell span {
            position: absolute;
            top: 0;
            right: .08rem;
            display: grid;
            place-items: center;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            color: #fff;
            background: var(--green);
            font-size: .78rem;
            font-weight: 950;
        }

        .date-box {
            min-width: 140px;
            padding-top: .35rem;
            text-align: right;
        }

        .date-box strong {
            display: block;
            color: #111;
            font-weight: 950;
        }

        .date-box span {
            color: #34426f;
            font-size: .93rem;
        }

        .followup-layout {
            display: grid;
            grid-template-columns: 460px minmax(0, 1fr) 350px;
            gap: 1rem;
            align-items: start;
        }

        .panel {
            border: 1px solid var(--line);
            border-radius: 10px;
            background: #fff;
            box-shadow: var(--shadow);
        }

        .list-panel {
            display: grid;
            gap: .9rem;
            padding: .9rem;
        }

        .search-row {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 100px;
            gap: .7rem;
        }

        .search-box { position: relative; }

        .search-box input {
            width: 100%;
            height: 44px;
            padding: 0 2.7rem 0 1rem;
            border: 1px solid #d7e0ee;
            border-radius: 7px;
            color: var(--ink);
            background: #fff;
            outline: none;
        }

        .search-box i {
            position: absolute;
            top: 50%;
            right: .9rem;
            color: #6370a6;
            font-size: 1.25rem;
            transform: translateY(-50%);
        }

        .filter-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: .5rem;
            border: 1px solid #d7e0ee;
            border-radius: 7px;
            color: #172447;
            background: #fff;
            font-weight: 950;
        }

        .tabs {
            display: flex;
            gap: 1.25rem;
            border-bottom: 1px solid var(--line);
            overflow-x: auto;
        }

        .tab {
            min-height: 42px;
            border-bottom: 3px solid transparent;
            color: #172447;
            font-size: .85rem;
            font-weight: 950;
            white-space: nowrap;
        }

        .tab.active {
            color: var(--green-dark);
            border-bottom-color: var(--green);
        }

        .request-list {
            display: grid;
            gap: .55rem;
        }

        .request-card {
            display: grid;
            grid-template-columns: 62px minmax(0, 1fr) auto;
            gap: .8rem;
            padding: .9rem;
            border: 1px solid var(--line);
            border-radius: 8px;
            background: #fff;
        }

        .request-card.active {
            border-color: #83d7a0;
            background: linear-gradient(135deg, #f5fff8, #fff);
        }

        .request-card strong {
            display: block;
            font-weight: 950;
        }

        .request-card p,
        .request-card .id,
        .request-meta {
            margin: .18rem 0 0;
            color: #34426f;
            font-size: .82rem;
        }

        .reason b { color: #172447; }

        .list-footer {
            display: flex;
            justify-content: space-between;
            gap: 1rem;
            color: #34426f;
            font-size: .84rem;
        }

        .refresh-link {
            display: inline-flex;
            align-items: center;
            gap: .45rem;
            color: #172447;
            font-weight: 950;
        }

        .tag {
            display: inline-grid;
            place-items: center;
            min-width: 74px;
            padding: .28rem .55rem;
            border: 1px solid;
            border-radius: 6px;
            font-size: .72rem;
            font-weight: 950;
            text-align: center;
            line-height: 1.08;
        }

        .tag small { display: block; font-size: .62rem; }
        .urgent { color: #f06d00; border-color: #ffc98f; background: #fff4e8; }
        .moderate { color: #d76b00; border-color: #ffd2a0; background: #fff6eb; }
        .nonurgent { color: var(--green-dark); border-color: #a9dfba; background: #f0fbf4; }
        .emergency { color: var(--red); border-color: #ffaaa8; background: #fff3f2; }
        .pending { color: #6f31d8; border-color: #d9c8ff; background: #f5f0ff; }
        .reopened { color: var(--green-dark); border-color: #a9dfba; background: #eefaf3; }
        .declined { color: #4e5b86; border-color: #d7e0ee; background: #f4f6fb; }
        .escalated { color: #d76b00; border-color: #ffd2a0; background: #fff6eb; }

        .detail-panel {
            display: grid;
            gap: 1rem;
            padding: 1rem;
        }

        .patient-head {
            display: grid;
            grid-template-columns: 70px minmax(0, 1fr) auto;
            align-items: center;
            gap: .9rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--line);
        }

        .patient-head h2 {
            margin: 0 0 .25rem;
            font-size: 1.15rem;
            font-weight: 950;
        }

        .patient-head p {
            margin: 0;
            color: #172447;
            font-size: .84rem;
        }

        .notice {
            padding: .8rem 1rem;
            border: 1px solid #afd0ff;
            border-radius: 7px;
            color: #172447;
            background: #f3f8ff;
            font-size: .88rem;
        }

        .section-title {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            margin: .4rem 0 .65rem;
            font-weight: 950;
        }

        .message-box {
            width: min(430px, 100%);
            padding: .95rem 1rem .55rem;
            border: 1px solid #e1e7ef;
            border-radius: 8px;
            background: #fff;
            color: #172447;
            font-size: .9rem;
            line-height: 1.55;
        }

        .message-box time {
            display: block;
            margin-top: .35rem;
            color: #5d697d;
            font-size: .72rem;
            text-align: right;
        }

        .summary-box {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 1rem;
            padding: 1rem;
            border: 1px solid var(--line);
            border-radius: 9px;
            background: #fff;
        }

        .summary-block {
            padding-right: 1rem;
            border-right: 1px solid var(--line);
        }

        .summary-block:nth-child(2n) {
            border-right: 0;
            padding-right: 0;
        }

        .summary-block h3 {
            margin: 0 0 .65rem;
            font-size: .86rem;
            font-weight: 950;
        }

        .summary-block p,
        .summary-block li {
            color: #172447;
            font-size: .85rem;
        }

        .outcome { color: var(--green-dark); font-weight: 950; }

        .timeline {
            display: grid;
            gap: .75rem;
            border-top: 1px solid var(--line);
            padding-top: 1rem;
        }

        .timeline-item {
            display: grid;
            grid-template-columns: 34px minmax(0, 1fr);
            gap: .75rem;
            align-items: start;
            color: #34426f;
            font-size: .84rem;
        }

        .timeline-icon {
            display: grid;
            place-items: center;
            width: 28px;
            height: 28px;
            border-radius: 50%;
            color: #fff;
            background: var(--green);
            font-size: .9rem;
        }

        .timeline-icon.blue { background: var(--blue); }
        .timeline-icon.muted { color: #7c879f; background: #e5eaf2; }

        .right-rail {
            display: grid;
            gap: .9rem;
        }

        .side-panel { padding: 1rem; }

        .side-panel h2 {
            margin: 0 0 .6rem;
            font-size: 1rem;
            font-weight: 950;
        }

        .action-card {
            display: grid;
            grid-template-columns: 42px minmax(0, 1fr);
            gap: .8rem;
            padding: 1rem;
            border: 1px solid;
            border-radius: 8px;
            margin-top: .75rem;
            background: #fff;
        }

        .action-card i { font-size: 1.4rem; }
        .action-card strong { display: block; font-weight: 950; }
        .action-card span { color: #34426f; font-size: .82rem; }
        .action-card.green { color: var(--green-dark); border-color: #9eddb4; background: #f4fff7; }
        .action-card.orange { color: #d76b00; border-color: #ffc98f; background: #fff7ec; }
        .action-card.blue { color: #0d62d9; border-color: #afd0ff; background: #f4f9ff; }
        .action-card.red { color: var(--red); border-color: #ffaaa8; background: #fff6f5; }

        .info-list {
            display: grid;
            gap: .7rem;
            padding-top: .8rem;
            border-top: 1px solid var(--line);
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            gap: 1rem;
            color: #34426f;
            font-size: .84rem;
        }

        .info-row strong {
            color: #071438;
            text-align: right;
        }

        .notes-box {
            width: 100%;
            min-height: 118px;
            padding: .85rem;
            border: 1px solid #d7e0ee;
            border-radius: 8px;
            resize: vertical;
            outline: none;
        }

        .note-count {
            display: block;
            margin-top: .35rem;
            color: #006824;
            text-align: right;
            font-size: .78rem;
        }

        .save-note {
            width: 100%;
            min-height: 40px;
            margin-top: .7rem;
            border: 1px solid #9eddb4;
            border-radius: 7px;
            color: var(--green-dark);
            background: #f4fff7;
            font-weight: 950;
        }

        .security-note {
            display: flex;
            align-items: center;
            gap: .7rem;
            margin-top: .75rem;
            padding: .75rem 1rem;
            border: 1px solid #bdd9ff;
            border-radius: 7px;
            color: #172447;
            background: #f3f8ff;
            font-size: .86rem;
        }

        .menu-toggle,
        .sidebar-overlay { display: none; }

        @media (max-width: 1500px) {
            .followup-layout {
                grid-template-columns: 410px minmax(0, 1fr);
            }

            .right-rail {
                grid-column: 1 / -1;
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
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
                width: min(84vw, 310px);
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
            .topbar,
            .followup-layout,
            .right-rail,
            .summary-box { grid-template-columns: 1fr; }
            .date-box { text-align: left; }
            .patient-head { grid-template-columns: 58px minmax(0, 1fr); }
            .patient-head .tag { grid-column: 1 / -1; width: max-content; }
            .summary-block { border-right: 0; padding-right: 0; border-bottom: 1px solid var(--line); padding-bottom: .8rem; }
            .summary-block:last-child { border-bottom: 0; }
        }
    </style>
</head>
<body>
    <button class="menu-toggle" type="button" aria-label="Open navigation" aria-controls="nurseSidebar" aria-expanded="false">
        <i class="bi bi-list"></i>
    </button>

    <div class="app-shell">
        <aside class="sidebar" id="nurseSidebar">
            <a class="brand" href="dashboard.php">
                <img src="../auth/assets/img/CLSU_Logo.jpg" alt="CLSU logo">
                <span>
                    <strong>CLSU Infirmary</strong>
                    Telemedicine System
                </span>
            </a>

            <div class="nurse-mini">
                <div class="avatar" aria-hidden="true"><i class="bi bi-person-fill"></i></div>
                <div>
                    <h2>Nurse Ana Reyes</h2>
                    <p>Registered Nurse</p>
                    <span class="online">Online</span>
                </div>
            </div>

            <button class="sidebar-collapse" type="button" aria-label="Collapse sidebar" aria-expanded="true">
                <i class="bi bi-layout-sidebar-inset"></i>
                <span>Collapse</span>
            </button>

            <nav aria-label="Nurse navigation">
                <ul class="nav-list">
                    <li><a class="nav-link" href="dashboard.php"><i class="bi bi-house-door"></i> Dashboard</a></li>
                    <li><a class="nav-link" href="consultationinbox.php"><i class="bi bi-inbox"></i> Consultation Inbox <span class="nav-badge">12</span></a></li>
                    <li><a class="nav-link" href="activeconsult.php"><i class="bi bi-chat-dots"></i> Active Consultations <span class="nav-badge">3</span></a></li>
                    <li><a class="nav-link active" href="followup.php"><i class="bi bi-calendar2-check"></i> Follow-up Requests <span class="nav-badge">8</span></a></li>
                    <li><a class="nav-link" href="patientdirect.php"><i class="bi bi-people"></i> Patient Directory</a></li>
                    <li><a class="nav-link" href="consulthistory.php"><i class="bi bi-clock-history"></i> Consultation History</a></li>
                    <li><a class="nav-link" href="notif.php"><i class="bi bi-bell"></i> Notifications <span class="nav-badge">4</span></a></li>
                    <li><a class="nav-link" href="profile.php"><i class="bi bi-person-badge"></i> Profile</a></li>
                </ul>
            </nav>

            <a class="nav-link logout-link" href="../auth/index.php"><i class="bi bi-box-arrow-right"></i> Logout</a>
        </aside>

        <main class="main">
            <header class="topbar">
                <div class="page-title">
                    <h1>Follow-up Requests</h1>
                    <p>Manage patient follow-up or re-engagement requests from completed consultations.</p>
                </div>
                <button class="bell" type="button" aria-label="Notifications"><i class="bi bi-bell"></i><span>3</span></button>
                <div class="date-box"><strong>May 16, 2025</strong><span>Friday, 10:36 AM</span></div>
            </header>

            <div class="followup-layout">
                <section class="panel list-panel" aria-label="Follow-up request list">
                    <div class="search-row">
                        <label class="search-box" aria-label="Search follow-up requests">
                            <input type="search" placeholder="Search patient or ID...">
                            <i class="bi bi-search"></i>
                        </label>
                        <button class="filter-btn" type="button"><i class="bi bi-funnel"></i> Filter</button>
                    </div>

                    <div class="tabs">
                        <span class="tab active">All (6)</span>
                        <span class="tab">Pending Review (4)</span>
                        <span class="tab">Reopened (1)</span>
                        <span class="tab">Declined (1)</span>
                    </div>

                    <div class="request-list">
                        <article class="request-card active">
                            <span class="mini-avatar"><i class="bi bi-person-fill"></i></span>
                            <div>
                                <strong>Maria Dela Cruz</strong>
                                <span class="id">ID: 2025-00123</span>
                                <p class="urgent fw-bold">Level 2 - Urgent</p>
                                <p class="reason"><b>Reason:</b> My fever returned after taking the medication.</p>
                                <p class="request-meta"><i class="bi bi-calendar2-week me-1"></i>Last Consult: May 12, 2025</p>
                            </div>
                            <div class="text-end"><span class="tag pending">Pending Review</span><p class="request-meta mt-5">Today, 09:45 AM</p></div>
                        </article>

                        <article class="request-card">
                            <span class="mini-avatar male"><i class="bi bi-person-fill"></i></span>
                            <div><strong>Juan Miguel Santos</strong><span class="id">ID: 2025-00118</span><p class="moderate fw-bold">Level 3 - Moderate</p><p class="reason"><b>Reason:</b> Cough is getting worse and difficult to sleep.</p><p class="request-meta"><i class="bi bi-calendar2-week me-1"></i>Last Consult: May 10, 2025</p></div>
                            <div class="text-end"><span class="tag pending">Pending Review</span><p class="request-meta mt-5">Yesterday, 04:15 PM</p></div>
                        </article>

                        <article class="request-card">
                            <span class="mini-avatar"><i class="bi bi-person-fill"></i></span>
                            <div><strong>Angela Reyes</strong><span class="id">ID: 2025-00120</span><p class="nonurgent fw-bold">Level 4 - Non-urgent</p><p class="reason"><b>Reason:</b> Follow-up for allergy check.</p><p class="request-meta"><i class="bi bi-calendar2-week me-1"></i>Last Consult: May 14, 2025</p></div>
                            <div class="text-end"><span class="tag reopened">Reopened</span><p class="request-meta mt-5">May 15, 2025, 11:20 AM</p></div>
                        </article>

                        <article class="request-card">
                            <span class="mini-avatar male"><i class="bi bi-person-fill"></i></span>
                            <div><strong>Pedro Garcia</strong><span class="id">ID: 2025-00115</span><p class="emergency fw-bold">Level 1 - Emergency</p><p class="reason"><b>Reason:</b> Still experiencing chest pain.</p><p class="request-meta"><i class="bi bi-calendar2-week me-1"></i>Last Consult: May 11, 2025</p></div>
                            <div class="text-end"><span class="tag escalated">Escalated</span><p class="request-meta mt-5">May 14, 2025, 08:30 PM</p></div>
                        </article>

                        <article class="request-card">
                            <span class="mini-avatar"><i class="bi bi-person-fill"></i></span>
                            <div><strong>Katrina Lopez</strong><span class="id">ID: 2025-00121</span><p class="nonurgent fw-bold">Level 4 - Non-urgent</p><p class="reason"><b>Reason:</b> Need another medical certificate.</p><p class="request-meta"><i class="bi bi-calendar2-week me-1"></i>Last Consult: May 09, 2025</p></div>
                            <div class="text-end"><span class="tag declined">Declined</span><p class="request-meta mt-5">May 13, 2025, 02:10 PM</p></div>
                        </article>

                        <article class="request-card">
                            <span class="mini-avatar male"><i class="bi bi-person-fill"></i></span>
                            <div><strong>Kevin Lopez</strong><span class="id">ID: 2025-00125</span><p class="moderate fw-bold">Level 3 - Moderate</p><p class="reason"><b>Reason:</b> Follow-up for stomach pain.</p><p class="request-meta"><i class="bi bi-calendar2-week me-1"></i>Last Consult: May 12, 2025</p></div>
                            <div class="text-end"><span class="tag pending">Pending Review</span><p class="request-meta mt-5">May 13, 2025, 09:10 PM</p></div>
                        </article>
                    </div>

                    <div class="list-footer"><span>Showing 1 to 6 of 6 requests</span><a class="refresh-link" href="#"><i class="bi bi-arrow-clockwise"></i> Refresh</a></div>
                </section>

                <section class="panel detail-panel" aria-label="Selected follow-up request details">
                    <header class="patient-head">
                        <span class="mini-avatar"><i class="bi bi-person-fill"></i></span>
                        <div><h2>Maria Dela Cruz</h2><p>ID: 2025-00123 &nbsp; &bull; &nbsp; 20 yrs &nbsp; &bull; &nbsp; Female &nbsp; &bull; &nbsp; 0912 345 6789</p></div>
                        <span class="tag pending">Pending Review</span>
                    </header>

                    <div class="notice"><i class="bi bi-info-circle me-2 text-primary"></i>Patient is requesting follow-up for a previously completed consultation.</div>

                    <div>
                        <div class="section-title">Patient Follow-up Message</div>
                        <div class="message-box">Good morning po nurse. My fever returned again last night after taking the medication. I also still have body weakness.<time>Today, 09:45 AM</time></div>
                    </div>

                    <div>
                        <div class="section-title">
                            <span>Previous Consultation Summary (May 12, 2025)</span>
                            <button class="full-assessment" type="button"><i class="bi bi-link-45deg me-1"></i>View Full Consultation</button>
                        </div>
                        <div class="summary-box">
                            <div class="summary-block"><h3>Chief Concern</h3><p>Fever, sore throat, body weakness</p><h3>Triage Level</h3><p class="urgent fw-bold">Level 2 - Urgent</p></div>
                            <div class="summary-block"><h3>Advice / Treatment</h3><ul><li>Paracetamol 500mg every 8 hours</li><li>Drink plenty of fluids</li><li>Rest and monitor temperature</li></ul></div>
                            <div class="summary-block"><h3>Diagnosis / Impression</h3><p>Acute Upper Respiratory Infection</p></div>
                            <div class="summary-block"><h3>Outcome</h3><p class="outcome">Completed</p></div>
                        </div>
                    </div>

                    <div>
                        <div class="section-title">Consultation Timeline</div>
                        <div class="timeline">
                            <div class="timeline-item"><span class="timeline-icon"><i class="bi bi-check-lg"></i></span><div><strong>May 12, 2025 &nbsp; &bull; &nbsp; 10:20 AM</strong><br>Consultation completed by Nurse Ana Reyes</div></div>
                            <div class="timeline-item"><span class="timeline-icon blue"><i class="bi bi-chat-dots"></i></span><div><strong>May 16, 2025 &nbsp; &bull; &nbsp; 09:45 AM</strong><br>Patient requested a follow-up</div></div>
                            <div class="timeline-item"><span class="timeline-icon muted"><i class="bi bi-clock"></i></span><div><strong>May 16, 2025 &nbsp; &bull; &nbsp; 10:28 AM</strong><br>Pending review</div></div>
                        </div>
                    </div>
                </section>

                <aside class="right-rail">
                    <section class="panel side-panel">
                        <h2>Request Actions</h2>
                        <p class="text-muted mb-2">Choose the appropriate action for this follow-up request.</p>
                        <button class="action-card green" type="button"><i class="bi bi-arrow-clockwise"></i><span><strong>Reopen Consultation</strong>Continue the conversation with the patient.</span></button>
                        <button class="action-card orange" type="button"><i class="bi bi-person-plus"></i><span><strong>Escalate to Physician</strong>Forward this request to a physician for further review.</span></button>
                        <button class="action-card blue" type="button"><i class="bi bi-question-circle"></i><span><strong>Request More Information</strong>Ask the patient for additional details before deciding.</span></button>
                        <button class="action-card red" type="button"><i class="bi bi-person-x"></i><span><strong>Decline Request</strong>Decline this follow-up request with reason.</span></button>
                    </section>

                    <section class="panel side-panel">
                        <h2>Request Information</h2>
                        <div class="info-list">
                            <div class="info-row"><span>Follow-up Count</span><strong>1</strong></div>
                            <div class="info-row"><span>Total Consultations</span><strong>1</strong></div>
                            <div class="info-row"><span>Last Consultation</span><strong>May 12, 2025</strong></div>
                            <div class="info-row"><span>Requested At</span><strong>May 16, 2025, 09:45 AM</strong></div>
                            <div class="info-row"><span>Assigned To</span><strong><i class="bi bi-person me-1"></i>Nurse Ana Reyes</strong></div>
                        </div>
                    </section>

                </aside>
            </div>

            <div class="security-note"><i class="bi bi-lock text-primary"></i>Only authorized medical staff can review and manage follow-up requests.</div>
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

        menuToggle.addEventListener("click", () => setSidebar(!document.body.classList.contains("sidebar-open")));

        const setSidebarCollapsed = (isCollapsed) => {
            document.body.classList.toggle("sidebar-collapsed", isCollapsed);
            sidebarCollapse.setAttribute("aria-expanded", String(!isCollapsed));
            sidebarCollapse.setAttribute("aria-label", isCollapsed ? "Expand sidebar" : "Collapse sidebar");
            sidebarCollapse.querySelector("span").textContent = isCollapsed ? "Expand" : "Collapse";
        };

        sidebarCollapse.addEventListener("click", () => setSidebarCollapsed(!document.body.classList.contains("sidebar-collapsed")));
        sidebarOverlay.addEventListener("click", () => setSidebar(false));
        sidebarLinks.forEach((link) => link.addEventListener("click", () => setSidebar(false)));
        document.addEventListener("keydown", (event) => {
            if (event.key === "Escape") setSidebar(false);
        });
    </script>
</body>
</html>
