@extends('layouts.app')

@section('title', 'Admin: Posts')

@section('content')
    <form action="{{ route('admin.posts') }}" method="get">
      <input type="text" name="search" placeholder="search for posts" class="form-control from-control-sm mb-3 w-auto ms-auto" value="{{ old('search') }}">
    </form>

  <table class="table table-hover border text-secondary bg-white align-middle">
    <thead class="table-primary text-secondary small text-uppercase">
      <tr>
        <th></th>
        <th></th>
        <th>CATEGORY</th>
        <th>OWNER</th>
        <th>CREATED AT</th>
        <th>STATUS</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @forelse ($all_posts as $post)
        <tr>
          <td class="text-end">{{ $post->id }}</td>
          <td>
            @if($post->image)
              <img src="{{ $post->image }}" alt="User Image" class="image-lg d-block mx-auto">
            @endif
          </td>
          <td>
            @forelse ($post->categoryPosts as $category_post)
              <div class="badge bg-secondary bg-opacity-50">
                {{ $category_post->category->name }} 
              </div>
            @empty
              <div class="text-secondary">Uncategorized</div>
            @endforelse
          </td>
          <td class="fw-bold text-dark">{{ $post->user->name }}</td>
          <td>{{ $post->created_at }}</td>
          <td>
            @if ($post->trashed())
              <i class="fa-solid fa-circle-minus text primary"></i> idden
            @else
              <i class="fa-solid fa-circle text-primary"></i> Visible
            @endif
          </td>
          <td>
            @if ($post->id != Auth::user()->id)
              <div class="dropdown">
                <button class="btn btn-sm" data-bs-toggle="dropdown">
                  <i class="fa-solid fa-ellipsis"></i>
                </button>              
                <div class="dropdown-menu">
                  @if($post->trashed())
                    {{-- visible --}}
                    <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#visible-post{{ $post->id }}">
                      <i class="fa-solid fa-eye"></i> Unhide Post {{ $post->id }}
                    </button>
                  @else
                    <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#hide-post{{ $post->id }}">
                      <i class="fa-solid fa-eye-slash"></i> Hide Post {{ $post->id }}
                    </button>
                  @endif
                </div>
              </div>

              @include('admin.posts.status')
            @endif
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="7" class="text-center">No posts available</td>
        </tr>
      @endforelse
    </tbody>
  </table>
  {{ $all_posts->links() }}
@endsection
