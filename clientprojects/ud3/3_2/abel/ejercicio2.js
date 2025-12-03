let persona = {
    nombre: "Abel",
    edad: 20,
    pais: "España",
}

console.log("nombre" in persona); // Imprime true
console.log("trabajo" in persona); // Imprime false

// Con el bucle For ... in
for (let clave in persona) {
    console.log(clave + ": " + persona[clave]);
}