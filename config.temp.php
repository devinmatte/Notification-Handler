<?php

$get_data = function (&$var, $default = null) {
    return !empty($var) ? $var : $default;
};

/*
 * *	Database configuration
 * */

@define("DB_NAME", $get_data(getenv("DB_NAME"), 'notifications'));
@define("DB_USER", $get_data(getenv("DB_USER"), 'notifications'));
@define("DB_PASSWORD", $get_data(getenv("DB_PASSWORD"), 'password'));
@define("DB_HOST", $get_data(getenv("DB_HOST"), 'localhost'));
@define("DB_DRIVER", $get_data(getenv("DB_DRIVER"), 'pdo_mysql'));
