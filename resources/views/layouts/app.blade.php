
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'MOTÉRA') | Motorcycle Care</title>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --sage: #A8BFAE;
            --sage-dark: #536F5B;
            --sage-light: #E8F0E6;
            --cream: #FAF9F5;
            --white: #FFFFFF;
            --lavender: #ECE7F4;
            --pink: #F3E1E4;
            --yellow: #F7EAC5;
            --ink: #34443A;
            --muted: #929B92;
            --line: #ECEDE7;
            --shadow: 0 8px 28px rgba(67, 85, 68, .055);
        }

        * {
            box-sizing: border-box;
        }

        html {
            min-height: 100%;
            overflow-y: auto;
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            min-height: 100vh;
            background: var(--cream);
            color: var(--ink);
            font-family: 'DM Sans', sans-serif;
            overflow-x: hidden;
        }

        /* SIDEBAR */

        .sidebar {
            width: 260px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: #F1F3EB;
            padding: 28px 19px 20px;
            border-right: 1px solid var(--line);
            display: flex;
            flex-direction: column;
            z-index: 100;
            overflow-y: auto;
            overflow-x: hidden;
            scrollbar-width: thin;
            scrollbar-color: #C8D4C6 transparent;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 5px 9px;
            margin-bottom: 38px;
            flex-shrink: 0;
        }

        .brand-icon {
            width: 48px;
            height: 48px;
            flex-shrink: 0;
            background: var(--sage-dark);
            color: white;
            border-radius: 16px;
            display: grid;
            place-items: center;
            font-size: 23px;
            box-shadow: 0 5px 13px rgba(83,111,91,.18);
        }

        .brand-name {
            font-family: 'Playfair Display', serif;
            font-size: 26px;
            font-weight: 800;
            letter-spacing: 1px;
        }

        .brand small {
            display: block;
            font-size: 9px;
            color: var(--muted);
            letter-spacing: 1.8px;
            margin-top: 2px;
        }

        .nav-label {
            font-size: 10px;
            font-weight: 800;
            color: #A0A89F;
            letter-spacing: 1.6px;
            padding: 0 12px;
            margin: 18px 0 11px;
        }

        .nav-link {
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 13px;
            color: #69786C;
            padding: 13px 14px;
            border-radius: 13px;
            margin-bottom: 6px;
            font-size: 13px;
            font-weight: 600;
            transition: .25s ease;
            flex-shrink: 0;
        }

        .nav-link i {
            font-size: 18px;
        }

        .nav-link:hover,
        .nav-link.active {
            background: #DDE8DC;
            color: var(--sage-dark);
            transform: translateX(3px);
        }

        .nav-link.active {
            font-weight: 800;
            box-shadow: inset 3px 0 0 var(--sage-dark);
        }

        .sidebar-note {
            margin-top: auto;
            padding: 20px;
            border-radius: 19px;
            background: linear-gradient(140deg, #E8E2F1, #F3E7E8);
            font-size: 12px;
            line-height: 1.8;
            flex-shrink: 0;
        }

        .sidebar-note i {
            font-size: 24px;
            color: #81739B;
        }

        .sidebar-note p {
            margin-bottom: 0;
            color: #777181;
        }

        /* MAIN CONTENT */

        .main {
            margin-left: 260px;
            min-height: 100vh;
            padding: 32px 42px 55px;
            min-width: 0;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 35px;
            gap: 15px;
        }

        .topbar small {
            color: var(--muted);
            font-size: 12px;
        }

        .topbar h2 {
            margin: 5px 0 0;
            font-size: 23px;
            font-weight: 800;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 9px 14px;
            background: white;
            border: 1px solid var(--line);
            border-radius: 15px;
            box-shadow: var(--shadow);
        }

        .avatar {
            width: 42px;
            height: 42px;
            border-radius: 14px;
            display: grid;
            place-items: center;
            background: var(--pink);
            color: #8D6670;
            font-size: 19px;
        }

        .content {
            max-width: 1500px;
            width: 100%;
            min-width: 0;
        }

        /* WELCOME */

        .welcome {
            padding: 36px 38px;
            border-radius: 25px;
            background: linear-gradient(110deg, #E3EDE0, #F0EAF3);
            position: relative;
            overflow: hidden;
            margin-bottom: 32px;
            box-shadow: var(--shadow);
            border: 1px solid rgba(255,255,255,.7);
        }

        .welcome h1 {
            font-family: 'Playfair Display', serif;
            font-size: 34px;
            margin: 0 0 12px;
        }

        .welcome p {
            font-size: 13px;
            color: #667568;
            margin: 0;
            line-height: 1.8;
        }

        .welcome-decoration {
            position: absolute;
            right: 55px;
            top: 10px;
            font-size: 110px;
            opacity: .14;
            transform: rotate(-15deg);
        }

        /* SECTION */

        .section-title {
            font-size: 17px;
            font-weight: 800;
            margin: 30px 0 17px;
        }

        .stat-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 18px;
        }

        .stat-card {
            padding: 24px;
            background: white;
            border: 1px solid var(--line);
            border-radius: 20px;
            box-shadow: var(--shadow);
            transition: .25s ease;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 13px 30px rgba(67,85,68,.09);
        }

        .stat-icon {
            width: 45px;
            height: 45px;
            border-radius: 14px;
            display: grid;
            place-items: center;
            font-size: 20px;
            margin-bottom: 20px;
        }

        .stat-card h3 {
            font-size: 29px;
            margin: 0 0 6px;
            font-weight: 800;
        }

        .stat-card p {
            font-size: 12px;
            color: var(--muted);
            margin: 0;
        }

        /* PANEL */

        .panel {
            background: white;
            padding: 26px;
            border: 1px solid var(--line);
            border-radius: 21px;
            margin-top: 24px;
            box-shadow: var(--shadow);
            min-width: 0;
        }

        /* BUTTON */

        .btn-primary {
            background: var(--sage-dark);
            border: none;
            color: white;
            padding: 12px 19px;
            border-radius: 12px;
            text-decoration: none;
            font-size: 12px;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: .2s;
        }

        .btn-primary:hover {
            background: #405C48;
            color: white;
            transform: translateY(-2px);
        }

        /* TABLE */

        .table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }

        .table th {
            background: #F3F5EF;
            color: #718074;
            text-align: left;
            padding: 15px;
            white-space: nowrap;
        }

        .table td {
            padding: 16px 15px;
            border-bottom: 1px solid var(--line);
            vertical-align: middle;
        }

        .table tbody tr:hover {
            background: #FAFBF8;
        }

        /* FORM */

        .form-control,
        .form-select {
            width: 100%;
            padding: 13px 15px;
            border: 1px solid #E2E7DF;
            border-radius: 12px;
            background: #FEFEFC;
            font-family: inherit;
            font-size: 13px;
            color: var(--ink);
            transition: .2s;
        }

        .form-control:focus,
        .form-select:focus {
            outline: none;
            border-color: var(--sage);
            box-shadow: 0 0 0 4px rgba(168,191,174,.17);
        }

        .form-label {
            display: block;
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 9px;
        }

        .form-group {
            margin-bottom: 21px;
        }

        /* ALERT */

        .alert {
            padding: 15px 18px;
            border-radius: 13px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        .alert-success {
            background: #E4F1E5;
            color: #416448;
        }

        .alert-danger {
            background: #F8E4E4;
            color: #9A4D4D;
        }

        .empty {
            text-align: center;
            padding: 45px;
            color: var(--muted);
        }

        /* RESPONSIVE */

        @media(max-width: 1150px) {
            .main {
                padding: 28px 25px 45px;
            }

            .stat-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media(max-width: 800px) {
            .sidebar {
                width: 100%;
                height: auto;
                max-height: none;
                position: relative;
                overflow: visible;
                padding: 18px;
            }

            .brand {
                margin-bottom: 15px;
            }

            .sidebar-note {
                display: none;
            }

            .main {
                margin-left: 0;
                padding: 22px 17px 40px;
            }

            .topbar {
                margin-bottom: 24px;
            }

            .welcome {
                padding: 25px;
            }

            .welcome h1 {
                font-size: 27px;
            }

            .welcome-decoration {
                display: none;
            }
        }

        @media(max-width: 500px) {
            .stat-grid {
                grid-template-columns: 1fr 1fr;
                gap: 10px;
            }

            .stat-card {
                padding: 16px;
            }

            .stat-card h3 {
                font-size: 23px;
            }

            .topbar h2 {
                font-size: 18px;
            }

            .profile {
                padding: 7px;
            }

            .profile strong,
            .profile small {
                display: none;
            }

            .panel {
                padding: 16px;
                overflow-x: auto;
            }
        }
    
    
/* =====================================
   MOTERA - CUSTOMER PAGE REDESIGN
===================================== */

.customer-hero {
    background: linear-gradient(115deg, #E1EDE1, #EDE7F3, #F6E8E9);
    padding: 32px 38px;
    border-radius: 24px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
    position: relative;
    overflow: hidden;
}

.customer-hero h1 {
    font-family: 'Playfair Display', serif;
    font-size: 29px;
    margin: 12px 0 8px;
}

.customer-hero p {
    color: #718075;
    font-size: 13px;
    max-width: 550px;
    line-height: 1.8;
}

.customer-hero-icon {
    width: 85px;
    height: 85px;
    border-radius: 27px;
    background: rgba(255,255,255,.55);
    display: grid;
    place-items: center;
    font-size: 42px;
    color: #657D68;
}

.customer-form-layout {
    display: grid;
    grid-template-columns: 250px minmax(0, 1fr);
    gap: 20px;
    align-items: stretch;
}

.customer-side-info {
    background: #E8EDE4;
    border-radius: 22px;
    padding: 27px 22px;
    position: relative;
    overflow: hidden;
    min-height: 400px;
}

.side-icon {
    width: 52px;
    height: 52px;
    background: white;
    color: #637D68;
    border-radius: 17px;
    display: grid;
    place-items: center;
    font-size: 24px;
    margin-bottom: 24px;
}

.customer-side-info h3 {
    font-family: 'Playfair Display', serif;
    font-size: 21px;
}

.customer-side-info > p {
    font-size: 12px;
    line-height: 1.9;
    color: #718075;
}

.form-step {
    display: flex;
    gap: 12px;
    align-items: center;
    margin-top: 28px;
}

.form-step > span {
    background: white;
    color: #647D69;
    padding: 10px;
    border-radius: 12px;
    font-size: 12px;
    font-weight: 800;
}

.form-step strong,
.form-step small {
    display: block;
}

.form-step strong {
    font-size: 11px;
}

.form-step small {
    color: #89958A;
    font-size: 10px;
    margin-top: 4px;
}

.side-decoration {
    position: absolute;
    bottom: -20px;
    right: 5px;
    font-size: 100px;
    color: #C5D3C3;
    opacity: .5;
}

.customer-form-card {
    background: white;
    border: 1px solid #ECEDE7;
    border-radius: 22px;
    padding: 30px;
    box-shadow: 0 8px 30px rgba(70, 90, 70, .045);
    min-width: 0;
}

.form-card-heading {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-bottom: 22px;
    border-bottom: 1px solid #EEF0EA;
    margin-bottom: 25px;
}

.form-card-heading h2 {
    font-size: 20px;
    margin: 13px 0 5px;
}

.form-card-heading p {
    color: #929B91;
    font-size: 12px;
}

.form-card-heading > i {
    font-size: 34px;
    color: #A8BFAE;
}

.soft-label {
    display: inline-block;
    background: #EAF0E7;
    color: #627C66;
    padding: 7px 11px;
    border-radius: 8px;
    font-size: 9px;
    font-weight: 800;
    letter-spacing: 1px;
}

.modern-form-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 22px 18px;
}

.modern-field label {
    display: block;
    font-size: 12px;
    font-weight: 700;
    margin-bottom: 9px;
    color: #48594C;
}

.modern-field label span {
    color: #D58D9A;
}

.input-icon-wrapper {
    display: flex;
    align-items: center;
    background: #F8F9F5;
    border: 1px solid #E8ECE4;
    border-radius: 13px;
    padding: 0 14px;
    transition: .2s;
}

.input-icon-wrapper:focus-within {
    border-color: #9CB69F;
    background: white;
    box-shadow: 0 0 0 4px rgba(168,191,174,.15);
}

.input-icon-wrapper > i {
    color: #91A493;
    font-size: 17px;
    flex-shrink: 0;
}


.input-icon-wrapper input,
.input-icon-wrapper textarea,
.input-icon-wrapper select {
    border: none;
    outline: none;
    background: transparent;
    width: 100%;
    min-width: 0;
    padding: 14px 11px;
    font-family: inherit;
    font-size: 12px;
    color: #46564A;
    cursor: pointer;
}

.input-icon-wrapper select {
    cursor: pointer;
}


.input-icon-wrapper input::placeholder,
.input-icon-wrapper textarea::placeholder {
    color: #B0B8AE;
}

.disabled-field {
    background: #F0F1ED;
}

.disabled-field input {
    color: #929A90;
}

.modern-field > small {
    display: block;
    color: #A0A99F;
    font-size: 10px;
    margin-top: 7px;
}

.full-field {
    grid-column: 1 / -1;
}

.textarea-wrapper {
    align-items: flex-start;
}

.textarea-wrapper > i {
    margin-top: 14px;
}

.input-icon-wrapper textarea {
    resize: vertical;
    min-height: 100px;
}

.modern-form-footer {
    display: flex;
    justify-content: flex-end;
    gap: 12px;
    border-top: 1px solid #EEF0EA;
    padding-top: 22px;
    margin-top: 28px;
}

.cancel-button,
.save-customer-button {
    padding: 12px 18px;
    border-radius: 12px;
    font-family: inherit;
    font-size: 12px;
    font-weight: 700;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 9px;
    cursor: pointer;
    transition: .2s;
}

.cancel-button {
    background: #F3F1F6;
    color: #81758F;
}

.cancel-button:hover {
    background: #E9E4F1;
}

.save-customer-button {
    border: none;
    background: #607B65;
    color: white;
}

.save-customer-button:hover {
    background: #49664F;
    transform: translateY(-2px);
}

@media(max-width: 900px) {
    .customer-form-layout {
        grid-template-columns: 1fr;
    }

    .customer-side-info {
        min-height: auto;
    }

    .side-decoration {
        display: none;
    }
}

@media(max-width: 600px) {
    .customer-hero {
        padding: 24px;
    }

    .customer-hero-icon {
        display: none;
    }

    .customer-form-card {
        padding: 20px;
    }

    .modern-form-grid {
        grid-template-columns: 1fr;
    }

    .full-field {
        grid-column: auto;
    }

    .modern-form-footer {
        flex-wrap: wrap;
    }
}


/* =================================
   MOTERA - DAFTAR SERVICE
================================= */

.service-summary {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 18px;
    margin-bottom: 25px;
}

.service-summary-card {
    display: flex;
    align-items: center;
    gap: 17px;
    padding: 22px;
    background: white;
    border: 1px solid #ECEDE7;
    border-radius: 19px;
    box-shadow: var(--shadow);
}

.service-summary-icon {
    width: 52px;
    height: 52px;
    display: grid;
    place-items: center;
    border-radius: 16px;
    background: #E5EEE3;
    color: #607B65;
    font-size: 23px;
}

.service-summary-icon.purple {
    background: #ECE7F4;
    color: #81739B;
}

.service-summary-card h3 {
    font-size: 25px;
    margin: 0 0 4px;
}

.service-summary-card p {
    font-size: 11px;
    color: #929B92;
    margin: 0;
}

.service-list-card {
    background: white;
    border: 1px solid #ECEDE7;
    border-radius: 22px;
    padding: 27px;
    margin-top: 23px;
    box-shadow: var(--shadow);
    min-width: 0;
}

.service-list-heading {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 15px;
    margin-bottom: 25px;
}

.service-list-heading h2 {
    font-family: 'Playfair Display', serif;
    font-size: 22px;
    margin: 13px 0 6px;
}

.service-list-heading p {
    font-size: 12px;
    color: #929B92;
}

.service-add-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 9px;
    padding: 13px 19px;
    background: #536F5B;
    color: white;
    text-decoration: none;
    border-radius: 12px;
    font-size: 12px;
    font-weight: 700;
    white-space: nowrap;
    transition: .2s;
}

.service-add-button:hover {
    background: #405C48;
    color: white;
    transform: translateY(-2px);
}

.service-table-wrapper {
    width: 100%;
    overflow-x: auto;
}

.service-table {
    width: 100%;
    min-width: 850px;
    border-collapse: collapse;
    font-size: 12px;
}

.service-table th {
    padding: 16px 13px;
    background: #F2F5EF;
    color: #788579;
    text-align: left;
    font-size: 10px;
    letter-spacing: .5px;
    white-space: nowrap;
}

.service-table th:first-child {
    border-radius: 10px 0 0 10px;
}

.service-table th:last-child {
    border-radius: 0 10px 10px 0;
}

.service-table td {
    padding: 17px 13px;
    border-bottom: 1px solid #EEF0EA;
    color: #566458;
    vertical-align: middle;
}

.service-table tbody tr:hover {
    background: #FAFBF8;
}

.service-id {
    display: inline-block;
    padding: 7px 10px;
    background: #EAF0E7;
    color: #607B65;
    border-radius: 8px;
    font-weight: 800;
    font-size: 11px;
}

.service-customer {
    display: flex;
    align-items: center;
    gap: 10px;
    min-width: 150px;
}

.service-avatar {
    width: 36px;
    height: 36px;
    display: grid;
    place-items: center;
    border-radius: 12px;
    background: #F3E6E9;
    color: #A16F7B;
    font-size: 17px;
}

.service-customer strong,
.service-customer small,
.service-subtext {
    display: block;
}

.service-customer strong,
.service-table td > strong {
    color: #48594C;
    font-size: 11px;
}

.service-customer small,
.service-subtext {
    color: #A0A99F;
    font-size: 10px;
    margin-top: 5px;
}

.service-date {
    white-space: nowrap;
    color: #647D69;
    font-size: 11px;
}

.service-date i {
    margin-right: 5px;
}

.service-complaint {
    display: inline-block;
    max-width: 180px;
    line-height: 1.6;
    color: #7E897F;
}

.service-actions {
    display: flex;
    align-items: center;
    gap: 7px;
}

.service-actions form {
    margin: 0;
}

.service-action {
    width: 34px;
    height: 34px;
    display: grid;
    place-items: center;
    border: none;
    border-radius: 10px;
    text-decoration: none;
    cursor: pointer;
    font-size: 14px;
    transition: .2s;
}

.service-action.view {
    background: #E8EFF3;
    color: #648396;
}

.service-action.edit {
    background: #F7EEDB;
    color: #A58B53;
}

.service-action.delete {
    background: #F6E5E5;
    color: #B36E73;
}

.service-action:hover {
    transform: translateY(-2px);
    filter: brightness(.95);
}

.service-empty {
    text-align: center;
    padding: 55px 20px;
}

.service-empty > i {
    font-size: 48px;
    color: #A8BFAE;
}

.service-empty h3 {
    font-family: 'Playfair Display', serif;
    margin: 15px 0 8px;
}

.service-empty p {
    color: #929B92;
    font-size: 12px;
    margin-bottom: 20px;
}

.service-pagination {
    margin-top: 23px;
}

.service-alert {
    padding: 15px 18px;
    background: #E4F1E5;
    color: #416448;
    border-radius: 13px;
    font-size: 13px;
    margin-bottom: 20px;
}

.service-alert.error {
    background: #F8E4E4;
    color: #9A4D4D;
}

@media(max-width: 700px) {
    .service-summary {
        grid-template-columns: 1fr;
    }

    .service-list-card {
        padding: 18px;
    }

    .service-list-heading {
        align-items: flex-start;
        flex-direction: column;
    }
}


/* =================================
   QUICK ACCESS DASHBOARD
================================= */

.quick-access-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 14px;
}

