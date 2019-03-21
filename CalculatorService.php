<?php

/**
 * Calculator service class with sum and utility methods to support calculator
 */
class CalculatorService 
{

    /**
     * Function to perform sum operation on given input
     * 
     * @param string $input The string og numbers passed to perform sum
     * @return integer
     */
    public function sum(string $input): int 
    {
        $numberArray = $this->prepareNumbers($input);

        return array_sum($numberArray);
    }

    /**
     * Function to prepare numbers from given numbers string
     * 
     * @param string $input The string of numbers passed to perform sum
     * @return array
     */
    public function prepareNumbers(string $input): array 
    {
        // Check if given input is not alphabetic string
        if (!is_string($input)) {
            throw new \InvalidArgumentException('Parameters must be single string of input seperated by commas(,)');
        }

        // seperators in input string
        $seperators = array('\n', 'n', '\\', '\\;', ';');
        // replace seperators with comma
        $numbersString = str_replace($seperators,",",$input);

        function isNumericAndBelowThousand($var) {
            return (is_numeric($var) && $var < 1000);
        }
        // filter and return if any alphabetc or empty values are present in array
        return array_filter(explode(',', $numbersString), 'isNumericAndBelowThousand');
    }
}
?>