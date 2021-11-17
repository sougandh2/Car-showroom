<?php

namespace App\Http\Controllers;
use App\Models\Booking;
use App\Models\Car;
use App\Models\Employee;
Use Carbon\Carbon;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function BookNav($id) {
        $values=Car::find($id)->first();
        return view('bookNew2',compact('values'));
    }

    public function bookAppr($id) {
        $v = Booking::find($id)->update(
            [
                'status' => 1
            ]
        );
        return Redirect()->back();
    }
    
    public function bookDspr($id) {
        $v = Booking::find($id)->update(
            [
                'status' => 2
            ]
        );
        return Redirect()->back();
    }

    public function BookingStat() {
        $bookings = Booking::latest()->where('status','=',0)->get(); 
        $bookPrev = Booking::latest()->where('status','>',0)->get();
        return view('adminBooks',compact('bookings','bookPrev'));
    }
    public function BookProcess(Request $r) {
        $v = $r->validate(
            [
                'name' => 'required|min:3',
                'adr' => 'required|min:5',
                'pay' => 'required|numeric',
                'payScheme' => 'required|max:10',
            ]
        );
        $book = new Booking;
        $book->customer_name = $r->name;
        $book->address = $r->adr;
        $book->car_id = $r->car_id;
        $book->seller_id = $r->emp_id;
        $book->payment_initial = $r->pay;
        $book->payment_scheme = $r->payScheme;
        $book->book_date = Carbon::now();
        $book->save();
        $sales = Employee::find($r->emp_id)->sales;
        $sales++;
        $b = Employee::find($r->emp_id)->update(
            [
                'sales' => $sales
            ]
        );
        return view('employee.empBookSuccess');
    }

}
