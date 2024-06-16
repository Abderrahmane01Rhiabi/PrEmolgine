<?php
session_start();

if (isset($_SESSION['activitesUtilisateur'])) {
    echo json_encode($_SESSION['activitesUtilisateur']);
} else {
    echo json_encode(array('requetes' => array())); 
}
?>