@extends('layouts.app')

@section('content')

    <div class="col-3"></div>

    <div class="col-9">
       <a href="{{route('home')}}" class="pr-2"><i class="fa fa-plus-square ml-2 mb-2" style="font-size:35px;color:rgb(220,20,60) " aria-hidden="true"><span style="font-size:25px;color:rgb(220,20,60) "> Ajouter un autre produit </span> </i></a>

        <table class="table table-hover">
                <thead>
                        <tr>
                            <th scope="col-1">#</th>
                            <th scope="col-1">Title</th>
                            <th scope="col-2">Image</th>
                            <th scope="col-2">Qté</th>
                            <th scope="col-1">Price</th>
                            <th scope="col-3">Total</th>
                            
                        </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)
                        <tr class=>
                            <th scope="row" class=" pt-4">{{ $item->id}}</th>
                            <td class=" pt-4">{{ $item->name->title}}</td>
                            <td><img src="{{ URL::asset($item->name->image)}}" style="width: 60px; height: 80px;"class="img-fluid rounded "></td>
                            <td class=" pt-4"> 
                                <form method="POST" action="{{route('cart.update',$item->id)}}"> 
                                    @csrf
                                    @method("Put")
                                   
                                    <input type="number" name="qty" class="rounded-left" max={{ $item->name->instock}} min=0 value={{(float) $item->quantity}}>
                                    <button type="submit" class="btn btn-warning "> 
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </td>
                            <td class=" pt-4">{{ (float) $item->price}}</td>
                            <td class=" pt-4">
                                
                                <form method="POST" action="{{route('cart.delete',$item->id)}}"> 
                                    @csrf
                                    @method("DELETE")
                                    {{ $item->quantity * $item->price}} 
                                    <button type="submit" class="btn btn-danger "> <i class="fa fa-trash"></i></button>
                                </form>
                                </td>
                        </tr>
                    @endforeach
                        <tr class="table-light font-weight-bold">
                            <td colspan="5">Prix Total:</td>
                            <td >{{\Cart::getSubTotal()}} DH</td>
                        </tr>
                </tbody>
        </table>
        <div class="row">
                <div class="col-3">
                <form method="GET" action="{{route('cart.payer')}}"> 
                    @csrf    
                    <button type="submit" class="btn btn-l btn-secondary" > <i class="fa fa-paypal" aria-hidden="true"></i> payer par paypal</button>
                </form>
            </div>
            <div class="col-3">
                <form method="GET" action="{{route('cart.livr')}}"> 
                    @csrf 
                    <button type="submit" class="btn btn-l btn-secondary ml-3" ><i class="fa fa-handshake-o" aria-hidden="true"></i> payer Livraison</button>
                </form>
            </div>
        </div>
    </div>
@endsection