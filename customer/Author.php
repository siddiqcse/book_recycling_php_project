<?php
session_start();
if(!isset($_SESSION['isLoggedIN']))
       header("location: ../login.php?Message=Login To Continue");
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Books">
    <meta name="author" content="Shivangi Gupta">
    <title>Book Recycling | Author</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/my.css" rel="stylesheet">
    <style>
        #books {margin-bottom: 50px;}
        @media only screen and (width: 768px) { body{margin-top:150px;}}
        #books .row{margin-top:30px;margin-bottom:30px;font-weight:800;}
        @media only screen and (max-width: 760px) { #books .row{margin-top:10px;}}
   </style>
</head>
<body>

<?php include "nav_bar.php"; ?>

    <div id="top" >
        <div id="searchbox" class="container-fluid" style="width:112%;margin-left:-6%;margin-right:-6%;">
            <div>
                <form role="search" action="Result.php" method="post">
                    <input type="text" class="form-control" name="keyword" placeholder="Search for a Book , Author Or Category" style="width:80%;margin:20px 10% 20px 10%;">
                </form>
            </div>
        </div>

    <?php
    include_once "../config/dbconnect.php";
        if(isset($_GET['value']))
        {  
           $_SESSION['author']=$_GET['value'];
        }
    $author=$_SESSION['author'];
    if(isset($_POST['sort']))
    {
        if($_POST['sort']=="price")
                {   $query = "SELECT * FROM book WHERE writer='$author' ORDER BY price";
                    $result = mysqli_query ($conn,$query)or die(mysqli_error($conn));
                }
        else
        if($_POST['sort']=="priceh")
                {   $query = "SELECT * FROM book WHERE writer='$author' ORDER BY price DESC";
                    $result = mysqli_query ($conn,$query)or die(mysqli_error($conn));
                }
    } 
    else   
                  $query = "SELECT * FROM book WHERE writer='$author'";
                  $result = mysqli_query ($conn,$query)or die(mysql_error());
    $i=0;
    echo '<div class="container-fluid" id="books">
        <div class="row">
          <div class="col-xs-12 text-center" id="heading">
                 <h2 style="color:#D67B22;text-transform:uppercase;margin-bottom:0px;"> '. $author .' STORE </h2>
           </div>
        </div>      
        <div class="container fluid">
             <div class="row">
                  <div class="col-sm-5 col-sm-offset-6 col-md-5 col-md-offset-7 col-lg-4 col-lg-offset-8">
                       <form action="';echo $_SERVER['PHP_SELF'];echo'" method="post" class="pull-right">
                           <label for="sort">Sort by &nbsp: &nbsp</label>
                            <select name="sort" onchange="form.submit()">
                                <option value="default" name="default"  selected="selected">Select</option>
                                <option value="price" name="price">Low To High Price </option>
                                <option value="priceh" name="priceh">Highest To Lowest Price </option>
                            </select>
                       </form>
                  </div>
              </div>
        </div>';

        if(mysqli_num_rows($result) > 0) 
        {   
            while($row = mysqli_fetch_assoc($result)) 
            {
            $path="../images/" .$row['image_url'];
            $description="description.php?book_id=".$row["book_id"];
            if($i%4==0)
            echo '<div class="row">';
            echo'
               <a href="'.$description.'">
                <div class="col-sm-6 col-md-3 col-lg-3 text-center">
                    <div class="book-block" style="border :3px solid #DEEAEE;">
                        <img class="book block-center img-responsive" src="'.$path.'">
                        <hr>
                         ' . $row["title"] . '<br>
                        ' . $row["price"] .'  &nbsp
                       
                    </div>
                </div>
                
               </a> ';
            $i++;
            if($i%4==0)
            echo '</div>';
            }
        }
    echo '</div>';
    ?>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>		