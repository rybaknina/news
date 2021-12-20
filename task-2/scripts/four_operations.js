"use strict";
import * as calc from "./util_math.mjs";
/*
4. Реализовать основные 4 арифметические операции (+, -, /, *) в виде функций с
двумя параметрами. Т.е. например, функция для сложения должна принимать два числа,
складывать их и возвращать результат. Обязательно использовать оператор return.
*/
let numberOne = Number(prompt("Enter a number"));
let numberTwo = Number(prompt("Enter a number"));

if (isNaN(numberOne) || isNaN(numberTwo)) {
    throw new Error("Some of the operands are not a number");
}
let result = calc.sum(numberOne, numberTwo);
alert(`${numberOne} + ${numberTwo} = ${result}`);

result = calc.minus(numberOne, numberTwo);
alert(`${numberOne} - ${numberTwo} = ${result}`);

result = calc.division(numberOne, numberTwo);
alert(`${numberOne} / ${numberTwo} = ${result}`);

result = calc.multiplication(numberOne, numberTwo);
alert(`${numberOne} * ${numberTwo} = ${result}`);
