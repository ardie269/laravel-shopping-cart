<!-- shop.blade.php -->

@extends('layouts.app')

@section('content')
 <div class="container" style="margin-top: 80px">
 	<nav aria-label="breadcrumb">
	    <ol class="breadcrumb">
	        <li class="breadcrumb-item"><a href="/">Home</a></li>
	        <li class="breadcrumb-item active" aria-current="page">Shop</li>
	    </ol>
    </nav>
    <div class="row justify-content-center">
    	<div class="col-lg-12">
		    <div class="row">
                <div class="col-lg-7">
                    <h4>List of Products</h4>
                </div>
            </div>
            <hr>
            <div class="row">
            	@foreach($products as $pro)
            	<div class="col-lg-3">
            		<div class="card" style="margin-bottom: 20px; height: auto;">
            			 <img src="/images/{{ $pro->image_path }}"
                                     class="card-img-top mx-auto"
                                     style="height: 150px; width: 150px;display: block;"
                                     alt="{{ $pro->image_path }}"/>
                         <div class="card-body" align="center">
                         	<a href="">
                                <h6 class="card-title">{{ $pro->product_name }}</h6>
                            </a>
                         	<p> Rp. {{ number_format ($pro->price, 2) }} </p>
                         	<form action="{{ route('cart.store') }}" method="POST">
                         		{{ csrf_field() }}
                                {{ method_field('PUT') }}
                         		<input type="hidden" value="{{ $pro->id_product }}" id="id_product" name="id_product">
                         		<input type="hidden" value="{{ $pro->product_name }}" id="product_name" name="product_name">
                         		<input type="hidden" value="{{ $pro->price }}" id="price" name="price">
                                <input type="hidden" value="{{ $pro->image_path }}" id="img" name="img">
                                <input type="hidden" value="{{ $pro->slug }}" id="slug" name="slug">
                                <input type="hidden" value="1" id="quantity" name="quantity">
                                <div class="card-footer" style="background-color: white;">
                                	<div class="row">
                                		<button class="btn btn-info btn-sm" class="tooltip-test" title="add to cart">
                                			<i class="fa fa-shopping-cart"></i> Tambah ke Keranjang
                                		</button>
                                	</div>
                                </div>
                         	</form>	
                         </div>
            		</div>
            	</div>
                <hr>
            	@endforeach
            </div>
    	</div>
    </div>
 </div>


@endsection
