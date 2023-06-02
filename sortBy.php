<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Listings</title>
    <link rel="stylesheet" type="text/css" href="home.css" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="sortBy.css" rel="stylesheet">
    <script type="text/javascript" src="sortBy.js"></script>
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
                    <a class="nav-link text-success" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-success" href="listingPage.html">Sell</a>
                </li>
                <li class="nav-item"><a class="nav-link text-success" href="index.php#contact" data-toggle="model">Contact</a></li>
            </ul>
        </div>
    </nav>
    <!--Navbar-->
    <!-- Title  -->
    <div class="jumbotron text-center">
        <br><br><br>
        <h1 class="active" id="sedan">SEDANS</h1>
        <h1 class="deactive" id="truck">TRUCKS</h1>
        <h1 class="deactive" id="coupe">COUPE</h1>
        <h1 class="deactive" id="suv">SUV</h1>
        <br><br><br>
    </div>
    <div class="container">
      <br>
        <h1>Browse By Body Type</h1>
        <br><br>
        <div class="row">
            <div class="col-md-3" onclick="changeName('suv')">
              <div class="thumbnail">
                <a href="#">
                  <img src="img/suv.png" alt="Lights" style="width:100%">
                  <div class="caption">
                    <p>SUV</p>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-md-3" onclick="changeName('sedan')">
              <div class="thumbnail">
                <a href="#">
                  <img src="img/sedan.png" alt="Nature" style="width:100%">
                  <div class="caption">
                    <p>SEDAN</p>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-md-3" onclick="changeName('truck')">
              <div class="thumbnail" >
                <a href="#">
                  <img  src="img/truck.png" alt="Fjords" style="width:100%">
                  <div class="caption" >
                    <p>TRUCK</p>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-md-3" onclick="changeName('coupe')">
                <div class="thumbnail">
                  <a href="#">
                    <img src="img/coupe.png" alt="Fjords" style="width:100%">
                    <div class="caption">
                      <p>COUPE</p>
                    </div>
                  </a>
                </div>
              </div>
          </div>
    </div>

<div class="deactive" id="listCoupe">
  <h1 class="text-center">COUPE</h1>
  <?php
    require_once('config.inc.php');
    
    try {
        $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
        $sql = "SELECT `Model`, `Image`, `Description`, `Year`, `Kilometers`, `Id` FROM `listing` WHERE Type='COUPE'";
        $result = $pdo->query($sql);
        class listing{
          public $Model;
          public $Image;
          public $Description;
          public $Year;
          public $Kilometers;
          public $Id;
        }


        //function for lists
        function callthislist($name, $image, $description, $year, $kilometers, $Id) {
            echo "<div class='container' >
                    <a href='viewCar.html.php?id=". $Id ."'>
                    <div class='row'>
                        <div class='col-2'></div>
                        <div class='col-8 bg-secondary rounded bg-success text-white listing'>
                            <div class='row '>
                                <div class='col-12'>".$name."</div>";
                            echo "</div>
                            <div class='row'>
                                <div class='col-4'><img class='img-fluid' src='data:image/jpg;charset=utf8;base64,"; echo base64_encode($image);echo"' alt=''></div>
                                <div class='col-8 car-information'>";
                                    echo "<p>Description:" .$description." </p>
                                    <p>Year:" .$year. "</p>";
                                    echo "<p>Kilometers:" .$kilometers. "</p>
                                </div>
                            </div>
                        </div>
                        <div class='col-2'></div>
                    </div>
                    </a>
                </div>";
            }
    
        
          while ($b = $result->fetchObject('listing')){ 
            callthislist($b->Model, $b->Image, $b->Description, $b->Year, $b->Kilometers, $b->Id);
          }
        // fetch a record into an object of type Book
        // while ( $row = $result->fetch()) {
        // // the property names match the table field names
        //     echo 'Name: '.$row['Name'].'<br/>';
        //     echo 'Description: '.$row['Description'].'<br/>';
        //     echo 'Year: '.$row['Year'].'<br/>';
        //     echo 'Kilometers: '.$row['Kilometers'].'<br/>';
        // }
        //echo "New record created successfully";
    }
    catch (PDOException $e) {
        die( $e->getMessage() );
    }

    $conn = null;
?>
</div>

