<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Profile | CLSU Infirmary Telemedicine System</title>
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
            padding: 1.8rem 2rem;
        }

        .menu-toggle,
        .sidebar-overlay {
            display: none;
        }

        .topbar {
            display: grid;
            grid-template-columns: 1fr minmax(260px, 430px) auto;
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

        .profile-grid {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 350px;
            gap: 1.4rem;
        }

        .stack {
            display: grid;
            gap: 1rem;
        }

        .panel {
            border: 1px solid var(--line);
            border-radius: 10px;
            background: #fff;
            box-shadow: var(--shadow);
        }

        .profile-tabs {
            display: flex;
            gap: 1.2rem;
            min-height: 64px;
            padding: 0 1.25rem;
            overflow-x: auto;
        }

        .profile-tab {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: .65rem;
            min-width: 220px;
            border: 0;
            border-bottom: 3px solid transparent;
            color: #34426f;
            background: transparent;
            font-weight: 900;
            white-space: nowrap;
        }

        .profile-tab i {
            font-size: 1.2rem;
        }

        .profile-tab.active {
            color: var(--green-dark);
            border-bottom-color: var(--green);
        }

        .form-card {
            padding: 1.5rem 1.35rem 1.2rem;
        }

        .section-heading {
            margin-bottom: 1.3rem;
        }

        .section-heading h2 {
            margin: 0 0 .4rem;
            font-size: 1.15rem;
            font-weight: 950;
        }

        .section-heading p {
            margin: 0;
            color: #34426f;
        }

        .profile-form-layout {
            display: grid;
            grid-template-columns: 250px minmax(0, 1fr);
            gap: 1.8rem;
            align-items: start;
        }

        .photo-block {
            display: grid;
            justify-items: center;
            gap: .9rem;
            padding-top: 1rem;
            text-align: center;
        }

        .profile-photo {
            position: relative;
            display: grid;
            place-items: center;
            width: 180px;
            height: 180px;
            border-radius: 50%;
            color: #fff;
            background:
                radial-gradient(circle at 50% 35%, #dff0ff 0 34%, transparent 35%),
                linear-gradient(145deg, #dbe7f8, #edf4ff);
            overflow: hidden;
        }

        .profile-photo::before {
            content: "JD";
            display: grid;
            place-items: center;
            width: 96px;
            height: 96px;
            border-radius: 50%;
            background: linear-gradient(145deg, var(--green), var(--green-dark));
            font-size: 2rem;
            font-weight: 950;
        }

        .camera-button {
            position: absolute;
            right: 22px;
            bottom: 22px;
            display: grid;
            place-items: center;
            width: 42px;
            height: 42px;
            border: 3px solid #fff;
            border-radius: 50%;
            color: #fff;
            background: #0d2347;
            font-size: 1.1rem;
        }

        .photo-help {
            margin: 0;
            color: #5365a1;
            font-size: .85rem;
        }

        .btn-soft {
            min-height: 42px;
            padding-inline: 1.3rem;
            border: 1px solid #a8ddb7;
            border-radius: 8px;
            color: var(--green-dark);
            background: #fff;
            font-weight: 900;
        }

        .fields-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 1rem 1.25rem;
        }

        .field.full {
            grid-column: 1 / -1;
        }

        .field label {
            display: block;
            margin-bottom: .4rem;
            color: #34426f;
            font-size: .9rem;
            font-weight: 850;
        }

        .input-shell {
            position: relative;
        }

        .input-shell input,
        .input-shell select {
            width: 100%;
            height: 46px;
            padding: 0 1rem;
            border: 1px solid #cfd8ea;
            border-radius: 8px;
            color: var(--ink);
            background: #fff;
            outline: none;
        }

        .input-shell input[disabled] {
            color: #6d789e;
            background: #f1f4f9;
        }

        .input-shell i {
            position: absolute;
            top: 50%;
            right: .9rem;
            color: #5365a1;
            transform: translateY(-50%);
        }

        .verified-note {
            grid-column: 1 / -1;
            display: grid;
            grid-template-columns: 42px 1fr;
            align-items: center;
            gap: .8rem;
            padding: .9rem 1rem;
            border: 1px solid #cfeedd;
            border-radius: 8px;
            background: #f3fff7;
        }

        .verified-note i {
            color: var(--green);
            font-size: 1.45rem;
        }

        .verified-note strong {
            display: block;
            color: var(--green-dark);
        }

        .verified-note p {
            margin: 0;
            color: #5365a1;
            font-size: .9rem;
        }

        .form-actions {
            grid-column: 1 / -1;
            display: flex;
            justify-content: flex-end;
            gap: .8rem;
        }

        .btn-main,
        .btn-outline-main {
            min-height: 40px;
            padding-inline: 1.6rem;
            border-radius: 8px;
            font-weight: 900;
        }

        .btn-main {
            border: 0;
            color: #fff;
            background: linear-gradient(180deg, #0aa13f, #006824);
        }

        .btn-outline-main {
            border: 1px solid #cfd8ea;
            color: #111;
            background: #fff;
        }

        .medical-card {
            overflow: hidden;
        }

        .medical-head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            padding: 1rem 1.35rem;
            border-bottom: 1px solid var(--line);
        }

        .medical-title {
            display: flex;
            align-items: center;
            gap: .85rem;
        }

        .medical-icon,
        .mini-icon,
        .summary-icon {
            display: grid;
            place-items: center;
            border-radius: 50%;
        }

        .medical-icon {
            width: 40px;
            height: 40px;
            color: var(--purple);
            background: #efe9ff;
            font-size: 1.35rem;
        }

        .medical-title h2 {
            margin: 0;
            font-size: 1.05rem;
            font-weight: 950;
        }

        .medical-title p {
            margin: 0;
            color: #34426f;
            font-size: .9rem;
        }

        .medical-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 1rem;
            padding: 1rem 1.35rem;
        }

        .medical-item {
            display: flex;
            align-items: center;
            gap: .8rem;
        }

        .mini-icon {
            width: 38px;
            height: 38px;
            color: var(--green);
            background: #dff8e7;
            font-size: 1.05rem;
        }

        .medical-item span {
            color: #5365a1;
            font-size: .82rem;
        }

        .medical-item strong {
            display: block;
            font-size: .9rem;
        }

        .right-column {
            display: grid;
            gap: 1rem;
            align-content: start;
        }

        .side-card {
            padding: 1.25rem;
        }

        .side-card h2 {
            margin: 0 0 1.2rem;
            font-size: 1.1rem;
            font-weight: 950;
        }

        .summary-list {
            display: grid;
            gap: 1rem;
        }

        .summary-item {
            display: grid;
            grid-template-columns: 42px 1fr auto;
            align-items: center;
            gap: .85rem;
        }

        .summary-icon {
            width: 42px;
            height: 42px;
            color: #5365a1;
            background: #eef4ff;
            font-size: 1.15rem;
        }

        .summary-item h3 {
            margin: 0;
            font-size: .9rem;
            font-weight: 950;
        }

        .summary-item p {
            margin: 0;
            color: #34426f;
        }

        .status-badge {
            padding: .25rem .65rem;
            border-radius: 999px;
            color: var(--green-dark);
            background: #dff8e7;
            font-weight: 900;
            font-size: .85rem;
        }

        .emergency-copy {
            margin: 0 0 1rem;
            color: #34426f;
            line-height: 1.55;
        }

        .wide-button {
            width: 100%;
            min-height: 52px;
        }

        @media (max-width: 1450px) {
            .profile-grid {
                grid-template-columns: 1fr;
            }

            .right-column {
                grid-template-columns: repeat(3, minmax(0, 1fr));
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
                padding: 1rem;
                transform: translateX(-100%);
                transition: transform .24s ease;
                box-shadow: 12px 0 36px rgba(7, 20, 56, .18);
            }

            body.sidebar-open .sidebar {
                transform: translateX(0);
            }

            .brand,
            .patient-mini {
                margin-bottom: 1rem;
            }

            .nav-list {
                grid-template-columns: 1fr;
            }

            .nav-divider {
                margin: 1rem .25rem;
            }

            .main {
                padding-top: 5rem;
            }

            .top-actions {
                display: none;
            }
        }

        @media (max-width: 920px) {
            .main {
                padding: 5rem 1rem 1rem;
            }

            .topbar,
            .profile-form-layout {
                grid-template-columns: 1fr;
            }

            .right-column {
                grid-template-columns: 1fr;
            }

            .fields-grid,
            .medical-grid {
                grid-template-columns: 1fr;
            }

            .profile-tabs {
                padding-inline: .8rem;
            }

            .profile-tab {
                min-width: max-content;
                padding-inline: .7rem;
            }

            .photo-block {
                padding-top: 0;
            }
        }

        @media (max-width: 620px) {
            .main {
                padding-inline: .75rem;
            }

            .brand img {
                width: 48px;
                height: 48px;
            }

            .brand strong {
                font-size: 1.08rem;
            }

            .nav-link {
                min-height: 48px;
                padding: .65rem .85rem;
            }

            .page-title h1 {
                font-size: 1.8rem;
            }

            .search-box input {
                height: 46px;
            }

            .form-card,
            .side-card {
                padding: 1rem;
            }

            .profile-photo {
                width: 140px;
                height: 140px;
            }

            .profile-photo::before {
                width: 76px;
                height: 76px;
                font-size: 1.5rem;
            }

            .camera-button {
                right: 12px;
                bottom: 12px;
            }

            .form-actions,
            .medical-head,
            .summary-item {
                grid-template-columns: 1fr;
            }

            .form-actions {
                display: grid;
            }

            .summary-item {
                display: grid;
                justify-items: start;
            }

            .summary-icon {
                display: none;
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
                    <li><a class="nav-link" href="dashboard.php"><i class="bi bi-house-door"></i> Dashboard</a></li>
                    <li><a class="nav-link" href="newconsultation.php"><i class="bi bi-patch-plus"></i> New Consultation</a></li>
                    <li><a class="nav-link" href="myconsultation.php"><i class="bi bi-chat-dots"></i> My Consultation</a></li>
                    <li>
                        <a class="nav-link" href="notification.php">
                            <i class="bi bi-bell"></i> Notifications
                            <span class="nav-badge">4</span>
                        </a>
                    </li>
                    <li><a class="nav-link active" href="profile.php"><i class="bi bi-card-list"></i> Profile</a></li>
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
                    <h1>My Profile</h1>
                    <p>Manage your personal information and account settings.</p>
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
                    <button class="profile-dot" type="button" aria-label="Profile">
                        <i class="bi bi-person-fill"></i>
                    </button>
                </div>
            </header>

            <div class="profile-grid">
                <div class="stack">
                    <section class="panel profile-tabs" aria-label="Profile settings tabs">
                        <button class="profile-tab active" type="button">
                            <i class="bi bi-person"></i>
                            Personal Information
                        </button>
                        <button class="profile-tab" type="button">
                            <i class="bi bi-lock"></i>
                            Account &amp; Security
                        </button>
                        <button class="profile-tab" type="button">
                            <i class="bi bi-gear"></i>
                            Preferences
                        </button>
                    </section>

                    <section class="panel form-card">
                        <div class="section-heading">
                            <h2>Personal Information</h2>
                            <p>Update your personal details.</p>
                        </div>

                        <div class="profile-form-layout">
                            <div class="photo-block">
                                <div class="profile-photo" aria-label="Profile photo placeholder">
                                    <button class="camera-button" type="button" aria-label="Change photo">
                                        <i class="bi bi-camera-fill"></i>
                                    </button>
                                </div>
                                <p class="photo-help">JPG, PNG or GIF. Max size 2MB</p>
                                <button class="btn btn-soft w-100" type="button">Change Photo</button>
                            </div>

                            <form class="fields-grid">
                                <div class="field">
                                    <label for="fullName">Full Name</label>
                                    <div class="input-shell">
                                        <input id="fullName" type="text" value="Jane Dela Cruz">
                                    </div>
                                </div>

                                <div class="field">
                                    <label for="studentId">Student ID Number</label>
                                    <div class="input-shell">
                                        <input id="studentId" type="text" value="2023-123456">
                                    </div>
                                </div>

                                <div class="field">
                                    <label for="courseYear">Course &amp; Year</label>
                                    <div class="input-shell">
                                        <select id="courseYear">
                                            <option>BSIT 2-1</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="field">
                                    <label for="college">College</label>
                                    <div class="input-shell">
                                        <select id="college">
                                            <option>College of Engineering</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="field">
                                    <label for="email">Email Address</label>
                                    <div class="input-shell">
                                        <input id="email" type="email" value="jane.delacruz@clsu2.edu.ph" disabled>
                                    </div>
                                </div>

                                <div class="field">
                                    <label for="contact">Contact Number</label>
                                    <div class="input-shell">
                                        <input id="contact" type="tel" value="+63 912 345 6789">
                                    </div>
                                </div>

                                <div class="field">
                                    <label for="birthDate">Date of Birth</label>
                                    <div class="input-shell">
                                        <input id="birthDate" type="text" value="March 15, 2004">
                                        <i class="bi bi-calendar2-week"></i>
                                    </div>
                                </div>

                                <div class="field">
                                    <label for="gender">Gender</label>
                                    <div class="input-shell">
                                        <select id="gender">
                                            <option>Female</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="field full">
                                    <label for="homeAddress">Home Address</label>
                                    <div class="input-shell">
                                        <input id="homeAddress" type="text" value="Brgy. Rizal, Science City of Muñoz, Nueva Ecija, Philippines">
                                    </div>
                                </div>

                                <div class="verified-note">
                                    <i class="bi bi-shield-check"></i>
                                    <div>
                                        <strong>Email Verified</strong>
                                        <p>Your email address is verified.</p>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button class="btn btn-outline-main" type="button">Cancel</button>
                                    <button class="btn btn-main" type="button">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </section>

                    <section class="panel medical-card">
                        <div class="medical-head">
                            <div class="medical-title">
                                <span class="medical-icon"><i class="bi bi-heart-pulse"></i></span>
                                <div>
                                    <h2>Medical Information (Optional)</h2>
                                    <p>This information is used to provide you better and safer care.</p>
                                </div>
                            </div>
                            <button class="btn btn-outline-main" type="button">Manage Medical Information</button>
                        </div>

                        <div class="medical-grid">
                            <div class="medical-item">
                                <span class="mini-icon"><i class="bi bi-droplet"></i></span>
                                <div><span>Blood Type</span><strong>O+</strong></div>
                            </div>
                            <div class="medical-item">
                                <span class="mini-icon"><i class="bi bi-lungs"></i></span>
                                <div><span>Allergies</span><strong>No known allergies</strong></div>
                            </div>
                            <div class="medical-item">
                                <span class="mini-icon"><i class="bi bi-heart"></i></span>
                                <div><span>Chronic Conditions</span><strong>None</strong></div>
                            </div>
                            <div class="medical-item">
                                <span class="mini-icon"><i class="bi bi-capsule"></i></span>
                                <div><span>Current Medications</span><strong>None</strong></div>
                            </div>
                            <div class="medical-item">
                                <span class="mini-icon"><i class="bi bi-arrow-clockwise"></i></span>
                                <div><span>Last Updated</span><strong>May 10, 2025</strong></div>
                            </div>
                        </div>
                    </section>
                </div>

                <aside class="right-column">
                    <section class="panel side-card">
                        <h2>Account Summary</h2>
                        <div class="summary-list">
                            <div class="summary-item">
                                <span class="summary-icon"><i class="bi bi-person"></i></span>
                                <h3>Member Since</h3>
                                <p>May 10, 2025</p>
                            </div>
                            <div class="summary-item">
                                <span class="summary-icon"><i class="bi bi-person-badge"></i></span>
                                <h3>Account Type</h3>
                                <p>Student</p>
                            </div>
                            <div class="summary-item">
                                <span class="summary-icon"><i class="bi bi-shield-check"></i></span>
                                <h3>Status</h3>
                                <p><span class="status-badge">Active</span></p>
                            </div>
                            <div class="summary-item">
                                <span class="summary-icon"><i class="bi bi-clock"></i></span>
                                <h3>Last Login</h3>
                                <p>May 16, 2025 • 10:15 AM</p>
                            </div>
                        </div>
                    </section>

                    <section class="panel side-card">
                        <h2>Emergency Contact</h2>
                        <p class="emergency-copy">Add an emergency contact person for your safety and quick assistance.</p>
                        <button class="btn btn-outline-main wide-button" type="button">
                            <i class="bi bi-plus-lg me-2"></i>Add Emergency Contact
                        </button>
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
