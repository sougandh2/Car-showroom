
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
              {{ $car1->name }}
              {{ $car1->model }}
        </div><br><br>
        

        <div class="card-header ">
                <table rowspace="12" padding=13 style="width:1000px">
                    
                    <tr style="background-color: rgb(148, 117, 109);">
                      <th>SlNo. </th>
                      <th>Horse Power</th>
                      <th>Fuel Economy</th>
                      <th>Air Bags</th>
                      <th>Type</th>
                      <th>Fuel Type</th>
                      <th>Cover</th>
                    </tr>
              
                    @php($i=1)
                    
                    @foreach ($carModel as $car)

                    <tr>
                      <th>{{$i++}} </th>
                      <th>{{$car->hp}} </th>
                      <th>{{$car->mileage}} </th>
                      <th>{{$car->air_bags}} </th>
                      <th>{{$car->type}} </th>
                      <th>{{$car->fuel}} </th>
                      <th><img src="{{asset($car->cover)}}" height="230px" width="230px"></th>
                      <th><a href=" {{ url('StockUpdate/'.$car1->id)}} "> Edit </a></th>
                      <th><a href=" {{ url('StockDel/'.$car1->id)}}" onclick=" return confirm('You sure?')" style="color:red; a:hover{color:yellow;}"> Remove </a></th>
                      
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