.quick-access-card {
    display: flex;
    align-items: center;
    gap: 14px;
    padding: 17px;
    background: #FAFCF9;
    border: 1px solid #E8EEE7;
    border-radius: 15px;
    text-decoration: none;
    color: #536F5B;
    transition: all 0.25s ease;
    min-width: 0;
}

.quick-access-card:hover {
    background: #F0F5EE;
    border-color: #C8D8C6;
    transform: translateY(-3px);
    box-shadow: 0 7px 18px rgba(83,111,91,0.08);
}

.quick-access-icon {
    width: 46px;
    height: 46px;
    min-width: 46px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 13px;
    font-size: 21px;
}

.quick-access-card strong {
    display: block;
    font-size: 13px;
    font-weight: 700;
    color: #465A49;
    margin-bottom: 5px;
}

.quick-access-card small {
    display: block;
    font-size: 10px;
    color: #929B92;
}

.quick-arrow {
    margin-left: auto;
    font-size: 15px;
    color: #A3B1A3;
}

@media (max-width: 650px) {
    .quick-access-grid {
        grid-template-columns: 1fr;
    }
}


/* =====================================
   MOTERA - GLOBAL PAGINATION REDESIGN
===================================== */

nav[role="navigation"] {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    gap: 5px;
    margin-top: 20px;
    font-family: 'DM Sans', sans-serif;
    font-size: 12px;
}

