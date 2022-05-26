@extends('layouts.app')

@section('content')
<div class="container">

<!-- Button to Open the Modal -->
<center><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
  ADD Product
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
                <label for="desc" class="form-label">Description:</label>
                <input type="text" class="form-control" id="desc" placeholder="Enter Description" name="desc">
            </div>
            <div class="mb-3">
                <label for="num" class="form-label">Price:</label>
                <input type="number" class="form-control" id="num" placeholder="Enter Price" name="num">
            </div>
            <div class="mb-3">
              <label for="cat" class="form-label">Choose a category:</label>
              <select class="form-control" name="cat" id="cat">
                @foreach($cats as $cat)
                <option>{{$cat->name}}</option>
                @endforeach
              </select>
            </div>

            <div class="mb-3">
              <label for="img" class="form-label">Price:</label>
              <input type="file" class="form-control" id="img" placeholder="Enter img" name="img" required>
            </div>

            <br>
            <center><button type="submit" class="btn btn-primary">Add</button></center>
 

        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>


<center><div class="row mt-3">

  @foreach($products as $product)
  <div class="card col-sm-5 bg-info text-light mb-4 mt-4 ms-5">
      <div class="card-body">
        <h4 class="card-title">Product name: {{$product->name}}</h4>
        <p class="card-text">Category: {{$product->category_id}}</p>
        <p class="card-text">Price: {{$product->price}}</p>
        <p class="card-text">Description: {{$product->desc}}</p>
        
      </div>
    </div>
  @endforeach


</div></center>

</div>
@endsection
