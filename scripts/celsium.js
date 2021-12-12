"use strict";
/* 1. Задать температуру в градусах по Цельсию.
Вывести в alert соответствующую температуру в градусах по Фаренгейту. */

let tCelsius = prompt("Задайте температуру в градусах по Цельсию");
let tFahrenheit = (9 / 5) * tCelsius + 32;

alert(`Temperature by Fahrenheit ${tFahrenheit}`);