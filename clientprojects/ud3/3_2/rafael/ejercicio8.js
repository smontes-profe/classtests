// EJERCICIO 8
class Vehicle {
    constructor(nombre) {
        this.nombre = nombre;
    }
    move() {
        console.log(`${this.nombre} se está moviendo`);
    }
}

class Car extends Vehicle {
    constructor(name, model) {
        super(name);
        this.model = model;
    }
    move() {
        console.log(`${this.nombre} is Rolling out!`);
    }
    info() {
        console.log(`Name: ${this.nombre}, Model: ${this.model}`);
    }
}

let myCar = new Car("Toyota", "BZ4X");
myCar.move();
myCar.info();