@extends('layouts')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add Deal
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
      <form method="post" action="{{ route('deals.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Deal Name:</label>
              <input type="text" class="form-control" name="deal_name"/>
          </div>
          <div class="form-group">
              <label for="price">Deals Price :</label>
              <input type="text" class="form-control" name="deal_price"/>
          </div>
          <div class="form-group">
              <label for="quantity">Deals Quantity:</label>
              <input type="text" class="form-control" name="deal_qty"/>
          </div>
          <button type="submit" class="btn btn-primary">Add</button>
      </form>
  </div>
</div>
@endsection