<div class="deactive" id="listSuv">
  <h1 class="text-center">SUV</h1>
  <?php
    require_once('config.inc.php');
    
    try {
        $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
        $sql = "SELECT `Model`, `Image`, `Description`, `Year`, `Kilometers`, `Id` FROM `listing` WHERE Type='SUV'";
        $result = $pdo->query($sql);
        class listingg{
          public $Model;
          public $Image;
          public $Description;
          public $Year;
          public $Kilometers;
          public $Id;
        }


        //function for lists
        function callthislistt($name, $image, $description, $year, $kilometers, $Id) {
          
            echo "<div class='container' >
                    
                    <a href='viewCar.html.php?id=". $Id ."'>
                    <div class='row'>
                        <div class='col-2'></div>
                        <div class='col-8 bg-secondary rounded bg-success text-white listing'>
                            <div class='row'>
                                <div class='col-12'>".$name."</div>";
                            echo "</div>
                            <div class='row pb-4'>
                                <div class='col-4'><img class='img-fluid' src='data:image/jpg;charset=utf8;base64,"; echo base64_encode($image);echo"' alt=''></div>
                                <div class='col-8 car-information'>";
                                    echo "<p>Description:" .$description." </p>
                                    <p>Year:" .$year. "</p>";
                                    echo "<p>Kilometers:" .$kilometers. "</p>
                                </div>
                            </div>
                        </div>
                        <div class='col-2'></div>
                    </div>
                    </a>
                </div>";
            }
    
        
          while ($b = $result->fetchObject('listingg')){ 
            callthislistt($b->Model, $b->Image, $b->Description, $b->Year, $b->Kilometers, $b->Id);
          }
        // fetch a record into an object of type Book
        // while ( $row = $result->fetch()) {
        // // the property names match the table field names
        //     echo 'Name: '.$row['Name'].'<br/>';
        //     echo 'Description: '.$row['Description'].'<br/>';
        //     echo 'Year: '.$row['Year'].'<br/>';
        //     echo 'Kilometers: '.$row['Kilometers'].'<br/>';
        // }
        //echo "New record created successfully";
    }
    catch (PDOException $e) {
        die( $e->getMessage() );
    }

    $conn = null;
?>
</div>

<div class="deactive" id="listSedan">
  <h1 id ='coupe' class="text-center">SEDAN</h1>
  <?php
    require_once('config.inc.php');
    
    try {
        $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
        $sql = "SELECT `Model`, `Image`, `Description`, `Year`, `Kilometers`, `Id` FROM `listing` WHERE Type='Sedan'";
        $result = $pdo->query($sql);
        class listinggg{
          public $Model;
          public $Image;
          public $Description;
          public $Year;
          public $Kilometers;
          public $Id;
        }


        //function for lists
        function callthislisttt($name, $image, $description, $year, $kilometers, $Id) {
          
            echo "<div class='container' >
                    
                    <a href='viewCar.html.php?id=". $Id ."'>
                    <div class='row'>
                        <div class='col-2'></div>
                        <div class='col-8 bg-secondary rounded bg-success text-white listing'>
                            <div class='row'>
                                <div class='col-12'>".$name."</div>";
                            echo "</div>
                            <div class='row'>
                                <div class='col-4'><img class='img-fluid' src='data:image/jpg;charset=utf8;base64,"; echo base64_encode($image);echo"' alt=''></div>
                                <div class='col-8 car-information'>";
                                    echo "<p>Description:" .$description." </p>
                                    <p>Year:" .$year. "</p>";
                                    echo "<p>Kilometers:" .$kilometers. "</p>
                                </div>
                            </div>
                        </div>
                        <div class='col-2'></div>
                    </div>
                    </a>
                </div>";
            }
    
        
          while ($b = $result->fetchObject('listinggg')){ 
            callthislisttt($b->Model, $b->Image, $b->Description, $b->Year, $b->Kilometers, $b->Id);
          }
        // fetch a record into an object of type Book
        // while ( $row = $result->fetch()) {
        // // the property names match the table field names
        //     echo 'Name: '.$row['Name'].'<br/>';
        //     echo 'Description: '.$row['Description'].'<br/>';
        //     echo 'Year: '.$row['Year'].'<br/>';
        //     echo 'Kilometers: '.$row['Kilometers'].'<br/>';
        // }
        //echo "New record created successfully";
    }
    catch (PDOException $e) {
        die( $e->getMessage() );
    }

    $conn = null;
?>
</div>

