<div class="modal fade" id="edit-category{{ $category->id }}">
  <div class="modal-dialog">
    <div class="modal-content border-warning">
      <div class="modal-header">
        <h3 class="h5"><i class="fa-solid fa-pen-to-square"></i>Edit Category</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('admin.categories.update', $category->id) }}" method="post">
        <div class="modal-body text-start">

          @csrf
          @method('PATCH')
          <input type="text" name="name{{ $category->id }}" id="" value="{{ $category->name }}" class="form-control">
          @error('name'.$category->id)
              <p class="text-danger small">{{ $message }}</p>
          @enderror
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-outline-warning" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-sm btn-warning">Update</button>          
        </div>
      </form>
    </div>
  </div>
</div>
