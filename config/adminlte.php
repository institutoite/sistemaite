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

    'right_sidebar' => true,
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
            'icon'    => 'fas fa-user-graduate',
            'icon_color' => 'white',
            'classes'  => 'text-white bg-primary',
            'submenu' => [

                [
                    'text' => 'Por materias',
                    'icon'    => 'fas fa-fw fa-share',
                    'classes'  => 'text-white',

                ],
                [
                    'text' => 'Por docentes',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                    'classes'  => 'text-white',
                ],
                [
                    'text' => 'Computacion',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                    'classes'  => 'text-white',
                ],
                [
                    'text' => 'Guardería',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                    'classes'  => 'text-white',
                ],
                [
                    'text' => 'Por aula',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                    'classes'  => 'text-white',
                ],
            ],
        ],
        
        [
            'text' => "Estudiantes",
            'topnav' => true,
            'url'  => '/home',
            'icon' => 'fas fa-fw fa-home',
            'icon_color' => 'primary',

        ],
        [
            'text' => "Estudiantes",
            'topnav_right' => true,
            'url'  => '/home',
            'icon' => 'fas fa-fw fa-home',
            'icon_color' => 'primary',

        ],
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
            'icon_color' => 'white',
            'classes'  => 'text-white bg-primary',
            'submenu' => [
                
                [
                    'text' => 'Clases Nivelacion',
                    'icon'    => 'fas fa-fw fa-share',
                    'classes'  => 'text-white',
                    
                ],
                [
                    'text' => 'Guardería',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                    'classes'  => 'text-white',
                ],
                [
                    'text' => 'Computación',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                    'classes'  => 'text-white',
                ],
                [
                    'text' => 'Universitarios',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                    'classes'  => 'text-white',
                ],


            ],
        ],
       
        /**
         *  Menu personas 
         */
        [
            'text'    => 'Gestionar',
            'icon'    => 'fas fa-tools',
            'icon_color' => 'white',
            'classes'  => 'text-white bg-primary',
            'submenu' => [
                [
                    'text' => 'Un Resumen',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],
                [
                    'text' => 'Ya pasaron',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],
                [
                    'text' => 'Faltas',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],
                [
                    'text' => 'Deudores',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],
                [
                    'text' => 'Licencias',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],
                [
                    'text' => 'Finalizando',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],
                
                [
                    'text' => 'Empezando',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],
                [
                    'text' => 'Temas pasados',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],
                [
                    'text' => 'Materias pasadas',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],

            ],
        ],

        
        /**
         *  Menu personas 
         */
        [
            'text'    => 'Pagos y caja',
            'icon'    => 'fas fa-tools',
            'icon_color' => 'white',
            'classes'  => 'text-white bg-primary',
            'submenu' => [
                [
                    'text' => 'Ingreso',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],
                [
                    'text' => 'Egreso',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],
                [
                    'text' => 'Billetes',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],
                [
                    'text' => 'Detallado',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],
            ],
        ],

//** %%%%%%%%%%%%%%%%%%  USUARIOS %%%%%%%%%%%%% */
        
        [
            'text'    => 'Gestion usuarios',
            'icon'    => 'fas fa-tools',
            'icon_color' => 'white',
            'classes'  => 'text-white bg-primary',
            'submenu' => [
                [
                    'text' => 'Eventos',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],
                [
                    'text' => 'Inscripciones',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],
                [
                    'text' => 'Ingresos',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],
                [
                    'text' => 'Salidas',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],
                [
                    'text' => 'Cobros',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],
                [
                    'text' => 'Crear',
                    'icon'    => 'fas fa-fw fa-share',
                    'url' => 'users/crear',
                ],
                [
                    'text' => 'Listar',
                    'icon'    => 'fas fa-fw fa-share',
                    'route' => 'users.index',
                ],
            ],
        ],
