<?php

namespace App\Views;

use Slim\Csrf\Guard;

class CsrfExtension extends \Twig_Extension
{
    /**
     * @var \Slim\Csrf\Guard
     */
    protected $guard;

    public function __construct(Guard $guard) {
        $this->guard = $guard;
    }

    /**
     * This makes available our function to insert the csrf_field in our twig templates.
     * @return array|\Twig_Function[]
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('csrf_field', array($this, 'csrfField')),
        ];
    }

    /**
     * Insert markup for csrf fields.
     * @return string
     */
    public function csrfField() {
        return '
            <input type="hidden" name="' . $this->guard->getTokenNameKey() . '" value="'. $this->guard->getTokenName() .'">
            <input type="hidden" name="' . $this->guard->getTokenValueKey() . '" value="'. $this->guard->getTokenValue() .'">
        ';
    }
}