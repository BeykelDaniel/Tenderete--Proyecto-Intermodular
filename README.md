<p align="center"><img src="public/logo.png" alt="Tenderete Logo" width="250" height="250"></p>

<p align="center">
  <img src="https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP 8.2+">
  <img src="https://img.shields.io/badge/LARAVEL-12.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel 12.x">
  <img src="https://img.shields.io/badge/MYSQL-8.0-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL 8.0">
  <img src="https://img.shields.io/badge/JAVASCRIPT-ESM-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black" alt="JavaScript ESM">
  <img src="https://img.shields.io/badge/VUE.JS-3-35495E?style=for-the-badge&logo=vue.js&logoColor=4FC08D" alt="Vue.js 3">
</p>

<p align="center">
  <img src="https://img.shields.io/badge/TAILWIND_CSS-3-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white" alt="Tailwind CSS 3">
  <img src="https://img.shields.io/badge/VITE-7-646CFF?style=for-the-badge&logo=vite&logoColor=white" alt="Vite 7">
  <img src="https://img.shields.io/badge/NODE.JS-18.x-339933?style=for-the-badge&logo=node.js&logoColor=white" alt="Node.js 18.x">
  <img src="https://img.shields.io/badge/COMPOSER-2.x-885630?style=for-the-badge&logo=composer&logoColor=white" alt="Composer 2.x">
  <img src="https://img.shields.io/badge/GIT-FF3333?style=for-the-badge&logo=git&logoColor=white" alt="Git">
</p>

# Tenderete - Plataforma Sociodigital para el Envejecimiento Activo

Tenderete es una **plataforma sociodigital innovadora** diseñada específicamente para catalizar el **envejecimiento activo** a través de las Tecnologías de la Información y la Comunicación (TIC). Una solución que mitiga la brecha digital generacional, ofreciendo a las personas mayores un entorno seguro, accesible e inclusivo.

##  Descripción del Proyecto

### El Problema
La brecha digital generacional es una realidad que afecta a millones de personas mayores, limitando su participación social, su acceso a servicios digitales y su conexión con la comunidad. Las redes sociales convencionales no están diseñadas pensando en sus necesidades específicas.

### Nuestra Solución
Tenderete es una plataforma que **prioriza la usabilidad cognitiva y la accesibilidad sensorial**, creando un entorno digital pensado específicamente para personas mayores. No es solo una red social, sino un **ecosistema completo de envejecimiento activo** que facilita:

-  **Creación de nuevas relaciones sociales**
-  **Organización y participación en actividades grupales**
-  **Comunicación directa** mediante chat y videollamadas
-  **Actividades alineadas con intereses personales**
-  **Accesibilidad completa** para usuarios con diferentes capacidades
-  **Interfaz cognitivamente intuitiva** y fácil de usar

##  Características Principales

###  Gestión Social
-  Crear y unirse a comunidades de interés
-  Perfiles personalizables y seguros
-  Sistema de notificaciones inteligente
-  Recomendaciones personalizadas de actividades

###  Gestión de Eventos
-  Crear, organizar y compartir actividades grupales
-  Administración de participantes
-  Sistema de inscripción simple e intuitivo

###  Comunicación Directa
-  Chat grupal e individual
-  Mensajería segura y privada


###  Accesibilidad & Usabilidad
-  Texto legible con tamaños ajustables
-  Alto contraste y modo oscuro
-  Navegación intuitiva y simple
-  Lenguaje claro y cercano
-  Comandos de voz (opcional)
-  Interfaz cognitivamente optimizada

##  Objetivos del Proyecto

-  **Combatir la soledad** y el aislamiento en personas mayores
-  **Fomentar el envejecimiento activo** mediante participación social
-  **Reducir la brecha digital** generacional
-  **Crear vínculos comunitarios** sólidos y significativos
-  **Garantizar accesibilidad** digital para todos
-  **Ofrecer un espacio seguro** y de confianza

##  Stack Tecnológico

