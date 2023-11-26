<?php

use Dcat\Admin\Admin;
use Dcat\Admin\Enums\LayoutType;
use Dcat\Admin\Enums\DarkModeType;
use Dcat\Admin\Enums\AuthLayoutType;
use Dcat\Admin\Enums\LayoutContentType;
use Dcat\Admin\Enums\LayoutDirectionType;

return [

    'title'  => env('APP_NAME'),

    'version' => env('VERSION', 'v'.Dcat\Admin\Admin::VERSION),

    // todo:: move to lang selector and add translators
    'supported_locales' => [
        'en' => [ 'title' => 'English', 'dir' => LayoutDirectionType::LTR],
        'es' => [ 'title' => 'Spain', 'dir' => LayoutDirectionType::LTR],
        'pt' => [ 'title' => 'Portugal', 'dir' => LayoutDirectionType::LTR],
        'ar' => [ 'title' => 'Arabic', 'dir' => LayoutDirectionType::RTL],
    ],

    // bg-light, bg-dark, bg-info... etc
    'meta' => [
        'description' => '',
        'keywords' => '',
        'disable_referrer' => true
    ],

    // theme-default, theme-semi-dark, theme-bordered
    'theme' => 'theme-default',

    'layout' => [
        'has_menu_collapser' => false,
        'auth_type' => AuthLayoutType::BASIC,

        'type' => LayoutType::VERTICAL,

        'dark_mode' => DarkModeType::SYSTEM,

        'dir' => LayoutDirectionType::LTR,

        'content_type' => LayoutContentType::XXL,

        // layout-menu-collapsed & layout-menu-fixed & layout-navbar-fixed & layout-footer-fixed
        'initials' => [
            Admin::CONTENT_INITIAL_MENU_FIXED,
            //Admin::CONTENT_INITIAL_MENU_COLLAPSED,
            Admin::CONTENT_INITIAL_NAV_FIXED,
            Admin::CONTENT_INITIAL_FOOTER_FXED,
        ],
        'footer_class' => 'bg-footer-theme',
    ],

    'auth' => [
        'enable' => true,

        'controller' => Dcat\Admin\Http\Controllers\AuthController::class,

        'guard' => 'admin',

        'guards' => [
            'admin' => [
                'driver'   => 'session',
                'provider' => 'admin',
            ],
        ],

        'providers' => [
            'admin' => [
                'driver' => 'eloquent',
                'model'  => Dcat\Admin\Models\Administrator::class,
            ],
        ],

        // Add "remember me" to login form
        'remember' => true,

        // All method to path like: auth/users/*/edit
        // or specific method to path like: get:auth/users.
        'except' => [
            'auth/login',
            'auth/logout',
        ],

        'enable_session_middleware' => true,

        'allow-register' => env('ALLOW_REGISTER', true),
        'registration-activation-enabled' => env('REGISTRATION_ACTIVATION_ENABLED', true),
        'allow-reset-password' => env('ALLOW_RESET_PASSWORD', true),
        'allow-socials' => env('ALLOW_SOCIALS', true),
        'recaptch-enabled' => env('ENABLE_RECAPTCHA', false),
        'recaptch-site'   => env('RE_CAP_SITE', 'YOURGOOGLECAPTCHAsitekeyHERE'),
        'recaptch-secret' => env('RE_CAP_SECRET', 'YOURGOOGLECAPTCHAsecretHERE'),
        'login-background-image' => env('LOGIN_BACKGROUND_IMAGE', '/vendor/dcat-admin/images/login-bg.png'),
    ],

    /*
    |--------------------------------------------------------------------------
    | dcat-admin favicon
    |--------------------------------------------------------------------------
    |
    */
    'icons' => [
        'icon-32' => '/vendor/dcat-admin/images/icon-32.png',
        'icon-192' => '/vendor/dcat-admin/images/icon-192.png'
    ],

        /*
     |--------------------------------------------------------------------------
     | User default avatar
     |--------------------------------------------------------------------------
     |
     | Set a default avatar for newly created users.
     |
     */
    'default_avatar' => '/vendor/dcat-admin/images/default-avatar.png',


    'logo-mini' => env('APP_LOGO_MINI', '/vendor/dcat-admin/images/logo-mini.png'),
    'logo-mini-dark' => env('APP_LOGO_MINI_DARK', '/vendor/dcat-admin/images/logo-mini-dark.png'),
    'logo-image'        => env('APP_LOGO_IMAGE', '/vendor/dcat-admin/images/logo.png'),
    'logo-image-dark'   => env('APP_LOGO_IMAGE_DARK', '/vendor/dcat-admin/images/logo-dark.png'),

    //todo::rm
    //'disable_no_referrer_meta' => true,
    'paginate-default' => env('PAGINATE_DEF', 20),
    //todo::rm
    'login-layout' => env('LOGIN_LAYOUT', 'primary'),
    //todo::rm
    'powered' => env('POWERED_BY', 'Powered by <a target="_blank" href="https://dev4traders.com">dev4taders</a>'),
    //todo::rm
    'allow-register' => env('ALLOW_REGISTER', false),
    //todo::rm
    'registration-activation-enabled' => env('REGISTRATION_ACTIVATION_ENABLED', false),
    //todo::rm
    'allow-reset-password' => env('ALLOW_RESET_PASSWORD', false),
    //todo::rm
    'login-image' => env('LOGIN_IMAGE', 'images/login.png'),
    //todo::rm
    'login-background-image' => env('LOGIN_BACKGROUND_IMAGE', 'images/login-bg.jpg'),


    /*
    |--------------------------------------------------------------------------
    | dcat-admin name
    |--------------------------------------------------------------------------
    |
    | This value is the name of dcat-admin, This setting is displayed on the
    | login page.
    |
    */
    //todo::rm use app name
    'name'      => env('APP_NAME'),

    //'version' => env('VERSION', 'v'.Admin::VERSION),
    /*
    |--------------------------------------------------------------------------
    | dcat-admin logo
    |--------------------------------------------------------------------------
    |
    | The logo of all admin pages. You can also set it as an image by using a
    | `img` tag, eg '<img src="http://logo-url" alt="Admin logo">'.
    |
    */
    //todo:rm
    //'logo-image'      => env('APP_LOGO_IMAGE', 'images/logo.png'),

    /*
    |--------------------------------------------------------------------------
    | dcat-admin mini logo
    |--------------------------------------------------------------------------
    |
    | The logo of all admin pages when the sidebar menu is collapsed. You can
    | also set it as an image by using a `img` tag, eg
    | '<img src="http://logo-url" alt="Admin logo">'.
    |
    */
    //todo:rm
    'logo-mini' => env('APP_LOGO_MINI', 'images/logo-mini.png'),

    /*
    |--------------------------------------------------------------------------
    | dcat-admin route settings
    |--------------------------------------------------------------------------
    |
    | The routing configuration of the admin page, including the path prefix,
    | the controller namespace, and the default middleware. If you want to
    | access through the root path, just set the prefix to empty string.
    |
    */
    'route' => [
        'domain' => env('ADMIN_ROUTE_DOMAIN'),

        'prefix' => env('ADMIN_ROUTE_PREFIX', 'admin'),

        'namespace' => 'App\\Admin\\Controllers',

        'middleware' => ['web', 'admin'],

        'enable_session_middleware' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | dcat-admin install directory
    |--------------------------------------------------------------------------
    |
    | The installation directory of the controller and routing configuration
    | files of the administration page. The default is `app/Admin`, which must
    | be set before running `artisan admin::install` to take effect.
    |
    */
    'directory' => app_path('Admin'),

    /*
    |--------------------------------------------------------------------------
    | Assets hostname
    |--------------------------------------------------------------------------
    |
   */
    'assets_server' => env('ADMIN_ASSETS_SERVER'),

    /*
    |--------------------------------------------------------------------------
    | Access via `https`
    |--------------------------------------------------------------------------
    |
    | If your page is going to be accessed via https, set it to `true`.
    |
    */
    'https' => env('ADMIN_HTTPS', false),

    /*
    |--------------------------------------------------------------------------
    | dcat-admin auth setting
    |--------------------------------------------------------------------------
    |
    | Authentication settings for all admin pages. Include an authentication
    | guard and a user provider setting of authentication driver.
    |
    | You can specify a controller for `login` `logout` and other auth routes.
    |
    */

    /*
    |--------------------------------------------------------------------------
    | The global Grid setting
    |--------------------------------------------------------------------------
    */
    'grid' => [

        'page-count-default' => env('PAGE_COUNT_DEF', 20),

        // The global Grid action display class.
        'grid_action_class' => Dcat\Admin\Grid\Displayers\DropdownActions::class,

        // The global Grid batch action display class.
        'batch_action_class' => Dcat\Admin\Grid\Tools\BatchActions::class,

        // The global Grid pagination display class.
        'paginator_class' => Dcat\Admin\Grid\Tools\Paginator::class,

        'actions' => [
            'view' => Dcat\Admin\Grid\Actions\Show::class,
            'edit' => Dcat\Admin\Grid\Actions\Edit::class,
            'quick_edit' => Dcat\Admin\Grid\Actions\QuickEdit::class,
            'delete' => Dcat\Admin\Grid\Actions\Delete::class,
            'batch_delete' => Dcat\Admin\Grid\Tools\BatchDelete::class,
        ],

        // The global Grid column selector setting.
        'column_selector' => [
            'store' => Dcat\Admin\Grid\ColumnSelector\SessionStore::class,
            'store_params' => [
                'driver' => 'file',
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | dcat-admin helpers setting.
    |--------------------------------------------------------------------------
    */
    'helpers' => [
        'enable' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | dcat-admin permission setting
    |--------------------------------------------------------------------------
    |
    | Permission settings for all admin pages.
    |
    */
    'permission' => [
        // Whether enable permission.
        'enable' => true,

        // All method to path like: auth/users/*/edit
        // or specific method to path like: get:auth/users.
        'except' => [
            '/',
            'auth/login',
            'auth/logout',
            'auth/setting',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | dcat-admin menu setting
    |--------------------------------------------------------------------------
    |
    */
    'menu' => [
        'cache' => [
            // enable cache or not
            'enable' => false,
            'store'  => 'file',
        ],

        // Whether enable menu bind to a permission.
        'bind_permission' => true,

        // Whether enable role bind to menu.
        'role_bind_menu' => false,

        // Whether enable permission bind to menu.
        'permission_bind_menu' => false,

        'default_icon' => 'fa icon-check',
    ],

    /*
    |--------------------------------------------------------------------------
    | dcat-admin upload setting
    |--------------------------------------------------------------------------
    |
    | File system configuration for form upload files and images, including
    | disk and upload path.
    |
    */
    'upload' => [

        // Disk in `config/filesystem.php`.
        'disk' => 'public',

        // Image and file upload path under the disk above.
        'directory' => [
            'image' => 'images',
            'file'  => 'files',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | dcat-admin database settings
    |--------------------------------------------------------------------------
    |
    | Here are database settings for dcat-admin builtin model & tables.
    |
    */
    'database' => [

        // Database connection for following tables.
        'connection' => '',

        // User tables and model.
        'users_table' => 'admin_users',
        'users_model' => Dcat\Admin\Models\Administrator::class,

        // Role table and model.
        'roles_table' => 'admin_roles',
        'roles_model' => Dcat\Admin\Models\Role::class,

        // Permission table and model.
        'permissions_table' => 'admin_permissions',
        'permissions_model' => Dcat\Admin\Models\Permission::class,

        // Menu table and model.
        'menu_table' => 'admin_menu',
        'menu_model' => Dcat\Admin\Models\Menu::class,

        // Domains table and model.
        'domains_table' => 'admin_domains',
        'domains_model' => Dcat\Admin\Models\Domain::class,

        // Domains Emais table and model.
        'domain_mails_table' => 'admin_mails',
        'domain_mails_model' => Dcat\Admin\Models\DomainEmail::class,

        // Domains Emais Templates table and model.
        'mail_templates_table' => 'admin_mail_templates',
        'mail_templates_model' => Dcat\Admin\Models\DomainMailTemplate::class,

        // Domains Menu Settings table and model.
        'mail_templates_table' => 'admin_mail_templates',
        'mail_templates_model' => Dcat\Admin\Models\DomainMailTemplate::class,

        'menu_domain_settings_table' => 'admin_menu_domain_settings',
        'menu_domain_settings_model' => Dcat\Admin\Models\MenuDomainSetting::class,

        'system_notification_settings_table' => 'admin_system_notification_settings',
        'system_notification_settings_model' => Dcat\Admin\Models\SystemNotificationSetting::class,

        // Tags table and model.
        'tags_table' => 'admin_tags',
        'tags_model' => Dcat\Admin\Models\Tag::class,

        // Pivot table for table above.
        'role_users_table'       => 'admin_role_users',
        'role_permissions_table' => 'admin_role_permissions',
        'role_menu_table'        => 'admin_role_menu',
        'permission_menu_table'  => 'admin_permission_menu',
        'settings_table'         => 'admin_settings',
        'extensions_table'       => 'admin_extensions',
        'extension_histories_table' => 'admin_extension_histories',
        'domain_role_defaults_table' => 'admin_domain_role_defaults'
    ],

    //todo:rm
    /*
    |--------------------------------------------------------------------------
    | Application layout
    |--------------------------------------------------------------------------
    |
    | This value is the layout of admin pages.
    */
    // 'layout' => [
    //     // default, blue, blue-light, green
    //     'color' => 'default',

    //     // sidebar-separate
    //     'body_class' => [''],
    //     'horizontal_menu' => false,

    //     'sidebar_collapsed' => false,

    //     // light, primary, dark
    //     'sidebar_style' => 'light',

    //     'dark_mode_switch' => true,

    //     // bg-primary, bg-info, bg-warning, bg-success, bg-danger, bg-dark
    //     'navbar_color' => '',
    // ],

    /*
    |--------------------------------------------------------------------------
    | The exception handler class
    |--------------------------------------------------------------------------
    |
    */
    'exception_handler' => Dcat\Admin\Exception\Handler::class,

    /*
    |--------------------------------------------------------------------------
    | Enable default breadcrumb
    |--------------------------------------------------------------------------
    |
    | Whether enable default breadcrumb for every page content.
    */
    'enable_default_breadcrumb' => true,

    /*
    |--------------------------------------------------------------------------
    | Extension
    |--------------------------------------------------------------------------
    */
    'extension' => [
        // When you use command `php artisan admin:ext-make` to generate extensions,
        // the extension files will be generated in this directory.
        'dir' => base_path('dcat-admin-extensions'),
    ],
];
