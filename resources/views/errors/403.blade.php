<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 Forbidden</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-Q0mvOdHN6A+wh6lW7X9OjFnmVEU6+F0oJ2cjKLrcBQEoJGmZ3qLxjnH9IFnh5m5GATf5m5gP/nNfLBRDU6o/g==" crossorigin="anonymous" />
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            background: #f2f2f2;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            padding: 0;
        }
        .error-container {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            padding: 60px;
            text-align: center;
            animation: slide-up 0.5s ease-in-out;
        }
        @keyframes slide-up {
            from {
                transform: translateY(100%);
            }
            to {
                transform: translateY(0);
            }
        }
        h1 {
            font-size: 40px;
            margin-bottom: 30px;
        }
        p {
            font-size: 18px;
            margin-bottom: 30px;
        }
        a {
            background: #3498db;
            border-radius: 50px;
            color: #fff;
            display: inline-block;
            font-size: 18px;
            padding: 12px 24px;
            text-decoration: none;
            transition: all 0.3s ease-in-out;
        }
        a:hover {
            background: #2980b9;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <h1><i class="fas fa-exclamation-triangle"></i> 403 Forbidden</h1>
        <p>You do not have permission to access this page.</p>
        <a href="javascript:history.back()">Go back</a>
    </div>
</body>
</html>
