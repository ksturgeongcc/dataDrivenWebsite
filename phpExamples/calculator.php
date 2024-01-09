<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px;
        }
        input, select, button {
            margin: 5px;
            padding: 8px;
            font-size: 16px;
        }
    </style>
</head>
<body>

<?php
    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form values
        $num1 = $_POST["num1"];
        $num2 = $_POST["num2"];
        $operator = $_POST["operator"];

        // Validate input
        if (!is_numeric($num1) || !is_numeric($num2)) {
            echo "<p style='color: red;'>Please enter valid numeric values.</p>";
        } else {
            // Perform calculation
            switch ($operator) {
                case '+':
                    $result = $num1 + $num2;
                    break;
                case '-':
                    $result = $num1 - $num2;
                    break;
                case '*':
                    $result = $num1 * $num2;
                    break;
                case '/':
                    // Check for division by zero
                    if ($num2 != 0) {
                        $result = $num1 / $num2;
                    } else {
                        echo "<p style='color: red;'>Error: Division by zero!</p>";
                    }
                    break;
                default:
                    echo "<p style='color: red;'>Error: Invalid operator!</p>";
                    break;
            }

            // Display result
            if (isset($result)) {
                echo "<p>Result: $result</p>";
            }
        }
    }
?>
<!-- emmet example -->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="num1">Number 1:</label>
    <input type="text" name="num1" required>

    <label for="operator">Operator:</label>
    <select name="operator" required>
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="*">*</option>
        <option value="/">/</option>
    </select>

    <label for="num2">Number 2:</label>
    <input type="text" name="num2" required>

    <button type="submit">Calculate</button>
</form>

</body>
</html>
