<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f3f3f3;
        }
        .container {
            text-align: center;
        }
        .register-box {
            padding: 20px;
            margin: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="register-box">
                <h2>Register as a Retailer</h2>
                <p>Register here if you are a retailer.</p>
                <a href="RetailerRegistration.php" class="btn btn-primary">Register as Retailer</a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="register-box">
                <h2>Register as a Farmer</h2>
                <p>Register here if you are a farmer.</p>
                <a href="FarmerRegistration.php" class="btn btn-success">Register as Farmer</a>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
