// Parte 1
let numeros = [4.7, 2.3, 9.8, 6.5];
console.log(numeros);

function redondearArriba(numeros){
    let redondeados = numeros.map(u=> Math.ceil(u));
    return redondeados;
}

let redondeados = redondearArriba(numeros);
console.log(redondeados);

let redondeadosString = redondeados.map(u => u.toString());

let max = Math.max(...redondeados);
console.log(max);

let min = Math.min(...redondeados);
console.log(min);

// Parte 2

let string = "JavaScript";

let stringMayus = string.toUpperCase();
console.log(stringMayus);

let cuatroPrimeras = string.slice(0,4);
console.log(cuatroPrimeras);

if(string.includes("S")){
    console.log("La cadena contiene la letra S");
}