nav[role="navigation"] svg {
    width: 15px !important;
    height: 15px !important;
    max-width: 15px !important;
    max-height: 15px !important;
    display: inline-block !important;
}

nav[role="navigation"] a,
nav[role="navigation"] span {
    display: inline-flex;
    justify-content: center;
    align-items: center;
    min-width: 34px;
    min-height: 34px;
    padding: 7px 11px;
    border-radius: 9px;
    font-size: 11px;
    text-decoration: none;
    color: #68796B;
    background: #F3F5EF;
    border: 1px solid #ECEDE7;
    transition: .2s ease;
}

nav[role="navigation"] a:hover {
    background: #E3EDE0;
    color: #536F5B;
    border-color: #C8D8C8;
}

nav[role="navigation"] span[aria-current="page"] {
    background: #536F5B;
    color: white;
    border-color: #536F5B;
    font-weight: 800;
}

nav[role="navigation"] span[aria-disabled="true"] {
    color: #B8BFB7;
    background: #FAFAF7;
}

nav[role="navigation"] p {
    font-size: 11px;
    color: #929B92;
}

@media(max-width:600px) {
    nav[role="navigation"] {
        gap: 3px;
    }

    nav[role="navigation"] a,
    nav[role="navigation"] span {
        min-width: 30px;
        min-height: 30px;
        padding: 5px 8px;
    }
}

    </style>
