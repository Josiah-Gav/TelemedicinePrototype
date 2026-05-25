<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reports | CLSU Telemedicine</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        :root {
            --ink: #0c172a;
            --muted: #4d5a70;
            --green: #0f8f4a;
            --green-dark: #003d20;
            --green-soft: #e8f6ee;
            --blue: #2f6fd2;
            --blue-soft: #eaf3ff;
            --orange: #f39a18;
            --orange-soft: #fff4df;
            --purple: #8a6ce6;
            --purple-soft: #f0edff;
            --red: #ff3b30;
            --line: #dfe6ee;
            --shadow: 0 14px 34px rgba(15, 23, 42, .07);
        }

        * { box-sizing: border-box; }
        body {
            min-height: 100vh;
            margin: 0;
            color: var(--ink);
            font-family: "Inter", "Segoe UI", system-ui, -apple-system, BlinkMacSystemFont, sans-serif;
            background: radial-gradient(circle at 84% 0, rgba(15, 143, 74, .08), transparent 24rem), linear-gradient(180deg, #fbfcfb 0%, #f5f8f5 100%);
        }
        a { color: inherit; text-decoration: none; }
        button, input, select { font: inherit; }

        .app-shell { display: grid; grid-template-columns: 290px minmax(0, 1fr); min-height: 100vh; }
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
        .brand { display: flex; align-items: center; gap: .85rem; margin-bottom: 2.35rem; }
        .brand img { width: 62px; height: 62px; border-radius: 50%; object-fit: cover; }
        .brand strong { display: block; color: #111; font-size: 1.42rem; font-weight: 950; line-height: 1.05; letter-spacing: 0; }
        .brand span { display: block; color: #111; font-size: 1.05rem; font-weight: 800; }
        .admin-mini { display: grid; grid-template-columns: 64px minmax(0, 1fr); align-items: center; gap: .9rem; margin-bottom: 1.6rem; }
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
        }
        .admin-mini h2 { margin: 0 0 .18rem; font-size: 1rem; font-weight: 950; }
        .admin-mini p { margin: 0 0 .25rem; color: var(--muted); font-size: .9rem; }
        .online { display: inline-flex; align-items: center; gap: .38rem; color: #2d405f; font-size: .82rem; }
        .online::before { content: ""; width: 10px; height: 10px; border-radius: 50%; background: var(--green); }
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
        .side-nav { display: grid; gap: .45rem; margin: 0; padding: 0 0 1.4rem; border-bottom: 1px solid var(--line); list-style: none; }
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
        .nav-link::before { content: ""; position: absolute; left: -1.25rem; width: 8px; height: 44px; border-radius: 0 8px 8px 0; background: transparent; }
        .nav-link i { width: 28px; color: #5d697d; font-size: 1.35rem; }
        .nav-link.active { color: var(--green-dark); background: linear-gradient(90deg, #e7f4e6, #f5faf3); }
        .nav-link.active::before { background: var(--green); }
        .nav-link.active i { color: var(--green); }
        .logout-link { margin-top: 1.2rem; }

        body.sidebar-collapsed .app-shell { grid-template-columns: 88px minmax(0, 1fr); }
        body.sidebar-collapsed .sidebar { padding-inline: .75rem; overflow-x: hidden; }
        body.sidebar-collapsed .brand { justify-content: center; gap: 0; margin-bottom: 1.5rem; }
        body.sidebar-collapsed .brand span,
        body.sidebar-collapsed .admin-mini > div:last-child,
        body.sidebar-collapsed .sidebar-collapse span { display: none; }
        body.sidebar-collapsed .brand img,
        body.sidebar-collapsed .avatar { width: 48px; height: 48px; }
        body.sidebar-collapsed .admin-mini { grid-template-columns: 1fr; justify-items: center; margin-bottom: 1rem; }
        body.sidebar-collapsed .sidebar-collapse { width: 48px; margin-inline: auto; }
        body.sidebar-collapsed .nav-link { justify-content: center; gap: 0; padding-inline: .6rem; font-size: 0; }
        body.sidebar-collapsed .nav-link i { width: auto; font-size: 1.45rem; }
        body.sidebar-collapsed .logout-link { margin-top: 2rem; }

        .main { min-width: 0; padding: 1.55rem 1.8rem 1.25rem; }
        .topbar {
            display: grid;
            grid-template-columns: minmax(420px, 1fr) minmax(260px, 320px) auto auto;
            align-items: center;
            gap: 1.45rem;
            margin-bottom: 1.65rem;
        }
        .page-title h1 { margin: 0 0 .7rem; color: var(--green-dark); font-size: clamp(2rem, 3vw, 2.65rem); font-weight: 950; letter-spacing: 0; }
        .page-title p { margin: 0; color: #1f2937; font-size: 1rem; }
        .search-box { position: relative; }
        .search-box input {
            width: 100%;
            height: 58px;
            padding: 0 3.4rem 0 1.25rem;
            border: 1px solid #cbd5e1;
            border-radius: 14px;
            color: var(--ink);
            background: #fff;
            box-shadow: 0 10px 24px rgba(15, 23, 42, .035);
            outline: none;
        }
        .search-box i { position: absolute; top: 50%; right: 1.1rem; color: #0f172a; font-size: 1.35rem; transform: translateY(-50%); }
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
            cursor: pointer;
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
        .admin-menu img { width: 54px; height: 54px; border-radius: 50%; border: 1px solid #cbd5e1; object-fit: cover; background: #fff; }
        .admin-menu strong, .admin-menu span { display: block; }
        .admin-menu strong { font-size: 1rem; font-weight: 950; }
        .admin-menu span { margin-top: .15rem; color: #27364b; font-size: .88rem; }
        .menu-toggle { display: none; }

        .panel {
            border: 1px solid var(--line);
            border-radius: 10px;
            background: rgba(255, 255, 255, .92);
            box-shadow: var(--shadow);
        }
        .overview-panel { padding: 1.35rem 1.45rem; margin-bottom: 1rem; }
        .panel h2 { margin: 0; font-size: 1.2rem; font-weight: 950; }
        .report-overview {
            display: grid;
            grid-template-columns: repeat(6, minmax(150px, 1fr));
            gap: .9rem;
            margin-top: 1.05rem;
        }
        .stat-card {
            display: grid;
            grid-template-columns: 62px minmax(0, 1fr);
            gap: .85rem;
            align-items: center;
            min-height: 142px;
            padding: .95rem;
            border: 1px solid var(--line);
            border-radius: 8px;
            background: #fff;
        }
        .icon-box {
            display: grid;
            place-items: center;
            width: 56px;
            height: 56px;
            border-radius: 11px;
            color: var(--green);
            background: var(--green-soft);
            font-size: 1.8rem;
        }
        .icon-box.blue { color: var(--blue); background: var(--blue-soft); }
        .icon-box.orange { color: var(--orange); background: var(--orange-soft); }
        .icon-box.purple { color: var(--purple); background: var(--purple-soft); }
        .stat-card h3 { margin: 0 0 .55rem; color: #020617; font-size: .75rem; font-weight: 950; line-height: 1.25; }
        .stat-value { display: block; margin-bottom: .62rem; font-size: 1.7rem; font-weight: 950; line-height: 1; }
        .stat-caption { display: block; color: #27364b; font-size: .78rem; }
        .trend { display: inline-flex; align-items: center; gap: .35rem; margin-top: .6rem; color: var(--green); font-size: .76rem; font-weight: 900; white-space: nowrap; }
        .trend span { color: #27364b; font-weight: 650; }
        .trend.down { color: #008c3a; }

        .report-panel { overflow: hidden; }
        .select-report { padding: 1.35rem 1.45rem 1.45rem; border-bottom: 1px solid var(--line); }
        .report-options {
            display: grid;
            grid-template-columns: repeat(4, minmax(190px, 1fr));
            gap: 1rem;
            margin-top: 1rem;
        }
        .report-card {
            display: grid;
            grid-template-columns: 58px minmax(0, 1fr);
            align-items: center;
            gap: .95rem;
            min-height: 104px;
            padding: .95rem 1rem;
            border: 1px solid var(--line);
            border-radius: 8px;
            background: #fff;
        }
        .report-card.active { border-color: var(--green); background: linear-gradient(90deg, #f4fbf6, #fff); }
        .report-card strong { display: block; margin-bottom: .42rem; font-size: .95rem; font-weight: 950; }
        .report-card span { color: #1f2937; font-size: .85rem; line-height: 1.55; }
        .control-bar {
            display: grid;
            grid-template-columns: minmax(220px, 1fr) minmax(160px, .7fr) minmax(180px, .8fr) minmax(220px, auto);
            gap: 1.25rem;
            align-items: end;
            padding: 1.25rem 1.45rem;
            border-bottom: 1px solid var(--line);
        }
        .field label, .export-box label { display: block; margin-bottom: .45rem; color: #0f172a; font-size: .84rem; font-weight: 850; }
        .select-wrap { position: relative; }
        .select-wrap select {
            width: 100%;
            height: 48px;
            appearance: none;
            padding: 0 2.7rem 0 1rem;
            border: 1px solid #d6dee9;
            border-radius: 8px;
            color: #0f172a;
            background: #fff;
            outline: none;
        }
        .select-wrap i { position: absolute; top: 50%; right: 1rem; color: #0f172a; pointer-events: none; transform: translateY(-50%); }
        .export-actions { display: flex; gap: .9rem; }
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: .55rem;
            min-width: 120px;
            min-height: 44px;
            padding: 0 1.1rem;
            border: 1px solid #90cfa5;
            border-radius: 8px;
            color: var(--green-dark);
            background: #fff;
            font-weight: 900;
            cursor: pointer;
        }
        .btn.pdf { color: var(--red); border-color: var(--red); }
        .report-body { display: grid; grid-template-columns: minmax(0, 1.25fr) minmax(360px, .95fr); }
        .chart-panel, .summary-panel { padding: 1.35rem 1.45rem; }
        .chart-panel { border-right: 1px solid var(--line); }
        .chart-wrap { height: 300px; margin-top: .7rem; }
        .chart-wrap svg { display: block; width: 100%; height: 100%; overflow: visible; }
        .axis-label { fill: #334155; font-size: 12px; }
        .point-label { fill: #020617; font-size: 13px; font-weight: 850; }
        .chart-line { fill: none; stroke: #087d32; stroke-width: 3; }
        .chart-fill { fill: url(#reportFill); }
        .chart-point { fill: #087d32; stroke: #006824; stroke-width: 1.5; }
        .chart-legend {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: .45rem;
            margin-top: -.35rem;
            font-size: .85rem;
        }
        .chart-legend::before { content: ""; width: 28px; height: 3px; border-radius: 999px; background: #087d32; }
        .info-strip {
            display: grid;
            grid-template-columns: 30px 1fr;
            align-items: center;
            min-height: 56px;
            margin-top: 1rem;
            padding: 0 1rem;
            border: 1px solid #d7eadc;
            border-radius: 8px;
            background: #eff9f2;
        }
        .info-strip i { color: var(--green-dark); font-size: 1.2rem; }
        .summary-table { width: 100%; margin-top: 1.1rem; border-collapse: collapse; }
        .summary-table th, .summary-table td { padding: .82rem .9rem; border-bottom: 1px solid #edf1f5; font-size: .88rem; text-align: left; }
        .summary-table th { background: #f8fafc; font-weight: 950; }
        .summary-table td:nth-child(2), .summary-table td:nth-child(3), .summary-table th:nth-child(2), .summary-table th:nth-child(3) { text-align: center; }
        .summary-table tfoot td { color: var(--green-dark); font-weight: 950; }
        .footer { display: flex; justify-content: space-between; gap: 1rem; margin-top: 1.8rem; color: #718096; font-size: .9rem; }
        .sidebar-overlay { display: none; }

        @media (max-width: 1480px) {
            .report-overview { grid-template-columns: repeat(3, minmax(170px, 1fr)); }
            .report-options { grid-template-columns: repeat(2, minmax(220px, 1fr)); }
            .report-body { grid-template-columns: 1fr; }
            .chart-panel { border-right: 0; border-bottom: 1px solid var(--line); }
        }
        @media (max-width: 1220px) {
            .topbar { grid-template-columns: 1fr minmax(240px, 320px) auto; }
            .admin-menu { grid-column: 1 / -1; justify-self: end; }
            .control-bar { grid-template-columns: repeat(2, minmax(220px, 1fr)); }
        }
        @media (max-width: 1120px) {
            .app-shell, body.sidebar-collapsed .app-shell { grid-template-columns: 1fr; }
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
            .sidebar {
                position: fixed;
                inset: 0 auto 0 0;
                z-index: 1060;
                width: min(84vw, 310px);
                transform: translateX(-100%);
                transition: transform .24s ease;
            }
            body.sidebar-open .sidebar { transform: translateX(0); }
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
            body.sidebar-open .sidebar-overlay { opacity: 1; pointer-events: auto; }
            .main { padding-top: 5rem; }
        }
        @media (max-width: 760px) {
            .main { padding-inline: 1rem; }
            .topbar,
            .report-overview,
            .report-options,
            .control-bar,
            .footer { grid-template-columns: 1fr; display: grid; align-items: start; }
            .bell, .admin-menu { justify-self: start; }
            .overview-panel, .select-report, .control-bar, .chart-panel, .summary-panel { padding: 1rem; }
            .chart-wrap { height: 245px; }
            .export-actions { display: grid; grid-template-columns: 1fr 1fr; }
            .btn { min-width: 0; }
            .summary-panel { overflow-x: auto; }
            .summary-table { min-width: 520px; }
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
                    <li><a class="nav-link" href="dashboard.php"><i class="bi bi-house-door"></i> Dashboard</a></li>
                    <li><a class="nav-link" href="usermanagement.php"><i class="bi bi-people"></i> User Management</a></li>
                    <li><a class="nav-link active" href="reports.php"><i class="bi bi-file-earmark-bar-graph"></i> Reports</a></li>
                </ul>
            </nav>

            <a class="nav-link logout-link" href="../auth/index.php"><i class="bi bi-box-arrow-right"></i> Logout</a>
        </aside>

        <main class="main">
            <header class="topbar">
                <div class="page-title">
                    <h1>Reports</h1>
                    <p>Generate and export telemedicine consultation statistics and usage reports.</p>
                </div>

                <label class="search-box" aria-label="Search reports">
                    <input type="search" placeholder="Search reports...">
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

            <section class="panel overview-panel" aria-labelledby="overview-title">
                <h2 id="overview-title">Report Overview</h2>
                <div class="report-overview">
                    <article class="stat-card"><span class="icon-box"><i class="bi bi-people-fill"></i></span><div><h3>Total Consultations</h3><strong class="stat-value">366</strong><span class="stat-caption">This month</span><span class="trend">15.7%</span></div></article>
                    <article class="stat-card"><span class="icon-box"><i class="bi bi-check-lg"></i></span><div><h3>Completed Consultations</h3><strong class="stat-value">165</strong><span class="stat-caption">This month</span><span class="trend">15.1%</span></div></article>
                    <article class="stat-card"><span class="icon-box purple"><i class="bi bi-arrow-repeat"></i></span><div><h3>Follow-up Requests</h3><strong class="stat-value">52</strong><span class="stat-caption">This month</span><span class="trend">10.2%</span></div></article>
                    <article class="stat-card"><span class="icon-box blue"><i class="bi bi-chat-dots-fill"></i></span><div><h3>Active Consultations</h3><strong class="stat-value">18</strong><span class="stat-caption">Currently ongoing</span></div></article>
                    <article class="stat-card"><span class="icon-box orange"><i class="bi bi-clock"></i></span><div><h3>Average Response Time</h3><strong class="stat-value">12 mins</strong><span class="stat-caption">This month</span><span class="trend down">8.3%</span></div></article>
                    <article class="stat-card"><span class="icon-box purple"><i class="bi bi-clock-history"></i></span><div><h3>Average Consultation Duration</h3><strong class="stat-value">18 mins</strong><span class="stat-caption">This month</span><span class="trend">5.6%</span></div></article>
                </div>
            </section>

            <section class="panel report-panel" aria-labelledby="select-title">
                <div class="select-report">
                    <h2 id="select-title">Select Report</h2>
                    <div class="report-options">
                        <article class="report-card active"><span class="icon-box"><i class="bi bi-bar-chart-line"></i></span><div><strong>Consultation Counts</strong><span>View total number of consultations within a selected period.</span></div></article>
                        <article class="report-card"><span class="icon-box"><i class="bi bi-check-lg"></i></span><div><strong>Completed Consultations</strong><span>View statistics of completed consultations.</span></div></article>
                        <article class="report-card"><span class="icon-box purple"><i class="bi bi-arrow-repeat"></i></span><div><strong>Follow-up Requests</strong><span>View statistics of follow-up requests.</span></div></article>
                        <article class="report-card"><span class="icon-box blue"><i class="bi bi-graph-up-arrow"></i></span><div><strong>Monthly Usage</strong><span>View monthly telemedicine usage and trends.</span></div></article>
                    </div>
                </div>

                <div class="control-bar">
                    <label class="field">Date Range
                        <span class="select-wrap">
                            <select><option>May 1, 2024 - May 31, 2024</option><option>April 1, 2024 - April 30, 2024</option></select>
                            <i class="bi bi-chevron-down"></i>
                        </span>
                    </label>
                    <label class="field">Group By
                        <span class="select-wrap">
                            <select><option>Day</option><option>Week</option><option>Month</option></select>
                            <i class="bi bi-chevron-down"></i>
                        </span>
                    </label>
                    <label class="field">User Role (Optional)
                        <span class="select-wrap">
                            <select><option>All Roles</option><option>Nurse</option><option>Physician</option></select>
                            <i class="bi bi-chevron-down"></i>
                        </span>
                    </label>
                    <div class="export-box">
                        <label>Export Report</label>
                        <div class="export-actions">
                            <button class="btn pdf" type="button"><i class="bi bi-filetype-pdf"></i> PDF</button>
                            <button class="btn" type="button"><i class="bi bi-file-earmark-spreadsheet"></i> CSV</button>
                        </div>
                    </div>
                </div>

                <div class="report-body">
                    <section class="chart-panel" aria-labelledby="summary-title">
                        <h2 id="summary-title">Report Summary</h2>
                        <div class="chart-wrap" aria-label="Consultation counts report chart">
                            <svg viewBox="0 0 720 280" role="img" aria-labelledby="chartTitle">
                                <title id="chartTitle">Consultation counts for May rise from 12 to 35, ending at 17.</title>
                                <defs>
                                    <linearGradient id="reportFill" x1="0" y1="0" x2="0" y2="1">
                                        <stop offset="0%" stop-color="#087d32" stop-opacity=".25"/>
                                        <stop offset="100%" stop-color="#087d32" stop-opacity=".02"/>
                                    </linearGradient>
                                </defs>
                                <g stroke="#e5e7eb" stroke-width="1">
                                    <line x1="42" y1="34" x2="700" y2="34"/><line x1="42" y1="72" x2="700" y2="72"/><line x1="42" y1="110" x2="700" y2="110"/>
                                    <line x1="42" y1="148" x2="700" y2="148"/><line x1="42" y1="186" x2="700" y2="186"/><line x1="42" y1="224" x2="700" y2="224"/>
                                </g>
                                <g class="axis-label" text-anchor="end">
                                    <text x="28" y="38">60</text><text x="28" y="76">50</text><text x="28" y="114">40</text><text x="28" y="152">30</text><text x="28" y="190">20</text><text x="28" y="228">0</text>
                                </g>
                                <path class="chart-fill" d="M76 184 L180 160 L284 132 L388 104 L492 122 L596 88 L700 168 L700 224 L76 224 Z"/>
                                <path class="chart-line" d="M76 184 L180 160 L284 132 L388 104 L492 122 L596 88 L700 168"/>
                                <g class="point-label" text-anchor="middle">
                                    <text x="76" y="170">12</text><text x="180" y="146">18</text><text x="284" y="118">25</text><text x="388" y="90">31</text><text x="492" y="108">28</text><text x="596" y="74">35</text><text x="700" y="154">17</text>
                                </g>
                                <g>
                                    <circle class="chart-point" cx="76" cy="184" r="6"/><circle class="chart-point" cx="180" cy="160" r="6"/><circle class="chart-point" cx="284" cy="132" r="6"/>
                                    <circle class="chart-point" cx="388" cy="104" r="6"/><circle class="chart-point" cx="492" cy="122" r="6"/><circle class="chart-point" cx="596" cy="88" r="6"/><circle class="chart-point" cx="700" cy="168" r="6"/>
                                </g>
                                <g class="axis-label" text-anchor="middle">
                                    <text x="76" y="252">May 1</text><text x="180" y="252">May 6</text><text x="284" y="252">May 11</text><text x="388" y="252">May 16</text>
                                    <text x="492" y="252">May 21</text><text x="596" y="252">May 26</text><text x="700" y="252">May 31</text>
                                </g>
                            </svg>
                        </div>
                        <div class="chart-legend">Consultations</div>
                        <div class="info-strip"><i class="bi bi-info-circle"></i><span>This report shows the total number of consultations from May 1, 2024 to May 31, 2024.</span></div>
                    </section>

                    <section class="summary-panel" aria-labelledby="table-title">
                        <h2 id="table-title">Consultation Counts Summary</h2>
                        <table class="summary-table">
                            <thead><tr><th>Date</th><th>Consultations</th><th>Percentage</th></tr></thead>
                            <tbody>
                                <tr><td>May 1, 2024</td><td>12</td><td>3.3%</td></tr>
                                <tr><td>May 2, 2024</td><td>14</td><td>3.8%</td></tr>
                                <tr><td>May 3, 2024</td><td>16</td><td>4.4%</td></tr>
                                <tr><td>May 4, 2024</td><td>10</td><td>2.7%</td></tr>
                                <tr><td>May 5, 2024</td><td>11</td><td>3.0%</td></tr>
                                <tr><td>May 6, 2024</td><td>18</td><td>4.9%</td></tr>
                                <tr><td>May 7, 2024</td><td>19</td><td>5.2%</td></tr>
                            </tbody>
                            <tfoot><tr><td>Total</td><td>366</td><td>100%</td></tr></tfoot>
                        </table>
                    </section>
                </div>
            </section>

            <footer class="footer">
                <span>&copy; 2024 CLSU Telemedicine System. All rights reserved.</span>
                <span>Central Luzon State University</span>
            </footer>
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
            if (event.key === "Escape") setSidebar(false);
        });
    </script>
</body>
</html>
