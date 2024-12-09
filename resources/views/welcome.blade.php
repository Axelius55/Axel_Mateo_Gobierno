<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Citas</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <!-- Hero Section -->
    <section class="relative bg-cover bg-center h-screen" style="background-image: url('https://source.unsplash.com/1600x900/?office,people');">
        <div class="absolute inset-0 bg-gray-900 opacity-60"></div>
        <div class="relative z-10 flex flex-col items-center justify-center h-full text-center text-white">
            <h1 class="text-5xl md:text-6xl font-bold mb-4">Gestión de Citas Simplificada</h1>
            <p class="text-lg md:text-2xl mb-6">Agenda y organiza tus citas de forma rápida y eficiente</p>
            <div class="space-x-4">
                <a href="{{ route('login') }}"
                   class="px-6 py-3 bg-blue-500 text-white text-lg rounded-lg hover:bg-blue-600 transition duration-300">
                    Iniciar Sesión
                </a>
                <a href="{{ route('register') }}"
                   class="px-6 py-3 bg-green-500 text-white text-lg rounded-lg hover:bg-green-600 transition duration-300">
                    Registrarse
                </a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-8 text-gray-800">¿Por qué elegir nuestro sistema?</h2>
            <div class="flex flex-wrap justify-center gap-8">
                <!-- Feature 1 -->
                <div class="w-72 p-6 bg-gray-100 rounded-lg shadow hover:shadow-lg transition duration-300">
                    <h3 class="text-xl font-semibold mb-2 text-blue-500">Rápido y Eficiente</h3>
                    <p class="text-gray-600">Agenda tus citas en segundos con una interfaz amigable.</p>
                </div>
                <!-- Feature 2 -->
                <div class="w-72 p-6 bg-gray-100 rounded-lg shadow hover:shadow-lg transition duration-300">
                    <h3 class="text-xl font-semibold mb-2 text-green-500">Accesible</h3>
                    <p class="text-gray-600">Accede desde cualquier dispositivo, en cualquier lugar.</p>
                </div>
                <!-- Feature 3 -->
                <div class="w-72 p-6 bg-gray-100 rounded-lg shadow hover:shadow-lg transition duration-300">
                    <h3 class="text-xl font-semibold mb-2 text-yellow-500">Organización</h3>
                    <p class="text-gray-600">Mantén un control claro de tus citas y horarios.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-4 bg-gray-800 text-center text-white">
        <p>&copy; {{ date('Y') }} Sistema de Gestión de Citas. Todos los derechos reservados.</p>
    </footer>

</body>
</html>

