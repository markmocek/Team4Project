<!DOCTYPE html>
<html>
<head>
    <?php
    session_start();
        $host = getenv('IP');
        $user = getenv("C9_USER");
        $pass = "";                              
        $db = "TeamDB";
        $port = 3306;
        
        $connection = mysqli_connect($host, $user, $pass, $db, $port)or die(mysql_error());
    
        $query = "SELECT * FROM Movies";
        $result = mysqli_query($connection, $query);
        
    ?>
    
    <!-- Link to JQuery file -->
    <script src="jquery-3.1.1.min.js"></script>
    
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
        <div class="header">
            <img src="images/reel.jpg" alt="" />
            
            <h1><span>CSUMBMDB</span></h1>
            <h2><span>CSU Monterey Bay Movie Database</span></h2>
        </div>
</head>
<body>
    <form name="movieFilter" method="post">
        
    <!-- ************************Genre Filter************************************ -->
    <!-- -->   <div class = "genreFilter">
    <!-- -->        <div class = "genreFilterTxt">
    <!-- -->            <b>Genre</b>
    <!-- -->        </div>
    <!-- -->        <div class = "price">
    <!-- -->            <input type="radio" name="genre" value="Horror"> Horror
    <!-- -->            <input type="radio" name="genre" value="Western"> Western
    <!-- -->            <input type="radio" name="genre" value="War"> War
    <!-- -->            <input type="radio" name="genre" value="Sci-Fi"> Sci-Fi
    <!-- -->            <input type="radio" name="genre" checked="checked" value="%"> All
    <!-- -->        </div>  
    <!-- -->   </div>
    <!-- ************************************************************************ -->
        
    <!-- **********************Filter By Year*********************************** -->  
    <!-- -->    <div class = "yearFilter">
    <!-- -->        <div class = "yearFilterTxt">
    <!-- -->           <b>Year</b>
    <!-- -->        </div>
    <!-- -->        <div class = "yearList">
    <!-- -->            Select Movie Year: 
    <!-- -->            <select name = "movYear" size = "1">
    <!-- -->                <option selected="selected" value="%">Any</option>
    <!-- -->                <option>1978</option>
    <!-- -->                <option>1979</option>
    <!-- -->                <option>1982</option>
    <!-- -->                <option>1990</option>
    <!-- -->                <option>2009</option>
    <!-- -->                <option>2012</option>
    <!-- -->                <option>2015</option>
    <!-- -->            </select>
    <!-- -->        </div>
    <!-- -->    </div>
    <!-- ************************************************************************ -->  
        
    <!-- ********************Filter By Rating************************************** -->
    <!-- -->    <div class = "ratingFilter">
    <!-- -->        <b>Rating</b>
    <!-- -->        <div class = "rating">
    <!-- -->            Enter a minimum rating <input type="number" name="rating" max="10" value="0"> (0-10 scale)
    <!-- -->        </div>
    <!-- -->    </div>
    <!-- ************************************************************************** -->   
                <div class = "OrderFilter">
                    <b>Order by Name: </b>
                    <div class = "order">
                        <input type="radio" name="order" value="ASC" checked> Ascending
    <!-- -->            <input type="radio" name="order" value="DESC"> Descending
                    </div>
                </div>
    <!-- ******************Filter Submit Button************************************ -->    
    <!-- -->    <div class = "button">
    <!-- -->        <input type="submit" value="Filter">
    <!-- -->    </div>
    <!-- ************************************************************************** --> 
    
    </form>
    
    <div class="Movies">
        
        <form name="addToCart" method="post">
            <?php

    //************************Generates CheckList from DB********************
    /**/    $query = "SELECT * FROM Movie WHERE Genre like '" . $_POST['genre'] . "' AND Rating > '" . $_POST['rating'] . "' AND Year like '" . $_POST['movYear'] . "'";
    /**/        
    /**/        $result = mysqli_query($connection, $query);
    /**/
    /**/         while ($row = mysqli_fetch_assoc($result))
    /**/         {
    /**/            echo "<div id='sdMovie" . $row['MovieID'] . "'>";
    /**/            echo  "<input type='checkbox' name='addCart" . $row['MovieID'] . "' value='" . $row['MovieID'] . "'>";
    /**/            echo $row['Name'] . " " . $row['Rating'] . " $" . $row['Gross'] . " " . $row['Genre'] . " " . $row['Year'] ."<br>";
    /**/            echo "</div>";
    /**/
    //************************Hidden Info************************************
    /**/            echo "<div id='hdMovie" . $row['MovieID'] . "'>";
    /**/            
    /**/            //Directors
    /**/            $queryA = "SELECT * FROM Directs INNER JOIN Biography ON Directs.bioId=Biography.bioId WHERE MovieId=".$row['MovieID'];
    /**/            $resultA = mysqli_query($connection, $queryA);
    /**/            echo "Directed By: <br>";
    /**/            while ($rowA = mysqli_fetch_assoc($resultA))
    /**/            {
    /**/                echo $rowA["name"]."<br>";
    /**/            }
    /**/            
    /**/            //Actors
    /**/            $queryA = "SELECT * FROM Stars INNER JOIN Biography ON Stars.bioId=Biography.bioId WHERE MovieId=".$row['MovieID'];
    /**/            $resultA = mysqli_query($connection, $queryA);
    /**/            echo "Starring: <br>";
    /**/            while ($rowA = mysqli_fetch_assoc($resultA))
    /**/            {
    /**/                echo $rowA["name"]." as ".$rowA["Role"]."<br>";
    /**/            }
    /**/            
    /**/            //Writers
    /**/            $queryA = "SELECT * FROM Writes INNER JOIN Biography ON Writes.bioId=Biography.bioId WHERE MovieId=".$row['MovieID'];
    /**/            $resultA = mysqli_query($connection, $queryA);
    /**/            echo "Written By: <br>";
    /**/            while ($rowA = mysqli_fetch_assoc($resultA))
    /**/            {
    /**/                echo $rowA["name"]."<br>";
    /**/            }
    /**/
    /**/            echo "</div>";
    /**/         }
    //***********************************************************************       
                
            ?>
            
    <!-- ********************Add To Cart Submit Button***************************** --> 
    <!-- -->        <div class = "button">
    <!-- -->            <input type="submit" value="Add To Cart">
    <!-- -->        </div>
    <!-- ************************************************************************** --> 
    
        </form>
    </div>
    
    <div class="Test Cart">
        
        <?php
        
    //*****************Assign Session Variables******************************
    /**/    $_SESSION['CartMovie1'] = $_POST['addCart1'];
    /**/
    /**/    $_SESSION['CartMovie2'] = $_POST['addCart2'];
    /**/
    /**/    $_SESSION['CartMovie3'] = $_POST['addCart3'];
    /**/
    /**/    $_SESSION['CartMovie4'] = $_POST['addCart4'];
    /**/
    /**/    $_SESSION['CartMovie5'] = $_POST['addCart5'];
    /**/
    /**/    $_SESSION['CartMovie6'] = $_POST['addCart6'];
    /**/
    /**/    $_SESSION['CartMovie7'] = $_POST['addCart7'];
    //***********************************************************************

        ?>
        
    </div>
    
    <!-- ************************Go To Cart Page*********************************** --> 
    <!-- -->     <div class="goToCart">
    <!-- -->        <form method="get" action="cartPage.php">
    <!-- -->            <button type="submit">Go To Cart</button>
    <!-- -->        </form>
    <!-- -->     </div>
    <!-- ************************************************************************** --> 
    
     <script type="text/javascript">
        
    //*********************Hidden Movie Info Loop*********************************
    /**/
    /**/                //Nothing Yet
    /**/        
    //****************************************************************************
    
    //*********************Hidden Movie Info**************************************
    /**/
    /**/            //One
    /**/            $('#hdMovie1').hide();
    /**/            
    /**/            $('#sdMovie1').click(function()
    /**/            {
    /**/                $('#hdMovie1').toggle();
    /**/            });
    /**/
    /**/            //Two
    /**/            $('#hdMovie2').hide();
    /**/            
    /**/            $('#sdMovie2').click(function()
    /**/            {
    /**/                $('#hdMovie2').toggle();
    /**/            });
    /**/
    /**/            //Three
    /**/            $('#hdMovie3').hide();
    /**/            
    /**/            $('#sdMovie3').click(function()
    /**/            {
    /**/                $('#hdMovie3').toggle();
    /**/            });
    /**/
    /**/            //Four
    /**/            $('#hdMovie4').hide();
    /**/            
    /**/            $('#sdMovie4').click(function()
    /**/            {
    /**/                $('#hdMovie4').toggle();
    /**/            });
    /**/
    /**/            //Five
    /**/            $('#hdMovie5').hide();
    /**/            
    /**/            $('#sdMovie5').click(function()
    /**/            {
    /**/                $('#hdMovie5').toggle();
    /**/            });
    /**/
    /**/            //Six
    /**/            $('#hdMovie6').hide();
    /**/            
    /**/            $('#sdMovie6').click(function()
    /**/            {
    /**/                $('#hdMovie6').toggle();
    /**/            });
    /**/
    /**/            //Seven
    /**/            $('#hdMovie7').hide();
    /**/            
    /**/            $('#sdMovie7').click(function()
    /**/            {
    /**/                $('#hdMovie7').toggle();
    /**/            });
    /**/        
    //****************************************************************************
        
    </script>
    
</body>
</html>
