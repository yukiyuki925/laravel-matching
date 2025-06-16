@extends('layouts.app')

@section('content')
    <div class="p-user-index text-center mt-8">
        <div class="tphoto">
            <img src="{{ $user->img_url }}" title="tphoto" alt="Tinder Photo" class="mx-auto rounded-md mb-4" />
            <div class="tname text-xl font-semibold">{{ $user->name }}</div>
        </div>

        <div class="tcontrols flex justify-between px-12 py-6">
            {{-- × ボタン --}}
            <form action="{{ route('swipes.store') }}" method="POST">
                @csrf
                <input type="hidden" name="to_user_id" value="{{ $user->id }}">
                <input type="hidden" name="is_like" value="0">
                <button type="submit"
                    class="w-28 h-28 rounded-full flex items-center justify-center bg-white shadow-lg hover:bg-red-100 transition">
                    <i class="fas fa-times fa-4x text-red-500"></i>
                </button>
            </form>

            {{-- ♥︎ ボタン --}}
            <form action="{{ route('swipes.store') }}" method="POST">
                @csrf
                <input type="hidden" name="to_user_id" value="{{ $user->id }}">
                <input type="hidden" name="is_like" value="1">
                <button type="submit"
                    class="w-28 h-28 rounded-full flex items-center justify-center bg-white shadow-lg hover:bg-green-100 transition">
                    <i class="fas fa-heart fa-4x text-green-500"></i>
                </button>
            </form>
        </div>
    </div>
@endsection
