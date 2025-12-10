# Evaluación RA6: Manipulación del DOM con JavaScript

## 📋 Descripción del Proyecto

Este proyecto consiste en una batería de **7 ejercicios prácticos** diseñados para demostrar la competencia en la manipulación del DOM (Document Object Model) utilizando JavaScript puro, sin alterar la estructura HTML original. El objetivo es aplicar conceptos fundamentales de JavaScript en la web, como selección de elementos, manipulación de atributos y clases, gestión de eventos, creación dinámica de nodos y programación asincrónica.

## 🎯 Objetivos de Aprendizaje

- Dominar los métodos de selección del DOM (`getElementById`, `querySelector`, `querySelectorAll`)
- Manipular clases CSS mediante `classList` (add, remove, toggle)
- Modificar atributos y contenido de elementos (`textContent`, `innerHTML`, `setAttribute`)
- Gestionar eventos del usuario (`addEventListener`)
- Crear y agregar nuevos elementos al DOM (`createElement`, `appendChild`)
- Implementar interactividad avanzada (modales, notificaciones)
- Aplicar programación asincrónica básica (`setTimeout`)

## 🚀 Tecnologías

- **HTML5** (Semántico)
- **CSS3** (Estilos modulares y responsive)
- **JavaScript (ES6+)** (Arrow functions, const/let, template literals)

## 🛠️ Instalación y Uso

1. Clonar el repositorio o descargar los archivos.
2. Abrir `index.html` en tu navegador de preferencia.
3. Abrir la consola del navegador (F12) para ver los mensajes de depuración.

> **Nota**: No se requiere servidor web ni dependencias externas. El proyecto funciona directamente desde el sistema de archivos.

## 📂 Estructura del Proyecto

```plaintext
UD4.2/
├── index.html          # Estructura HTML (NO MODIFICAR)
├── css/
│   └── style.css       # Estilos de la aplicación
├── js/
│   └── app.js          # Lógica JavaScript (archivo principal de trabajo)
└── README.md           # Este archivo
```

## 📚 Descripción de Ejercicios

### Ejercicio 1: Selección de Elementos ✅

**Objetivo**: Dominar los métodos de selección del DOM.

**Tareas**:

- Seleccionar elemento por ID (`#titulo-principal`)
- Seleccionar elemento por clase (`.subtitulo`)
- Seleccionar múltiples elementos (todas las imágenes `.thumb`)
- Seleccionar botón específico (`#btn-add-task`)
- Mostrar el contenido por consola

**Métodos utilizados**: `getElementById()`, `querySelector()`, `querySelectorAll()`

---

### Ejercicio 2: El Interruptor 💡✅

**Objetivo**: Gestionar clases CSS dinámicamente.

**Tareas**:

- Implementar toggle de clases en el elemento `#light-bulb`
- Alternar entre `.luz-apagada` y `.luz-encendida` al hacer clic en el botón
- **Restricción**: Prohibido usar `elemento.style`

**Métodos utilizados**: `addEventListener()`, `classList.toggle()`

**Interacción**: Hacer clic en "Encender / Apagar" cambia el estado visual de la bombilla.

---

### Ejercicio 3: Editor de Perfil 👤✅

**Objetivo**: Modificar contenido de texto y atributos personalizados.

**Tareas**:

- Cambiar el nombre del perfil a "Mi Nombre de Alumno"
- Cambiar la descripción a "Estudiante de 2º de DAW"
- Modificar el atributo `data-user-id` a "DEWC-001"

**Métodos utilizados**: `querySelector()`, `textContent`, `setAttribute()`

---

### Ejercicio 4: Galería de Imágenes 🖼️✅

**Objetivo**: Gestionar eventos dinámicos en múltiples elementos.

**Tareas**:

- Seleccionar la imagen principal (`#main-image`)
- Agregar listeners a todas las miniaturas (`.thumb`)
- Al hacer clic en una miniatura, actualizar el `src` de la imagen principal

**Métodos utilizados**: `forEach()`, `addEventListener()`, `setAttribute()`

**Interacción**: Hacer clic en cualquier miniatura cambia la imagen principal.

---

### Ejercicio 5: Lista de Tareas ✔️✅

**Objetivo**: Crear nodos dinámicamente y agregarlos al DOM.

**Tareas**:

- Leer el valor del input `#input-new-task`
- Validar que no esté vacío
- Crear un nuevo elemento `<li>` con el texto del input
- Agregarlo a la lista `#task-list`
- Limpiar el input después de agregar la tarea

**Métodos utilizados**: `createElement()`, `appendChild()`, `trim()`, manipulación de `value`

