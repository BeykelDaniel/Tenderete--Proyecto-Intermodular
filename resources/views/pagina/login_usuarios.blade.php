@extends('layout')

@section('title', 'Bienvenido a Tenderete')

@section('contenido')
<div class="max-w-2xl mx-auto py-6 px-4">
   
    <!-- Toggle switch -->
    <div class="flex bg-gray-200 rounded-full p-1.5 w-full max-w-sm mx-auto mb-8 shadow-inner" id="auth-toggle">
        <button type="button" id="btn-login" onclick="switchTab('login')" class="flex-1 text-center py-2.5 rounded-full text-base font-black transition-all bg-white text-indigo-600 shadow-md">
            Ya soy parte
        </button>
        <button type="button" id="btn-register" onclick="switchTab('register')" class="flex-1 text-center py-2.5 rounded-full text-base font-black transition-all text-gray-500 hover:text-gray-700">
            Quiero unirme
        </button>
    </div>

    <div class="relative">
        {{-- BLOQUE LOGIN: MÁS ACCESIBLE --}}
        <div id="bloque-login" class="w-full bg-white rounded-[30px] shadow-2xl p-6 md:p-8 border-4 border-[#32424D]/10 transition-all duration-300 transform">
            <div class="flex items-center gap-4 mb-6">
                <div class="w-12 h-12 bg-indigo-100 text-indigo-600 rounded-xl flex items-center justify-center shadow-inner">
                    <i class="bi bi-person-check-fill text-2xl"></i>
                </div>
                <h2 class="text-2xl font-black text-[#32424D] uppercase">Ya soy parte</h2>
            </div>

            <form action="{{ route('login.custom') }}" method="POST" class="space-y-6">
                @csrf
                <div class="space-y-2">
                    <label class="block text-base font-bold text-gray-700 ml-2 italic underline decoration-indigo-300 decoration-4">Tu Correo Electrónico</label>
                    <input type="email" name="email" required placeholder="ejemplo@correo.com"
                        class="w-full p-3 bg-gray-50 border-2 border-gray-100 rounded-2xl focus:bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 outline-none transition-all text-base font-bold">
                </div>

                <div class="space-y-2">
                    <label class="block text-base font-bold text-gray-700 ml-2 italic underline decoration-indigo-300 decoration-4">Tu Contraseña</label>
                    <input type="password" name="password" required placeholder="Tu clave secreta"
                        class="w-full p-3 bg-gray-50 border-2 border-gray-100 rounded-2xl focus:bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 outline-none transition-all text-base font-bold">
                </div>

                <button type="submit"
                    class="w-full bg-[#32424D] text-white font-black py-4 rounded-2xl hover:bg-black hover:scale-[1.02] active:scale-95 transition-all shadow-xl uppercase tracking-widest text-lg flex items-center justify-center gap-3 mt-8">
                    Entrar ahora <i class="bi bi-arrow-right-circle-fill"></i>
                </button>
            </form>
        </div>

        {{-- BLOQUE REGISTRO: MÁS CÁLIDO --}}
        <div id="bloque-register" class="hidden w-full bg-white rounded-[30px] shadow-2xl p-6 md:p-8 border-4 border-[#bc6a50]/10 transition-all duration-300 transform">
            <div class="flex items-center gap-4 mb-6">
                <div class="w-12 h-12 bg-orange-100 text-[#bc6a50] rounded-xl flex items-center justify-center shadow-inner">
                    <i class="bi bi-person-plus-fill text-2xl"></i>
                </div>
                <h2 class="text-2xl font-black text-[#bc6a50] uppercase">Quiero unirme</h2>
            </div>

            <form action="{{ route('usuarios.store_publico') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @csrf
                <div class="col-span-full">
                    <label class="block text-base font-bold text-gray-700 ml-2 mb-2 italic underline decoration-orange-300 decoration-4">Foto de Perfil (Opcional)</label>
                    <div class="flex flex-col items-center justify-center text-center gap-3 p-4 bg-orange-50/30 rounded-2xl border-2 border-dashed border-orange-200">
                        <div class="w-14 h-14 shrink-0 bg-white border-2 border-orange-100 rounded-xl flex items-center justify-center text-orange-300 shadow-sm">
                            <i class="bi bi-camera-fill text-2xl"></i>
                        </div>
                        <input type="file" name="perfil_foto" accept="image/*" class="w-full max-w-[280px] text-sm font-bold text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-orange-50 file:text-orange-700 hover:file:bg-orange-100 cursor-pointer">
                    </div>
                </div>

                <div class="col-span-full md:col-span-1">
                    <label class="block text-xs font-black text-gray-500 uppercase tracking-widest ml-2 mb-1">Nombre Completo</label>
                    <input type="text" name="name" required placeholder="¿Cómo te llamas?"
                        class="w-full p-3 bg-gray-50 border-2 border-gray-100 rounded-xl focus:bg-white focus:border-orange-500 focus:ring-4 focus:ring-orange-50/50 outline-none transition-all font-bold text-sm">
                </div>

                <div class="col-span-full md:col-span-1">
                    <label class="block text-xs font-black text-gray-500 uppercase tracking-widest ml-2 mb-1">Correo Electrónico</label>
                    <input type="email" name="email" required placeholder="tu@correo.com"
                        class="w-full p-3 bg-gray-50 border-2 border-gray-100 rounded-xl focus:bg-white focus:border-orange-500 focus:ring-4 focus:ring-orange-50/50 outline-none transition-all font-bold text-sm">
                </div>

                <div class="space-y-1">
                    <label class="block text-xs font-black text-gray-500 uppercase tracking-widest ml-2">¿Cuándo naciste?</label>
                    <input type="date" name="fecha_nacimiento" required max="{{ date('Y-m-d') }}"
                        class="w-full p-3 bg-gray-50 border-2 border-gray-100 rounded-xl focus:bg-white focus:border-orange-500 outline-none font-bold text-sm">
                </div>

                <div class="space-y-1">
                    <label class="block text-xs font-black text-gray-500 uppercase tracking-widest ml-2">Género</label>
                    <select name="genero" required
                        class="w-full p-3 bg-gray-50 border-2 border-gray-100 rounded-xl focus:bg-white focus:border-orange-500 outline-none font-bold text-sm">
                        <option value="hombre">Hombre</option>
                        <option value="mujer">Mujer</option>
                        <option value="otro">Otro</option>
                    </select>
                </div>

                <div class="space-y-1">
                    <label class="block text-xs font-black text-gray-500 uppercase tracking-widest ml-2">Teléfono</label>
                    <input type="text" name="numero_telefono" required placeholder="600 000 000"
                        class="w-full p-3 bg-gray-50 border-2 border-gray-100 rounded-xl focus:bg-white focus:border-orange-500 outline-none font-bold text-sm">
                </div>

                <div class="space-y-1">
                    <label class="block text-xs font-black text-gray-500 uppercase tracking-widest ml-2">Contraseña</label>
                    <input type="password" name="password" required placeholder="Mínimo 8 letras"
                        class="w-full p-3 bg-gray-50 border-2 border-gray-100 rounded-xl focus:bg-white focus:border-orange-500 outline-none font-bold text-sm">
                </div>



                <button type="submit"
                    class="col-span-full mt-4 bg-[#bc6a50] text-white font-black py-4 rounded-2xl hover:bg-orange-800 hover:scale-[1.02] active:scale-95 transition-all shadow-xl uppercase tracking-widest text-lg">
                    Comenzar mi aventura
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    function switchTab(tab) {
        const btnLogin = document.getElementById('btn-login');
        const btnRegister = document.getElementById('btn-register');
        const bloqueLogin = document.getElementById('bloque-login');
        const bloqueRegister = document.getElementById('bloque-register');

        if (tab === 'login') {
            bloqueLogin.classList.remove('hidden');
            bloqueRegister.classList.add('hidden');

            btnLogin.className = "flex-1 text-center py-3 rounded-full text-lg font-black transition-all bg-white text-indigo-600 shadow-md";
            btnRegister.className = "flex-1 text-center py-3 rounded-full text-lg font-black transition-all text-gray-500 hover:text-gray-700";
        } else {
            bloqueRegister.classList.remove('hidden');
            bloqueLogin.classList.add('hidden');

            btnRegister.className = "flex-1 text-center py-3 rounded-full text-lg font-black transition-all bg-white text-[#bc6a50] shadow-md";
            btnLogin.className = "flex-1 text-center py-3 rounded-full text-lg font-black transition-all text-gray-500 hover:text-gray-700";
        }
    }
    
    @if($errors->has('name') || $errors->has('fecha_nacimiento') || $errors->has('genero') || $errors->has('numero_telefono') || old('name'))
        switchTab('register');
    @endif
</script>
@endsection