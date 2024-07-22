<div class="modal fade" id="delete-category{{ $category->id }}">
  <div class="modal-dialog">
    <div class="modal-content border-danger">
      <div class="modal-header">
        <h3 class="h5 text-danger"><i class="fa-regular i fa-trash-can"></i>Delete Category</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-start">
        <p>Are you sure you want to delete <span class="text-bold">{{ $category->name }}</span>?</p>
        <p>This action will affect all the posts under this category. Posts without a category will fall under Uncategorized.</p>
      </div>
      <div class="modal-footer border-0">
        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="post">
          @csrf
          @method('DELETE')
          <button type="button" class="btn btn-sm btn-outline-danger" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-sm btn-danger">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>
