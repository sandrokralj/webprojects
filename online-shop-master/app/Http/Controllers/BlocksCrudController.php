<?php namespace App\Http\Controllers;

use App\Blocks;
use App\Category_product;
use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\BlocksRequest as StoreRequest;
use App\Http\Requests\BlocksRequest as UpdateRequest;

class BlocksCrudController extends CrudController {

	public function __construct() {
        parent::__construct();

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/
        $this->crud->setModel("App\Blocks");
        $this->crud->setRoute("admin/blocks");
        $this->crud->setEntityNameStrings('blocks', 'blocks');

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/
		$this->crud->setColumns(['name', 'title', 'text','color', 'background', 'item']);

		$this->crud->addField([
			'name' => 'name',
			'label' => "Path"
		],'update/create/both');
		$this->crud->addField([
			'name' => 'title',
			'label' => "Title"
		]);
		$this->crud->addField([
			'name' => 'text',
			'label' => "Text",
			'type' => 'wysiwyg'
		]);
		$this->crud->addField([
			'name' => 'color',
			'label' => "Background Color",
			'type' => 'color'
		]);
		$this->crud->addField([
			'name' => 'background',
			'label' => "Background Image",
			'type' => 'browse'
		]);
		$this->crud->addField([
			'name' => 'item',
			'label' => "Html field",
			'type' => 'textarea'
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
}