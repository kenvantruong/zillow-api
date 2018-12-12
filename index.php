<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<!-- PHP  -->
<?php
$zillow_id = 'X1-ZWz1gslkfz42kr_13bwv'; 

$search = $_GET['address'];
$citystate = $_GET['citystate'];
$address = urlencode($search);
$citystatezip = urlencode($citystate);

$url = "https://www.zillow.com/webservice/GetSearchResults.htm?zws-id=$zillow_id&address=$address&citystatezip=$citystatezip";


$result = file_get_contents($url);
$data = simplexml_load_string($result);
$json = json_encode($data);
$data = json_decode($json,TRUE);

    

echo $data;  
?>
    
    <!-- $data->response->results->result[0]->zpid; -->
</body>
</html>
