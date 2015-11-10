<?php

/**
 * Created by PhpStorm.
 * User: Matúš
 * Date: 10. 11. 2015
 * Time: 12:14
 */
class PrepareInput
{
    public function dumpSpecialChars($input) {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);

        return $input;
    }
}