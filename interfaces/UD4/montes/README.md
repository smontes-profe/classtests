# El Arte del Sabor - Recetario Interactivo Multimedia

Bienvenido a **El Arte del Sabor**, una landing page moderna y responsiva diseñada para ofrecer una experiencia culinaria inmersiva. Este proyecto combina diseño visual atractivo, elementos interactivos y multimedia para presentar recetas de alta cocina.

## 🚀 Características Principales

*   **Diseño Responsivo y Adaptable**:
    *   Layout fluido que se adapta a Móviles, Tablets (vertical/horizontal) y Escritorio.
    *   **Menú de Navegación Inteligente**:
        *   *Escritorio*: Barra de navegación completa con efecto Glassmorphism.
        *   *Tablet/Móvil*: Menú hamburguesa interactivo con animaciones suaves y logo integrado.
*   **Experiencia Multimedia**:
    *   **Galería Interactiva**: Visor de recetas con selección de miniaturas y transiciones suaves.
    *   **Video Inmersivo**: Sección de video con fondo ambiental y un **efecto de mosaico dinámico** generado por JavaScript.
    *   **Reproductor Modal**: Visualización de video en ventana emergente (lightbox).
    *   **Ambiente Sonoro**: Reproductor de audio estilizado para música de fondo.
*   **Estética Premium**:
    *   Uso de **Glassmorphism** (efecto cristal) en cabecera y elementos UI.
    *   Tipografías elegantes (*Playfair Display* y *Inter*).
    *   Animaciones de entrada al hacer scroll (Intersection Observer).

## 🛠️ Tecnologías Utilizadas

*   **HTML5**: Estructura semántica y accesible.
*   **CSS3**:
    *   Variables CSS (Custom Properties) para theming consistente.
    *   Flexbox y CSS Grid para maquetación.
    *   Media Queries para control total del diseño responsivo.
    *   Animaciones y transiciones (`keyframes`, `transform`, `opacity`).
*   **JavaScript (Vanilla)**:
    *   Manipulación del DOM.
    *   Lógica del menú hamburguesa y redimensionamiento.
    *   Generación procedimental del efecto mosaico.
    *   Control del modal de video y galería de imágenes.

## 📂 Estructura del Proyecto

```
/ (Raíz)
├── index.html          # Página principal
├── credits.html        # Página de créditos y licencias
├── README.md           # Documentación del proyecto
├── assets/             # Recursos multimedia
│   ├── images/         # Imágenes (Recetas, Logo, Fondos)
│   ├── video/          # Videos (Fondo y Reel)
│   └── audio/          # Archivos de audio
├── css/                # Hojas de estilo modulares
│   ├── styleBase.css       # Variables y reset
│   ├── styleHeader.css     # Cabecera y navegación
│   ├── styleHero.css       # Sección principal
│   ├── styleGallery.css    # Galería de recetas
│   ├── styleVideo.css      # Sección de video y modal
│   ├── styleFooter.css     # Pie de página
│   ├── styleComponents.css # Botones y utilidades
│   └── styleCredits.css    # Estilos específicos de credits.html
└── js/
    └── script.js       # Lógica principal
```

## 💿 Créditos y Licencias

Este proyecto utiliza recursos de terceros (imágenes, video, audio) bajo diversas licencias libres.

*   **Licencia del Proyecto**: [CC BY-NC-SA 2.0](https://creativecommons.org/licenses/by-nc-sa/2.0/) (Atribución-NoComercial-CompartirIgual 2.0 Genérica).
*   Para ver el detalle completo de los autores y fuentes de cada recurso, visita la página de **[Créditos y Licencias](credits.html)**.

## 🔧 Instalación y Uso

1.  Descarga o clona el repositorio.
2.  Asegúrate de que la carpeta `assets` contenga todos los archivos multimedia necesarios.
3.  Abre el archivo `index.html` en tu navegador web favorito.
4.  ¡Disfruta de la experiencia!

---
*Desarrollado para el módulo de Diseño de Interfaces Web (UD4).*
