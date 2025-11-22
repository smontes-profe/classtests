# Portfolio Interactivo del Artista Digital MiArma

## Descripción del Proyecto

Este proyecto consiste en el diseño, maquetación e implementación de una landing page interactiva de una sola página para la artista ficticia "MiArma", especializada en paisajes de ciencia ficción. El proyecto demuestra la capacidad para gestionar todo el ciclo de vida de los contenidos web: desde la selección y optimización de recursos multimedia hasta su integración y manipulación dinámica mediante JavaScript.

---

## Tabla de Recursos Externos

| Archivo | Tipo | URL Original | Autor | Licencia | Notas |
|---------|------|--------------|-------|----------|-------|
| `hero-image.jpg` | Imagen | [URL de Pexels/Pixabay/Unsplash] | [Nombre del autor] | CC BY 3.0 / Pexels License | Redimensionada a 1920px, optimizada < 250KB |
| `logo.svg` | Vector/Logo | [URL de Pixabay/Wikimedia Commons] | [Nombre del autor] | CC0 (Dominio Público) | Logo con fondo transparente |
| `gallery-1-thumb.jpg` | Imagen | [URL de origen] | [Nombre del autor] | Pexels License | Miniatura 400x250px |
| `gallery-1-full.jpg` | Imagen | [URL de origen] | [Nombre del autor] | Pexels License | Versión completa optimizada |
| `gallery-2-thumb.jpg` | Imagen | [URL de origen] | [Nombre del autor] | CC BY 3.0 | Miniatura 400x250px |
| `gallery-2-full.jpg` | Imagen | [URL de origen] | [Nombre del autor] | CC BY 3.0 | Versión completa optimizada |
| `gallery-3-thumb.jpg` | Imagen | [URL de origen] | [Nombre del autor] | Unsplash License | Miniatura 400x250px |
| `gallery-3-full.jpg` | Imagen | [URL de origen] | [Nombre del autor] | Unsplash License | Versión completa optimizada |
| `contact-button.gif` | Animación | [URL de origen] / Creado | [Nombre del autor] / Propio | CC BY 3.0 | GIF animado creado a partir de 2-3 imágenes |
| `space-animation.mp4` | Vídeo | [URL de Pexels/Videvo] | [Nombre del autor] | Pexels License | MP4 H.264, 10-15s, < 3MB |
| `ambient-space.mp3` | Audio | [URL de Freesound] | [Nombre del autor] | CC0 | MP3, 15s, 128 kbps |

### Nota sobre la Búsqueda de Recursos

**Plataformas recomendadas para recursos Creative Commons:**

