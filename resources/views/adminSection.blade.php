
@extends('adminHome')
@section('admin_body')


<div class="content" >
    <center>
      <div class="col-6" style="top:50px;">
        <div class="card card-chart">
    
          <div class="card-header " style="background-color: rgb(70, 112, 112);">
                Statistics 
          </div><br><br>
          <div class="card-header ">
            <b> Welcome {{ App\Models\admin::find(session('adminNow'))->name }}</b>
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