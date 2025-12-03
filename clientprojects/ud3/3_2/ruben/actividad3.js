let crearUsuario = (nombre, edad, email) => ({ nombre, edad, email });

let usuario1 = crearUsuario("Luis", 35, "luis@example.com");

let usuario2 = usuario1;

usuario2.nombre = "Carlos";

console.log("Usuario 1:", usuario1);
console.log("Usuario 2:", usuario2);

let usuario3 = {};
Object.assign(usuario3, usuario1);

usuario3.nombre = "Marta";

console.log("Usuario 1 después de modificar usuario3:", usuario1);
console.log("Usuario 3:", usuario3);