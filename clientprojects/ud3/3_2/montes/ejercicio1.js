// PUNTOS:
// 1. Crear un objeto llamado persona con las siguientes propiedades:
// 2. Acceder a las propiedades del objeto utilizando notación de punto e imprime el nombre y la edad.
// 3. Luego, modificar el objeto persona:
// 4. Añade una nueva propiedad pais con el valor "España".
// 5. Elimina la propiedad trabajo.
// 6. Imprime el objeto completo de nuevo.
// 7. Luego, usa notación de corchetes para acceder a la propiedad edad del objeto persona creado anteriormente y mostrarla.
const obj = {
  nombre: "Ana",
  edad: "28",
  trabajo: "Ingeniera"
};

console.log(`${obj.nombre} tiene ${obj.edad} años y trabaja como ${obj.trabajo}`);

console.log(obj);
 
obj.pais = "España";
console.log(obj);

delete obj.trabajo; 
console.log(obj);
console.log(`Edad (a través de notación de corchetes): ${obj["edad"]}`);