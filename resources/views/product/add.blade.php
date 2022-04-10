@extends('layouts.app')

@section('content')
<div class="row">
   <div class="col-3 mt-5">
   @include('slide')
   </div>
   <div class="col-9 ">
       <form method="POST" id="ajouter" action="{{route('add2.product')}}" enctype="multipart/form-data">
            @csrf
            @method("POST") 
            <div class="card ml-5 border-dark" style="width: 70%;">
                <div class="card-header h2 bg-dark mb-2" style="color:aliceblue;">
                    Ajouter un Nouvelle produit:
                </div>
                <div class="input-group flex-nowrap  m-2 pr-4">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping">Name</span>
                    </div>
                    <input type="text" name="title" class="form-control" placeholder="Name_produit" aria-label="Username" aria-describedby="addon-wrapping">
                </div>
                <div class="input-group  m-2 pr-4">
                    <div class="input-group-prepend ">
                        <span class="input-group-text h-100">Description</span>
                    </div>
                    <textarea class="form-control"  placeholder="descrivez votre produit " name="description"  ></textarea>
                </div>
                <div class="input-group m-2 pr-4">
                    <div class="input-group-prepend ">
                        <span class="input-group-text h-100">Price</span>
                    </div>
                    <input type="number" class="form-control" placeholder=" Prix de vendre" name="price"   aria-label="Dollar amount (with dot and two decimal places)">
                    <div class="input-group-append">
                        <span class="input-group-text">DH</span>           
                    </div>
                </div>
                <div class="input-group m-2 pr-4">
                    <div class="input-group-prepend ">
                        <span class="input-group-text h-100">Old Price</span>
                    </div>
                    <input type="number" class="form-control" placeholder="Prix de vendre avant la promotion" name="old_price"  aria-label="Dollar amount (with dot and two decimal places)">
                    <div class="input-group-append">
                        <span class="input-group-text">DH</span>           
                    </div>
                </div>
                <div class="input-group flex-nowrap  m-2 pr-4">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping">instock</span>
                    </div>
                    <input type="number" name="instock"  placeholder="Quantité Stocké" min=0 class="form-control"  aria-label="Username" aria-describedby="addon-wrapping">
                </div>
  
                <div class="input-group mb-3 m-2 pr-4 ">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Image</span>
                    </div>
                    <div class="custom-file border border-radius ">
                        <input type="file" class="custom-file-input "  name="file" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="inputGroupFile01">Choose image</label>
                    </div>
                </div>
                
                <div class="input-group m-2 pr-4 ">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Catégories</label>
                    </div>
                    <select class="custom-select" name="categorie_id" id="inputGroupSelect01" style="width:70%;">   
                        @foreach($cat as $val)
                                <option value="{{$val->id}}">{{$val->title}}</option>
                        @endforeach      
                    </select>
                </div>
                 <div class="mb-3 pr-5">
                    <button onclick="event.preventDefault();
                             if(confirm('vous étez sur de vos données ?'))
                             document.getElementById('ajouter').submit();"  
                             class="btn btn-danger float-right ">Ajouter</button>   
                 </div>   
            </div>
        </form>
   </div>  
</div>
@endsection