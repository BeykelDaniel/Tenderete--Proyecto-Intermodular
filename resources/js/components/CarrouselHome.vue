<template>
  <div class="relative bg-[#E8D258] rounded-[30px] md:rounded-[40px] overflow-hidden border-2 md:border-4 border-[#32424D] shadow-2xl h-[450px] md:h-[700px]">
    
    <div v-for="(slide, index) in slides" :key="index">
      <transition 
        enter-active-class="transition ease-out duration-700"
        enter-from-class="opacity-0"
        enter-to-class="opacity-100"
        leave-active-class="transition ease-in duration-300"
        leave-from-class="opacity-100"
        leave-to-class="opacity-0"
      >
        <div v-if="activeSlide === index" class="absolute inset-0">
          
          <img 
            :src="slide.image" 
            class="w-full h-full object-cover block opacity-30" 
            loading="eager"
            @error="handleError"
          >
          
          <div class="absolute inset-0 flex flex-col items-center justify-center text-center p-6 z-20">
            <h1 class="!text-2xl md:!text-8xl font-black text-[#32424D] mb-4 md:mb-8 leading-tight drop-shadow-sm" v-html="slide.title"></h1>
            <p class="!text-sm md:!text-4xl text-[#32424D] font-bold max-w-5xl mb-6 md:mb-12 leading-relaxed px-2 opactiy-90">{{ slide.desc }}</p>
            
            <div class="flex flex-col sm:flex-row gap-3 md:gap-6 w-full sm:w-auto px-4">
                <a :href="loginRoute" class="w-full sm:w-auto bg-[#32424D] text-[#E8D258] !text-lg md:!text-4xl font-bold px-6 py-3 md:px-12 md:py-6 rounded-full hover:scale-105 transition-transform shadow-lg text-center">
                  Empezar ahora
                </a>
                <a href="#servicios" class="w-full sm:w-auto bg-white text-[#32424D] border-2 md:border-4 border-[#32424D] !text-lg md:!text-4xl font-bold px-6 py-3 md:px-12 md:py-6 rounded-full hover:bg-gray-50 transition-colors shadow-md text-center">
                    Saber más
                </a>
            </div>
          </div>
        </div>
      </transition>
    </div>

    <!-- Flechas ocultas en móvil, visibles desde MD -->
    <button @click="prev" class="hidden md:flex absolute left-6 top-1/2 -translate-y-1/2 bg-white/90 p-5 rounded-full text-[#32424D] z-30 shadow-xl hover:bg-white transition-colors items-center justify-center">
      <i class="bi bi-chevron-left text-4xl"></i>
    </button>
    <button @click="next" class="hidden md:flex absolute right-6 top-1/2 -translate-y-1/2 bg-white/90 p-5 rounded-full text-[#32424D] z-30 shadow-xl hover:bg-white transition-colors items-center justify-center">
      <i class="bi bi-chevron-right text-4xl"></i>
    </button>

    <div class="absolute bottom-6 md:bottom-8 left-1/2 -translate-x-1/2 flex gap-2 md:gap-3 z-30">
      <button 
        v-for="(_, i) in slides" 
        :key="i"
        @click="activeSlide = i"
        :class="activeSlide === i ? 'bg-[#32424D] w-6 md:w-8' : 'bg-[#32424D]/30 w-2 md:w-3'"
        class="h-2 md:h-3 rounded-full transition-all duration-300"
      ></button>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted, onBeforeUnmount } from 'vue';

const props = defineProps(['loginRoute', 'bannerImg', 'logoImg', 'storageImg']);

const activeSlide = ref(0);
const slides = [
  { image: props.bannerImg, title: 'Tu comunidad, <br><span class=\'text-[#bc6a50]\'>más viva que nunca.</span>', desc: '¡Vive Tenderete! Amigos, momentos y diversión.' },
  { image: props.storageImg, title: 'Actividades <br><span class=\'text-[#bc6a50]\'>para todos.</span>', desc: 'Talleres, paseos y charlas pensadas específicamente para tu bienestar y diversión.' },
  { image: props.logoImg, title: 'Un entorno <br><span class=\'text-[#bc6a50]\'>cerca de ti.</span>', desc: 'Diseñado con cariño y respeto, pensando siempre en tu comodidad y seguridad.' }
];

let timer = null;
const next = () => activeSlide.value = (activeSlide.value + 1) % slides.length;
const prev = () => activeSlide.value = (activeSlide.value - 1 + slides.length) % slides.length;

onMounted(() => {
  timer = setInterval(next, 8000);
});

onBeforeUnmount(() => {
  clearInterval(timer);
});

const handleError = (e) => {
  console.error("Fallo al cargar imagen:", e.target.src);
  e.target.src = 'https://via.placeholder.com/1920x1080?text=Error+Carga+Imagen';
};
</script>