<?php // routes/breadcrumbs.php
use App\Models\Estudiante;
use App\Models\Persona;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Estudiantes', route('home'));
});
// crear gestion
Breadcrumbs::for('gestion_create', function (BreadcrumbTrail $trail, Estudiante $estudiante) {
    $trail->parent('home');
    $trail->push($estudiante->persona->nombre.' '.$persona->apellidop, route('gestion.create', $estudiante));
});
// telefonos create o apoderados crear
Breadcrumbs::for('gestion_telefonos', function (BreadcrumbTrail $trail, Persona $persona) {
    $trail->parent('home');
    $trail->push($persona->nombre.' '.$persona->apellidop, route('telefonos.persona', $persona));
});
// Opciones principal
Breadcrumbs::for('opciones_principal', function (BreadcrumbTrail $trail, Persona $persona) {
    $trail->parent('home');
    $trail->push($persona->nombre.' '.$persona->apellidop, route('opcion.principal', $persona));
});

// Home > Blog
// Breadcrumbs::for('blog', function (BreadcrumbTrail $trail) {
//     $trail->parent('home');
//     $trail->push('Blog', route('blog'));
// });

// // Home > Blog > [Category]
// Breadcrumbs::for('category', function (BreadcrumbTrail $trail, $category) {
//     $trail->parent('blog');
//     $trail->push($category->title, route('category', $category));
// });