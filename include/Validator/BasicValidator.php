<?php

namespace App\Validator;

use App\Exception\BasicException;

class BasicValidator implements Validator{

    public static function validate($rules){

        $result = [
            'errors' => [],
            'validated' => []
        ];
        foreach ($rules as $key => $rule) {

            if(empty($_POST[$key])) {
                $result['errors'][$key] = "The filed $key is required";
                continue;
            }

            $value = $_POST[$key];
            $result['validated'][$key] = $value;
            switch ($rule){

                case 'email' : {
                    if (!filter_var($value,FILTER_VALIDATE_EMAIL)) {
                        $result['errors'][$key] =  "The filed is not email";
                    }
                } break;

                case 'password' : {
                    if (strlen($value) < 6) {
                        $result['errors'][$key] =  "To short for a password";
                    }
                } break;

                case 'text' : {
                    if (!is_string($value)) {
                        $result['errors'][$key] =  "The filed is not email";
                    }
                } break;

                default: {
                    throw new BasicException("the validator with rule $rule is not defined.");
                }
            }


        } return $result;
    }
}