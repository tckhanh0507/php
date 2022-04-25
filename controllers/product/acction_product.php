<?php
//Action add cart
if(isset($_POST['add'])){
    if($_SESSION['cart']){
        //$quantity =$_POST['quantity'];
        //$_SESSION['quantity']=$quantity;
        $item_array_id = array_column($_SESSION['cart'],"product_id");
        if( in_array($_POST['product_id'],$item_array_id)){
            echo "<script>alert('Product cart adreadly added in the cart ')</script>";
            echo "<script>window.location='product.php'</script>";
        }else {
            $item_array = array('product_id' => $_POST['product_id'],'product_quantity' => $_POST['quantity']);
            $_SESSION['cart'][] = $item_array;
        }
    }else {
        $item_array = array('product_id' => $_POST['product_id'],'product_quantity' => $_POST['quantity']);
        // create session value
        $_SESSION['cart'][0] = $item_array;

    }
}
?>
