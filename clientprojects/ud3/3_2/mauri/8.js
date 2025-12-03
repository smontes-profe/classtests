// Archivo JavaScript 8

// Clase Base
class Vehicle {
    constructor(name) {
        this.name = name;
    }  

    move() {
        console.log(`${this.name} se está moviendo`);
    }   
}

// Clase Derivada
class Car extends Vehicle {
    constructor(name, model) {
        super(name);
        this.model = model;
    }  
    move() {
        console.log(`${this.name} modelo ${this.model} está conduciendo`);
    }

    info() {
        console.log(`Nombre: ${this.name}, Modelo: ${this.model}`);
    }
}

// Crequar objeto Car

const myCar = new Car("Audi", "R8");
console.log(myCar);
myCar.move();
myCar.info();