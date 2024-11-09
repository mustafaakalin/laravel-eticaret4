<div class="max-w-4xl mx-auto mt-10">
    {{-- Be like water. --}}
    <h1 class="text-2xl font-bold">Kontrol Paneli</h1>
    <p class="mt-4">Hoş geldiniz, {{ Auth::user()->name }}!</p>
    <livewire:auth.logout />
</div>
