<?php
    require_once('config.inc.php');
    
    try {
        $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);

        class listing {
            public $name;
            public $description;
            public $year;
            public $kilometers;
            }
        
        $sql = "SELECT `Name`, `Description`, `Year`, `Kilometers` FROM `listing`";
        $result = $pdo->query($sql);
        // fetch a record into an object of type Book
        while ( $b = $result->fetchObject('listing') ) {
        // the property names match the table field names
            $b->name;
            $b->description;
            $b->year;
            $b->kilometers;
        }

        echo "New record created successfully";
    }
    catch (PDOException $e) {
        die( $e->getMessage() );
    }

    $conn = null;
?>
