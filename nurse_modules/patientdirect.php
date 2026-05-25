<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Patient Directory | CLSU Infirmary Telemedicine System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        :root{--ink:#071438;--muted:#4e5b86;--green:#087d32;--green-dark:#006824;--line:#e1e7ef;--page:#fbfcfa;--blue:#2578e7;--orange:#ff8a00;--purple:#087d32;--red:#f52222;--shadow:0 12px 30px rgba(24,39,75,.07)}
        *{box-sizing:border-box} body{min-height:100vh;margin:0;color:var(--ink);font-family:"Inter","Segoe UI",system-ui,-apple-system,BlinkMacSystemFont,sans-serif;background:radial-gradient(circle at 88% 92%,rgba(255,211,67,.26),transparent 16rem),linear-gradient(180deg,#fbfdfb 0%,#f7faf5 100%)} a{color:inherit;text-decoration:none}
        .app-shell{display:grid;grid-template-columns:300px minmax(0,1fr);min-height:100vh;transition:grid-template-columns .2s ease}
        .sidebar{position:sticky;top:0;height:100vh;padding:1.55rem 1.25rem;border-right:1px solid var(--line);background:#fff;box-shadow:8px 0 28px rgba(24,39,75,.04);overflow-y:auto;transition:padding .2s ease}
        .brand{display:flex;align-items:center;gap:.85rem;margin-bottom:2.35rem}.brand img{width:62px;height:62px;border-radius:50%;object-fit:cover}.brand strong{display:block;font-size:1.36rem;font-weight:950;line-height:1.05}.brand span{color:#111;font-size:1rem;font-weight:800}
        .nurse-mini{display:grid;grid-template-columns:64px minmax(0,1fr);align-items:center;gap:.9rem;margin-bottom:1.6rem}.nurse-mini .avatar{width:64px;height:64px;font-size:1.85rem}.nurse-mini h2{margin:0 0 .18rem;font-size:1rem;font-weight:950}.nurse-mini p{margin:0 0 .25rem;color:var(--muted);font-size:.9rem}.online{display:inline-flex;align-items:center;gap:.38rem;color:#2d405f;font-size:.82rem}.online:before{content:"";width:10px;height:10px;border-radius:50%;background:var(--green)}
        .nav-list{display:grid;gap:.52rem;margin:0;padding:0;list-style:none}.nav-link{position:relative;display:flex;align-items:center;gap:1rem;min-height:54px;padding:.75rem .95rem;border-radius:10px;color:#1d293f;font-weight:850}.nav-link i{width:28px;color:#5d697d;font-size:1.35rem}.nav-link.active{color:var(--green-dark);background:linear-gradient(90deg,#e7f4e6,#f5faf3)}.nav-link.active i{color:var(--green)}
        .nav-badge{display:grid;place-items:center;min-width:24px;height:24px;margin-left:auto;padding:0 .38rem;border-radius:999px;color:#fff;background:var(--green);font-size:.78rem;font-weight:950}.nav-badge.red{background:#e60012}.nav-badge.blue{background:#0d6efd}.logout-link{margin-top:6.5rem}
        .shift-card{margin:1.9rem 0 1.25rem;padding:1rem;border:1px solid #cfe8d8;border-radius:10px;background:linear-gradient(135deg,#f5fff8,#eaf7ef)}.shift-card header{display:flex;align-items:center;justify-content:space-between;margin-bottom:.75rem;color:var(--green-dark);font-weight:950}.shift-status{display:flex;align-items:center;gap:.65rem;margin-bottom:.55rem;color:var(--green-dark);font-weight:850}.shift-status:before{content:"";width:9px;height:9px;border-radius:50%;background:#34c76b}.shift-card p{margin:.35rem 0 0 1.55rem;color:#26335f;font-size:.9rem}
        .sidebar-collapse{display:flex;align-items:center;justify-content:center;gap:.55rem;width:100%;min-height:42px;margin:0 0 1rem;border:1px solid #d7e0ee;border-radius:9px;color:var(--green-dark);background:#fff;font-weight:950}
        body.sidebar-collapsed .app-shell{grid-template-columns:88px minmax(0,1fr)}body.sidebar-collapsed .sidebar{padding-inline:.75rem;overflow-x:hidden}body.sidebar-collapsed .brand{justify-content:center;gap:0;margin-bottom:1.5rem}body.sidebar-collapsed .brand span,body.sidebar-collapsed .nurse-mini > div:last-child,body.sidebar-collapsed .shift-card,body.sidebar-collapsed .sidebar-collapse span{display:none}body.sidebar-collapsed .brand img{width:48px;height:48px}body.sidebar-collapsed .nurse-mini{grid-template-columns:1fr;justify-items:center;margin-bottom:1rem}body.sidebar-collapsed .nurse-mini .avatar{width:48px;height:48px;font-size:1.35rem}body.sidebar-collapsed .sidebar-collapse{width:48px;margin-inline:auto}body.sidebar-collapsed .nav-link{justify-content:center;gap:0;padding-inline:.6rem;font-size:0}body.sidebar-collapsed .nav-link i{width:auto;font-size:1.45rem}body.sidebar-collapsed .nav-badge{position:absolute;top:5px;right:4px;min-width:18px;height:18px;margin-left:0;padding:0 .25rem;font-size:.62rem}body.sidebar-collapsed .logout-link{margin-top:2rem}
        .main{min-width:0;padding:1.35rem 1.4rem}.topbar{display:grid;grid-template-columns:minmax(0,1fr) auto auto;align-items:start;gap:1.2rem;margin-bottom:1.25rem}.page-title h1{margin:0 0 .55rem;font-size:clamp(1.8rem,2.4vw,2.4rem);font-weight:950}.page-title p{margin:0;color:#34426f}.bell{position:relative;display:grid;place-items:center;width:46px;height:50px;border:0;color:#172447;background:transparent;font-size:1.65rem}.bell span{position:absolute;top:0;right:.05rem;display:grid;place-items:center;width:23px;height:23px;border-radius:50%;color:#fff;background:#e60012;font-size:.75rem;font-weight:950}
        .nurse-top{display:grid;grid-template-columns:48px auto 24px;align-items:center;gap:.75rem}.avatar,.mini-avatar{display:grid;place-items:center;border-radius:50%;color:#fff;background:linear-gradient(145deg,#f3b79b,#253055);overflow:hidden}.avatar{width:48px;height:48px}.mini-avatar{width:58px;height:58px}.mini-avatar.male{background:linear-gradient(145deg,#f0b08f,#39415d)}.nurse-top strong{display:block;font-weight:950}.nurse-top span{font-size:.82rem}
        .directory-layout{display:grid;grid-template-columns:460px minmax(0,1fr) 260px;gap:1rem;align-items:start}.panel{border:1px solid var(--line);border-radius:10px;background:#fff;box-shadow:var(--shadow)}.list-panel{display:grid;gap:.85rem;padding:.9rem}.search-row{display:grid;grid-template-columns:minmax(0,1fr) 96px;gap:.7rem}.search-box{position:relative}.search-box input{width:100%;height:44px;padding:0 2.6rem 0 1rem;border:1px solid #d7e0ee;border-radius:7px;outline:none}.search-box i{position:absolute;top:50%;right:.9rem;color:#6370a6;font-size:1.2rem;transform:translateY(-50%)}.filter-btn{display:flex;align-items:center;justify-content:center;gap:.45rem;border:1px solid #d7e0ee;border-radius:7px;background:#fff;font-weight:950}
        .tabs{display:flex;gap:2rem;border-bottom:1px solid var(--line);overflow-x:auto}.tab{min-height:42px;border-bottom:3px solid transparent;font-size:.85rem;font-weight:950;white-space:nowrap}.tab.active{color:var(--green-dark);border-bottom-color:var(--green)}.patient-list{display:grid;gap:.5rem}.patient-card{position:relative;display:grid;grid-template-columns:64px minmax(0,1fr);gap:.85rem;padding:.85rem;border:1px solid var(--line);border-radius:8px;background:#fff}.patient-card.active{border-color:#88d7a2;background:linear-gradient(135deg,#f5fff8,#fff)}.patient-card strong{display:block;font-weight:950}.patient-card p{margin:.2rem 0;color:#34426f;font-size:.84rem}.status-dot{position:absolute;top:1rem;right:1rem;width:10px;height:10px;border-radius:50%;background:var(--green)}.status-dot.orange{background:#ff8a00}.status-dot.gray{background:#98a2ba}.active-chip{display:inline-block;margin-top:.35rem;padding:.25rem .55rem;border:1px solid #9eddb4;border-radius:6px;color:var(--green-dark);background:#eefaef;font-size:.72rem;font-weight:950}.pager{display:flex;align-items:center;justify-content:space-between;gap:1rem;color:#34426f;font-size:.84rem}.pages{display:flex;gap:.35rem}.page-btn{display:grid;place-items:center;min-width:30px;height:30px;border:1px solid #d7e0ee;border-radius:6px;background:#fff;font-weight:850}.page-btn.active{color:#fff;background:var(--green);border-color:var(--green)}
        .detail-panel{overflow:hidden}.patient-head{display:flex;align-items:center;justify-content:space-between;gap:1.25rem;padding:1.35rem 1.6rem;border-bottom:1px solid var(--line)}.identity-card{display:grid;grid-template-columns:88px minmax(0,1fr);align-items:center;gap:1rem;min-width:0}.identity-card p{margin:.28rem 0 0;color:#172447;line-height:1.35}.hero-avatar{width:80px;height:80px;font-size:2rem;flex:0 0 auto}.patient-head h2{margin:0;font-size:1.35rem;font-weight:950;line-height:1.15}.head-actions{display:flex;align-items:center;justify-content:flex-end;gap:.75rem;flex-wrap:wrap}.muted{color:#34426f}.info-grid{display:grid;align-content:start;gap:.85rem;min-width:0}.label{display:block;margin-bottom:.15rem;color:#34426f;font-size:.78rem;font-weight:850}.value{display:block;font-weight:850;line-height:1.35;overflow-wrap:anywhere}.tag{display:inline-grid;place-items:center;width:max-content;padding:.28rem .55rem;border:1px solid #a9dfba;border-radius:6px;color:var(--green-dark);background:#eefaf3;font-size:.72rem;font-weight:950;white-space:nowrap}.modal-content{border:0;border-radius:14px;box-shadow:0 22px 70px rgba(7,20,56,.22)}.patient-modal-head{display:grid;grid-template-columns:72px minmax(0,1fr);gap:1rem;align-items:center}.patient-modal-head h2{margin:0;font-size:1.25rem;font-weight:950}.modal-grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:1rem}.modal-info-card{padding:1rem;border:1px solid var(--line);border-radius:10px;background:#fbfdff}.modal-info-card h3{margin:0 0 .75rem;font-size:.95rem;font-weight:950}.modal-list{display:grid;gap:.7rem}
        .detail-tabs{display:flex;gap:2rem;padding:0 1.2rem;border-bottom:1px solid var(--line);overflow-x:auto}.detail-tab{min-height:50px;border-bottom:3px solid transparent;font-weight:950}.detail-tab.active{color:var(--green-dark);border-bottom-color:var(--green)}.detail-body{display:grid;gap:1rem;padding:1rem}.status-row{display:grid;grid-template-columns:repeat(2,minmax(280px,1fr));gap:1rem}.status-card{display:grid;grid-template-columns:36px minmax(0,1fr);align-items:start;gap:.85rem;min-width:0;padding:1rem;border:1px solid #e1e7ef;border-radius:8px;background:#fff}.status-card.green{background:#f5fff8;border-color:#b7e6c6}.status-card.purple{background:#fbf7ff;border-color:#dccbff}.status-copy{min-width:0}.status-copy strong{display:block;margin-bottom:.2rem;font-weight:950;line-height:1.25}.status-copy p{margin:0;color:#172447;font-size:.88rem;line-height:1.45}.status-card .filter-btn{grid-column:2;justify-self:start;min-width:150px;min-height:38px;margin-top:.2rem;padding:0 .8rem;white-space:nowrap}.status-icon{display:grid;place-items:center;width:36px;height:36px;border-radius:8px;color:var(--green);background:#e3f7ea}.summary-cards{display:grid;grid-template-columns:repeat(4,1fr);gap:.75rem}.summary-card{padding:1rem;border:1px solid var(--line);border-radius:8px;background:#fff}.summary-card i{font-size:1.3rem}.summary-card strong{display:block;margin:.4rem 0;font-size:1.5rem}.history-table{width:100%;border-collapse:collapse}.history-table th,.history-table td{padding:.75rem;border-bottom:1px solid #edf1f7;text-align:left;font-size:.84rem}.history-table th{color:#34426f;background:#f8fbff}.note{padding:.85rem 1rem;border:1px solid #bdd9ff;border-radius:8px;background:#f3f8ff;color:#172447}
        .right-rail{display:grid;gap:.9rem}.side-panel{padding:1rem}.side-panel h2{margin:0 0 .85rem;font-size:1rem;font-weight:950}.quick{display:grid;gap:.7rem}.quick-btn{display:flex;align-items:center;gap:.7rem;min-height:48px;padding:0 1rem;border:1px solid;border-radius:8px;background:#fff;font-weight:950}.quick-btn.green{color:var(--green-dark);border-color:#9eddb4;background:#f4fff7}.quick-btn.blue{color:#0d62d9;border-color:#afd0ff;background:#f5f9ff}.quick-btn.orange{color:#d76b00;border-color:#ffc98f;background:#fff7ec}.quick-btn.gray{color:#172447;border-color:#d7e0ee;background:#f7f9fc}.side-list{display:grid;gap:.75rem}.side-row{display:flex;justify-content:space-between;gap:1rem;color:#34426f;font-size:.84rem}.side-row strong{text-align:right;color:#071438}.timeline{display:grid;gap:.9rem}.timeline-item{display:grid;grid-template-columns:24px minmax(0,1fr);gap:.65rem;color:#34426f;font-size:.82rem}.timeline-dot{display:grid;place-items:center;width:18px;height:18px;border-radius:50%;color:#fff;background:var(--green);font-size:.65rem}.timeline-dot.purple{background:var(--purple)}.timeline-dot.blue{background:var(--blue)}.timeline-dot.gray{background:#9ca6ba}.timeline a{color:#0d62d9;font-weight:950;text-align:right}.menu-toggle,.sidebar-overlay{display:none}
        @media(max-width:1500px){.directory-layout{grid-template-columns:390px minmax(0,1fr)}.right-rail{grid-column:1/-1;grid-template-columns:repeat(3,1fr)}.summary-cards{grid-template-columns:repeat(2,1fr)}}
        @media(max-width:1180px){.app-shell,body.sidebar-collapsed .app-shell{grid-template-columns:1fr}.sidebar-collapse{display:none}.menu-toggle{position:fixed;top:1rem;left:1rem;z-index:1100;display:grid;place-items:center;width:48px;height:48px;border:1px solid var(--line);border-radius:12px;color:var(--green-dark);background:#fff;box-shadow:0 10px 24px rgba(24,39,75,.12);font-size:1.55rem}.sidebar-overlay{position:fixed;inset:0;z-index:1050;display:block;background:rgba(7,20,56,.42);opacity:0;pointer-events:none;transition:opacity .2s ease}body.sidebar-open .sidebar-overlay{opacity:1;pointer-events:auto}.sidebar{position:fixed;inset:0 auto 0 0;z-index:1060;width:min(84vw,310px);height:100vh;transform:translateX(-100%);transition:transform .24s ease;box-shadow:12px 0 36px rgba(7,20,56,.18)}body.sidebar-open .sidebar{transform:translateX(0)}.main{padding-top:5rem}}
        @media(max-width:900px){.main{padding-inline:1rem}.topbar,.directory-layout,.right-rail,.summary-cards,.modal-grid{grid-template-columns:1fr}.status-row{grid-template-columns:1fr}.patient-head{align-items:flex-start;flex-direction:column}.head-actions{justify-content:flex-start}.nurse-top{display:none}.right-rail{grid-template-columns:1fr}.detail-tabs{gap:1rem}.pager{align-items:start;flex-direction:column}}
        @media(max-width:560px){.patient-head{padding:1rem}.identity-card{grid-template-columns:76px minmax(0,1fr);align-items:center}.hero-avatar{width:72px;height:72px;font-size:1.7rem}.patient-head h2{font-size:1.15rem}.identity-card p{font-size:.88rem}.head-actions{width:100%}.head-actions .filter-btn{width:100%;min-height:42px}.patient-modal-head{grid-template-columns:56px minmax(0,1fr)}.status-card .filter-btn{width:100%}}
    </style>
</head>
<body>
    <button class="menu-toggle" type="button" aria-label="Open navigation" aria-controls="nurseSidebar" aria-expanded="false"><i class="bi bi-list"></i></button>
    <div class="app-shell">
        <aside class="sidebar" id="nurseSidebar">
            <a class="brand" href="dashboard.php"><img src="../auth/assets/img/CLSU_Logo.jpg" alt="CLSU logo"><span><strong>CLSU Infirmary</strong>Telemedicine System</span></a>
            <div class="nurse-mini">
                <div class="avatar" aria-hidden="true"><i class="bi bi-person-fill"></i></div>
                <div>
                    <h2>Nurse Ana Reyes</h2>
                    <p>Registered Nurse</p>
                    <span class="online">Online</span>
                </div>
            </div>
            <button class="sidebar-collapse" type="button" aria-label="Collapse sidebar" aria-expanded="true"><i class="bi bi-layout-sidebar-inset"></i><span>Collapse</span></button>
            <nav aria-label="Nurse navigation">
                <ul class="nav-list">
                    <li><a class="nav-link" href="dashboard.php"><i class="bi bi-house-door"></i> Dashboard</a></li>
                    <li><a class="nav-link" href="consultationinbox.php"><i class="bi bi-inbox"></i> Consultation Inbox <span class="nav-badge">12</span></a></li>
                    <li><a class="nav-link" href="activeconsult.php"><i class="bi bi-chat-dots"></i> Active Consultations <span class="nav-badge">3</span></a></li>
                    <li><a class="nav-link" href="followup.php"><i class="bi bi-calendar2-check"></i> Follow-up Requests <span class="nav-badge">8</span></a></li>
                    <li><a class="nav-link active" href="patientdirect.php"><i class="bi bi-people"></i> Patient Directory</a></li>
                    <li><a class="nav-link" href="consulthistory.php"><i class="bi bi-clock-history"></i> Consultation History</a></li>
                    <li><a class="nav-link" href="notif.php"><i class="bi bi-bell"></i> Notifications <span class="nav-badge">4</span></a></li>
                    <li><a class="nav-link" href="profile.php"><i class="bi bi-person-badge"></i> Profile</a></li>
                </ul>
            </nav>
            <a class="nav-link logout-link" href="../auth/index.php"><i class="bi bi-box-arrow-right"></i> Logout</a>
        </aside>

        <main class="main">
            <header class="topbar">
                <div class="page-title"><h1>Patient Directory</h1><p>Search and view patient information and consultation summary.</p></div>
                <button class="bell" type="button" aria-label="Notifications"><i class="bi bi-bell"></i><span>3</span></button>
                <div class="nurse-top"><span class="avatar"><i class="bi bi-person-fill"></i></span><div><strong>Nurse Ana Reyes</strong><span>Registered Nurse</span></div><i class="bi bi-chevron-down"></i></div>
            </header>

            <div class="directory-layout">
                <section class="panel list-panel">
                    <div class="search-row"><label class="search-box"><input type="search" placeholder="Search by name, ID, email or contact..."><i class="bi bi-search"></i></label><button class="filter-btn"><i class="bi bi-funnel"></i> Filter</button></div>
                    <div class="tabs"><span class="tab active">All (256)</span><span class="tab">Students (198)</span><span class="tab">Faculty/Staff (58)</span></div>
                    <div class="patient-list">
                        <article class="patient-card active"><span class="mini-avatar"><i class="bi bi-person-fill"></i></span><div><strong>Maria Dela Cruz</strong><p>ID: 2025-00123 &nbsp; &bull; &nbsp; Student</p><p>Last Consult: May 16, 2025</p><span class="active-chip">Has Active Consultation</span></div><span class="status-dot"></span></article>
                        <article class="patient-card"><span class="mini-avatar male"><i class="bi bi-person-fill"></i></span><div><strong>Juan Miguel Santos</strong><p>ID: 2025-00118 &nbsp; &bull; &nbsp; Student</p><p>Last Consult: May 10, 2025</p></div><span class="status-dot orange"></span></article>
                        <article class="patient-card"><span class="mini-avatar"><i class="bi bi-person-fill"></i></span><div><strong>Angela Reyes</strong><p>ID: 2025-00120 &nbsp; &bull; &nbsp; Student</p><p>Last Consult: May 14, 2025</p></div><span class="status-dot"></span></article>
                        <article class="patient-card"><span class="mini-avatar male"><i class="bi bi-person-fill"></i></span><div><strong>Pedro Garcia</strong><p>ID: 2025-00115 &nbsp; &bull; &nbsp; Faculty</p><p>Last Consult: May 11, 2025</p></div><span class="status-dot orange"></span></article>
                        <article class="patient-card"><span class="mini-avatar"><i class="bi bi-person-fill"></i></span><div><strong>Katrina Lopez</strong><p>ID: 2025-00121 &nbsp; &bull; &nbsp; Student</p><p>Last Consult: May 09, 2025</p></div><span class="status-dot gray"></span></article>
                        <article class="patient-card"><span class="mini-avatar male"><i class="bi bi-person-fill"></i></span><div><strong>Kevin Lopez</strong><p>ID: 2025-00125 &nbsp; &bull; &nbsp; Student</p><p>Last Consult: May 12, 2025</p></div><span class="status-dot"></span></article>
                        <article class="patient-card"><span class="mini-avatar"><i class="bi bi-person-fill"></i></span><div><strong>Rhea Mae Villanueva</strong><p>ID: 2025-00130 &nbsp; &bull; &nbsp; Staff</p><p>Last Consult: Apr 30, 2025</p></div><span class="status-dot gray"></span></article>
                    </div>
                    <div class="pager"><span>Showing 1 to 7 of 256 patients</span><div class="pages"><button class="page-btn"><i class="bi bi-chevron-left"></i></button><button class="page-btn active">1</button><button class="page-btn">2</button><button class="page-btn">3</button><button class="page-btn">...</button><button class="page-btn">37</button><button class="page-btn"><i class="bi bi-chevron-right"></i></button></div></div>
                </section>

                <section class="panel detail-panel">
                    <header class="patient-head">
                        <div class="identity-card">
                            <span class="avatar hero-avatar"><i class="bi bi-person-fill"></i></span>
                            <div>
                                <h2>Maria Dela Cruz</h2>
                                <p>ID: 2025-00123</p>
                            </div>
                        </div>
                        <div class="head-actions">
                            <div><span class="label">Account Status</span><span class="tag">Active</span></div>
                            <button class="filter-btn px-3 py-2" type="button" data-bs-toggle="modal" data-bs-target="#patientDetailsModal"><i class="bi bi-person-vcard"></i> View Details</button>
                        </div>
                    </header>
                    <div class="detail-tabs"><span class="detail-tab active">Overview</span><span class="detail-tab">Consultation History</span><span class="detail-tab">Follow-up History</span><span class="detail-tab">Notes (0)</span><span class="detail-tab">Documents (0)</span></div>
                    <div class="detail-body">
                        <div class="status-row"><div class="status-card green"><span class="status-icon"><i class="bi bi-chat-dots"></i></span><div class="status-copy"><strong>Active Consultation</strong><p>Started: May 16, 2025 &bull; 10:20 AM<br>Nurse Ana Reyes</p></div><button class="filter-btn">Open Consultation</button></div><div class="status-card purple"><span class="status-icon" style="color:var(--purple);background:#e9f5e9"><i class="bi bi-calendar2-check"></i></span><div class="status-copy"><strong>Follow-up Status</strong><p>No pending follow-up<br>Last follow-up: May 14, 2025</p></div><button class="filter-btn">View All</button></div></div>
                        <h2 class="fs-6 fw-bold m-0">Summary</h2>
                        <div class="summary-cards"><div class="summary-card"><i class="bi bi-clipboard2"></i><strong>5</strong><span>All time</span><p>Total Consultations</p></div><div class="summary-card"><i class="bi bi-check-circle text-success"></i><strong>3</strong><span>All time</span><p>Completed</p></div><div class="summary-card"><i class="bi bi-chat-square text-primary"></i><strong>1</strong><span>Currently</span><p>Active</p></div><div class="summary-card"><i class="bi bi-clock text-purple"></i><strong>1</strong><span>All time</span><p>Follow-up Requests</p></div></div>
                        <div class="panel p-3"><div class="d-flex justify-content-between mb-2"><strong>Recent Consultations</strong><a class="text-primary fw-bold" href="#">View Full History <i class="bi bi-arrow-right"></i></a></div><table class="history-table"><thead><tr><th>Date</th><th>Type</th><th>Triage Level</th><th>Chief Concern</th><th>Status</th><th>Consulted By</th><th></th></tr></thead><tbody><tr><td>May 16, 2025</td><td>Chat</td><td class="text-danger fw-bold">Level 2 - Urgent</td><td>Fever and cough</td><td><span class="tag">Active</span></td><td>Nurse Ana Reyes</td><td>...</td></tr><tr><td>May 14, 2025</td><td>Follow-up</td><td class="text-danger fw-bold">Level 2 - Urgent</td><td>Follow-up: Fever</td><td><span class="tag">Completed</span></td><td>Nurse Ana Reyes</td><td>...</td></tr><tr><td>May 10, 2025</td><td>Chat</td><td class="text-warning fw-bold">Level 3 - Moderate</td><td>Coughing</td><td><span class="tag">Completed</span></td><td>Nurse Ana Reyes</td><td>...</td></tr><tr><td>Apr 30, 2025</td><td>Chat</td><td class="text-success fw-bold">Level 4 - Non-urgent</td><td>Headache</td><td><span class="tag">Completed</span></td><td>Nurse Ana Reyes</td><td>...</td></tr><tr><td>Apr 12, 2025</td><td>Chat</td><td class="text-warning fw-bold">Level 3 - Moderate</td><td>Stomach pain</td><td><span class="tag">Completed</span></td><td>Nurse Ana Reyes</td><td>...</td></tr></tbody></table></div>
                        <div class="note"><i class="bi bi-info-circle-fill me-2 text-primary"></i>Note: This directory displays only patient identity and telemedicine consultation references. Official medical records are managed by the Health Management System (HMS).</div>
                    </div>
                </section>

                <aside class="right-rail">
                    <section class="panel side-panel"><h2>Quick Actions</h2><div class="quick"><button class="quick-btn green"><i class="bi bi-chat-dots"></i>Open Active Consultation</button><button class="quick-btn blue"><i class="bi bi-envelope"></i>Send Message</button><button class="quick-btn orange"><i class="bi bi-bell"></i>Create Follow-up Reminder</button><button class="quick-btn gray" type="button" data-bs-toggle="modal" data-bs-target="#patientDetailsModal"><i class="bi bi-person"></i>View Profile</button></div></section>
                    <section class="panel side-panel"><h2>Patient Details</h2><div class="side-list"><div class="side-row"><span>Name</span><strong>Maria Dela Cruz</strong></div><div class="side-row"><span>Patient ID</span><strong>2025-00123</strong></div><div class="side-row"><span>Account Status</span><strong><span class="tag">Active</span></strong></div><button class="quick-btn gray" type="button" data-bs-toggle="modal" data-bs-target="#patientDetailsModal"><i class="bi bi-person-vcard"></i>View Full Details</button></div></section>
                    <section class="panel side-panel"><h2>Activity Timeline</h2><div class="timeline"><div class="timeline-item"><span class="timeline-dot"><i class="bi bi-check"></i></span><div><strong>Active consultation started</strong><br>May 16, 2025 &nbsp; &bull; &nbsp; 10:20 AM</div></div><div class="timeline-item"><span class="timeline-dot purple"><i class="bi bi-calendar"></i></span><div><strong>Follow-up request submitted</strong><br>May 14, 2025 &nbsp; &bull; &nbsp; 11:20 AM</div></div><div class="timeline-item"><span class="timeline-dot blue"><i class="bi bi-chat"></i></span><div><strong>Consultation completed</strong><br>May 10, 2025 &nbsp; &bull; &nbsp; 09:15 AM</div></div><div class="timeline-item"><span class="timeline-dot gray"><i class="bi bi-person"></i></span><div><strong>Account registered</strong><br>Jan 15, 2025 &nbsp; &bull; &nbsp; 02:30 PM</div></div><a href="#">View Full Timeline <i class="bi bi-arrow-right"></i></a></div></section>
                </aside>
            </div>
        </main>
    </div>

    <div class="modal fade" id="patientDetailsModal" tabindex="-1" aria-labelledby="patientDetailsLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header border-0 pb-0">
                    <div class="patient-modal-head">
                        <span class="avatar"><i class="bi bi-person-fill"></i></span>
                        <div>
                            <h2 id="patientDetailsLabel">Maria Dela Cruz</h2>
                            <p class="mb-0 muted">ID: 2025-00123 <span class="tag ms-2">Student</span></p>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pt-3">
                    <div class="modal-grid">
                        <section class="modal-info-card">
                            <h3>Contact Information</h3>
                            <div class="modal-list">
                                <div><span class="label">Phone</span><span class="value">0912 345 6789</span></div>
                                <div><span class="label">Email</span><span class="value">mariadelacruz@clsu.edu.ph</span></div>
                                <div><span class="label">Address</span><span class="value">Science City of Munoz, Nueva Ecija</span></div>
                            </div>
                        </section>
                        <section class="modal-info-card">
                            <h3>Academic Profile</h3>
                            <div class="modal-list">
                                <div><span class="label">College / Department</span><span class="value">College of Education</span></div>
                                <div><span class="label">Program / Year</span><span class="value">BSED - 2nd Year</span></div>
                                <div><span class="label">Account Status</span><span class="tag">Active</span></div>
                            </div>
                        </section>
                        <section class="modal-info-card">
                            <h3>Personal Details</h3>
                            <div class="modal-list">
                                <div><span class="label">Date of Birth</span><span class="value">April 12, 2003 (22 yrs)</span></div>
                                <div><span class="label">Gender</span><span class="value">Female</span></div>
                                <div><span class="label">Registered On</span><span class="value">Jan 15, 2025</span></div>
                            </div>
                        </section>
                        <section class="modal-info-card">
                            <h3>Additional Information</h3>
                            <div class="modal-list">
                                <div><span class="label">Blood Type</span><span class="value">O+</span></div>
                                <div><span class="label">Allergies</span><span class="value">Penicillin</span></div>
                                <div><span class="label">Contact Person</span><span class="value">Liza Dela Cruz (Mother) - 0917 890 1234</span></div>
                            </div>
                        </section>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="filter-btn px-3 py-2" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="sidebar-overlay" data-close-sidebar></div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const menuToggle=document.querySelector(".menu-toggle");
        const sidebarCollapse=document.querySelector(".sidebar-collapse");
        const sidebarOverlay=document.querySelector(".sidebar-overlay");
        const sidebarLinks=document.querySelectorAll(".sidebar .nav-link,.sidebar .brand");
        const setSidebar=(isOpen)=>{document.body.classList.toggle("sidebar-open",isOpen);menuToggle.setAttribute("aria-expanded",String(isOpen));menuToggle.setAttribute("aria-label",isOpen?"Close navigation":"Open navigation")};
        menuToggle.addEventListener("click",()=>setSidebar(!document.body.classList.contains("sidebar-open")));
        const setSidebarCollapsed=(isCollapsed)=>{document.body.classList.toggle("sidebar-collapsed",isCollapsed);sidebarCollapse.setAttribute("aria-expanded",String(!isCollapsed));sidebarCollapse.setAttribute("aria-label",isCollapsed?"Expand sidebar":"Collapse sidebar");sidebarCollapse.querySelector("span").textContent=isCollapsed?"Expand":"Collapse"};
        sidebarCollapse.addEventListener("click",()=>setSidebarCollapsed(!document.body.classList.contains("sidebar-collapsed")));
        sidebarOverlay.addEventListener("click",()=>setSidebar(false));
        sidebarLinks.forEach((link)=>link.addEventListener("click",()=>setSidebar(false)));
        document.addEventListener("keydown",(event)=>{if(event.key==="Escape")setSidebar(false)});
    </script>
</body>
</html>
