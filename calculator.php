<?php
require_once 'CalculatorService.php';
require_once 'InputStringValidator.php';

// check if the sum argument is supplied to the calculator
if (empty($argv[1])) {
    return print_r('Must send operation to perform(sum/multiply) as first argument for calculator' . PHP_EOL);
}
// assign operation to the variable
$operation = $argv[1];

// check if no args are sent then print 0
if (empty($argv[2])) {
    return print_r('Output: 0' . PHP_EOL);
}

try {
    // validate input string
    if (!InputStringValidator::isValid($argv[2])) {
        return print_r('Given number string is not valid' . PHP_EOL);
    }


    // else create new instance of calculator and perform the sum operation
    $calculator = new CalculatorService();

    // depending on operation select the case and perform operation
    switch($operation) {
        case 'sum':
        $output = $calculator->sum($argv[2]);
        break;
        case 'multiply':
        $output = $calculator->multiply($argv[2]);
        break;
    }
    // print the output
    printf('The ' . $operation . ' of given numbers is: %s'. PHP_EOL , $output);
} catch(\InvalidArgumentException $e) {
    echo 'Error: ' . $e->getMessage() . PHP_EOL;
}
?>