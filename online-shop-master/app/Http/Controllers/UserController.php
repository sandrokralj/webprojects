<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Links;
use App\Order;

use App\Category_product;
use App\Blocks;
use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use Session;

class UserController extends Controller
{
    public function getSignUp(){
        $links = Links::all();
        $blocks = Blocks::all();
        $categories = Category_product::all();
        return view('user.signup', ['links' => $links, 'blocks' => $blocks,'categories' => $categories]);
    }

    public function postSignUp(Request $request){
        $links = Links::all();
        $blocks = Blocks::all();
        $categories = Category_product::all();
        $this->validate($request, [
            'email' => 'email|required|unique:users',
            'password' => 'required|min:4'
        ]);

        $user = new Customer([
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);
        $user->save();

        Auth::guard('api')->login($user);

        if(Session::has('oldUrl')){
            $oldUrl = Session::get('oldUrl');
            Session::forget('oldUrl');
            return redirect()->to($oldUrl);
        }

        return redirect()->route('user.profile', ['links' => $links, 'blocks' => $blocks,'categories' => $categories]);
    }
    
    public function getSignIn(){
        $links = Links::all();
        $blocks = Blocks::all();
        $categories = Category_product::all();
        return view('user.signin', ['links' => $links, 'blocks' => $blocks,'categories' => $categories]);
    }
    public function postSignIn(Request $request){
        $links = Links::all();
        $blocks = Blocks::all();
        $categories = Category_product::all();
        $this->validate($request, [
            'email' => 'email|required',
            'password' => 'required|min:4'
        ]);
        
        if(Auth::guard('api')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){
            if(Session::has('oldUrl')){
                $oldUrl = Session::get('oldUrl');
                Session::forget('oldUrl');
                return redirect()->to($oldUrl);
            }
            return redirect()->route('user.profile', ['links' => $links, 'blocks' => $blocks,'categories' => $categories]);
        }
        return redirect()->back();
    }
    public function getProfile(){
        $order = Order::find(Auth::guard('api')->user()->id);
              
        $links = Links::all();
        $blocks = Blocks::all();
        $categories = Category_product::all();
        return view('user.profile', ['order' => $order, 'links' => $links, 'blocks' => $blocks, 'categories' => $categories]);
    }
    
    public function getLogout(){
        $links = Links::all();
        $blocks = Blocks::all();
        $categories = Category_product::all();
        Auth::guard('api')->logout();
        return redirect()->route('user.signin', ['links' => $links, 'blocks' => $blocks,'categories' => $categories]);
    }
}
