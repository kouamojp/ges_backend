@extends(backpack_view('blank'))

@php
if (config('backpack.base.show_getting_started')) {
    $widgets['before_content'][] = [
    'type'        => 'view',
    'view'        => 'backpack::inc.getting_started',
    ];
} else {
    $widgets['before_content'][] = [
    'type'        => 'jumbotron',
    'heading'     => 'Tableau de bord',
    //'content'     => trans('backpack::base.use_sidebar'),
    //'button_link' => backpack_url('logout'),
    //'button_text' => trans('backpack::base.logout'),

    ];

}

$nbre_entreprise = App\Models\Entreprise::count();
$nbre_inspecteur = App\Models\Inspecteur::count();
$nbre_machine = App\Models\Machine::count();





$widgets['after_content'][] = [
'type'    => 'div',
'class'   => 'row',

'content' => [

[ 'type' => 'card', 
'content'    => [
'header' => 'Nombre de client :'.$nbre_entreprise,  
'body'   => ''
]],



[ 'type' => 'card', 
'content'    => [
'header' => 'Nombre d\'inspecteur :'.$nbre_inspecteur,  
'body'   => ''
]],

[ 'type' => 'card', 
'content'    => [
'header' => 'Nombre de machine :'.$nbre_machine,  
'body'   => ''
]],

]
]

@endphp

@section('content')

@endsection
