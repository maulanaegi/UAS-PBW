<html>

<head>
    <title>Login Form</title>
    <style>
        body {
            background-image: url('assets/img/gd1.jpg'); /* Set the background image */
            background-size: cover; /* Ensure the background image covers the entire page */
            background-repeat: no-repeat; /* Prevent the background image from repeating */
            background-attachment: fixed; /* Ensure the background image stays fixed in place */
            font-family: 'Times New Roman', 'sans-serif';
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .wrapper {
            width: 400px;
            padding: 30px;
            background-color: rgba(254, 254, 254, 0.9); /* Set a semi-transparent background color for the form */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 10px; /* Add rounded corners */
            text-align: center;
        }

        h1 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        form input {
            width: 100%;
            height: 40px;
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px; /* Add rounded corners to input fields */
            box-sizing: border-box;
        }

        form input[type="submit"] {
            background-color:rgb(233, 238, 255);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            color: black;
            border: none;
            cursor: pointer;
            font-size: 14px;

            transition: background-color 0.3s ease;
        }

        form input[type="submit"]:hover {
            background-color:rgb(40, 164, 253);
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <h1>Login</h1>
        <form action="proses_login.php" method="POST">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Login">
            </div>
        </form>
    </div>
</body>

</html>