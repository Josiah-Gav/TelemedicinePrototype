<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Active Consultation | CLSU Infirmary Telemedicine System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        :root{--ink:#12192d;--muted:#526078;--green:#087d32;--green-dark:#006824;--green-soft:#e9f5e9;--gold:#b97800;--gold-soft:#fff6df;--blue:#1266d6;--blue-soft:#eaf3ff;--red:#f52222;--red-soft:#fff0ef;--line:#e1e7ef;--panel:#fff;--shadow:0 16px 42px rgba(21,40,64,.08)}
        *{box-sizing:border-box}body{min-height:100vh;margin:0;color:var(--ink);font-family:"Inter","Segoe UI",system-ui,-apple-system,BlinkMacSystemFont,sans-serif;background:radial-gradient(circle at 88% 92%,rgba(255,211,67,.28),transparent 16rem),linear-gradient(180deg,#fbfdfb 0%,#f7faf5 100%)}a{color:inherit;text-decoration:none}button,input,textarea{font:inherit}
        .app-shell{display:grid;grid-template-columns:300px minmax(0,1fr);min-height:100vh;transition:grid-template-columns .2s ease}.sidebar{position:sticky;top:0;height:100vh;padding:1.55rem 1.25rem;border-right:1px solid var(--line);background:#fff;box-shadow:8px 0 28px rgba(24,39,75,.04);overflow-y:auto;transition:padding .2s ease}.brand{display:flex;align-items:center;gap:.85rem;margin-bottom:2.35rem}.brand img{width:62px;height:62px;border-radius:50%;object-fit:cover}.brand strong{display:block;color:#111;font-size:1.42rem;font-weight:950;line-height:1.05}.brand span{display:block;color:#111;font-size:1.05rem;font-weight:800}
        .avatar,.mini-avatar{display:grid;place-items:center;border-radius:50%;color:#fff;background:linear-gradient(135deg,#d29a82 0%,#4a4865 100%);overflow:hidden}.avatar{width:64px;height:64px;border:1px solid #d4dbe7;font-size:1.85rem}.mini-avatar{width:44px;height:44px;font-size:1.15rem}.physician-mini{display:grid;grid-template-columns:64px minmax(0,1fr);align-items:center;gap:.9rem;margin-bottom:1.6rem}.physician-mini h2{margin:0 0 .18rem;font-size:1rem;font-weight:950}.physician-mini p{margin:0 0 .25rem;color:var(--muted);font-size:.9rem}.online{display:inline-flex;align-items:center;gap:.38rem;color:#2d405f;font-size:.82rem}.online:before{content:"";width:10px;height:10px;border-radius:50%;background:var(--green)}
        .sidebar-collapse{display:flex;align-items:center;justify-content:center;gap:.55rem;width:100%;min-height:42px;margin:0 0 1rem;border:1px solid #d7e0ee;border-radius:9px;color:var(--green-dark);background:#fff;font-weight:950}.nav-list{display:grid;gap:.45rem;margin:0;padding:0 0 1.4rem;border-bottom:1px solid var(--line);list-style:none}.nav-secondary{display:grid;gap:.45rem;margin:1.25rem 0 1.6rem;padding:0;list-style:none}.nav-link{position:relative;display:flex;align-items:center;gap:1rem;min-height:56px;padding:.8rem .95rem;border-radius:10px;color:#1d293f;font-weight:850}.nav-link:before{content:"";position:absolute;left:-1.25rem;width:8px;height:44px;border-radius:0 8px 8px 0;background:transparent}.nav-link i{width:28px;color:#5d697d;font-size:1.35rem}.nav-link.active{color:var(--green-dark);background:linear-gradient(90deg,#e7f4e6,#f5faf3)}.nav-link.active:before{background:var(--green)}.nav-link.active i{color:var(--green)}.nav-badge{display:grid;place-items:center;min-width:24px;height:24px;margin-left:auto;padding:0 .4rem;border-radius:999px;color:#fff;background:var(--green);font-size:.76rem;font-weight:950}.logout-link{margin-top:1.2rem}
        body.sidebar-collapsed .app-shell{grid-template-columns:88px minmax(0,1fr)}body.sidebar-collapsed .sidebar{padding-inline:.75rem;overflow-x:hidden}body.sidebar-collapsed .brand{justify-content:center;gap:0;margin-bottom:1.5rem}body.sidebar-collapsed .brand span,body.sidebar-collapsed .physician-mini > div:last-child,body.sidebar-collapsed .sidebar-collapse span{display:none}body.sidebar-collapsed .brand img,body.sidebar-collapsed .avatar{width:48px;height:48px}body.sidebar-collapsed .physician-mini{grid-template-columns:1fr;justify-items:center;margin-bottom:1rem}body.sidebar-collapsed .sidebar-collapse{width:48px;margin-inline:auto}body.sidebar-collapsed .nav-link{justify-content:center;gap:0;padding-inline:.6rem;font-size:0}body.sidebar-collapsed .nav-link i{width:auto;font-size:1.45rem}body.sidebar-collapsed .nav-badge{position:absolute;top:5px;right:4px;min-width:18px;height:18px;margin-left:0;padding:0 .25rem;font-size:.62rem}body.sidebar-collapsed .logout-link{margin-top:2rem}
        .main{min-width:0;padding:1.45rem 1.55rem 1.2rem}.topbar{position:relative;display:grid;grid-template-columns:minmax(0,1fr) auto;gap:1rem;align-items:start;margin-bottom:1rem;overflow:hidden}.topbar:after{content:"";position:absolute;left:43%;top:-1.35rem;width:min(520px,34vw);height:118px;opacity:.2;background:linear-gradient(180deg,transparent 52%,#2c7141 0);clip-path:polygon(0 72%,13% 58%,20% 61%,25% 33%,31% 61%,47% 41%,58% 64%,72% 43%,84% 60%,100% 68%,100% 100%,0 100%);pointer-events:none}.back-link{position:relative;z-index:1;display:inline-flex;align-items:center;gap:.5rem;margin-bottom:.65rem;color:#111735;font-weight:950}.page-title{position:relative;z-index:1}.page-title h1{display:flex;align-items:center;gap:.8rem;margin:0 0 .55rem;font-size:clamp(1.75rem,2.4vw,2.3rem);font-weight:950}.meta{color:#34426f;font-weight:800}.pill{display:inline-flex;align-items:center;gap:.45rem;padding:.45rem .8rem;border-radius:8px;color:var(--green-dark);background:var(--green-soft);font-size:.88rem;font-weight:950}.pill:before{content:"";width:10px;height:10px;border-radius:2px;background:var(--green)}.top-actions{position:relative;z-index:2;display:flex;align-items:center;gap:.85rem}.bell{position:relative;display:grid;place-items:center;width:46px;height:46px;border:0;background:transparent;color:#172447;font-size:1.6rem}.bell span{position:absolute;top:0;right:0;display:grid;place-items:center;min-width:23px;height:23px;padding:0 .35rem;border-radius:999px;color:#fff;background:var(--green);font-size:.74rem;font-weight:950}.datebox{color:#34426f;font-weight:800}.datebox strong{display:block;color:#111735}.doctor-avatar{display:grid;place-items:center;width:62px;height:62px;border-radius:50%;border:1px solid var(--line);background:linear-gradient(145deg,#ffd0b5,#243452);color:#fff;font-size:1.7rem}.outline-btn,.danger-btn,.green-btn{display:inline-flex;align-items:center;justify-content:center;gap:.55rem;min-height:42px;padding:0 1rem;border-radius:8px;font-weight:950}.outline-btn{border:1px solid #bfcade;background:#fff;color:#172447}.danger-btn{border:1px solid #ffb9b9;background:#fff;color:#e60012}.green-btn{border:0;background:linear-gradient(90deg,#09853a,#006b2b);color:#fff;box-shadow:0 10px 22px rgba(0,104,36,.18)}
        .workspace{display:grid;grid-template-columns:260px minmax(0,1fr) 430px;gap:.75rem}.panel{border:1px solid var(--line);border-radius:10px;background:rgba(255,255,255,.94);box-shadow:var(--shadow);overflow:hidden}.panel-head{display:flex;align-items:center;justify-content:space-between;gap:.8rem;min-height:54px;padding:0 1rem;border-bottom:1px solid var(--line);font-weight:950}.panel-head i{color:var(--green);font-size:1.2rem}.icon-btn{display:grid;place-items:center;width:36px;height:36px;border:1px solid #d7e0ee;border-radius:8px;background:#fff;color:#34426f}
        .chat-list{display:grid}.chat-item{position:relative;display:grid;grid-template-columns:54px minmax(0,1fr) auto;gap:.75rem;align-items:center;padding:1rem;border-bottom:1px solid #edf1f7}.chat-item.active{background:linear-gradient(90deg,#eef8ef,#f7fbf6)}.chat-item strong{display:block}.chat-item p{overflow:hidden;margin:.2rem 0;color:#34426f;font-size:.82rem;text-overflow:ellipsis;white-space:nowrap}.chat-time{color:#526078;font-size:.8rem}.unread{display:grid;place-items:center;width:24px;height:24px;border-radius:50%;color:#fff;background:var(--green);font-size:.78rem;font-weight:950}.status-dot{display:inline-block;width:7px;height:7px;margin-left:.45rem;border-radius:50%;background:var(--green)}.status-dot.orange{background:#f5a400}.all-chats{margin:1rem;padding:.9rem;border:1px solid var(--line);border-radius:8px;text-align:center;color:var(--green-dark);font-weight:950}
        .patient-summary{display:grid;grid-template-columns:74px minmax(0,1fr) 135px 110px;gap:1rem;align-items:center;padding:1rem;border-bottom:1px solid var(--line)}.patient-photo{display:grid;place-items:center;width:70px;height:70px;border-radius:50%;background:linear-gradient(145deg,#f5b996,#263854);color:#fff;font-size:1.8rem}.patient-summary h2{margin:0 0 .35rem;font-size:1.05rem;font-weight:950}.patient-summary p,.summary-label{margin:0;color:#34426f}.summary-label{display:block;font-size:.8rem;font-weight:850}.privacy{display:flex;align-items:center;justify-content:space-between;gap:1rem;margin:1rem;padding:.8rem;border-radius:8px;color:#0f562a;background:#eef8ef;font-size:.88rem}.tabs{display:flex;align-items:center;gap:.6rem;padding:0 1rem;border-bottom:1px solid var(--line)}.tab{min-height:50px;padding:0 1rem;border:0;border-bottom:3px solid transparent;background:transparent;color:#34426f;font-weight:950}.tab.active{color:var(--green-dark);border-color:var(--green)}
        .messages{display:grid;gap:1rem;min-height:360px;padding:1rem}.msg{display:grid;grid-template-columns:34px minmax(0,1fr);gap:.7rem;max-width:70%}.msg.sent{grid-template-columns:minmax(0,1fr);justify-self:end}.bubble{padding:.75rem .9rem;border-radius:9px;background:#f1f3f6;line-height:1.5}.sent .bubble{background:#eef8ef}.msg time{display:block;margin-top:.35rem;color:#34426f;font-size:.78rem}.sent time{text-align:right}.composer{display:grid;grid-template-columns:minmax(0,1fr) 48px;gap:.6rem;padding:0 1rem 1rem}.input-wrap{display:flex;align-items:center;gap:.6rem;height:44px;padding:0 .85rem;border:1px solid #d7e0ee;border-radius:8px;background:#fff}.input-wrap input{flex:1;border:0;outline:0}.send-btn{display:grid;place-items:center;width:48px;height:44px;border:0;border-radius:9px;color:#fff;background:var(--green);font-size:1.25rem}.secure-note{padding:0 1rem 1rem;color:#526078;font-size:.8rem}
        .right-stack{display:grid;gap:.75rem}.summary-body{display:grid;gap:0;padding:1rem}.summary-row{display:grid;grid-template-columns:minmax(125px,.9fr) minmax(0,1fr);gap:1rem;align-items:center;padding:.85rem 0;border-bottom:1px solid #edf1f7}.summary-row:first-child{padding-top:0}.summary-row span{font-weight:950}.summary-row strong{justify-self:end;text-align:right}.triage-badge{display:inline-grid;place-items:center;min-width:180px;padding:.45rem .7rem;border:1px solid #ffbd86;border-radius:8px;color:#f06f00;background:#fff4e8;font-size:.86rem;font-weight:950}.confirmed{color:var(--green-dark)}.assessment-btn{display:flex;align-items:center;justify-content:center;min-height:46px;margin-top:1rem;border:1px solid #16a34a;border-radius:8px;color:var(--green-dark);background:#fff;font-size:1.05rem;font-weight:950}
        .notes-body{display:grid;gap:.85rem;padding:1rem}.field-label{display:block;margin-bottom:.35rem;font-size:.86rem;font-weight:950}.notes-body textarea{width:100%;min-height:86px;padding:.75rem;border:1px solid #d7e0ee;border-radius:8px;resize:vertical;color:#172447}.notes-body .advice{min-height:118px}.add-prescription{width:max-content;min-height:36px;padding:0 .8rem;border:1px solid #bde2c8;border-radius:8px;background:#fff;color:var(--green-dark);font-weight:950}
        .bottom-bar{display:grid;grid-template-columns:minmax(0,1fr) auto;gap:1rem;align-items:center;margin-top:1rem;padding:1rem 1.2rem;border:1px solid #f0dda9;border-radius:10px;background:#fff8e8;color:#6c4b09}.bottom-bar i{font-size:1.45rem;color:#9a6c00}.footer{display:flex;align-items:center;gap:1.35rem;margin-top:1.55rem;color:var(--green-dark);font-size:.9rem}.footer em{margin-left:auto;font-family:"Brush Script MT","Segoe Script",cursive;font-size:1.2rem}.menu-toggle,.sidebar-overlay{display:none}
        @media(max-width:1500px){.workspace{grid-template-columns:250px minmax(0,1fr)}.right-stack{grid-column:1/-1;grid-template-columns:1fr 1fr}}@media(max-width:1120px){.app-shell,body.sidebar-collapsed .app-shell{grid-template-columns:1fr}.sidebar-collapse{display:none}.menu-toggle{position:fixed;top:1rem;left:1rem;z-index:1100;display:grid;place-items:center;width:48px;height:48px;border:1px solid var(--line);border-radius:12px;color:var(--green-dark);background:#fff;box-shadow:0 10px 24px rgba(24,39,75,.12);font-size:1.55rem}.sidebar-overlay{position:fixed;inset:0;z-index:1050;display:block;background:rgba(7,20,56,.42);opacity:0;pointer-events:none;transition:opacity .2s ease}body.sidebar-open .sidebar-overlay{opacity:1;pointer-events:auto}.sidebar{position:fixed;inset:0 auto 0 0;z-index:1060;width:min(84vw,310px);height:100vh;transform:translateX(-100%);transition:transform .24s ease;box-shadow:12px 0 36px rgba(7,20,56,.18)}body.sidebar-open .sidebar{transform:translateX(0)}.main{padding-top:5rem}.topbar{grid-template-columns:1fr}.topbar:after{left:20%;width:70vw}.top-actions{flex-wrap:wrap}.workspace,.right-stack{grid-template-columns:1fr}.patient-summary{grid-template-columns:70px minmax(0,1fr)}}@media(max-width:680px){.main{padding-inline:1rem}.datebox,.doctor-avatar{display:none}.msg{max-width:92%}.bottom-bar{grid-template-columns:1fr}.footer{display:block}.footer em{display:block;margin-top:.5rem}.patient-summary{grid-template-columns:1fr}.privacy{display:block}.outline-btn,.danger-btn,.green-btn{width:100%}}
    </style>
</head>
<body>
    <button class="menu-toggle" type="button" aria-label="Open navigation" aria-controls="physicianSidebar" aria-expanded="false"><i class="bi bi-list"></i></button>
    <div class="app-shell">
        <aside class="sidebar" id="physicianSidebar">
            <a class="brand" href="dashboard.php"><img src="../auth/assets/img/CLSU_Logo.jpg" alt="CLSU logo"><span><strong>CLSU Infirmary</strong>Telemedicine System</span></a>
            <div class="physician-mini"><div class="avatar" aria-hidden="true"><i class="bi bi-person-fill"></i></div><div><h2>Dr. Juan Dela Cruz</h2><p>Physician</p><span class="online">Online</span></div></div>
            <button class="sidebar-collapse" type="button" aria-label="Collapse sidebar" aria-expanded="true"><i class="bi bi-layout-sidebar-inset"></i><span>Collapse</span></button>
            <nav aria-label="Physician navigation">
                <ul class="nav-list">
                    <li><a class="nav-link" href="dashboard.php"><i class="bi bi-house-door"></i> Dashboard</a></li>
                    <li><a class="nav-link" href="consultationinbox.php"><i class="bi bi-inbox"></i> Consultation Inbox <span class="nav-badge">8</span></a></li>
                    <li><a class="nav-link active" href="activeconsultation.php"><i class="bi bi-clipboard2-pulse"></i> Active Consultations <span class="nav-badge">4</span></a></li>
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
            <a class="nav-link logout-link" href="../auth/index.php"><i class="bi bi-box-arrow-right"></i> Log out</a>
        </aside>

        <main class="main">
            <header class="topbar">
                <div class="page-title">
                    <a class="back-link" href="consultationinbox.php"><i class="bi bi-arrow-left"></i> Back to Inbox</a>
                    <h1>Active Consultation <span class="pill">In Progress</span></h1>
                    <div class="meta">Consultation ID: CON-2025-0516-002 &nbsp;&bull;&nbsp; Started: 10:15 AM &nbsp;&bull;&nbsp; Duration: 18:32</div>
                </div>
                <div class="top-actions">
                    <button class="bell" type="button" aria-label="Notifications"><i class="bi bi-bell"></i><span>4</span></button>
                    <div class="datebox"><strong>May 16, 2025</strong>Friday, 10:36 AM</div>
                    <span class="doctor-avatar" aria-label="Dr. Juan Dela Cruz"><i class="bi bi-person-fill"></i></span>
                    <button class="outline-btn" type="button"><i class="bi bi-three-dots-vertical"></i> More Actions</button>
                    <button class="danger-btn" type="button"><i class="bi bi-telephone-fill"></i> End Consultation</button>
                </div>
            </header>

            <div class="workspace">
                <aside class="panel">
                    <header class="panel-head"><span>Active Chats (3)</span><button class="icon-btn" type="button" aria-label="Search chats"><i class="bi bi-search"></i></button></header>
                    <div class="chat-list">
                        <article class="chat-item active"><span class="mini-avatar"><i class="bi bi-person-fill"></i></span><div><strong>John Miguel Santos</strong><p>Fever and body pain...</p><span class="chat-time">10:17 AM <span class="status-dot"></span></span></div><span class="unread">2</span></article>
                        <article class="chat-item"><span class="mini-avatar"><i class="bi bi-person-fill"></i></span><div><strong>Maria Dela Cruz</strong><p>Headache, cough, and colds</p><span class="chat-time">10:20 AM <span class="status-dot"></span></span></div><span class="unread">1</span></article>
                    </div>
                    <a class="all-chats" href="consultationinbox.php"><i class="bi bi-chat-square-text me-2"></i>View all chats</a>
                </aside>

                <section class="panel">
                    <header class="panel-head"><span><i class="bi bi-person me-2"></i>Patient Information</span><button class="icon-btn" type="button" aria-label="More patient actions"><i class="bi bi-three-dots"></i></button></header>
                    <div class="patient-summary">
                        <span class="patient-photo"><i class="bi bi-person-fill"></i></span>
                        <div><h2>John Miguel Santos</h2><p>24 yrs &nbsp;&bull;&nbsp; Male</p></div>
                        <div><span class="summary-label">Patient ID</span><strong>P-2025-0516-002</strong></div>
                        <div><span class="summary-label">Contact Number</span><strong>0917 123 4567</strong></div>
                    </div>
                    <div class="privacy"><span><i class="bi bi-lock me-2"></i>Please observe privacy and professionalism during the consultation.</span><a href="#">View Guidelines</a></div>
                    <div class="tabs"><button class="tab active" type="button"><i class="bi bi-chat-dots me-2"></i>Chat</button><button class="tab" type="button">Consultation Notes</button></div>
                    <div class="messages">
                        <div class="msg"><span class="mini-avatar"><i class="bi bi-person-fill"></i></span><div><div class="bubble">Good morning, Doc. Are you Dr. Juan?</div><time>10:16 AM</time></div></div>
                        <div class="msg sent"><div><div class="bubble">Good morning, Mr. Santos. Yes, I am Dr. Juan. How are you feeling now?</div><time>10:17 AM <i class="bi bi-check2-all text-success"></i></time></div></div>
                        <div class="msg"><span class="mini-avatar"><i class="bi bi-person-fill"></i></span><div><div class="bubble">My head and body hurt, and I have a fever.</div><time>10:18 AM</time></div></div>
                        <div class="msg sent"><div><div class="bubble">When did the fever and body pain start?</div><time>10:19 AM <i class="bi bi-check2-all text-success"></i></time></div></div>
                        <div class="msg"><span class="mini-avatar"><i class="bi bi-person-fill"></i></span><div><div class="bubble">Yesterday afternoon. My temperature reached 38.5 C.</div><time>10:20 AM</time></div></div>
                    </div>
                    <div class="composer"><label class="input-wrap"><input type="text" placeholder="Type your message..."></label><button class="send-btn" type="button" aria-label="Send message"><i class="bi bi-send-fill"></i></button></div>
                    <div class="secure-note"><i class="bi bi-lock-fill me-2"></i>Messages are secure and confidential.</div>
                </section>

                <aside class="right-stack">
                    <section class="panel">
                        <header class="panel-head"><span><i class="bi bi-clipboard2-pulse me-2"></i>Consultation Summary</span><button class="icon-btn" type="button" aria-label="Collapse consultation summary"><i class="bi bi-chevron-up"></i></button></header>
                        <div class="summary-body">
                            <div class="summary-row"><span>System Triage Level</span><strong class="triage-badge">Level 2 - Urgent</strong></div>
                            <div class="summary-row"><span>Nurse Validation</span><strong class="confirmed">Confirmed</strong></div>
                            <div class="summary-row"><span>Reviewed By</span><strong>Nurse Ana Reyes</strong></div>
                            <div class="summary-row"><span>Reviewed At</span><strong>May 16, 2025 10:28 AM</strong></div>
                            <div class="summary-row"><span>Chief Concern</span><strong>Fever, cough, sore throat</strong></div>
                            <div class="summary-row"><span>Duration</span><strong>2 days</strong></div>
                            <div class="summary-row"><span>Temperature</span><strong>38.2 C</strong></div>
                            <a class="assessment-btn" href="#">View Full Assessment</a>
                        </div>
                    </section>

                    <section class="panel">
                        <header class="panel-head"><span><i class="bi bi-clipboard2-plus me-2"></i>Physician Notes &amp; Recommendations</span><button class="icon-btn" type="button" aria-label="More note actions"><i class="bi bi-three-dots"></i></button></header>
                        <div class="notes-body">
                            <label><span class="field-label">Notes</span><textarea>Patient reports fever, headache, and body pain since yesterday. No cough or colds. Advised rest, hydration, and paracetamol for fever.</textarea></label>
                            <label><span class="field-label">Recommendations / Advice</span><textarea class="advice">1. Take Paracetamol 500mg every 6 hours as needed for fever or pain.
2. Drink plenty of fluids and get enough rest.
3. Monitor temperature. If symptoms persist or worsen, consult again.</textarea></label>
                            <div><span class="field-label">Prescription (Optional)</span><button class="add-prescription" type="button"><i class="bi bi-plus-lg me-2"></i>Add Prescription</button></div>
                        </div>
                    </section>
                </aside>
            </div>

            <div class="bottom-bar">
                <div><i class="bi bi-shield-check me-3"></i>Once you end this consultation, the record will be saved to the patient's consultation history.</div>
                <button class="green-btn" type="button"><i class="bi bi-check-circle"></i> Mark as Completed</button>
            </div>

            <footer class="footer"><span>CLSU Infirmary Telemedicine System</span><span>|</span><span>Central Luzon State University</span><em>Nurturing a Culture of Excellence</em></footer>
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
