@extends('layouts.app')

@section('content')
    <div class="p-4">
        <h2 class="text-xl font-bold mb-4">チャット：{{ $user->name }}</h2>

        @if ($messages)
            <div class="border p-4 h-96 overflow-y-scroll mb-4 bg-white rounded">
                @foreach ($messages as $message)
                    <div class="{{ $message->from_user_id === auth()->id() ? 'text-right' : 'text-left' }}">
                        <div
                            class="inline-block px-3 py-2 rounded
                    {{ $message->from_user_id === auth()->id() ? 'bg-blue-200' : 'bg-gray-200' }}">
                            {{ $message->content }}
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <form action="{{ route('messages.send', $user->id) }}" method="POST" class="flex gap-2">
            @csrf
            <input type="text" name="message" class="flex-1 border rounded px-2 py-1" placeholder="メッセージを入力">
            <button type="submit" class="bg-blue-500 text-black px-4 py-1 rounded">送信</button>
        </form>
    </div>
@endsection
