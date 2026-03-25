<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <title>404 — Page Not Found | NEX Gen</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;600;700;800;900&family=Roboto:wght@300;400;500&display=swap" rel="stylesheet" />
    <style>
        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: "Barlow", sans-serif;
            background: #fff;
            color: #0b1120;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
        }

        /* ── 404 row ── */
        .num-row {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0;
            line-height: 1;
            margin-bottom: 18px;
        }

        .digit {
            font-size: clamp(7rem, 22vw, 13rem);
            font-weight: 900;
            color: #0b1120;
            letter-spacing: -6px;
        }

        /* ── Oval plug "0" ── */
        .plug-zero {
            width: clamp(90px, 14vw, 150px);
            height: clamp(110px, 17vw, 185px);
            border: 4px solid #0b1120;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 4px;
            position: relative;
            flex-shrink: 0;
            background: #fff;
        }

        .plug-zero svg {
            width: 70%;
            height: auto;
        }

        /* ── Oops text ── */
        .oops {
            font-size: clamp(1.4rem, 4.5vw, 2.6rem);
            font-weight: 700;
            color: #0b1120;
            margin-bottom: 36px;
            text-align: center;
        }

        /* ── Button ── */
        .btn-home {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 14px 36px;
            background: #1a6dd4;
            color: #fff;
            font-family: "Barlow", sans-serif;
            font-size: 1rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            text-decoration: none;
            border-radius: 4px;
            box-shadow: 0 4px 20px rgba(26,109,212,0.35);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .btn-home:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 28px rgba(26,109,212,0.45);
        }

        /* ── Brand watermark ── */
        .brand {
            margin-top: 60px;
            font-size: 0.8rem;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: rgba(11,17,32,0.25);
            text-decoration: none;
        }

        .brand b { color: #f96900; }

        @media (max-width: 480px) {
            .digit { letter-spacing: -3px; }
            .plug-zero { border-width: 3px; }
        }
    </style>
</head>
<body>

    <div class="num-row">
        <span class="digit">4</span>

        <!-- Oval with disconnected plug SVG -->
        <div class="plug-zero">
            <svg viewBox="0 0 100 70" xmlns="http://www.w3.org/2000/svg" fill="none">
                <!-- Left plug body -->
                <rect x="4" y="27" width="34" height="16" rx="4" fill="#0b1120"/>
                <!-- Left plug pins -->
                <rect x="11" y="17" width="6" height="11" rx="2" fill="#0b1120"/>
                <rect x="23" y="17" width="6" height="11" rx="2" fill="#0b1120"/>

                <!-- Right plug body -->
                <rect x="62" y="27" width="34" height="16" rx="4" fill="#0b1120"/>
                <!-- Right plug pins (pointing down — socket) -->
                <rect x="69" y="42" width="6" height="11" rx="2" fill="#0b1120"/>
                <rect x="81" y="42" width="6" height="11" rx="2" fill="#0b1120"/>

                <!-- Spark / disconnect lines in gap -->
                <polyline points="43,31 48,35 43,39" stroke="#f96900" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                <polyline points="57,31 52,35 57,39" stroke="#f96900" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>

        <span class="digit">4</span>
    </div>

    <p class="oops">Oops! page not found.</p>

    <a href="{{ url('/') }}" class="btn-home">
        &#8592; Back to Home Page
    </a>

    <a href="{{ url('/') }}" class="brand">NEX <b>Gen</b></a>

</body>
</html>
