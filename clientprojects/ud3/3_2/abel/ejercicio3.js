
//Usuario 1
let usuario1 = {
    nombre: "Antonio",
    edad: 66,
    email: "Sevilla"
};

//Usuario 2
let usuraio2 = usuario1;

//Cambiamos la edad del usuario 2
usuraio2.edad = 30;

console.log("Cambios en usuario2:");
console.log("Usuario 1:", usuario1);
console.log("Usuario 2:", usuraio2);

//Usamos el object.assign para clonar el usuario1
let clon = Object.assign({}, usuario1);
//Lo modificamos
clon.edad = 25;

console.log("Cambios en el clon:");
console.log("Usuario 1:", usuario1);
console.log("Clon:", clon);