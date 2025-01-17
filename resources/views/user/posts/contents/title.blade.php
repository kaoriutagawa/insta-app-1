<div class="card-header bg-white py-3">
  <div class="row align-items-center">
    <div class="col-auto">
      {{-- icon/avatar --}}
      <a href="{{ route('profile.show', $post->user_id) }}">
        @if($post->user->avatar)
          <img src="{{ $post->user->avatar }}" alt="" class="rounded-circle avatar-sm">
        @else
         <i class="fa-solid fa-circle-user icon-sm text-secondary"></i>
        @endif

      </a>
    </div>
    <div class="col ps-0">
      {{-- post owner --}}
      <a href="{{ route('profile.show', $post->user_id) }}" class="text-decoration-none text-dark">
        {{ $post->user->name }}
      </a>
    </div>
    <div class="col-auto">
      <div class="dropdown">
        <button class="btn btn-sm" data-bs-toggle="dropdown">
          <i class="fa-solid fa-ellipsis"></i>
        </button>

        @if ($post->user_id == Auth::user()->id)
          {{-- edit/delete --}}
          <div class="dropdown-menu">
            <a href="{{ route('post.edit', $post->id) }}" class="dropdown-item">
              <i class="fa-regular fa-pen-to-square"></i> Edit
            </a>
            {{-- delete --}}
            <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#delete-post{{ $post->id }}">
              <i class="fa-regular fa-trash-can"></i> Delete
            </button>
          </div>
            @include('user.posts.contents.modals.delete')
          @else
          {{-- unfollow --}}
          <div class="dropdown-menu">
            @if ($post->user->isFollowing())
              <form action="{{ route('follow.destroy', $post->user_id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="dropdown-item text-danger">Unfollow</button>
              </form>
            @else
              <form action="{{ route('follow.store', $post->user_id) }}" method="post">
                @csrf
                <button type="submit" class="dropdown-items text-primary">Follow</button>
              </form>           
            @endif

         </div>
        @endif
      </div>
    </div>    
  </div>

</div>