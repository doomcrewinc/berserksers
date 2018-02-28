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

if (!function_exists('is_ip')) {
    /**
     * @param string $ip
     * @return bool
     */
    function is_ip($ip) {
        return filter_var($ip, FILTER_VALIDATE_IP);
    }
}

if (!function_exists('is_ipv4')) {
    /**
     * @param string $ip
     * @return bool
     */
    function is_ipv4($ip) {
        return filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4);
    }
}

if (!function_exists('is_ipv6')) {
    /**
     * @param string $ip
     * @return bool
     */
    function is_ipv6($ip) {
        return filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6);
    }
}