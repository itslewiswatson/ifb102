<?php

require("./api-keys.php");

$apiKey = new ApiKey();

//$baseRoute = $_SERVER["REQUEST_URI"];
$route = "/new-api-key";
$_GET["apiKey"] = "89544793d5a22d5e";

$response = [];

if ($route === "/new-api-key") {
	$genKey = $apiKey->generate();
	$response["data"] = ["apiKey" => $genKey];

}
elseif ($route === "/key/exists") {
	$providedKey = $_GET["apiKey"];
	$exists = $apiKey->doesKeyExist($providedKey);
	$response["data"] = ["doesKeyExist" => $exists];
}

echo json_encode($response);