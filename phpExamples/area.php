<?php
// Function to calculate the area of a rectangle
function calculateArea($length, $width) {
    // Formula: area = length * width
    $area = $length * $width;
   
    return $area;
  

}

// Testing the calculateArea function
$rectangle1Area = calculateArea(5, 10);
echo "Area of Rectangle 1: " . $rectangle1Area . " square units\n";

$rectangle2Area = calculateArea(8, 12);
echo "Area of Rectangle 2: " . $rectangle2Area . " square units\n";

// Practical scenario: Calculate total area of two properties
$property1Area = calculateArea(15, 20); // Assume property 1 has dimensions 15x20 meters
$property2Area = calculateArea(12, 18); // Assume property 2 has dimensions 12x18 meters

$totalArea = $property1Area + $property2Area;
echo "Total Area of Properties: " . $totalArea . " square meters\n";
?>
