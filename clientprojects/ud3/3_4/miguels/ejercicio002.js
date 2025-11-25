"use strict";

const array = [1, 2, 3, 4];

// Crea una función saludar(nombre) que reciba un nombre y devuelva "Hola, [nombre]!".

function greetSomeone(name = "Miguel") {
  return `Hola ${name}`;
}

console.log(greetSomeone()); // Introducir nombre diferente al predeterminado greetSomeone("name")

// Crea una función esPar(numero) que devuelva true si el número es par, false si es impar.

function isEven(number = 0) {
  return number % 2 === 0;
}

console.log(isEven());

//Crea una función operacionArray(arr, callback) que reciba un array de números y una función callback, y aplique la callback a cada elemento del array (usa for…of o forEach).

function operacionArray(array, callback) {
  for (let element of array) {
    callback(element);
  }
}

function showArray(element) {
  console.log(element);
}

operacionArray(array, showArray);

// Crea una función flecha promedio = arr => … que devuelva el promedio de un array de números utilizando reduce.

let average = (arrayNum) => {
  const totalNumber = arrayNum.reduce((total, num) => total + num, 0);

  return totalNumber / arrayNum.length;
};

console.log(average(array));

// Forma compacta

let average2 = (arrayNum) =>
  arrayNum.reduce((total, num) => total + num, 0) / arrayNum.length;

console.log(average2(array));