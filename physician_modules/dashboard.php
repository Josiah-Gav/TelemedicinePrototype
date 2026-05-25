<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Physician Dashboard | CLSU Infirmary Telemedicine System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        :root{--ink:#12192d;--muted:#526078;--green:#087d32;--green-dark:#006824;--green-soft:#e9f5e9;--green-pale:#f4faf3;--gold:#e3aa00;--gold-soft:#fff4d8;--line:#e1e7ef;--page:#fbfcfa;--shadow:0 16px 42px rgba(21,40,64,.08)}
        *{box-sizing:border-box}body{min-height:100vh;margin:0;color:var(--ink);font-family:"Inter","Segoe UI",system-ui,-apple-system,BlinkMacSystemFont,sans-serif;background:radial-gradient(circle at 88% 92%,rgba(255,211,67,.36),transparent 16rem),linear-gradient(180deg,#fbfdfb 0%,#f7faf5 100%)}a{color:inherit;text-decoration:none}button{font:inherit}
        .app-shell{display:grid;grid-template-columns:300px minmax(0,1fr);min-height:100vh;transition:grid-template-columns .2s ease}.sidebar{position:sticky;top:0;height:100vh;padding:1.55rem 1.25rem;border-right:1px solid var(--line);background:#fff;box-shadow:8px 0 28px rgba(24,39,75,.04);overflow-y:auto;transition:padding .2s ease}.brand{display:flex;align-items:center;gap:.85rem;margin-bottom:2.35rem}.brand img{width:62px;height:62px;border-radius:50%;object-fit:cover}.brand strong{display:block;color:#111;font-size:1.42rem;font-weight:950;line-height:1.05;letter-spacing:0}.brand span{display:block;color:#111;font-size:1.05rem;font-weight:800}
        .avatar,.mini-avatar{display:grid;place-items:center;border-radius:50%;color:#fff;background:linear-gradient(135deg,#d29a82 0%,#4a4865 100%);overflow:hidden}.avatar{width:64px;height:64px;border:1px solid #d4dbe7;font-size:1.85rem}.mini-avatar{width:46px;height:46px;font-size:1.25rem}.physician-mini{display:grid;grid-template-columns:64px minmax(0,1fr);align-items:center;gap:.9rem;margin-bottom:1.6rem}.physician-mini h2{margin:0 0 .18rem;font-size:1rem;font-weight:950}.physician-mini p{margin:0 0 .25rem;color:var(--muted);font-size:.9rem}.online{display:inline-flex;align-items:center;gap:.38rem;color:#2d405f;font-size:.82rem}.online:before{content:"";width:10px;height:10px;border-radius:50%;background:var(--green)}
        .sidebar-collapse{display:flex;align-items:center;justify-content:center;gap:.55rem;width:100%;min-height:42px;margin:0 0 1rem;border:1px solid #d7e0ee;border-radius:9px;color:var(--green-dark);background:#fff;font-weight:950}.nav-list{display:grid;gap:.45rem;margin:0;padding:0 0 1.4rem;border-bottom:1px solid var(--line);list-style:none}.nav-secondary{display:grid;gap:.45rem;margin:1.25rem 0 1.6rem;padding:0;list-style:none}.nav-link{position:relative;display:flex;align-items:center;gap:1rem;min-height:56px;padding:.8rem .95rem;border-radius:10px;color:#1d293f;font-weight:850}.nav-link:before{content:"";position:absolute;left:-1.25rem;width:8px;height:44px;border-radius:0 8px 8px 0;background:transparent}.nav-link i{width:28px;color:#5d697d;font-size:1.35rem}.nav-link.active{color:var(--green-dark);background:linear-gradient(90deg,#e7f4e6,#f5faf3)}.nav-link.active:before{background:var(--green)}.nav-link.active i{color:var(--green)}.nav-badge{display:grid;place-items:center;min-width:24px;height:24px;margin-left:auto;padding:0 .4rem;border-radius:999px;color:#fff;background:var(--green);font-size:.76rem;font-weight:950}.logout-link{margin-top:1.2rem}
        body.sidebar-collapsed .app-shell{grid-template-columns:88px minmax(0,1fr)}body.sidebar-collapsed .sidebar{padding-inline:.75rem;overflow-x:hidden}body.sidebar-collapsed .brand{justify-content:center;gap:0;margin-bottom:1.5rem}body.sidebar-collapsed .brand span,body.sidebar-collapsed .physician-mini > div:last-child,body.sidebar-collapsed .sidebar-collapse span{display:none}body.sidebar-collapsed .brand img,body.sidebar-collapsed .avatar{width:48px;height:48px}body.sidebar-collapsed .physician-mini{grid-template-columns:1fr;justify-items:center;margin-bottom:1rem}body.sidebar-collapsed .sidebar-collapse{width:48px;margin-inline:auto}body.sidebar-collapsed .nav-link{justify-content:center;gap:0;padding-inline:.6rem;font-size:0}body.sidebar-collapsed .nav-link i{width:auto;font-size:1.45rem}body.sidebar-collapsed .nav-badge{position:absolute;top:5px;right:4px;min-width:18px;height:18px;margin-left:0;padding:0 .25rem;font-size:.62rem}body.sidebar-collapsed .logout-link{margin-top:2rem}
        .main{min-width:0;padding:1.85rem 1.9rem 0}.hero{position:relative;display:grid;grid-template-columns:minmax(0,1fr) auto;gap:1.25rem;align-items:start;margin-bottom:1.25rem;overflow:hidden}.hero:after{content:"";position:absolute;left:42%;top:-1.3rem;width:min(560px,38vw);height:132px;opacity:.22;background:linear-gradient(180deg,transparent 51%,rgba(44,113,65,.72) 0);clip-path:polygon(0 76%,12% 58%,18% 63%,23% 30%,30% 62%,43% 48%,55% 66%,67% 43%,78% 57%,90% 62%,100% 73%,100% 100%,0 100%);pointer-events:none}.hero h1{position:relative;z-index:1;margin:0 0 .45rem;font-size:clamp(1.75rem,2.35vw,2.25rem);font-weight:950;letter-spacing:0}.hero p{position:relative;z-index:1;margin:0;color:var(--muted);font-size:1.05rem}.top-actions{position:relative;z-index:2;display:flex;align-items:center;gap:1rem}.availability{display:inline-flex;align-items:center;gap:.65rem;min-height:44px;padding:0 1rem;border:1px solid var(--line);border-radius:18px;background:#fff;box-shadow:0 8px 20px rgba(30,57,48,.04);font-weight:850}.availability:before{content:"";width:11px;height:11px;border-radius:50%;background:var(--green)}.bell{position:relative;display:grid;place-items:center;width:46px;height:46px;border:0;background:transparent;color:#5d697d;font-size:1.55rem}.bell span{position:absolute;top:0;right:0;display:grid;place-items:center;min-width:22px;height:22px;padding:0 .35rem;border-radius:999px;color:#fff;background:var(--green);font-size:.74rem;font-weight:950}.doctor-avatar{display:grid;place-items:center;width:64px;height:64px;border-radius:50%;border:1px solid var(--line);background:linear-gradient(145deg,#ffd0b5,#243452);color:#fff;font-size:1.85rem;box-shadow:0 10px 24px rgba(30,57,48,.08)}.profile-caret{color:#3d4a62;font-size:1rem}
        .stats-grid{display:grid;grid-template-columns:repeat(4,minmax(190px,1fr));gap:1rem;margin-bottom:1.15rem}.cardx{border:1px solid var(--line);border-radius:12px;background:rgba(255,255,255,.92);box-shadow:0 12px 34px rgba(21,40,64,.055)}.stat-card{display:grid;grid-template-columns:78px minmax(0,1fr);gap:.95rem;align-items:center;min-height:144px;padding:1.25rem}.stat-icon{display:grid;place-items:center;width:66px;height:66px;border-radius:50%;color:var(--green);background:var(--green-soft);font-size:1.75rem}.stat-icon.gold{color:var(--gold);background:var(--gold-soft)}.stat-card h2{margin:0 0 .65rem;font-size:.98rem;font-weight:950}.stat-card strong{display:block;margin-bottom:.6rem;color:var(--green);font-size:2.15rem;line-height:1;font-weight:950}.stat-card strong.gold{color:var(--gold)}.stat-card p,.stat-card a{margin:0;color:#3f4c64;font-weight:800}.stat-card a{color:var(--green-dark)}
        .dashboard-grid{display:grid;grid-template-columns:minmax(0,1.55fr) minmax(360px,.95fr);gap:1rem}.panel-head{display:flex;align-items:center;justify-content:space-between;gap:1rem;padding:1.05rem 1.25rem;border-bottom:1px solid var(--line)}.panel-title{display:flex;align-items:center;gap:.8rem;margin:0;font-size:1.08rem;font-weight:950}.panel-title i{color:var(--green);font-size:1.25rem}.view-all{color:var(--green-dark);font-weight:950}.inbox-card{overflow:hidden}.consult-table{width:100%;border-collapse:collapse}.consult-table th{padding:.9rem 1.1rem;color:var(--green-dark);background:linear-gradient(90deg,#edf6ed,#f6fbf4);font-size:.82rem;font-weight:950;text-align:left}.consult-table td{padding:1rem 1.1rem;border-bottom:1px solid var(--line);vertical-align:middle}.person{display:flex;align-items:center;gap:.8rem}.patient-photo{display:grid;place-items:center;flex:0 0 auto;width:48px;height:48px;border-radius:50%;background:linear-gradient(145deg,#f1b08f,#26314f);color:#fff;font-size:1.25rem;overflow:hidden}.patient-photo.male{background:linear-gradient(145deg,#f5b996,#263854)}.person h3,.notif h3{margin:0 0 .18rem;font-size:.95rem;font-weight:950}.person p,.type-cell,.symptom-cell,.submitted{margin:0;color:#31405b;font-size:.9rem;line-height:1.45}.urgency{display:inline-grid;place-items:center;min-width:76px;padding:.42rem .58rem;border:1px solid;border-radius:7px;font-size:.78rem;font-weight:950;text-align:center;line-height:1.15}.urgency.red{color:#f00;background:#fff1f1;border-color:#ffb4ad}.urgency.orange{color:#d57900;background:#fff7ea;border-color:#ffd59a}.urgency.blue{color:#0b63ce;background:#edf5ff;border-color:#bad8ff}.review-btn{display:inline-flex;align-items:center;justify-content:center;min-height:36px;padding:0 .85rem;border:1px solid #13a456;border-radius:7px;color:var(--green-dark);background:#fff;font-weight:950}.more-btn{border:0;background:transparent;color:#27364f;font-size:1.25rem}.inbox-foot{display:flex;justify-content:center;padding:1rem;color:var(--green-dark);font-weight:950}.right-stack{display:grid;gap:1rem}.notification-list{padding:.7rem 1.25rem}.notif{display:grid;grid-template-columns:46px minmax(0,1fr) auto 9px;gap:.9rem;align-items:center;padding:.86rem 0}.notif-icon{display:grid;place-items:center;width:44px;height:44px;border-radius:50%;color:#fff;background:linear-gradient(145deg,#2eae62,#057a31);font-size:1.25rem}.notif-icon.gold{background:linear-gradient(145deg,#f5c63b,#dfa700)}.notif-icon.blue{background:linear-gradient(145deg,#25a9dc,#0d7bad)}.notif p{margin:0;color:#4b5871;font-size:.9rem}.notif time{color:#4b5871;font-size:.82rem;white-space:nowrap}.dot{width:8px;height:8px;border-radius:50%;background:var(--green)}
        .today-summary{padding:1.1rem 1.25rem}.summary-grid{display:grid;grid-template-columns:repeat(2,1fr);border-top:1px solid var(--line);border-left:1px solid var(--line)}.summary-item{display:grid;grid-template-columns:54px 1fr;gap:.8rem;align-items:center;padding:1rem;border-right:1px solid var(--line);border-bottom:1px solid var(--line)}.summary-icon{display:grid;place-items:center;width:48px;height:48px;border-radius:50%;color:var(--green);background:var(--green-soft);font-size:1.4rem}.summary-icon.gold{color:var(--gold);background:var(--gold-soft)}.summary-item h3{margin:0;color:#101a30;font-size:.86rem;font-weight:950}.summary-item strong{display:block;color:#071438;font-size:1.65rem;line-height:1;font-weight:950}.summary-item p{margin:.18rem 0 0;color:#526078;font-size:.82rem}.quick{margin-top:1rem;padding:1rem 1.25rem}.quick-grid{display:grid;grid-template-columns:repeat(4,1fr)}.quick-tile{display:grid;grid-template-columns:46px minmax(0,1fr);align-items:center;gap:.75rem;min-height:76px;padding:.7rem 1rem;border-right:1px solid var(--line);color:#071438}.quick-tile:last-child{border-right:0}.quick-tile i{color:var(--green);font-size:1.85rem}.quick-tile.gold i{color:var(--gold)}.quick-tile strong{display:block;margin-bottom:.12rem;font-size:.95rem;font-weight:950}.quick-tile span{display:block;color:#4b5871;font-size:.84rem}.footer{display:flex;align-items:center;justify-content:space-between;gap:1.35rem;margin:1rem -1.9rem 0;padding:1.1rem 1.9rem;color:var(--green-dark);background:linear-gradient(90deg,#eef8ef,#f8fcf4);font-size:.9rem}.footer-left{display:flex;gap:1.1rem;align-items:center}.footer em{font-family:"Brush Script MT","Segoe Script",cursive;font-size:1.25rem;color:var(--green-dark)}
        .menu-toggle,.sidebar-overlay{display:none}@media(max-width:1360px){.stats-grid{grid-template-columns:repeat(2,1fr)}.dashboard-grid{grid-template-columns:1fr}.quick-grid{grid-template-columns:repeat(2,1fr)}.quick-tile:nth-child(2){border-right:0}.quick-tile:nth-child(-n+2){border-bottom:1px solid var(--line)}}@media(max-width:980px){.app-shell,body.sidebar-collapsed .app-shell{grid-template-columns:1fr}.sidebar-collapse{display:none}.menu-toggle{position:fixed;top:1rem;left:1rem;z-index:1100;display:grid;place-items:center;width:48px;height:48px;border:1px solid var(--line);border-radius:12px;color:var(--green-dark);background:#fff;box-shadow:0 10px 24px rgba(24,39,75,.12);font-size:1.55rem}.sidebar-overlay{position:fixed;inset:0;z-index:1050;display:block;background:rgba(7,20,56,.42);opacity:0;pointer-events:none;transition:opacity .2s ease}body.sidebar-open .sidebar-overlay{opacity:1;pointer-events:auto}.sidebar{position:fixed;inset:0 auto 0 0;z-index:1060;width:min(84vw,310px);height:100vh;transform:translateX(-100%);transition:transform .24s ease;box-shadow:12px 0 36px rgba(7,20,56,.18)}body.sidebar-open .sidebar{transform:translateX(0)}.main{padding-top:5rem}.hero{grid-template-columns:1fr}.top-actions{justify-content:flex-start}.hero:after{left:18%;width:70vw}}@media(max-width:760px){.main{padding-inline:1rem}.stats-grid,.quick-grid{grid-template-columns:1fr}.stat-card{grid-template-columns:66px 1fr}.stat-icon{width:58px;height:58px}.consult-table{min-width:760px}.inbox-card{overflow-x:auto}.quick-tile,.quick-tile:nth-child(2){border-right:0;border-bottom:1px solid var(--line)}.quick-tile:last-child{border-bottom:0}.notif{grid-template-columns:44px minmax(0,1fr)}.notif time,.dot{display:none}.summary-grid{grid-template-columns:1fr}.footer{display:block;margin-inline:-1rem;padding-inline:1rem}.footer-left{display:flex;flex-wrap:wrap;margin-bottom:.45rem}.availability{min-height:42px}.doctor-avatar{width:56px;height:56px}}
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
                    <li><a class="nav-link active" href="dashboard.php"><i class="bi bi-house-door"></i> Dashboard</a></li>
                    <li><a class="nav-link" href="consultationinbox.php"><i class="bi bi-inbox"></i> Consultation Inbox <span class="nav-badge">8</span></a></li>
                    <li><a class="nav-link" href="activeconsultation.php"><i class="bi bi-clipboard2-pulse"></i> Active Consultations <span class="nav-badge">4</span></a></li>
                    <li><a class="nav-link" href="followup.php"><i class="bi bi-calendar2-check"></i> Follow-up Requests <span class="nav-badge">6</span></a></li>
                    <li><a class="nav-link" href="patientdirect.php"><i class="bi bi-people"></i> Patient Directory</a></li>
                    <li><a class="nav-link" href="consultationhistory.php"><i class="bi bi-card-list"></i> Consultation History</a></li>
                    <li><a class="nav-link" href="notification.php"><i class="bi bi-bell"></i> Notifications <span class="nav-badge">3</span></a></li>
                </ul>
                <ul class="nav-secondary">
                    <li><a class="nav-link" href="profile.php"><i class="bi bi-person"></i> Profile</a></li>
                    <li><a class="nav-link" href="#"><i class="bi bi-gear"></i> Settings</a></li>
                </ul>
            </nav>
            <a class="nav-link logout-link" href="../auth/index.php"><i class="bi bi-box-arrow-right"></i> Logout</a>
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
                    <span class="doctor-avatar" aria-label="Dr. Juan Dela Cruz"><i class="bi bi-person-fill"></i></span>
                    <i class="bi bi-chevron-down profile-caret" aria-hidden="true"></i>
                </div>
            </header>

            <section class="stats-grid" aria-label="Dashboard summary">
                <article class="cardx stat-card"><span class="stat-icon"><i class="bi bi-calendar2-week"></i></span><div><h2>Total Consultations Today</h2><strong>14</strong><p>6 pending &nbsp;&bull;&nbsp; 8 completed</p></div></article>
                <article class="cardx stat-card"><span class="stat-icon"><i class="bi bi-chat-dots-fill"></i></span><div><h2>Active Consultations</h2><strong>2</strong><p>In progress now</p></div></article>
                <article class="cardx stat-card"><span class="stat-icon gold"><i class="bi bi-people"></i></span><div><h2>Follow-up Requests</h2><strong class="gold">3</strong><p>Awaiting your response</p></div></article>
                <article class="cardx stat-card"><span class="stat-icon"><i class="bi bi-check-lg"></i></span><div><h2>Completed Today</h2><strong>7</strong><a href="consultationhistory.php">View summary <i class="bi bi-arrow-right ms-2"></i></a></div></article>
            </section>

            <div class="dashboard-grid">
                <section class="cardx inbox-card">
                    <header class="panel-head"><h2 class="panel-title">Consultation Inbox</h2><a class="view-all" href="consultationinbox.php">View All</a></header>
                    <table class="consult-table" aria-label="Consultation inbox">
                        <thead>
                            <tr>
                                <th>Patient</th>
                                <th>Type</th>
                                <th>Symptoms</th>
                                <th>Urgency</th>
                                <th>Assigned</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><div class="person"><span class="patient-photo"><i class="bi bi-person-fill"></i></span><div><h3>Maria Dela Cruz</h3><p>BSIT - 3A</p></div></div></td>
                                <td class="type-cell">General<br>Consultation</td>
                                <td class="symptom-cell">Headache, sore<br>throat, cough</td>
                                <td><span class="urgency red">Level 1<br>Emergency</span></td>
                                <td class="submitted">10:20 AM<br>May 16, 2025</td>
                                <td><a class="review-btn" href="consultationinbox.php">Review</a> <button class="more-btn" type="button" aria-label="More actions"><i class="bi bi-three-dots-vertical"></i></button></td>
                            </tr>
                            <tr>
                                <td><div class="person"><span class="patient-photo male"><i class="bi bi-person-fill"></i></span><div><h3>John Miguel Santos</h3><p>BSA - 2B</p></div></div></td>
                                <td class="type-cell">General<br>Consultation</td>
                                <td class="symptom-cell">Fever, body pain,<br>fatigue</td>
                                <td><span class="urgency orange">Level 2<br>Urgent</span></td>
                                <td class="submitted">10:15 AM<br>May 16, 2025</td>
                                <td><a class="review-btn" href="consultationinbox.php">Review</a> <button class="more-btn" type="button" aria-label="More actions"><i class="bi bi-three-dots-vertical"></i></button></td>
                            </tr>
                            <tr>
                                <td><div class="person"><span class="patient-photo"><i class="bi bi-person-fill"></i></span><div><h3>Kyla Marie Ramos</h3><p>BSN - 1A</p></div></div></td>
                                <td class="type-cell">General<br>Consultation</td>
                                <td class="symptom-cell">Dizziness, mild fever,<br>body weakness</td>
                                <td><span class="urgency orange">Level 3<br>Moderate</span></td>
                                <td class="submitted">10:05 AM<br>May 16, 2025</td>
                                <td><a class="review-btn" href="consultationinbox.php">Review</a> <button class="more-btn" type="button" aria-label="More actions"><i class="bi bi-three-dots-vertical"></i></button></td>
                            </tr>
                            <tr>
                                <td><div class="person"><span class="patient-photo male"><i class="bi bi-person-fill"></i></span><div><h3>Mark Joseph Lim</h3><p>BSCE - 4A</p></div></div></td>
                                <td class="type-cell">General<br>Consultation</td>
                                <td class="symptom-cell">Stomach pain,<br>nausea</td>
                                <td><span class="urgency blue">Level 4<br>Non-urgent</span></td>
                                <td class="submitted">09:58 AM<br>May 16, 2025</td>
                                <td><a class="review-btn" href="consultationinbox.php">Review</a> <button class="more-btn" type="button" aria-label="More actions"><i class="bi bi-three-dots-vertical"></i></button></td>
                            </tr>
                            <tr>
                                <td><div class="person"><span class="patient-photo"><i class="bi bi-person-fill"></i></span><div><h3>Ella Mae Garcia</h3><p>BSA - 3A</p></div></div></td>
                                <td class="type-cell">General<br>Consultation</td>
                                <td class="symptom-cell">Allergy, skin<br>irritation</td>
                                <td><span class="urgency blue">Level 4<br>Non-urgent</span></td>
                                <td class="submitted">09:45 AM<br>May 16, 2025</td>
                                <td><a class="review-btn" href="consultationinbox.php">Review</a> <button class="more-btn" type="button" aria-label="More actions"><i class="bi bi-three-dots-vertical"></i></button></td>
                            </tr>
                        </tbody>
                    </table>
                    <a class="inbox-foot" href="consultationinbox.php">View all requests <i class="bi bi-arrow-right ms-2"></i></a>
                </section>

                <div class="right-stack">
                    <section class="cardx notifications">
                        <header class="panel-head"><h2 class="panel-title"><i class="bi bi-bell"></i> Recent Notifications</h2><a class="view-all" href="notification.php">View All</a></header>
                        <div class="notification-list">
                            <article class="notif"><span class="notif-icon"><i class="bi bi-file-earmark-medical"></i></span><div><h3>New consultation assigned</h3><p>John Reyes has been assigned to you.</p></div><time>5 min ago</time><span class="dot"></span></article>
                            <article class="notif"><span class="notif-icon gold"><i class="bi bi-people"></i></span><div><h3>Follow-up request received</h3><p>Ana Cruz requested a follow-up.</p></div><time>15 min ago</time><span class="dot"></span></article>
                            <article class="notif"><span class="notif-icon blue"><i class="bi bi-chat-left-dots-fill"></i></span><div><h3>Patient replied</h3><p>Maria Santos replied to your message.</p></div><time>28 min ago</time><span class="dot"></span></article>
                            <article class="notif"><span class="notif-icon"><i class="bi bi-check-lg"></i></span><div><h3>Consultation completed</h3><p>Luis Mendoza consultation is completed.</p></div><time>45 min ago</time><span class="dot"></span></article>
                        </div>
                    </section>

                    <section class="cardx summary-card">
                        <header class="panel-head"><h2 class="panel-title">Consultation Summary (Today)</h2></header>
                        <div class="today-summary">
                            <div class="summary-grid">
                                <article class="summary-item"><span class="summary-icon gold"><i class="bi bi-clock"></i></span><div><h3>Pending</h3><strong>6</strong><p>Awaiting your review</p></div></article>
                                <article class="summary-item"><span class="summary-icon"><i class="bi bi-chat-dots-fill"></i></span><div><h3>In Progress</h3><strong>2</strong><p>Currently ongoing</p></div></article>
                                <article class="summary-item"><span class="summary-icon"><i class="bi bi-check-lg"></i></span><div><h3>Completed</h3><strong>7</strong><p>Completed today</p></div></article>
                                <article class="summary-item"><span class="summary-icon"><i class="bi bi-graph-up-arrow"></i></span><div><h3>Total</h3><strong>14</strong><p>All consultations</p></div></article>
                            </div>
                        </div>
                    </section>
                </div>
            </div>

            <section class="cardx quick">
                <header class="panel-head" style="padding:0 0 .6rem;border-bottom:0"><h2 class="panel-title">Quick Access</h2></header>
                <div class="quick-grid">
                    <a class="quick-tile" href="consultationinbox.php"><i class="bi bi-envelope"></i><span><strong>Consultation Inbox</strong>View new requests</span></a>
                    <a class="quick-tile" href="activeconsultation.php"><i class="bi bi-chat-dots-fill"></i><span><strong>Active Consultations</strong>Continue ongoing</span></a>
                    <a class="quick-tile gold" href="followup.php"><i class="bi bi-people"></i><span><strong>Follow-up Requests</strong>Review follow-ups</span></a>
                    <a class="quick-tile" href="consultationhistory.php"><i class="bi bi-calendar-check"></i><span><strong>Completed Consultations</strong>View patient history</span></a>
                </div>
            </section>

            <footer class="footer"><span class="footer-left"><span>CLSU Infirmary Telemedicine System</span><span>|</span><span>Central Luzon State University</span></span><em>Nurturing a Culture of Excellence</em></footer>
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
