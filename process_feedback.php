<?php
date_default_timezone_set('Asia/Bangkok');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newData = [
        'rating' => isset($_POST['rate']) ? $_POST['rate'] : 'No Rating',
        'message' => htmlspecialchars($_POST['message']),
        'timestamp' => date('Y-m-d H:i:s')
    ];

    $file = 'data/feedbacks.json';

    if (file_exists($file)) {
        $currentData = json_decode(file_get_contents($file), true);
    } else {
        $currentData = [];
    }

    $currentData[] = $newData;

    if(file_put_contents($file, json_encode($currentData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE))) {
        // ส่งกลับหน้า feedback พร้อม parameter success
        header("Location: feedback.html?status=success");
    } else {
        echo "Error saving feedback.";
    }
}
?>