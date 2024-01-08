<?php
// my_function is a variable
// function with a parameter called name
    // $my_function = function($name){
    //     echo "Hello $name";
    // };
    // $my_function("Karen");
    // $my_function("Santa");

    // create function to add a sum

    function add_number($x, $y){
        return $x + $y;
    };
    $sum = add_number(2, 3);
    echo $sum . "<br>";


    function multiply_number($x, $y){
        return $x * $y;
    };
    $multiply = multiply_number(6, 6);
    echo $multiply;

?>