
@extends('adminHome')
@section('admin_body')
    

<div class="content "  >
    <center>
      <div class="col-6" style="top:50px; ">
        <div class="card card-chart">
    
          <div class="card-header " style="background-color: rgb(70, 112, 112);">
                Edit the details Employee 
          </div><br><br>

          <div class="card-header ">
                <form action="{{ url('empEdit/'.$emp->id) }}" method="post">
                    @csrf
                    <label for="i1">Name : </label>
                    <input type="text" name="name" id="i1" value="{{ $emp->name}}" style="border-radius: 30px"> @error('name')
                        {{ $message }}
                    @enderror<br><br>
                    <label for="i2">Email : </label>
                    <input type="email" name="email" id="i2"  value="{{ $emp->email}}"style="border-radius: 30px"> @error('email')
                        {{ $message }}
                    @enderror<br><br>
                    
                    <label for="i4">Address : </label> 
                    <textarea cols=17 rows=3 id="i4" name="addr" > {{ $emp->address}}</textarea> @error('addr')
                    {{ $message }}
                    @enderror<br><br>
                    <label for="i5">Department : </label>
                    <input type="text" name="dept" id="i5" style="border-radius: 30px"  value="{{ $emp->department}}"><br><br>
                    <label for="i6">Date of birth : </label> 
                    <input type="date" name="dob" id="i6"  value="{{ $emp->dob}}">@error('dob')
                    {{ $message }}
                    @enderror<br><br>
                    <label for="i7">Total Sales : </label>
                    <input type="text" name="sales" id="i7" style="border-radius: 30px"  value="{{ $emp->sales}}"><br><br>
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