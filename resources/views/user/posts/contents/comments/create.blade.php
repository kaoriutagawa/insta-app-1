<form action="{{ route('comment.store', $post->id) }}" method="post">
  @csrf
  <div class="input-group">
    <textarea name="comment_body{{ $post->id }}" id="" rows="1" class="form-control form-control-sm" placeholder="write a comment">{{ old('comment_body'.$post->id) }}</textarea>
    @error('comment_body')
    <p class="mb-0 text-danger samll">{{ $message }}</p>
    @enderror
    <input type="submit" value="Post" class="btn btn-sm btn-outline-secondary">
  </div>

</form>