//** %%%%%%%%%%%%%%%%%%  MENU DOCENTES %%%%%%%%%%%%% */
        
        [
            'text'    => 'Gestion clases',
            'icon'    => 'fas fa-tools',
            'icon_color' => 'white',
            'classes'  => 'text-white bg-primary',
            'submenu' => [
                [
                    'text' => 'Por temas',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],
                [
                    'text' => 'Por Materia',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],
                [
                    'text' => 'Listar todas',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],

                [
                    'text' => 'Notificar',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],
                [
                    'text' => 'Practicos',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],
                [
                    'text' => 'Detallar todos',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],

            ],
        ],


        
        /**
         *  Menu personas 
         */
        [
            'text'    => 'Gestionar Inscripciones',
            'icon'    => 'fas fa-tools',
            'icon_color' => 'white',
            'classes'  => 'text-white bg-primary',
            'submenu' => [
                [
                    'text' => 'Un Resumen',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],
                [
                    'text' => 'Computación',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],
                [
                    'text' => 'Capacitación',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],
                [
                    'text' => 'Guardería',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],
            ],
        ],

        
        /**
         *  Menu personas 
         */
        [
            'text'    => 'Observaciones',
            'icon'    => 'fas fa-tools',
            'icon_color' => 'white',
            'classes'  => 'text-white bg-primary',
            'submenu' => [
                [
                    'text' => 'Un Resumen',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],
                [
                    'text' => 'De Nivelación',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],
                [
                    'text' => 'De Computación',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],
                [
                    'text' => 'Prácticos',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],
            ],
        ],

        
        /**
         *  Menu personas 
         */
        [
            'text'    => 'Mensajes llamadas',
            'icon'    => 'fas fa-tools',
            'icon_color' => 'white',
            'classes'  => 'text-white bg-primary',
            'submenu' => [
                [
                    'text' => 'Cumpleañeros',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],
                [
                    'text' => 'Faltones',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],
                [
                    'text' => 'Deudores',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],
                [
                    'text' => 'Mensaje Masivo',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],
            ],
        ],

        
        /**
         *  Menu personas 
         */
        [
            'text'    => 'Docentes',
            'icon'    => 'fas fa-tools',
            'icon_color' => 'white',
            'classes'  => 'text-white bg-primary',
            'submenu' => [
                [
                    'text' => 'Quienes vinieron',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],
                [
                    'text' => 'Pasando a..',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],
                [
                    'text' => 'Ya pasó a..',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],
                [
                    'text' => 'Esperando a..',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],
            ],
        ],

//** %%%%%%%%%%%%%%%%%%  MENU Colegios %%%%%%%%%%%%% */
        
        [
            'text'    => 'Colegios',
            'icon'    => 'fas fa-tools',
            'icon_color' => 'white',
            'classes'  => 'text-white bg-primary',
            'submenu' => [
                [
                    'text' => 'Listar',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],
                [
                    'text' => 'Crear',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],
            ],
        ],
//** %%%%%%%%%%%%%%%%%%  MENU Feriados %%%%%%%%%%%%% */
        
        [
            'text'    => 'Feriados',
            'icon'    => 'fas fa-tools',
            'icon_color' => 'white',
            'classes'  => 'text-white bg-primary',
            'submenu' => [
                [
                    'text' => 'Listar',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],
                [
                    'text' => 'Crear',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],
            ],
        ],
    
//** %%%%%%%%%%%%%%%%%%  MENU MODALIDADES %%%%%%%%%%%%% */
        
        [
            'text'    => 'Modalidades',
            'icon'    => 'fas fa-tools',
            'icon_color' => 'white',
            'classes'  => 'text-white bg-primary',
            'submenu' => [
                [
                    'text' => 'Listar',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],
                [
                    'text' => 'Crear',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],
            ],
        ],
//** %%%%%%%%%%%%%%%%%%  MENU GRADOS %%%%%%%%%%%%% */
        
        [
            'text'    => 'Grados',
            'icon'    => 'fas fa-tools',
            'icon_color' => 'white',
            'classes'  => 'text-white bg-primary',
            'submenu' => [
                [
                    'text' => 'Listar',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],
                [
                    'text' => 'Crear',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],
            ],
        ],
