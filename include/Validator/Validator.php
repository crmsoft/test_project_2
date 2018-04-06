<?php

namespace App\Validator;

interface Validator{
    /**
     * should validate post params...
     * @param $rules
     * @return mixed
     */
    static function validate($rules);
}