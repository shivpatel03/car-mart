<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
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
                //$info = array("name"=>$row['Name'], "description"=>$row['Description'], "year"=>$row['Year'], "kilometers"=>$row['Kilometers'], "image"=>$row['Image'] );
                $to = $row['Email'];
            }
      } catch (PDOException $e) {
        die( $e->getMessage() );
      }
      $conn = null; 
    mail($to,"NEW INTEREST IN YOUR POSTING FROM CARMART",$message,"HEADER","PARAMETER");
?>