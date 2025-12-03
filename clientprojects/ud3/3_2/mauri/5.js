// Archivo JavaScript 5
function car (name, model, year) {
    this.name = name;
    this.model = model;
    this.year = year;
}

// Crear objeto car
const myCar = new car("Audi", "R8", 2014);
console.log(myCar);