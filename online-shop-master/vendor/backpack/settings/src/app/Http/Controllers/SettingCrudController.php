<?php

namespace Backpack\Settings\app\Http\Controllers;

use Backpack\CRUD\app\Http\Controllers\CrudController;
// VALIDATION
use Backpack\Settings\app\Http\Requests\SettingRequest as StoreRequest;
use Backpack\Settings\app\Http\Requests\SettingRequest as UpdateRequest;

class SettingCrudController extends CrudController
{
    public function __construct()
    {
        parent::__construct();

        $this->crud->setModel("Backpack\Settings\app\Models\Setting");
        $this->crud->setEntityNameStrings('setting', 'settings');
        $this->crud->setRoute('admin/setting');
        $this->crud->denyAccess(['create', 'delete']);
        $this->crud->setColumns(['name', 'value', 'description']);
        $this->crud->addField([
                                'name'     => 'name',
                                'label'    => 'Name',
                                'type'     => 'text',
                                'disabled' => 'disabled',
                            ]);
    }

    /**
     * Display all rows in the database for this entity.
     * This overwrites the default CrudController behaviour:
     * - instead of showing all entries, only show the "active" ones.
     *
     * @return Response
     */
    public function index()
    {
        // if view_table_permission is false, abort
        $this->crud->hasAccessOrFail('list');
        $this->crud->addClause('where', 'active', 1); // <---- this is where it's different from CrudController::index()

        $this->data['entries'] = $this->crud->getEntries();
        $this->data['crud'] = $this->crud;
        $this->data['title'] = ucfirst($this->crud->entity_name_plural);

        // load the view from /resources/views/vendor/backpack/crud/ if it exists, otherwise load the one in the package
        return view('crud::list', $this->data);
    }

    public function store(StoreRequest $request)
    {
        return parent::storeCrud();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $this->crud->hasAccessOrFail('update');

        $this->data['entry'] = $this->crud->getEntry($id);
        $this->crud->addField((array) json_decode($this->data['entry']->field)); // <---- this is where it's different
        $this->data['crud'] = $this->crud;
        $this->data['fields'] = $this->crud->getUpdateFields($id);
        $this->data['title'] = trans('backpack::crud.edit').' '.$this->crud->entity_name;

        $this->data['id'] = $id;

        // load the view from /resources/views/vendor/backpack/crud/ if it exists, otherwise load the one in the package
        return view('crud::edit', $this->data);
    }

    public function update(UpdateRequest $request)
    {
        return parent::updateCrud();
    }
}
