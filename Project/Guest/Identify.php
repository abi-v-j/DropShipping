<?php

if (isset($_POST['btn_submit'])) {

    if ($_POST['role'] == 'business') {
        header('location:Seller.php');
    } else {
        header('location:User.php');

    }


}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join as Business or User</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@1,200&display=swap" rel="stylesheet">
    <style>
        /* Custom CSS for styling */
        body {
            background-color: #f5f5f5;
            font-family: 'Josefin Sans', sans-serif;
        }

        .main-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            margin: 50px auto;
            max-width: 600px;
        }

        .ptag {
            font-size: 1.6rem;
        }

        .btn-primary {
            width: 100%;
            height: 50px;
            font-size: 20px;
        }

        .form-check {
            display: flex;
            align-items: center;
            margin: 10px 0;
        }

        .inpr {
            height: 20px;
            width: 20px;
            margin-right: 10px;
        }

        .labe {
            font-size: 1.2rem;
            padding-left: 10px;
        }

        h1 {
            font-size: 2.5rem;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="main-container">
        <div class="container">
            <h1 class="mt-5">Welcome to Our Website</h1>
            <p class="mt-4 ptag">Please select your role:</p>
            <form  method="post" class="mt-3">
                <div class="form-check">
                    <input type="radio" name="role" value="business" class="form-check-input inpr" id="businessRadio"
                        required>
                    <label for="businessRadio" class="form-check-label labe">Business Owner</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="role" value="user" class="form-check-input inpr" id="userRadio" required>
                    <label for="userRadio" class="form-check-label labe">Regular User</label>
                </div>
                <button type="submit" class="btn btn-primary mt-3" name="btn_submit">Join</button>
            </form>
        </div>
    </div>
    <!-- Add Bootstrap JavaScript (optional, for certain Bootstrap features) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>