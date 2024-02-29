<?php

namespace App\Http\Controllers\Emart;

use App\Models\Bill;
use App\Models\Check;
use App\Models\Client;
use App\Models\Purche;
use App\Models\Report;
use App\Models\Worker;
use App\Models\Invoice;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\AlainInvoice;
use App\Models\Branch;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use PhpParser\Node\Stmt\TryCatch;
use Exception;

class AccountantController extends Controller
{
    //
    public function index()
    {
        try {
            $clients = Client::all();
        $invoices = Invoice::all();
        $cars = Client::pluck('car_status');
        $nonfixedcars = Client::where('car_status', 'لم يتم التصليح')->get();
        $fixedcars = Client::where('car_status', 'تم الاصلاح')->get();
        $checks = Check::all();
        return view('Emart.index', compact('clients', 'invoices', 'cars', 'nonfixedcars', 'fixedcars', 'checks'));
        } catch (\Throwable $th) {
            return view('error');
        }
    }
    public function statistics()
    {
       try {
        $users = Invoice::select(DB::raw("COUNT(*) as count"), DB::raw("DAY(created_at) as day"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("Day(created_at)"))
        ->pluck('count', 'day');
    $labels = $users->keys();
    $data = $users->values();
    return view('Emart.statistics', compact('labels', 'data'));
       } catch (\Throwable $th) {
        return view('error');
       }
    }

    public function show_sales_statistics()
    {
       try {
        $sales = Invoice::select(DB::raw("COUNT(*) as count"), DB::raw("(sales) as sales"))
        ->groupBy(DB::raw("(sales)"))
        ->pluck('count', 'sales');
    $labels = $sales->keys();
    $data = $sales->values();
    return view('Emart.sales-statistics', compact('labels', 'data'));
       } catch (\Throwable $th) {
        return view('error');
       }
    }
    //invoice_page
    public function invoice_page()
    {
        try {
            $branches = Branch::all();
        return view('Emart.Accountant.invoice_page',compact('branches'));
        } catch (\Throwable $th) {
            return view('error');
        }
    }
    //invoices_page
    public function invoices_page()
    {
        $data = Invoice::orderBy('id', 'desc')->get();
        $paid = Invoice::where('invoice_status', 'تم الدفع');
        $nonpaid = Invoice::where('invoice_status', 'لم يتم الدفع');
        return view('Emart.Accountant.invoices_page', compact('data', 'paid', 'nonpaid'));
    }


    // add_branch
    public function add_branch(Request $request){
        $branch = new Branch();
        $branch->branch = $request->branch;
        $branch->save();
        return redirect()->back()->with('msg', 'Branch Added Successfully');
    }
    // branch_invoice
    public function branch_invoice($id){
        $branch = Branch::find($id);
        $data = $branch->invoices;
        $branches = Branch::all();
        return view('Emart.Accountant.branch_invoices',compact('branches','data'));
        
    }
    // add_invoice
    public function add_invoice(Request $request)
    {
        $user = Auth()->user();
        $invoice = new Invoice();
        $invoice->invoice_type = $request->invoice_type;
        $invoice->branch_id = $request->branch;
        $invoice->name = $request->name;
        $invoice->phone = $request->phone;
        $invoice->address = $request->address;
        $invoice->car_description = $request->car_description;
        $invoice->invoice_status = $request->invoice_status;
        $invoice->note = $request->note;
        $invoice->receivedـdate = $request->receivedـdate;
        $invoice->deliveryـdate = $request->deliveryـdate;
        $invoice->sales = $user->name;

       
        $carInfoArray = [];
        foreach ($request->car_no as $key => $value) {
            $carInfoArray[] = [
                'car_no' => $request->car_no[$key],
                'car_type' => $request->car_type[$key],
                'service' => $request->service[$key],
                'price' => $request->price[$key],
            ];
        }
        $invoice->car_info = $carInfoArray;


        $client = new Client();
        $client->name = $request->name;
        $client->phone = $request->phone;
        $client->address = $request->address;
        // $client->car_no = $request->car_no;
        // $client->car_type = $request->car_type;
        // $client->price = $request->price;
        // $client->service = $request->service;
        $client->car_description = $request->car_description;
        $client->note = $request->note;
        $client->receivedـdate = $request->receivedـdate;
        $client->deliveryـdate = $request->deliveryـdate;
        // $client->sales = $user->name;

        $carInfoArray = [];
        foreach ($request->car_no as $key => $value) {
            $carInfoArray[] = [
                'car_no' => $request->car_no[$key],
                'car_type' => $request->car_type[$key],
                'service' => $request->service[$key],
                'price' => $request->price[$key],
            ];
        }
        $client->car_info = $carInfoArray;



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


        $images = $request->file('images');
        $imageNames = [];

        if ($images) {
            foreach ($images as $image) {
                $imageName = $image->getClientOriginalName();
                $image->move(public_path('carsimages'), $imageName);
                $imageNames[] = $imageName;
            }
            $invoice->images = $imageNames;
        }

        $client->images = $imageNames;
        $invoice->images = $imageNames;
       


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
            Storage::disk('public')->put('/' . $imageFileName, (string) $signature->encode('png'));

            $invoice->signature =  $imageFileName;
        } catch (\Throwable $th) {
            //throw $th;
        }


        $invoice->save();
        $client->save();
        return redirect()->back()->with('msg', 'Invoice Added Successfully');
    }

