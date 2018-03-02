<?php
/**
 * Created by PhpStorm.
 * User: drupp
 * Date: 2/28/2018
 * Time: 3:29 PM
 */

namespace App\Validation\Rules;

use Respect\Validation\Rules\AbstractRule;

class IsDomainOrIp extends AbstractRule
{
    /**
     * @param $string
     * @return bool
     */
    public function validate($string) {
        if (is_domain($string) || is_ipv4($string) || is_ipv6($string)) {
            return true;
        }
        return false;
    }
}