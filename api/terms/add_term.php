<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/autoloaders/load_models.php';

    // variables
    // change the variable(s) below to $_POST
    @$dialect = $_GET['dialect'];
    @$dialect = $_GET['dialect'];
    @$term = $_GET['term'];
    @$translation = $_GET['translation'];

    // Terms object initialization
    $termsObject = new Terms ();
    $termsObject->addTerm($dialect, $term, $translation);
?>