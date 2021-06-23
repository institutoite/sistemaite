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

    'classes_auth_card' => 'bg-gradient-dark',
    'classes_auth_header' => '',
    'classes_auth_body' => 'bg-gradient-dark',
    'classes_auth_footer' => 'text-center',
    'classes_auth_icon' => 'fa-fw text-light',
    'classes_auth_btn' => 'btn-flat btn-light',



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
    'classes_sidebar' => 'sidebar-dark-primary elevation-4',
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
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => false,
    'right_sidebar_scrollbar_theme' => 'os-theme-dark',
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
        // Navbar items:
        // [
        //     'type'         => 'navbar-search',
        //     'text'         => 'search',
        //     'topnav_right' => true,
        // ],
        // [
        //     'type'         => 'fullscreen-widget',
        //     'topnav_right' => true,
        // ],


        [
            'type'         => 'fullscreen-widget',
            'topnav_right' => true, // Or "topnav => true" to place on the left.
        ],
        [
            'text'    => 'Actualidad',
            'icon'    => 'fas fa-record-vinyl',
            'icon_color' => 'white',
            'classes'  => 'text-primary bg-dark',
            'submenu' => [

                [
                    'text' => 'Por materias',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                    'classes'  => 'text-white',

                ],
                [
                    'text' => 'Por docentes',
                    'icon'    => 'fas fa-angle-right',

                    'url'  => '#',
                    'classes'  => 'text-white',
                ],
                [
                    'text' => 'Computacion',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                    'classes'  => 'text-white',
                ],
                [
                    'text' => 'Guardería',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                    'classes'  => 'text-white',
                ],
                [
                    'text' => 'Por aula',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                    'classes'  => 'text-white',
                ],
            ],
        ],
        
        [
            'text' => "Estudiantes",
            'topnav' => true,
            'url'  => '/home',
            'icon' => 'fas fa-record-vinyl',
            'icon_color' => 'primary',

        ],
        // [
        //     'text' => "Estudiantes",
        //     'topnav_right' => true,
        //     'url'  => '/home',
        //     'icon' => 'fas fa-fw fa-home',
        //     'icon_color' => 'primary',

        // ],
        [
            'text' => "Actualidad",
            'topnav' => true,
            'url'    => 'presentes',
            'icon' => 'fas fa-fw fa-home',
            'icon_color' => 'primary',

        ],
        

        // Sidebar items:
        // [
        //     'type' => 'sidebar-menu-search',
        //     'text' => 'search',
        //     //'right_sidebar'=>true,
        // ],
       
        // [
        //     'text' => 'Perfil Usuario',
        //     'url'  => 'user/',
        //     'icon' => 'fas fa-fw fa-user',
        // ],
        
        /**
         * menu estudiantes
         */
        
        [
            'text'    => 'Estudiantes',
            'icon'    => 'fas fa-user-graduate',
            'icon_color' => 'gray',
            'classes'  => 'text-primary bg-dark',
            'submenu' => [
                
                [
                    'text' => 'Clases Nivelacion',
                    'icon'    => 'fas fa-angle-right',
                    'classes'  => 'text-white',
                    
                ],
                [
                    'text' => 'Guardería',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                    'classes'  => 'text-white',
                ],
                [
                    'text' => 'Computación',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                    'classes'  => 'text-white',
                ],
                [
                    'text' => 'Universitarios',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                    'classes'  => 'text-white',
                ],
                [
                    'text' => 'Crear',
                    'icon'    => 'fas fa-plus',
                    'url'  => 'personas/create',
                    'classes'  => 'text-white',
                ],


            ],
        ],
       
        /**
         *  Menu personas 
         */
        [
            'text'    => 'Gestionar',
            'icon'    => 'fas fa-exclamation-triangle',
            'icon_color' => 'warning',
            'classes'  => 'text-primary bg-dark',
            'submenu' => [
                [
                    'text' => 'Un Resumen',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                ],
                [
                    'text' => 'Ya pasaron',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                ],
                [
                    'text' => 'Faltas',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                ],
                [
                    'text' => 'Deudores',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                ],
                [
                    'text' => 'Licencias',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                ],
                [
                    'text' => 'Finalizando',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                ],
                
                [
                    'text' => 'Empezando',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                ],
                [
                    'text' => 'Temas pasados',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                ],
                [
                    'text' => 'Materias pasadas',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                ],

            ],
        ],

        
        /**
         *  Menu personas 
         */
        [
            'text'    => 'Pagos y caja',
            'icon'    => 'fas fa-donate',
            'icon_color' => 'gray',
            'classes'  => 'text-primary bg-dark',
            'submenu' => [
                [
                    'text' => 'Ingreso',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                ],
                [
                    'text' => 'Egreso',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                ],
                [
                    'text' => 'Billetes',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                ],
                [
                    'text' => 'Detallado',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                ],
            ],
        ],

