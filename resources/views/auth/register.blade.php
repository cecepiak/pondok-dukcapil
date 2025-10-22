@extends('layouts.app')
@section('content')

<div class="min-h-screen pt-0 flex items-start justify-center">
    <div class="w-full max-w-xl bg-white/50 backdrop-blur-sm rounded-lg shadow-xl p-8 transform transition-transform duration-500 ease-in-out">
        <a href="{{ url('/') }}" class="absolute top-4 left-4 text-gray-600 hover:text-blue-600 !important transition-colors duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z" />
            </svg>
        </a>
        <div class="text-center mb-6">
            <div class="w-24 h-24 mx-auto mb-4">
                <img src="{{ asset('icon/daftar.png') }}" alt="Ikon Layanan Online" class="w-full h-full object-contain" id="service-icon">
            </div>
            <h2 class="text-3xl font-bold text-gray-800 text-center mb-2">Daftar Akun</h2>
            <p class="text-center text-gray-600 mb-6">Silakan isi data dengan lengkap, dan klik simpan</p>
        </div>

        @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
        @endif

        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf

            {{-- Input NIK --}}
            <div>
                <label for="nik" class="block text-gray-700 text-sm font-bold mb-2">Masukkan NIK</label>
                <input id="nik" type="text" name="nik" placeholder="Cth: 6305xxxxxxxxxxxx" value="{{ old('nik') }}" required autofocus oninput="this.value=this.value.replace(/[^0-9]/g,'').slice(0,16)" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50
                @error('nik') border-red-500 @enderror">
                @error('nik')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Input No KK --}}
            <div>
                <label for="kk" class="block text-gray-700 text-sm font-bold mb-2">Masukkan Nomor KK</label>
                <input id="kk" type="text" name="kk" placeholder="Cth: 6305xxxxxxxxxxxx" value="{{ old('kk') }}" required oninput="this.value=this.value.replace(/[^0-9]/g,'').slice(0,16)" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50
                @error('kk') border-red-500 @enderror">
                @error('kk')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Input Nama Lengkap --}}
            <div>
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nama Lengkap</label>
                <input id="name" type="text" name="name" placeholder="Masukkan Nama Lengkap" value="{{ old('name') }}" required autocomplete="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50
                @error('name') border-red-500 @enderror" oninput="this.value = this.value.toUpperCase()">
                @error('name')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Dropdown Pilih Kecamatan --}}
            <div>
                <label for="kecamatan" class="block text-gray-700 text-sm font-bold mb-2">Pilih Kecamatan</label>
                <select id="kecamatan" name="kecamatan" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 @error('kecamatan') border-red-500 @enderror">
                    <option value="">Pilih Kecamatan</option>
                    @foreach ($kecamatans as $kec)
                    <option value="{{ $kec->id }}" {{ old('kecamatan') == $kec->id ? 'selected' : '' }}>
                        {{ $kec->nama }}
                    </option>
                    @endforeach
                </select>
                @error('kecamatan')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Dropdown Pilih Desa/Kelurahan --}}
            <div>
                <label for="desa_kelurahan" class="block text-gray-700 text-sm font-bold mb-2">Pilih Desa/Kelurahan</label>
                <select id="desa_kelurahan" name="desa_kelurahan" required disabled class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 @error('desa_kelurahan') border-red-500 @enderror">
                    <option value="">Pilih Desa/Kelurahan</option>
                </select>
                @error('desa_kelurahan')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Input Email --}}
            <div>
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Alamat Email</label>
                <input id="email" type="email" name="email" placeholder="Masukkan e-Mail" value="{{ old('email') }}" required autocomplete="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 @error('email') border-red-500 @enderror">
                @error('email')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Input No HP --}}
            <div>
                <label for="phone" class="block text-gray-700 text-sm font-bold mb-2">Nomor WhatsApp</label>
                <input id="phone" type="text" name="phone" placeholder="Masukkan Nomor WhatsApp" value="{{ old('phone') }}" required oninput="this.value=this.value.replace(/[^0-9]/g,'')" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 @error('phone') border-red-500 @enderror">
                @error('phone')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Input Password --}}
            {{-- <div> --}}

            <div>
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                <div class="relative">
                    <input id="password" type="password" name="password" placeholder="Password Minimal 8 Digit" required autocomplete="new-password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 @error('password') border-red-500 @enderror">
                    <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500">
                        <svg id="eye-open" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M3.53 2.47a.75.75 0 0 0-1.06 1.06l18 18a.75.75 0 1 0 1.06-1.06l-18-18ZM22.676 12.553a11.249 11.249 0 0 1-2.631 4.31l-3.099-3.099a5.25 5.25 0 0 0-6.71-6.71L7.759 4.577a11.217 11.217 0 0 1 4.242-.827c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113Z" />
                            <path d="M15.75 12c0 .18-.013.357-.037.53l-4.244-4.243A3.75 3.75 0 0 1 15.75 12ZM12.53 15.713l-4.243-4.244a3.75 3.75 0 0 0 4.244 4.243Z" />
                            <path d="M6.75 12c0-.619.107-1.213.304-1.764l-3.1-3.1a11.25 11.25 0 0 0-2.63 4.31c-.12.362-.12.752 0 1.114 1.489 4.467 5.704 7.69 10.675 7.69 1.5 0 2.933-.294 4.242-.827l-2.477-2.477A5.25 5.25 0 0 1 6.75 12Z" />
                        </svg>
                        <svg id="eye-closed" class="h-5 w-5 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
                @error('password')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2">Konfirmasi Password</label>
                <div class="relative">
                    <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Konfirmasi Password" required autocomplete="new-password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                    {{-- Tombol dan ikon mata untuk Konfirmasi Password --}}
                    <button type="button" id="toggleConfirmPassword" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500">
                        <svg id="eye-open-confirm" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M3.53 2.47a.75.75 0 0 0-1.06 1.06l18 18a.75.75 0 1 0 1.06-1.06l-18-18ZM22.676 12.553a11.249 11.249 0 0 1-2.631 4.31l-3.099-3.099a5.25 5.25 0 0 0-6.71-6.71L7.759 4.577a11.217 11.217 0 0 1 4.242-.827c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113Z" />
                            <path d="M15.75 12c0 .18-.013.357-.037.53l-4.244-4.243A3.75 3.75 0 0 1 15.75 12ZM12.53 15.713l-4.243-4.244a3.75 3.75 0 0 0 4.244 4.243Z" />
                            <path d="M6.75 12c0-.619.107-1.213.304-1.764l-3.1-3.1a11.25 11.25 0 0 0-2.63 4.31c-.12.362-.12.752 0 1.114 1.489 4.467 5.704 7.69 10.675 7.69 1.5 0 2.933-.294 4.242-.827l-2.477-2.477A5.25 5.25 0 0 1 6.75 12Z" />
                        </svg>
                        <svg id="eye-closed-confirm" class="h-5 w-5 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </div>

            {{-- Tombol Simpan --}}
            <div id="button-group" class="flex items-center justify-between mt-6 pt-4">
                <button type="submit" id="main-button"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg focus:outline-none focus:shadow-lg focus:ring-2 focus:ring-blue-500 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105 flex items-center mr-4">
                    <svg id="main-button-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 3.75V16.5L12 14.25 7.5 16.5V3.75m9 0H18A2.25 2.25 0 0 1 20.25 6v12A2.25 2.25 0 0 1 18 20.25H6A2.25 2.25 0 0 1 3.75 18V6A2.25 2.25 0 0 1 6 3.75h1.5m9 0h-9" />
                    </svg>
                    Simpan
                </button>
                <button type="reset" id="secondary-button"
                    class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-6 rounded-lg focus:outline-none focus:shadow-lg focus:ring-2 focus:ring-yellow-500 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105 flex items-center">
                    <svg id="secondary-button-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                    </svg>
                    Reset
                </button>
            </div>

            <div class="text-center mt-4 text-sm text-gray-600">
                Sudah punya akun? <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:text-blue-500">Login di sini</a>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // --- SCRIPT DROPDOWN KECAMATAN/DESA ---
        const kecamatanDropdown = document.getElementById('kecamatan');
        const desaDropdown = document.getElementById('desa_kelurahan');
        
        // Dapatkan nilai lama (old) dari Laravel, simpan di variabel JavaScript
        const oldKecamatan = "{{ old('kecamatan') }}";
        const oldDesa = "{{ old('desa_kelurahan') }}";

        // Fungsi untuk memuat desa berdasarkan ID kecamatan
        function loadDesa(kecamatanId) {
            desaDropdown.innerHTML = '<option value="">Pilih Desa/Kelurahan</option>';
            desaDropdown.disabled = true;

            if (kecamatanId) {
                fetch(`/desa?kecamatan_id=${kecamatanId}`)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(desa => {
                            const option = document.createElement('option');
                            option.value = desa.kode_desa;
                            option.textContent = desa.nama;
                            desaDropdown.appendChild(option);
                        });
                        desaDropdown.disabled = false;
                        
                        // Setelah desa dimuat, cek jika ada nilai lama untuk desa
                        if (oldDesa) {
                            desaDropdown.value = oldDesa;
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching desa data:', error);
                        desaDropdown.disabled = false;
                    });
            } else {
                desaDropdown.disabled = false;
            }
        }
        
        // Event listener saat pilihan kecamatan berubah
        kecamatanDropdown.addEventListener('change', function() {
            loadDesa(this.value);
        });

        // Periksa jika ada nilai lama untuk kecamatan saat halaman pertama dimuat
        if (oldKecamatan) {
            loadDesa(oldKecamatan);
        }

        // --- SKRIP UNTUK SHOW/HIDE PASSWORD ---
        // (kode ini tidak berubah, Anda bisa menempatkannya di sini atau di file JS terpisah)
        const passwordInput = document.getElementById('password');
        const togglePasswordBtn = document.getElementById('togglePassword');
        const eyeOpenIcon = document.getElementById('eye-open');
        const eyeClosedIcon = document.getElementById('eye-closed');

        togglePasswordBtn.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            eyeOpenIcon.classList.toggle('hidden');
            eyeClosedIcon.classList.toggle('hidden');
        });

                // --- SKRIP UNTUK SHOW/HIDE KONFIRMASI PASSWORD ---
        const confirmPasswordInput = document.getElementById('password_confirmation');
        const toggleConfirmPasswordBtn = document.getElementById('toggleConfirmPassword');
        const eyeOpenConfirmIcon = document.getElementById('eye-open-confirm');
        const eyeClosedConfirmIcon = document.getElementById('eye-closed-confirm');

        toggleConfirmPasswordBtn.addEventListener('click', function() {
            const type = confirmPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            confirmPasswordInput.setAttribute('type', type);

            eyeOpenConfirmIcon.classList.toggle('hidden');
            eyeClosedConfirmIcon.classList.toggle('hidden');
        });
    });
</script>

@endsection
