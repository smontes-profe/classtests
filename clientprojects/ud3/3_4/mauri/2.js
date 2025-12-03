// Archivo JavaScript 2

// 1. Función greet(name)
function greet(name) {
    return `Hola, ${name}!`;
}

// 2. Función isEven(number)
function isEven(number) {
    return number % 2 === 0;
}

// 3. Función arrayOperation(arr, callback)
function arrayOperation(arr, callback) {
    const result = [];
    for (const element of arr) {
        result.push(callback(element));
    }
    return result;
}

// Funciones Callback de ejemplo para usar con arrayOperation
const duplicate = x => x * 2;
const addFive = x => x + 5;

// 4. Función flecha average = arr => …
const average = arr => {
    // 1. Sumar todos los elementos usando reduce:
    const sumTotal = arr.reduce((accumulator, currentValue) => accumulator + currentValue, 0);
    
    // 2. Calcular el promedio (suma total / número de elementos):
    return arr.length > 0 ? sumTotal / arr.length : 0;
};

console.log("--- PRUEBAS DE FUNCIONES ---");

// Prueba 1: greet
console.log(`1. Saludo: ${greet("Tixis")}`);

// Prueba 2: isEven
console.log(`2. ¿Es 10 par? ${isEven(10)}`); 
console.log(`2. ¿Es 7 par? ${isEven(7)}`);

// Prueba 3: arrayOperation con callbacks
const myArray = [1, 2, 3, 4, 5];

const duplicatedArray = arrayOperation(myArray, duplicate);
console.log(`3. Array duplicado: [${myArray}] -> [${duplicatedArray}]`);

const arrayPlusFive = arrayOperation(myArray, addFive);
console.log(`3. Array + 5: [${myArray}] -> [${arrayPlusFive}]`);

// Prueba 4: average con función flecha y reduce
const averageArray = [10, 20, 30, 40, 50];
const averageResult = average(averageArray);
console.log(`4. Promedio de [${averageArray}]: ${averageResult}`);