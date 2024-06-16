<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $request = json_decode($_POST['request'], true);

    if (!isset($_SESSION['activitesUtilisateur'])) {
        $_SESSION['activitesUtilisateur'] = array(
            'requetes' => array()
        );
    }

    if (isset($request['activitesUtilisateur']) && isset($request['activitesUtilisateur']['requetes'])) {
        $activitesUtilisateur = $_SESSION['activitesUtilisateur'];

        if (empty($activitesUtilisateur['requetes'])) {
            $activitesUtilisateur['requetes'] = $request['activitesUtilisateur']['requetes'];
        } else {
            $activitesUtilisateur['requetes'] = array_merge($activitesUtilisateur['requetes'], $request['activitesUtilisateur']['requetes']);
        }

        $_SESSION['activitesUtilisateur'] = $activitesUtilisateur;

        echo 'Request stored successfully';
        echo '<script>console.log("Session information:", ' . json_encode($_SESSION) . ');</script>';
    } else {
        echo 'Invalid request format';
    }
}
?>