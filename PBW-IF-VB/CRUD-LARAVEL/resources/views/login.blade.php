<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Login - Tiket.com Style</title>
    <style>
        body {
            background: url('logo/bg msc.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Arial', sans-serif;
            color: #ffffff;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .login-container {
            max-width: 400px;
            width: 100%;
            background: rgba(255, 255, 255, 0.9);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
            border-radius: 15px;
            padding: 30px;
            text-align: center;
        }

        .logo {
            margin-bottom: 10px;
        }

        .logo img {
            width: 150px;

        }

        .form-label {
            font-weight: bold;
            color: #000000;
        }

        .form-control {
            border-radius: 8px;
            height: 45px;
            
        }

        .btn-primary {
            background-color: #2575fc;
            border: none;
            border-radius: 8px;
            padding: 10px;
            font-size: 20px;
            font-weight: bold;
            transition: all 0.3s;
        }

        .btn-primary:hover {
            background-color: #2d11cb;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .alert {
            border-radius: 8px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="logo">
            <img src="logo/ticket.png" alt="TiketStore">
        </div>
      

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $item)
                        <li>{{ $item }}</li>
                    @endforeach 
                </ul>
            </div>
        @endif

        <form action="" method="POST">
            @csrf
            <div class="mb-3 text-start">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" value="{{ old('email') }}" name="email" class="form-control" placeholder="Enter your email">
            </div>
            <div class="mb-3 text-start">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter your password">
            </div>
            <div class="d-grid">
                <!-- Menambahkan fw-bold untuk membuat teks Login tebal -->
                <button name="submit" type="submit" class="btn btn-primary fw-bold">Login</button>
            </div>
        </form>
        
    </div>
</body>
</html>
