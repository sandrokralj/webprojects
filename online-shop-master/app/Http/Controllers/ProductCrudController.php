<?php namespace App\Http\Controllers;

use App\Blocks;
use App\Category_product;
use App\Order;
use App\Links;
use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\ProductRequest as StoreRequest;
use App\Http\Requests\ProductRequest as UpdateRequest;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Mockery\Exception;
use Session;
use Auth;
use Stripe\Charge;
use Stripe\Stripe;

class ProductCrudController extends CrudController {

	public function __construct() {
        parent::__construct();

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/
        $this->crud->setModel("App\Product");
        $this->crud->setRoute("admin/product");
        $this->crud->setEntityNameStrings('product', 'products');

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION 
		|--------------------------------------------------------------------------
		*/
		$this->crud->setColumns(['imagePath1', 'imagePath2', 'imagePath3', 'category', 'price', 'title', 'description']);
		$this->crud->addField([
			'name' => 'imagePath1',
			'label' => "Image 1",
			'type' => 'browse'
		],'update/create/both');
		$this->crud->addField([
			'name' => 'imagePath2',
			'label' => "Image 2",
			'type' => 'browse'
		],'update/create/both');
		
		$this->crud->addField([
			'name' => 'imagePath3',
			'label' => "Image 3",
			'type' => 'browse'
		],'update/create/both');
		$this->crud->addField([
			'name' => 'category',
			'label' => "Category",
			'type' => 'select',
		    'entity' => 'category', // the method that defines the relationship in your Model
		    'attribute' => 'title', // foreign key attribute that is shown to user
		    'model' => "App\Category_product" // foreign key model

		]);
		$this->crud->addField([
			'name' => 'price',
			'label' => "Price",
			'type' => 'number'
		]);
		$this->crud->addField([
			'name' => 'title',
			'label' => "Title"
		]);
		$this->crud->addField([
			'name' => 'description',
			'label' => "Description",
			'type' => 'wysiwyg'
		]);

    }

	public function store(StoreRequest $request)
	{
		return parent::storeCrud();
	}

	public function update(UpdateRequest $request)
	{
		return parent::updateCrud();
	}

