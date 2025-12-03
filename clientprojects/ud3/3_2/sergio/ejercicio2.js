//Compruebo si existen propiedades
console.log("nombre" in persona);
console.log("apellido" in persona);

//Recorro las propiedades con for... in
for (let clave in persona) {
    console.log(clave + ": " + persona[clave]);
}