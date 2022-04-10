@extends('layouts.app')

@section('content')
<div class="row">
   <div class="col-3 mt-5">
   @include('slide')
   </div>
   <div class="col-9">
       <form method="POST" action="{{route('update.product',$products->id)}}" enctype="multipart/form-data">
            @csrf
            @method("PUT") 
            <div class="card border-dark" style="width: 90%;color:whitesmoke">
                <div class="card-header mb-2 bg-dark">
                   <h2> Modifier produit {{$products->title}} :</h2> 
                </div>
                <div class="input-group flex-nowrap  m-2 pr-4">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping">Name</span>
                    </div>
                    <input type="text" name="title" placeholder="{{$products->title}} "class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
                </div>
                <div class="input-group  m-2 pr-4">
                    <div class="input-group-prepend ">
                        <span class="input-group-text h-100">Description</span>
                    </div>
                    <textarea class="form-control"  name="description"   placeholder="{{$products->description}}"></textarea>
                </div>
                <div class="input-group m-2 pr-4">
                    <div class="input-group-prepend ">
                        <span class="input-group-text h-100">Price</span>
                    </div>
                    <input type="number" class="form-control"  name="price"  placeholder="{{$products->price}}" aria-label="Dollar amount (with dot and two decimal places)">
                    <div class="input-group-append">
                        <span class="input-group-text">DH</span>           
                    </div>
                </div>
                <div class="input-group m-2 pr-4">
                    <div class="input-group-prepend ">
                        <span class="input-group-text h-100">Old Price</span>
                    </div>
                    <input type="number" class="form-control" name="old_price" placeholder="{{$products->	old_price}}" aria-label="Dollar amount (with dot and two decimal places)">
                    <div class="input-group-append">
                        <span class="input-group-text">DH</span>           
                    </div>
                </div>
                <div class="input-group flex-nowrap  m-2 pr-4">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping">instock</span>
                    </div>
                    <input type="number" name="instock" min=0 class="form-control"  placeholder="{{$products->instock}}" aria-label="Username" aria-describedby="addon-wrapping">
                </div>
                <div class="row">
                    <div class="col-4">
                        <img src="{{asset($products->image)}}" style="width: 200px; height: 270px ;">
                    </div>
                    <div class="col-8">
                        <div class="input-group mb-3 m-2 pr-4 ">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">Image</span>
                            </div>
                            <div class="custom-file border border-radius ">
                                <input type="file" class="custom-file-input "  name="file" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="inputGroupFile01">Choose image</label>
                            </div>
                        </div>
                </div>
                </div>
                <div class="input-group m-2 pr-4 ">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Catégories</label>
                    </div>
                    <select class="custom-select" name="categorie_id" id="inputGroupSelect01" style="width:85%;">
                        <option selected>{{$products->category->title}}</option>
                        @foreach($cat as $val)
                                <option value="{{$val->id}}">{{$val->title}}</option>
                        @endforeach      
                    </select>
                </div>
                 <div class="mb-3 pr-5">
                    <button type="submit" class="btn btn-success float-right ">Valider</button>   
                 </div>   
            </div>
        </form>
   </div>  
</div>
@endsection