//** %%%%%%%%%%%%%%%%%%  USUARIOS %%%%%%%%%%%%% */
        
        [
            'text'    => 'Usuarios',
            'icon'    => 'fas fa-user',
            'icon_color' => 'gray',
            'classes'  => 'text-primary bg-dark',
            'submenu' => [
                [
                    'text' => 'Eventos',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                ],
                [
                    'text' => 'Inscripciones',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                ],
                [
                    'text' => 'Ingresos',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                ],
                [
                    'text' => 'Salidas',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                ],
                [
                    'text' => 'Cobros',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                ],
                [
                    'text' => 'Crear',
                    'icon'    => 'fas fa-angle-right',
                    'route' => 'users.crear',
                ],
                [
                    'text' => 'Listar',
                    'icon'    => 'fas fa-angle-right',
                    'route' => 'users.index',
                ],
            ],
        ],
//** %%%%%%%%%%%%%%%%%%  MENU DOCENTES %%%%%%%%%%%%% */
        
        [
            'text'    => 'Gestion clases',
            'icon'    => 'fas fa-chalkboard-teacher',
            'icon_color' => 'gray',
            'classes'  => 'text-primary bg-dark',
            'submenu' => [
                [
                    'text' => 'Por temas',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                ],
                [
                    'text' => 'Por Materia',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                ],
                [
                    'text' => 'Listar todas',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                ],

                [
                    'text' => 'Notificar',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                ],
                [
                    'text' => 'Practicos',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                ],
                [
                    'text' => 'Detallar todos',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                ],

            ],
        ],


        
        /**
         *  Menu personas 
         */
        [
            'text'    => 'Gestionar Inscripciones',
            'icon'    => 'fas fa-keyboard',
            'icon_color' => 'gray',
            'classes'  => 'text-primary bg-dark',
            'submenu' => [
                [
                    'text' => 'Un Resumen',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                ],
                [
                    'text' => 'Computación',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                ],
                [
                    'text' => 'Capacitación',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                ],
                [
                    'text' => 'Guardería',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                ],
            ],
        ],

        
        /**
         *  Menu personas 
         */
        [
            'text'    => 'Observaciones',
            'icon'    => 'fas fa-list-alt',
            'icon_color' => 'gray',
            'classes'  => 'text-primary bg-dark',
            'submenu' => [
                [
                    'text' => 'Un Resumen',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                ],
                [
                    'text' => 'De Nivelación',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                ],
                [
                    'text' => 'De Computación',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                ],
                [
                    'text' => 'Prácticos',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                ],
            ],
        ],

        
        /**
         *  Menu personas 
         */
        [
            'text'    => 'Mensajes llamadas',
            'icon'    => 'fas fa-phone',
            'icon_color' => 'gray',
            'classes'  => 'text-primary bg-dark',
            'submenu' => [
                [
                    'text' => 'Cumpleañeros',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                ],
                [
                    'text' => 'Faltones',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                ],
                [
                    'text' => 'Deudores',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                ],
                [
                    'text' => 'Mensaje Masivo',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                ],
            ],
        ],

        
        /**
         *  Menu personas 
         */
        [
            'text'    => 'Docentes',
            'icon'    => 'fas fa-address-book',
            'icon_color' => 'gray',
            'classes'  => 'text-primary bg-dark',
            'submenu' => [
                [
                    'text' => 'Quienes vinieron',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                ],
                [
                    'text' => 'Pasando a..',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                ],
                [
                    'text' => 'Ya pasó a..',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                ],
                [
                    'text' => 'Esperando a..',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                ],
            ],
        ],

//** %%%%%%%%%%%%%%%%%%  MENU Colegios %%%%%%%%%%%%% */
        
        [
            'text'    => 'Colegios',
            'icon'    => 'fas fa-house-user',
            'icon_color' => 'gray',
            'classes'  => 'text-primary bg-dark',
            'submenu' => [
                [
                    'text' => 'Listar',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                ],
                [
                    'text' => 'Crear',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                ],
            ],
        ],
//** %%%%%%%%%%%%%%%%%%  MENU Feriados %%%%%%%%%%%%% */
        
        [
            'text'    => 'Feriados',
            'icon'    => 'fas fa-calendar-times',
            'icon_color' => 'gray',
            'classes'  => 'text-primary bg-dark',
            'submenu' => [
                [
                    'text' => 'Listar',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                ],
                [
                    'text' => 'Crear',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                ],
            ],
        ],
    
//** %%%%%%%%%%%%%%%%%%  MENU MODALIDADES %%%%%%%%%%%%% */
        
        [
            'text'    => 'Modalidades',
            'icon'    => 'fas fa-star-of-david',
            'icon_color' => 'gray',
            'classes'  => 'text-primary bg-dark',
            'submenu' => [
                [
                    'text' => 'Listar',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => 'modalidads',
                ],
                [
                    'text' => 'Crear',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => 'modalidads/create',
                ],
            ],
        ],
//** %%%%%%%%%%%%%%%%%%  MENU GRADOS %%%%%%%%%%%%% */
        
        [
            'text'    => 'Grados',
            'icon'    => 'fab fa-buffer', 
            'icon_color' => 'gray',
            'classes'  => 'text-primary bg-dark',
            'submenu' => [
                [
                    'text' => 'Listar',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                ],
                [
                    'text' => 'Crear',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                ],
            ],
        ],