    // invoice.edit
    public function invoice_edit($id)
    {
        $invoice = Invoice::findOrFail($id);
        return view('Emart.Accountant.edit_invoice', compact('invoice'));
    }

    // update_invoice
    public function update_invoice(Request $request, $id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->invoice_type = $request->invoice_type;
        $invoice->name = $request->name;
        $invoice->phone = $request->phone;
        $invoice->address = $request->address;
        $invoice->car_description = $request->car_description;
        $invoice->invoice_status = $request->invoice_status;
        $invoice->note = $request->note;

        $carInfoArray = [];
        foreach ($request->car_no as $key => $value) {
            $carInfoArray[] = [
                'car_no' => $request->car_no[$key],
                'car_type' => $request->car_type[$key],
                'service' => $request->service[$key],
                'price' => $request->price[$key],
            ];
        }
        $invoice->car_info = $carInfoArray;

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

        $invoice->save();
        return redirect()->back()->with('msg', 'Invoice Updated Successfully');
    }

    // invoice_delete
    public function invoice_delete($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->delete();
        return redirect()->back()->with('msg', 'Invoice Deleted Successfully');
    }

    // delete_all_invoices
    public function delete_all_invoices(){
        Invoice::truncate();
        return redirect()->back()->with('msg','All Invoices Deleted');
    }

    public function print_invoice($id)
    {
        $invoice = Invoice::findOrFail($id);
        return view('Emart.Accountant.invoice', compact('invoice'));
    }

    // purches_page
    public function purches_page()
    {
        $data = Purche::all();
        return view('Emart.Accountant.purches_page', compact('data'));
    }

    // add_purches
    public function add_purches(Request $request)
    {
        $item  = new Purche();
        $item->name = $request->name;
        $item->price = $request->price;
        $item->quantity = $request->quantity;
        $item->total_price = $request->total_price;
        $item->date = $request->date;
        $item->save();
        return redirect()->back()->with('msg', 'item Added Successfully');
    }

    // item_delete
    public function item_delete($id)
    {
        $item = Purche::findOrFail($id);
        $item->delete();
        return redirect()->back()->with('msg', 'Item Added Successfully');
    }

    //delete_purches
    public function delete_purches()
    {
        DB::table('purches')->truncate();
        return redirect()->back()->with('msg', 'All Data deleted Successfully');
    }

    // check_page
    public function check_page()
    {

        $data = Check::orderBy('date', 'asc')->get();
        return view('Emart.Accountant.check_page', compact('data'));
    }

