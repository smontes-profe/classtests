
// 1. Array
let frutas = ["Manzana", "Pera", "Uva", "Plátano", "Kiwi"];

// 2. Añadir al inicio y final
frutas.unshift("Mango");
frutas.push("Fresa");

// 3. Eliminar primera y ultima
frutas.shift();
frutas.pop();

// 4. Mayusculas
let frutasMayus = frutas.map(f => f.toUpperCase());

// 5. Filtrar con 'a'
let frutasConA = frutas.filter(f => f.toLowerCase().includes("a"));

// 6. Posicion de Manzana
let indiceManzana = frutas.findIndex(f => f === "Manzana");

// 7. Verificaciones
let algunaP = frutas.some(f => f.startsWith("P"));
let todas3 = frutas.every(f => f.length > 3);

// 8. Ordenar
let frutasOrdenadas = [...frutas].sort();

// 9. String con reduce
let frutasString = frutas.reduce((acc, f) => acc + ", " + f);

console.log({ frutas, frutasMayus, frutasConA, indiceManzana, algunaP, todas3, frutasOrdenadas, frutasString });


