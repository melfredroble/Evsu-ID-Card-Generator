<?php
session_start();


if(!isset($_SESSION['userId'])) {

    header("Location: login.php");

}

include_once "includes/header.php";

include_once "includes/navbar.php";



$folder = isset($_GET['folder']) ? $_GET['folder'] : 'pages/';
$page = isset($_GET['page']) ? $_GET['page'] : 'homepage';
require_once($folder . $page . '.php');


include_once "includes/footer.php";



