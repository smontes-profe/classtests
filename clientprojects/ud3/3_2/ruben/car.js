class Car{
    constructor(name, model, year) {
    this.name = name;
    this.model = model;
    this.year = year;
    }
    toString(){
        return `Car Name: ${this.name}, Model: ${this.model}, Year: ${this.year}`;
    }

}

export {Car};