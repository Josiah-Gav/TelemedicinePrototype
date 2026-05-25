<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administrator Dashboard | CLSU Telemedicine</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        :root {
            --ink: #0c172a;
            --muted: #4d5a70;
            --green: #0f8f4a;
            --green-dark: #003d20;
            --green-deep: #002f1d;
            --green-soft: #e8f6ee;
            --blue: #2f80ed;
            --blue-soft: #eaf3ff;
            --orange: #f39a18;
            --orange-soft: #fff4df;
            --purple: #7661d8;
            --purple-soft: #f0edff;
            --red: #f54b43;
            --line: #dfe6ee;
            --page: #f8faf8;
            --shadow: 0 14px 34px rgba(15, 23, 42, .07);
        }

        * {
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            margin: 0;
            color: var(--ink);
            font-family: "Inter", "Segoe UI", system-ui, -apple-system, BlinkMacSystemFont, sans-serif;
            background:
                radial-gradient(circle at 84% 0, rgba(15, 143, 74, .08), transparent 24rem),
                linear-gradient(180deg, #fbfcfb 0%, #f5f8f5 100%);
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button,
        input,
        select {
            font: inherit;
        }

        .app-shell {
            display: grid;
            grid-template-columns: 290px minmax(0, 1fr);
            min-height: 100vh;
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
            color: #111;
            font-size: 1.42rem;
            font-weight: 950;
            line-height: 1.05;
            letter-spacing: 0;
        }

        .brand span {
            display: block;
            color: #111;
            font-size: 1.05rem;
            font-weight: 800;
        }

        .admin-mini {
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

        .admin-mini h2 {
            margin: 0 0 .18rem;
            font-size: 1rem;
            font-weight: 950;
        }

        .admin-mini p {
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
            cursor: pointer;
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
        body.sidebar-collapsed .admin-mini > div:last-child,
        body.sidebar-collapsed .sidebar-collapse span {
            display: none;
        }

        body.sidebar-collapsed .brand img,
        body.sidebar-collapsed .avatar {
            width: 48px;
            height: 48px;
        }

        body.sidebar-collapsed .admin-mini {
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

        body.sidebar-collapsed .logout-link {
            margin-top: 2rem;
        }

        .side-nav {
            display: grid;
            gap: .45rem;
            margin: 0;
            padding: 0 0 1.4rem;
            border-bottom: 1px solid var(--line);
            list-style: none;
        }

        .nav-link {
            position: relative;
            display: flex;
            align-items: center;
            gap: 1rem;
            min-height: 56px;
            padding: .8rem .95rem;
            border-radius: 10px;
            color: #1d293f;
            font-weight: 850;
        }

        .nav-link::before {
            content: "";
            position: absolute;
            left: -1.25rem;
            width: 8px;
            height: 44px;
            border-radius: 0 8px 8px 0;
            background: transparent;
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

        .nav-link.active::before {
            background: var(--green);
        }

        .nav-link.active i {
            color: var(--green);
        }

        .logout-link {
            margin-top: 1.2rem;
        }

        .main {
            min-width: 0;
            padding: 1.55rem 1.8rem 1.35rem;
        }

        .topbar {
            display: grid;
            grid-template-columns: minmax(360px, 1fr) minmax(260px, 320px) auto auto;
            align-items: center;
            gap: 1.45rem;
            margin-bottom: 1.55rem;
        }

        .page-title h1 {
            margin: 0 0 .1rem;
            color: var(--green-dark);
            font-size: clamp(2rem, 3vw, 3rem);
            font-weight: 950;
            letter-spacing: 0;
        }

        .page-title h2 {
            margin: 0 0 .45rem;
            font-size: 1.35rem;
            font-weight: 950;
        }

        .page-title p {
            margin: 0;
            color: #1f2937;
            font-size: .98rem;
        }

        .search-box {
            position: relative;
        }

        .search-box input {
            width: 100%;
            height: 64px;
            padding: 0 3.8rem 0 1.35rem;
            border: 1px solid #cbd5e1;
            border-radius: 18px;
            color: var(--ink);
            background: #fff;
            box-shadow: 0 10px 24px rgba(15, 23, 42, .035);
            outline: none;
        }

        .search-box i {
            position: absolute;
            top: 50%;
            right: 1.25rem;
            color: #020617;
            font-size: 1.55rem;
            transform: translateY(-50%);
        }

        .bell {
            position: relative;
            display: grid;
            place-items: center;
            width: 44px;
            height: 54px;
            border: 0;
            color: #0f172a;
            background: transparent;
            font-size: 1.85rem;
        }

        .bell span {
            position: absolute;
            top: 2px;
            right: 0;
            display: grid;
            place-items: center;
            min-width: 22px;
            height: 22px;
            padding: 0 .32rem;
            border-radius: 999px;
            color: #fff;
            background: var(--green);
            font-size: .74rem;
            font-weight: 950;
        }

        .admin-menu {
            display: grid;
            grid-template-columns: 54px auto 22px;
            align-items: center;
            gap: .82rem;
            min-width: 236px;
            border: 0;
            color: inherit;
            background: transparent;
            cursor: pointer;
        }

        .admin-menu img {
            width: 54px;
            height: 54px;
            border-radius: 50%;
            border: 1px solid #cbd5e1;
            object-fit: cover;
            background: #fff;
        }

        .admin-menu strong,
        .admin-menu span {
            display: block;
        }

        .admin-menu strong {
            font-size: 1rem;
            font-weight: 950;
        }

        .admin-menu span {
            margin-top: .15rem;
            color: #27364b;
            font-size: .88rem;
        }

        .menu-toggle {
            display: none;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(6, minmax(155px, 1fr));
            gap: .85rem;
            margin-bottom: 1rem;
        }

        .cardx,
        .panel {
            border: 1px solid var(--line);
            border-radius: 10px;
            background: rgba(255, 255, 255, .92);
            box-shadow: var(--shadow);
        }

        .stat-card {
            min-height: 142px;
            padding: 1.05rem 1.18rem .9rem;
        }

        .stat-main {
            display: grid;
            grid-template-columns: 64px minmax(0, 1fr);
            align-items: center;
            gap: .95rem;
            min-height: 82px;
        }

        .icon-box {
            display: grid;
            place-items: center;
            width: 58px;
            height: 58px;
            border-radius: 13px;
            color: var(--green);
            background: var(--green-soft);
            font-size: 2rem;
        }

        .icon-box.blue {
            color: var(--blue);
            background: var(--blue-soft);
        }

        .icon-box.orange {
            color: var(--orange);
            background: var(--orange-soft);
        }

        .icon-box.purple {
            color: var(--purple);
            background: var(--purple-soft);
        }

        .stat-card h3 {
            margin: 0 0 .55rem;
            color: #020617;
            font-size: .78rem;
            font-weight: 950;
        }

        .stat-value {
            display: block;
            font-size: 2rem;
            font-weight: 950;
            line-height: 1;
        }

        .stat-caption {
            display: block;
            margin-top: .62rem;
            color: #27364b;
            font-size: .8rem;
        }

        .trend {
            display: flex;
            align-items: center;
            gap: .45rem;
            margin-top: 1.05rem;
            color: var(--green);
            font-size: .82rem;
            font-weight: 900;
            white-space: nowrap;
        }

        .trend.down {
            color: var(--orange);
        }

        .trend.purple {
            color: var(--purple);
        }

        .trend span {
            color: #1f2937;
            font-weight: 650;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: minmax(500px, 1.05fr) minmax(460px, .95fr);
            gap: 1rem;
        }

        .panel {
            min-width: 0;
            padding: 1.35rem 1.45rem;
        }

        .panel-head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            margin-bottom: 1.15rem;
        }

        .panel-head h2 {
            margin: 0;
            color: var(--green-dark);
            font-size: 1.22rem;
            font-weight: 950;
        }

        .filter-btn {
            display: inline-flex;
            align-items: center;
            gap: .65rem;
            min-height: 44px;
            padding: 0 1rem;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            color: #0f172a;
            background: #fff;
            font-weight: 800;
        }

        .filter-btn i {
            color: var(--green-dark);
        }

        .overview-body {
            display: grid;
            grid-template-columns: 310px minmax(0, 1fr);
            align-items: center;
            gap: 1.65rem;
            min-height: 336px;
        }

        .donut {
            position: relative;
            width: min(100%, 265px);
            aspect-ratio: 1;
            margin: 0 auto;
            border-radius: 50%;
            background: conic-gradient(var(--blue) 0 27.6%, var(--green) 27.6% 72.7%, var(--orange) 72.7% 82.4%, var(--red) 82.4% 87.9%, #59606d 87.9% 100%);
            box-shadow: inset 0 0 0 1px rgba(15, 23, 42, .08);
        }

        .donut::after {
            content: "";
            position: absolute;
            inset: 24%;
            border-radius: 50%;
            background: #fff;
            box-shadow: 0 0 0 1px rgba(15, 23, 42, .04);
        }

        .donut-center {
            position: absolute;
            inset: 32%;
            z-index: 1;
            display: grid;
            place-items: center;
            text-align: center;
        }

        .donut-center span {
            display: block;
            color: #0f172a;
            font-size: .9rem;
            font-weight: 800;
        }

        .donut-center strong {
            display: block;
            margin: .25rem 0 .1rem;
            font-size: 1.8rem;
            font-weight: 950;
        }

        .slice-label {
            position: absolute;
            z-index: 2;
            color: #fff;
            font-size: .92rem;
            font-weight: 950;
        }

        .slice-pending { top: 32%; right: 11%; }
        .slice-active { bottom: 13%; left: 47%; transform: translateX(-50%); }
        .slice-completed { left: 8%; top: 48%; }
        .slice-cancelled { left: 22%; top: 20%; }
        .slice-rejected { top: 10%; left: 47%; }

        .legend-list {
            display: grid;
            gap: .1rem;
        }

        .legend-row,
        .summary-row {
            display: grid;
            align-items: center;
            border-bottom: 1px solid #e6ebf2;
        }

        .legend-row {
            grid-template-columns: 26px minmax(0, 1fr) 68px 84px;
            gap: .55rem;
            min-height: 56px;
            font-size: .95rem;
            font-weight: 860;
        }

        .dot {
            width: 16px;
            height: 16px;
            border-radius: 50%;
            background: var(--green);
        }

        .dot.blue { background: var(--blue); }
        .dot.orange { background: var(--orange); }
        .dot.red { background: var(--red); }
        .dot.gray { background: #59606d; }

        .legend-row em {
            color: #27364b;
            font-style: normal;
            text-align: right;
        }

        .trend-chart {
            min-height: 336px;
        }

        .chart-frame {
            position: relative;
            height: 306px;
            padding: 1rem .4rem .15rem 1.8rem;
        }

        .chart-frame svg {
            display: block;
            width: 100%;
            height: 100%;
            overflow: visible;
        }

        .axis-label {
            fill: #334155;
            font-size: 12px;
        }

        .point-label {
            fill: #020617;
            font-size: 13px;
            font-weight: 800;
        }

        .chart-line {
            fill: none;
            stroke: #17894e;
            stroke-width: 3;
        }

        .chart-fill {
            fill: url(#trendFill);
        }

        .chart-point {
            fill: #17894e;
            stroke: #08713f;
            stroke-width: 1.5;
        }

        .chart-legend {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: .45rem;
            margin-top: -.2rem;
            color: #334155;
            font-size: .9rem;
        }

        .chart-legend::before {
            content: "";
            width: 26px;
            height: 3px;
            border-radius: 999px;
            background: #17894e;
        }

        .quick-panel,
        .summary-panel {
            margin-top: 1rem;
        }

        .quick-actions {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: .9rem;
            margin-bottom: 1.6rem;
        }

        .quick-card {
            display: grid;
            grid-template-columns: 58px minmax(0, 1fr) 18px;
            align-items: center;
            gap: .8rem;
            min-height: 98px;
            padding: .88rem .95rem;
            border: 1px solid #cfe6d9;
            border-radius: 8px;
            background: linear-gradient(135deg, #f8fffb, #eef8f1);
        }

        .quick-card.report {
            border-color: #ead4aa;
            background: linear-gradient(135deg, #fffdf8, #fff4df);
        }

        .quick-card.view {
            border-color: #d7d1f5;
            background: linear-gradient(135deg, #fbfaff, #f1edff);
        }

        .quick-card strong {
            display: block;
            margin-bottom: .25rem;
            font-size: .86rem;
            font-weight: 950;
        }

        .quick-card span {
            display: block;
            color: #1f2937;
            font-size: .72rem;
            line-height: 1.35;
        }

        .quick-card > i:last-child {
            color: #0f172a;
            font-size: 1.05rem;
        }

        .support-strip {
            position: relative;
            display: grid;
            grid-template-columns: 32px minmax(0, 1fr) 112px;
            align-items: center;
            min-height: 66px;
            padding: 0 1rem;
            border-radius: 8px;
            color: #0f172a;
            background: linear-gradient(90deg, #eef8f1, #f7fcf8);
            overflow: hidden;
        }

        .support-strip i {
            color: var(--green-dark);
            font-size: 1.22rem;
        }

        .support-strip::after {
            content: "";
            align-self: stretch;
            background:
                radial-gradient(ellipse at 12% 78%, rgba(15, 143, 74, .22) 0 24%, transparent 25%),
                radial-gradient(ellipse at 48% 58%, rgba(15, 143, 74, .18) 0 24%, transparent 25%),
                radial-gradient(ellipse at 76% 35%, rgba(15, 143, 74, .15) 0 24%, transparent 25%);
        }

        .summary-list {
            display: grid;
            gap: 0;
        }

        .summary-row {
            grid-template-columns: 64px minmax(0, 1fr) auto;
            min-height: 64px;
            padding: .35rem .45rem;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            background: #fff;
            box-shadow: 0 8px 18px rgba(15, 23, 42, .04);
        }

        .summary-row + .summary-row {
            margin-top: .08rem;
        }

        .summary-row strong {
            font-size: .98rem;
            font-weight: 950;
        }

        .summary-row b {
            font-size: 1.45rem;
            font-weight: 950;
        }

        .summary-row small {
            margin-left: .45rem;
            font-size: .78rem;
            font-weight: 860;
        }

        .sidebar-overlay {
            display: none;
        }

        @media (max-width: 1500px) {
            .stats-grid {
                grid-template-columns: repeat(3, minmax(190px, 1fr));
            }

            .dashboard-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 1120px) {
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

            .sidebar {
                position: fixed;
                inset: 0 auto 0 0;
                z-index: 1060;
                width: min(84vw, 310px);
                transform: translateX(-100%);
                transition: transform .24s ease;
            }

            body.sidebar-open .sidebar {
                transform: translateX(0);
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

            .main {
                padding-top: 5rem;
            }

            .topbar {
                grid-template-columns: 1fr minmax(240px, 340px) auto;
            }

            .admin-menu {
                grid-column: 1 / -1;
                justify-self: end;
            }
        }

        @media (max-width: 780px) {
            .main {
                padding-inline: 1rem;
            }

            .topbar,
            .stats-grid,
            .overview-body,
            .quick-actions {
                grid-template-columns: 1fr;
            }

            .bell {
                justify-self: start;
            }

            .admin-menu {
                justify-self: start;
            }

            .panel {
                padding: 1rem;
            }

            .legend-row {
                grid-template-columns: 22px minmax(0, 1fr) 48px 64px;
                font-size: .86rem;
            }

            .chart-frame {
                height: 250px;
                padding-left: .7rem;
            }

            .support-strip {
                grid-template-columns: 30px 1fr;
            }

            .support-strip::after {
                display: none;
            }
        }
    </style>
</head>
<body>
    <button class="menu-toggle" type="button" aria-label="Open navigation" aria-controls="adminSidebar" aria-expanded="false">
        <i class="bi bi-list"></i>
    </button>

    <div class="app-shell">
        <aside class="sidebar" id="adminSidebar">
            <a class="brand" href="dashboard.php">
                <img src="../auth/assets/img/CLSU_Logo.jpg" alt="CLSU logo">
                <span><strong>CLSU Infirmary</strong>Telemedicine System</span>
            </a>

            <div class="admin-mini">
                <div class="avatar" aria-hidden="true"><i class="bi bi-person-fill"></i></div>
                <div>
                    <h2>Admin User</h2>
                    <p>Administrator</p>
                    <span class="online">Online</span>
                </div>
            </div>

            <button class="sidebar-collapse" type="button" aria-label="Collapse sidebar" aria-expanded="true">
                <i class="bi bi-layout-sidebar-inset"></i>
                <span>Collapse</span>
            </button>

            <nav aria-label="Admin navigation">
                <ul class="side-nav">
                    <li><a class="nav-link active" href="dashboard.php"><i class="bi bi-house-door"></i> Dashboard</a></li>
                    <li><a class="nav-link" href="usermanagement.php"><i class="bi bi-people"></i> User Management</a></li>
                    <li><a class="nav-link" href="reports.php"><i class="bi bi-file-earmark-bar-graph"></i> Reports</a></li>
                </ul>
            </nav>

            <a class="logout-link" href="../auth/index.php"><i class="bi bi-box-arrow-right"></i> Logout</a>
        </aside>

        <main class="main">
            <header class="topbar">
                <div class="page-title">
                    <h1>CLSU Telemedicine</h1>
                    <h2>Administrator Dashboard</h2>
                    <p>Welcome back, Admin! Here's an overview of CLSU Telemedicine System.</p>
                </div>

                <label class="search-box" aria-label="Search admin records">
                    <input type="search" placeholder="Search...">
                    <i class="bi bi-search"></i>
                </label>

                <button class="bell" type="button" aria-label="Notifications">
                    <i class="bi bi-bell"></i>
                    <span>3</span>
                </button>

                <button class="admin-menu" type="button" aria-label="Admin profile menu">
                    <img src="../auth/assets/img/CLSU_Logo.jpg" alt="">
                    <span><strong>Admin User</strong><span>Administrator</span></span>
                    <i class="bi bi-chevron-down"></i>
                </button>
            </header>

            <section class="stats-grid" aria-label="Administrator metrics">
                <article class="cardx stat-card">
                    <div class="stat-main">
                        <span class="icon-box"><i class="bi bi-people-fill"></i></span>
                        <div><h3>Total Users</h3><span class="stat-value">1,245</span><span class="stat-caption">All CLSU users</span></div>
                    </div>
                    <span class="trend"><i class="bi bi-arrow-up"></i> 8.3% <span>vs last month</span></span>
                </article>

                <article class="cardx stat-card">
                    <div class="stat-main">
                        <span class="icon-box"><i class="bi bi-chat-dots-fill"></i></span>
                        <div><h3>Active Consultations</h3><span class="stat-value">18</span><span class="stat-caption">Currently ongoing</span></div>
                    </div>
                    <span class="trend"><i class="bi bi-arrow-up"></i> 12.5% <span>vs last month</span></span>
                </article>

                <article class="cardx stat-card">
                    <div class="stat-main">
                        <span class="icon-box orange"><i class="bi bi-clock"></i></span>
                        <div><h3>Pending Requests</h3><span class="stat-value">7</span><span class="stat-caption">Waiting for assignment</span></div>
                    </div>
                    <span class="trend down"><i class="bi bi-arrow-down"></i> 12.5% <span>vs last month</span></span>
                </article>

                <article class="cardx stat-card">
                    <div class="stat-main">
                        <span class="icon-box"><i class="bi bi-check-lg"></i></span>
                        <div><h3>Completed Consultations</h3><span class="stat-value">326</span><span class="stat-caption">This month</span></div>
                    </div>
                    <span class="trend"><i class="bi bi-arrow-up"></i> 15.7% <span>vs last month</span></span>
                </article>

                <article class="cardx stat-card">
                    <div class="stat-main">
                        <span class="icon-box purple"><i class="bi bi-arrow-repeat"></i></span>
                        <div><h3>Follow-up Requests</h3><span class="stat-value">5</span><span class="stat-caption">Requires attention</span></div>
                    </div>
                    <span class="trend purple"><i class="bi bi-arrow-down"></i> 16.7% <span>vs last month</span></span>
                </article>

                <article class="cardx stat-card">
                    <div class="stat-main">
                        <span class="icon-box blue"><i class="bi bi-person-fill"></i></span>
                        <div><h3>Active Staff</h3><span class="stat-value">12</span><span class="stat-caption">Nurses &amp; Physicians</span></div>
                    </div>
                    <span class="trend"><i class="bi bi-arrow-up"></i> 9.1% <span>vs last month</span></span>
                </article>
            </section>

            <div class="dashboard-grid">
                <section class="panel" aria-labelledby="overview-title">
                    <div class="panel-head">
                        <h2 id="overview-title">Consultation Overview</h2>
                        <button class="filter-btn" type="button"><i class="bi bi-calendar3"></i> This Month <i class="bi bi-chevron-down"></i></button>
                    </div>

                    <div class="overview-body">
                        <div class="donut" aria-label="Consultations by status">
                            <span class="slice-label slice-pending">27.6%</span>
                            <span class="slice-label slice-active">45.1%</span>
                            <span class="slice-label slice-completed">9.7%</span>
                            <span class="slice-label slice-cancelled">5.5%</span>
                            <span class="slice-label slice-rejected">12.1%</span>
                            <div class="donut-center"><span>Total</span><strong>366</strong><span>Consultations</span></div>
                        </div>

                        <div class="legend-list">
                            <div class="legend-row"><span class="dot blue"></span><span>Pending</span><strong>7</strong><em>(1.9%)</em></div>
                            <div class="legend-row"><span class="dot"></span><span>Active</span><strong>18</strong><em>(4.9%)</em></div>
                            <div class="legend-row"><span class="dot"></span><span>Completed</span><strong>165</strong><em>(45.1%)</em></div>
                            <div class="legend-row"><span class="dot red"></span><span>Cancelled</span><strong>20</strong><em>(5.5%)</em></div>
                            <div class="legend-row"><span class="dot gray"></span><span>Rejected</span><strong>44</strong><em>(12.1%)</em></div>
                        </div>
                    </div>
                </section>

                <section class="panel trend-chart" aria-labelledby="trend-title">
                    <div class="panel-head">
                        <h2 id="trend-title">Monthly Consultation Trend</h2>
                        <button class="filter-btn" type="button">This Year <i class="bi bi-chevron-down"></i></button>
                    </div>

                    <div class="chart-frame" aria-label="Monthly consultations line chart">
                        <svg viewBox="0 0 620 270" role="img" aria-labelledby="trendSvgTitle">
                            <title id="trendSvgTitle">Consultations rise from 45 in January to 80 in September, ending at 62 in December.</title>
                            <defs>
                                <linearGradient id="trendFill" x1="0" y1="0" x2="0" y2="1">
                                    <stop offset="0%" stop-color="#17894e" stop-opacity=".28"/>
                                    <stop offset="100%" stop-color="#17894e" stop-opacity=".02"/>
                                </linearGradient>
                            </defs>
                            <g stroke="#e5e7eb" stroke-width="1">
                                <line x1="40" y1="32" x2="600" y2="32"/>
                                <line x1="40" y1="78" x2="600" y2="78"/>
                                <line x1="40" y1="124" x2="600" y2="124"/>
                                <line x1="40" y1="170" x2="600" y2="170"/>
                                <line x1="40" y1="216" x2="600" y2="216"/>
                            </g>
                            <g class="axis-label" text-anchor="end">
                                <text x="30" y="36">100</text>
                                <text x="30" y="82">80</text>
                                <text x="30" y="128">60</text>
                                <text x="30" y="174">40</text>
                                <text x="30" y="220">0</text>
                            </g>
                            <path class="chart-fill" d="M58 169 L108 151 L158 130 L208 101 L258 115 L308 132 L358 114 L408 99 L458 79 L508 95 L558 107 L588 124 L588 216 L58 216 Z"/>
                            <path class="chart-line" d="M58 169 L108 151 L158 130 L208 101 L258 115 L308 132 L358 114 L408 99 L458 79 L508 95 L558 107 L588 124"/>
                            <g class="point-label" text-anchor="middle">
                                <text x="58" y="148">45</text><text x="108" y="132">52</text><text x="158" y="112">61</text><text x="208" y="82">70</text>
                                <text x="258" y="96">64</text><text x="308" y="112">58</text><text x="358" y="94">66</text><text x="408" y="80">72</text>
                                <text x="458" y="58">80</text><text x="508" y="76">74</text><text x="558" y="88">69</text><text x="588" y="105">62</text>
                            </g>
                            <g>
                                <circle class="chart-point" cx="58" cy="169" r="6"/><circle class="chart-point" cx="108" cy="151" r="6"/><circle class="chart-point" cx="158" cy="130" r="6"/>
                                <circle class="chart-point" cx="208" cy="101" r="6"/><circle class="chart-point" cx="258" cy="115" r="6"/><circle class="chart-point" cx="308" cy="132" r="6"/>
                                <circle class="chart-point" cx="358" cy="114" r="6"/><circle class="chart-point" cx="408" cy="99" r="6"/><circle class="chart-point" cx="458" cy="79" r="6"/>
                                <circle class="chart-point" cx="508" cy="95" r="6"/><circle class="chart-point" cx="558" cy="107" r="6"/><circle class="chart-point" cx="588" cy="124" r="6"/>
                            </g>
                            <g class="axis-label" text-anchor="middle">
                                <text x="58" y="244">Jan</text><text x="108" y="244">Feb</text><text x="158" y="244">Mar</text><text x="208" y="244">Apr</text>
                                <text x="258" y="244">May</text><text x="308" y="244">Jun</text><text x="358" y="244">Jul</text><text x="408" y="244">Aug</text>
                                <text x="458" y="244">Sep</text><text x="508" y="244">Oct</text><text x="558" y="244">Nov</text><text x="588" y="244">Dec</text>
                            </g>
                        </svg>
                    </div>
                    <div class="chart-legend">Consultations</div>
                </section>
            </div>

            <div class="dashboard-grid">
                <section class="panel quick-panel" aria-labelledby="quick-title">
                    <div class="panel-head">
                        <h2 id="quick-title">Quick Actions</h2>
                    </div>

                    <div class="quick-actions">
                        <a class="quick-card" href="usermanagement.php">
                            <span class="icon-box"><i class="bi bi-people-fill"></i></span>
                            <span><strong>Manage Users</strong><span>Create, edit, activate or deactivate user accounts.</span></span>
                            <i class="bi bi-chevron-right"></i>
                        </a>
                        <a class="quick-card report" href="reports.php">
                            <span class="icon-box orange"><i class="bi bi-file-earmark-text"></i></span>
                            <span><strong>Generate Report</strong><span>Generate and export telemedicine reports.</span></span>
                            <i class="bi bi-chevron-right"></i>
                        </a>
                        <a class="quick-card view" href="reports.php">
                            <span class="icon-box purple"><i class="bi bi-bar-chart-line-fill"></i></span>
                            <span><strong>View Reports</strong><span>View consultation and usage reports.</span></span>
                            <i class="bi bi-chevron-right"></i>
                        </a>
                    </div>

                    <div class="support-strip">
                        <i class="bi bi-info-circle"></i>
                        <span>CLSU Telemedicine supports the health and well-being of the CLSU community.</span>
                    </div>
                </section>

                <section class="panel summary-panel" aria-labelledby="summary-title">
                    <div class="panel-head">
                        <h2 id="summary-title">Consultation Summary <span style="color:#0f172a;font-weight:800">(This Month)</span></h2>
                    </div>

                    <div class="summary-list">
                        <div class="summary-row"><span class="icon-box blue"><i class="bi bi-people-fill"></i></span><strong>Total Consultations</strong><b>366</b></div>
                        <div class="summary-row"><span class="icon-box"><i class="bi bi-check-lg"></i></span><strong>Completed Consultations</strong><b>165 <small>(45.1%)</small></b></div>
                        <div class="summary-row"><span class="icon-box orange"><i class="bi bi-clock"></i></span><strong>Average Response Time</strong><b>12 mins</b></div>
                        <div class="summary-row"><span class="icon-box purple"><i class="bi bi-clock-history"></i></span><strong>Average Consultation Duration</strong><b>18 mins</b></div>
                    </div>
                </section>
            </div>
        </main>
    </div>

    <div class="sidebar-overlay" data-close-sidebar></div>

    <script>
        const menuToggle = document.querySelector(".menu-toggle");
        const sidebarCollapse = document.querySelector(".sidebar-collapse");
        const sidebarOverlay = document.querySelector(".sidebar-overlay");
        const sidebarLinks = document.querySelectorAll(".sidebar .nav-link, .sidebar .brand, .logout-link");

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
