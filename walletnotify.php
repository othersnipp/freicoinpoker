<?php
//error_reporting(E_ALL);        

//    include 'connection.php';

    $hostname = "localhost";
    $db_name = "poker";
    $db_username = "";
    $db_password = "";

    // Create connection
    $con = mysql_connect($hostname, $db_username, $db_password);
    mysql_select_db($db_name,$con);

    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }else{
        echo "mysql connected";
    }
    
    if(2==$argc){
//        http://poker:killer@212.125.247.50:9999/
	require_once 'jsonRPCClient.php';
	$bitcoin = new jsonRPCClient('http://poker:killer@localhost:9999/');

	$walletinfo = $bitcoin->getinfo();
	$trxinfo = $bitcoin->gettransaction($argv[1]);

        $transaction_hash = $argv[1];
        $transaction_balance = $walletinfo["balance"];
        $transaction_amount = $trxinfo["amount"];
        $transaction_confirmations = $trxinfo["confirmations"];
        $transaction_blockhash = $trxinfo["blockhash"];
        $transaction_blockindex = $trxinfo["blockindex"];
        $transaction_blocktime = $trxinfo["blocktime"];
	$transaction_blockheight = $trxinfo["refheight"];
        $transaction_txid = $trxinfo["txid"];
        $transaction_time = $trxinfo["time"];
        $transaction_timereceived = $trxinfo["timereceived"];
        $transaction_account = $trxinfo["details"][0]["account"];
        $transaction_address = $trxinfo["details"][0]["address"];
        $transaction_category = $trxinfo["details"][0]["category"];
        
        if($transaction_confirmations == "0")
        {
            $query = mysql_query("SELECT `transaction_txid` FROM transaction WHERE `transaction_txid` ='$transaction_txid'");
            if(mysql_num_rows($query) == 0)
            {
                $insert_query = "INSERT INTO transaction (transaction_hash, transaction_getinfo_balance, 
                                                        transaction_amount, transaction_confirmations, transaction_blockhash, 
                                                        transaction_blockindex, transaction_blocktime, transaction_blockheight, transaction_txid, 
                                                        transaction_time, transaction_timereceived, transaction_account, 
                                                        transaction_address, transaction_category) 
                                                        VALUES ('$transaction_hash','$transaction_balance','$transaction_amount',
                                                                '$transaction_confirmations','$transaction_blockhash','$transaction_blockindex',
                                                                '$transaction_blocktime','$transaction_blockheight','$transaction_txid','$transaction_time','$transaction_timereceived',
                                                                '$transaction_account','$transaction_address','$transaction_category')";
                
                $results = mysql_query($insert_query);   
                echo "Inserted ok with $transaction_txid - $transaction_amount $transaction_time $transaction_address";
            }
            
        }else{
            $update_query = "UPDATE transaction SET transaction_getinfo_balance = '$transaction_balance',
                                                      transaction_confirmations = '$transaction_confirmations',
                                                      transaction_blockhash = '$transaction_blockhash',
                                                      transaction_blockindex = '$transaction_blockindex',
                                                      transaction_blocktime = '$transaction_blocktime'
                                                WHERE transaction_txid = '$transaction_txid'";

            $results = mysql_query($update_query);
            echo "Updated $transaction_txid";
	
        }
}        
//        mysql_query($con,$update_query);
        
//	// Append data to the file
//	$new = "\n\nTransaction hash: ".$argv[1]."\nGetinfo balance: ".$walletinfo["balance"]
//	."\n Gettransaction amount: ".$trxinfo["amount"]
//	."\n Gettransaction confirmations: ".$trxinfo["confirmations"]
//	."\n Gettransaction blockhash: ".$trxinfo["blockhash"]
//	."\n Gettransaction blockindex: ".$trxinfo["blockindex"]
//	."\n Gettransaction blocktime: ".$trxinfo["blocktime"]
//	."\n Gettransaction txid: ".$trxinfo["txid"]
//	."\n Gettransaction time: ".$trxinfo["time"]
//	."\n Gettransaction timereceived: ".$trxinfo["timereceived"]
//	."\n Gettransaction account: ".$trxinfo["details"][0]["account"]
//	."\n Gettransaction address: ".$trxinfo["details"][0]["address"]
//	."\n Gettransaction category: ".$trxinfo["details"][0]["category"]
//	."\n Gettransaction amount: ".$trxinfo["details"][0]["amount"]
//	//."\n Gettransaction fee: ".$trxinfo["details"][0]["fee"]  // According to https://en.bitcoin.it/wiki/Original_Bitcoin_client/API_calls_list, fee is returned, but it doesn't seem that way here
//	;
//
//	$fp=fopen("notify_wallet.txt","a");
//	fwrite($fp,$new);

?>
