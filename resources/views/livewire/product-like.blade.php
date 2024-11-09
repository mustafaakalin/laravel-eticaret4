<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <button wire:click="toggleLike" class="btn {{ $liked ? 'btn-success' : 'btn-outline' }}">
        {{ $liked ? 'Beğenildi' : 'Beğen' }}
    </button>
</div>