//** %%%%%%%%%%%%%%%%%%  MENU Materias %%%%%%%%%%%%% */
        
        [
            'text'    => 'Materias',
            'icon'    => 'fas fa-tools',
            'icon_color' => 'white',
            'classes'  => 'text-white bg-primary',
            'submenu' => [
                [
                    'text' => 'Listar',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],
                [
                    'text' => 'Crear',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],
            ],
        ],

        //** %%%%%%%%%%%%%%%%%%  MENU ZONAS %%%%%%%%%%%%% */
        
        [
            'text'    => 'Zonas',
            'icon'    => 'fas fa-tools',
            'icon_color' => 'white',
            'classes'  => 'text-white bg-primary',
            'submenu' => [
                [
                    'text' => 'Listar',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],
                [
                    'text' => 'Crear',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],
            ],
        ],

        //** %%%%%%%%%%%%%%%%%%  MENU Aulas %%%%%%%%%%%%% */
        
        [
            'text'    => 'Aulas',
            'icon'    => 'fas fa-tools',
            'icon_color' => 'white',
            'classes'  => 'text-white bg-primary',
            'submenu' => [
                [
                    'text' => 'Listar',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],
                [
                    'text' => 'Crear',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],
            ],
        ],
        //** %%%%%%%%%%%%%%%%%%  MENU Administrativos %%%%%%%%%%%%% */
        
        [
            'text'    => 'Administrativos',
            'icon'    => 'fas fa-tools',
            'icon_color' => 'white',
            'classes'  => 'text-white bg-primary',
            'submenu' => [
                [
                    'text' => 'Listar',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],
                [
                    'text' => 'Crear',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],
            ],
        ],

        //** %%%%%%%%%%%%%%%%%%  MENU PROVEEDORES %%%%%%%%%%%%% */
        
        [
            'text'    => 'Proveedores',
            'icon'    => 'fas fa-tools',
            'icon_color' => 'white',
            'classes'  => 'text-white bg-primary',
            'submenu' => [
                [
                    'text' => 'Listar',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],
                [
                    'text' => 'Crear',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],
            ],
        ],

        //** %%%%%%%%%%%%%%%%%%  MENU Paises %%%%%%%%%%%%% */
        
        [
            'text'    => 'Paises',
            'icon'    => 'fas fa-tools',
            'icon_color' => 'white',
            'classes'  => 'text-white bg-primary',
            'submenu' => [
                [
                    'text' => 'Listar',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],
                [
                    'text' => 'Crear',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],
            ],
        ],
        //** %%%%%%%%%%%%%%%%%%  MENU Departamentos %%%%%%%%%%%%% */
        
        [
            'text'    => 'Departamentos',
            'icon'    => 'fas fa-tools',
            'icon_color' => 'white',
            'classes'  => 'text-white bg-primary',
            'submenu' => [
                [
                    'text' => 'Listar',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],
                [
                    'text' => 'Crear',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],
            ],
        ],
        //** %%%%%%%%%%%%%%%%%%  MENU PROVINCIA %%%%%%%%%%%%% */
        
        [
            'text'    => 'Provincias',
            'icon'    => 'fas fa-tools',
            'icon_color' => 'white',
            'classes'  => 'text-white bg-primary',
            'submenu' => [
                [
                    'text' => 'Listar',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],
                [
                    'text' => 'Crear',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],
            ],
        ],

        //** %%%%%%%%%%%%%%%%%%  MENU CIUDADES %%%%%%%%%%%%% */
        
        [
            'text'    => 'Ciudades',
            'icon'    => 'fas fa-tools',
            'icon_color' => 'white',
            'classes'  => 'text-white bg-primary',
            'submenu' => [
                [
                    'text' => 'Listar',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],
                [
                    'text' => 'Crear',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],
            ],
        ],
        //** %%%%%%%%%%%%%%%%%%  MENU MUNICIPIOS %%%%%%%%%%%%% */
        
        [
            'text'    => 'Municipios',
            'icon'    => 'fas fa-tools',
            'icon_color' => 'white',
            'classes'  => 'text-white bg-primary',
            'submenu' => [
                [
                    'text' => 'Listar',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],
                [
                    'text' => 'Crear',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],
            ],
        ],
        //** %%%%%%%%%%%%%%%%%%  MENU DIAS %%%%%%%%%%%%% */
        
        [
            'text'    => 'Dias',
            'icon'    => 'fas fa-tools',
            'icon_color' => 'white',
            'classes'  => 'text-white bg-primary',
            'submenu' => [
                [
                    'text' => 'Listar',
                    'icon'    => 'fas fa-fw fa-share',
                    'url'  => '#',
                ],
                [
                    'text' => 'Crear',
                    'icon'    => 'fas fa-fw fa-share',
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
        'Datatables' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
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
