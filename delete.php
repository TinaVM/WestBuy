<?php
    include('db.php');

    if(isset($_POST['delete'])){
        $id = $_POST['id'];
        $query = "DELETE FROM sellbooks WHERE id='$id'";
        $query_run = mysqli_query($db,$query);

        if($query_run){
            echo '<script> alert("Books deleted Successfully);</script>';
        }else{
            echo '<script> alert("Books Not deleted Successfully);</script>';
        }
    }
?>