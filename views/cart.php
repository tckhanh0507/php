<?php
session_start();
require_once "../models/connect.php";
require_once "../models/component.php";
require_once "../models/getData.php";
require_once "../controllers/mail/send_mail.php";

include "../controllers/cart/acction_cart.php";


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/style.css" ;
</head>
<body class="bg-light">
<?php require_once("../assets/headers/header_customers.php") ?>
<div class="container-fluid">
    <div class="row px-5">
        <div class="col-md-7">
            <div class="shopping-cart">
                <h6>My Cart</h6>
                <hr>
                <?php
                $total = 0;
                if(isset($_SESSION['cart'])){
                    $product_id = array_column($_SESSION['cart'],'product_id',);
                    $product_quantity = array_column($_SESSION['cart'],'quantity',);
                    $result = getData();
                     while($row =mysqli_fetch_assoc($result)) {
                        foreach ($_SESSION['cart'] as $item=>$value) {
                             if ($row['id'] == $value['product_id']) {
                                cartElement("../assets/".$row['image'], $row['name'], $row['price'], $row['id'],$value['product_quantity']);
                                $total = $total + (int)$row['price']*$value['product_quantity'];
                            }

                        }

                    }

                }else{
                    echo"<h5> Cart is Empty";
                }

                ?>
                <form method="get">
                    <button type="submit" class="btn btn-secondary" name="clear">CLear</button>
                </form>
            </div>
    </div>
        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">
            <div class="pt-4">
                <h6>PRICE DETALS</h6><hr>
                <div class="d-flex align-items-center price-details">
                    <div class="col-md-6">
                        <?php

                        if(isset($_SESSION['cart'])){
                            $count = count($_SESSION['cart']);
                            echo"<h6>Price($count items)</h6>";
                        }else{
                            echo"<h6>Price(0 items)</h6>";
                        }
                        ?>
                        <h6>Delivery Charges</h6>
                        <hr>
                        <h6>Amount Payable</h6>
                    </div>
                    <div class="col-md-6">
                        <?php echo  $total?>
                        <h6 class="text-success">FREE</h6> <hr>
                        <h6>$ <?php echo $total?></h6>
                    </div>
                </div>
                <form action="" method="post">
                    <button type="submit" class="btn btn-warning" name ="sendmail" >SendMail</button>
                </form>
                <script src="https://www.paypal.com/sdk/js?client-id=ARzSlz0wwY0hQ634Lt0nTDUpDUcxTg3N_uOyzUHqnXLJ1ouKgjZLrzi7frNCXRAckPxLkMIrWEaEsiFF&currency=USD"></script>
                <!-- Set up a container element for the button -->
                <div id="paypal-button-container"></div>
                <script>
                    var total = <?=$total?>;
                    paypal.Buttons({
                        createOrder: (data, actions) => {
                            return actions.order.create({
                                purchase_units: [{
                                    amount: {
                                        value:total
                                    }
                                }]
                            });
                        },
                            onApprove: (data, actions) => {
                            return actions.order.capture().then(function(orderData) {

                                console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                                const transaction = orderData.purchase_units[0].payments.captures[0];
                                alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);

                            });
                        }
                    }).render('#paypal-button-container');
                </script>
            </div>
        </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
