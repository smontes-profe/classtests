// Archivo JavaScript 1
const numbers = [4.7, 2.3, 9.8, 6.5];
const inputString = "JavaScript";

// a) Redondea todos los números hacia arriba
const roundedUp = numbers.map(num => Math.ceil(num));
console.log(`a) Redondeados hacia arriba (Math.ceil): ${roundedUp}`);

// b) Convierte todos los números a strings y muestra su longitud
const numberDetails = numbers.map(num => {
    const strValue = num.toString();
    return {
        value: num,
        stringValue: strValue,
        length: strValue.length
    };
});
console.log("b) Conversión a String y Longitud:");
numberDetails.forEach(item => {
    console.log(`   ${item.value} -> "${item.stringValue}" (Longitud: ${item.length})`);
});

// c) Calcula el mayor y el menor valor usando funciones Math
const maxValue = Math.max(...numbers);
const minValue = Math.min(...numbers);
console.log(`c) Mayor valor (Math.max): ${maxValue}`);
console.log(`c) Menor valor (Math.min): ${minValue}`);

// a) Convierte todas las letras a mayúsculas
const upperCaseString = inputString.toUpperCase();
console.log(`a) A mayúsculas (toUpperCase): ${upperCaseString}`);

// b) Obtén los 4 primeros caracteres
const firstFourChars = inputString.substring(0, 4);
console.log(`b) Los 4 primeros caracteres (substring): ${firstFourChars}`);

// c) Verifica si contiene la letra "S" (mayúscula)
const containsUpperS = inputString.includes("S");
console.log(`c) ¿Contiene la letra "S" (mayúscula)? (includes): ${containsUpperS}`);