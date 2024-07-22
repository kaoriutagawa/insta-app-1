<div class="row">
  <div class="col-auto">
    {{-- like/heart button --}}
    @if($post->isLiked())
      {{-- red heart --}}
      <form action="{{ route('like.destroy', $post->id) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="border-0 bg-transparent shadow-none p-0">
          <i class="fa-solid fa-heart text-danger"></i>
        </button>
      </form>
   
    @else
      <form action="{{ route('like.store', $post->id) }}" method="post">
        @csrf
        <button type="submit" class="border-0 bg-transparent shadow-none p-0">
          <i class="fa-regular fa-heart"></i>
        </button>
      </form>
    @endif
  </div>
  <div class="col-auto px-0">
    {{-- number of likes --}}
    <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#likes-post{{ $post->id }}">
      {{ $post->likes->count() }} 
    </button>
    @include('user.posts.contents.modals.likes')
  </div>
  <div class="col text-end">
    {{-- categories --}}
    @forelse ($post->categoryPosts as $category_post)
    <div class="badge bg-secondary bg-opacity-50">
        {{ $category_post->category->name }}      
    </div>

    @empty
      <div class="badge bg-dark">Uncategorized</div>
    @endforelse
  </div>
</div>

{{-- post owner nand decription --}}
<a href="{{ route('profile.show', $post->user_id) }}" class="text-decoration-none fw-bold text-dark">{{ $post->user->name }}</a>
&nbsp;
<span class="fw-light">{{ $post->description }}</span>
<p class="text-uppercase text-muted xsmall">{{ date('M d, Y', strtotime($post->created_at)) }}</p>