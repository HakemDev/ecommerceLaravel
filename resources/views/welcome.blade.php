@extends('layouts.app')

@section('content')

        <div class="row">
            <div class="col-3 p-1">
                <div class="card" style="width: 18rem;">
                    <div class="card-header border">
                        Categories:
                    </div>
                    <ul class="list-group  ">
                        @foreach($cats as $cat)
                        <li class="list-group-item d-flex justify-content-between align-items-center ">
                            <a href="{{route('show2.product',$cat->id)}}">
                                {{$cat->title}} 
                                <span class="badge badge-primary badge-pill">{{$cat->product->count()}}</span>
                            </a></li>
                        @endforeach
                    </ul>
                    <div class="card-header border">
                        Prix:
                    </div>
                    <ul class="list-group  ">
                        @foreach($cats as $cat)
                        <li class="list-group-item d-flex justify-content-between align-items-center ">
                            <a href="{{route('show2.product',$cat->id)}}">
                                {{$cat->title}} 
                                <span class="badge badge-primary badge-pill">{{$cat->product->count()}}</span>
                            </a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-9">  
                
                <div class="row col-12">
                    @foreach($produit as $product)  
                    <div class="card col-4   mb-2" style="width: 75%; height:auto">
                        
                        <img src="{{URL::asset($product->image)}}"
                            class="card-img-top" style="width: 250px; height: 370px;" alt="...">
                                <div class="card-body d-flex justify-content-between flex-column">
                                <h5 class="card-title d-flex justify-content-center">{{ $product->title }}</h5>
                                <p class="card-text d-flex justify-content-center"> {{Str::limit( $product->description ,20)}}, </p>
                                <p class="text-succes">
                                    <span class="float-left font-weight-bold text-success">
                                    <bold> Price: {{$product->price}} </bold> DH
                                    </span>
                                    <span class="float-right text-danger">
                                        old price: <strike> {{$product->old_price}} </strike> DH
                                    </span>
                                </p>
                                
                                    <a href="{{route('cart.index',$product->id)}}"
                                        class="d-flex justify-content-left " 
                                        style="text-decoration:none;">  
                                        <i class="fa fa-cart-plus fa-2x"></i>
                                    </a>
                                
                            </div>
                    </div>
                    @endforeach
                    
                    
                </div>  
                        
                        
            </div>

        </div>
        @if($acces != 0)
            <div class="d-flex justify-content-center">   {{ $produit->links() }}</div>
        @endif
        @endsection

