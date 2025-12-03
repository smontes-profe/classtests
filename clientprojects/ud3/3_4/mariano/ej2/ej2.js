"use strict"



// 1️ Función saludar(nombre)

function saludar(nombre) {
    return `Hola, ${nombre}!`;
  }
  

  console.log(saludar("Mariano")); 
  
  
  // 2️ Función esPar(numero)
  
  function esPar(numero) {
    return numero % 2 === 0;
  }
  

  console.log(esPar(4)); 
  console.log(esPar(7)); 
  
  
  // 3️ Función operacionArray(arr, callback)
 
  function operacionArray(arr, callback) {
    const resultado = [];
    for (let num of arr) {
      resultado.push(callback(num));
    }
    return resultado;
  }
  

  function multiplicarPor2(num) {
    return num * 2;
  }

  function sumar5(num) {
    return num + 5;
  }
  
  
  const numeros = [1, 2, 3, 4];
  console.log("Array original:", numeros);
  console.log("Multiplicado por 2:", operacionArray(numeros, multiplicarPor2)); 
  console.log("Sumar 5 a cada elemento:", operacionArray(numeros, sumar5));    
  
  
  // 4️ Función flecha promedio

  const promedio = arr => arr.reduce((acum, num) => acum + num, 0) / arr.length;
  

  console.log("Promedio del array:", promedio(numeros));
  