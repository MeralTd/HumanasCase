<?php

// Algorithm 1: Average Interval
function predict_next_login_average_interval($logins) {
    // Predicts the next login by adding the average time interval between past logins
    // to the last login time.
    if (count($logins) < 2) {
        return null; // Not enough data for prediction
    }

    $timestamps = array_map(function ($login) {
        return strtotime($login);
    }, $logins);

    $intervals = [];
    for ($i = 0; $i < count($timestamps) - 1; $i++) {
        $intervals[] = $timestamps[$i + 1] - $timestamps[$i];
    }

    $average_interval = array_sum($intervals) / count($intervals);
    $last_login_timestamp = end($timestamps);
    $next_login_timestamp = $last_login_timestamp + $average_interval;

    return date('Y-m-d\TH:i:s\Z', (int) $next_login_timestamp);

}

// Algorithm 2: Day and Hour Pattern (Most Recent)
function predict_next_login_day_hour_recent($logins) {
    // Predicts the next login to be on the same day of the week and around the same
    // hour as the *most recent* login.
    if (empty($logins)) {
        return null;
    }

    $last_login = end($logins);
    $last_login_timestamp = strtotime($last_login);
    $last_login_day_of_week = date('w', $last_login_timestamp); // 0 (Sunday) to 6 (Saturday)
    $last_login_hour_minute = date('H:i:s', $last_login_timestamp);

    $now = time();
    $predicted_timestamp = strtotime("next " . date('l', strtotime("Sunday +{$last_login_day_of_week} days")), $now);
    $predicted_timestamp = strtotime(date('Y-m-d', $predicted_timestamp) . " {$last_login_hour_minute}");

    // Ensure the predicted time is in the future
    if ($predicted_timestamp <= $now) {
        $predicted_timestamp = strtotime("+1 week", $predicted_timestamp);
    }

    return date('Y-m-d\TH:i:s\Z', $predicted_timestamp);
}

// Algorithm 3: Simple Hour Frequency (Top Hour)
function predict_next_login_hour_frequency($logins) {
    // Predicts the next login to be around the most frequent hour of the day
    // the user has logged in, on the next day after the last login.
    if (empty($logins)) {
        return null;
    }

    $hours = [];
    foreach ($logins as $login) {
        $hour = date('H', strtotime($login));
        $hours[$hour] = ($hours[$hour] ?? 0) + 1;
    }

    if (empty($hours)) {
        return null;
    }

    arsort($hours); // Sort hours by frequency in descending order
    $most_frequent_hour = key($hours);

    $last_login = end($logins);
    $last_login_timestamp = strtotime($last_login);
    $next_day_timestamp = strtotime("+1 day", strtotime(date('Y-m-d', $last_login_timestamp)));
    $predicted_timestamp = strtotime(date('Y-m-d', $next_day_timestamp) . " {$most_frequent_hour}:00:00");

    return date('Y-m-d\TH:i:s\Z', $predicted_timestamp);
}
?>