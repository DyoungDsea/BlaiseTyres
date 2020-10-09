<?php
session_cache_expire(120);
ini_set('session.gc_maxlifetime', 7200); 
@session_start();

function spamcheck($field)
  {
  $field=filter_var($field, FILTER_SANITIZE_EMAIL);
  if(filter_var($field, FILTER_VALIDATE_EMAIL))
    {
    return TRUE;
    }
  else
    {
    return FALSE;
    }
  }


  $mailcheck = spamcheck($_POST['email']);
  $email = strip_tags($_POST['email']);
  // $phone = strip_tags($_POST['phone']);
  $message = strip_tags($_POST['message']);
  $name = strip_tags($_POST['name']);
  $mailer = strip_tags($_POST['mailer']);
  $subject = strip_tags($_POST['subject']);
  $spam1 = strip_tags($_POST['spam1']);
	$spam2 = strip_tags($_POST['spam2']);

  if($name=='' or $message==''){
     $_SESSION["msg2"]= "One or more required inputs missing... Try again!";
    }
	elseif($mailcheck==FALSE){
    $_SESSION["msg2"]= "Invalid email address format. try again!"; 
    }	
    else if($spam1!==$spam2){
      $_SESSION["msg2"]= "Invalid anti-spam code supplied... Try again!"; 
        }
  else{
	//send email
  $subject="Web Enquiry from - ".$name;
	$details="Sender: ".$name."\n"."Email Address: ".$email."\n\n".$message;
    if(mail($mailer, $subject, $details, "From: $email")){
      $_SESSION["msg"]= "Your message was delivered successfully!";
    }else{
      $_SESSION["msg2"]= "Sorry!...Message could not be sent!";
    }
  }
  header("Location: contact-us"); 
?>