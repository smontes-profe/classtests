console.log("nombre" in persona);
console.log("apellido" in persona);

for (let property in persona) {
  console.log(property + ": " + persona[property]);
}