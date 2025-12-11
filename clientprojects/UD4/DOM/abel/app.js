// app.js

// **********************************************
// EJERCICIO 1: Selección de Elementos
// **********************************************

// Guarda en una variable el elemento con ID titulo-principal.
const tituloPrincipal = document.getElementById('titulo-principal');

// Guarda en una variable el primer elemento con clase subtitulo.
const subtitulo = document.querySelector('.subtitulo');

// Guarda en una variable una NodeList con todos los elementos <img> que tengan la clase thumb.
const thumbs = document.querySelectorAll('img.thumb'); // O document.getElementsByClassName('thumb')

// Guarda en una variable el elemento <button> que tiene el ID btn-add-task.
const btnAddTask = document.getElementById('btn-add-task');

// Imprime por consola el contenido de texto de estas variables.
console.log('--- Ejercicio 1: Selección de Elementos ---');
console.log('titulo-principal textContent:', tituloPrincipal.textContent);
console.log('subtitulo textContent:', subtitulo.textContent);
console.log('thumbs (NodeList):', thumbs);
console.log('btn-add-task:', btnAddTask);
console.log('-------------------------------------------');


// **********************************************
// EJERCICIO 2: El Interruptor
// **********************************************

const btnToggle = document.getElementById('btn-toggle');
const lightBulb = document.getElementById('light-bulb');

// Añade un addEventListener al botón btn-toggle.
btnToggle.addEventListener('click', () => {
    // El div con ID light-bulb debe intercambiar (toggle) las clases luz-apagada y luz-encendida.
    lightBulb.classList.toggle('luz-apagada');
    lightBulb.classList.toggle('luz-encendida');
});


// **********************************************
// EJERCICIO 3: Editor de Perfil
// **********************************************

// Selecciona el elemento con clase profile-name y cambia su textContent.
const profileName = document.querySelector('.profile-name');
profileName.textContent = 'Mi Nombre de Alumno';

// Selecciona el elemento con clase profile-desc y cambia su textContent.
const profileDesc = document.querySelector('.profile-desc');
profileDesc.textContent = 'Estudiante de 2º de DAW';

// Selecciona el section con ID profile-card y usa setAttribute para cambiar su atributo data-user-id.
const profileCard = document.getElementById('profile-card');
profileCard.setAttribute('data-user-id', 'DWEC-001');


// **********************************************
// EJERCICIO 4: Galería de Imágenes
// **********************************************

const mainImage = document.getElementById('main-image');
// 'thumbs' ya está seleccionada del Ejercicio 1.

// Usando un bucle (forEach), añade un addEventListener de tipo click a cada miniatura.
thumbs.forEach(thumb => {
    thumb.addEventListener('click', (event) => {
        // Cuando se haga clic en una miniatura, la propiedad src de la imagen principal
        // debe cambiar por la propiedad src de la miniatura que fue clicada.
        mainImage.src = event.target.src;
        mainImage.alt = event.target.alt; // Opcional: para mantener la accesibilidad
    });
});


// **********************************************
// EJERCICIO 5: Añadir Tareas
// **********************************************

const taskList = document.getElementById('task-list');
const inputNewTask = document.getElementById('input-new-task');
// 'btnAddTask' ya está seleccionada del Ejercicio 1.

// Añade un addEventListener al botón btn-add-task.
btnAddTask.addEventListener('click', () => {
    // Lee el valor (value) del input.
    const newTaskText = inputNewTask.value.trim(); // Usamos .trim() para evitar espacios en blanco.

    // Si el valor no está vacío:
    if (newTaskText !== '') {
        // Crea un nuevo elemento <li>.
        const newLi = document.createElement('li');

        // Establece el textContent del <li> al valor del input.
        newLi.textContent = newTaskText;

        // Añade (con appendChild) el nuevo <li> a la lista task-list.
        taskList.appendChild(newLi);

        // Limpia el valor del input (déjalo en "").
        inputNewTask.value = '';
    }
});


// **********************************************
// EJERCICIO 6: El Modal
// **********************************************

