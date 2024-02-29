<?php

namespace App\Http\Controllers\Emart;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CarController extends Controller
{
    // change_car_status
    public function change_car_status($id)
    {
        $car = Client::findOrFail($id);
        $car->car_status = 'تم الاصلاح';
        $car->save();
        return redirect()->back()->with('msg', 'Car status changed');
    }

    //search_car
    public function search(Request $request)
    {
        $search = $request->input('search');
        $data = Client::where('car_no', 'like', "%$search%")->get();

        if ($search) {
            $data = Client::where('car_no', 'like', "%$search%")->get();
        } else {
            $data = Client::all();
        }
        return view('Emart.CallCenter.pdr_page',compact('data'));
    }

    // to hide item
    public function hide($id)
    {
        $car = Client::findOrFail($id);
        $car->car_show = 'hide';
        $car->save();

        return redirect()->back();
    }
}
