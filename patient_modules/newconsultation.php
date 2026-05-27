<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New Consultation | CLSU Infirmary Telemedicine System</title>
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
            grid-template-columns: 1fr minmax(260px, 470px) auto;
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

        .consult-grid {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 330px;
            gap: 1.4rem;
        }

        .stack,
        .right-column {
            display: grid;
            gap: 1rem;
            align-content: start;
        }

        .panel {
            border: 1px solid var(--line);
            border-radius: 10px;
            background: #fff;
            box-shadow: var(--shadow);
        }

        .stepper {
            display: grid;
            grid-template-columns: repeat(5, minmax(150px, 1fr));
            gap: .5rem;
            padding: 1.15rem 1.3rem 0;
            overflow-x: auto;
        }

        .step {
            position: relative;
            display: grid;
            grid-template-columns: 44px 1fr;
            gap: .75rem;
            align-items: center;
            min-width: 165px;
            padding-bottom: 1.05rem;
            border-bottom: 3px solid transparent;
        }

        .step:not(:last-child)::after {
            content: "\F285";
            position: absolute;
            right: -8px;
            top: 16px;
            color: #cbd4e6;
            font-family: bootstrap-icons;
        }

        .step.active {
            border-bottom-color: var(--green);
        }

        .step-number {
            display: grid;
            place-items: center;
            width: 42px;
            height: 42px;
            border-radius: 50%;
            color: #1c294d;
            background: #e9eef7;
            font-weight: 950;
            font-size: 1.1rem;
        }

        .step.active .step-number {
            color: #fff;
            background: var(--green);
        }

        .step strong {
            display: block;
            font-size: .95rem;
        }

        .step span:last-child {
            color: #34426f;
            font-size: .85rem;
        }

        .form-panel {
            padding: 1.4rem;
        }

        .step-panel {
            display: none;
        }

        .step-panel.active {
            display: block;
        }

        .section-heading {
            margin-bottom: 1rem;
        }

        .section-heading h2 {
            margin: 0 0 .35rem;
            font-size: 1.15rem;
            font-weight: 950;
        }

        .section-heading p {
            margin: 0;
            color: #34426f;
        }

        .info-box {
            padding: 1rem;
            border: 1px solid var(--line);
            border-radius: 10px;
            background: #fff;
        }

        .patient-row {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
            padding: .5rem 0 1.1rem;
        }

        .patient-row div {
            padding: 0 1rem;
            border-right: 1px solid var(--line);
        }

        .patient-row div:last-child {
            border-right: 0;
        }

        .patient-row span {
            display: block;
            margin-bottom: .55rem;
            color: #34426f;
            font-size: .85rem;
            font-weight: 850;
        }

        .patient-row strong {
            font-size: 1rem;
        }

        .verified-alert,
        .info-alert {
            display: grid;
            grid-template-columns: 44px 1fr auto;
            align-items: center;
            gap: .9rem;
            padding: .9rem 1rem;
            border-radius: 8px;
        }

        .verified-alert {
            border: 1px solid #bfe8c9;
            background: #f3fff7;
        }

        .info-alert {
            margin-top: 1.15rem;
            border: 1px solid #cfe0fb;
            background: #f3f8ff;
        }

        .verified-alert i,
        .info-alert i {
            color: var(--green);
            font-size: 1.45rem;
        }

        .info-alert i {
            color: var(--blue);
        }

        .verified-alert strong,
        .info-alert strong {
            display: block;
            color: var(--green-dark);
        }

        .info-alert strong {
            color: #244a92;
        }

        .verified-alert p,
        .info-alert p {
            margin: .15rem 0 0;
            color: #34426f;
        }

        .type-card-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: .9rem;
        }

        .type-card {
            position: relative;
            display: grid;
            grid-template-columns: 44px 1fr;
            gap: .85rem;
            min-height: 118px;
            padding: 1rem;
            border: 1px solid #d5deee;
            border-radius: 8px;
            background: #fff;
        }

        .type-card.active {
            border-color: var(--green);
            background: #f3fff7;
        }

        .type-card > i {
            color: #5365a1;
            font-size: 2rem;
        }

        .type-card.active > i,
        .selected-dot {
            color: var(--green);
        }

        .type-card h3 {
            margin: 0 0 .45rem;
            font-size: .95rem;
            font-weight: 950;
        }

        .type-card p {
            margin: 0;
            color: #34426f;
            font-size: .86rem;
            line-height: 1.45;
        }

        .symptom-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(150px, 1fr));
            gap: .85rem;
            margin-top: 1rem;
        }

        .symptom-option {
            position: relative;
            display: grid;
            grid-template-columns: 38px minmax(0, 1fr);
            align-items: center;
            gap: .7rem;
            min-height: 84px;
            padding: 1rem;
            border: 1px solid #d5deee;
            border-radius: 8px;
            color: #071438;
            background: #fff;
            font-weight: 900;
            text-align: left;
        }

        .symptom-option i:first-child {
            color: #233d78;
            font-size: 1.4rem;
        }

        .symptom-option.active {
            border-color: var(--green);
            background: #f4fff7;
        }

        .symptom-option.active::after {
            content: "\F26A";
            position: absolute;
            top: .55rem;
            right: .55rem;
            display: grid;
            place-items: center;
            width: 22px;
            height: 22px;
            border-radius: 50%;
            color: #fff;
            background: var(--green);
            font-family: bootstrap-icons;
            font-size: .9rem;
        }

        .other-symptom {
            display: grid;
            grid-template-columns: 40px minmax(0, 1fr) 24px;
            align-items: center;
            gap: .8rem;
            width: 100%;
            min-height: 82px;
            margin-top: 1rem;
            padding: 1rem 1.15rem;
            border: 1px solid #d5deee;
            border-radius: 8px;
            color: #071438;
            background: #fff;
            text-align: left;
        }

        .other-symptom > i {
            color: #233d78;
            font-size: 1.45rem;
        }

        .other-symptom strong,
        .meta-group strong {
            display: block;
            margin-bottom: .3rem;
            font-weight: 950;
        }

        .other-symptom span,
        .meta-group p {
            color: #34426f;
            font-size: .9rem;
        }

        .symptom-meta {
            display: grid;
            grid-template-columns: minmax(0, .82fr) minmax(0, 1fr);
            gap: 1.45rem;
            margin-top: 1.4rem;
            padding-top: 1.4rem;
            border-top: 1px solid var(--line);
        }

        .date-time-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: .75rem;
            margin-top: 1rem;
        }

        .date-box {
            display: grid;
            grid-template-columns: 34px minmax(0, 1fr);
            align-items: center;
            min-height: 52px;
            padding: 0 .8rem;
            border: 1px solid #d5deee;
            border-radius: 8px;
            background: #fff;
            font-weight: 900;
        }

        .date-box i {
            color: #233d78;
            font-size: 1.25rem;
        }

        .severity-row {
            display: grid;
            grid-template-columns: repeat(5, minmax(74px, 1fr));
            gap: .7rem;
            margin-top: 1rem;
        }

        .severity-option {
            min-height: 84px;
            padding: .65rem .45rem;
            border: 1px solid #d5deee;
            border-radius: 8px;
            color: #071438;
            background: #fff;
            font-weight: 900;
            text-align: center;
        }

        .severity-option i {
            display: block;
            margin-bottom: .18rem;
            color: #233d78;
            font-size: 1.2rem;
        }

        .severity-option small {
            display: block;
            margin-top: .22rem;
            color: #34426f;
            font-size: .72rem;
            font-weight: 800;
        }

        .severity-option.active {
            border-color: #8ed4a4;
            color: var(--green-dark);
            background: #ebfaef;
        }

        .severity-option.active i,
        .severity-option.active small {
            color: var(--green);
        }

        .notes-group {
            margin-top: 1.55rem;
        }

        .notes-field {
            position: relative;
            margin-top: .75rem;
        }

        .notes-field textarea {
            width: 100%;
            min-height: 122px;
            padding: 1rem 1rem 1.9rem;
            border: 1px solid #d5deee;
            border-radius: 8px;
            color: var(--ink);
            background: #fff;
            resize: vertical;
            outline: none;
        }

        .notes-count {
            position: absolute;
            right: 1rem;
            bottom: .75rem;
            color: #34426f;
            font-size: .86rem;
            font-weight: 850;
        }

        .selected-dot {
            position: absolute;
            right: .75rem;
            top: 1rem;
            font-size: .95rem;
        }

        .form-actions {
            display: flex;
            justify-content: space-between;
            gap: 1rem;
            margin-top: 1.2rem;
        }

        .btn-main,
        .btn-outline-main,
        .btn-soft {
            min-height: 44px;
            padding-inline: 1.4rem;
            border-radius: 8px;
            font-weight: 900;
        }

        .btn-main {
            border: 0;
            color: #fff;
            background: linear-gradient(180deg, #0aa13f, #006824);
        }

        .btn-outline-main {
            border: 1px solid #cfd8ea;
            color: #111;
            background: #fff;
        }

        .btn-soft {
            border: 1px solid #cfe0fb;
            color: #183e85;
            background: #fff;
        }

        .how-card {
            display: grid;
            grid-template-columns: 150px repeat(4, minmax(0, 1fr));
            align-items: center;
            gap: 1rem;
            padding: 1rem 1.3rem;
        }

        .how-title {
            display: flex;
            align-items: center;
            gap: .8rem;
            font-weight: 950;
            font-size: 1.1rem;
        }

        .how-title i {
            display: grid;
            place-items: center;
            width: 44px;
            height: 44px;
            border-radius: 50%;
            color: var(--blue);
            background: #e6f2ff;
            font-size: 1.4rem;
        }

        .how-step {
            display: grid;
            grid-template-columns: 38px 1fr;
            gap: .75rem;
            align-items: start;
        }

        .how-step span {
            display: grid;
            place-items: center;
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: #e9eef7;
            font-weight: 950;
        }

        .how-step strong {
            display: block;
            margin-bottom: .25rem;
            font-size: .88rem;
        }

        .how-step p {
            margin: 0;
            color: #34426f;
            font-size: .8rem;
            line-height: 1.45;
        }

        .side-card {
            padding: 1.25rem;
        }

        .side-card h2 {
            display: flex;
            align-items: center;
            gap: .75rem;
            margin: 0 0 1rem;
            font-size: 1.05rem;
            font-weight: 950;
        }

        .side-card h2 i {
            font-size: 1.35rem;
        }

        .warning-card {
            border-color: #ffd89d;
            background: #fff8ea;
        }

        .warning-card h2 i {
            color: var(--orange);
        }

        .check-list {
            display: grid;
            gap: 1rem;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .check-list li {
            display: grid;
            grid-template-columns: 28px 1fr;
            gap: .7rem;
            line-height: 1.45;
        }

        .check-list i {
            color: #806431;
        }

        .active-card {
            border-color: #bfe8c9;
            background: #f3fff7;
        }

        .recent-card {
            border-color: #cfe0fb;
            background: #f8fbff;
        }

        .emergency-card {
            border-color: #ffb8b8;
            background: #fff3f3;
        }

        .active-card h2 i,
        .recent-card h2 i {
            color: var(--green);
        }

        .recent-card h2 i {
            color: var(--blue);
        }

        .emergency-card h2 {
            color: #8a1c1c;
        }

        .emergency-card h2 i {
            color: var(--red);
        }

        .consult-mini {
            display: grid;
            gap: .45rem;
            margin-top: .9rem;
            padding: .9rem;
            border: 1px solid #d7e2ef;
            border-radius: 8px;
            background: #fff;
        }

        .status-pill {
            justify-self: start;
            padding: .25rem .7rem;
            border-radius: 999px;
            color: #a94f00;
            background: #fff1d2;
            font-size: .82rem;
            font-weight: 900;
        }

        .side-card p {
            color: #34426f;
            line-height: 1.5;
        }

        .wide-button {
            width: 100%;
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

        @media (max-width: 1500px) {
            .consult-grid {
                grid-template-columns: 1fr;
            }

            .right-column {
                grid-template-columns: repeat(3, minmax(0, 1fr));
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

            .topbar,
            .patient-row,
            .type-card-grid,
            .symptom-grid,
            .symptom-meta,
            .right-column,
            .how-card {
                grid-template-columns: 1fr;
            }

            .patient-row div {
                padding: 0;
                border-right: 0;
            }

            .verified-alert,
            .info-alert {
                grid-template-columns: 34px 1fr;
            }

            .info-alert .btn {
                grid-column: 1 / -1;
            }

            .form-actions {
                display: grid;
                grid-template-columns: 1fr;
            }

            .severity-row {
                grid-template-columns: repeat(5, minmax(68px, 1fr));
                overflow-x: auto;
                padding-bottom: .25rem;
            }
        }

        @media (max-width: 620px) {
            .main {
                padding-inline: .75rem;
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

            .page-title h1 {
                font-size: 1.8rem;
            }

            .search-box input {
                height: 46px;
            }

            .form-panel,
            .side-card {
                padding: 1rem;
            }

            .stepper {
                padding-inline: .75rem;
            }

            .type-card {
                grid-template-columns: 34px 1fr;
            }

            .date-time-row,
            .severity-row {
                grid-template-columns: 1fr;
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
                    <li><a class="nav-link active" href="newconsultation.php"><i class="bi bi-patch-plus"></i> New Consultation</a></li>
                    <li><a class="nav-link" href="myconsultation.php"><i class="bi bi-chat-dots"></i> My Consultation</a></li>
                    <li><a class="nav-link" href="consultationhistory.php"><i class="bi bi-clipboard2-pulse"></i> Consultation History</a></li>
                    <li>
                        <a class="nav-link" href="notification.php">
                            <i class="bi bi-bell"></i> Notifications
                            <span class="nav-badge">4</span>
                        </a>
                    </li>
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
                    <h1>New Consultation</h1>
                    <p>Create a new consultation request. Our medical team will review your case.</p>
                </div>

                <label class="search-box" aria-label="Search">
                    <input type="search" placeholder="Search...">
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

            <div class="consult-grid">
                <div class="stack">
                    <section class="panel stepper" aria-label="Consultation steps">
                        <div class="step active" data-step="1"><span class="step-number">1</span><span><strong>Patient Information</strong>Provide your details</span></div>
                        <div class="step" data-step="2"><span class="step-number">2</span><span><strong>Symptoms</strong>Describe your condition</span></div>
                        <div class="step"><span class="step-number">3</span><span><strong>Additional Details</strong>Add other information</span></div>
                        <div class="step"><span class="step-number">4</span><span><strong>Review</strong>Review your request</span></div>
                        <div class="step"><span class="step-number">5</span><span><strong>Submitted</strong>Request will be reviewed</span></div>
                    </section>

                    <section class="panel form-panel">
                        <div class="step-panel active" data-step-panel="1">
                            <div class="section-heading">
                                <h2>Patient Information</h2>
                                <p>Please confirm your details before proceeding.</p>
                            </div>

                            <div class="info-box">
                                <div class="patient-row">
                                    <div><span>Full Name</span><strong>Jane Dela Cruz</strong></div>
                                    <div><span>Student ID Number</span><strong>2023-123456</strong></div>
                                    <div><span>Course &amp; Year</span><strong>BSIT - 2A</strong></div>
                                </div>

                                <div class="verified-alert">
                                    <i class="bi bi-check-circle"></i>
                                    <div>
                                        <strong>Your profile information has been verified.</strong>
                                        <p>If any information is incorrect, please update it in your profile settings.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="info-box mt-3">
                                <div class="section-heading">
                                    <h2>Consultation Type</h2>
                                    <p>Select the type of consultation you need.</p>
                                </div>

                                <div class="type-card-grid">
                                    <button class="type-card active" type="button">
                                        <i class="bi bi-heart-pulse"></i>
                                        <span><h3>General Consultation</h3><p>For general health concerns, minor illnesses, and preventive care.</p></span>
                                        <i class="bi bi-check-circle-fill selected-dot"></i>
                                    </button>
                                    <button class="type-card" type="button">
                                        <i class="bi bi-calendar2-check"></i>
                                        <span><h3>Follow-up Consultation</h3><p>For follow-up checkups or continuation of previous consultation.</p></span>
                                    </button>
                                </div>

                                <div class="info-alert">
                                    <i class="bi bi-info-circle-fill"></i>
                                    <div>
                                        <strong>To avoid duplicate requests, please check your active consultations first.</strong>
                                        <p>If your concern is related to a previous consultation, you may reopen it instead.</p>
                                    </div>
                                    <a class="btn btn-soft" href="myconsultation.php">Go to My Consultation</a>
                                </div>
                            </div>

                            <div class="form-actions">
                                <button class="btn btn-outline-main" type="button">Cancel</button>
                                <button class="btn btn-main" type="button" data-next-step="2">Next <i class="bi bi-chevron-right ms-2"></i></button>
                            </div>
                        </div>

                        <div class="step-panel" data-step-panel="2">
                            <div class="section-heading">
                                <h2>Symptoms</h2>
                                <p>Please describe your current condition by selecting your symptoms and when they started.</p>
                            </div>

                            <div class="section-heading mt-4">
                                <h2>Common Symptoms</h2>
                                <p>Select all that apply.</p>
                            </div>

                            <div class="symptom-grid" aria-label="Common symptoms">
                                <button class="symptom-option active" type="button"><i class="bi bi-headphones"></i> Headache</button>
                                <button class="symptom-option" type="button"><i class="bi bi-thermometer-half"></i> Fever</button>
                                <button class="symptom-option" type="button"><i class="bi bi-lungs"></i> Cough</button>
                                <button class="symptom-option" type="button"><i class="bi bi-virus"></i> Sore Throat</button>
                                <button class="symptom-option" type="button"><i class="bi bi-magic"></i> Body Pain</button>
                                <button class="symptom-option" type="button"><i class="bi bi-battery-half"></i> Fatigue</button>
                                <button class="symptom-option" type="button"><i class="bi bi-moisture"></i> Nausea / Vomiting</button>
                                <button class="symptom-option" type="button"><i class="bi bi-prescription2"></i> Diarrhea</button>
                                <button class="symptom-option" type="button"><i class="bi bi-cloud-drizzle"></i> Runny Nose</button>
                                <button class="symptom-option" type="button"><i class="bi bi-lungs"></i> Shortness of Breath</button>
                                <button class="symptom-option" type="button"><i class="bi bi-x-circle"></i> Loss of Appetite</button>
                                <button class="symptom-option" type="button"><i class="bi bi-apple"></i> Abdominal Pain</button>
                            </div>

                            <button class="other-symptom" type="button">
                                <i class="bi bi-pencil"></i>
                                <span><strong>Others (Please specify)</strong><span>Add symptoms not listed above</span></span>
                                <i class="bi bi-chevron-right"></i>
                            </button>

                            <div class="symptom-meta">
                                <div class="meta-group">
                                    <strong>When did your symptoms start?</strong>
                                    <p>Please select the date and time when you first noticed your symptoms.</p>
                                    <div class="date-time-row">
                                        <div class="date-box"><i class="bi bi-calendar3"></i><span>May 16, 2025</span></div>
                                        <div class="date-box"><i class="bi bi-clock"></i><span>10:00 AM</span></div>
                                    </div>
                                </div>

                                <div class="meta-group">
                                    <strong>How would you describe your symptoms?</strong>
                                    <p>Please rate the severity of your symptoms.</p>
                                    <div class="severity-row" aria-label="Symptom severity">
                                        <button class="severity-option" type="button"><i class="bi bi-emoji-smile"></i>1<small>Very Mild</small></button>
                                        <button class="severity-option" type="button"><i class="bi bi-emoji-smile"></i>2<small>Mild</small></button>
                                        <button class="severity-option active" type="button"><i class="bi bi-emoji-neutral"></i>3<small>Moderate</small></button>
                                        <button class="severity-option" type="button"><i class="bi bi-emoji-frown"></i>4<small>Severe</small></button>
                                        <button class="severity-option" type="button"><i class="bi bi-emoji-dizzy"></i>5<small>Very Severe</small></button>
                                    </div>
                                </div>
                            </div>

                            <div class="notes-group">
                                <div class="meta-group">
                                    <strong>Additional Notes (Optional)</strong>
                                    <p>Provide any additional details about your symptoms.</p>
                                </div>
                                <label class="notes-field" aria-label="Additional notes">
                                    <textarea placeholder="Type your message..."></textarea>
                                    <span class="notes-count">0/500</span>
                                </label>
                            </div>

                            <div class="form-actions">
                                <button class="btn btn-outline-main" type="button" data-next-step="1"><i class="bi bi-arrow-left me-2"></i> Back</button>
                                <button class="btn btn-main" type="button">Next <i class="bi bi-arrow-right ms-2"></i></button>
                            </div>
                        </div>
                    </section>
                </div>

                <aside class="right-column">
                    <section class="panel side-card warning-card">
                        <h2><i class="bi bi-lightbulb-fill"></i>Tips for Accurate Assessment</h2>
                        <ul class="check-list">
                            <li><i class="bi bi-check2-circle"></i><span>Be specific and detailed about your symptoms.</span></li>
                            <li><i class="bi bi-check2-circle"></i><span>Include when your symptoms started and how they have progressed.</span></li>
                            <li><i class="bi bi-check2-circle"></i><span>Mention any factors that make your symptoms better or worse.</span></li>
                            <li><i class="bi bi-check2-circle"></i><span>This helps our medical team provide better care.</span></li>
                        </ul>
                    </section>

                    <section class="panel side-card active-card">
                        <h2><i class="bi bi-shield-check"></i>Active Consultation Check</h2>
                        <p class="mb-2">You have 1 active consultation</p>
                        <div class="consult-mini">
                            <strong>CONS-2025-000123</strong>
                            <span class="status-pill">In Progress</span>
                            <small>Started on: May 16, 2025</small>
                            <a class="btn btn-main wide-button" href="myconsultation.php">View My Consultation</a>
                        </div>
                    </section>

                    <section class="panel side-card recent-card">
                        <h2><i class="bi bi-clock-fill"></i>Recently Completed</h2>
                        <p>You can reopen a consultation within 7 days after completion.</p>
                        <div class="consult-mini">
                            <strong>CONS-2025-000101</strong>
                            <small>Completed on: May 14, 2025</small>
                            <button class="btn btn-outline-main wide-button" type="button">Reopen Consultation</button>
                        </div>
                    </section>

                    <section class="panel side-card emergency-card">
                        <h2><i class="bi bi-exclamation-triangle-fill"></i>Medical Emergency?</h2>
                        <p>For life-threatening emergencies, please go to the nearest hospital or call emergency services.</p>
                        <button class="btn-danger-main" type="button">Emergency Hotlines</button>
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

        const stepItems = document.querySelectorAll(".step[data-step]");
        const stepPanels = document.querySelectorAll(".step-panel[data-step-panel]");
        const stepButtons = document.querySelectorAll("[data-next-step]");

        const showConsultationStep = (step) => {
            stepItems.forEach((item) => {
                item.classList.toggle("active", item.dataset.step === step);
            });

            stepPanels.forEach((panel) => {
                panel.classList.toggle("active", panel.dataset.stepPanel === step);
            });
        };

        stepButtons.forEach((button) => {
            button.addEventListener("click", () => {
                showConsultationStep(button.dataset.nextStep);
            });
        });

        document.addEventListener("keydown", (event) => {
            if (event.key === "Escape") {
                setSidebar(false);
            }
        });
    </script>
</body>
</html>
