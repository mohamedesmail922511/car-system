<?php

namespace App\Http\Controllers\Emart;

use App\Models\Client;
use App\Models\Review;
use App\Models\Invoice;
use App\Models\TimeLine;
// use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ClientReview;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;



class CallCenterController extends Controller
{
    // add_client_page
    public function add_client_page()
    {
        return view('Emart.CallCenter.client_page');
    }

    // add_client data
    public function add_client(Request $request)
    {
        $client = new Client();
        $invoice  = new Invoice();
        $client->name = $request->name;
        $client->phone = $request->phone;
        $client->address = $request->address;
        $client->car_no = $request->car_no;
        $client->car_type = $request->car_type;
        $client->price = $request->price;
        $client->service = $request->service;
        $client->invoice_status = $request->invoice_status;
        $client->car_description = $request->car_description;
        $client->note = $request->note;
        $client->receivedـdate = $request->receivedـdate;
        $client->deliveryـdate = $request->deliveryـdate;

        try {
            $signatureImage = $request->input('signature');
            // Decode the Base64-encoded image
            $decodedImage = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $signatureImage));

            // Create an Intervention Image instance

            $signature = Image::make($decodedImage);

            // Resize if needed
            $signature->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            // Generate a unique file name
            $imageFileName = uniqid() . '.png';

            // Save the image using Storage facade
            Storage::disk('public')->put('signatures/' . $imageFileName, (string) $signature->encode('png'));

