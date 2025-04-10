<?php

class Funcoes
{
    public static function isEven($n)
    {
        return $n % 2 === 0;
    }

    public static function factorial($n)
    {
        if ($n < 0) {
            throw new InvalidArgumentException("Negative number not allowed");
        }
        return $n === 0 ? 1 : $n * self::factorial($n - 1);
    }

    public static function isPalindrome($str)
    {
        $str = strtolower(preg_replace('/[^a-z0-9]/i', '', $str));
        return $str === strrev($str);
    }

    public static function fahrenheitToCelsius($f)
    {
        return ($f - 32) * 5 / 9;
    }

    public static function calculateDiscount($price, $percent)
    {
        if ($price < 0 || $percent < 0) {
            throw new InvalidArgumentException("Negative values not allowed");
        }
        return $price - ($price * $percent / 100);
    }
}
