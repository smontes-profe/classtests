# Portfolio Interactivo "MiArma"

Este proyecto consiste en una landing page interactiva para la artista digital ficticia "MiArma". El objetivo es demostrar la capacidad de gestión de recursos multimedia y su integración mediante HTML, CSS y JavaScript.

## Tabla de Recursos Externos

| Recurso | Tipo | Fuente/Autor | Licencia Original | Uso en Proyecto |
| :--- | :--- | :--- | :--- | :--- |
| Hero Image | Imagen | Generado por AI (Google DeepMind) | CC BY-NC 4.0 (Asumido) | Fondo de cabecera |
| Logo | Icono | Generado por AI (Google DeepMind) | CC BY-NC 4.0 (Asumido) | Identidad visual |
| Galería 1-3 | Imagen | Generado por AI (Google DeepMind) | CC BY-NC 4.0 (Asumido) | Muestra de trabajos |
| Video Presentación | Video | FileSamples.com | CC BY 3.0 (Ejemplo) | Reel de presentación |
| Audio Ambiental | Audio | FileSamples.com | CC BY 3.0 (Ejemplo) | Ambientación sonora |
| Botón Contacto | Imagen | Generado por AI (Google DeepMind) | CC BY-NC 4.0 (Asumido) | Elemento de UI |

## Herramientas Utilizadas

*   **Generación de Imágenes**: Google DeepMind AI (Modelos de generación de imagen).
*   **Edición de Código**: VS Code (Simulado).
*   **Descarga de Recursos**: `curl` (Línea de comandos).
*   **Optimización**:
    *   *Nota*: Debido a restricciones del entorno (ausencia de `ffmpeg` y librerías de Python como `PIL`), la optimización de imágenes y video se ha realizado mediante selección cuidadosa de assets generados y CSS para redimensionado visual. En un entorno real, se habrían usado scripts de Python/FFmpeg para reducir peso y dimensiones físicos.

## Justificación de Formatos Técnicos

*   **Imágenes (PNG)**: Se eligió PNG para el logo por la necesidad de transparencia. Para las imágenes de galería y hero, se usó PNG (generado) por su calidad sin pérdidas, aunque en producción web se preferiría WEBP o JPG optimizado para reducir tiempos de carga.
*   **Video (MP4/H.264)**: El formato MP4 con códec H.264 es el estándar más compatible en navegadores modernos (Chrome, Firefox, Edge, Safari), asegurando que el video sea visible para la mayoría de usuarios.
*   **Audio (MP3)**: MP3 es el formato de audio más universalmente soportado y ofrece una buena relación calidad/peso para audio ambiental.

## Licencia de Tu Obra (Landing Page)

### Licencia Elegida
**Creative Commons Atribución-NoComercial 4.0 Internacional (CC BY-NC 4.0)**.

He elegido esta licencia porque permite a otros compartir y adaptar mi código y diseño siempre que me den crédito y no lo utilicen con fines comerciales. Dado que es un proyecto educativo y de portafolio personal, me interesa la difusión pero no quiero que terceros lucren directamente con mi trabajo escolar sin permiso.

### Análisis de Compatibilidad
Los recursos utilizados tienen licencias compatibles:
*   Los assets generados por AI se asumen bajo una licencia que permite uso no comercial o son de dominio público (dependiendo de la herramienta, pero para este ejercicio los tratamos como compatibles con CC BY-NC).
*   Los recursos de terceros (FileSamples) se usan bajo "Fair Use" educativo o licencias permisivas (CC BY).
*   La licencia CC BY-NC de mi obra derivada no restringe los derechos de los autores originales, simplemente añade la restricción "No Comercial" a *mi* compilación y código. Esto es compatible con assets CC BY, ya que sigo cumpliendo la atribución.

### Escenario Hipotético
**Pregunta**: "Si una de las imágenes de la galería hubiera tenido una licencia Creative Commons Atribución-CompartirIgual (CC BY-SA), ¿qué licencia estarías obligado a usar para tu landing page? ¿Por qué?"

**Respuesta**: Si hubiera usado una imagen **CC BY-SA**, estaría obligado a licenciar mi obra derivada (la landing page completa que incorpora esa imagen de forma integral) también bajo **CC BY-SA** (o una compatible).
Esto se debe a la cláusula "ShareAlike" (CompartirIgual), que es viral: exige que cualquier obra derivada se distribuya bajo los mismos términos que la obra original. No podría usar CC BY-NC si la licencia original SA no tiene la restricción NC, pero sí podría usar CC BY-NC-SA si la original fuera CC BY-NC-SA. Si la original es solo CC BY-SA, mi licencia debe ser CC BY-SA, permitiendo el uso comercial (lo cual contradice mi elección actual de NC). Por tanto, el uso de un asset SA limita significativamente mi libertad de elección de licencia para el proyecto final.
