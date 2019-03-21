<?php
require_once 'CalculatorService.php';
require_once 'InputStringValidator.php';

// check if the sum argument is supplied to the calculator
if (empty($argv[1])) {
    return print_r('"sum" must be first argument for calculator' . PHP_EOL);
}

// check if no args are sent then print 0
if (empty($argv[2])) {
    return print_r('Output: 0' . PHP_EOL);
}

// validate input string
if (!InputStringValidator::isValid($argv[2])) {
    return print_r('Given number string is not valid' . PHP_EOL);
}

try {
    // else create new instance of calculator and perform the sum operation
    $calculator = new CalculatorService();

    // print the output
    printf('The sum of given numbers is: %s'. PHP_EOL , $calculator->sum($argv[2]));
} catch(\InvalidArgumentException $e) {
    echo 'Error: ' . $e->getMessage() . PHP_EOL;
}
?>