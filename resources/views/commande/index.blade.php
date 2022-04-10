@extends('layouts.app')

@section('content')
<div class="row ">
    <div class="col-3 mt-5">
      @include('slide')
    </div>
    <div class="col-9 ">
       
        <table class="table table-hover">
                <thead>
                    <tr class="bg-light">
                        <th scope="col" >#</th>
                        <th class="col-1"  style=" text-align: center;">user_id</th>
                        <th class="col-3"  style=" text-align: center;">Product Name</th>
                        <th class="col-1"  style=" text-align: center;">price</th>
                      <!--  <th class="col-1"  style=" text-align: center;">Quantité</th> -->
                        <th class="col-2"  style=" text-align: center;">total</th>
                        <th class="col-1" style=" text-align: center;">	paid </th>
                        <th class="col-1"  style=" text-align: center;"> </th>
                        <th class="col-1"  style=" text-align: center;"> Delivred</th>
                        <th class="col-1"  style=" text-align: center;"> </th>

                        <th class="col"  style=" text-align: center;"></th>
                    </tr>
                </thead>
                @foreach($commandes as $commande )
                    <tbody>
                        <tr class="">
                            <th scope="row">{{$commande->id}}</th>
                            <td  style=" text-align: center;">{{$commande->user_id }}</td>
                            <td  style=" text-align: center;">{{$commande->product_name }}</td>
                            <td  style=" text-align: center;" >{{$commande->price }}</td>
                       <!--      <td  style=" text-align: center;" >{{$commande->qte }}</td>  -->
                            <td  style=" text-align: center;" >{{$commande->total }}</td>
                            <td  style=" text-align: center;"  >
                                 @if($commande->paid)
                                     <i class="fa fa-check" style="color:green;font-size:25px"  aria-hidden="true"></i>
                                 @else
                                 <i class="fa fa-times" style="color:red;font-size:25px"  aria-hidden="true"></i>
                                 @endif
                            </td>
                            <td>  
                               <a href="{{route('edit1.commande',$commande->id)}} " >  
                                @if($commande->paid)
                                    <i class="fa fa-window-close  " style="color:red;font-size:25px" aria-hidden="true"></i>                          
                                @else
                                    <i class="fa fa-check-square" style="color:green;font-size:25px" aria-hidden="true"></i>

                                @endif                        
                                </a>
                            </td>
                            <td  style=" text-align: center;" >
                                 @if($commande->delivred)
                                     <i class="fa fa-check" style="color:green;font-size:25px"  aria-hidden="true"></i>
                                 @else
                                     <i class="fa fa-times" style="color:red;font-size:25px"  aria-hidden="true"></i>
                                 @endif
                            </td>
                            <td>
                                <a href="{{route('edit2.commande',$commande->id)}} ">
                                @if($commande->delivred)
                                    <i class="fa fa-window-close  " style="color:red;font-size:25px" aria-hidden="true"></i>                          
                                @else
                                    <i class="fa fa-check-square" style="color:green;font-size:25px" aria-hidden="true"></i>

                                @endif 
                                </a>
                            </td>
                            <td style=" text-align: center;" > 
                              
                                <a  href="{{route('delete.commande',$commande->id)}}">
                                     <i class="fa fa-trash" aria-hidden="true" style='color:orange;font-size:25px'></i>
                                </a>
                            </td>
                           

                        </tr>                       
                    </tbody>
                @endforeach
        </table>
    </div>
</div>
@endsection