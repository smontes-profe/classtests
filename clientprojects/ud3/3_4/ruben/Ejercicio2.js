function saludar(par1){
    console.log("Hola " + par1);
}

function esPar(par1){
    return par1 % 2 == 0?  true :  false;
}
let esParResult = esPar(4);
console.log(esParResult);

let array = [5, 10, 7];
 
function sumar(par1, par2){
    return par1 + par2;
}
function multiplicar(par1, par2){
    return par1 * par2;
}
function operacionArray(arr, callback) {
    let resultados = [];
    arr.forEach(element => {
        let result = callback(element, 2);
        resultados.push(result);
    });
    return resultados;
}

const promedio = (arr) => {
    let promed = arr.reduce((acum,actual) => acum + actual, 
    0);
    promed = promed / arr.length;
    return promed;
}
console.log("El promedio es: " + promedio(array));