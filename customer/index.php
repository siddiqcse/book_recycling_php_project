<?php
session_start();

if(!isset($_SESSION['isLoggedIN']))
    header("location: ../login.php?Message=Login To Continue");
if (isset($_GET['Message'])) {
    print '<script type="text/javascript">
               alert("' . $_GET['Message'] . '");
           </script>';
}

if (isset($_GET['response'])) {
    print '<script type="text/javascript">
               alert("' . $_GET['response'] . '");
           </script>';
}

?>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Books">
    <meta name="author" content="Shivangi Gupta">
    <title>Book Recycling</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/my.css" rel="stylesheet">
    <style>
        .modal-header {
            background: #D67B22;
            color: #fff;
            font-weight: 800;
        }

        .modal-body {
            font-weight: 800;
        }

        .modal-body ul {
            list-style: none;
        }

        .modal .btn {
            background: #D67B22;
            color: #fff;
        }

        .modal a {
            color: #D67B22;
        }

        .modal-backdrop {
            position: inherit !important;
        }

        #login_button, #register_button {
            background: none;
            color: #D67B22 !important;
        }

        #query_button {
            position: fixed;
            right: 0px;
            bottom: 0px;
            padding: 10px 80px;
            background-color: #D67B22;
            color: #fff;
            border-color: #f05f40;
            border-radius: 2px;
        }

        @media (max-width: 767px) {
            #query_button {
                padding: 5px 20px;
            }
        }
    </style>
</head>
<body>
<?php include "nav_bar.php"; ?>

<div id="top">
    <div id="searchbox" class="container-fluid"
         style="width:112%;margin-left:-6%;margin-right:-6%; background: #00c292">
        <div>
            <form role="search" method="POST" action="Result.php">
                <input type="text" class="form-control" name="keyword" style="width:80%;margin:20px 10% 20px 10%;"
                       placeholder="Search for a Book , Author Or Category">
            </form>
        </div>
    </div>

    <div class="container-fluid" id="header">
        <div class="row">
            <div class="col-md-3 col-lg-3" id="category">
                <div style="background:#00c292;color:#fff;font-weight:800;border:none;padding:15px;"> The Book Shop
                </div>
                <ul>
                    <?php
                    include_once "../config/dbconnect.php";
                    $sql = "SELECT * from category";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $catName = $row['category_name'];
                            echo "<li> <a href='Product.php?value=$catName'>$catName</a>  </li>";
                        }
                    }
                    ?>

                </ul>
            </div>
            <div class="col-md-6 col-lg-6">
                <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                        <li data-target="#myCarousel" data-slide-to="3"></li>
                        <li data-target="#myCarousel" data-slide-to="4"></li>
                        <li data-target="#myCarousel" data-slide-to="5"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img class="img-responsive" src="img/carousel/1.jpg">
                        </div>

                        <div class="item">
                            <img class="img-responsive " src="img/carousel/2.jpg">
                        </div>

                        <div class="item">
                            <img class="img-responsive" src="img/carousel/3.jpg">
                        </div>

                        <div class="item">
                            <img class="img-responsive" src="img/carousel/4.jpg">
                        </div>

                        <div class="item">
                            <img class="img-responsive" src="img/carousel/5.jpg">
                        </div>

                        <div class="item">
                            <img class="img-responsive" src="img/carousel/6.jpg">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-lg-3" id="offer">
                <a href="Product.php?value=Regional%20Books"> <img class="img-responsive center-block"
                                                                   src="img/offers/1.png"></a>
                <a href="Product.php?value=Health%20and%20Cooking"> <img class="img-responsive center-block"
                                                                         src="img/offers/2.png"></a>
                <a href="Product.php?value=Academic%20and%20Professional"> <img class="img-responsive center-block"
                                                                                src="img/offers/3.png"></a>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid text-center" id="new">
    <div class="row">

        <?php
        include_once "../config/dbconnect.php";
        $sql = "SELECT * from book";

        try {
            $inc = 4;

            $result = $conn->query($sql);
            foreach ($result as $row) {
                $image = (!empty($row['image_url'])) ? '../images/' . $row['image_url'] : 'images/noimage.jpg';
                $title = $row['title'];
                $price = $row['price'];
                $author = $row['writer'];
                $author = $row['writer'];
                $bookID = $row['book_id'];

                if ($row['isFree'] == 1) {
                    $isFree = true;
                } else {
                    $isFree = false;
                }

                $inc = ($inc == 4) ? 1 : $inc + 1;
                if ($inc == 1) echo "<div class='row'>";
                echo "
	       							<div class='col-sm-6 col-md-3 col-lg-3'>
	       								<a href='description.php?book_id=$bookID'>
	       								<div class='book-block'>
	       								<?php
	       								 if($isFree){ ?>
	       								 <div class='tag'>Free</div>
	       								    <div class='tag-side'><img src='img/tag.png'></div>
	       								<?php }?>
	       								
	       								<img src='$image' class='book block-center img-responsive' style='height: 200px'>
	       								<hr>
	       								$title
	       								<br>Taka $price &nbsp
	       								<br>
	       								Author: <span class='label label-warning'>$author</span> </div> </a> </div>
	       						";
                if ($inc == 4) echo "</div>";
            }
            if ($inc == 1) echo "<div class='col-sm-4'></div><div class='col-sm-4'></div></div>";
            if ($inc == 2) echo "<div class='col-sm-4'></div></div>";
        } catch (PDOException $e) {
            echo "There is some problem in connection: " . $e->getMessage();
        }
        ?>
    </div>
