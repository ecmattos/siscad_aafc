<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | The default title of your admin panel, this goes into the title tag
    | of your page. You can override it per page with the title section.
    | You can optionally also specify a title prefix and/or postfix.
    |
    */

    'title' => 'SisCAD',

    'title_prefix' => '',

    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | This logo is displayed at the upper left corner of your admin panel.
    | You can use basic HTML here if you want. The logo has also a mini
    | variant, used for the mini side bar. Make it 3 letters or so
    |
    */

    'logo' => '<b>Sis</b>CAD',

    'logo_mini' => '<b>S</b>CD',

    /*
    |--------------------------------------------------------------------------
    | Skin Color
    |--------------------------------------------------------------------------
    |
    | Choose a skin color for your admin panel. The available skin colors:
    | blue, black, purple, yellow, red, and green. Each skin also has a
    | ligth variant: blue-light, purple-light, purple-light, etc.
    |
    */

    'skin' => 'yellow',

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Choose a layout for your admin panel. The available layout options:
    | null, 'boxed', 'fixed', 'top-nav'. null is the default, top-nav
    | removes the sidebar and places your menu in the top navbar
    |
    */

    'layout' => null,

    /*
    |--------------------------------------------------------------------------
    | Collapse Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we choose and option to be able to start with a collapsed side
    | bar. To adjust your sidebar layout simply set this  either true
    | this is compatible with layouts except top-nav layout option
    |
    */

    'collapse_sidebar' => true,

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Register here your dashboard, logout, login and register URLs. The
    | logout URL automatically sends a POST request in Laravel 5.3 or higher.
    | You can set the request to a GET or POST with logout_method.
    | Set register_url to null if you don't want a register link.
    |
    */

    'dashboard_url' => 'home',

    'logout_url' => 'logout',

    'logout_method' => null,

    'login_url' => 'login',

    'register_url' => 'register',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Specify your menu items to display in the left sidebar. Each menu item
    | should have a text and and a URL. You can also specify an icon from
    | Font Awesome. A string instead of an array represents a header in sidebar
    | layout. The 'can' is a filter on Laravel's built in Gate functionality.
    |
    */

    'menu' => [
        'MENU',
        [
            'text'        => 'Sócios',
            'url'         => '/members/search',
            'icon'        => 'users',
            'label'       => '',
            'label_color' => 'success',
        ],

        [
            'text'        => 'Parceiros',
            'url'         => '/partners/search',
            'icon'        => 'handshake-o',
            'label'       => '',
            'label_color' => 'success',
        ],

        [
            'text'        => 'Eventos',
            'url'         => '/meetings/',
            'icon'        => 'calendar',
            'label'       => '',
            'label_color' => 'success',
        ],

        [
            'text'        => 'Unid.Gestoras',
            'url'         => '/management_units/',
            'icon'        => 'sitemap',
            'label'       => '',
            'label_color' => 'success',
        ],

        [
            'text'        => 'Fornecedores',
            'url'         => '/providers/',
            'icon'        => 'truck',
            'label'       => '',
            'label_color' => 'success',
        ],

                [
            'text'    => 'Patrimônios',
            'icon'    => 'building-o',
            'submenu' => [
                [
                    'text' => 'Pesquisa',
                    'url'  => '/patrimonials/',
                ],
                [
                    'text' => 'Requisições',
                    'url'  => '/patrimonial_requests/',
                ],
            ],
        ],

        [
            'text'        => 'Materiais',
            'url'         => '/materials/',
            'icon'        => 'shopping-basket',
            'label'       => '',
            'label_color' => 'success',
        ],

        [
            'text'        => 'Funcionários',
            'url'         => '/employees/search/',
            'icon'        => 'id-card',
            'label'       => '',
            'label_color' => 'success',
        ],

        [
            'text'    => 'Administração',
            'icon'    => 'gears',
            'submenu' => [
                [
                    'text'    => 'Sócios',
                    'url'     => '#',
                    'submenu' => [
                        [
                            'text' => 'Deslig.Motivos',
                            'url'  => '/member_status_reasons',
                        ],
                        [
                            'text'    => 'Level Two',
                            'url'     => '#',
                            'submenu' => [
                                [
                                    'text' => 'Level Three',
                                    'url'  => '#',
                                ],
                                [
                                    'text' => 'Level Three',
                                    'url'  => '#',
                                ],
                            ],
                        ],
                    ],
                ],
                [
                    'text' => 'Patrimônios',
                    'url'  => '#',
                    'submenu' => [
                        [
                            'text' => 'Tipos',
                            'url'  => '/patrimonial_types',
                        ],
                        [
                            'text' => 'Sub-Tipos',
                            'url'  => '/patrimonial_sub_types',
                        ],
                        [
                            'text' => 'Marcas',
                            'url'  => '/patrimonial_brands',
                        ],
                                                [
                            'text' => 'Modelos',
                            'url'  => '/patrimonial_models',
                        ],

                        
                    ],
                ],
                [
                    'text' => 'Parceiros',
                    'url'  => '#',
                    'submenu' => [
                        [
                            'text' => 'Tipos',
                            'url'  => '/partner_types',
                        ],
                        [
                            'text' => 'Setores',
                            'url'  => '/partner_sectors',
                        ],                        
                    ],
                ],
                [
                    'text'    => 'Materiais',
                    'url'     => '#',
                    'submenu' => [
                        [
                            'text' => 'Unidades',
                            'url'  => '/material_units',
                        ],
                    ],
                ],
                [
                    'text' => 'Empresa',
                    'url'  => '#',
                    'submenu' => [
                        [
                            'text' => 'Cargos',
                            'url'  => '/company_positions',
                        ],
                        [
                            'text' => 'Funções',
                            'url'  => '/company_responsibilities',
                        ],                                                [
                            'text' => 'Setores',
                            'url'  => '/company_sectors',
                        ],
                        [
                            'text' => 'Sub-Setores',
                            'url'  => '/company_sub_sectors',
                        ],                        
                    ],
                ],
                [
                    'text'    => 'Eventos',
                    'url'     => '#',
                    'submenu' => [
                        [
                            'text' => 'Tipos',
                            'url'  => '/meeting_types',
                        ],
                    ],
                ],
                [
                    'text'    => 'Localidades',
                    'url'     => '#',
                    'submenu' => [
                        [
                            'text' => 'Regiões',
                            'url'  => '/regions',
                        ],
                        [
                            'text' => 'Estados',
                            'url'  => '/states',
                        ],
                        [
                            'text' => 'Cidades',
                            'url'  => '/cities',
                        ],
                    ],
                ],
                [
                    'text'    => 'Acessibilidade',
                    'url'     => '#',
                    'submenu' => [
                        [
                            'text' => 'Usuários',
                            'url'  => '/users',
                        ],
                        [
                            'text' => 'Grupos',
                            'url'  => '/roles',
                        ],
                    ],
                ],
            ],
        ],

        [
            'text'    => 'Vídeos',
            'icon'    => 'youtube',
            'submenu' => [
                [
                    'text' => 'Patrimônios',
                    'url'  => '#',
                    'submenu' => [
                        [
                            'text' => 'Cópia',
                            'url'  => 'https://youtu.be/MhDfjOdY71w',
                            'target' => '_blank'
                        ],
                        [
                            'text' => 'Movim - Inclusão',
                            'url'  => 'https://youtu.be/q1RI10LvL5U',
                            'target' => '_blank'
                        ],
                                                [
                            'text' => 'Movim - Confirm',
                            'url'  => 'https://youtu.be/Rm48O-9k0ew',
                            'target' => '_blank'
                        ],
                        [
                            'text' => 'Movim - Baixa',
                            'url'  => 'https://youtu.be/wdDT76G5tY0',
                            'target' => '_blank'
                        ],                        
                    ],
                ],
                
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Choose what filters you want to include for rendering the menu.
    | You can add your own filters to this array after you've created them.
    | You can comment out the GateFilter if you don't want to use Laravel's
    | built in Gate functionality
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SubmenuFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Choose which JavaScript plugins should be included. At this moment,
    | only DataTables is supported as a plugin. Set the value to true
    | to include the JavaScript file from a CDN via a script tag.
    |
    */

    'plugins' => [
        'datatables' => true,
        'select2'    => true,
    ],
];
