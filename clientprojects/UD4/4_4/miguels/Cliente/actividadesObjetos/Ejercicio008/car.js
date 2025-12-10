'use strict';

import { Vehicle } from "./vehicle.js";

export class Car extends Vehicle {
    constructor (name, model) {
        super(name);
        this.model = model;
    }

    move() {
        console.log(`${this.nombre} is Rolling out!`);
    }

    info() {
        console.log(`Nombre: ${this.nombre}. Modelo: ${this.model}.`);
    }


}