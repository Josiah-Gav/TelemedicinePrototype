<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Consultation | CLSU Infirmary Telemedicine System</title>
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
            grid-template-columns: 1fr minmax(260px, 430px) auto;
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

        .content-grid {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 410px;
            gap: 1.4rem;
        }

        .panel {
            border: 1px solid var(--line);
            border-radius: 10px;
            background: #fff;
            box-shadow: var(--shadow);
        }

        .consult-shell {
            display: grid;
            grid-template-rows: auto auto minmax(390px, 1fr) auto;
            min-height: 660px;
            overflow: hidden;
        }

        .consult-card-head {
            display: grid;
            grid-template-columns: minmax(0, 1fr) auto auto;
            align-items: center;
            gap: 1.4rem;
            padding: 1.7rem 1.85rem 1.35rem;
        }

        .head-meta {
            display: flex;
            flex-wrap: wrap;
            gap: .75rem 1.3rem;
            color: #34426f;
        }

        .status-pill {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 28px;
            padding: .25rem .8rem;
            border-radius: 999px;
            color: var(--green-dark);
            background: #dff8e7;
            font-size: .84rem;
            font-weight: 950;
        }

        .consult-id {
            margin: 0 0 .75rem;
            font-size: 1.55rem;
            font-weight: 950;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: .75rem;
            color: #34426f;
        }

        .meta-item strong {
            color: #111;
        }

        .meta-item i {
            color: #5365a1;
            font-size: 1.25rem;
        }

        .urgent {
            color: #a94f00;
            font-weight: 900;
        }

        .urgent i {
            color: var(--orange);
        }

        .details-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 150px;
            min-height: 46px;
            padding: 0 1.2rem;
            border: 1px solid #aeb6c7;
            border-radius: 14px;
            color: #111;
            background: #fff;
            font-weight: 900;
        }

        .chat-panel {
            display: contents;
            min-width: 0;
        }

        .tabs {
            display: flex;
            gap: .8rem;
            min-width: 0;
            min-height: 58px;
            padding: 0 1.85rem;
            border-bottom: 1px solid var(--line);
            overflow-x: auto;
            overscroll-behavior-x: contain;
            scrollbar-width: none;
        }

        .tabs::-webkit-scrollbar {
            display: none;
        }

        .tab {
            display: grid;
            place-items: center;
            min-width: 100px;
            border: 0;
            border-bottom: 3px solid transparent;
            color: #111;
            background: transparent;
            font-weight: 950;
        }

        .tab.active {
            color: var(--green-dark);
            border-bottom-color: var(--green);
        }

        .mobile-tab {
            display: none;
        }

        .chat-stream {
            display: grid;
            align-content: start;
            gap: 1.7rem;
            min-width: 0;
            padding: 1.9rem 1.85rem;
            background: #f1eeee;
            overflow-y: auto;
        }

        .tab-panel[hidden] {
            display: none !important;
        }

        .details-panel,
        .summary-panel,
        .timeline-panel {
            padding: 1.9rem 1.85rem;
            background: #fff;
        }

        .details-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 1rem;
        }

        .detail-box {
            padding: 1.1rem;
            border: 1px solid var(--line);
            border-radius: 10px;
            background: #f9fbfe;
        }

        .detail-box.full {
            grid-column: 1 / -1;
        }

        .detail-box h3 {
            margin: 0 0 .5rem;
            font-size: .95rem;
            font-weight: 950;
        }

        .detail-box p {
            margin: 0;
            color: #34426f;
            line-height: 1.6;
        }

        .summary-panel .summary-list,
        .timeline-panel .timeline-list {
            max-width: 760px;
        }

        .system-note {
            display: grid;
            grid-template-columns: 42px 1fr auto;
            align-items: center;
            gap: 1rem;
            min-width: 0;
            max-width: 560px;
            padding: .9rem 1.1rem;
            border: 1px solid #f0d68f;
            border-radius: 10px;
            background: #fff8e7;
        }

        .system-note i {
            color: #b66a00;
            font-size: 1.45rem;
        }

        .system-note h3,
        .message h3 {
            margin: 0 0 .25rem;
            font-size: .95rem;
            font-weight: 950;
        }

        .system-note p,
        .message p {
            margin: 0;
            color: #111;
        }

        .time {
            align-self: end;
            color: #34426f;
            font-size: .85rem;
            white-space: nowrap;
        }

        .message-row {
            display: flex;
            align-items: flex-start;
            gap: .75rem;
            min-width: 0;
        }

        .message-row.sent {
            justify-content: flex-end;
        }

        .sender-icon {
            display: grid;
            place-items: center;
            width: 46px;
            height: 46px;
            border-radius: 50%;
            color: var(--green-dark);
            background: #e9f5e9;
            font-size: 1.35rem;
            flex: 0 0 auto;
        }

        .message {
            display: grid;
            grid-template-columns: 1fr auto;
            gap: .45rem 1rem;
            min-width: 0;
            max-width: 520px;
            padding: 1rem 1.15rem;
            border: 1px solid var(--line);
            border-radius: 16px;
            background: #fff;
            box-shadow: 0 8px 20px rgba(24, 39, 75, .04);
        }

        .message h3,
        .message p {
            grid-column: 1;
            min-width: 0;
            overflow-wrap: anywhere;
        }

        .message .time {
            grid-column: 2;
            grid-row: 2;
        }

        .message.sent {
            border-color: #bfe8c9;
            background: #e9f5e9;
        }

        .sent-check {
            color: var(--green-dark);
            font-size: 1.05rem;
        }

        .composer {
            min-width: 0;
            padding: 1rem 1.4rem 1.4rem;
            border-top: 1px solid var(--line);
        }

        .composer-bar {
            display: grid;
            grid-template-columns: 1fr auto auto;
            align-items: center;
            gap: .75rem;
            min-width: 0;
        }

        .composer input {
            height: 52px;
            padding: 0 1.25rem;
            border: 1px solid #cfd8ea;
            border-radius: 999px;
            outline: none;
        }

        .icon-btn {
            display: grid;
            place-items: center;
            width: 44px;
            height: 44px;
            border: 0;
            color: #6370a6;
            background: transparent;
            font-size: 1.45rem;
        }

        .send-btn {
            display: grid;
            place-items: center;
            width: 58px;
            height: 58px;
            border: 0;
            border-radius: 50%;
            color: #fff;
            background: linear-gradient(180deg, #0aa13f, #006824);
            font-size: 1.45rem;
        }

        .composer-help {
            margin: .65rem 0 0 .4rem;
            color: #5365a1;
            font-size: .85rem;
        }

        .right-column {
            display: grid;
            gap: 1rem;
            align-content: start;
        }

        .section-card {
            padding: 1.35rem;
        }

        .section-card h2 {
            margin: 0 0 1.4rem;
            font-size: 1.1rem;
            font-weight: 950;
        }

        .summary-list {
            display: grid;
            gap: 1.15rem;
        }

        .summary-item {
            display: grid;
            grid-template-columns: 46px 1fr;
            gap: .85rem;
            align-items: center;
        }

        .summary-icon {
            display: grid;
            place-items: center;
            width: 46px;
            height: 46px;
            border-radius: 50%;
            color: #253f7e;
            background: #eef4ff;
            font-size: 1.35rem;
        }

        .summary-icon.red {
            color: var(--red);
            background: #fff0f0;
        }

        .summary-icon.green {
            color: var(--green);
            background: #e9f5e9;
        }

        .summary-item h3 {
            margin: 0 0 .25rem;
            font-size: .9rem;
            font-weight: 950;
        }

        .summary-item p {
            margin: 0;
            color: #34426f;
            line-height: 1.35;
        }

        .pill {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 30px;
            padding: .3rem .9rem;
            border-radius: 999px;
            font-weight: 900;
            font-size: .9rem;
        }

        .pill-warn {
            color: #7b4200;
            background: #fff1d2;
        }

        .pill-green {
            color: var(--green-dark);
            background: #dff8e7;
        }

        .actions {
            display: grid;
            gap: .75rem;
            margin-top: 1.4rem;
            padding-top: 1rem;
            border-top: 1px solid var(--line);
        }

        .btn-main,
        .btn-outline-main,
        .btn-soft {
            min-height: 44px;
            border-radius: 8px;
            font-weight: 900;
        }

        .btn-main {
            border: 0;
            color: #fff;
            background: linear-gradient(180deg, #0aa13f, #006824);
        }

        .btn-outline-main {
            border: 1px solid #9ed9af;
            color: var(--green-dark);
            background: #fff;
        }

        .action-note {
            margin: -.25rem 0 0;
            color: #5365a1;
            text-align: center;
            font-size: .85rem;
        }

        .timeline-list {
            position: relative;
            display: grid;
            gap: 1rem;
            padding-left: .15rem;
        }

        .timeline-list::before {
            content: "";
            position: absolute;
            left: 16px;
            top: 20px;
            bottom: 24px;
            width: 3px;
            background: #d6e1ef;
        }

        .timeline-item {
            position: relative;
            display: grid;
            grid-template-columns: 34px 1fr auto;
            align-items: center;
            gap: .9rem;
        }

        .timeline-dot {
            position: relative;
            z-index: 1;
            display: grid;
            place-items: center;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            color: #fff;
            background: var(--green);
            font-size: .9rem;
        }

        .timeline-dot.current {
            background: var(--blue);
        }

        .timeline-item h3 {
            margin: 0;
            font-size: .9rem;
            font-weight: 950;
        }

        .timeline-item p {
            margin: 0;
            color: #34426f;
            font-size: .85rem;
            white-space: nowrap;
        }

        .secure-note {
            display: grid;
            grid-template-columns: 42px 1fr auto;
            align-items: center;
            gap: 1rem;
            margin-top: 1rem;
            padding: 1rem 1.35rem;
            border-color: #bfe8c9;
            background: #f3fff7;
        }

        .secure-note i {
            color: var(--green);
            font-size: 1.8rem;
        }

        .secure-note h2 {
            margin: 0 0 .25rem;
            color: var(--green-dark);
            font-size: 1rem;
            font-weight: 950;
        }

        .secure-note p {
            margin: 0;
            color: #34426f;
        }

        @media (max-width: 1500px) {
            .content-grid {
                grid-template-columns: 1fr;
            }

            .right-column {
                grid-template-columns: repeat(2, minmax(0, 1fr));
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

            .patient-mini {
                padding: 0 .25rem;
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
                padding: 1rem;
            }

            .topbar,
            .consult-card-head,
            .secure-note {
                grid-template-columns: 1fr;
            }

            .topbar {
                gap: 1rem;
            }

            .top-actions {
                justify-content: space-between;
            }

            .consult-shell {
                grid-template-rows: auto minmax(360px, auto) auto;
                min-height: auto;
            }

            .consult-card-head {
                display: none;
            }

            .tabs {
                min-height: 54px;
                padding-inline: 1.25rem;
            }

            .chat-stream,
            .details-panel,
            .summary-panel,
            .timeline-panel {
                gap: 1.2rem;
                padding: 1.25rem;
                overflow: visible;
            }

            .details-grid {
                grid-template-columns: 1fr;
            }

            .system-note {
                max-width: 100%;
            }

            .message {
                max-width: min(100%, 620px);
            }

            .sender-icon {
                width: 40px;
                height: 40px;
                font-size: 1.15rem;
            }

            .right-column {
                display: none;
            }

            .mobile-tab {
                display: grid;
            }

            .composer-bar {
                grid-template-columns: 1fr auto;
            }

            .composer-bar .icon-btn {
                display: none;
            }
        }

        @media (max-width: 620px) {
            .sidebar {
                padding: 1rem;
            }

            .brand {
                align-items: flex-start;
            }

            .brand img {
                width: 48px;
                height: 48px;
            }

            .brand strong {
                font-size: 1.08rem;
            }

            .nav-list {
                grid-template-columns: 1fr;
                gap: .35rem;
            }

            .nav-link {
                min-height: 48px;
                padding: .65rem .85rem;
            }

            .page-title h1 {
                font-size: 1.8rem;
            }

            .page-title p {
                font-size: .95rem;
            }

            .profile-dot {
                display: none;
            }

            .search-box input {
                height: 46px;
            }

            .consult-id {
                font-size: 1.25rem;
                overflow-wrap: anywhere;
            }

            .status-pill {
                width: 100%;
            }

            .meta-item {
                align-items: flex-start;
                font-size: .92rem;
            }

            .tabs {
                display: grid;
                grid-template-columns: repeat(5, minmax(0, 1fr));
                gap: .4rem;
                padding-inline: .8rem;
            }

            .tab {
                min-width: 0;
                width: 100%;
                padding-inline: .25rem;
            }

            .system-note,
            .message,
            .timeline-item {
                grid-template-columns: 1fr;
            }

            .timeline-list {
                padding-left: 0;
            }

            .timeline-list::before {
                left: 11px;
                top: 18px;
                bottom: 18px;
            }

            .timeline-item {
                grid-template-columns: 28px minmax(0, 1fr) auto;
                align-items: center;
                gap: .7rem;
            }

            .timeline-dot {
                width: 24px;
                height: 24px;
            }

            .system-note {
                gap: .55rem;
                padding: .85rem;
            }

            .system-note i {
                display: none;
            }

            .message-row {
                gap: .5rem;
            }

            .message-row.sent {
                padding-left: 1.2rem;
            }

            .message-row:not(.sent) {
                padding-right: 1.2rem;
            }

            .sender-icon {
                display: none;
            }

            .message {
                padding: .85rem;
                border-radius: 14px;
            }

            .system-note .time,
            .message .time {
                grid-column: 1;
            }

            .timeline-item p {
                grid-column: 3;
                white-space: nowrap;
            }

            .composer {
                padding: .85rem;
            }

            .composer-bar {
                gap: .55rem;
            }

            .composer input {
                height: 48px;
                min-width: 0;
            }

            .send-btn {
                width: 48px;
                height: 48px;
            }

            .composer-help {
                margin-left: 0;
                font-size: .78rem;
            }

            .summary-item,
            .secure-note {
                grid-template-columns: 1fr;
            }

            .summary-icon,
            .secure-note i {
                display: none;
            }

            .section-card {
                padding: 1rem;
            }
        }

        @media (max-width: 420px) {
            .main {
                padding: .65rem;
            }

            .chat-stream {
                padding: .9rem;
            }

            .details-panel,
            .summary-panel,
            .timeline-panel {
                padding: .9rem;
            }

            .tabs {
                padding-inline: .65rem;
                gap: .25rem;
            }

            .tab {
                font-size: .8rem;
            }

            .message-row.sent,
            .message-row:not(.sent) {
                padding-inline: 0;
            }

            .timeline-item {
                grid-template-columns: 28px minmax(0, 1fr);
                align-items: start;
                gap: .45rem .65rem;
            }

            .timeline-item p {
                grid-column: 2;
                white-space: normal;
            }
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
                    <li><a class="nav-link" href="newconsultation.php"><i class="bi bi-patch-plus"></i> New Consultation</a></li>
                    <li><a class="nav-link active" href="myconsultation.php"><i class="bi bi-chat-dots"></i> My Consultation</a></li>
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
                    <h1>My Consultation</h1>
                    <p>Here is your active consultation. You have only one consultation at a time.</p>
                </div>

                <label class="search-box" aria-label="Search consultations">
                    <input type="search" placeholder="Search consultation...">
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

            <div class="content-grid">
                <div>
                    <section class="panel consult-shell">
                        <div class="consult-card-head">
                            <div>
                                <h2 class="consult-id">CONS-2025-000123</h2>
                                <div class="head-meta">
                                    <span class="meta-item urgent">
                                        <i class="bi bi-circle-fill"></i>
                                        Level 2 - Urgent
                                    </span>
                                    <span class="meta-item">
                                        <i class="bi bi-calendar2-week"></i>
                                        Started: May 16, 2025 • 10:32 AM
                                    </span>
                                </div>
                            </div>

                            <div>
                                <span class="status-pill">ONGOING</span>
                                <div class="meta-item mt-2">
                                    <i class="bi bi-hospital"></i>
                                    <strong>Dr. Maria Santos (Physician)</strong>
                                </div>
                            </div>

                            <button class="details-link" type="button" data-tab-jump="details">
                                View Details
                            </button>
                        </div>

                        <section class="chat-panel" aria-label="Consultation chat">
                            <div class="tabs" role="tablist" aria-label="Consultation sections">
                                <button class="tab active" type="button" role="tab" aria-selected="true" data-tab="chat">Chat</button>
                                <button class="tab" type="button" role="tab" aria-selected="false" data-tab="details">Details</button>
                                <button class="tab mobile-tab" type="button" role="tab" aria-selected="false" data-tab="summary">Summary</button>
                                <button class="tab mobile-tab" type="button" role="tab" aria-selected="false" data-tab="timeline">Timeline</button>
                            </div>

                            <div class="chat-stream tab-panel" data-tab-panel="chat">
                                <div class="system-note">
                                    <i class="bi bi-bell"></i>
                                    <div>
                                        <h3>System</h3>
                                        <p>Dr. Maria Santos has joined the consultation.</p>
                                    </div>
                                    <span class="time">10:35 AM</span>
                                </div>

                                <div class="message-row">
                                    <span class="sender-icon" aria-hidden="true"><i class="bi bi-hospital"></i></span>
                                    <div class="message">
                                        <h3>Dr. Maria Santos</h3>
                                        <p>Good morning, Jane. I've reviewed your symptoms.</p>
                                        <p>May I ask how long have you been experiencing this?</p>
                                        <span class="time">10:37 AM</span>
                                    </div>
                                </div>

                                <div class="message-row sent">
                                    <div class="message sent">
                                        <p>I started feeling this yesterday afternoon.</p>
                                        <span class="time">10:38 AM <i class="bi bi-check2-all sent-check ms-2"></i></span>
                                    </div>
                                </div>

                                <div class="message-row">
                                    <span class="sender-icon" aria-hidden="true"><i class="bi bi-hospital"></i></span>
                                    <div class="message">
                                        <h3>Dr. Maria Santos</h3>
                                        <p>Thank you. Please rest well and stay hydrated.</p>
                                        <p>I will prescribe a medication suitable for your case.</p>
                                        <span class="time">10:40 AM</span>
                                    </div>
                                </div>

                                <div class="system-note">
                                    <i class="bi bi-clipboard-check"></i>
                                    <div>
                                        <h3>System</h3>
                                        <p>Your consultation is now ongoing.</p>
                                    </div>
                                    <span class="time">10:40 AM</span>
                                </div>
                            </div>

                            <div class="details-panel tab-panel" data-tab-panel="details" hidden>
                                <div class="details-grid">
                                    <div class="detail-box full">
                                        <h3>Consultation Description</h3>
                                        <p>Jane Dela Cruz submitted a consultation request for headache, fever, sore throat, and body pain. Symptoms started yesterday afternoon and may require physician review for possible infection, hydration guidance, and medication advice.</p>
                                    </div>
                                    <div class="detail-box">
                                        <h3>Consultation ID</h3>
                                        <p>CONS-2025-000123</p>
                                    </div>
                                    <div class="detail-box">
                                        <h3>Priority Level</h3>
                                        <p>Level 2 - Urgent</p>
                                    </div>
                                    <div class="detail-box">
                                        <h3>Assigned Physician</h3>
                                        <p>Dr. Maria Santos (Physician)</p>
                                    </div>
                                    <div class="detail-box">
                                        <h3>Started</h3>
                                        <p>May 16, 2025 • 10:32 AM</p>
                                    </div>
                                </div>
                            </div>

                            <div class="summary-panel tab-panel" data-tab-panel="summary" hidden>
                                <h2 class="mb-4">Consultation Summary</h2>
                                <div class="summary-list">
                                    <div class="summary-item">
                                        <span class="summary-icon"><i class="bi bi-capsule"></i></span>
                                        <div>
                                            <h3>Symptoms Submitted</h3>
                                            <p>Headache, Fever, Sore throat, Body pain</p>
                                        </div>
                                    </div>
                                    <div class="summary-item">
                                        <span class="summary-icon red"><i class="bi bi-exclamation-triangle"></i></span>
                                        <div>
                                            <h3>Triage Result</h3>
                                            <span class="pill pill-warn">Level 2 - Urgent</span>
                                        </div>
                                    </div>
                                    <div class="summary-item">
                                        <span class="summary-icon"><i class="bi bi-hospital"></i></span>
                                        <div>
                                            <h3>Assigned To</h3>
                                            <p>Dr. Maria Santos (Physician)</p>
                                        </div>
                                    </div>
                                    <div class="summary-item">
                                        <span class="summary-icon green"><i class="bi bi-clipboard2-pulse"></i></span>
                                        <div>
                                            <h3>Current Status</h3>
                                            <span class="pill pill-green">Ongoing Consultation</span>
                                        </div>
                                    </div>
                                    <div class="summary-item">
                                        <span class="summary-icon"><i class="bi bi-clock"></i></span>
                                        <div>
                                            <h3>Started</h3>
                                            <p>May 16, 2025 • 10:32 AM</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="timeline-panel tab-panel" data-tab-panel="timeline" hidden>
                                <h2 class="mb-4">Consultation Timeline</h2>
                                <div class="timeline-list">
                                    <div class="timeline-item">
                                        <span class="timeline-dot"><i class="bi bi-check"></i></span>
                                        <h3>Request Submitted</h3>
                                        <p>May 16, 10:32 AM</p>
                                    </div>
                                    <div class="timeline-item">
                                        <span class="timeline-dot"><i class="bi bi-check"></i></span>
                                        <h3>Triage Completed (Level 2 - Urgent)</h3>
                                        <p>May 16, 10:33 AM</p>
                                    </div>
                                    <div class="timeline-item">
                                        <span class="timeline-dot"><i class="bi bi-check"></i></span>
                                        <h3>Assigned to Dr. Maria Santos</h3>
                                        <p>May 16, 10:35 AM</p>
                                    </div>
                                    <div class="timeline-item">
                                        <span class="timeline-dot current"><i class="bi bi-dot"></i></span>
                                        <h3>Ongoing Consultation</h3>
                                        <p>May 16, 10:32 AM</p>
                                    </div>
                                </div>
                            </div>

                            <div class="composer">
                                <div class="composer-bar">
                                    <input type="text" placeholder="Type your message..." aria-label="Type your message">
                                    <button class="icon-btn" type="button" aria-label="Emoji"><i class="bi bi-emoji-smile"></i></button>
                                    <button class="send-btn" type="button" aria-label="Send message"><i class="bi bi-send-fill"></i></button>
                                </div>
                                <p class="composer-help">You can send messages while the consultation is active.</p>
                            </div>
                        </section>
                    </section>

                    <section class="panel secure-note">
                        <i class="bi bi-shield-check"></i>
                        <div>
                            <h2>This is a secure and private consultation.</h2>
                            <p>Please do not share your account or personal information.</p>
                        </div>
                        <a class="btn btn-outline-main" href="#">Learn more</a>
                    </section>
                </div>

                <aside class="right-column">
                    <section class="panel section-card">
                        <h2>Consultation Summary</h2>

                        <div class="summary-list">
                            <div class="summary-item">
                                <span class="summary-icon"><i class="bi bi-capsule"></i></span>
                                <div>
                                    <h3>Symptoms Submitted</h3>
                                    <p>Headache, Fever, Sore throat, Body pain</p>
                                </div>
                            </div>
                            <div class="summary-item">
                                <span class="summary-icon red"><i class="bi bi-exclamation-triangle"></i></span>
                                <div>
                                    <h3>Triage Result</h3>
                                    <span class="pill pill-warn">Level 2 - Urgent</span>
                                </div>
                            </div>
                            <div class="summary-item">
                                <span class="summary-icon"><i class="bi bi-hospital"></i></span>
                                <div>
                                    <h3>Assigned To</h3>
                                    <p>Dr. Maria Santos (Physician)</p>
                                </div>
                            </div>
                            <div class="summary-item">
                                <span class="summary-icon green"><i class="bi bi-clipboard2-pulse"></i></span>
                                <div>
                                    <h3>Current Status</h3>
                                    <span class="pill pill-green">Ongoing Consultation</span>
                                </div>
                            </div>
                            <div class="summary-item">
                                <span class="summary-icon"><i class="bi bi-clock"></i></span>
                                <div>
                                    <h3>Started</h3>
                                    <p>May 16, 2025 • 10:32 AM</p>
                                </div>
                            </div>
                        </div>

                        <div class="actions">
                            <h3 class="m-0 fs-6 fw-bold">Actions</h3>
                            <button class="btn btn-outline-main" type="button"><i class="bi bi-arrow-clockwise me-2"></i>Reopen Consultation</button>
                            <p class="action-note">Available within 7 days after completion</p>
                        </div>
                    </section>

                    <section class="panel section-card">
                        <h2>Consultation Timeline</h2>

                        <div class="timeline-list">
                            <div class="timeline-item">
                                <span class="timeline-dot"><i class="bi bi-check"></i></span>
                                <h3>Request Submitted</h3>
                                <p>May 16, 10:32 AM</p>
                            </div>
                            <div class="timeline-item">
                                <span class="timeline-dot"><i class="bi bi-check"></i></span>
                                <h3>Triage Completed (Level 2 - Urgent)</h3>
                                <p>May 16, 10:33 AM</p>
                            </div>
                            <div class="timeline-item">
                                <span class="timeline-dot"><i class="bi bi-check"></i></span>
                                <h3>Assigned to Dr. Maria Santos</h3>
                                <p>May 16, 10:35 AM</p>
                            </div>
                            <div class="timeline-item">
                                <span class="timeline-dot current"><i class="bi bi-dot"></i></span>
                                <h3>Ongoing Consultation</h3>
                                <p>May 16, 10:32 AM</p>
                            </div>
                        </div>
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

        document.addEventListener("keydown", (event) => {
            if (event.key === "Escape") {
                setSidebar(false);
            }
        });

        const consultationTabs = document.querySelectorAll(".tab[data-tab]");
        const consultationPanels = document.querySelectorAll(".tab-panel[data-tab-panel]");
        const composer = document.querySelector(".composer");
        const detailJump = document.querySelector("[data-tab-jump='details']");

        const activateConsultationTab = (tab) => {
                const selectedTab = tab.dataset.tab;

                consultationTabs.forEach((item) => {
                    const isActive = item === tab;
                    item.classList.toggle("active", isActive);
                    item.setAttribute("aria-selected", String(isActive));
                });

                consultationPanels.forEach((panel) => {
                    panel.hidden = panel.dataset.tabPanel !== selectedTab;
                });

                composer.hidden = selectedTab !== "chat";
        };

        consultationTabs.forEach((tab) => {
            tab.addEventListener("click", () => activateConsultationTab(tab));
        });

        detailJump.addEventListener("click", () => {
            activateConsultationTab(document.querySelector(".tab[data-tab='details']"));
        });
    </script>
</body>
</html>
