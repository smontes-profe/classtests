/*Ejercicio 2: Funciones definidas por el usuario
Objetivo: Crear y usar funciones con parámetros, return y callback.

Crea una función saludar(nombre) que reciba un nombre y devuelva "Hola, [nombre]!".
Crea una función esPar(numero) que devuelva true si el número es par, false si es impar.
Crea una función operacionArray(arr, callback) que reciba un array de números y una función callback, y aplique la callback a cada elemento del array (usa for…of o forEach).
Ejemplo de callback: multiplicar por 2, sumar 5, etc.
Crea una función flecha promedio = arr => … que devuelva el promedio de un array de números utilizando reduce.
Puntuación: 1.*/ 

const saludar = nombre => "Hola" + nombre;

const esPar = numero => numero % 2 === 0;

const operacionArray = (arr, callback) => {

  const resultados = [];
  arr.forEach(num => {
   resultados.push(callback(num));
  });
  
  return resultados;
};

const promedio = arr => arr.reduce((acc, val) => acc + val, 0) / arr.length;
