<?php
/**
 * Custom CSRF Protection Twig Extension.
 */
namespace App\Views;

class DebugExtension extends \Twig_Extension
{
    public function getFunctions() {
        return [
            new \Twig_SimpleFunction('dump', array($this, 'dump')),
        ];
    }

    public function dump($var) {
        dump($var);
        die;
    }

}