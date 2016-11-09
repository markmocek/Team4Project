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
        
        <div class = "genreFilter">
            <div class = "genreFilterTxt">
               <b>Genre</b>
            </div>
       <!-- ************************Genre Filter************************************ -->
       <!-- -->   <div class = "price">
       <!-- -->           <input type="radio" name="genre" value="Horror"> Horror
       <!-- -->           <input type="radio" name="genre" value="Western"> Western
       <!-- -->           <input type="radio" name="genre" value="War"> War
       <!-- -->           <input type="radio" name="genre" value="Sci-Fi"> Sci-Fi
       <!-- -->           <input type="radio" name="genre" checked="checked" value="%"> All
       <!-- -->   </div>
       <!-- ************************************************************************ -->    
        </div>
        
        <div class = "yearFilter">
            <div class = "yearFilterTxt">
               <b>Year</b>
            </div>
            <div class = "yearList">
                Select Movie Year: 
                <select name = "movYear" size = "1">
                    <option>1970's</option>
                    <option>1980's</option>
                    <option>1990's</option>
                    <option>2000's</option>
                    <option>2010's</option>
                </select>
            </div>
        </div>
        
        <div class = "ratingFilter">
            <b>Rating</b>
            <div class = "rating">
                Enter a minimum rating <input type="number" name="rating" max="10" value=""> (0-10 scale)
            </div>
        </div>
        
        
        <div class = "button">
            <input type="submit" value="Filter">
        </div>
    </form>

    <div class="Movies">
        
        <form name="addToCart" method="post">
            <?php
        
        //************************Generates CheckList from DB*********************
        /**/    $query = "SELECT * FROM Movie WHERE Genre like '" . $_POST['genre'] . "'";
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
