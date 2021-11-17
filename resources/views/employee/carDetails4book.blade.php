
@extends('employee.empHomePage')
@section('emp_body')


<div class="content" >
    <center>
      <div class="col-6" style="top:50px;">
        <div class="card card-chart">
    
          
          <div class="card-header ">
              <h2>
            <b>{{ ucfirst(App\Models\Car::find($cars->car_id)->name)}}
                <br>
                Model - {{ App\Models\Car::find($cars->car_id)->model}}<br>
                {{$cars->type}}
            </b>
              </h2>
            <br>
                <img src="{{ asset($cars->cover) }}"" style="border:12px red;">
              <br><br>
              <b>
               HP - {{$cars->hp}}<br>
               Fuel Economy - {{$cars->fuel}} @ {{$cars->mileage}}<br>
               Safety Air Bags - {{$cars->air_bags}}<br>
               <h3 style="color:rgb(189, 13, 13);"> Price - {{ App\Models\Car::find($cars->car_id)->price}} Rs.<br></h3>
               <form action="{{ url('book/page/'.$cars->car_id) }}" method="get">
                   @csrf
                <input type="submit" name="sub"  style="border-radius: 30px; width:300px" value="Book"><br><br>
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