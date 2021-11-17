
@extends('adminHome')
@section('admin_body')
    

<div class="content " ;" >
    <center>
      <div class="col-12" style="top:50px; ">
        <div class="card card-chart">
          @if ('success')
          <div class="card-header ">
            {{session('successD')}}
        </div><br><br>
        @endif
          <div class="card-header " style="background-color: rgb(70, 112, 112);">
                Current Employees
          </div><br><br>
          

          <div class="card-header ">
                 <table rowspace="12" padding=13 style="width:1000px">
                     
                     <tr style="background-color: rgb(148, 117, 109);">
                        <th>SlNo. </th>
                        <th>Name </th>
                        <th>Email </th>
                        <th>Address </th>
                        <th>Department </th>
                        <th>Sales </th>
                        <th>Dob </th>
                        <th>Joined on </th>
                        <th colspan="2">Action</th>
                     </tr>
                
                     @php($i=1)
                     @foreach ($det as $data)

                     <tr>
                        <th>{{$i++}} </th>
                        <th>{{$data->name}} </th>
                        <th>{{$data->email}}</th>
                        <th>{{$data->address}}</th>
                        <th>{{$data->department}}</th>
                        <th>{{$data->sales}}</th>
                        <th>{{$data->dob}}</th>
                        
                        <th>{{$data->created_at->diffForhumans()}}</th>
                        <th><a href=" {{ url('empUpdate/'.$data->id)}} "> Alter </a></th>
                        <th><a href=" {{url('empDel/'.$data->id)}}" onclick=" return confirm('You sure?')" style="color:red; a:hover{color:yellow;}"> Delete </a></th>
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