
@extends('adminHome')
@section('admin_body')
    

<div class="content " ;" >
    <center>
      <div class="col-12" style="top:50px; ">
        <div class="card card-chart">
          @if ('success')
          <div class="card-header ">
            {{session('success')}}
        </div><br><br>
        @endif
          <div class="card-header " style="background-color: rgb(70, 112, 112);">
                Current Stock
          </div><br><br>
          

          <div class="card-header ">
                 <table rowspace="12" padding=13 style="width:1000px">
                     
                     <tr style="background-color: rgb(148, 117, 109);">
                        <th>SlNo. </th>
                        <th>Car </th>
                        <th>Model </th>
                        <th>Added </th>
                        <th>Last updated </th>
                        <th>  </th>
                     </tr>
                
                     @php($i=1)
                     
                     @foreach ($cars as $car)

                     <tr>
                        <th>{{$i++}} </th>
                        <th>{{$car->name}} </th>
                        <th>{{$car->model}} </th>
                        <th>{{$car->created_at->diffForHumans()}} </th>
                        <th>{{$car->updated_at->diffForHumans()}} </th>
                        <th><a href=" {{ url('Stocks/stockDetails/'.$car->id)}} "style=" color:yellow;"> Details </a></th>
                        
                     </tr>
                     
                     
                     @endforeach
                     
                 </table>
                
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