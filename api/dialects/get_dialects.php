<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/autoloaders/load_models.php';

    // variables
    @$dialect = $_GET['dialect'];

    // Dialects object initialization
    $dialectsObject = new Dialects ();
    $dialectsObject->getDialects($dialect);
?>