    // add_check
    public function add_check(Request $request)
    {
        $check = new Check();
        $check->esdar = $request->esdar;
        $check->value = $request->value;
        $check->title = $request->title;
        $check->number = $request->number;
        $check->date = $request->date;
        $check->name = $request->name;
        $check->save();
        return redirect()->back()->with('msg', 'Check Added Successfully');
    }

    //change_status
    public function change_status($id)
    {
        $check = Check::findOrFail($id);
        $check->status = 'تم الدفع';
        $check->save();
        return redirect()->back()->with('msg', 'Check Updated Successfully');
    }

    //delete_check
    public function delete_check($id)
    {
        $check = Check::findOrFail($id);
        $check->delete();
        return redirect()->back()->with('msg', 'Check Deleted Successfully');
    }

    // rent_page
    public function rent_page()
    {
        $data = Bill::all();
        return view('Emart.Accountant.rent_page', compact('data'));
    }

    // add_bills
    public function add_bills(Request $request)
    {
        $bill = new Bill();
        $bill->value = $request->value;
        $bill->bill = $request->bill;
        $bill->date = $request->date;
        $bill->save();
        return redirect()->back()->with('msg', 'Add Bill Successfully');
    }

    // bill_delete
    public function bill_delete($id)
    {
        $bill = Bill::findOrFail($id);
        $bill->delete();
        return redirect()->back()->with('msg', 'Bills Deleted Successfully');
    }

    // worker_page
    public function worker_page()
    {
        $depart = Department::all();
        $workers = Worker::all();
        return view('Emart.Accountant.worker_page', compact('depart', 'workers'));
    }

    // add_report
    public function add_report(Request $request)
    {
        $report = new Report();
        $report->name = $request->name;
        $report->report = $request->report;
        $report->date = $request->date;
        $report->save();
        return redirect()->back()->with('msg', 'Add Report Successfully');
    }

    // reports_page
    public function reports_page()
    {
        $reports = Report::all();
        return view('Emart.Accountant.reports_page', compact('reports'));
    }
    // search_report
    public function search_report(Request $request)
    {
        $search  = $request->search;
        $reports = DB::table('reports')->where('name', 'like', '%' . $search . '%')
            ->orWhere('name', 'like', '%' . $search)
            ->orWhere('name', $search)
            ->get();
        return view('Emart.Accountant.reports_page', compact('reports'));
    }

    // report_delete
    public function report_delete($id)
    {
        $report = Report::findOrFail($id);
        $report->delete();
        return redirect()->back()->with('msg', 'Delete Report Successfully');
    }

    // add_department
    public function add_department(Request $request)
    {
        $data = new Department();
        $data->name = $request->department;
        $data->save();
        return redirect()->back()->with('msg', 'Department Added Successfully');
    }

    // add_worker
    public function add_worker(Request $request)
    {
        $worker = new Worker();
        $worker->name = $request->name;
        $worker->department = $request->department;
        $worker->salary = $request->salary;
        $worker->visa_type = $request->visa_type;
        $worker->visa_date = $request->visa_date;

        $worker->save();
        return redirect()->back()->with('msg', 'Worker Added Succesfully');
    }

    // privacy
    public function privacy()
    {
        return view('privacy');
    }

    

    // alin_invoices_page
    public function alin_invoices_page(){
        $data = Invoice::where('branch', 'alain')->orderBy('id', 'desc')->get();
        return view('Emart.Accountant.Alain.allalaininvoices',compact('data'));
    }


    // branches_page
    public function branches_page(){
        
        return view('Emart.Accountant.branches');
    }

    // branch_delete
    public function branch_delete($id){
        $branch = Branch::findOrFail($id);
        $branch->delete();
        return redirect()->back()->with('msg','Branch Deleted Successfully');
    }

    // branch_edit
    public function branch_edit($id){
        $branch= Branch::findOrFail($id);
        return view('Emart.Accountant.edit_branch',compact('branch'));
    }

    // edit_branch_confirmation
    public function edit_branch_confirmation(Request $request,$id){
        $branch=Branch::findOrFail($id);
        $branch->branch = $request->branch;
        $branch->save();
        return redirect()->back()->with('msg', 'Branch Updated Successfully');
    }


}
