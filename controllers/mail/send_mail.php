<?php
require __DIR__.'/../../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//require "../../vendor/PHPMailer/PHPMailer/src/PHPMailer.php";
//require "../../vendor/PHPMailer/PHPMailer/src/SMTP.php";
//require "../../vendor/PHPMailer/PHPMailer/src/Exception.php";

//Load Composer's autoloader



//function SendMailCart
function sendEmail_cart($result)
{
//    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $mail->Username = 'gupesdn043@gmail.com';                     //SMTP username
        $mail->Password = 'gupes.0507';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('gupesdn043@gmail.com');
        $mail->addAddress('gupesdn043@gmail.com');     //Add a recipient


        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Product';
        $items = "";
        while($row =mysqli_fetch_assoc($result)) {
            foreach ($_SESSION['cart'] as $key=>$value) {
                if ($row['id'] == $value['product_id']) {
                    $items .= "
        </tr>
              <tr>
              <td>" . $row['name'] . "</td>
              <td>" . $row['price'] . "</td>
              <td>" . $value['product_quantity'] . "</td>
              <td>" . number_format($row['price'] * $value['product_quantity'], 2) . "</td>
            </tr>";
                    $total = $total + (int)$row['price']*$value['product_quantity'];
                }

            }
        }


            $mail->Body = " 
        
        <table class='table table-bordered table-striped'>
        <tr>
        <th> Name</th>
        <th> Price</th>
        <th>Quantity</th>
        <th>Total Price</th>
        </tr>" . $items . "<td colspan='3'></td>
        <td><b>Total Price</b></td>
        <td>" . number_format($total, 2) . "</td>
      </tr>";


        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        echo '<pre>';
        print_r($e);
        echo '</pre>';
        die;
    }
}
//function SenMailAccount
function sendEmail_account($token,$role){
    //$mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'gupesdn043@gmail.com';                     //SMTP username
        $mail->Password   = 'gupes.0507';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom("gupesdn043@gmail.com");
        $mail->addAddress("gupesdn043@gmail.com");     //Add a recipient


        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Verify email';
        $mail->Body    = ' <a href="http://localhost/PHP/shopping_cart/controllers/mail/verify_email.php?token=' . $token . '&role='.$role.'">Verify Email!</a>';


        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>



