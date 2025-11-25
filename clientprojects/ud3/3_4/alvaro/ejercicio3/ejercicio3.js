// Ejercicio 3: Arrays – creación y manipulación
// Objetivo: Crear arrays y usar métodos básicos y avanzados.

// a) Crea un array frutas con cinco frutas.
let frutas = ["Manzana", "Pera", "Plátano", "Fresa", "Kiwi"];

// b) Añade una fruta al inicio y otra al final.
frutas.unshift("Melón");
frutas.push("Uva");

// c) Elimina la primera y la última fruta.
frutas.shift();
frutas.pop();

// d) Crea un nuevo array frutasMayus con todas las frutas en mayúsculas usando map().
let frutasMayus = frutas.map(f => f.toUpperCase());

// e) Filtra solo las frutas que contengan la letra "a" usando filter().
let frutasConA = frutas.filter(f => f.toLowerCase().includes("a"));

// f) Encuentra la posición de la fruta "Manzana" usando findIndex().
let posManzana = frutas.findIndex(f => f === "Manzana");

// g) Comprueba si alguna fruta empieza con "P" usando some() y si todas las frutas tienen más de 3 letras usando every().
let algunaConP = frutas.some(f => f.startsWith("P"));
let todasMasDe3 = frutas.every(f => f.length > 3);

// h) Ordena las frutas alfabéticamente usando sort().
let ordenadas = [...frutas].sort();

// i) Usa reduce() para crear un string que contenga todas las frutas separadas por coma.
let todasEnCadena = frutas.reduce((acc, f) => acc + ", " + f);


// Mostrar los resultados en consola (objeto con todos los valores generados)
console.log({ frutas, frutasMayus, frutasConA, posManzana, algunaConP, todasMasDe3, ordenadas, todasEnCadena });
