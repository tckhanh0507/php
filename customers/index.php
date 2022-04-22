<?php
session_start();
require_once "../php/connect.php";
require_once "../php/component.php";
require_once "../php/getData.php";

include "acction/acction_product.php";
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
    <link rel="stylesheet" href="../css/style.css" ;
</head>
<body>
<?php require_once("../php/header_customers.php") ?>
<!--START CAROUSEL-->
    <div class="carousel">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="banner" style="background-image: url(../images/1.webp);height: 80vh;
        background-repeat: no-repeat; background-size: cover; background-position: center;padding:6rem 0; ">
                        <div class="container">
                            <div class="content d-flex justify-content- align-items-center mt-7">
                                <div class="flex">
                                    <div class="banner-heading mb-4">
                                        <p class="fs-3 mb-3" style="color: #9e9999; color:#ffffff;">
                                            Less Noise
                                        </p>
                                        <h2 class="slide-heading fs-1" style="color: #9e9999; color:#ff9cb2;">More <span>Sound</span></h2>
                                            <span class="fw-normal" style="font-size: 20px;">History Month Collection 2018</span>
                                    </div>
                                  <button class="px-4 py-2" style="background: #ef6d9f;color: white;outline: none;border: none">Shop Now</button>

                                </div>

                            </div>

                        </div>

                    </div>
                </div>
                <div class="carousel-item">
                    <div class="banner" style="background-image: url(../images/2.webp);height: 80vh;

        background-repeat: no-repeat; background-size: cover; background-position: center;padding:6rem 0; ">

                        <div class="container">
                            <div class="content d-flex justify-content- align-items-center mt-7">
                                <div class="flex">
                                    <div class="banner-heading mb-4">
                                        <p class="fs-3 mb-3" style="color: #9e9999; color:#ffffff;">
                                            Less Noise
                                        </p>
                                        <h2 class="slide-heading fs-1" style="color: #9e9999; color:#ff9cb2;">More <span>Sound</span></h2>
                                        <span class="fw-normal" style="font-size: 20px;">History Month Collection 2018</span>
                                    </div>
                                    <button class="px-4 py-2" style="background: #ef6d9f;color: white;outline: none;border: none">Shop Now</button>

                                </div>

                            </div>

                        </div>

                    </div>
                </div>
                <div class="carousel-item">
                    <div class="banner" style="background-image: url(../images/3.webp);height: 80vh;

        background-repeat: no-repeat; background-size: cover; background-position: center;padding:6rem 0; ">

                        <div class="container">
                            <div class="content d-flex justify-content- align-items-center mt-7">
                                <div class="flex">
                                    <div class="banner-heading mb-4">
                                        <p class="fs-3 mb-3" style="color: #9e9999; color:#ffffff;">
                                            Less Noise
                                        </p>
                                        <h2 class="slide-heading fs-1" style="color: #9e9999; color:#ff9cb2;">More <span>Sound</span></h2>
                                        <span class="fw-normal" style="font-size: 20px;">History Month Collection 2018</span>
                                    </div>
                                    <button class="px-4 py-2" style="background: #ef6d9f;color: white;outline: none;border: none">Shop Now</button>

                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
<!--END CAROUSEL-->
<!--START PRODUCT-->
    <div class="product-cart" >
       <div class="container-fluid">
           <div class="row text-center py-5 ">
               <?php
               $result = getData();
               while ($row = mysqli_fetch_assoc($result)){
                   component($row['name'],$row['price'],"../".$row['image'],$row['id']);
               }
               ?>
               <div class="col-md-3 col-sm-6 my-3 my-md-0">
               </div>
               <div class="col-md-3 col-sm-6 my-3 my-md-0">
               </div>
           </div>
       </div>
    </div>
