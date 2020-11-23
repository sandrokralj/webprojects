@extends('layouts')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Deal
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('deals.update', $deal->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="name">deals Name:</label>
          <input type="text" class="form-control" name="deal_name" value={{ $deal->deal_name }} />
        </div>
        <div class="form-group">
          <label for="price">deal Price :</label>
          <input type="text" class="form-control" name="deal_price" value={{ $deal->deal_price }} />
        </div>
        <div class="form-group">
          <label for="quantity">deal Quantity:</label>
          <input type="text" class="form-control" name="deal_qty" value={{ $deal->deal_qty }} />
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection