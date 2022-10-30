<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For detailed instructions you can look the title section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'title' => 'Educabol',
    'title_prefix' => 'Educabol | ',
    'title_postfix' => '', 

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For detailed instructions you can look the favicon section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_ico_only' => true,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For detailed instructions you can look the logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'logo' => '<b>Instituto</b>ite',
    'logo_img' => 'vendor/adminlte/dist/img/solologo.png',
    'logo_img_class' => 'brand-image img-circle',
    'logo_img_xl' => 'vendor/adminlte/dist/img/logo.png',
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'instituto ite',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For detailed instructions you can look the user menu section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => true,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' => true,
    'usermenu_desc' => true,
    'usermenu_profile_url' => true,

    

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For detailed instructions you can look the layout section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'layout_topnav' => false,
    'layout_boxed' => false,
    'layout_fixed_sidebar' => false,
    'layout_fixed_navbar' => true,
    'layout_fixed_footer' => true,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For detailed instructions you can look the auth classes section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_auth_card' => 'bg-primary text-white',
    'classes_auth_header' => 'bg-secondary',
    'classes_auth_body' => 'bg-primary',
    'classes_auth_footer' => 'bg-secondary text-white',
    'classes_auth_icon' => 'fa-fw text-secondary',
    'classes_auth_btn' => 'btn btn-secondary',



    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For detailed instructions you can look the admin panel classes here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_body' => '',
    'classes_brand' => 'bg-white',
    'classes_brand_text' => 'text-danger',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-light-primary elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-dark navbar-light',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',
    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For detailed instructions you can look the sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'sidebar_mini' => true,
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => false,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For detailed instructions you can look the right sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-user-graduate',
    'right_sidebar_theme' => 'light',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => false,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For detailed instructions you can look the urls section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_route_url' => false,
    'dashboard_url' => 'home',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'password/reset',
    'password_email_url' => 'password/email',
    'profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For detailed instructions you can look the laravel mix section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'enabled_laravel_mix' => false,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'menu' => [
        [
            'type'         => 'fullscreen-widget',
            'topnav_right' => true, // Or "topnav => true" to place on the left.

        ],
        [
            'text'    => 'Opciones Rápidas',
            'icon'    => 'fas fa-record-vinyl',
            'icon_color' => 'secondary',
            'classes'  => 'text-white text-bold bg-primary',
            'submenu' => [

                [
                    'text' => 'Contacto',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => 'contactos',
                    'classes'  => 'text-dark',

                ],
                [
                    'text' => 'Potenciales',
                    'icon'    => 'fas fa-angle-right',

                    'url'  => 'persona/potenciales',
                    'classes'  => 'text-dark',
                ],
                [
                    'text' => 'Asitencia',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => 'inscripcines/vigentes/view',
                    'classes'  => 'text-dark',
                ],
                [
                    'text' => 'Presentes',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => 'presentes',
                    'classes'  => 'text-dark',
                ],
            ],
        ],
        
        [
            'text' =>"Cliente",
            'topnav' => true,
            'url'  => '/home',
            'icon' => 'fas fa-user-graduate',
            'icon_color' => 'white',
            'classes'=>'text-xs text-white',
        ],
        
       
        [
            'text' => "Hoy",
            'topnav' => true,
            'url'  => 'programados/hoy',
            'icon' => 'far fa-clock',
            'icon_color' => 'white',
            'classes'=>'text-xs text-white',
        ],
        [
            'text' => "Potencial",
            'topnav' => true,
            'url'  => 'persona/potenciales',
            'icon' => 'fas fa-user-friends',
            'icon_color' => 'white',
            'classes'=>'text-xs text-white',
        ],
        [
            'text' => "",
            'topnav' => true,
            'url'  => 'inscripcines/vigentes/view',
            'icon' => 'fas fa-user-times',
            'icon_color' => 'white',
            'classes'=>'text-xs text-white',
        ],
        [
            'text' => "",
            'topnav' => true,
            'url'    => 'presentes',
            'icon' => 'fas fa-hand-point-up',
            'icon_color' => 'white',
            'classes'=>'text-xs text-white',
        ],
       
        [
            'text' => "",
            'topnav' => true,
            'url'  => 'contactos',
            'icon' => 'fas fa-address-book',
            'icon_color' => 'white',
            'classes'=>'text-xs text-white',
            
        ],
        /**
         *  Menu personas 
         */
        // [
        //     'text'    => 'Gestionar',
        //     'icon'    => 'fas fa-exclamation-triangle',
        //     'icon_color' => 'secondary',
        //     'classes'  => 'text-white text-bold bg-primary',
        //     'submenu' => [
        //         [
        //             'text' => 'Un Resumen',
        //             'icon'    => 'fas fa-angle-right',
        //             'url'  => '#',
        //             'classes'  => 'text-dark',
        //         ],
        //         [
        //             'text' => 'Ya pasaron',
        //             'icon'    => 'fas fa-angle-right',
        //             'url'  => '#',
        //             'classes'  => 'text-dark',
        //         ],
        //         [
        //             'text' => 'Faltas',
        //             'icon'    => 'fas fa-angle-right',
        //             'url'  => '#',
        //             'classes'  => 'text-dark',
        //         ],
        //         [
        //             'text' => 'Deudores',
        //             'icon'    => 'fas fa-angle-right',
        //             'url'  => '#',
        //             'classes'  => 'text-dark',
        //         ],
        //         [
        //             'text' => 'Licencias',
        //             'icon'    => 'fas fa-angle-right',
        //             'url'  => '#',
        //             'classes'  => 'text-dark',
        //         ],
        //         [
        //             'text' => 'Finalizando',
        //             'icon'    => 'fas fa-angle-right',
        //             'url'  => '#',
        //             'classes'  => 'text-dark',
        //         ],
                
        //         [
        //             'text' => 'Empezando',
        //             'icon'    => 'fas fa-angle-right',
        //             'url'  => '#',
        //             'classes'  => 'text-dark',
        //         ],
        //         [
        //             'text' => 'Temas pasados',
        //             'icon'    => 'fas fa-angle-right',
        //             'url'  => '#',
        //             'classes'  => 'text-dark',
        //         ],
        //         [
        //             'text' => 'Materias pasadas',
        //             'icon'    => 'fas fa-angle-right',
        //             'url'  => '#',
        //             'classes'  => 'text-dark',
        //         ],

        //     ],
        // ],

        
    
