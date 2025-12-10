
// Herencia de clases

class Vehicle { // Clase base
  constructor(name) { // Constructor
    this.name = name; 
  }

  move() { // Método
    console.log(`${this.name} se está moviendo`);
  }
}


class Car extends Vehicle { // Clase hija
  constructor(name, model) { // Constructor
    super(name); // Llama al constructor de Vehicle
    this.model = model;
  }

  move() { // Método sobreescrito
    console.log(`${this.name} is Rolling out!`);
  }

  info() { // Método adicional
    console.log(`Nombre: ${this.name}, Modelo: ${this.model}`);
  }
}


const myCar = new Car("Toyota", "BZ4X"); // Objeto
myCar.move(); 
myCar.info(); 


