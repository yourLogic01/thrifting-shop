<div>
  <div class="form-row">
    <div class="col-md-7">
      <div class="form-group">
        <label>Product Category</label>
        <select wire:model.live="category" class="form-control">
          <option value="">All Products</option>
          @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="col-md-5">
      <div class="form-group">
        <label>Product Count</label>
        <select wire:model.live="showCount" class="form-control">
          <option value="6">6 Products</option>
          <option value="12">12 Products</option>
          <option value="24">24 Products</option>
          <option value="50">50 Products</option>
          <option value="">All Products</option>
        </select>
      </div>
    </div>
  </div>
</div>
