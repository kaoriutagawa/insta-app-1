@if(!$post->trashed())
<div class="modal fade" id="hide-post{{ $post->id }}">
  <div class="modal-dialog">
    <div class="modal-content border-danger">
      <div class="modal-header border-danger">
        <h3 class="h4 text-danger">
          <i class="fa-solid fa-eye-slash"></i> Hide Post
        </h3>
      </div>
      <div class="modal-body">
        Are you sure you want to hide this post ?
        <br>
        @if($post->image)
          <img src="{{ $post->image }}" alt="" class="image-lg d-block">
          {{ $post->description }}
        @else
         <i class="fa-solid fa-image icon-sm align-middle"></i>
          
        @endif
      </div>
      <div class="modal-footer border-0">
        <form action="{{ route('admin.posts.hide', $post->id) }}" method="post">
          @csrf
          @method('DELETE')
          <button type="button" data-bs-dismiss="modal" class="btn btn-sm btn-outline-danger">Cancel</button>
          <button type="submit" class="btn btn-sm btn-danger">Hide</button>
        </form>
      </div>
    </div>
  </div>
</div>

@else
{{-- visible --}}
<div class="modal fade" id="visible-post{{ $post->id }}">
  <div class="modal-dialog">
    <div class="modal-content border-primary">
      <div class="modal-header border-primary">
        <h3 class="h4 text-primary">
          <i class="fa-solid fa-eye-slash"></i> Unhide Post
        </h3>
      </div>
      <div class="modal-body">
        Are you sure you want to unhide this post ?
        <br>
        @if($post->image)
          <img src="{{ $post->image }}" alt="" class="image-lg d-block">
          {{ $post->description }}
        @else
         <i class="fa-solid fa-image icon-sm align-middle"></i>
          
        @endif
      </div>
      <div class="modal-footer border-0">
        <form action="{{ route('admin.posts.visible', $post->id) }}" method="post">
          @csrf
          @method('PATCH')
          <button type="button" data-bs-dismiss="modal" class="btn btn-sm btn-outline-primary">Cancel</button>
          <button type="submit" class="btn btn-sm btn-primary">Unhide</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endif