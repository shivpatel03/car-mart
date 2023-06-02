<?php
    $thisID = $_GET['id'];
    try {
        $connection = new mysqli('localhost','root','','autotraders');
        if($connection->connect_error){
          die('Connection Failed : '.$conn->connect_error);
        }
    
        $sql = "SELECT * FROM listing WHERE Id='$thisID'";
        $info = [];
    
        $result = $connection->query($sql);
    
        if(!$result){
          die("Invalid Query");
        }
            if($row = $result->fetch_assoc()){
                $info = array("name"=>$row['Name']
                ,"price"=>$row['Price']
                ,"email"=>$row['Email']
                ,"number"=>$row['Phone']
                ,"address"=>$row['Location']
                , "description"=>$row['Description']
                , "year"=>$row['Year']
                , "kilometers"=>$row['Kilometers']
                , "color"=>$row['Color']
                ,"type"=>$row['Type']
                ,"condition"=>$row['VehicleCondition']
                ,"fuel"=>$row['Fuel']
                ,"model"=>$row['Model']
                , "image"=>$row['Image'] );
            }
      } catch (PDOException $e) {
        die( $e->getMessage() );
      }
      $conn = null; 


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="contactSeller.css">
    <title>Contact Seller</title>
</head>

<body>
 <!--Navbar-->
 <nav class="navbar fixed-top navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="#">CARMART</a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse collapse justify-content-end" id="navbarNavDropdown">
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link active bg-success" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-success" href="listingPage.html">Sell</a>
            </li>
            <li class="nav-item "><a class="nav-link text-success" href="#contact" data-toggle="model">Contact</a></li>
        </ul>
    </div>
</nav>
<!--Navbar-->
    <div class="container">
        <h3>Contact  <?php echo $info["name"]?></h3>
        <form action="contactSeller.php?id=<?php echo $thisID?>" method="post">
            <div class="form-group shadow-sm p-3 mb-5 bg-body rounded">
                <label for="sellerEmail">Name</label>
                <input type="text" name="name" class="form-control" id="buyerName" aria-describedby="buyerName"
                    placeholder="Enter your name.">


                <label for="buyerEmail">Email Address</label>
                <input type="email" name="email"class="form-control" id="buyerEmail" aria-describedby="buyerEmail"
                    placeholder="Enter your email.">
                <small id="emailHelp" class="form-text text-muted">The seller will be able to see this email.</small>
                <br>
                <label for="exampleFormControlTextarea1">Enter your message to the seller below</label>
                <textarea class="form-control" name="message"id="exampleFormControlTextarea1" rows="3"
                    placeholder="Enter your Message"></textarea>
                    <br>
                    <button class="btn btn-success" name ="submit"type="submit">Submit</button>
            </div>
        </form>
        <div class="shadow-sm p-3 mb-5 bg-body rounded">
            <p>For further contact, you can reach them at:</p>
            <p>Email: <?php echo $info["email"]?></p>
            <p>Phone Number: <?php echo $info["number"]?></p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
        integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk"
        crossorigin="anonymous"></script>
</body>

</html>