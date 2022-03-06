<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\Order;
use App\Models\Quote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Unique;

use function GuzzleHttp\Promise\all;

class LogisticsController extends Controller
{
    public function homePage(Request $request)
    {
        //Check if the form method is post and validate
        if ($request->isMethod('POST')) {
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'pickup' => 'required',
                'dropoff' => 'required',
                'weight' => 'required',
                'distance' => 'required',
                'phone' => 'required',
                'freight' => 'required'
            ]);

            //Request all data from the form and append it variable $all_data
            $all_data = $request->all();

            //Add status and tracking id to the variable $all_data which is now holding all the data from the form
            $all_data['status'] = 'pending';
            $all_data['tracking_id'] = uniqid();

            //Different ways to get data on a particular column in the database
            //First Method
            // $kmadmin = DB::table('quotes')->pluck('distanceprice');
            // $kgadmin = DB::table('quotes')->pluck('weightprice');

            //Second Method
            $kmadmin = Quote::where('id', '1')->pluck('distanceprice');
            $kgadmin = Quote::where('id', '1')->pluck('distanceprice');;

            //Check For the cutomers input and calculate with the rates set.
            if ($request->freight == 'airFreight') {
                $amount = $request->weight * $kgadmin[0] + $request->distance * $kmadmin[0] + 50000;
            } elseif ($request->freight == 'oceanFreight') {
                $amount = $request->weight * $kgadmin[0] + $request->distance * $kmadmin[0] + 20000;
            } elseif ($request->freight == 'roadFreight') {
                $amount = $request->weight * $kgadmin[0] + $request->distance * $kmadmin[0] + 10000;
            }
            //Append amount to variable $all_data which is carrying all the data from the form
            $all_data['amount'] = $amount;

            return redirect()->route('estimate', $all_data);
        }

        return view('home');
    }

    public function aboutUs(Request $request)
    {

        //Check if the form method is post and validate
        if ($request->isMethod('POST')) {
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'pickup' => 'required',
                'dropoff' => 'required',
                'weight' => 'required',
                'distance' => 'required',
                'phone' => 'required',
                'freight' => 'required'
            ]);

            //Request all data from the form and save to an array
            $all_data = $request->all();
            //Add status and tracking id to the variable $all_data which is now holding all the data from the form
            $all_data['status'] = 'pending';
            $all_data['tracking_id'] = uniqid();

            //Different ways to get data on a particular column in the database
            //First Method
            // $kmadmin = DB::table('quotes')->pluck('distanceprice');
            // $kgadmin = DB::table('quotes')->pluck('weightprice');

            //Second Method
            $kmadmin = Quote::where('id', '1')->pluck('distanceprice');
            $kgadmin = Quote::where('id', '1')->pluck('distanceprice');;

            //Check For the cutomers input and calculate with the rates set.
            if ($request->freight == 'airFreight') {
                $amount = $request->weight * $kgadmin[0] + $request->distance * $kmadmin[0] + 50000;
            } elseif ($request->freight == 'oceanFreight') {
                $amount = $request->weight * $kgadmin[0] + $request->distance * $kmadmin[0] + 20000;
            } elseif ($request->freight == 'roadFreight') {
                $amount = $request->weight * $kgadmin[0] + $request->distance * $kmadmin[0] + 10000;
            }
            //Append amount to variable $all_data which is carrying all the data from the form
            $all_data['amount'] = $amount;

            return redirect()->route('estimate', $all_data);
        }

        $all_about = About::all();

        return view('about', compact('all_about'));
    }


    public function requestQuote(Request $request)
    {

        //Check if the form method is post and validate
        if ($request->isMethod('POST')) {
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'pickup' => 'required',
                'dropoff' => 'required',
                'weight' => 'required',
                'distance' => 'required',
                'phone' => 'required',
                'freight' => 'required'
            ]);

            //Request all data from the form and save to an array
            $all_data = $request->all();
            //Add status and tracking id to the variable $all_data which is now holding all the data from the form
            $all_data['status'] = 'pending';
            $all_data['tracking_id'] = uniqid();

            //Different ways to get data on a particular column in the database
            //First Method
            // $kmadmin = DB::table('quotes')->pluck('distanceprice');
            // $kgadmin = DB::table('quotes')->pluck('weightprice');

            //Second Method
            $kmadmin = Quote::where('id', '1')->pluck('distanceprice');
            $kgadmin = Quote::where('id', '1')->pluck('distanceprice');
            $kgland = Quote::where('id', 1)->pluck('land');
            $kgair = Quote::where('id', 1)->pluck('air');
            $kgocean = Quote::where('id', 1)->pluck('ocean');

            //Check For the cutomers input and calculate with the rates set.
            if ($request->freight == 'airFreight') {
                $amount = $request->weight * $kgadmin[0] + $request->distance * $kmadmin[0] + $kgair[0];
            } elseif ($request->freight == 'oceanFreight') {
                $amount = $request->weight * $kgadmin[0] + $request->distance * $kmadmin[0] + $kgocean[0];
            } elseif ($request->freight == 'roadFreight') {
                $amount = $request->weight * $kgadmin[0] + $request->distance * $kmadmin[0] + $kgland[0];
            }
            //Append amount to variable $all_data which is carrying all the data from the form
            $all_data['amount'] = $amount;

            return redirect()->route('estimate', $all_data);
        }

        return view('quote');
    }


    public function getEstimate(Request $request)
    {
        //Collect all data coming from Quote through request and append it to $variable $all_data
        $all_data = $request->all();

        //Check if the form method is post and save it to database
        if ($request->isMethod('POST')) {

            $saved_to_db = Order::create($request->all());

            //After saved return view order with the data saved through compact to the blade file. 
            return view('order', compact('saved_to_db'));
        }

        //After collecting the data at the top through request all and append to $all_data return view estimate with the data compacted to the blade.   
        return view('estimate', compact('all_data'));
    }


    public function placeOrder(Request $request)
    {

        // $all_data = Order::all();
        return view('order');
    }


    public function trackParcel(Request $request)
    {
        //Check if the form method is post and validate
        if ($request->isMethod('POST')) {
            $request->validate([
                'tracking_id' => 'required'
            ]);

            //Collect the tracking the user and asign it to a variable $tracking_id
            $tracking_id = $request->tracking_id;

            //Check for the user tracking id 1n the database and asign all the order to a variable $track 
            $track = Order::where('tracking_id', $tracking_id)->first();

            //Return view track and compact it the variable track to display all the user order. 
            return view('track', compact('track'));
        }
        return view('track');
    }

    public function blogPage(Request $request)
    {
        //Get all blogs from the database through the Blog model and assign it to a variable $all_blog.
        $all_blog = Blog::all();

        //Return view blog with the compacted data 
        return view('blog', compact('all_blog'));
    }

    public function blogs()
    {
        $blogs = Blog::paginate(5);
    return response()->json($blogs);

    }

    public function blog_single($id){
        $blog = Blog::find($id);
        return response()->json($blog);
    }

    public function contactUs(Request $request)
    {
        //Check if the form method is post and validate
        if ($request->isMethod("POST")) {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
                'subject' => 'required',
                'comment' => 'required',
            ]);

            //Request all data from the form and append it variable $all_Contact
            $all_Contact = $request->all();

            // Save to Database
            $saved_to_db = Contact::Create($all_Contact);
            if ($saved_to_db) {
                return view('/contact')->with('success', "Your Comment was sent successfully");
            } else {
                return back()->with('error', "Your Comment Was not Sent");
            }
        }

        return view('contact');
    }
}
