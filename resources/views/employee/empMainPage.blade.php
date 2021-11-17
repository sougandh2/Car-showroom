
@extends('employee.empHomePage')
@section('emp_body')


<div class="content" >
    <center>
      <div class="col-6" style="top:50px;">
        <div class="card card-chart">
    
         
          <div class="card-header ">
            @if('success') 
            <div class="card-header " style="background-color: rgb(70, 112, 112);">
                  
                    {{ session('success')}}
                  
            </div>@endif<br><br>
            <b> Welcome {{ App\Models\Employee::find(session('emp_id'))->name }}</b>
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