            $client->signature =  $imageFileName;
        } catch (\Throwable $th) {
        }



        // $imageNames = [];
        // if ($request->hasFile('images')) {
        //     foreach ($request->file('images') as $image) {
        //         // Check if the file is valid
        //         if ($image->isValid()) {
        //             // Get the original file name
        //             $imageName = $image->getClientOriginalName();

        //             // Add the image name to the array
        //             $imageNames[] = $imageName;

        //             // Move the uploaded file to a directory
        //             $image->storeAs('images', $imageName);
        //         }
        //     }
        // }
        // $client->images = $imageNames;
        $images = $request->file('images');
        $imageNames = [];
  
        if($images){
         foreach ($images as $image) {
             $imageName = $image->getClientOriginalName();
             $image->move(public_path('carsimages'), $imageName);
             $imageNames[] = $imageName;
         }
         $invoice->images =$imageNames;
        }
        
        $client->images = $imageNames;
        $invoice->images = $imageNames;

        $invoice->name = $request->name;
        $invoice->phone = $request->phone;
        $invoice->address = $request->address;
        $invoice->car_no = $request->car_no;
        $invoice->car_type = $request->car_type;
        $invoice->price = $request->price;
        $invoice->invoice_status = $request->invoice_status;
        $invoice->service = $request->service;
        $invoice->car_description = $request->car_description;
        $invoice->note = $request->note;
        $invoice->receivedـdate = $request->receivedـdate;
        $invoice->deliveryـdate = $request->deliveryـdate;
        $invoice->invoice_type = $request->invoice_type;

        try {
            $signatureImage = $request->input('signature');

            // Decode the Base64-encoded image
            $decodedImage = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $signatureImage));

            // Create an Intervention Image instance
            $signature = Image::make($decodedImage);

            // Resize if needed
            $signature->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            // Generate a unique file name
            $imageFileName = uniqid() . '.png';

            // Save the image using Storage facade
            Storage::disk('public')->put('signatures/' . $imageFileName, (string) $signature->encode('png'));

            $invoice->signature =  $imageFileName;
        } catch (\Throwable $th) {
            //throw $th;
        }



        $imageNames = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // Check if the file is valid
                if ($image->isValid()) {
                    // Get the original file name
                    $imageName = $image->getClientOriginalName();
                    // Add the image name to the array
                    $imageNames[] = $imageName;
                    // Move the uploaded file to a directory
                    $image->storeAs('images', $imageName);
                }
            }
        }
        $invoice->images = $imageNames;


        $client->save();
        $invoice->save();

        return redirect()->back()->with('msg', 'Data Added Successfully');
    }

    // clients_page
    public function clients_page()
    {
        $clients = Client::all();
        return view('Emart.CallCenter.clients_page',compact('clients'));
    }

    // search.client 
    public function search_client(Request $request)
    {
        $search  = $request->search;
        $clients = DB::table('clients')->where('name', 'like', '%' . $search . '%')
            ->orWhere('name', 'like', '%' . $search)
            ->orWhere('name', $search)
            ->orWhere('phone', 'like', '%' . $search . '%')
            ->orWhere('phone', 'like', '%' . $search)
            ->orWhere('phone', $search)
            ->orWhere('car_no', 'like', '%' . $search . '%')
            ->orWhere('car_no', 'like', '%' . $search)
            ->orWhere('car_no', $search)
            ->get();
        return view('Emart.CallCenter.clients_page', compact('clients'));
    }

    // client_details or client update
    public function client_details($id)
    {
        $client = Client::findOrFail($id);
        return view('Emart.CallCenter.client_details', compact('client'));
    }

    //update_client
    public function update_client(Request $request, $id)
    {
        $client = Client::findOrFail($id);
        $client->name = $request->name;
        $client->phone = $request->phone;
        $client->address = $request->address;
        $client->car_no = $request->car_no;
        $client->car_type = $request->car_type;
        $client->price = $request->price;
        $client->service = $request->service;
        // $client->invoice_status = $request->invoice_status;
        $client->car_description = $request->car_description;
        $client->note = $request->note;
        $client->receivedـdate = $request->receivedـdate;
        $client->deliveryـdate = $request->deliveryـdate;
        $imageNames = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // Check if the file is valid
                if ($image->isValid()) {
                    // Get the original file name
                    $imageName = $image->getClientOriginalName();

                    // Add the image name to the array
                    $imageNames[] = $imageName;

                    // Move the uploaded file to a directory
                    $image->storeAs('images', $imageName);
                }
            }
        }

        try {
            $signatureImage = $request->input('signature');

            // Decode the Base64-encoded image
            $decodedImage = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $signatureImage));

            // Create an Intervention Image instance
            $signature = Image::make($decodedImage);

            // Resize if needed
            $signature->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            // Generate a unique file name
            $imageFileName = uniqid() . '.png';

            // Save the image using Storage facade
            Storage::disk('public')->put('signatures/' . $imageFileName, (string) $signature->encode('png'));

            $client->signature =  $imageFileName;
        } catch (\Throwable $th) {
            //throw $th;
        }
        $client->images = $imageNames;
        $client->save();
        return redirect()->back()->with('msg', 'Client Data Updated Successfully');
    }
    // pdr_page
    public function pdr_page()
    {

        $data = Client::where('car_show', 'show')->get();
        return view('Emart.CallCenter.pdr_page', compact('data'));
    }

    // paint_page
    public function paint_page()
    {
        return view('Emart.CallCenter.paint_page');
    }

    // timelineـpage
    public function timelineـpage()
    {
        $data = Timeline::orderBy('date')->get();
        return view('Emart.CallCenter.timeline', compact('data'));
    }
    //timeline_search
    public function timeline_search(Request $request)
    {
        $query = $request->input('query');
        // Perform your search logic here
        $data = TimeLine::where('car_no', 'LIKE', '%' . $query . '%')->orWhere('phone', 'LIKE', '%' . $query . '%')->get();
        return view('Emart.CallCenter.timeline', compact('data'));
    }
    // add_timeline
    public function add_timeline(Request $request)
    {
        $time = new TimeLine();
        $time->name = $request->name;
        $time->phone = $request->phone;
        $time->car_no = $request->car_no;
        $time->car_type = $request->car_type;
        $time->date = $request->date;
        $time->save();
        return redirect()->back()->with('msg', 'TimeLine Added Successfully');
    }

    // delete_timeline
    public function delete_timeline($id)
    {
        $time = Timeline::findOrFail($id);
        $time->delete();
        return redirect()->back()->with('msg', 'TimeLine Deleted Successfully');
    }

    public function review($id){
        $client = Client::findOrFail($id);
        $reviews = ClientReview::all();
        return view('Emart.CallCenter.reviews',compact('client','reviews'));
    }


    // add_review
    public function add_review(Request $request,$id){

      $review = new ClientReview();
      $client= Client::findOrfail($id);
      $review->user_id = $client->id;
      $review->name = $client->name;
      $review->question1 = $request->question1;
      $review->question2 = $request->question2;
      $review->question3 = $request->question3;
      $review->question4 = $request->question4;
      $review->question5 = $request->question5;
      $review->save();
      return redirect()->back();
    }
}