- **Pexels** (https://www.pexels.com): Imágenes y vídeos con licencia libre (equivalente a CC0)
- **Pixabay** (https://pixabay.com): Imágenes, vectores e ilustraciones bajo CC0
- **Unsplash** (https://unsplash.com): Fotografías de alta calidad con licencia libre
- **Freesound** (https://freesound.org): Biblioteca de sonidos con licencias Creative Commons
- **Wikimedia Commons** (https://commons.wikimedia.org): Recursos multimedia con licencias CC
- **Videvo** (https://www.videvo.net): Vídeos con licencias Creative Commons

---

## Herramientas Utilizadas

### Para Optimización de Imágenes
- **GIMP** (https://www.gimp.org): Software libre para redimensionar, recortar y optimizar imágenes
- **Squoosh** (https://squoosh.app): Herramienta online de Google para compresión de imágenes (JPG, WEBP)
- **TinyPNG** (https://tinypng.com): Compresor online para reducir el tamaño de archivos PNG/JPG

### Para Tratamiento de Vídeo
- **HandBrake** (https://handbrake.fr): Software libre para convertir y comprimir vídeos a MP4 (H.264)
- **FFmpeg** (https://ffmpeg.org): Herramienta de línea de comandos para procesamiento de vídeo/audio
- **VLC Media Player**: Para verificar duración y propiedades de archivos de vídeo

### Para Edición de Audio
- **Audacity** (https://www.audacityteam.org): Software libre para recortar, editar y exportar audio a MP3
- **Online Audio Converter** (https://online-audio-converter.com): Alternativa online para conversión de formatos

### Para Creación de GIF Animado
- **GIMP**: Creación de GIF animado a partir de capas/imágenes
- **EZGIF** (https://ezgif.com): Herramienta online para crear y optimizar GIFs animados

### Para Desarrollo Web
- **Visual Studio Code**: Editor de código con extensiones para HTML, CSS y JavaScript
- **Git**: Control de versiones
- **Navegadores Web**: Chrome, Firefox, Edge para pruebas cross-browser
- **DevTools**: Herramientas de desarrollo de navegadores para testing responsive

### Para Verificación y Testing
- **W3C Validator** (https://validator.w3.org): Validación de HTML
- **Lighthouse** (Chrome DevTools): Análisis de rendimiento y accesibilidad
- **Responsive Design Mode** (DevTools): Simulación de dispositivos móviles y tablets

---

## Justificación de Formatos Técnicos

### Imágenes

#### **JPG para la Hero Image y Galería**
- **Razón:** El formato JPG es ideal para fotografías y imágenes con muchos colores y gradientes (como paisajes futuristas)
- **Ventajas:** 
  - Excelente compresión sin pérdida significativa de calidad visual
  - Tamaño de archivo reducido (importante para tiempos de carga)
  - Soporte universal en todos los navegadores
- **Alternativa considerada:** WEBP ofrece mejor compresión, pero requiere fallback para navegadores antiguos

#### **SVG para el Logo**
- **Razón:** Los logos son elementos vectoriales que deben escalar perfectamente a cualquier tamaño
- **Ventajas:**
  - Escalable sin pérdida de calidad (vectorial)
  - Tamaño de archivo muy pequeño
  - Fácil de editar y modificar
  - Soporte para transparencia nativo
- **Alternativa considerada:** PNG podría usarse, pero ocuparía más espacio y no escalaría tan bien

#### **GIF para Animación del Botón**
- **Razón:** GIF es el formato estándar para animaciones simples de pocos frames
- **Ventajas:**
  - Soporte universal
  - Fácil de crear a partir de imágenes fijas
  - No requiere JavaScript para animarse
- **Limitaciones:** Solo soporta 256 colores, no es ideal para fotografías complejas

### Vídeo

#### **MP4 con códec H.264**
- **Razón:** Es el estándar de facto para vídeo web, con excelente compatibilidad
- **Ventajas:**
  - Soporte nativo en todos los navegadores modernos
  - Buena relación calidad/tamaño con H.264
  - Permite streaming progresivo
- **Alternativa considerada:** WebM ofrece mejor compresión, pero requiere fallback MP4 para compatibilidad total

### Audio

#### **MP3 a 128 kbps**
- **Razón:** Balance óptimo entre calidad y tamaño de archivo para audio ambiental
- **Ventajas:**
  - Formato universalmente soportado
  - 128 kbps es suficiente para audio ambiental (no música compleja)
  - Tamaño de archivo reducido (importante para carga rápida)
- **Alternativa considerada:** OGG Vorbis ofrece mejor compresión, pero MP3 tiene mejor compatibilidad

---

## Licencia de Tu Obra (Landing Page)

### Licencia Elegida

**Licencia Creative Commons: CC BY-NC 4.0 (Atribución-NoComercial 4.0 Internacional)**

He elegido la licencia **CC BY-NC 4.0** para mi landing page por las siguientes razones:

1. **Atribución (BY):** Requiere que cualquier uso de mi trabajo me atribuya como creador, lo cual es importante para reconocimiento profesional.

2. **No Comercial (NC):** Prohíbe el uso comercial de mi trabajo sin mi permiso explícito. Esto me permite:
   - Mantener control sobre posibles usos comerciales
   - Proteger mi trabajo de apropiación comercial no autorizada
   - Permitir uso educativo y personal libremente

3. **Sin restricción de "Compartir Igual":** Al no incluir la cláusula SA (ShareAlike), permito que otros puedan elegir su propia licencia para obras derivadas, siempre que no sea comercial y me atribuyan.

Esta licencia es apropiada para un portfolio artístico donde quiero compartir mi trabajo pero mantener cierto control sobre su uso comercial.

### Análisis de Compatibilidad

La elección de **CC BY-NC 4.0** es compatible con las licencias de los assets utilizados:

1. **Recursos CC0 (Dominio Público):**
   - Los recursos CC0 no imponen restricciones, por lo que puedo usar cualquier licencia para mi obra derivada.
   - Ejemplos: Logo, algunos recursos de Pixabay/Pexels.

2. **Recursos CC BY (Atribución):**
   - La licencia CC BY solo requiere atribución, sin restricciones adicionales.
   - Puedo combinar estos recursos con mi trabajo y aplicar CC BY-NC, ya que estoy añadiendo la restricción "NoComercial", que es más restrictiva pero compatible.
   - Ejemplos: Imágenes de DeviantArt con CC BY 3.0.

3. **Recursos Pexels/Unsplash License:**
   - Estas licencias son equivalentes a CC0 o muy permisivas.
   - No imponen restricciones que limiten mi elección de licencia.

**Conclusión:** Todas las licencias de los assets utilizados son compatibles con CC BY-NC 4.0, ya que ninguna de ellas requiere una licencia más permisiva o impone restricciones incompatibles.

### Escenario Hipotético: CC BY-SA

**Pregunta:** "Si una de las imágenes de la galería hubiera tenido una licencia Creative Commons Atribución-CompartirIgual (CC BY-SA), ¿qué licencia estarías obligado a usar para tu landing page? ¿Por qué?"

**Respuesta:**

Si una de las imágenes de la galería tuviera licencia **CC BY-SA** (Atribución-CompartirIgual), estaría **obligado a usar también una licencia CC BY-SA** (o compatible) para mi landing page completa.

**Razones:**

1. **Viralidad de la cláusula "Compartir Igual" (SA):**
   - La cláusula SA es "viral" o "hereditaria": cualquier obra derivada que incluya material con CC BY-SA debe distribuirse bajo la misma licencia o una compatible.
   - Mi landing page es una "obra derivada" porque combina el contenido CC BY-SA con mi propio trabajo (código HTML, CSS, JavaScript, diseño).

2. **Compatibilidad de licencias:**
   - CC BY-SA requiere que la obra derivada use CC BY-SA o una licencia compatible.
   - CC BY-NC (mi elección original) **NO es compatible** con CC BY-SA porque:
     - CC BY-SA permite uso comercial (siempre que se comparta igual)
     - CC BY-NC prohíbe uso comercial
     - Estas restricciones son incompatibles

3. **Opciones disponibles:**
   - **CC BY-SA 4.0:** La única opción directa compatible
   - **CC BY:** También compatible, pero menos restrictiva (no requiere compartir igual)
   - **No podría usar:** CC BY-NC, CC BY-ND, CC BY-NC-ND (incompatibles con SA)

4. **Implicaciones prácticas:**
   - Tendría que cambiar la licencia de mi landing page a **CC BY-SA 4.0**
   - Esto significaría que cualquier persona podría usar mi landing page comercialmente, siempre que:
     - Me atribuya como autor
     - Comparta su obra derivada bajo la misma licencia CC BY-SA

**Conclusión:** La cláusula "Compartir Igual" es una de las restricciones más fuertes en Creative Commons porque impone condiciones sobre cómo se puede licenciar la obra derivada. Si uso material CC BY-SA, debo respetar esa viralidad y aplicar la misma licencia a mi trabajo completo.

---

## Estructura del Proyecto

```
miarma-portfolio/
│
├── index.html              # Página principal
├── credits.html            # Página de créditos y atribuciones
├── styles.css              # Hoja de estilos principal
├── script.js               # JavaScript para interactividad
├── README.md               # Este archivo
│
└── assets/
    ├── images/
    │   ├── logo.svg                    # Logo de la artista
    │   ├── hero-image.jpg              # Imagen principal (1920px, <250KB)
    │   ├── contact-button.gif          # GIF animado para botón
    │   └── gallery/
    │       ├── gallery-1-thumb.jpg     # Miniatura 400x250px
    │       ├── gallery-1-full.jpg      # Versión completa
    │       ├── gallery-2-thumb.jpg     # Miniatura 400x250px
    │       ├── gallery-2-full.jpg      # Versión completa
    │       ├── gallery-3-thumb.jpg     # Miniatura 400x250px
    │       └── gallery-3-full.jpg      # Versión completa
    │
    ├── video/
    │   └── space-animation.mp4         # Vídeo 10-15s, <3MB, H.264
    │
    └── audio/
        └── ambient-space.mp3           # Audio 15s, 128kbps
```

---

## Funcionalidades Implementadas

### Fase 1: Preparación y Optimización (RA3)
- ✅ Búsqueda y selección de recursos Creative Commons
- ✅ Optimización de imágenes (hero, thumbnails, logo)
- ✅ Conversión y optimización de vídeo (MP4 H.264)
- ✅ Edición y optimización de audio (MP3)
- ✅ Creación de GIF animado
- ✅ Estructura HTML5 semántica
- ✅ Integración de todos los elementos multimedia
- ✅ Página de créditos con atribuciones completas
- ✅ Licencia CC aplicada al proyecto

### Fase 2: Interactividad y Verificación (RA4)
- ✅ Galería interactiva con JavaScript (click en thumbnails)
- ✅ Modal de vídeo funcional
- ✅ Estilos CSS con feedback visual (hover, focus, transitions)
- ✅ Diseño responsive (móvil, tablet, desktop)
- ✅ Navegación suave (smooth scroll)
- ✅ Accesibilidad (soporte de teclado, atributos alt)
- ✅ Verificación cross-browser (Chrome, Firefox, Edge)

---

## Instrucciones de Uso

1. **Preparación de Recursos:**
   - Descargar todos los recursos multimedia desde las plataformas Creative Commons mencionadas
   - Optimizar según las especificaciones del proyecto
   - Colocar los archivos en las carpetas correspondientes dentro de `assets/`

2. **Actualización de Créditos:**
   - Editar `credits.html` con la información real de cada recurso utilizado
   - Actualizar la tabla en `README.md` con URLs y autores reales

3. **Pruebas:**
   - Abrir `index.html` en diferentes navegadores
   - Verificar que la galería funciona correctamente
   - Probar el modal de vídeo
   - Comprobar el diseño responsive usando DevTools

---

## Notas de Desarrollo

- El proyecto utiliza JavaScript puro (sin frameworks) para mantener la simplicidad y el control total
- Los estilos CSS utilizan variables CSS para facilitar el mantenimiento
- Se ha priorizado la accesibilidad (atributos alt, soporte de teclado, contraste adecuado)
- El diseño es completamente responsive y se adapta a diferentes tamaños de pantalla

---

## Autor

Desarrollado como parte del proyecto integrado para la evaluación de las competencias RA3 y RA4.

---

## Licencia

Este proyecto está bajo una [Licencia Creative Commons Atribución-NoComercial 4.0 Internacional](https://creativecommons.org/licenses/by-nc/4.0/).

<a rel="license" href="http://creativecommons.org/licenses/by-nc/4.0/"><img alt="Licencia de Creative Commons" style="border-width:0" src="https://i.creativecommons.org/l/by-nc/4.0/88x31.png" /></a>

