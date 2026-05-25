<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nurse Dashboard | CLSU Infirmary Telemedicine System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        :root {
            --ink: #071438;
            --muted: #4e5b86;
            --green: #087d32;
            --green-dark: #006824;
            --green-soft: #e9f5e9;
            --blue: #2578e7;
            --blue-soft: #eaf3ff;
            --orange: #ff8a00;
            --orange-soft: #fff0df;
            --purple: #087d32;
            --purple-soft: #efe8ff;
            --red: #f52222;
            --red-soft: #fff0ef;
            --line: #e1e7ef;
            --page: #fbfcfa;
            --shadow: 0 12px 30px rgba(24, 39, 75, .07);
        }

        * {
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            margin: 0;
            color: var(--ink);
            font-family: "Inter", "Segoe UI", system-ui, -apple-system, BlinkMacSystemFont, sans-serif;
            background: radial-gradient(circle at 88% 92%, rgba(255,211,67,.26), transparent 16rem), linear-gradient(180deg, #fbfdfb 0%, #f7faf5 100%);
        }

        a {
            color: inherit;
            text-decoration: none;
        }

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
            background: #fff;
            border-right: 1px solid var(--line);
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
            font-size: 1.42rem;
            font-weight: 950;
            line-height: 1.05;
        }

        .brand span {
            color: #111;
            font-size: 1.05rem;
            font-weight: 800;
        }

        .nurse-mini {
            display: grid;
            grid-template-columns: 64px minmax(0, 1fr);
            align-items: center;
            gap: .9rem;
            margin-bottom: 1.6rem;
        }

        .avatar {
            display: grid;
            place-items: center;
            width: 64px;
            height: 64px;
            border-radius: 50%;
            border: 1px solid #d4dbe7;
            color: #fff;
            background: linear-gradient(135deg, #d29a82 0%, #4a4865 100%);
            font-size: 1.85rem;
            overflow: hidden;
        }

        .avatar i {
            color: #fff;
        }

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

        .nav-link.active i {
            color: var(--green);
        }

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

        .logout-link {
            margin-top: 1.2rem;
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

        body.sidebar-collapsed .app-shell {
            grid-template-columns: 88px minmax(0, 1fr);
        }

        body.sidebar-collapsed .sidebar {
            padding-inline: .75rem;
            overflow-x: hidden;
        }

        body.sidebar-collapsed .brand {
            justify-content: center;
            gap: 0;
            margin-bottom: 1.5rem;
        }

        body.sidebar-collapsed .brand span,
        body.sidebar-collapsed .nurse-mini > div:last-child,
        body.sidebar-collapsed .sidebar-collapse span {
            display: none;
        }

        body.sidebar-collapsed .brand img,
        body.sidebar-collapsed .avatar {
            width: 48px;
            height: 48px;
        }

        body.sidebar-collapsed .nurse-mini {
            grid-template-columns: 1fr;
            justify-items: center;
            margin-bottom: 1rem;
        }

        body.sidebar-collapsed .sidebar-collapse {
            width: 48px;
            margin-inline: auto;
        }

        body.sidebar-collapsed .nav-link {
            justify-content: center;
            gap: 0;
            padding-inline: .6rem;
            font-size: 0;
        }

        body.sidebar-collapsed .nav-link i {
            width: auto;
            font-size: 1.45rem;
        }

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

        body.sidebar-collapsed .logout-link {
            margin-top: 2rem;
        }

        .main {
            min-width: 0;
            padding: 1.35rem 1.75rem 1rem;
        }

        .topbar {
            display: grid;
            grid-template-columns: minmax(300px, 1fr) minmax(320px, 420px) auto auto;
            align-items: start;
            gap: 1.35rem;
            margin-bottom: 1.45rem;
        }

        .page-title h1 {
            margin: 0 0 1.35rem;
            font-size: clamp(1.75rem, 2.2vw, 2.45rem);
            font-weight: 950;
            letter-spacing: 0;
        }

        .page-title h2 {
            margin: 0 0 .52rem;
            font-size: 1.15rem;
            font-weight: 950;
        }

        .page-title p {
            margin: 0;
            color: #34426f;
            font-size: .98rem;
        }

        .search-box {
            position: relative;
            margin-top: .15rem;
        }

        .search-box input {
            width: 100%;
            height: 50px;
            padding: 0 1.1rem 0 3.5rem;
            border: 1px solid #cfd8ea;
            border-radius: 10px;
            color: var(--ink);
            background: #fff;
            outline: none;
            box-shadow: 0 8px 20px rgba(24, 39, 75, .04);
        }

        .search-box i {
            position: absolute;
            top: 50%;
            left: 1.12rem;
            color: #6370a6;
            font-size: 1.45rem;
            transform: translateY(-50%);
        }

        .search-box {
            position: relative;
            margin-top: .15rem;
        }

        .search-box input {
            width: 100%;
            height: 50px;
            padding: 0 1.1rem 0 3.5rem;
            border: 1px solid #cfd8ea;
            border-radius: 10px;
            color: var(--ink);
            background: #fff;
            outline: none;
            box-shadow: 0 8px 20px rgba(24, 39, 75, .04);
        }

        .search-box i {
            position: absolute;
            top: 50%;
            left: 1.12rem;
            color: #6370a6;
            font-size: 1.45rem;
            transform: translateY(-50%);
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

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(5, minmax(150px, 1fr));
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .stat-card,
        .panel {
            border: 1px solid var(--line);
            border-radius: 10px;
            background: #fff;
            box-shadow: var(--shadow);
        }

        .stat-card {
            display: grid;
            grid-template-columns: 64px minmax(0, 1fr);
            align-items: center;
            gap: 1rem;
            min-height: 116px;
            padding: 1rem 1.25rem;
        }

        .stat-icon {
            display: grid;
            place-items: center;
            width: 62px;
            height: 62px;
            border-radius: 10px;
            color: #fff;
            background: linear-gradient(180deg, #3ccb75, #0a8c3b);
            font-size: 2rem;
        }

        .stat-card.red .stat-icon {
            color: #fff;
            background: linear-gradient(180deg, #ff8080, #f33434);
        }

        .stat-card.orange .stat-icon {
            color: #fff;
            background: linear-gradient(180deg, #ffb25a, #ff8500);
        }

        .stat-card.purple .stat-icon {
            color: #fff;
            background: linear-gradient(180deg, #9e75ff, #7041ee);
        }

        .stat-card.blue .stat-icon {
            color: #fff;
            background: linear-gradient(180deg, #79b8ff, #3384ee);
        }

        .stat-value {
            display: block;
            margin-bottom: .2rem;
            font-size: 1.75rem;
            font-weight: 950;
            line-height: 1;
        }

        .stat-label {
            display: block;
            margin-bottom: .55rem;
            color: #172447;
            font-size: .92rem;
            font-weight: 750;
        }

        .stat-note {
            display: inline-flex;
            align-items: center;
            gap: .35rem;
            color: var(--green);
            font-size: .86rem;
            font-weight: 900;
        }

        .stat-note.orange {
            color: #f06d00;
        }

        .stat-note.red {
            color: var(--red);
        }

        .stat-note.purple {
            color: var(--purple);
        }

        .content-grid {
            display: grid;
            grid-template-columns: minmax(0, 1fr) minmax(360px, 530px);
            gap: 1rem;
        }

        .stack {
            display: grid;
            gap: 1rem;
            min-width: 0;
        }

        .panel {
            padding: 1.15rem 1.25rem;
            min-width: 0;
        }

        .section-title {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            margin-bottom: .85rem;
        }

        .section-title h2 {
            margin: 0;
            font-size: 1.08rem;
            font-weight: 950;
        }

        .view-all {
            color: var(--green-dark);
            font-size: .86rem;
            font-weight: 950;
            white-space: nowrap;
        }

        .request-table-wrap {
            overflow-x: auto;
        }

        .request-table {
            width: 100%;
            min-width: 760px;
            border-collapse: separate;
            border-spacing: 0;
        }

        .request-table th {
            padding: .65rem .6rem;
            color: var(--green-dark);
            background: linear-gradient(180deg, #f0fbf4, #e9f5e9);
            font-size: .78rem;
            font-weight: 950;
        }

        .request-table th:first-child {
            border-radius: 8px 0 0 8px;
        }

        .request-table th:last-child {
            border-radius: 0 8px 8px 0;
        }

        .request-table td {
            padding: .72rem .6rem;
            border-bottom: 1px solid #edf1f7;
            color: #142044;
            font-size: .86rem;
            vertical-align: middle;
        }

        .patient-cell {
            display: grid;
            grid-template-columns: 36px minmax(0, 1fr);
            align-items: center;
            gap: .65rem;
        }

        .mini-avatar {
            display: grid;
            place-items: center;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            color: #fff;
            background: linear-gradient(145deg, #f0b08f, #39415d);
            font-size: 1rem;
            overflow: hidden;
        }

        .mini-avatar.female {
            background: linear-gradient(145deg, #f3b79b, #253055);
        }

        .patient-cell strong {
            display: block;
            font-size: .86rem;
            font-weight: 950;
        }

        .patient-cell span {
            color: #2d405f;
            font-size: .8rem;
        }

        .type-cell {
            display: grid;
            grid-template-columns: 24px minmax(0, 1fr);
            align-items: center;
            gap: .45rem;
        }

        .type-icon {
            display: grid;
            place-items: center;
            width: 24px;
            height: 24px;
            border-radius: 6px;
            color: var(--green);
            background: #ddf8e7;
            font-size: .86rem;
        }

        .urgency {
            display: inline-grid;
            place-items: center;
            min-width: 62px;
            padding: .22rem .5rem;
            border-radius: 6px;
            border: 1px solid;
            font-size: .72rem;
            font-weight: 950;
            line-height: 1.05;
            text-align: center;
        }

        .urgency small {
            display: block;
            font-size: .64rem;
            font-weight: 950;
        }

        .urgency.emergency {
            color: var(--red);
            border-color: #ffb6b6;
            background: #fff2f1;
        }

        .urgency.urgent {
            color: #f06d00;
            border-color: #ffc98f;
            background: #fff4e8;
        }

        .urgency.moderate {
            color: #c87900;
            border-color: #ffd58b;
            background: #fff7e5;
        }

        .urgency.nonurgent {
            color: var(--blue);
            border-color: #b9d7ff;
            background: #eef6ff;
        }

        .btn-review {
            min-width: 70px;
            min-height: 34px;
            border: 1px solid #36bd6b;
            border-radius: 7px;
            color: var(--green-dark);
            background: #fff;
            font-size: .82rem;
            font-weight: 950;
        }

        .action-cell {
            display: flex;
            align-items: center;
            gap: .55rem;
        }

        .more-action {
            display: grid;
            place-items: center;
            width: 24px;
            height: 34px;
            border: 0;
            color: #5d697d;
            background: transparent;
            font-size: 1.05rem;
        }

        .table-footer-link {
            display: inline-flex;
            align-items: center;
            gap: .5rem;
            margin-top: .65rem;
            color: var(--green-dark);
            font-weight: 950;
            font-size: .88rem;
        }

        .notifications {
            display: grid;
            gap: .1rem;
        }

        .notification-row {
            display: grid;
            grid-template-columns: 34px minmax(0, 1fr) 10px;
            align-items: center;
            gap: .7rem;
            min-height: 40px;
            border-bottom: 1px solid #edf1f7;
        }

        .notification-row:last-child {
            border-bottom: 0;
        }

        .notif-icon {
            display: grid;
            place-items: center;
            width: 30px;
            height: 30px;
            border-radius: 7px;
            color: #fff;
            background: var(--green);
            font-size: 1rem;
        }

        .notif-icon.orange {
            background: var(--orange);
        }

        .notif-icon.purple {
            background: var(--purple);
        }

        .notification-row strong {
            display: block;
            font-size: .84rem;
        }

        .notification-row span {
            color: #4e5b86;
            font-size: .78rem;
        }

        .unread-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: var(--green);
        }

        .urgent-list {
            display: grid;
            gap: .62rem;
        }

        .urgent-item {
            display: grid;
            grid-template-columns: 40px minmax(0, 1fr) auto;
            align-items: center;
            gap: .75rem;
            min-height: 58px;
            padding: .55rem .8rem;
            border: 1px solid #ffd4d1;
            border-left: 4px solid var(--red);
            border-radius: 8px;
            background: linear-gradient(90deg, #fff6f5, #fff);
        }

        .urgent-item strong {
            display: block;
            font-size: .86rem;
            font-weight: 950;
        }

        .urgent-item p {
            margin: 0;
            color: #26335f;
            font-size: .82rem;
        }

        .urgent-time {
            text-align: right;
            color: #162142;
            font-size: .82rem;
        }

        .urgent-time strong {
            color: var(--red);
            font-size: .78rem;
        }

        .support-card {
            display: grid;
            grid-template-columns: 82px minmax(0, 1fr);
            align-items: center;
            gap: 1.1rem;
            border-color: #cfe8d8;
            background: linear-gradient(135deg, #f5fff8, #ecf8f0);
        }

        .support-icon {
            display: grid;
            place-items: center;
            width: 76px;
            height: 76px;
            border-radius: 50%;
            color: var(--green);
            background: #d8f5e1;
            font-size: 2.4rem;
        }

        .support-card h2 {
            margin: 0 0 .35rem;
            color: var(--green-dark);
            font-size: 1.02rem;
            font-weight: 950;
        }

        .support-card p {
            margin: 0 0 .7rem;
            color: #34426f;
            font-size: .9rem;
            line-height: 1.45;
        }

        .btn-soft {
            min-height: 32px;
            padding: .25rem 1.25rem;
            border: 1px solid #88d4a0;
            border-radius: 7px;
            color: var(--green-dark);
            background: #f8fffa;
            font-size: .84rem;
            font-weight: 950;
        }

        .quick-actions {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: .75rem;
        }

        .quick-btn {
            display: grid;
            place-items: center;
            min-height: 62px;
            padding: .55rem .35rem;
            border: 1px solid #dde5f2;
            border-radius: 9px;
            color: var(--ink);
            background: #fff;
            text-align: center;
            font-size: .72rem;
            font-weight: 850;
        }

        .quick-btn i {
            margin-bottom: .25rem;
            color: var(--green);
            font-size: 1.45rem;
        }

        .quick-btn.blue i {
            color: var(--blue);
        }

        .quick-btn.purple i {
            color: var(--purple);
        }

        .urgency-legend {
            display: flex;
            align-items: center;
            gap: 1.8rem;
            margin-top: .8rem;
            padding: .55rem 1rem;
            border: 1px solid var(--line);
            border-radius: 8px;
            background: #fff;
            color: #172447;
            box-shadow: 0 8px 18px rgba(24, 39, 75, .04);
            font-size: .78rem;
            font-weight: 850;
            overflow-x: auto;
            white-space: nowrap;
        }

        .urgency-legend strong {
            color: #071438;
            font-weight: 950;
        }

        .legend-item {
            display: inline-flex;
            align-items: center;
            gap: .45rem;
        }

        .legend-item i {
            font-size: .9rem;
        }

        .legend-item.emergency i {
            color: var(--red);
        }

        .legend-item.urgent i {
            color: var(--orange);
        }

        .legend-item.moderate i {
            color: #d99700;
        }

        .legend-item.nonurgent i {
            color: var(--blue);
        }

        .menu-toggle,
        .sidebar-overlay {
            display: none;
        }

        @media (max-width: 1500px) {
            .stats-grid {
                grid-template-columns: repeat(3, minmax(190px, 1fr));
            }

            .content-grid {
                grid-template-columns: 1fr;
            }

            .right-stack {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .urgent-panel,
            .quick-panel {
                grid-column: 1 / -1;
            }
        }

        @media (max-width: 1180px) {
            .app-shell {
                grid-template-columns: 1fr;
            }

            body.sidebar-collapsed .app-shell {
                grid-template-columns: 1fr;
            }

            .sidebar-collapse {
                display: none;
            }

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

            body.sidebar-open .sidebar {
                transform: translateX(0);
            }

            .main {
                padding-top: 5rem;
            }
        }

        @media (max-width: 900px) {
            .main {
                padding-inline: 1rem;
            }

            .topbar {
                grid-template-columns: 1fr;
            }

            .date-box {
                text-align: left;
            }

            .stats-grid,
            .right-stack {
                grid-template-columns: 1fr;
            }

            .support-card {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 560px) {
            .main {
                padding-inline: .75rem;
            }

            .panel,
            .stat-card {
                padding: .9rem;
            }

            .stat-card,
            .urgent-item {
                grid-template-columns: 1fr;
            }

            .urgent-time {
                text-align: left;
            }

            .quick-actions {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
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
                    <li><a class="nav-link active" href="dashboard.php"><i class="bi bi-house-door"></i> Dashboard</a></li>
                    <li><a class="nav-link" href="consultationinbox.php"><i class="bi bi-inbox"></i> Consultation Inbox <span class="nav-badge">12</span></a></li>
                    <li><a class="nav-link" href="activeconsult.php"><i class="bi bi-chat-dots"></i> Active Consultations <span class="nav-badge">3</span></a></li>
                    <li><a class="nav-link" href="followup.php"><i class="bi bi-calendar2-check"></i> Follow-up Requests <span class="nav-badge">8</span></a></li>
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
                    <h1>Nurse Dashboard</h1>
                    <h2>Good morning, Nurse Ana! <span aria-hidden="true">&#128075;</span></h2>
                    <p>Here's what's happening with today's consultations.</p>
                </div>

                <label class="search-box" aria-label="Search patients and requests">
                    <i class="bi bi-search"></i>
                    <input type="search" placeholder="Search patients, requests...">
                </label>

                <button class="bell" type="button" aria-label="Notifications">
                    <i class="bi bi-bell"></i>
                    <span>4</span>
                </button>

                <div class="date-box" aria-label="Current date and time">
                    <strong>May 16, 2025</strong>
                    <span>Friday, 10:36 AM</span>
                </div>
            </header>

            <section class="stats-grid" aria-label="Dashboard summary">
                <article class="stat-card">
                    <span class="stat-icon"><i class="bi bi-clipboard2-pulse"></i></span>
                    <div>
                        <span class="stat-value">12</span>
                        <span class="stat-label">Pending Requests</span>
                        <span class="stat-note"><i class="bi bi-arrow-up"></i> 3 new</span>
                    </div>
                </article>

                <article class="stat-card red">
                    <span class="stat-icon"><i class="bi bi-exclamation-triangle"></i></span>
                    <div>
                        <span class="stat-value">3</span>
                        <span class="stat-label">Urgent Cases</span>
                        <a class="stat-note red" href="triagereview.php">View now <i class="bi bi-arrow-right"></i></a>
                    </div>
                </article>

                <article class="stat-card">
                    <span class="stat-icon"><i class="bi bi-chat-heart"></i></span>
                    <div>
                        <span class="stat-value">3</span>
                        <span class="stat-label">Ongoing Consultations</span>
                        <span class="stat-note">In progress</span>
                    </div>
                </article>

                <article class="stat-card purple">
                    <span class="stat-icon"><i class="bi bi-calendar2-check"></i></span>
                    <div>
                        <span class="stat-value">8</span>
                        <span class="stat-label">Follow-ups Today</span>
                        <a class="stat-note purple" href="followup.php">View all <i class="bi bi-arrow-right"></i></a>
                    </div>
                </article>

                <article class="stat-card blue">
                    <span class="stat-icon"><i class="bi bi-people"></i></span>
                    <div>
                        <span class="stat-value">18</span>
                        <span class="stat-label">Total Consultations</span>
                        <span class="stat-note text-dark">Today</span>
                    </div>
                </article>
            </section>

            <div class="content-grid">
                <div class="stack">
                    <section class="panel" aria-labelledby="inbox-title">
                        <div class="section-title">
                            <h2 id="inbox-title">Consultation Inbox</h2>
                            <a class="view-all" href="consultationinbox.php">View All</a>
                        </div>

                        <div class="request-table-wrap">
                            <table class="request-table">
                                <thead>
                                    <tr>
                                        <th>Patient</th>
                                        <th>Type</th>
                                        <th>Symptoms</th>
                                        <th>Urgency</th>
                                        <th>Submitted</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="patient-cell">
                                                <span class="mini-avatar female"><i class="bi bi-person-fill"></i></span>
                                                <div><strong>Maria Dela Cruz</strong><span>BSIT - 3A</span></div>
                                            </div>
                                        </td>
                                        <td>General<br>Consultation</td>
                                        <td>Headache, sore throat,<br>cough</td>
                                        <td><span class="urgency emergency">Level 1<small>Emergency</small></span></td>
                                        <td>10:20 AM<br>May 16, 2025</td>
                                        <td><div class="action-cell"><button class="btn-review" type="button">Review</button><button class="more-action" type="button" aria-label="More actions"><i class="bi bi-three-dots-vertical"></i></button></div></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="patient-cell">
                                                <span class="mini-avatar"><i class="bi bi-person-fill"></i></span>
                                                <div><strong>John Miguel Santos</strong><span>BSA - 2B</span></div>
                                            </div>
                                        </td>
                                        <td>General<br>Consultation</td>
                                        <td>Fever, body pain,<br>fatigue</td>
                                        <td><span class="urgency urgent">Level 2<small>Urgent</small></span></td>
                                        <td>10:15 AM<br>May 16, 2025</td>
                                        <td><div class="action-cell"><button class="btn-review" type="button">Review</button></div></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="patient-cell">
                                                <span class="mini-avatar female"><i class="bi bi-person-fill"></i></span>
                                                <div><strong>Kyla Marie Ramos</strong><span>BSN - 1A</span></div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="type-cell">
                                                <span class="type-icon"><i class="bi bi-person"></i></span>
                                                <span>General<br>Consultation</span>
                                            </div>
                                        </td>
                                        <td>Dizziness, mild fever,<br>body weakness</td>
                                        <td><span class="urgency moderate">Level 3<small>Moderate</small></span></td>
                                        <td>10:05 AM<br>May 16, 2025</td>
                                        <td><div class="action-cell"><button class="btn-review" type="button">Review</button></div></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="patient-cell">
                                                <span class="mini-avatar"><i class="bi bi-person-fill"></i></span>
                                                <div><strong>Mark Joseph Lim</strong><span>BSCE - 4A</span></div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="type-cell">
                                                <span class="type-icon"><i class="bi bi-person"></i></span>
                                                <span>General<br>Consultation</span>
                                            </div>
                                        </td>
                                        <td>Stomach pain,<br>nausea</td>
                                        <td><span class="urgency nonurgent">Level 4<small>Non-urgent</small></span></td>
                                        <td>09:58 AM<br>May 16, 2025</td>
                                        <td><div class="action-cell"><button class="btn-review" type="button">Review</button></div></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="patient-cell">
                                                <span class="mini-avatar female"><i class="bi bi-person-fill"></i></span>
                                                <div><strong>Ella Mae Garcia</strong><span>BSA - 3A</span></div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="type-cell">
                                                <span class="type-icon"><i class="bi bi-person"></i></span>
                                                <span>General<br>Consultation</span>
                                            </div>
                                        </td>
                                        <td>Allergy, skin<br>irritation</td>
                                        <td><span class="urgency nonurgent">Level 4<small>Non-urgent</small></span></td>
                                        <td>09:45 AM<br>May 16, 2025</td>
                                        <td><div class="action-cell"><button class="btn-review" type="button">Review</button></div></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="text-center">
                            <a class="table-footer-link" href="consultationinbox.php">View all requests <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </section>

                    <section class="panel" aria-labelledby="notifications-title">
                        <div class="section-title">
                            <h2 id="notifications-title">Recent Notifications</h2>
                            <a class="view-all" href="notif.php">View All</a>
                        </div>

                        <div class="notifications">
                            <div class="notification-row">
                                <span class="notif-icon"><i class="bi bi-chat-dots"></i></span>
                                <div><strong>New consultation request from Maria Dela Cruz</strong><span>10:20 AM&nbsp;&nbsp;&bull;&nbsp;&nbsp;May 16, 2025</span></div>
                                <span class="unread-dot"></span>
                            </div>
                            <div class="notification-row">
                                <span class="notif-icon orange"><i class="bi bi-exclamation-triangle"></i></span>
                                <div><strong>Urgent case detected: John Miguel Santos</strong><span>10:15 AM&nbsp;&nbsp;&bull;&nbsp;&nbsp;May 16, 2025</span></div>
                                <span class="unread-dot"></span>
                            </div>
                            <div class="notification-row">
                                <span class="notif-icon"><i class="bi bi-check2"></i></span>
                                <div><strong>Dr. Maria Santos accepted escalation from Nurse Ana</strong><span>09:55 AM&nbsp;&nbsp;&bull;&nbsp;&nbsp;May 16, 2025</span></div>
                                <span class="unread-dot"></span>
                            </div>
                            <div class="notification-row">
                                <span class="notif-icon purple"><i class="bi bi-calendar2-week"></i></span>
                                <div><strong>Patient requested follow-up: Kyle John Peralta</strong><span>09:30 AM&nbsp;&nbsp;&bull;&nbsp;&nbsp;May 16, 2025</span></div>
                                <span class="unread-dot"></span>
                            </div>
                        </div>
                    </section>
                </div>

                <div class="stack right-stack">
                    <section class="panel urgent-panel" aria-labelledby="urgent-title">
                        <div class="section-title">
                            <h2 id="urgent-title">Urgent Cases</h2>
                            <a class="view-all" href="triagereview.php">View All</a>
                        </div>

                        <div class="urgent-list">
                            <article class="urgent-item">
                                <span class="mini-avatar"><i class="bi bi-person-fill"></i></span>
                                <div><strong>John Miguel Santos</strong><p>Fever, body pain, fatigue</p></div>
                                <div class="urgent-time">10:15 AM<br><strong>Level 1</strong></div>
                            </article>
                            <article class="urgent-item">
                                <span class="mini-avatar female"><i class="bi bi-person-fill"></i></span>
                                <div><strong>Althea Mae Verano</strong><p>Difficulty breathing, chest pain</p></div>
                                <div class="urgent-time">09:50 AM<br><strong>Level 1</strong></div>
                            </article>
                            <article class="urgent-item">
                                <span class="mini-avatar"><i class="bi bi-person-fill"></i></span>
                                <div><strong>Reymart Padilla</strong><p>Severe stomach pain, vomiting</p></div>
                                <div class="urgent-time">09:35 AM<br><strong>Level 2</strong></div>
                            </article>
                        </div>
                    </section>

                    <section class="panel support-card" aria-labelledby="support-title">
                        <span class="support-icon"><i class="bi bi-headset"></i></span>
                        <div>
                            <h2 id="support-title">We're here for you!</h2>
                            <p>If you need immediate assistance, please contact our support team.</p>
                            <a class="btn btn-soft" href="#">Help &amp; Support</a>
                        </div>
                    </section>

                    <section class="panel quick-panel" aria-labelledby="quick-actions-title">
                        <div class="section-title">
                            <h2 id="quick-actions-title">Quick Actions</h2>
                        </div>

                        <div class="quick-actions">
                            <a class="quick-btn" href="consultationinbox.php"><i class="bi bi-chat-heart"></i> Review Request</a>
                            <a class="quick-btn blue" href="activeconsult.php"><i class="bi bi-chat-dots-fill"></i> Start Consultation</a>
                            <a class="quick-btn purple" href="triagereview.php"><i class="bi bi-people"></i> Escalate to Physician</a>
                            <a class="quick-btn blue" href="followup.php"><i class="bi bi-bell"></i> Send Reminder</a>
                        </div>
                    </section>
                </div>
            </div>

            <div class="urgency-legend" aria-label="Urgency legend">
                <strong>Urgency Legend:</strong>
                <span class="legend-item emergency"><i class="bi bi-exclamation-triangle-fill"></i> Level 1 - Emergency</span>
                <span class="legend-item urgent"><i class="bi bi-exclamation-triangle-fill"></i> Level 2 - Urgent</span>
                <span class="legend-item moderate"><i class="bi bi-person"></i> Level 3 - Moderate</span>
                <span class="legend-item nonurgent"><i class="bi bi-person"></i> Level 4 - Non-urgent</span>
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
    </script>
</body>
</html>
