console.log("EJERCICIO 3: Arrays - creación y manipulación\n");

// 1. Crear array frutas con cinco frutas
console.log("1. Array inicial");
let frutas = ["Manzana", "Pera", "Plátano", "Naranja", "Fresa"];
console.log("Frutas iniciales:", frutas);

// 2. Añadir fruta al inicio y otra al final
console.log("\n2. Añadir frutas");
frutas.unshift("Sandía");
frutas.push("Kiwi");
console.log("Después de añadir las frutas:", frutas);

// 3. Eliminar la primera y la última fruta
console.log("\n3. Eliminar frutas");
frutas.shift();
frutas.pop();
console.log("Después de eliminar las frutas:", frutas);

// 4. Crear array con frutas en mayúsculas usando map()
console.log("\n4. Array en mayúsculas con map()");
let frutasMayus = frutas.map(fruta => fruta.toUpperCase());
console.log("Frutas en mayúsculas:", frutasMayus);

// 5. Filtrar frutas que contengan la letra "a" usando filter()
console.log("\n5. Filtrar frutas con 'a' usando filter()");
let frutasConA = frutas.filter(fruta => fruta.toLowerCase().includes("a"));
console.log("Frutas que contienen 'a':", frutasConA);

// 6. Encontrar posición de "Manzana" usando findIndex()
console.log("\n6. Posición de 'Manzana' con findIndex()");
let posicionManzana = frutas.findIndex(fruta => fruta === "Manzana");
console.log("Posición de 'Manzana':", posicionManzana);

// 7. Comprobar con some() y every()
console.log("\n7. Comprobaciones con some() y every()");
let algunaEmpiezaPorP = frutas.some(fruta => fruta.startsWith("P"));
console.log("¿Alguna fruta empieza con 'P'?:", algunaEmpiezaPorP);

let todasMasDe3Letras = frutas.every(fruta => fruta.length > 3);
console.log("¿Todas las frutas tienen más de 3 letras?:", todasMasDe3Letras);

// 8. Ordenar alfabéticamente usando sort()
console.log("\n8. Ordenar alfabéticamente con sort()");
let frutasOrdenadas = [...frutas].sort();
console.log("Frutas ordenadas:", frutasOrdenadas);

// 9. Usar reduce() para crear string con frutas separadas por coma
console.log("\n9. String con reduce()");
let frutasString = frutas.reduce((acumulador, fruta, index) => {
    if (index === 0) {
        return fruta;
    } else {
        return acumulador + ", " + fruta;
    }
}, "");
console.log("String con todas las frutas:", frutasString);

console.log("\nFIN EJERCICIO 3");