</div>

<div class="container-fluid" id="author">
    <h3 style="color:#D67B22;"> POPULAR AUTHORS </h3>
    <div class="row">
        <?php
        include_once "../config/dbconnect.php";
        $sql = "SELECT * from book";

        try {
            $inc = 4;

            $result = $conn->query($sql);
            foreach ($result as $row) {

                $author = $row['writer'];

                $inc = ($inc == 4) ? 1 : $inc + 1;
                if ($inc == 1) echo "<div class='row'>";
                echo "
	       							<div class='col-sm-5 col-md-3 col-lg-3'>
	       								<a href='Author.php?value=$author'>
	       								<img src='img/popular-author/1.png' class='img-responsive center-block'>
	       								<h5 class='text-center'>$author</h5>
	       								 </a> </div>
	       						";
                if ($inc == 4) echo "</div>";
            }
            if ($inc == 1) echo "<div class='col-sm-4'></div><div class='col-sm-4'></div></div>";
            if ($inc == 2) echo "<div class='col-sm-4'></div></div>";
        } catch (PDOException $e) {
            echo "There is some problem in connection: " . $e->getMessage();
        }
        ?>


    </div>

</div>

<footer style="margin-left:-6%;margin-right:-6%;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-1 col-md-1 col-lg-1">
            </div>
            <div class="col-sm-7 col-md-5 col-lg-5">
                <div class="row text-center">
                    <h2>Let's Get In Touch!</h2>
                    <hr class="primary">
                    <p>Still Confused? Give us a call or send us an email and we will get back to you as soon as
                        possible!</p>
                </div>
                <div class="row">
                    <div class="col-md-6 text-center">
                        <span class="glyphicon glyphicon-earphone"></span>
                        <p>01303-129515</p>
                    </div>
                    <div class="col-md-6 text-center">
                        <span class="glyphicon glyphicon-envelope"></span>
                        <p>admin@bookrecycling.com</p>
                    </div>
                </div>
            </div>
            <div class="hidden-sm-down col-md-2 col-lg-2">
            </div>
            <div class="col-sm-4 col-md-3 col-lg-3 text-center">
                <h2 style="color:#D67B22;">Follow Us At</h2>
                <div>
                    <a href="">
                        <img title="Twitter" alt="Twitter" src="img/social/twitter.png" width="35" height="35"/>
                    </a>
                    <a href="https://www.linkedin.com/in/duetianmehedishuvo/">
                        <img title="LinkedIn" alt="LinkedIn" src="img/social/linkedin.png" width="35" height="35"/>
                    </a>
                    <a href="https://www.facebook.com/m.mehedihasanshuvo.bd">
                        <img title="Facebook" alt="Facebook" src="img/social/facebook.png" width="35" height="35"/>
                    </a>
                    <a href="">
                        <img title="google+" alt="google+" src="img/social/google.jpg" width="35" height="35"/>
                    </a>
                    <a href="">
                        <img title="Pinterest" alt="Pinterest" src="img/social/pinterest.jpg" width="35" height="35"/>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="container">
    <!-- Trigger the modal with a button -->
    <button type="button" id="query_button" class="btn btn-lg" data-toggle="modal" data-target="#query">Ask query
    </button>
    <!-- Modal -->
    <div class="modal fade" id="query" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Ask your query here</h4>
                </div>
                <div class="modal-body">
                    <form method="post" action="query.php" class="form" role="form">
                        <div class="form-group">
                            <label class="sr-only" for="name">Name</label>
                            <input type="text" class="form-control" placeholder="Your Name" name="sender" required>
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="email">Email</label>
                            <input type="email" class="form-control" placeholder="abc@gmail.com" name="senderEmail"
                                   required>
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="query">Message</label>
                            <textarea class="form-control" rows="5" cols="30" name="message" placeholder="Your Query"
                                      required></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit" value="query" class="btn btn-block">
                                Send Query
                            </button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>	