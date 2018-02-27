<?php
/**
 * @author Drew Ruppel
 * BaseController which injects the $container and makes it
 * available to any of our other controllers that extend this one.
 */
namespace App\Controllers;

use Interop\Container\ContainerInterface;

abstract class Controller
{
    protected $container;

    public function __construct(ContainerInterface $container) {
        $this->container = $container;
    }

    public function __get($property) {
        if ($this->container->{$property}) {
            return $this->container->{$property};
        }
    }
}