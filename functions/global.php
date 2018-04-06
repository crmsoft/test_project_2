<?php

function filed_error_class($name){
    return isset($_SESSION['errors'][$name]) ? 'is-invalid':'';
}

function get_field_error( $name ){
    return isset($_SESSION['errors'][$name]) ? $_SESSION['errors'][$name]:'';
}

function field_value($name){
    global $data;
    return isset($data['user'][$name]) ? $data['user'][$name] : '';
}

