<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\EntrepriseRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class EntrepriseCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class EntrepriseCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Entreprise::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/entreprise');
        CRUD::setEntityNameStrings('entreprise', 'entreprises');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('intitule');
        CRUD::column('adresse');
        CRUD::column('telephone');
        CRUD::column('email');
        CRUD::column('password');
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
        CRUD::setValidation(EntrepriseRequest::class);

        /*CRUD::field('intitule');
        CRUD::field('adresse');
        CRUD::field('telephone');
        CRUD::field('email');
        CRUD::field('password');*/

        CRUD::addField([
            'label' => 'Nom de l\'entreprise',
            'name' => 'intitule',
            'type' => 'text',
            'wrapper' => ['class' => 'form-group col-md-6']
        ]);

        CRUD::addField([
            'label' => 'Adresse de l\'entreprise',
            'name' => 'adresse',
            'type' => 'text',
            'wrapper' => ['class' => 'form-group col-md-6']
        ]);

        CRUD::addField([
            'label' => 'Numero télephone',
            'name' => 'telephone',
            'type' => 'text',
            'wrapper' => ['class' => 'form-group col-md-12']
        ]);

        CRUD::addField([
            'label' => 'Email',
            'name' => 'email',
            'type' => 'email',
            'wrapper' => ['class' => 'form-group col-md-6']
        ]);

        CRUD::addField([
            'label' => 'Mot de passe',
            'name' => 'password',
            'type' => 'password',
            'wrapper' => ['class' => 'form-group col-md-6']
        ]);

       /* CRUD::addField([
            'label' => 'Image de profil',
            'name' => 'image_profil',
            'type' => 'image',
            'wrapper' => ['class' => 'form-group col-md-12']
        ]);*/

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
