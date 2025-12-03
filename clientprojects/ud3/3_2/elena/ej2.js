
// Operador in y bucle for in

let persona = { // Objeto persona
    nombre: "Ana",
    edad: 28,
    pais: "España"
}

console.log("¿'nombre' in persona?", "nombre" in persona); // Esto daria true
console.log("¿'apellido' in persona?", "apellido" in persona); // Esto daria false

for (let clave in persona) {
    console.log(`${clave}: ${persona[clave]}`)
}


