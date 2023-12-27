<?php

   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, "https://sheet.best/api/sheets/c5a3d2a3-09df-45f8-b2a5-c8c7410f630c"); //paste api link
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   $output = curl_exec($ch);
   curl_close($ch); 

   //change to array format
   $result = json_decode($output);
   echo '<pre>';
    print_r($result);
    echo '</pre>';
?>

