// Archivo JavaScript 3
const usuario1 = {
    nombre: "Ruben",
    edad: 22,
    email: "ruben@gmail.com"
};

console.log(usuario1);

// Copia por referencia
const usuario2 = usuario1;

// Modificar una propiedad en la copia
usuario2.edad = 23;
console.log(usuario1.edad);

// Clonacion superficial

const usuario3 = Object.assign({}, usuario1);

usuario3.nombre = "Laura";

// Comprobar los resultados
console.log(usuario1.nombre); // Ruben

console.log(usuario3.nombre); // Laura