@extends('dashboard.layouts.master')

@section('title','Tambah Produk')

@section('nama_halaman','Tambah Produk')

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
                        <img src="{{asset('admin/assets/img/theme/team-4-800x800.jpg')}}" class="rounded-circle">
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
                        </div>
                        </div>
                    </div>
                <div class="text-center">
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
            <div class="card-body">
            <form role="form" action="{{route('post_dataproduk')}}" method="POST">
                @csrf
                <h6 class="heading-small text-muted mb-4">INFORMASI PRODUK</h6>
                    <div class="pl-lg-4">

                    <div class="row">
                        <div class="col-lg-6">
                        <div class="form-group focused">
                            <label class="form-control-label" for="name_produk-city">Nama Produk</label>
                            <input type="text" name="name" id="name_produk" class="form-control form-control-alternative" placeholder="nama produk" value="" required>
                        </div>
                        </div>
                        <div class="col-lg-6">
                        <div class="form-group focused">
                            <label class="form-control-label" for="input-price">Harga</label>
                            <input type="text" name="price" id="input-price" class="form-control form-control-alternative" placeholder="ex. 80000" value="" required>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group focused">
                                <label class="form-control-label" for="input-stock">Stock</label>
                                <input type="number" min="0" name="stock" id="input-stock" class="form-control form-control-alternative" placeholder="0" value="" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group focused">
                                <label class="form-control-label" for="category">Category</label>
                                <select class="form-control" name="category_id" id="category" required>
                                    @foreach ( $categories->ChildCategory as $category )
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group focused">
                                <input type="text" name="cover_img" id="cover_img" class="form-control form-control-alternative mb-5" placeholder=".jpg .png .jpeg" value="" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <button type="button" class="btn btn-secondary btn-sm mt-3">
                                Upload Image
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group focused">
                            <label class="form-control-label" for="input-description">Deskripsi Produk</label>
                        <textarea rows="10" name="description" class="form-control form-control-alternative" placeholder="" value="" required></textarea>
                        </div>
                        </div>
                    </div>
                    </div>
                    <hr class="my-4">
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary my-4">Tambah</button>
                    </div>
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
