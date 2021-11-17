<?php

namespace App\Http\Controllers;
use App\Models\Car;
use App\Models\Carspec;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function stockPage() {
        return view('adminstockHome');
    }

    public function stockaddPage() {
        return view('adminstockadd');
    }

    public function stocker(Request $r) {
        $va = $r->validate([
            'name' => 'required' ,
            'model' => 'required' ,
            'price' => 'required|numeric',
            'hp' => 'required',
            'mileage' => 'required',
            'air' => 'required',
            'type' => 'required',
            'fuel' => 'required',
            'img' => 'required|mimes:jpg,jpeg,png'
        ]);

        $car = new Car;
        $car->name = $r->name;
        $car->model = $r->model;
        $car->price = $r->price;
        $car->save();
        $id=$car->id;

        $spec = new Carspec;
        $spec->car_id = $id;
        $spec->hp = $r->hp; 
        $spec->mileage = $r->mileage;
        $spec->air_bags = $r->air;
        $spec->type = $r->type;
        $spec->fuel = $r->fuel;
        $img = $r->file('img');
        $im_name = hexdec(uniqid());
        $img_ext = strtolower($img->getClientOriginalExtension());
        $image=$im_name.'.'.$img_ext;
        $loc = 'images/cars/';
        $final_image = $loc.$image;
        $img->move($loc,$image);
        $spec->cover = $final_image;
        $spec->save();

        return Redirect()->route('StockManage')->with('success','A new car was added');
    }
   
    public function Stockv1() {
        $cars=Car::latest()->get();
        return view('adminStockGlanceView',compact('cars'));
    }
    public function StockDetailed($id) {
        $car1 = Car::find($id);
        $carModel = Carspec::where('car_id',$id)->get();
        return view('AdminCarsDetailed',compact('carModel','car1'));
    }

    public function StockUpdate($id) {
        $car1 = Car::find($id);
        $carModels = Carspec::where('car_id',$id)->first();
        return view('EditCar',compact('carModels','car1'));
    }

    public function StockDel($id) {
        $car=Car::find($id)->delete();
        $car=Carspec::where('car_id',$id)->delete();
        return Redirect()->route('StockViewG')->with('success','item was deleted!');
    }

    public function stockBookDetails($id) {
        $cars = Carspec::where('car_id',$id)->first();
        return view('employee.carDetails4book',compact('cars'));
    }

    public function StockAlter(Request $r,$id,$id2) {
        $car=Car::find($id)->update(
            [
                'name' => $r->name ,
                'model' => $r->model ,
                'price' => $r->price
            ]
        );
        $carS = Carspec::where('car_id',$id)->first();
        $img = $carS->cover;
        if($r->img==null){
            $c = Carspec::where('car_id',$id)->update(
                [
                    'hp' => $r->hp,
                    'mileage' => $r->mileage,
                    'air_bags' => $r->air,
                    'type' => $r->type,
                    'fuel' => $r->fuel,
                    'cover' => $img

                ]
            );
        } else {
            
            $img1 = $r->file('img');
            $loc='images/cars/';
            $for = strtolower($img1->getClientOriginalExtension());
            $final_image = $loc.hexdec(uniqid()).'.'.$for;
            $img1->move($loc,$final_image);
            unlink($img);
            $c = Carspec::where('car_id',$id)->update(
                [
                    'hp' => $r->hp,
                    'mileage' => $r->mileage,
                    'air_bags' => $r->air,
                    'type' => $r->type,
                    'fuel' => $r->fuel,
                    'cover' => $final_image
                ]
            );
        }
        return Redirect()->route('StockViewG')->with('success','updation successfull');
    }  
}

