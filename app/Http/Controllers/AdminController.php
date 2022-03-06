<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\Order;
use App\Models\Quote;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function showDashboard()
    {
        //Paginate the pages and assign to a variable
        $orders = Order::paginate(5);
        $all_blog = Blog::paginate(1);
        $all_Contact = Contact::paginate(5);

        //return the view with the variable compacted 
        return view('dashboard', compact('all_Contact', 'orders', 'all_blog'));
    }


    public function logout()
    {
        //Flush out the adminnin session
        Session::flush();

        return redirect('login');
    }


    public function adminLogin(Request $request)
    {
        //Check if the form method is post and validate
        if ($request->isMethod('POST')) {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);

            //Check with auth if the admin email and password matches the one in the database
            $email_pass = Auth::attempt(['email' => $request->email, 'password' => $request->password]);

            //If true run the if condition and let the admin login
            if ($email_pass) {
                return redirect('/dashboard')->with('success', 'Welcome');
            } else {
                return back()->with('error', "Email or Password Incorrect");
            }
        }

        return view('login');
    }

    public function signUp(Request $request)
    {
        //Declare an instance of a new user
        $user = new User();
        //Check if the form method is post and validate
        if ($request->isMethod('POST')) {
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
            ]);

            // Append the input to the variable user one by one and hash the password
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);

            //save to db
            $save_to_db = $user->save();
            if ($save_to_db) {
                return redirect('login');
            }
        }

        return view('signup');
    }


    public function adminCont(Request $request)
    {
        //collect all contact data and append to a variable all_contact
        $all_Contact = Contact::all();
        //Paginate the pages and assign to a variable
        $all_Contact = Contact::paginate(5);

        return view('adminContact', compact('all_Contact'));
    }


    public function adminblog(Request $request)
    {
        //collect all blog data and append to a variable all blog
        $all_blog = Blog::all();
        //Paginate the pages and assign to a variable
        $all_blog = Blog::paginate(2);

        //return view and compact it
        return view('adminBlog', compact('all_blog'));
    }


    public function adminorder(Request $request)
    {
        //Paginate the pages and assign to a variable
        $orders = Order::paginate(5);

        return view('adminOrder', compact('orders'));
    }


    public function showdetail()
    {
        //Paginate the pages and assign to a variable
        $all_Contact = Contact::all();

        return view('showDetails', compact('all_Contact'));
    }


    public function addblog(Request $request)
    {
        //Check if the form method is post and validate
        if ($request->isMethod('POST')) {
            $request->validate([
                // 'image' => 'required',
                'title' => 'required',
                'content' => 'required',
            ]);

            //Request all data from the form and append it variable $all_blog
            $all_blog = $request->all();
            //Get the image name and append it to a variable $name
            if($request->hasFile('image')){

            $name = $request->file('image')->getClientOriginalName();
            //Get the image
            $file = $request->file('image');
            //Append the destination of the image to a variable $destination 
            $destination = 'images';
            //Move the image to the destination with the name
            $file->move($destination, $file->getClientOriginalName());
            //Append the image name to $all_blog
            $all_blog['image'] = $name;
            }

            //Save to  db
            $save_to_db = Blog::create($all_blog);
            //check if save and perform the if condition
            if ($save_to_db) {
                return response()->json(['msg' => 'Blog Saved Successflly', "data" =>$save_to_db]);
                // return back()->with('success', 'Blog Successfully Updated');
            } 
            // else {
            //     return view('addBlog')->with('error', 'Blog was not updated');
            // }
        }
        return view('addBlog');
    }


    public function adminabout(Request $request)
    {
        //find the 1 column on about table and append to $about variable
        $about = About::find(1);

        return view('adminAbout', compact('about'));
    }


    public function editabout(Request $request)
    {
        //Check if the form method is post and validate
        if ($request->isMethod('post')) {
            $request->validate([
                'about' => 'required',
                'mission' => 'required',
                'vision' => 'required',
            ]);

            //check for 
            $edit = About::where('id', '1')->update(['about' => $request->about, 'mission' => $request->mission, 'vision' => $request->vision]);
            if ($edit) {
                return back()->with('edited', 'About was successfullly edited');
            } else {
                return back()->with('error', 'About was not edited');
            }
        }


        $about = About::find(1);

        return view('editAbout', compact('about'));
    }


    public function adminor(Request $request)
    {
        //Check if the form method is post and validate
        if ($request->isMethod('POST')) {
            $request->validate([
                'status' => 'required'
            ]);

            //Check the order where 
            $check =  Order::where(['id' => $request->id])->update(['status' => $request->status]);

            return back()->with('success', 'Updated Successfully');
        }
        $orders = Order::find($request->id);

        return view('adminOr', compact('orders'));

        // return view('adminOr');
    }


    public function Calculator(Request $request)
    {
        //Check if the form method is post and validate
        if ($request->isMethod("POST")) {
            $updatquote = DB::table('quotes')->where('id', 1)->update([
                'distancekm' => $request->km,
                'weightkg' => $request->kg,
                'land' => $request->landp,
                'air' => $request->airp,
                'ocean' => $request->oceanp,
                'weightprice' => $request->weightp,
                'distanceprice' => $request->distancep,
            ]);


            $quote = DB::table('quotes')->first();
            return view('calculator', compact('quote'));
        }

        $quote = DB::table('quotes')->first();

        return view('calculator', compact('quote'));
    }

    public function Edit(Request $request, $id)
    {
        if ($request->isMethod('PUT')) {
            $request->all();
            $data = $request->all();
            $all_blog = Blog::find($id);
            $all_blog->image = $request->image;
            $all_blog->title = $request->title;
            $all_blog->content = $request->content;
            $all_blog->save();
            if ($all_blog->save()) {

                return response()->json(['msg', 'Upadated Successfully', 'data' => $all_blog]);
                // return back()->with('success', 'update');
            }
        }
        // $all_blog = Blog::find($id);
        // return view('edit', compact('all_blog'));
    }

    public function Delete($id)
    {

        Blog::destroy($id);
        return redirect('adminBlog');
    }
}
