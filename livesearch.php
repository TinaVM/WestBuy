<?php 
include('db.php');
if(isset($_POST['input'])){
    $input = $_POST['input'];
    $query = "SELECT * FROM searchbooks WHERE title LIKE '%{$input}%' OR author LIKE '%{$input}%'";

    $result = mysqli_query($db,$query);

    if(mysqli_num_rows($result) > 0){?>
    <div class="container mt-5 d-flex justify-content-between float-right">
    <table class="table table-bordered">
        <thead class="table-dark" style="color:white; font-weight: 900; text-shadow: 6px 6px 6px rgb(29, 27, 27); font-size: 25px;">
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Price</th>
            <th></th>
        </tr>
        </thead>
        <tbody style="color:white; font-weight: 900; text-shadow: 6px 6px 6px rgb(29, 27, 27); font-size: 20px;">
            <?php 
                while($row = mysqli_fetch_assoc($result)){
                    $title = $row['title'];
                    $author = $row['author'];
                    $price = $row['price'];
                    

                    ?> 
                        <tr>
                            <td><?php echo $title;?></td>
                            <td><?php echo $author;?></td>
                            <td><?php echo $price;?></td>
                            <td><?php echo "<a href='bookpage.php'><button type='button' class='btn-info' style='background: black; border-color:black;font-weight: 900; text-shadow: 6px 6px 6px rgb(29, 27, 27);'>View</button></a>";?></td>
                        </tr>
                    
                    <?php
                }
            ?>
        </tbody>
    </table>
    </div>
    
        <?php
    }else{
        echo "<h6 class='text-danger text-center mt-3' style='font-size: 70px;'>No Books Found</h6>";
    }
}
?>