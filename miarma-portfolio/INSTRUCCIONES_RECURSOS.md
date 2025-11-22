# Instrucciones para Obtener y Preparar Recursos Multimedia

Este documento contiene instrucciones detalladas para obtener y preparar todos los recursos multimedia necesarios para el proyecto.

## 📋 Lista de Recursos Necesarios

### 1. Imagen Principal (Hero Image)
- **Archivo:** `assets/images/hero-image.jpg`
- **Especificaciones:**
  - Ancho: 1920px
  - Peso máximo: 250 KB
  - Formato: JPG o WEBP
  - Tema: Paisaje futurista/ciencia ficción
- **Fuentes recomendadas:**
  - Pexels: https://www.pexels.com/search/futuristic%20landscape/
  - Unsplash: https://unsplash.com/s/photos/futuristic-landscape
  - Pixabay: https://pixabay.com/images/search/futuristic%20landscape/
- **Herramientas para optimización:**
  - GIMP: Redimensionar a 1920px de ancho, exportar como JPG con calidad 80-85%
  - Squoosh: https://squoosh.app (comprimir hasta < 250KB)

### 2. Logo
- **Archivo:** `assets/images/logo.svg` (preferible) o `logo.png`
- **Especificaciones:**
  - Formato: SVG (preferible) o PNG con fondo transparente
  - Tamaño: Aproximadamente 50x50px (se escalará con CSS)
  - Tema: Icono relacionado con arte digital/ciencia ficción
- **Fuentes recomendadas:**
  - Pixabay: https://pixabay.com/vectors/search/logo/
  - Flaticon (con atribución): https://www.flaticon.com
  - Wikimedia Commons: https://commons.wikimedia.org
- **Nota:** Si usas PNG, asegúrate de que tenga fondo transparente

### 3. Galería de Trabajos (3 imágenes)
Para cada imagen necesitas crear DOS versiones:

#### Versión Miniatura (Thumbnail)
- **Archivos:** 
  - `assets/images/gallery/gallery-1-thumb.jpg`
  - `assets/images/gallery/gallery-2-thumb.jpg`
  - `assets/images/gallery/gallery-3-thumb.jpg`
- **Especificaciones:**
  - Dimensiones: 400x250px (proporción 16:10)
  - Formato: JPG
  - Peso: Optimizado para web (< 50KB cada una)

#### Versión Completa (Full)
- **Archivos:**
  - `assets/images/gallery/gallery-1-full.jpg`
  - `assets/images/gallery/gallery-2-full.jpg`
  - `assets/images/gallery/gallery-3-full.jpg`
- **Especificaciones:**
  - Ancho: 1920px (mantener proporción)
  - Formato: JPG
  - Peso: Optimizado (< 300KB cada una)

**Fuentes recomendadas:**
- Pexels: https://www.pexels.com/search/sci-fi/
- Unsplash: https://unsplash.com/s/photos/science-fiction
- DeviantArt (buscar con filtro CC): https://www.deviantart.com

**Herramientas:**
- GIMP: Crear dos versiones de cada imagen
- Squoosh: Optimizar ambas versiones

### 4. Vídeo de Animación Espacial
- **Archivo:** `assets/video/space-animation.mp4`
- **Especificaciones:**
  - Duración: 10-15 segundos
  - Formato: MP4 (códec H.264)
  - Peso máximo: 3 MB
  - Resolución: 1920x1080 o menor (ajustar según peso)
- **Fuentes recomendadas:**
  - Pexels: https://www.pexels.com/videos/space/
  - Videvo: https://www.videvo.net (filtrar por Creative Commons)
  - Pixabay Videos: https://pixabay.com/videos/search/space/
- **Herramientas para conversión:**
  - HandBrake: Convertir a MP4 H.264, ajustar calidad para < 3MB
  - FFmpeg: `ffmpeg -i input.mp4 -c:v libx264 -crf 28 -t 15 output.mp4`

### 5. Audio Ambiental
- **Archivo:** `assets/audio/ambient-space.mp3`
- **Especificaciones:**
  - Duración: 15 segundos
  - Formato: MP3
  - Bitrate: 128 kbps
  - Tema: Sonido ambiental espacial/futurista
- **Fuentes recomendadas:**
  - Freesound: https://freesound.org (buscar "space ambience" con filtro CC)
  - Free Music Archive: https://freemusicarchive.org
- **Herramientas para edición:**
  - Audacity: 
    1. Importar archivo de audio
    2. Seleccionar primeros 15 segundos
    3. Exportar como MP3 a 128 kbps

### 6. GIF Animado para Botón
- **Archivo:** `assets/images/contact-button.gif`
- **Especificaciones:**
  - Tamaño: Aproximadamente 40x40px (se escalará con CSS)
  - Animación: 2-3 frames
  - Tema: Icono animado relacionado con contacto/comunicación
- **Opciones:**
  1. **Crear desde imágenes fijas:**
     - Descargar 2-3 iconos relacionados con contacto (CC)
     - Usar GIMP o EZGIF para crear animación
  2. **Descargar GIF existente:**
     - Giphy (con atribución): https://giphy.com
     - Tenor (verificar licencia)
- **Herramientas:**
  - GIMP: Crear GIF animado desde capas
  - EZGIF: https://ezgif.com/maker (crear GIF online)

## ✅ Checklist de Verificación

Antes de considerar los recursos listos, verifica:

- [ ] Hero image: 1920px de ancho, < 250KB, formato JPG
- [ ] Logo: SVG o PNG transparente, tamaño apropiado
- [ ] 3 imágenes de galería: Cada una con versión thumb (400x250px) y full (1920px)
- [ ] Vídeo: MP4 H.264, 10-15s, < 3MB
- [ ] Audio: MP3, 15s, 128 kbps
- [ ] GIF animado: Funcional, tamaño apropiado
- [ ] Todos los recursos tienen licencia Creative Commons verificada
- [ ] Información de atribución documentada en `credits.html`
- [ ] Tabla de recursos actualizada en `README.md`

## 📝 Notas Importantes

1. **Licencias Creative Commons:**
   - Verifica siempre la licencia específica de cada recurso
   - Algunos recursos pueden requerir atribución (CC BY)
   - Otros pueden ser de dominio público (CC0)
   - Documenta cada licencia en `credits.html`

2. **Optimización:**
   - No subestimes la importancia de la optimización
   - Archivos grandes ralentizan la carga de la página
   - Usa las herramientas recomendadas para verificar tamaños

3. **Nombres de archivos:**
   - Usa nombres descriptivos y consistentes
   - Mantén las rutas exactas como se especifican en el código HTML

4. **Pruebas:**
   - Después de añadir los recursos, prueba que todas las rutas funcionen
   - Verifica que las imágenes se muestren correctamente
   - Comprueba que el vídeo y audio se reproduzcan sin problemas

## 🔗 Enlaces Útiles

- **Creative Commons Search:** https://search.creativecommons.org
- **Compresor de imágenes:** https://squoosh.app
- **Compresor de vídeo:** HandBrake (descarga local)
- **Editor de audio:** Audacity (descarga local)
- **Creador de GIF:** https://ezgif.com

