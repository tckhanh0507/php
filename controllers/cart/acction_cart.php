<?php
//remove cart by id
if(isset($_POST['remove'])){
    if($_GET['action']=='remove'){
        foreach ($_SESSION['cart']as $key =>$value){
            if($value['product_id']==$_GET['id']){
                unset($_SESSION['cart'][$key]);
                echo "<script>alert('Product cart has been Removed... ')</script>";
                echo "<script>window.location='cart.php'</script>";
            }
        }
    }

}

// function clear all cart
function clear(){
    foreach ($_SESSION['cart']as $key =>$value){
        if(true){
            unset($_SESSION['cart'][$key]);

            echo "<script>window.location='cart.php'</script>";
            echo"<h5> Cart is Empty";
        }
    }
}

// clear all cart
if(isset($_GET['clear'])){
    echo "<script>alert('Product cart has been clear... ')</script>";
    clear();
}
// send_mail cart
if(isset($_POST['sendmail'])){
    $result = getData();
    sendEmail_cart($result);
    echo "<script>alert('Email sent success ... ')</script>";
    clear();
    echo "<script>window.location='cart.php'</script>";
}
// function total cart
function total ()
{
    $total=0;
    foreach ($_SESSION['cart'] as $row) {
            $total = $total + (int)$row['price'];
        }

    return $total;
}

