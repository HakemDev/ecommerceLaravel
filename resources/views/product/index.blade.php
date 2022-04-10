@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-3 mt-5">
    @include('slide')
    </div>
    <div class="col-9">
        <a href="{{route('add1.product')}}"><i class="fa fa-plus-square" style="font-size:35px;color:rgb(220,20,60) " aria-hidden="true"></i></a>
        <table class="table table-hover">
                <thead>
                    <tr class="bg-light">
                        <th scope="col" >#</th>
                        <th class="col-2"  style=" text-align: center;">title</th>
                        <th class="col-2"  style=" text-align: center;">price</th>
                        <th class="col-2"  style=" text-align: center;">old_price</th>
                        <th class="col-1"  style=" text-align: center;">instock</th>
                        <th class="col-2"  style=" text-align: center;">image</th>
                        <th class="col-1" style=" text-align: center;">category_id </th>
                        <th class="col"  style=" text-align: center;"></th>
                    </tr>
                </thead>
                @foreach($products as $product )
                    <tbody>
                        <tr>
                            <th scope="row">{{$product->id}}</th>
                            <td  style=" text-align: center;">{{$product->title }}</td>
                            <td  style=" text-align: center;" >{{$product->price }}</td>
                            <td  style=" text-align: center;" >{{$product->old_price }}</td>
                            <td  style=" text-align: center;" >{{$product->instock  }}</td>
                            <td  style=" text-align: center;" ><img src="{{URL::asset($product->image)}}" style="width: 60px; height: 80px;"class="img-fluid rounded "></td>
                            <td  style=" text-align: center;" >{{$product->category_id }}</td>
                            <td style=" text-align: center;" > 
                               <a href="{{route('delete.product',$product->id)}} ">
                                    <i class="fa fa-trash-o dark " style="font-size:36px"></i>
                                </a>
                                <a  href="{{route('edit.product',$product->id)}}">
                                     <i class="fa fa-pencil-square-o pl-2" aria-hidden="true" style='font-size:24px'></i>
                                </a>
                            </td>
                        </tr>                       
                    </tbody>
                @endforeach
        </table>
    </div>
</div>
@endsection