### Backend
- **PHP** 8.2+ - Lenguaje backend robusto
- **Laravel** 12.x - Framework web elegante y potente
- **Blade** - Motor de plantillas con componentes reutilizables
- **Composer** 2.x - Gestor de paquetes PHP

### Frontend
- **Vue.js** 3 - Framework JavaScript progresivo para UI interactiva
- **JavaScript** ESM - Módulos ECMAScript moderno
- **Tailwind CSS** 3 - Framework de utilidades CSS accesible
- **Vite** 7 - Build tool ultra rápido y optimizado

### Base de Datos & DevOps
- **MySQL** 8.0 - Base de datos relacional segura
- **Node.js** 18.x - Runtime JavaScript
- **Git** - Control de versiones
- **Docker** - Containerización (opcional)

### Características Técnicas
-  Autenticación y autorización robusta
-  WebSockets para comunicación en tiempo real
-  Sistema de notificaciones push
-  Gestión de multimedia (imágenes, vídeos)

##  Requisitos Previos

- **PHP** >= 8.2
- **Composer** 2.x - Gestor de paquetes de PHP
- **Node.js** >= 18.x
- **npm** 
- **MySQL** 8.0 o superior
- **Git** - Control de versiones

##  Instalación

### 1. Clonar el repositorio

```bash
git clone https://github.com/BeykelDaniel/Tenderete--Proyecto-Intermodular.git
cd Tenderete--Proyecto-Intermodular
```

### 2. Instalar dependencias PHP

```bash
composer install
```

### 3. Instalar dependencias de frontend

```bash
npm install
```

### 4. Configurar el archivo de entorno

```bash
cp .env.example .env
php artisan key:generate
```

### 5. Configurar la base de datos

Edita el archivo `.env` con tus credenciales:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tenderete
DB_USERNAME=root
DB_PASSWORD=
```

Luego ejecuta las migraciones:

```bash
php artisan migrate
```

### 6. Compilar assets

Para desarrollo:
```bash
npm run dev
```

Para producción:
```bash
npm run build
```

##  Uso

### Desarrollo Local

```bash
# Terminal 1: Iniciar servidor Laravel
php artisan serve

# Terminal 2: Compilar assets en tiempo real con Vite
npm run dev
```

La aplicación estará disponible en `http://localhost:8000`

### Build para Producción

```bash
npm run build
php artisan optimize
```

##  Estructura del Proyecto

```
Tenderete--Proyecto-Intermodular/
├── app/                           # Código PHP y lógica de la aplicación
│   ├── Http/
│   │   ├── Controllers/           # Controladores (Usuarios, Eventos, Chat, etc.)
│   │   ├── Middleware/            # Middleware de autenticación y accesibilidad
│   │   └── Requests/              # Form Requests validadas
│   ├── Models/                    # Modelos (User, Event, Chat, Community, etc.)
│   ├── Services/                  # Servicios de negocio
│   └── Events/                    # Eventos WebSocket
├── resources/
│   ├── views/                     # Plantillas Blade
│   ├── js/
│   │   ├── components/            # Componentes Vue.js 3
│   │   ├── pages/                 # Páginas principales
│   │   └── stores/                # Pinia stores (estado)
│   └── css/                       # Estilos Tailwind CSS
├── routes/
│   ├── web.php                    # Rutas web
│   ├── api.php                    # Rutas API REST
│   └── channels.php               # Canales WebSocket
├── database/
│   ├── migrations/                # Migraciones de BD
│   ├── seeders/                   # Seeders de datos
│   └── factories/                 # Factories para testing
├── public/
│   ├── img/                       # Archivos públicos (logo.png, etc.)
│   └── uploads/                   # Uploads de usuarios
├── tests/                         # Tests automatizados
├── vite.config.js                 # Configuración Vite
├── tailwind.config.js             # Configuración Tailwind CSS
├── docker-compose.yml             # Configuración Docker
├── package.json                   # Dependencias Node.js
├── composer.json                  # Dependencias PHP
└── README.md                      # Este archivo
```

