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
        <h1 class="text-2xl text-green-700 mt-9 mb-9">{{ $blog->title }}</h1>

        <div class="m-9">
            <img src="{{ asset('storage') . '/' . $blog->image }}" alt="Blog Image">
        </div>

        {{-- <p class="text-green-700 m-9">{{ $blog->content }}</p> --}}


        @php
            $parsedown = new Parsedown();
        @endphp




        <div class="mx-auto prose prose-green">
            <p class="text-green-700 ">{!! $parsedown->text($blog->content) !!}</p>
        </div>


        <p class="text-green-700 ">Updated: {{ $blog->updated_at->diffForHumans() }}</p>
        <p class="text-green-700 ">Created: {{ $blog->created_at->diffForHumans() }}</p>
        @if ($blog->user)
            <p class="text-green-700">Author: {{ $blog->user->name }}</p>
        @endif
    @endforeach
</div>
