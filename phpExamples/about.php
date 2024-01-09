
<?php
$title = 'About Page';
include 'partials/header.php';




function calculate($num1, $num2, $operator) {
    switch ($operator) {
        case '+':
            return $num1 + $num2;
        case '-':
            return $num1 - $num2;
        case '*':
            return $num1 * $num2;
        case '/':
            // Check for division by zero
            if ($num2 != 0) {
                return $num1 / $num2;
            } else {
                return "Error: Division by zero!";
            }
        default:
            return "Error: Invalid operator!";
    }
}

// Example usage
$number1 = 10;
$number2 = 5;
$operator = '+';

$result = calculate($number1, $number2, $operator);

// Output the result
echo "Result: $result";

?>


?>

<p>Hello <?= $name?></p>

