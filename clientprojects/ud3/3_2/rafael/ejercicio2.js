// EJERCICIO 2

let persona = {
    nombre: "Ana",
    edad: 28,
    pais: "España"
};

// Comprobar si existe la propiedad
console.log("¿Existe 'nombre'?", "nombre" in persona);
console.log("¿Existe 'apellido'?", "apellido" in persona);

// Recorrer con for...in
console.log("\nPropiedades del objeto:");
for (let clave in persona) {
    console.log(`${clave}: ${persona[clave]}`);
}