##  Configuración

### Variables de Entorno

Archivo `.env` principales:

```env
APP_NAME=Tenderete
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tenderete
DB_USERNAME=root
DB_PASSWORD=

CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file

# WebSocket
BROADCAST_DRIVER=pusher
PUSHER_APP_ID=your_app_id
PUSHER_APP_KEY=your_app_key
PUSHER_APP_SECRET=your_app_secret
```

### Optimización para Producción

```bash
# Cachear configuración
php artisan config:cache

# Cachear rutas
php artisan route:cache

# Cachear vistas
php artisan view:cache

# Optimizar autoloader
composer install --optimize-autoloader --no-dev

# Compilar assets
npm run build
```

##  Accesibilidad

Tenderete está construido con accesibilidad como prioridad:

-  **WCAG 2.1 AA** compliant
-  **Lectores de pantalla** compatibles
-  **Navegación por teclado** completa
-  **Contraste de colores** óptimo
-  **Fuentes legibles** y ajustables
-  **Sin requisitos de tiempo** para tareas

##  Testing

```bash
php artisan test
```

Con reporte de cobertura:

```bash
php artisan test --coverage
```

##  Contribuciones

Las contribuciones son bienvenidas. Por favor sigue estos pasos:

1. **Fork** el proyecto
2. Crea una rama para tu feature (`git checkout -b feature/AmazingFeature`)
3. Commit tus cambios (`git commit -m 'Add some AmazingFeature'`)
4. Push a la rama (`git push origin feature/AmazingFeature`)
5. Abre un **Pull Request**

##  Licencia

Este proyecto está bajo la **Licencia MIT**. Ver el archivo `LICENSE` para más detalles.

##  Autor

**BeykelDaniel**

- GitHub: [@BeykelDaniel](https://github.com/BeykelDaniel)
- Repositorio: [Tenderete--Proyecto-Intermodular](https://github.com/BeykelDaniel/Tenderete--Proyecto-Intermodular)

##  Contacto y Soporte

Para preguntas, sugerencias o reportar problemas:

- Abre un [issue](https://github.com/BeykelDaniel/Tenderete--Proyecto-Intermodular/issues)
- Contacta directamente a través de GitHub

##  Recursos Útiles

- [Documentación de Laravel](https://laravel.com/docs)
- [Documentación de Vue.js 3](https://vuejs.org/)
- [Documentación de Vite](https://vitejs.dev/)
- [Documentación de Tailwind CSS](https://tailwindcss.com/)
- [WCAG 2.1 Guías de Accesibilidad](https://www.w3.org/WAI/WCAG21/quickref/)
- [Pautas de diseño para personas mayores](https://www.aarp.org/)

##  Roadmap Futuro

-  Integración con redes sociales convencionales
-  Gamificación para aumentar engagement
-  Recomendaciones impulsadas por IA
-  Aplicación móvil nativa
-  Expansión multiidioma
-  Integración de biométrica
-  Integración con servicios de salud
-  Livestreaming de eventos

---

<p align="center">
  <strong>Tenderete: Conectando generaciones, fortaleciendo comunidades</strong>
</p>

<p align="center">
  <strong>Hecho con amor para fomentar el envejecimiento activo a través de la tecnología</strong>
</p>

<p align="center">
  <img src="https://img.shields.io/github/repo-size/BeykelDaniel/Tenderete--Proyecto-Intermodular?style=flat-square" alt="Repo Size">
  <img src="https://img.shields.io/github/last-commit/BeykelDaniel/Tenderete--Proyecto-Intermodular?style=flat-square" alt="Last Commit">
  <img src="https://img.shields.io/badge/license-MIT-blue?style=flat-square" alt="License">
  <img src="https://img.shields.io/badge/accessibility-WCAG_2.1_AA-green?style=flat-square" alt="Accessibility">
</p>
