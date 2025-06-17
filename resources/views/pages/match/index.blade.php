@extends('layouts.app')
@section('content')
    <div class="p-match-index">
        <div class="container">
            <div class="row">
                @foreach ($matchedUsers as $matchedUser)
                    <div class="col-md-12 flex items-center border mb-3">
                        <img src="{{ $matchedUser->toUser->img_url }}" class="rounded-around"
                            style="height: 80px; width: 80px; object-fit: cover;">

                        <div class="flex items-center justify-center w-full">
                            <a href="#" class="text-base">
                                {{ $matchedUser->toUser->name }}
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
