# MiArma - Landing Page

Proyecto Integrado de Artista Digital Ficticia desarrollado por Rubén Ojeda y Rafael Verdugo.

## Tabla de Recursos Externos

| Archivo | URL Original | Autor | Tipo de Licencia |
|---------|-------------|-------|------------------|
| Fuentes tipográficas | [Google Fonts](https://fonts.google.com/) | Google | Open Font License (OFL) |
| Imágenes de stock | [Unsplash](https://unsplash.com/es/images/stock/creative-common) | Varios autores | Unsplash License - Uso libre |
| Imágenes adicionales | [Creative Commons](https://creativecommons.org/) | Varios autores | Varias licencias CC |
| Imagen paisaje urbano | [Unsplash - Paisaje urbano borroso](https://unsplash.com/es/fotos/paisaje-urbano-borroso-con-luz-roja-y-luces-de-la-calle-por-la-noche-oKyZoJy03ZA) | Clay Banks / Branislav Rodman | Unsplash License |
| Video animación espacial | [Pixabay](https://pixabay.com/es/users/photoman61-11433596/) | Pixabay Contributors | Pixabay Content License |
| Audio ambiental | [Pixabay](https://pixabay.com/es/users/the_mountain-3616498/) | Pixabay Contributors | Pixabay Content License |
| Framework CSS | [Bootstrap](https://getbootstrap.com/) | Bootstrap Team | MIT License |

### Fotógrafos Destacados

- **Clay Banks** - Instagram: [@clay.banks](https://www.instagram.com/clay.banks/)
- **Branislav Rodman** - Instagram: [@branislavrodman](https://www.instagram.com/branislavrodman/)

### Recursos Multimedia de Pixabay

- **Video de presentación (video.mp4)**: Animación espacial/futurista obtenida de Pixabay
- **Audio ambiental (audio.mp3)**: Música de ambiente espacial obtenida de Pixabay

---

## Herramientas Utilizadas

### Desarrollo Web
- **Editor de código**: Antigravity
- **Servidor local**: XAMPP (Apache)
- **Control de versiones**: Git

### Diseño y Multimedia
- **Creación de GIFs**: [CleverPDF - GIF Maker](https://www.cleverpdf.com/es/downgifmaker) - Herramienta online para creación y conversión de archivos GIF animados
- **Optimización de imágenes**: Herramientas nativas del navegador y compresión online
- **Diseño responsive**: Bootstrap 5 Framework
- **Obtención de video y audio**: [Pixabay](https://pixabay.com/) - Plataforma de contenido multimedia libre de derechos

### Inteligencia Artificial
- **Antigravity**: IDE utilizado para el desarrollo del proyecto
  - Modelos IA: Claude Sonnet 4.5 y Gemini Pro
  - Uso: Generación de código, estructura del proyecto, y optimización

### Frameworks y Librerías
- **Bootstrap 5**: Framework CSS para diseño responsive y componentes UI
- **JavaScript Vanilla**: Para funcionalidades interactivas personalizadas

---

## Justificación de Formatos Técnicos

### Imágenes

#### **JPG para imágenes de fondo**
- **Razón**: Las imágenes de fondo (fondos de hero section) se guardaron en formato JPG porque:
  - Ofrecen una excelente compresión con pérdida mínima de calidad visual
  - Tamaño de archivo significativamente menor que PNG
  - Ideal para fotografías con muchos colores y gradientes
  - No requieren transparencia

#### **PNG para logos e iconos**
- **Razón**: El favicon y elementos gráficos se guardaron en PNG/SVG porque:
  - Soporte de transparencia (canal alpha)
  - Sin pérdida de calidad en compresión
  - Ideal para gráficos con bordes definidos
  - SVG permite escalabilidad infinita sin pérdida de calidad

#### **GIF para animaciones**
- **Razón**: Se utilizaron GIFs para las tarjetas animadas porque:
  - Soporte nativo en todos los navegadores sin necesidad de JavaScript
  - Bucle automático de animación
  - Tamaño razonable para animaciones cortas
  - Fácil implementación como background-image en CSS

### Video y Audio

#### **MP4 (H.264) para video**
- **Razón**: Se utilizó formato MP4 con códec H.264 porque:
  - Compatibilidad universal con todos los navegadores modernos
  - Excelente relación calidad/tamaño de archivo
  - Soporte nativo del elemento `<video>` de HTML5
  - Peso optimizado (< 3 MB según requisitos del proyecto)

#### **MP3 para audio**
- **Razón**: Se utilizó formato MP3 a 128 kbps porque:
  - Compatibilidad universal con todos los navegadores
  - Buena calidad de audio para contenido web
  - Tamaño de archivo reducido
  - Soporte nativo del elemento `<audio>` de HTML5

### Código

#### **CSS separado por páginas**
- **Razón**: Se crearon archivos CSS específicos (`credits.css`, `form.css`) porque:
  - Mejor organización y mantenibilidad del código
  - Carga selectiva de estilos solo cuando se necesitan
  - Facilita el trabajo en equipo
  - Evita conflictos de estilos entre páginas

#### **JavaScript modular**
- **Razón**: El archivo `funcionalidades.js` centraliza la lógica porque:
  - Reutilización de funciones
  - Fácil debugging y mantenimiento
  - Separación de responsabilidades (HTML/CSS/JS)

---

## Licencia de la Obra (Landing Page)

### Licencia Elegida: Creative Commons Atribución-No Comercial 4.0 Internacional (CC BY-NC 4.0)

#### **¿Por qué CC BY-NC 4.0?**

He elegido la licencia **CC BY-NC 4.0** para este proyecto por las siguientes razones:

1. **Protección del trabajo académico**: Al ser un proyecto integrado educativo, esta licencia protege el trabajo de los estudiantes mientras permite su difusión con fines educativos.

2. **Permite compartir y adaptar**: Otros estudiantes o educadores pueden usar este proyecto como referencia o base para sus propios trabajos, siempre que den crédito apropiado.

3. **Restricción comercial**: La cláusula "No Comercial" (NC) evita que terceros puedan lucrar con nuestro trabajo sin permiso, lo cual es importante para un proyecto académico.

4. **Flexibilidad futura**: Si en el futuro deseamos comercializar el proyecto, podemos otorgar licencias adicionales bajo otros términos.

5. **Compatibilidad con recursos utilizados**: Todos los recursos externos utilizados (Unsplash License, OFL, MIT, Pixabay License) permiten obras derivadas con restricciones comerciales.

---

### Análisis de Compatibilidad de Licencias

#### **Compatibilidad de Assets Utilizados**

| Recurso | Licencia Original | Compatible con CC BY-NC 4.0 | Justificación |
|---------|------------------|------------------------------|---------------|
| Google Fonts | OFL (Open Font License) | ✅ Sí | OFL permite uso comercial y no comercial, no impone restricciones en la licencia de la obra derivada |
| Unsplash Images | Unsplash License | ✅ Sí | Licencia muy permisiva, permite uso libre incluso comercial sin atribución obligatoria |
| Creative Commons Images | Varias CC | ✅ Sí | Depende de cada imagen, pero las utilizadas son CC0 o CC BY, compatibles con BY-NC |
| Pixabay Video/Audio | Pixabay Content License | ✅ Sí | Licencia muy permisiva, permite uso libre para fines comerciales y no comerciales sin necesidad de atribución |
| Bootstrap | MIT License | ✅ Sí | MIT es muy permisiva, solo requiere mantener el aviso de copyright |

#### **Justificación de Compatibilidad**

La licencia **CC BY-NC 4.0** es compatible con todos los recursos utilizados porque:

1. **Unsplash License**: Es extremadamente permisiva y no impone restricciones sobre la licencia de obras derivadas.

2. **Open Font License (Google Fonts)**: Permite el uso en cualquier tipo de obra, solo requiere mantener el aviso de copyright de las fuentes.

3. **MIT License (Bootstrap)**: Solo requiere incluir el aviso de copyright y licencia, no impone restricciones sobre la licencia de la obra derivada.

4. **Creative Commons CC0/CC BY**: Son compatibles con licencias más restrictivas como BY-NC, ya que permiten obras derivadas con cualquier licencia.

5. **Pixabay Content License**: Es una licencia muy permisiva que permite el uso libre de contenido (imágenes, videos, música) para cualquier propósito, comercial o no comercial, sin necesidad de atribución obligatoria. Esto la hace totalmente compatible con nuestra licencia CC BY-NC 4.0.

**Ninguno de estos recursos impone la obligación de usar una licencia específica para la obra derivada**, por lo que somos libres de elegir CC BY-NC 4.0.

---

### Escenario Hipotético: Imagen con Licencia CC BY-SA

#### **Pregunta**: Si una de las imágenes de la galería hubiera tenido una licencia Creative Commons Atribución-CompartirIgual (CC BY-SA), ¿qué licencia estarías obligado a usar para tu landing page? ¿Por qué?

#### **Respuesta**:

Si una de las imágenes tuviera licencia **CC BY-SA (Atribución-CompartirIgual)**, estaría **obligado a licenciar toda la landing page bajo CC BY-SA o una licencia compatible**.

**Razones:**

1. **Cláusula ShareAlike (SA)**: La condición "CompartirIgual" de CC BY-SA es una cláusula "copyleft" que requiere que cualquier obra derivada se distribuya bajo la misma licencia o una compatible.

2. **Incompatibilidad con CC BY-NC**: 
   - CC BY-SA permite uso comercial
   - CC BY-NC prohíbe uso comercial
   - Estas dos licencias son **incompatibles** entre sí

3. **Obra derivada**: Al incorporar una imagen CC BY-SA en mi landing page, la página completa se convierte en una "obra derivada" o "adaptación" según los términos de Creative Commons.

4. **Obligación legal**: La licencia CC BY-SA me obligaría a:
   - Usar CC BY-SA para toda la landing page
   - Permitir uso comercial de mi trabajo
   - Mantener la misma libertad para obras derivadas futuras

**Soluciones alternativas:**

- **Opción 1**: Cambiar la imagen por una con licencia compatible (CC0, CC BY, Unsplash License, Pixabay License)
- **Opción 2**: Licenciar la landing page bajo CC BY-SA
- **Opción 3**: Solicitar permiso al autor para usar la imagen bajo términos diferentes
- **Opción 4**: Usar la imagen solo como referencia sin incorporarla directamente

**Conclusión**: Por esta razón, es crucial verificar las licencias de todos los recursos **antes** de incorporarlos al proyecto, especialmente las cláusulas ShareAlike (SA) que pueden forzar cambios en la licencia de toda la obra.

---

## Estructura del Proyecto

```
MiArma/
├── index.html              # Página principal
├── README.md              # Este archivo
├── css/
│   ├── bootstrap.min.css  # Framework Bootstrap
│   ├── styles.css         # Estilos principales
│   ├── credits.css        # Estilos página de créditos
│   └── form.css          # Estilos página de contacto
├── js/
│   └── funcionalidades.js # JavaScript personalizado
├── pages/
│   ├── credits.html       # Página de créditos y licencias
│   └── form.html         # Página de contacto
└── assets/
    ├── img/              # Imágenes estáticas
    └── videos/           # GIFs animados, video y audio
        ├── video.mp4     # Video de presentación (Pixabay)
        ├── audio.mp3     # Audio ambiental (Pixabay)
        └── *.gif         # GIFs animados
```

---

## Características del Proyecto

- ✅ Diseño responsive con Bootstrap 5
- ✅ Animaciones y efectos interactivos
- ✅ Formulario de contacto funcional (frontend)
- ✅ Página de créditos completa
- ✅ Cumplimiento de licencias Creative Commons
- ✅ Código limpio y bien documentado
- ✅ Galería de imágenes interactiva con JavaScript
- ✅ Modal de video con controles de reproducción
- ✅ Reproductor de audio ambiental integrado

---

## Instalación y Uso

1. Clonar o descargar el repositorio
2. Colocar la carpeta `MiArma` en el directorio de tu servidor local (ej: `htdocs` en XAMPP)
3. Iniciar el servidor Apache
4. Acceder a `http://localhost/MiArma/index.html`

---

## Créditos

**Desarrolladores**: Rubén Ojeda y Rafael Verdugo

**Recursos Externos**: Ver sección "Tabla de Recursos Externos" y página [credits.html](pages/credits.html)

---

## Licencia

Este proyecto está licenciado bajo **Creative Commons Atribución-No Comercial 4.0 Internacional (CC BY-NC 4.0)**.

[![Licencia Creative Commons](https://i.creativecommons.org/l/by-nc/4.0/88x31.png)](http://creativecommons.org/licenses/by-nc/4.0/)

**Landing Page © 2025 MiArma Portfolio** - Licenciada bajo [CC BY-NC 4.0](http://creativecommons.org/licenses/by-nc/4.0/)

### Permisos:
- ✅ Compartir: copiar y redistribuir el material
- ✅ Adaptar: remezclar y transformar el material

### Condiciones:
- 📝 Atribución: dar crédito apropiado
- 🚫 No Comercial: no usar con fines comerciales

---

**Fecha de creación**: Diciembre 2024  
**Versión**: 1.1
