<?php
error_reporting(1);
session_start();
//Load Configuration
	include 'includes/config.php';
	include 'includes/functions.php';
	// Load modules then setup ones used by system
	
	
	$player_info=$_SESSION;
	//print_r($player_info); 
/*if($player_info['player']->display_name=="" && $player_info['player']->id=="")
{
	header("location:index.php");
}*/

$user_id	=	$player_info['player']->id;
$name		=	$player_info['player']->display_name;
$toemail	=	$player_info['player']->email;
$siteURL	=	"http://" . $_SERVER['HTTP_HOST']; 
//$toemail	=	"suresh@osiztechnologies.com";
$site_email	=	"fredrikbod@gmail.com";

$sel	=	"select * from  player where id='$user_id'";
$res	=	mysql_query($sel);
$num_rows=mysql_num_rows($res);
$row=mysql_fetch_array($res);
if($num_rows>0)
{
$amount	=	$row['balance'];
$your_array[] = $row;
}
$AMT	=	$amount;

	extract($_REQUEST);
	$min = "50";
	if($address!="" && $sum!="" && $wd_sum!="")
	{
		$user_id	=	$player_info['player']->id;		
		if($sum>=$min)
		{
			if($wd_sum<$sum)
			{
				if($sum<$AMT)
				{
					$today		=	date('Y-m-d H:i:s');
					$ins		=	"insert into withdraw(`user_id`,`address`,`withdraw_amt`,`receive_amt`,`dateCreated`)values('$user_id','$address','$sum','$wd_sum','$today')";
					$exe		=	mysql_query($ins);
					$Lastid		=	base64_encode(mysql_insert_id());
					if($exe)
					{		
						$email_subject	=	"Withdraw Request From Freicoinpoker";
						$email_content	=	'<div style="padding: 10px; width: 720px; margin: auto;">
							<div style="width: 670px; margin: 5px 0pt; padding: 20px; background-repeat: no-repeat; border: 5px solid #1B4B61; background-color: #E8E8E8;">
							<table style="background-color: rgb(255, 255, 255);" width="100%">
								<tbody>
									<tr>
										<td style="padding: 20px 30px 5px;">
										<h2 style="color: rgb(84, 84, 84); margin: 0pt 20px 5px; font-family: Helvetica,Arial,sans-serif; font-size: 18px;">Dear '.$name.',</h2>

										<p style="font-family: Helvetica,Arial,sans-serif; color: rgb(84, 84, 84); margin: 0pt 20px; font-size: 14px; text-align: left; padding: 15px 0px;">Thank you for withdraw request</p>

										<p style="font-family: Helvetica,Arial,sans-serif; color: rgb(84, 84, 84); margin: 0pt 20px; font-size: 14px; text-align: left; padding: 15px 0px;"><a href="'.$siteURL.'/confirm.php?Lastid='.$Lastid.'"> Click here to confirm</a></p>

										<p style="font-family: Helvetica,Arial,sans-serif; color: rgb(84, 84, 84); margin: 0pt 20px; font-size: 14px; text-align: left; padding: 15px 0px;"><a href="'.$siteURL.'/cancel.php?Lastid='.$Lastid.'"> Click here to cancel</a></p>
										
										</td>
									</tr>
								</tbody>
							</table>
							</div>

							<p>&nbsp;</p>
							</div>';
						$headers = "From: " . $site_email . "\r\n";
						$headers .= "Reply-To: ". $site_email . "\r\n";
						$headers .= "MIME-Version: 1.0\r\n";
						$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
						
						//echo $toemail,$email_subject,$email_content,$headers;exit;
						mail($toemail,$email_subject,$email_content,$headers);
						echo 'Your withdraw request link was send your email id kindly check';
					}
					else
					{
						 echo (die('Could not connect: ' . mysql_error()));
					}
				}
				else			
				{
				echo 'Your balance is insufficent';		
						
				}
			}
			else
			{
				echo 'Your receive amount is insufficent';			
			}
		}
		else
		{
			echo 'Minimum withdraw request chips limit is 50 ';			
		}
	}
	else
	{
		
		echo 'Enter your valid information';
		
	}




?>
    
    
