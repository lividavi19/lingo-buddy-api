<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/autoloaders/load_models.php';

    // variables
    @$term = $_GET['term'];

    // Terms object initialization
    $termsObject = new Terms ();
    $termsObject->getTerms($term);
?>