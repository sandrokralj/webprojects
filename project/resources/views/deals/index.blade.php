@extends('layouts')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Deal Name</td>
          <td>Deal Price</td>
          <td>Deal Quantity</td>
        </tr>
    </thead>
    <tbody>
        @foreach($deals as $deal)
        <tr>
            <td>{{$deal->id}}</td>
            <td>{{$deal->deal_name}}</td>
            <td>{{$deal->deal_price}}</td>
            <td>{{$deal->deal_qty}}</td>
            <td><a href="{{ route('deals.edit',$deal->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('deals.destroy', $deal->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection