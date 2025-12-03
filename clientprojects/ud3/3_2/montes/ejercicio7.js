// 8. Herencia de Clases
// ------PUNTOS: 1.5
// Crea una clase base llamada Vehicle que tenga las siguientes características:
// • Un constructor que reciba un parámetro nombre para inicializar la propiedad del mismo nombre.
// • Un método llamado move() que imprima un mensaje genérico:
// "[name] se está moviendo”.

// Luego, crea una clase hija llamada Car que extienda de Vehicle con las siguientes características:
// • Un constructor que reciba name y model, y que invoque al constructor de la clase base.
// • Sobrescribe el método move() para que en lugar del mensaje genérico, imprima "[name] is Rolling out!".
// • Un método adicional info() que imprima el name y model.

// Luego:
// Crea un objeto Car llamado myCar con name "Toyota" y model "BZ4X".
// Llama al método move() y al método info() desde el objeto myCar.

class vehicle {
    constructor(name) {
        this.name = name;

    }
    move() {
        console.log(`${this.name} se está moviendo`);
    }
}

class car extends vehicle {
    constructor(name, model) {
        super(name);
        this.model = model;
    }
    move() {
        console.log(`${this.name} is Rolling out!`);
    }
    info() {
        console.log(`${this.name} ${this.model}`);
    }
}   

const myCar = new car("Toyota", "BZ4X");
myCar.move();
myCar.info();