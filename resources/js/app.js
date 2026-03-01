import './bootstrap';
import { createApp } from 'vue';
import Alpine from 'alpinejs';

// Importa los componentes arriba para limpiar el código
import CarrouselHome from './components/CarrouselHome.vue';
import NotificacionesAmistad from './components/NotificacionesAmistad.vue';
import CalendarioNavbar from './components/CalendarioNavbar.vue';
import ChatPrivado from './components/ChatPrivado.vue';
import ForoActividad from './components/ForoActividad.vue';

// 1. Configura la aplicación Vue
const app = createApp({});

app.component('carrousel-home', CarrouselHome);
app.component('notificaciones-amistad', NotificacionesAmistad);
app.component('calendario-navbar', CalendarioNavbar);
app.component('chat-privado', ChatPrivado);
app.component('foro-actividad', ForoActividad);

// 2. Monta Vue PRIMERO
app.mount('#app');

Alpine.start();

