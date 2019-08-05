<?php
/**
 * Scovalini functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Scovalini
 */

if ( ! function_exists( 'scovalini_setup' ) ) :
  /**
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which
   * runs before the init hook. The init hook is too late for some features, such
   * as indicating support for post thumbnails.
   */
  function scovalini_setup() {
    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on Scovalini, use a find and replace
     * to change 'scovalini' to the name of your theme in all the template files.
     */
    load_theme_textdomain( 'scovalini', get_template_directory() . '/languages' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support( 'post-thumbnails' );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
      'menu-1' => esc_html__( 'Header menu', 'scovalini' ),
      'menu-2' => esc_html__( 'Footer menu', 'scovalini' ),
    ) );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    ) );

    // Set up the WordPress core custom background feature.
    add_theme_support( 'custom-background', apply_filters( 'scovalini_custom_background_args', array(
      'default-color' => 'ffffff',
      'default-image' => '',
    ) ) );

    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support( 'custom-logo', array(
      'height'      => 250,
      'width'       => 250,
      'flex-width'  => true,
      'flex-height' => true,
    ) );
  }
endif;
add_action( 'after_setup_theme', 'scovalini_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function scovalini_content_width() {
  // This variable is intended to be overruled from themes.
  // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
  // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
  $GLOBALS['content_width'] = apply_filters( 'scovalini_content_width', 640 );
}
add_action( 'after_setup_theme', 'scovalini_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function scovalini_widgets_init() {
  register_sidebar( array(
    'name'          => esc_html__( 'Sidebar', 'scovalini' ),
    'id'            => 'sidebar-1',
    'description'   => esc_html__( 'Add widgets here.', 'scovalini' ),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );
}
add_action( 'widgets_init', 'scovalini_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function scovalini_scripts() {
  wp_enqueue_style( 'scovalini-style', get_stylesheet_uri() );

  wp_enqueue_script( 'scovalini-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

  wp_enqueue_script( 'scovalini-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

  wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/js/slick.min.js', array('jquery'), '1.8.1', true );

  wp_enqueue_script( 'api-maps-yandex', 'https://api-maps.yandex.ru/2.1/?lang=ru_RU', array('jquery'), '', true );

  wp_enqueue_script( 'scovalini-js', get_template_directory_uri() . '/js/main.js', array('jquery'), '0.0.1', true );

  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }
}
add_action( 'wp_enqueue_scripts', 'scovalini_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
  require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
  require get_template_directory() . '/inc/woocommerce.php';
}


/*
 * Вывод переключателя языков
 */

if ( function_exists('pll_the_languages') ) {

  function my_pll() {
    $translations = pll_the_languages( array( 'raw' => 1 ) );
    //print_r($translations);
    echo '<div class="language">';
    foreach ($translations as $lang_array) {
        if ( $lang_array["current_lang"] == 1 ) {
            echo '<span class="language__current">' . $lang_array["name"] . '</span>';
        } else {
            $pll_links .= '<a href="' . $lang_array['url'] . '" class="language__link">' . $lang_array['name'] . '</a>';
        }
    }//foreach
      echo '<div class="language__choose">';
        echo $pll_links;
      echo '</div><!-- .language__choose -->';
    echo '</div><!-- .language -->';
  }
  add_action( 'add_my_pll', 'my_pll', 10, 2);

}//Проверка подключения Polylang



//pll_register_string( $name, $string, $group, $multiline );

if (function_exists('pll_register_string')) {

    pll_register_string( 'Телефон', 'phone_1' , 'Contacts', false );
    pll_register_string( 'Адрес', 'address' , 'Contacts', false );
    pll_register_string( 'Почта', 'email' , 'Contacts', false );
    pll_register_string( 'Координаты', 'coordinates' , 'Contacts', false );
    pll_register_string( 'Меню', 'menu' , 'Menu', false );

//Home Slider
    pll_register_string( 'Заголовок', 'hs_title_1' , 'Home Slider', false );
    pll_register_string( 'Описание', 'hs_desc_1' , 'Home Slider', false );
    pll_register_string( 'Кнопка', 'hs_btn_1' , 'Home Slider', false );
    pll_register_string( 'Заголовок', 'hs_title_2' , 'Home Slider', false );
    pll_register_string( 'Описание', 'hs_desc_2' , 'Home Slider', false );
    pll_register_string( 'Кнопка', 'hs_btn_2' , 'Home Slider', false );

    pll_register_string( 'Заголовок блока с товарами', 'home_products_title' , 'Home', false );
    pll_register_string( 'Кнопка подробнее', 'more_btn' , 'Home', false );

    //Footer Contacts
    pll_register_string( 'Заголовок карты', 'footer_contacts_title' , 'Footer Contacts', false );
    pll_register_string( 'Адрес - заголовок', 'footer_contacts_address' , 'Footer Contacts', false );
    pll_register_string( 'Телефон - заголовок', 'footer_contacts_phone' , 'Footer Contacts', false );
    pll_register_string( 'Почта - заголовок', 'footer_contacts_support' , 'Footer Contacts', false );

    //Footer Form
    pll_register_string( 'Заголовок формы', 'f_title' , 'Footer Form', false );
    pll_register_string( 'Описание формы', 'f_desc' , 'Footer Form', false );
    pll_register_string( 'Имя', 'f_name' , 'Footer Form', false );
    pll_register_string( 'Фамилия', 'f_surname' , 'Footer Form', false );
    pll_register_string( 'Сообщение', 'f_text' , 'Footer Form', false );
    pll_register_string( 'Кнопка', 'f_btn' , 'Footer Form', false );

}//Проверка подключения Polylang


//Главная страница в хлебных крошках
add_filter('bcn_breadcrumb_title', 'my_breadcrumb_title_swapper', 3, 10);
function my_breadcrumb_title_swapper($title, $type, $id)
{
    if(in_array('home', $type))
    {
        $title = __('Home');
    }
    return $title;
}