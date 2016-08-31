<?php
include 'includes/system.php';

$paymentProcess=new Payment();
$paymentProcess->process();

//file_put_contents("text.txt",print_r($_POST,true));



?>