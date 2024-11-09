<div class="max-w-md mx-auto mt-10">
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <h1 class="text-2xl font-bold">Giriş Yap</h1>
    @if (session()->has('error'))
        <div class="bg-red-500 text-white p-3 rounded mb-3">
            {{ session('error') }}
        </div>
    @endif
    <form wire:submit.prevent="login" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">E-posta</label>
            <input type="email" wire:model="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Şifre</label>
            <input type="password" wire:model="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Giriş Yap</button>
        </div>
    </form>
</div>
