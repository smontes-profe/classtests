// ======================================================
// 1. Creación y acceso a objetos
// ======================================================
console.log("--- Tarea 1: Creación y Acceso ---");

// Creamos el objeto persona
let persona = {
    nombre: "Ana",
    edad: 28,
    trabajo: "Ingeniera"
};

// Accedemos con el punto
console.log("Nombre:", persona.nombre);
console.log("Edad:", persona.edad);

// Añadimos la propiedad 'pais'
persona.pais = "España";
// Borramos la propiedad 'trabajo'
delete persona.trabajo;

// Vemos cómo quedó el objeto
console.log("Objeto persona modificado:", persona);

// Accedemos con corchetes
console.log("Edad (con corchetes):", persona["edad"]);


// ======================================================
// 2. Operador "in" y bucle "for...in"
// ======================================================
console.log("\n--- Tarea 2: Operador 'in' y 'for...in' ---");

// Miramos si 'nombre' existe
console.log("¿Existe 'nombre'?", "nombre" in persona);
// Miramos si 'apellido' existe (debería dar false)
console.log("¿Existe 'apellido'?", "apellido" in persona);

// Recorremos el objeto con for...in
console.log("Recorriendo el objeto persona:");
for (let clave in persona) {
    // 'clave' es el nombre de la propiedad (ej: "nombre")
    // 'persona[clave]' es el valor (ej: "Ana")
    console.log(`  ${clave}: ${persona[clave]}`);
}


// ======================================================
// 3. Referencias de objetos y clonación
// ======================================================
console.log("\n--- Tarea 3: Referencias y Clonación ---");

let usuario1 = {
    nombre: "Carlos",
    edad: 25,
    email: "carlos@correo.com"
};

// Copia por referencia (usuario2 apunta al mismo objeto que usuario1)
let usuario2 = usuario1;

// Modificamos usuario2...
usuario2.edad = 30;

// ...y vemos que usuario1 también cambia
console.log("Usuario 1 (original):", usuario1);
console.log("Usuario 2 (referencia):", usuario2);

// Clonación superficial (creamos una copia)
let usuarioClonado = Object.assign({}, usuario1);

// Modificamos el clon
usuarioClonado.email = "clon@correo.com";

// Comprobamos que el original NO cambió
console.log("Usuario 1 (después del clon):", usuario1);
console.log("Usuario Clonado:", usuarioClonado);


// ======================================================
// 5. Métodos en objetos y uso de "this" (Constructor)
// ======================================================
console.log("\n--- Tarea 5: Constructor y 'this' ---");

// Creamos una función constructora (la forma "antigua" de hacer clases)
function CarConstructor(name, model, year) {
    this.name = name;
    this.model = model;
    this.year = year;
}

// Creamos un coche nuevo usando 'new'
let miAuto = new CarConstructor("Tesla", "Model S", 2023);
console.log("Objeto creado con constructor:", miAuto);


// ======================================================
// 6. Symbol y claves ocultas
// ======================================================
console.log("\n--- Tarea 6: Symbol ---");

// Creamos un Symbol para un id
let id = Symbol("id");

let empleado = {
    nombre: "Laura",
    puesto: "Manager"
};

// Añadimos la propiedad usando el Symbol (con corchetes)
empleado[id] = "abc12345";

// El Symbol no se ve en un console.log normal
console.log("Empleado con Symbol:", empleado);
// Así se pueden ver las claves Symbol
console.log("Claves Symbol:", Object.getOwnPropertySymbols(empleado));
console.log("Valor del ID Symbol:", empleado[id]);

// El bucle 'for...in' ignora los Symbol
console.log("Recorriendo empleado con for...in (ignora Symbol):");
for (let k in empleado) {
    console.log(`  ${k}: ${empleado[k]}`);
}


// ======================================================
// 7. Conversión de objetos a valores primitivos
// ======================================================
console.log("\n--- Tarea 7: Conversión a Primitivos (toString) ---");

let cuentaBancaria = {
    saldo: 1000,

    // Definimos qué pasa cuando se convierte a string
    toString() {
        return `Saldo: ${this.saldo} EUR`;
    }
};

// Al usarlo como string, llama a toString()
console.log("Imprimiendo el objeto cuenta:");
console.log(String(cuentaBancaria));
// window.alert(cuentaBancaria); // Si descomentamos esto, también usaría toString


// ======================================================
// 8. Herencia de Clases
// ======================================================
console.log("\n--- Tarea 8: Herencia de Clases ---");

