
<?php

$url = "https://www.nseindia.com/api/option-chain-indices?symbol=NIFTY";
$agent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36';

$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_VERBOSE, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERAGENT, $agent);
curl_setopt($ch, CURLOPT_URL, $url);
$result = curl_exec($ch);
// var_dump($result);
// echo 'Bhushan';
$myJson = json_decode($result);


// echo $result['expiryDates'];
preg_match('/<title>(.*)<\/title>/iU', $result, $titleMatches);
// if(count($titleMatches))
// print_r($titleMatches[0]);
// print_r($titleMatches);


echo json_encode($myJson->filtered);
// echo "helllo bhushan<br>";
// echo $result;

// echo $result;

$_SESSION['data'] = $result;
?>
<script>
   localStorage.setItem('email', '<?php echo $_SESSION['data'];?>'); 
</script>