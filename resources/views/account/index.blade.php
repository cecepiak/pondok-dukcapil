@extends('layouts.app')

@section('content')

<div class="max-w-4xl mx-auto p-4 pb-20">
    <h1 class="text-2xl font-bold mb-4">Akun Saya</h1>

    <div class="bg-white rounded-lg shadow-md p-4 mb-4">
        <div class="flex items-center mb-4">
            @if ($user->photos)
                <img src="{{ asset('storage/photos/' . $user->photos) }}" 
                    alt="Foto Profil" 
                    class="rounded-full w-16 h-16 mr-4 object-cover">
            @else
                <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&size=64&background=random" 
                    alt="Avatar Default" 
                    class="rounded-full w-16 h-16 mr-4">
            @endif
            
            <div>
                <p class="font-semibold text-lg">{{ $user->name }}</p>
                <p class="text-gray-700 text-sm font-bold">NIK : {{ $user->nik }}</p>
                <p class="text-gray-700 text-sm font-bold">KK : {{ $user->kk }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md p-2">
        {{-- Pengaturan Akun --}}
        <a href="javascript:void(0);" id="settings-link" class="flex items-center py-3 px-2 border-b border-gray-200 hover:bg-gray-50">
            <span class="mr-4 text-black-800">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
            </span>
            <span class="font-semibold">Pengaturan Akun</span>
        </a>

        <div id="settings-form" class="hidden p-4 bg-gray-50 mt-2 rounded-md">
            <h3 class="font-semibold text-md mb-4">Ubah Data Akun</h3>
            <form action="{{ route('account.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">e-Mail</label>
                    <input type="text" name="email" id="email" value="{{ $user->email }}" 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        required>
                    @error('email')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="phone" class="block text-sm font-medium text-gray-700">Nomor Whatsapp</label>
                    <input type="number" name="phone" id="phone" value="{{ $user->phone }}" 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        required>
                    @error('phone')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-start">
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Simpan
                    </button>
                </div>
            </form>
        </div>

        {{-- Ubah Password --}}
        <a href="javascript:void(0);" id="change-password-link" class="flex items-center py-3 px-2 border-b border-gray-200 hover:bg-gray-50">
            <span class="mr-4 text-red-600">
                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M6.94318 11h-.85227l.96023-2.90909h1.07954L9.09091 11h-.85227l-.63637-2.10795h-.02272L6.94318 11Zm-.15909-1.14773h1.60227v.59093H6.78409v-.59093ZM9.37109 11V8.09091h1.25571c.2159 0 .4048.04261.5667.12784.162.08523.2879.20502.3779.35937.0899.15436.1349.33476.1349.5412 0 .20833-.0464.38873-.1392.54119-.0918.15246-.2211.26989-.3878.35229-.1657.0824-.3593.1236-.5809.1236h-.75003v-.61367h.59093c.0928 0 .1719-.0161.2372-.0483.0663-.03314.1169-.08002.152-.14062.036-.06061.054-.13211.054-.21449 0-.08334-.018-.15436-.054-.21307-.0351-.05966-.0857-.10511-.152-.13636-.0653-.0322-.1444-.0483-.2372-.0483h-.2784V11h-.78981Zm3.41481-2.90909V11h-.7898V8.09091h.7898Z"/>
                    <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M8.31818 2c-.55228 0-1 .44772-1 1v.72878c-.06079.0236-.12113.04809-.18098.07346l-.55228-.53789c-.38828-.37817-1.00715-.37817-1.39543 0L3.30923 5.09564c-.19327.18824-.30229.44659-.30229.71638 0 .26979.10902.52813.30229.71637l.52844.51468c-.01982.04526-.03911.0908-.05785.13662H3c-.55228 0-1 .44771-1 1v2.58981c0 .5523.44772 1 1 1h.77982c.01873.0458.03802.0914.05783.1366l-.52847.5147c-.19327.1883-.30228.4466-.30228.7164 0 .2698.10901.5281.30228.7164l1.88026 1.8313c.38828.3781 1.00715.3781 1.39544 0l.55228-.5379c.05987.0253.12021.0498.18102.0734v.7288c0 .5523.44772 1 1 1h2.65912c.5523 0 1-.4477 1-1v-.7288c.1316-.0511.2612-.1064.3883-.1657l.5435.2614v.4339c0 .5523.4477 1 1 1H14v.0625c0 .5523.4477 1 1 1h.0909v.0625c0 .5523.4477 1 1 1h.6844l.4952.4823c1.1648 1.1345 3.0214 1.1345 4.1863 0l.2409-.2347c.1961-.191.3053-.454.3022-.7277-.0031-.2737-.1183-.5342-.3187-.7207l-6.2162-5.7847c.0173-.0398.0342-.0798.0506-.12h.7799c.5522 0 1-.4477 1-1V8.17969c0-.55229-.4478-1-1-1h-.7799c-.0187-.04583-.038-.09139-.0578-.13666l.5284-.51464c.1933-.18824.3023-.44659.3023-.71638 0-.26979-.109-.52813-.3023-.71637l-1.8803-1.8313c-.3883-.37816-1.0071-.37816-1.3954 0l-.5523.53788c-.0598-.02536-.1201-.04985-.1809-.07344V3c0-.55228-.4477-1-1-1H8.31818Z"/>
                </svg>
            </span>
            <span class="font-semibold">Ubah Password</span>
        </a>

        <div id="change-password-form" class="hidden p-4 bg-gray-50 mt-2 rounded-md">
            <h3 class="font-semibold text-md mb-4">Ubah Password</h3>
            <form action="{{ route('account.password.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4 relative">
                    <label for="current_password" class="block text-sm font-medium text-gray-700">Password Lama</label>
                    <div class="relative">
                        <input type="password" name="current_password" id="current_password" 
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 pr-10"
                               required>
                        <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600" onclick="togglePasswordVisibility('current_password')">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 011.484 0C4.306 13.49 7.29 15 11 15.002c3.71 0 6.694-1.51 8.484-2.678 1.484-1.168 2.678-2.678 2.678-4.012 0-1.334-1.194-2.844-2.678-4.012a1.012 1.012 0 011.484 0 10.012 10.012 0 0110 10.012 10.012 10.012 0 01-10 10.012A10.012 10.012 0 012.036 12.322zM11 15.002c-3.71 0-6.694-1.51-8.484-2.678a1.012 1.012 0 011.484 0 10.012 10.012 0 0010 10.012 10.012 10.012 0 0010-10.012 10.012 10.012 0 00-10-10.012 10.012 10.012 0 00-10 10.012 10.012 10.012 0 0010 10.012z" />
                            </svg>
                        </button>
                    </div>
                    @error('current_password')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4 relative">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password Baru</label>
                    <div class="relative">
                        <input type="password" name="password" id="password" 
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 pr-10"
                               required>
                        <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600" onclick="togglePasswordVisibility('password')">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 011.484 0C4.306 13.49 7.29 15 11 15.002c3.71 0 6.694-1.51 8.484-2.678 1.484-1.168 2.678-2.678 2.678-4.012 0-1.334-1.194-2.844-2.678-4.012a1.012 1.012 0 011.484 0 10.012 10.012 0 0110 10.012 10.012 10.012 0 01-10 10.012A10.012 10.012 0 012.036 12.322zM11 15.002c-3.71 0-6.694-1.51-8.484-2.678a1.012 1.012 0 011.484 0 10.012 10.012 0 0010 10.012 10.012 10.012 0 0010-10.012 10.012 10.012 0 00-10-10.012 10.012 10.012 0 00-10 10.012 10.012 10.012 0 0010 10.012z" />
                            </svg>
                        </button>
                    </div>
                    @error('password')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4 relative">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password Baru</label>
                    <div class="relative">
                        <input type="password" name="password_confirmation" id="password_confirmation" 
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 pr-10"
                               required>
                        <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600" onclick="togglePasswordVisibility('password_confirmation')">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 011.484 0C4.306 13.49 7.29 15 11 15.002c3.71 0 6.694-1.51 8.484-2.678 1.484-1.168 2.678-2.678 2.678-4.012 0-1.334-1.194-2.844-2.678-4.012a1.012 1.012 0 011.484 0 10.012 10.012 0 0110 10.012 10.012 10.012 0 01-10 10.012A10.012 10.012 0 012.036 12.322zM11 15.002c-3.71 0-6.694-1.51-8.484-2.678a1.012 1.012 0 011.484 0 10.012 10.012 0 0010 10.012 10.012 10.012 0 0010-10.012 10.012 10.012 0 00-10-10.012 10.012 10.012 0 00-10 10.012 10.012 10.012 0 0010 10.012z" />
                            </svg>
                        </button>
                    </div>
                    @error('password_confirmation')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-start">
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>

        {{-- Logout --}}
        <a href="{{ route('logout') }}" class="flex items-center py-3 px-2 border-b border-gray-200 hover:bg-gray-50"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <span class="mr-4 text-red-500">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 15v2a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3v-2M12 4v12m0-12 4 4m-4-4L8 8"/>
                </svg>
            </span>
            <span class="font-semibold">Logout</span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</div>

{{-- SweetAlert2 already loaded in app.blade.php --}}

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const settingsLink = document.getElementById('settings-link');
        const settingsForm = document.getElementById('settings-form');
        const changePasswordLink = document.getElementById('change-password-link');
        const changePasswordForm = document.getElementById('change-password-form');

        settingsLink?.addEventListener('click', function(e) {
            e.preventDefault();
            settingsForm.classList.toggle('hidden');
        });

        changePasswordLink?.addEventListener('click', function(e) {
            e.preventDefault();
            settingsForm.classList.add('hidden');
            changePasswordForm.classList.toggle('hidden');
        });

        // Toggle Password Visibility
        window.togglePasswordVisibility = function(inputId) {
            const input = document.getElementById(inputId);
            const button = input.nextElementSibling;
            const svg = button.querySelector('svg');

            if (input.type === 'password') {
                input.type = 'text';
                svg.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.015 10.015 0 0112 5.003c5.59 0 10.012 4.422 10.012 10.012 0 5.59-4.422 10.012-10.012 10.012A10.015 10.015 0 013.98 15.777M12 12a2 2 0 110 4 2 2 0 010-4zm0 0a2 2 0 110 4 2 2 0 010-4z" />`;
            } else {
                input.type = 'password';
                svg.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 011.484 0C4.306 13.49 7.29 15 11 15.002c3.71 0 6.694-1.51 8.484-2.678 1.484-1.168 2.678-2.678 2.678-4.012 0-1.334-1.194-2.844-2.678-4.012a1.012 1.012 0 011.484 0 10.012 10.012 0 0110 10.012 10.012 10.012 0 01-10 10.012A10.012 10.012 0 012.036 12.322zM11 15.002c-3.71 0-6.694-1.51-8.484-2.678a1.012 1.012 0 011.484 0 10.012 10.012 0 0010 10.012 10.012 10.012 0 0010-10.012 10.012 10.012 0 00-10-10.012 10.012 10.012 0 00-10 10.012 10.012 10.012 0 0010 10.012z" />`;
            }
        };

        // SweetAlert Notifications
        @if (session('password_updated'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: 'Password Anda berhasil diperbarui. Anda akan logout sebentar lagi...',
                timer: 2000,
                showConfirmButton: false,
                willClose: () => {
                    document.getElementById('logout-form').submit();
                }
            });
        @elseif ($errors->any())
            changePasswordForm.classList.remove('hidden');
            settingsForm.classList.add('hidden');

            let errorMsg = '';
            @foreach ($errors->all() as $error)
                errorMsg += "{{ $error }}\n";
            @endforeach

            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: errorMsg.trim(),
                confirmButtonText: 'OK'
            });
        @elseif (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: "{{ session('success') }}",
                timer: 2000,
                showConfirmButton: false
            });
        @endif
    });
</script>

@endsection