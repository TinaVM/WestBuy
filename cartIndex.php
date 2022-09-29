<?php
session_start();
    $getItem = $_GET['getItem']; //Retrieving item data from cart page
    if($getItem == 'book1' || $getItem == 'book2' || $getItem == 'book3' || $getItem == 'book4' || $getItem == 'book5' || $getItem == 'book6' || $getItem == 'book7' || $getItem == 'book8')
    {
        $bookid = $_GET['id'];
        $title = $_GET['bookname'];
        $price = $_GET['price'];
        $quantity = $_GET['quantity'];

        $items = array('id'=>$bookid, 'bookTitle'=>$title, 'price'=>$price, 'quantity'=>$quantity,);   //Adding items to array
        if(!empty($_SESSION['cart']))
          {
            $bIds = array_column($_SESSION['cart'], 'id');
            if(in_array($bookid, $bIds))
            {
                foreach ($_SESSION['cart'] as $key => $value) //Keeping items in cart table
                {
                    if($_SESSION['cart'][$key]['id']==$bookid)
                    {
                        $_SESSION['cart'][$key]['quantity'] = $_SESSION['cart'][$key]['quantity'] + $quantity;
                    }
            }
        }
        else
        {
            $_SESSION['cart'][] = $items;
        }
    }
          else{
            $_SESSION['cart'][] = $items;
          }
          header("location:cart.php");
        }

        //Remove an item from cart
        $get = $_GET['getID'];
        if($get == 'remove_book'){
        $pos = $_GET['index'];
        if(isset($_SESSION['cart']))
        {
            unset($_SESSION['cart'][$pos]);
            header("location:cart.php");
        }
     }

?>