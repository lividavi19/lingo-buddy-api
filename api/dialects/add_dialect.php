<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/autoloaders/load_models.php';

    // variables
    // change the variable(s) below to $_POST
    @$dialect = $_GET['dialect'];

    // Dialects object initialization
    $dialectsObject = new Dialects ();
    $dialectsObject->addDialect($dialect);
?>