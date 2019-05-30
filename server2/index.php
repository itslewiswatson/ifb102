<?php

// API key library
require("./api-keys.php");
$apiKey = new ApiKey();

// Request
$action = $_GET["action"] ?: "index";

// Response
$response = [];

// Route Map
	// Function args must be passed by reference (&$variable notation)
$routesMap = [
	"index" => static function() use ($apiKey, &$response) {
		$response["data"] = [
			"validActions" => [
				"doesKeyExist",
				"generateApiKey"
			]
		];
	},
	"generateApiKey" => static function() use ($apiKey, &$response) {
		$genKey = $apiKey->generate();
		$response["data"] = ["apiKey" => $genKey];
	},
	"doesKeyExist" => static function() use ($apiKey, &$response) {
		$providedKey = $_GET["apiKey"];
		$exists = $apiKey->doesKeyExist($providedKey);
		$response["data"] = ["doesKeyExist" => $exists];
	},
	"newApiKey" => static function() use ($apiKey, &$response) {
		$newKey = $apiKey->persistNewApiKey();
		$response["data"] = ["apiKey" => $newKey];
	}
];

// Route Logic
if ($action && is_callable($routesMap[$action])) {
	call_user_func($routesMap[$action]);
}
else {
	call_user_func($routesMap["index"]);
}

// Return response
echo json_encode($response);