// Clase "Padre"
class Vehicle {
    constructor(nombre) {
        this.nombre = nombre;
    }

    move() {
        console.log(`${this.nombre} se está moviendo`);
    }
}

// Clase "Hija" que hereda de Vehicle
class Car extends Vehicle {
    constructor(name, model) {
        super(name); // Llamamos al constructor del padre
        this.model = model;
    }

    // Sobrescribimos el método move()
    move() {
        console.log(`${this.nombre} is Rolling out!`);
    }

    // Método propio de Car
    info() {
        console.log(`Auto: ${this.nombre}, Modelo: ${this.model}`);
    }
}

// Creamos el objeto y probamos los métodos
let myCar = new Car("Toyota", "BZ4X");
myCar.move(); // Llama al método de Car (el sobrescrito)
myCar.info(); // Llama al método de Car


// ======================================================
// 9. Encapsulación con Propiedades Privadas
// ======================================================
console.log("\n--- Tarea 9: Encapsulación (Privadas) ---");

class CajaFuerte {
    // Declaramos el campo privado (importante hacerlo arriba)
    #codigo;

    constructor(propietario, codigoInicial) {
        this.propietario = propietario;
        this.#codigo = codigoInicial; // Asignamos valor al campo privado
    }

    // Método público para ver el código
    verCodigo() {
        return this.#codigo; // Desde dentro sí podemos acceder
    }

    // Método público para cambiar el código
    cambiarCodigo(nuevoCodigo) {
        if (String(nuevoCodigo).length === 4) {
            this.#codigo = nuevoCodigo;
            console.log("Código cambiado exitosamente.");
        } else {
            console.log("Error: El nuevo código debe tener 4 dígitos.");
        }
    }
}

// Creamos la caja
let miCaja = new CajaFuerte("Ana", 1234);
console.log(`Propietario: ${miCaja.propietario}`);
console.log(`Código inicial: ${miCaja.verCodigo()}`);

// Cambiamos el código (funciona)
miCaja.cambiarCodigo(5678);
console.log(`Nuevo código: ${miCaja.verCodigo()}`);

// Intentamos cambiar con uno inválido
miCaja.cambiarCodigo(99);
console.log(`Código (sin cambiar): ${miCaja.verCodigo()}`);

// Intentamos acceder directamente (dará error)
try {
    // Pongo .codigo (sin #) para que no rompa el script, da 'undefined'
    // Si pusiera miCaja.#codigo, daría un error de sintaxis
    console.log(miCaja.codigo);
} catch (e) {
    console.log("Error al intentar acceder a #codigo directamente:", e.message);
}


// ======================================================
// 10. Objeto window, DOM y eventos
// ======================================================
console.log("\n--- Tarea 10: DOM y Eventos ---");
console.log("Interactúa con el HTML en la página para probar esta tarea.");


// 1. Pillamos los elementos del HTML por su ID
const inputNombre = document.getElementById("nombre");
const btnSaludar = document.getElementById("saludar");
const divMensajes = document.getElementById("mensajes");

// 2. Le decimos al botón que "escuche" los clics
btnSaludar.addEventListener("click", function () {

    // Cogemos lo que ha escrito el usuario
    const nombreUsuario = inputNombre.value;

    // Validamos que no esté vacío
    if (nombreUsuario.trim() === "") {
        alert("Por favor, ingresa un nombre");
        return; // Detiene la función aquí
    }

    // Creamos el mensaje
    const saludo = `¡Hola ${nombreUsuario}! Bienvenido/a.`;

    // 3. Mostramos el mensaje en el DIV
    // Creamos una etiqueta <p> nueva
    const pMensaje = document.createElement("p");
    pMensaje.textContent = saludo;
    // Metemos el <p> nuevo dentro del <div>
    divMensajes.appendChild(pMensaje);

    // 4. Sacamos un alert
    window.alert(saludo);

    // 5. Abrimos la ventana pop-up
    try {
        const ventanaHija = window.open("", "ventanaBienvenida", "width=400,height=200");
        ventanaHija.document.write(`<h1>${saludo}</h1>`);
        ventanaHija.document.write("<p>Esta ventana se ha abierto desde la principal.</p>");
    } catch (e) {
        console.warn("No se pudo abrir la ventana emergente. Revisa si el navegador las está bloqueando.");
    }

    // 6. Hacemos que el mensaje del DIV desaparezca
    setTimeout(function () {
        // Borramos el <p> que creamos
        pMensaje.remove();
    }, 5000); // 5 segundos

    // Opcional: Limpiamos el campo de texto
    inputNombre.value = "";
});