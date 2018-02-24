<?php
/**
 * Creates our copyright tag.
 */
namespace App\Views;

class IpExtension extends \Twig_Extension
{
    public function getFunctions() {
        return [
            new \Twig_SimpleFunction('clientIp', array($this, 'ip')),
        ];
    }

    public function ip() {
        $ip = '';

        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        return '<span class="ip">' . $ip . '</span>';
    }

}