<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Patient Dashboard | CLSU Infirmary Telemedicine System</title>
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
            --gold: #f5c542;
            --orange: #ff8a00;
            --purple: #087d32;
            --line: #e1e7ef;
            --page: #fbfcfa;
            --shadow: 0 14px 36px rgba(24, 39, 75, .08);
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
            grid-template-columns: 280px 1fr;
            min-height: 100vh;
        }

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
            font-size: 1.28rem;
            font-weight: 900;
            line-height: 1.1;
        }

        .brand span {
            color: #111;
            font-weight: 700;
        }

        .patient-mini {
            display: flex;
            align-items: center;
            gap: .95rem;
            margin-bottom: 2.4rem;
            padding-left: .15rem;
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

        .avatar {
            display: grid;
            place-items: center;
            width: 64px;
            height: 64px;
            border-radius: 50%;
            border: 1px solid #d4dbe7;
            color: #fff;
            background: linear-gradient(135deg, #f3b79b 0%, #253055 100%);
            font-size: 1.85rem;
            overflow: hidden;
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
        body.sidebar-collapsed .patient-mini > div:last-child,
        body.sidebar-collapsed .sidebar-collapse span {
            display: none;
        }

        body.sidebar-collapsed .brand img,
        body.sidebar-collapsed .avatar {
            width: 48px;
            height: 48px;
        }

        body.sidebar-collapsed .patient-mini {
            justify-content: center;
            gap: 0;
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

        .nav-list {
            display: grid;
            gap: .55rem;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .nav-link {
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
            background: #ff1e22;
            font-size: .82rem;
            font-weight: 900;
        }

        .nav-divider {
            height: 1px;
            margin: 2.2rem .25rem;
            background: var(--line);
        }

        .main {
            padding: 1.9rem 2rem 1.2rem;
        }

        .menu-toggle,
        .sidebar-overlay {
            display: none;
        }

        .topbar {
            display: grid;
            grid-template-columns: 1fr minmax(260px, 420px) auto;
            align-items: center;
            gap: 1.4rem;
            margin-bottom: 2rem;
        }

        .page-title h1 {
            margin: 0 0 .35rem;
            font-size: clamp(2rem, 3vw, 2.75rem);
            font-weight: 950;
            letter-spacing: 0;
        }

        .page-title p {
            margin: 0;
            color: #34426f;
            font-size: 1.02rem;
        }

        .search-box {
            position: relative;
        }

        .search-box input {
            width: 100%;
            height: 50px;
            padding: 0 3.25rem 0 1.4rem;
            border: 1px solid #cfd8ea;
            border-radius: 10px;
            color: var(--ink);
            background: #fff;
            outline: none;
        }

        .search-box i {
            position: absolute;
            top: 50%;
            right: 1rem;
            color: #6370a6;
            font-size: 1.6rem;
            transform: translateY(-50%);
        }

        .top-actions {
            display: flex;
            align-items: center;
            gap: 1.4rem;
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

        .dashboard-grid {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 430px;
            gap: 1.5rem;
        }

        .stack {
            display: grid;
            gap: 1.45rem;
        }

        .panel {
            border: 1px solid var(--line);
            border-radius: 10px;
            background: #fff;
            box-shadow: var(--shadow);
        }

        .active-consultation {
            position: relative;
            display: grid;
            grid-template-columns: minmax(0, 1fr) 220px;
            gap: 1.2rem;
            min-height: 245px;
            padding: 1.9rem 1.7rem;
            overflow: hidden;
            border-color: #bfe8c9;
            background:
                radial-gradient(circle at 72% 50%, rgba(7, 152, 58, .1), transparent 17rem),
                linear-gradient(135deg, #f9fffb, #eefaf2);
        }

        .active-consultation::after {
            content: "";
            position: absolute;
            right: 18%;
            bottom: -22px;
            width: 240px;
            height: 240px;
            border-radius: 50%;
            background: rgba(7, 152, 58, .09);
        }

        .status-line {
            display: inline-flex;
            align-items: center;
            gap: .55rem;
            color: var(--green-dark);
            font-weight: 900;
        }

        .status-line::before,
        .status-line::after {
            content: "";
            width: 9px;
            height: 9px;
            border-radius: 50%;
            background: #34c76b;
            box-shadow: 0 0 0 4px rgba(52, 199, 107, .15);
        }

        .consult-id {
            margin: 1rem 0 1.25rem;
            font-size: clamp(1.45rem, 2.3vw, 2.05rem);
            font-weight: 950;
        }

        .urgent,
        .doctor-row,
        .wait-time {
            display: flex;
            align-items: center;
            gap: .75rem;
            margin-bottom: 1rem;
        }

        .urgent {
            color: #a94f00;
            font-weight: 900;
        }

        .urgent i {
            color: var(--orange);
            font-size: 1.65rem;
        }

        .doctor-icon {
            display: grid;
            place-items: center;
            width: 46px;
            height: 46px;
            border-radius: 50%;
            color: var(--green-dark);
            background: #e9f5e9;
            font-size: 1.45rem;
        }

        .doctor-row strong {
            font-weight: 900;
        }

        .pill {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 30px;
            padding: .3rem .9rem;
            border-radius: 999px;
            font-weight: 800;
            font-size: .9rem;
        }

        .pill-green {
            color: var(--green-dark);
            background: #dff8e7;
        }

        .wait-time {
            margin: 0;
            color: #394575;
        }

        .consult-actions {
            position: relative;
            z-index: 1;
            display: grid;
            align-content: center;
            gap: .8rem;
        }

        .btn-main,
        .btn-outline-main {
            min-height: 48px;
            border-radius: 9px;
            font-weight: 900;
        }

        .btn-main {
            border: 0;
            color: #fff;
            background: linear-gradient(180deg, #0aa13f, #006824);
        }

        .btn-outline-main {
            border: 1px solid #9ed9af;
            color: var(--ink);
            background: #fff;
        }

        .section-card {
            padding: 1.25rem 1.35rem;
        }

        .section-title {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1rem;
        }

        .section-title h2 {
            margin: 0;
            font-size: 1.05rem;
            font-weight: 950;
        }

        .view-all {
            color: var(--green-dark);
            font-size: .9rem;
            font-weight: 900;
        }

        .quick-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 1.25rem;
        }

        .quick-card {
            position: relative;
            display: grid;
            place-items: center;
            min-height: 140px;
            padding: 1rem .6rem;
            border: 1px solid #e6ebf4;
            border-radius: 10px;
            background: #fff;
            box-shadow: 0 10px 22px rgba(24, 39, 75, .06);
            text-align: center;
            font-weight: 900;
        }

        .quick-card i {
            margin-bottom: .7rem;
            color: var(--green);
            font-size: 2.1rem;
        }

        .quick-card.blue i {
            color: var(--blue);
        }

        .quick-card.orange i {
            color: var(--orange);
        }

        .quick-card.purple i {
            color: var(--purple);
        }

        .quick-card .floating-badge {
            position: absolute;
            top: .55rem;
            right: 1.2rem;
        }

        .tips-card {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 160px;
            align-items: center;
            gap: 1.2rem;
        }

        .tips-card h2 {
            margin: 0 0 .55rem;
            font-size: 1.1rem;
            font-weight: 950;
        }

        .tips-card p {
            margin: 0 0 1rem;
            color: #34426f;
            line-height: 1.55;
        }

        .tip-controls {
            display: flex;
            align-items: center;
            justify-content: end;
            gap: 1.25rem;
            color: #5d697d;
            font-size: 1.45rem;
        }

        .dots {
            display: inline-flex;
            gap: .8rem;
        }

        .dots span {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: #d5deee;
        }

        .dots span.active {
            background: var(--green);
        }

        .notice {
            display: grid;
            grid-template-columns: 42px 1fr auto;
            align-items: center;
            gap: 1rem;
            padding: 1rem 1.35rem;
            border-color: #f1d68a;
            background: #fffbef;
        }

        .notice i {
            color: #a86300;
            font-size: 2rem;
        }

        .notice h2 {
            margin: 0 0 .25rem;
            color: #8a3f00;
            font-size: 1rem;
            font-weight: 950;
        }

        .notice p {
            margin: 0;
            color: #2f3c66;
        }

        .right-column {
            display: grid;
            gap: 1.45rem;
            align-content: start;
        }

        .timeline-list {
            display: grid;
            gap: 1rem;
        }

        .timeline-item h3 {
            margin: 0 0 .25rem;
            font-size: .95rem;
            font-weight: 950;
        }

        .timeline-item p {
            margin: 0;
            color: #34426f;
            font-size: .9rem;
        }

        .tag {
            min-width: max-content;
            padding: .28rem .7rem;
            border-radius: 999px;
            font-size: .78rem;
            font-weight: 900;
        }

        .tag.blue {
            color: #1675d1;
            background: #e6f2ff;
        }

        .tag.orange {
            color: #c55a00;
            background: #fff0d9;
        }

        .tag.purple {
            color: #087d32;
            background: #efe7ff;
        }

        .timeline-list {
            position: relative;
            padding-left: .15rem;
        }

        .timeline-list::before {
            content: "";
            position: absolute;
            left: 16px;
            top: 20px;
            bottom: 24px;
            width: 3px;
            background: #d6e1ef;
        }

        .timeline-item {
            position: relative;
            display: grid;
            grid-template-columns: 34px 1fr auto;
            align-items: center;
            gap: .9rem;
        }

        .timeline-dot {
            position: relative;
            z-index: 1;
            display: grid;
            place-items: center;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            color: #fff;
            background: var(--green);
            font-size: .9rem;
        }

        .timeline-dot.current {
            background: var(--blue);
        }

        .support-card {
            display: grid;
            grid-template-columns: 82px 1fr;
            align-items: center;
            gap: 1.25rem;
            padding: 1.8rem;
            border-color: #bee7c8;
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
            font-size: 2.45rem;
        }

        .support-card h2 {
            margin: 0 0 .55rem;
            color: var(--green-dark);
            font-size: 1.1rem;
            font-weight: 950;
        }

        .support-card p {
            margin: 0 0 .9rem;
            color: #34426f;
            line-height: 1.5;
        }

        .btn-soft {
            min-height: 38px;
            padding-inline: 1.3rem;
            border: 1px solid #a8ddb7;
            border-radius: 8px;
            color: var(--green-dark);
            background: #f8fffa;
            font-weight: 900;
        }

        @media (max-width: 1400px) {
            .dashboard-grid {
                grid-template-columns: 1fr;
            }

            .right-column {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .support-card {
                grid-column: 1 / -1;
            }
        }

        @media (max-width: 1180px) {
            .app-shell,
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
                width: min(82vw, 310px);
                height: 100vh;
                transform: translateX(-100%);
                transition: transform .24s ease;
                box-shadow: 12px 0 36px rgba(7, 20, 56, .18);
            }

            body.sidebar-open .sidebar {
                transform: translateX(0);
            }

            .nav-list {
                grid-template-columns: 1fr;
            }

            .main {
                padding-top: 5rem;
            }

            .top-actions {
                display: none;
            }
        }

        @media (max-width: 900px) {
            .main {
                padding: 1rem;
            }

            .topbar,
            .active-consultation,
            .tips-card,
            .notice {
                grid-template-columns: 1fr;
            }

            .quick-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .right-column {
                grid-template-columns: 1fr;
            }

            .top-actions,
            .tip-controls {
                justify-content: start;
            }
        }

        @media (max-width: 620px) {
            .sidebar {
                padding: 1rem;
            }

            .brand,
            .patient-mini {
                margin-bottom: 1.4rem;
            }

            .nav-list {
                grid-template-columns: 1fr;
            }

            .timeline-item {
                grid-template-columns: 46px 1fr;
            }

            .timeline-item > p {
                grid-column: 2;
            }
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
                    <li><a class="nav-link active" href="dashboard.php"><i class="bi bi-house-door"></i> Dashboard</a></li>
                    <li><a class="nav-link" href="newconsultation.php"><i class="bi bi-patch-plus"></i> New Consultation</a></li>
                    <li><a class="nav-link" href="myconsultation.php"><i class="bi bi-chat-dots"></i> My Consultation</a></li>
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
                    <h1>Dashboard</h1>
                    <p>Good morning, Jane! How can we help you today?</p>
                </div>

                <label class="search-box" aria-label="Search">
                    <input type="search" placeholder="Search anything...">
                    <i class="bi bi-search"></i>
                </label>

                <div class="top-actions">
                    <button class="bell" type="button" aria-label="Notifications">
                        <i class="bi bi-bell"></i>
                        <span>4</span>
                    </button>
                </div>
            </header>

            <div class="dashboard-grid">
                <div class="stack">
                    <section class="panel active-consultation" aria-labelledby="active-consultation-title">
                        <div>
                            <span class="status-line">You have an active consultation</span>
                            <h2 class="consult-id" id="active-consultation-title">CONS-2025-000123</h2>

                            <div class="urgent">
                                <i class="bi bi-exclamation-triangle"></i>
                                Level 2 - Urgent
                            </div>

                            <div class="doctor-row">
                                <span class="doctor-icon" aria-hidden="true"><i class="bi bi-hospital"></i></span>
                                <strong>Dr. Maria Santos (Physician)</strong>
                                <span class="pill pill-green">Online</span>
                            </div>

                            <p class="wait-time">
                                <i class="bi bi-clock"></i>
                                Estimated wait time: 20 - 30 mins
                            </p>
                        </div>

                        <div class="consult-actions">
                            <a class="btn btn-main" href="myconsultation.php">Go to My Consultation <i class="bi bi-chevron-right ms-2"></i></a>
                            <a class="btn btn-outline-main" href="myconsultation.php">View Details</a>
                        </div>
                    </section>

                    <section class="panel section-card" aria-labelledby="quick-access-title">
                        <div class="section-title">
                            <h2 id="quick-access-title">Quick Access</h2>
                        </div>

                        <div class="quick-grid">
                            <a class="quick-card" href="newconsultation.php">
                                <span><i class="bi bi-chat-heart"></i><br>New<br>Consultation</span>
                            </a>
                            <a class="quick-card blue" href="myconsultation.php">
                                <span><i class="bi bi-chat-dots"></i><br>My<br>Consultation</span>
                            </a>
                            <a class="quick-card orange" href="notification.php">
                                <span class="nav-badge floating-badge">4</span>
                                <span><i class="bi bi-bell"></i><br>Notifications</span>
                            </a>
                            <a class="quick-card" href="#">
                                <span><i class="bi bi-file-earmark-medical"></i><br>Health<br>Records</span>
                            </a>
                        </div>
                    </section>

                    <section class="panel section-card tips-card" aria-labelledby="health-tips-title">
                        <div>
                            <h2 id="health-tips-title">Stay hydrated, stay healthy!</h2>
                            <p>Drinking enough water helps your body function properly, improves energy, and keeps your mind sharp.</p>
                            <a class="btn btn-soft" href="#">See More Tips</a>
                        </div>
                        <div class="tip-controls" aria-hidden="true">
                            <i class="bi bi-arrow-left"></i>
                            <span class="dots"><span class="active"></span><span></span><span></span></span>
                            <i class="bi bi-chevron-right"></i>
                        </div>
                    </section>

                    <section class="panel notice" aria-labelledby="notice-title">
                        <i class="bi bi-bell"></i>
                        <div>
                            <h2 id="notice-title">Don't forget!</h2>
                            <p>Keep your notifications on so you won't miss important updates about your consultation.</p>
                        </div>
                        <a class="btn btn-outline-warning fw-bold" href="notification.php">Manage Notifications</a>
                    </section>
                </div>

                <aside class="right-column">
                    <section class="panel section-card" aria-labelledby="timeline-title">
                        <div class="section-title">
                            <h2 id="timeline-title">Consultation Timeline</h2>
                            <a class="view-all" href="myconsultation.php">View All</a>
                        </div>

                        <div class="timeline-list">
                            <div class="timeline-item">
                                <span class="timeline-dot"><i class="bi bi-check"></i></span>
                                <h3>Request Submitted</h3>
                                <p>May 16, 10:32 AM</p>
                            </div>
                            <div class="timeline-item">
                                <span class="timeline-dot"><i class="bi bi-check"></i></span>
                                <h3>Triage Completed (Level 2 - Urgent)</h3>
                                <p>May 16, 10:33 AM</p>
                            </div>
                            <div class="timeline-item">
                                <span class="timeline-dot"><i class="bi bi-check"></i></span>
                                <h3>Assigned to Dr. Maria Santos</h3>
                                <p>May 16, 10:35 AM</p>
                            </div>
                            <div class="timeline-item">
                                <span class="timeline-dot current"><i class="bi bi-dot"></i></span>
                                <h3>Ongoing Consultation</h3>
                                <p>May 16, 10:32 AM</p>
                            </div>
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
    </script>
</body>
</html>
