<?php

/**
 * A validator class to validate input string
 */
class InputStringValidator 
{
    /**
     * Function to validate the input string
     * @return boolean
     */
    public static function isValid(string $numbers) 
    {    
        // check if not string
        if (!is_string($numbers)) {
            return false;
        }

        // return true if valid
        return true;
    }
}
?>