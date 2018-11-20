<?php 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://sounoob.com.br/curl-usando-e-abusando/');
curl_exec($ch);
curl_close($ch);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$data = curl_exec($ch);
//Em $data teremos o retorno do site, poderemos manipular essa informação como quiser.



?>