<!--END PRODUCT-->
<!--START FOOTER-->
<div data-section-id="footer" data-section-type="section-footer" style=" ">
    <div class="footer ">

        <div class="content">

            <div class="footer-top" style="background:#000000">
                <div class="container v2">
                    <div class="row">


                        <div class="footer-column-1 col-lg-3 col-md-12">
                            <img src="../images/logo_300x300.webp" style="background: #000000">
                            <p style="color:#999" class="des">
                                Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas..
                            </p>
                            <div class="contact">
                                <p style="color:#999">
                                    <strong>E :</strong> hello@cbox2.com
                                </p>
                                <p style="color:#999">
                                    <strong>UK :</strong> (303) 795-0928
                                </p>
                                <p style="color:#999">
                                    <strong>International :</strong> +44203 788 7842
                                </p>
                            </div>

                            <div class="footer-top-socials">
                                <h3 style="color:#fff;">Follow us</h3>
                                <a href="#" style=" color: #fff;font-size: 25px">
                                    <i class="fa-brands fa-twitter-square"></i>
                                </a>
                                <a href="#"style=" color: #fff;font-size: 25px">
                                    <i class="fa-brands fa-dribbble-square"></i>
                                </a>
                                <a href="#" style=" color: #fff;font-size: 25px">
                                    <i class="fa-brands fa-facebook"></i>
                                </a>
                                <a href="#" style=" color: #fff;font-size: 25px">
                                    <i class="fa-brands fa-instagram-square"></i>
                                </a>
                            </div>
                        </div>



                        <div class="footer-column-2 col-lg-3 col-sm-6 col-12">

                            <h3 style="color:#fff">ABOUT US</h3>
                            <ul class="list-unstyled">
                                <li><a style="color:#999" href="/">Harman Corporate</a></li>
                                <li><a style="color:#999" href="/">Careers</a></li>
                                <li><a style="color:#999" href="/">Privacy Policy</a></li>
                                <li><a style="color:#999" href="/">Terms of Use</a></li>
                                <li><a style="color:#999" href="/">Why Buy Direct</a></li>
                                <li><a style="color:#999" href="/">Newsletter</a></li>
                            </ul>
                        </div>
                        <div class="footer-column-3 col-lg-3 col-sm-6 col-12">
                            <h3 style="color:#fff">SUPPORT</h3>
                            <ul class="list-unstyled">
                                <li><a style="color:#999" href="/">Customer Support</a></li>
                                <li><a style="color:#999" href="/">Shipping Policy</a></li>
                                <li><a style="color:#999" href="/">Returns</a></li>
                                <li><a style="color:#999" href="/">Order Status</a></li>
                                <li><a style="color:#999" href="/">Bulk Purchase Form</a></li>
                                <li><a style="color:#999" href="/">Contact Us</a></li>
                            </ul>
                        </div>
                        <div class="footer-column-4 col-lg-3 col-12">
                            <h3 style="color:#fff" class="title">NEWLETTERS</h3>
                            <p style="color:#999">Learn about events, contests, designing tips and more? Of course you do!</p>
                            <form action="#" method="post">
                                <div class="form-group">
                                    <input type="email" class="form-control" id="exampleinputemail1" aria-describedby="Emailhelp" placeholder="Your email adress...">
                                </div>
                                <a href="" class="btn-newsletter" style="background: #232529"><i class="icon-mail" style="color: #fff"></i></a>
                            </form>
                            <div class="payment-method">
                                <h3 style="color:#999">We Accept</h3>
                                <img src="//cdn.shopify.com/s/files/1/0256/4040/2999/files/payment-method.png?v=1578391592" class="img-responsive" alt="payment">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom" style="background:#000000">
                <div class="container v2">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12 text-md-left">
                            <p class="desc" style="color:#999">© Copyright 2019 by <a href="http://engotheme.com">EngoTheme</a>. All Rights Reserved</p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <ul class="list-unstyled d-flex flex-wrap">
                                <li><a style="color:#999" href="/pages/about-us">ABOUT</a></li>
                                <li><a style="color:#999" href="/">CUSTOMER SERVICE</a></li>
                                <li><a style="color:#999" href="/">PRIVACY POLICY</a></li>
                                <li><a style="color:#999" href="/">TERMS</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--END FOOTER-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
