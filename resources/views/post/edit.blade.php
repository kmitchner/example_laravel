<x-app-layout>
    <x-slot name="header">
        <style>
        </style>
    <x-slot>
    <div class="">
        <form method="POST" action="{{isset($post)?'/edit':'/create'}}">
            @csrf
            <div><textarea id="content" name="content">@if (isset($post)){{ $post->content }}@endif</textarea></div>
            @if (isset($post))
                <div><input type="hidden" id="post_id" name="post_id" value="{{ $post->id }}" /></div>
            @endif
            <div><input type="submit" /></div>
        </form>
    </div>
</x-app-layout>
