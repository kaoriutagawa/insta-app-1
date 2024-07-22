<div class="modal fade" id="recent-comments-{{ $user->id }}" >
  <div class="modal-dialog">
    <div class="modal-content h-50">
      <div class="modal-header">
        <h5 class="modal-title">Recent Comments</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          @foreach($user->commentsToPosts->take(5) as $comment)
            <div class="mb-2 border border-primary rounded-3 p-2">
              <p>{{ $comment->body }}</p>
              <hr>
              <span class="text-muted small">Replied to </span>
              <a href="{{ route('post.show', $comment->post_id) }}" class="text-decoration-none text-primary">{{ $comment->post->user->name }}'s Post</a>
            </div>
          @endforeach
      </div>
    </div>
  </div>
</div>
