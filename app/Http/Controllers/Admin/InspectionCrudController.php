<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\InspectionRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class InspectionCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class InspectionCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Inspection::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/inspection');
        CRUD::setEntityNameStrings('inspection', 'inspections');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::addColumn([
            'label' => 'Machine', 
            'name' => 'machine_id', 
            'type' => 'select',
            'attribute' => 'intitule',
        ]); 

        CRUD::addColumn([
            'label' => 'Inspecteur', 
            'name' => 'inspecteur_id', 
            'type' => 'select',
            'attribute' => 'nom_prenom',
        ]);

        CRUD::column('reference');
        CRUD::column('intitule');
        CRUD::column('categorie');
        CRUD::column('rapport_file');
        CRUD::column('created_at');
        CRUD::column('updated_at');

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
        CRUD::setValidation(InspectionRequest::class);

       CRUD::addField([
            'label' => 'Machine', 
            'name' => 'machine_id', 
            'type' => 'select',
            'entity' => 'machine',
            'attribute' => 'intitule',
        ]); 

        CRUD::addField([
            'label' => 'Inspecteur', 
            'name' => 'inspecteur_id', 
            'type' => 'select',
            'entity' => 'inspecteur',
            'attribute' => 'nom_prenom',
        ]);

        CRUD::addField([
            'label' => 'Machine', 
            'name' => 'machine_id', 
            'type' => 'select',
            'entity' => 'machine',
            'attribute' => 'intitule',
        ]); 

        CRUD::field('reference');
        CRUD::field('intitule');
        CRUD::field('categorie');
        //CRUD::field('rapport_file');
        CRUD::addField([   // Upload
            'name'      => 'rapport_file',
            'label'     => 'Rapport (pdf)',
            'type'      => 'upload',
            'upload'    => true,
            'disk'      => 'local', // if you store files in the /public folder, please omit this; if you store them in /storage or S3, please specify it;
    // optional:
    //'temporary' => 10 // if using a service, such as S3, that requires you to make temporary URLs this will make a URL that is valid for the number of minutes specified
]);

        

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
