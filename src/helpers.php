<?php

if (!function_exists('strip_scheme')) {
    /**
     * @param string $string
     * @return null|string
     */
    function strip_scheme($string) {
        if (is_string($string)) {
            return preg_replace('#^(https?://|s?ftps?://)?(www.)?#', '', $string);
        }
        return null;
    }
}

if (!function_exists('is_domain')) {
    /**
     * @param $string
     * @return false|int
     */
    function is_domain($string) {
        return (preg_match('/^(?!\-)(?:[a-zA-Z\d\-]{0,62}[a-zA-Z\d]\.){1,126}(?!\d+)[a-zA-Z\d]{1,63}$/', $string)) ? true : false;
    }
}

if (!function_exists('is_ip')) {
    /**
     * @param string $string
     * @return bool
     */
    function is_ip($string) {
        return (filter_var($string, FILTER_VALIDATE_IP)) ? true : false;
    }
}

if (!function_exists('is_ipv4')) {
    /**
     * @param string $string
     * @return bool
     */
    function is_ipv4($string) {
        return (filter_var($string, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) ? true : false;
    }
}

if (!function_exists('is_ipv6')) {
    /**
     * @param string $string
     * @return bool
     */
    function is_ipv6($string) {
        return (filter_var($string, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) ? true : false;
    }
}

function ipv6_numeric($ip) {
    $binNum = '';
    foreach (unpack('C*', inet_pton($ip)) as $byte) {
        $binNum .= str_pad(decbin($byte), 8, "0", STR_PAD_LEFT);
    }
    return base_convert(ltrim($binNum, '0'), 2, 10);
}