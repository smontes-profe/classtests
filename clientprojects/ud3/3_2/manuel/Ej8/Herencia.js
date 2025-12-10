class Vehicle {
  constructor(name) {
    this.name = name;
  }

  move() {
    console.log(`${this.name} se está moviendo`);
  }
}

class Car extends Vehicle {
  constructor(name, model) {
    super(name);
    this.model = model;
  }

  move() {
    console.log(`${this.name} is Rolling out!`);
  }

  info() {
    console.log(`Nombre: ${this.name}, Modelo: ${this.model}`);
  }
}
const myCar = new Car("Opel", "Zafira");
myCar.move();
myCar.info();