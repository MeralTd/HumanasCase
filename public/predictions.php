
<?php
require_once('../backend/helpers/date_helper.php');
require_once('../backend/data/data.php');


// --- Main API Logic ---

$login_data = fetch_login_data($api_url);
$predictions = [];

if ($login_data) {
    $user_login_history = analyze_login_data($login_data);
    if ($user_login_history) {
        foreach ($user_login_history as $user_id => $user_info) {
            $logins = $user_info['logins'];
            $last_login = !empty($logins) ? end($logins) : null;

            $predictions[] = [
                'user_id' => $user_id,
                'user_name' => $user_info['name'],
                'last_login' => $last_login,
                'prediction_avg_interval' => predict_next_login_average_interval($logins),
                'prediction_day_hour_recent' => predict_next_login_day_hour_recent($logins),
                'prediction_hour_frequency' => predict_next_login_hour_frequency($logins),
            ];
        }

        // Return the predictions as JSON
        echo json_encode([
            'status' => 'success',
            'data' => $predictions
        ]);
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'No user login data found.'
        ]);
    }
} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'Failed to fetch data from the API.'
    ]);
}

?>