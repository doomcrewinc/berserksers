<?php
/**
 * Creates our copyright tag.
 */
namespace App\Views;

class CopyrightExtension extends \Twig_Extension
{
    public function getFunctions() {
        return [
            new \Twig_SimpleFunction('copyright', array($this, 'copyright')),
        ];
    }

    public function copyright() {
        $origin = '2014';
        $current = date('Y');
        return '<span class="copyright">© ' . $origin . ' to ' . $current . '</span>';
    }

}