<?php
session_start();

if (isset($_POST["name_auth"])) {
    extract($_POST);
    $name = (isset($name)) ? $name_auth : "";
    $password = (isset($password)) ? $password : "";
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=bd_produit', $name_auth, $password);
    } catch (Exception $e) {
        $error = "Login ou mot de passe incorect";
        require "interface.php";
        die();
    }
    $_SESSION["connect"] = "true";
    header("location:http://127.0.0.1/boutik/");
    die();
} else if(!isset($_SESSION["connect"])){
    require "interface.php";
    die();
}