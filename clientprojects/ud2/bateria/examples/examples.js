"use strict";
let numberOfPersons=30;
function createPersonsArray(num){
    let personsArray=[];
    for(let i=0;i<num;i++){
        let person={};
        person.name="Persona "+(i+1);
        person.age=Math.floor(Math.random()*100);
        personsArray.push(person);
    }  
    return personsArray;
}
const factorial = n => n <= 1 ? 1 : n * factorial(n - 1);
const suma = (a, b) => a + b;

//let persons=createPersonsArray(numberOfPersons);
//console.log(persons);
console.log(factorial(5));