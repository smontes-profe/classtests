console.log("---  Ejercicio 3: Arrays – creación y manipulación ---");

let frutas = ["Manzana", "Banana", "Naranja", "Uva", "Pera"];
console.log("Original:", frutas);

// Añade al inicio y al final
frutas.unshift("Fresa");
frutas.push("Mango");
console.log("Añadidos:", frutas);

// Elimina la primera y la última
frutas.shift();
frutas.pop();
console.log("Eliminados:", frutas); // Vuelve a ["Manzana", "Banana", "Naranja", "Uva", "Pera"]

// Crea un nuevo array en mayúsculas con map()
const frutasMayus = frutas.map(fruta => fruta.toUpperCase());
console.log("Mayúsculas (map):", frutasMayus);

// Filtra frutas que contengan la letra "a"
const frutasConA = frutas.filter(fruta => fruta.toLowerCase().includes("a"));
console.log("Contienen 'a' (filter):", frutasConA);

// Encuentra la posición de "Manzana"
const posManzana = frutas.findIndex(fruta => fruta === "Manzana");
console.log("Posición de Manzana (findIndex):", posManzana); // 0

// Comprueba si alguna empieza con "P" (some)
const algunaConP = frutas.some(fruta => fruta.startsWith("P"));
console.log("Alguna empieza con 'P' (some):", algunaConP); // true (Pera)

// Comprueba si todas tienen más de 3 letras (every)
const todasMas3Letras = frutas.every(fruta => fruta.length > 3);
console.log("Todas > 3 letras (every):", todasMas3Letras); // false (Uva)

// Ordena alfabéticamente (modifica el array original)
frutas.sort();
console.log("Ordenadas (sort):", frutas);

// Usa reduce() para crear un string
const stringFrutas = frutas.reduce((acc, fruta) => {
  return acc === "" ? fruta : acc + ", " + fruta;
}, "");
console.log("String (reduce):", stringFrutas);