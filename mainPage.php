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
    <!-- ************************************************************************ -->   
        
        <div class = "button">
            <input type="submit" value="Filter">
        </div>
    </form>

    <div class="Movies">
        <form name="addToCart" method="post">
            <?php
        
        //************************Generates CheckList from DB*********************
        /**/    $query = "SELECT * FROM Movie WHERE Genre like '" . $_POST['genre'] . "' AND Rating > '" . $_POST['rating'] . "' AND Year like '" . $_POST['movYear'] . "'";
        /**/        
        /**/        $result = mysqli_query($connection, $query);
        /**/
        /**/         while ($row = mysqli_fetch_assoc($result))
        /**/         {
        /**/             echo  "<input type='checkbox' name='name' value=''>";
        /**/            echo $row['Name'] . " " . $row['Rating'] . " " . $row['Gross'] . " " . $row['Genre'] . " " . $row['Year'] ."<br>";
        /**/        }
        //***********************************************************************       
              
        
            ?>
        </form>
    </div>
    
    
</body>
</html>
