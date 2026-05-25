<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Consultation Details | CLSU Infirmary Telemedicine System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        :root{--ink:#071438;--muted:#4e5b86;--green:#087d32;--green-dark:#006824;--line:#e1e7ef;--page:#fbfcfa;--blue:#2578e7;--orange:#ff8a00;--purple:#087d32;--red:#f52222;--shadow:0 12px 30px rgba(24,39,75,.07)}
        *{box-sizing:border-box}body{min-height:100vh;margin:0;color:var(--ink);font-family:"Inter","Segoe UI",system-ui,-apple-system,BlinkMacSystemFont,sans-serif;background:radial-gradient(circle at 88% 92%,rgba(255,211,67,.26),transparent 16rem),linear-gradient(180deg,#fbfdfb 0%,#f7faf5 100%)}a{color:inherit;text-decoration:none}button{font:inherit}
        .app-shell{display:grid;grid-template-columns:300px minmax(0,1fr);min-height:100vh;transition:grid-template-columns .2s ease}.sidebar{position:sticky;top:0;height:100vh;padding:1.55rem 1.25rem;border-right:1px solid var(--line);background:#fff;box-shadow:8px 0 28px rgba(24,39,75,.04);overflow-y:auto;transition:padding .2s ease}.brand{display:flex;align-items:center;gap:.85rem;margin-bottom:2.35rem}.brand img{width:62px;height:62px;border-radius:50%;object-fit:cover}.brand strong{display:block;font-size:1.42rem;font-weight:950;line-height:1.05}.brand span{color:#111;font-size:1.05rem;font-weight:800}
        .avatar,.mini-avatar{display:grid;place-items:center;border-radius:50%;color:#fff;background:linear-gradient(135deg,#d29a82 0%,#4a4865 100%);overflow:hidden}.avatar{width:64px;height:64px;border:1px solid #d4dbe7;font-size:1.85rem}.mini-avatar{width:44px;height:44px;font-size:1.1rem}.nurse-mini{display:grid;grid-template-columns:64px minmax(0,1fr);align-items:center;gap:.9rem;margin-bottom:1.6rem}.nurse-mini h2{margin:0 0 .18rem;font-size:1rem;font-weight:950}.nurse-mini p{margin:0 0 .25rem;color:var(--muted);font-size:.9rem}.online{display:inline-flex;align-items:center;gap:.38rem;color:#2d405f;font-size:.82rem}.online:before{content:"";width:10px;height:10px;border-radius:50%;background:var(--green)}
        .sidebar-collapse{display:flex;align-items:center;justify-content:center;gap:.55rem;width:100%;min-height:42px;margin:0 0 1rem;border:1px solid #d7e0ee;border-radius:9px;color:var(--green-dark);background:#fff;font-weight:950}.nav-list{display:grid;gap:.52rem;margin:0;padding:0;list-style:none}.nav-link{position:relative;display:flex;align-items:center;gap:1rem;min-height:54px;padding:.75rem .95rem;border-radius:10px;color:#1d293f;font-weight:850}.nav-link i{width:28px;color:#5d697d;font-size:1.35rem}.nav-link.active{color:var(--purple);background:#e9f5e9}.nav-link.active i{color:var(--purple)}.nav-badge{display:grid;place-items:center;min-width:24px;height:24px;margin-left:auto;padding:0 .38rem;border-radius:999px;color:#fff;background:var(--green);font-size:.78rem;font-weight:950}.nav-badge.purple{background:var(--purple)}.nav-badge.red{background:#e60012}.logout-link{margin-top:4rem}
        body.sidebar-collapsed .app-shell{grid-template-columns:88px minmax(0,1fr)}body.sidebar-collapsed .sidebar{padding-inline:.75rem;overflow-x:hidden}body.sidebar-collapsed .brand{justify-content:center;gap:0;margin-bottom:1.5rem}body.sidebar-collapsed .brand span,body.sidebar-collapsed .nurse-mini > div:last-child,body.sidebar-collapsed .sidebar-collapse span{display:none}body.sidebar-collapsed .brand img,body.sidebar-collapsed .avatar{width:48px;height:48px}body.sidebar-collapsed .nurse-mini{grid-template-columns:1fr;justify-items:center;margin-bottom:1rem}body.sidebar-collapsed .sidebar-collapse{width:48px;margin-inline:auto}body.sidebar-collapsed .nav-link{justify-content:center;gap:0;padding-inline:.6rem;font-size:0}body.sidebar-collapsed .nav-link i{width:auto;font-size:1.45rem}body.sidebar-collapsed .nav-badge{position:absolute;top:5px;right:4px;min-width:18px;height:18px;margin-left:0;padding:0 .25rem;font-size:.62rem}body.sidebar-collapsed .logout-link{margin-top:2rem}
        .main{min-width:0;padding:1.45rem 1.6rem}.topbar{display:grid;grid-template-columns:minmax(0,1fr) auto auto;align-items:start;gap:1.2rem;margin-bottom:1.35rem}.back-link{display:inline-flex;align-items:center;gap:.45rem;margin-bottom:.45rem;color:var(--purple);font-weight:950}.page-title h1{display:flex;align-items:center;gap:.7rem;margin:0 0 .35rem;font-size:clamp(1.75rem,2.25vw,2.3rem);font-weight:950}.page-title p{margin:0;color:#34426f}.bell{position:relative;display:grid;place-items:center;width:48px;height:48px;border:0;background:transparent;color:#172447;font-size:1.6rem}.bell span{position:absolute;top:0;right:0;display:grid;place-items:center;width:24px;height:24px;border-radius:50%;color:#fff;background:#e60012;font-size:.75rem;font-weight:950}.nurse-top{display:grid;grid-template-columns:48px auto 24px;align-items:center;gap:.75rem;padding-left:1rem;border-left:1px solid var(--line)}.nurse-top .avatar{width:48px;height:48px;font-size:1.35rem}.nurse-top strong{display:block;font-weight:950}.nurse-top span{font-size:.82rem;color:#26335f}.export-btn,.outline-btn{display:inline-flex;align-items:center;justify-content:center;gap:.55rem;min-height:42px;padding:0 1rem;border:1px solid #9eddb4;border-radius:7px;color:var(--purple);background:#fff;font-weight:950}.status{display:inline-grid;place-items:center;width:max-content;padding:.25rem .55rem;border:1px solid #9eddb4;border-radius:6px;color:var(--green-dark);background:#eefaef;font-size:.76rem;font-weight:950}
        .panel{border:1px solid var(--line);border-radius:10px;background:#fff;box-shadow:var(--shadow)}.summary-card{display:grid;grid-template-columns:300px repeat(5,minmax(140px,1fr));gap:0;margin-bottom:1rem;padding:1.1rem}.patient-card{display:grid;grid-template-columns:72px minmax(0,1fr);gap:1rem;align-items:center}.patient-card .avatar{width:72px;height:72px}.patient-card h2{margin:0 0 .35rem;font-size:1.1rem;font-weight:950}.patient-card p{margin:0 0 .35rem}.info-block{display:grid;align-content:start;gap:.42rem;padding:0 1.1rem;border-left:1px solid var(--line)}.info-block small{display:flex;align-items:center;gap:.45rem;font-weight:950}.info-block i{color:var(--purple);font-size:1.2rem}.info-block strong{font-weight:850}.info-block .danger{color:var(--red)}
        .tabs{display:flex;gap:1rem;margin-bottom:1rem;border-bottom:1px solid var(--line)}.tab{padding:1rem 1.35rem .85rem;border:0;border-bottom:3px solid transparent;color:var(--ink);background:transparent;font-weight:950}.tab.active{color:var(--purple);border-color:var(--purple)}.content-grid{display:grid;grid-template-columns:minmax(0,1fr) 420px;gap:1rem}.chat-panel{padding:1rem}.date-chip{width:max-content;margin:0 auto 1rem;padding:.38rem 1.8rem;border-radius:999px;background:#e9f5e9;font-weight:850}.read-only{display:flex;align-items:center;justify-content:center;gap:.65rem;margin-bottom:1.2rem;padding:.8rem;border-radius:8px;background:#f1f3fb;color:#172447}.message-row{display:grid;grid-template-columns:44px minmax(0,460px);gap:.75rem;margin-bottom:1rem}.message-row.nurse{grid-template-columns:minmax(0,520px) 44px;justify-content:end}.message-name{margin-bottom:.3rem;font-weight:950}.bubble{padding:.85rem 1rem;border:1px solid #d9e0ee;border-radius:9px;background:#fff;box-shadow:0 8px 18px rgba(24,39,75,.04);line-height:1.55}.nurse .bubble{border-color:#b8dec3;background:#f4faf3}.time{text-align:right;color:#26335f;font-size:.8rem}.event{display:grid;grid-template-columns:44px minmax(0,1fr) auto;gap:.8rem;align-items:center;margin:1rem 0;padding:.8rem;border:1px solid var(--line);border-radius:9px;background:#fff}.event-icon{display:grid;place-items:center;width:38px;height:38px;border-radius:50%;color:var(--purple);background:#eef0ff;font-size:1.2rem}.event-icon.green{color:var(--green-dark);background:#e9f5e9}.event strong{display:block}.end-note{margin-top:1rem;padding:.7rem;border-radius:7px;background:#f1f3fb;text-align:center;color:#26335f;font-size:.86rem}
        .side-stack{display:grid;gap:1rem}.side-card{padding:1.2rem}.side-card h2{margin:0 0 1rem;font-size:1.05rem;font-weight:950}.detail-list{display:grid;gap:1rem}.detail-row{display:grid;grid-template-columns:24px 140px minmax(0,1fr);gap:.55rem;align-items:start;font-size:.9rem}.detail-row i{color:#27357a}.detail-row span{color:#34426f}.detail-row strong{font-weight:850}.quick-grid{display:grid;grid-template-columns:1fr 1fr;gap:.75rem}.export-grid{display:grid;grid-template-columns:1fr 1fr;gap:1rem}.menu-toggle,.sidebar-overlay{display:none}
        @media(max-width:1450px){.summary-card{grid-template-columns:1fr 1fr 1fr}.patient-card{grid-column:1/-1}.content-grid{grid-template-columns:1fr}.side-stack{grid-template-columns:1fr 1fr}.side-stack .side-card:first-child{grid-column:1/-1}}@media(max-width:1180px){.app-shell,body.sidebar-collapsed .app-shell{grid-template-columns:1fr}.sidebar-collapse{display:none}.menu-toggle{position:fixed;top:1rem;left:1rem;z-index:1100;display:grid;place-items:center;width:48px;height:48px;border:1px solid var(--line);border-radius:12px;color:var(--green-dark);background:#fff;box-shadow:0 10px 24px rgba(24,39,75,.12);font-size:1.55rem}.sidebar-overlay{position:fixed;inset:0;z-index:1050;display:block;background:rgba(7,20,56,.42);opacity:0;pointer-events:none;transition:opacity .2s ease}body.sidebar-open .sidebar-overlay{opacity:1;pointer-events:auto}.sidebar{position:fixed;inset:0 auto 0 0;z-index:1060;width:min(84vw,310px);height:100vh;transform:translateX(-100%);transition:transform .24s ease;box-shadow:12px 0 36px rgba(7,20,56,.18)}body.sidebar-open .sidebar{transform:translateX(0)}.main{padding-top:5rem}}@media(max-width:760px){.main{padding-inline:1rem}.topbar{grid-template-columns:1fr}.bell,.nurse-top{display:none}.summary-card,.side-stack,.quick-grid,.export-grid{grid-template-columns:1fr}.info-block{border-left:0;border-top:1px solid var(--line);padding:1rem 0 0}.tabs{overflow-x:auto}.tab{white-space:nowrap}.message-row,.message-row.nurse{grid-template-columns:44px minmax(0,1fr);justify-content:start}.message-row.nurse .mini-avatar{grid-column:1}.message-row.nurse .message-content{grid-column:2;grid-row:1}.detail-row{grid-template-columns:24px minmax(0,1fr)}.detail-row strong{grid-column:2}}
    </style>
</head>
<body>
    <button class="menu-toggle" type="button" aria-label="Open navigation" aria-controls="nurseSidebar" aria-expanded="false"><i class="bi bi-list"></i></button>
    <div class="app-shell">
        <aside class="sidebar" id="nurseSidebar">
            <a class="brand" href="dashboard.php"><img src="../auth/assets/img/CLSU_Logo.jpg" alt="CLSU logo"><span><strong>CLSU Infirmary</strong>Telemedicine System</span></a>
            <div class="nurse-mini"><div class="avatar" aria-hidden="true"><i class="bi bi-person-fill"></i></div><div><h2>Nurse Ana Reyes</h2><p>Registered Nurse</p><span class="online">Online</span></div></div>
            <button class="sidebar-collapse" type="button" aria-label="Collapse sidebar" aria-expanded="true"><i class="bi bi-layout-sidebar-inset"></i><span>Collapse</span></button>
            <nav aria-label="Nurse navigation">
                <ul class="nav-list">
                    <li><a class="nav-link" href="dashboard.php"><i class="bi bi-house-door"></i> Dashboard</a></li>
                    <li><a class="nav-link" href="consultationinbox.php"><i class="bi bi-inbox"></i> Consultation Inbox <span class="nav-badge purple">12</span></a></li>
                    <li><a class="nav-link" href="activeconsult.php"><i class="bi bi-chat-dots"></i> Active Consultations <span class="nav-badge">4</span></a></li>
                    <li><a class="nav-link" href="followup.php"><i class="bi bi-calendar2-check"></i> Follow-up Requests <span class="nav-badge" style="background:#8b98ba">6</span></a></li>
                    <li><a class="nav-link" href="patientdirect.php"><i class="bi bi-people"></i> Patient Directory</a></li>
                    <li><a class="nav-link" href="notif.php"><i class="bi bi-bell"></i> Notifications <span class="nav-badge red">8</span></a></li>
                    <li><a class="nav-link" href="profile.php"><i class="bi bi-person-badge"></i> My Profile</a></li>
                    <li><a class="nav-link active" href="consulthistory.php"><i class="bi bi-clock-history"></i> Consultation History</a></li>
                </ul>
            </nav>
            <a class="nav-link logout-link" href="../auth/index.php"><i class="bi bi-box-arrow-right"></i> Logout</a>
        </aside>

        <main class="main">
            <header class="topbar">
                <div class="page-title">
                    <a class="back-link" href="consulthistory.php"><i class="bi bi-chevron-left"></i> Back to Consultation History</a>
                    <h1>Consultation Details <span class="status">Completed</span></h1>
                    <p>View consultation information, chat history, notes, and attachments.</p>
                </div>
                <a class="export-btn" href="#"><i class="bi bi-download"></i> Export This Consultation</a>
                <button class="bell" type="button" aria-label="Notifications"><i class="bi bi-bell"></i><span>8</span></button>
                <div class="nurse-top"><span class="avatar"><i class="bi bi-person-fill"></i></span><div><strong>Nurse Ana Reyes</strong><span>Registered Nurse</span></div><i class="bi bi-chevron-down"></i></div>
            </header>

            <section class="panel summary-card" aria-label="Consultation summary">
                <div class="patient-card"><span class="avatar"><i class="bi bi-person-fill"></i></span><div><h2>Maria Dela Cruz</h2><p>ID: 2025-00123</p><p>20 yrs &bull; Female &bull; Student</p><a class="outline-btn" style="min-height:32px;padding:0 .7rem" href="patientdirect.php"><i class="bi bi-person-badge"></i> View Patient Profile</a></div></div>
                <div class="info-block"><small><i class="bi bi-chat-dots"></i> Type</small><strong>Chat Consultation</strong></div>
                <div class="info-block"><small><i class="bi bi-arrow-up"></i> Triage Level</small><strong class="danger">Level 2 - Urgent</strong></div>
                <div class="info-block"><small><i class="bi bi-check-circle"></i> Status</small><strong>Completed</strong><span>May 16, 2025&nbsp; 10:45 AM</span></div>
                <div class="info-block"><small><i class="bi bi-person"></i> Handled By</small><strong>Nurse Ana Reyes</strong></div>
                <div class="info-block"><small><i class="bi bi-clock"></i> Duration</small><strong>25 minutes</strong></div>
            </section>

            <nav class="tabs" aria-label="Consultation detail tabs">
                <button class="tab active" type="button">Chat History</button>
                <button class="tab" type="button">Consultation Summary</button>
                <button class="tab" type="button">Nurse Notes</button>
                <button class="tab" type="button">Attachments (2)</button>
                <button class="tab" type="button">Activity Log</button>
            </nav>

            <div class="content-grid">
                <section class="panel chat-panel">
                    <div class="date-chip">May 16, 2025</div>
                    <div class="read-only"><i class="bi bi-lock-fill"></i> This consultation has been completed. You are viewing the chat history in read-only mode.</div>
                    <div class="message-row"><span class="mini-avatar"><i class="bi bi-person-fill"></i></span><div class="message-content"><div class="message-name">Maria Dela Cruz <span class="muted">(Patient)</span></div><div class="bubble">Good morning po nurse. I have fever and cough for 2 days now.<div class="time">10:20 AM</div></div></div></div>
                    <div class="message-row nurse"><div class="message-content"><div class="message-name text-end">Nurse Ana Reyes</div><div class="bubble">Good morning Maria. Noted with your symptoms.<br>May I ask if you have any body pain or sore throat?<div class="time">10:22 AM <i class="bi bi-check2-all"></i></div></div></div><span class="mini-avatar"><i class="bi bi-person-fill"></i></span></div>
                    <div class="message-row"><span class="mini-avatar"><i class="bi bi-person-fill"></i></span><div class="message-content"><div class="message-name">Maria Dela Cruz <span class="muted">(Patient)</span></div><div class="bubble">Yes po, may sore throat din and body aches.<div class="time">10:23 AM</div></div></div></div>
                    <div class="message-row nurse"><div class="message-content"><div class="message-name text-end">Nurse Ana Reyes</div><div class="bubble">Please rest and drink plenty of fluids.<br>I will endorse this to our physician for further evaluation.<div class="time">10:25 AM <i class="bi bi-check2-all"></i></div></div></div><span class="mini-avatar"><i class="bi bi-person-fill"></i></span></div>
                    <div class="event"><span class="event-icon"><i class="bi bi-clock"></i></span><div><strong>Consultation escalated to physician</strong><span>Dr. Roberto Garcia accepted the escalation.</span></div><span>10:26 AM</span></div>
                    <div class="event"><span class="event-icon green"><i class="bi bi-check2"></i></span><div><strong>Consultation completed</strong><span>Advice given and patient advised to seek medical attention if symptoms persist.</span></div><span>10:45 AM</span></div>
                    <div class="end-note">You are viewing this conversation in read-only mode.</div>
                </section>

                <aside class="side-stack">
                    <section class="panel side-card">
                        <h2>Consultation Information</h2>
                        <div class="detail-list">
                            <div class="detail-row"><i class="bi bi-clipboard2-pulse"></i><span>Consultation ID</span><strong>CT-2025-000345</strong></div>
                            <div class="detail-row"><i class="bi bi-calendar2"></i><span>Date &amp; Time</span><strong>May 16, 2025 &bull; 10:20 AM</strong></div>
                            <div class="detail-row"><i class="bi bi-window"></i><span>Channel</span><strong>Web Portal</strong></div>
                            <div class="detail-row"><i class="bi bi-arrow-up"></i><span>Triage Level</span><strong style="color:var(--red)">Level 2 - Urgent</strong></div>
                            <div class="detail-row"><i class="bi bi-check-circle"></i><span>Status</span><strong><span class="status">Completed</span></strong></div>
                            <div class="detail-row"><i class="bi bi-eye"></i><span>Outcome</span><strong>Advice Given</strong></div>
                            <div class="detail-row"><i class="bi bi-file-medical"></i><span>Chief Complaint</span><strong>Fever and cough for 2 days</strong></div>
                            <div class="detail-row"><i class="bi bi-chat-heart"></i><span>Referred/Escalated</span><strong>Escalated to Physician</strong></div>
                            <div class="detail-row"><i class="bi bi-person"></i><span>Physician</span><strong>Dr. Roberto Garcia</strong></div>
                            <div class="detail-row"><i class="bi bi-clock-history"></i><span>Completed At</span><strong>May 16, 2025 &bull; 10:45 AM</strong></div>
                        </div>
                    </section>
                    <section class="panel side-card">
                        <h2>Quick Actions</h2>
                        <div class="quick-grid"><a class="outline-btn" href="patientdirect.php"><i class="bi bi-person-badge"></i> View Patient Profile</a><a class="outline-btn" href="#"><i class="bi bi-printer"></i> Print Summary</a></div>
                    </section>
                    <section class="panel side-card">
                        <h2>Download/Export</h2>
                        <div class="export-grid"><a class="outline-btn" href="#"><i class="bi bi-filetype-pdf text-danger"></i> Export as PDF</a><a class="outline-btn" href="#"><i class="bi bi-filetype-csv text-success"></i> Export as CSV</a></div>
                    </section>
                </aside>
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
