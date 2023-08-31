<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MachineRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class MachineCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class MachineCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Machine::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/machine');
        CRUD::setEntityNameStrings('machine', 'machines');

        CRUD::column('num_serie');
        CRUD::column('intitule');
        CRUD::addColumn([
            'label'=> 'Entreprise',
            'name' => 'entreprise_id',
            'type' => 'select',
            'entity'    => 'entreprise',
            'attribute' => 'intitule',
            'model'     => "App\Models\Entreprise"
        ]);

        CRUD::addColumn([
            'label'=> 'Caracteristiques',
            'name' => 'caract',
            //'type' => 'upload',
        ]);
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        /*CRUD::column('intitule');
        CRUD::column('num_serie');
        CRUD::addColumn([
            'label'=> 'Entreprise',
            'name' => 'entreprise_id',
            'type' => 'select',
            'entity'    => 'entreprise',
            'attribute' => 'intitule',
            'model'     => "App\Models\Entreprise"
        ]);*/

        /* CRUD::column('caract');
        CRUD::column('created_at');
        CRUD::column('updated_at');*/

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(MachineRequest::class);

        CRUD::field('intitule');
        CRUD::field('num_serie');
       // CRUD::field('caract');
        CRUD::addField([
            'label'=> 'Caracteristiques',
            'name' => 'caract',
            'type' => 'upload',
            'crop' => true,
            'aspect_ratio' => 1,
        ]);
        CRUD::addField([
            'label'=> 'Entreprise',
            'name' => 'entreprise_id',
            'type' => 'select',
            'entity' => 'entreprise',
            'attribute' => 'intitule',

        ]);


        //CRUD::field('caract')->type('text');

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number'])); 
         */

        $this->crud->replaceSaveActions(
            [
                'name' => 'Enregistrer',
                'visible' => function($crud) {
                    return true;
                },
                'redirect' => function($crud, $request, $itemId) {
                    return $crud->route;
                },
            ],
        );
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
