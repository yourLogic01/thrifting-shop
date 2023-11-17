<a href="/" class="btn btn-info btn-sm">
  <i class="bi bi-pencil"></i>
</a>

<a href="/" class="btn btn-primary btn-sm">
  <i class="bi bi-eye"></i>
</a>

<button id="delete" class="btn btn-danger btn-sm"
  onclick="
    event.preventDefault();
    if (confirm('Are you sure? It will delete the data permanently!')) {
        document.getElementById('destroy{{ $data->id }}').submit()
    }
    ">
  <i class="bi bi-trash"></i>
  <form id="#" class="d-none" action="/" method="POST">
    @csrf
    @method('delete')
  </form>
</button>
