<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $description ?? 'E-Ticaret Ürünleri' }}">
    <meta name="keywords" content="{{ $keywords ?? 'e-ticaret, alışveriş, ürünler' }}">
    
    <title>{{ config('app.name', 'E-Ticaret') }}</title>
    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body>
    <div class="min-h-screen flex flex-col">
        <!-- Navbar -->
        <nav class="navbar bg-base-300">
            <div class="flex-1">
                <a href="{{ route('product.list') }}" class="btn btn-ghost normal-case text-xl">E-Ticaret</a>
            </div>
            <div class="flex-none">
                <ul class="menu menu-horizontal p-0">
                    <li><a href="{{ route('product.list') }}">Ürünler</a></li>
                    <li><a href="#">Hakkında</a></li>
                    <li><a href="#">İletişim</a></li>
                    <li>
                        @livewire('carts') <!-- Cart Livewire Component -->
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="flex-1">
            {{ $slot }}
            <div class="toast">
  <div class="alert alert-info">
    <span>New message arrived.</span>
  </div>
</div>
        </main>

        <!-- Footer -->
        <footer class="footer footer-center p-4 bg-base-200">
            <div>
                <p>© 2024 E-Ticaret. Tüm Hakları Saklıdır.</p>
            </div>
        </footer>

        
    </div>

    @vite('resources/js/app.js')
    @livewireScripts
</body>
</html>
