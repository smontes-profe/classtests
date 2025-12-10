// 2. Operador "in" y bucle "for...in"
// ------PUNTOS: 0.5

// Comprueba si la propiedad nombre existe en el objeto persona usando el operador "in".
// Luego, verifica si existe la propiedad apellido.

// Utiliza un bucle "for...in" para recorrer todas las propiedades 
// del objeto persona e imprime tanto las claves como los valores.

const obj = {
    nombre: "Ana",
    edad: 28,
    trabajo: "Ingeniera"
};

console.log("nombre" in obj);
console.log("apellido" in obj);

for (const propiedad in obj) {
    console.log(`${propiedad}: ${obj[propiedad]}`);
}