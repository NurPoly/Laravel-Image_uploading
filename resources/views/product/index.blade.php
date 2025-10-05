@extends('layout')
@section('content')
    <div class="container">
        <h3 align="center" class="mt-5">Products</h3>
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">

            <div class="form-area">
                <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label>Product Name</label>
                            <input type="text" class="form-control" name="productname">
                        </div>
                      

                        <div class="col-md-6">
                            <label>Description</label>
                            <input type="text" class="form-control" name="description">
                        </div>

                        <div class="col-md-6">
                            <label>Price</label>
                            <input type="text" class="form-control" name="price">
                        </div>

              
                        <div class="col-md-6">
                            <label>Image</label>
                            <input class="form-control" name="photo" type="file" id="photo">
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <input type="submit" class="btn btn-primary" value="Register">
                        </div>
                    </div>
                </form>



            </div>


                <table class="table mt-5">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product Name</th>
                
                        <th scope="col">Price</th>
                        <th scope="col">Image</th>
               
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ( $products as $key => $product )
                        <tr>
                            <td scope="col">{{ ++$key }}</td>
                            <td scope="col">{{ $product->productname }}</td>                            
                            <td scope="col">{{ $product->price }}</td>
                            <td scope="col">
                            @if ($product->photo)
                                    <img src="{{ asset('images/' . $product->photo) }}" alt="Product Image" width="100">
                                @else
                                    <img src="{{ asset('images/default.jpg') }}" alt="Default Image" width="100">
                                @endif
                            </td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
@endsection
@push('css')
    <style>
        .form-area{
            padding: 20px;
            margin-top: 20px;
            background-color: #FFFF00;
        }
        .bi-trash-fill{
            color:red;
            font-size: 18px;
        }
        .bi-pencil{
            color:green;
            font-size: 18px;
            margin-left: 20px;
        }
    </style>
@endpush