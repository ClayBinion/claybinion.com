<?php

// Contact subject
$subject ="Portfolio Contact Form"; 

// Details
$message="$contactMessage";

// Mail of sender
$mail_from="$contactEmail"; 

// From 
$header="from: $contactName <$mail_from>";

// Enter your email address
$to ='someone@somewhere.com';
$send_contact=mail($to,$subject,$message,$header);

// Check, if message sent to your email 
// display message "We've recived your information"
if($send_contact){
echo "We've recived your contact information";
}
else {
echo "ERROR";
}

?>