<div class="deactive" id="listTruck">
  <h1 id ='coupe' class="text-center">TRUCK</h1>
  <?php
    require_once('config.inc.php');
    
    try {
        $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
        $sql = "SELECT `Model`, `Image`, `Description`, `Year`, `Kilometers`, `Id` FROM `listing` WHERE Type='Truck'";
        $result = $pdo->query($sql);
        class listingggg{
          public $Model;
          public $Image;
          public $Description;
          public $Year;
          public $Kilometers;
          public $Id;
        }


        //function for lists
        function callthislistttt($name, $image, $description, $year, $kilometers, $Id) {
          
            echo "<div class='container' >
                    
                    <a href='viewCar.html.php?id=". $Id ."'>
                    <div class='row'>
                        <div class='col-2'></div>
                        <div class='col-8 bg-secondary rounded text-white bg-success listing'>
                            <div class='row'>
                                <div class='col-12'>".$name."</div>";
                            echo "</div>
                            <div class='row'>
                                <div class='col-4'><img class='img-fluid' src='data:image/jpg;charset=utf8;base64,"; echo base64_encode($image);echo"' alt=''></div>
                                <div class='col-8 car-information'>";
                                    echo "<p>Description:" .$description." </p>
                                    <p>Year:" .$year. "</p>";
                                    echo "<p>Kilometers:" .$kilometers. "</p>
                                </div>
                            </div>
                        </div>
                        <div class='col-2'></div>
                    </div>
                    </a>
                </div>";
            }
    
        
          while ($b = $result->fetchObject('listingggg')){ 
            callthislistttt($b->Model, $b->Image, $b->Description, $b->Year, $b->Kilometers, $b->Id);
          }
        // fetch a record into an object of type Book
        // while ( $row = $result->fetch()) {
        // // the property names match the table field names
        //     echo 'Name: '.$row['Name'].'<br/>';
        //     echo 'Description: '.$row['Description'].'<br/>';
        //     echo 'Year: '.$row['Year'].'<br/>';
        //     echo 'Kilometers: '.$row['Kilometers'].'<br/>';
        // }
        //echo "New record created successfully";
    }
    catch (PDOException $e) {
        die( $e->getMessage() );
    }

    $conn = null;
?>
</div>

    <footerk>
      <div class="container d-md-flex py-4">

          <div class="me-md-auto text-center text-md-start">
            <div class="copyright">
              &copy; Copyright <strong><span>AutoTraders</span></strong>. All Rights Reserved
            </div> 
          </div>
        </div>
  </footer>
  <script>
      // Check browser support
 if (typeof(Storage) !== "undefined") {
    // Retrieve
    var s =  localStorage.getItem("type");
    changeName(s);
    }
    function changeName(param){
      var index = 0;
      document.getElementById('sedan').style.display = "none";
      document.getElementById('coupe').style.display = "none";
      document.getElementById('suv').style.display = "none";
      document.getElementById('truck').style.display = "none";
      if(param == 'truck'){
          document.getElementById('truck').style.display = "block";
          document.getElementById('listSuv').style.display = "none";
          document.getElementById('listSedan').style.display = "none";
          document.getElementById('listCoupe').style.display = "none";
          document.getElementById('listTruck').style.display = "block";
      }
      if(param == 'sedan'){
          document.getElementById('sedan').style.display = "block";
          document.getElementById('listSuv').style.display = "none";
          document.getElementById('listSedan').style.display = "block";
          document.getElementById('listCoupe').style.display = "none";
          document.getElementById('listTruck').style.display = "none";
          
      }
      if(param == 'coupe'){
          document.getElementById('coupe').style.display = "block";
          document.getElementById('listSuv').style.display = "none";
          document.getElementById('listSedan').style.display = "none";
          document.getElementById('listCoupe').style.display = "block";
          document.getElementById('listTruck').style.display = "none";
      }
      if(param == 'suv'){
          document.getElementById('suv').style.display = "block";
          document.getElementById('listSuv').style.display = "block";
          document.getElementById('listSedan').style.display = "none";
          document.getElementById('listCoupe').style.display = "none";
          document.getElementById('listTruck').style.display = "none";
      }
      
    }



  </script>
  <style>
    .listing {
      margin-bottom: 20px;
      transition: transform 250ms;
    }

    .listing:hover {
      transform: translateY(-10px);      
    }

    body {
      text-decoration: none;
    }
  </style>
    <script type="text/javascript" src="lists.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
</html>