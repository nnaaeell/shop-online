@extends('layouts.app')

@section('content')
<div class="container">

<!-- Button to Open the Modal -->
<center><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
  ADD TO CART
</button>
</center>
<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Cart</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="{{ route('UploadData') }}" method="POST">
            @csrf

            <div class="mb-3 mt-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Value:</label>
                <input type="number" class="form-control" id="price" placeholder="Enter Value" name="price">
            </div>

            <button type="submit" class="btn btn-primary">Add</button>
            <br>
            <br>
            <div class="row mt-3">

                @foreach($carts as $cart)
                <div class="card col-sm-5 bg-info text-light mb-4 mt-4" style="margin-left: 60px;">
                    <div class="card-body">
                      <h4 class="card-title">Name: {{$cart->name}}</h4>
                      <p class="card-text">Value: {{$cart->price}}</p>
                    </div>
                  </div>
                @endforeach
                <br>
                <hr width="100%">
                <center>
                    <div class="d-flex align-items-center justify-content-evenly">
                        <p class="m-0 me-5">Total price: {{$total}}</p>
                        <button class="btn btn-lg btn-primary">Buy</button>
                    </div>
                </center>
            
            </div>
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>




</div>
@endsection
