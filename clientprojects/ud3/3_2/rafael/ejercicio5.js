// EJERCICIO 5

function Car(name, model, year) {
    this.name = name;
    this.model = model;
    this.year = year;
}
// Crear instancias de Car
let car1 = new Car("Toyota", "Corolla", 2020);
let car2 = new Car("Seat", "Panda", 2009);
// Mostrar las propiedades de los objetos creados
console.log("Car 1:", car1);
console.log("Car 2:", car2);