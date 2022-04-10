@extends('layouts.app')

@section('content')
    <div class="row">
     
        <div class="card col-4  p-2 m-1 mb-2">
            <div >
                <img src="{{URL::asset($product->image)}}" class="card-img-top  ml-5"   style="width: 250px; height: 370px;" alt="...">
            </div>
            <div class="card-body d-flex justify-content-between flex-column">
                <h5 class="card-title d-flex justify-content-center">{{ $product->title }}</h5>
                <p class="card-text d-flex justify-content-center"> {{ $product->description}}, </p>
                <p class="text-succes">
                    <span class="float-left text-success font-weight-bold">
                    <bold> Price: {{$product->price}} </bold> DH
                    </span>
                    <span class="float-right text-danger">
                    old price: <strike>{{$product->old_price}} </strike> DH
                    </span>
                </p>
            </div>
        </div>
        <div class="col-2"></div>
        <div class="col-3 p-3 mr-3">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <form method="POST" action="{{route('cart.add',$product->id)}}"> 
                        @csrf
                        @method("POST")
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class=" fa fa-briefcase " aria-hidden="true"></i></span>
                            </div>
                            <input type="number" name="qty" class="form-control" placeholder="Quantité" 
                                aria-label="Username" max={{ $product->instock }} min=0
                                aria-describedby="basic-addon1">
                            </div>
                            <button type="submit" class="btn btn-primary d-flex justify-content-center bg-dark w-100">Ajouter Au Panier</button>
                           
                           
                        </div>
                    </form> 
            </div>
        </div>
    </div>
@endsection