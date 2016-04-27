<?php

function numericValidation ($number) {
    if (is_numeric($number)) {
        return $number;
    } else {
        return 0;
    }
}

function emailValidation ($email) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) { //&& is_email($email)) {
        print 'email '. $email;
        return $email;
    } else {
        return false;
    }
}

/**
 * This function will only allow a-z, A-Z, - (dash), and ' (apostrophe) characters.
 *
 * @param $name
 * @return string
 */
function nameValidation($name) {
    $cleanname = '';

    if (!empty($name)) {
        $cleanname = preg_replace("/[^a-zA-Z-'\/ ]/", "", $name);
        // remove multiple spaces to single space
        $cleanname = preg_replace('!\s+!', ' ', $cleanname);
    }

    return $cleanname;
}

/**
 * This function will Convert single < characters to entity, strip all tags, remove line breaks, tabs and extra white space.
 * @param $text
 * @return mixed
 */
function textValidation($text) {
    $cleantext = sanitize_text_field ($text);

    return $cleantext;
}

function validFormToken($tokenname, $tokenvalue) {
    $realtoken = 'oE2JUMBEdPpKcvTC7akrcKkkhjQZgoEVAvq_'.$tokenvalue;

    if (isset($_SESSION[$tokenname]) && $_SESSION[$tokenname] === $realtoken) {
        return true;
    } else {
        return false;
    }
}

function setFormToken ($tokenname) {
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }

    $formseskey = 'oE2JUMBEdPpKcvTC7akrcKkkhjQZgoEVAvq_shRPCFcuJg9rUWJMBrUNYMDMgpUrrGEs2yv';

    $_SESSION[$tokenname] = $formseskey;
    return 'shRPCFcuJg9rUWJMBrUNYMDMgpUrrGEs2yv';
}

