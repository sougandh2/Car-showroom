
@extends('adminHome')
@section('admin_body')
    

<div class="content "  >
    <center>
      <div class="col-6" style="top:50px; height:400px;">
        <div class="card card-chart" style="height:300px">
    @if('success') 
          <div class="card-header " style="background-color: rgb(70, 112, 112);">
                
                  {{ session('success')}}
                
          </div>@endif<br><br>
          <div class="card-header ">

            <a href = "{{route('StockViewG')}}">View Stocks </a> <br><br>
           <a href = "{{route('StockAddPage')}}"> Add Stocks</a><br><br>
      
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
