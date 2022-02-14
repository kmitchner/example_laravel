<x-app-layout>
    <x-slot name="header">
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
            .grid-container {
                display: grid;
                grid-template-columns: auto auto auto auto;
                background-color: #2196F3;
                padding: 2px;
            }
            .grid-item {
                background-color: rgba(255, 255, 255, 0.8);
                border: 1px solid rgba(0, 0, 0, 0.8);
                padding: 2px;
                font-size: 12px;
                text-align: center;
            }
        </style>
    <x-slot>
    <div class="grid-container">
        @foreach ($posts as $post)
            <div class="grid-item">{{ $post->user->email }}</div>
            <div class="grid-item">{{ $post->content }}</div>
            <div class="grid-item">{{ $post->updated_at }}</div>
            <div class="grid-item">
                @if (Gate::allows('edit-post', $post))
                    <a href="edit/{{ $post->id }}">Edit</a>
                    -
                @endif
                @if (Gate::allows('delete-post', $post))
                    <a href="delete/{{ $post->id }}">Delete</a>
                @endif
            </div>
        @endforeach
    </div>
    <p><a href="create">Create Post</a></p>
</x-app-layout>
