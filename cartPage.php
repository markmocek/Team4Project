<!DOCTYPE html>
<html>
<head>
    <?php
    session_start();
    
    $host = "127.0.0.1";
    $user = "markmocek";
    $password = "";                              
    $db = "TeamDB";
    $port = 3306;
    
    $connection = mysqli_connect($host, $user, $pass, $db, $port)or die(mysql_error());
    
    $query = "SELECT * FROM Movies";
    $result = mysqli_query($connection, $query);
    ?>
</head>
<body>
    
    <?php
    
    //************************Brutal Session Query***************************
    /**/    $query = "SELECT * FROM Movie " .
    /**/            "WHERE MovieID like '" . $_SESSION['CartMovie1'] . "'" .
    /**/            "OR MovieID like '" . $_SESSION['CartMovie2'] . "'" .
    /**/            "OR MovieID like '" . $_SESSION['CartMovie3'] . "'" .
    /**/            "OR MovieID like '" . $_SESSION['CartMovie4'] . "'" .
    /**/            "OR MovieID like '" . $_SESSION['CartMovie5'] . "'" .
    /**/            "OR MovieID like '" . $_SESSION['CartMovie6'] . "'" .
    /**/            "OR MovieID like '" . $_SESSION['CartMovie7'] . "'";
    /**/        
    /**/    $result = mysqli_query($connection, $query);
    /**/
    /**/    while ($row = mysqli_fetch_assoc($result))
    /**/        {
    /**/            echo $row['Name'] . " " . $row['Rating'] . " $" . $row['Gross'] . " " . $row['Genre'] . " " . $row['Year'] ."<br>";
    /**/        }
    //***********************************************************************  
    
    ?>
    
</body>    
</html>
