

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Book Sale</title>
    <link rel="stylesheet" type="text/css" href="css/sellpage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    
</head>
<body>
    <div class="container">
        <div class="bar">
            <div class="fill"></div>
        </div>
        <div class="counter">0%</div>
        <button>Click to Request</button>
    </div>
    <div class="output">
        <span class="fa fa-check"></span>
        <div class="text">Request has been sent! Admin will send delivery and condition details shortly</div>
        <form action="index.php" method="post">
        <button class="re-btn" type="submit" name="home" style="top:100%">Home</button>
        </form>
        <form action="login.php" method="post"><
        <button class="re-btn" type="submit" name="logout" style="top:100%">Logout</button>
    </form>
    </div>
    
    
    <script type="text/javascript">
        let container = document.querySelector(".container");
        let output = document.querySelector(".output");
        let fill = document.querySelector(".fill");
        let click = document.querySelector("button");

        click.addEventListener('click',()=>{
            var a = 0;
            var run = setInterval(frames,50);
            function frames(){
                a = a + 1;
                if(a == 101){
                    clearInterval(run);
                    container.style.display = "none";
                    output.style.display = "block";
                }else{
                    var counter = document.querySelector(".counter");
                    counter.textContent = a + "%";
                    fill.style.width = a + "%";
                }
            }
        })
    </script>
    <?php
     include('scripts.php');
    
    
    ?>
</body>
</html>