//** %%%%%%%%%%%%%%%%%%  MENU DOCENTES %%%%%%%%%%%%% */
        
        // [
        //     'text'    => 'Gestion clases',
        //     'icon'    => 'fas fa-chalkboard-teacher',
        //     'icon_color' => 'secondary',
        //     'classes'  => 'text-white text-bold bg-primary',
        //     'submenu' => [
        //         [
        //             'text' => 'Por temas',
        //             'icon'    => 'fas fa-angle-right',
        //             'url'  => '#',
        //             'classes'  => 'text-secondary',
        //         ],
        //         [
        //             'text' => 'Por Materia',
        //             'icon'    => 'fas fa-angle-right',
        //             'url'  => '#',
        //             'classes'  => 'text-secondary',
        //         ],
        //         [
        //             'text' => 'Listar todas',
        //             'icon'    => 'fas fa-angle-right',
        //             'url'  => '#',
        //             'classes'  => 'text-secondary',
        //         ],

        //         [
        //             'text' => 'Notificar',
        //             'icon'    => 'fas fa-angle-right',
        //             'url'  => '#',
        //             'classes'  => 'text-secondary',
        //         ],
        //         [
        //             'text' => 'Practicos',
        //             'icon'    => 'fas fa-angle-right',
        //             'url'  => '#',
        //             'classes'  => 'text-secondary',
        //         ],
        //         [
        //             'text' => 'Detallar todos',
        //             'icon'    => 'fas fa-angle-right',
        //             'url'  => '#',
        //             'classes'  => 'text-secondary',
        //         ],

        //     ],
        // ],


        
        /**
         *  Menu personas 
         */
        // [
        //     'text'    => 'Inscripciones',
        //     'icon'    => 'fas fa-keyboard',
        //     'icon_color' => 'secondary',
        //     'classes'  => 'text-white text-bold bg-primary',
        //     'submenu' => [
        //         [
        //             'text' => 'Un Resumen',
        //             'icon'    => 'fas fa-angle-right',
        //             'url'  => '#',
        //             'classes'  => 'text-dark',
        //         ],
        //         [
        //             'text' => 'Computación',
        //             'icon'    => 'fas fa-angle-right',
        //             'url'  => '#',
        //             'classes'  => 'text-dark',
        //         ],
        //         [
        //             'text' => 'Capacitación',
        //             'icon'    => 'fas fa-angle-right',
        //             'url'  => '#',
        //             'classes'  => 'text-dark',
        //         ],
        //         [
        //             'text' => 'Guardería',
        //             'icon'    => 'fas fa-angle-right',
        //             'url'  => '#',
        //             'classes'  => 'text-dark',
        //         ],
        //     ],
        // ],
      

        
        /**
         *  Menu personas 
         */
        // [
        //     'text'    => 'Observaciones',
        //     'icon'    => 'fas fa-list-alt',
        //     'icon_color' => 'secondary',
        //     'classes'  => 'text-white text-bold bg-primary',
        //     'submenu' => [
        //         [
        //             'text' => 'Un Resumen',
        //             'icon'    => 'fas fa-angle-right',
        //             'url'  => '#',
        //             'classes'  => 'text-dark',
        //         ],
        //         [
        //             'text' => 'De Nivelación',
        //             'icon'    => 'fas fa-angle-right',
        //             'url'  => '#',
        //             'classes'  => 'text-dark',
        //         ],
        //         [
        //             'text' => 'De Computación',
        //             'icon'    => 'fas fa-angle-right',
        //             'url'  => '#',
        //             'classes'  => 'text-dark',
        //         ],
        //         [
        //             'text' => 'Prácticos',
        //             'icon'    => 'fas fa-angle-right',
        //             'url'  => '#',
        //             'classes'  => 'text-dark',
        //         ],
        //     ],
        // ],

        
        /**
         *  Menu personas 
         */
       
        /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% INICIO GRUPO PERSONAS %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
        [
            'header' => 'PERSONAS Y SEGUIMIENTO',
            'classes'  => 'text-white bg-secondary',
        ],
        [
            'text'    => 'Personas',
            'icon'    => 'fas fa-address-book',
            'icon_color' => 'secondary',
            'classes'  => 'text-white text-bold bg-primary',
            'submenu' => [
                [
                    'text' => 'Todos',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '/personas',
                    'classes'  => 'text-dark',
                ],
                [
                    'text' => 'Estudiantes',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '/home',
                    'classes'  => 'text-dark',
                ],
                [
                    'text' => 'Computacion',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => 'computaciones',
                    'classes'  => 'text-dark',
                ],
                [
                    'text' => 'Docentes',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => 'docentes',
                    'classes'  => 'text-dark',
                ],
                [
                    'text' => 'Administrativos',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => 'administrativos',
                    'classes'  => 'text-dark',
                ],
            ],
        ],
        [
            'text'    => 'Potenciales',
            'icon'    => 'fas fa-keyboard',
            'icon_color' => 'secondary',
            'classes'  => 'text-white text-bold bg-primary',
            'submenu' => [
                [
                    'text' => 'Reporte general',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => 'reporte/potenciales',
                    'classes'  => 'text-dark',
                ],
                [
                    'text' => 'Potenciales Hoy',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => 'potenciales/hoy',
                    'classes'  => 'text-dark',
                ],
                [
                    'text' => 'entre 2 fechas',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => 'potenciales/between',
                    'classes'  => 'text-dark',
                ],
            ],
        ],
        [
            'text'    => 'Mensajes llamadas',
            'icon'    => 'fas fa-phone',
            'icon_color' => 'secondary',
            'classes'  => 'text-white text-bold bg-primary',
            'submenu' => [
                [
                    'text' => 'Cumpleañeros',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => 'cumpleaneros/view',
                    'classes'  => 'text-dark',
                ],
                [
                    'text' => 'Faltones',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => 'faltones/view',
                    'classes'  => 'text-dark',
                ],
                [
                    'text' => 'Recordatorio',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => 'recordatorio/view',
                    'classes'  => 'text-dark',
                ],
                [
                    'text' => 'Sin Faltas',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => 'sinfalta/view',
                    'classes'  => 'text-dark',
                ],
                [
                    'text' => 'Deudores',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => 'deudores/view',
                    'classes'  => 'text-dark',
                ],
                [
                    'text' => 'Finalizando',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => 'finalizando/view',
                    'classes'  => 'text-dark',
                ],
                [
                    'text' => 'Empezando',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => 'empezando/view',
                    'classes'  => 'text-dark',
                ],
                [
                    'text' => 'Mensaje Masivo',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => 'masivo/view',
                    'classes'  => 'text-dark',
                ],
                [
                    'text' => 'Listar',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => 'mensajes',
                    'classes'  => 'text-dark',
                ],
            ],
        ],
        [
            'text'    => 'Cartera',
            'icon'    => 'fas fa-house-user',
            'icon_color' => 'secondary',
            'classes'  => 'text-white text-bold bg-primary',
            'submenu' => [
                [
                    'text' => 'Mi Cartera',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => 'micartera/view',
                    'classes'  => 'text-dark',
                ],
            ],
        ],
        /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% INICIO GRUPO PERSONAS %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
        
        /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% INICIO GRUPO USUARIOS %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
        [
            'header' => 'USUARIOS ROLES Y PERMISOS',
            'classes'  => 'text-white bg-secondary',
        ],
        [
            'text'    => 'Roles',
            'icon'    => 'fas fa-fw fa-users-cog',
            'icon_color' => 'secondary',
            'classes'  => 'text-white text-bold bg-primary',
            'can' => ['Listar Roles'],
            'submenu' => [
                [
                    'text' => 'Listar Roles',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => 'role',
                    'classes'  => 'text-dark',
                ],
                [
                    'text' => 'Asignar Rol a Usuario',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => 'rolusers',
                    'classes'  => 'text-dark',
                ],
                [
                    'text' => 'listar Permisos',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => 'permisos',
                    'classes'  => 'text-dark',
                ],
            ],
        ],
        [
            'text'    => 'Usuarios',
            'icon'    => 'fas fa-user',
            'icon_color' => 'secondary',
            'classes'  => 'text-white text-bold bg-primary',
            'can' => ['Listar Roles'],
            'submenu' => [
                [
                    'text' => 'Listar',
                    'icon'    => 'fas fa-angle-right',
                    'route' => 'users.index',
                    'classes'  => 'text-secondary',
                ],
            ],
        ],
        /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% FIN GRUPO USUARIOS %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
        
        /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% INICIO GRUPO REPORTES CONSULTAS %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
        [
            'header' => 'REPORTES Y CONSULTAS',
            'classes'  => 'text-white bg-secondary',
        ],
        [
            'text'    => 'Gráficos',
            'icon'    => 'fas fa-address-book',
            'icon_color' => 'secondary',
            'classes'  => 'text-white text-bold bg-primary',
            'submenu' => [
                [
                    'text' => 'Inscripciones',
                    'icon'    => 'fas fa-angle-right',
                    'classes'  => 'text-dark',
                    'submenu' => [
                        [
                            'text' => 'Cantidad x Usuario',
                            'icon'    => 'fas fa-angle-right',
                            'url'  => 'chart/cantidad/inscripciones/for/user',
                            'classes'  => 'text-dark',
                        ],
                        [
                            'text' => 'Por Meses',
                            'icon'    => 'fas fa-angle-right',
                            'url'  => 'chart/matriculaciones',
                            'classes'  => 'text-dark',
                        ],
                        [
                            'text' => 'Cantidad x Modalidades',
                            'icon'    => 'fas fa-angle-right',
                            'url'  => 'chart/inscripciones/for/modalidades',
                            'classes'  => 'text-dark',
                        ],
                        [
                            'text' => 'Dinero x Modalidades',
                            'icon'    => 'fas fa-angle-right',
                            'url'  => 'chart/inscripciones/fractales/for/modalidades',
                            'classes'  => 'text-dark',
                        ],
                    ],
                ],
                [
                    'text' => 'Matriculaciones',
                    'icon'    => 'fas fa-angle-right',
                    'classes'  => 'text-dark',
                    'submenu' => [
                        [
                            'text' => 'Por Usuarios',
                            'icon'    => 'fas fa-angle-right',
                            'url'  => 'chart/matriculaciones/for/users',
                            'classes'  => 'text-dark',
                        ],
                        [
                            'text' => 'Por Asignatura',
                            'icon'    => 'fas fa-angle-right',
                            'url'  => 'chart/matriculaciones',
                            'classes'  => 'text-dark',
                        ],
                        [
                            'text' => 'Por Meses',
                            'icon'    => 'fas fa-angle-right',
                            'url'  => 'chart/matriculaciones',
                            'classes'  => 'text-dark',
                        ],
                    ],
                
                ],
                [
                    'text' => 'Pagos',
                    'icon'    => 'fas fa-angle-right',
                    'classes'  => 'text-dark',
                    'submenu' => [
                        [
                            'text' => 'Recaudaciones x Usuario',
                            'icon'    => 'fas fa-angle-right',
                            'url'  => 'chart/fractales/recaudados/for/user',
                            'classes'  => 'text-dark',
                        ],
                        [
                            'text' => 'Cantidad x Usuario',
                            'icon'    => 'fas fa-angle-right',
                            'url'  => 'chart/cantidad/pagos/for/user',
                            'classes'  => 'text-dark',
                        ],
                    ],
                
                ],
               
            ],
        ],
        [
            'text'    => 'Licencias',
            'icon'    => 'fas fa-user',
            'icon_color' => 'secondary',
            'classes'  => 'text-white text-bold bg-primary',
            'submenu' => [
                [
                    'text' => 'Listar',
                    'icon'    => 'fas fa-angle-right',
                    'url' => 'licencias',
                    'classes'  => 'text-secondary',
                ],
            ],
        ],
        /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% FIN GRUPO REPORTES CONSULTAS %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
        /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% INICIO GRUPO CAJA Y DINERO %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
        [
            'header' => 'CAJA Y DINERO',
            'classes'  => 'text-white bg-secondary',
        ],
           [
            'text'    => 'Pagos y caja',
            'icon'    => 'fas fa-donate',
            'icon_color' => 'secondary',
            'classes'  => 'text-white text-bold bg-primary',
            'submenu' => [
                [
                    'text' => 'Ingresos',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => 'pagos',
                    'classes'  => 'text-dark',
                ],
                [
                    'text' => 'Inscripciones',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => 'pago/inscripciones/view',
                    'classes'  => 'text-dark',
                ],
                [
                    'text' => 'Matriculaciones',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => 'pago/matriculaciones/view',
                    'classes'  => 'text-dark',
                ],
                [
                    'text' => 'Billetes Inscripción',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => 'billetes',
                    'classes'  => 'text-dark',
                ],
                [
                    'text' => 'Billetes Matriculación',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => 'billetescom',
                    'classes'  => 'text-dark',
                ],
            ],
        ],
        [
            'text'    => 'Periodos',
            'icon'    => 'fas fa-users-cog',
            'icon_color' => 'secondary',
            'classes'  => 'text-white text-bold bg-primary',
            'submenu' => [
                [
                    'text' => 'Listar',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => 'periodables',
                    'classes'  => 'text-dark',
                ],
            ],
        ],
        [
            'text'    => 'Cargos',
            'icon'    => 'fas fa-users-cog',
            'icon_color' => 'secondary',
            'classes'  => 'text-white text-bold bg-primary',
            'submenu' => [
                [
                    'text' => 'Listar',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => 'cargo',
                    'classes'  => 'text-dark',
                ],
            ],
        ],

        /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% INICIO GRUPO CAJA Y DINERO %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/

        /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% INICIO GRUPO ADMINISTRACION MENUHOMEMENU %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
        [
            'header' => 'ADMINISTRACION HOME',
            'classes'  => 'text-white bg-secondary',
        ],
        [
            'text'    => 'Pagina Inicio',
            'icon'    => 'fas fa-home',
            'icon_color' => 'secondary',
            'classes'  => 'text-white text-bold bg-primary',
            'submenu' => [
                [
                    'text' => 'Texto home',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => 'home/edit',
                    'classes'  => 'text-dark',
                ],
            ],
        ],
        [
            'text'    => 'Convenios',
            'icon'    => 'fas fa-house-user',
            'icon_color' => 'secondary',
            'classes'  => 'text-white text-bold bg-primary',
            'submenu' => [
                [
                    'text' => 'Convenios',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => 'convenios',
                    'classes'  => 'text-dark',
                ],
                [
                    'text' => 'Planes',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => 'plans',
                    'classes'  => 'text-dark',
                ],
                [
                    'text' => 'Caracteristicas',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => 'caracteristicas',
                    'classes'  => 'text-dark',
                ],
            ],
        ],
        [
            'text'    => 'Comentario Web',
            'icon'    => 'fas fa-house-user',
            'icon_color' => 'secondary',
            'classes'  => 'text-white text-bold bg-primary',
            'submenu' => [
                [
                    'text' => 'listar comentarios',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => 'comentarios',
                    'classes'  => 'text-dark',
                ],
            ],
        ],
        /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% FIN GRUPO REPORTES ADMINISTRACION HOME %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
        /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% INICIO GRUPO CRUD CONFIGURACION %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
        [
            'header' => 'OPCIONES CONFIGURACION',
            'classes'  => 'text-white bg-secondary',
        ],
        [
            'text'    => 'Constantes',
            'icon'    => 'fas fa-house-user',
            'icon_color' => 'secondary',
            'classes'  => 'text-white text-bold bg-primary',
            'submenu' => [
                [
                    'text' => 'Listar',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => 'constantes',
                    'classes'  => 'text-dark',
                ],
            ],
        ],
        [
            'text'    => 'Como llegó?',
            'icon'    => 'fas fa-house-user',
            'icon_color' => 'secondary',
            'classes'  => 'text-white text-bold bg-primary',
            'submenu' => [
                [
                    'text' => 'Listar',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => 'como',
                    'classes'  => 'text-dark',
                ],
            ],
        ],
        [
            'text'    => 'Mododocente',
            'icon'    => 'fas fa-house-user',
            'icon_color' => 'secondary',
            'classes'  => 'text-white text-bold bg-primary',
            'submenu' => [
                [
                    'text' => 'Listar',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => 'mododocentes',
                    'classes'  => 'text-dark',
                ],
            ],
        ],
         [
            'text'    => 'Motivos',
            'icon'    => 'fas fa-prescription-bottle fa-2x',
            'icon_color' => 'secondary',
            'classes'  => 'text-white text-bold bg-primary',
            'can' => 'Listar Motivos',
            'submenu' => [
                [
                    'text' => 'Listar',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => 'motivos',
                    'classes'  => 'text-dark',
                ],
            ],
        ],
        [
            'text'    => 'Tipomotivos',
            'icon'    => 'fas fa-prescription-bottle fa-2x',
            'icon_color' => 'secondary',
            'classes'  => 'text-white text-bold bg-primary',
            'submenu' => [
                [
                    'text' => 'Listar',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => 'tipomotivos',
                    'classes'  => 'text-dark',
                ],
            ],
        ],
        //** %%%%%%%%%%%%%%%%%%  MENU ESTADO %%%%%%%%%%%%% */
        
        [
            'text'    => 'Estado',
            'icon'    => 'fas fa-prescription-bottle fa-2x',
            'icon_color' => 'secondary',
            'classes'  => 'text-white text-bold bg-primary',
            'submenu' => [
                [
                    'text' => 'Listar',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => 'estados',
                    'classes'  => 'text-dark',
                ],
            ],
        ],
        [
            'text'    => 'Dias',
            'icon'    => 'fas fa-calendar-day',
            'icon_color' => 'secondary',
            'classes'  => 'text-white text-bold bg-primary',
            'submenu' => [
                [
                    'text' => 'Listar',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => 'dias',
                    'classes'  => 'text-dark',
                ],
            ],
        ],
        [
            'text'    => 'Intereses',
            'icon'    => 'fas fa-house-user',
            'icon_color' => 'secondary',
            'classes'  => 'text-white text-bold bg-primary',
            'submenu' => [
                [
                    'text' => 'Listar',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => 'interests',
                    'classes'  => 'text-dark',
                ],
            ],
        ],
        [
            'text'    => 'Eventos',
            'icon'    => 'fas fa-house-user',
            'icon_color' => 'secondary',
            'classes'  => 'text-white text-bold bg-primary',
            'submenu' => [
                [
                    'text' => 'Listar',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => 'eventos',
                    'classes'  => 'text-dark',
                ],
            ],
        ],
        /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% FIN GRUPO REPORTES CRUD CONFIGURACION %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
        
        /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% INICIO GRUPO ADMINISTRACION DATOS %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
        [
            'header' => 'ADMINISTRACION DATOS',
            'classes'  => 'text-white bg-secondary',
        ],
        [
            'text'    => 'Tipo Archivos',
            'icon'    => 'fas fa-prescription-bottle fa-2x',
            'icon_color' => 'secondary',
            'classes'  => 'text-white text-bold bg-primary',
            'submenu' => [
                [
                    'text' => 'Listar',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => 'tipofiles',
                    'classes'  => 'text-dark',
                ],
            ],
        ],
        //** %%%%%%%%%%%%%%%%%%  MENU FILE %%%%%%%%%%%%% */
        
        [
            'text'    => 'Archivos',
            'icon'    => 'fas fa-prescription-bottle fa-2x',
            'icon_color' => 'secondary',
            'classes'  => 'text-white text-bold bg-primary',
            'submenu' => [
                [
                    'text' => 'Listar',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => 'files',
                    'classes'  => 'text-dark',
                ],
            ],
        ],
        /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% INICIO GRUPO ADMINISTRACION DATOS %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
        /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% INICIO GRUPO ADMINISTRACION LOCALIZACION GEOGRAFICA %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
        [
            'header' => 'OPCIONES GEOGRAFICAS',
            'classes'  => 'text-white bg-secondary',
        ],
        [
            'text'    => 'Paises',
            'icon'    => 'fas fa-flag',
            'icon_color' => 'secondary',
            'classes'  => 'text-white text-bold bg-primary',
            'submenu' => [
                [
                    'text' => 'Listar',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => 'paises',
                    'classes'  => 'text-dark',
                ],
            ],
        ],
        //** %%%%%%%%%%%%%%%%%%  MENU Departamentos %%%%%%%%%%%%% */
        
        [
            'text'    => 'Departamentos',
            'icon'    => 'fas fa-map-marker-alt',
            'icon_color' => 'secondary',
            'classes'  => 'text-white text-bold bg-primary',
            'submenu' => [
                [
                    'text' => 'Listar',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => 'departamentos',
                    'classes'  => 'text-dark',
                ],
            ],
        ],
        //** %%%%%%%%%%%%%%%%%%  MENU PROVINCIA %%%%%%%%%%%%% */
        
        [
            'text'    => 'Provincias',
            'icon'    => 'fas fa-map-marker',
            'icon_color' => 'secondary',
            'classes'  => 'text-white text-bold bg-primary',
            'submenu' => [
                [
                    'text' => 'Listar',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => 'provincias',
                    'classes'  => 'text-dark',
                ],
            ],
        ],

        //** %%%%%%%%%%%%%%%%%%  MENU CIUDADES %%%%%%%%%%%%% */
        
        [
            'text'    => 'Ciudades',
            'icon'    => 'fas fa-city',
            'icon_color' => 'secondary',
            'classes'  => 'text-white text-bold bg-primary',
            'submenu' => [
                [
                    'text' => 'Listar',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => 'ciudades',
                    'classes'  => 'text-dark',
                ],
            ],
        ],
         [
            'text'    => 'Municipios',
            'icon'    => 'fas fa-map-marked-alt',
            'icon_color' => 'secondary',
            'classes'  => 'text-white text-bold bg-primary',
            'submenu' => [
                [
                    'text' => 'Listar',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => 'municipios',
                    'classes'  => 'text-dark',
                ],
            ],
        ],

        //** %%%%%%%%%%%%%%%%%%  MENU ZONAS %%%%%%%%%%%%% */

        [
            'text'    => 'Zonas',
            'icon'    => 'fas fa-street-view',
            'icon_color' => 'secondary',
            'classes'  => 'text-white text-bold bg-primary',
            'submenu' => [
                [
                    'text' => 'Listar',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => 'zonas',
                    'classes'  => 'text-dark',
                ],
               
            ],
        ],
        /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% INICIO GRUPO ADMINISTRACION LOCALIZACION GEOGRAFICA %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
        /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% INICIO GRUPO ADMINISTRACION ACADEMICO %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
        [
            'header' => 'ADMINISTRACION ACADEMICA',
            'classes'  => 'text-white bg-secondary',
        ],

        
        /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% INICIO GRUPO ADMINISTRACION ACADEMICO %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/

