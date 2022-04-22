<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require_once '../../vendor/autoload.php';

//function SendMailCart
function sendEmail_cart($result)
{
    //include "getData.php";
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
        $mail->Body    = ' <a href="http://localhost/PHP/shopping_cart/login/verify_email.php?token=' . $token . '&role='.$role.'">Verify Email!</a>';


        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>



