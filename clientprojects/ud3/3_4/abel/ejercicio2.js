/*
Objetivo: Crear y usar funciones con parámetros, return y callback.

1.Crea una función saludar(nombre) que reciba un nombre y devuelva "Hola, [nombre]!".
2.Crea una función esPar(numero) que devuelva true si el número es par, false si es impar.
3.Crea una función operacionArray(arr, callback) que reciba un array de números y una función callback,
y aplique la callback a cada elemento del array (usa for…of o forEach).
    Ejemplo de callback: multiplicar por 2, sumar 5, etc.
4.Crea una función flecha promedio = arr => … que devuelva el promedio de un array de números utilizando reduce.
*/

//1
function saludar(nombre) {
    return `Hola, ${nombre}!`;
}

//2
function esPar(numero){
    return numero % 2 === 0;
}

//3
function operacionArray(arr, callback) {
    let resultados = [];
}

//4
let promedio = arr => {
    let suma = arr.reduce((acum, curr) => acum + curr, 0);
    return suma / arr.length;
}