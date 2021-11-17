
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
                Current Bookings
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
                     
                     @foreach ($values as $v)

                     <tr>
                        <th>{{$i++}} </th>
                        <th>{{$v->name}} </th>
                        <th>{{$v->model}} </th>
                        <th>{{$v->created_at->diffForHumans()}} </th>
                        <th>{{$v->updated_at->diffForHumans()}} </th>
                        <th><a href=" "style=" color:yellow;"> Approve </a></th>
                        <th><a href=" "style=" color:yellow;"> Disapprove </a></th>
                        
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