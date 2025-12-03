
// Métodos en objetos y uso de "this"

function Car(name, model, year) { // Constructor
    this.name = name;
    this.model = model;
    this.year = year;
}

const car1 = new Car("Toyota", "Corolla", 2020);
console.log(car1);


