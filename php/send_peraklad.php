<?php
if(isset($_POST['peraklad'])) {

    $email_to = "iokov@obrazy.by";
    $email_subject = "Пераклад";
 /*    
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
*/     
     
    $name = $_POST['name'];
    $email_from = "it.iokov@gmail.com"; 
    $obraz = ucfirst ($_POST['obraz']);
    $vobraz = $_POST['vobraz'];
    $peraklad = $_POST['peraklad']; 

/*     
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
   
  if(strlen($peraklad) < 2) {
    $error_message .= 'The obraz you entered do not appear to be valid.<br />';
  }
  if(strlen($error_message) > 0) {
    died($error_message);
  }
  */
    $email_message = "";
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
     
    $email_message .= "Образ: ".clean_string($obraz)."\n";
    $email_message .= "Новое название: ".clean_string($vobraz)."\n";
    $email_message .= "Перевод: ".clean_string($peraklad)."\n";
    $email_message .= "От кого: ".clean_string($name)."\n";
     
     
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  

}
?>