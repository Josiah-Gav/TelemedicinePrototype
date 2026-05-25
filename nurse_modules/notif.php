<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Notifications | CLSU Infirmary Telemedicine System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        :root{--ink:#071438;--muted:#4e5b86;--green:#087d32;--green-dark:#006824;--line:#e1e7ef;--page:#fbfcfa;--blue:#2578e7;--orange:#ff8a00;--purple:#087d32;--red:#f52222;--shadow:0 12px 30px rgba(24,39,75,.07)}
        *{box-sizing:border-box}body{min-height:100vh;margin:0;color:var(--ink);font-family:"Inter","Segoe UI",system-ui,-apple-system,BlinkMacSystemFont,sans-serif;background:radial-gradient(circle at 88% 92%,rgba(255,211,67,.26),transparent 16rem),linear-gradient(180deg,#fbfdfb 0%,#f7faf5 100%)}a{color:inherit;text-decoration:none}button{font:inherit}
        .app-shell{display:grid;grid-template-columns:300px minmax(0,1fr);min-height:100vh;transition:grid-template-columns .2s ease}.sidebar{position:sticky;top:0;height:100vh;padding:1.55rem 1.25rem;border-right:1px solid var(--line);background:#fff;box-shadow:8px 0 28px rgba(24,39,75,.04);overflow-y:auto;transition:padding .2s ease}.brand{display:flex;align-items:center;gap:.85rem;margin-bottom:2.35rem}.brand img{width:62px;height:62px;border-radius:50%;object-fit:cover}.brand strong{display:block;font-size:1.36rem;font-weight:950;line-height:1.05}.brand span{color:#111;font-size:1rem;font-weight:800}
        .nurse-mini{display:grid;grid-template-columns:64px minmax(0,1fr);align-items:center;gap:.9rem;margin-bottom:1.6rem}.avatar,.mini-avatar,.notif-icon{display:grid;place-items:center;border-radius:50%;overflow:hidden}.avatar,.mini-avatar{color:#fff;background:linear-gradient(145deg,#f3b79b,#253055)}.avatar{width:58px;height:58px;font-size:1.5rem}.nurse-mini .avatar{width:64px;height:64px;font-size:1.85rem}.mini-avatar{width:48px;height:48px;font-size:1.2rem}.nurse-mini h2{margin:0 0 .18rem;font-size:1rem;font-weight:950}.nurse-mini p{margin:0 0 .25rem;color:var(--muted);font-size:.9rem}.online{display:inline-flex;align-items:center;gap:.38rem;color:#2d405f;font-size:.82rem}.online:before{content:"";width:10px;height:10px;border-radius:50%;background:var(--green)}
        .nav-list{display:grid;gap:.52rem;margin:0;padding:0;list-style:none}.nav-link{position:relative;display:flex;align-items:center;gap:1rem;min-height:54px;padding:.75rem .95rem;border-radius:10px;color:#1d293f;font-weight:850}.nav-link i{width:28px;color:#5d697d;font-size:1.35rem}.nav-link.active{color:var(--green-dark);background:linear-gradient(90deg,#e7f4e6,#f5faf3)}.nav-link.active i{color:var(--green)}.nav-badge{display:grid;place-items:center;min-width:24px;height:24px;margin-left:auto;padding:0 .38rem;border-radius:999px;color:#fff;background:var(--green);font-size:.78rem;font-weight:950}.nav-badge.red{background:#e60012}.nav-badge.blue{background:#0d6efd}.nav-badge.slate{background:#7b88b8}
        .shift-card{margin:1.9rem 0 1.25rem;padding:1rem;border:1px solid #cfe8d8;border-radius:10px;background:linear-gradient(135deg,#f5fff8,#eaf7ef)}.shift-card header{display:flex;align-items:center;justify-content:space-between;margin-bottom:.75rem;color:var(--green-dark);font-weight:950}.shift-status{display:flex;align-items:center;gap:.65rem;margin-bottom:.55rem;color:var(--green-dark);font-weight:850}.shift-status:before{content:"";width:9px;height:9px;border-radius:50%;background:#34c76b}.shift-card p{margin:.35rem 0 0 1.55rem;color:#26335f;font-size:.9rem}.logout-link{margin-top:6.5rem}.sidebar-collapse{display:flex;align-items:center;justify-content:center;gap:.55rem;width:100%;min-height:42px;margin:0 0 1rem;border:1px solid #d7e0ee;border-radius:9px;color:var(--green-dark);background:#fff;font-weight:950}
        body.sidebar-collapsed .app-shell{grid-template-columns:88px minmax(0,1fr)}body.sidebar-collapsed .sidebar{padding-inline:.75rem;overflow-x:hidden}body.sidebar-collapsed .brand{justify-content:center;gap:0;margin-bottom:1.5rem}body.sidebar-collapsed .brand span,body.sidebar-collapsed .nurse-mini > div:last-child,body.sidebar-collapsed .shift-card,body.sidebar-collapsed .sidebar-collapse span{display:none}body.sidebar-collapsed .brand img{width:48px;height:48px}body.sidebar-collapsed .nurse-mini{grid-template-columns:1fr;justify-items:center;margin-bottom:1rem}body.sidebar-collapsed .nurse-mini .avatar{width:48px;height:48px;font-size:1.35rem}body.sidebar-collapsed .sidebar-collapse{width:48px;margin-inline:auto}body.sidebar-collapsed .nav-link{justify-content:center;gap:0;padding-inline:.6rem;font-size:0}body.sidebar-collapsed .nav-link i{width:auto;font-size:1.45rem}body.sidebar-collapsed .nav-badge{position:absolute;top:5px;right:4px;min-width:18px;height:18px;margin-left:0;padding:0 .25rem;font-size:.62rem}body.sidebar-collapsed .logout-link{margin-top:2rem}
        .main{min-width:0;padding:1.35rem 1.4rem}.topbar{display:grid;grid-template-columns:minmax(0,1fr) minmax(260px,360px) auto auto;align-items:center;gap:1.2rem;margin-bottom:1.25rem}.page-title h1{margin:0 0 .45rem;font-size:clamp(1.8rem,2.3vw,2.4rem);font-weight:950}.page-title p{margin:0;color:#34426f}.search-box{position:relative}.search-box input{width:100%;height:48px;padding:0 3rem 0 1rem;border:1px solid #cfd8eb;border-radius:8px;background:#fff;outline:none}.search-box i{position:absolute;right:1rem;top:50%;transform:translateY(-50%);font-size:1.35rem;color:#0a1b4f}.bell{position:relative;display:grid;place-items:center;width:48px;height:48px;border:0;background:transparent;color:#172447;font-size:1.55rem}.bell span{position:absolute;top:.05rem;right:.05rem;display:grid;place-items:center;width:25px;height:25px;border-radius:50%;color:#fff;background:#e60012;font-size:.75rem;font-weight:950}.nurse-top{display:grid;grid-template-columns:48px auto 24px;align-items:center;gap:.75rem;padding-left:1rem;border-left:1px solid var(--line)}.nurse-top strong{display:block;font-weight:950}.nurse-top span{font-size:.82rem;color:#26335f}
        .notif-layout{display:grid;grid-template-columns:minmax(520px,.9fr) minmax(520px,1fr);gap:0}.panel{border:1px solid var(--line);background:#fff;box-shadow:var(--shadow)}.list-panel{border-radius:10px 0 0 10px;overflow:hidden}.detail-panel{border-left:0;border-radius:0 10px 10px 0;padding:1rem}.chip-row{display:flex;flex-wrap:wrap;gap:.85rem;padding:1.25rem;border-bottom:1px solid var(--line)}.chip{display:inline-flex;align-items:center;gap:.65rem;min-height:42px;padding:0 1rem;border:1px solid #dbe4f2;border-radius:7px;background:#fff;color:#34426f;font-weight:850}.chip.active{color:#0d62d9;border-color:#7db2ff;background:#f8fbff}.chip span{display:grid;place-items:center;min-width:24px;height:24px;padding:0 .4rem;border-radius:999px;background:#eef3fb;font-weight:950}.chip .red{color:#e60012;background:#ffe9eb}.list-toolbar{display:flex;align-items:center;justify-content:space-between;gap:1rem;padding:1rem 1.25rem;border-bottom:1px solid var(--line)}.sort-btn,.action-btn,.page-btn{border:1px solid #d7e0ee;border-radius:7px;background:#fff;color:#172447;font-weight:850}.sort-btn{display:flex;align-items:center;gap:.65rem;height:42px;padding:0 1rem}.mark-read{border:0;background:transparent;color:#263b8c;font-weight:850}
        .notif-list{display:grid}.notif-item{position:relative;display:grid;grid-template-columns:72px minmax(0,1fr) auto;gap:.9rem;padding:1.15rem 1.25rem;border-bottom:1px solid #edf1f7;background:#fff}.notif-item.selected{margin:1rem 1rem 0;border:1px solid #8dbdff;border-radius:8px;background:#f8fbff}.notif-icon{width:58px;height:58px;color:var(--blue);background:#eaf2ff;font-size:1.55rem}.notif-icon.red{color:#e60012;background:#ffe6e8}.notif-icon.purple{color:var(--purple);background:#f1e8ff}.notif-icon.orange{color:#ff7800;background:#fff0df}.notif-icon.green{color:var(--green);background:#e9f5e9}.notif-icon.gray{color:#5d697d;background:#eef2f8}.notif-copy h2{margin:0 0 .35rem;font-size:1rem;font-weight:950}.notif-copy p{margin:.18rem 0;color:#071438;font-size:.9rem}.notif-meta{margin-top:.65rem;color:#34426f;font-size:.82rem}.notif-time{display:grid;align-content:start;justify-items:end;gap:.7rem;color:#263b78;font-size:.85rem}.unread-dot{width:12px;height:12px;border-radius:50%;background:#267dff}.action-btn{min-width:130px;min-height:38px;padding:0 .85rem;color:#0d62d9}.action-btn.orange{color:#e66d00;border-color:#ffc58d}.action-btn.green{color:var(--green-dark);border-color:#a8ddb9}.action-btn.gray{color:#526182}.pager{display:flex;align-items:center;justify-content:space-between;gap:1rem;padding:1rem 1.25rem;color:#34426f;font-size:.84rem}.pages{display:flex;gap:.45rem}.page-btn{display:grid;place-items:center;min-width:34px;height:34px}.page-btn.active{color:#fff;background:#0d6efd;border-color:#0d6efd}
        .back-link{display:inline-flex;align-items:center;gap:.55rem;margin:.35rem 0 1.2rem;color:#0d62d9;font-weight:950}.detail-alert{display:grid;grid-template-columns:74px minmax(0,1fr) auto;gap:1rem;padding:1.25rem;border:1px solid #ffc9cd;border-radius:8px;background:linear-gradient(135deg,#fff6f7,#fff)}.detail-alert h2{margin:0 0 .45rem;font-size:1.1rem;font-weight:950}.pill{display:inline-grid;place-items:center;width:max-content;padding:.28rem .6rem;border-radius:6px;border:1px solid;font-size:.78rem;font-weight:950}.pill.red{color:#e60012;border-color:#ffadb5;background:#fff1f2}.pill.blue{color:#0d62d9;border-color:#afd0ff;background:#f3f8ff}.pill.green{color:var(--green-dark);border-color:#a9dfba;background:#eefaf3}
        .detail-card{margin-top:1rem;padding:1.25rem;border:1px solid var(--line);border-radius:8px;background:#fff}.detail-card header{display:flex;align-items:center;justify-content:space-between;gap:1rem;margin-bottom:1rem}.patient-row{display:grid;grid-template-columns:68px minmax(0,1fr);gap:1rem;align-items:center;padding-bottom:1rem;border-bottom:1px solid var(--line)}.patient-row h3{margin:0 0 .3rem;font-size:1rem;font-weight:950}.info-table{display:grid;gap:.65rem;margin-top:1rem}.info-line{display:grid;grid-template-columns:180px minmax(0,1fr);gap:1rem;font-size:.9rem}.info-line span:first-child{font-weight:850;color:#34426f}.quote{margin-top:1rem;padding:1rem 1.25rem;border:1px solid #cfe0ff;border-radius:7px;background:#f8fbff;color:#071438}.quote:before,.quote:after{color:#1c64d8;font-size:1.3rem;font-weight:950}.quote:before{content:"\201C";margin-right:.35rem}.quote:after{content:"\201D";float:right}.action-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:.85rem;margin-top:.75rem}.recommend-btn{display:flex;align-items:center;gap:.85rem;min-height:70px;padding:0 1rem;border:1px solid #d7e0ee;border-radius:8px;background:#fff;text-align:left;font-weight:950}.recommend-btn span{display:block;color:#34426f;font-size:.8rem;font-weight:650}.recommend-btn.blue{color:#0d62d9;border-color:#afd0ff;background:#f7fbff}.recommend-btn.green{color:var(--green-dark);border-color:#a8ddb9;background:#f6fff8}.recommend-btn.purple{color:#087d32;border-color:#d2baff;background:#f3fbf5}.recommend-btn.orange{color:#e66d00;border-color:#ffc58d;background:#fff8ee}.extra-info{display:grid;gap:.7rem;margin-top:.5rem}.menu-toggle,.sidebar-overlay{display:none}
        @media(max-width:1380px){.notif-layout{grid-template-columns:1fr}.list-panel,.detail-panel{border-radius:10px;border:1px solid var(--line)}.detail-panel{border-top:0}.topbar{grid-template-columns:minmax(0,1fr) minmax(240px,340px) auto auto}}
        @media(max-width:1180px){.app-shell,body.sidebar-collapsed .app-shell{grid-template-columns:1fr}.sidebar-collapse{display:none}.menu-toggle{position:fixed;top:1rem;left:1rem;z-index:1100;display:grid;place-items:center;width:48px;height:48px;border:1px solid var(--line);border-radius:12px;color:var(--green-dark);background:#fff;box-shadow:0 10px 24px rgba(24,39,75,.12);font-size:1.55rem}.sidebar-overlay{position:fixed;inset:0;z-index:1050;display:block;background:rgba(7,20,56,.42);opacity:0;pointer-events:none;transition:opacity .2s ease}body.sidebar-open .sidebar-overlay{opacity:1;pointer-events:auto}.sidebar{position:fixed;inset:0 auto 0 0;z-index:1060;width:min(84vw,310px);height:100vh;transform:translateX(-100%);transition:transform .24s ease;box-shadow:12px 0 36px rgba(7,20,56,.18)}body.sidebar-open .sidebar{transform:translateX(0)}.main{padding-top:5rem}}
        @media(max-width:760px){.main{padding-inline:1rem}.topbar{grid-template-columns:1fr auto}.topbar .search-box{grid-column:1/-1;order:2}.nurse-top{display:none}.notif-layout{display:block}.notif-item,.detail-alert{grid-template-columns:58px minmax(0,1fr)}.notif-time{grid-column:2;justify-items:start}.action-grid,.info-line{grid-template-columns:1fr}.pager{align-items:flex-start;flex-direction:column}.list-toolbar{align-items:flex-start;flex-direction:column}.chip-row{gap:.55rem}.chip{min-height:38px}.detail-card header{align-items:flex-start;flex-direction:column}.patient-row{grid-template-columns:56px minmax(0,1fr)}}
    </style>
</head>
<body>
    <button class="menu-toggle" type="button" aria-label="Open navigation" aria-controls="nurseSidebar" aria-expanded="false"><i class="bi bi-list"></i></button>
    <div class="app-shell">
        <aside class="sidebar" id="nurseSidebar">
            <a class="brand" href="dashboard.php"><img src="../auth/assets/img/CLSU_Logo.jpg" alt="CLSU logo"><span><strong>CLSU Infirmary</strong>Telemedicine System</span></a>
            <section class="nurse-mini"><span class="avatar"><i class="bi bi-person-fill"></i></span><div><h2>Nurse Ana Reyes</h2><p>Registered Nurse</p><span class="online">Online</span></div></section>
            <button class="sidebar-collapse" type="button" aria-label="Collapse sidebar" aria-expanded="true"><i class="bi bi-layout-sidebar-inset"></i><span>Collapse</span></button>
            <nav aria-label="Nurse navigation">
                <ul class="nav-list">
                    <li><a class="nav-link" href="dashboard.php"><i class="bi bi-house-door"></i> Dashboard</a></li>
                    <li><a class="nav-link" href="consultationinbox.php"><i class="bi bi-inbox"></i> Consultation Inbox <span class="nav-badge">12</span></a></li>
                    <li><a class="nav-link" href="activeconsult.php"><i class="bi bi-chat-dots"></i> Active Consultations <span class="nav-badge">3</span></a></li>
                    <li><a class="nav-link" href="followup.php"><i class="bi bi-calendar2-check"></i> Follow-up Requests <span class="nav-badge">8</span></a></li>
                    <li><a class="nav-link" href="patientdirect.php"><i class="bi bi-people"></i> Patient Directory</a></li>
                    <li><a class="nav-link" href="consulthistory.php"><i class="bi bi-clock-history"></i> Consultation History</a></li>
                    <li><a class="nav-link active" href="notif.php"><i class="bi bi-bell"></i> Notifications <span class="nav-badge">4</span></a></li>
                    <li><a class="nav-link" href="profile.php"><i class="bi bi-person-badge"></i> Profile</a></li>
                </ul>
            </nav>
            <a class="nav-link logout-link" href="../auth/index.php"><i class="bi bi-box-arrow-right"></i> Logout</a>
        </aside>

        <main class="main">
            <header class="topbar">
                <div class="page-title"><h1>Notifications</h1><p>Stay updated with important alerts and activities.</p></div>
                <label class="search-box"><input type="search" placeholder="Search notifications..."><i class="bi bi-search"></i></label>
                <button class="bell" type="button" aria-label="Notifications"><i class="bi bi-bell"></i><span>8</span></button>
                <div class="nurse-top"><span class="avatar"><i class="bi bi-person-fill"></i></span><div><strong>Nurse Ana Reyes</strong><span>Registered Nurse</span></div><i class="bi bi-chevron-down"></i></div>
            </header>

            <div class="notif-layout">
                <section class="panel list-panel">
                    <div class="chip-row">
                        <button class="chip active">All <span>(32)</span></button>
                        <button class="chip">Unread <span class="red">8</span></button>
                        <button class="chip">Consultation Requests <span>12</span></button>
                        <button class="chip">Urgent Cases <span>4</span></button>
                        <button class="chip">Follow-ups <span>6</span></button>
                        <button class="chip">Escalations <span>3</span></button>
                        <button class="chip">System Updates <span>7</span></button>
                    </div>
                    <div class="list-toolbar">
                        <button class="sort-btn">Sort by: Newest First <i class="bi bi-chevron-down"></i></button>
                        <button class="mark-read"><i class="bi bi-check2 me-2"></i>Mark all as read</button>
                    </div>
                    <div class="notif-list">
                        <article class="notif-item selected">
                            <span class="notif-icon red"><i class="bi bi-clipboard2-pulse"></i></span>
                            <div class="notif-copy"><h2>New Urgent Consultation Request</h2><p>Maria Dela Cruz submitted an urgent consultation request.</p><div class="notif-meta"><i class="bi bi-person me-2"></i>Patient: Maria Dela Cruz &nbsp; (2025-00123)</div></div>
                            <div class="notif-time"><span>10:24 AM</span><span class="unread-dot"></span><button class="action-btn">Review in Inbox</button></div>
                        </article>
                        <article class="notif-item"><span class="notif-icon purple"><i class="bi bi-chat-dots"></i></span><div class="notif-copy"><h2>Patient Replied</h2><p>Juan Miguel Santos replied to your message.</p><div class="notif-meta"><i class="bi bi-person me-2"></i>Consultation ID: CT-2025-000345</div></div><div class="notif-time"><span>10:15 AM</span><span class="unread-dot"></span><button class="action-btn">Open Consultation</button></div></article>
                        <article class="notif-item"><span class="notif-icon orange"><i class="bi bi-person-plus"></i></span><div class="notif-copy"><h2>New Follow-up Request</h2><p>Angela Reyes submitted a follow-up request.</p><div class="notif-meta"><i class="bi bi-person me-2"></i>Patient: Angela Reyes &nbsp; (2025-00120)</div></div><div class="notif-time"><span>09:58 AM</span><span class="unread-dot"></span><button class="action-btn orange">View Follow-up</button></div></article>
                        <article class="notif-item"><span class="notif-icon green"><i class="bi bi-arrow-up"></i></span><div class="notif-copy"><h2>Escalation Accepted</h2><p>Dr. Roberto Garcia accepted an escalation.</p><div class="notif-meta"><i class="bi bi-person me-2"></i>Patient: Pedro Garcia &nbsp; (2025-00115)</div></div><div class="notif-time"><span>09:40 AM</span><span class="unread-dot"></span><button class="action-btn green">View Escalation</button></div></article>
                        <article class="notif-item"><span class="notif-icon"><i class="bi bi-check-circle"></i></span><div class="notif-copy"><h2>Consultation Completed</h2><p>Katrina Lopez consultation has been completed.</p><div class="notif-meta"><i class="bi bi-person me-2"></i>Consultation ID: CT-2025-000338</div></div><div class="notif-time"><span>09:25 AM</span><button class="action-btn">View Summary</button></div></article>
                        <article class="notif-item"><span class="notif-icon gray"><i class="bi bi-x-circle"></i></span><div class="notif-copy"><h2>Request Declined</h2><p>You declined a consultation request.</p><div class="notif-meta"><i class="bi bi-person me-2"></i>Patient: Kevin Lopez &nbsp; (2025-00125)</div></div><div class="notif-time"><span>Yesterday, 04:30 PM</span><button class="action-btn gray">View Details</button></div></article>
                        <article class="notif-item"><span class="notif-icon" style="color:#0f9aac;background:#e7fbfe"><i class="bi bi-database"></i></span><div class="notif-copy"><h2>System Sync Completed</h2><p>Data successfully synchronized with HMS.</p><div class="notif-meta">Records synced: 12</div></div><div class="notif-time"><span>Yesterday, 02:10 PM</span><button class="action-btn" style="color:#0f8394">View Logs</button></div></article>
                    </div>
                    <div class="pager"><span>Showing 1 to 7 of 32 notifications</span><div class="pages"><button class="page-btn"><i class="bi bi-chevron-left"></i></button><button class="page-btn active">1</button><button class="page-btn">2</button><button class="page-btn">3</button><button class="page-btn">4</button><button class="page-btn">5</button><button class="page-btn"><i class="bi bi-chevron-right"></i></button></div></div>
                </section>

                <section class="panel detail-panel">
                    <a class="back-link" href="#"><i class="bi bi-arrow-left"></i>Back to Notifications</a>
                    <div class="detail-alert">
                        <span class="notif-icon red"><i class="bi bi-clipboard2-pulse"></i></span>
                        <div><h2>New Urgent Consultation Request <span class="pill red ms-2">Urgent</span></h2><p class="mb-0">This is a new urgent consultation request that requires immediate review.</p></div>
                        <div class="text-end muted">10:24 AM<br>May 16, 2025</div>
                    </div>
                    <section class="detail-card">
                        <header><h2 class="fs-6 fw-bold m-0">Patient Information</h2><button class="action-btn">View Profile</button></header>
                        <div class="patient-row"><span class="mini-avatar"><i class="bi bi-person-fill"></i></span><div><h3>Maria Dela Cruz</h3><p class="mb-0">ID: 2025-00123 &nbsp; &bull; &nbsp; 20 yrs &nbsp; &bull; &nbsp; Female &nbsp; &bull; &nbsp; Student</p><p class="mb-0 muted">College of Education &nbsp; &bull; &nbsp; BSED - 2nd Year</p></div></div>
                        <div class="info-table">
                            <div class="info-line"><span>Chief Complaint:</span><strong>Fever and cough for 2 days</strong></div>
                            <div class="info-line"><span>Triage Level:</span><strong><span class="pill red">Level 2 - Urgent</span></strong></div>
                            <div class="info-line"><span>Submitted At:</span><strong>May 16, 2025 &nbsp; &bull; &nbsp; 10:20 AM</strong></div>
                            <div class="info-line"><span>Submitted Via:</span><strong>Web Portal</strong></div>
                        </div>
                        <h3 class="fs-6 fw-bold mt-4">Message Preview</h3>
                        <div class="quote">Good morning po. I have fever (38&deg;C) and cough for 2 days now. I also feel weak and have body pain.</div>
                        <hr>
                        <h3 class="fs-6 fw-bold">Recommended Actions</h3>
                        <p class="muted">Choose an action to manage this notification.</p>
                        <div class="action-grid">
                            <button class="recommend-btn blue"><i class="bi bi-envelope fs-4"></i><div>Review in Consultation Inbox<span>Go to inbox to review this request</span></div></button>
                            <button class="recommend-btn green"><i class="bi bi-chat-dots fs-4"></i><div>Open Consultation<span>Start or continue consultation</span></div></button>
                            <button class="recommend-btn purple"><i class="bi bi-arrow-up fs-4"></i><div>Escalate to Physician<span>Forward to physician for review</span></div></button>
                            <button class="recommend-btn orange"><i class="bi bi-clock fs-4"></i><div>Mark as Read<span>Mark this notification as read</span></div></button>
                        </div>
                    </section>
                    <section class="detail-card">
                        <h2 class="fs-6 fw-bold">Additional Information</h2>
                        <div class="extra-info">
                            <div class="info-line"><span>Notification ID:</span><strong>NTF-2025-000678</strong></div>
                            <div class="info-line"><span>Status:</span><strong><span class="pill blue">Unread</span></strong></div>
                        </div>
                    </section>
                </section>
            </div>
        </main>
    </div>
    <div class="sidebar-overlay" data-close-sidebar></div>
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
