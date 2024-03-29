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
    public static function isValid(string $input)
    {
        // check if not string
        if (!is_string($input)) {
            return false;
        }

        // seperators in input string
        $seperators = array('\n', 'n', '\\', '\\;', ';');
        // replace seperators with comma
        $numbersString = str_replace($seperators,",",$input);

        // callback function if array filter
        function checkNegative($var)
        {
            return($var < 0);
        }
        // remove if any characters or empty values are present in array
        $negativeNumbers = array_filter(explode(',', $numbersString), "checkNegative");
        if(count($negativeNumbers)) {
            throw new \InvalidArgumentException('Negative numbers (' . implode(',', $negativeNumbers) . ') not allowed.');
        }

        // return true if valid
        return true;
    }
}
?>