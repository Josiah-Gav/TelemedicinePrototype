<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Notifications | CLSU Infirmary Telemedicine System</title>
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
            --red: #ff2d2d;
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

        .notifications-grid {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 350px;
            gap: 1.4rem;
        }

        .panel {
            border: 1px solid var(--line);
            border-radius: 10px;
            background: #fff;
            box-shadow: var(--shadow);
        }

        .tabs-card {
            display: flex;
            align-items: center;
            gap: .9rem;
            min-height: 64px;
            padding: 0 .25rem 0 1rem;
            overflow-x: auto;
        }

        .notification-tab {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: .6rem;
            min-height: 64px;
            padding: 0 1.1rem;
            border: 0;
            border-bottom: 3px solid transparent;
            color: #27335f;
            background: transparent;
            font-weight: 900;
            white-space: nowrap;
        }

        .notification-tab.active {
            color: var(--green-dark);
            border-bottom-color: var(--green);
            background: linear-gradient(90deg, #effbf3, transparent);
        }

        .count-pill {
            display: grid;
            place-items: center;
            min-width: 30px;
            height: 30px;
            padding: 0 .5rem;
            border-radius: 999px;
            color: #4b587d;
            background: #e4e9f2;
            font-weight: 950;
            font-size: .85rem;
        }

        .notification-tab.active .count-pill {
            color: var(--green-dark);
            background: #bfeecf;
        }

        .mark-read {
            margin-left: auto;
            padding-inline: 1.2rem;
            border: 0;
            color: var(--green-dark);
            background: transparent;
            font-weight: 900;
            white-space: nowrap;
        }

        .notification-list {
            overflow: hidden;
            margin-top: 1rem;
        }

        .notification-item {
            display: grid;
            grid-template-columns: 82px minmax(0, 1fr) auto 28px 28px;
            align-items: center;
            gap: 1rem;
            padding: 1.2rem 1.35rem;
            border-bottom: 1px solid var(--line);
            background: #fff;
        }

        .notification-item:last-child {
            border-bottom: 0;
        }

        .notice-icon {
            position: relative;
            display: grid;
            place-items: center;
            width: 70px;
            height: 70px;
            border-radius: 50%;
            color: var(--blue);
            background: #e6f2ff;
            font-size: 2rem;
        }

        .notice-icon.green {
            color: var(--green);
            background: #dff8e7;
        }

        .notice-icon.gold {
            color: #c77600;
            background: #fff3d8;
        }

        .notice-icon.purple {
            color: var(--purple);
            background: #efe7ff;
        }

        .notice-icon.gray {
            color: #5365a1;
            background: #eef2f8;
        }

        .mini-chat {
            position: absolute;
            right: -2px;
            bottom: 2px;
            display: grid;
            place-items: center;
            width: 24px;
            height: 24px;
            border: 2px solid #fff;
            border-radius: 50%;
            color: #fff;
            background: var(--blue);
            font-size: .75rem;
        }

        .notice-body h2 {
            margin: 0 0 .28rem;
            font-size: 1.05rem;
            font-weight: 950;
        }

        .notice-body p {
            margin: 0 0 .55rem;
            color: #34426f;
        }

        .notice-body .btn {
            min-height: 34px;
            padding: .25rem 1rem;
            border-radius: 6px;
            font-weight: 900;
        }

        .urgent-pill {
            display: inline-flex;
            min-height: 28px;
            align-items: center;
            padding: .2rem .8rem;
            border: 1px solid #ffc46e;
            border-radius: 999px;
            color: #a94f00;
            background: #fff5df;
            font-weight: 900;
            font-size: .86rem;
        }

        .notice-time {
            color: #34426f;
            text-align: right;
            white-space: nowrap;
        }

        .status-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: var(--green);
        }

        .status-dot.read {
            border: 2px solid #9ba7c3;
            background: transparent;
        }

        .more-btn {
            border: 0;
            color: #1d2c61;
            background: transparent;
            font-size: 1.2rem;
        }

        .load-more {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: .6rem;
            min-height: 60px;
            border-top: 1px solid var(--line);
            color: #273c82;
            font-weight: 900;
        }

        .right-column {
            display: grid;
            gap: 1rem;
            align-content: start;
        }

        .side-card {
            padding: 1.25rem;
        }

        .side-title {
            display: flex;
            align-items: center;
            gap: .75rem;
            margin-bottom: 1rem;
        }

        .side-title i {
            color: #253f7e;
            font-size: 1.2rem;
        }

        .side-title h2 {
            margin: 0;
            font-size: 1.05rem;
            font-weight: 950;
        }

        .filter-list,
        .preference-list,
        .quick-list {
            display: grid;
            gap: .9rem;
        }

        .filter-row,
        .pref-row,
        .quick-row {
            display: grid;
            grid-template-columns: 28px 1fr auto;
            align-items: center;
            gap: .75rem;
        }

        .check-square {
            display: grid;
            place-items: center;
            width: 20px;
            height: 20px;
            border: 2px solid #c8d1e3;
            border-radius: 4px;
            color: #fff;
            background: #fff;
            font-size: .85rem;
        }

        .check-square.checked {
            border-color: var(--green);
            background: var(--green);
        }

        .filter-row span,
        .pref-row span,
        .quick-row span {
            font-weight: 850;
        }

        .filter-count {
            display: grid;
            place-items: center;
            min-width: 28px;
            height: 28px;
            padding: 0 .45rem;
            border-radius: 999px;
            color: #5365a1;
            background: #e7ecf5;
            font-weight: 950;
        }

        .filter-count.green {
            color: var(--green-dark);
            background: #c9f1d5;
        }

        .toggle {
            position: relative;
            width: 42px;
            height: 24px;
            border-radius: 999px;
            background: #c8d1e3;
        }

        .toggle::after {
            content: "";
            position: absolute;
            top: 3px;
            left: 3px;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            background: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, .18);
        }

        .toggle.on {
            background: var(--green);
        }

        .toggle.on::after {
            left: 21px;
        }

        .wide-button {
            width: 100%;
            min-height: 42px;
            margin-top: 1rem;
            border-radius: 8px;
            font-weight: 900;
        }

        .quick-row {
            grid-template-columns: 28px 1fr 18px;
            min-height: 34px;
        }

        .quick-row i {
            color: #5365a1;
            font-size: 1.15rem;
        }

        .emergency-card {
            border-color: #ffd89d;
            background: #fff8ea;
        }

        .emergency-card h2 {
            display: flex;
            align-items: center;
            gap: .6rem;
            margin: 0 0 .8rem;
            color: #8a3f00;
            font-size: 1.05rem;
            font-weight: 950;
        }

        .emergency-card h2 i {
            color: var(--orange);
        }

        .emergency-card p {
            margin: 0 0 1rem;
            color: #34426f;
            line-height: 1.55;
        }

        .btn-danger-main {
            width: 100%;
            min-height: 44px;
            border: 0;
            border-radius: 8px;
            color: #fff;
            background: linear-gradient(180deg, #ff3333, #e51f1f);
            font-weight: 900;
        }

        @media (max-width: 1450px) {
            .notifications-grid {
                grid-template-columns: 1fr;
            }

            .right-column {
                grid-template-columns: repeat(2, minmax(0, 1fr));
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

            .topbar {
                grid-template-columns: 1fr;
            }

            .right-column {
                grid-template-columns: 1fr;
            }

            .tabs-card {
                align-items: stretch;
                padding-left: .65rem;
            }

            .mark-read {
                margin-left: 0;
            }

            .notification-item {
                grid-template-columns: 58px minmax(0, 1fr);
                align-items: start;
            }

            .notice-icon {
                width: 54px;
                height: 54px;
                font-size: 1.45rem;
            }

            .notice-time,
            .status-dot,
            .more-btn {
                grid-column: 2;
            }

            .notice-time {
                text-align: left;
            }
        }

        @media (max-width: 620px) {
            body {
                background: #fff;
            }

            .main {
                padding: 1rem .75rem .75rem;
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

            .menu-toggle {
                top: 1.05rem;
                left: .85rem;
                width: 34px;
                height: 34px;
                border: 0;
                color: #0c1b49;
                background: transparent;
                box-shadow: none;
                font-size: 1.35rem;
            }

            .topbar {
                grid-template-columns: minmax(0, 1fr) auto;
                gap: .8rem;
                margin-bottom: .85rem;
                padding-left: 2.65rem;
            }

            .page-title h1 {
                margin: 0;
                font-size: 1.12rem;
                line-height: 34px;
            }

            .page-title p {
                display: none;
            }

            .top-actions {
                display: flex;
                gap: .7rem;
            }

            .bell {
                width: 34px;
                height: 34px;
                font-size: 1.2rem;
            }

            .bell span {
                top: -3px;
                right: -4px;
                width: 18px;
                height: 18px;
                font-size: .68rem;
            }

            .profile-dot {
                width: 34px;
                height: 34px;
                font-size: 1.1rem;
            }

            .search-box {
                grid-column: 1 / -1;
                margin-left: -2.65rem;
            }

            .search-box input {
                height: 42px;
                padding-left: .95rem;
                border-radius: 6px;
                font-size: .82rem;
            }

            .search-box i {
                right: .85rem;
                font-size: 1.15rem;
            }

            .notifications-grid {
                display: block;
            }

            .right-column {
                display: none;
            }

            .panel {
                border-radius: 6px;
                box-shadow: none;
            }

            .tabs-card {
                min-height: 46px;
                margin-bottom: 0;
                padding: 0 .35rem;
                border-bottom: 0;
                border-radius: 6px 6px 0 0;
                gap: .35rem;
            }

            .notification-tab {
                min-height: 46px;
                padding: 0 .55rem;
                border-bottom-width: 2px;
                font-size: .76rem;
            }

            .count-pill {
                min-width: 20px;
                height: 20px;
                padding: 0 .35rem;
                font-size: .65rem;
            }

            .mark-read {
                display: none;
            }

            .notification-list {
                margin-top: 0;
                border-radius: 0 0 6px 6px;
            }

            .notification-item {
                position: relative;
                grid-template-columns: 50px minmax(0, 1fr) 56px;
                gap: .65rem;
                min-height: 122px;
                padding: 1.05rem .85rem;
                border-bottom-color: #eef2f7;
            }

            .notice-icon {
                width: 44px;
                height: 44px;
                font-size: 1.18rem;
            }

            .mini-chat {
                width: 18px;
                height: 18px;
                font-size: .58rem;
            }

            .notice-body h2 {
                max-width: 150px;
                margin-bottom: .24rem;
                font-size: .78rem;
                line-height: 1.28;
            }

            .notice-body p {
                margin-bottom: .45rem;
                font-size: .72rem;
                line-height: 1.45;
            }

            .notice-body .btn {
                min-height: 28px;
                padding: .16rem .65rem;
                border-radius: 4px;
                font-size: .7rem;
            }

            .urgent-pill {
                min-height: 18px;
                padding: .08rem .38rem;
                font-size: .58rem;
                vertical-align: text-top;
            }

            .notice-time {
                grid-column: 3;
                align-self: start;
                color: #31405f;
                font-size: .62rem;
                line-height: 1.25;
                text-align: right;
            }

            .status-dot {
                position: absolute;
                top: 50%;
                right: .8rem;
                width: 6px;
                height: 6px;
                transform: translateY(-50%);
            }

            .status-dot.read {
                display: none;
            }

            .more-btn {
                position: absolute;
                top: 1rem;
                right: .45rem;
                width: 24px;
                height: 24px;
                padding: 0;
                font-size: .95rem;
            }

            .load-more {
                min-height: 48px;
                font-size: .76rem;
            }

            .side-card {
                padding: 1rem;
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
                        <a class="nav-link active" href="notification.php">
                            <i class="bi bi-bell"></i> Notifications
                            <span class="nav-badge">4</span>
                        </a>
                    </li>
                    <li><a class="nav-link" href="healthreminders.php"><i class="bi bi-calendar2-heart"></i> Health Reminders</a></li>
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
                    <h1>Notifications</h1>
                    <p>Stay updated with your consultations and important alerts.</p>
                </div>

                <label class="search-box" aria-label="Search notifications">
                    <input type="search" placeholder="Search notifications...">
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

            <div class="notifications-grid">
                <div>
                    <section class="panel tabs-card" aria-label="Notification categories">
                        <button class="notification-tab active" type="button">All <span class="count-pill">4</span></button>
                        <button class="notification-tab" type="button">Unread <span class="count-pill">4</span></button>
                        <button class="notification-tab" type="button">Consultations <span class="count-pill">3</span></button>
                        <button class="notification-tab" type="button">System <span class="count-pill">1</span></button>
                        <button class="notification-tab" type="button">Reminders <span class="count-pill">0</span></button>
                        <button class="mark-read" type="button"><i class="bi bi-check2-all me-2"></i>Mark all as read</button>
                    </section>

                    <section class="panel notification-list" aria-label="Notifications list">
                        <article class="notification-item">
                            <span class="notice-icon">
                                <i class="bi bi-hospital"></i>
                                <span class="mini-chat"><i class="bi bi-chat-dots-fill"></i></span>
                            </span>
                            <div class="notice-body">
                                <h2>New message from Dr. Maria Santos</h2>
                                <p>You have a new message in your consultation CONS-2025-000123.</p>
                                <a class="btn btn-outline-primary" href="myconsultation.php">View Message</a>
                            </div>
                            <span class="notice-time">10:42 AM<br>May 16, 2025</span>
                            <span class="status-dot" aria-label="Unread"></span>
                            <button class="more-btn" type="button" aria-label="More options"><i class="bi bi-three-dots-vertical"></i></button>
                        </article>

                        <article class="notification-item">
                            <span class="notice-icon green"><i class="bi bi-check2"></i></span>
                            <div class="notice-body">
                                <h2>Your consultation is now ongoing</h2>
                                <p>Dr. Maria Santos has started your consultation.</p>
                                <a class="btn btn-outline-success" href="myconsultation.php">Go to Consultation</a>
                            </div>
                            <span class="notice-time">10:35 AM<br>May 16, 2025</span>
                            <span class="status-dot" aria-label="Unread"></span>
                            <button class="more-btn" type="button" aria-label="More options"><i class="bi bi-three-dots-vertical"></i></button>
                        </article>

                        <article class="notification-item">
                            <span class="notice-icon gold"><i class="bi bi-folder"></i></span>
                            <div class="notice-body">
                                <h2>Triage Completed (Level 2 - Urgent) <span class="urgent-pill ms-2">Urgent</span></h2>
                                <p>Your request has been reviewed. Please wait for the medical staff to assign your case.</p>
                                <a class="btn btn-outline-primary" href="myconsultation.php">View Details</a>
                            </div>
                            <span class="notice-time">10:25 AM<br>May 16, 2025</span>
                            <span class="status-dot" aria-label="Unread"></span>
                            <button class="more-btn" type="button" aria-label="More options"><i class="bi bi-three-dots-vertical"></i></button>
                        </article>

                        <article class="notification-item">
                            <span class="notice-icon purple"><i class="bi bi-people"></i></span>
                            <div class="notice-body">
                                <h2>You have been assigned to Nurse Anne Reyes</h2>
                                <p>Your consultation CONS-2025-000119 has been assigned.</p>
                                <a class="btn btn-outline-primary" href="myconsultation.php">View Details</a>
                            </div>
                            <span class="notice-time">9:20 AM<br>May 16, 2025</span>
                            <span class="status-dot" aria-label="Unread"></span>
                            <button class="more-btn" type="button" aria-label="More options"><i class="bi bi-three-dots-vertical"></i></button>
                        </article>

                        <article class="notification-item">
                            <span class="notice-icon"><i class="bi bi-clipboard-check"></i></span>
                            <div class="notice-body">
                                <h2>Consultation Completed</h2>
                                <p>Your consultation CONS-2025-000101 has been marked as completed.</p>
                                <a class="btn btn-outline-primary" href="myconsultation.php">View Summary</a>
                            </div>
                            <span class="notice-time">Yesterday<br>6:15 PM</span>
                            <span class="status-dot read" aria-label="Read"></span>
                            <button class="more-btn" type="button" aria-label="More options"><i class="bi bi-three-dots-vertical"></i></button>
                        </article>

                        <article class="notification-item">
                            <span class="notice-icon gray"><i class="bi bi-bell"></i></span>
                            <div class="notice-body">
                                <h2>System Maintenance Notice</h2>
                                <p>The system will undergo maintenance on May 18, 2025 from 1:00 AM to 3:00 AM.</p>
                            </div>
                            <span class="notice-time">May 15, 2025<br>5:00 PM</span>
                            <span class="status-dot read" aria-label="Read"></span>
                            <button class="more-btn" type="button" aria-label="More options"><i class="bi bi-three-dots-vertical"></i></button>
                        </article>

                        <a class="load-more" href="#">Load more notifications <i class="bi bi-chevron-down"></i></a>
                    </section>
                </div>

                <aside class="right-column">
                    <section class="panel side-card">
                        <div class="side-title">
                            <i class="bi bi-funnel"></i>
                            <h2>Notification Filters</h2>
                        </div>

                        <div class="filter-list">
                            <div class="filter-row"><span class="check-square checked"><i class="bi bi-check"></i></span><span>All Notifications</span><strong class="filter-count green">4</strong></div>
                            <div class="filter-row"><span class="check-square checked"><i class="bi bi-check"></i></span><span>Unread</span><strong class="filter-count green">4</strong></div>
                            <div class="filter-row"><span class="check-square checked"><i class="bi bi-check"></i></span><span>Consultations</span><strong class="filter-count">3</strong></div>
                            <div class="filter-row"><span class="check-square checked"><i class="bi bi-check"></i></span><span>System</span><strong class="filter-count">1</strong></div>
                            <div class="filter-row"><span class="check-square"></span><span>Reminders</span><strong class="filter-count">0</strong></div>
                        </div>
                    </section>

                    <section class="panel side-card">
                        <div class="side-title">
                            <i class="bi bi-gear"></i>
                            <h2>Notification Preferences</h2>
                        </div>

                        <div class="preference-list">
                            <div class="pref-row"><i class="bi bi-envelope"></i><span>Email Notifications</span><span class="toggle on"></span></div>
                            <div class="pref-row"><i class="bi bi-chat-left-text"></i><span>SMS Notifications</span><span class="toggle"></span></div>
                            <div class="pref-row"><i class="bi bi-bell"></i><span>Push Notifications</span><span class="toggle on"></span></div>
                        </div>

                        <button class="btn btn-soft wide-button" type="button">Manage Preferences</button>
                    </section>

                    <section class="panel side-card">
                        <div class="side-title">
                            <i class="bi bi-lightning-charge"></i>
                            <h2>Quick Actions</h2>
                        </div>

                        <div class="quick-list">
                            <a class="quick-row" href="myconsultation.php"><i class="bi bi-chat-dots"></i><span>Go to My Consultation</span><i class="bi bi-chevron-right"></i></a>
                            <a class="quick-row" href="newconsultation.php"><i class="bi bi-plus-circle"></i><span>New Consultation</span><i class="bi bi-chevron-right"></i></a>
                            <a class="quick-row" href="healthreminders.php"><i class="bi bi-calendar2-heart"></i><span>Health Reminders</span><i class="bi bi-chevron-right"></i></a>
                        </div>
                    </section>

                    <section class="panel side-card emergency-card">
                        <h2><i class="bi bi-exclamation-circle-fill"></i>Need Immediate Help?</h2>
                        <p>If you are experiencing a medical emergency, please contact emergency services.</p>
                        <button class="btn-danger-main" type="button"><i class="bi bi-telephone me-2"></i>Emergency Hotlines</button>
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