</head>

<body>

<aside class="sidebar">

    <div class="brand">
        <div class="brand-icon">
            <i class="bi bi-bicycle"></i>
        </div>
        <div>
            <div class="brand-name">MOTÉRA</div>
            <small>MOTORCYCLE CARE</small>
        </div>
    </div>

    <div class="nav-label">MENU UTAMA</div>

    <a href="{{ route('dashboard') }}"
       class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
        <i class="bi bi-grid-1x2"></i> Dashboard
    </a>

    <div class="nav-label">MANAJEMEN DATA</div>

    <a href="{{ url('/pelanggan') }}"
       class="nav-link {{ request()->is('pelanggan*') ? 'active' : '' }}">
        <i class="bi bi-people"></i> Data Pelanggan
    </a>

    <a href="{{ url('/kendaraan') }}"
       class="nav-link {{ request()->is('kendaraan*') ? 'active' : '' }}">
        <i class="bi bi-scooter"></i> Data Kendaraan
    </a>

    <a href="{{ url('/daftar-service') }}"
       class="nav-link {{ request()->is('daftar-service*') ? 'active' : '' }}">
        <i class="bi bi-clipboard-check"></i> Daftar Service
    </a>

    <a href="{{ url('/data-service') }}"
       class="nav-link {{ request()->is('data-service*') ? 'active' : '' }}">
        <i class="bi bi-tools"></i> Data Service
    </a>

    <a href="{{ url('/pembayaran') }}"
       class="nav-link {{ request()->is('pembayaran*') ? 'active' : '' }}">
        <i class="bi bi-wallet2"></i> Pembayaran Service
    </a>

    <div class="sidebar-note">
        <i class="bi bi-flower1"></i>
        <p>
            <strong>Care for every ride.</strong><br>
            Pelayanan terbaik dimulai dari perhatian pada setiap detail.
        </p>
    </div>

</aside>

<main class="main">

    <header class="topbar">

        <div>
            <small>Motorcycle Service Management</small>
            <h2>@yield('page-title', 'Dashboard')</h2>
        </div>

        <div class="profile">
            <div>
                <strong style="font-size:12px;">MOTÉRA Admin</strong><br>
                <small>Administrator</small>
            </div>

            <div class="avatar">
                <i class="bi bi-person"></i>
            </div>
        </div>

    </header>

    <div class="content">

        @if(session('success'))
            <div class="alert alert-success">
                <i class="bi bi-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <strong>Periksa kembali data:</strong>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')

    </div>

</main>

</body>
</html>
