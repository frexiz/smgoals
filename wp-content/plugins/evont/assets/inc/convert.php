<?php 

	// sanitizing input using built in filter_input available from PHP 5.2
    $amount = filter_input(INPUT_POST, 'amount', FILTER_VALIDATE_INT);
    $from   = filter_input(INPUT_POST, 'from', FILTER_SANITIZE_SPECIAL_CHARS);
    $to     = filter_input(INPUT_POST, 'to', FILTER_SANITIZE_SPECIAL_CHARS);
	
	$results = converCurrency($from,$to,$amount);
	
    $regularExpression     = '#\<span class=bld\>(.+?)\<\/span\>#s';
    preg_match($regularExpression, $results, $finalData);
    
	$str =preg_replace('/(?:<|&lt;)\/?([a-zA-Z]+) *[^<\/]*?(?:>|&gt;)/', '', $finalData[0]);
	echo number_format((float)$str, 2, '.', '');
	
	
	function converCurrency($from,$to,$amount){		

	$url = "http://www.google.com/finance/converter?a=$amount&from=$from&to=$to"; 
	$request = curl_init(); 
	$timeOut = 0; 
    curl_setopt($request, CURLOPT_URL, $url);
    curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt ($request, CURLOPT_USERAGENT,"Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)"); 
	curl_setopt ($request, CURLOPT_CONNECTTIMEOUT, $timeOut); 
	$response = curl_exec($request); 
	curl_close($request); 
	return $response;
	} 


?>