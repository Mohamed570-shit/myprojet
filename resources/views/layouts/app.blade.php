<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Événements</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- You can add Bootstrap or your own CSS here if needed -->
    <style>
        body { margin: 0; font-family: Arial, sans-serif; }
        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #f5f5f5;
            padding: 10px 30px;
            border-bottom: 1px solid #ddd;
        }
        .navbar-left, .navbar-right {
            display: flex;
            align-items: center;
        }
        .navbar-title {
            flex: 1;
            text-align: center;
            font-size: 1.3rem;
            font-weight: bold;
            color: #333;
        }
        .navbar button {
            margin-left: 10px;
            padding: 7px 18px;
            border: none;
            background: #007bff;
            color: #fff;
            border-radius: 3px;
            cursor: pointer;
            font-size: 1rem;
        }
        .navbar button:last-child {
            background: #6c757d;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-left">
            <a href="/">
                <button>Dashboard</button>
            </a>
        </div>
        <div class="navbar-title">
            Gestion des Événements
        </div>
        <div class="navbar-right">
            <button>Login</button>
        </div>
    </nav>

    <div class="container" style="padding: 30px;">
        @yield('content')
    </div>
</body>
</html>