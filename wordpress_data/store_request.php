<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $request = $_POST['request'];

	//si la session exsite
    if (!isset($_SESSION['user_requests'])) {
        $_SESSION['user_requests'] = array();
    }

    //ajouter la req a la session
    $_SESSION['user_requests'][] = $request;

    echo 'Request stored successfully';
    echo '<script>console.log("Session information:", ' . json_encode($_SESSION) . ');</script>';
}
?>