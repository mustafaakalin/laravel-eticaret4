<div>
    {{-- Be like water. --}}
    @if(Auth::check())
    <form wire:submit.prevent="submitComment">
        <textarea wire:model="content" class="textarea" placeholder="Yorumunuzu yazın..."></textarea>
        @error('content') <span class="text-red-600">{{ $message }}</span> @enderror

        <button type="submit" class="btn btn-primary mt-2">Yorumu Gönder</button>
    </form>
    @else
    <p class="text-red-500">Yorum eklemek için lütfen giriş yapın.</p>
    @endif

    @if (session()->has('message'))
    <div class="mt-2 text-green-600">
        {{ session('message') }}
    </div>
    @endif
</div>

<script>
    Livewire.on('commentAdded', () => {
        // Logic to update the comments section, if needed
    });
</script>