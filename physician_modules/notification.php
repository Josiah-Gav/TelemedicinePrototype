<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Notifications | CLSU Infirmary Telemedicine System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        :root{--ink:#071438;--muted:#4e5b86;--green:#087d32;--green-dark:#006824;--green-soft:#e9f5e9;--line:#dfe6f2;--page:#f7faf8;--gold:#e5a600;--blue:#1687d9;--purple:#7c3df0;--shadow:0 12px 30px rgba(24,39,75,.07)}
        *{box-sizing:border-box}body{min-height:100vh;margin:0;color:var(--ink);font-family:"Inter","Segoe UI",system-ui,-apple-system,BlinkMacSystemFont,sans-serif;background:var(--page)}a{color:inherit;text-decoration:none}button{font:inherit}
        .app-shell{display:grid;grid-template-columns:300px minmax(0,1fr);min-height:100vh;transition:grid-template-columns .2s ease}.sidebar{position:sticky;top:0;height:100vh;padding:1.55rem 1.25rem;border-right:1px solid var(--line);background:#fff;box-shadow:8px 0 28px rgba(24,39,75,.04);overflow-y:auto;transition:padding .2s ease}.brand{display:flex;align-items:center;gap:.85rem;margin-bottom:2.35rem}.brand img{width:62px;height:62px;border-radius:50%;object-fit:cover}.brand strong{display:block;color:var(--green-dark);font-size:1.35rem;font-weight:950;line-height:1.05}.brand span{display:block;color:var(--green-dark);font-size:1rem;font-weight:800}
        .avatar,.doctor-avatar{display:grid;place-items:center;border-radius:50%;color:#fff;background:linear-gradient(135deg,#d29a82 0%,#4a4865 100%);overflow:hidden}.avatar{width:64px;height:64px;border:1px solid #d4dbe7;font-size:1.85rem}.doctor-avatar{width:58px;height:58px;border:1px solid var(--line);font-size:1.45rem}.physician-mini{display:grid;grid-template-columns:64px minmax(0,1fr);align-items:center;gap:.9rem;margin-bottom:1.6rem}.physician-mini h2{margin:0 0 .18rem;font-size:1rem;font-weight:950}.physician-mini p{margin:0 0 .25rem;color:var(--muted);font-size:.9rem}.online{display:inline-flex;align-items:center;gap:.38rem;color:#2d405f;font-size:.82rem}.online:before{content:"";width:10px;height:10px;border-radius:50%;background:var(--green)}
        .sidebar-collapse{display:flex;align-items:center;justify-content:center;gap:.55rem;width:100%;min-height:42px;margin:0 0 1rem;border:1px solid #d7e0ee;border-radius:9px;color:var(--green-dark);background:#fff;font-weight:950}.nav-list{display:grid;gap:.45rem;margin:0;padding:0 0 1.4rem;border-bottom:1px solid var(--line);list-style:none}.nav-secondary{display:grid;gap:.45rem;margin:1.25rem 0 1.6rem;padding:0;list-style:none}.nav-link{position:relative;display:flex;align-items:center;gap:1rem;min-height:56px;padding:.8rem .95rem;border-radius:10px;color:#1d293f;font-weight:850}.nav-link:before{content:"";position:absolute;left:-1.25rem;width:8px;height:44px;border-radius:0 8px 8px 0;background:transparent}.nav-link i{width:28px;color:#5d697d;font-size:1.35rem}.nav-link.active{color:var(--green-dark);background:linear-gradient(90deg,#e7f4e6,#f5faf3)}.nav-link.active:before{background:var(--green)}.nav-link.active i{color:var(--green)}.nav-badge{display:grid;place-items:center;min-width:24px;height:24px;margin-left:auto;padding:0 .4rem;border-radius:999px;color:#fff;background:var(--green);font-size:.76rem;font-weight:950}.campus-card{margin:1.4rem 0 1.2rem;padding:1.2rem;border:1px solid #dcebdd;border-radius:10px;background:linear-gradient(145deg,#eef8ef,#f8fcf8);color:var(--green-dark)}.campus-art{height:76px;margin-bottom:.8rem;opacity:.55;background:linear-gradient(180deg,transparent 55%,#2c7141 0);clip-path:polygon(0 76%,12% 62%,18% 65%,24% 30%,31% 66%,48% 50%,58% 66%,72% 46%,84% 62%,100% 70%,100% 100%,0 100%)}.campus-card h3{margin:0 0 .55rem;font-size:1.25rem;font-weight:950}.campus-card p{margin:0;font-style:italic}.logout-link{margin-top:1rem}
        body.sidebar-collapsed .app-shell{grid-template-columns:88px minmax(0,1fr)}body.sidebar-collapsed .sidebar{padding-inline:.75rem;overflow-x:hidden}body.sidebar-collapsed .brand{justify-content:center;gap:0;margin-bottom:1.5rem}body.sidebar-collapsed .brand span,body.sidebar-collapsed .physician-mini > div:last-child,body.sidebar-collapsed .sidebar-collapse span,body.sidebar-collapsed .campus-card{display:none}body.sidebar-collapsed .brand img,body.sidebar-collapsed .avatar{width:48px;height:48px}body.sidebar-collapsed .physician-mini{grid-template-columns:1fr;justify-items:center;margin-bottom:1rem}body.sidebar-collapsed .sidebar-collapse{width:48px;margin-inline:auto}body.sidebar-collapsed .nav-link{justify-content:center;gap:0;padding-inline:.6rem;font-size:0}body.sidebar-collapsed .nav-link i{width:auto;font-size:1.45rem}body.sidebar-collapsed .nav-badge{position:absolute;top:5px;right:4px;min-width:18px;height:18px;margin-left:0;padding:0 .25rem;font-size:.62rem}
        .main{min-width:0;padding:1.65rem 1.75rem}.hero{position:relative;display:grid;grid-template-columns:minmax(0,1fr) auto;gap:1.2rem;align-items:start;margin-bottom:1.35rem}.hero:after{content:"";position:absolute;left:42%;top:-1.2rem;width:min(530px,36vw);height:120px;opacity:.18;background:linear-gradient(180deg,transparent 52%,#2c7141 0);clip-path:polygon(0 72%,13% 58%,20% 61%,25% 33%,31% 61%,47% 41%,58% 64%,72% 43%,84% 60%,100% 68%,100% 100%,0 100%);pointer-events:none}.hero h1{position:relative;z-index:1;margin:0 0 .45rem;font-size:clamp(1.75rem,2.45vw,2.35rem);font-weight:950}.hero p{position:relative;z-index:1;margin:0;color:#34426f;font-size:1rem}.top-actions{position:relative;z-index:2;display:flex;align-items:center;gap:1rem}.availability{display:inline-flex;align-items:center;gap:.65rem;min-height:44px;padding:0 1rem;border:1px solid var(--line);border-radius:18px;background:#fff;font-weight:850}.availability:before{content:"";width:10px;height:10px;border-radius:50%;background:var(--green)}.bell{position:relative;display:grid;place-items:center;width:48px;height:48px;border:0;background:transparent;color:#172447;font-size:1.55rem}.bell span{position:absolute;top:0;right:0;display:grid;place-items:center;width:24px;height:24px;border-radius:50%;color:#fff;background:var(--green);font-size:.75rem;font-weight:950}.doctor-info{display:grid;grid-template-columns:58px minmax(0,1fr) auto;align-items:center;gap:.8rem}.doctor-info strong{display:block;font-size:.94rem}.doctor-info span{color:#34426f;font-size:.84rem}
        .panel{border:1px solid var(--line);border-radius:12px;background:#fff;box-shadow:var(--shadow)}.notifications-panel{padding:1.25rem}.section-head{display:flex;align-items:flex-start;justify-content:space-between;gap:1rem;margin-bottom:1.5rem}.section-title h2{margin:0 0 .35rem;font-size:1.7rem;font-weight:950}.section-title p{margin:0;color:#34426f}.tabs{display:flex;align-items:center;gap:.75rem;flex-wrap:wrap}.tab{min-height:44px;padding:0 1.25rem;border:1px solid #d7e0ee;border-radius:8px;color:#34426f;background:#fff;font-weight:850}.tab.active{color:var(--green-dark);background:#f3fbf5;box-shadow:inset 0 -3px 0 var(--green)}.mark-read{margin-left:auto;border:0;color:var(--green-dark);background:transparent;font-weight:950}
        .table-wrap{overflow:hidden;border:1px solid var(--line);border-radius:10px}.notification-table{width:100%;border-collapse:collapse}.notification-table th{padding:1.05rem 1.15rem;color:var(--green-dark);background:linear-gradient(90deg,#edf6ed,#f6fbf4);font-size:.9rem;font-weight:950;text-align:left}.notification-table td{padding:1.35rem 1.15rem;border-bottom:1px solid var(--line);vertical-align:middle}.notification-table tr:last-child td{border-bottom:0}.notification-cell{display:grid;grid-template-columns:14px 58px minmax(0,1fr);gap:1rem;align-items:center}.unread-dot,.read-dot{width:9px;height:9px;border-radius:50%;background:var(--green)}.read-dot{background:#7b879b}.notif-icon{display:grid;place-items:center;width:52px;height:52px;border-radius:50%;color:#fff;background:var(--green);font-size:1.45rem}.notif-icon.gold{background:var(--gold)}.notif-icon.blue{background:var(--blue)}.notif-icon.lime{background:#41ad31}.notif-icon.purple{color:var(--purple);background:#eee5ff}.notif-text strong{display:block;margin-bottom:.25rem;font-size:.98rem}.notif-text p{margin:0 0 .5rem;color:#071438}.notif-text span,.time-cell span{color:#4e5b86;font-size:.86rem}.type-pill{display:inline-flex;align-items:center;min-height:28px;padding:0 .65rem;border-radius:7px;font-size:.82rem;font-weight:950}.type-pill.green{color:var(--green-dark);background:#ddf3e5}.type-pill.orange{color:#d66b00;background:#fff0dc}.type-pill.blue{color:#0f6bc7;background:#e4f2ff}.type-pill.purple{color:#5f35c7;background:#eee5ff}.status-cell{display:flex;align-items:center;gap:.7rem;color:#1f2d49}.row-menu{border:0;color:#263755;background:transparent;font-size:1.35rem}.help-panel{display:flex;align-items:center;justify-content:space-between;gap:1rem;margin-top:1.25rem;padding:1.1rem 1.25rem;background:linear-gradient(90deg,#eef8ef,#f8fcf8)}.help-copy{display:grid;grid-template-columns:38px minmax(0,1fr);gap:.8rem;align-items:start}.help-copy i{display:grid;place-items:center;width:32px;height:32px;border:1px solid #81c997;border-radius:50%;color:var(--green-dark);font-size:1.2rem}.help-copy strong{display:block;color:var(--green-dark);margin-bottom:.25rem}.help-copy p{margin:0;color:#34426f}.support-btn{display:inline-flex;align-items:center;justify-content:center;gap:.65rem;min-height:44px;padding:0 1.2rem;border:1px solid #13a456;border-radius:7px;color:var(--green-dark);background:#fff;font-weight:950;white-space:nowrap}
        .menu-toggle,.sidebar-overlay{display:none}@media(max-width:1180px){.app-shell,body.sidebar-collapsed .app-shell{grid-template-columns:1fr}.sidebar-collapse{display:none}.menu-toggle{position:fixed;top:1rem;left:1rem;z-index:1100;display:grid;place-items:center;width:48px;height:48px;border:1px solid var(--line);border-radius:12px;color:var(--green-dark);background:#fff;box-shadow:0 10px 24px rgba(24,39,75,.12);font-size:1.55rem}.sidebar-overlay{position:fixed;inset:0;z-index:1050;display:block;background:rgba(7,20,56,.42);opacity:0;pointer-events:none;transition:opacity .2s ease}body.sidebar-open .sidebar-overlay{opacity:1;pointer-events:auto}.sidebar{position:fixed;inset:0 auto 0 0;z-index:1060;width:min(84vw,310px);height:100vh;transform:translateX(-100%);transition:transform .24s ease;box-shadow:12px 0 36px rgba(7,20,56,.18)}body.sidebar-open .sidebar{transform:translateX(0)}.main{padding-top:5rem}.hero{grid-template-columns:1fr}.hero:after{left:20%;width:70vw}.top-actions{justify-content:flex-start}.table-wrap{overflow-x:auto}.notification-table{min-width:940px}}@media(max-width:700px){.main{padding-inline:1rem}.top-actions{display:none}.section-head{display:block}.mark-read{margin-top:1rem}.help-panel{align-items:stretch;flex-direction:column}.support-btn{width:100%}.tabs{gap:.45rem}.tab{padding:0 .85rem}}
    </style>
</head>
<body>
    <button class="menu-toggle" type="button" aria-label="Open navigation" aria-controls="physicianSidebar" aria-expanded="false"><i class="bi bi-list"></i></button>
    <div class="app-shell">
        <aside class="sidebar" id="physicianSidebar">
            <a class="brand" href="dashboard.php"><img src="../auth/assets/img/CLSU_Logo.jpg" alt="CLSU logo"><span><strong>CLSU Infirmary</strong>Telemedicine System</span></a>
            <div class="physician-mini"><div class="avatar" aria-hidden="true"><i class="bi bi-person-fill"></i></div><div><h2>Dr. Juan Dela Cruz</h2><p>Physician</p><span class="online">Available</span></div></div>
            <button class="sidebar-collapse" type="button" aria-label="Collapse sidebar" aria-expanded="true"><i class="bi bi-layout-sidebar-inset"></i><span>Collapse</span></button>
            <nav aria-label="Physician navigation">
                <ul class="nav-list">
                    <li><a class="nav-link" href="dashboard.php"><i class="bi bi-house-door"></i> Dashboard</a></li>
                    <li><a class="nav-link" href="consultationinbox.php"><i class="bi bi-inbox"></i> Consultation Inbox <span class="nav-badge">8</span></a></li>
                    <li><a class="nav-link" href="activeconsultation.php"><i class="bi bi-clipboard2-pulse"></i> Active Consultations <span class="nav-badge">4</span></a></li>
                    <li><a class="nav-link" href="followup.php"><i class="bi bi-calendar2-check"></i> Follow-up Requests <span class="nav-badge">6</span></a></li>
                    <li><a class="nav-link" href="patientdirect.php"><i class="bi bi-people"></i> Patient Directory</a></li>
                    <li><a class="nav-link" href="consultationhistory.php"><i class="bi bi-card-list"></i> Consultation History</a></li>
                    <li><a class="nav-link active" href="notification.php"><i class="bi bi-bell"></i> Notifications <span class="nav-badge">3</span></a></li>
                </ul>
                <ul class="nav-secondary">
                    <li><a class="nav-link" href="profile.php"><i class="bi bi-person"></i> Profile</a></li>
                    <li><a class="nav-link" href="#"><i class="bi bi-gear"></i> Settings</a></li>
                </ul>
            </nav>
            <section class="campus-card">
                <div class="campus-art" aria-hidden="true"></div>
                <h3>Central Luzon State University</h3>
                <p>Nurturing a Culture of Excellence</p>
            </section>
            <a class="nav-link logout-link" href="../auth/index.php"><i class="bi bi-box-arrow-left"></i> Logout</a>
        </aside>

        <main class="main">
            <header class="hero">
                <div>
                    <h1>Good morning, Dr. Juan Dela Cruz! <span aria-hidden="true">&#128075;</span></h1>
                    <p>Here's what's happening with your consultations today.</p>
                </div>
                <div class="top-actions">
                    <button class="availability" type="button">Available <i class="bi bi-chevron-down"></i></button>
                    <button class="bell" type="button" aria-label="Notifications"><i class="bi bi-bell"></i><span>3</span></button>
                    <div class="doctor-info"><span class="doctor-avatar"><i class="bi bi-person-fill"></i></span><span><strong>Dr. Juan Dela Cruz</strong><span>Physician</span></span><i class="bi bi-chevron-down"></i></div>
                </div>
            </header>

            <section class="panel notifications-panel">
                <div class="section-head">
                    <div class="section-title">
                        <h2>Notifications</h2>
                        <p>Stay updated with the latest activities and important alerts.</p>
                    </div>
                </div>
                <div class="tabs">
                    <button class="tab active" type="button">All (3)</button>
                    <button class="tab" type="button">Unread (3)</button>
                    <button class="tab" type="button">Consultation (1)</button>
                    <button class="tab" type="button">Follow-up (1)</button>
                    <button class="tab" type="button">System (1)</button>
                    <button class="mark-read" type="button"><i class="bi bi-check2 me-2"></i>Mark all as read</button>
                </div>

                <div class="table-wrap mt-3">
                    <table class="notification-table" aria-label="Notifications">
                        <thead>
                            <tr>
                                <th>Notification</th>
                                <th>Type</th>
                                <th>Time</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="notification-cell"><span class="unread-dot"></span><span class="notif-icon"><i class="bi bi-person-plus"></i></span><div class="notif-text"><strong>New consultation assigned</strong><p>John Miguel Santos has been assigned to you.</p><span>Patient ID: <b>BSA-2B</b> &nbsp; &bull; &nbsp; General Consultation</span></div></div>
                                </td>
                                <td><span class="type-pill green">Consultation</span></td>
                                <td class="time-cell">5 min ago<br><span>May 16, 2025 &nbsp; &bull; &nbsp; 10:20 AM</span></td>
                                <td><span class="status-cell"><span class="unread-dot"></span>Unread</span></td>
                                <td><button class="row-menu" type="button" aria-label="More actions"><i class="bi bi-three-dots-vertical"></i></button></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="notification-cell"><span class="unread-dot"></span><span class="notif-icon gold"><i class="bi bi-people"></i></span><div class="notif-text"><strong>Follow-up request received</strong><p>Maria Dela Cruz requested a follow-up.</p><span>Patient ID: <b>BSIT-3A</b> &nbsp; &bull; &nbsp; Follow-up Request</span></div></div>
                                </td>
                                <td><span class="type-pill orange">Follow-up</span></td>
                                <td class="time-cell">15 min ago<br><span>May 16, 2025 &nbsp; &bull; &nbsp; 10:10 AM</span></td>
                                <td><span class="status-cell"><span class="unread-dot"></span>Unread</span></td>
                                <td><button class="row-menu" type="button" aria-label="More actions"><i class="bi bi-three-dots-vertical"></i></button></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="notification-cell"><span class="unread-dot"></span><span class="notif-icon blue"><i class="bi bi-chat-left-text"></i></span><div class="notif-text"><strong>Patient replied</strong><p>Kyla Marie Ramos replied to your message.</p><span>Patient ID: <b>BSN-1A</b> &nbsp; &bull; &nbsp; General Consultation</span></div></div>
                                </td>
                                <td><span class="type-pill blue">Consultation</span></td>
                                <td class="time-cell">28 min ago<br><span>May 16, 2025 &nbsp; &bull; &nbsp; 09:57 AM</span></td>
                                <td><span class="status-cell"><span class="unread-dot"></span>Unread</span></td>
                                <td><button class="row-menu" type="button" aria-label="More actions"><i class="bi bi-three-dots-vertical"></i></button></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="notification-cell"><span class="read-dot"></span><span class="notif-icon lime"><i class="bi bi-check-lg"></i></span><div class="notif-text"><strong>Consultation completed</strong><p>Mark Joseph Lim's consultation has been completed.</p><span>Patient ID: <b>BSCE-4A</b> &nbsp; &bull; &nbsp; General Consultation</span></div></div>
                                </td>
                                <td><span class="type-pill green">Consultation</span></td>
                                <td class="time-cell">45 min ago<br><span>May 16, 2025 &nbsp; &bull; &nbsp; 09:40 AM</span></td>
                                <td><span class="status-cell"><span class="read-dot"></span>Read</span></td>
                                <td><button class="row-menu" type="button" aria-label="More actions"><i class="bi bi-three-dots-vertical"></i></button></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="notification-cell"><span class="read-dot"></span><span class="notif-icon purple"><i class="bi bi-bell"></i></span><div class="notif-text"><strong>System update</strong><p>System maintenance will be on May 18, 2025 from 1:00 AM to 3:00 AM.</p><span>Telemedicine System &nbsp; &bull; &nbsp; Announcement</span></div></div>
                                </td>
                                <td><span class="type-pill purple">System</span></td>
                                <td class="time-cell">2 days ago<br><span>May 14, 2025 &nbsp; &bull; &nbsp; 02:30 PM</span></td>
                                <td><span class="status-cell"><span class="read-dot"></span>Read</span></td>
                                <td><button class="row-menu" type="button" aria-label="More actions"><i class="bi bi-three-dots-vertical"></i></button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <section class="panel help-panel">
                    <div class="help-copy">
                        <i class="bi bi-info"></i>
                        <div><strong>Need help?</strong><p>If you have any questions or encounter any issues,<br>please contact the system administrator.</p></div>
                    </div>
                    <a class="support-btn" href="#"><i class="bi bi-envelope"></i>Contact Support</a>
                </section>
            </section>
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
