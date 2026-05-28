<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CLSU Campus Telemedicine | Sign In</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="assets/css/auth.css" rel="stylesheet">
</head>
<body>
    <main class="auth-shell">
        <section class="auth-card">
            <div class="row g-0 min-vh-card">
                <aside class="col-lg-6 brand-panel">
                    <div class="brand-content">
                        <a class="brand-mark" href="#" aria-label="CLSU Campus Telemedicine">
                            <span class="brand-icon">
                                <img src="assets/img/CLSU_Logo.jpg" alt="CLSU logo">
                            </span>
                            <span>
                                <strong>CLSU Campus</strong>
                                <strong>Telemedicine</strong>
                            </span>
                        </a>

                        <div class="brand-copy">
                            <h1>Quality care,<br>right on campus.</h1>
                            <p>Connect with licensed healthcare professionals anytime, anywhere.</p>
                        </div>

                        <div class="feature-list">
                            <div class="feature-item">
                                <span class="feature-icon"><i class="bi bi-chat-dots"></i></span>
                                <div>
                                    <h2>Virtual Consultations</h2>
                                    <p>Talk to doctors via secure video calls.</p>
                                </div>
                            </div>

                            <div class="feature-item">
                                <span class="feature-icon"><i class="bi bi-shield-plus"></i></span>
                                <div>
                                    <h2>Secure &amp; Private</h2>
                                    <p>Your health information is always protected.</p>
                                </div>
                            </div>

                            <div class="feature-item">
                                <span class="feature-icon"><i class="bi bi-calendar2-check"></i></span>
                                <div>
                                    <h2>Easy Appointments</h2>
                                    <p>Book, reschedule, and manage appointments with ease.</p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="campus-art" aria-hidden="true">
                        <span class="cloud cloud-one"></span>
                        <span class="cloud cloud-two"></span>
                        <span class="tree tree-left"></span>
                        <span class="tree tree-right"></span>
                        <span class="building main-building">
                            <span class="roof"></span>
                            <span class="clock clock-left"></span>
                            <span class="clock clock-right"></span>
                            <span class="windows"></span>
                            <span class="door"></span>
                        </span>
                        <span class="walkway"></span>
                        <span class="bench"></span>
                    </div>
                </aside>

                <section class="col-lg-6 sign-in-panel">
                    <div class="login-wrap">
                        <div class="login-heading text-center">
                            <h2>Welcome back</h2>
                            <p>Sign in to your CLSU Campus Telemedicine account</p>
                        </div>

                        <div class="role-tabs" role="tablist" aria-label="Account type">
                            <button class="role-tab active" type="button" role="tab" aria-selected="true" data-role="student">
                                <i class="bi bi-mortarboard"></i>
                                Student / Faculty
                            </button>
                            <button class="role-tab" type="button" role="tab" aria-selected="false" data-role="staff">
                                <i class="bi bi-person"></i>
                                Health Staff
                            </button>
                        </div>

                        <form class="login-form" action="#" method="post">
                            <input type="hidden" name="account_type" id="accountType" value="student">

                            <div class="mb-4">
                                <label for="campusId" class="form-label" id="identifierLabel">Email</label>
                                <div class="input-shell">
                                    <i class="bi bi-envelope"></i>
                                    <input type="text" class="form-control" id="campusId" name="identifier" placeholder="Enter your email" autocomplete="username">
                                </div>
                            </div>

                            <div class="mb-2">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-shell">
                                    <i class="bi bi-lock"></i>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" autocomplete="current-password">
                                    <button class="icon-button" type="button" aria-label="Show password">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="text-end mb-4">
                                <a class="forgot-link" href="#">Forgot password?</a>
                            </div>

                            <div class="login-alert" id="loginAlert" role="alert" aria-live="polite"></div>

                            <button class="btn btn-primary sign-in-button w-100" type="button" id="signInButton">Sign In as Student / Faculty</button>
                        </form>

                        <div class="text-center mt-3">
                            <button class="demo-link" type="button" id="showCredentialsButton">
                                <i class="bi bi-key"></i>
                                View demo credentials
                            </button>
                        </div>

                        <div class="registration-action" id="registrationAction">
                            <a class="registration-button" href="#">
                                <i class="bi bi-person-plus"></i>
                                Register as Student / Faculty
                            </a>
                        </div>
                    </div>

                    <footer class="security-footer">
                        <span>Secure Connection</span>
                    </footer>
                </section>
            </div>
        </section>
    </main>

    <div class="credentials-modal" id="credentialsModal" aria-hidden="true">
        <div class="credentials-dialog" role="dialog" aria-modal="true" aria-labelledby="credentialsTitle">
            <div class="credentials-head">
                <div>
                    <h2 id="credentialsTitle">Demo Login Credentials</h2>
                    <p>Use one of these accounts to enter the prototype.</p>
                </div>
                <button class="modal-close" type="button" id="closeCredentialsButton" aria-label="Close demo credentials">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>

            <div class="credential-list">
                <article class="credential-card">
                    <span class="credential-icon"><i class="bi bi-mortarboard"></i></span>
                    <div>
                        <h3>Student / Faculty</h3>
                        <p><strong>Email:</strong> student@clsu2.edu.ph</p>
                        <p><strong>Password:</strong> student123</p>
                    </div>
                </article>
                <article class="credential-card">
                    <span class="credential-icon"><i class="bi bi-heart-pulse"></i></span>
                    <div>
                        <h3>Nurse</h3>
                        <p><strong>Email:</strong> nurse@clsu2.edu.ph</p>
                        <p><strong>Password:</strong> nurse123</p>
                    </div>
                </article>
                <article class="credential-card">
                    <span class="credential-icon"><i class="bi bi-stethoscope"></i></span>
                    <div>
                        <h3>Physician</h3>
                        <p><strong>Email:</strong> physician@clsu2.edu.ph</p>
                        <p><strong>Password:</strong> physician123</p>
                    </div>
                </article>
                <article class="credential-card">
                    <span class="credential-icon"><i class="bi bi-person-gear"></i></span>
                    <div>
                        <h3>Administrator</h3>
                        <p><strong>Email:</strong> admin@clsu2.edu.ph</p>
                        <p><strong>Password:</strong> admin123</p>
                    </div>
                </article>
            </div>
        </div>
    </div>

    <script>
        const roleOptions = {
            student: {
                heading: "Welcome back",
                subheading: "Sign in to your CLSU Campus Telemedicine account",
                label: "Email",
                placeholder: "Enter your clsu email",
                button: "Sign In as Student / Faculty"
            },
            staff: {
                heading: "Health staff portal",
                subheading: "Sign in to manage consultations, appointments, and patient care",
                label: "Staff Email",
                placeholder: "Enter your staff email",
                button: "Sign In as Health Staff"
            }
        };

        const demoCredentials = {
            "student@clsu2.edu.ph": {
                password: "student123",
                accountType: "student",
                redirect: "../patient_modules/dashboard.php"
            },
            "nurse@clsu2.edu.ph": {
                password: "nurse123",
                accountType: "staff",
                redirect: "../nurse_modules/dashboard.php"
            },
            "physician@clsu2.edu.ph": {
                password: "physician123",
                accountType: "staff",
                redirect: "../physician_modules/dashboard.php"
            },
            "admin@clsu2.edu.ph": {
                password: "admin123",
                accountType: "staff",
                redirect: "../admin_module/dashboard.php"
            }
        };

        const roleTabs = document.querySelectorAll(".role-tab");
        const heading = document.querySelector(".login-heading h2");
        const subheading = document.querySelector(".login-heading p");
        const identifierLabel = document.getElementById("identifierLabel");
        const campusId = document.getElementById("campusId");
        const password = document.getElementById("password");
        const accountType = document.getElementById("accountType");
        const signInButton = document.getElementById("signInButton");
        const registrationAction = document.getElementById("registrationAction");
        const loginAlert = document.getElementById("loginAlert");
        const credentialsModal = document.getElementById("credentialsModal");
        const showCredentialsButton = document.getElementById("showCredentialsButton");
        const closeCredentialsButton = document.getElementById("closeCredentialsButton");
        const passwordToggle = document.querySelector(".icon-button");

        roleTabs.forEach((tab) => {
            tab.addEventListener("click", () => {
                const selectedRole = tab.dataset.role;
                const copy = roleOptions[selectedRole];

                roleTabs.forEach((roleTab) => {
                    const isSelected = roleTab === tab;
                    roleTab.classList.toggle("active", isSelected);
                    roleTab.setAttribute("aria-selected", String(isSelected));
                });

                heading.textContent = copy.heading;
                subheading.textContent = copy.subheading;
                identifierLabel.textContent = copy.label;
                campusId.placeholder = copy.placeholder;
                accountType.value = selectedRole;
                signInButton.textContent = copy.button;
                registrationAction.hidden = selectedRole !== "student";
                loginAlert.textContent = "";
                loginAlert.classList.remove("show");
            });
        });

        const openCredentialsModal = () => {
            credentialsModal.classList.add("show");
            credentialsModal.setAttribute("aria-hidden", "false");
            closeCredentialsButton.focus();
        };

        const closeCredentialsModal = () => {
            credentialsModal.classList.remove("show");
            credentialsModal.setAttribute("aria-hidden", "true");
            showCredentialsButton.focus();
        };

        showCredentialsButton.addEventListener("click", openCredentialsModal);
        closeCredentialsButton.addEventListener("click", closeCredentialsModal);

        credentialsModal.addEventListener("click", (event) => {
            if (event.target === credentialsModal) {
                closeCredentialsModal();
            }
        });

        passwordToggle.addEventListener("click", () => {
            const shouldShow = password.type === "password";
            password.type = shouldShow ? "text" : "password";
            passwordToggle.setAttribute("aria-label", shouldShow ? "Hide password" : "Show password");
            passwordToggle.querySelector("i").className = shouldShow ? "bi bi-eye-slash" : "bi bi-eye";
        });

        signInButton.addEventListener("click", () => {
            const identifier = campusId.value.trim().toLowerCase();
            const credential = demoCredentials[identifier];

            if (!credential || credential.password !== password.value || credential.accountType !== accountType.value) {
                loginAlert.textContent = "Invalid credentials for the selected account type. View demo credentials and try again.";
                loginAlert.classList.add("show");
                return;
            }

            window.location.href = credential.redirect;
        });

        document.addEventListener("keydown", (event) => {
            if (event.key === "Escape" && credentialsModal.classList.contains("show")) {
                closeCredentialsModal();
            }
        });
    </script>
</body>
</html>
