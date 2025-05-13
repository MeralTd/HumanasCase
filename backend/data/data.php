<?php
// Enable CORS for cross-origin requests (if your frontend is on a different domain)
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// API endpoint URL
$api_url = "https://case-test-api.humanas.io/";

// Function to fetch data from the API
function fetch_login_data($url) {
    $response = @file_get_contents($url); // Use @ to suppress potential warnings
    if ($response === false) {
        return null;
    }
    $data = json_decode($response, true);
    return $data;
}

// Function to analyze login times and prepare data for prediction
function analyze_login_data($data) {
    $user_logins = [];
    if ($data && isset($data['status']) && $data['status'] === 0 && isset($data['data']['rows'])) {
        foreach ($data['data']['rows'] as $user_data) {
            $user_id = $user_data['id'];
            $user_name = $user_data['name'];
            $logins = $user_data['logins'];
            // Sort logins chronologically
            sort($logins);
            $user_logins[$user_id] = [
                'name' => $user_name,
                'logins' => $logins
            ];
        }
    }
    return $user_logins;
}

?>