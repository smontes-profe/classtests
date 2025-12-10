'use strict';
 
let numeros = [1, 2, 3, 4];
let suma = Number(0);
 
for (let i = 0; i < numeros.length; i++) {
    suma += parseInt(numeros[i]);
}
 
console.log(`Suma total: ${suma}`);