const modal = document.getElementById('modal');
const btnOpenModal = document.getElementById('btn-open-modal');
const btnCloseModal = document.getElementById('btn-close-modal');

// Abre el modal: Quita la clase hidden.
btnOpenModal.addEventListener('click', () => {
    modal.classList.remove('hidden');
});

// Cierra el modal: Añade la clase hidden.
btnCloseModal.addEventListener('click', () => {
    modal.classList.add('hidden');
});


// **********************************************
// EJERCICIO 7: Notificación Avanzada
// **********************************************

const statusBox = document.getElementById('status-box');

// 1. Usa innerHTML para cambiar su contenido.
statusBox.innerHTML = '<strong>Estado:</strong> <span id="current-status" class="status-success">Conectado</span>';

// 2. Desafío: 3 segundos después de cargar la página, cambiar la notificación.
setTimeout(() => {
    // Selecciona el span que acabamos de crear.
    const currentStatusSpan = document.getElementById('current-status');

    if (currentStatusSpan) {
        // Cambia la clase a status-error.
        currentStatusSpan.classList.remove('status-success');
        currentStatusSpan.classList.add('status-error');

        // Cambia su textContent.
        currentStatusSpan.textContent = 'Desconectado';
    }
}, 3000); // 3000 milisegundos = 3 segundos


// **********************************************
// EJERCICIO 8: Preguntas Teóricas
// **********************************************

/*
Criterio (h): ¿Por qué es preferible usar elemento.classList.add('mi-clase') en lugar de elemento.style.color = 'blue' para cambiar la apariencia de un elemento?

Es preferible usar elemento.classList.add('mi-clase') porque promueve la **separación de capas** (Estructura en HTML, Estilos en CSS, Comportamiento en JavaScript).
1.  **Mantenibilidad y Limpieza:** El código JavaScript se mantiene enfocado en la lógica y la manipulación del DOM, mientras que todas las reglas de estilo (color, tamaño de fuente, márgenes, etc.) residen de forma centralizada en el CSS. Esto hace que los estilos sean más fáciles de mantener y modificar.
2.  **Eficiencia de CSS:** Las clases de CSS permiten aplicar múltiples propiedades de estilo de una sola vez, e incluso definir estados complejos con pseudoclases (:hover, :active, etc.) y animaciones, que son más difíciles o imposibles de gestionar eficientemente con JavaScript.
3.  **Prioridad:** Manipular 'elemento.style' inserta estilos *en línea* (inline styles), que tienen la máxima especificidad y pueden ser difíciles de sobrescribir con CSS. Usar clases permite que la cascada de CSS funcione correctamente.

---

Criterios (f, g, e): ¿Cuál es la forma estándar de añadir un evento (como un clic) a un botón? ¿Por qué esta forma es mejor para la compatibilidad entre navegadores (Criterio g) que poner onclick="miFuncion()" directamente en el HTML?

**Forma Estándar:** La forma estándar y moderna es usar el método **addEventListener()** en JavaScript:
`elemento.addEventListener('click', miFuncion);`

**Por qué es mejor que onclick="..." en HTML:**
1.  **Separación de Capas (Criterio f):** Al igual que con los estilos, separa el comportamiento (JavaScript) de la estructura (HTML). El HTML se mantiene limpio y centrado en el contenido.
2.  **Múltiples Manejadores (Criterio e):** `addEventListener` permite asignar **múltiples** funciones al mismo evento de un elemento (por ejemplo, dos funciones diferentes que se ejecutan al hacer clic en el mismo botón) sin sobrescribir las anteriores. El atributo `onclick` en HTML solo permite una única función, sobrescribiendo cualquier otra que se intente asignar.
3.  **Compatibilidad y Estándar (Criterio g):** `addEventListener` es el estándar moderno definido en el W3C DOM. Aunque la mayoría de navegadores aún soportan los atributos `on...` antiguos, `addEventListener` ofrece un manejo de eventos más robusto, flexible y consistente, siendo la práctica recomendada para la compatibilidad entre navegadores actuales.
*/