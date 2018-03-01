<?php
/**
 * Created by PhpStorm.
 * User: drupp
 * Date: 2/28/2018
 * Time: 3:40 PM
 */

namespace App\Validation\Exceptions;

use Respect\Validation\Exceptions\ValidationException;

class IsDomainOrIpException extends ValidationException
{
    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::STANDARD => 'The {{name}} must contain a valid domain or ip syntax.'
        ],
        self::MODE_NEGATIVE => [
            self::STANDARD => 'The {{name}} must contain a valid domain or ip syntax.'
        ]
    ];
}