<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Health Reminders | CLSU Infirmary Telemedicine System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        :root {
            --ink: #071438;
            --muted: #4e5b86;
            --green: #087d32;
            --green-dark: #006824;
            --green-soft: #e9f5e9;
            --blue: #1675d1;
            --blue-soft: #eaf3ff;
            --orange: #ff8a00;
            --orange-soft: #fff0df;
            --purple: #7654e8;
            --purple-soft: #efe8ff;
            --gold: #f5b51f;
            --gold-soft: #fff5df;
            --line: #e1e7ef;
            --shadow: 0 14px 36px rgba(24, 39, 75, .08);
        }

        * { box-sizing: border-box; }
        body {
            min-height: 100vh;
            margin: 0;
            color: var(--ink);
            font-family: "Inter", "Segoe UI", system-ui, -apple-system, BlinkMacSystemFont, sans-serif;
            background: radial-gradient(circle at 88% 92%, rgba(255,211,67,.22), transparent 16rem), linear-gradient(180deg, #fbfdfb 0%, #f7faf5 100%);
        }
        a { color: inherit; text-decoration: none; }
        button, input { font: inherit; }

        .app-shell { display: grid; grid-template-columns: 280px 1fr; min-height: 100vh; }
        .sidebar {
            position: sticky;
            top: 0;
            height: 100vh;
            padding: 1.6rem 1.15rem;
            background: #fff;
            border-right: 1px solid var(--line);
            box-shadow: 8px 0 28px rgba(24, 39, 75, .04);
            overflow-y: auto;
            transition: padding .2s ease;
        }
        .brand { display: flex; align-items: center; gap: .8rem; margin-bottom: 3rem; }
        .brand img { width: 58px; height: 58px; border-radius: 50%; object-fit: cover; }
        .brand strong { display: block; font-size: 1.28rem; font-weight: 900; line-height: 1.1; }
        .brand span { color: #111; font-weight: 700; }
        .patient-mini { display: flex; align-items: center; gap: .95rem; margin-bottom: 2.4rem; padding-left: .15rem; }
        .patient-mini h2 { margin: 0 0 .2rem; font-size: 1rem; font-weight: 900; }
        .patient-mini p { margin: 0; color: var(--muted); font-size: .9rem; }
        .avatar { display: grid; place-items: center; width: 64px; height: 64px; border-radius: 50%; border: 1px solid #d4dbe7; color: #fff; background: linear-gradient(135deg, #f3b79b 0%, #253055 100%); font-size: 1.85rem; overflow: hidden; }
        .online { display: inline-flex; align-items: center; gap: .35rem; color: #2d405f; font-size: .82rem; }
        .online::before { content: ""; width: 10px; height: 10px; border-radius: 50%; background: var(--green); }
        .sidebar-collapse { display: flex; align-items: center; justify-content: center; gap: .55rem; width: 100%; min-height: 42px; margin: 0 0 1rem; border: 1px solid #d7e0ee; border-radius: 9px; color: var(--green-dark); background: #fff; font-weight: 950; }
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
        body.sidebar-collapsed .nav-badge { position: absolute; top: 5px; right: 4px; min-width: 18px; height: 18px; margin-left: 0; padding: 0 .25rem; font-size: .62rem; }
        .nav-list { display: grid; gap: .55rem; margin: 0; padding: 0; list-style: none; }
        .nav-link { display: flex; align-items: center; gap: 1rem; min-height: 58px; padding: .8rem 1rem; border-radius: 12px; color: #111; font-weight: 800; }
        .nav-link i { width: 28px; color: #5d697d; font-size: 1.45rem; }
        .nav-link.active { color: var(--green-dark); background: linear-gradient(90deg, #e5f8ec, #eefbf2); }
        .nav-link.active i { color: var(--green); }
        .nav-badge { display: grid; place-items: center; min-width: 24px; height: 24px; margin-left: auto; padding: 0 .38rem; border-radius: 999px; color: #fff; background: #ff1e22; font-size: .82rem; font-weight: 900; }
        .nav-divider { height: 1px; margin: 2.2rem .25rem; background: var(--line); }

        .main { min-width: 0; padding: 1.8rem 2rem; }
        .menu-toggle, .sidebar-overlay { display: none; }
        .topbar { display: grid; grid-template-columns: 1fr minmax(260px, 430px) auto; align-items: center; gap: 1.4rem; margin-bottom: 1.75rem; }
        .page-title h1 { margin: 0 0 .35rem; font-size: clamp(2rem, 3vw, 2.75rem); font-weight: 950; letter-spacing: 0; }
        .page-title p { margin: 0; color: #34426f; font-size: 1.02rem; }
        .search-box { position: relative; }
        .search-box input { width: 100%; height: 50px; padding: 0 3.25rem 0 1.4rem; border: 1px solid #cfd8ea; border-radius: 10px; color: var(--ink); background: #fff; outline: none; }
        .search-box i { position: absolute; top: 50%; right: 1rem; color: #253f7e; font-size: 1.45rem; transform: translateY(-50%); }
        .top-actions { display: flex; align-items: center; gap: 1.35rem; }
        .bell { position: relative; border: 0; background: transparent; font-size: 1.75rem; }
        .bell span { position: absolute; top: -8px; right: -9px; display: grid; place-items: center; width: 24px; height: 24px; border-radius: 50%; color: #fff; background: #ff1e22; font-size: .82rem; font-weight: 900; }
        .profile-dot { display: grid; place-items: center; width: 58px; height: 58px; border: 0; border-radius: 50%; color: #233d78; background: #dfe9f6; font-size: 2rem; }

        .reminder-layout { display: grid; grid-template-columns: minmax(0, 1fr) 360px; gap: 1.35rem; }
        .stack, .right-column { display: grid; gap: 1rem; align-content: start; }
        .panel { border: 1px solid var(--line); border-radius: 10px; background: #fff; box-shadow: var(--shadow); }
        .category-tabs { display: grid; grid-template-columns: repeat(5, minmax(130px, 1fr)); min-height: 64px; padding: 0 .35rem; overflow-x: auto; }
        .category-tab { display: inline-flex; align-items: center; justify-content: center; gap: .65rem; min-height: 64px; border: 0; border-bottom: 3px solid transparent; color: #172447; background: transparent; font-weight: 950; white-space: nowrap; }
        .category-tab i { color: #253f7e; font-size: 1.25rem; }
        .category-tab.active { color: var(--green-dark); border-bottom-color: var(--green); background: linear-gradient(90deg, #f1fbf4, transparent); }
        .category-tab.active i { color: var(--green); }

        .section-card { padding: 1.35rem 1.55rem; }
        .section-title { display: flex; align-items: center; justify-content: space-between; gap: 1rem; margin-bottom: 1rem; }
        .section-title h2 { margin: 0; font-size: 1.12rem; font-weight: 950; }
        .view-all { color: var(--green-dark); font-weight: 950; }
        .reminder-list, .history-list { display: grid; }
        .reminder-row, .history-row {
            display: grid;
            grid-template-columns: 80px minmax(0, 1fr) auto 28px;
            align-items: center;
            gap: 1rem;
            padding: 1.15rem 0;
            border-top: 1px solid var(--line);
        }
        .history-row { grid-template-columns: 54px 70px minmax(0, 1fr) auto; }
        .reminder-icon, .history-check, .timeline-icon {
            display: grid;
            place-items: center;
            width: 64px;
            height: 64px;
            border-radius: 50%;
            color: var(--blue);
            background: var(--blue-soft);
            font-size: 1.65rem;
        }
        .reminder-icon.green, .timeline-icon.green { color: var(--green); background: var(--green-soft); }
        .reminder-icon.orange, .timeline-icon.orange { color: var(--orange); background: var(--orange-soft); }
        .reminder-icon.purple, .timeline-icon.purple { color: var(--purple); background: var(--purple-soft); }
        .history-check { width: 30px; height: 30px; color: #fff; background: var(--green); font-size: 1rem; }
        .history-row .reminder-icon { width: 54px; height: 54px; font-size: 1.35rem; }
        .reminder-row h3, .history-row h3 { margin: 0 0 .35rem; font-size: 1.1rem; font-weight: 950; }
        .reminder-row p, .history-row p { margin: 0 0 .35rem; color: #34426f; }
        .row-meta { color: #253f7e; font-weight: 850; font-size: .9rem; }
        .tag { display: inline-flex; min-height: 28px; align-items: center; padding: .2rem .75rem; border-radius: 999px; color: #115bd1; background: #eaf3ff; font-size: .82rem; font-weight: 950; }
        .tag.green { color: var(--green-dark); background: #ddf7e7; }
        .tag.orange { color: #c55a00; background: #fff0d9; }
        .tag.purple { color: var(--purple); background: var(--purple-soft); }
        .due-pill { display: inline-flex; min-height: 30px; align-items: center; padding: .25rem .8rem; border-radius: 999px; color: #1266d6; background: #eaf3ff; font-size: .84rem; font-weight: 950; white-space: nowrap; }
        .due-pill.green { color: var(--green-dark); background: #ddf7e7; }
        .due-pill.orange { color: #d86700; background: #fff0df; }
        .due-pill.purple { color: var(--purple); background: var(--purple-soft); }
        .more-btn { border: 0; color: #0f2256; background: transparent; font-size: 1.2rem; }
        .view-reminders { display: flex; align-items: center; justify-content: center; gap: .75rem; min-height: 48px; margin-top: .35rem; border: 1px solid var(--line); border-radius: 8px; color: #0f2256; font-weight: 950; }

        .schedule-card { display: grid; grid-template-columns: 140px minmax(0, 1fr); gap: 1rem; align-items: center; }
        .timeline-times { display: grid; gap: 2.25rem; position: relative; padding: 1rem 0; }
        .timeline-times::after { content: ""; position: absolute; top: 28px; bottom: 28px; right: 14px; width: 2px; background: #dce5f2; }
        .time-row { display: grid; grid-template-columns: 80px 28px; align-items: center; gap: .75rem; font-weight: 950; }
        .time-dot { position: relative; z-index: 1; width: 16px; height: 16px; border-radius: 50%; background: var(--blue); box-shadow: 0 0 0 5px #eaf3ff; }
        .time-dot.orange { background: var(--orange); box-shadow: 0 0 0 5px #fff0df; }
        .time-dot.purple { background: var(--purple); box-shadow: 0 0 0 5px var(--purple-soft); }
        .schedule-list { display: grid; border: 1px solid var(--line); border-radius: 8px; overflow: hidden; }
        .schedule-item { display: grid; grid-template-columns: 56px minmax(0, 1fr) auto; align-items: center; gap: .9rem; min-height: 76px; padding: .85rem 1rem; border-bottom: 1px solid var(--line); }
        .schedule-item:last-child { border-bottom: 0; }
        .timeline-icon { width: 48px; height: 48px; font-size: 1.25rem; }
        .schedule-item h3 { margin: 0 0 .25rem; font-size: .95rem; font-weight: 950; }
        .schedule-item p { margin: 0; color: #34426f; font-size: .86rem; }
        .status-tag { color: var(--green-dark); background: #ddf7e7; border-radius: 999px; padding: .25rem .7rem; font-size: .82rem; font-weight: 950; }

        .overview-grid { display: grid; grid-template-columns: 1fr 1fr; gap: .9rem; }
        .overview-tile { display: grid; grid-template-columns: minmax(0, 1fr) 42px; align-items: center; min-height: 102px; padding: 1rem; border: 1px solid var(--line); border-radius: 9px; background: #fff; }
        .overview-tile strong { display: block; margin-bottom: .45rem; font-size: 1.65rem; font-weight: 950; }
        .overview-tile span { color: #172447; font-weight: 850; }
        .tile-icon { display: grid; place-items: center; width: 40px; height: 40px; border-radius: 50%; color: var(--blue); background: var(--blue-soft); font-size: 1.15rem; }
        .tile-icon.green { color: var(--green); background: var(--green-soft); }
        .tile-icon.orange { color: var(--orange); background: var(--orange-soft); }
        .quick-actions { display: grid; gap: .75rem; }
        .quick-btn { display: flex; align-items: center; justify-content: center; gap: .7rem; min-height: 48px; border: 1px solid #9ed9af; border-radius: 8px; color: var(--green-dark); background: #fff; font-weight: 950; }
        .quick-btn.blue { color: #115bd1; border-color: #bfd4ff; }
        .quick-btn.orange { color: #d86700; border-color: #ffd09a; }
        .quick-btn.purple { color: var(--purple); border-color: #d8c8ff; }
        .tip-list { display: grid; gap: .1rem; }
        .tip-row { display: grid; grid-template-columns: 42px minmax(0, 1fr) 18px; align-items: center; gap: .75rem; min-height: 68px; border-bottom: 1px solid var(--line); }
        .tip-row:last-child { border-bottom: 0; }
        .tip-row i:first-child { color: var(--orange); font-size: 1.45rem; }
        .tip-row.blue i:first-child { color: var(--blue); }
        .tip-row strong { font-size: .88rem; line-height: 1.4; }

        @media (max-width: 1450px) {
            .reminder-layout { grid-template-columns: 1fr; }
            .right-column { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        }
        @media (max-width: 1180px) {
            .app-shell,
            body.sidebar-collapsed .app-shell { grid-template-columns: 1fr; }
            .sidebar-collapse { display: none; }
            .menu-toggle { position: fixed; top: 1rem; left: 1rem; z-index: 1100; display: grid; place-items: center; width: 48px; height: 48px; border: 1px solid var(--line); border-radius: 12px; color: var(--green-dark); background: #fff; box-shadow: 0 10px 24px rgba(24, 39, 75, .12); font-size: 1.55rem; }
            .sidebar-overlay { position: fixed; inset: 0; z-index: 1050; display: block; background: rgba(7, 20, 56, .42); opacity: 0; pointer-events: none; transition: opacity .2s ease; }
            body.sidebar-open .sidebar-overlay { opacity: 1; pointer-events: auto; }
            .sidebar { position: fixed; inset: 0 auto 0 0; z-index: 1060; width: min(82vw, 310px); height: 100vh; padding: 1rem; transform: translateX(-100%); transition: transform .24s ease; box-shadow: 12px 0 36px rgba(7, 20, 56, .18); }
            body.sidebar-open .sidebar { transform: translateX(0); }
            .brand, .patient-mini { margin-bottom: 1rem; }
            .nav-divider { margin: 1rem .25rem; }
            .main { padding-top: 5rem; }
            .top-actions { display: none; }
        }
        @media (max-width: 900px) {
            .main { padding: 5rem 1rem 1rem; }
            .topbar, .schedule-card, .right-column { grid-template-columns: 1fr; }
            .reminder-row { grid-template-columns: 60px minmax(0, 1fr); align-items: start; }
            .reminder-row .due-pill, .reminder-row .more-btn { grid-column: 2; justify-self: start; }
            .history-row { grid-template-columns: 34px 54px minmax(0, 1fr); }
            .history-row .tag { grid-column: 3; justify-self: start; }
            .timeline-times { display: none; }
        }
        @media (max-width: 620px) {
            .main { padding-inline: .75rem; }
            .brand img { width: 48px; height: 48px; }
            .brand strong { font-size: 1.08rem; }
            .nav-link { min-height: 48px; padding: .65rem .85rem; }
            .page-title h1 { font-size: 1.8rem; }
            .search-box input { height: 46px; }
            .section-card { padding: 1rem; }
            .category-tabs { grid-template-columns: repeat(5, max-content); }
            .category-tab { padding-inline: .75rem; }
            .overview-grid { grid-template-columns: 1fr; }
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
                <span><strong>CLSU Infirmary</strong>Telemedicine System</span>
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
                    <li><a class="nav-link" href="newconsultation.php"><i class="bi bi-patch-plus"></i> New Consultation</a></li>
                    <li><a class="nav-link" href="myconsultation.php"><i class="bi bi-chat-dots"></i> My Consultation</a></li>
                    <li><a class="nav-link" href="notification.php"><i class="bi bi-bell"></i> Notifications <span class="nav-badge">4</span></a></li>
                    <li><a class="nav-link active" href="healthreminders.php"><i class="bi bi-calendar2-heart"></i> Health Reminders</a></li>
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
                    <h1>Health Reminders</h1>
                    <p>Stay on top of your medications, appointments, and health tasks.</p>
                </div>

                <label class="search-box" aria-label="Search reminders">
                    <input type="search" placeholder="Search reminders...">
                    <i class="bi bi-search"></i>
                </label>

                <div class="top-actions">
                    <button class="bell" type="button" aria-label="Notifications"><i class="bi bi-bell"></i><span>4</span></button>
                    <button class="profile-dot" type="button" aria-label="Profile"><i class="bi bi-person-fill"></i></button>
                </div>
            </header>

            <div class="reminder-layout">
                <div class="stack">
                    <section class="panel category-tabs" aria-label="Reminder categories">
                        <button class="category-tab active" type="button"><i class="bi bi-calendar-check"></i> All Reminders</button>
                        <button class="category-tab" type="button"><i class="bi bi-capsule"></i> Medications</button>
                        <button class="category-tab" type="button"><i class="bi bi-calendar3"></i> Appointments</button>
                        <button class="category-tab" type="button"><i class="bi bi-check-circle"></i> Tasks</button>
                        <button class="category-tab" type="button"><i class="bi bi-shield-check"></i> Health Tips</button>
                    </section>

                    <section class="panel section-card">
                        <div class="section-title"><h2>Upcoming Reminders</h2></div>
                        <div class="reminder-list">
                            <article class="reminder-row">
                                <span class="reminder-icon"><i class="bi bi-capsule"></i></span>
                                <div><h3>Paracetamol 500mg <span class="tag ms-2">Medication</span></h3><p>Take 1 tablet</p><span class="row-meta"><i class="bi bi-clock me-1"></i> Today, May 16, 2025 &nbsp;&bull;&nbsp; 10:00 AM</span></div>
                                <span class="due-pill">In 30 mins</span><button class="more-btn" type="button" aria-label="More actions"><i class="bi bi-three-dots-vertical"></i></button>
                            </article>
                            <article class="reminder-row">
                                <span class="reminder-icon green"><i class="bi bi-calendar3"></i></span>
                                <div><h3>Follow-up Consultation <span class="tag green ms-2">Appointment</span></h3><p>Dr. Maria Santos (Physician)</p><span class="row-meta"><i class="bi bi-clock me-1"></i> May 20, 2025 &nbsp;&bull;&nbsp; 09:00 AM</span></div>
                                <span class="due-pill green">In 4 days</span><button class="more-btn" type="button" aria-label="More actions"><i class="bi bi-three-dots-vertical"></i></button>
                            </article>
                            <article class="reminder-row">
                                <span class="reminder-icon purple"><i class="bi bi-capsule"></i></span>
                                <div><h3>Cetirizine 10mg <span class="tag ms-2">Medication</span></h3><p>Take 1 tablet at bedtime</p><span class="row-meta"><i class="bi bi-clock me-1"></i> Today, May 16, 2025 &nbsp;&bull;&nbsp; 09:00 PM</span></div>
                                <span class="due-pill purple">In 11 hrs</span><button class="more-btn" type="button" aria-label="More actions"><i class="bi bi-three-dots-vertical"></i></button>
                            </article>
                            <article class="reminder-row">
                                <span class="reminder-icon orange"><i class="bi bi-droplet"></i></span>
                                <div><h3>Hydration <span class="tag orange ms-2">Task</span></h3><p>Drink at least 8 glasses of water</p><span class="row-meta"><i class="bi bi-clock me-1"></i> Daily &nbsp;&bull;&nbsp; 8:00 AM</span></div>
                                <span class="due-pill orange">In 14 hrs</span><button class="more-btn" type="button" aria-label="More actions"><i class="bi bi-three-dots-vertical"></i></button>
                            </article>
                        </div>
                        <a class="view-reminders" href="#"><i class="bi bi-list-ul"></i> View All Reminders <i class="bi bi-chevron-right ms-auto"></i></a>
                    </section>

                    <section class="panel section-card">
                        <div class="section-title"><h2>Today's Schedule</h2></div>
                        <div class="schedule-card">
                            <div class="timeline-times">
                                <div class="time-row"><span>10:00 AM</span><span class="time-dot"></span></div>
                                <div class="time-row"><span>03:00 PM</span><span class="time-dot orange"></span></div>
                                <div class="time-row"><span>09:00 PM</span><span class="time-dot purple"></span></div>
                            </div>
                            <div class="schedule-list">
                                <article class="schedule-item"><span class="timeline-icon"><i class="bi bi-capsule"></i></span><div><h3>Paracetamol 500mg <span class="tag ms-2">Medication</span></h3><p>Take 1 tablet</p></div><span class="status-tag">Upcoming</span></article>
                                <article class="schedule-item"><span class="timeline-icon orange"><i class="bi bi-droplet"></i></span><div><h3>Hydration <span class="tag orange ms-2">Task</span></h3><p>Drink water</p></div><span class="status-tag">Upcoming</span></article>
                                <article class="schedule-item"><span class="timeline-icon purple"><i class="bi bi-capsule"></i></span><div><h3>Cetirizine 10mg <span class="tag ms-2">Medication</span></h3><p>Take 1 tablet at bedtime</p></div><span class="status-tag">Upcoming</span></article>
                            </div>
                        </div>
                    </section>

                    <section class="panel section-card">
                        <div class="section-title"><h2>Reminder History</h2><a class="view-all" href="#">View All</a></div>
                        <div class="history-list">
                            <article class="history-row"><span class="history-check"><i class="bi bi-check"></i></span><span class="reminder-icon green"><i class="bi bi-calendar3"></i></span><div><h3>Follow-up Consultation</h3><p>May 14, 2025 &nbsp;&bull;&nbsp; 09:30 AM</p></div><span class="tag green">Completed</span></article>
                            <article class="history-row"><span class="history-check"><i class="bi bi-check"></i></span><span class="reminder-icon"><i class="bi bi-capsule"></i></span><div><h3>Amoxicillin 500mg</h3><p>May 14, 2025 &nbsp;&bull;&nbsp; 12:00 PM</p></div><span class="tag green">Completed</span></article>
                            <article class="history-row"><span class="history-check"><i class="bi bi-check"></i></span><span class="reminder-icon orange"><i class="bi bi-droplet"></i></span><div><h3>Hydration</h3><p>May 14, 2025 &nbsp;&bull;&nbsp; 08:00 AM</p></div><span class="tag green">Completed</span></article>
                        </div>
                    </section>
                </div>

                <aside class="right-column">
                    <section class="panel section-card">
                        <div class="section-title"><h2>Reminder Overview</h2><a class="view-all" href="#">This Week <i class="bi bi-chevron-down"></i></a></div>
                        <div class="overview-grid">
                            <div class="overview-tile"><div><strong>7</strong><span>All Reminders</span></div><span class="tile-icon"><i class="bi bi-calendar-check"></i></span></div>
                            <div class="overview-tile"><div><strong>3</strong><span>Medications</span></div><span class="tile-icon green"><i class="bi bi-capsule"></i></span></div>
                            <div class="overview-tile"><div><strong>2</strong><span>Appointments</span></div><span class="tile-icon green"><i class="bi bi-calendar3"></i></span></div>
                            <div class="overview-tile"><div><strong>2</strong><span>Tasks</span></div><span class="tile-icon orange"><i class="bi bi-check-circle"></i></span></div>
                        </div>
                    </section>

                    <section class="panel section-card">
                        <div class="section-title"><h2>Quick Actions</h2></div>
                        <div class="quick-actions">
                            <button class="quick-btn" type="button"><i class="bi bi-plus-lg"></i> Add Medication Reminder</button>
                            <button class="quick-btn blue" type="button"><i class="bi bi-plus-lg"></i> Add Appointment</button>
                            <button class="quick-btn orange" type="button"><i class="bi bi-plus-lg"></i> Add Health Task</button>
                            <button class="quick-btn purple" type="button"><i class="bi bi-book"></i> View Health Tips</button>
                        </div>
                    </section>

                    <section class="panel section-card">
                        <div class="section-title"><h2>Tips for You</h2><a class="view-all" href="#">View All</a></div>
                        <div class="tip-list">
                            <a class="tip-row" href="#"><i class="bi bi-lightbulb"></i><strong>Take medications as prescribed by your doctor.</strong><i class="bi bi-chevron-right"></i></a>
                            <a class="tip-row blue" href="#"><i class="bi bi-droplet"></i><strong>Drink plenty of water every day.</strong><i class="bi bi-chevron-right"></i></a>
                            <a class="tip-row blue" href="#"><i class="bi bi-droplet-half"></i><strong>Get enough sleep for a healthier you.</strong><i class="bi bi-chevron-right"></i></a>
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
            if (event.key === "Escape") setSidebar(false);
        });
    </script>
</body>
</html>
