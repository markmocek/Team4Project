<!DOCTYPE html>
<html>
<head>
<!-- 
This is just a base, still working on multiple where statements for query.
-->
    <?php
    session_start();
    
    //$_SESSION['favcolor'] = 'green';
    
        if(isset($_POST['id'])){
            $host = "127.0.0.1";
            $user = "markmocek";
            $password = "";                              
            $db = "TeamDB";
            $port = 3306;
            
            $connection = mysqli_connect($host, $user, $pass, $db, $port)or die(mysql_error());
        
            $query = "SELECT * FROM Movies where MovieId=".$_POST['id']."";
            $result = mysqli_query($connection, $query);
        }
        

    ?>
</head>
<body>
        
</body>
</html>