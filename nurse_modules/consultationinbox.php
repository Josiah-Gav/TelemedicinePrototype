<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Consultation Inbox | CLSU Infirmary Telemedicine System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        :root {
            --ink: #071438;
            --muted: #4e5b86;
            --green: #087d32;
            --green-dark: #006824;
            --line: #e1e7ef;
            --page: #fbfcfa;
            --blue: #2578e7;
            --orange: #ff8a00;
            --purple: #087d32;
            --red: #f52222;
            --shadow: 0 12px 30px rgba(24, 39, 75, .07);
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
            grid-template-columns: 300px minmax(0, 1fr);
            min-height: 100vh;
            transition: grid-template-columns .2s ease;
        }

        .sidebar {
            position: sticky;
            top: 0;
            height: 100vh;
            padding: 1.55rem 1.25rem;
            background: #fff;
            border-right: 1px solid var(--line);
            box-shadow: 8px 0 28px rgba(24, 39, 75, .04);
            overflow-y: auto;
            transition: padding .2s ease;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: .85rem;
            margin-bottom: 2.35rem;
        }

        .brand img {
            width: 62px;
            height: 62px;
            border-radius: 50%;
            object-fit: cover;
        }

        .brand strong {
            display: block;
            font-size: 1.36rem;
            font-weight: 950;
            line-height: 1.05;
        }

        .brand span {
            color: #111;
            font-size: 1rem;
            font-weight: 800;
        }

        .nurse-mini {
            display: grid;
            grid-template-columns: 64px minmax(0, 1fr);
            align-items: center;
            gap: .9rem;
            margin-bottom: 2rem;
        }

        .avatar,
        .mini-avatar {
            display: grid;
            place-items: center;
            border-radius: 50%;
            color: #fff;
            background: linear-gradient(145deg, #f0b08f, #39415d);
            overflow: hidden;
        }

        .avatar {
            width: 64px;
            height: 64px;
            border: 1px solid #d7e0eb;
            font-size: 1.65rem;
        }

        .avatar.female,
        .mini-avatar.female {
            background: linear-gradient(145deg, #f3b79b, #253055);
        }

        .mini-avatar {
            width: 42px;
            height: 42px;
            font-size: 1rem;
        }

        .nurse-mini h2 {
            margin: 0 0 .18rem;
            font-size: 1rem;
            font-weight: 950;
        }

        .nurse-mini p {
            margin: 0 0 .25rem;
            color: var(--muted);
            font-size: .9rem;
        }

        .online {
            display: inline-flex;
            align-items: center;
            gap: .38rem;
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

        .nav-list {
            display: grid;
            gap: .52rem;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .nav-link {
            position: relative;
            display: flex;
            align-items: center;
            gap: 1rem;
            min-height: 54px;
            padding: .75rem .95rem;
            border-radius: 10px;
            color: #1d293f;
            font-weight: 850;
        }

        .nav-link i {
            width: 28px;
            color: #5d697d;
            font-size: 1.35rem;
        }

        .nav-link.active {
            color: var(--green-dark);
            background: linear-gradient(90deg, #e7f4e6, #f5faf3);
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
            background: var(--green);
            font-size: .78rem;
            font-weight: 950;
        }

        .shift-card {
            margin: 1.9rem 0 1.25rem;
            padding: 1rem;
            border: 1px solid #cfe8d8;
            border-radius: 10px;
            background: linear-gradient(135deg, #f5fff8, #eaf7ef);
        }

        .shift-card header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: .75rem;
            color: var(--green-dark);
            font-weight: 950;
        }

        .shift-status {
            display: flex;
            align-items: center;
            gap: .65rem;
            margin-bottom: .55rem;
            color: var(--green-dark);
            font-weight: 850;
        }

        .shift-status::before {
            content: "";
            width: 9px;
            height: 9px;
            border-radius: 50%;
            background: #34c76b;
        }

        .shift-card p {
            margin: .35rem 0 0 1.55rem;
            color: #26335f;
            font-size: .9rem;
        }

        .logout-link {
            margin-top: 6.5rem;
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
        body.sidebar-collapsed .nurse-mini > div:last-child,
        body.sidebar-collapsed .shift-card,
        body.sidebar-collapsed .sidebar-collapse span {
            display: none;
        }

        body.sidebar-collapsed .brand img,
        body.sidebar-collapsed .avatar {
            width: 48px;
            height: 48px;
        }

        body.sidebar-collapsed .nurse-mini {
            grid-template-columns: 1fr;
            justify-items: center;
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

        body.sidebar-collapsed .logout-link {
            margin-top: 2rem;
        }

        .main {
            min-width: 0;
            padding: 1.4rem 1.65rem 1.15rem;
        }

        .topbar {
            display: grid;
            grid-template-columns: minmax(300px, 1fr) minmax(360px, 470px) auto auto;
            align-items: start;
            gap: 1.3rem;
            margin-bottom: 1.45rem;
        }

        .page-title h1 {
            margin: 0 0 .7rem;
            font-size: clamp(1.8rem, 2.4vw, 2.45rem);
            font-weight: 950;
            letter-spacing: 0;
        }

        .page-title p {
            display: flex;
            align-items: center;
            gap: .4rem;
            margin: 0;
            color: #34426f;
            font-size: .98rem;
        }

        .search-box {
            position: relative;
            margin-top: .12rem;
        }

        .search-box input {
            width: 100%;
            height: 52px;
            padding: 0 3.2rem;
            border: 1px solid #cfd8ea;
            border-radius: 10px;
            color: var(--ink);
            background: #fff;
            outline: none;
            box-shadow: 0 8px 20px rgba(24, 39, 75, .04);
        }

        .search-box i {
            position: absolute;
            top: 50%;
            color: #6370a6;
            font-size: 1.4rem;
            transform: translateY(-50%);
        }

        .search-box .left {
            left: 1rem;
        }

        .search-box .right {
            right: 1rem;
        }

        .bell {
            position: relative;
            display: grid;
            place-items: center;
            width: 46px;
            height: 50px;
            border: 0;
            color: #172447;
            background: transparent;
            font-size: 1.72rem;
        }

        .bell span {
            position: absolute;
            top: 0;
            right: .08rem;
            display: grid;
            place-items: center;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            color: #fff;
            background: var(--green);
            font-size: .78rem;
            font-weight: 950;
        }

        .date-box {
            min-width: 140px;
            padding-top: .35rem;
            text-align: right;
        }

        .date-box strong {
            display: block;
            color: #111;
            font-weight: 950;
        }

        .date-box span {
            color: #34426f;
            font-size: .93rem;
        }

        .page-grid {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 290px;
            gap: 1rem;
            align-items: start;
        }

        .panel {
            border: 1px solid var(--line);
            border-radius: 10px;
            background: #fff;
            box-shadow: var(--shadow);
        }

        .inbox-panel {
            overflow: hidden;
        }

        .tabs {
            display: flex;
            align-items: center;
            gap: .25rem;
            padding: .8rem 1rem 0;
            border-bottom: 1px solid var(--line);
            overflow-x: auto;
        }

        .tab-btn {
            display: inline-flex;
            align-items: center;
            gap: .55rem;
            min-height: 48px;
            padding: 0 1rem;
            border: 0;
            border-bottom: 3px solid transparent;
            color: #071438;
            background: transparent;
            font-weight: 950;
            white-space: nowrap;
        }

        .tab-btn.active {
            color: var(--green-dark);
            border-bottom-color: var(--green);
        }

        .count-pill {
            display: grid;
            place-items: center;
            min-width: 20px;
            height: 20px;
            padding: 0 .35rem;
            border-radius: 999px;
            color: var(--green-dark);
            background: #e7f4e6;
            border: 1px solid #99ddb0;
            font-size: .72rem;
            font-weight: 950;
        }

        .toolbar {
            display: grid;
            grid-template-columns: repeat(4, minmax(145px, 1fr)) minmax(175px, auto) auto;
            gap: .9rem;
            padding: 1rem;
        }

        .select-like,
        .filter-btn {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: .75rem;
            min-height: 42px;
            padding: 0 .9rem;
            border: 1px solid #d7e0ee;
            border-radius: 7px;
            color: #13224a;
            background: #fff;
            font-size: .85rem;
            font-weight: 850;
        }

        .info-strip,
        .lock-strip {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            margin: 0 1rem 1rem;
            padding: .9rem 1rem;
            border: 1px solid #bae9c9;
            border-radius: 8px;
            background: linear-gradient(90deg, #f4fff7, #edfaf2);
        }

        .info-strip .left {
            display: grid;
            grid-template-columns: 34px minmax(0, 1fr);
            align-items: center;
            gap: .75rem;
        }

        .info-strip i,
        .lock-strip i {
            color: var(--green);
            font-size: 1.45rem;
        }

        .info-strip strong {
            display: block;
            color: var(--green-dark);
            font-size: 1rem;
            font-weight: 950;
        }

        .info-strip span,
        .lock-strip span {
            color: #34426f;
            font-size: .84rem;
        }

        .refresh {
            display: flex;
            align-items: center;
            gap: .75rem;
            color: var(--green-dark);
            font-size: .84rem;
            font-weight: 900;
            white-space: nowrap;
        }

        .switch {
            position: relative;
            width: 42px;
            height: 22px;
            border-radius: 999px;
            background: var(--green);
        }

        .switch::after {
            content: "";
            position: absolute;
            top: 3px;
            right: 3px;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            background: #fff;
        }

        .table-wrap {
            overflow-x: auto;
        }

        .inbox-table {
            width: 100%;
            min-width: 1050px;
            border-collapse: separate;
            border-spacing: 0;
        }

        .inbox-table th {
            padding: .75rem .8rem;
            color: var(--green-dark);
            background: linear-gradient(180deg, #f0fbf4, #e9f5e9);
            font-size: .76rem;
            font-weight: 950;
        }

        .inbox-table td {
            padding: .85rem .8rem;
            border-bottom: 1px solid #edf1f7;
            color: #142044;
            font-size: .82rem;
            vertical-align: middle;
        }

        .patient-cell {
            display: grid;
            grid-template-columns: 42px minmax(0, 1fr);
            align-items: center;
            gap: .7rem;
        }

        .patient-cell strong,
        .assignment strong {
            display: block;
            font-weight: 950;
        }

        .patient-cell span,
        .patient-id,
        .status-time {
            color: #38507d;
            font-size: .78rem;
        }

        .type-cell {
            display: grid;
            grid-template-columns: 24px minmax(0, 1fr);
            align-items: center;
            gap: .45rem;
        }

        .type-icon {
            display: grid;
            place-items: center;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            color: var(--green);
            background: #ddf8e7;
            font-size: .82rem;
        }

        .more-symptoms {
            display: block;
            margin-top: .28rem;
            color: var(--green);
            font-size: .78rem;
            font-weight: 850;
        }

        .urgency,
        .status-pill {
            display: inline-grid;
            place-items: center;
            min-width: 76px;
            padding: .28rem .55rem;
            border-radius: 6px;
            border: 1px solid;
            font-size: .72rem;
            font-weight: 950;
            line-height: 1.1;
            text-align: center;
        }

        .urgency small,
        .status-pill small {
            display: block;
            font-size: .64rem;
            font-weight: 950;
        }

        .emergency {
            color: var(--red);
            border-color: #ffb6b6;
            background: #fff2f1;
        }

        .urgent {
            color: #f06d00;
            border-color: #ffc98f;
            background: #fff4e8;
        }

        .moderate {
            color: #c87900;
            border-color: #ffd58b;
            background: #fff7e5;
        }

        .nonurgent {
            color: var(--blue);
            border-color: #b9d7ff;
            background: #eef6ff;
        }

        .pending {
            color: #e47200;
            border-color: #ffd4a0;
            background: #fff6eb;
        }

        .reviewing {
            color: #1d6fd6;
            border-color: #bfdbff;
            background: #eef6ff;
        }

        .accepted,
        .ongoing {
            color: var(--green-dark);
            border-color: #b7e6c6;
            background: #ebf9f0;
        }

        .escalated {
            color: #d72121;
            border-color: #ffc4c4;
            background: #fff2f1;
        }

        .completed {
            color: #147e37;
            border-color: #beecc9;
            background: #ebf9f0;
        }

        .cancelled {
            color: #4e5b86;
            border-color: #dce3ef;
            background: #f3f6fb;
        }

        .assignment {
            text-align: center;
            font-weight: 950;
        }

        .assignment.you {
            color: var(--green-dark);
        }

        .btn-action {
            min-width: 84px;
            min-height: 36px;
            border: 1px solid #36bd6b;
            border-radius: 7px;
            color: var(--green-dark);
            background: #fff;
            font-size: .82rem;
            font-weight: 950;
        }

        .btn-reject {
            min-width: 72px;
            min-height: 36px;
            border: 1px solid #ffaaa8;
            border-radius: 7px;
            color: var(--red);
            background: #fff6f5;
            font-size: .82rem;
            font-weight: 950;
        }

        .reject-modal {
            position: fixed;
            inset: 0;
            z-index: 1210;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 1.25rem;
            background: rgba(7, 20, 56, .62);
        }

        body.reject-modal-open {
            overflow: hidden;
        }

        body.reject-modal-open .reject-modal {
            display: flex;
        }

        .reject-dialog {
            width: min(520px, 100%);
            border: 1px solid #ffd0cf;
            border-radius: 14px;
            background: #fff;
            box-shadow: 0 30px 70px rgba(7, 20, 56, .28);
            overflow: hidden;
        }

        .reject-header,
        .reject-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            padding: 1.1rem 1.25rem;
        }

        .reject-header {
            border-bottom: 1px solid #f3dedd;
            background: #fff8f7;
        }

        .reject-title {
            display: grid;
            grid-template-columns: 46px minmax(0, 1fr);
            align-items: center;
            gap: .85rem;
        }

        .reject-title-icon {
            display: grid;
            place-items: center;
            width: 44px;
            height: 44px;
            border-radius: 50%;
            color: var(--red);
            background: #ffe2e1;
            font-size: 1.35rem;
        }

        .reject-title h2 {
            margin: 0 0 .2rem;
            font-size: 1.15rem;
            font-weight: 950;
        }

        .reject-title p {
            margin: 0;
            color: #4e5b86;
            font-size: .86rem;
        }

        .reject-close {
            display: grid;
            place-items: center;
            width: 38px;
            height: 38px;
            border: 1px solid #f0b7b6;
            border-radius: 50%;
            color: #071438;
            background: #fff;
            font-size: 1.05rem;
        }

        .reject-body {
            padding: 1.2rem 1.25rem;
        }

        .reject-body label {
            display: block;
            margin-bottom: .5rem;
            font-weight: 950;
        }

        .reject-body textarea {
            width: 100%;
            min-height: 140px;
            padding: .85rem;
            border: 1px solid #d7e0ee;
            border-radius: 8px;
            color: var(--ink);
            resize: vertical;
            outline: none;
        }

        .reject-body textarea:focus {
            border-color: #ffaaa8;
            box-shadow: 0 0 0 4px rgba(245, 34, 34, .08);
        }

        .reject-hint {
            display: flex;
            justify-content: space-between;
            gap: 1rem;
            margin-top: .45rem;
            color: #4e5b86;
            font-size: .78rem;
        }

        .reject-footer {
            border-top: 1px solid #edf1f7;
            background: #fff;
        }

        .reject-cancel,
        .reject-submit {
            min-height: 42px;
            padding: 0 1.15rem;
            border-radius: 7px;
            font-weight: 950;
        }

        .reject-cancel {
            border: 1px solid #b9c7df;
            color: #071438;
            background: #fff;
        }

        .reject-submit {
            border: 0;
            color: #fff;
            background: linear-gradient(180deg, #ff5a58, #d71919);
        }

        .row-actions {
            display: flex;
            align-items: center;
            gap: .55rem;
        }

        .more-btn {
            display: grid;
            place-items: center;
            width: 24px;
            height: 36px;
            border: 0;
            color: var(--green);
            background: transparent;
            font-size: 1.1rem;
        }

        .pagination-row {
            display: grid;
            grid-template-columns: 1fr auto 1fr;
            align-items: center;
            gap: 1rem;
            padding: 1rem;
            color: #34426f;
            font-size: .84rem;
        }

        .pager {
            display: flex;
            align-items: center;
            gap: .45rem;
        }

        .page-btn {
            display: grid;
            place-items: center;
            min-width: 34px;
            height: 34px;
            border: 1px solid #d7e0ee;
            border-radius: 7px;
            background: #fff;
            color: #13224a;
            font-weight: 900;
        }

        .page-btn.active {
            color: #fff;
            border-color: var(--green);
            background: var(--green);
        }

        .rows-select {
            justify-self: end;
            width: 74px;
        }

        .side-stack {
            display: grid;
            gap: .9rem;
        }

        .side-panel {
            padding: 1rem;
        }

        .side-title {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: .75rem;
            margin-bottom: .8rem;
        }

        .side-title h2 {
            margin: 0;
            font-size: .98rem;
            font-weight: 950;
        }

        .side-title a {
            color: var(--green-dark);
            font-size: .72rem;
            font-weight: 950;
        }

        .filter-group {
            display: grid;
            gap: .38rem;
            margin-bottom: .85rem;
        }

        .filter-group label {
            color: #172447;
            font-size: .74rem;
            font-weight: 950;
        }

        .filter-control {
            display: flex;
            align-items: center;
            justify-content: space-between;
            min-height: 34px;
            padding: 0 .75rem;
            border: 1px solid #d7e0ee;
            border-radius: 6px;
            color: #4e5b86;
            background: #fff;
            font-size: .78rem;
        }

        .apply-btn {
            width: 100%;
            min-height: 38px;
            border: 0;
            border-radius: 6px;
            color: #fff;
            background: linear-gradient(180deg, #10a447, #006824);
            font-weight: 950;
        }

        .legend-list {
            display: grid;
            gap: .55rem;
        }

        .legend-row {
            display: grid;
            grid-template-columns: 70px minmax(0, 1fr);
            align-items: center;
            gap: .65rem;
            color: #34426f;
            font-size: .72rem;
        }

        .legend-row .status-pill {
            min-width: 0;
            padding: .18rem .35rem;
            font-size: .62rem;
        }

        .assignment-list {
            display: grid;
            gap: .65rem;
        }

        .assignment-card {
            display: grid;
            grid-template-columns: 36px minmax(0, 1fr) auto;
            align-items: center;
            gap: .6rem;
            padding-bottom: .7rem;
            border-bottom: 1px solid #edf1f7;
        }

        .assignment-card:last-child {
            border-bottom: 0;
            padding-bottom: 0;
        }

        .assignment-card .mini-avatar {
            width: 36px;
            height: 36px;
        }

        .assignment-card strong {
            display: block;
            font-size: .78rem;
            font-weight: 950;
        }

        .assignment-card span {
            color: #38507d;
            font-size: .72rem;
        }

        .small-tag {
            padding: .2rem .45rem;
            border-radius: 5px;
            font-size: .62rem;
            font-weight: 950;
        }

        .help-card {
            display: grid;
            grid-template-columns: 54px minmax(0, 1fr) 20px;
            align-items: center;
            gap: .75rem;
            border-color: #cfe8d8;
            background: linear-gradient(135deg, #f5fff8, #ecf8f0);
        }

        .help-icon {
            display: grid;
            place-items: center;
            width: 52px;
            height: 52px;
            border-radius: 50%;
            color: var(--green);
            background: #d8f5e1;
            font-size: 1.8rem;
        }

        .help-card strong {
            display: block;
            color: var(--green-dark);
            font-size: .82rem;
            font-weight: 950;
        }

        .help-card span {
            color: #34426f;
            font-size: .72rem;
        }

        .review-modal {
            position: fixed;
            inset: 0;
            z-index: 1200;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 1.6rem;
            background: rgba(7, 20, 56, .62);
        }

        body.modal-open {
            overflow: hidden;
        }

        body.modal-open .review-modal {
            display: flex;
        }

        .review-dialog {
            width: min(1040px, 100%);
            max-height: min(92vh, 880px);
            overflow: hidden;
            border: 1px solid #cfd8ea;
            border-radius: 14px;
            background: #fff;
            box-shadow: 0 30px 70px rgba(7, 20, 56, .28);
        }

        .review-header,
        .review-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            padding: 1.25rem 1.45rem;
        }

        .review-header {
            border-bottom: 1px solid #edf1f7;
        }

        .review-title {
            display: grid;
            grid-template-columns: 54px minmax(0, 1fr);
            align-items: center;
            gap: .9rem;
        }

        .review-title-icon {
            display: grid;
            place-items: center;
            width: 52px;
            height: 52px;
            border-radius: 50%;
            color: #fff;
            background: linear-gradient(180deg, #35bf68, #078438);
            font-size: 1.65rem;
        }

        .review-title h2 {
            margin: 0 0 .2rem;
            font-size: 1.55rem;
            font-weight: 950;
        }

        .review-title p {
            margin: 0;
            color: #172447;
            font-size: .93rem;
        }

        .review-header-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .modal-status {
            display: inline-flex;
            align-items: center;
            gap: .45rem;
            min-height: 34px;
            padding: 0 .8rem;
            border: 1px solid #96d9ad;
            border-radius: 7px;
            color: var(--green-dark);
            background: #f2fff6;
            font-weight: 950;
        }

        .close-modal {
            display: grid;
            place-items: center;
            width: 44px;
            height: 44px;
            border: 1px solid #d7e0ee;
            border-radius: 50%;
            color: #071438;
            background: #fff;
            font-size: 1.35rem;
        }

        .review-body {
            max-height: calc(min(92vh, 880px) - 178px);
            overflow-y: auto;
            padding: 1.1rem 1.45rem;
        }

        .modal-tabs {
            display: flex;
            gap: .35rem;
            margin-bottom: 1rem;
            border-bottom: 1px solid #e1e7ef;
            overflow-x: auto;
        }

        .modal-tab {
            display: inline-flex;
            align-items: center;
            gap: .5rem;
            min-height: 42px;
            padding: 0 1rem;
            border: 0;
            border-bottom: 3px solid transparent;
            color: #4e5b86;
            background: transparent;
            font-weight: 950;
            white-space: nowrap;
        }

        .modal-tab.active {
            color: var(--green-dark);
            border-bottom-color: var(--green);
        }

        .modal-tab:disabled {
            color: #8a94ad;
            cursor: not-allowed;
            opacity: .72;
        }

        .modal-tab-panel {
            display: none;
        }

        .modal-tab-panel.active {
            display: block;
        }

        .review-grid {
            display: grid;
            grid-template-columns: minmax(330px, .95fr) minmax(420px, 1.3fr);
            gap: .9rem;
        }

        .review-card {
            border: 1px solid #cfe4dc;
            border-radius: 9px;
            background: #fff;
        }

        .patient-summary {
            display: grid;
            grid-template-columns: 82px minmax(0, 1fr);
            align-items: center;
            gap: 1rem;
            padding: 1rem;
            background: linear-gradient(135deg, #f8fffb, #f1fbf5);
        }

        .modal-avatar {
            display: grid;
            place-items: center;
            width: 82px;
            height: 82px;
            border-radius: 50%;
            color: #fff;
            background: linear-gradient(145deg, #f3b79b, #253055);
            font-size: 2rem;
        }

        .patient-summary h3 {
            margin: 0 0 .35rem;
            font-size: 1.25rem;
            font-weight: 950;
        }

        .patient-meta,
        .patient-date-row {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: .75rem;
            color: #172447;
            font-size: .92rem;
        }

        .patient-date-row {
            margin-top: .55rem;
            gap: 1.35rem;
        }

        .patient-date-row i,
        .info-panel i {
            color: var(--green-dark);
        }

        .info-panel {
            display: grid;
            gap: .8rem;
            padding: 1.3rem 1.6rem;
            background: linear-gradient(135deg, #fbfffd, #f4fbf7);
        }

        .info-line {
            display: flex;
            align-items: center;
            gap: .75rem;
            font-size: .98rem;
        }

        .modal-section {
            padding: 1rem;
        }

        .modal-section h3 {
            display: flex;
            align-items: center;
            gap: .55rem;
            margin: 0 0 .75rem;
            padding-bottom: .65rem;
            border-bottom: 1px solid #e8eef6;
            font-size: .98rem;
            font-weight: 950;
        }

        .modal-section h3 i {
            color: var(--green-dark);
        }

        .symptom-box {
            position: relative;
            min-height: 132px;
            padding: 1.1rem 7rem 1rem 1rem;
            border: 1px solid #a9e0ba;
            border-radius: 9px;
            background: #f8fffa;
            font-size: .94rem;
            line-height: 1.55;
        }

        .symptom-box strong {
            display: block;
            margin-top: .75rem;
            color: var(--green-dark);
        }

        .symptom-art {
            position: absolute;
            right: 1rem;
            bottom: .8rem;
            display: grid;
            place-items: center;
            width: 86px;
            height: 86px;
            border-radius: 50%;
            color: var(--green);
            background: #dcf5e5;
            font-size: 3rem;
        }

        .detail-list {
            display: grid;
            gap: .75rem;
        }

        .symptoms-details {
            margin-top: 1rem;
            padding-top: .9rem;
            border-top: 1px solid #e8eef6;
        }

        .detail-row {
            display: grid;
            grid-template-columns: 34px 1fr minmax(120px, 1fr);
            align-items: center;
            gap: .6rem;
            font-size: .88rem;
        }

        .detail-row i {
            display: grid;
            place-items: center;
            width: 30px;
            height: 30px;
            border-radius: 7px;
            color: var(--green);
            background: #e4f8eb;
        }

        .detail-row strong {
            font-weight: 950;
        }

        .triage-options {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: .6rem;
        }

        .triage-card {
            position: relative;
            display: grid;
            place-items: center;
            min-height: 110px;
            padding: .8rem .45rem;
            border: 1px solid;
            border-radius: 8px;
            text-align: center;
            font-size: .83rem;
            font-weight: 950;
        }

        .triage-card i {
            margin-bottom: .35rem;
            font-size: 1.8rem;
        }

        .triage-card::after {
            content: "";
            position: absolute;
            bottom: -8px;
            left: 50%;
            width: 14px;
            height: 14px;
            border: 2px solid currentColor;
            border-radius: 50%;
            background: #fff;
            transform: translateX(-50%);
        }

        .triage-card.selected::after {
            box-shadow: inset 0 0 0 3px #fff;
            background: currentColor;
        }

        .selected-strip {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-top: 1.55rem;
            padding: .7rem 1rem;
            border: 1px solid #ffd8b8;
            border-radius: 7px;
            color: #ff4c00;
            background: #fff6ed;
            font-weight: 950;
        }

        .notes-action-grid {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 220px;
            gap: .9rem;
            margin-top: 1rem;
        }

        .notes-box {
            min-height: 124px;
            padding: .85rem;
            border: 1px solid #cfd8ea;
            border-radius: 8px;
            color: #172447;
            background: #fff;
            font-size: .9rem;
            line-height: 1.55;
        }

        .notes-count {
            display: block;
            color: #006824;
            text-align: right;
            font-size: .78rem;
        }

        .radio-list {
            display: grid;
            gap: .75rem;
            margin-top: .75rem;
            font-size: .9rem;
        }

        .radio-item {
            display: flex;
            align-items: center;
            gap: .65rem;
        }

        .radio {
            width: 16px;
            height: 16px;
            border: 2px solid #6b789b;
            border-radius: 50%;
        }

        .radio.checked {
            border-color: var(--green);
            box-shadow: inset 0 0 0 4px #fff;
            background: var(--green);
        }

        .escalate-card {
            display: grid;
            grid-template-columns: 56px minmax(0, 1fr) auto;
            align-items: center;
            gap: 1rem;
            margin-top: .8rem;
            padding: 1rem;
            border: 1px solid #cfe0ff;
            border-radius: 9px;
            background: #eef6ff;
        }

        .escalate-icon {
            display: grid;
            place-items: center;
            width: 54px;
            height: 54px;
            border-radius: 50%;
            color: #0b6ee8;
            background: #d8eaff;
            font-size: 1.8rem;
        }

        .escalate-card strong {
            display: block;
            color: #075bd2;
            font-weight: 950;
        }

        .escalate-card span {
            color: #21436f;
            font-size: .76rem;
        }

        .history-grid {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 310px;
            gap: .9rem;
        }

        .history-list {
            display: grid;
            gap: .8rem;
        }

        .history-item {
            display: grid;
            grid-template-columns: 42px minmax(0, 1fr) auto;
            align-items: start;
            gap: .75rem;
            padding: .85rem;
            border: 1px solid #e2e9f4;
            border-radius: 8px;
            background: #fff;
        }

        .history-icon {
            display: grid;
            place-items: center;
            width: 38px;
            height: 38px;
            border-radius: 9px;
            color: var(--green);
            background: #e4f8eb;
            font-size: 1.15rem;
        }

        .history-item h4 {
            margin: 0 0 .25rem;
            font-size: .9rem;
            font-weight: 950;
        }

        .history-item p {
            margin: 0;
            color: #34426f;
            font-size: .82rem;
            line-height: 1.45;
        }

        .history-date {
            color: #4e5b86;
            font-size: .76rem;
            font-weight: 850;
            text-align: right;
            white-space: nowrap;
        }

        .history-summary {
            display: grid;
            gap: .7rem;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            gap: 1rem;
            padding-bottom: .6rem;
            border-bottom: 1px solid #edf1f7;
            color: #34426f;
            font-size: .84rem;
        }

        .summary-row:last-child {
            padding-bottom: 0;
            border-bottom: 0;
        }

        .summary-row strong {
            color: #071438;
            text-align: right;
        }

        .modal-btn {
            min-height: 44px;
            padding: 0 1.2rem;
            border-radius: 7px;
            font-weight: 950;
        }

        .modal-btn.outline {
            border: 1px solid #b9c7df;
            color: #071438;
            background: #fff;
        }

        .modal-btn.blue {
            border: 0;
            color: #fff;
            background: linear-gradient(180deg, #2f86ff, #0d62d9);
        }

        .modal-btn.message {
            min-width: 290px;
            border: 1px solid #9ec4ff;
            color: #075bd2;
            background: #f8fbff;
        }

        .modal-btn.save {
            min-width: 280px;
            border: 0;
            color: #fff;
            background: linear-gradient(180deg, #10a447, #006824);
        }

        .menu-toggle,
        .sidebar-overlay {
            display: none;
        }

        @media (max-width: 1480px) {
            .page-grid {
                grid-template-columns: 1fr;
            }

            .side-stack {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }

            .filter-panel {
                grid-column: 1 / -1;
            }
        }

        @media (max-width: 1180px) {
            .app-shell {
                grid-template-columns: 1fr;
            }

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
                width: min(84vw, 310px);
                height: 100vh;
                transform: translateX(-100%);
                transition: transform .24s ease;
                box-shadow: 12px 0 36px rgba(7, 20, 56, .18);
            }

            body.sidebar-open .sidebar {
                transform: translateX(0);
            }

            .main {
                padding-top: 5rem;
            }
        }

        @media (max-width: 900px) {
            .main {
                padding-inline: 1rem;
            }

            .topbar,
            .toolbar,
            .side-stack {
                grid-template-columns: 1fr;
            }

            .date-box {
                text-align: left;
            }

            .info-strip,
            .lock-strip,
            .pagination-row {
                display: grid;
                grid-template-columns: 1fr;
            }

            .rows-select {
                justify-self: start;
            }

            .review-modal {
                padding: .75rem;
            }

            .review-header,
            .review-footer,
            .review-header-actions,
            .triage-options,
            .notes-action-grid,
            .escalate-card,
            .review-grid {
                grid-template-columns: 1fr;
            }

            .review-header,
            .review-footer,
            .review-header-actions {
                display: grid;
            }

            .history-grid,
            .history-item {
                grid-template-columns: 1fr;
            }

            .history-date {
                text-align: left;
            }

            .modal-btn.message,
            .modal-btn.save {
                min-width: 0;
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <button class="menu-toggle" type="button" aria-label="Open navigation" aria-controls="nurseSidebar" aria-expanded="false">
        <i class="bi bi-list"></i>
    </button>

    <div class="app-shell">
        <aside class="sidebar" id="nurseSidebar">
            <a class="brand" href="dashboard.php">
                <img src="../auth/assets/img/CLSU_Logo.jpg" alt="CLSU logo">
                <span>
                    <strong>CLSU Infirmary</strong>
                    Telemedicine System
                </span>
            </a>

            <div class="nurse-mini">
                <div class="avatar female" aria-hidden="true"><i class="bi bi-person-fill"></i></div>
                <div>
                    <h2>Nurse Ana Reyes</h2>
                    <p>Registered Nurse</p>
                    <span class="online">Online</span>
                </div>
            </div>

            <button class="sidebar-collapse" type="button" aria-label="Collapse sidebar" aria-expanded="true">
                <i class="bi bi-layout-sidebar-inset"></i>
                <span>Collapse</span>
            </button>

            <nav aria-label="Nurse navigation">
                <ul class="nav-list">
                    <li><a class="nav-link" href="dashboard.php"><i class="bi bi-house-door"></i> Dashboard</a></li>
                    <li><a class="nav-link active" href="consultationinbox.php"><i class="bi bi-inbox"></i> Consultation Inbox <span class="nav-badge">12</span></a></li>
                    <li><a class="nav-link" href="activeconsult.php"><i class="bi bi-chat-dots"></i> Active Consultations <span class="nav-badge">3</span></a></li>
                    <li><a class="nav-link" href="followup.php"><i class="bi bi-calendar2-check"></i> Follow-up Requests <span class="nav-badge">8</span></a></li>
                    <li><a class="nav-link" href="patientdirect.php"><i class="bi bi-people"></i> Patient Directory</a></li>
                    <li><a class="nav-link" href="consulthistory.php"><i class="bi bi-clock-history"></i> Consultation History</a></li>
                    <li><a class="nav-link" href="notif.php"><i class="bi bi-bell"></i> Notifications <span class="nav-badge">4</span></a></li>
                    <li><a class="nav-link" href="profile.php"><i class="bi bi-person-badge"></i> Profile</a></li>
                </ul>
            </nav>

            <a class="nav-link logout-link" href="../auth/index.php"><i class="bi bi-box-arrow-right"></i> Logout</a>
        </aside>

        <main class="main">
            <header class="topbar">
                <div class="page-title">
                    <h1>Consultation Inbox</h1>
                    <p>Review, claim and manage incoming consultation requests. <i class="bi bi-info-circle"></i></p>
                </div>

                <label class="search-box" aria-label="Search patient requests">
                    <i class="bi bi-search left"></i>
                    <input type="search" placeholder="Search patient name, ID, or symptoms...">
                    <i class="bi bi-search right"></i>
                </label>

                <button class="bell" type="button" aria-label="Notifications">
                    <i class="bi bi-bell"></i>
                    <span>4</span>
                </button>

                <div class="date-box" aria-label="Current date and time">
                    <strong>May 16, 2025</strong>
                    <span>Friday, 10:36 AM</span>
                </div>
            </header>

            <div class="page-grid">
                <section class="panel inbox-panel" aria-labelledby="inbox-title">
                    <h2 class="visually-hidden" id="inbox-title">Consultation request list</h2>
                    <div class="tabs" role="tablist" aria-label="Request status tabs">
                        <button class="tab-btn active" type="button">All Requests <span class="count-pill">12</span></button>
                        <button class="tab-btn" type="button">Pending <span class="count-pill">6</span></button>
                        <button class="tab-btn" type="button">Under Review <span class="count-pill">3</span></button>
                        <button class="tab-btn" type="button">Accepted <span class="count-pill">2</span></button>
                        <button class="tab-btn" type="button">Escalated <span class="count-pill">1</span></button>
                        <button class="tab-btn" type="button">Ongoing <span class="count-pill">3</span></button>
                        <button class="tab-btn" type="button">Completed <span class="count-pill">15</span></button>
                    </div>

                    <div class="toolbar">
                        <button class="select-like" type="button">All Types <i class="bi bi-chevron-down"></i></button>
                        <button class="select-like" type="button">All Urgency <i class="bi bi-chevron-down"></i></button>
                        <button class="select-like" type="button">All Assigned <i class="bi bi-chevron-down"></i></button>
                        <button class="select-like" type="button"><span><i class="bi bi-person me-2"></i>Select Date</span><i class="bi bi-calendar2"></i></button>
                        <button class="select-like" type="button">Sort by: Newest First <i class="bi bi-chevron-down"></i></button>
                        <button class="filter-btn" type="button"><i class="bi bi-funnel"></i> Filter</button>
                    </div>

                    <div class="info-strip">
                        <div class="left">
                            <i class="bi bi-people"></i>
                            <div><strong>Multiple nurses online: 3</strong><span>You can see all requests. Claim a request to start reviewing.</span></div>
                        </div>
                        <div class="refresh">
                            <span><i class="bi bi-arrow-clockwise"></i> Auto-refresh is ON<br><small>Updated just now</small></span>
                            <span class="switch" aria-hidden="true"></span>
                        </div>
                    </div>

                    <div class="table-wrap">
                        <table class="inbox-table">
                            <thead>
                                <tr>
                                    <th>Patient</th>
                                    <th>Type</th>
                                    <th>Symptoms (Summary)</th>
                                    <th>Urgency</th>
                                    <th>Assigned Nurse</th>
                                    <th>Status</th>
                                    <th>Submitted</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="patient-cell">
                                            <span class="mini-avatar female"><i class="bi bi-person-fill"></i></span>
                                            <div><strong>Maria Dela Cruz</strong><span>BSIT - 3A</span><div class="patient-id">ID: 2025-00123</div></div>
                                        </div>
                                    </td>
                                    <td><div class="type-cell"><span class="type-icon"><i class="bi bi-chat-dots"></i></span><span>General<br>Consultation</span></div></td>
                                    <td>Headache, sore throat,<br>cough, mild fever<span class="more-symptoms">+2 more</span></td>
                                    <td><span class="urgency emergency">Level 1<small>Emergency</small></span></td>
                                    <td><div class="assignment you">You<br><span>(Nurse Ana Reyes)</span></div></td>
                                    <td><span class="status-pill reviewing">Under Review</span><div class="status-time">10:20 AM</div></td>
                                    <td>10:20 AM<br>May 16, 2025</td>
                                    <td><div class="row-actions"><button class="btn-action" type="button" data-open-review>Continue</button><button class="btn-reject" type="button" data-open-reject>Reject</button><button class="more-btn" type="button" aria-label="More actions"><i class="bi bi-three-dots-vertical"></i></button></div></td>
                                </tr>
                                <tr>
                                    <td><div class="patient-cell"><span class="mini-avatar"><i class="bi bi-person-fill"></i></span><div><strong>John Miguel Santos</strong><span>BSA - 2B</span><div class="patient-id">ID: 2025-00122</div></div></div></td>
                                    <td><div class="type-cell"><span class="type-icon"><i class="bi bi-chat-dots"></i></span><span>General<br>Consultation</span></div></td>
                                    <td>Fever, body pain,<br>fatigue<span class="more-symptoms">+1 more</span></td>
                                    <td><span class="urgency urgent">Level 2<small>Urgent</small></span></td>
                                    <td><div class="assignment">Nurse Mark<br>Dela Cruz</div></td>
                                    <td><span class="status-pill reviewing">Under Review</span><div class="status-time">10:15 AM</div></td>
                                    <td>10:15 AM<br>May 16, 2025</td>
                                    <td><div class="row-actions"><button class="btn-action" type="button">View</button><button class="btn-reject" type="button" data-open-reject>Reject</button><button class="more-btn" type="button" aria-label="More actions"><i class="bi bi-three-dots-vertical"></i></button></div></td>
                                </tr>
                                <tr>
                                    <td><div class="patient-cell"><span class="mini-avatar female"><i class="bi bi-person-fill"></i></span><div><strong>Kyla Marie Ramos</strong><span>BSN - 1A</span><div class="patient-id">ID: 2025-00121</div></div></div></td>
                                    <td><div class="type-cell"><span class="type-icon"><i class="bi bi-chat-dots"></i></span><span>General<br>Consultation</span></div></td>
                                    <td>Dizziness, mild fever,<br>body weakness<span class="more-symptoms">+1 more</span></td>
                                    <td><span class="urgency moderate">Level 3<small>Moderate</small></span></td>
                                    <td><div class="assignment">Unassigned</div></td>
                                    <td><span class="status-pill pending">Pending</span></td>
                                    <td>10:05 AM<br>May 16, 2025</td>
                                    <td><div class="row-actions"><button class="btn-action" type="button">Claim</button><button class="btn-reject" type="button" data-open-reject>Reject</button><button class="more-btn" type="button" aria-label="More actions"><i class="bi bi-three-dots-vertical"></i></button></div></td>
                                </tr>
                                <tr>
                                    <td><div class="patient-cell"><span class="mini-avatar"><i class="bi bi-person-fill"></i></span><div><strong>Mark Joseph Lim</strong><span>BSCE - 4A</span><div class="patient-id">ID: 2025-00120</div></div></div></td>
                                    <td><div class="type-cell"><span class="type-icon"><i class="bi bi-chat-dots"></i></span><span>General<br>Consultation</span></div></td>
                                    <td>Stomach pain,<br>nausea</td>
                                    <td><span class="urgency nonurgent">Level 4<small>Non-urgent</small></span></td>
                                    <td><div class="assignment">Unassigned</div></td>
                                    <td><span class="status-pill pending">Pending</span></td>
                                    <td>09:58 AM<br>May 16, 2025</td>
                                    <td><div class="row-actions"><button class="btn-action" type="button">Claim</button><button class="btn-reject" type="button" data-open-reject>Reject</button><button class="more-btn" type="button" aria-label="More actions"><i class="bi bi-three-dots-vertical"></i></button></div></td>
                                </tr>
                                <tr>
                                    <td><div class="patient-cell"><span class="mini-avatar female"><i class="bi bi-person-fill"></i></span><div><strong>Ella Mae Garcia</strong><span>BSA - 3A</span><div class="patient-id">ID: 2025-00119</div></div></div></td>
                                    <td><div class="type-cell"><span class="type-icon"><i class="bi bi-chat-dots"></i></span><span>General<br>Consultation</span></div></td>
                                    <td>Allergy, skin irritation,<br>red rashes</td>
                                    <td><span class="urgency nonurgent">Level 4<small>Non-urgent</small></span></td>
                                    <td><div class="assignment">Nurse Joy<br>Castillo</div></td>
                                    <td><span class="status-pill reviewing">Under Review</span><div class="status-time">09:45 AM</div></td>
                                    <td>09:45 AM<br>May 16, 2025</td>
                                    <td><div class="row-actions"><button class="btn-action" type="button">View</button><button class="btn-reject" type="button" data-open-reject>Reject</button><button class="more-btn" type="button" aria-label="More actions"><i class="bi bi-three-dots-vertical"></i></button></div></td>
                                </tr>
                                <tr>
                                    <td><div class="patient-cell"><span class="mini-avatar"><i class="bi bi-person-fill"></i></span><div><strong>Reymart Padilla</strong><span>BSME - 2A</span><div class="patient-id">ID: 2025-00118</div></div></div></td>
                                    <td><div class="type-cell"><span class="type-icon"><i class="bi bi-chat-dots"></i></span><span>General<br>Consultation</span></div></td>
                                    <td>Severe stomach pain,<br>vomiting</td>
                                    <td><span class="urgency urgent">Level 2<small>Urgent</small></span></td>
                                    <td><div class="assignment you">You<br><span>(Nurse Ana Reyes)</span></div></td>
                                    <td><span class="status-pill ongoing">Ongoing</span><div class="status-time">09:35 AM</div></td>
                                    <td>09:35 AM<br>May 16, 2025</td>
                                    <td><div class="row-actions"><button class="btn-action" type="button">Open</button><button class="more-btn" type="button" aria-label="More actions"><i class="bi bi-three-dots-vertical"></i></button></div></td>
                                </tr>
                                <tr>
                                    <td><div class="patient-cell"><span class="mini-avatar female"><i class="bi bi-person-fill"></i></span><div><strong>Sofia Bernal</strong><span>BSED - 1B</span><div class="patient-id">ID: 2025-00117</div></div></div></td>
                                    <td><div class="type-cell"><span class="type-icon"><i class="bi bi-chat-dots"></i></span><span>General<br>Consultation</span></div></td>
                                    <td>Cough, colds,<br>sore throat</td>
                                    <td><span class="urgency nonurgent">Level 4<small>Non-urgent</small></span></td>
                                    <td><div class="assignment">Unassigned</div></td>
                                    <td><span class="status-pill pending">Pending</span></td>
                                    <td>09:30 AM<br>May 16, 2025</td>
                                    <td><div class="row-actions"><button class="btn-action" type="button">Claim</button><button class="btn-reject" type="button" data-open-reject>Reject</button><button class="more-btn" type="button" aria-label="More actions"><i class="bi bi-three-dots-vertical"></i></button></div></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="pagination-row">
                        <span>Showing 1 to 7 of 12 requests</span>
                        <div class="pager">
                            <button class="page-btn" type="button"><i class="bi bi-chevron-double-left"></i></button>
                            <button class="page-btn active" type="button">1</button>
                            <button class="page-btn" type="button">2</button>
                            <button class="page-btn" type="button"><i class="bi bi-chevron-double-right"></i></button>
                        </div>
                        <button class="select-like rows-select" type="button">10 <i class="bi bi-chevron-down"></i></button>
                    </div>
                </section>

                <aside class="side-stack">
                    <section class="panel side-panel filter-panel" aria-labelledby="filters-title">
                        <div class="side-title">
                            <h2 id="filters-title">Filters</h2>
                            <a href="#">Clear all</a>
                        </div>
                        <div class="filter-group"><label>Search patient or ID</label><div class="filter-control">Type name or ID... <i class="bi bi-search"></i></div></div>
                        <div class="filter-group"><label>Consultation Type</label><div class="filter-control">All Types <i class="bi bi-chevron-down"></i></div></div>
                        <div class="filter-group"><label>Urgency Level</label><div class="filter-control">All Levels <i class="bi bi-chevron-down"></i></div></div>
                        <div class="filter-group"><label>Assigned Nurse</label><div class="filter-control">All <i class="bi bi-chevron-down"></i></div></div>
                        <div class="filter-group"><label>Status</label><div class="filter-control">All Statuses <i class="bi bi-chevron-down"></i></div></div>
                        <div class="filter-group"><label>Date Range</label><div class="filter-control"><span><i class="bi bi-calendar2 me-2"></i>May 16, 2025 - May 16, 2025</span></div></div>
                        <button class="apply-btn" type="button">Apply Filters</button>
                    </section>

                    <section class="panel side-panel" aria-labelledby="legend-title">
                        <div class="side-title"><h2 id="legend-title">Status Legend</h2></div>
                        <div class="legend-list">
                            <div class="legend-row"><span class="status-pill pending">Pending</span><span>Waiting to be claimed</span></div>
                            <div class="legend-row"><span class="status-pill reviewing">Under Review</span><span>Being reviewed by a nurse</span></div>
                            <div class="legend-row"><span class="status-pill accepted">Accepted</span><span>Nurse accepted the request</span></div>
                            <div class="legend-row"><span class="status-pill ongoing">Ongoing</span><span>Consultation is in progress</span></div>
                            <div class="legend-row"><span class="status-pill escalated">Escalated</span><span>Escalated to physician</span></div>
                            <div class="legend-row"><span class="status-pill completed">Completed</span><span>Consultation completed</span></div>
                            <div class="legend-row"><span class="status-pill cancelled">Cancelled</span><span>Request was cancelled</span></div>
                        </div>
                    </section>

                    <section class="panel side-panel" aria-labelledby="assignments-title">
                        <div class="side-title">
                            <h2 id="assignments-title">Active Assignments (You)</h2>
                            <a href="#">View All</a>
                        </div>
                        <div class="assignment-list">
                            <div class="assignment-card">
                                <span class="mini-avatar female"><i class="bi bi-person-fill"></i></span>
                                <div><strong>Maria Dela Cruz</strong><span>BSIT - 3A<br>10:20 AM</span></div>
                                <span class="small-tag reviewing">Under Review</span>
                            </div>
                            <div class="assignment-card">
                                <span class="mini-avatar"><i class="bi bi-person-fill"></i></span>
                                <div><strong>Reymart Padilla</strong><span>BSME - 2A</span></div>
                                <span class="small-tag ongoing">Ongoing</span>
                            </div>
                        </div>
                    </section>

                    <section class="panel side-panel help-card" aria-label="Need help">
                        <span class="help-icon"><i class="bi bi-headset"></i></span>
                        <div><strong>Need help?</strong><span>Contact the support team for assistance.</span></div>
                        <i class="bi bi-chevron-right text-success"></i>
                    </section>
                </aside>
            </div>

            <div class="lock-strip">
                <span><i class="bi bi-info-circle me-2"></i>Only one nurse can handle a request at a time. Click "Claim" to assign the request to yourself.</span>
                <span><i class="bi bi-lock me-2"></i>Request locked once claimed.</span>
            </div>
        </main>
    </div>

    <div class="reject-modal" role="dialog" aria-modal="true" aria-labelledby="reject-modal-title">
        <div class="reject-dialog">
            <header class="reject-header">
                <div class="reject-title">
                    <span class="reject-title-icon"><i class="bi bi-x-octagon"></i></span>
                    <div>
                        <h2 id="reject-modal-title">Reject Consultation Request</h2>
                        <p>Please add a clear explanation before rejecting this request.</p>
                    </div>
                </div>
                <button class="reject-close" type="button" aria-label="Close reject modal" data-close-reject><i class="bi bi-x-lg"></i></button>
            </header>

            <div class="reject-body">
                <label for="rejectReason">Reason for rejection</label>
                <textarea id="rejectReason" placeholder="Example: Patient submitted duplicate request, incomplete details, or request should be redirected to another service."></textarea>
                <div class="reject-hint">
                    <span>This explanation will be visible in the request record.</span>
                    <span>Required</span>
                </div>
            </div>

            <footer class="reject-footer">
                <button class="reject-cancel" type="button" data-close-reject>Cancel</button>
                <button class="reject-submit" type="button"><i class="bi bi-x-circle me-2"></i>Reject Request</button>
            </footer>
        </div>
    </div>

    <div class="review-modal" role="dialog" aria-modal="true" aria-labelledby="review-modal-title">
        <div class="review-dialog">
            <header class="review-header">
                <div class="review-title">
                    <span class="review-title-icon"><i class="bi bi-clipboard2-pulse"></i></span>
                    <div>
                        <h2 id="review-modal-title">Review Consultation Request</h2>
                        <p>Review the patient's concern and determine the appropriate action.</p>
                    </div>
                </div>
                <div class="review-header-actions">
                    <span class="modal-status"><i class="bi bi-shield-check"></i> Under Review</span>
                    <button class="close-modal" type="button" aria-label="Close review modal" data-close-review><i class="bi bi-x-lg"></i></button>
                </div>
            </header>

            <div class="review-body">
                <div class="modal-tabs" role="tablist" aria-label="Review details">
                    <button class="modal-tab active" type="button" role="tab" aria-selected="true" aria-controls="summary-panel" data-modal-tab="summary"><i class="bi bi-file-medical"></i> Summary</button>
                    <button class="modal-tab" type="button" role="tab" aria-selected="false" aria-controls="questionnaire-panel" disabled><i class="bi bi-ui-checks"></i> Questionnaire</button>
                    <button class="modal-tab" type="button" role="tab" aria-selected="false" aria-controls="history-panel" disabled><i class="bi bi-clock-history"></i> History</button>
                </div>

                <div class="modal-tab-panel active" id="summary-panel" role="tabpanel" data-modal-panel="summary">
                    <div class="review-grid">
                        <section class="review-card patient-summary" aria-label="Patient summary">
                            <span class="modal-avatar"><i class="bi bi-person-fill"></i></span>
                            <div>
                                <h3>Maria Dela Cruz</h3>
                                <div class="patient-meta"><span>BSIT - 3A</span><span>&bull;</span><span>ID: 2025-00123</span></div>
                                <div class="patient-date-row"><span><i class="bi bi-calendar2-week me-2"></i>May 16, 2025</span><span><i class="bi bi-clock me-2"></i>10:20 AM</span></div>
                            </div>
                        </section>

                        <section class="review-card info-panel" aria-label="Patient information">
                            <div class="info-line"><i class="bi bi-person"></i><strong>Age:</strong><span>20</span></div>
                            <div class="info-line"><i class="bi bi-gender-female"></i><strong>Gender:</strong><span>Female</span></div>
                        </section>

                        <section class="review-card modal-section">
                            <h3><i class="bi bi-clipboard2-pulse"></i> Symptoms Summary &amp; Additional Information</h3>
                            <div class="symptom-box">
                                Headache, sore throat, cough, mild fever
                                <strong>+2 more</strong>
                                <span class="symptom-art"><i class="bi bi-file-earmark-medical"></i></span>
                            </div>
                            <div class="detail-list symptoms-details">
                                <div class="detail-row"><i class="bi bi-clock"></i><strong>Duration</strong><span>2 days</span></div>
                                <div class="detail-row"><i class="bi bi-thermometer-half"></i><strong>Temperature</strong><span>37.8 C (mild fever)</span></div>
                                <div class="detail-row"><i class="bi bi-bar-chart-line"></i><strong>Severity</strong><span>Emergency</span></div>
                                <div class="detail-row"><i class="bi bi-capsule"></i><strong>Has taken medication</strong><span>Paracetamol</span></div>
                                <div class="detail-row"><i class="bi bi-shield-plus"></i><strong>Allergies</strong><span>None reported</span></div>
                            </div>
                        </section>

                        <section class="review-card modal-section">
                            <h3><i class="bi bi-exclamation-triangle"></i> Urgency / Triage Level</h3>
                            <div class="triage-options">
                                <div class="triage-card emergency selected"><i class="bi bi-alarm"></i><span>Level 1<br>Emergency</span></div>
                                <div class="triage-card urgent"><i class="bi bi-exclamation-triangle"></i><span>Level 2<br>Urgent</span></div>
                                <div class="triage-card moderate"><i class="bi bi-person"></i><span>Level 3<br>Moderate</span></div>
                                <div class="triage-card nonurgent"><i class="bi bi-shield-check"></i><span>Level 4<br>Non-urgent</span></div>
                            </div>
                            <div class="selected-strip"><i class="bi bi-exclamation-triangle"></i><span>Selected:</span><span>Level 1 - Emergency</span></div>

                            <div class="notes-action-grid">
                                <div>
                                    <h3><i class="bi bi-journal-text"></i> Reason / Notes <span class="fw-normal">(Optional)</span></h3>
                                    <div class="notes-box">
                                        Patient reported headache, sore throat, cough, and mild fever. Emergency triage selected based on the submitted request.
                                        <span class="notes-count">87/250</span>
                                    </div>
                                </div>
                                <div>
                                    <h3>Recommended Action</h3>
                                    <div class="radio-list">
                                        <label class="radio-item"><span class="radio"></span> Provide advice / education</label>
                                        <label class="radio-item"><span class="radio"></span> Monitor and follow-up</label>
                                        <label class="radio-item"><span class="radio checked"></span> Refer to Physician</label>
                                        <label class="radio-item"><span class="radio"></span> Other</label>
                                    </div>
                                </div>
                            </div>

                            <div class="escalate-card">
                                <span class="escalate-icon"><i class="bi bi-stethoscope"></i></span>
                                <div><strong>Escalate to Physician</strong><span>Escalating will forward this request to an available physician for further evaluation.</span></div>
                                <button class="modal-btn blue" type="button">Escalate to Physician <i class="bi bi-chevron-right ms-2"></i></button>
                            </div>
                        </section>
                    </div>
                </div>
            </div>

            <footer class="review-footer">
                <button class="modal-btn outline" type="button" data-close-review>Cancel</button>
                <button class="modal-btn message" type="button"><i class="bi bi-chat-dots me-2"></i>Send Message to Patient</button>
                <button class="modal-btn save" type="button"><i class="bi bi-check-lg me-2"></i>Save Review</button>
            </footer>
        </div>
    </div>

    <div class="sidebar-overlay" data-close-sidebar></div>

    <script>
        const menuToggle = document.querySelector(".menu-toggle");
        const sidebarCollapse = document.querySelector(".sidebar-collapse");
        const sidebarOverlay = document.querySelector(".sidebar-overlay");
        const sidebarLinks = document.querySelectorAll(".sidebar .nav-link, .sidebar .brand");
        const reviewModal = document.querySelector(".review-modal");
        const reviewTriggers = document.querySelectorAll("[data-open-review]");
        const reviewClosers = document.querySelectorAll("[data-close-review]");
        const rejectModal = document.querySelector(".reject-modal");
        const rejectTriggers = document.querySelectorAll("[data-open-reject]");
        const rejectClosers = document.querySelectorAll("[data-close-reject]");
        const rejectReason = document.querySelector("#rejectReason");
        const modalTabs = document.querySelectorAll("[data-modal-tab]");
        const modalPanels = document.querySelectorAll("[data-modal-panel]");

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

        const setReviewModal = (isOpen) => {
            document.body.classList.toggle("modal-open", isOpen);
        };

        reviewTriggers.forEach((button) => {
            button.addEventListener("click", () => setReviewModal(true));
        });

        reviewClosers.forEach((button) => {
            button.addEventListener("click", () => setReviewModal(false));
        });

        reviewModal.addEventListener("click", (event) => {
            if (event.target === reviewModal) {
                setReviewModal(false);
            }
        });

        const setRejectModal = (isOpen) => {
            document.body.classList.toggle("reject-modal-open", isOpen);
            if (isOpen) {
                rejectReason.value = "";
                rejectReason.focus();
            }
        };

        rejectTriggers.forEach((button) => {
            button.addEventListener("click", () => setRejectModal(true));
        });

        rejectClosers.forEach((button) => {
            button.addEventListener("click", () => setRejectModal(false));
        });

        rejectModal.addEventListener("click", (event) => {
            if (event.target === rejectModal) {
                setRejectModal(false);
            }
        });

        modalTabs.forEach((tabButton) => {
            tabButton.addEventListener("click", () => {
                if (tabButton.disabled) {
                    return;
                }

                const target = tabButton.dataset.modalTab;

                modalTabs.forEach((button) => {
                    const isActive = button === tabButton;
                    button.classList.toggle("active", isActive);
                    button.setAttribute("aria-selected", String(isActive));
                });

                modalPanels.forEach((panel) => {
                    panel.classList.toggle("active", panel.dataset.modalPanel === target);
                });
            });
        });

        document.addEventListener("keydown", (event) => {
            if (event.key === "Escape") {
                setSidebar(false);
                setReviewModal(false);
                setRejectModal(false);
            }
        });
    </script>
</body>
</html>
