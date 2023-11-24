<div class="modal fade" id="categoryCreateModal" tabindex="-1" role="dialog" aria-labelledby="categoryCreateModal"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="categoryCreateModalLabel">Create Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('product-categories.store') }}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label for="category_code">Category Code <span class="text-danger">*</span></label>
            <input class="form-control" type="text" name="category_code" required>
          </div>
          <div class="form-group">
            <label for="category_name">Category Name <span class="text-danger">*</span></label>
            <input class="form-control" type="text" name="category_name" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Create <i class="bi bi-plus"></i></button>
        </div>
      </form>
    </div>
  </div>
</div>
