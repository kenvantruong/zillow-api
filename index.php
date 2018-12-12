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
$zws_id = 'X1-ZWz187upl80nwr_2ox88'; 

$search = $_GET['address'];
$citystate = $_GET['citystate'];
$address = urlencode($search);
$citystatezip = urlencode($citystate);

$url = "https://www.zillow.com/webservice/GetSearchResults.htm?zws-id=$zws_id&address=$address&citystatezip=$citystatezip";

// Example
// http://www.zillow.com/webservice/GetSearchResults.htm?zws-id=X1-ZWz187upl80nwr_2ox88&address=14843+Oleander+St&citystatezip=San+Leandro%2c+CA


$result = file_get_contents($url);
$data = simplexml_load_string($result);
$json = json_encode($data);
$data = json_decode($json,TRUE);


$results = $data->response->results->result;
$chart = $results->links->graphsanddata;
$value = $results->zestimate->amount;

$html = "
    <p>$results</p>
    <p>$chart</p>
    <p>$value</p>
";

echo $html;
?>
</body>
</html>
