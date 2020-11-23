<?php namespace App\Http\Controllers;

use App\Blocks;
use App\Image;
use App\Category_product;
use App\Links;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\ImageRequest as StoreRequest;
use App\Http\Requests\ImageRequest as UpdateRequest;

class ImageCrudController extends CrudController {

	public function __construct() {
        parent::__construct();

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/
        $this->crud->setModel("App\Image");
        $this->crud->setRoute("admin/images");
        $this->crud->setEntityNameStrings('images', 'images');

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/

		$this->crud->enableReorder('anton', 1);
		$this->crud->allowAccess('reorder');
		$this->crud->setColumns(['path_logo' ,'path', 'title', 'color']);
		
		$this->crud->addField([
			'name' => 'path',
			'label' => "Path",
			'type' => 'browse'
		],'update/create/both');
		$this->crud->addField([
			'name' => 'title',
			'label' => "Tagline"
		],'update/create/both');

		$this->crud->addField([
			'name' => 'color',
			'label' => "Color",
			'type' => 'color'
		],'update/create/both');


    }

	public function getIndex()
	{

		$links = Links::all();
		$images = Image::all();
		$blocks = Blocks::all();


		$categories = Category_product::all();
		$num = 0;
		foreach ($categories as $category){
			$num++;
		}
		return view('shop.index', ['num' => $num, 'links' => $links, 'images' => $images, 'categories' => $categories, 'blocks' => $blocks]);
	}
	public function store(StoreRequest $request)
	{
		return parent::storeCrud();
	}

	public function update(UpdateRequest $request)
	{
		return parent::updateCrud();
	}
}