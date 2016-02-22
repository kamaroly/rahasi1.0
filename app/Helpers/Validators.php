<?php 


/**
 * Method to check if a string is a json
 * @param  $string jsonstring
 * @return boolean
 */
function isJson($string) {
 json_decode($string);
 return (json_last_error() == JSON_ERROR_NONE);
}