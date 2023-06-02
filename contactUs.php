<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    
    <style>
        body {
            background-color: #edfaff;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>
</body>
</html>

<?php
    require_once('config.inc.php');
    
    try {
        $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);

        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        $sql = "INSERT INTO `contacts`(`Name`, `Email`, `Message`) VALUES ('$name', '$email', '$message')";
        $result = $pdo->query($sql);

        echo "<div class='container'>
        <div class='row'>
            <div class='col-2'></div>
            <div class='col-8'>
                <h2 class='text-center'>Message Received!</h2>
                <p class='text-center'>Thank you for your inquiry.</p>
                <p class='text-center'>Keep an eye out for a message back from us.</p><br>
                <div class='row'>
        <div class='col-5'></div>
        <div class='col-2'>
            <a class='btn btn-success' href='index.php'>Return to Main Page</a>
        </div>
        <div class='col-5'></div>
    </div>
            </div>
            <div class='col-2'></div>
        </div>
    </div>";
    }
    catch (PDOException $e) {
        die( $e->getMessage() );
    }

    $conn = null;
?>