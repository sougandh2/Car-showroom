
@extends('adminHome')
@section('admin_body')
<div class="content " >

<div class="col-12" style="top:50px; ">
  <div class="card card-chart">  
    <div class="card-header " style="background-color: rgb(70, 112, 112);">
          New Bookings 
    </div><br><br>
    <div class="card-header ">
            <table rowspace="12" padding=13 style="width: 400px">
                <tr style="background-color: rgb(140, 206, 186);color:black" >
                  <th>SlNo. </th>
                  <th>Car </th>
                  <th>date </th>
                  <th> </th>
                  <th> </th>
                </tr>
                
                @php($i=1) 
                @foreach ($bookings as $book)
                <tr>
                  <th>{{$i++}} </th>
                  <th> {{ $book->car_id }}</th>
                  <th> {{ $book->book_date }}</th>
                  <th> <a href=" {{ url('/book/apr/' .$book->id) }} " style="color:rgb(69, 235, 69)"> Approve </a> </th>
                  <th> <a href=" {{ url('/book/dspr/' .$book->id) }} " style="color:red"> Disapprove </a> </th>
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
  <div class="card card-chart">  
      <div class="card-header " style="background-color: rgb(70, 112, 112);">
            Previous Records
      </div><br><br>
      <div class="card-header ">
              <table rowspace="12" padding=13 style="width: 100%">
                  <tr align="center" style="background-color: rgb(140, 206, 186);color:black" >
                    <th>SlNo. </th>
                    <th>Car </th>
                    <th>Address </th>
                    <th>Initial Payment </th>
                    <th>Payment Scheme </th>
                    <th>Book Date</th>
                    <th>Status</th>
                    <th>Sold By</th>
                  </tr>
                  
                  @php($i=1) 
                  @foreach ($bookPrev as $book)
                  <tr align="center" >
                    <th>{{$i++}} </th>
                    <th> {{ App\Models\Car::find($book->car_id)->name }}</th>
                    <th> {{ $book->address }}</th>
                    <th> {{ $book->payment_initial }}</th>
                    <th> {{ $book->payment_scheme }}</th>
                    <th> {{ $book->created_at->diffForHumans() }}</th>
                    @if ($book->status==1) 
                      <th>APPROVED</th>
                    @else
                      <th>DISSAPPROVED</th>
                  @endif
                    <th> {{ App\Models\Employee::find($book->seller_id)->name }}</th>
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

</div>
@endsection