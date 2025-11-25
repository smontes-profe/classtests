"use strict"



// 1️ Crear un array de frutas
let frutas = ["Manzana", "Pera", "Banana", "Kiwi", "Uva"];
console.log("Array inicial:", frutas);

// 2️ Añadir una fruta al inicio y otra al final
frutas.unshift("Naranja"); 
frutas.push("Mango");      
console.log("Después de añadir frutas:", frutas);

// 3️ Eliminar la primera y la última fruta
frutas.shift(); 
frutas.pop();   
console.log("Después de eliminar primera y última:", frutas);

// 4️ Crear un nuevo array con todas las frutas en mayúsculas (map)
const frutasMayus = frutas.map(f => f.toUpperCase());
console.log("Frutas en mayúsculas:", frutasMayus);

// 5️ Filtrar solo las frutas que contienen la letra 'a'
const frutasConA = frutas.filter(f => f.toLowerCase().includes("a"));
console.log("Frutas que contienen 'a':", frutasConA);

// 6️ Encontrar la posición de la fruta 'Manzana'
const indiceManzana = frutas.findIndex(f => f === "Manzana");
console.log("Posición de 'Manzana':", indiceManzana); 

// 7️ Comprobar si alguna fruta empieza con 'P' (some)

const algunaConP = frutas.some(f => f.startsWith("P"));
const todasMas3Letras = frutas.every(f => f.length > 3);
console.log("¿Alguna fruta empieza con 'P'?:", algunaConP);
console.log("¿Todas las frutas tienen más de 3 letras?:", todasMas3Letras);

// 8️ Ordenar las frutas alfabéticamente
const frutasOrdenadas = [...frutas].sort();
console.log("Frutas ordenadas alfabéticamente:", frutasOrdenadas);

// 9️ Usar reduce para crear un string con todas las frutas separadas por coma
const frutasTexto = frutas.reduce((acc, fruta) => acc + ", " + fruta);
console.log("Frutas en un solo string:", frutasTexto);
