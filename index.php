<?php          
  try {
    $connection = new mysqli('localhost','root','','autotraders');
    if($connection->connect_error){
      die('Connection Failed : '.$conn->connect_error);
    }

    $sql = "SELECT Id,Model, Name, Description, Year, Kilometers, Image FROM listing ORDER BY -(Id) LIMIT 3; ";
    $info = [];

    $result = $connection->query($sql);

    if(!$result){
      die("Invalid Query");
    }

    for ($i = 0; $i < 3; $i++){
    // fetch a record into an object of type Book
      
        if($row = $result->fetch_assoc()){
          $info[$i] = array("Id"=>$row['Id'],"model"=>$row['Model'],"name"=>$row['Name'], "description"=>$row['Description'], "year"=>$row['Year'], "kilometers"=>$row['Kilometers'], "image"=>$row['Image'] );
        }
      
    }
  } catch (PDOException $e) {
    die( $e->getMessage() );
  }
  $conn = null; 
?> 
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cars</title>
    <link rel="stylesheet" type="text/css" href="home.css" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="index.css" rel="stylesheet">
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

    <!-- backgorund -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container">
          <h1>Welcome to CARMART</h1>
          <h2>Buy or sell your cars with the largest inventory in Canada.</h2>
          <a href="listingPage.html" class="btn-get-started scrollto bg-success">Sell</a>
          <a href="#inven" class="btn-get-started scrollto bg-success" >Buy</a>
        </div>
      </section>
    <!-- background -->
    <br><br><br><br><br><br><br><br><br><br>
    <div class="container" id="inven">
        <h1>Featured Inventory</h1>
        <br><br>
        <a href="viewCar.html.php?id=<?php echo $info[0]["Id"]?>" >
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8 bg-success rounded listing" >
                <div class="row">
                    <div class="col-12 text-white"><?php echo $info[0]["model"]; ?></div>
                </div>
                <div class="row">
                    <div class="col-4"><img class="img-fluid fixer imgcl" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($info[0]['image']); ?>" alt=""></div>
                    <div class="col-8 car-information text-white">
                        <p><?php echo $info[0]["description"]; ?></p>
                        <p>Year: <?php echo $info[0]["year"]; ?></p>
                        <p>Kilometers: <?php echo $info[0]["kilometers"]; ?> </p>
                    </div>
                </div>
            </div>
            <div class="col-2"></div>
        </div>
        </a>
    </div>
    
    <div class="container">
        <a href="viewCar.html.php?id=<?php echo $info[1]["Id"]?>">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8 bg-success rounded listing" >
            <div class="row">
                    <div class="col-12 text-white"><?php echo $info[1]["model"]; ?></div>
                </div>
                <div class="row">
                    <div class="col-4"><img class="img-fluid fixer imgcl" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($info[1]['image']); ?>" alt=""></div>
                    <div class="col-8 car-information text-white">
                        <p><?php echo $info[1]["description"]; ?></p>
                        <p>Year: <?php echo $info[1]["year"]; ?></p>
                        <p>Kilometers: <?php echo $info[1]["kilometers"]; ?> </p>
                    </div>
                </div>
            </div>
            <div class="col-2"></div>
        </div>
        </a>
    </div>
    <div class="container">
        <a href="viewCar.html.php?id=<?php echo $info[2]["Id"]?>">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8 bg-success rounded listing" >
            <div class="row">
                    <div class="col-12 text-white"><?php echo $info[2]["model"]; ?></div>
                </div>
                <div class="row">
                    <div class="col-4"><img class="img-fluid fixer imgcl" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($info[2]['image']); ?>" alt=""></div>
                    <div class="col-8 text-white car-information">
                        <p><?php echo $info[2]["description"]; ?></p>
                        <p>Year: <?php echo $info[2]["year"]; ?></p>
                        <p>Kilometers: <?php echo $info[2]["kilometers"]; ?> </p>
                    </div>
                </div>
            </div>
            <div class="col-2"></div>
        </div>
        </a>
    </div>

    <div class="container">
        <h1 >Browse By Body Type</h1>
        <br><br>
        <div class="row">
            <div class="col-md-3" onclick="typeSelected('suv')">
              <div class="thumbnail">
                <a href="sortBy.php" target="_self">
                  <img class="zoom" src="img/suv.png" alt="Lights" style="width:100%">
                  <div class="caption">
                    <p>SUV</p>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-md-3" onclick="typeSelected('sedan')">
              <div class="thumbnail">
                <a href="sortBy.php" target="_self">
                  <img src="img/sedan.png" alt="Nature" style="width:100%">
                  <div class="caption">
                    <p>SEDAN</p>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-md-3" onclick="typeSelected('truck')">
              <div class="thumbnail" >
                <a href="sortBy.php" target="_self">
                  <img  src="img/truck.png" alt="Fjords" style="width:100%">
                  <div class="caption" >
                    <p id="truck" >TRUCK</p>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-md-3" onclick="typeSelected('coupe')">
                <div class="thumbnail">
                  <a href="sortBy.php" target="_self">
                    <img src="img/coupe.png" alt="Fjords" style="width:100%">
                    <div class="caption">
                      <p>COUPE</p>
                    </div>
                  </a>
                </div>
              </div>
          </div>
    </div>
    <div class="container-fluid testimonial bg-success">
    <section id="faq" class="faq section-bg">
      <div class="container ">
        <br>
        <h1>Testimonials</h1>
        <br>
        <div class="row">
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">June 2021</h5>
                  <p class="card-text">I was able to sell my car within 2 weeks after making my listing on this website. 10/10</p>
                  <p ></p>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">July 2022</h5>
                  <p class="card-text">Got my first ride from this website. Really wide variety of choices avaliable. </p>
                  <p ></p>
                </div>
              </div>
            </div>
          </div>
      </div>
    </section>
    </div>
    <!-- Wrapper container -->
<div class="container py-4" id="contact">
    <h1>Contact Us</h1>
    <!-- Bootstrap 5 starter form -->
    <form id="contactForm" action="contactUs.php" method="POST">
  
      <!-- Name input -->
      <div class="mb-3">
        <label class="form-label" for="name">Name</label>
        <input class="form-control" name="name" id="name" type="text" placeholder="Name" data-sb-validations="required" />
      </div>
  
      <!-- Email address input -->
      <div class="mb-3">
        <label class="form-label" for="emailAddress">Email Address</label>
        <input class="form-control" id="emailAddress"  name="email" type="email" placeholder="Email Address" data-sb-validations="required, email" />
      </div>
  
      <!-- Message input -->
      <div class="mb-3">
        <label class="form-label" for="message">Message</label>
        <textarea class="form-control" id="message" name="message" type="text" placeholder="Message" style="height: 10rem;" data-sb-validations="required"></textarea>
      </div>
  
      <!-- Form submit button -->
      <div class="d-grid">
        <button class="btn btn-primary btn-lg bg-success" type="submit">Submit</button>
      </div>
  
    </form>
  
  </div>

    <footer>
        <div class="container d-md-flex py-4">

            <div class="me-md-auto text-center text-md-start">
              <div class="copyright">
                &copy; Copyright <strong><span>AutoTraders</span></strong>. All Rights Reserved
              </div> 
            </div>
          </div>
    </footer>

    <style>
    .listing, .btn-get-started {
      transition: transform 250ms;
    }

    .listing:hover, .btn-get-started:hover {
      transform: translateY(-10px);
    }
    .imgcl{
      margin-bottom: 10px;
    }
  </style>
    <script type="text/javascript" src="index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
    </body>
</html>