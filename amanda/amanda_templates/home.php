<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LCS Amanda - Lightweight PHP Framework</title>
    <?php echo amanda_favicon(); ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: white;
            color: #333;
        }
        .container {
            width: 80%;
            margin: 50px auto;
            padding: 20px;
            border-radius: 5px;
        }
        .container > a {
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            height: 50px;
            padding: 0 2rem;
            border-radius: 50px;
            background-color: #0073e6;
            color: white;
            font-weight: 600;
            font-size: 18px;
            max-width: fit-content;
            margin: 2rem auto 3rem auto;
        }
        h1 {
            color: #0073e6;
            text-align: center;
            font-size: clamp(38px, 5vw, 48px);
            margin-bottom: 1.5rem;
        }
        p {
            font-size: 1.1em;
            line-height: 1.6;
            text-align: center;
        }
        .features {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 15px;
            margin-top: 20px;
        }
        .feature {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100px;
            background-color: #f4f4f4;
            padding: 25px 15px;
            border-radius: 15px;
            text-align: center;
            min-width: 250px;
            flex: 1;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Amanda says HI!</h1>
        <p>
            A lightweight, modular PHP framework designed for building scalable web applications with a focus on efficiency, security, and maintainability. 
            It provides a structured foundation for developing robust applications with core features such as MVC architecture, routing, database management, authentication, and API handling.
        </p>
        <a href="http://lcs.ng/amanda" target="_blank" rel="noopener noreferrer">Learn more</a>
        <div class="features">
            <div class="feature">MVC Structure – Clean, maintainable code</div>
            <div class="feature">Secure & Efficient Routing – Dynamic URL handling</div>
            <div class="feature">Built-in Authentication – User management</div>
            <div class="feature">Database Abstraction – MySQL integration</div>
            <div class="feature">Modular Design – Extend with plugins</div>
            <div class="feature">AJAX & API Support – Secure endpoints</div>
            <div class="feature">Optimized Performance – Fast execution</div>
        </div>
    </div>
</body>
</html>