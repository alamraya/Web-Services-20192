@extends('layouts.front')

@section('content')
{{-- <div class="container">
    <h2>Products</h2>
    <div class="row">
        @foreach ($allProducts as $product)
        <div class="col-4">
            <div class="card">
                <img class="card-img-top" src="{{asset('img\products\product-1.jpg')}}" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title">{{$product->name}}</h4>
                    <p class="card-text">{{$product->description}}</p>
                    <h3>Rp. {{$product->price}}</h3>
                </div>
                <div class="card-body">
                <a href="{{route('cart.add', $product->id)}}" class="card-link">Add to cart</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div> --}}

<div class="product-slider owl-carousel">
    @foreach ($allProducts as $product)
    <div class="product-item">
        <div class="pi-pic">
            <img src="{{asset('assets/img/products/women-1.jpg')}}" alt="">
            {{-- <img src="{{$product->cover_img}}" alt=""> --}}
            <div class="sale">Sale</div>
            <div class="icon">
                <i class="icon_heart_alt"></i>
            </div>
            <ul>
                <li class="w-icon active"><a href="{{route('cart.add', $product->id)}}"><i class="icon_bag_alt"></i></a></li>
                <li class="quick-view"><a href="#">+ Quick View</a></li>
            </ul>
        </div>
        <div class="pi-text">
            <div class="catagory-name">Coat</div>
            <a href="#">
                <h5>{{$product->name}}</h5>
            </a>
            <div class="product-price">
                ${{$product->price}}
                <span>$35.00</span>
            </div>
        </div>
    </div>
    @endforeach

</div>


@endsection