//** %%%%%%%%%%%%%%%%%%  MENU Colegios %%%%%%%%%%%%% */
        [
            'text'    => 'Colegios',
            'icon'    => 'fas fa-house-user',
            'icon_color' => 'secondary',
            'classes'  => 'text-white text-bold bg-primary',
            'submenu' => [
                [
                    'text' => 'Listar',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => 'colegios',
                    'classes'  => 'text-dark',
                ],
            ],
        ],
       

       
       
//** %%%%%%%%%%%%%%%%%%  MENU como llego? %%%%%%%%%%%%% */
       
//** %%%%%%%%%%%%%%%%%%  MENU eventos %%%%%%%%%%%%% */
       
       
//** %%%%%%%%%%%%%%%%%%  MENU TEMAS %%%%%%%%%%%%% */
        [
            'text'    => 'Temas',
            'icon'    => 'fas fa-house-user',
            'icon_color' => 'secondary',
            'classes'  => 'text-white text-bold bg-primary',
            'submenu' => [
                [
                    'text' => 'Listar',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => 'temas',
                    'classes'  => 'text-dark',
                ],
            ],
        ],


//** %%%%%%%%%%%%%%%%%%  MENU MODALIDADES %%%%%%%%%%%%% */
        
        [
            'text'    => 'Modalidades',
            'icon'    => 'fas fa-star-of-david',
            'icon_color' => 'secondary',
            'classes'  => 'text-white text-bold bg-primary',
            'can' => 'Listar Modalidades',
            'submenu' => [
                [
                    'text' => 'Listar',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => 'modalidads',
                ],
            ],
        ],
