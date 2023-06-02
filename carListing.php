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

$servername = "localhost";
$username = "root";
$password = "";
$dbName = "autotraders";
// try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbName",$username,$password);
    
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $location = $_POST['location'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $year = $_POST['year'];
    $color = $_POST['color'];
    $model = $_POST['model'];
    $type = $_POST['type'];
    $condition = $_POST['condition'];
    $kilometers = $_POST['kilometers'];
    $fuel = $_POST['fuel'];


    // If file upload form is submitted 
    $status = $statusMsg = ''; 
    if(isset($_POST["submit"])){ 
        // echo "Is this running";
        // echo "<pre>";
        // print_r($_FILES['thisimage']);
        // echo "</pre>";
        $status = 'error'; 
        if(!empty($_FILES["thisimage"]["name"])) { 
            //echo "second IF";
            
            // Get file info 
            $fileName = ($_FILES["thisimage"]["name"]); 
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
            
            // Allow certain file formats 
            $allowTypes = array('jpg','png','jpeg','gif'); 
            //echo (in_array($fileType, $allowTypes));
            if(in_array($fileType, $allowTypes)){ 
            //echo "third IF";

                $imgContent = addslashes(file_get_contents($_FILES['thisimage']['tmp_name'])); 


                $sql = "INSERT INTO `listing` (`Name`, `Phone`, `Email`,`Location`, `Price`, `Description`, 
                `Year`, `Color`, `Model`, `Type`, `VehicleCondition`, `Kilometers`, `Fuel`, `Image`) VALUES ('$name', '$phone', '$email', '$location', '$price', '$description', '$year',
                '$color', '$model', '$type', '$condition', '$kilometers', '$fuel', '$imgContent')";
                //echo $sql;
                // Insert image content into database 
                echo "    <div class='container'>
                <div class='row'>
                    <div class='col-2'></div>
                    <div class='col-8'>
                        <h2 class='text-center'>Information Stored</h2>
                        <p class='text-center'>Thank you for your posting.</p>
                        <p class='text-center'>Keep an eye out for an email from a potential buyer.</p><br>
                        <div class='col-5'></div>
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

                $insert = $pdo->query($sql); 
                if($insert){ 
                    $status = 'success'; 
                    $statusMsg = "File uploaded successfully."; 
                }else{ 
                    $statusMsg = "File upload failed, please try again."; 
                }  
            }else{ 
                $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
            } 
        }else{ 
            $statusMsg = 'Please select an image file to upload.'; 
        } 
    } 
    // Display status message 
    //echo $statusMsg. "THIS IS THE MESSAGE."; 


   // echo "New record created successfully";
// }
// catch (PDOException $e) {
//     echo "THIS SI ";
//     die( $e->getMessage() );
// }

$conn = null;
?>
