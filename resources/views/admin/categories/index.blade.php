@extends('layouts.app')

@section('title', 'Admin: Categories')

@section('content')
<form action="{{ route('admin.categories.store') }}" method="post">
  @csrf
  <div class="row gx-2">
    <div class="col-4 mb-5">
      <input type="text" name="new_category" id="new_category" class="form-control" placeholder="Add a category...">
      @error('new_category')
      <p class="text-danger small">{{ $message }}</p>
      @enderror
    </div>
    <div class="col">
      <button type="submit" class="btn btn-primary">
        + Add
      </button>    
    </div>
  </div>
</form>

<table class="table table-hover border text-secondary bg-white align-middle">
  <thead class="table-warning text-secondary small text-uppercase">
    <tr>
      <th>#</th>
      <th>Name</th>
      <th>Count</th>
      <th>Last Updated</th>
      <td></td>
      <td></td>
    </tr>
  </thead>
  <tbody>
    @forelse($all_categories as $category)
      <tr>
        <td class="text-center">{{ $category->id }}</td>
        <td>
          @if(!$category->name)
            <div class="text-secondary">Uncategorized</div>
          @else
            {{ $category->name }}
          @endif
        </td>
        <td>{{ $category->categoryPosts->count() }}</td>
        <td>{{ $category->updated_at }}</td>
        <td class="text-end">
          <button class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#edit-category{{ $category->id }}">
            <i class="fa-solid fa-pencil"></i>            
          </button>
          @include('admin.categories.edit')
        </td>
        <td>
          <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete-category{{ $category->id }}">
            <i class="fa-solid fa-trash-can"></i>
          </button>
          @include('admin.categories.delete')
        </td>
      </tr>
    @empty
      <tr>
        <td colspan="5" class="text-center">No categories found</td>
      </tr>
    @endforelse
    <tr>
        <td>0</td>
        <td>Uncategorized</td>
        <td>{{ $uncategorized_count }}</td>
        <td colspan="2"></td>
    </tr>
  </tbody>
</table>
{{ $all_categories->links() }}
@endsection
