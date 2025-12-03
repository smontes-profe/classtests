let frutas = ["Manzana", "Pera", "Plátano", "Kiwi", "Naranja"];

// Añadir al inicio y final
frutas.unshift("Mango");
frutas.push("Fresa");

// Eliminar primera y última
frutas.shift();
frutas.pop();

// Nuevas transformaciones
let frutasMayus = frutas.map(f => f.toUpperCase());
let frutasConA = frutas.filter(f => f.includes("a") || f.includes("A"));
let posManzana = frutas.findIndex(f => f === "Manzana");
let algunaConP = frutas.some(f => f.startsWith("P"));
let todasMas3 = frutas.every(f => f.length > 3);

frutas.sort();
let frutasTexto = frutas.reduce((acc, f) => acc === "" ? f : acc + ", " + f, "");

console.log(frutasMayus, frutasConA, posManzana, algunaConP, todasMas3, frutas, frutasTexto);
