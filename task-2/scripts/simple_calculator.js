"use strict";
import * as calc from "./util_math.mjs";
/*
5. Реализовать функцию с тремя параметрами: function mathOperation(arg1, arg2, operation),
где arg1, arg2 – значения аргументов, operation – строка с названием операции. В зависимости от
переданного значения операции (использовать switch) выполнить одну из арифметических операций
(использовать функции из задания 4) и вернуть полученное значение.
*/
/**
 * Фунция простого калькулятора: сложение, вычитание, деление или умножение 2-х чисел
 * @param {number} arg1 первое число
 * @param {number} arg2 второе число
 * @param {string} operation строка с названием операции
 * @returns {number}
 */
function mathOperation(arg1, arg2, operation) {
    switch (operation) {
        case "+":
            return calc.sum(arg1, arg2);
        case "-":
            return calc.minus(arg1, arg2);
        case "/":
            return calc.division(arg1, arg2);
        case "*":
            return calc.multiplication(arg1, arg2);
        default:
            throw new Error("Operation should be +, -, /, or *");
    }
}

let arg1 = Number(prompt("Enter a number"));
let arg2 = Number(prompt("Enter a number"));
let operation = prompt("Enter an operation");

if (isNaN(arg1) || isNaN(arg2)) {
    throw new Error("Some of the operands are not a number");
}
let result = mathOperation(arg1, arg2, operation);
alert(`${arg1} ${operation} ${arg2} = ${result}`);