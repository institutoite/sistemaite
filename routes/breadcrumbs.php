<?php // routes/breadcrumbs.php
use App\Models\Estudiante;
use App\Models\Persona;
use App\Models\Inscripcione;
use App\Models\Pago;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Estudiantes', route('home'));
});
// crear gestion
Breadcrumbs::for('gestion_create', function (BreadcrumbTrail $trail, Estudiante $estudiante) {
    $trail->parent('home');
    $trail->push("Gestion Crear ".$estudiante->persona->nombre, route('gestion.create', $estudiante));
});
// telefonos create o apoderados crear
Breadcrumbs::for('gestion_telefonos', function (BreadcrumbTrail $trail, Persona $persona) {
    $trail->parent('home');
    $trail->push("Telefonos ".$persona->nombre, route('telefonos.persona', $persona));
});
// Opciones principal
Breadcrumbs::for('opciones_principal', function (BreadcrumbTrail $trail,$persona) {
    $trail->parent('home');
    $trail->push("Opciones ".$persona->nombre, route('opcion.principal', $persona));
});

//Persona Create
Breadcrumbs::for('persona_create', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push("Crear Persona", route('personas.create'));
});
// tus inscripciones 
Breadcrumbs::for('inscripciones_estudiante', function (BreadcrumbTrail $trail, Estudiante $estudiante,Persona $persona) {
    $trail->parent('opciones_principal',$persona);
    $trail->push("Inscripciones", route('tus.inscripciones', $estudiante));
});


/** INICIO MIGAS DE PAN PARA INSCRIPCIONES RESOURCE  */
// Inscripciones > Upload Photo
Breadcrumbs::for('inscribir', function (BreadcrumbTrail $trail ,Estudiante $estudiante,Persona $persona) {
    $trail->parent('inscripciones_estudiante',$estudiante,$persona);
    $trail->push('Crear Inscripción', route('inscribir',$persona));
});
Breadcrumbs::for('inscripcion.configuracion', function (BreadcrumbTrail $trail ,Estudiante $estudiante,Persona $persona,Inscripcione $inscripcione) {
    $trail->parent('inscribir',$estudiante,$persona);
    $trail->push('Configurar Inscripción', route('inscripcion.configuracion',$inscripcione));
});

Breadcrumbs::for('pagos.crear', function (BreadcrumbTrail $trail ,Estudiante $estudiante,Persona $persona,Inscripcione $inscripcione) {
    $trail->parent('inscripcion.configuracion',$estudiante,$persona,$inscripcione);
    $trail->push('Pagar', route('pagos.crear',$inscripcione));
});

Breadcrumbs::for('billete.crear', function (BreadcrumbTrail $trail ,Estudiante $estudiante,Persona $persona,Inscripcione $inscripcione,Pago $pago) {
    $trail->parent('pagos.crear',$estudiante,$persona,$inscripcione);
    $trail->push('Billete', route('billete.crear',$pago));
});

Breadcrumbs::for('mostrar.programa', function (BreadcrumbTrail $trail ,Estudiante $estudiante,Persona $persona,Inscripcione $inscripcione) {
    $trail->parent('inscripciones_estudiante',$estudiante,$persona);
    $trail->push('Detalle Inscripción', route('mostrar.programa',$inscripcione));
});


/** FIN MIGAS DE PAN PARA INSCRIPCIONES RESOURCE  */




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