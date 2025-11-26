// Archivo JavaScript 3

// 1. Crea un array 'frutas' con cinco frutas.
let frutas = ["Manzana", "Banana", "Cereza", "Durazno", "Kiwi"];
console.log(`1. Array inicial: ${frutas}`);
console.log("-----------------------------------------");

// 2. Añade una fruta al inicio y otra al final.
frutas.unshift("Pera");
frutas.push("Mango");
console.log(`2. Después de añadir (Pera, Mango): ${frutas}`);

// 3. Elimina la primera y la última fruta.
frutas.shift();
frutas.pop();
console.log(`3. Después de eliminar primera y última: ${frutas}`);
console.log("-----------------------------------------");

// 4. Crea un nuevo array 'frutasMayus' con todas las frutas en mayúsculas usando map().
const frutasMayus = frutas.map(fruta => fruta.toUpperCase());
console.log(`4. Array en mayúsculas (map): ${frutasMayus}`);

// 5. Filtra solo las frutas que contengan la letra "a" usando filter().
const frutasConA = frutas.filter(fruta => fruta.toLowerCase().includes("a"));
console.log(`5. Frutas que contienen "a" (filter): ${frutasConA}`);
console.log("-----------------------------------------");

// 6. Encuentra la posición de la fruta "Manzana" usando findIndex().
const indiceManzana = frutas.findIndex(fruta => fruta === "Manzana");
console.log(`6. Posición de "Manzana" (findIndex): ${indiceManzana}`);

// 7. Comprueba si alguna fruta empieza con "P" usando some().
const algunaEmpiezaConP = frutas.some(fruta => fruta.startsWith("P"));
console.log(`7a. ¿Alguna fruta empieza con "P"? (some): ${algunaEmpiezaConP}`);

// Comprueba si todas las frutas tienen más de 3 letras usando every().
const todasMasDeTresLetras = frutas.every(fruta => fruta.length > 3);
console.log(`7b. ¿Todas tienen más de 3 letras? (every): ${todasMasDeTresLetras}`);
console.log("-----------------------------------------");

// 8. Ordena las frutas alfabéticamente usando sort().
const frutasOrdenadas = [...frutas].sort();
console.log(`8. Frutas ordenadas (sort): ${frutasOrdenadas}`);

// 9. Usa reduce() para crear un string que contenga todas las frutas separadas por coma.
const stringSeparadoPorComa = frutas.reduce((acumulador, fruta, indice) => {
    return indice === 0 ? fruta : `${acumulador}, ${fruta}`;
}, "");

console.log(`9. String de frutas separado por coma (reduce): "${stringSeparadoPorComa}"`); 
