//Creamos la clase base Vehicle
class Vehicle {
    constructor(nombre){
        this.nombre = nombre;
    }

    move(){
        console.log(`${this.nombre} se está moviendo`);
    }
}

//Creamos la clase derivada Car que hereda de Vehicle
class Car extends Vehicle {
    constructor(name, model){
        super(name);
        this.model = model;
    }

    move(){
        console.log(`${this.nombre} is Rolling out!`);
    }

    info(){
        console.log(`Nombre: ${this.nombre}, Modelo: ${this.model}`);
    }
}

//Creamos una instancia de Car y probamos los métodos
let MyCar = new Car("Toyota", "BZ4X");

//Llamamos a los métodos move e info
MyCar.move();
MyCar.info();