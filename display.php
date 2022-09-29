<?php 
    include('./db.php');
    if(isset($_POST['submit'])){
        $title=$_POST['title'];
        $author=$_POST['author'];
        $price=$_POST['price'];
        $image=$_FILES['image'];
       

        //Accessing image info from assoc array
        $imageName = $image['name'];
        
        $imagefileerror=$image['error'];
       
        $imagefiletemp = $image['tmp_name'];
        

        $filename_separate = explode('.',$imageName);
       
        $file_extension = strtolower(end($filename_separate));
        print_r($file_extension);

        //extensions put into array from image string that was separated.
        $extension = array('jpeg','jpg','png');
        if(in_array($file_extension,$extension)){
            $upload_image = 'sellBooksImages/'.$imageName;
            move_uploaded_file($imagefiletemp,$upload_image);
            $sql="insert into `sellbooks` (title,author,price,image) values('$title','$author','$price','$upload_image')";
            $result = mysqli_query($db,$sql);
            if($result){
                echo '<div class="alert alert-success" role="alert">
                <strong>Success</strong> Data inserted successfully!
              </div>';
            }else{
                die(mysqli_error($db));
            }
        }
    }
    if(isset($_GET['id'])) //Deleting a user
     {
       $ID = $_GET['id'];
       
       $sql = "Delete FROM sellbooks WHERE id='".$id."'";

       $delete = mysqli_query($db, $sql);
     }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Book Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        img{
            width: 200px;
        }
    </style>
</head>
<body>
    <h1 class="text-center my-4">Books To Sell</h1>
    <div class="container mt-5 d-flex justify-content-center">
    <table class="table table-bordered w-50">
  <thead class="table-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Author</th>
      <th scope="col">Price</th>
      <th scope="col">Image</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $sql = "Select * from `sellbooks`";
    $result = mysqli_query($db,$sql);
    while( $row = mysqli_fetch_assoc($result)){
    $id = $row['id'];
    $title = $row['title'];
    $author = $row['author'];
    $price = $row['price'];
    $image = $row['image'];

    echo '<tr>
    <th scope="row">'.$id.'</th>
    <td>'.$title.'</td>
    <td>'.$author.'</td>
    <td>'.$price.'</td>
    <td><img src='.$image.' /></td>
    <form action="delete.php" method="post">
    <input type="hidden" name="id" value="<?php echo $row["id"] ?>">
      <th><input type="submit" name="delete" class="btn btn-danger" value="DELETE"></th>
    </form>
  </tr>';
    }
   
    
    ?>
  </tbody>
</table>
    </div>
    <form action="redirect.php" method="post" class="w-50">
    <button class="btn btn-dark" type="submit" name="submit" style="top:100%">Confirm</button>
    </form>
</body>
</html>