**Interacción**: Escribir texto en el input y hacer clic en "Añadir Tarea" agrega un nuevo ítem a la lista.

---

### Ejercicio 6: El Modal 🔲✅

**Objetivo**: Implementar un sistema de modal con clase CSS.

**Tareas**:

- Abrir el modal quitando la clase `.hidden`
- Cerrar el modal agregando la clase `.hidden`
- **Restricción**: Prohibido usar `elemento.style.display`

**Métodos utilizados**: `classList.add()`, `classList.remove()`

**Interacción**:

- Botón "Abrir Modal" muestra el modal
- Botón "Cerrar" dentro del modal lo oculta

---

### Ejercicio 7: Notificaciones Avanzadas 📢✅

**Objetivo**: Manipular HTML interno y programación asincrónica.

**Tareas**:

- Cambiar el contenido del `#status-box` usando `innerHTML`
- Mostrar inicialmente: `<strong>Estado:</strong> <span class="status-success">Conectado</span>`
- **Desafío**: Después de 3 segundos, cambiar el estado a "Desconectado" con clase `.status-error`

**Métodos utilizados**: `innerHTML`, `setTimeout()`, `querySelector()`, `classList`

**Interacción**: Al cargar la página, se muestra "Conectado" (verde) y tras 3 segundos cambia a "Desconectado" (rojo).

---

### Ejercicio 8: Preguntas Teóricas 📝✅

**Respuestas incluidas en `app.js`**:

**1. ¿Por qué es preferible usar `classList` en lugar de `style`?**

- Respeta el principio de "Separación de Responsabilidades"
- CSS se encarga del diseño, JS solo de la lógica
- Los estilos en línea (`style`) tienen demasiada especificidad y ensucian el HTML

**2. ¿Por qué usar `addEventListener` en lugar de `onclick` en el HTML?**

- Permite múltiples listeners en el mismo elemento
- Mantiene el HTML limpio (sin código JS mezclado)
- Mejora la mantenibilidad y centraliza la lógica en archivos `.js`

## 🎨 Características del Diseño

- **Layout responsive** con CSS Grid
- **Widgets modulares** con estilos consistentes
- **Efectos visuales**: hover en botones, sombras, transiciones
- **Estados visuales**:
  - Luz apagada (grayscale) vs luz encendida (glow effect)
  - Estados de notificación (success/error) con colores semánticos

## 🔑 Conceptos Clave Implementados

| Concepto | Ejercicios |
|----------|-----------|
| Selección del DOM | 1, 3, 4, 5, 6, 7 |
| Gestión de eventos | 2, 4, 5, 6 |
| Manipulación de clases | 2, 6, 7 |
| Creación de nodos | 5 |
| Modificación de atributos | 3, 4 |
| Manipulación de HTML | 7 |
| Programación asincrónica | 7 |

## ✅ Checklist de Completitud

- [x] Ejercicio 1: Selectores del DOM
- [x] Ejercicio 2: Gestión de clases (classList)
- [x] Ejercicio 3: Manipulación de texto y atributos
- [x] Ejercicio 4: Eventos y Galería
- [x] Ejercicio 5: Creación de nodos (DOM Traversing)
- [x] Ejercicio 6: Interactividad UI (Modales)
- [x] Ejercicio 7: Asincronía básica (setTimeout)
- [x] Ejercicio 8: Preguntas teóricas

## 🧪 Pruebas y Validación

Para verificar que todo funciona correctamente:

1. **Ejercicio 1**: Abrir consola y verificar que se muestran 4 mensajes
2. **Ejercicio 2**: Hacer clic en "Encender / Apagar" y ver cambio visual
3. **Ejercicio 3**: Verificar que el perfil muestra el nombre y descripción correctos
4. **Ejercicio 4**: Hacer clic en miniaturas y verificar cambio de imagen principal
5. **Ejercicio 5**: Añadir varias tareas y verificar que aparecen en la lista
6. **Ejercicio 6**: Abrir y cerrar el modal varias veces
7. **Ejercicio 7**: Esperar 3 segundos y verificar cambio de estado de "Conectado" a "Desconectado"

## 📝 Notas de Desarrollo

- **Restricciones respetadas**: No se modifica el HTML original
- **Buenas prácticas**:
  - Uso de `const` para variables que no cambian
  - Arrow functions para callbacks
  - Validación de inputs antes de procesarlos
  - Comentarios explicativos en código complejo

## 🎓 Autor

**Fco José Montes Belloso**  
Evaluación: RA6 - Desarrollo Web en Entorno Cliente  
Unidad Didáctica 4.2

---

## 📄 Licencia

Este proyecto es material educativo para uso académico.