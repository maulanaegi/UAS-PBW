<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Toko Jersey SUMEDANG</title>
  <style>
    /* General Styles */
    body {
      font-family: 'Poppins', Arial, sans-serif;
      margin: 0;
      padding: 0;
      background: linear-gradient(to bottom, #f9f9f9, #eef2f3);
      color: #2c3e50;
    }

    .container {
      width: 85%;
      max-width: 1300px;
      margin: auto;
      padding: 20px;
    }

    /* Header */
    .header {
      background:url('img/jersey/logo.jpeg');
      background-size: cover;
      background-position: center;
      color: white;
      text-align: center;
      padding: 100px 0;
      border-radius: 12px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }

    .header p {
      font-size: 2.8rem;
      font-weight: 700;
      text-shadow: 2px 3px 6px rgba(0, 0, 0, 0.3);
      margin: 0;
    }

    /* Navigation */
    nav {
      background: white;
      padding: 12px 20px;
      border-radius: 12px;
      margin-top: -20px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      z-index: 10;
      position: sticky;
      top: 0;
    }

    nav ul {
      list-style: none;
      display: flex;
      justify-content: center;
      margin: 0;
      padding: 0;
    }

    nav ul li {
      margin: 0 15px;
    }

    nav ul li a {
      color: #2c3e50;
      font-size: 1.2rem;
      text-transform: uppercase;
      text-decoration: none;
      font-weight: 600;
      padding: 8px 12px;
      border-radius: 8px;
      transition: all 0.3s ease;
    }

    nav ul li a:hover {
      background: #16a085;
      color: white;
      box-shadow: 0 4px 10px rgba(22, 160, 133, 0.4);
    }

    /* Main Content Box */
    #box {
      background: white;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
      margin-top: 30px;
    }

    /* Table Styles */
    table {
      width: 100%;
      border-collapse: collapse;
      margin: 20px 0;
    }

    table th {
      background: #16a085;
      color: white;
      padding: 12px;
      text-align: left;
      font-size: 1rem;
    }

    table td {
      padding: 12px;
      border-bottom: 1px solid #ddd;
    }

    table tr:hover {
      background: #f1f1f1;
    }

    /* Buttons */
    .button {
      display: inline-block;
      padding: 12px 25px;
      background: #16a085;
      color: white;
      text-decoration: none;
      border-radius: 8px;
      font-size: 1rem;
      font-weight: bold;
      text-transform: uppercase;
      transition: all 0.3s ease;
      box-shadow: 0 4px 10px rgba(22, 160, 133, 0.3);
    }

    .button:hover {
      background: #1abc9c;
      transform: translateY(-3px);
      box-shadow: 0 6px 15px rgba(22, 160, 133, 0.5);
    }

    /* Footer */
    .footer {
      background: linear-gradient(to right, #16a085, #1abc9c);
      color: white;
      text-align: center;
      padding: 15px 0;
      border-radius: 12px;
      margin-top: 30px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .footer p {
      font-size: 1rem;
      font-weight: 500;
      margin: 0;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      nav ul {
        flex-direction: column;
        align-items: center;
      }

      nav ul li {
        margin: 10px 0;
      }

      .header p {
        font-size: 2.2rem;
      }

      .button {
        font-size: 0.9rem;
      }
    }
  </style>
</head>

<body>
  <div class="header">
    <p>Toko Jersey SUMEDANG</p>
  </div>

  <nav>
    <ul>
      <?php include("page/navbar.php") ?>
    </ul>
  </nav>

  <div class="container">
    <?php include("content.php") ?>
    <?php include("page/user/keranjang.php") ?>
  </div>

  <div class="footer">
    <p>&copy; 2025 Toko Jersey Sumedang - All Rights Reserved</p>
  </div>
</body>

</html>
