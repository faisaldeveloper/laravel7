@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="{{ asset('images/pdt-categories.png') }}" width="225" alt="Categories">
      <div class="caption">
        <h3>Categories</h3>
        <p>View the list of product categories</p>
        <p><a href="{{ url('/allcategories') }}" class="btn btn-primary" role="button">Categories</a>
      </div>
    </div>
  </div>

  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="{{ asset('images/products.jpeg') }}" alt="Products">
      <div class="caption">
        <h3>Products</h3>
        <p>View the list of products</p>
        <p><a href="{{ url('/allproducts') }}" class="btn btn-primary" role="button">Product listing</a>
      </div>
    </div>
  </div>
</div>




</div>
@endsection
