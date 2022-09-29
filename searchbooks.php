<?php 
include('db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse Books</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style-1.css">
</head>
<body style="background-image: url('images/alfons-morales-YLSwjSy7stw-unsplash.jpg');">
<section class = "nb">
  <div class="topnavbar" id="myTopNavbar">
        <img src="./images/westbuy-logo.png" alt="" class="logo" style="height:70px ;">
        <?php echo '<a href="homepage.php">HOME</a>';?> 
        <?php echo '<a href="bookpage.php">BOOKS</a>';?>
        <?php echo '<a href="contact.php">CONTACT</a>';?>
        <?php echo '<a href="about.php">ABOUT</a>';?> 
        <?php echo '<a href="sellpage.php">REQUEST TO SELL</a>';?> 
        <?php echo '<a href="logout.php">Log Out</a>';?> 
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
          <i class="fa fa-bars"></i>
        </a>
</div>
<img src="./images/cart.png" alt="" class="cart" onclick="document.location.href='cart.php';return '';">
</section>
    <div class="container" style="max-width: 50%;">
        <div class="text-center mt-5 mb-4">
        <br>
    <br>
    <br>
            <h2 class="heading">Search Books</h2>
        </div>
        <input type="text" class="form-control" id="live_search" name="live_search" autocomplete="off" placeholder="Browse Books...">
    
    </div>
    <div id="searchresult"></div>
    <!--<img src="./images/library.jpg" alt="" style="height: 1024px; width: 1024px; padding-left:0px; margin:0;">-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $("#live_search").keyup(function(){
                var input = $(this).val();
               // alert(input);

               if(input != ""){
                $.ajax({
                    url:"livesearch.php",
                    method:"POST",
                    data:{input:input},
                    //data will be shown in div with search result
                    success:function(data){
                        $("#searchresult").html(data);
                        $("#searchresult").css("display","block");
                    }
                });
               }else{
                //if input empty section will be hidden 
                $("#searchresult").css("display","none");
               }
            });
        });
    </script>
</body>
</html>