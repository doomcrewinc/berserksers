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
    protected $comparison;

    /**
     * IsDomainOrIp constructor.
     * @param $comparison
     */
    public function __construct($comparison) {
        $this->comparison = $comparison;
    }

    /**
     * @param $input
     * @return bool
     */
    public function validate($input) {
        return false;
    }
}