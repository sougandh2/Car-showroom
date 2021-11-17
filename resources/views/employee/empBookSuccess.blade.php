
@extends('employee.empHomePage')
@section('emp_body')
<div class="content" >
    <center>
      <div class="col-6" style="top:50px;">
        <div class="card card-chart">
          <div class="card-header ">
            <b><h2> Booking Successful </h2></b>
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