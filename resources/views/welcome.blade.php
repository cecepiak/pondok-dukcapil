<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        /* Gaya tambahan untuk efek latar belakang atau font kustom jika diperlukan */
        .hero-bg {
            background-image: url('{{ asset('images/bg.jpg') }}'); /* Ganti dengan gambar default yang relevan */
            background-size: cover;
            background-position: center;
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen flex flex-col antialiased">

    {{-- <header class="p-4 bg-white shadow-md">
        <div class="max-w-4xl mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold text-gray-800">Nama Aplikasi Anda</h1>
            <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-700 font-medium">Login</a>
        </div>
    </header> --}}

    <main class="flex-grow flex items-center justify-center">
        <div class="max-w-4xl mx-auto p-6 md:p-10 bg-white shadow-2xl rounded-xl overflow-hidden md:flex">
            
            <div class="md:w-1/2 p-4 md:pr-8 flex flex-col justify-center">
                <span class="text-sm font-semibold text-blue-600 uppercase tracking-wider mb-2">Layanan Cepat & Mudah</span>
                <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 leading-tight mb-4">
                    Selamat Datang di Pondok Dukcapil Tapin! 👋
                </h2>
                <p class="text-lg text-gray-600 mb-6">
                    Akses semua layanan digital dan informasi terbaru dengan mudah. Kami siap melayani Anda.
                </p>
                <div class="space-y-3 sm:space-x-4 sm:space-y-0 sm:flex">
                    <a href="{{ route('home') }}" class="w-full sm:w-auto flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 transition duration-150 ease-in-out">
                        Mulai Sekarang
                    </a>
                    {{-- <a href="#about" class="w-full sm:w-auto flex items-center justify-center px-6 py-3 border border-gray-300 text-base font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 transition duration-150 ease-in-out">
                        Pelajari Lebih Lanjut
                    </a> --}}
                </div>
            </div>
            
 <div class="md:w-1/2 mt-8 md:mt-0 relative">
    <img src="{{ asset('images/bupati1.png') }}" 
         alt="Ilustrasi Selamat Datang" 
         class="w-full h-auto object-cover rounded-lg transform hover:scale-[1.02] transition duration-300 ease-in-out" {{-- <<< shadow-xl DIHAPUS DI SINI --}}
         style="max-height: 400px;"
    >
</div>

        </div>
    </main>

    <footer class="mt-8 p-4 text-center text-sm text-gray-500 border-t border-gray-200">
        &copy; {{ date('Y') }} Pondok Dukcapil Tapin. Hak Cipta Dilindungi.
    </footer>

</body>
</html>

