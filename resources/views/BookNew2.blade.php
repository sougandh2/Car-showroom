
@extends('employee.empHomePage')
@section('emp_body')


<div class="content" >
    <center>
      <div class="col-6" style="top:50px;">
        <div class="card card-chart">
          <div class="card-header ">
            <b>BOOK A CAR</b><br>
            <form action=" {{ route('bookFinal2') }}" method="post" >
              <br><br>
              <input type="hidden" name="_token" value="{{ csrf_token()}}"> 
              <label for="i1">Customer Name : </label>
              <input type="text" name="name" id="i1" style="border-radius: 30px"> @error('name')
                  {{ $message }}
              @enderror<br><br>
              <input type="hidden" name="car_id" value="{{$values->id}}"> 
              <input type="hidden" name="emp_id" value="{{ session('emp_id')}}"> 
              <label for="i2">Address : </label>
              <textarea cols=17 rows=3 id="i2" name="adr"> </textarea>@error('adr')
                  {{ $message }}

              @enderror<br><br>
              <label for="i3">Initial Payment : </label>
              <input type="text" name="pay" id="i3" style="border-radius: 30px"> @error('pay')
              {{ $message }}
              @enderror<br><br>
              <label for="i4">Payment Scheme : </label>
              <input type="text" name="payScheme" id="i4" style="border-radius: 30px"> @error('payScheme')
              {{ $message }}
              @enderror<br><br>
            
              <input type="submit" name="sub"  style="border-radius: 30px"><br><br>
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