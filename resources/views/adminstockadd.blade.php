
@extends('adminHome')
@section('admin_body')
    

<div class="content " ;" >
    <center>
      <div class="col-6" style="top:50px; ">
        <div class="card card-chart">
    
          <div class="card-header " style="background-color: rgb(70, 112, 112);">
                Add a car
          </div><br><br>

          <div class="card-header ">
                <form action="{{route('stockerAdd')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <label for="i11">Name : </label>
                    <input type="text" name="name" id="i11" style="border-radius: 30px"> @error('name')
                        {{ $message }}
                    @enderror<br><br>
                    <label for="i22">Model : </label>
                    <input type="text" name="model" id="i22" style="border-radius: 30px"> @error('model')
                        {{ $message }}
                    @enderror<br><br>
                    <label for="i33">Price : </label>
                    <input type="text" name="price" id="i33" style="border-radius: 30px"> @error('price')
                    {{ $message }}
                    @enderror<br><br>

                    <label for="i1">Horse power : </label>
                    <input type="text" name="hp" id="i1" style="border-radius: 30px"> @error('hp')
                        {{ $message }}
                    @enderror<br><br>
                    <label for="i2">Mileage </label>
                    <input type="text" name="mileage" id="i2" style="border-radius: 30px"> @error('mileage')
                        {{ $message }}
                    @enderror<br><br>
                    <label for="i3">Air bags: </label>
                    <input type="text" name="air" id="i3" style="border-radius: 30px"> @error('air')
                    {{ $message }}
                    @enderror<br><br>
                    <label for="i4">Type: </label>
                    <input type="text" name="type" id="i4" style="border-radius: 30px"> @error('type')
                    {{ $message }}
                    @enderror<br><br>
                    <label for="i5">Fuel: </label>
                    <input type="text" name="fuel" id="i5" style="border-radius: 30px"> @error('fuel')
                    {{ $message }}
                    @enderror<br><br>
                    <label for="i6">Cover Image: </label>
                    <input type="file" name="img" id="i6" style="border-radius: 30px"> @error('img')
                    {{ $message }}
                    @enderror<br><br>
                    
                    <input type="submit" name="sub"  style="border-radius: 30px"><br><br>
                </form>
          </div>

          <div class="card-body">
            <div class="chart-area">
              <canvas id="chartBig1"></canvas>
            </div>
          </div>
        </div>
      </div>
 
  
     
    </div>
</center>
  </div>
  @endsection