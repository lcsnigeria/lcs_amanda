<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
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
            background: white;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }
        .container {
            padding: 40px;
            border-radius: 8px;
            max-width: 500px;
        }
        h1 {
            font-size: 100px;
            margin: 0;
            color: #0073e6;
        }
        h2 {
            font-size: 24px;
            margin: 10px 0;
        }
        p {
            font-size: 16px;
            color: #666;
            margin-bottom: 20px;
        }
        a {
            display: inline-block;
            text-decoration: none;
            background: #0073e6;
            color: white;
            padding: 12px 20px;
            border-radius: 5px;
            font-size: 16px;
            transition: 0.3s;
        }
        a:hover {
            background: #005bb5;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>404</h1>
        <h2>Oops! Page Not Found</h2>
        <p>The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p>
        <a href="/">Go Back Home</a>
    </div>
</body>
</html>
