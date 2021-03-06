<?php
if(isset($_POST['obraz_text'])) {

    $email_to = "iokov@obrazy.by";
    $email_subject = "Новый образ";
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
    // validation expected data exists
    if(!isset($_POST['obraz_text'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
     
    $name = $_POST['name'];
    $obraz_name = $_POST['obraz_name']; 
    $obraz_text = $_POST['obraz_text'];

/*     
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
   
  if(strlen($obraz) < 2) {
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
     
    $email_message .= "Имя: ".clean_string($name)."\n";
    $email_message .= "Название: ".clean_string($obraz_name)."\n";
    $email_message .= "Образ: ".clean_string($obraz_text)."\n";
     
     
// create email headers
$headers = 'From: '.$email_to."\r\n".
'Reply-To: '.$email_to."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  

}
?>