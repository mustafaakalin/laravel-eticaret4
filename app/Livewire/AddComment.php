<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Component;

class AddComment extends Component
{
    public $content;
    public $productId;

    protected $rules = [
        'content' => 'required|min:5',
    ];

    public function submitComment()
    {
        $this->validate();

        // Save the comment to the database
        Comment::create([
            'product_id' => $this->productId,
            'user_id' => auth()->id(), // Use the authenticated user's ID
            'content' => $this->content,
        ]);

        // Dispatch an event to inform other components that a comment has been added
        $this->dispatch('comment-added', ['productId' => $this->productId]);

        // Reset the input field
        $this->content = '';
    }

    public function render()
    {
        return view('livewire.add-comment');
    }
}
