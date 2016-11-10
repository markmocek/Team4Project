<!DOCTYPE html>
<html>
<head>
    <?php
    session_start();
    
    $host = getenv('IP');
    $user = getenv("C9_USER");
    $password = "";                              
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
            <img src="images/reel.jpg" alt="" class="headerimage"/>
            
            <h1><span>CSUMBMDB</span></h1>
            <h2><span>CSU Monterey Bay Movie Database</span></h2>
        </div>

</head>
<body background="images/curtain.jpg">
        <form name="movieFilter" method="post" class="queryform">
        
    <!-- ************************Genre Filter************************************ -->
    <!-- -->   <div class = "genreFilter">
                    <strong style="font-size: 36px;">Search</strong>
                    <br>
    <!-- -->        <div class = "genreFilterTxt">
    <!-- -->            <b><u>Genre</u></b>
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
        <br>
    <!-- **********************Filter By Year*********************************** -->  
    <!-- -->    <div class = "yearFilter">
    <!-- -->        <div class = "yearFilterTxt">
    <!-- -->           <b><u>Year</u></b>
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
        <br>
    <!-- ********************Filter By Rating************************************** -->
    <!-- -->    <div class = "ratingFilter">
    <!-- -->        <b><u>Rating</u></b>
    <!-- -->        <div class = "rating">
    <!-- -->            Enter a minimum rating <input type="number" name="rating" max="10" value="0" style="width:50px;"> (0-10 scale)
    <!-- -->        </div>
    <!-- -->    </div>
    <!-- ************************************************************************** -->   
        <br>
                <div class = "OrderFilter">
                    <b><u>Order by Title:</u></b>
                    <div class = "order">
                        <input type="radio" name="order" value="ASC" checked> Ascending
    <!-- -->            <input type="radio" name="order" value="DESC"> Descending
                    </div>
                </div>
    <!-- ******************Filter Submit Button************************************ -->    
    <!-- -->    <div class = "button">
    <!-- -->        <input type="submit" value="Filter" class="submitbutton">
    <!-- -->    </div>
    <!-- ************************************************************************** --> 
    
    <button type="button" class="submitbutton" onclick="location.href='mainPage.php'">Home Page</button>
    
    </form>


    
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
                    echo "<div class="."distinctmovie".">";
    /**/            echo "Title: ".$row['Name']."<br>";
                    echo "Genre: ".$row['Genre']."<br>";
                    echo "Year: ".$row['Year']."<br>";
                    echo "Rating: ".$row['Rating']."<br>";
                    echo "</div>";
    /**/        }
    //***********************************************************************  
    
    ?>
    
</body>    
</html>
