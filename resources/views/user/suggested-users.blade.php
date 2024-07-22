@extends('layouts.app')

@section('title', 'Suggested Users')

@section('content')
  <div class="row justify-content-center">
    <h2 class="text-center mb-3">Suggested</h2>
  <div class="col-auto">
    @foreach($suggested_users as $user)
    <img src="{{ Auth::user()->avatar }}" alt="" class="rounded-circle avatar-md">
  </div>
  <div class="col-auto">
    <p class="mb-0 text-secondary small">{{ $user->name }}</p>
      <span class="small text-secondary">
      @if ($user->followsYou())
        Follow you
      @else
        @if($user->followers->count() == 0)
          No followers yet
        @elseif($user->followers->count() == 1)
          1 follower
        @else
          {{ $user->followers->count() }} followers
        @endif
      @endif
    </span>  
  </div>
  <div class="col-auto">
    <form action="{{ route('follow.store', $user->id) }}" method="post">
      @csrf
      <button type="submit" class="bg-transparent border-0 shadow-none p-0 text-primary">Follow</button>
    </form>
    
  </div>

    @endforeach
@endsection