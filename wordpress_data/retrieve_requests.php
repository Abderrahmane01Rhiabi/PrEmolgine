<?php
session_start();

if (isset($_SESSION['user_requests'])) {
    $requests = $_SESSION['user_requests'];
    
    error_log('Session information: ' . json_encode($_SESSION));
    
    echo json_encode($requests);
} else {
    echo json_encode(array());
}
?>