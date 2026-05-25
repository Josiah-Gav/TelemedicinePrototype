<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Management | CLSU Telemedicine</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        :root {
            --ink: #0c172a;
            --muted: #4d5a70;
            --green: #0f8f4a;
            --green-dark: #003d20;
            --green-soft: #e8f6ee;
            --red: #ff3b30;
            --red-soft: #fff0ef;
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

        .main {
            min-width: 0;
            padding: 1.55rem 1.8rem 1.25rem;
        }

        .topbar {
            display: grid;
            grid-template-columns: minmax(420px, 1fr) minmax(260px, 320px) auto auto;
            align-items: center;
            gap: 1.45rem;
            margin-bottom: 2rem;
        }

        .page-title h1 {
            margin: 0 0 .75rem;
            color: var(--green-dark);
            font-size: clamp(2rem, 3vw, 2.65rem);
            font-weight: 950;
            letter-spacing: 0;
        }

        .page-title p {
            margin: 0;
            color: #1f2937;
            font-size: 1rem;
        }

        .search-box {
            position: relative;
        }

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

        .search-box i {
            position: absolute;
            top: 50%;
            right: 1.1rem;
            color: #64748b;
            font-size: 1.35rem;
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

        .admin-menu img {
            width: 54px;
            height: 54px;
            border-radius: 50%;
            border: 1px solid #cbd5e1;
            object-fit: cover;
            background: #fff;
        }

        .admin-menu strong,
        .admin-menu span { display: block; }
        .admin-menu strong { font-size: 1rem; font-weight: 950; }
        .admin-menu span { margin-top: .15rem; color: #27364b; font-size: .88rem; }

        .menu-toggle { display: none; }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(190px, 1fr));
            gap: 1rem;
            margin-bottom: 1.1rem;
        }

        .cardx,
        .users-panel {
            border: 1px solid var(--line);
            border-radius: 10px;
            background: rgba(255, 255, 255, .92);
            box-shadow: var(--shadow);
        }

        .stat-card {
            display: grid;
            grid-template-columns: 76px minmax(0, 1fr);
            align-items: center;
            gap: .95rem;
            min-height: 142px;
            padding: 1.05rem 1.25rem;
        }

        .icon-box {
            display: grid;
            place-items: center;
            width: 64px;
            height: 64px;
            border-radius: 13px;
            color: var(--green);
            background: var(--green-soft);
            font-size: 2.1rem;
        }

        .icon-box.gray {
            color: #7b8492;
            background: #f1f3f5;
        }

        .stat-card h3 {
            margin: 0 0 .55rem;
            color: #020617;
            font-size: .84rem;
            font-weight: 950;
        }

        .stat-value {
            display: block;
            margin-bottom: .65rem;
            font-size: 2.1rem;
            font-weight: 950;
            line-height: 1;
        }

        .stat-caption {
            display: block;
            color: #27364b;
            font-size: .86rem;
        }

        .users-panel {
            padding: 1.35rem 1.45rem 1rem;
        }

        .panel-head,
        .table-toolbar,
        .pagination-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
        }

        .panel-head {
            margin-bottom: 1.1rem;
        }

        .panel-head h2 {
            margin: 0;
            font-size: 1.25rem;
            font-weight: 950;
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            justify-content: end;
            gap: .8rem;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: .55rem;
            min-height: 44px;
            padding: 0 1.05rem;
            border: 1px solid #b6d8c3;
            border-radius: 8px;
            color: var(--green-dark);
            background: #fff;
            font-weight: 850;
            cursor: pointer;
            white-space: nowrap;
        }

        .btn-solid {
            color: #fff;
            border-color: var(--green-dark);
            background: linear-gradient(180deg, #0f8f4a, #006824);
            box-shadow: 0 8px 18px rgba(0, 104, 36, .18);
        }

        .table-toolbar {
            margin-bottom: 1rem;
        }

        .filters {
            display: flex;
            flex-wrap: wrap;
            gap: .85rem;
        }

        .table-search,
        .select-wrap {
            position: relative;
        }

        .table-search input,
        .select-wrap select {
            height: 44px;
            border: 1px solid #d6dee9;
            border-radius: 8px;
            color: #1d293f;
            background: #fff;
            outline: none;
        }

        .table-search input {
            width: min(100vw, 360px);
            padding: 0 2.8rem 0 1rem;
        }

        .table-search i {
            position: absolute;
            top: 50%;
            right: 1rem;
            color: #334155;
            transform: translateY(-50%);
        }

        .select-wrap select {
            min-width: 170px;
            appearance: none;
            padding: 0 2.6rem 0 1rem;
        }

        .select-wrap i {
            position: absolute;
            top: 50%;
            right: .95rem;
            color: #334155;
            pointer-events: none;
            transform: translateY(-50%);
        }

        .table-status {
            color: #334155;
            font-size: .88rem;
            white-space: nowrap;
        }

        .table-wrap {
            overflow-x: auto;
        }

        .users-table {
            width: 100%;
            min-width: 1050px;
            border-collapse: collapse;
        }

        .users-table th {
            padding: .92rem .85rem;
            color: #18233a;
            background: #f8fafc;
            border-top: 1px solid #edf1f5;
            border-bottom: 1px solid #edf1f5;
            font-size: .84rem;
            font-weight: 950;
            text-align: left;
        }

        .users-table td {
            padding: .82rem .85rem;
            border-bottom: 1px solid #edf1f5;
            color: #172447;
            font-size: .9rem;
            vertical-align: middle;
        }

        .user-cell {
            display: grid;
            grid-template-columns: 34px minmax(0, 1fr);
            align-items: center;
            gap: .8rem;
            font-weight: 850;
        }

        .user-avatar {
            display: grid;
            place-items: center;
            width: 34px;
            height: 34px;
            border-radius: 50%;
            color: #2e8d5b;
            background: #eef3f0;
            font-size: 1.15rem;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            min-height: 28px;
            padding: 0 .62rem;
            border-radius: 8px;
            color: #00702d;
            background: #e6f7eb;
            font-size: .82rem;
            font-weight: 850;
        }

        .badge.red {
            color: var(--red);
            background: var(--red-soft);
        }

        .row-actions {
            display: flex;
            align-items: center;
            gap: .65rem;
        }

        .reset-btn,
        .icon-btn {
            display: inline-grid;
            place-items: center;
            min-height: 36px;
            border-radius: 7px;
            background: #fff;
            cursor: pointer;
        }

        .reset-btn {
            grid-auto-flow: column;
            gap: .45rem;
            padding: 0 .85rem;
            border: 1px solid #78c790;
            color: #00702d;
            font-size: .84rem;
            font-weight: 850;
            white-space: nowrap;
        }

        .icon-btn {
            width: 38px;
            border: 1px solid #9bcfad;
            color: var(--green-dark);
            font-size: 1rem;
        }

        .icon-btn.danger {
            border-color: #ffb0ac;
            color: var(--red);
        }

        .pagination {
            display: flex;
            align-items: center;
            gap: .55rem;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .page-link {
            display: grid;
            place-items: center;
            min-width: 34px;
            height: 34px;
            border-radius: 7px;
            color: #27364b;
            font-size: .88rem;
            font-weight: 850;
        }

        .page-link.active {
            color: #fff;
            background: var(--green-dark);
        }

        .per-page {
            height: 42px;
            min-width: 142px;
            padding: 0 2.5rem 0 1rem;
            border: 1px solid #d6dee9;
            border-radius: 8px;
            color: #1d293f;
            background: #fff;
        }

        .footer {
            display: flex;
            justify-content: space-between;
            gap: 1rem;
            margin-top: 1.8rem;
            color: #718096;
            font-size: .9rem;
        }

        .sidebar-overlay { display: none; }

        @media (max-width: 1400px) {
            .stats-grid { grid-template-columns: repeat(2, minmax(190px, 1fr)); }
            .topbar { grid-template-columns: 1fr minmax(240px, 320px) auto; }
            .admin-menu { grid-column: 1 / -1; justify-self: end; }
        }

        @media (max-width: 1120px) {
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

        @media (max-width: 780px) {
            .main { padding-inline: 1rem; }
            .topbar,
            .stats-grid,
            .panel-head,
            .table-toolbar,
            .pagination-row,
            .footer { display: grid; grid-template-columns: 1fr; align-items: start; }
            .bell,
            .admin-menu { justify-self: start; }
            .actions { justify-content: start; }
            .table-search input,
            .select-wrap select { width: 100%; min-width: 0; }
            .filters { display: grid; grid-template-columns: 1fr; }
            .users-panel { padding: 1rem; }
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
                    <li><a class="nav-link active" href="usermanagement.php"><i class="bi bi-people"></i> User Management</a></li>
                    <li><a class="nav-link" href="reports.php"><i class="bi bi-file-earmark-bar-graph"></i> Reports</a></li>
                </ul>
            </nav>

            <a class="nav-link logout-link" href="../auth/index.php"><i class="bi bi-box-arrow-right"></i> Logout</a>
        </aside>

        <main class="main">
            <header class="topbar">
                <div class="page-title">
                    <h1>User Management</h1>
                    <p>Manage telemedicine system accounts. Create, activate, deactivate, and manage user credentials.</p>
                </div>

                <label class="search-box" aria-label="Search users">
                    <input type="search" placeholder="Search users...">
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

            <section class="stats-grid" aria-label="User account summary">
                <article class="cardx stat-card">
                    <span class="icon-box"><i class="bi bi-people-fill"></i></span>
                    <div><h3>Total Users</h3><strong class="stat-value">1,245</strong><span class="stat-caption">All CLSU users</span></div>
                </article>
                <article class="cardx stat-card">
                    <span class="icon-box"><i class="bi bi-person-heart"></i></span>
                    <div><h3>Nurses</h3><strong class="stat-value">24</strong><span class="stat-caption">Active accounts</span></div>
                </article>
                <article class="cardx stat-card">
                    <span class="icon-box"><i class="bi bi-stethoscope"></i></span>
                    <div><h3>Physicians</h3><strong class="stat-value">15</strong><span class="stat-caption">Active accounts</span></div>
                </article>
                <article class="cardx stat-card">
                    <span class="icon-box gray"><i class="bi bi-person-fill"></i></span>
                    <div><h3>Inactive Users</h3><strong class="stat-value">18</strong><span class="stat-caption">Deactivated accounts</span></div>
                </article>
            </section>

            <section class="users-panel" aria-labelledby="users-title">
                <div class="panel-head">
                    <h2 id="users-title">Users</h2>
                    <div class="actions">
                        <button class="btn" type="button"><i class="bi bi-arrow-clockwise"></i> Refresh</button>
                        <button class="btn" type="button"><i class="bi bi-plus-lg"></i> Add Nurse</button>
                        <button class="btn" type="button"><i class="bi bi-plus-lg"></i> Add Physician</button>
                        <button class="btn btn-solid" type="button"><i class="bi bi-plus-lg"></i> Add User</button>
                    </div>
                </div>

                <div class="table-toolbar">
                    <div class="filters">
                        <label class="table-search" aria-label="Search by name, email, or username">
                            <input type="search" placeholder="Search by name, email, or username...">
                            <i class="bi bi-search"></i>
                        </label>
                        <label class="select-wrap" aria-label="Filter by role">
                            <select>
                                <option>All Roles</option>
                                <option>Nurse</option>
                                <option>Physician</option>
                                <option>Administrator</option>
                            </select>
                            <i class="bi bi-chevron-down"></i>
                        </label>
                        <label class="select-wrap" aria-label="Filter by status">
                            <select>
                                <option>All Statuses</option>
                                <option>Active</option>
                                <option>Inactive</option>
                            </select>
                            <i class="bi bi-chevron-down"></i>
                        </label>
                    </div>
                    <div class="table-status">Showing 1 to 10 of 45 users</div>
                </div>

                <div class="table-wrap">
                    <table class="users-table">
                        <thead>
                            <tr>
                                <th>Full Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Date Created</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><span class="user-cell"><span class="user-avatar"><i class="bi bi-person-fill"></i></span>Maria Santos</span></td>
                                <td>maria.santos</td>
                                <td>maria.santos@clsu.edu.ph</td>
                                <td><span class="badge">Nurse</span></td>
                                <td><span class="badge">Active</span></td>
                                <td>May 10, 2024</td>
                                <td><span class="row-actions"><button class="reset-btn" type="button"><i class="bi bi-key"></i> Reset Password</button><button class="icon-btn" type="button" aria-label="Edit Maria Santos"><i class="bi bi-pencil"></i></button><button class="icon-btn danger" type="button" aria-label="Deactivate Maria Santos"><i class="bi bi-power"></i></button></span></td>
                            </tr>
                            <tr>
                                <td><span class="user-cell"><span class="user-avatar"><i class="bi bi-person-fill"></i></span>Juan Dela Cruz</span></td>
                                <td>juan.delacruz</td>
                                <td>juan.delacruz@clsu.edu.ph</td>
                                <td><span class="badge">Physician</span></td>
                                <td><span class="badge">Active</span></td>
                                <td>May 08, 2024</td>
                                <td><span class="row-actions"><button class="reset-btn" type="button"><i class="bi bi-key"></i> Reset Password</button><button class="icon-btn" type="button" aria-label="Edit Juan Dela Cruz"><i class="bi bi-pencil"></i></button><button class="icon-btn danger" type="button" aria-label="Deactivate Juan Dela Cruz"><i class="bi bi-power"></i></button></span></td>
                            </tr>
                            <tr>
                                <td><span class="user-cell"><span class="user-avatar"><i class="bi bi-person-fill"></i></span>Ana Reyes</span></td>
                                <td>ana.reyes</td>
                                <td>ana.reyes@clsu.edu.ph</td>
                                <td><span class="badge">Nurse</span></td>
                                <td><span class="badge">Active</span></td>
                                <td>May 07, 2024</td>
                                <td><span class="row-actions"><button class="reset-btn" type="button"><i class="bi bi-key"></i> Reset Password</button><button class="icon-btn" type="button" aria-label="Edit Ana Reyes"><i class="bi bi-pencil"></i></button><button class="icon-btn danger" type="button" aria-label="Deactivate Ana Reyes"><i class="bi bi-power"></i></button></span></td>
                            </tr>
                            <tr>
                                <td><span class="user-cell"><span class="user-avatar"><i class="bi bi-person-fill"></i></span>Pedro Garcia</span></td>
                                <td>pedro.garcia</td>
                                <td>pedro.garcia@clsu.edu.ph</td>
                                <td><span class="badge">Physician</span></td>
                                <td><span class="badge">Active</span></td>
                                <td>May 05, 2024</td>
                                <td><span class="row-actions"><button class="reset-btn" type="button"><i class="bi bi-key"></i> Reset Password</button><button class="icon-btn" type="button" aria-label="Edit Pedro Garcia"><i class="bi bi-pencil"></i></button><button class="icon-btn danger" type="button" aria-label="Deactivate Pedro Garcia"><i class="bi bi-power"></i></button></span></td>
                            </tr>
                            <tr>
                                <td><span class="user-cell"><span class="user-avatar"><i class="bi bi-person-fill"></i></span>Liza Cruz</span></td>
                                <td>liza.cruz</td>
                                <td>liza.cruz@clsu.edu.ph</td>
                                <td><span class="badge">Nurse</span></td>
                                <td><span class="badge red">Inactive</span></td>
                                <td>Apr 28, 2024</td>
                                <td><span class="row-actions"><button class="reset-btn" type="button"><i class="bi bi-key"></i> Reset Password</button><button class="icon-btn" type="button" aria-label="Edit Liza Cruz"><i class="bi bi-pencil"></i></button><button class="icon-btn danger" type="button" aria-label="Activate Liza Cruz"><i class="bi bi-power"></i></button></span></td>
                            </tr>
                            <tr>
                                <td><span class="user-cell"><span class="user-avatar"><i class="bi bi-person-fill"></i></span>Mark Lopez</span></td>
                                <td>mark.lopez</td>
                                <td>mark.lopez@clsu.edu.ph</td>
                                <td><span class="badge">Physician</span></td>
                                <td><span class="badge">Active</span></td>
                                <td>Apr 25, 2024</td>
                                <td><span class="row-actions"><button class="reset-btn" type="button"><i class="bi bi-key"></i> Reset Password</button><button class="icon-btn" type="button" aria-label="Edit Mark Lopez"><i class="bi bi-pencil"></i></button><button class="icon-btn danger" type="button" aria-label="Deactivate Mark Lopez"><i class="bi bi-power"></i></button></span></td>
                            </tr>
                            <tr>
                                <td><span class="user-cell"><span class="user-avatar"><i class="bi bi-person-fill"></i></span>Grace Villanueva</span></td>
                                <td>grace.villanueva</td>
                                <td>grace.villanueva@clsu.edu.ph</td>
                                <td><span class="badge">Nurse</span></td>
                                <td><span class="badge">Active</span></td>
                                <td>Apr 20, 2024</td>
                                <td><span class="row-actions"><button class="reset-btn" type="button"><i class="bi bi-key"></i> Reset Password</button><button class="icon-btn" type="button" aria-label="Edit Grace Villanueva"><i class="bi bi-pencil"></i></button><button class="icon-btn danger" type="button" aria-label="Deactivate Grace Villanueva"><i class="bi bi-power"></i></button></span></td>
                            </tr>
                            <tr>
                                <td><span class="user-cell"><span class="user-avatar"><i class="bi bi-person-fill"></i></span>Allen Reyes</span></td>
                                <td>allen.reyes</td>
                                <td>allen.reyes@clsu.edu.ph</td>
                                <td><span class="badge">Physician</span></td>
                                <td><span class="badge red">Inactive</span></td>
                                <td>Apr 18, 2024</td>
                                <td><span class="row-actions"><button class="reset-btn" type="button"><i class="bi bi-key"></i> Reset Password</button><button class="icon-btn" type="button" aria-label="Edit Allen Reyes"><i class="bi bi-pencil"></i></button><button class="icon-btn danger" type="button" aria-label="Activate Allen Reyes"><i class="bi bi-power"></i></button></span></td>
                            </tr>
                            <tr>
                                <td><span class="user-cell"><span class="user-avatar"><i class="bi bi-person-fill"></i></span>Joyce Mendoza</span></td>
                                <td>joyce.mendoza</td>
                                <td>joyce.mendoza@clsu.edu.ph</td>
                                <td><span class="badge">Nurse</span></td>
                                <td><span class="badge">Active</span></td>
                                <td>Apr 15, 2024</td>
                                <td><span class="row-actions"><button class="reset-btn" type="button"><i class="bi bi-key"></i> Reset Password</button><button class="icon-btn" type="button" aria-label="Edit Joyce Mendoza"><i class="bi bi-pencil"></i></button><button class="icon-btn danger" type="button" aria-label="Deactivate Joyce Mendoza"><i class="bi bi-power"></i></button></span></td>
                            </tr>
                            <tr>
                                <td><span class="user-cell"><span class="user-avatar"><i class="bi bi-person-fill"></i></span>Carlo Bautista</span></td>
                                <td>carlo.bautista</td>
                                <td>carlo.bautista@clsu.edu.ph</td>
                                <td><span class="badge">Physician</span></td>
                                <td><span class="badge">Active</span></td>
                                <td>Apr 10, 2024</td>
                                <td><span class="row-actions"><button class="reset-btn" type="button"><i class="bi bi-key"></i> Reset Password</button><button class="icon-btn" type="button" aria-label="Edit Carlo Bautista"><i class="bi bi-pencil"></i></button><button class="icon-btn danger" type="button" aria-label="Deactivate Carlo Bautista"><i class="bi bi-power"></i></button></span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="pagination-row">
                    <ul class="pagination" aria-label="User pages">
                        <li><a class="page-link" href="#" aria-label="Previous page"><i class="bi bi-chevron-left"></i></a></li>
                        <li><a class="page-link active" href="#">1</a></li>
                        <li><a class="page-link" href="#">2</a></li>
                        <li><a class="page-link" href="#">3</a></li>
                        <li><a class="page-link" href="#">4</a></li>
                        <li><a class="page-link" href="#">5</a></li>
                        <li><a class="page-link" href="#" aria-label="Next page"><i class="bi bi-chevron-right"></i></a></li>
                    </ul>
                    <span class="table-status">Showing 1 to 10 of 45 users</span>
                    <label class="select-wrap" aria-label="Rows per page">
                        <select class="per-page">
                            <option>10 per page</option>
                            <option>25 per page</option>
                            <option>50 per page</option>
                        </select>
                        <i class="bi bi-chevron-down"></i>
                    </label>
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
            if (event.key === "Escape") {
                setSidebar(false);
            }
        });
    </script>
</body>
</html>
