let frutas = ["Manzana", "Naranja", "Mora", "Mandarina", "Uva"];
frutas.unshift("Fresa");
frutas.push("Mango");

frutas.shift();
frutas.pop();

let frutasMayus = frutas.map(f => f.toUpperCase());
let conA = frutas.filter(f => f.includes("a") || f.includes("A"));
let posManzana = frutas.findIndex(f => f === "Manzana");

let Ps = frutas.some(f => f.startsWith("P"));
let todasMasDe3 = frutas.every(f => f.length > 3);

let ordenadas = [...frutas].sort();
let textoFrutas = frutas.reduce((acc, f) => acc + ", " + f);

console.log({ frutasMayus, conA, posManzana, Ps, todasMasDe3, ordenadas, textoFrutas });