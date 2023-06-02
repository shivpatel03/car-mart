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
    <link rel="stylesheet" href="viewCar.css">
    <title>Car Listing</title>
</head>

<body>
 <!--Navbar-->
 <nav class="navbar fixed-top navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="index.php">CARMART</a>
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
            <li class="nav-item "><a class="nav-link text-success" href="index.php#contact" data-toggle="model">Contact</a></li>
        </ul>
    </div>
</nav>
<!--Navbar-->

    <div class="container-fluid">
        <div class="row">
            <div class="col-6 with-image">
                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($info['image']); ?>" class="img-fluid rounded" alt="">
            </div>
            <div class="col-6 shadow-sm p-3 bg-body rounded ">
                <h2>Seller Information</h2>
                <p>Name: <?php echo $info["name"]?></p>
                <p>Phone number: <?php echo $info["number"]?></p>
                <p>Email address: <?php echo $info["email"]?></p>
                <p>Pickup Location: <?php echo $info["address"]?></p>
                <a href="contactSeller.html.php?id=<?php echo $thisID?>" class="btn btn-success" role="button">Contact Seller</a>
            </div>
        </div>
    </div>

    <div class="container-fluid pricing">
        <div class="row">
            <div class="col-6">
                <h3>Pricing</h3>
                <div class="row shadow-sm p-3 bg-body rounded">
                    <p class="price"><?php echo $info["price"]?></p>
                    <p class="subscript">+ applicable taxes</p>
                </div>
            </div>
            <div class="col-6">
                <h3>Vehicle Description</h3>
                <div class="row shadow-sm p-3 bg-body rounded">
                    <div class="col-12 ">
                        <p><?php echo $info["description"]?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid information">
        <div class="row">
            <div class="col-6 ">
                <h3>General Car Information</h3>
                <div class="row shadow-sm p-3 mb-5 bg-body rounded">
                    <div class="col-3 ">
                        <p><?php echo $info["year"]?></p>
                        <p class="subscript">Year</p>
                    </div>
                    <div class="col-3">
                        <p><?php echo $info["color"]?></p>
                        <p class="subscript">Color</p>
                    </div>
                    <div class="col-3">
                        <p><?php echo $info["model"]?></p>
                        <p class="subscript">Model</p>
                    </div>
                    <div class="col-3">
                        <p><?php echo $info["type"]?></p>
                        <p class="subscript">Type</p>
                    </div>
                </div>
            </div>

            <div class="col-6 ">
                <h3>Specifics</h3>
                <div class="row specifics shadow-sm p-3 mb-5 bg-body rounded">
                    <div class="col-4">
                        <p><?php echo $info["condition"]?></p>
                        <p class="subscript">Condition</p>
                    </div>
                    <div class="col-4">
                        <p><?php echo $info["kilometers"]?></p>
                        <p class="subscript">Kilometers</p>
                    </div>
                    <div class="col-4">
                        <p><?php echo $info["fuel"]?></p>
                        <p class="subscript">Fuel Type</p>
                    </div>
                </div>
            </div>
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