<x-app-layout>
    <x-slot name="header">
        <style>
            .content {
                padding-top:10px;
                padding-left:20px;
            }
            #content {
                height:200px;
                width:600px;
            }
            .submit {
                padding-top:5px;
                padding-left:20px;
            }
            #submit {
                background:#0066A2;
                color:white;
                border-style:outset;
                border-color:#0066A2;
                height:30px;
                width:80px;
            }
        </style>
    <x-slot>
    <div class="">
        <form method="POST" action="{{isset($post)?'/edit':'/create'}}">
            @csrf
            <div class="content"><textarea id="content" name="content">@if (isset($post)){{ $post->content }}@endif</textarea></div>
            @if (isset($post))
                <div><input type="hidden" id="post_id" name="post_id" value="{{ $post->id }}" /></div>
            @endif
            <div class="submit"><input type="submit" id="submit" /></div>
        </form>
    </div>
</x-app-layout>
