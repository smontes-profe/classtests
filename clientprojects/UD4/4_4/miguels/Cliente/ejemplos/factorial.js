"use strict";

const prompt = require('prompt-sync')();

let resultado = 1;


let addValueUser = () => {
    let value = 0;
    do {
       value = prompt("Introduce el número a factorizar:");
    } while (isNaN(value) || value < 0); 
    return value;
};


let factorial = function (valueIn, resultado) {
  resultado *= valueIn;
  return (valueIn < 1) ? resultado : factorial ((valueIn - 1), resultado);
}


console.log(`El resultado es ${factorial(addValueUser(), resultado)}`);