	public function getIndex(Request $request, $name )
	{
		$links = Links::all();
		$blocks = Blocks::all();
		
		$categories = Category_product::all();
		$category = 0;
		foreach ($categories as $cat){
			if ($cat->name == $name)
			{
				$category = $cat;
			}
		}
		$products = Product::all()->where('category', $category->id);
		Session::put('oldUrl', $request->url());

		return view('shop.category', ['links' => $links, 'blocks' => $blocks,'products' => $products, 'categories' => $categories, 'category' => $category]);

	}
	public function getAll(Request $request){
		$links = Links::all();
		$blocks = Blocks::all();
		$products = Product::all();
		$categories = Category_product::all();
		$category = $categories[1];
		$category->title = 'Все товары';
		$categories = Category_product::all();
		Session::put('oldUrl', $request->url());
		return view('shop.category', ['links' => $links, 'blocks' => $blocks,'products' => $products, 'categories' => $categories, 'category' => $category]);
	}
	public function getItem(Request $request ,$id){
		$links = Links::all();
		$blocks = Blocks::all();
		$product = Product::find($id);
		$categories = Category_product::all();
		$category = 0;
		foreach ($categories as $cat){
			if ($cat->id == $product->category)
			{
				$category = $cat;
			}
		}
		Session::put('oldUrl', $request->url());
		$products = Product::all()->where('category',$product->category);
		//dd($products);

		for($i=0; $i < count($products);$i++) {
			if ($products[$i]->id == $id) {
				unset($products[$i]);
			}

		}
		foreach ($products as $prod){
			if($prod->id == $id){
				unset($prod);
			}
		}
		//dd($products);
		//unset($products[$product]);
		if(count($products) > 4){
			$products = $products->random(4);
		}
		
		return view('shop.item', ['links' => $links, 'blocks' => $blocks,'products' => $products, 'product' => $product, 'categories' => $categories, 'category' => $category]);
	}
	public function getAddToCart(Request $request, $id){
		$links = Links::all();
		$blocks = Blocks::all();
		$product = Product::find($id);
		$categories = Category_product::all();
		$category = 0;
		foreach ($categories as $cat){
			if ($cat->id == $product->category)
			{
				$category = $cat;
			}
		}


		$oldCart = Session::has('cart') ? Session::get('cart') : null;

		//dd(Session::get('oldUrl'));

		$cart = new Cart($oldCart);
		$cart->add($product, $product->id);

		$request->session()->put('cart', $cart);
		return redirect()->back();
		//return redirect()->route('product.index', ['links' => $links, 'blocks' => $blocks,'name' => $category->name ,'categories' => $categories]);
	}
	public function addByCart(Request $request, $id){
		$product = Product::find($id);
		
		$oldCart = Session::has('cart') ? Session::get('cart') : null;

		$cart = new Cart($oldCart);
		$cart->add($product, $product->id);

		$request->session()->put('cart', $cart);
		return redirect()->back();
		//return redirect()->route('product.index', ['links' => $links, 'blocks' => $blocks,'name' => $category->name ,'categories' => $categories]);
	}
	public function reduceByCart(Request $request, $id){
		$product = Product::find($id);

		$oldCart = Session::has('cart') ? Session::get('cart') : null;
		$cart = new Cart($oldCart);

		$cart->reduce($product, $product->id);

		$request->session()->put('cart', $cart);
		return redirect()->back();
	}
	public function reduceAllByCart(Request $request, $id){
		$product = Product::find($id);

		$oldCart = Session::has('cart') ? Session::get('cart') : null;
		$cart = new Cart($oldCart);

		$cart->reduceAll($product, $product->id);

		$request->session()->put('cart', $cart);
		return redirect()->back();
	}
	public function getCart(){
		$links = Links::all();
		$blocks = Blocks::all();
		$categories = Category_product::all();
		if (!Session::has('cart')){
			return view('shop.shopping-cart', ['links' => $links, 'blocks' => $blocks,'categories' =>$categories, 'products' => null]);
		}
		$oldCart = Session::get('cart');
		$oldUrl = 'shop.category';
		if(Session::has('oldUrl')) {
			$oldUrl = Session::get('oldUrl');
		}
		$cart = new Cart($oldCart);
		return view('shop.shopping-cart', ['oldUrl' => $oldUrl, 'links' => $links, 'blocks' => $blocks,'categories' =>$categories, 'products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
	}

	public function getCheckout(){
		$links = Links::all();
		$blocks = Blocks::all();
		$categories = Category_product::all();
		if (!Session::has('cart')){
			return view('shop.shopping-cart', ['links' => $links, 'blocks' => $blocks,'categories' =>$categories, 'products' => null]);
		}
		$oldCart = Session::get('cart');
		$cart = new Cart($oldCart);
		$total = $cart->totalPrice;
		return view('shop.checkout',['total' => $total, 'links' => $links, 'blocks' => $blocks,'categories' =>$categories]);
	}

	public function postCheckout(Request $request) {
		$links = Links::all();
		$blocks = Blocks::all();
		$categories = Category_product::all();
		if (!Session::has('cart')){
			return redirect()->route('shop.shoppingCart');
		}
		$oldCart = Session::get('cart');
		$cart = new Cart($oldCart);

		Stripe::setApiKey('sk_test_qYarm7eRCUtVgTyDQ3UyiYKG');
		try{
			$charge = Charge::create(array(
				"amount" => $cart->totalPrice * 100,
				"currency" => "uah",
				"source" => $request->input('stripeToken'),
				"description" => "Test Charge"
			));
			$order = new Order();
			$order->cart = serialize($cart);
			$order->address = $request->input('address');
			$order->name = $request->input('name');
			$order->payment_id = $charge->id;
			
			Auth::user()->orders()->save($order);
		} catch(\Exception $e) {
			return redirect()->route('checkout')->with('error', $e->getMessage());
		}
		
		Session::forget('cart');
		return redirect()->route('product.all')->with('success', 'Successfully purchsed products!');
	}
	
	
	public function getResults($keyword){
		$links = Links::all();
		$blocks = Blocks::all();
		$categories = Category_product::all();
		$search = Product::search($keyword);
		//$search = Product::all();
		//dd($keyword);
		return view('shop.search',['search' => $search, 'links' => $links, 
			'blocks' => $blocks,'categories' =>$categories]);
	}
	public function postSearch(){
		$keyword = Input::get('keyword');
		
		if(empty($keyword)){
			
		}
		return redirect()->route('results',['keyword' => $keyword]);
		
	}
	
}