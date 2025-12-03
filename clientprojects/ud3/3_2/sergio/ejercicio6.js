//Creo el simbolo
let id = Symbol("id")

//Creo el objeto empleado
let empleado = {
    nombre: "Sergio",
    puesto: "Programador"
};

//Añado la propiedad con simbolo
empleado[id] = 12345;

//Recorro las propiedades
for (let clave in empleado) {
    console.log(clave + ": " + empleado[clave]);
}

//Hago el acceso directo a la propiedad con simbolo
console.log(empleado[id]);