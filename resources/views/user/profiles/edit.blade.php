@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
    <div class="row justify-contet-center">
      <div class="col-8">
        <form action="{{ route('profile.update')}}" method="post" class="shadhow bg-white rounded-3 p-5 mb-5" enctype="multipart/form-data">
          @csrf
          @method('PATCH')

          <h2 class="h2 text-sedondary mb-3">Update Profile</h2>
          <div class="row mb-3">
            <div class="col-4">
              @if(Auth::user()->avatar)
                <img src="{{ Auth::user()->avatar }}" alt="" class="rounded-circle image-lg d-bolck mx-auto">
              @else
                <i class="fa-solid fa-circle-user text-secondary icon-lg d-block text-center"></i>
              @endif
            </div>
            <div class="col-auto align-self-end">
              <input type="file" name="avatar" id="" class="form-control form-control-sm">
              <p class="mb-0 form-text">
                Acceptable formats: jpeg, jpg, png, gif <br>
                Max file sixe is 1048 KB
              </p>
              @error('avatar')
              <p class="text-warning small">{{ $message }}</p>
              @enderror
              
            </div>
          </div>

          <label for="name" class="form-label fw-bold">Name</label>
          <input type="text" name="name" id="name" value="{{ old('name', Auth::user()->name) }}" class="form-control">
          @error('name')
              <p class="text-warning small">{{ $message }}</p>
          @enderror
          
          <label for="email" class="form-label fw-bold mt-3">E-Mail</label>
          <input type="email" name="email" id="email" class="form-control" value="{{ old('email', Auth::user()->email) }}">
          @error('email')
              <p class="text-warning small">{{ $message }}</p>
          @enderror

          <label for="intro" class="form-label fw-bold mt-3">Introduction</label>
          <textarea name="introduction" id="intro" rows="3" class="form-control">{{ old('introduction', Auth::user()->introduction) }}</textarea>
          @error('introduction')
              <p class="text-warning small">{{ $message }}</p>
          @enderror

          <button type="submit" class="btn btn-warning mt-3 px-5">Save</button>

        </form>

        <form action="{{ route('profile.updatePassword') }}" method="post" class="shadow bg-white rounded-3 p-5">
          @csrf
          @method('PATCH')
          @if (session('change_success'))
              <p class="mb-0 text-success fw-bold h5">{{ session('change_success') }}</p>
          @endif
          <div class="h2 text-secondary">Updated Password</div>
          <label for="old-password" class="form-label fw-bold">Old Password</label>
          <input type="password" name="old_password" id="old_password" class="form-control">
          @if (session('old_password_error'))
            <p class="mb-0 text-danger small">{{ session('old_password_error') }}</p>
          @endif

          <label for="new-password" class="form-label fw-bold mt-3">New Password</label>
          <input type="password" name="new_password" id="new_password" class="form-control">

          <label for="confirm-new" class="form-label mt-3">Confrim New Password</label>
          <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control">
          @if (session('same_password_error'))
          <p class="mb-0 text-danger small">{{ session('same_password_error') }}</p>
          @endif
          <button type="submit" class="btn btn-warning mt-3 px-5">Update Password</button>
          @error('new_password')
          <p class="mb-0 text-danger small">{{ $message }}</p>
          @enderror

        </form>
      </div>
    </div>
@endsection