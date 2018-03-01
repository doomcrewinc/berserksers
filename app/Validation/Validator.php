<?php
/**
 * Created by PhpStorm.
 * User: drupp
 * Date: 2/27/2018
 * Time: 2:54 PM
 */

namespace App\Validation;

use Respect\Validation\Exceptions\NestedValidationException;

class Validator
{
    protected $errors = [];

    /**
     * @param       $request
     * @param array $rules
     * @return      $this
     */
    public function validate($request, array $rules) {
        foreach ($rules as $field => $rule) {
            try {
                $rule->setName(ucfirst($field))->assert($request->getParam($field));
            } catch(NestedValidationException $e) {
                $this->errors[$field] = $e->getMessages();
            }
        }

        return $this;
    }

    public function failed() {
        return !empty($this->errors);
    }

    public function errors() {
        return $this->errors;
    }
}