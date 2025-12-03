let persona = {
  nombre: "Ana",
  edad: 28,
  trabajo: "Ingeniera"
};

console.log(persona.nombre);
console.log(persona.edad);

persona.pais = "España";
delete persona.trabajo;

console.log(persona);
console.log(persona["edad"]);