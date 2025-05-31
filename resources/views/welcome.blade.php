<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - EMI Processing</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #333;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        header {
            background-color: #2c3e50;
            color: white;
            padding: 15px 0;
            margin-bottom: 30px;
        }
        
        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .main-title {
            text-align: center;
            margin: 40px 0;
            color: #2c3e50;
        }
        
        .auth-links a {
            color: white;
            text-decoration: none;
            margin-left: 15px;
            padding: 8px 15px;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        
        .auth-links a:hover {
            background-color: #34495e;
        }
        
        .login-btn {
            background-color: #3498db;
        }
        
        .register-btn {
            background-color: #27ae60;
        }
        
        .content-box {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 30px;
            margin-bottom: 30px;
        }
        
        .btn {
            display: inline-block;
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            border-radius: 4px;
            text-decoration: none;
            transition: background-color 0.3s;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        
        .btn:hover {
            background-color: #2980b9;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        
        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    <header>
        <div class="container header-content">
            <h1>EMI Processing System</h1>
            <div class="auth-links">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/admin/loans') }}">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="login-btn">Log in</a>
                        {{-- @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="register-btn">Register</a>
                        @endif --}}
                    @endauth
                @endif
            </div>
        </div>
    </header>
</body>
</html>