/* --- app2.js --- */

// 1. Seleccionamos los elementos con los que vamos a trabajar
const selectProducto = document.getElementById('producto');
const checkEnvio = document.getElementById('envio-urgente');
const divTotal = document.getElementById('total-pedido');

// 2. Creamos una función que sepa cómo calcular el total
function calcularTotal() {
    
    // Obtenemos el precio del producto.
    // El .value de un <select> es un string, lo convertimos a número.
    let precioProducto = Number(selectProducto.value);
    
    // Obtenemos el coste del envío si está marcado
    let costeEnvio = 0;
    
    // .checked devuelve true si está marcado, false si no
    if (checkEnvio.checked) {
        // El .value del checkbox también es un string
        costeEnvio = Number(checkEnvio.value);
    }
    
    // 3. Calculamos el total
    let total = precioProducto + costeEnvio;
    
    // 4. Actualizamos el DOM (la página)
    divTotal.textContent = `Total: ${total}€`;
}

// 5. Añadimos los "escuchadores" de eventos
// Queremos que se recalcule si cambia el <select>...
selectProducto.addEventListener('change', calcularTotal);
// ...o si cambia el <input type="checkbox">
checkEnvio.addEventListener('change', calcularTotal);

// 6. (Opcional pero recomendado)
// Llamamos a la función una vez al cargar la página
// para asegurar que el total inicial (10€) sea correcto.
calcularTotal();