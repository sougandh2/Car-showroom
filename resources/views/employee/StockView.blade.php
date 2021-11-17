
@extends('employee.empHomePage')
@section('emp_body')


<div class="content" >
    <center>
      <div class="col-12" style="top:50px;">
        <div class="card card-chart">
    
          
          <div class="card-header ">
            <table rowspace="11" padding=11 style="width:1001px">
                
                <tr style="background-color: rgb(148, 117, 109);">
                   <th>SlNo. </th>
                   <th>Car </th>
                   <th>Model </th>
                   <th>Image </th>
                   <th> </th>
                </tr>
           
                @php($i=1)
                
                @foreach ($cars as $car)

                <tr>
                   <th>{{$i++}} </th>
                   <th>{{$car->name}} </th>
                   <th>{{$car->model}} </th>
                   <th><img src="{{asset(App\Models\Carspec::where('car_id',$car->id)->first()->cover)}}" width=200px height=120px></th>
                   <th><a href=" {{ url('Book/stockDetails/'.$car->id)}} "style=" color:yellow;"> Details </a></th>
                   
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