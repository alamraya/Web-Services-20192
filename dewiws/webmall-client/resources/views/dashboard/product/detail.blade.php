@extends('dashboard.layouts.master')

@section('title','Data Produk')

@section('nama_halaman','Detail Data Produk')

@section('content')
<button type="button" class="btn btn-secondary btn-sm mt--5" onclick="window.location='{{ url('products_dashboard') }}'"><i class="ni ni-bold-left"></i> Kembali</button>
<!-- Header -->
<div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 35%; background-image: url({{asset('admin/assets/img/theme/profile-cover.jpg')}}); background-size: cover; background-position: center top;">
    <!-- Mask -->

    <span class="mask bg-gradient-default opacity-8"></span>
</div>

    <!-- Page content -->
    <div class="container-fluid mt--9">

    <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
        <div class="card card-profile shadow">
            <div class="row justify-content-center">
            <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                <a href="#">
                    <img src="{{$product->data->cover_img}}" class="rounded-circle">
                </a>
                </div>
            </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
            </div>
            <div class="card-body pt-0 pt-md-4">
            <div class="row">
                <div class="col">
                <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                    <div>
                    <span class="heading">{{$product->data->stock}}</span>
                    <span class="description">Tersedia</span>
                    </div>
                    <div>
                        <span class="heading">5</span>
                        <span class="description">Terjual</span>
                    </div>
                </div>
                </div>
            </div>
            <div class="text-center">
                <h3>
                {{$product->data->name}}
                </h3>
                <div class="h5 font-weight-300">
                <i class="ni location_pin mr-2"></i>Category
                </div>
                <div>
                <i class="ni education_hat mr-2"></i>Shop Name
                </div>
                <hr class="my-4" />
            </div>
            </div>
        </div>
        </div>
        <div class="col-xl-8 order-xl-1">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
            <div class="row align-items-center">
                <div class="col-8">
                <h3 class="mb-0">{{$product->data->name}}</h3>
                </div>
                <div class="col-4 text-right">
                <a href="{{url('products_dashboard/'.$product->data->id.'/update')}}" class="btn btn-sm btn-primary">Update Detail Produk</a>
                </div>
            </div>
            </div>
            <div class="card-body">
            <form>
                <h6 class="heading-small text-muted mb-4">INFORMASI PRODUK</h6>
                    <div class="pl-lg-4">

                    <div class="row">
                        <div class="col-lg-6">
                        <div class="form-group focused">
                            <label class="form-control-label" for="name_produk-city">Nama Produk</label>
                        <input type="text" name="name" id="name_produk" class="form-control form-control-alternative" placeholder="" value="{{$product->data->name}}" disabled>
                        </div>
                        </div>
                        <div class="col-lg-6">
                        <div class="form-group focused">
                            <label class="form-control-label" for="input-price">Harga</label>
                        <input type="text" name="price" id="input-price" class="form-control form-control-alternative" placeholder="" value="$ {{$product->data->price}}" disabled>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group focused">
                            <label class="form-control-label" for="input-description">Deskripsi Produk</label>
                        <input rows="4" name="description" class="form-control form-control-alternative" placeholder="" value="{{$product->data->description}}" disabled>
                        </div>
                        </div>
                    </div>
                    </div>
                    <hr class="my-4">
                </div>
            </div>

            </div>
                </div>
            </form>
            </div>
        </div>
        </div>
    </div>
@endsection
