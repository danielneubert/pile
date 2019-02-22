<?php

namespace Neubert\Pile;

class Pile
{
    /**
     * Searches through an array or object for a specific key.
     * If multible keys are passed, the result first result will be search for the second key.
     *
     * Returns null when the value can not be found.
     *
     * @param array|object $array The array that should be searched through.
     * @param string|integer $key,... The key that should be fetched if possible.
     *
     * @return mixed
     */
    public static function find()
    {
        if (func_num_args() > 1) {
            $array = func_get_arg(0);
            if (is_object($array)) {
                $array = (array) $array;
            }
            if (!is_array($array)) {
                return null;
            }
            $key = func_get_arg(1);
            if (is_array($key)) {
                $key = $key[0];
            }
            if (array_key_exists($key, $array)) {
                $value = $array[$key];
                if (func_num_args() > 2 || (is_array(func_get_arg(1)) && count(func_get_arg(1)) > 1)) {
                    if (is_array(func_get_arg(1))) {
                        $args = func_get_arg(1);
                    } else {
                        $args = func_get_args();
                        array_shift($args);
                    }
                    $args[0] = $value;
                    return call_user_func_array(['self', 'find'], $args);
                }
                return $value;
            }
            return null;
        }
        return null;
    }
}
