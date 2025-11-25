console.log("EJERCICIO 1: Funciones predefinidas y manipulación básica\n");

// PARTE 1
console.log("PARTE 1: Array de números");
let numeros = [4.7, 2.3, 9.8, 6.5];
console.log("Array original:", numeros);

// a) Redondear hacia arriba usando Math.ceil()
let numerosRedondeados = [];
for (let num of numeros) {
    numerosRedondeados.push(Math.ceil(num));
}
console.log("\na) Números redondeados hacia arriba (Math.ceil):");
console.log(numerosRedondeados);

// b) Convertir a strings y mostrar longitud
console.log("\nb) Conversión a strings y longitud:");
let numerosString = [];
for (let num of numeros) {
    let str = num.toString();
    numerosString.push(str);
    console.log(`  Número: ${num} --> String: "${str}" --> Longitud: ${str.length}`);
}

// c) Mayor y menor valor usando Math
console.log("\nc) Mayor y menor valor:");
let mayor = Math.max(...numeros);
let menor = Math.min(...numeros);
console.log("  Mayor valor:", mayor);
console.log("  Menor valor:", menor);


// PARTE 2
console.log("\nPARTE 2: String 'JavaScript'");
let texto = "JavaScript";
console.log("String original:", texto);

// a) Convertir a mayúsculas
let textoMayus = texto.toUpperCase();
console.log("\na) En mayúsculas:", textoMayus);

// b) Obtener los 4 primeros caracteres
let primeros4 = texto.substring(0, 4);
console.log("\nb) Primeros 4 caracteres:", primeros4);

// c) Verificar si contiene la letra "S" (mayúscula)
let contieneS = texto.includes("S");
console.log("\nc) ¿Contiene la letra 'S' (mayúscula)?:", contieneS);

console.log("\nFIN EJERCICIO 1");