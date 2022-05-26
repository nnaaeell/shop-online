@extends('layouts.app')

@section('content')

   <center> <h1 class="text-primary">{{$catName}}</h1></center>
   <hr width="100%">
   <center><div class="row mt-3">
   @foreach($catProducts as $product)
   <div class="card col-sm-5 bg-info text-light mb-4 mt-4 mx-5">
       <div class="card-body">
         <h4 class="card-title">Product name: {{$product->name}}</h4>
         <p class="card-text">Category: {{$product->category_id}}</p>
         <p class="card-text">Price: {{$product->price}}</p>
         <p class="card-text">Description: {{$product->desc}}</p>
         
       </div>
     </div>
   @endforeach
</div>
</center>
@endsection
