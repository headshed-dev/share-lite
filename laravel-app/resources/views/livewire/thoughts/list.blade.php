<?php

use Livewire\Volt\Component;
use App\Models\Blog;
use Illuminate\Database\Eloquent\Collection;

new class extends Component {
    public Collection $blogs;

    public function mount(): void
    {
        // $this->blogs = Blog::with('user')->latest()->get();
        $this->blogs = Blog::latest()->get();
    }
}; ?>

<div>
    @foreach ($blogs as $blog)
        <h1 class="text-gray-700">{{ $blog->title }}</h1>
        @if ($blog->user)
            <p>Author: {{ $blog->user->name }}</p>
        @endif
    @endforeach
</div>