//** %%%%%%%%%%%%%%%%%%  MENU GRADOS %%%%%%%%%%%%% */
        
        [
            'text'    => 'Grados',
            'icon'    => 'fab fa-buffer', 
            'icon_color' => 'secondary',
            'classes'  => 'text-white text-bold bg-primary',
            'submenu' => [
                [
                    'text' => 'Listar',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => 'grados',
                    'classes'  => 'text-dark',
                ],
            ],
        ],
//** %%%%%%%%%%%%%%%%%%  MENU Materias %%%%%%%%%%%%% */
        
        [
            'text'    => 'Materias',
            'icon'    => 'fas fa-book-reader',
            'icon_color' => 'secondary',
            'classes'  => 'text-white text-bold bg-primary',
            'can' => 'Listar Materias',
            'submenu' => [
                [
                    'text' => 'Listar',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => 'materias',
                    'classes'  => 'text-dark',
                ],
            ],
        ],
        //** %%%%%%%%%%%%%%%%%%  MENU Aulas %%%%%%%%%%%%% */

        [
            'text'    => 'Aulas',
            'icon'    => 'fab fa-angular',
            'icon_color' => 'secondary',
            'classes'  => 'text-white text-bold bg-primary',
            'submenu' => [
                [
                    'text' => 'Listar',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => 'aulas',
                    'classes'  => 'text-dark',
                ],
            ],
        ],
       

        //** %%%%%%%%%%%%%%%%%%  MENU Paises %%%%%%%%%%%%% */
        
        
        //** %%%%%%%%%%%%%%%%%%  MENU CARRERAS %%%%%%%%%%%%% */
        
        [
            'text'    => 'Carreras',
            'icon'    => 'fas fa-map-marked-alt',
            'icon_color' => 'secondary',
            'classes'  => 'text-white text-bold bg-primary',
            'can' => 'Listar Carreras',
            'submenu' => [
                [
                    'text' => 'Listar',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => 'carreras',
                    'classes'  => 'text-dark',
                ],
            ],
        ],
        //** %%%%%%%%%%%%%%%%%%  MENU ASIGNATURAS %%%%%%%%%%%%% */
        
        [
            'text'    => 'Asignaturas',
            'icon'    => 'fas fa-map-marked-alt',
            'icon_color' => 'secondary',
            'classes'  => 'text-white text-bold bg-primary',
            'can' => 'Listar Asignaturas',
            'submenu' => [
                [
                    'text' => 'Listar',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => 'asignaturas',
                    'classes'  => 'text-dark',
                ],
            ],
        ],
        //** %%%%%%%%%%%%%%%%%%  MENU NIVELES %%%%%%%%%%%%% */
        
        [
            'text'    => 'Niveles',
            'icon'    => 'fas fa-map-marked-alt',
            'icon_color' => 'secondary',
            'classes'  => 'text-white text-bold bg-primary',
            'can' => 'Listar Niveles',
            'submenu' => [
                [
                    'text' => 'listar',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => 'nivels',
                    'classes'  => 'text-dark',
                ],
            ],
        ],
      

       
       

        

        //** %%%%%%%%%%%%%%%%%%  HORARIOS %%%%%%%%%%%%% */
        
        [
            'text'    => 'Horarios',
            'icon'    => 'fas fa-calendar',
            'icon_color' => 'secondary',
            'classes'  => 'text-white text-bold bg-primary',
            'can' => 'Listar Horarios',
            'submenu' => [
                [
                    'text' => 'Listar',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => 'schedule',
                    'classes'  => 'text-dark',
                    'can' => 'Listar Horarios',
                ],
            ],
        ],

        //** %%%%%%%%%%%%%%%%%%  PREGUNTAS FRECUENTES %%%%%%%%%%%%% */
        
        [
            'text'    => 'Preguntas frecuentes',
            'icon'    => 'fas fa-question',
            'icon_color' => 'secondary',
            'classes'  => 'text-white text-bold bg-primary',
            'can' => 'Listar Preguntas',
            'submenu' => [
                [
                    'text' => 'Listar',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => 'question',
                    'classes'  => 'text-dark',
                ],

                [
                    'text' => 'Crear',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => 'question/create',
                    'classes'  => 'text-dark',
                ],
            ],
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For detailed instructions you can look the plugins section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Plugins-Configuration
    |
    */

    'plugins' => [
        'Jquery' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js',
                    
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//code.jquery.com/ui/1.12.1/jquery-ui.js',
                    
                ],
            ],
        ],
        'Steepfocus' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'dist/js/steepfocus.js',
                ],
            ],
        ],
        'Datatables' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/searchbuilder/1.0.1/js/dataTables.searchBuilder.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css',
                ],
            ],
        ],
        

        'Select2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
                ],
            ],
        ],

        
        'Chartjs' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@11',
                ],
            ],
        ],
        'Pace' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For detailed instructions you can look the livewire here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    */

    'livewire' => true,
];
