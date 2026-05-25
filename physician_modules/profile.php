<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Physician Profile | CLSU Infirmary Telemedicine System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        :root{--ink:#071438;--muted:#4e5b86;--green:#087d32;--green-dark:#006824;--line:#dfe6f2;--page:#f6f9fd;--blue:#2578e7;--purple:#7c3df0;--red:#e60012;--shadow:0 12px 30px rgba(24,39,75,.07)}
        *{box-sizing:border-box}body{min-height:100vh;margin:0;color:var(--ink);font-family:"Inter","Segoe UI",system-ui,-apple-system,BlinkMacSystemFont,sans-serif;background:var(--page)}a{color:inherit;text-decoration:none}button,input,select{font:inherit}
        .app-shell{display:grid;grid-template-columns:300px minmax(0,1fr);min-height:100vh;transition:grid-template-columns .2s ease}.sidebar{position:sticky;top:0;height:100vh;padding:1.55rem 1.25rem;border-right:1px solid var(--line);background:#fff;box-shadow:8px 0 28px rgba(24,39,75,.04);overflow-y:auto;transition:padding .2s ease}.brand{display:flex;align-items:center;gap:.85rem;margin-bottom:2.35rem}.brand img{width:62px;height:62px;border-radius:50%;object-fit:cover}.brand strong{display:block;color:var(--green-dark);font-size:1.35rem;font-weight:950;line-height:1.05}.brand span{display:block;color:var(--green-dark);font-size:1rem;font-weight:800}
        .avatar,.icon-pill{display:grid;place-items:center;border-radius:50%;color:#fff;background:linear-gradient(135deg,#d29a82 0%,#4a4865 100%);overflow:hidden}.avatar{width:64px;height:64px;border:1px solid #d4dbe7;font-size:1.85rem}.physician-mini{display:grid;grid-template-columns:64px minmax(0,1fr);align-items:center;gap:.9rem;margin-bottom:1.6rem}.physician-mini h2{margin:0 0 .18rem;font-size:1rem;font-weight:950}.physician-mini p{margin:0 0 .25rem;color:var(--muted);font-size:.9rem}.online{display:inline-flex;align-items:center;gap:.38rem;color:#2d405f;font-size:.82rem}.online:before{content:"";width:10px;height:10px;border-radius:50%;background:var(--green)}
        .sidebar-collapse{display:flex;align-items:center;justify-content:center;gap:.55rem;width:100%;min-height:42px;margin:0 0 1rem;border:1px solid #d7e0ee;border-radius:9px;color:var(--green-dark);background:#fff;font-weight:950}.nav-list{display:grid;gap:.45rem;margin:0;padding:0 0 1.4rem;border-bottom:1px solid var(--line);list-style:none}.nav-secondary{display:grid;gap:.45rem;margin:1.25rem 0 1.6rem;padding:0;list-style:none}.nav-link{position:relative;display:flex;align-items:center;gap:1rem;min-height:56px;padding:.8rem .95rem;border-radius:10px;color:#1d293f;font-weight:850}.nav-link:before{content:"";position:absolute;left:-1.25rem;width:8px;height:44px;border-radius:0 8px 8px 0;background:transparent}.nav-link i{width:28px;color:#5d697d;font-size:1.35rem}.nav-link.active{color:var(--green-dark);background:linear-gradient(90deg,#e7f4e6,#f5faf3)}.nav-link.active:before{background:var(--green)}.nav-link.active i{color:var(--green)}.nav-badge{display:grid;place-items:center;min-width:24px;height:24px;margin-left:auto;padding:0 .4rem;border-radius:999px;color:#fff;background:var(--green);font-size:.76rem;font-weight:950}.campus-card{margin:1.4rem 0 1.2rem;padding:1.2rem;border:1px solid #dcebdd;border-radius:10px;background:linear-gradient(145deg,#eef8ef,#f8fcf8);color:var(--green-dark)}.campus-art{height:76px;margin-bottom:.8rem;opacity:.55;background:linear-gradient(180deg,transparent 55%,#2c7141 0);clip-path:polygon(0 76%,12% 62%,18% 65%,24% 30%,31% 66%,48% 50%,58% 66%,72% 46%,84% 62%,100% 70%,100% 100%,0 100%)}.campus-card h3{margin:0 0 .55rem;font-size:1.25rem;font-weight:950}.campus-card p{margin:0;font-style:italic}.logout-link{margin-top:1rem}
        body.sidebar-collapsed .app-shell{grid-template-columns:88px minmax(0,1fr)}body.sidebar-collapsed .sidebar{padding-inline:.75rem;overflow-x:hidden}body.sidebar-collapsed .brand{justify-content:center;gap:0;margin-bottom:1.5rem}body.sidebar-collapsed .brand span,body.sidebar-collapsed .physician-mini > div:last-child,body.sidebar-collapsed .sidebar-collapse span,body.sidebar-collapsed .campus-card{display:none}body.sidebar-collapsed .brand img,body.sidebar-collapsed .avatar{width:48px;height:48px}body.sidebar-collapsed .physician-mini{grid-template-columns:1fr;justify-items:center;margin-bottom:1rem}body.sidebar-collapsed .sidebar-collapse{width:48px;margin-inline:auto}body.sidebar-collapsed .nav-link{justify-content:center;gap:0;padding-inline:.6rem;font-size:0}body.sidebar-collapsed .nav-link i{width:auto;font-size:1.45rem}body.sidebar-collapsed .nav-badge{position:absolute;top:5px;right:4px;min-width:18px;height:18px;margin-left:0;padding:0 .25rem;font-size:.62rem}
        .main{min-width:0;padding:1.45rem 1.6rem}.topbar{display:grid;grid-template-columns:minmax(0,1fr) auto auto;align-items:start;gap:1.2rem;margin-bottom:1.4rem;padding-bottom:1.25rem;border-bottom:1px solid var(--line)}.page-title h1{margin:0 0 .45rem;font-size:clamp(1.8rem,2.35vw,2.35rem);font-weight:950}.crumb{display:flex;gap:.65rem;color:#34426f;font-weight:750}.bell{position:relative;display:grid;place-items:center;width:48px;height:48px;border:0;background:transparent;color:#172447;font-size:1.6rem}.bell span{position:absolute;top:0;right:0;display:grid;place-items:center;width:24px;height:24px;border-radius:50%;color:#fff;background:var(--green);font-size:.75rem;font-weight:950}.doctor-top{display:grid;grid-template-columns:48px auto 24px;align-items:center;gap:.75rem;padding-left:1rem;border-left:1px solid var(--line)}.doctor-top .avatar{width:48px;height:48px;font-size:1.35rem}.doctor-top strong{display:block;font-weight:950}.doctor-top span{font-size:.82rem;color:#26335f}
        .profile-layout{display:grid;grid-template-columns:300px minmax(0,1fr) 430px;gap:1rem;align-items:start}.cardx{border:1px solid var(--line);border-radius:10px;background:#fff;box-shadow:var(--shadow)}.left-stack,.right-stack,.middle-stack{display:grid;gap:1rem}.profile-card{padding:1.35rem;text-align:center}.profile-photo{position:relative;width:150px;height:150px;margin:0 auto 1.65rem;border-radius:50%;background:linear-gradient(135deg,#d29a82,#4a4865);display:grid;place-items:center;color:#fff;font-size:4rem;overflow:visible}.camera-btn{position:absolute;right:4px;bottom:4px;display:grid;place-items:center;width:34px;height:34px;border:3px solid #fff;border-radius:50%;color:#087d32;background:#fff;box-shadow:0 8px 18px rgba(24,39,75,.16);font-size:1rem;line-height:1}.profile-card h2{margin:0 0 .35rem;font-size:1.3rem;font-weight:950;line-height:1.2}.status{display:inline-grid;place-items:center;width:max-content;padding:.32rem .62rem;border:1px solid #9eddb4;border-radius:6px;color:var(--green-dark);background:#eefaef;font-size:.78rem;font-weight:950}.profile-divider{height:1px;margin:1.25rem 0;background:var(--line)}.contact-list{display:grid;gap:1rem;text-align:left}.contact-row{display:grid;grid-template-columns:26px minmax(0,1fr);gap:.65rem;color:#071438}.contact-row i{color:#1f2a70;font-size:1.1rem}.small-card{padding:1.2rem}.section-title{display:flex;align-items:center;gap:.7rem;margin:0 0 1.1rem;font-size:1.05rem;font-weight:950}.icon-pill{width:34px;height:34px;border-radius:8px;color:#6d36e8;background:#f0e8ff;font-size:1.1rem}.icon-pill.green{color:var(--green-dark);background:#eafaef}.form-grid{display:grid;gap:.9rem}.form-row label{display:block;margin-bottom:.3rem;color:#071438;font-size:.84rem;font-weight:850}.field{width:100%;height:42px;padding:0 .85rem;border:1px solid #d3dceb;border-radius:7px;background:#fff;color:#071438}.select-wrap{position:relative}.select-wrap:after{content:"\F282";position:absolute;right:.85rem;top:50%;font-family:"bootstrap-icons";transform:translateY(-50%);color:#34426f}.edit-btn,.outline-btn{display:inline-flex;align-items:center;justify-content:center;gap:.5rem;min-height:42px;padding:0 1rem;border:1px solid #9eddb4;border-radius:7px;color:var(--green-dark);background:#fff;font-weight:950}.panel-head{display:flex;align-items:center;justify-content:space-between;gap:1rem;margin-bottom:1rem}.info-table{display:grid;gap:1.05rem}.info-line{display:grid;grid-template-columns:minmax(150px,.8fr) minmax(0,1fr);gap:1rem}.info-line span:first-child{font-weight:850;color:#34426f}.info-line strong{font-weight:850}.pref-line{display:flex;align-items:center;justify-content:space-between;gap:1rem;padding:.35rem 0;color:#071438}.pref-line i{color:#172447}.activity-list{display:grid;gap:.75rem}.activity-line{display:grid;grid-template-columns:30px minmax(0,1fr) auto;align-items:center;gap:.65rem}.activity-line i{display:grid;place-items:center;width:28px;height:28px;border-radius:7px;color:var(--green-dark);background:#eafaef}.activity-line strong{font-size:1rem}.notice{grid-column:1/-1;padding:1rem 1.2rem;border:1px solid #bdd9ff;border-radius:8px;color:#0b2d75;background:#f3f8ff}.menu-toggle,.sidebar-overlay{display:none}
        @media(max-width:1500px){.profile-layout{grid-template-columns:300px minmax(0,1fr)}.right-stack{grid-column:1/-1;grid-template-columns:repeat(2,minmax(0,1fr))}.right-stack .cardx:last-child{grid-column:1/-1}}@media(max-width:1180px){.app-shell,body.sidebar-collapsed .app-shell{grid-template-columns:1fr}.sidebar-collapse{display:none}.menu-toggle{position:fixed;top:1rem;left:1rem;z-index:1100;display:grid;place-items:center;width:48px;height:48px;border:1px solid var(--line);border-radius:12px;color:var(--green-dark);background:#fff;box-shadow:0 10px 24px rgba(24,39,75,.12);font-size:1.55rem}.sidebar-overlay{position:fixed;inset:0;z-index:1050;display:block;background:rgba(7,20,56,.42);opacity:0;pointer-events:none;transition:opacity .2s ease}body.sidebar-open .sidebar-overlay{opacity:1;pointer-events:auto}.sidebar{position:fixed;inset:0 auto 0 0;z-index:1060;width:min(84vw,310px);height:100vh;transform:translateX(-100%);transition:transform .24s ease;box-shadow:12px 0 36px rgba(7,20,56,.18)}body.sidebar-open .sidebar{transform:translateX(0)}.main{padding-top:5rem}}@media(max-width:900px){.main{padding-inline:1rem}.topbar,.profile-layout,.right-stack{grid-template-columns:1fr}.doctor-top{display:none}.right-stack{grid-column:auto}.info-line{grid-template-columns:1fr}.profile-photo{width:126px;height:126px;font-size:3.2rem}}
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
                    <li><a class="nav-link" href="notification.php"><i class="bi bi-bell"></i> Notifications <span class="nav-badge">3</span></a></li>
                </ul>
                <ul class="nav-secondary">
                    <li><a class="nav-link active" href="profile.php"><i class="bi bi-person"></i> Profile</a></li>
                    <li><a class="nav-link" href="#"><i class="bi bi-gear"></i> Settings</a></li>
                </ul>
            </nav>
            <section class="campus-card"><div class="campus-art" aria-hidden="true"></div><h3>Central Luzon State University</h3><p>Nurturing a Culture of Excellence</p></section>
            <a class="nav-link logout-link" href="../auth/index.php"><i class="bi bi-box-arrow-left"></i> Logout</a>
        </aside>

        <main class="main">
            <header class="topbar">
                <div class="page-title"><h1>My Profile</h1><div class="crumb"><span>Home</span><span>/</span><strong>My Profile</strong></div></div>
                <button class="bell" type="button" aria-label="Notifications"><i class="bi bi-bell"></i><span>3</span></button>
                <div class="doctor-top"><span class="avatar"><i class="bi bi-person-fill"></i></span><div><strong>Dr. Juan Dela Cruz</strong><span>Physician</span></div><i class="bi bi-chevron-down"></i></div>
            </header>

            <div class="profile-layout">
                <aside class="left-stack">
                    <section class="cardx profile-card">
                        <div class="profile-photo"><i class="bi bi-person-fill"></i><button class="camera-btn" type="button" aria-label="Change profile photo"><i class="bi bi-camera"></i></button></div>
                        <h2>Dr. Juan Dela Cruz</h2>
                        <p>Physician</p>
                        <span class="status">Available</span>
                        <div class="profile-divider"></div>
                        <div class="contact-list">
                            <div class="contact-row"><i class="bi bi-envelope"></i><strong>juan.delacruz@clsu.edu.ph</strong></div>
                            <div class="contact-row"><i class="bi bi-telephone"></i><strong>0917 234 5678</strong></div>
                            <div class="contact-row"><i class="bi bi-geo-alt"></i><strong>Science City of Munoz, Nueva Ecija, Philippines</strong></div>
                            <div class="contact-row"><i class="bi bi-calendar2"></i><strong>Member since<br>Jan 10, 2025</strong></div>
                        </div>
                    </section>
                    <section class="cardx small-card"><h2 class="section-title"><span class="icon-pill green"><i class="bi bi-shield-check"></i></span>Account Status</h2><span class="status">Active</span><p class="mt-3 mb-0">Your account is active and ready to receive consultation assignments.</p></section>
                    <section class="cardx small-card"><h2 class="section-title"><span class="icon-pill"><i class="bi bi-award"></i></span>License Information</h2><p><strong>PRC License No.</strong><br>MD-2025-01742</p><p><strong>Valid Until</strong><br>Dec 31, 2026</p><button class="outline-btn w-100" type="button">View License</button></section>
                </aside>

                <section class="middle-stack">
                    <section class="cardx small-card">
                        <div class="panel-head"><h2 class="section-title mb-0"><span class="icon-pill"><i class="bi bi-person"></i></span>Personal Information</h2><button class="edit-btn" type="button"><i class="bi bi-pencil"></i>Edit Profile</button></div>
                        <div class="form-grid">
                            <div class="form-row"><label>Full Name</label><input class="field" value="Dr. Juan Dela Cruz"></div>
                            <div class="form-row"><label>Email Address</label><input class="field" value="juan.delacruz@clsu.edu.ph"></div>
                            <div class="form-row"><label>Contact Number</label><input class="field" value="0917 234 5678"></div>
                            <div class="form-row"><label>Date of Birth</label><input class="field" value="June 18, 1988"></div>
                            <div class="form-row"><label>Gender</label><div class="select-wrap"><select class="field"><option>Male</option></select></div></div>
                            <div class="form-row"><label>Address</label><input class="field" value="Science City of Munoz, Nueva Ecija, Philippines"></div>
                            <div class="form-row"><label>Civil Status</label><div class="select-wrap"><select class="field"><option>Married</option></select></div></div>
                            <div class="form-row"><label>Nationality</label><input class="field" value="Filipino"></div>
                        </div>
                    </section>
                    <section class="cardx small-card">
                        <h2 class="section-title"><span class="icon-pill"><i class="bi bi-hospital"></i></span>Professional Information</h2>
                        <div class="info-table">
                            <div class="info-line"><span>Position</span><strong>Consulting Physician</strong></div>
                            <div class="info-line"><span>Department / Unit</span><strong>CLSU Infirmary</strong></div>
                            <div class="info-line"><span>Specialization</span><strong>General Medicine</strong></div>
                            <div class="info-line"><span>Years of Experience</span><strong>9 years</strong></div>
                            <div class="info-line"><span>Highest Educational Attainment</span><strong>Doctor of Medicine</strong></div>
                            <div class="info-line"><span>Employment Status</span><strong>Full-time</strong></div>
                        </div>
                    </section>
                </section>

                <aside class="right-stack">
                    <section class="cardx small-card"><h2 class="section-title"><span class="icon-pill" style="color:#0d62d9;background:#eaf3ff"><i class="bi bi-lock"></i></span>Account Information</h2><div class="info-table"><div class="info-line"><span>Username</span><strong>jdelacruz</strong></div><div class="info-line"><span>Role</span><strong>Physician</strong></div><div class="info-line"><span>Account Type</span><strong>Medical Staff</strong></div><div class="info-line"><span>Last Login</span><strong>May 16, 2025&nbsp; 10:36 AM</strong></div><div class="info-line"><span>Account Status</span><strong><span class="status">Active</span></strong></div></div></section>
                    <section class="cardx small-card"><h2 class="section-title"><span class="icon-pill" style="color:#0d62d9;background:#eaf3ff"><i class="bi bi-shield-lock"></i></span>Security</h2><div class="info-table"><div class="info-line"><span>Password</span><strong>********</strong></div><button class="outline-btn" type="button">Change Password</button><div class="info-line"><span>Two-Factor Authentication</span><strong><span class="status">Enabled</span></strong></div></div></section>
                    <section class="cardx small-card"><h2 class="section-title"><span class="icon-pill"><i class="bi bi-gear"></i></span>Preferences</h2><div class="pref-line"><span>Notification Preferences</span><strong>Enabled <i class="bi bi-chevron-right"></i></strong></div><div class="pref-line"><span>Email Notifications</span><strong>Enabled <i class="bi bi-chevron-right"></i></strong></div><div class="pref-line"><span>Language</span><strong>English <i class="bi bi-chevron-right"></i></strong></div><div class="pref-line"><span>Timezone</span><strong>(GMT+8) Manila <i class="bi bi-chevron-right"></i></strong></div></section>
                    <section class="cardx small-card"><h2 class="section-title" style="color:var(--green-dark)"><span class="icon-pill green"><i class="bi bi-arrow-repeat"></i></span>Activity Summary</h2><div class="activity-list"><div class="activity-line"><i class="bi bi-clipboard2-pulse"></i><span>Total Consultations Reviewed</span><strong>214</strong></div><div class="activity-line"><i class="bi bi-chat-dots"></i><span>Active Consultations</span><strong>4</strong></div><div class="activity-line"><i class="bi bi-calendar2-check"></i><span>Follow-up Requests Reviewed</span><strong>36</strong></div><div class="activity-line"><i class="bi bi-check2-circle"></i><span>Completed Consultations</span><strong>178</strong></div><button class="outline-btn w-100 mt-2" type="button" style="color:var(--green-dark);border-color:#8ed5a5"><i class="bi bi-graph-up"></i>View Full Activity Report</button></div></section>
                </aside>
                <div class="notice"><i class="bi bi-info-circle me-2"></i>Keep your physician profile information up to date. This information is used for consultation assignment, patient communication, and audit records.</div>
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