//** %%%%%%%%%%%%%%%%%%  MENU Materias %%%%%%%%%%%%% */
        
        [
            'text'    => 'Materias',
            'icon'    => 'fas fa-book-reader',
            'icon_color' => 'gray',
            'classes'  => 'text-primary bg-dark',
            'submenu' => [
                [
                    'text' => 'Listar',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                ],
                [
                    'text' => 'Crear',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                ],
            ],
        ],
        //** %%%%%%%%%%%%%%%%%%  MENU Aulas %%%%%%%%%%%%% */

        [
            'text'    => 'Aulas',
            'icon'    => 'fab fa-angular',
            'icon_color' => 'gray',
            'classes'  => 'text-primary bg-dark',
            'submenu' => [
                [
                    'text' => 'Listar',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                ],
                [
                    'text' => 'Crear',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                ],
            ],
        ],
       

       
        //** %%%%%%%%%%%%%%%%%%  MENU Administrativos %%%%%%%%%%%%% */
        
        [
            'text'    => 'Administrativos',
            'icon'    => 'fas fa-users-cog',
            'icon_color' => 'gray',
            'classes'  => 'text-primary bg-dark',
            'submenu' => [
                [
                    'text' => 'Listar',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                ],
                [
                    'text' => 'Crear',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                ],
            ],
        ],

        //** %%%%%%%%%%%%%%%%%%  MENU PROVEEDORES %%%%%%%%%%%%% */
        
        [
            'text'    => 'Proveedores',
            'icon'    => 'fas fa-shopping-cart',
            'icon_color' => 'gray',
            'classes'  => 'text-primary bg-dark',
            'submenu' => [
                [
                    'text' => 'Listar',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                ],
                [
                    'text' => 'Crear',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                ],
            ],
        ],

        //** %%%%%%%%%%%%%%%%%%  MENU Paises %%%%%%%%%%%%% */
        
        [
            'text'    => 'Paises',
            'icon'    => 'fas fa-flag',
            'icon_color' => 'gray',
            'classes'  => 'text-primary bg-dark',
            'submenu' => [
                [
                    'text' => 'Listar',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                ],
                [
                    'text' => 'Crear',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                ],
            ],
        ],
        //** %%%%%%%%%%%%%%%%%%  MENU Departamentos %%%%%%%%%%%%% */
        
        [
            'text'    => 'Departamentos',
            'icon'    => 'fas fa-map-marker-alt',
            'icon_color' => 'gray',
            'classes'  => 'text-primary bg-dark',
            'submenu' => [
                [
                    'text' => 'Listar',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                ],
                [
                    'text' => 'Crear',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                ],
            ],
        ],
        //** %%%%%%%%%%%%%%%%%%  MENU PROVINCIA %%%%%%%%%%%%% */
        
        [
            'text'    => 'Provincias',
            'icon'    => 'fas fa-map-marker',
            'icon_color' => 'gray',
            'classes'  => 'text-primary bg-dark',
            'submenu' => [
                [
                    'text' => 'Listar',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                ],
                [
                    'text' => 'Crear',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                ],
            ],
        ],

        //** %%%%%%%%%%%%%%%%%%  MENU CIUDADES %%%%%%%%%%%%% */
        
        [
            'text'    => 'Ciudades',
            'icon'    => 'fas fa-city',
            'icon_color' => 'gray',
            'classes'  => 'text-primary bg-dark',
            'submenu' => [
                [
                    'text' => 'Listar',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                ],
                [
                    'text' => 'Crear',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                ],
            ],
        ],
        //** %%%%%%%%%%%%%%%%%%  MENU MUNICIPIOS %%%%%%%%%%%%% */
        
        [
            'text'    => 'Municipios',
            'icon'    => 'fas fa-map-marked-alt',
            'icon_color' => 'gray',
            'classes'  => 'text-primary bg-dark',
            'submenu' => [
                [
                    'text' => 'Listar',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                ],
                [
                    'text' => 'Crear',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                ],
            ],
        ],

        //** %%%%%%%%%%%%%%%%%%  MENU ZONAS %%%%%%%%%%%%% */

        [
            'text'    => 'fas fa-map-marked-alt',
            'icon'    => 'fas fa-street-view',
            'icon_color' => 'gray',
            'classes'  => 'text-primary bg-dark',
            'submenu' => [
                [
                    'text' => 'Listar',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                ],
                [
                    'text' => 'Crear',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                ],
            ],
        ],
        //** %%%%%%%%%%%%%%%%%%  MENU DIAS %%%%%%%%%%%%% */
        
        [
            'text'    => 'Dias',
            'icon'    => 'fas fa-',
            'icon_color' => 'gray',
            'classes'  => 'text-primary bg-dark',
            'submenu' => [
                [
                    'text' => 'Listar',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
                ],
                [
                    'text' => 'Crear',
                    'icon'    => 'fas fa-angle-right',
                    'url'  => '#',
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
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//code.jquery.com/jquery-3.5.1.js',
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
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
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
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
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

    'livewire' => false,
];
