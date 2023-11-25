@if ($data->payment_method == 'cash')
  <span class="badge badge-success">
    {{ $data->payment_method }}
  </span>
@else
  <span class="badge badge-info">
    {{ $data->payment_method }}
  </span>
@endif
