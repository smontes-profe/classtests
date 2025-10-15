// EJERCICIO 1: Variable inexistente


let a = 5;
let b = 10;
let result = a + b;
console.log("Resultado es: " + result); // Estaba mal escrito "reslt"


// Error: Escribí mal el nombre de la variable
// Solución: Cambiar "reslt" por "result"



// EJERCICIO 2: Comparaciones sospechosas


let edad = 16;
if (edad >= 18) { // Estaba "=>" pero eso es para funciones
    console.log("Eres mayor de edad");
} else {
    console.log("Eres menor de edad");
}


// Error: Usar "=>" que no compara números
// Solución: Poner ">=" para comparar si es mayor o igual



// EJERCICIO 3: Return of the Jedi


function multiplicar(a, b) {
    let ofthejedi = a * b;
    return ofthejedi; // Estaba comentado y no devolvía nada
}


let total = multiplicar(3, 4);
console.log("Total: " + total);


// Error: El return estaba comentado
// Solución: Quitar las // para que devuelva el resultado



// EJERCICIO 4: Names, names...


function saludar(nombre) {
    console.log("Hola " + nombre); // Estaba "name" pero el parámetro es "nombre"
}


saludar("Ana");


// Error: El parámetro se llama "nombre" pero estaba "name"
// Solución: Usar "nombre" igual que estaba definido arriba



// EJERCICIO 5: Out of control


let numeros = [1, 2, 3, 4];
let suma = 0;


for (let i = 0; i < numeros.length; i++) { // Estaba "<=" y se pasaba del array
    suma += numeros[i];
}


console.log("Suma total: " + suma);


// Error: Con "<=" se intetaba acceder a numeros[4] que no existe
// Solución: Cambiar a "<" para no pasarse



// EJERCICIO 6: Usando expresiones


function esPar(num) {
    if (num % 2 === 0) { // Estaba "=" pero eso asigna, no compara
        return true;
    } else {
        return false;
    }
}


console.log(esPar(3));
console.log(esPar(4));


// Error: Un solo "=" asigna valores, no compara y se queria comparar
// Solución: Usar "===" para comparar



// EJERCICIO 7: Callback defectuoso


function procesarDatos(datos, callback) {
    callback(datos); // Estaba "dat" pero el parámetro es "datos"
}


procesarDatos([1,2,3], function(d) {
    console.log("Datos recibidos:", d);
});


// Error: Esataba "dat" pero el parámetro se llama "datos"
// Solución: Usar el nombre correcto "datos"



// EJERCICIO 8: Evento click sospechoso


// No funciona porque estamos en un archivo .js


/*
<!DOCTYPE html>
<html lang="es">
<body>
  <button id="miBoton">Click me</button>
 
  <script>
    const btn = document.getElementById("miBoton");
    btn.addEventListener("click", function() {
        let msg = "Hola mundo";
        console.log(msg); // Estaba "msj" pero la variable es "msg"
    });
  </script>
</body>
</html>
*/


// Error: La variable se llama "msg" no "msj"
// Solución: Escribir bien "msg"



// EJERCICIO 9: Cálculo misterioso


function calcularPrecio(base, descuento) {
    let precioFinal = base;
    if (descuento) {
        // Hay que dividir entre 100 si es mayor que 1
        let descuentoNormalizado = descuento > 1 ? descuento / 100 : descuento;
        precioFinal = base - base * descuentoNormalizado;
    }
    return precioFinal.toFixed(2);
}


console.log(calcularPrecio(100, 0.2));
console.log(calcularPrecio(100, 60));  


// Error: Cuando paso 60, el código lo multiplica directamente y da negativo
// Solución: Si el descuento es mayor que 1, dividirlo entre 100 primero
