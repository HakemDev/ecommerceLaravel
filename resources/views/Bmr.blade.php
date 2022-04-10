@extends('layouts.app')
@section('content')
     <label for="age">Age:</label>
     <input type="number" value=12 name="age" id="age"> <br>
     <label for="tall">Tall:</label>
     <input type="number" name="tall" id="tall"><br>
     <label for="poid">Poid:</label>
     <input type="number" name="poid" id="poid"><br>
     <div>BMR= 10W + 6.25H – 5A + 5(H)</div><br>
     <select name="" id="select">
          <option value="1.2 " >Sédentaire</option>
          <option value="1.375">Faiblement actif</option>
          <option value="1.55" >Moyennement actif </option>
          <option value="1.725" >Très actif</option>
          <option value="1.9">Extrêmement actif </option>
     </select>
     <input type="submit" value="Calculer" id="submit"> <br> <br>

     <label for="result">TDEE:</label>
     <input type="number" name="" id="result" disabled>
     <label for="result2">BMR:</label>
     <input type="number" name="" id="result2" disabled>

     <div class="row">
          <div class="col-4 bg-success" style="text-align: center;" ><input id="me" type="number" min=0 max=3 ></div>   
          <div class="col-4  bg-light" style="text-align: center;" id="start"> <span class="btn btn-light">Start</span> </div>
          <div class="col-4 bg-danger" style="text-align: center;" id="you"></div>
     </div>
     <div class="col-12 m-2" style="text-align: center;" id="end"></div>
@endsection
@section('js')
     <script src="{{url('js/bmi.js')}}"></script>
@endsection

