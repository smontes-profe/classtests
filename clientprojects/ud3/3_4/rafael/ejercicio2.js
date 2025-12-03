console.log("EJERCICIO 2: Funciones definidas por el usuario\n");

// 1. Función saludar
console.log("1. Función saludar");
function saludar(nombre) {
    return "Hola, " + nombre + "!";
}
// Lo probamos, pero lo recibiría desde un form de HTML, por ejemplo
console.log(saludar("Rafa"));
console.log(saludar("Sergio"));
console.log(saludar("ROberto"));


// 2. Función esPar
console.log("\n2. Función esPar");
function esPar(numero) {
    if (numero % 2 === 0) {
        return true;
    } else {
        return false;
    }
}
// Lo probamos, pero lo recibiría desde un form de HTML, por ejemplo
console.log("¿Es 4 par?:", esPar(4));
console.log("¿Es 7 par?:", esPar(7));
console.log("¿Es 10 par?:", esPar(10));
console.log("¿Es 15 par?:", esPar(15));


// 3. Función operacionArray
console.log("\n3. Función operacionArray con callback");
function operacionArray(arr, callback) {
    let resultado = [];
    for (let elemento of arr) {
        resultado.push(callback(elemento));
    }
    return resultado;
}

// Callbacks de ejemplo
function multiplicarPor2(num) {
    return num * 2;
}

function sumar5(num) {
    return num + 5;
}

function elevarAlCuadrado(num) {
    return num * num;
}

let arrayPrueba = [1, 2, 3, 4, 5];
console.log("Array original:", arrayPrueba);
console.log("Multiplicado por 2:", operacionArray(arrayPrueba, multiplicarPor2));
console.log("Sumando 5:", operacionArray(arrayPrueba, sumar5));
console.log("Elevado al cuadrado:", operacionArray(arrayPrueba, elevarAlCuadrado));


// 4. Función flecha para calcular promedio
console.log("\n4. Función flecha promedio");
const promedio = arr => arr.reduce((acumulador, valor) => acumulador + valor, 0) / arr.length;


console.log("Promedio de [1, 2, 3, 4, 5]:", promedio([1, 2, 3, 4, 5]));
console.log("Promedio de [10, 20, 30]:", promedio([10, 20, 30]));
console.log("Promedio de [7, 8, 9, 10]:", promedio([7, 8, 9, 10]));

console.log("\nFIN EJERCICIO 2");