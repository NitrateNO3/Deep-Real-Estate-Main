<?php
session_start();
$ctext=$_POST['captchatext'];
if($ctext == $_SESSION['captcha']['code']){
$to  = 'deeprealestate@gmail.com';
$subject = 'Feedback from :'. $_POST['strno'];
$message = "<p>You have received a Feedback </p>
  <table>
    <tr><td>From </td><td>: ". $_POST['strno']."</td></tr>
        <tr><td>Mr. / Ms.</td><td>: ".$_POST['strname']."</td> </tr>
   
 <tr><td>Email</td><td>: ". $_POST['stremail']."</td>
 <tr><td>Message</td><td>: ". $_POST['strcomments']."</td>
    </tr>
  </table>";

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
$headers .= 'To: Pawan Kumar <info@deeprealestate.in>'. "\r\n";
$headers .= 'From: ' . $_POST['stremail']. "\r\n";


// Mail it
mail($to, $subject, $message, $headers);
header('location: contact.php?&msg=Thankyou, Your mail has been sent successfully!!!');} else {
 header('location: contact.php?&msg=We could not send messege!!!');   
}
?>
