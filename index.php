<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WestBuy</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/release/v5.7.2/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style-1.css"/>

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <script type="text/javascript" src="javascript/script.js"></script>
    <script src="https://kit.fontawesome.com/ea6eaed102.js" crossorigin="anonymous"></script>
<style>
    section{
        /*margin-top: 20px;*/
        width: 1900px;
        background-color: black;
        display: block;
    }
    .sec-1,.sec-2,.sec-3{
        color: white;
    font-size: 20px;
    font-weight: 900;
    text-shadow: 6px 6px 6px rgb(29, 27, 27);
    }
    @-webkit-keyframes shake{
        from{
            -webkit-transform: rotate(15deg);
        }to{
            -webkit-transform: rotate(-15deg);
            -webkit-transform-origin: center center;
        }
    }
    .footer img{
        padding-top: 10px;
        width:100px;
        display: block;
        padding-bottom: 20px;
        padding-left: 20px;
        -webkit-animation: shake .1s ease-in-out .3s 50 alternate;
        filter: invert(100%);
    }
    .footer .sec-1{
       /* top: 50px;
        float: right;*/
        margin-left: 150px;
        display: inline-block;
        position: absolute;
        top: 120%;
    }
    .footer .sec-2{
        margin-left: 150px;
        display: inline-block;
        position: absolute;
        top: 145%;
    }
    .footer .sec-3{
        margin-left: 150px;
        display: inline-block;
        position: absolute;
        top: 165%;
    }
    
    body{margin: 0;}
    .column{
        color: white;
        float: left;
  width: 70%;
  padding: 10px;
  box-sizing: border-box;
  padding-top: 40px;
    }
    .row:after {
  content: "";
  display: table;
  clear: both;
  box-sizing: border-box;
  
}
.column li{
    padding-top: 20px;
    font-weight: 900;
    text-shadow: 6px 6px 6px rgb(29, 27, 27);
}
.column h2{
    padding-left: 25px;
    font-weight: 900;
    text-shadow: 6px 6px 6px rgb(29, 27, 27);
}
.column img{
    right: 18%;
}
.column .part-1{
    margin-left: 150px;
        display: inline-block;
        position: absolute;
        top: 200%;
        right: 18%;
}
.column .part-2{
    margin-left: 150px;
        display: inline-block;
        position: absolute;
        top: 220%;
        right: 18%;
}
.column .part-1,.part-2{
    font-size: 20px;
}
</style>
</head>
<body style="background-image: url('images/library.jpg');">
<br>
<br>

      <p class="content">
          Search Through 10000+ Books Available Online.<br>
      </p>
      <?php echo '<a href="searchbooks.php" class="btn">BROWSE</a>';?>
</div>
<section class="footer" style="background: transparent; style=bottom:670px;">

       <div class="sec-1">
       <h3>Safety Gauranteed</h3>
       <p>Keeping our students away from fraudsters</p>
       </div>
       <div class="sec-2">
            <h3>Approved Trader</h3>
            <p>Well known secondhand textbook trader of the North West University</p>
        </div>
       <div class="sec-3">
         <h3>Free Collection & Deliveries</h3>
            <p>Free collections and deliveries for students of the North west University</p>
        </div>       <img src="images/delivery.png" alt="" style="top: 1160px;"> 
        <div class="row">
            <div class="column">
                <h2>INFORMATION</h2>
                <ul>
                    <li>PROCESS</li>
                    <li>CONDITION GUIDELINES</li>
                    <li>DELIVERY & COLLECTIONS</li>
                    <li>T's&C's</li>
                    <li>RETURN POLICY</li>
                    <li>ABOUT US</li>
                    <li>CONTACT US</li>
                </ul>
            </div>
            <div class="column">
                
                <img style="float:right; top: 600px;position:absolute;left:55%; margin-top:70px;" src="images/email.png" alt="">
                <div class="part-1" style="top:545px;">
                <h2>CONTACT</h2>    
                <p>enquiries@westbuy.co.za</p></div>
                <img style="float:right; top:650px;position:absolute;left:55%; top:770px;" src="images/phone.png" alt="">
                <div class="part-2" style="top:780px;"><p>014 056 4444</p></div>
                <h2 >WHAT WE ACCEPT</h2>
                <img src="images/mastercard.png" alt="" style="right: 1200px; top:570px;" >
                <img src="images/visa.png" alt="" style="right: 1200px; top:670px;">
                <p style="text-align:center">&copy; 2022 WestBuy.co.za All Rights Reserved.</p>
            </div>
        </div>
        <img src="images/shake-hands.png" alt="" style="top: 850px;">
</section>
 
    <script>

    </script>

</body>
</html>
<?php
?>