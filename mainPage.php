<!DOCTYPE html>
<html>
<head>
<!-- 
This is just a base, still working on multiple where statements for query.
-->
    <?php
    session_start();
    
    //$_SESSION['favcolor'] = 'green';
    
        
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
            <div class = "price">
                    <input type="radio" name="genre" value="Horror"> Horror
                    <input type="radio" name="genre" value="Western"> Western
                    <input type="radio" name="genre" value="War"> War
                    <input type="radio" name="genre" value="Sci-Fi"> Sci-Fi
                    <input type="radio" name="genre" checked="checked" value="All"> All
            </div>
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
    
    
    <?php
     
    echo $_SESSION['genre'];
    
    ?>
    
    
    <div class="Movies">
        <form name="addToCart" method="post">
            <?php
        
                // if ($_SESSION['genre'] = 'Horror')
                // {
                //     $query = "SELECT * FROM Movie WHERE Genre = 'Horror'";
                // }
                
                // if ($_SESSION['genre'] = 'War')
                // {
                //     $query = "SELECT * FROM Movie WHERE Genre = 'War'";
                // }
                
                $query = "SELECT * FROM Movie WHERE Genre = '" . $_POST['genre'] . "'";
                
                $result = mysqli_query($connection, $query);
    
                while ($row = mysqli_fetch_assoc($result))
                {
                    echo $row['Name'] . " " . $row['Rating'] . " " . $row['Gross'] . " " . $row['Genre'] . " " . $row['Year'] ."<br>";
                }
                
              
        
            ?>
        </form>
    </div>
    
    
</body>
</html>
