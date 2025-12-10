let usuario1 = {
  nombre: "Jose Braulio",
  edad: 75,
  email: "ErPatica@gmail.com"
};

let usuario2 = usuario1;
usuario2.edad = 15;

console.log(usuario1.edad);

let clon = Object.assign({}, usuario1);
clon.nombre = "Marcos";

console.log(usuario1.nombre);
console.log(clon.nombre);