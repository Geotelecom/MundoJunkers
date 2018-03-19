<?php

if (!defined('_PS_VERSION_'))
    exit ;

class RoyThemesCustomizer extends Module {

    private $systemFonts = array("Arial", "Georgia", "Tahoma", "Times New Roman", "Verdana");

    private $gfonts = "Arial;Georgia;Tahoma;Times New Roman;Verdana;ABeeZee;Abel;Abril Fatface;Aclonica;Acme;Actor;Adamina;Advent Pro;Aguafina Script;Akronim;Aladin;Aldrich;Alegreya;Alegreya SC;Alex Brush;Alfa Slab One;Alice;Alike;Alike Angular;Allan;Allerta;Allerta Stencil;Allura;Almendra;Almendra Display;Almendra SC;Amarante;Amaranth;Amatic SC;Amethysta;Anaheim;Andada;Andika;Angkor;Annie Use Your Telescope;Anonymous Pro;Antic;Antic Didone;Antic Slab;Anton;Arapey;Arbutus;Arbutus Slab;Architects Daughter;Archivo Black;Archivo Narrow;Arimo;Arizonia;Armata;Artifika;Arvo;Asap;Asset;Astloch;Asul;Atomic Age;Aubrey;Audiowide;Autour One;Average;Average Sans;Averia Gruesa Libre;Averia Libre;Averia Sans Libre;Averia Serif Libre;Bad Script;Balthazar;Bangers;Basic;Battambang;Baumans;Bayon;Belgrano;Belleza;BenchNine;Bentham;Berkshire Swash;Bevan;Bigelow Rules;Bigshot One;Bilbo;Bilbo Swash Caps;Bitter;Black Ops One;Bokor;Bonbon;Boogaloo;Bowlby One;Bowlby One SC;Brawler;Bree Serif;Bubblegum Sans;Bubbler One;Buda;Buenard;Butcherman;Butterfly Kids;Cabin;Cabin Condensed;Cabin Sketch;Caesar Dressing;Cagliostro;Calligraffitti;Cambo;Candal;Cantarell;Cantata One;Cantora One;Capriola;Cardo;Carme;Carrois Gothic;Carrois Gothic SC;Carter One;Caudex;Cedarville Cursive;Ceviche One;Changa One;Chango;Chau Philomene One;Chela One;Chelsea Market;Chenla;Cherry Cream Soda;Cherry Swash;Chewy;Chicle;Chivo;Cinzel;Cinzel Decorative;Clicker Script;Coda;Coda Caption;Codystar;Combo;Comfortaa;Coming Soon;Concert One;Condiment;Content;Contrail One;Convergence;Cookie;Copse;Corben;Courgette;Cousine;Coustard;Covered By Your Grace;Crafty Girls;Creepster;Crete Round;Crimson Text;Croissant One;Crushed;Cuprum;Cutive;Cutive Mono;Damion;Dancing Script;Dangrek;Dawning of a New Day;Days One;Delius;Delius Swash Caps;Delius Unicase;Della Respira;Devonshire;Didact Gothic;Diplomata;Diplomata SC;Domine;Doppio One;Dorsa;Dosis;Dr Sugiyama;Droid Sans;Droid Sans Mono;Droid Serif;Duru Sans;Dynalight;EB Garamond;Eagle Lake;Eater;Economica;Electrolize;Emblema One;Emilys Candy;Engagement;Englebert;Enriqueta;Erica One;Esteban;Euphoria Script;Ewert;Exo;Expletus Sans;Fanwood Text;Fascinate;Fascinate Inline;Faster One;Fasthand;Federant;Federo;Felipa;Fenix;Finger Paint;Fjord One;Flamenco;Flavors;Fondamento;Fontdiner Swanky;Forum;Francois One;Freckle Face;Fredericka the Great;Fredoka One;Freehand;Fresca;Frijole;Fugaz One;GFS Didot;GFS Neohellenic;Gafata;Galdeano;Galindo;Gentium Basic;Gentium Book Basic;Geo;Geostar;Geostar Fill;Germania One;Gilda Display;Give You Glory;Glass Antiqua;Glegoo;Gloria Hallelujah;Goblin One;Gochi Hand;Gorditas;Goudy Bookletter 1911;Graduate;Grand Hotel;Gravitas One;Great Vibes;Griffy;Gruppo;Gudea;Habibi;Hammersmith One;Hanalei;Hanalei Fill;Handlee;Hanuman;Happy Monkey;Headland One;Henny Penny;Herr Von Muellerhoff;Holtwood One SC;Homemade Apple;Homenaje;IM Fell DW Pica;IM Fell DW Pica SC;IM Fell Double Pica;IM Fell Double Pica SC;IM Fell English;IM Fell English SC;IM Fell French Canon;IM Fell French Canon SC;IM Fell Great Primer;IM Fell Great Primer SC;Iceberg;Iceland;Imprima;Inconsolata;Inder;Indie Flower;Inika;Irish Grover;Istok Web;Italiana;Italianno;Jacques Francois;Jacques Francois Shadow;Jim Nightshade;Jockey One;Jolly Lodger;Josefin Sans;Josefin Slab;Joti One;Judson;Julee;Julius Sans One;Junge;Jura;Just Another Hand;Just Me Again Down Here;Kameron;Karla;Kaushan Script;Keania One;Kelly Slab;Kenia;Khmer;Kite One;Knewave;Kotta One;Koulen;Kranky;Kreon;Kristi;Krona One;La Belle Aurore;Lancelot;Lato;League Script;Leckerli One;Ledger;Lekton;Lemon;Libre Baskerville;Life Savers;Lilita One;Limelight;Linden Hill;Lobster;Lobster Two;Londrina Outline;Londrina Shadow;Londrina Sketch;Londrina Solid;Lora;Love Ya Like A Sister;Loved by the King;Lovers Quarrel;Luckiest Guy;Lusitana;Lustria;Macondo;Macondo Swash Caps;Magra;Maiden Orange;Mako;Marcellus;Marcellus SC;Marck Script;Margarine;Marko One;Marmelad;Marvel;Mate;Mate SC;Maven Pro;McLaren;Meddon;MedievalSharp;Medula One;Megrim;Meie Script;Merienda;Merienda One;Merriweather;Metal;Metal Mania;Metamorphous;Metrophobic;Michroma;Milonga;Miltonian;Miltonian Tattoo;Miniver;Miss Fajardose;Modern Antiqua;Molengo;Molle;Monda;Monofett;Monoton;Monsieur La Doulaise;Montaga;Montez;Montserrat;Montserrat Alternates;Montserrat Subrayada;Moul;Moulpali;Mountains of Christmas;Mouse Memoirs;Mr Bedfort;Mr Dafoe;Mr De Haviland;Mrs Saint Delafield;Mrs Sheppards;Muli;Mystery Quest;Neucha;Neuton;New Rocker;News Cycle;Niconne;Nixie One;Nobile;Nokora;Norican;Nosifer;Nothing You Could Do;Noticia Text;Nova Cut;Nova Flat;Nova Mono;Nova Oval;Nova Round;Nova Script;Nova Slim;Nova Square;Numans;Nunito;Odor Mean Chey;Offside;Old Standard TT;Oldenburg;Oleo Script;Oleo Script Swash Caps;Open Sans;Open Sans Condensed:300,700;Oranienbaum;Orbitron;Oregano;Orienta;Original Surfer;Oswald;Over the Rainbow;Overlock;Overlock SC;Ovo;Oxygen;Oxygen Mono;PT Mono;PT Sans;PT Sans Caption;PT Sans Narrow;PT Serif;PT Serif Caption;Pacifico;Paprika;Parisienne;Passero One;Passion One;Patrick Hand;Patua One;Paytone One;Peralta;Permanent Marker;Petit Formal Script;Petrona;Philosopher;Piedra;Pinyon Script;Pirata One;Plaster;Play;Playball;Playfair Display;Playfair Display SC;Podkova;Poiret One;Poller One;Poly;Pompiere;Pontano Sans;Port Lligat Sans;Port Lligat Slab;Prata;Preahvihear;Press Start 2P;Princess Sofia;Prociono;Prosto One;Puritan;Purple Purse;Quando;Quantico;Quattrocento;Quattrocento Sans;Questrial;Quicksand;Quintessential;Qwigley;Racing Sans One;Radley;Raleway;Raleway Dots;Rambla;Rammetto One;Ranchers;Rancho;Rationale;Redressed;Reenie Beanie;Revalia;Ribeye;Ribeye Marrow;Righteous;Risque;Roboto; Rochester;Rock Salt;Rokkitt;Romanesco;Ropa Sans;Rosario;Rosarivo;Rouge Script;Ruda;Rufina;Ruge Boogie;Ruluko;Rum Raisin;Ruslan Display;Russo One;Ruthie;Rye;Sacramento;Sail;Salsa;Sanchez;Sancreek;Sansita One;Sarina;Satisfy;Scada;Schoolbell;Seaweed Script;Sevillana;Seymour One;Shadows Into Light;Shadows Into Light Two;Shanti;Share;Share Tech;Share Tech Mono;Shojumaru;Short Stack;Siemreap;Sigmar One;Signika;Signika Negative;Simonetta;Sirin Stencil;Six Caps;Skranji;Slackey;Smokum;Smythe;Sniglet;Snippet;Snowburst One;Sofadi One;Sofia;Sonsie One;Sorts Mill Goudy;Source Code Pro;Source Sans Pro;Special Elite;Spicy Rice;Spinnaker;Spirax;Squada One;Stalemate;Stalinist One;Stardos Stencil;Stint Ultra Condensed;Stint Ultra Expanded;Stoke;Strait;Sue Ellen Francisco;Sunshiney;Supermercado One;Suwannaphum;Swanky and Moo Moo;Syncopate;Tangerine;Taprom;Telex;Tenor Sans;Text Me One;The Girl Next Door;Tienne;Tinos;Titan One;Titillium Web;Trade Winds;Trocchi;Trochut;Trykker;Tulpen One;Ubuntu;Ubuntu Condensed;Ubuntu Mono;Ultra;Uncial Antiqua;Underdog;Unica One;UnifrakturCook;UnifrakturMaguntia;Unkempt;Unlock;Unna;VT323;Vampiro One;Varela;Varela Round;Vast Shadow;Vibur;Vidaloka;Viga;Voces;Volkhov;Vollkorn;Voltaire;Waiting for the Sunrise;Wallpoet;Walter Turncoat;Warnes;Wellfleet;Wire One;Yanone Kaffeesatz;Yellowtail;Yeseva One;Yesteryear;Zeyada";


    public function __construct() {
        $this -> name = 'roythemescustomizer';
        $this -> tab = 'front_office_features';
        $this -> version = '2.0';
        $this -> author = 'RoyThemes';
        $this -> need_instance = 0;

        parent::__construct();

        $this->displayName = $this->l('RoyThemes Customizer - MODEZ ORIGINAL');
        $this->description = $this->l('Change design of your theme');

        $this -> defaults = array(
            "main_background_color" => "#e5e5e5",
            "content_background_color" => "#fdfdfd",
            "body_bg_ext" => "",
            "body_bg_repeat" => 0,
            "body_bg_position" => 0,
            "body_bg_fixed" => 0,
            "gradient_scheme" => "flame",
            "display_gradient" => 1,
            "body_bg_pattern" => 0,
            "font_size_body" => 13,
            "font_size_menu" => 20,
            "font_size_buttons" => 16,
            "font_size_price" => 20,
            "cart_color" => "#ffffff",
            "cart_background_color" => "#000000",
            "cart_icon_ext" => "png",
            "f_contacts_ext" => "png",
            "c_arrow_color" => "#fa7c63",
            "menu_border" => "#a2a2a2",
            "brand_bg" => "#ffffff",
            "brand_border" => "#e5e5e5",
             //  *******************  GLOBALS
            "g_body_link" => "#888888",
            "g_body_link_hover" => "#515151",
            "g_table_title_bg" => "#ffffff",
            "g_table_title_color" => "#333333",
            "g_table_bg" => "#ffffff",
            "g_table_total" => "#fbfbfb",
            "g_box" => "#ffffff",
            "g_box_title" => "#222222",
            "g_box_title_border" => "#fafafa",
            "g_label" => "#333333",
            "g_checkbox_label" => "#777777",
            "g_input_bg" => "#ffffff",
            "g_input_border" => "#e5e5e5",
            "g_input_color" => "#9b9b9b",
            "g_form" => "#ffffff",
            "g_form_grey" => "#fbfbfb",
            "top_line_background" => "#313743",
            "desc_height" => 0,
            "breadcrumb" => 1,
            "b_text" => "#ababab",
            "b_link" => "#888888",
            "b_link_hover" => "#fa7c63",
            "b_separator" => "#d5d5d5",
            "b_ext" => "png",
            "f_headings" => "Oswald", //  *******************  FONTS and BUTTONS
            "f_text" => "Roboto",
            "f_price" => "Oswald",
            "latin_ext" => 0,
            "cyrillic" => 0,
            "b_normal_bg" => "#a1d7ca",
            "b_normal_border" => "#6dad9d",
            "b_normal_border_hover" => "#515151",
            "b_ex_border" => "#ce573f",
            "b_normal_bg_hover" => "#6d6d6d",
            "b_normal_color" => "#ffffff",
            "b_normal_color_hover" => "#ffffff",
            "b_ex_bg" => "#fa7c63",
            "b_ex_color" => "#ffffff",
            "cl_label" => "#bec4cf", //  *******************  HOMEPAGE and TOP CONTENT
            "cl_value" => "#e1e3e8",
            "ban_title" => "#ffffff",
            "ban_text" => "#ffffff",
            "ban_button" => "#fa7c63",
            "ban_bg" => "#a1d7ca",
            "ban_border" => "#ce573f",
            "ban_button_text" => "#ffffff",
            "cl_popup_bg" => "#313743",
            "cl_popup_border" => "#0f1218",
            "cl_popup_shadow" => 1,
            "banners_anim" => 1,
            "cl_popup_item" => "#e1e3e8",
            "cl_popup_item_hover" => "#ffffff",
            "cl_display_cur" => 1,
            "cl_display_lan" => 1,
            "ta_link" => "#bec4cf",
            "ta_link_hover" => "#ffffff",
            "ta_separator" => "#828b9b",
            "ta_welcome" => "#cccccc",
            "ta_name" => "#ffffff",
            "ip_bg" => "#fafafa",
            "ip_border" => "#5d6779",
            "ip_title" => "#818ca1",
            "ip_text" => "#a4aec1",
            "ip_tel_ext" => "png",
            "ip_time_ext" => "png",
            "ip_truck_ext" => "png",
            "ip_money_ext" => "png",
            "ip_anim" => 1,
            "slider_mode" => "1",
            "display_round" => 1,
            "s_lens_ext" => "png",
            "con_bg" => "#ffffff",
            "con_border" => "#ededed",
            "con_color" => "#d6d6d6",
            "s_con_bg" => "#a1d7ca",
            "s_con_border" => "#6dad9d",
            "s_con_color" => "#ffffff",
            "con_bg_hover" => "#6d6d6d",
            "con_border_hover" => "#515151",
            "con_color_hover" => "#ffffff",
            "hp_title" => "#333333",
            "hp_title_hover" => "#fa7c63",
            "hp_ext" => "png",
            "display_featured" => 1,
            "display_new" => 1,
            "display_best" => 1,
            "bottom_section" => "0",
            "menu_line_bg" => "#ffffff", //  *******************  MENU and SEARCH
            "menu_line_border" => "#e5e5e5",
            "menu_link_bg_color" => "#ffffff",
            "menu_link_bg_hover" => "#fafafa",
            "menu_link_bg_active" => "#fafafa",
            "menu_link_border_color" => "#e5e5e5",
            "menu_link_border_hover" => "#fa7c63",
            "menu_link_border_active" => "#b4b4b4",
            "menu_link_color" => "#484848",
            "menu_hover_color" => "#484848",
            "menu_link_active" => "#888888",
            "menu_img_ext" => "png",
            "submenu_bg_color" => "#ffffff",
            "submenu_shadow" => 1,
            "submenu_link_color" => "#333333",
            "submenu_hover_color" => "#fa7c63",
            "submenu_before_line" => "#fa7c63",
            "submenu_border_top" => "#e5e5e5",
            "search_box_bg" => "#fafafa",
            "search_border" => "#ededed",
            "search_input_color" => "#9C9B9B",
            "search_button" => "#ffffff",
            "search_popup_bg" => "#ffffff",
            "search_popup_border" => "#e5e5e5",
            "search_shadow" => 1,
            "search_item_bg" => "#ffffff",
            "search_item_bg_hover" => "#fbfbfb",
            "sidebar_title_bg" => "#a1d7ca", //  *******************  PAGE ELEMENTS
            "sidebar_title_border" => "#6dad9d",
            "sidebar_title_color" => "#ffffff",
            "sidebar_title_link" => "#ffffff",
            "sidebar_title_link_hover" => "#2c403b",
            "sidebar_block_content_bg" => "#ffffff",
            "sidebar_block_content_border" => "#e5e5e5",
            "sidebar_block_text_color" => "#777777",
            "sidebar_block_link" => "#888888",
            "sidebar_block_link_hover" => "#1d1d1d",
            "sidebar_button_bg" => "#ffffff",
            "sidebar_button_border" => "#ededed",
            "sidebar_button_color" => "#999999",
            "sidebar_item_separator" => "#fafafa",
            "sidebar_product_img_border" => "#fafafa",
            "sidebar_categories_item" => "#333333",
            "sidebar_categories_item_hover" => "#fa7c63",
            "sidebar_categories_separator" => "#f5f5f5",
            "cms_title" => "#222222",
            "cms_title_border" => "#ededed",
            "cms_title_border_mark" => "#fa7c63",
            "page_text_color" => "#777777",
            "page_headings" => "#555555",
            "page_link" => "#888888",
            "page_link_hover" => "#515151",
            "contact_form_bg" => "#ffffff",
            "contact_form_border" => "#e5e5e5",
            "warning_message_bg" => "#888888",
            "warning_message_color" => "#ffffff",
            "success_message_bg" => "#48b151",
            "success_message_color" => "#ffffff",
            "info_message_bg" => "#5192f3",
            "info_message_color" => "#ffffff",
            "danger_message_bg" => "#fa7c63",
            "danger_message_color" => "#ffffff",
            "pl_heading_color" => "#222222", //  *******************  PRODUCT LIST
            "pl_heading_text" => "#888888",
            "pl_nav_top_bg" => "#ffffff",
            "pl_nav_top_border" => "#ededed",
            "pl_nav_grid" => "#fa7c63",
            "pl_nav_compare_border" => "#fafafa",
            "pl_nav_sort" => "#888888",
            "pl_number_bg" => "#f2f2f2",
            "pl_number_bg_hover" => "#6d6d6d",
            "pl_number_color" => "#888888",
            "pl_number_color_hover" => "#ffffff",
            "pl_pag_nav_bg" => "#f2f2f2",
            "pl_pag_nav_bg_hover" => "#6d6d6d",
            "pl_pag_nav_color" => "#888888",
            "pl_pag_nav_color_hover" => "#ffffff",
            "pl_pag_active_bg" => "#a1d7ca",
            "pl_pag_active_color" => "#ffffff",
            "pl_show_per_page" => "#888888",
            "pl_show_items" => "#ababab",
            "pl_filter_separator" => "#eeeeee",
            "pl_filter_range" => "#fa7c63",
            "pl_filter_range_out" => "#e5e5e5",
            "pl_filter_handle_bg" => "#fa7c63",
            "pl_filter_handle_border" => "#c0392b",
            "pl_item_bg" => "#ffffff",
            "pl_item_border" => "#e5e5e5",
            "pl_product_name" => "#333333",
            "pl_product_price" => "#fa7c63",
            "pl_product_oldprice" => "#999999",
            "pl_product_percent_bg" => "#fa7c63",
            "pl_product_percent" => "#ffffff",
            "pl_product_cart" => "#a1d7ca",
            "pl_product_cart_border" => "#6dad9d",
            "pl_product_cart_color" => "#ffffff",
            "pl_product_cart_active" => "#fa7c63",
            "pl_product_cart_active_border" => "#ce573f",
            "pl_product_cart_active_color" => "#ffffff",
            "pl_product_cart_hover" => "#6d6d6d",
            "pl_product_cart_hover_border" => "#515151",
            "pl_product_cart_hover_color" => "#ffffff",
            "pl_product_quickview" => "#ffffff",
            "pl_product_quickview_hover" => "#fa7c63",
            "pl_product_quickview_color" => "#ffffff",
            "pl_product_view_border" => "#f2f2f2",
            "pl_product_view_border_hover" => "#ce573f",
            "pl_product_compare" => "#909090",
            "pl_product_compare_hover" => "#323232",
            "pl_product_compare_icon" => "#ffffff",
            "pl_product_compare_icon_active" => "#fa7c63",
            "pl_product_wish_icon" => "#ffffff",
            "pl_product_wish_icon_active" => "#fa7c63",
            "pl_product_new_bg" => "#a1d7ca",
            "pl_product_new_border" => "#6dad9d",
            "pl_product_new_color" => "#ffffff",
            "pl_product_sale_bg" => "#fa7c63",
            "pl_product_sale_border" => "#ce573f",
            "pl_product_sale_color" => "#ffffff",
            "pl_product_qwtext" => 1,
            "pl_product_white_grad" => 1,
            "pl_product_display_quickview" => 1,
            "pl_product_display_view" => 1,
            "pl_product_display_new" => 1,
            "pl_product_display_sale" => 1,
            "pl_list_img_border" => "#ffffff",
            "pl_list_bg" => "#ffffff",
            "pl_list_separator" => "#f2f2f2",
            "pl_list_description" => "#777777",
            "c_left_column" => "#ffffff",
            "c_right_column" => "#fafafa",
            "c_left_color" => "#333333",
            "c_right_color" => "#777777",
            "c_img_border" => "#ffffff",
            "c_remove" => "#fa7c63",
            "c_remove_hover" => "#6d6d6d",
            "pl_view_ext" => "png",
            "pl_gl_ext" => "png",
            "pl_wc_ext" => "png",
            "pp_img_border" => "#ffffff", //  *******************  PRODUCT PAGE
            "pp_use_ext" => "png",
            "pp_icon_border" => "#e5e5e5",
            "pp_icon_border_hover" => "#a1d7ca",
            "pp_icon_nav_bg" => "#e5e5e5",
            "pp_icon_nav_bg_hover" => "#fa7c63",
            "pp_social_bg" => "#ffffff",
            "pp_social_color" => "#888888",
            "pp_useful_color" => "#ababab",
            "pp_useful_color_hover" => "#333333",
            "pp_useful_icon" => "#ffffff",
            "pp_display_social" => 1,
            "pp_display_wish" => 1,
            "pp_display_send" => 1,
            "pp_display_print" => 1,
            "pp_name" => "#6dad9d",
            "pp_desc" => "#6d6d6d",
            "pp_info_label" => "#ababab",
            "pp_info_value" => "#6d6d6d",
            "pp_display_refer" => 1,
            "pp_display_cond" => 1,
            "pp_display_avail" => 1,
            "pp_att_label" => "#333333",
            "pp_att_input_bg" => "#ffffff",
            "pp_att_color" => "#e5e5e5",
            "pp_att_color_active" => "#6d6d6d",
            "pp_att_quan_input_bg" => "#ffffff",
            "pp_att_quan_pm_bg" => "#e5e5e5",
            "pp_att_quan_pm_color" => "#6d6d6d",
            "pp_att_quan_pm_bg_hover" => "#ffffff",
            "pp_att_quan_pm_color_hover" => "#fa7c63",
            "pp_price_box" => "#ffffff",
            "pp_price_border" => "#e5e5e5",
            "pp_price_separator" => "#fafafa",
            "pp_price_color" => "#fa7c63",
            "pp_tabs_bg" => "#e9e9e9",
            "pp_tabs_bg_hover" => "#ffffff",
            "pp_tabs_color" => "#6d6d6d",
            "pp_tabs_color_hover" => "#6dad9d",
            "pp_tabs_sheets_bg" => "#ffffff",
            "pp_tabs_sheets_color" => "#777777",
            "pp_tabs_table_left" => "#fafafa",
            "pp_tabs_table_right" => "#ffffff",
            "pp_tabs_table_left_color" => "#6d6d6d",
            "pp_tabs_table_right_color" => "#777777",
            "pp_reviews_staron" => "#f56b35",
            "pp_reviews_staroff" => "#c0c0c0",
            "pp_reviews_name" => "#333333",
            "pp_reviews_date" => "#adadad",
            "pp_reviews_name_separator" => "#f2f2f2",
            "pp_reviews_block_separator" => "#f2f2f2",
            "pp_reviews_display_top" => 1,
            "pp_reviews_useful" => "#ababab",
            "pp_reviews_report" => "#ababab",
            "pp_reviews_yn" => "#888888",
            "pp_reviews_yn_border" => "#e5e5e5",
            "pp_ac_name" => "#333333",
            "pp_ac_price" => "#fa7c63",
            "pp_ac_desc" => "#6d6d6d",
            "pp_qw_bg" => "#fdfdfd",
            "c_title" => "#4b5363",//  *******************  CART and BUY MESSAGE
            "c_products" => "#818ca1",
            "c_bg" => "#fafafa",
            "c_bg_hover" => "#ffffff",
            "c_border" => "#ededed",
            "c_bg_icon" => "#ffffff",
            "c_border_icon" => "#f2f2f2",
            "c_display_arrow" => 1,
            "c_popup_bg" => "#fafafa",
            "c_popup_border" => "#f2f2f2",
            "c_popup_shadow" => 1,
            "c_product_q" => "#9b9b9b",
            "c_product_name" => "#5e5e5e",
            "c_product_name_hover" => "#000000",
            "c_product_atts" => "#9c9b9b",
            "c_product_price" => "#5e5e5e",
            "c_product_remove" => "#fa7c63",
            "c_product_remove_hover" => "#6d6d6d",
            "c_product_separator" => "#ffffff",
            "c_product_summary_bg" => "#ffffff",
            "c_product_summary_title" => "#888888",
            "c_product_summary_value" => "#333333",
            "c_summary_border" => "#e5e5e5",
            "lc_bg" => "#fafafa",
            "lc_v_separator" => "#f2f2f2",
            "lc_h_separator" => "#f2f2f2",
            "lc_success_bg" => "#46a74e",
            "lc_success_color" => "#ffffff",
            "lc_img_border" => "#e5e5e5",
            "lc_product_name" => "#333333",
            "lc_product_atts" => "#888888",
            "lc_product_atts_label" => "#333333",
            "lc_in_cart_bg" => "#ffffff",
            "lc_in_cart_color" => "#888888",
            "lc_total_bg" => "#ffffff",
            "lc_total_label" => "#333333",
            "lc_total_color" => "#888888",
            "lc_cross_title" => "#888888",
            "lc_close" => "#fa7c63",
            "lc_close_hover" => "#6d6d6d",
            "ma_required" => "#fa7c63", //  *******************  REGISTRATION and MY ACCOUNT
            "ma_title" => "#6d6d6d",
            "ma_title_hover" => "#333333",
            "ma_icon" => "#fa7c63",
            "ma_icon_border" => "#ce573f",
            "ma_icon_border_hover" => "#515151",
            "ma_icon_hover" => "#6d6d6d",
            "ma_footer_separator" => "#ededed",
            "i_ma_ext" => "png",
            "i_aut_ext" => "png",
            "o_number_bg" => "#d6d6d6", //  *******************  ORDER STEPS
            "o_number_color" => "#ffffff",
            "o_number_border" => "#b2b2b2",
            "o_number_border_active" => "#ce573f",
            "o_number_border_done" => "#ce573f",
            "o_number_border_done_hover" => "#515151",
            "o_number_title" => "#888888",
            "o_number_bg_active" => "#fa7c63",
            "o_number_color_active" => "#ffffff",
            "o_number_title_active" => "#000000",
            "o_number_bg_done" => "#fa7c63",
            "o_number_color_done" => "#ffffff",
            "o_number_title_done" => "#888888",
            "o_number_bg_done_hover" => "#6d6d6d",
            "o_number_color_done_hover" => "#ffffff",
            "o_number_title_done_hover" => "#fa7c63",
            "o_img_border" => "#ffffff",
            "o_product_name" => "#333333",
            "o_product_atts" => "#777777",
            "o_remove" => "#fa7c63",
            "o_remove_hover" => "#6d6d6d",
            "o_total_title" => "#333333",
            "o_total_price" => "#333333",
            "o_del_title" => "#333333",
            "o_del_item_bg" => "#ffffff",
            "o_del_item_text" => "#333333",
            "o_pay_item_bg" => "#f6f6f6",
            "o_pay_item_title" => "#333333",
            "o_pay_item_desc" => "#777777",
            "o_pay_item_chevron" => "#777777",
            "bl_heading" => "#ffffff",
            "bl_bg" => "#fdfdfd",
            "bl_date" => "#cccccc",
            "bl_border" => "#e5e5e5",
            "bl_mark" => "#a1d7ca",
            "bl_rm_bg" => "#a1d7ca",
            "bl_rm_border" => "#6dad9d",
            "bl_rm_bg_icon" => "#85c2b3",
            "bl_rm_border_icon" => "#5b998a",
            "bl_rm_bg_hover" => "#fa7c63",
            "bl_rm_border_hover" => "#ce573f",
            "bl_rm_color" => "#ffffff",
            "bl_rm_hover" => "#ffffff",
            "bl_title" => "#333333",
            "bl_title_hover" => "#fa7c63",
            "bl_bg_content" => "#ffffff",
            "bl_meta" => "#ababab",
            "bl_com_bg" => "#ffffff",
            "bl_com_name" => "#333333",
            "footer_top_line" => "#f2f2f2", //  *******************  FOOTER
            "footer_top_line_headings" => "#797979",
            "ns_border" => "#f2f2f2",
            "footer_news_input" => "#f2f2f2",
            "footer_news_button" => "#ffffff",
            "footer_news_button_bg" => "#a1d7ca",
            "footer_news_button_border" => "#6dad9d",
            "footer_news_display" => 1,
            "footer_social_display" => 1,
            "footer_background_color" => "#fafafa",
            "footer_txt_color" => "#545454",
            "footer_link_color" => "#545454",
            "footer_hover_color" => "#000000",
            "footer_account_disc" => "#fa7c63",
            "footer_up_bg" => "#fa7c63",
            "up_arrow_border" => "#ce573f",
            "up_arrow_color" => "#ffffff",
            "footer_up_display" => 1,
            "footer_contact_display" => 1,
            "footer_account_display" => 1,
            "footer_categories_display" => 1,
            "footer_info_display" => 1,
            "footer_bottom_line" => "#313743",
            "footer_payment_display" => 1,
            "footer_pl_visa" => 1,
            "footer_pl_mastercard" => 1,
            "footer_pl_maestro" => 1,
            "footer_pl_discover" => 1,
            "footer_pl_paypal" => 1,
            "footer_copyright_display" => 1,
            "footer_bottom_text" => "#828b9b",
            "ps_quick_view" => 1,
            "nc_pp_add_bg" => "#a1d7ca", // 2.0 Addons start
            "nc_pp_add_border" => "#6dad9d",
            "nc_pp_add_color" => "#ffffff",
            "nc_footer_news_border" => "#e5e5e5",
            "nc_footer_ci_bg" => "#ffffff",
            "nc_subcat" => 0,
            "nc_cat" => 0,
            "nc_loader" => 0,
            "nc_loader_color" => "#a1d7ca",
            "nc_sticky_menu" => 0,
            "nc_st_up" => "#ffffff",
            "nc_st_up_bg" => "#a1d7ca",
            "nc_st_up_border" => "#6dad9d",
            "nc_search_border_but" => "#ededed",
            "nc_c_title_hover" => "#4b5363",
            "nc_soldout_bg" => "#fdfdfd",
            "nc_soldout_border" => "#dddddd",
            "nc_soldout_color" => "#f45435",
            "nc_g_body_text" => "#777777",
            "nc_footer_headings" => "#545454",
            "nc_bottom_section_other" => "120",
            "nc_bottom_section_sw" => 0,
            "nc_second_img" => 0,
            "nc_o_pay_item_bg_hover" => "#ffffff",
            "nc_o_pay_item_c_hover" => "#6dad9d",
            "nc_pp_att_right" => 0,
            "nc_long_prices" => 0,
            "nc_f_underline" => "#fa7c63",
            "nc_show_ip" => 0,
            "nc_man_text" => 0,
            "nc_man_logo" => 0,
            "nc_rgrid" => 0,
            "nc_rnum" => 0,
            "nc_rtop" => "0",
            "nc_rbg" => "#ffffff",
            "nc_rlist" => 0,
            "nc_rhide" => 0,
            "nc_css" => "",
            "nc_count" => 0,
            "nc_count_days" => 0,
            "nc_count_bg" => "#ffffff",
            "nc_count_color" => "#888888",
            "nc_count_sep" => "#e5e5e5",
            "nc_count_pr_title" => "#ffffff",
            "nc_count_pr_titlebg" => "#de2666",
            "nc_count_pr_bg" => "#ffffff",
            "nc_count_pr_color" => "#888888",
            "nc_count_pr_sep" => "e5e5e5",
            "nc_up_menu" => "1",
            "nc_up_head" => "1",
            "nc_up_but" => "1",
            "nc_m_mode" => "1",
            "nc_m_chev" => 0,
            "nc_m_bt" => "0",
            "nc_m_br" => "0",
            "nc_m_bb" => "4",
            "nc_m_bl" => "0",
            "nc_m_radius" => "5",
            "nc_m_note" => "#ffffff",
            "nc_m_icon" => "#ffffff",
            "nc_mv_bg" => "#ffffff",
            "nc_mv_color" => "#333333",
            "nc_mv_icon" => "#333333",
            "nc_mv_bg_hover" => "#ffffff",
            "nc_mv_hover" => "#f45435",
            "nc_mv_tab" => "#ffffff",
            "nc_mv_bor" => "#e5e5e5",
            "nc_product_switch" => "1",
            "nc_carousel_featured" => "1",
            "nc_auto_featured" => "true",
            "nc_items_featured" => "3",
            "nc_carousel_best" => "1",
            "nc_auto_best" => "true",
            "nc_items_best" => "3",
            "nc_carousel_new" => "1",
            "nc_auto_new" => "true",
            "nc_items_new" => "3",
            "nc_carousel_sale" => "1",
            "nc_auto_sale" => "true",
            "nc_items_sale" => "3"
        );

    }


    public function install() {

        if (parent::install() AND $this -> registerHook('displayHeader') AND $this -> registerHook('displayAdminHomeQuickLinks')) {

            Configuration::updateValue('RTC_F_HEADINGS', $this -> defaults["f_headings"]);
            Configuration::updateValue('RTC_F_TEXT', $this -> defaults["f_text"]);
            Configuration::updateValue('RTC_F_PRICE', $this -> defaults["f_price"]);
            Configuration::updateValue('RTC_FONT_SIZE_BODY', $this -> defaults["font_size_body"]);
            Configuration::updateValue('RTC_FONT_SIZE_MENU', $this -> defaults["font_size_menu"]);
            Configuration::updateValue('RTC_FONT_SIZE_BUTTONS', $this -> defaults["font_size_buttons"]);
            Configuration::updateValue('RTC_FONT_SIZE_PRICE', $this -> defaults["font_size_price"]);
            Configuration::updateValue('RTC_MAIN_BACKGROUND_COLOR', $this -> defaults["main_background_color"]);
            Configuration::updateValue('RTC_TOP_LINE_BACKGROUND', $this -> defaults["top_line_background"]);
            Configuration::updateValue('RTC_BREADCRUMB', $this -> defaults["breadcrumb"]);
            Configuration::updateValue('NC_LOADER', $this -> defaults["nc_loader"]);
            Configuration::updateValue('NC_SUBCAT', $this -> defaults["nc_subcat"]);
            Configuration::updateValue('NC_CAT', $this -> defaults["nc_cat"]);
            Configuration::updateValue('RTC_UP_ARROW_BORDER', $this -> defaults["up_arrow_border"]);
            Configuration::updateValue('RTC_UP_ARROW_COLOR', $this -> defaults["up_arrow_color"]);
            Configuration::updateValue('RTC_CONTENT_BACKGROUND_COLOR', $this -> defaults["content_background_color"]);
            Configuration::updateValue('RTC_BODY_BG_EXT', $this -> defaults["body_bg_ext"]);
            Configuration::updateValue('RTC_BODY_BG_REPEAT', $this -> defaults["body_bg_repeat"]);
            Configuration::updateValue('RTC_BODY_BG_POSITION', $this -> defaults["body_bg_position"]);
            Configuration::updateValue('RTC_BODY_BG_FIXED', $this -> defaults["body_bg_fixed"]);
            Configuration::updateValue('RTC_BODY_BG_PATTERN', $this -> defaults["body_bg_pattern"]);
            Configuration::updateValue('RTC_GRADIENT_SCHEME', $this -> defaults["gradient_scheme"]);
            Configuration::updateValue('RTC_TEXTURES', $this -> defaults["gradient_scheme"]);
            Configuration::updateValue('RTC_DISPLAY_GRADIENT', $this -> defaults["display_gradient"]);
            Configuration::updateValue('RTC_BRAND_BG', $this -> defaults["brand_bg"]);
            Configuration::updateValue('RTC_BRAND_BORDER', $this -> defaults["brand_border"]);
            Configuration::updateValue('RTC_G_BODY_LINK', $this -> defaults["g_body_link"]);
            Configuration::updateValue('RTC_G_BODY_LINK_HOVER', $this -> defaults["g_body_link_hover"]);
            Configuration::updateValue('RTC_G_TABLE_BG', $this -> defaults["g_table_bg"]);
            Configuration::updateValue('NC_G_BODY_TEXT', $this -> defaults["nc_g_body_text"]);
            Configuration::updateValue('RTC_G_TABLE_TITLE_BG', $this -> defaults["g_table_title_bg"]);
            Configuration::updateValue('RTC_G_TABLE_TITLE_COLOR', $this -> defaults["g_table_title_color"]);
            Configuration::updateValue('RTC_G_TABLE_TOTAL', $this -> defaults["g_table_total"]);
            Configuration::updateValue('RTC_BOX', $this -> defaults["g_box"]);
            Configuration::updateValue('RTC_BOX_TITLE', $this -> defaults["g_box_title"]);
            Configuration::updateValue('RTC_BOX_TITLE_BORDER', $this -> defaults["g_box_title_border"]);
            Configuration::updateValue('RTC_LABEL', $this -> defaults["g_label"]);
            Configuration::updateValue('RTC_CHECKBOX_LABEL', $this -> defaults["g_checkbox_label"]);
            Configuration::updateValue('RTC_INPUT_BG', $this -> defaults["g_input_bg"]);
            Configuration::updateValue('RTC_INPUT_BORDER', $this -> defaults["g_input_border"]);
            Configuration::updateValue('RTC_INPUT_COLOR', $this -> defaults["g_input_color"]);
            Configuration::updateValue('RTC_FORM', $this -> defaults["g_form"]);
            Configuration::updateValue('RTC_FORM_GREY', $this -> defaults["g_form_grey"]);
            Configuration::updateValue('RTC_B_TEXT', $this -> defaults["b_text"]);
            Configuration::updateValue('RTC_B_LINK', $this -> defaults["b_link"]);
            Configuration::updateValue('RTC_B_LINK_HOVER', $this -> defaults["b_link_hover"]);
            Configuration::updateValue('RTC_B_SEPARATOR', $this -> defaults["b_separator"]);
            Configuration::updateValue('RTC_B_NORMAL_BG', $this -> defaults["b_normal_bg"]);
            Configuration::updateValue('RTC_B_NORMAL_BORDER', $this -> defaults["b_normal_border"]);
            Configuration::updateValue('RTC_B_NORMAL_BORDER_HOVER', $this -> defaults["b_normal_border_hover"]);
            Configuration::updateValue('RTC_B_NORMAL_BG_HOVER', $this -> defaults["b_normal_bg_hover"]);
            Configuration::updateValue('RTC_B_NORMAL_COLOR', $this -> defaults["b_normal_color"]);
            Configuration::updateValue('RTC_B_NORMAL_COLOR_HOVER', $this -> defaults["b_normal_color_hover"]);
            Configuration::updateValue('RTC_B_EX_BG', $this -> defaults["b_ex_bg"]);
            Configuration::updateValue('RTC_B_EX_BORDER', $this -> defaults["b_ex_border"]);
            Configuration::updateValue('RTC_B_EX_COLOR', $this -> defaults["b_ex_color"]);
            Configuration::updateValue('RTC_CL_LABEL', $this -> defaults["cl_label"]);
            Configuration::updateValue('RTC_CL_VALUE', $this -> defaults["cl_value"]);
            Configuration::updateValue('RTC_BAN_TITLE', $this -> defaults["ban_title"]);
            Configuration::updateValue('RTC_BAN_TEXT', $this -> defaults["ban_text"]);
            Configuration::updateValue('RTC_BAN_BG', $this -> defaults["ban_bg"]);
            Configuration::updateValue('RTC_BAN_BORDER', $this -> defaults["ban_border"]);
            Configuration::updateValue('RTC_BAN_BUTTON', $this -> defaults["ban_button"]);
            Configuration::updateValue('RTC_BAN_BUTTON_TEXT', $this -> defaults["ban_button_text"]);
            Configuration::updateValue('RTC_CL_POPUP_BG', $this -> defaults["cl_popup_bg"]);
            Configuration::updateValue('RTC_CL_POPUP_BORDER', $this -> defaults["cl_popup_border"]);
            Configuration::updateValue('RTC_CL_POPUP_SHADOW', $this -> defaults["cl_popup_shadow"]);
            Configuration::updateValue('RTC_BANNERS_ANIM', $this -> defaults["banners_anim"]);
            Configuration::updateValue('NC_SECOND_IMG', $this -> defaults["nc_second_img"]);
            Configuration::updateValue('RTC_CL_POPUP_ITEM', $this -> defaults["cl_popup_item"]);
            Configuration::updateValue('RTC_CL_POPUP_ITEM_HOVER', $this -> defaults["cl_popup_item_hover"]);
            Configuration::updateValue('RTC_CL_DISPLAY_CUR', $this -> defaults["cl_display_cur"]);
            Configuration::updateValue('RTC_CL_DISPLAY_LAN', $this -> defaults["cl_display_lan"]);
            Configuration::updateValue('RTC_TA_LINK', $this -> defaults["ta_link"]);
            Configuration::updateValue('RTC_TA_LINK_HOVER', $this -> defaults["ta_link_hover"]);
            Configuration::updateValue('RTC_TA_SEPARATOR', $this -> defaults["ta_separator"]);
            Configuration::updateValue('RTC_TA_WELCOME', $this -> defaults["ta_welcome"]);
            Configuration::updateValue('RTC_TA_NAME', $this -> defaults["ta_name"]);
            Configuration::updateValue('RTC_IP_BG', $this -> defaults["ip_bg"]);
            Configuration::updateValue('RTC_IP_ANIM', $this -> defaults["ip_anim"]);
            Configuration::updateValue('RTC_IP_BORDER', $this -> defaults["ip_border"]);
            Configuration::updateValue('RTC_IP_TITLE', $this -> defaults["ip_title"]);
            Configuration::updateValue('RTC_IP_TEXT', $this -> defaults["ip_text"]);
            Configuration::updateValue('RTC_IP_TEL_EXT', $this -> defaults["ip_tel_ext"]);
            Configuration::updateValue('RTC_IP_TIME_EXT', $this -> defaults["ip_time_ext"]);
            Configuration::updateValue('RTC_IP_TRUCK_EXT', $this -> defaults["ip_truck_ext"]);
            Configuration::updateValue('RTC_IP_MONEY_EXT', $this -> defaults["ip_money_ext"]);
            Configuration::updateValue('RTC_SLIDER_MODE', $this -> defaults["slider_mode"]);
            Configuration::updateValue('RTC_DISPLAY_ROUND', $this -> defaults["display_round"]);
            Configuration::updateValue('RTC_CON_BG', $this -> defaults["con_bg"]);
            Configuration::updateValue('RTC_CON_BORDER', $this -> defaults["con_border"]);
            Configuration::updateValue('RTC_CON_COLOR', $this -> defaults["con_color"]);
            Configuration::updateValue('RTC_S_CON_BG', $this -> defaults["s_con_bg"]);
            Configuration::updateValue('RTC_S_CON_BORDER', $this -> defaults["s_con_border"]);
            Configuration::updateValue('RTC_S_CON_COLOR', $this -> defaults["s_con_color"]);
            Configuration::updateValue('RTC_CON_BG_HOVER', $this -> defaults["con_bg_hover"]);
            Configuration::updateValue('RTC_CON_BORDER_HOVER', $this -> defaults["con_border_hover"]);
            Configuration::updateValue('RTC_CON_COLOR_HOVER', $this -> defaults["con_color_hover"]);
            Configuration::updateValue('RTC_HP_TITLE', $this -> defaults["hp_title"]);
            Configuration::updateValue('RTC_HP_TITLE_HOVER', $this -> defaults["hp_title_hover"]);
            Configuration::updateValue('RTC_DISPLAY_FEATURED', $this -> defaults["display_featured"]);
            Configuration::updateValue('RTC_DISPLAY_NEW', $this -> defaults["display_new"]);
            Configuration::updateValue('RTC_DISPLAY_BEST', $this -> defaults["display_best"]);
            Configuration::updateValue('RTC_BOTTOM_SECTION', $this -> defaults["bottom_section"]);
            Configuration::updateValue('NC_BOTTOM_SECTION_OTHER', $this -> defaults["nc_bottom_section_other"]);
            Configuration::updateValue('NC_BOTTOM_SECTION_SW', $this -> defaults["nc_bottom_section_sw"]);
            Configuration::updateValue('RTC_MA_REQUIRED', $this -> defaults["ma_required"]);
            Configuration::updateValue('RTC_MA_TITLE', $this -> defaults["ma_title"]);
            Configuration::updateValue('RTC_MA_TITLE_HOVER', $this -> defaults["ma_title_hover"]);
            Configuration::updateValue('RTC_MA_ICON', $this -> defaults["ma_icon"]);
            Configuration::updateValue('RTC_MA_ICON_BORDER', $this -> defaults["ma_icon_border"]);
            Configuration::updateValue('RTC_MA_ICON_BORDER_HOVER', $this -> defaults["ma_icon_border_hover"]);
            Configuration::updateValue('RTC_MA_ICON_HOVER', $this -> defaults["ma_icon_hover"]);
            Configuration::updateValue('RTC_MA_FOOTER_SEPARATOR', $this -> defaults["ma_footer_separator"]);
            Configuration::updateValue('RTC_O_NUMBER_BG', $this -> defaults["o_number_bg"]);
            Configuration::updateValue('RTC_O_NUMBER_BORDER', $this -> defaults["o_number_border"]);
            Configuration::updateValue('RTC_O_NUMBER_BORDER_ACTIVE', $this -> defaults["o_number_border_active"]);
            Configuration::updateValue('RTC_O_NUMBER_BORDER_DONE', $this -> defaults["o_number_border_done"]);
            Configuration::updateValue('RTC_O_NUMBER_BORDER_DONE_HOVER', $this -> defaults["o_number_border_done_hover"]);
            Configuration::updateValue('RTC_O_NUMBER_COLOR', $this -> defaults["o_number_color"]);
            Configuration::updateValue('RTC_O_NUMBER_TITLE', $this -> defaults["o_number_title"]);
            Configuration::updateValue('RTC_O_NUMBER_BG_ACTIVE', $this -> defaults["o_number_bg_active"]);
            Configuration::updateValue('RTC_O_NUMBER_COLOR_ACTIVE', $this -> defaults["o_number_color_active"]);
            Configuration::updateValue('RTC_O_NUMBER_TITLE_ACTIVE', $this -> defaults["o_number_title_active"]);
            Configuration::updateValue('RTC_O_NUMBER_BG_DONE', $this -> defaults["o_number_bg_done"]);
            Configuration::updateValue('RTC_O_NUMBER_COLOR_DONE', $this -> defaults["o_number_color_done"]);
            Configuration::updateValue('RTC_O_NUMBER_TITLE_DONE', $this -> defaults["o_number_title_done"]);
            Configuration::updateValue('RTC_O_NUMBER_BG_DONE_HOVER', $this -> defaults["o_number_bg_done_hover"]);
            Configuration::updateValue('RTC_O_NUMBER_COLOR_DONE_HOVER', $this -> defaults["o_number_color_done_hover"]);
            Configuration::updateValue('RTC_O_NUMBER_TITLE_DONE_HOVER', $this -> defaults["o_number_title_done_hover"]);
            Configuration::updateValue('RTC_O_IMG_BORDER', $this -> defaults["o_img_border"]);
            Configuration::updateValue('RTC_O_PRODUCT_NAME', $this -> defaults["o_product_name"]);
            Configuration::updateValue('RTC_O_PRODUCT_ATTS', $this -> defaults["o_product_atts"]);
            Configuration::updateValue('RTC_O_REMOVE', $this -> defaults["o_remove"]);
            Configuration::updateValue('RTC_O_REMOVE_HOVER', $this -> defaults["o_remove_hover"]);
            Configuration::updateValue('RTC_O_TOTAL_TITLE', $this -> defaults["o_total_title"]);
            Configuration::updateValue('RTC_O_TOTAL_PRICE', $this -> defaults["o_total_price"]);
            Configuration::updateValue('RTC_O_DEL_TITLE', $this -> defaults["o_del_title"]);
            Configuration::updateValue('RTC_O_DEL_ITEM_BG', $this -> defaults["o_del_item_bg"]);
            Configuration::updateValue('RTC_O_DEL_ITEM_TEXT', $this -> defaults["o_del_item_text"]);
            Configuration::updateValue('RTC_O_PAY_ITEM_BG', $this -> defaults["o_pay_item_bg"]);
            Configuration::updateValue('NC_O_PAY_ITEM_BG_HOVER', $this -> defaults["nc_o_pay_item_bg_hover"]);
            Configuration::updateValue('NC_O_PAY_ITEM_C_HOVER', $this -> defaults["nc_o_pay_item_c_hover"]);
            Configuration::updateValue('NC_F_UNDERLINE', $this -> defaults["nc_f_underline"]);
            Configuration::updateValue('RTC_O_PAY_ITEM_TITLE', $this -> defaults["o_pay_item_title"]);
            Configuration::updateValue('RTC_O_PAY_ITEM_DESC', $this -> defaults["o_pay_item_desc"]);
            Configuration::updateValue('RTC_O_PAY_ITEM_CHEVRON', $this -> defaults["o_pay_item_chevron"]);
            Configuration::updateValue('RTC_BL_BG', $this -> defaults["bl_bg"]);
            Configuration::updateValue('RTC_BL_HEADING', $this -> defaults["bl_heading"]);
            Configuration::updateValue('RTC_BL_DATE', $this -> defaults["bl_date"]);
            Configuration::updateValue('RTC_BL_BORDER', $this -> defaults["bl_border"]);
            Configuration::updateValue('RTC_BL_MARK', $this -> defaults["bl_mark"]);
            Configuration::updateValue('RTC_BL_RM_COLOR', $this -> defaults["bl_rm_color"]);
            Configuration::updateValue('RTC_BL_RM_BG', $this -> defaults["bl_rm_bg"]);
            Configuration::updateValue('RTC_BL_RM_BORDER', $this -> defaults["bl_rm_border"]);
            Configuration::updateValue('RTC_BL_RM_BG_ICON', $this -> defaults["bl_rm_bg_icon"]);
            Configuration::updateValue('RTC_BL_RM_BORDER_ICON', $this -> defaults["bl_rm_border_icon"]);
            Configuration::updateValue('RTC_BL_RM_BG_HOVER', $this -> defaults["bl_rm_bg_hover"]);
            Configuration::updateValue('RTC_BL_RM_BORDER_HOVER', $this -> defaults["bl_rm_border_hover"]);
            Configuration::updateValue('RTC_BL_RM_HOVER', $this -> defaults["bl_rm_hover"]);
            Configuration::updateValue('RTC_BL_TITLE', $this -> defaults["bl_title"]);
            Configuration::updateValue('RTC_BL_TITLE_HOVER', $this -> defaults["bl_title_hover"]);
            Configuration::updateValue('RTC_BL_BG_CONTENT', $this -> defaults["bl_bg_content"]);
            Configuration::updateValue('RTC_BL_META', $this -> defaults["bl_meta"]);
            Configuration::updateValue('RTC_BL_COM_BG', $this -> defaults["bl_com_bg"]);
            Configuration::updateValue('RTC_BL_COM_NAME', $this -> defaults["bl_com_name"]);
            Configuration::updateValue('RTC_MENU_LINE_BG', $this -> defaults["menu_line_bg"]);
            Configuration::updateValue('RTC_MENU_LINE_BORDER', $this -> defaults["menu_line_border"]);
            Configuration::updateValue('RTC_MENU_BORDER', $this -> defaults["menu_border"]);
            Configuration::updateValue('RTC_MENU_IMG_EXT', $this -> defaults["menu_img_ext"]);
            Configuration::updateValue('RTC_HP_EXT', $this -> defaults["hp_ext"]);
            Configuration::updateValue('RTC_MENU_LINK_BG_COLOR', $this -> defaults["menu_link_bg_color"]);
            Configuration::updateValue('RTC_MENU_LINK_BG_HOVER', $this -> defaults["menu_link_bg_hover"]);
            Configuration::updateValue('RTC_MENU_LINK_BG_ACTIVE', $this -> defaults["menu_link_bg_active"]);
            Configuration::updateValue('RTC_MENU_LINK_BORDER_COLOR', $this -> defaults["menu_link_border_color"]);
            Configuration::updateValue('RTC_MENU_LINK_BORDER_HOVER', $this -> defaults["menu_link_border_hover"]);
            Configuration::updateValue('RTC_MENU_LINK_BORDER_ACTIVE', $this -> defaults["menu_link_border_active"]);
            Configuration::updateValue('RTC_MENU_LINK_COLOR', $this -> defaults["menu_link_color"]);
            Configuration::updateValue('RTC_MENU_LINK_ACTIVE', $this -> defaults["menu_link_active"]);
            Configuration::updateValue('RTC_MENU_HOVER_COLOR', $this -> defaults["menu_hover_color"]);
            Configuration::updateValue('RTC_SUBMENU_BG_COLOR', $this -> defaults["submenu_bg_color"]);
            Configuration::updateValue('RTC_SUBMENU_SHADOW', $this -> defaults["submenu_shadow"]);
            Configuration::updateValue('NC_STICKY_MENU', $this -> defaults["nc_sticky_menu"]);
            Configuration::updateValue('NC_ST_UP', $this -> defaults["nc_st_up"]);
            Configuration::updateValue('NC_ST_UP_BG', $this -> defaults["nc_st_up_bg"]);
            Configuration::updateValue('NC_ST_UP_BORDER', $this -> defaults["nc_st_up_border"]);
            Configuration::updateValue('RTC_SUBMENU_LINK_COLOR', $this -> defaults["submenu_link_color"]);
            Configuration::updateValue('RTC_SUBMENU_HOVER_COLOR', $this -> defaults["submenu_hover_color"]);
            Configuration::updateValue('RTC_SUBMENU_BEFORE_LINE', $this -> defaults["submenu_before_line"]);
            Configuration::updateValue('RTC_SUBMENU_BORDER_TOP', $this -> defaults["submenu_border_top"]);
            Configuration::updateValue('RTC_SEARCH_BOX_BG', $this -> defaults["search_box_bg"]);
            Configuration::updateValue('RTC_SEARCH_BORDER', $this -> defaults["search_border"]);
            Configuration::updateValue('NC_SEARCH_BORDER_BUT', $this -> defaults["nc_search_border_but"]);
            Configuration::updateValue('RTC_SEARCH_INPUT_COLOR', $this -> defaults["search_input_color"]);
            Configuration::updateValue('RTC_SEARCH_BUTTON', $this -> defaults["search_button"]);
            Configuration::updateValue('RTC_SEARCH_BORDER', $this -> defaults["search_border"]);
            Configuration::updateValue('RTC_SEARCH_POPUP_BG', $this -> defaults["search_popup_bg"]);
            Configuration::updateValue('RTC_SEARCH_POPUP_BORDER', $this -> defaults["search_popup_border"]);
            Configuration::updateValue('RTC_SEARCH_SHADOW', $this -> defaults["search_shadow"]);
            Configuration::updateValue('RTC_SEARCH_ITEM_BG', $this -> defaults["search_item_bg"]);
            Configuration::updateValue('RTC_SEARCH_ITEM_BG_HOVER', $this -> defaults["search_item_bg_hover"]);
            Configuration::updateValue('RTC_SIDEBAR_TITLE_BG', $this -> defaults["sidebar_title_bg"]);
            Configuration::updateValue('RTC_SIDEBAR_TITLE_BORDER', $this -> defaults["sidebar_title_border"]);
            Configuration::updateValue('RTC_SIDEBAR_TITLE_COLOR', $this -> defaults["sidebar_title_color"]);
            Configuration::updateValue('RTC_SIDEBAR_TITLE_LINK', $this -> defaults["sidebar_title_link"]);
            Configuration::updateValue('RTC_SIDEBAR_TITLE_LINK_HOVER', $this -> defaults["sidebar_title_link_hover"]);
            Configuration::updateValue('RTC_SIDEBAR_BLOCK_CONTENT_BG', $this -> defaults["sidebar_block_content_bg"]);
            Configuration::updateValue('RTC_SIDEBAR_BLOCK_CONTENT_BORDER', $this -> defaults["sidebar_block_content_border"]);
            Configuration::updateValue('RTC_SIDEBAR_BLOCK_TEXT_COLOR', $this -> defaults["sidebar_block_text_color"]);
            Configuration::updateValue('RTC_SIDEBAR_BLOCK_LINK', $this -> defaults["sidebar_block_link"]);
            Configuration::updateValue('RTC_SIDEBAR_BLOCK_LINK_HOVER', $this -> defaults["sidebar_block_link_hover"]);
            Configuration::updateValue('RTC_SIDEBAR_BUTTON_BG', $this -> defaults["sidebar_button_bg"]);
            Configuration::updateValue('RTC_SIDEBAR_BUTTON_BORDER', $this -> defaults["sidebar_button_border"]);
            Configuration::updateValue('RTC_SIDEBAR_BUTTON_COLOR', $this -> defaults["sidebar_button_color"]);
            Configuration::updateValue('RTC_SIDEBAR_ITEM_SEPARATOR', $this -> defaults["sidebar_item_separator"]);
            Configuration::updateValue('RTC_SIDEBAR_PRODUCT_IMG_BORDER', $this -> defaults["sidebar_product_img_border"]);
            Configuration::updateValue('RTC_SIDEBAR_CATEGORIES_ITEM', $this -> defaults["sidebar_categories_item"]);
            Configuration::updateValue('RTC_SIDEBAR_CATEGORIES_ITEM_HOVER', $this -> defaults["sidebar_categories_item_hover"]);
            Configuration::updateValue('RTC_SIDEBAR_CATEGORIES_SEPARATOR', $this -> defaults["sidebar_categories_separator"]);
            Configuration::updateValue('RTC_CMS_TITLE', $this -> defaults["cms_title"]);
            Configuration::updateValue('RTC_CMS_TITLE_BORDER', $this -> defaults["cms_title_border"]);
            Configuration::updateValue('RTC_CMS_TITLE_BORDER_MARK', $this -> defaults["cms_title_border_mark"]);
            Configuration::updateValue('RTC_PAGE_TEXT_COLOR', $this -> defaults["page_text_color"]);
            Configuration::updateValue('RTC_PAGE_HEADINGS', $this -> defaults["page_headings"]);
            Configuration::updateValue('RTC_PAGE_LINK', $this -> defaults["page_link"]);
            Configuration::updateValue('RTC_PAGE_LINK_HOVER', $this -> defaults["page_link_hover"]);
            Configuration::updateValue('RTC_CONTACT_FORM_BG', $this -> defaults["contact_form_bg"]);
            Configuration::updateValue('RTC_CONTACT_FORM_BORDER', $this -> defaults["contact_form_border"]);
            Configuration::updateValue('RTC_WARNING_MESSAGE_BG', $this -> defaults["warning_message_bg"]);
            Configuration::updateValue('RTC_WARNING_MESSAGE_COLOR', $this -> defaults["warning_message_color"]);
            Configuration::updateValue('RTC_SUCCESS_MESSAGE_BG', $this -> defaults["success_message_bg"]);
            Configuration::updateValue('RTC_SUCCESS_MESSAGE_COLOR', $this -> defaults["success_message_color"]);
            Configuration::updateValue('RTC_INFO_MESSAGE_BG', $this -> defaults["info_message_bg"]);
            Configuration::updateValue('RTC_INFO_MESSAGE_COLOR', $this -> defaults["info_message_color"]);
            Configuration::updateValue('RTC_DANGER_MESSAGE_BG', $this -> defaults["danger_message_bg"]);
            Configuration::updateValue('RTC_DANGER_MESSAGE_COLOR', $this -> defaults["danger_message_color"]);
            Configuration::updateValue('RTC_PL_HEADING_COLOR', $this -> defaults["pl_heading_color"]);
            Configuration::updateValue('RTC_PL_HEADING_TEXT', $this -> defaults["pl_heading_text"]);
            Configuration::updateValue('RTC_PL_NAV_TOP_BG', $this -> defaults["pl_nav_top_bg"]);
            Configuration::updateValue('RTC_PL_NAV_TOP_BORDER', $this -> defaults["pl_nav_top_border"]);
            Configuration::updateValue('RTC_PL_NAV_GRID', $this -> defaults["pl_nav_grid"]);
            Configuration::updateValue('RTC_PL_NAV_COMPARE_BORDER', $this -> defaults["pl_nav_compare_border"]);
            Configuration::updateValue('RTC_PL_NAV_SORT', $this -> defaults["pl_nav_sort"]);
            Configuration::updateValue('RTC_PL_NUMBER_BG', $this -> defaults["pl_number_bg"]);
            Configuration::updateValue('RTC_PL_NUMBER_BG_HOVER', $this -> defaults["pl_number_bg_hover"]);
            Configuration::updateValue('RTC_PL_NUMBER_COLOR', $this -> defaults["pl_number_color"]);
            Configuration::updateValue('RTC_PL_NUMBER_COLOR_HOVER', $this -> defaults["pl_number_color_hover"]);
            Configuration::updateValue('RTC_PL_PAG_NAV_BG', $this -> defaults["pl_pag_nav_bg"]);
            Configuration::updateValue('RTC_PL_PAG_NAV_BG_HOVER', $this -> defaults["pl_pag_nav_bg_hover"]);
            Configuration::updateValue('RTC_PL_PAG_NAV_COLOR', $this -> defaults["pl_pag_nav_color"]);
            Configuration::updateValue('RTC_PL_PAG_NAV_COLOR_HOVER', $this -> defaults["pl_pag_nav_color_hover"]);
            Configuration::updateValue('RTC_PL_PAG_ACTIVE_BG', $this -> defaults["pl_pag_active_bg"]);
            Configuration::updateValue('RTC_PL_PAG_ACTIVE_COLOR', $this -> defaults["pl_pag_active_color"]);
            Configuration::updateValue('RTC_PL_SHOW_PER_PAGE', $this -> defaults["pl_show_per_page"]);
            Configuration::updateValue('RTC_PL_SHOW_ITEMS', $this -> defaults["pl_show_items"]);
            Configuration::updateValue('RTC_PL_FILTER_SEPARATOR', $this -> defaults["pl_filter_separator"]);
            Configuration::updateValue('RTC_PL_FILTER_RANGE', $this -> defaults["pl_filter_range"]);
            Configuration::updateValue('RTC_PL_FILTER_RANGE_OUT', $this -> defaults["pl_filter_range_out"]);
            Configuration::updateValue('RTC_PL_FILTER_HANDLE_BG', $this -> defaults["pl_filter_handle_bg"]);
            Configuration::updateValue('RTC_PL_FILTER_HANDLE_BORDER', $this -> defaults["pl_filter_handle_border"]);
            Configuration::updateValue('RTC_PL_ITEM_BG', $this -> defaults["pl_item_bg"]);
            Configuration::updateValue('RTC_PL_ITEM_BORDER', $this -> defaults["pl_item_border"]);
            Configuration::updateValue('RTC_PL_PRODUCT_NAME', $this -> defaults["pl_product_name"]);
            Configuration::updateValue('RTC_PL_PRODUCT_PRICE', $this -> defaults["pl_product_price"]);
            Configuration::updateValue('RTC_PL_PRODUCT_OLDPRICE', $this -> defaults["pl_product_oldprice"]);
            Configuration::updateValue('RTC_PL_PRODUCT_PERCENT', $this -> defaults["pl_product_percent"]);
            Configuration::updateValue('RTC_PL_PRODUCT_PERCENT_BG', $this -> defaults["pl_product_percent_bg"]);
            Configuration::updateValue('RTC_PL_PRODUCT_CART', $this -> defaults["pl_product_cart"]);
            Configuration::updateValue('RTC_PL_PRODUCT_CART_BORDER', $this -> defaults["pl_product_cart_border"]);
            Configuration::updateValue('RTC_PL_PRODUCT_CART_COLOR', $this -> defaults["pl_product_cart_color"]);
            Configuration::updateValue('RTC_PL_PRODUCT_CART_ACTIVE', $this -> defaults["pl_product_cart_active"]);
            Configuration::updateValue('RTC_PL_PRODUCT_CART_ACTIVE_BORDER', $this -> defaults["pl_product_cart_active_border"]);
            Configuration::updateValue('RTC_PL_PRODUCT_CART_ACTIVE_COLOR', $this -> defaults["pl_product_cart_active_color"]);
            Configuration::updateValue('RTC_PL_PRODUCT_CART_HOVER', $this -> defaults["pl_product_cart_hover"]);
            Configuration::updateValue('RTC_PL_PRODUCT_CART_HOVER_BORDER', $this -> defaults["pl_product_cart_hover_border"]);
            Configuration::updateValue('RTC_PL_PRODUCT_CART_HOVER_COLOR', $this -> defaults["pl_product_cart_hover_color"]);
            Configuration::updateValue('RTC_PL_PRODUCT_QUICKVIEW', $this -> defaults["pl_product_quickview"]);
            Configuration::updateValue('RTC_PL_PRODUCT_QUICKVIEW_HOVER', $this -> defaults["pl_product_quickview_hover"]);
            Configuration::updateValue('RTC_PL_PRODUCT_QUICKVIEW_COLOR', $this -> defaults["pl_product_quickview_color"]);
            Configuration::updateValue('RTC_PL_PRODUCT_VIEW_BORDER', $this -> defaults["pl_product_view_border"]);
            Configuration::updateValue('RTC_PL_PRODUCT_VIEW_BORDER_HOVER', $this -> defaults["pl_product_view_border_hover"]);
            Configuration::updateValue('RTC_PL_PRODUCT_COMPARE', $this -> defaults["pl_product_compare"]);
            Configuration::updateValue('RTC_PL_PRODUCT_COMPARE_HOVER', $this -> defaults["pl_product_compare_hover"]);
            Configuration::updateValue('RTC_PL_PRODUCT_COMPARE_ICON', $this -> defaults["pl_product_compare_icon"]);
            Configuration::updateValue('RTC_PL_PRODUCT_COMPARE_ICON_ACTIVE', $this -> defaults["pl_product_compare_icon_active"]);
            Configuration::updateValue('RTC_PL_PRODUCT_WISH_ICON', $this -> defaults["pl_product_wish_icon"]);
            Configuration::updateValue('RTC_PL_PRODUCT_WISH_ICON_ACTIVE', $this -> defaults["pl_product_wish_icon_active"]);
            Configuration::updateValue('RTC_PL_PRODUCT_NEW_BG', $this -> defaults["pl_product_new_bg"]);
            Configuration::updateValue('RTC_PL_PRODUCT_NEW_BORDER', $this -> defaults["pl_product_new_border"]);
            Configuration::updateValue('RTC_PL_PRODUCT_SALE_BORDER', $this -> defaults["pl_product_sale_border"]);
            Configuration::updateValue('RTC_PL_PRODUCT_NEW_COLOR', $this -> defaults["pl_product_new_color"]);
            Configuration::updateValue('RTC_PL_PRODUCT_SALE_BG', $this -> defaults["pl_product_sale_bg"]);
            Configuration::updateValue('RTC_PL_PRODUCT_SALE_COLOR', $this -> defaults["pl_product_sale_color"]);
            Configuration::updateValue('RTC_PL_PRODUCT_WHITE_GRAD', $this -> defaults["pl_product_white_grad"]);
            Configuration::updateValue('RTC_PL_PRODUCT_QWTEXT', $this -> defaults["pl_product_qwtext"]);
            Configuration::updateValue('RTC_PL_PRODUCT_DISPLAY_QUICKVIEW', $this -> defaults["pl_product_display_quickview"]);
            Configuration::updateValue('RTC_PL_PRODUCT_DISPLAY_VIEW', $this -> defaults["pl_product_display_view"]);
            Configuration::updateValue('RTC_PL_PRODUCT_DISPLAY_NEW', $this -> defaults["pl_product_display_new"]);
            Configuration::updateValue('RTC_PL_PRODUCT_DISPLAY_SALE', $this -> defaults["pl_product_display_sale"]);
            Configuration::updateValue('RTC_PL_LIST_IMG_BORDER', $this -> defaults["pl_list_img_border"]);
            Configuration::updateValue('RTC_PL_LIST_BG', $this -> defaults["pl_list_bg"]);
            Configuration::updateValue('RTC_PL_LIST_SEPARATOR', $this -> defaults["pl_list_separator"]);
            Configuration::updateValue('RTC_PL_LIST_DESCRIPTION', $this -> defaults["pl_list_description"]);
            Configuration::updateValue('RTC_C_LEFT_COLUMN', $this -> defaults["c_left_column"]);
            Configuration::updateValue('RTC_C_RIGHT_COLUMN', $this -> defaults["c_right_column"]);
            Configuration::updateValue('RTC_C_LEFT_COLOR', $this -> defaults["c_left_color"]);
            Configuration::updateValue('RTC_C_RIGHT_COLOR', $this -> defaults["c_right_color"]);
            Configuration::updateValue('RTC_C_IMG_BORDER', $this -> defaults["c_img_border"]);
            Configuration::updateValue('RTC_C_REMOVE', $this -> defaults["c_remove"]);
            Configuration::updateValue('RTC_C_REMOVE_HOVER', $this -> defaults["c_remove_hover"]);
            Configuration::updateValue('RTC_PP_IMG_BORDER', $this -> defaults["pp_img_border"]);
            Configuration::updateValue('RTC_PP_ICON_BORDER', $this -> defaults["pp_icon_border"]);
            Configuration::updateValue('RTC_PP_ICON_BORDER_HOVER', $this -> defaults["pp_icon_border_hover"]);
            Configuration::updateValue('RTC_PP_ICON_NAV_BG', $this -> defaults["pp_icon_nav_bg"]);
            Configuration::updateValue('RTC_PP_ICON_NAV_BG_HOVER', $this -> defaults["pp_icon_nav_bg_hover"]);
            Configuration::updateValue('RTC_PP_SOCIAL_BG', $this -> defaults["pp_social_bg"]);
            Configuration::updateValue('RTC_PP_SOCIAL_COLOR', $this -> defaults["pp_social_color"]);
            Configuration::updateValue('RTC_PP_USEFUL_COLOR', $this -> defaults["pp_useful_color"]);
            Configuration::updateValue('RTC_PP_USEFUL_COLOR_HOVER', $this -> defaults["pp_useful_color_hover"]);
            Configuration::updateValue('RTC_PP_USEFUL_ICON', $this -> defaults["pp_useful_icon"]);
            Configuration::updateValue('RTC_PP_DISPLAY_SOCIAL', $this -> defaults["pp_display_social"]);
            Configuration::updateValue('RTC_PP_DISPLAY_WISH', $this -> defaults["pp_display_wish"]);
            Configuration::updateValue('RTC_PP_DISPLAY_SEND', $this -> defaults["pp_display_send"]);
            Configuration::updateValue('RTC_PP_DISPLAY_PRINT', $this -> defaults["pp_display_print"]);
            Configuration::updateValue('RTC_PP_NAME', $this -> defaults["pp_name"]);
            Configuration::updateValue('RTC_PP_DESC', $this -> defaults["pp_desc"]);
            Configuration::updateValue('RTC_PP_INFO_LABEL', $this -> defaults["pp_info_label"]);
            Configuration::updateValue('RTC_PP_INFO_VALUE', $this -> defaults["pp_info_value"]);
            Configuration::updateValue('RTC_PP_DISPLAY_REFER', $this -> defaults["pp_display_refer"]);
            Configuration::updateValue('RTC_PP_DISPLAY_COND', $this -> defaults["pp_display_cond"]);
            Configuration::updateValue('RTC_PP_DISPLAY_AVAIL', $this -> defaults["pp_display_avail"]);
            Configuration::updateValue('RTC_PP_ATT_LABEL', $this -> defaults["pp_att_label"]);
            Configuration::updateValue('RTC_PP_ATT_INPUT_BG', $this -> defaults["pp_att_input_bg"]);
            Configuration::updateValue('NC_PP_ATT_RIGHT', $this -> defaults["nc_pp_att_right"]);
            Configuration::updateValue('NC_LONG_PRICES', $this -> defaults["nc_long_prices"]);
            Configuration::updateValue('RTC_PP_ATT_COLOR', $this -> defaults["pp_att_color"]);
            Configuration::updateValue('RTC_PP_ATT_COLOR_ACTIVE', $this -> defaults["pp_att_color_active"]);
            Configuration::updateValue('RTC_PP_ATT_QUAN_INPUT_BG', $this -> defaults["pp_att_quan_input_bg"]);
            Configuration::updateValue('RTC_PP_ATT_QUAN_PM_BG', $this -> defaults["pp_att_quan_pm_bg"]);
            Configuration::updateValue('RTC_PP_ATT_QUAN_PM_BG_HOVER', $this -> defaults["pp_att_quan_pm_bg_hover"]);
            Configuration::updateValue('RTC_PP_ATT_QUAN_PM_COLOR', $this -> defaults["pp_att_quan_pm_color"]);
            Configuration::updateValue('RTC_PP_ATT_QUAN_PM_COLOR_HOVER', $this -> defaults["pp_att_quan_pm_color_hover"]);
            Configuration::updateValue('NC_PP_ADD_BG', $this -> defaults["nc_pp_add_bg"]);
            Configuration::updateValue('NC_PP_ADD_BORDER', $this -> defaults["nc_pp_add_border"]);
            Configuration::updateValue('NC_PP_ADD_COLOR', $this -> defaults["nc_pp_add_color"]);
            Configuration::updateValue('RTC_PP_QW_BG', $this -> defaults["pp_qw_bg"]);
            Configuration::updateValue('RTC_PP_PRICE_BOX', $this -> defaults["pp_price_box"]);
            Configuration::updateValue('RTC_PP_PRICE_BORDER', $this -> defaults["pp_price_border"]);
            Configuration::updateValue('RTC_PP_PRICE_SEPARATOR', $this -> defaults["pp_price_separator"]);
            Configuration::updateValue('RTC_PP_PRICE_COLOR', $this -> defaults["pp_price_color"]);
            Configuration::updateValue('RTC_PP_TABS_BG', $this -> defaults["pp_tabs_bg"]);
            Configuration::updateValue('RTC_PP_TABS_BG_HOVER', $this -> defaults["pp_tabs_bg_hover"]);
            Configuration::updateValue('RTC_PP_TABS_COLOR', $this -> defaults["pp_tabs_color"]);
            Configuration::updateValue('RTC_PP_TABS_COLOR_HOVER', $this -> defaults["pp_tabs_color_hover"]);
            Configuration::updateValue('RTC_PP_TABS_SHEETS_BG', $this -> defaults["pp_tabs_sheets_bg"]);
            Configuration::updateValue('RTC_PP_TABS_SHEETS_COLOR', $this -> defaults["pp_tabs_sheets_color"]);
            Configuration::updateValue('RTC_PP_TABS_TABLE_LEFT', $this -> defaults["pp_tabs_table_left"]);
            Configuration::updateValue('RTC_PP_TABS_TABLE_RIGHT', $this -> defaults["pp_tabs_table_right"]);
            Configuration::updateValue('RTC_PP_TABS_TABLE_LEFT_COLOR', $this -> defaults["pp_tabs_table_left_color"]);
            Configuration::updateValue('RTC_PP_TABS_TABLE_RIGHT_COLOR', $this -> defaults["pp_tabs_table_right_color"]);
            Configuration::updateValue('RTC_PP_REVIEWS_STARON', $this -> defaults["pp_reviews_staron"]);
            Configuration::updateValue('RTC_PP_REVIEWS_STAROFF', $this -> defaults["pp_reviews_staroff"]);
            Configuration::updateValue('RTC_PP_REVIEWS_NAME', $this -> defaults["pp_reviews_name"]);
            Configuration::updateValue('RTC_PP_REVIEWS_DATE', $this -> defaults["pp_reviews_date"]);
            Configuration::updateValue('RTC_PP_REVIEWS_NAME_SEPARATOR', $this -> defaults["pp_reviews_name_separator"]);
            Configuration::updateValue('RTC_PP_REVIEWS_BLOCK_SEPARATOR', $this -> defaults["pp_reviews_block_separator"]);
            Configuration::updateValue('RTC_PP_REVIEWS_DISPLAY_TOP', $this -> defaults["pp_reviews_display_top"]);
            Configuration::updateValue('RTC_PP_REVIEWS_USEFUL', $this -> defaults["pp_reviews_useful"]);
            Configuration::updateValue('RTC_PP_REVIEWS_REPORT', $this -> defaults["pp_reviews_report"]);
            Configuration::updateValue('RTC_PP_REVIEWS_YN', $this -> defaults["pp_reviews_yn"]);
            Configuration::updateValue('RTC_PP_REVIEWS_YN_BORDER', $this -> defaults["pp_reviews_yn_border"]);
            Configuration::updateValue('RTC_PP_AC_NAME', $this -> defaults["pp_ac_name"]);
            Configuration::updateValue('RTC_PP_AC_PRICE', $this -> defaults["pp_ac_price"]);
            Configuration::updateValue('RTC_PP_AC_DESC', $this -> defaults["pp_ac_desc"]);
            Configuration::updateValue('RTC_C_TITLE', $this -> defaults["c_title"]);
            Configuration::updateValue('NC_C_TITLE_HOVER', $this -> defaults["nc_c_title_hover"]);
            Configuration::updateValue('RTC_C_PRODUCTS', $this -> defaults["c_products"]);
            Configuration::updateValue('RTC_C_BG', $this -> defaults["c_bg"]);
            Configuration::updateValue('RTC_C_BG_HOVER', $this -> defaults["c_bg_hover"]);
            Configuration::updateValue('RTC_C_BORDER', $this -> defaults["c_border"]);
            Configuration::updateValue('RTC_C_BG_ICON', $this -> defaults["c_bg_icon"]);
            Configuration::updateValue('RTC_C_BORDER_ICON', $this -> defaults["c_border_icon"]);
            Configuration::updateValue('RTC_C_DISPLAY_ARROW', $this -> defaults["c_display_arrow"]);
            Configuration::updateValue('RTC_C_POPUP_BG', $this -> defaults["c_popup_bg"]);
            Configuration::updateValue('RTC_C_POPUP_BORDER', $this -> defaults["c_popup_border"]);
            Configuration::updateValue('RTC_C_POPUP_SHADOW', $this -> defaults["c_popup_shadow"]);
            Configuration::updateValue('RTC_C_PRODUCT_Q', $this -> defaults["c_product_q"]);
            Configuration::updateValue('RTC_C_PRODUCT_NAME', $this -> defaults["c_product_name"]);
            Configuration::updateValue('RTC_C_PRODUCT_NAME_HOVER', $this -> defaults["c_product_name_hover"]);
            Configuration::updateValue('RTC_C_PRODUCT_ATTS', $this -> defaults["c_product_atts"]);
            Configuration::updateValue('RTC_C_PRODUCT_PRICE', $this -> defaults["c_product_price"]);
            Configuration::updateValue('RTC_C_PRODUCT_REMOVE', $this -> defaults["c_product_remove"]);
            Configuration::updateValue('RTC_C_PRODUCT_REMOVE_HOVER', $this -> defaults["c_product_remove_hover"]);
            Configuration::updateValue('RTC_C_PRODUCT_SEPARATOR', $this -> defaults["c_product_separator"]);
            Configuration::updateValue('RTC_C_PRODUCT_SUMMARY_BG', $this -> defaults["c_product_summary_bg"]);
            Configuration::updateValue('RTC_C_PRODUCT_SUMMARY_TITLE', $this -> defaults["c_product_summary_title"]);
            Configuration::updateValue('RTC_C_PRODUCT_SUMMARY_VALUE', $this -> defaults["c_product_summary_value"]);
            Configuration::updateValue('RTC_C_SUMMARY_BORDER', $this -> defaults["c_summary_border"]);
            Configuration::updateValue('RTC_LC_BG', $this -> defaults["lc_bg"]);
            Configuration::updateValue('RTC_LC_V_SEPARATOR', $this -> defaults["lc_v_separator"]);
            Configuration::updateValue('RTC_LC_H_SEPARATOR', $this -> defaults["lc_h_separator"]);
            Configuration::updateValue('RTC_LC_SUCCESS_BG', $this -> defaults["lc_success_bg"]);
            Configuration::updateValue('RTC_LC_SUCCESS_COLOR', $this -> defaults["lc_success_color"]);
            Configuration::updateValue('RTC_LC_IMG_BORDER', $this -> defaults["lc_img_border"]);
            Configuration::updateValue('RTC_LC_PRODUCT_NAME', $this -> defaults["lc_product_name"]);
            Configuration::updateValue('RTC_LC_PRODUCT_ATTS', $this -> defaults["lc_product_atts"]);
            Configuration::updateValue('RTC_LC_PRODUCT_ATTS_LABEL', $this -> defaults["lc_product_atts_label"]);
            Configuration::updateValue('RTC_LC_IN_CART_BG', $this -> defaults["lc_in_cart_bg"]);
            Configuration::updateValue('RTC_LC_IN_CART_COLOR', $this -> defaults["lc_in_cart_color"]);
            Configuration::updateValue('RTC_LC_TOTAL_BG', $this -> defaults["lc_total_bg"]);
            Configuration::updateValue('RTC_LC_TOTAL_LABEL', $this -> defaults["lc_total_label"]);
            Configuration::updateValue('RTC_LC_TOTAL_COLOR', $this -> defaults["lc_total_color"]);
            Configuration::updateValue('RTC_LC_CROSS_TITLE', $this -> defaults["lc_cross_title"]);
            Configuration::updateValue('RTC_LC_CLOSE', $this -> defaults["lc_close"]);
            Configuration::updateValue('RTC_LC_CLOSE_HOVER', $this -> defaults["lc_close_hover"]);
            Configuration::updateValue('RTC_FOOTER_BACKGROUND_COLOR', $this -> defaults["footer_background_color"]);
            Configuration::updateValue('RTC_FOOTER_TOP_LINE', $this -> defaults["footer_top_line"]);
            Configuration::updateValue('RTC_FOOTER_TOP_LINE_HEADINGS', $this -> defaults["footer_top_line_headings"]);
            Configuration::updateValue('RTC_NS_BORDER', $this -> defaults["ns_border"]);
            Configuration::updateValue('RTC_FOOTER_NEWS_INPUT', $this -> defaults["footer_news_input"]);
            Configuration::updateValue('NC_FOOTER_NEWS_BORDER', $this -> defaults["nc_footer_news_border"]);
            Configuration::updateValue('NC_FOOTER_CI_BG', $this -> defaults["nc_footer_ci_bg"]);
            Configuration::updateValue('NC_LOADER_COLOR', $this -> defaults["nc_loader_color"]);
            Configuration::updateValue('RTC_FOOTER_NEWS_BUTTON', $this -> defaults["footer_news_button"]);
            Configuration::updateValue('RTC_FOOTER_NEWS_BUTTON_BG', $this -> defaults["footer_news_button_bg"]);
            Configuration::updateValue('RTC_FOOTER_NEWS_BUTTON_BORDER', $this -> defaults["footer_news_button_border"]);
            Configuration::updateValue('RTC_FOOTER_NEWS_DISPLAY', $this -> defaults["footer_news_display"]);
            Configuration::updateValue('RTC_FOOTER_SOCIAL_DISPLAY', $this -> defaults["footer_social_display"]);
            Configuration::updateValue('NC_FOOTER_HEADINGS', $this -> defaults["nc_footer_headings"]);
            Configuration::updateValue('RTC_FOOTER_TXT_COLOR', $this -> defaults["footer_txt_color"]);
            Configuration::updateValue('RTC_FOOTER_LINK_COLOR', $this -> defaults["footer_link_color"]);
            Configuration::updateValue('RTC_FOOTER_HOVER_COLOR', $this -> defaults["footer_hover_color"]);
            Configuration::updateValue('RTC_FOOTER_ACCOUNT_DISC', $this -> defaults["footer_account_disc"]);
            Configuration::updateValue('RTC_FOOTER_UP_BG', $this -> defaults["footer_up_bg"]);
            Configuration::updateValue('RTC_FOOTER_UP_DISPLAY', $this -> defaults["footer_up_display"]);
            Configuration::updateValue('RTC_FOOTER_CONTACT_DISPLAY', $this -> defaults["footer_contact_display"]);
            Configuration::updateValue('RTC_FOOTER_ACCOUNT_DISPLAY', $this -> defaults["footer_account_display"]);
            Configuration::updateValue('RTC_FOOTER_CATEGORIES_DISPLAY', $this -> defaults["footer_categories_display"]);
            Configuration::updateValue('RTC_FOOTER_INFO_DISPLAY', $this -> defaults["footer_info_display"]);
            Configuration::updateValue('RTC_FOOTER_BOTTOM_LINE', $this -> defaults["footer_bottom_line"]);
            Configuration::updateValue('RTC_FOOTER_PAYMENT_DISPLAY', $this -> defaults["footer_payment_display"]);
            Configuration::updateValue('RTC_FOOTER_PL_VISA', $this -> defaults["footer_pl_visa"]);
            Configuration::updateValue('RTC_FOOTER_PL_MASTERCARD', $this -> defaults["footer_pl_mastercard"]);
            Configuration::updateValue('RTC_FOOTER_PL_MAESTRO', $this -> defaults["footer_pl_maestro"]);
            Configuration::updateValue('RTC_FOOTER_PL_DISCOVER', $this -> defaults["footer_pl_discover"]);
            Configuration::updateValue('RTC_FOOTER_PL_PAYPAL', $this -> defaults["footer_pl_paypal"]);
            Configuration::updateValue('RTC_FOOTER_COPYRIGHT_DISPLAY', $this -> defaults["footer_copyright_display"]);
            Configuration::updateValue('RTC_FOOTER_BOTTOM_TEXT', $this -> defaults["footer_bottom_text"]);
            Configuration::updateValue('RTC_LATIN_EXT', $this -> defaults["latin_ext"]);
            Configuration::updateValue('RTC_CYRILLIC', $this -> defaults["cyrillic"]);
            Configuration::updateValue('RTC_CART_ICON_EXT', $this -> defaults["cart_icon_ext"]);
            Configuration::updateValue('RTC_C_ARROW_COLOR', $this -> defaults["c_arrow_color"]);
            Configuration::updateValue('RTC_F_CONTACTS_EXT', $this -> defaults["f_contacts_ext"]);
            Configuration::updateValue('RTC_S_LENS_EXT', $this -> defaults["s_lens_ext"]);
            Configuration::updateValue('RTC_I_MA_EXT', $this -> defaults["i_ma_ext"]);
            Configuration::updateValue('RTC_I_AUT_EXT', $this -> defaults["i_aut_ext"]);
            Configuration::updateValue('RTC_PL_VIEW_EXT', $this -> defaults["pl_view_ext"]);
            Configuration::updateValue('RTC_PL_QVIEW_EXT', $this -> defaults["pl_qview_ext"]);
            Configuration::updateValue('RTC_PL_GL_EXT', $this -> defaults["pl_gl_ext"]);
            Configuration::updateValue('RTC_PL_WC_EXT', $this -> defaults["pl_wc_ext"]);
            Configuration::updateValue('RTC_PP_USE_EXT', $this -> defaults["pp_use_ext"]);
            Configuration::updateValue('RTC_B_EXT', $this -> defaults["b_ext"]);
            Configuration::updateValue('NC_SOLDOUT_BG', $this -> defaults["nc_soldout_bg"]);
            Configuration::updateValue('NC_SOLDOUT_BORDER', $this -> defaults["nc_soldout_border"]);
            Configuration::updateValue('NC_SOLDOUT_COLOR', $this -> defaults["nc_soldout_color"]);
            Configuration::updateValue('NC_SHOW_IP', $this -> defaults["nc_show_ip"]);
            Configuration::updateValue('NC_MAN_TEXT', $this -> defaults["nc_man_text"]);
            Configuration::updateValue('NC_MAN_LOGO', $this -> defaults["nc_man_logo"]);
            Configuration::updateValue('NC_RGRID', $this -> defaults["nc_rgrid"]);
            Configuration::updateValue('NC_RNUM', $this -> defaults["nc_rnum"]);
            Configuration::updateValue('NC_RTOP', $this -> defaults["nc_rtop"]);
            Configuration::updateValue('NC_RBG', $this -> defaults["nc_rbg"]);
            Configuration::updateValue('NC_RLIST', $this -> defaults["nc_rlist"]);
            Configuration::updateValue('NC_RHIDE', $this -> defaults["nc_rhide"]);
            Configuration::updateValue('NC_COUNT', $this -> defaults["nc_count"]);
            Configuration::updateValue('NC_COUNT_DAYS', $this -> defaults["nc_count_days"]);
            Configuration::updateValue('NC_COUNT_BG', $this -> defaults["nc_count_bg"]);
            Configuration::updateValue('NC_COUNT_COLOR', $this -> defaults["nc_count_color"]);
            Configuration::updateValue('NC_COUNT_SEP', $this -> defaults["nc_count_sep"]);
            Configuration::updateValue('NC_COUNT_PR_TITLE', $this -> defaults["nc_count_pr_title"]);
            Configuration::updateValue('NC_COUNT_PR_TITLEBG', $this -> defaults["nc_count_pr_titlebg"]);
            Configuration::updateValue('NC_COUNT_PR_BG', $this -> defaults["nc_count_pr_bg"]);
            Configuration::updateValue('NC_COUNT_PR_COLOR', $this -> defaults["nc_count_pr_color"]);
            Configuration::updateValue('NC_COUNT_PR_SEP', $this -> defaults["nc_count_pr_sep"]);
            Configuration::updateValue('NC_UP_MENU', $this -> defaults["nc_up_menu"]);
            Configuration::updateValue('NC_UP_HEAD', $this -> defaults["nc_up_head"]);
            Configuration::updateValue('NC_UP_BUT', $this -> defaults["nc_up_but"]);
            Configuration::updateValue('NC_M_MODE', $this -> defaults["nc_m_mode"]);
            Configuration::updateValue('NC_PRODUCT_SWITCH', $this -> defaults["nc_product_switch"]);
            Configuration::updateValue('NC_CAROUSEL_FEATURED', $this -> defaults["nc_carousel_featured"]);
            Configuration::updateValue('NC_AUTO_FEATURED', $this -> defaults["nc_auto_featured"]);
            Configuration::updateValue('NC_ITEMS_FEATURED', $this -> defaults["nc_items_featured"]);
            Configuration::updateValue('NC_CAROUSEL_NEW', $this -> defaults["nc_carousel_new"]);
            Configuration::updateValue('NC_AUTO_NEW', $this -> defaults["nc_auto_new"]);
            Configuration::updateValue('NC_ITEMS_NEW', $this -> defaults["nc_items_new"]);
            Configuration::updateValue('NC_CAROUSEL_BEST', $this -> defaults["nc_carousel_best"]);
            Configuration::updateValue('NC_AUTO_BEST', $this -> defaults["nc_auto_best"]);
            Configuration::updateValue('NC_ITEMS_BEST', $this -> defaults["nc_items_best"]);
            Configuration::updateValue('NC_CAROUSEL_SALE', $this -> defaults["nc_carousel_sale"]);
            Configuration::updateValue('NC_AUTO_SALE', $this -> defaults["nc_auto_sale"]);
            Configuration::updateValue('NC_ITEMS_SALE', $this -> defaults["nc_items_sale"]);
            Configuration::updateValue('NC_M_CHEV', $this -> defaults["nc_m_chev"]);
            Configuration::updateValue('NC_M_BT', $this -> defaults["nc_m_bt"]);
            Configuration::updateValue('NC_M_BR', $this -> defaults["nc_m_br"]);
            Configuration::updateValue('NC_M_BB', $this -> defaults["nc_m_bb"]);
            Configuration::updateValue('NC_M_BL', $this -> defaults["nc_m_bl"]);
            Configuration::updateValue('NC_M_RADIUS', $this -> defaults["nc_m_radius"]);
            Configuration::updateValue('NC_M_NOTE', $this -> defaults["nc_m_note"]);
            Configuration::updateValue('NC_M_ICON', $this -> defaults["nc_m_icon"]);
            Configuration::updateValue('NC_MV_BG', $this -> defaults["nc_mv_bg"]);
            Configuration::updateValue('NC_MV_COLOR', $this -> defaults["nc_mv_color"]);
            Configuration::updateValue('NC_MV_ICON', $this -> defaults["nc_mv_icon"]);
            Configuration::updateValue('NC_MV_BG_HOVER', $this -> defaults["nc_mv_bg_hover"]);
            Configuration::updateValue('NC_MV_HOVER', $this -> defaults["nc_mv_hover"]);
            Configuration::updateValue('NC_MV_TAB', $this -> defaults["nc_mv_tab"]);
            Configuration::updateValue('NC_MV_BOR', $this -> defaults["nc_mv_bor"]);
            Configuration::updateValue('NC_CSS', $this -> defaults["nc_css"]);
            Configuration::updateValue('RTC_COPYRIGHT_TEXT', array('1' => 'Copyright 2014 RoyThemes. All Rights Reserved.', '2' => 'Copyright 2014 RoyThemes. All Rights Reserved.'));


            return true;
        } else {
            return false;
        }
    }

    public function uninstall() {
        if (!parent::uninstall() ||

            !Configuration::deleteByName('NC_PP_ADD_BG') ||
            !Configuration::deleteByName('NC_G_BODY_TEXT') ||
            !Configuration::deleteByName('NC_SEARCH_BORDER_BUT') ||
            !Configuration::deleteByName('RTC_F_HEADINGS') ||
            !Configuration::deleteByName('RTC_F_TEXT') ||
            !Configuration::deleteByName('RTC_F_PRICE') ||
            !Configuration::deleteByName('RTC_FONT_SIZE_BODY') ||
            !Configuration::deleteByName('RTC_FONT_SIZE_MENU') ||
            !Configuration::deleteByName('RTC_FONT_SIZE_BUTTONS') ||
            !Configuration::deleteByName('RTC_FONT_SIZE_PRICE') ||
            !Configuration::deleteByName('RTC_MAIN_BACKGROUND_COLOR') ||
            !Configuration::deleteByName('RTC_TOP_LINE_BACKGROUND') ||
            !Configuration::deleteByName('RTC_DESC_HEIGHT') ||
            !Configuration::deleteByName('NC_SUBCAT') ||
            !Configuration::deleteByName('NC_CAT') ||
            !Configuration::deleteByName('RTC_BREADCRUMB') ||
            !Configuration::deleteByName('NC_LOADER') ||
            !Configuration::deleteByName('RTC_UP_ARROW_BORDER') ||
            !Configuration::deleteByName('RTC_UP_ARROW_COLOR') ||
            !Configuration::deleteByName('RTC_CONTENT_BACKGROUND_COLOR') ||
            !Configuration::deleteByName('RTC_BODY_BG_EXT') ||
            !Configuration::deleteByName('RTC_BODY_BG_REPEAT') ||
            !Configuration::deleteByName('RTC_BODY_BG_POSITION') ||
            !Configuration::deleteByName('RTC_BODY_BG_PATTERN') ||
            !Configuration::deleteByName('RTC_GRADIENT_SCHEME') ||
            !Configuration::deleteByName('RTC_TEXTURES') ||
            !Configuration::deleteByName('RTC_DISPLAY_GRADIENT') ||
            !Configuration::deleteByName('RTC_BODY_BG_FIXED') ||
            !Configuration::deleteByName('RTC_LINE_BG') ||
            !Configuration::deleteByName('RTC_MENU_BORDER') ||
            !Configuration::deleteByName('RTC_MENU_IMG_EXT') ||
            !Configuration::deleteByName('RTC_HP_EXT') ||
            !Configuration::deleteByName('RTC_MENU_LINK_BG_COLOR') ||
            !Configuration::deleteByName('RTC_MENU_LINK_BG_HOVER') ||
            !Configuration::deleteByName('RTC_MENU_LINK_BG_ACTIVE') ||
            !Configuration::deleteByName('RTC_MENU_LINK_BORDER_COLOR') ||
            !Configuration::deleteByName('RTC_MENU_LINK_BORDER_HOVER') ||
            !Configuration::deleteByName('RTC_MENU_LINK_BORDER_ACTIVE') ||
            !Configuration::deleteByName('RTC_MENU_LINK_COLOR') ||
            !Configuration::deleteByName('RTC_MENU_LINK_ACTIVE') ||
            !Configuration::deleteByName('RTC_MENU_HOVER_COLOR') ||
            !Configuration::deleteByName('RTC_SUBMENU_BG_COLOR') ||
            !Configuration::deleteByName('RTC_SUBMENU_SHADOW') ||
            !Configuration::deleteByName('NC_STICKY_MENU') ||
            !Configuration::deleteByName('RTC_SUBMENU_LINK_COLOR') ||
            !Configuration::deleteByName('NC_ST_UP') ||
            !Configuration::deleteByName('NC_ST_UP_BG') ||
            !Configuration::deleteByName('NC_ST_UP_BORDER') ||
            !Configuration::deleteByName('RTC_SUBMENU_HOVER_COLOR') ||
            !Configuration::deleteByName('RTC_SUBMENU_BEFORE_LINE') ||
            !Configuration::deleteByName('RTC_SUBMENU_BORDER_TOP') ||
            !Configuration::deleteByName('RTC_CL_LABEL') ||
            !Configuration::deleteByName('RTC_CL_VALUE') ||
            !Configuration::deleteByName('RTC_BAN_TITLE') ||
            !Configuration::deleteByName('RTC_BAN_TEXT') ||
            !Configuration::deleteByName('RTC_BAN_BG') ||
            !Configuration::deleteByName('RTC_BAN_BORDER') ||
            !Configuration::deleteByName('RTC_BAN_BUTTON') ||
            !Configuration::deleteByName('RTC_BAN_BUTTON_TEXT') ||
            !Configuration::deleteByName('RTC_CL_POPUP_BG') ||
            !Configuration::deleteByName('RTC_CL_POPUP_BORDER') ||
            !Configuration::deleteByName('RTC_CL_POPUP_SHADOW') ||
            !Configuration::deleteByName('RTC_BANNERS_ANIM') ||
            !Configuration::deleteByName('NC_SECOND_IMG') ||
            !Configuration::deleteByName('RTC_CL_POPUP_ITEM') ||
            !Configuration::deleteByName('RTC_CL_POPUP_ITEM_HOVER') ||
            !Configuration::deleteByName('RTC_CL_DISPLAY_CUR') ||
            !Configuration::deleteByName('RTC_CL_DISPLAY_LAN') ||
            !Configuration::deleteByName('RTC_TA_LINK') ||
            !Configuration::deleteByName('RTC_TA_LINK_HOVER') ||
            !Configuration::deleteByName('RTC_TA_SEPARATOR') ||
            !Configuration::deleteByName('RTC_TA_WELCOME') ||
            !Configuration::deleteByName('RTC_TA_NAME') ||
            !Configuration::deleteByName('RTC_IP_BG') ||
            !Configuration::deleteByName('RTC_IP_ANIM') ||
            !Configuration::deleteByName('RTC_IP_BORDER') ||
            !Configuration::deleteByName('RTC_IP_TITLE') ||
            !Configuration::deleteByName('RTC_IP_TEXT') ||
            !Configuration::deleteByName('RTC_IP_TEL_EXT') ||
            !Configuration::deleteByName('RTC_IP_TIME_EXT') ||
            !Configuration::deleteByName('RTC_IP_TRUCK_EXT') ||
            !Configuration::deleteByName('RTC_IP_MONEY_EXT') ||
            !Configuration::deleteByName('RTC_SLIDER_MODE') ||
            !Configuration::deleteByName('RTC_DISPLAY_ROUND') ||
            !Configuration::deleteByName('RTC_CON_BG') ||
            !Configuration::deleteByName('RTC_CON_BORDER') ||
            !Configuration::deleteByName('RTC_CON_COLOR') ||
            !Configuration::deleteByName('RTC_S_CON_BG') ||
            !Configuration::deleteByName('RTC_S_CON_BORDER') ||
            !Configuration::deleteByName('RTC_S_CON_COLOR') ||
            !Configuration::deleteByName('RTC_CON_BG_HOVER') ||
            !Configuration::deleteByName('RTC_CON_BORDER_HOVER') ||
            !Configuration::deleteByName('RTC_CON_COLOR_HOVER') ||
            !Configuration::deleteByName('RTC_HP_TITLE') ||
            !Configuration::deleteByName('RTC_HP_TITLE_HOVER') ||
            !Configuration::deleteByName('RTC_DISPLAY_FEATURED') ||
            !Configuration::deleteByName('RTC_DISPLAY_NEW') ||
            !Configuration::deleteByName('RTC_DISPLAY_BEST') ||
            !Configuration::deleteByName('RTC_BOTTOM_SECTION') ||
            !Configuration::deleteByName('NC_BOTTOM_SECTION_OTHER') ||
            !Configuration::deleteByName('NC_BOTTOM_SECTION_SW') ||
            !Configuration::deleteByName('RTC_PL_HEADING_COLOR') ||
            !Configuration::deleteByName('RTC_PL_HEADING_TEXT') ||
            !Configuration::deleteByName('RTC_PL_NAV_TOP_BG') ||
            !Configuration::deleteByName('RTC_PL_NAV_TOP_BORDER') ||
            !Configuration::deleteByName('RTC_PL_NAV_GRID') ||
            !Configuration::deleteByName('RTC_PL_NAV_COMPARE_BORDER') ||
            !Configuration::deleteByName('RTC_PL_NAV_SORT') ||
            !Configuration::deleteByName('RTC_PL_NUMBER_BG') ||
            !Configuration::deleteByName('RTC_PL_NUMBER_BG_HOVER') ||
            !Configuration::deleteByName('RTC_PL_NUMBER_COLOR') ||
            !Configuration::deleteByName('RTC_PL_NUMBER_COLOR_HOVER') ||
            !Configuration::deleteByName('RTC_PL_PAG_NAV_BG') ||
            !Configuration::deleteByName('RTC_PL_PAG_NAV_BG_HOVER') ||
            !Configuration::deleteByName('RTC_PL_PAG_NAV_COLOR') ||
            !Configuration::deleteByName('RTC_PL_PAG_NAV_COLOR_HOVER') ||
            !Configuration::deleteByName('RTC_PL_PAG_ACTIVE_BG') ||
            !Configuration::deleteByName('RTC_PL_PAG_ACTIVE_COLOR') ||
            !Configuration::deleteByName('RTC_PL_SHOW_PER_PAGE') ||
            !Configuration::deleteByName('RTC_PL_SHOW_ITEMS') ||
            !Configuration::deleteByName('RTC_PL_FILTER_SEPARATOR') ||
            !Configuration::deleteByName('RTC_PL_FILTER_RANGE') ||
            !Configuration::deleteByName('RTC_PL_FILTER_RANGE_OUT') ||
            !Configuration::deleteByName('RTC_PL_FILTER_HANDLE_BG') ||
            !Configuration::deleteByName('RTC_PL_FILTER_HANDLE_BORDER') ||
            !Configuration::deleteByName('RTC_PL_ITEM_BG') ||
            !Configuration::deleteByName('RTC_PL_ITEM_BORDER') ||
            !Configuration::deleteByName('RTC_PL_PRODUCT_NAME') ||
            !Configuration::deleteByName('RTC_PL_PRODUCT_PRICE') ||
            !Configuration::deleteByName('RTC_PL_PRODUCT_OLDPRICE') ||
            !Configuration::deleteByName('RTC_PL_PRODUCT_PERCENT') ||
            !Configuration::deleteByName('RTC_PL_PRODUCT_PERCENT_BG') ||
            !Configuration::deleteByName('RTC_PL_PRODUCT_CART') ||
            !Configuration::deleteByName('RTC_PL_PRODUCT_CART_BORDER') ||
            !Configuration::deleteByName('RTC_PL_PRODUCT_CART_COLOR') ||
            !Configuration::deleteByName('RTC_PL_PRODUCT_CART_ACTIVE') ||
            !Configuration::deleteByName('RTC_PL_PRODUCT_CART_ACTIVE_BORDER') ||
            !Configuration::deleteByName('RTC_PL_PRODUCT_CART_ACTIVE_COLOR') ||
            !Configuration::deleteByName('RTC_PL_PRODUCT_CART_HOVER') ||
            !Configuration::deleteByName('RTC_PL_PRODUCT_CART_HOVER_BORDER') ||
            !Configuration::deleteByName('RTC_PL_PRODUCT_CART_HOVER_COLOR') ||
            !Configuration::deleteByName('RTC_PL_PRODUCT_QUICKVIEW') ||
            !Configuration::deleteByName('RTC_PL_PRODUCT_QUICKVIEW_HOVER') ||
            !Configuration::deleteByName('RTC_PL_PRODUCT_QUICKVIEW_COLOR') ||
            !Configuration::deleteByName('RTC_PL_PRODUCT_VIEW_BORDER') ||
            !Configuration::deleteByName('RTC_PL_PRODUCT_VIEW_BORDER_HOVER') ||
            !Configuration::deleteByName('RTC_PL_PRODUCT_COMPARE') ||
            !Configuration::deleteByName('RTC_PL_PRODUCT_COMPARE_HOVER') ||
            !Configuration::deleteByName('RTC_PL_PRODUCT_COMPARE_ICON') ||
            !Configuration::deleteByName('RTC_PL_PRODUCT_COMPARE_ICON_ACTIVE') ||
            !Configuration::deleteByName('RTC_PL_PRODUCT_WISH_ICON') ||
            !Configuration::deleteByName('RTC_PL_PRODUCT_WISH_ICON_ACTIVE') ||
            !Configuration::deleteByName('RTC_PL_PRODUCT_NEW_BG') ||
            !Configuration::deleteByName('RTC_PL_PRODUCT_NEW_COLOR') ||
            !Configuration::deleteByName('RTC_PL_PRODUCT_SALE_BG') ||
            !Configuration::deleteByName('RTC_PL_PRODUCT_SALE_COLOR') ||
            !Configuration::deleteByName('RTC_PL_PRODUCT_WHITE_GRAD') ||
            !Configuration::deleteByName('RTC_PL_PRODUCT_QWTEXT') ||
            !Configuration::deleteByName('RTC_PL_PRODUCT_DISPLAY_QUICKVIEW') ||
            !Configuration::deleteByName('RTC_PL_PRODUCT_DISPLAY_VIEW') ||
            !Configuration::deleteByName('RTC_PL_PRODUCT_DISPLAY_NEW') ||
            !Configuration::deleteByName('RTC_PL_PRODUCT_DISPLAY_SALE') ||
            !Configuration::deleteByName('RTC_PL_LIST_IMG_BORDER') ||
            !Configuration::deleteByName('RTC_PL_LIST_BG') ||
            !Configuration::deleteByName('RTC_PL_LIST_SEPARATOR') ||
            !Configuration::deleteByName('RTC_PL_LIST_DESCRIPTION') ||
            !Configuration::deleteByName('RTC_C_LEFT_COLUMN') ||
            !Configuration::deleteByName('RTC_C_RIGHT_COLUMN') ||
            !Configuration::deleteByName('RTC_C_LEFT_COLOR') ||
            !Configuration::deleteByName('RTC_C_RIGHT_COLOR') ||
            !Configuration::deleteByName('RTC_C_IMG_BORDER') ||
            !Configuration::deleteByName('RTC_C_REMOVE') ||
            !Configuration::deleteByName('RTC_C_REMOVE_HOVER') ||
            !Configuration::deleteByName('RTC_BRAND_BG') ||
            !Configuration::deleteByName('RTC_BRAND_BORDER') ||
            !Configuration::deleteByName('RTC_G_BODY_LINK') ||
            !Configuration::deleteByName('RTC_G_BODY_LINK_HOVER') ||
            !Configuration::deleteByName('RTC_G_TABLE_BG') ||
            !Configuration::deleteByName('RTC_G_TABLE_TITLE_BG') ||
            !Configuration::deleteByName('RTC_G_TABLE_TITLE_COLOR') ||
            !Configuration::deleteByName('RTC_G_TABLE_TOTAL') ||
            !Configuration::deleteByName('RTC_BOX') ||
            !Configuration::deleteByName('RTC_BOX_TITLE') ||
            !Configuration::deleteByName('RTC_BOX_TITLE_BORDER') ||
            !Configuration::deleteByName('RTC_LABEL') ||
            !Configuration::deleteByName('RTC_CHECKBOX_LABEL') ||
            !Configuration::deleteByName('RTC_INPUT_BG') ||
            !Configuration::deleteByName('RTC_INPUT_BORDER') ||
            !Configuration::deleteByName('RTC_FORM') ||
            !Configuration::deleteByName('RTC_FORM_GREY') ||
            !Configuration::deleteByName('RTC_MA_REQUIRED') ||
            !Configuration::deleteByName('RTC_MA_TITLE') ||
            !Configuration::deleteByName('RTC_MA_TITLE_HOVER') ||
            !Configuration::deleteByName('RTC_MA_ICON') ||
            !Configuration::deleteByName('RTC_MA_ICON_BORDER') ||
            !Configuration::deleteByName('RTC_MA_ICON_BORDER_HOVER') ||
            !Configuration::deleteByName('RTC_MA_ICON_HOVER') ||
            !Configuration::deleteByName('RTC_MA_FOOTER_SEPARATOR') ||
            !Configuration::deleteByName('RTC_O_NUMBER_BG') ||
            !Configuration::deleteByName('RTC_O_NUMBER_BORDER') ||
            !Configuration::deleteByName('RTC_O_NUMBER_BORDER_ACTIVE') ||
            !Configuration::deleteByName('RTC_O_NUMBER_BORDER_DONE') ||
            !Configuration::deleteByName('RTC_O_NUMBER_BORDER_HOVER') ||
            !Configuration::deleteByName('RTC_O_NUMBER_COLOR') ||
            !Configuration::deleteByName('RTC_O_NUMBER_TITLE') ||
            !Configuration::deleteByName('RTC_O_NUMBER_BG_ACTIVE') ||
            !Configuration::deleteByName('RTC_O_NUMBER_COLOR_ACTIVE') ||
            !Configuration::deleteByName('RTC_O_NUMBER_TITLE_ACTIVE') ||
            !Configuration::deleteByName('RTC_O_NUMBER_BG_DONE') ||
            !Configuration::deleteByName('RTC_O_NUMBER_COLOR_DONE') ||
            !Configuration::deleteByName('RTC_O_NUMBER_TITLE_DONE') ||
            !Configuration::deleteByName('RTC_O_NUMBER_BG_DONE_HOVER') ||
            !Configuration::deleteByName('RTC_O_NUMBER_COLOR_DONE_HOVER') ||
            !Configuration::deleteByName('RTC_O_NUMBER_TITLE_DONE_HOVER') ||
            !Configuration::deleteByName('RTC_O_IMG_BORDER') ||
            !Configuration::deleteByName('RTC_O_PRODUCT_NAME') ||
            !Configuration::deleteByName('RTC_O_PRODUCT_ATTS') ||
            !Configuration::deleteByName('RTC_O_REMOVE') ||
            !Configuration::deleteByName('RTC_O_REMOVE_HOVER') ||
            !Configuration::deleteByName('RTC_O_TOTAL_TITLE') ||
            !Configuration::deleteByName('RTC_O_TOTAL_PRICE') ||
            !Configuration::deleteByName('RTC_O_DEL_TITLE') ||
            !Configuration::deleteByName('RTC_O_DEL_ITEM_BG') ||
            !Configuration::deleteByName('RTC_O_DEL_ITEM_TEXT') ||
            !Configuration::deleteByName('RTC_O_PAY_ITEM_BG') ||
            !Configuration::deleteByName('NC_O_PAY_ITEM_BG_HOVER') ||
            !Configuration::deleteByName('NC_O_PAY_ITEM_C_HOVER') ||
            !Configuration::deleteByName('NC_F_UNDERLINE') ||
            !Configuration::deleteByName('RTC_O_PAY_ITEM_TITLE') ||
            !Configuration::deleteByName('RTC_O_PAY_ITEM_DESC') ||
            !Configuration::deleteByName('RTC_O_PAY_ITEM_CHEVRON') ||
            !Configuration::deleteByName('RTC_BL_BG') ||
            !Configuration::deleteByName('RTC_BL_HEADING') ||
            !Configuration::deleteByName('RTC_BL_DATE') ||
            !Configuration::deleteByName('RTC_BL_BORDER') ||
            !Configuration::deleteByName('RTC_BL_MARK') ||
            !Configuration::deleteByName('RTC_BL_RM_COLOR') ||
            !Configuration::deleteByName('RTC_BL_RM_BG') ||
            !Configuration::deleteByName('RTC_BL_RM_BORDER') ||
            !Configuration::deleteByName('RTC_BL_RM_BG_ICON') ||
            !Configuration::deleteByName('RTC_BL_RM_BORDER_ICON') ||
            !Configuration::deleteByName('RTC_BL_RM_BG_HOVER') ||
            !Configuration::deleteByName('RTC_BL_RM_BORDER_HOVER') ||
            !Configuration::deleteByName('RTC_BL_RM_HOVER') ||
            !Configuration::deleteByName('RTC_BL_TITLE') ||
            !Configuration::deleteByName('RTC_BL_TITLE_HOVER') ||
            !Configuration::deleteByName('RTC_BL_BG_CONTENT') ||
            !Configuration::deleteByName('RTC_BL_META') ||
            !Configuration::deleteByName('RTC_BL_COM_BG') ||
            !Configuration::deleteByName('RTC_BL_COM_NAME') ||
            !Configuration::deleteByName('RTC_PP_IMG_BORDER') ||
            !Configuration::deleteByName('RTC_PP_ICON_BORDER') ||
            !Configuration::deleteByName('RTC_PP_ICON_BORDER_HOVER') ||
            !Configuration::deleteByName('RTC_PP_ICON_NAV_BG') ||
            !Configuration::deleteByName('RTC_PP_ICON_NAV_BG_HOVER') ||
            !Configuration::deleteByName('RTC_PP_SOCIAL_BG') ||
            !Configuration::deleteByName('RTC_PP_SOCIAL_COLOR') ||
            !Configuration::deleteByName('RTC_PP_USEFUL_COLOR') ||
            !Configuration::deleteByName('RTC_PP_USEFUL_COLOR_HOVER') ||
            !Configuration::deleteByName('RTC_PP_USEFUL_ICON') ||
            !Configuration::deleteByName('RTC_PP_DISPLAY_SOCIAL') ||
            !Configuration::deleteByName('RTC_PP_DISPLAY_WISH') ||
            !Configuration::deleteByName('RTC_PP_DISPLAY_SEND') ||
            !Configuration::deleteByName('RTC_PP_DISPLAY_PRINT') ||
            !Configuration::deleteByName('RTC_PP_NAME') ||
            !Configuration::deleteByName('RTC_PP_DESC') ||
            !Configuration::deleteByName('RTC_PP_INFO_LABEL') ||
            !Configuration::deleteByName('RTC_PP_INFO_VALUE') ||
            !Configuration::deleteByName('RTC_PP_DISPLAY_REFER') ||
            !Configuration::deleteByName('RTC_PP_DISPLAY_COND') ||
            !Configuration::deleteByName('RTC_PP_DISPLAY_AVAIL') ||
            !Configuration::deleteByName('RTC_PP_ATT_LABEL') ||
            !Configuration::deleteByName('RTC_PP_ATT_INPUT_BG') ||
            !Configuration::deleteByName('NC_PP_ATT_RIGHT') ||
            !Configuration::deleteByName('RTC_PP_ATT_COLOR') ||
            !Configuration::deleteByName('RTC_PP_ATT_COLOR_ACTIVE') ||
            !Configuration::deleteByName('RTC_PP_ATT_QUAN_INPUT_BG') ||
            !Configuration::deleteByName('RTC_PP_ATT_QUAN_PM_BG') ||
            !Configuration::deleteByName('RTC_PP_ATT_QUAN_PM_BG_HOVER') ||
            !Configuration::deleteByName('RTC_PP_ATT_QUAN_PM_COLOR') ||
            !Configuration::deleteByName('RTC_PP_QW_BG') ||
            !Configuration::deleteByName('RTC_PP_ATT_QUAN_PM_COLOR_HOVER') ||
            !Configuration::deleteByName('NC_PP_ADD_BORDER') ||
            !Configuration::deleteByName('NC_PP_ADD_COLOR') ||
            !Configuration::deleteByName('RTC_PP_PRICE_BOX') ||
            !Configuration::deleteByName('RTC_PP_PRICE_BORDER') ||
            !Configuration::deleteByName('RTC_PP_PRICE_SEPARATOR') ||
            !Configuration::deleteByName('RTC_PP_PRICE_COLOR') ||
            !Configuration::deleteByName('RTC_PP_TABS_BG') ||
            !Configuration::deleteByName('RTC_PP_TABS_BG_HOVER') ||
            !Configuration::deleteByName('RTC_PP_TABS_COLOR') ||
            !Configuration::deleteByName('RTC_PP_TABS_COLOR_HOVER') ||
            !Configuration::deleteByName('RTC_PP_TABS_SHEETS_BG') ||
            !Configuration::deleteByName('RTC_PP_TABS_SHEETS_COLOR') ||
            !Configuration::deleteByName('RTC_PP_TABS_TABLE_LEFT') ||
            !Configuration::deleteByName('RTC_PP_TABS_TABLE_RIGHT') ||
            !Configuration::deleteByName('RTC_PP_TABS_TABLE_LEFT_COLOR') ||
            !Configuration::deleteByName('RTC_PP_TABS_TABLE_RIGHT_COLOR') ||
            !Configuration::deleteByName('RTC_PP_REVIEWS_STARON') ||
            !Configuration::deleteByName('RTC_PP_REVIEWS_STAROFF') ||
            !Configuration::deleteByName('RTC_PP_REVIEWS_NAME') ||
            !Configuration::deleteByName('RTC_PP_REVIEWS_DATE') ||
            !Configuration::deleteByName('RTC_PP_REVIEWS_NAME_SEPARATOR') ||
            !Configuration::deleteByName('RTC_PP_REVIEWS_BLOCK_SEPARATOR') ||
            !Configuration::deleteByName('RTC_PP_REVIEWS_DISPLAY_TOP') ||
            !Configuration::deleteByName('RTC_PP_REVIEWS_USEFUL') ||
            !Configuration::deleteByName('RTC_PP_REVIEWS_REPORT') ||
            !Configuration::deleteByName('RTC_PP_REVIEWS_YN') ||
            !Configuration::deleteByName('RTC_PP_REVIEWS_YN_BORDER') ||
            !Configuration::deleteByName('RTC_PP_AC_NAME') ||
            !Configuration::deleteByName('RTC_PP_AC_PRICE') ||
            !Configuration::deleteByName('RTC_PP_AC_DESC') ||
            !Configuration::deleteByName('RTC_C_TITLE') ||
            !Configuration::deleteByName('NC_C_TITLE_HOVER') ||
            !Configuration::deleteByName('RTC_C_PRODUCTS') ||
            !Configuration::deleteByName('RTC_C_BG') ||
            !Configuration::deleteByName('RTC_C_BG_HOVER') ||
            !Configuration::deleteByName('RTC_C_BORDER') ||
            !Configuration::deleteByName('RTC_C_BG_ICON') ||
            !Configuration::deleteByName('RTC_C_BORDER_ICON') ||
            !Configuration::deleteByName('RTC_C_DISPLAY_ARROW') ||
            !Configuration::deleteByName('RTC_C_POPUP_BG') ||
            !Configuration::deleteByName('RTC_C_POPUP_BORDER') ||
            !Configuration::deleteByName('RTC_C_POPUP_SHADOW') ||
            !Configuration::deleteByName('RTC_C_PRODUCT_Q') ||
            !Configuration::deleteByName('RTC_C_PRODUCT_NAME') ||
            !Configuration::deleteByName('RTC_C_PRODUCT_NAME_HOVER') ||
            !Configuration::deleteByName('RTC_C_PRODUCT_ATTS') ||
            !Configuration::deleteByName('RTC_C_PRODUCT_PRICE') ||
            !Configuration::deleteByName('RTC_C_PRODUCT_REMOVE') ||
            !Configuration::deleteByName('RTC_C_PRODUCT_REMOVE_HOVER') ||
            !Configuration::deleteByName('RTC_C_PRODUCT_SEPARATOR') ||
            !Configuration::deleteByName('RTC_C_PRODUCT_SUMMARY_BG') ||
            !Configuration::deleteByName('RTC_C_PRODUCT_SUMMARY_TITLE') ||
            !Configuration::deleteByName('RTC_C_PRODUCT_SUMMARY_VALUE') ||
            !Configuration::deleteByName('RTC_C_SUMMARY_BORDER') ||
            !Configuration::deleteByName('RTC_LC_BG') ||
            !Configuration::deleteByName('RTC_LC_V_SEPARATOR') ||
            !Configuration::deleteByName('RTC_LC_H_SEPARATOR') ||
            !Configuration::deleteByName('RTC_LC_SUCCESS_BG') ||
            !Configuration::deleteByName('RTC_LC_SUCCESS_COLOR') ||
            !Configuration::deleteByName('RTC_LC_IMG_BORDER') ||
            !Configuration::deleteByName('RTC_LC_PRODUCT_NAME') ||
            !Configuration::deleteByName('RTC_LC_PRODUCT_ATTS') ||
            !Configuration::deleteByName('RTC_LC_PRODUCT_ATTS_LABEL') ||
            !Configuration::deleteByName('RTC_LC_IN_CART_BG') ||
            !Configuration::deleteByName('RTC_LC_IN_CART_COLOR') ||
            !Configuration::deleteByName('RTC_LC_TOTAL_BG') ||
            !Configuration::deleteByName('RTC_LC_TOTAL_LABEL') ||
            !Configuration::deleteByName('RTC_LC_TOTAL_COLOR') ||
            !Configuration::deleteByName('RTC_LC_CROSS_TITLE') ||
            !Configuration::deleteByName('RTC_LC_CLOSE') ||
            !Configuration::deleteByName('RTC_LC_CLOSE_HOVER') ||
            !Configuration::deleteByName('RTC_FOOTER_BACKGROUND_COLOR') ||
            !Configuration::deleteByName('RTC_FOOTER_TOP_LINE') ||
            !Configuration::deleteByName('RTC_FOOTER_TOP_LINE_HEADINGS') ||
            !Configuration::deleteByName('RTC_NS_BORDER') ||
            !Configuration::deleteByName('RTC_FOOTER_NEWS_INPUT') ||
            !Configuration::deleteByName('NC_FOOTER_NEWS_BORDER') ||
            !Configuration::deleteByName('NC_FOOTER_CI_BG') ||
            !Configuration::deleteByName('NC_LOADER_COLOR') ||
            !Configuration::deleteByName('RTC_FOOTER_NEWS_BUTTON') ||
            !Configuration::deleteByName('RTC_FOOTER_NEWS_BUTTON_BG') ||
            !Configuration::deleteByName('RTC_FOOTER_NEWS_BUTTON_BORDER') ||
            !Configuration::deleteByName('RTC_FOOTER_NEWS_DISPLAY') ||
            !Configuration::deleteByName('RTC_FOOTER_SOCIAL_DISPLAY') ||
            !Configuration::deleteByName('NC_FOOTER_HEADINGS') ||
            !Configuration::deleteByName('RTC_FOOTER_TXT_COLOR') ||
            !Configuration::deleteByName('RTC_FOOTER_LINK_COLOR') ||
            !Configuration::deleteByName('RTC_FOOTER_HOVER_COLOR') ||
            !Configuration::deleteByName('RTC_FOOTER_ACCOUNT_DISC') ||
            !Configuration::deleteByName('RTC_FOOTER_UP_BG') ||
            !Configuration::deleteByName('RTC_FOOTER_UP_DISPLAY') ||
            !Configuration::deleteByName('RTC_FOOTER_CONTACT_DISPLAY') ||
            !Configuration::deleteByName('RTC_FOOTER_ACCOUNT_DISPLAY') ||
            !Configuration::deleteByName('RTC_FOOTER_CATEGORIES_DISPLAY') ||
            !Configuration::deleteByName('RTC_FOOTER_INFO_DISPLAY') ||
            !Configuration::deleteByName('RTC_FOOTER_BOTTOM_LINE') ||
            !Configuration::deleteByName('RTC_FOOTER_PAYMENT_DISPLAY') ||
            !Configuration::deleteByName('RTC_FOOTER_PL_VISA') ||
            !Configuration::deleteByName('RTC_FOOTER_PL_MASTERCARD') ||
            !Configuration::deleteByName('RTC_FOOTER_PL_MAESTRO') ||
            !Configuration::deleteByName('RTC_FOOTER_PL_DISCOVERY') ||
            !Configuration::deleteByName('RTC_FOOTER_PL_PAYPAL') ||
            !Configuration::deleteByName('RTC_FOOTER_COPYRIGHT_DISPLAY') ||
            !Configuration::deleteByName('RTC_FOOTER_BOTTOM_TEXT') ||
            !Configuration::deleteByName('RTC_LATIN_EXT') ||
            !Configuration::deleteByName('RTC_CYRILLIC') ||
            !Configuration::deleteByName('RTC_COPYRIGHT_TEXT') ||
            !Configuration::deleteByName('NC_SOLDOUT_BG') ||
            !Configuration::deleteByName('NC_SOLDOUT_BORDER') ||
            !Configuration::deleteByName('NC_SOLDOUT_COLOR') ||
            !Configuration::deleteByName('NC_LONG_PRICES') ||
            !Configuration::deleteByName('NC_SHOW_IP') ||
            !Configuration::deleteByName('NC_MAN_TEXT') ||
            !Configuration::deleteByName('NC_MAN_LOGO') ||
            !Configuration::deleteByName('NC_RGRID') ||
            !Configuration::deleteByName('NC_RNUM') ||
            !Configuration::deleteByName('NC_RTOP') ||
            !Configuration::deleteByName('NC_RBG') ||
            !Configuration::deleteByName('NC_RLIST') ||
            !Configuration::deleteByName('NC_RHIDE') ||
            !Configuration::deleteByName('NC_COUNT') ||
            !Configuration::deleteByName('NC_COUNT_DAYS') ||
            !Configuration::deleteByName('NC_COUNT_BG') ||
            !Configuration::deleteByName('NC_COUNT_COLOR') ||
            !Configuration::deleteByName('NC_COUNT_SEP') ||
            !Configuration::deleteByName('NC_COUNT_PR_TITLE') ||
            !Configuration::deleteByName('NC_COUNT_PR_TITLEBG') ||
            !Configuration::deleteByName('NC_COUNT_PR_BG') ||
            !Configuration::deleteByName('NC_COUNT_PR_COLOR') ||
            !Configuration::deleteByName('NC_COUNT_PR_SEP') ||
            !Configuration::deleteByName('NC_M_MODE') ||
            !Configuration::deleteByName('NC_PRODUCT_SWITCH') ||
            !Configuration::deleteByName('NC_CAROUSEL_FEATURED') ||
            !Configuration::deleteByName('NC_AUTO_FEATURED') ||
            !Configuration::deleteByName('NC_ITEMS_FEATURED') ||
            !Configuration::deleteByName('NC_CAROUSEL_NEW') ||
            !Configuration::deleteByName('NC_AUTO_NEW') ||
            !Configuration::deleteByName('NC_ITEMS_NEW') ||
            !Configuration::deleteByName('NC_CAROUSEL_BEST') ||
            !Configuration::deleteByName('NC_AUTO_BEST') ||
            !Configuration::deleteByName('NC_ITEMS_BEST') ||
            !Configuration::deleteByName('NC_CAROUSEL_SALE') ||
            !Configuration::deleteByName('NC_AUTO_SALE') ||
            !Configuration::deleteByName('NC_ITEMS_SALE') ||
            !Configuration::deleteByName('NC_UP_MENU') ||
            !Configuration::deleteByName('NC_UP_HEAD') ||
            !Configuration::deleteByName('NC_UP_BUT') ||
            !Configuration::deleteByName('NC_M_CHEV') ||
            !Configuration::deleteByName('NC_M_BT') ||
            !Configuration::deleteByName('NC_M_BR') ||
            !Configuration::deleteByName('NC_M_BB') ||
            !Configuration::deleteByName('NC_M_BL') ||
            !Configuration::deleteByName('NC_M_RADIUS') ||
            !Configuration::deleteByName('NC_M_NOTE') ||
            !Configuration::deleteByName('NC_M_ICON') ||
            !Configuration::deleteByName('NC_MV_BG') ||
            !Configuration::deleteByName('NC_MV_COLOR') ||
            !Configuration::deleteByName('NC_MV_ICON') ||
            !Configuration::deleteByName('NC_MV_BG_HOVER') ||
            !Configuration::deleteByName('NC_MV_HOVER') ||
            !Configuration::deleteByName('NC_MV_TAB') ||
            !Configuration::deleteByName('NC_MV_BOR') ||
            !Configuration::deleteByName('NC_CSS') ||
            !Configuration::deleteByName('RTC_C_ARROW_COLOR'))

            return false;
        return true;

    }

    public function postProcess() {
    }

    public function updateOriginalValues() {
        foreach($this -> defaults as $key => $v) {
            $find_nc = "nc_";
            if (substr($key, 0, 3) === $find_nc) {
                $target = strtoupper($key);
                if (!Configuration::hasKey($target) || !Configuration::get($target)) {
                    Configuration::updateValue((string)$target, $this -> defaults["$key"]);
                }
            }
        }
    }

    public function updateCopyright() {
        $languages = Language::getLanguages();
        $result = array();
        foreach ($languages as $language)
            $result[$language['id_lang']] = $_POST['text_' . $language['id_lang']];

        return Configuration::updateValue('RTC_COPYRIGHT_TEXT', $result);
    }

    public function getContent() {

        $this -> context -> controller -> addJS(_PS_JS_DIR_ . 'jquery/plugins/jquery.colorpicker.js');
        $this -> context -> controller -> addJS(($this -> _path) . 'js/navigation.js');
        $this -> context -> controller -> addJS(($this -> _path) . 'js/script.js');
        $this -> context -> controller -> addCSS(($this -> _path) . 'css/admin.css');
        $this -> context -> controller -> addJS(($this -> _path) . 'codemirror-4.11/lib/codemirror.js');
        $this -> context -> controller -> addJS(($this -> _path) . 'codemirror-4.11/mode/css/css.js');
        $this -> context -> controller -> addCSS(($this -> _path) . 'codemirror-4.11/lib/codemirror.css');
        $this -> context -> controller -> addCSS(($this -> _path) . 'codemirror-4.11/themes/mbo.css');
        $this -> context -> controller -> addCSS(($this -> _path) . 'codemirror-4.11/themes/zenburn.css');
        $this -> postProcess();

        $output = '<h2 class="roytc_title"><span class="theme_name"></span><span class="mod_name">' . $this -> displayName . '</span><span class="mod_version"></span></h2>';

        $errors = '';

        if (Tools::isSubmit('export_changes')) {
            $keys = array('RTC_F_HEADINGS', 'RTC_F_TEXT', 'RTC_F_PRICE', 'RTC_MAIN_BACKGROUND_COLOR', 'RTC_TOP_LINE_BACKGROUND', 'RTC_DESC_HEIGHT', 'NC_SUBCAT', 'NC_CAT', 'RTC_BREADCRUMB', 'NC_LOADER', 'RTC_UP_ARROW_BORDER', 'RTC_UP_ARROW_COLOR', 'RTC_CONTENT_BACKGROUND_COLOR', 'RTC_BODY_BG_REPEAT', 'RTC_BODY_BG_POSITION', 'RTC_BODY_BG_FIXED', 'RTC_BODY_BG_PATTERN', 'RTC_GRADIENT_SCHEME', 'RTC_TEXTURES', 'RTC_DISPLAY_GRADIENT', 'RTC_FONT_SIZE_BODY', 'RTC_FONT_SIZE_MENU', 'RTC_FONT_SIZE_BUTTONS', 'RTC_FONT_SIZE_PRICE', 'RTC_MENU_LINE_BG', 'RTC_MENU_LINE_BORDER', 'NC_G_BODY_TEXT', 'RTC_BRAND_BG', 'RTC_BRAND_BORDER', 'RTC_G_BODY_LINK', 'RTC_G_BODY_LINK_HOVER', 'RTC_G_TABLE_BG', 'RTC_G_TABLE_TITLE_BG', 'RTC_G_TABLE_TITLE_COLOR', 'RTC_G_TABLE_TOTAL', 'RTC_BOX', 'RTC_BOX_TITLE', 'RTC_BOX_TITLE_BORDER', 'RTC_LABEL', 'RTC_CHECKBOX_LABEL', 'RTC_INPUT_BG', 'RTC_INPUT_BORDER', 'RTC_INPUT_COLOR', 'RTC_FORM', 'RTC_FORM_GREY', 'RTC_B_TEXT', 'RTC_B_LINK', 'RTC_B_LINK_HOVER', 'RTC_B_SEPARATOR', 'RTC_B_NORMAL_BG', 'RTC_B_NORMAL_BORDER', 'RTC_B_NORMAL_BORDER_HOVER', 'RTC_B_NORMAL_BG_HOVER', 'RTC_B_NORMAL_COLOR', 'RTC_B_NORMAL_COLOR_HOVER', 'RTC_B_EX_BG', 'RTC_B_EX_BORDER', 'RTC_B_EX_COLOR', 'RTC_CL_LABEL', 'RTC_CL_VALUE', 'RTC_BAN_TITLE', 'RTC_BAN_TEXT', 'RTC_BAN_BG', 'RTC_BAN_BORDER', 'RTC_BAN_BUTTON', 'RTC_BAN_BUTTON_TEXT', 'RTC_CL_POPUP_BG', 'RTC_CL_POPUP_BORDER', 'RTC_CL_POPUP_SHADOW', 'RTC_BANNERS_ANIM', 'NC_SECOND_IMG', 'RTC_CL_POPUP_ITEM', 'RTC_CL_POPUP_ITEM_HOVER', 'RTC_CL_DISPLAY_CUR', 'RTC_CL_DISPLAY_LAN', 'RTC_TA_LINK', 'RTC_TA_LINK_HOVER', 'RTC_TA_SEPARATOR', 'RTC_TA_WELCOME', 'RTC_TA_NAME', 'RTC_IP_BG', 'RTC_IP_ANIM', 'RTC_IP_BORDER', 'RTC_IP_TITLE', 'RTC_IP_TEXT', 'RTC_SLIDER_MODE', 'RTC_DISPLAY_ROUND', 'RTC_CON_BG', 'RTC_CON_BORDER', 'RTC_CON_COLOR', 'RTC_S_CON_BG', 'RTC_S_CON_BORDER', 'RTC_S_CON_COLOR', 'RTC_CON_BG_HOVER', 'RTC_CON_BORDER_HOVER', 'RTC_CON_COLOR_HOVER', 'RTC_HP_TITLE', 'RTC_HP_TITLE_HOVER', 'RTC_DISPLAY_FEATURED', 'RTC_DISPLAY_NEW', 'RTC_DISPLAY_BEST', 'RTC_BOTTOM_SECTION', 'NC_BOTTOM_SECTION_OTHER', 'NC_BOTTOM_SECTION_SW', 'RTC_MA_REQUIRED', 'RTC_MA_TITLE', 'RTC_MA_TITLE_HOVER', 'RTC_MA_ICON', 'RTC_MA_ICON_BORDER', 'RTC_MA_ICON_BORDER_HOVER', 'RTC_MA_ICON_HOVER', 'RTC_MA_FOOTER_SEPARATOR', 'RTC_O_NUMBER_BG', 'RTC_O_NUMBER_BORDER', 'RTC_O_NUMBER_BORDER_ACTIVE', 'RTC_O_NUMBER_BORDER_DONE', 'RTC_O_NUMBER_BORDER_DONE_HOVER', 'RTC_O_NUMBER_COLOR', 'RTC_O_NUMBER_TITLE', 'RTC_O_NUMBER_BG_ACTIVE', 'RTC_O_NUMBER_COLOR_ACTIVE', 'RTC_O_NUMBER_TITLE_ACTIVE', 'RTC_O_NUMBER_BG_DONE', 'RTC_O_NUMBER_COLOR_DONE', 'RTC_O_NUMBER_TITLE_DONE', 'RTC_O_NUMBER_BG_DONE_HOVER', 'RTC_O_NUMBER_COLOR_DONE_HOVER', 'RTC_O_NUMBER_TITLE_DONE_HOVER', 'RTC_O_IMG_BORDER', 'RTC_O_PRODUCT_NAME', 'RTC_O_PRODUCT_ATTS', 'RTC_O_REMOVE', 'RTC_O_REMOVE_HOVER', 'RTC_O_TOTAL_TITLE', 'RTC_O_TOTAL_PRICE', 'RTC_O_DEL_TITLE', 'RTC_O_DEL_ITEM_BG', 'RTC_O_DEL_ITEM_TEXT', 'RTC_O_PAY_ITEM_BG', 'NC_O_PAY_ITEM_BG_HOVER', 'NC_O_PAY_ITEM_C_HOVER', 'NC_F_UNDERLINE', 'RTC_O_PAY_ITEM_TITLE', 'RTC_O_PAY_ITEM_DESC', 'RTC_O_PAY_ITEM_CHEVRON', 'RTC_BL_BG', 'RTC_BL_HEADING', 'RTC_BL_DATE', 'RTC_BL_BORDER', 'RTC_BL_MARK', 'RTC_BL_RM_COLOR', 'RTC_BL_RM_BG', 'RTC_BL_RM_BORDER', 'RTC_BL_RM_BG_ICON', 'RTC_BL_RM_BORDER_ICON', 'RTC_BL_RM_BG_HOVER', 'RTC_BL_RM_BORDER_HOVER', 'RTC_BL_RM_HOVER', 'RTC_BL_TITLE', 'RTC_BL_TITLE_HOVER', 'RTC_BL_BG_CONTENT', 'RTC_BL_META', 'RTC_BL_COM_BG', 'RTC_BL_COM_NAME', 'RTC_MENU_BORDER', 'RTC_MENU_INPUT_BG', 'RTC_MENU_LINK_BG_COLOR', 'RTC_MENU_LINK_BG_HOVER', 'RTC_MENU_LINK_BG_ACTIVE', 'RTC_MENU_LINK_BORDER_COLOR', 'RTC_MENU_LINK_BORDER_HOVER', 'RTC_MENU_LINK_BORDER_ACTIVE', 'RTC_MENU_LINK_COLOR', 'RTC_MENU_LINK_ACTIVE', 'RTC_MENU_HOVER_COLOR', 'RTC_SUBMENU_BG_COLOR', 'RTC_SUBMENU_SHADOW', 'NC_STICKY_MENU', 'RTC_SUBMENU_LINK_COLOR', 'NC_ST_UP', 'NC_ST_UP_BG', 'NC_ST_UP_BORDER', 'RTC_SUBMENU_HOVER_COLOR', 'RTC_SUBMENU_BEFORE_LINE', 'RTC_SUBMENU_BORDER_TOP', 'RTC_SEARCH_BOX_BG', 'RTC_SEARCH_BORDER', 'NC_SEARCH_BORDER_BUT', 'RTC_SEARCH_INPUT_COLOR', 'RTC_SEARCH_BUTTON', 'RTC_SEARCH_POPUP_BG', 'RTC_SEARCH_POPUP_BORDER', 'RTC_SEARCH_SHADOW', 'RTC_SEARCH_ITEM_BG', 'RTC_SEARCH_ITEM_BG_HOVER', 'RTC_SIDEBAR_TITLE_BG', 'RTC_SIDEBAR_TITLE_BORDER', 'RTC_SIDEBAR_TITLE_COLOR', 'RTC_SIDEBAR_TITLE_LINK', 'RTC_SIDEBAR_TITLE_LINK_HOVER', 'RTC_SIDEBAR_BLOCK_CONTENT_BG', 'RTC_SIDEBAR_BLOCK_CONTENT_BORDER', 'RTC_SIDEBAR_BLOCK_TEXT_COLOR', 'RTC_SIDEBAR_BLOCK_LINK', 'RTC_SIDEBAR_BLOCK_LINK_HOVER', 'RTC_SIDEBAR_BUTTON_BG', 'RTC_SIDEBAR_BUTTON_BORDER', 'RTC_SIDEBAR_BUTTON_COLOR', 'RTC_SIDEBAR_ITEM_SEPARATOR', 'RTC_SIDEBAR_PRODUCT_IMG_BORDER', 'RTC_SIDEBAR_CATEGORIES_ITEM', 'RTC_SIDEBAR_CATEGORIES_ITEM_HOVER', 'RTC_SIDEBAR_CATEGORIES_SEPARATOR', 'RTC_CMS_TITLE', 'RTC_CMS_TITLE_BORDER', 'RTC_CMS_TITLE_BORDER_MARK', 'RTC_PAGE_TEXT_COLOR', 'RTC_PAGE_HEADINGS', 'RTC_PAGE_LINK', 'RTC_PAGE_LINK_HOVER', 'RTC_CONTACT_FORM_BG', 'RTC_CONTACT_FORM_BORDER', 'RTC_WARNING_MESSAGE_BG', 'RTC_WARNING_MESSAGE_COLOR', 'RTC_SUCCESS_MESSAGE_BG', 'RTC_SUCCESS_MESSAGE_COLOR', 'RTC_INFO_MESSAGE_BG', 'RTC_INFO_MESSAGE_COLOR', 'RTC_DANGER_MESSAGE_BG', 'RTC_DANGER_MESSAGE_COLOR', 'RTC_PL_HEADING_COLOR', 'RTC_PL_HEADING_TEXT', 'RTC_PL_NAV_TOP_BG', 'RTC_PL_NAV_TOP_BORDER', 'RTC_PL_NAV_GRID', 'RTC_PL_NAV_COMPARE_BORDER', 'RTC_PL_NAV_SORT', 'RTC_PL_NUMBER_BG', 'RTC_PL_NUMBER_BG_HOVER', 'RTC_PL_NUMBER_COLOR', 'RTC_PL_NUMBER_COLOR_HOVER', 'RTC_PL_PAG_NAV_BG', 'RTC_PL_PAG_NAV_BG_HOVER', 'RTC_PL_PAG_NAV_COLOR', 'RTC_PL_PAG_NAV_COLOR_HOVER', 'RTC_PL_PAG_ACTIVE_BG', 'RTC_PL_PAG_ACTIVE_COLOR', 'RTC_PL_SHOW_PER_PAGE', 'RTC_PL_SHOW_ITEMS', 'RTC_PL_FILTER_SEPARATOR', 'RTC_PL_FILTER_RANGE', 'RTC_PL_FILTER_RANGE_OUT', 'RTC_PL_FILTER_HANDLE_BG', 'RTC_PL_FILTER_HANDLE_BORDER', 'RTC_PL_ITEM_BG', 'RTC_PL_ITEM_BORDER', 'RTC_PL_PRODUCT_NAME', 'RTC_PL_PRODUCT_PRICE', 'RTC_PL_PRODUCT_OLDPRICE', 'RTC_PL_PRODUCT_PERCENT', 'RTC_PL_PRODUCT_PERCENT_BG', 'RTC_PL_PRODUCT_CART', 'RTC_PL_PRODUCT_CART_BORDER', 'RTC_PL_PRODUCT_CART_COLOR', 'RTC_PL_PRODUCT_CART_ACTIVE', 'RTC_PL_PRODUCT_CART_ACTIVE_BORDER', 'RTC_PL_PRODUCT_CART_ACTIVE_COLOR', 'RTC_PL_PRODUCT_CART_HOVER', 'RTC_PL_PRODUCT_CART_HOVER_BORDER', 'RTC_PL_PRODUCT_CART_HOVER_COLOR', 'RTC_PL_PRODUCT_QUICKVIEW', 'RTC_PL_PRODUCT_QUICKVIEW_HOVER', 'RTC_PL_PRODUCT_QUICKVIEW_COLOR', 'RTC_PL_PRODUCT_VIEW_BORDER', 'RTC_PL_PRODUCT_VIEW_BORDER_HOVER', 'RTC_PL_PRODUCT_COMPARE', 'RTC_PL_PRODUCT_COMPARE_HOVER', 'RTC_PL_PRODUCT_COMPARE_ICON', 'RTC_PL_PRODUCT_COMPARE_ICON_ACTIVE', 'RTC_PL_PRODUCT_WISH_ICON', 'RTC_PL_PRODUCT_WISH_ICON_ACTIVE', 'RTC_PL_PRODUCT_NEW_BG', 'RTC_PL_PRODUCT_NEW_BORDER', 'RTC_PL_PRODUCT_SALE_BORDER', 'RTC_PL_PRODUCT_NEW_COLOR', 'RTC_PL_PRODUCT_SALE_BG', 'RTC_PL_PRODUCT_SALE_COLOR', 'RTC_PL_PRODUCT_WHITE_GRAD', 'RTC_PL_PRODUCT_QWTEXT', 'RTC_PL_PRODUCT_DISPLAY_QUICKVIEW', 'RTC_PL_PRODUCT_DISPLAY_VIEW', 'RTC_PL_PRODUCT_DISPLAY_NEW', 'RTC_PL_PRODUCT_DISPLAY_SALE', 'RTC_PL_LIST_IMG_BORDER', 'RTC_PL_LIST_BG', 'RTC_PL_LIST_SEPARATOR', 'RTC_PL_LIST_DESCRIPTION', 'RTC_C_LEFT_COLUMN', 'RTC_C_RIGHT_COLUMN', 'RTC_C_LEFT_COLOR', 'RTC_C_RIGHT_COLOR', 'RTC_C_IMG_BORDER', 'RTC_C_REMOVE', 'RTC_C_REMOVE_HOVER', 'RTC_PP_IMG_BORDER', 'RTC_PP_ICON_BORDER', 'RTC_PP_ICON_BORDER_HOVER', 'RTC_PP_ICON_NAV_BG', 'RTC_PP_ICON_NAV_BG_HOVER', 'RTC_PP_SOCIAL_BG', 'RTC_PP_SOCIAL_COLOR', 'RTC_PP_USEFUL_COLOR', 'RTC_PP_USEFUL_COLOR_HOVER', 'RTC_PP_USEFUL_ICON', 'RTC_PP_DISPLAY_SOCIAL', 'RTC_PP_DISPLAY_WISH', 'RTC_PP_DISPLAY_SEND', 'RTC_PP_DISPLAY_PRINT', 'RTC_PP_NAME', 'RTC_PP_DESC', 'RTC_PP_INFO_LABEL', 'RTC_PP_INFO_VALUE', 'RTC_PP_DISPLAY_REFER', 'RTC_PP_DISPLAY_COND', 'RTC_PP_DISPLAY_AVAIL', 'RTC_PP_ATT_LABEL', 'RTC_PP_ATT_INPUT_BG', 'RTC_PP_ATT_COLOR', 'RTC_PP_ATT_COLOR_ACTIVE', 'RTC_PP_ATT_QUAN_INPUT_BG', 'RTC_PP_ATT_QUAN_PM_BG', 'RTC_PP_ATT_QUAN_PM_BG_HOVER', 'RTC_PP_ATT_QUAN_PM_COLOR', 'RTC_PP_ATT_QUAN_PM_COLOR_HOVER', 'NC_PP_ADD_BG', 'NC_PP_ADD_BORDER', 'NC_PP_ADD_COLOR', 'RTC_PP_QW_BG', 'RTC_PP_PRICE_BOX', 'RTC_PP_PRICE_BORDER', 'RTC_PP_PRICE_SEPARATOR', 'RTC_PP_PRICE_COLOR', 'RTC_PP_TABS_BG', 'RTC_PP_TABS_BG_HOVER', 'RTC_PP_TABS_COLOR', 'RTC_PP_TABS_COLOR_HOVER', 'RTC_PP_TABS_SHEETS_BG', 'RTC_PP_TABS_SHEETS_COLOR', 'RTC_PP_TABS_TABLE_LEFT', 'RTC_PP_TABS_TABLE_RIGHT', 'RTC_PP_TABS_TABLE_LEFT_COLOR', 'RTC_PP_TABS_TABLE_RIGHT_COLOR', 'RTC_PP_REVIEWS_STARON', 'RTC_PP_REVIEWS_STAROFF', 'RTC_PP_REVIEWS_NAME', 'RTC_PP_REVIEWS_DATE', 'RTC_PP_REVIEWS_NAME_SEPARATOR', 'RTC_PP_REVIEWS_BLOCK_SEPARATOR', 'RTC_PP_REVIEWS_DISPLAY_TOP', 'RTC_PP_REVIEWS_USEFUL', 'RTC_PP_REVIEWS_REPORT', 'RTC_PP_REVIEWS_YN', 'RTC_PP_REVIEWS_YN_BORDER', 'RTC_PP_AC_NAME', 'RTC_PP_AC_PRICE', 'RTC_PP_AC_DESC', 'RTC_C_TITLE', 'NC_C_TITLE_HOVER', 'NC_SOLDOUT_BG', 'NC_SOLDOUT_BORDER', 'NC_SOLDOUT_COLOR', 'RTC_C_PRODUCTS', 'RTC_C_BG', 'RTC_C_BG_HOVER', 'RTC_C_BORDER', 'RTC_C_BG_ICON', 'RTC_C_BORDER_ICON', 'RTC_C_DISPLAY_ARROW', 'RTC_C_POPUP_BG', 'RTC_C_POPUP_BORDER', 'RTC_C_POPUP_SHADOW', 'RTC_C_PRODUCT_Q', 'RTC_C_PRODUCT_NAME', 'RTC_C_PRODUCT_NAME_HOVER', 'RTC_C_PRODUCT_ATTS', 'RTC_C_PRODUCT_PRICE', 'RTC_C_PRODUCT_REMOVE', 'RTC_C_PRODUCT_REMOVE_HOVER', 'RTC_C_PRODUCT_SEPARATOR', 'RTC_C_PRODUCT_SUMMARY_BG', 'RTC_C_PRODUCT_SUMMARY_TITLE', 'RTC_C_PRODUCT_SUMMARY_VALUE', 'RTC_C_SUMMARY_BORDER', 'RTC_LC_BG', 'RTC_LC_V_SEPARATOR', 'RTC_LC_H_SEPARATOR', 'RTC_LC_SUCCESS_BG', 'RTC_LC_SUCCESS_COLOR', 'RTC_LC_IMG_BORDER', 'RTC_LC_PRODUCT_NAME', 'RTC_LC_PRODUCT_ATTS', 'RTC_LC_PRODUCT_ATTS_LABEL', 'RTC_LC_IN_CART_BG', 'RTC_LC_IN_CART_COLOR', 'RTC_LC_TOTAL_BG', 'RTC_LC_TOTAL_LABEL', 'RTC_LC_TOTAL_COLOR', 'RTC_LC_CROSS_TITLE', 'RTC_LC_CLOSE', 'RTC_LC_CLOSE_HOVER', 'RTC_FOOTER_BACKGROUND_COLOR', 'RTC_FOOTER_TOP_LINE', 'RTC_FOOTER_TOP_LINE_HEADINGS', 'RTC_NS_BORDER', 'RTC_FOOTER_NEWS_INPUT', 'NC_FOOTER_NEWS_BORDER', 'NC_FOOTER_CI_BG', 'NC_LOADER_COLOR', 'RTC_FOOTER_NEWS_BUTTON', 'RTC_FOOTER_NEWS_BUTTON_BG', 'RTC_FOOTER_NEWS_BUTTON_BORDER', 'RTC_FOOTER_NEWS_DISPLAY', 'RTC_FOOTER_SOCIAL_DISPLAY', 'NC_FOOTER_HEADINGS', 'RTC_FOOTER_TXT_COLOR', 'RTC_FOOTER_LINK_COLOR', 'RTC_FOOTER_HOVER_COLOR', 'RTC_FOOTER_ACCOUNT_DISC', 'RTC_FOOTER_UP_BG', 'RTC_FOOTER_UP_DISPLAY', 'RTC_FOOTER_CONTACT_DISPLAY', 'RTC_FOOTER_ACCOUNT_DISPLAY', 'RTC_FOOTER_CATEGORIES_DISPLAY', 'RTC_FOOTER_INFO_DISPLAY', 'RTC_FOOTER_BOTTOM_LINE', 'RTC_FOOTER_PAYMENT_DISPLAY', 'RTC_FOOTER_PL_VISA', 'RTC_FOOTER_PL_MASTERCARD', 'RTC_FOOTER_PL_MAESTRO', 'RTC_FOOTER_PL_DISCOVER', 'RTC_FOOTER_PL_PAYPAL', 'RTC_FOOTER_COPYRIGHT_DISPLAY', 'RTC_FOOTER_BOTTOM_TEXT', 'RTC_LATIN_EXT', 'RTC_CYRILLIC', 'RTC_C_ARROW_COLOR', 'NC_PP_ATT_RIGHT', 'NC_LONG_PRICES', 'NC_SHOW_IP', 'NC_MAN_TEXT', 'NC_MAN_LOGO', 'NC_RGRID', 'NC_RNUM', 'NC_RTOP', 'NC_RBG', 'NC_RLIST', 'NC_RHIDE', 'NC_COUNT', 'NC_COUNT_DAYS', 'NC_COUNT_BG', 'NC_COUNT_COLOR', 'NC_COUNT_SEP', 'NC_COUNT_PR_TITLE', 'NC_COUNT_PR_TITLEBG', 'NC_COUNT_PR_BG', 'NC_COUNT_PR_COLOR', 'NC_COUNT_PR_SEP', 'NC_PRODUCT_SWITCH', 'NC_CAROUSEL_FEATURED', 'NC_CAROUSEL_BEST', 'NC_CAROUSEL_NEW', 'NC_CAROUSEL_SALE', 'NC_AUTO_FEATURED', 'NC_AUTO_BEST', 'NC_AUTO_NEW', 'NC_AUTO_SALE', 'NC_ITEMS_FEATURED', 'NC_ITEMS_BEST', 'NC_ITEMS_NEW', 'NC_ITEMS_SALE', 'NC_M_MODE', 'NC_UP_BUT', 'NC_UP_HEAD', 'NC_UP_MENU', 'NC_M_CHEV', 'NC_M_BT', 'NC_M_BR', 'NC_M_BB', 'NC_M_BL', 'NC_M_RADIUS', 'NC_M_NOTE', 'NC_M_ICON', 'NC_MV_BG', 'NC_MV_COLOR', 'NC_MV_ICON', 'NC_MV_BG_HOVER', 'NC_MV_HOVER', 'NC_MV_TAB', 'NC_MV_BOR',  'NC_CSS');
            $export = array();
            foreach ($keys as $value) {
                $export[$value] = Configuration::get($value);
            }
            $json_export = json_encode($export);
            $output .='<a id="modez_export" download="modez_export.json" type="text/json"></a>
                       <script>
                       $(document).ready(function(){
                              var data = '.$json_export.';
                              var a = document.getElementById("modez_export");
                              a.href="data:text/json;charset=utf-8," + encodeURIComponent(JSON.stringify(data));
                              a.click();
                       });
                       </script>';
        }

        if (Tools::isSubmit('modez_import_submit')) {
            $data = file_get_contents($_FILES['modez_import_file']['tmp_name']);
            $arr = json_decode($data);
            foreach ($arr as $key => $value) {
                Configuration::updateValue($key, $value);
            }
        }

        if (Tools::isSubmit('body_upload_background')) {
            if (isset($_FILES['body_background_image_field']) && isset($_FILES['body_background_image_field']['tmp_name']) && !empty($_FILES['body_background_image_field']['tmp_name'])) {
                if ($error = ImageManager::validateUpload($_FILES['body_background_image_field'], Tools::convertBytes(ini_get('upload_max_filesize'))))

                    $errors .= $error;

                else {

                    Configuration::updateValue('RTC_BODY_BG_EXT', substr($_FILES['body_background_image_field']['name'], strrpos($_FILES['body_background_image_field']['name'], '.') + 1));

                    if (Shop::getContext() == Shop::CONTEXT_SHOP)
                        $adv_imgname = 'body_background'.'-'.(int)$this->context->shop->getContextShopID();

                    if (!move_uploaded_file($_FILES['body_background_image_field']['tmp_name'], _PS_MODULE_DIR_ . $this -> name . '/upload/' . $adv_imgname . '.' . Configuration::get('RTC_BODY_BG_EXT')))
                        $errors .= $this->l('Error move uploaded file');
                    $output .= '<div class="conf confirm">' . $this->l('Image uploaded') . '</div>';
                }
            }
        }

        if (Tools::isSubmit('top_upload_background')) {
            if (isset($_FILES['top_background_image_field']) && isset($_FILES['top_background_image_field']['tmp_name']) && !empty($_FILES['top_background_image_field']['tmp_name'])) {
                if ($error = ImageManager::validateUpload($_FILES['top_background_image_field'], Tools::convertBytes(ini_get('upload_max_filesize'))))

                    $errors .= $error;

                else {

                    Configuration::updateValue('RTC_TOP_BG_EXT', substr($_FILES['top_background_image_field']['name'], strrpos($_FILES['top_background_image_field']['name'], '.') + 1));

                    if (Shop::getContext() == Shop::CONTEXT_SHOP)
                        $adv_imgname = 'top_background'.'-'.(int)$this->context->shop->getContextShopID();

                    if (!move_uploaded_file($_FILES['top_background_image_field']['tmp_name'], _PS_MODULE_DIR_ . $this -> name . '/' . $adv_imgname . '.' . Configuration::get('RTC_TOP_BG_EXT')))
                        $errors .= $this->l('Error move uploaded file');
                    $output .= '<div class="conf confirm">' . $this->l('Image uploaded') . '</div>';
                }
            }
        }

        if (Tools::isSubmit('top_background_image_delete')) {

            if (Shop::getContext() == Shop::CONTEXT_SHOP)
                $adv_imgname = 'top_background'.'-'.(int)$this->context->shop->getContextShopID();

            if (file_exists(_PS_MODULE_DIR_ . $this -> name . '/'.$adv_imgname.'.' . Configuration::get('RTC_TOP_BG_EXT')))
                unlink(_PS_MODULE_DIR_ . $this -> name . '/'.$adv_imgname.'.' . Configuration::get('RTC_TOP_BG_EXT'));
            Configuration::updateValue('RTC_TOP_BG_EXT', "");

            $output .= '<div class="conf confirm">' . $this->l('Image removed') . '</div>';
        }

        if (Tools::isSubmit('body_background_image_delete')) {

            if (Shop::getContext() == Shop::CONTEXT_SHOP)
                $adv_imgname = 'body_background'.'-'.(int)$this->context->shop->getContextShopID();

            if (file_exists(_PS_MODULE_DIR_ . $this -> name . '/upload/'.$adv_imgname.'.' . Configuration::get('RTC_BODY_BG_EXT')))
                unlink(_PS_MODULE_DIR_ . $this -> name . '/upload/'.$adv_imgname.'.' . Configuration::get('RTC_BODY_BG_EXT'));
            Configuration::updateValue('RTC_BODY_BG_EXT', "");

            $output .= '<div class="conf confirm">' . $this->l('Image removed') . '</div>';
        }

        if (Tools::isSubmit('menu_background_image_delete')) {

            if (Shop::getContext() == Shop::CONTEXT_SHOP)
                $adv_imgname = 'menu_background'.'-'.(int)$this->context->shop->getContextShopID();


            if (file_exists(_PS_MODULE_DIR_ . $this -> name . '/'.$adv_imgname.'.' . Configuration::get('RTC_MENU_BG_EXT')))
                unlink(_PS_MODULE_DIR_ . $this -> name . '/'.$adv_imgname.'.' . Configuration::get('RTC_MENU_BG_EXT'));
            Configuration::updateValue('RTC_MENU_BG_EXT', "");

            $output .= '<div class="conf confirm">' . $this->l('Image removed') . '</div>';
        }
        if (Tools::isSubmit('menu_image_delete2')) {

            if (Shop::getContext() == Shop::CONTEXT_SHOP)
                $adv_imgname = 'icons-home'.'-'.(int)$this->context->shop->getContextShopID();

            if (file_exists(_PS_MODULE_DIR_ . $this -> name . '/upload/'.$adv_imgname.'.' . Configuration::get('RTC_MENU_IMG_EXT')))
                unlink(_PS_MODULE_DIR_ . $this -> name . '/upload/'.$adv_imgname.'.' . Configuration::get('RTC_MENU_IMG_EXT'));
            Configuration::updateValue('RTC_MENU_IMG_EXT', "");

            $output .= '<div class="conf confirm">' . $this->l('Image removed') . '</div>';
        }

        if (Tools::isSubmit('menu_image_button2')) {
            if (isset($_FILES['menu_image_field2']) && isset($_FILES['menu_image_field2']['tmp_name']) && !empty($_FILES['menu_image_field2']['tmp_name'])) {
                if ($error = ImageManager::validateUpload($_FILES['menu_image_field2'], Tools::convertBytes(ini_get('upload_max_filesize'))))

                    $errors .= $error;

                else {

                    Configuration::updateValue('RTC_MENU_IMG_EXT', substr($_FILES['menu_image_field2']['name'], strrpos($_FILES['menu_image_field2']['name'], '.') + 1));

                    if (Shop::getContext() == Shop::CONTEXT_SHOP)
                        $adv_imgname = 'icons-home'.'-'.(int)$this->context->shop->getContextShopID();

                    if (!move_uploaded_file($_FILES['menu_image_field2']['tmp_name'], _PS_MODULE_DIR_ . $this -> name . '/upload/' . $adv_imgname . '.' . Configuration::get('RTC_MENU_IMG_EXT')))
                        $errors .= $this->l('Error move uploaded file');
                    $output .= '<div class="conf confirm">' . $this->l('Image uploaded') . '</div>';
                }
            }
        }
        if (Tools::isSubmit('cart_icon_button2')) {
            if (isset($_FILES['cart_icon_field2']) && isset($_FILES['cart_icon_field2']['tmp_name']) && !empty($_FILES['cart_icon_field2']['tmp_name'])) {
                if ($error = ImageManager::validateUpload($_FILES['cart_icon_field2'], Tools::convertBytes(ini_get('upload_max_filesize'))))

                    $errors .= $error;

                else {

                    Configuration::updateValue('RTC_CART_ICON_EXT', substr($_FILES['cart_icon_field2']['name'], strrpos($_FILES['cart_icon_field2']['name'], '.') + 1));

                    if (Shop::getContext() == Shop::CONTEXT_SHOP)
                        $adv_imgname = 'carticon'.'-'.(int)$this->context->shop->getContextShopID();

                    if (!move_uploaded_file($_FILES['cart_icon_field2']['tmp_name'], _PS_MODULE_DIR_ . $this -> name . '/upload/' . $adv_imgname . '.' . Configuration::get('RTC_CART_ICON_EXT')))
                        $errors .= $this->l('Error move uploaded file');
                    $output .= '<div class="conf confirm">' . $this->l('Image uploaded') . '</div>';
                }
            }
        }

        if (Tools::isSubmit('cart_icon_delete2')) {

            if (Shop::getContext() == Shop::CONTEXT_SHOP)
                $adv_imgname = 'carticon'.'-'.(int)$this->context->shop->getContextShopID();


            if (file_exists(_PS_MODULE_DIR_ . $this -> name . '/upload/'.$adv_imgname.'.' . Configuration::get('RTC_CART_ICON_EXT')))
                unlink(_PS_MODULE_DIR_ . $this -> name . '/upload/'.$adv_imgname.'.' . Configuration::get('RTC_CART_ICON_EXT'));
            Configuration::updateValue('RTC_CART_ICON_EXT', "");

            $output .= '<div class="conf confirm">' . $this->l('Image removed') . '</div>';
        }

        if (Tools::isSubmit('f_contacts_button2')) {
            if (isset($_FILES['f_contacts_field2']) && isset($_FILES['f_contacts_field2']['tmp_name']) && !empty($_FILES['f_contacts_field2']['tmp_name'])) {
                if ($error = ImageManager::validateUpload($_FILES['f_contacts_field2'], Tools::convertBytes(ini_get('upload_max_filesize'))))

                    $errors .= $error;

                else {

                    Configuration::updateValue('RTC_F_CONTACTS_EXT', substr($_FILES['f_contacts_field2']['name'], strrpos($_FILES['f_contacts_field2']['name'], '.') + 1));

                    if (Shop::getContext() == Shop::CONTEXT_SHOP)
                        $adv_imgname = 'icons-contacts'.'-'.(int)$this->context->shop->getContextShopID();

                    if (!move_uploaded_file($_FILES['f_contacts_field2']['tmp_name'], _PS_MODULE_DIR_ . $this -> name . '/upload/' . $adv_imgname . '.' . Configuration::get('RTC_F_CONTACTS_EXT')))
                        $errors .= $this->l('Error move uploaded file');
                    $output .= '<div class="conf confirm">' . $this->l('Image uploaded') . '</div>';
                }
            }
        }

        if (Tools::isSubmit('f_contacts_delete2')) {

            if (Shop::getContext() == Shop::CONTEXT_SHOP)
                $adv_imgname = 'icons-contacts'.'-'.(int)$this->context->shop->getContextShopID();

            if (file_exists(_PS_MODULE_DIR_ . $this -> name . '/upload/'.$adv_imgname.'.' . Configuration::get('RTC_F_CONTACTS_EXT')))
                unlink(_PS_MODULE_DIR_ . $this -> name . '/upload/'.$adv_imgname.'.' . Configuration::get('RTC_F_CONTACTS_EXT'));
            Configuration::updateValue('RTC_F_CONTACTS_EXT', "");

            $output .= '<div class="conf confirm">' . $this->l('Image removed') . '</div>';
        }


        if (Tools::isSubmit('i_ma_button2')) {
            if (isset($_FILES['i_ma_field2']) && isset($_FILES['i_ma_field2']['tmp_name']) && !empty($_FILES['i_ma_field2']['tmp_name'])) {
                if ($error = ImageManager::validateUpload($_FILES['i_ma_field2'], Tools::convertBytes(ini_get('upload_max_filesize'))))

                    $errors .= $error;

                else {

                    Configuration::updateValue('RTC_I_MA_EXT', substr($_FILES['i_ma_field2']['name'], strrpos($_FILES['i_ma_field2']['name'], '.') + 1));

                    if (Shop::getContext() == Shop::CONTEXT_SHOP)
                        $adv_imgname = 'icons-myaccount'.'-'.(int)$this->context->shop->getContextShopID();

                    if (!move_uploaded_file($_FILES['i_ma_field2']['tmp_name'], _PS_MODULE_DIR_ . $this -> name . '/upload/' . $adv_imgname . '.' . Configuration::get('RTC_I_MA_EXT')))
                        $errors .= $this->l('Error move uploaded file');
                    $output .= '<div class="conf confirm">' . $this->l('Image uploaded') . '</div>';
                }
            }
        }
        if (Tools::isSubmit('i_ma_delete2')) {

            if (Shop::getContext() == Shop::CONTEXT_SHOP)
                $adv_imgname = 'icons-myaccount'.'-'.(int)$this->context->shop->getContextShopID();

            if (file_exists(_PS_MODULE_DIR_ . $this -> name . '/upload/'.$adv_imgname.'.' . Configuration::get('RTC_I_MA_EXT')))
                unlink(_PS_MODULE_DIR_ . $this -> name . '/upload/'.$adv_imgname.'.' . Configuration::get('RTC_I_MA_EXT'));
            Configuration::updateValue('RTC_I_MA_EXT', "");

            $output .= '<div class="conf confirm">' . $this->l('Image removed') . '</div>';

        }

        if (Tools::isSubmit('i_aut_button2')) {
            if (isset($_FILES['i_aut_field2']) && isset($_FILES['i_aut_field2']['tmp_name']) && !empty($_FILES['i_aut_field2']['tmp_name'])) {
                if ($error = ImageManager::validateUpload($_FILES['i_aut_field2'], Tools::convertBytes(ini_get('upload_max_filesize'))))

                    $errors .= $error;

                else {

                    Configuration::updateValue('RTC_I_AUT_EXT', substr($_FILES['i_aut_field2']['name'], strrpos($_FILES['i_aut_field2']['name'], '.') + 1));

                    if (Shop::getContext() == Shop::CONTEXT_SHOP)
                        $adv_imgname = 'icons-autentification'.'-'.(int)$this->context->shop->getContextShopID();

                    if (!move_uploaded_file($_FILES['i_aut_field2']['tmp_name'], _PS_MODULE_DIR_ . $this -> name . '/upload/' . $adv_imgname . '.' . Configuration::get('RTC_I_AUT_EXT')))
                        $errors .= $this->l('Error move uploaded file');
                    $output .= '<div class="conf confirm">' . $this->l('Image uploaded') . '</div>';
                }
            }
        }
        if (Tools::isSubmit('i_aut_delete2')) {

            if (Shop::getContext() == Shop::CONTEXT_SHOP)
                $adv_imgname = 'icons-autentification'.'-'.(int)$this->context->shop->getContextShopID();

            if (file_exists(_PS_MODULE_DIR_ . $this -> name . '/upload/'.$adv_imgname.'.' . Configuration::get('RTC_I_AUT_EXT')))
                unlink(_PS_MODULE_DIR_ . $this -> name . '/upload/'.$adv_imgname.'.' . Configuration::get('RTC_I_AUT_EXT'));
            Configuration::updateValue('RTC_I_AUT_EXT', "");

            $output .= '<div class="conf confirm">' . $this->l('Image removed') . '</div>';
        }
        if (Tools::isSubmit('pl_view_button2')) {
            if (isset($_FILES['pl_view_field2']) && isset($_FILES['pl_view_field2']['tmp_name']) && !empty($_FILES['pl_view_field2']['tmp_name'])) {
                if ($error = ImageManager::validateUpload($_FILES['pl_view_field2'], Tools::convertBytes(ini_get('upload_max_filesize'))))
                    $errors .= $error;
                else {
                    Configuration::updateValue('RTC_PL_VIEW_EXT', substr($_FILES['pl_view_field2']['name'], strrpos($_FILES['pl_view_field2']['name'], '.') + 1));

                    if (Shop::getContext() == Shop::CONTEXT_SHOP)
                        $adv_imgname = 'product_view'.'-'.(int)$this->context->shop->getContextShopID();

                    if (!move_uploaded_file($_FILES['pl_view_field2']['tmp_name'], _PS_MODULE_DIR_ . $this -> name . '/upload/' . $adv_imgname . '.' . Configuration::get('RTC_PL_VIEW_EXT')))
                        $errors .= $this->l('Error move uploaded file');
                    $output .= '<div class="conf confirm">' . $this->l('Image uploaded') . '</div>';
                }
            }
        }
        if (Tools::isSubmit('pl_view_delete2')) {

            if (Shop::getContext() == Shop::CONTEXT_SHOP)
                $adv_imgname = 'product_view'.'-'.(int)$this->context->shop->getContextShopID();

            if (file_exists(_PS_MODULE_DIR_ . $this -> name . '/upload/'.$adv_imgname.'.' . Configuration::get('RTC_PL_VIEW_EXT')))
                unlink(_PS_MODULE_DIR_ . $this -> name . '/upload/'.$adv_imgname.'.' . Configuration::get('RTC_PL_VIEW_EXT'));
            Configuration::updateValue('RTC_PL_VIEW_EXT', "");

            $output .= '<div class="conf confirm">' . $this->l('Image removed') . '</div>';
        }
        if (Tools::isSubmit('pl_gl_button2')) {
            if (isset($_FILES['pl_gl_field2']) && isset($_FILES['pl_gl_field2']['tmp_name']) && !empty($_FILES['pl_gl_field2']['tmp_name'])) {
                if ($error = ImageManager::validateUpload($_FILES['pl_gl_field2'], Tools::convertBytes(ini_get('upload_max_filesize'))))
                    $errors .= $error;
                else {
                    Configuration::updateValue('RTC_PL_GL_EXT', substr($_FILES['pl_gl_field2']['name'], strrpos($_FILES['pl_gl_field2']['name'], '.') + 1));

                    if (Shop::getContext() == Shop::CONTEXT_SHOP)
                        $adv_imgname = 'gridlist'.'-'.(int)$this->context->shop->getContextShopID();

                    if (!move_uploaded_file($_FILES['pl_gl_field2']['tmp_name'], _PS_MODULE_DIR_ . $this -> name . '/upload/' . $adv_imgname . '.' . Configuration::get('RTC_PL_GL_EXT')))
                        $errors .= $this->l('Error move uploaded file');
                    $output .= '<div class="conf confirm">' . $this->l('Image uploaded') . '</div>';
                }
            }
        }
        if (Tools::isSubmit('pl_gl_delete2')) {

            if (Shop::getContext() == Shop::CONTEXT_SHOP)
                $adv_imgname = 'gridlist'.'-'.(int)$this->context->shop->getContextShopID();

            if (file_exists(_PS_MODULE_DIR_ . $this -> name . '/upload/'.$adv_imgname.'.' . Configuration::get('RTC_PL_GL_EXT')))
                unlink(_PS_MODULE_DIR_ . $this -> name . '/upload/'.$adv_imgname.'.' . Configuration::get('RTC_PL_GL_EXT'));
            Configuration::updateValue('RTC_PL_GL_EXT', "");

            $output .= '<div class="conf confirm">' . $this->l('Image removed') . '</div>';
        }
        if (Tools::isSubmit('pl_wc_button2')) {
            if (isset($_FILES['pl_wc_field2']) && isset($_FILES['pl_wc_field2']['tmp_name']) && !empty($_FILES['pl_wc_field2']['tmp_name'])) {
                if ($error = ImageManager::validateUpload($_FILES['pl_wc_field2'], Tools::convertBytes(ini_get('upload_max_filesize'))))
                    $errors .= $error;
                else {
                    Configuration::updateValue('RTC_PL_WC_EXT', substr($_FILES['pl_wc_field2']['name'], strrpos($_FILES['pl_wc_field2']['name'], '.') + 1));

                    if (Shop::getContext() == Shop::CONTEXT_SHOP)
                        $adv_imgname = 'product_wishcomp'.'-'.(int)$this->context->shop->getContextShopID();

                    if (!move_uploaded_file($_FILES['pl_wc_field2']['tmp_name'], _PS_MODULE_DIR_ . $this -> name . '/upload/' . $adv_imgname . '.' . Configuration::get('RTC_PL_WC_EXT')))
                        $errors .= $this->l('Error move uploaded file');
                    $output .= '<div class="conf confirm">' . $this->l('Image uploaded') . '</div>';
                }
            }
        }
        if (Tools::isSubmit('pl_wc_delete2')) {

            if (Shop::getContext() == Shop::CONTEXT_SHOP)
                $adv_imgname = 'product_wishcomp'.'-'.(int)$this->context->shop->getContextShopID();

            if (file_exists(_PS_MODULE_DIR_ . $this -> name . '/upload/'.$adv_imgname.'.' . Configuration::get('RTC_PL_WC_EXT')))
                unlink(_PS_MODULE_DIR_ . $this -> name . '/upload/'.$adv_imgname.'.' . Configuration::get('RTC_PL_WC_EXT'));
            Configuration::updateValue('RTC_PL_WC_EXT', "");

            $output .= '<div class="conf confirm">' . $this->l('Image removed') . '</div>';
        }

        if (Tools::isSubmit('pp_use_button2')) {
            if (isset($_FILES['pp_use_field2']) && isset($_FILES['pp_use_field2']['tmp_name']) && !empty($_FILES['pp_use_field2']['tmp_name'])) {
                if ($error = ImageManager::validateUpload($_FILES['pp_use_field2'], Tools::convertBytes(ini_get('upload_max_filesize'))))
                    $errors .= $error;
                else {
                    Configuration::updateValue('RTC_PP_USE_EXT', substr($_FILES['pp_use_field2']['name'], strrpos($_FILES['pp_use_field2']['name'], '.') + 1));

                    if (Shop::getContext() == Shop::CONTEXT_SHOP)
                        $adv_imgname = 'product_useful'.'-'.(int)$this->context->shop->getContextShopID();

                    if (!move_uploaded_file($_FILES['pp_use_field2']['tmp_name'], _PS_MODULE_DIR_ . $this -> name . '/upload/' . $adv_imgname . '.' . Configuration::get('RTC_PP_USE_EXT')))
                        $errors .= $this->l('Error move uploaded file');
                    $output .= '<div class="conf confirm">' . $this->l('Image uploaded') . '</div>';
                }
            }
        }
        if (Tools::isSubmit('pp_use_delete2')) {

            if (Shop::getContext() == Shop::CONTEXT_SHOP)
                $adv_imgname = 'product_useful'.'-'.(int)$this->context->shop->getContextShopID();

            if (file_exists(_PS_MODULE_DIR_ . $this -> name . '/upload/'.$adv_imgname.'.' . Configuration::get('RTC_PP_USE_EXT')))
                unlink(_PS_MODULE_DIR_ . $this -> name . '/upload/'.$adv_imgname.'.' . Configuration::get('RTC_PP_USE_EXT'));
            Configuration::updateValue('RTC_PP_USE_EXT', "");

            $output .= '<div class="conf confirm">' . $this->l('Image removed') . '</div>';
        }
        if (Tools::isSubmit('s_lens_button2')) {
            if (isset($_FILES['s_lens_field2']) && isset($_FILES['s_lens_field2']['tmp_name']) && !empty($_FILES['s_lens_field2']['tmp_name'])) {
                if ($error = ImageManager::validateUpload($_FILES['s_lens_field2'], Tools::convertBytes(ini_get('upload_max_filesize'))))
                    $errors .= $error;
                else {
                    Configuration::updateValue('RTC_S_LENS_EXT', substr($_FILES['s_lens_field2']['name'], strrpos($_FILES['s_lens_field2']['name'], '.') + 1));

                    if (Shop::getContext() == Shop::CONTEXT_SHOP)
                        $adv_imgname = 'icons-lens'.'-'.(int)$this->context->shop->getContextShopID();

                    if (!move_uploaded_file($_FILES['s_lens_field2']['tmp_name'], _PS_MODULE_DIR_ . $this -> name . '/upload/' . $adv_imgname . '.' . Configuration::get('RTC_S_LENS_EXT')))
                        $errors .= $this->l('Error move uploaded file');
                    $output .= '<div class="conf confirm">' . $this->l('Image uploaded') . '</div>';
                }
            }
        }
        if (Tools::isSubmit('s_lens_delete2')) {

            if (Shop::getContext() == Shop::CONTEXT_SHOP)
                $adv_imgname = 'icons-lens'.'-'.(int)$this->context->shop->getContextShopID();

            if (file_exists(_PS_MODULE_DIR_ . $this -> name . '/upload/'.$adv_imgname.'.' . Configuration::get('RTC_S_LENS_EXT')))
                unlink(_PS_MODULE_DIR_ . $this -> name . '/upload/'.$adv_imgname.'.' . Configuration::get('RTC_S_LENS_EXT'));
            Configuration::updateValue('RTC_S_LENS_EXT', "");

            $output .= '<div class="conf confirm">' . $this->l('Image removed') . '</div>';
        }
        if (Tools::isSubmit('b_button2')) {
            if (isset($_FILES['b_field2']) && isset($_FILES['b_field2']['tmp_name']) && !empty($_FILES['b_field2']['tmp_name'])) {
                if ($error = ImageManager::validateUpload($_FILES['b_field2'], Tools::convertBytes(ini_get('upload_max_filesize'))))
                    $errors .= $error;
                else {
                    Configuration::updateValue('RTC_B_EXT', substr($_FILES['b_field2']['name'], strrpos($_FILES['b_field2']['name'], '.') + 1));

                    if (Shop::getContext() == Shop::CONTEXT_SHOP)
                        $adv_imgname = 'bread_home'.'-'.(int)$this->context->shop->getContextShopID();

                    if (!move_uploaded_file($_FILES['b_field2']['tmp_name'], _PS_MODULE_DIR_ . $this -> name . '/upload/' . $adv_imgname . '.' . Configuration::get('RTC_B_EXT')))
                        $errors .= $this->l('Error move uploaded file');
                    $output .= '<div class="conf confirm">' . $this->l('Image uploaded') . '</div>';
                }
            }
        }
        if (Tools::isSubmit('b_delete2')) {

            if (Shop::getContext() == Shop::CONTEXT_SHOP)
                $adv_imgname = 'bread_home'.'-'.(int)$this->context->shop->getContextShopID();

            if (file_exists(_PS_MODULE_DIR_ . $this -> name . '/upload/'.$adv_imgname.'.' . Configuration::get('RTC_B_EXT')))
                unlink(_PS_MODULE_DIR_ . $this -> name . '/upload/'.$adv_imgname.'.' . Configuration::get('RTC_B_EXT'));
            Configuration::updateValue('RTC_B_EXT', "");

            $output .= '<div class="conf confirm">' . $this->l('Image removed') . '</div>';
        }
        if (Tools::isSubmit('ip_tel_button2')) {
            if (isset($_FILES['ip_tel_field2']) && isset($_FILES['ip_tel_field2']['tmp_name']) && !empty($_FILES['ip_tel_field2']['tmp_name'])) {
                if ($error = ImageManager::validateUpload($_FILES['ip_tel_field2'], Tools::convertBytes(ini_get('upload_max_filesize'))))
                    $errors .= $error;
                else {
                    Configuration::updateValue('RTC_IP_TEL_EXT', substr($_FILES['ip_tel_field2']['name'], strrpos($_FILES['ip_tel_field2']['name'], '.') + 1));

                    if (Shop::getContext() == Shop::CONTEXT_SHOP)
                        $adv_imgname = 'icons-tel'.'-'.(int)$this->context->shop->getContextShopID();

                    if (!move_uploaded_file($_FILES['ip_tel_field2']['tmp_name'], _PS_MODULE_DIR_ . $this -> name . '/upload/' . $adv_imgname . '.' . Configuration::get('RTC_IP_TEL_EXT')))
                        $errors .= $this->l('Error move uploaded file');
                    $output .= '<div class="conf confirm">' . $this->l('Image uploaded') . '</div>';
                }
            }
        }
        if (Tools::isSubmit('ip_tel_delete2')) {

            if (Shop::getContext() == Shop::CONTEXT_SHOP)
                $adv_imgname = 'icons-tel'.'-'.(int)$this->context->shop->getContextShopID();

            if (file_exists(_PS_MODULE_DIR_ . $this -> name . '/upload/'.$adv_imgname.'.' . Configuration::get('RTC_IP_TEL_EXT')))
                unlink(_PS_MODULE_DIR_ . $this -> name . '/upload/'.$adv_imgname.'.' . Configuration::get('RTC_IP_TEL_EXT'));
            Configuration::updateValue('RTC_IP_TEL_EXT', "");

            $output .= '<div class="conf confirm">' . $this->l('Image removed') . '</div>';
        }
        if (Tools::isSubmit('ip_time_button2')) {
            if (isset($_FILES['ip_time_field2']) && isset($_FILES['ip_time_field2']['tmp_name']) && !empty($_FILES['ip_time_field2']['tmp_name'])) {
                if ($error = ImageManager::validateUpload($_FILES['ip_time_field2'], Tools::convertBytes(ini_get('upload_max_filesize'))))
                    $errors .= $error;
                else {
                    Configuration::updateValue('RTC_IP_TIME_EXT', substr($_FILES['ip_time_field2']['name'], strrpos($_FILES['ip_time_field2']['name'], '.') + 1));

                    if (Shop::getContext() == Shop::CONTEXT_SHOP)
                        $adv_imgname = 'icons-time'.'-'.(int)$this->context->shop->getContextShopID();

                    if (!move_uploaded_file($_FILES['ip_time_field2']['tmp_name'], _PS_MODULE_DIR_ . $this -> name . '/upload/' . $adv_imgname . '.' . Configuration::get('RTC_IP_TIME_EXT')))
                        $errors .= $this->l('Error move uploaded file');
                    $output .= '<div class="conf confirm">' . $this->l('Image uploaded') . '</div>';
                }
            }
        }
        if (Tools::isSubmit('ip_time_delete2')) {

            if (Shop::getContext() == Shop::CONTEXT_SHOP)
                $adv_imgname = 'icons-time'.'-'.(int)$this->context->shop->getContextShopID();

            if (file_exists(_PS_MODULE_DIR_ . $this -> name . '/upload/'.$adv_imgname.'.' . Configuration::get('RTC_IP_TIME_EXT')))
                unlink(_PS_MODULE_DIR_ . $this -> name . '/upload/'.$adv_imgname.'.' . Configuration::get('RTC_IP_TIME_EXT'));
            Configuration::updateValue('RTC_IP_TIME_EXT', "");

            $output .= '<div class="conf confirm">' . $this->l('Image removed') . '</div>';
        }
        if (Tools::isSubmit('ip_truck_button2')) {
            if (isset($_FILES['ip_truck_field2']) && isset($_FILES['ip_truck_field2']['tmp_name']) && !empty($_FILES['ip_truck_field2']['tmp_name'])) {
                if ($error = ImageManager::validateUpload($_FILES['ip_truck_field2'], Tools::convertBytes(ini_get('upload_max_filesize'))))
                    $errors .= $error;
                else {
                    Configuration::updateValue('RTC_IP_TRUCK_EXT', substr($_FILES['ip_truck_field2']['name'], strrpos($_FILES['ip_truck_field2']['name'], '.') + 1));

                    if (Shop::getContext() == Shop::CONTEXT_SHOP)
                        $adv_imgname = 'icons-truck'.'-'.(int)$this->context->shop->getContextShopID();

                    if (!move_uploaded_file($_FILES['ip_truck_field2']['tmp_name'], _PS_MODULE_DIR_ . $this -> name . '/upload/' . $adv_imgname . '.' . Configuration::get('RTC_IP_TRUCK_EXT')))
                        $errors .= $this->l('Error move uploaded file');
                    $output .= '<div class="conf confirm">' . $this->l('Image uploaded') . '</div>';
                }
            }
        }
        if (Tools::isSubmit('ip_truck_delete2')) {

            if (Shop::getContext() == Shop::CONTEXT_SHOP)
                $adv_imgname = 'icons-truck'.'-'.(int)$this->context->shop->getContextShopID();

            if (file_exists(_PS_MODULE_DIR_ . $this -> name . '/upload/'.$adv_imgname.'.' . Configuration::get('RTC_IP_TRUCK_EXT')))
                unlink(_PS_MODULE_DIR_ . $this -> name . '/upload/'.$adv_imgname.'.' . Configuration::get('RTC_IP_TRUCK_EXT'));
            Configuration::updateValue('RTC_IP_TRUCK_EXT', "");

            $output .= '<div class="conf confirm">' . $this->l('Image removed') . '</div>';
        }

        if (Tools::isSubmit('ip_money_button2')) {
            if (isset($_FILES['ip_money_field2']) && isset($_FILES['ip_money_field2']['tmp_name']) && !empty($_FILES['ip_money_field2']['tmp_name'])) {
                if ($error = ImageManager::validateUpload($_FILES['ip_money_field2'], Tools::convertBytes(ini_get('upload_max_filesize'))))
                    $errors .= $error;
                else {
                    Configuration::updateValue('RTC_IP_MONEY_EXT', substr($_FILES['ip_money_field2']['name'], strrpos($_FILES['ip_money_field2']['name'], '.') + 1));

                    if (Shop::getContext() == Shop::CONTEXT_SHOP)
                        $adv_imgname = 'icons-money'.'-'.(int)$this->context->shop->getContextShopID();

                    if (!move_uploaded_file($_FILES['ip_money_field2']['tmp_name'], _PS_MODULE_DIR_ . $this -> name . '/upload/' . $adv_imgname . '.' . Configuration::get('RTC_IP_MONEY_EXT')))
                        $errors .= $this->l('Error move uploaded file');
                    $output .= '<div class="conf confirm">' . $this->l('Image uploaded') . '</div>';
                }
            }
        }
        if (Tools::isSubmit('ip_money_delete2')) {

            if (Shop::getContext() == Shop::CONTEXT_SHOP)
                $adv_imgname = 'icons-money'.'-'.(int)$this->context->shop->getContextShopID();

            if (file_exists(_PS_MODULE_DIR_ . $this -> name . '/upload/'.$adv_imgname.'.' . Configuration::get('RTC_IP_MONEY_EXT')))
                unlink(_PS_MODULE_DIR_ . $this -> name . '/upload/'.$adv_imgname.'.' . Configuration::get('RTC_IP_MONEY_EXT'));
            Configuration::updateValue('RTC_IP_MONEY_EXT', "");

            $output .= '<div class="conf confirm">' . $this->l('Image removed') . '</div>';
        }

        if (Tools::isSubmit('hp_button2')) {
            if (isset($_FILES['hp_field2']) && isset($_FILES['hp_field2']['tmp_name']) && !empty($_FILES['hp_field2']['tmp_name'])) {
                if ($error = ImageManager::validateUpload($_FILES['hp_field2'], Tools::convertBytes(ini_get('upload_max_filesize'))))
                    $errors .= $error;
                else {
                    Configuration::updateValue('RTC_HP_EXT', substr($_FILES['hp_field2']['name'], strrpos($_FILES['hp_field2']['name'], '.') + 1));

                    if (Shop::getContext() == Shop::CONTEXT_SHOP)
                        $adv_imgname = 'icons-homeproducts'.'-'.(int)$this->context->shop->getContextShopID();

                    if (!move_uploaded_file($_FILES['hp_field2']['tmp_name'], _PS_MODULE_DIR_ . $this -> name . '/upload/' . $adv_imgname . '.' . Configuration::get('RTC_HP_EXT')))
                        $errors .= $this->l('Error move uploaded file');
                    $output .= '<div class="conf confirm">' . $this->l('Image uploaded') . '</div>';
                }
            }
        }
        if (Tools::isSubmit('hp_delete2')) {

            if (Shop::getContext() == Shop::CONTEXT_SHOP)
                $adv_imgname = 'icons-homeproducts'.'-'.(int)$this->context->shop->getContextShopID();

            if (file_exists(_PS_MODULE_DIR_ . $this -> name . '/upload/'.$adv_imgname.'.' . Configuration::get('RTC_HP_EXT')))
                unlink(_PS_MODULE_DIR_ . $this -> name . '/upload/'.$adv_imgname.'.' . Configuration::get('RTC_HP_EXT'));
            Configuration::updateValue('RTC_HP_EXT', "");

            $output .= '<div class="conf confirm">' . $this->l('Image removed') . '</div>';
        }

        if (Tools::isSubmit('save_changes')) {
            Configuration::updateValue('RTC_F_HEADINGS', (string)(Tools::getValue("f_headings")));
            Configuration::updateValue('RTC_F_TEXT', (string)(Tools::getValue("f_text")));
            Configuration::updateValue('RTC_F_PRICE', (string)(Tools::getValue("f_price")));
            Configuration::updateValue('RTC_MAIN_BACKGROUND_COLOR', (string)(Tools::getValue("main_background_color")));
            Configuration::updateValue('RTC_TOP_LINE_BACKGROUND', (string)(Tools::getValue("top_line_background")));
            Configuration::updateValue('RTC_DESC_HEIGHT', (string)(Tools::getValue("desc_height")));
            Configuration::updateValue('NC_SUBCAT', (string)(Tools::getValue("nc_subcat")));
            Configuration::updateValue('NC_CAT', (string)(Tools::getValue("nc_cat")));
            Configuration::updateValue('RTC_BREADCRUMB', (string)(Tools::getValue("breadcrumb")));
            Configuration::updateValue('NC_LOADER', (string)(Tools::getValue("nc_loader")));
            Configuration::updateValue('RTC_UP_ARROW_BORDER', (string)(Tools::getValue("up_arrow_border")));
            Configuration::updateValue('RTC_UP_ARROW_COLOR', (string)(Tools::getValue("up_arrow_color")));
            Configuration::updateValue('RTC_CONTENT_BACKGROUND_COLOR', (string)(Tools::getValue("content_background_color")));
            Configuration::updateValue('RTC_BODY_BG_REPEAT', (int)(Tools::getValue("body_bg_repeat")));
            Configuration::updateValue('RTC_BODY_BG_POSITION', (int)(Tools::getValue("body_bg_position")));
            Configuration::updateValue('RTC_BODY_BG_FIXED', (int)(Tools::getValue("body_bg_fixed")));
            Configuration::updateValue('RTC_BODY_BG_PATTERN', (string)(Tools::getValue("body_bg_pattern")));
            Configuration::updateValue('RTC_GRADIENT_SCHEME', (string)(Tools::getValue("gradient_scheme")));
            Configuration::updateValue('RTC_TEXTURES', (string)(Tools::getValue("gradient_scheme")));
            Configuration::updateValue('RTC_DISPLAY_GRADIENT', (string)(Tools::getValue("display_gradient")));
            Configuration::updateValue('RTC_FONT_SIZE_BODY', (int)(Tools::getValue("font_size_body")));
            Configuration::updateValue('RTC_FONT_SIZE_MENU', (int)(Tools::getValue("font_size_menu")));
            Configuration::updateValue('RTC_FONT_SIZE_BUTTONS', (int)(Tools::getValue("font_size_buttons")));
            Configuration::updateValue('RTC_FONT_SIZE_PRICE', (int)(Tools::getValue("font_size_price")));
            Configuration::updateValue('RTC_MENU_LINE_BG', (string)(Tools::getValue("menu_line_bg")));
            Configuration::updateValue('RTC_MENU_LINE_BORDER', (string)(Tools::getValue("menu_line_border")));
            Configuration::updateValue('NC_G_BODY_TEXT', (string)(Tools::getValue("nc_g_body_text")));
            Configuration::updateValue('RTC_BRAND_BG', (string)(Tools::getValue("brand_bg")));
            Configuration::updateValue('RTC_BRAND_BORDER', (string)(Tools::getValue("brand_border")));
            Configuration::updateValue('RTC_G_BODY_LINK', (string)(Tools::getValue("g_body_link")));
            Configuration::updateValue('RTC_G_BODY_LINK_HOVER', (string)(Tools::getValue("g_body_link_hover")));
            Configuration::updateValue('RTC_G_TABLE_BG', (string)(Tools::getValue("g_table_bg")));
            Configuration::updateValue('RTC_G_TABLE_TITLE_BG', (string)(Tools::getValue("g_table_title_bg")));
            Configuration::updateValue('RTC_G_TABLE_TITLE_COLOR', (string)(Tools::getValue("g_table_title_color")));
            Configuration::updateValue('RTC_G_TABLE_TOTAL', (string)(Tools::getValue("g_table_total")));
            Configuration::updateValue('RTC_BOX', (string)(Tools::getValue("g_box")));
            Configuration::updateValue('RTC_BOX_TITLE', (string)(Tools::getValue("g_box_title")));
            Configuration::updateValue('RTC_BOX_TITLE_BORDER', (string)(Tools::getValue("g_box_title_border")));
            Configuration::updateValue('RTC_LABEL', (string)(Tools::getValue("g_label")));
            Configuration::updateValue('RTC_CHECKBOX_LABEL', (string)(Tools::getValue("g_checkbox_label")));
            Configuration::updateValue('RTC_INPUT_BG', (string)(Tools::getValue("g_input_bg")));
            Configuration::updateValue('RTC_INPUT_BORDER', (string)(Tools::getValue("g_input_border")));
            Configuration::updateValue('RTC_INPUT_COLOR', (string)(Tools::getValue("g_input_color")));
            Configuration::updateValue('RTC_FORM', (string)(Tools::getValue("g_form")));
            Configuration::updateValue('RTC_FORM_GREY', (string)(Tools::getValue("g_form_grey")));
            Configuration::updateValue('RTC_B_TEXT', (string)(Tools::getValue("b_text")));
            Configuration::updateValue('RTC_B_LINK', (string)(Tools::getValue("b_link")));
            Configuration::updateValue('RTC_B_LINK_HOVER', (string)(Tools::getValue("b_link_hover")));
            Configuration::updateValue('RTC_B_SEPARATOR', (string)(Tools::getValue("b_separator")));
            Configuration::updateValue('RTC_B_NORMAL_BG', (string)(Tools::getValue("b_normal_bg")));
            Configuration::updateValue('RTC_B_NORMAL_BORDER', (string)(Tools::getValue("b_normal_border")));
            Configuration::updateValue('RTC_B_NORMAL_BORDER_HOVER', (string)(Tools::getValue("b_normal_border_hover")));
            Configuration::updateValue('RTC_B_NORMAL_BG_HOVER', (string)(Tools::getValue("b_normal_bg_hover")));
            Configuration::updateValue('RTC_B_NORMAL_COLOR', (string)(Tools::getValue("b_normal_color")));
            Configuration::updateValue('RTC_B_NORMAL_COLOR_HOVER', (string)(Tools::getValue("b_normal_color_hover")));
            Configuration::updateValue('RTC_B_EX_BG', (string)(Tools::getValue("b_ex_bg")));
            Configuration::updateValue('RTC_B_EX_BORDER', (string)(Tools::getValue("b_ex_border")));
            Configuration::updateValue('RTC_B_EX_COLOR', (string)(Tools::getValue("b_ex_color")));
            Configuration::updateValue('RTC_CL_LABEL', (string)(Tools::getValue("cl_label")));
            Configuration::updateValue('RTC_CL_VALUE', (string)(Tools::getValue("cl_value")));
            Configuration::updateValue('RTC_BAN_TITLE', (string)(Tools::getValue("ban_title")));
            Configuration::updateValue('RTC_BAN_TEXT', (string)(Tools::getValue("ban_text")));
            Configuration::updateValue('RTC_BAN_BG', (string)(Tools::getValue("ban_bg")));
            Configuration::updateValue('RTC_BAN_BORDER', (string)(Tools::getValue("ban_border")));
            Configuration::updateValue('RTC_BAN_BUTTON', (string)(Tools::getValue("ban_button")));
            Configuration::updateValue('RTC_BAN_BUTTON_TEXT', (string)(Tools::getValue("ban_button_text")));
            Configuration::updateValue('RTC_CL_POPUP_BG', (string)(Tools::getValue("cl_popup_bg")));
            Configuration::updateValue('RTC_CL_POPUP_BORDER', (string)(Tools::getValue("cl_popup_border")));
            Configuration::updateValue('RTC_CL_POPUP_SHADOW', (string)(Tools::getValue("cl_popup_shadow")));
            Configuration::updateValue('RTC_BANNERS_ANIM', (string)(Tools::getValue("banners_anim")));
            Configuration::updateValue('NC_SECOND_IMG', (string)(Tools::getValue("nc_second_img")));
            Configuration::updateValue('RTC_CL_POPUP_ITEM', (string)(Tools::getValue("cl_popup_item")));
            Configuration::updateValue('RTC_CL_POPUP_ITEM_HOVER', (string)(Tools::getValue("cl_popup_item_hover")));
            Configuration::updateValue('RTC_CL_DISPLAY_CUR', (string)(Tools::getValue("cl_display_cur")));
            Configuration::updateValue('RTC_CL_DISPLAY_LAN', (string)(Tools::getValue("cl_display_lan")));
            Configuration::updateValue('RTC_TA_LINK', (string)(Tools::getValue("ta_link")));
            Configuration::updateValue('RTC_TA_LINK_HOVER', (string)(Tools::getValue("ta_link_hover")));
            Configuration::updateValue('RTC_TA_SEPARATOR', (string)(Tools::getValue("ta_separator")));
            Configuration::updateValue('RTC_TA_WELCOME', (string)(Tools::getValue("ta_welcome")));
            Configuration::updateValue('RTC_TA_NAME', (string)(Tools::getValue("ta_name")));
            Configuration::updateValue('RTC_IP_BG', (string)(Tools::getValue("ip_bg")));
            Configuration::updateValue('RTC_IP_ANIM', (string)(Tools::getValue("ip_anim")));
            Configuration::updateValue('RTC_IP_BORDER', (string)(Tools::getValue("ip_border")));
            Configuration::updateValue('RTC_IP_TITLE', (string)(Tools::getValue("ip_title")));
            Configuration::updateValue('RTC_IP_TEXT', (string)(Tools::getValue("ip_text")));
            Configuration::updateValue('RTC_SLIDER_MODE', (string)(Tools::getValue("slider_mode")));
            Configuration::updateValue('RTC_DISPLAY_ROUND', (string)(Tools::getValue("display_round")));
            Configuration::updateValue('RTC_CON_BG', (string)(Tools::getValue("con_bg")));
            Configuration::updateValue('RTC_CON_BORDER', (string)(Tools::getValue("con_border")));
            Configuration::updateValue('RTC_CON_COLOR', (string)(Tools::getValue("con_color")));
            Configuration::updateValue('RTC_S_CON_BG', (string)(Tools::getValue("s_con_bg")));
            Configuration::updateValue('RTC_S_CON_BORDER', (string)(Tools::getValue("s_con_border")));
            Configuration::updateValue('RTC_S_CON_COLOR', (string)(Tools::getValue("s_con_color")));
            Configuration::updateValue('RTC_CON_BG_HOVER', (string)(Tools::getValue("con_bg_hover")));
            Configuration::updateValue('RTC_CON_BORDER_HOVER', (string)(Tools::getValue("con_border_hover")));
            Configuration::updateValue('RTC_CON_COLOR_HOVER', (string)(Tools::getValue("con_color_hover")));
            Configuration::updateValue('RTC_HP_TITLE', (string)(Tools::getValue("hp_title")));
            Configuration::updateValue('RTC_HP_TITLE_HOVER', (string)(Tools::getValue("hp_title_hover")));
            Configuration::updateValue('RTC_DISPLAY_FEATURED', (string)(Tools::getValue("display_featured")));
            Configuration::updateValue('RTC_DISPLAY_NEW', (string)(Tools::getValue("display_new")));
            Configuration::updateValue('RTC_DISPLAY_BEST', (string)(Tools::getValue("display_best")));
            Configuration::updateValue('RTC_BOTTOM_SECTION', (string)(Tools::getValue("bottom_section")));
            Configuration::updateValue('NC_BOTTOM_SECTION_OTHER', (string)(Tools::getValue("nc_bottom_section_other")));
            Configuration::updateValue('NC_BOTTOM_SECTION_SW', (string)(Tools::getValue("nc_bottom_section_sw")));
            Configuration::updateValue('RTC_MA_REQUIRED', (string)(Tools::getValue("ma_required")));
            Configuration::updateValue('RTC_MA_TITLE', (string)(Tools::getValue("ma_title")));
            Configuration::updateValue('RTC_MA_TITLE_HOVER', (string)(Tools::getValue("ma_title_hover")));
            Configuration::updateValue('RTC_MA_ICON', (string)(Tools::getValue("ma_icon")));
            Configuration::updateValue('RTC_MA_ICON_BORDER', (string)(Tools::getValue("ma_icon_border")));
            Configuration::updateValue('RTC_MA_ICON_BORDER_HOVER', (string)(Tools::getValue("ma_icon_border_hover")));
            Configuration::updateValue('RTC_MA_ICON_HOVER', (string)(Tools::getValue("ma_icon_hover")));
            Configuration::updateValue('RTC_MA_FOOTER_SEPARATOR', (string)(Tools::getValue("ma_footer_separator")));
            Configuration::updateValue('RTC_O_NUMBER_BG', (string)(Tools::getValue("o_number_bg")));
            Configuration::updateValue('RTC_O_NUMBER_BORDER', (string)(Tools::getValue("o_number_border")));
            Configuration::updateValue('RTC_O_NUMBER_BORDER_ACTIVE', (string)(Tools::getValue("o_number_border_active")));
            Configuration::updateValue('RTC_O_NUMBER_BORDER_DONE', (string)(Tools::getValue("o_number_border_done")));
            Configuration::updateValue('RTC_O_NUMBER_BORDER_DONE_HOVER', (string)(Tools::getValue("o_number_border_done_hover")));
            Configuration::updateValue('RTC_O_NUMBER_COLOR', (string)(Tools::getValue("o_number_color")));
            Configuration::updateValue('RTC_O_NUMBER_TITLE', (string)(Tools::getValue("o_number_title")));
            Configuration::updateValue('RTC_O_NUMBER_BG_ACTIVE', (string)(Tools::getValue("o_number_bg_active")));
            Configuration::updateValue('RTC_O_NUMBER_COLOR_ACTIVE', (string)(Tools::getValue("o_number_color_active")));
            Configuration::updateValue('RTC_O_NUMBER_TITLE_ACTIVE', (string)(Tools::getValue("o_number_title_active")));
            Configuration::updateValue('RTC_O_NUMBER_BG_DONE', (string)(Tools::getValue("o_number_bg_done")));
            Configuration::updateValue('RTC_O_NUMBER_COLOR_DONE', (string)(Tools::getValue("o_number_color_done")));
            Configuration::updateValue('RTC_O_NUMBER_TITLE_DONE', (string)(Tools::getValue("o_number_title_done")));
            Configuration::updateValue('RTC_O_NUMBER_BG_DONE_HOVER', (string)(Tools::getValue("o_number_bg_done_hover")));
            Configuration::updateValue('RTC_O_NUMBER_COLOR_DONE_HOVER', (string)(Tools::getValue("o_number_color_done_hover")));
            Configuration::updateValue('RTC_O_NUMBER_TITLE_DONE_HOVER', (string)(Tools::getValue("o_number_title_done_hover")));
            Configuration::updateValue('RTC_O_IMG_BORDER', (string)(Tools::getValue("o_img_border")));
            Configuration::updateValue('RTC_O_PRODUCT_NAME', (string)(Tools::getValue("o_product_name")));
            Configuration::updateValue('RTC_O_PRODUCT_ATTS', (string)(Tools::getValue("o_product_atts")));
            Configuration::updateValue('RTC_O_REMOVE', (string)(Tools::getValue("o_remove")));
            Configuration::updateValue('RTC_O_REMOVE_HOVER', (string)(Tools::getValue("o_remove_hover")));
            Configuration::updateValue('RTC_O_TOTAL_TITLE', (string)(Tools::getValue("o_total_title")));
            Configuration::updateValue('RTC_O_TOTAL_PRICE', (string)(Tools::getValue("o_total_price")));
            Configuration::updateValue('RTC_O_DEL_TITLE', (string)(Tools::getValue("o_del_title")));
            Configuration::updateValue('RTC_O_DEL_ITEM_BG', (string)(Tools::getValue("o_del_item_bg")));
            Configuration::updateValue('RTC_O_DEL_ITEM_TEXT', (string)(Tools::getValue("o_del_item_text")));
            Configuration::updateValue('RTC_O_PAY_ITEM_BG', (string)(Tools::getValue("o_pay_item_bg")));
            Configuration::updateValue('NC_O_PAY_ITEM_BG_HOVER', (string)(Tools::getValue("nc_o_pay_item_bg_hover")));
            Configuration::updateValue('NC_O_PAY_ITEM_C_HOVER', (string)(Tools::getValue("nc_o_pay_item_c_hover")));
            Configuration::updateValue('NC_F_UNDERLINE', (string)(Tools::getValue("nc_f_underline")));
            Configuration::updateValue('RTC_O_PAY_ITEM_TITLE', (string)(Tools::getValue("o_pay_item_title")));
            Configuration::updateValue('RTC_O_PAY_ITEM_DESC', (string)(Tools::getValue("o_pay_item_desc")));
            Configuration::updateValue('RTC_O_PAY_ITEM_CHEVRON', (string)(Tools::getValue("o_pay_item_chevron")));
            Configuration::updateValue('RTC_BL_BG', (string)(Tools::getValue("bl_bg")));
            Configuration::updateValue('RTC_BL_HEADING', (string)(Tools::getValue("bl_heading")));
            Configuration::updateValue('RTC_BL_DATE', (string)(Tools::getValue("bl_date")));
            Configuration::updateValue('RTC_BL_BORDER', (string)(Tools::getValue("bl_border")));
            Configuration::updateValue('RTC_BL_MARK', (string)(Tools::getValue("bl_mark")));
            Configuration::updateValue('RTC_BL_RM_COLOR', (string)(Tools::getValue("bl_rm_color")));
            Configuration::updateValue('RTC_BL_RM_BG', (string)(Tools::getValue("bl_rm_bg")));
            Configuration::updateValue('RTC_BL_RM_BORDER', (string)(Tools::getValue("bl_rm_border")));
            Configuration::updateValue('RTC_BL_RM_BG_ICON', (string)(Tools::getValue("bl_rm_bg_icon")));
            Configuration::updateValue('RTC_BL_RM_BORDER_ICON', (string)(Tools::getValue("bl_rm_border_icon")));
            Configuration::updateValue('RTC_BL_RM_BG_HOVER', (string)(Tools::getValue("bl_rm_bg_hover")));
            Configuration::updateValue('RTC_BL_RM_BORDER_HOVER', (string)(Tools::getValue("bl_rm_border_hover")));
            Configuration::updateValue('RTC_BL_RM_HOVER', (string)(Tools::getValue("bl_rm_hover")));
            Configuration::updateValue('RTC_BL_TITLE', (string)(Tools::getValue("bl_title")));
            Configuration::updateValue('RTC_BL_TITLE_HOVER', (string)(Tools::getValue("bl_title_hover")));
            Configuration::updateValue('RTC_BL_BG_CONTENT', (string)(Tools::getValue("bl_bg_content")));
            Configuration::updateValue('RTC_BL_META', (string)(Tools::getValue("bl_meta")));
            Configuration::updateValue('RTC_BL_COM_BG', (string)(Tools::getValue("bl_com_bg")));
            Configuration::updateValue('RTC_BL_COM_NAME', (string)(Tools::getValue("bl_com_name")));
            Configuration::updateValue('RTC_MENU_BORDER', (string)(Tools::getValue("menu_border")));
            Configuration::updateValue('RTC_MENU_INPUT_BG', (string)(Tools::getValue("menu_input_bg")));
            Configuration::updateValue('RTC_MENU_LINK_BG_COLOR', (string)(Tools::getValue("menu_link_bg_color")));
            Configuration::updateValue('RTC_MENU_LINK_BG_HOVER', (string)(Tools::getValue("menu_link_bg_hover")));
            Configuration::updateValue('RTC_MENU_LINK_BG_ACTIVE', (string)(Tools::getValue("menu_link_bg_active")));
            Configuration::updateValue('RTC_MENU_LINK_BORDER_COLOR', (string)(Tools::getValue("menu_link_border_color")));
            Configuration::updateValue('RTC_MENU_LINK_BORDER_HOVER', (string)(Tools::getValue("menu_link_border_hover")));
            Configuration::updateValue('RTC_MENU_LINK_BORDER_ACTIVE', (string)(Tools::getValue("menu_link_border_active")));
            Configuration::updateValue('RTC_MENU_LINK_COLOR', (string)(Tools::getValue("menu_link_color")));
            Configuration::updateValue('RTC_MENU_LINK_ACTIVE', (string)(Tools::getValue("menu_link_active")));
            Configuration::updateValue('RTC_MENU_HOVER_COLOR', (string)(Tools::getValue("menu_hover_color")));
            Configuration::updateValue('RTC_SUBMENU_BG_COLOR', (string)(Tools::getValue("submenu_bg_color")));
            Configuration::updateValue('RTC_SUBMENU_SHADOW', (string)(Tools::getValue("submenu_shadow")));
            Configuration::updateValue('NC_STICKY_MENU', (string)(Tools::getValue("nc_sticky_menu")));
            Configuration::updateValue('RTC_SUBMENU_LINK_COLOR', (string)(Tools::getValue("submenu_link_color")));
            Configuration::updateValue('NC_ST_UP', (string)(Tools::getValue("nc_st_up")));
            Configuration::updateValue('NC_ST_UP_BG', (string)(Tools::getValue("nc_st_up_bg")));
            Configuration::updateValue('NC_ST_UP_BORDER', (string)(Tools::getValue("nc_st_up_border")));
            Configuration::updateValue('RTC_SUBMENU_HOVER_COLOR', (string)(Tools::getValue("submenu_hover_color")));
            Configuration::updateValue('RTC_SUBMENU_BEFORE_LINE', (string)(Tools::getValue("submenu_before_line")));
            Configuration::updateValue('RTC_SUBMENU_BORDER_TOP', (string)(Tools::getValue("submenu_border_top")));
            Configuration::updateValue('RTC_SEARCH_BOX_BG', (string)(Tools::getValue("search_box_bg")));
            Configuration::updateValue('RTC_SEARCH_BORDER', (string)(Tools::getValue("search_border")));
            Configuration::updateValue('NC_SEARCH_BORDER_BUT', (string)(Tools::getValue("nc_search_border_but")));
            Configuration::updateValue('RTC_SEARCH_INPUT_COLOR', (string)(Tools::getValue("search_input_color")));
            Configuration::updateValue('RTC_SEARCH_BUTTON', (string)(Tools::getValue("search_button")));
            Configuration::updateValue('RTC_SEARCH_POPUP_BG', (string)(Tools::getValue("search_popup_bg")));
            Configuration::updateValue('RTC_SEARCH_POPUP_BORDER', (string)(Tools::getValue("search_popup_border")));
            Configuration::updateValue('RTC_SEARCH_SHADOW', (string)(Tools::getValue("search_shadow")));
            Configuration::updateValue('RTC_SEARCH_ITEM_BG', (string)(Tools::getValue("search_item_bg")));
            Configuration::updateValue('RTC_SEARCH_ITEM_BG_HOVER', (string)(Tools::getValue("search_item_bg_hover")));
            Configuration::updateValue('RTC_SIDEBAR_TITLE_BG', (string)(Tools::getValue("sidebar_title_bg")));
            Configuration::updateValue('RTC_SIDEBAR_TITLE_BORDER', (string)(Tools::getValue("sidebar_title_border")));
            Configuration::updateValue('RTC_SIDEBAR_TITLE_COLOR', (string)(Tools::getValue("sidebar_title_color")));
            Configuration::updateValue('RTC_SIDEBAR_TITLE_LINK', (string)(Tools::getValue("sidebar_title_link")));
            Configuration::updateValue('RTC_SIDEBAR_TITLE_LINK_HOVER', (string)(Tools::getValue("sidebar_title_link_hover")));
            Configuration::updateValue('RTC_SIDEBAR_BLOCK_CONTENT_BG', (string)(Tools::getValue("sidebar_block_content_bg")));
            Configuration::updateValue('RTC_SIDEBAR_BLOCK_CONTENT_BORDER', (string)(Tools::getValue("sidebar_block_content_border")));
            Configuration::updateValue('RTC_SIDEBAR_BLOCK_TEXT_COLOR', (string)(Tools::getValue("sidebar_block_text_color")));
            Configuration::updateValue('RTC_SIDEBAR_BLOCK_LINK', (string)(Tools::getValue("sidebar_block_link")));
            Configuration::updateValue('RTC_SIDEBAR_BLOCK_LINK_HOVER', (string)(Tools::getValue("sidebar_block_link_hover")));
            Configuration::updateValue('RTC_SIDEBAR_BUTTON_BG', (string)(Tools::getValue("sidebar_button_bg")));
            Configuration::updateValue('RTC_SIDEBAR_BUTTON_BORDER', (string)(Tools::getValue("sidebar_button_border")));
            Configuration::updateValue('RTC_SIDEBAR_BUTTON_COLOR', (string)(Tools::getValue("sidebar_button_color")));
            Configuration::updateValue('RTC_SIDEBAR_ITEM_SEPARATOR', (string)(Tools::getValue("sidebar_item_separator")));
            Configuration::updateValue('RTC_SIDEBAR_PRODUCT_IMG_BORDER', (string)(Tools::getValue("sidebar_product_img_border")));
            Configuration::updateValue('RTC_SIDEBAR_CATEGORIES_ITEM', (string)(Tools::getValue("sidebar_categories_item")));
            Configuration::updateValue('RTC_SIDEBAR_CATEGORIES_ITEM_HOVER', (string)(Tools::getValue("sidebar_categories_item_hover")));
            Configuration::updateValue('RTC_SIDEBAR_CATEGORIES_SEPARATOR', (string)(Tools::getValue("sidebar_categories_separator")));
            Configuration::updateValue('RTC_CMS_TITLE', (string)(Tools::getValue("cms_title")));
            Configuration::updateValue('RTC_CMS_TITLE_BORDER', (string)(Tools::getValue("cms_title_border")));
            Configuration::updateValue('RTC_CMS_TITLE_BORDER_MARK', (string)(Tools::getValue("cms_title_border_mark")));
            Configuration::updateValue('RTC_PAGE_TEXT_COLOR', (string)(Tools::getValue("page_text_color")));
            Configuration::updateValue('RTC_PAGE_HEADINGS', (string)(Tools::getValue("page_headings")));
            Configuration::updateValue('RTC_PAGE_LINK', (string)(Tools::getValue("page_link")));
            Configuration::updateValue('RTC_PAGE_LINK_HOVER', (string)(Tools::getValue("page_link_hover")));
            Configuration::updateValue('RTC_CONTACT_FORM_BG', (string)(Tools::getValue("contact_form_bg")));
            Configuration::updateValue('RTC_CONTACT_FORM_BORDER', (string)(Tools::getValue("contact_form_border")));
            Configuration::updateValue('RTC_WARNING_MESSAGE_BG', (string)(Tools::getValue("warning_message_bg")));
            Configuration::updateValue('RTC_WARNING_MESSAGE_COLOR', (string)(Tools::getValue("warning_message_color")));
            Configuration::updateValue('RTC_SUCCESS_MESSAGE_BG', (string)(Tools::getValue("success_message_bg")));
            Configuration::updateValue('RTC_SUCCESS_MESSAGE_COLOR', (string)(Tools::getValue("success_message_color")));
            Configuration::updateValue('RTC_INFO_MESSAGE_BG', (string)(Tools::getValue("info_message_bg")));
            Configuration::updateValue('RTC_INFO_MESSAGE_COLOR', (string)(Tools::getValue("info_message_color")));
            Configuration::updateValue('RTC_DANGER_MESSAGE_BG', (string)(Tools::getValue("danger_message_bg")));
            Configuration::updateValue('RTC_DANGER_MESSAGE_COLOR', (string)(Tools::getValue("danger_message_color")));
            Configuration::updateValue('RTC_PL_HEADING_COLOR', (string)(Tools::getValue("pl_heading_color")));
            Configuration::updateValue('RTC_PL_HEADING_TEXT', (string)(Tools::getValue("pl_heading_text")));
            Configuration::updateValue('RTC_PL_NAV_TOP_BG', (string)(Tools::getValue("pl_nav_top_bg")));
            Configuration::updateValue('RTC_PL_NAV_TOP_BORDER', (string)(Tools::getValue("pl_nav_top_border")));
            Configuration::updateValue('RTC_PL_NAV_GRID', (string)(Tools::getValue("pl_nav_grid")));
            Configuration::updateValue('RTC_PL_NAV_COMPARE_BORDER', (string)(Tools::getValue("pl_nav_compare_border")));
            Configuration::updateValue('RTC_PL_NAV_SORT', (string)(Tools::getValue("pl_nav_sort")));
            Configuration::updateValue('RTC_PL_NUMBER_BG', (string)(Tools::getValue("pl_number_bg")));
            Configuration::updateValue('RTC_PL_NUMBER_BG_HOVER', (string)(Tools::getValue("pl_number_bg_hover")));
            Configuration::updateValue('RTC_PL_NUMBER_COLOR', (string)(Tools::getValue("pl_number_color")));
            Configuration::updateValue('RTC_PL_NUMBER_COLOR_HOVER', (string)(Tools::getValue("pl_number_color_hover")));
            Configuration::updateValue('RTC_PL_PAG_NAV_BG', (string)(Tools::getValue("pl_pag_nav_bg")));
            Configuration::updateValue('RTC_PL_PAG_NAV_BG_HOVER', (string)(Tools::getValue("pl_pag_nav_bg_hover")));
            Configuration::updateValue('RTC_PL_PAG_NAV_COLOR', (string)(Tools::getValue("pl_pag_nav_color")));
            Configuration::updateValue('RTC_PL_PAG_NAV_COLOR_HOVER', (string)(Tools::getValue("pl_pag_nav_color_hover")));
            Configuration::updateValue('RTC_PL_PAG_ACTIVE_BG', (string)(Tools::getValue("pl_pag_active_bg")));
            Configuration::updateValue('RTC_PL_PAG_ACTIVE_COLOR', (string)(Tools::getValue("pl_pag_active_color")));
            Configuration::updateValue('RTC_PL_SHOW_PER_PAGE', (string)(Tools::getValue("pl_show_per_page")));
            Configuration::updateValue('RTC_PL_SHOW_ITEMS', (string)(Tools::getValue("pl_show_items")));
            Configuration::updateValue('RTC_PL_FILTER_SEPARATOR', (string)(Tools::getValue("pl_filter_separator")));
            Configuration::updateValue('RTC_PL_FILTER_RANGE', (string)(Tools::getValue("pl_filter_range")));
            Configuration::updateValue('RTC_PL_FILTER_RANGE_OUT', (string)(Tools::getValue("pl_filter_range_out")));
            Configuration::updateValue('RTC_PL_FILTER_HANDLE_BG', (string)(Tools::getValue("pl_filter_handle_bg")));
            Configuration::updateValue('RTC_PL_FILTER_HANDLE_BORDER', (string)(Tools::getValue("pl_filter_handle_border")));
            Configuration::updateValue('RTC_PL_ITEM_BG', (string)(Tools::getValue("pl_item_bg")));
            Configuration::updateValue('RTC_PL_ITEM_BORDER', (string)(Tools::getValue("pl_item_border")));
            Configuration::updateValue('RTC_PL_PRODUCT_NAME', (string)(Tools::getValue("pl_product_name")));
            Configuration::updateValue('RTC_PL_PRODUCT_PRICE', (string)(Tools::getValue("pl_product_price")));
            Configuration::updateValue('RTC_PL_PRODUCT_OLDPRICE', (string)(Tools::getValue("pl_product_oldprice")));
            Configuration::updateValue('RTC_PL_PRODUCT_PERCENT', (string)(Tools::getValue("pl_product_percent")));
            Configuration::updateValue('RTC_PL_PRODUCT_PERCENT_BG', (string)(Tools::getValue("pl_product_percent_bg")));
            Configuration::updateValue('RTC_PL_PRODUCT_CART', (string)(Tools::getValue("pl_product_cart")));
            Configuration::updateValue('RTC_PL_PRODUCT_CART_BORDER', (string)(Tools::getValue("pl_product_cart_border")));
            Configuration::updateValue('RTC_PL_PRODUCT_CART_COLOR', (string)(Tools::getValue("pl_product_cart_color")));
            Configuration::updateValue('RTC_PL_PRODUCT_CART_ACTIVE', (string)(Tools::getValue("pl_product_cart_active")));
            Configuration::updateValue('RTC_PL_PRODUCT_CART_ACTIVE_BORDER', (string)(Tools::getValue("pl_product_cart_active_border")));
            Configuration::updateValue('RTC_PL_PRODUCT_CART_ACTIVE_COLOR', (string)(Tools::getValue("pl_product_cart_active_color")));
            Configuration::updateValue('RTC_PL_PRODUCT_CART_HOVER', (string)(Tools::getValue("pl_product_cart_hover")));
            Configuration::updateValue('RTC_PL_PRODUCT_CART_HOVER_BORDER', (string)(Tools::getValue("pl_product_cart_hover_border")));
            Configuration::updateValue('RTC_PL_PRODUCT_CART_HOVER_COLOR', (string)(Tools::getValue("pl_product_cart_hover_color")));
            Configuration::updateValue('RTC_PL_PRODUCT_QUICKVIEW', (string)(Tools::getValue("pl_product_quickview")));
            Configuration::updateValue('RTC_PL_PRODUCT_QUICKVIEW_HOVER', (string)(Tools::getValue("pl_product_quickview_hover")));
            Configuration::updateValue('RTC_PL_PRODUCT_QUICKVIEW_COLOR', (string)(Tools::getValue("pl_product_quickview_color")));
            Configuration::updateValue('RTC_PL_PRODUCT_VIEW_BORDER', (string)(Tools::getValue("pl_product_view_border")));
            Configuration::updateValue('RTC_PL_PRODUCT_VIEW_BORDER_HOVER', (string)(Tools::getValue("pl_product_view_border_hover")));
            Configuration::updateValue('RTC_PL_PRODUCT_COMPARE', (string)(Tools::getValue("pl_product_compare")));
            Configuration::updateValue('RTC_PL_PRODUCT_COMPARE_HOVER', (string)(Tools::getValue("pl_product_compare_hover")));
            Configuration::updateValue('RTC_PL_PRODUCT_COMPARE_ICON', (string)(Tools::getValue("pl_product_compare_icon")));
            Configuration::updateValue('RTC_PL_PRODUCT_COMPARE_ICON_ACTIVE', (string)(Tools::getValue("pl_product_compare_icon_active")));
            Configuration::updateValue('RTC_PL_PRODUCT_WISH_ICON', (string)(Tools::getValue("pl_product_wish_icon")));
            Configuration::updateValue('RTC_PL_PRODUCT_WISH_ICON_ACTIVE', (string)(Tools::getValue("pl_product_wish_icon_active")));
            Configuration::updateValue('RTC_PL_PRODUCT_NEW_BG', (string)(Tools::getValue("pl_product_new_bg")));
            Configuration::updateValue('RTC_PL_PRODUCT_NEW_BORDER', (string)(Tools::getValue("pl_product_new_border")));
            Configuration::updateValue('RTC_PL_PRODUCT_SALE_BORDER', (string)(Tools::getValue("pl_product_sale_border")));
            Configuration::updateValue('RTC_PL_PRODUCT_NEW_COLOR', (string)(Tools::getValue("pl_product_new_color")));
            Configuration::updateValue('RTC_PL_PRODUCT_SALE_BG', (string)(Tools::getValue("pl_product_sale_bg")));
            Configuration::updateValue('RTC_PL_PRODUCT_SALE_COLOR', (string)(Tools::getValue("pl_product_sale_color")));
            Configuration::updateValue('RTC_PL_PRODUCT_WHITE_GRAD', (string)(Tools::getValue("pl_product_white_grad")));
            Configuration::updateValue('RTC_PL_PRODUCT_QWTEXT', (string)(Tools::getValue("pl_product_qwtext")));
            Configuration::updateValue('RTC_PL_PRODUCT_DISPLAY_QUICKVIEW', (string)(Tools::getValue("pl_product_display_quickview")));
            Configuration::updateValue('RTC_PL_PRODUCT_DISPLAY_VIEW', (string)(Tools::getValue("pl_product_display_view")));
            Configuration::updateValue('RTC_PL_PRODUCT_DISPLAY_NEW', (string)(Tools::getValue("pl_product_display_new")));
            Configuration::updateValue('RTC_PL_PRODUCT_DISPLAY_SALE', (string)(Tools::getValue("pl_product_display_sale")));
            Configuration::updateValue('RTC_PL_LIST_IMG_BORDER', (string)(Tools::getValue("pl_list_img_border")));
            Configuration::updateValue('RTC_PL_LIST_BG', (string)(Tools::getValue("pl_list_bg")));
            Configuration::updateValue('RTC_PL_LIST_SEPARATOR', (string)(Tools::getValue("pl_list_separator")));
            Configuration::updateValue('RTC_PL_LIST_DESCRIPTION', (string)(Tools::getValue("pl_list_description")));
            Configuration::updateValue('RTC_C_LEFT_COLUMN', (string)(Tools::getValue("c_left_column")));
            Configuration::updateValue('RTC_C_RIGHT_COLUMN', (string)(Tools::getValue("c_right_column")));
            Configuration::updateValue('RTC_C_LEFT_COLOR', (string)(Tools::getValue("c_left_color")));
            Configuration::updateValue('RTC_C_RIGHT_COLOR', (string)(Tools::getValue("c_right_color")));
            Configuration::updateValue('RTC_C_IMG_BORDER', (string)(Tools::getValue("c_img_border")));
            Configuration::updateValue('RTC_C_REMOVE', (string)(Tools::getValue("c_remove")));
            Configuration::updateValue('RTC_C_REMOVE_HOVER', (string)(Tools::getValue("c_remove_hover")));
            Configuration::updateValue('RTC_PP_IMG_BORDER', (string)(Tools::getValue("pp_img_border")));
            Configuration::updateValue('RTC_PP_ICON_BORDER', (string)(Tools::getValue("pp_icon_border")));
            Configuration::updateValue('RTC_PP_ICON_BORDER_HOVER', (string)(Tools::getValue("pp_icon_border_hover")));
            Configuration::updateValue('RTC_PP_ICON_NAV_BG', (string)(Tools::getValue("pp_icon_nav_bg")));
            Configuration::updateValue('RTC_PP_ICON_NAV_BG_HOVER', (string)(Tools::getValue("pp_icon_nav_bg_hover")));
            Configuration::updateValue('RTC_PP_SOCIAL_BG', (string)(Tools::getValue("pp_social_bg")));
            Configuration::updateValue('RTC_PP_SOCIAL_COLOR', (string)(Tools::getValue("pp_social_color")));
            Configuration::updateValue('RTC_PP_USEFUL_COLOR', (string)(Tools::getValue("pp_useful_color")));
            Configuration::updateValue('RTC_PP_USEFUL_COLOR_HOVER', (string)(Tools::getValue("pp_useful_color_hover")));
            Configuration::updateValue('RTC_PP_USEFUL_ICON', (string)(Tools::getValue("pp_useful_icon")));
            Configuration::updateValue('RTC_PP_DISPLAY_SOCIAL', (string)(Tools::getValue("pp_display_social")));
            Configuration::updateValue('RTC_PP_DISPLAY_WISH', (string)(Tools::getValue("pp_display_wish")));
            Configuration::updateValue('RTC_PP_DISPLAY_SEND', (string)(Tools::getValue("pp_display_send")));
            Configuration::updateValue('RTC_PP_DISPLAY_PRINT', (string)(Tools::getValue("pp_display_print")));
            Configuration::updateValue('RTC_PP_NAME', (string)(Tools::getValue("pp_name")));
            Configuration::updateValue('RTC_PP_DESC', (string)(Tools::getValue("pp_desc")));
            Configuration::updateValue('RTC_PP_INFO_LABEL', (string)(Tools::getValue("pp_info_label")));
            Configuration::updateValue('RTC_PP_INFO_VALUE', (string)(Tools::getValue("pp_info_value")));
            Configuration::updateValue('RTC_PP_DISPLAY_REFER', (string)(Tools::getValue("pp_display_refer")));
            Configuration::updateValue('RTC_PP_DISPLAY_COND', (string)(Tools::getValue("pp_display_cond")));
            Configuration::updateValue('RTC_PP_DISPLAY_AVAIL', (string)(Tools::getValue("pp_display_avail")));
            Configuration::updateValue('RTC_PP_ATT_LABEL', (string)(Tools::getValue("pp_att_label")));
            Configuration::updateValue('RTC_PP_ATT_INPUT_BG', (string)(Tools::getValue("pp_att_input_bg")));
            Configuration::updateValue('RTC_PP_ATT_COLOR', (string)(Tools::getValue("pp_att_color")));
            Configuration::updateValue('RTC_PP_ATT_COLOR_ACTIVE', (string)(Tools::getValue("pp_att_color_active")));
            Configuration::updateValue('RTC_PP_ATT_QUAN_INPUT_BG', (string)(Tools::getValue("pp_att_quan_input_bg")));
            Configuration::updateValue('RTC_PP_ATT_QUAN_PM_BG', (string)(Tools::getValue("pp_att_quan_pm_bg")));
            Configuration::updateValue('RTC_PP_ATT_QUAN_PM_BG_HOVER', (string)(Tools::getValue("pp_att_quan_pm_bg_hover")));
            Configuration::updateValue('RTC_PP_ATT_QUAN_PM_COLOR', (string)(Tools::getValue("pp_att_quan_pm_color")));
            Configuration::updateValue('RTC_PP_ATT_QUAN_PM_COLOR_HOVER', (string)(Tools::getValue("pp_att_quan_pm_color_hover")));
            Configuration::updateValue('NC_PP_ADD_BG', (string)(Tools::getValue("nc_pp_add_bg")));
            Configuration::updateValue('NC_PP_ADD_BORDER', (string)(Tools::getValue("nc_pp_add_border")));
            Configuration::updateValue('NC_PP_ADD_COLOR', (string)(Tools::getValue("nc_pp_add_color")));
            Configuration::updateValue('RTC_PP_QW_BG', (string)(Tools::getValue("pp_qw_bg")));
            Configuration::updateValue('RTC_PP_PRICE_BOX', (string)(Tools::getValue("pp_price_box")));
            Configuration::updateValue('RTC_PP_PRICE_BORDER', (string)(Tools::getValue("pp_price_border")));
            Configuration::updateValue('RTC_PP_PRICE_SEPARATOR', (string)(Tools::getValue("pp_price_separator")));
            Configuration::updateValue('RTC_PP_PRICE_COLOR', (string)(Tools::getValue("pp_price_color")));
            Configuration::updateValue('RTC_PP_TABS_BG', (string)(Tools::getValue("pp_tabs_bg")));
            Configuration::updateValue('RTC_PP_TABS_BG_HOVER', (string)(Tools::getValue("pp_tabs_bg_hover")));
            Configuration::updateValue('RTC_PP_TABS_COLOR', (string)(Tools::getValue("pp_tabs_color")));
            Configuration::updateValue('RTC_PP_TABS_COLOR_HOVER', (string)(Tools::getValue("pp_tabs_color_hover")));
            Configuration::updateValue('RTC_PP_TABS_SHEETS_BG', (string)(Tools::getValue("pp_tabs_sheets_bg")));
            Configuration::updateValue('RTC_PP_TABS_SHEETS_COLOR', (string)(Tools::getValue("pp_tabs_sheets_color")));
            Configuration::updateValue('RTC_PP_TABS_TABLE_LEFT', (string)(Tools::getValue("pp_tabs_table_left")));
            Configuration::updateValue('RTC_PP_TABS_TABLE_RIGHT', (string)(Tools::getValue("pp_tabs_table_right")));
            Configuration::updateValue('RTC_PP_TABS_TABLE_LEFT_COLOR', (string)(Tools::getValue("pp_tabs_table_left_color")));
            Configuration::updateValue('RTC_PP_TABS_TABLE_RIGHT_COLOR', (string)(Tools::getValue("pp_tabs_table_right_color")));
            Configuration::updateValue('RTC_PP_REVIEWS_STARON', (string)(Tools::getValue("pp_reviews_staron")));
            Configuration::updateValue('RTC_PP_REVIEWS_STAROFF', (string)(Tools::getValue("pp_reviews_staroff")));
            Configuration::updateValue('RTC_PP_REVIEWS_NAME', (string)(Tools::getValue("pp_reviews_name")));
            Configuration::updateValue('RTC_PP_REVIEWS_DATE', (string)(Tools::getValue("pp_reviews_date")));
            Configuration::updateValue('RTC_PP_REVIEWS_NAME_SEPARATOR', (string)(Tools::getValue("pp_reviews_name_separator")));
            Configuration::updateValue('RTC_PP_REVIEWS_BLOCK_SEPARATOR', (string)(Tools::getValue("pp_reviews_block_separator")));
            Configuration::updateValue('RTC_PP_REVIEWS_DISPLAY_TOP', (string)(Tools::getValue("pp_reviews_display_top")));
            Configuration::updateValue('RTC_PP_REVIEWS_USEFUL', (string)(Tools::getValue("pp_reviews_useful")));
            Configuration::updateValue('RTC_PP_REVIEWS_REPORT', (string)(Tools::getValue("pp_reviews_report")));
            Configuration::updateValue('RTC_PP_REVIEWS_YN', (string)(Tools::getValue("pp_reviews_yn")));
            Configuration::updateValue('RTC_PP_REVIEWS_YN_BORDER', (string)(Tools::getValue("pp_reviews_yn_border")));
            Configuration::updateValue('RTC_PP_AC_NAME', (string)(Tools::getValue("pp_ac_name")));
            Configuration::updateValue('RTC_PP_AC_PRICE', (string)(Tools::getValue("pp_ac_price")));
            Configuration::updateValue('RTC_PP_AC_DESC', (string)(Tools::getValue("pp_ac_desc")));
            Configuration::updateValue('RTC_C_TITLE', (string)(Tools::getValue("c_title")));
            Configuration::updateValue('NC_C_TITLE_HOVER', (string)(Tools::getValue("nc_c_title_hover")));
            Configuration::updateValue('NC_SOLDOUT_BG', (string)(Tools::getValue("nc_soldout_bg")));
            Configuration::updateValue('NC_SOLDOUT_BORDER', (string)(Tools::getValue("nc_soldout_border")));
            Configuration::updateValue('NC_SOLDOUT_COLOR', (string)(Tools::getValue("nc_soldout_color")));
            Configuration::updateValue('RTC_C_PRODUCTS', (string)(Tools::getValue("c_products")));
            Configuration::updateValue('RTC_C_BG', (string)(Tools::getValue("c_bg")));
            Configuration::updateValue('RTC_C_BG_HOVER', (string)(Tools::getValue("c_bg_hover")));
            Configuration::updateValue('RTC_C_BORDER', (string)(Tools::getValue("c_border")));
            Configuration::updateValue('RTC_C_BG_ICON', (string)(Tools::getValue("c_bg_icon")));
            Configuration::updateValue('RTC_C_BORDER_ICON', (string)(Tools::getValue("c_border_icon")));
            Configuration::updateValue('RTC_C_DISPLAY_ARROW', (string)(Tools::getValue("c_display_arrow")));
            Configuration::updateValue('RTC_C_POPUP_BG', (string)(Tools::getValue("c_popup_bg")));
            Configuration::updateValue('RTC_C_POPUP_BORDER', (string)(Tools::getValue("c_popup_border")));
            Configuration::updateValue('RTC_C_POPUP_SHADOW', (string)(Tools::getValue("c_popup_shadow")));
            Configuration::updateValue('RTC_C_PRODUCT_Q', (string)(Tools::getValue("c_product_q")));
            Configuration::updateValue('RTC_C_PRODUCT_NAME', (string)(Tools::getValue("c_product_name")));
            Configuration::updateValue('RTC_C_PRODUCT_NAME_HOVER', (string)(Tools::getValue("c_product_name_hover")));
            Configuration::updateValue('RTC_C_PRODUCT_ATTS', (string)(Tools::getValue("c_product_atts")));
            Configuration::updateValue('RTC_C_PRODUCT_PRICE', (string)(Tools::getValue("c_product_price")));
            Configuration::updateValue('RTC_C_PRODUCT_REMOVE', (string)(Tools::getValue("c_product_remove")));
            Configuration::updateValue('RTC_C_PRODUCT_REMOVE_HOVER', (string)(Tools::getValue("c_product_remove_hover")));
            Configuration::updateValue('RTC_C_PRODUCT_SEPARATOR', (string)(Tools::getValue("c_product_separator")));
            Configuration::updateValue('RTC_C_PRODUCT_SUMMARY_BG', (string)(Tools::getValue("c_product_summary_bg")));
            Configuration::updateValue('RTC_C_PRODUCT_SUMMARY_TITLE', (string)(Tools::getValue("c_product_summary_title")));
            Configuration::updateValue('RTC_C_PRODUCT_SUMMARY_VALUE', (string)(Tools::getValue("c_product_summary_value")));
            Configuration::updateValue('RTC_C_SUMMARY_BORDER', (string)(Tools::getValue("c_summary_border")));
            Configuration::updateValue('RTC_LC_BG', (string)(Tools::getValue("lc_bg")));
            Configuration::updateValue('RTC_LC_V_SEPARATOR', (string)(Tools::getValue("lc_v_separator")));
            Configuration::updateValue('RTC_LC_H_SEPARATOR', (string)(Tools::getValue("lc_h_separator")));
            Configuration::updateValue('RTC_LC_SUCCESS_BG', (string)(Tools::getValue("lc_success_bg")));
            Configuration::updateValue('RTC_LC_SUCCESS_COLOR', (string)(Tools::getValue("lc_success_color")));
            Configuration::updateValue('RTC_LC_IMG_BORDER', (string)(Tools::getValue("lc_img_border")));
            Configuration::updateValue('RTC_LC_PRODUCT_NAME', (string)(Tools::getValue("lc_product_name")));
            Configuration::updateValue('RTC_LC_PRODUCT_ATTS', (string)(Tools::getValue("lc_product_atts")));
            Configuration::updateValue('RTC_LC_PRODUCT_ATTS_LABEL', (string)(Tools::getValue("lc_product_atts_label")));
            Configuration::updateValue('RTC_LC_IN_CART_BG', (string)(Tools::getValue("lc_in_cart_bg")));
            Configuration::updateValue('RTC_LC_IN_CART_COLOR', (string)(Tools::getValue("lc_in_cart_color")));
            Configuration::updateValue('RTC_LC_TOTAL_BG', (string)(Tools::getValue("lc_total_bg")));
            Configuration::updateValue('RTC_LC_TOTAL_LABEL', (string)(Tools::getValue("lc_total_label")));
            Configuration::updateValue('RTC_LC_TOTAL_COLOR', (string)(Tools::getValue("lc_total_color")));
            Configuration::updateValue('RTC_LC_CROSS_TITLE', (string)(Tools::getValue("lc_cross_title")));
            Configuration::updateValue('RTC_LC_CLOSE', (string)(Tools::getValue("lc_close")));
            Configuration::updateValue('RTC_LC_CLOSE_HOVER', (string)(Tools::getValue("lc_close_hover")));
            Configuration::updateValue('RTC_FOOTER_BACKGROUND_COLOR', (string)(Tools::getValue("footer_background_color")));
            Configuration::updateValue('RTC_FOOTER_TOP_LINE', (string)(Tools::getValue("footer_top_line")));
            Configuration::updateValue('RTC_FOOTER_TOP_LINE_HEADINGS', (string)(Tools::getValue("footer_top_line_headings")));
            Configuration::updateValue('RTC_NS_BORDER', (string)(Tools::getValue("ns_border")));
            Configuration::updateValue('RTC_FOOTER_NEWS_INPUT', (string)(Tools::getValue("footer_news_input")));
            Configuration::updateValue('NC_FOOTER_NEWS_BORDER', (string)(Tools::getValue("nc_footer_news_border")));
            Configuration::updateValue('NC_FOOTER_CI_BG', (string)(Tools::getValue("nc_footer_ci_bg")));
            Configuration::updateValue('NC_LOADER_COLOR', (string)(Tools::getValue("nc_loader_color")));
            Configuration::updateValue('RTC_FOOTER_NEWS_BUTTON', (string)(Tools::getValue("footer_news_button")));
            Configuration::updateValue('RTC_FOOTER_NEWS_BUTTON_BG', (string)(Tools::getValue("footer_news_button_bg")));
            Configuration::updateValue('RTC_FOOTER_NEWS_BUTTON_BORDER', (string)(Tools::getValue("footer_news_button_border")));
            Configuration::updateValue('RTC_FOOTER_NEWS_DISPLAY', (string)(Tools::getValue("footer_news_display")));
            Configuration::updateValue('RTC_FOOTER_SOCIAL_DISPLAY', (string)(Tools::getValue("footer_social_display")));
            Configuration::updateValue('NC_FOOTER_HEADINGS', (string)(Tools::getValue("nc_footer_headings")));
            Configuration::updateValue('RTC_FOOTER_TXT_COLOR', (string)(Tools::getValue("footer_txt_color")));
            Configuration::updateValue('RTC_FOOTER_LINK_COLOR', (string)(Tools::getValue("footer_link_color")));
            Configuration::updateValue('RTC_FOOTER_HOVER_COLOR', (string)(Tools::getValue("footer_hover_color")));
            Configuration::updateValue('RTC_FOOTER_ACCOUNT_DISC', (string)(Tools::getValue("footer_account_disc")));
            Configuration::updateValue('RTC_FOOTER_UP_BG', (string)(Tools::getValue("footer_up_bg")));
            Configuration::updateValue('RTC_FOOTER_UP_DISPLAY', (string)(Tools::getValue("footer_up_display")));
            Configuration::updateValue('RTC_FOOTER_CONTACT_DISPLAY', (string)(Tools::getValue("footer_contact_display")));
            Configuration::updateValue('RTC_FOOTER_ACCOUNT_DISPLAY', (string)(Tools::getValue("footer_account_display")));
            Configuration::updateValue('RTC_FOOTER_CATEGORIES_DISPLAY', (string)(Tools::getValue("footer_categories_display")));
            Configuration::updateValue('RTC_FOOTER_INFO_DISPLAY', (string)(Tools::getValue("footer_info_display")));
            Configuration::updateValue('RTC_FOOTER_BOTTOM_LINE', (string)(Tools::getValue("footer_bottom_line")));
            Configuration::updateValue('RTC_FOOTER_PAYMENT_DISPLAY', (string)(Tools::getValue("footer_payment_display")));
            Configuration::updateValue('RTC_FOOTER_PL_VISA', (string)(Tools::getValue("footer_pl_visa")));
            Configuration::updateValue('RTC_FOOTER_PL_MASTERCARD', (string)(Tools::getValue("footer_pl_mastercard")));
            Configuration::updateValue('RTC_FOOTER_PL_MAESTRO', (string)(Tools::getValue("footer_pl_maestro")));
            Configuration::updateValue('RTC_FOOTER_PL_DISCOVER', (string)(Tools::getValue("footer_pl_discover")));
            Configuration::updateValue('RTC_FOOTER_PL_PAYPAL', (string)(Tools::getValue("footer_pl_paypal")));
            Configuration::updateValue('RTC_FOOTER_COPYRIGHT_DISPLAY', (string)(Tools::getValue("footer_copyright_display")));
            Configuration::updateValue('RTC_FOOTER_BOTTOM_TEXT', (string)(Tools::getValue("footer_bottom_text")));
            Configuration::updateValue('RTC_LATIN_EXT', (int)(Tools::getValue("latin_ext")));
            Configuration::updateValue('RTC_CYRILLIC', (int)(Tools::getValue("cyrillic")));
            Configuration::updateValue('RTC_C_ARROW_COLOR', (string)(Tools::getValue("c_arrow_color")));
            Configuration::updateValue('NC_PP_ATT_RIGHT', (string)(Tools::getValue("nc_pp_att_right")));
            Configuration::updateValue('NC_LONG_PRICES', (string)(Tools::getValue("nc_long_prices")));
            Configuration::updateValue('NC_SHOW_IP', (string)(Tools::getValue("nc_show_ip")));
            Configuration::updateValue('NC_MAN_TEXT', (string)(Tools::getValue("nc_man_text")));
            Configuration::updateValue('NC_MAN_LOGO', (string)(Tools::getValue("nc_man_logo")));
            Configuration::updateValue('NC_RGRID', (string)(Tools::getValue("nc_rgrid")));
            Configuration::updateValue('NC_RNUM', (string)(Tools::getValue("nc_rnum")));
            Configuration::updateValue('NC_RTOP', (string)(Tools::getValue("nc_rtop")));
            Configuration::updateValue('NC_RBG', (string)(Tools::getValue("nc_rbg")));
            Configuration::updateValue('NC_RLIST', (string)(Tools::getValue("nc_rlist")));
            Configuration::updateValue('NC_RHIDE', (string)(Tools::getValue("nc_rhide")));
            Configuration::updateValue('NC_COUNT', (string)(Tools::getValue("nc_count")));
            Configuration::updateValue('NC_COUNT_DAYS', (string)(Tools::getValue("nc_count_days")));
            Configuration::updateValue('NC_COUNT_BG', (string)(Tools::getValue("nc_count_bg")));
            Configuration::updateValue('NC_COUNT_COLOR', (string)(Tools::getValue("nc_count_color")));
            Configuration::updateValue('NC_COUNT_SEP', (string)(Tools::getValue("nc_count_sep")));
            Configuration::updateValue('NC_COUNT_PR_TITLE', (string)(Tools::getValue("nc_count_pr_title")));
            Configuration::updateValue('NC_COUNT_PR_TITLEBG', (string)(Tools::getValue("nc_count_pr_titlebg")));
            Configuration::updateValue('NC_COUNT_PR_BG', (string)(Tools::getValue("nc_count_pr_bg")));
            Configuration::updateValue('NC_COUNT_PR_COLOR', (string)(Tools::getValue("nc_count_pr_color")));
            Configuration::updateValue('NC_COUNT_PR_SEP', (string)(Tools::getValue("nc_count_pr_sep")));
            Configuration::updateValue('NC_M_MODE', (string)(Tools::getValue("nc_m_mode")));
            Configuration::updateValue('NC_PRODUCT_SWITCH', (string)(Tools::getValue("nc_product_switch")));
            Configuration::updateValue('NC_CAROUSEL_FEATURED', (string)(Tools::getValue("nc_carousel_featured")));
            Configuration::updateValue('NC_AUTO_FEATURED', (string)(Tools::getValue("nc_auto_featured")));
            Configuration::updateValue('NC_ITEMS_FEATURED', (string)(Tools::getValue("nc_items_featured")));
            Configuration::updateValue('NC_CAROUSEL_NEW', (string)(Tools::getValue("nc_carousel_new")));
            Configuration::updateValue('NC_AUTO_NEW', (string)(Tools::getValue("nc_auto_new")));
            Configuration::updateValue('NC_ITEMS_NEW', (string)(Tools::getValue("nc_items_new")));
            Configuration::updateValue('NC_CAROUSEL_BEST', (string)(Tools::getValue("nc_carousel_best")));
            Configuration::updateValue('NC_AUTO_BEST', (string)(Tools::getValue("nc_auto_best")));
            Configuration::updateValue('NC_ITEMS_BEST', (string)(Tools::getValue("nc_items_best")));
            Configuration::updateValue('NC_CAROUSEL_SALE', (string)(Tools::getValue("nc_carousel_sale")));
            Configuration::updateValue('NC_AUTO_SALE', (string)(Tools::getValue("nc_auto_sale")));
            Configuration::updateValue('NC_ITEMS_SALE', (string)(Tools::getValue("nc_items_sale")));
            Configuration::updateValue('NC_UP_MENU', (string)(Tools::getValue("nc_up_menu")));
            Configuration::updateValue('NC_UP_HEAD', (string)(Tools::getValue("nc_up_head")));
            Configuration::updateValue('NC_UP_BUT', (string)(Tools::getValue("nc_up_but")));
            Configuration::updateValue('NC_M_CHEV', (string)(Tools::getValue("nc_m_chev")));
            Configuration::updateValue('NC_M_BT', (string)(Tools::getValue("nc_m_bt")));
            Configuration::updateValue('NC_M_BR', (string)(Tools::getValue("nc_m_br")));
            Configuration::updateValue('NC_M_BB', (string)(Tools::getValue("nc_m_bb")));
            Configuration::updateValue('NC_M_BL', (string)(Tools::getValue("nc_m_bl")));
            Configuration::updateValue('NC_M_RADIUS', (string)(Tools::getValue("nc_m_radius")));
            Configuration::updateValue('NC_M_NOTE', (string)(Tools::getValue("nc_m_note")));
            Configuration::updateValue('NC_M_ICON', (string)(Tools::getValue("nc_m_icon")));
            Configuration::updateValue('NC_MV_BG', (string)(Tools::getValue("nc_mv_bg")));
            Configuration::updateValue('NC_MV_COLOR', (string)(Tools::getValue("nc_mv_color")));
            Configuration::updateValue('NC_MV_ICON', (string)(Tools::getValue("nc_mv_icon")));
            Configuration::updateValue('NC_MV_BG_HOVER', (string)(Tools::getValue("nc_mv_bg_hover")));
            Configuration::updateValue('NC_MV_HOVER', (string)(Tools::getValue("nc_mv_hover")));
            Configuration::updateValue('NC_MV_TAB', (string)(Tools::getValue("nc_mv_tab")));
            Configuration::updateValue('NC_MV_BOR', (string)(Tools::getValue("nc_mv_bor")));
            Configuration::updateValue('NC_CSS', (string)(Tools::getValue("nc_css")));

            $this -> generateCss();

            if (!$this -> updateCopyright())
                $output .= $this -> displayError($this->l('Error of copyright text updating.'));
        }

        $this -> updateOriginalValues();

        if (Tools::isSubmit('reset_changes')) {
            Configuration::updateValue('RTC_F_HEADINGS', $this -> defaults["f_headings"]);
            Configuration::updateValue('RTC_F_TEXT', $this -> defaults["f_text"]);
            Configuration::updateValue('RTC_F_PRICE', $this -> defaults["f_price"]);
            Configuration::updateValue('RTC_MAIN_BACKGROUND_COLOR', $this -> defaults["main_background_color"]);
            Configuration::updateValue('RTC_TOP_LINE_BACKGROUND', $this -> defaults["top_line_background"]);
            Configuration::updateValue('RTC_DESC_HEIGHT', $this -> defaults["desc_height"]);
            Configuration::updateValue('NC_SUBCAT', $this -> defaults["nc_subcat"]);
            Configuration::updateValue('NC_CAT', $this -> defaults["nc_cat"]);
            Configuration::updateValue('RTC_BREADCRUMB', $this -> defaults["breadcrumb"]);
            Configuration::updateValue('NC_LOADER', $this -> defaults["nc_loader"]);
            Configuration::updateValue('RTC_UP_ARROW_BORDER', $this -> defaults["up_arrow_border"]);
            Configuration::updateValue('RTC_UP_ARROW_COLOR', $this -> defaults["up_arrow_color"]);
            Configuration::updateValue('RTC_CONTENT_BACKGROUND_COLOR', $this -> defaults["content_background_color"]);
            Configuration::updateValue('RTC_BODY_BG_EXT', $this -> defaults["body_bg_ext"]);
            Configuration::updateValue('RTC_BODY_BG_REPEAT', $this -> defaults["body_bg_repeat"]);
            Configuration::updateValue('RTC_BODY_BG_POSITION', $this -> defaults["body_bg_position"]);
            Configuration::updateValue('RTC_BODY_BG_PATTERN', $this -> defaults["body_bg_pattern"]);
            Configuration::updateValue('RTC_GRADIENT_SCHEME', $this -> defaults["gradient_scheme"]);
            Configuration::updateValue('RTC_TEXTURES', $this -> defaults["gradient_scheme"]);
            Configuration::updateValue('RTC_DISPLAY_GRADIENT', $this -> defaults["display_gradient"]);
            Configuration::updateValue('RTC_BODY_BG_FIXED', $this -> defaults["body_bg_fixed"]);
            Configuration::updateValue('RTC_FONT_SIZE_BODY', $this -> defaults["font_size_body"]);
            Configuration::updateValue('RTC_FONT_SIZE_MENU', $this -> defaults["font_size_menu"]);
            Configuration::updateValue('RTC_FONT_SIZE_BUTTONS', $this -> defaults["font_size_buttons"]);
            Configuration::updateValue('RTC_FONT_SIZE_PRICE', $this -> defaults["font_size_price"]);
            Configuration::updateValue('RTC_MENU_LINE_BG', $this -> defaults["menu_line_bg"]);
            Configuration::updateValue('RTC_MENU_LINE_BORDER', $this -> defaults["menu_line_border"]);
            Configuration::updateValue('NC_G_BODY_TEXT', $this -> defaults["nc_g_body_text"]);
            Configuration::updateValue('RTC_BRAND_BG', $this -> defaults["brand_bg"]);
            Configuration::updateValue('RTC_BRAND_BORDER', $this -> defaults["brand_border"]);
            Configuration::updateValue('RTC_G_BODY_LINK', $this -> defaults["g_body_link"]);
            Configuration::updateValue('RTC_G_BODY_LINK_HOVER', $this -> defaults["g_body_link_hover"]);
            Configuration::updateValue('RTC_G_TABLE_BG', $this -> defaults["g_table_bg"]);
            Configuration::updateValue('RTC_G_TABLE_TITLE_BG', $this -> defaults["g_table_title_bg"]);
            Configuration::updateValue('RTC_G_TABLE_TITLE_COLOR', $this -> defaults["g_table_title_color"]);
            Configuration::updateValue('RTC_G_TABLE_TOTAL', $this -> defaults["g_table_total"]);
            Configuration::updateValue('RTC_BOX', $this -> defaults["g_box"]);
            Configuration::updateValue('RTC_BOX_TITLE', $this -> defaults["g_box_title"]);
            Configuration::updateValue('RTC_BOX_TITLE_BORDER', $this -> defaults["g_box_title_border"]);
            Configuration::updateValue('RTC_LABEL', $this -> defaults["g_label"]);
            Configuration::updateValue('RTC_CHECKBOX_LABEL', $this -> defaults["g_checkbox_label"]);
            Configuration::updateValue('RTC_INPUT_BG', $this -> defaults["g_input_bg"]);
            Configuration::updateValue('RTC_INPUT_BORDER', $this -> defaults["g_input_border"]);
            Configuration::updateValue('RTC_INPUT_COLOR', $this -> defaults["g_input_color"]);
            Configuration::updateValue('RTC_FORM', $this -> defaults["g_form"]);
            Configuration::updateValue('RTC_FORM_GREY', $this -> defaults["g_form_grey"]);
            Configuration::updateValue('RTC_B_TEXT', $this -> defaults["b_text"]);
            Configuration::updateValue('RTC_B_LINK', $this -> defaults["b_link"]);
            Configuration::updateValue('RTC_B_LINK_HOVER', $this -> defaults["b_link_hover"]);
            Configuration::updateValue('RTC_B_SEPARATOR', $this -> defaults["b_separator"]);
            Configuration::updateValue('RTC_B_NORMAL_BG', $this -> defaults["b_normal_bg"]);
            Configuration::updateValue('RTC_B_NORMAL_BORDER', $this -> defaults["b_normal_border"]);
            Configuration::updateValue('RTC_B_NORMAL_BORDER_HOVER', $this -> defaults["b_normal_border_hover"]);
            Configuration::updateValue('RTC_CL_LABEL', $this -> defaults["cl_label"]);
            Configuration::updateValue('RTC_B_NORMAL_BG', $this -> defaults["b_normal_bg"]);
            Configuration::updateValue('RTC_B_NORMAL_BG_HOVER', $this -> defaults["b_normal_bg_hover"]);
            Configuration::updateValue('RTC_B_NORMAL_COLOR', $this -> defaults["b_normal_color"]);
            Configuration::updateValue('RTC_B_NORMAL_COLOR_HOVER', $this -> defaults["b_normal_color_hover"]);
            Configuration::updateValue('RTC_B_EX_BG', $this -> defaults["b_ex_bg"]);
            Configuration::updateValue('RTC_B_EX_BORDER', $this -> defaults["b_ex_border"]);
            Configuration::updateValue('RTC_B_EX_COLOR', $this -> defaults["b_ex_color"]);
            Configuration::updateValue('RTC_CL_VALUE', $this -> defaults["cl_value"]);
            Configuration::updateValue('RTC_BAN_TITLE', $this -> defaults["ban_title"]);
            Configuration::updateValue('RTC_BAN_TEXT', $this -> defaults["ban_text"]);
            Configuration::updateValue('RTC_BAN_BG', $this -> defaults["ban_bg"]);
            Configuration::updateValue('RTC_BAN_BORDER', $this -> defaults["ban_border"]);
            Configuration::updateValue('RTC_BAN_BUTTON', $this -> defaults["ban_button"]);
            Configuration::updateValue('RTC_BAN_BUTTON_TEXT', $this -> defaults["ban_button_text"]);
            Configuration::updateValue('RTC_CL_POPUP_BG', $this -> defaults["cl_popup_bg"]);
            Configuration::updateValue('RTC_CL_POPUP_BORDER', $this -> defaults["cl_popup_border"]);
            Configuration::updateValue('RTC_CL_POPUP_SHADOW', $this -> defaults["cl_popup_shadow"]);
            Configuration::updateValue('RTC_BANNERS_ANIM', $this -> defaults["banners_anim"]);
            Configuration::updateValue('NC_SECOND_IMG', $this -> defaults["nc_second_img"]);
            Configuration::updateValue('RTC_CL_POPUP_ITEM', $this -> defaults["cl_popup_item"]);
            Configuration::updateValue('RTC_CL_POPUP_ITEM_HOVER', $this -> defaults["cl_popup_item_hover"]);
            Configuration::updateValue('RTC_CL_DISPLAY_CUR', $this -> defaults["cl_display_cur"]);
            Configuration::updateValue('RTC_CL_DISPLAY_LAN', $this -> defaults["cl_display_lan"]);
            Configuration::updateValue('RTC_TA_LINK', $this -> defaults["ta_link"]);
            Configuration::updateValue('RTC_TA_LINK_HOVER', $this -> defaults["ta_link_hover"]);
            Configuration::updateValue('RTC_TA_SEPARATOR', $this -> defaults["ta_separator"]);
            Configuration::updateValue('RTC_TA_WELCOME', $this -> defaults["ta_welcome"]);
            Configuration::updateValue('RTC_TA_NAME', $this -> defaults["ta_name"]);
            Configuration::updateValue('RTC_IP_BG', $this -> defaults["ip_bg"]);
            Configuration::updateValue('RTC_IP_ANIM', $this -> defaults["ip_anim"]);
            Configuration::updateValue('RTC_IP_BORDER', $this -> defaults["ip_border"]);
            Configuration::updateValue('RTC_IP_TITLE', $this -> defaults["ip_title"]);
            Configuration::updateValue('RTC_IP_TEXT', $this -> defaults["ip_text"]);
            Configuration::updateValue('RTC_SLIDER_MODE', $this -> defaults["slider_mode"]);
            Configuration::updateValue('RTC_DISPLAY_ROUND', $this -> defaults["display_round"]);
            Configuration::updateValue('RTC_CON_BG', $this -> defaults["con_bg"]);
            Configuration::updateValue('RTC_CON_BORDER', $this -> defaults["con_border"]);
            Configuration::updateValue('RTC_CON_COLOR', $this -> defaults["con_color"]);
            Configuration::updateValue('RTC_S_CON_BG', $this -> defaults["s_con_bg"]);
            Configuration::updateValue('RTC_S_CON_BORDER', $this -> defaults["s_con_border"]);
            Configuration::updateValue('RTC_S_CON_COLOR', $this -> defaults["s_con_color"]);
            Configuration::updateValue('RTC_CON_BG_HOVER', $this -> defaults["con_bg_hover"]);
            Configuration::updateValue('RTC_CON_BORDER_HOVER', $this -> defaults["con_border_hover"]);
            Configuration::updateValue('RTC_CON_COLOR_HOVER', $this -> defaults["con_color_hover"]);
            Configuration::updateValue('RTC_HP_TITLE', $this -> defaults["hp_title"]);
            Configuration::updateValue('RTC_HP_TITLE_HOVER', $this -> defaults["hp_title_hover"]);
            Configuration::updateValue('RTC_DISPLAY_FEATURED', $this -> defaults["display_featured"]);
            Configuration::updateValue('RTC_DISPLAY_NEW', $this -> defaults["display_new"]);
            Configuration::updateValue('RTC_DISPLAY_BEST', $this -> defaults["display_best"]);
            Configuration::updateValue('RTC_BOTTOM_SECTION', $this -> defaults["bottom_section"]);
            Configuration::updateValue('NC_BOTTOM_SECTION_OTHER', $this -> defaults["nc_bottom_section_other"]);
            Configuration::updateValue('NC_BOTTOM_SECTION_SW', $this -> defaults["nc_bottom_section_sw"]);
            Configuration::updateValue('RTC_MA_REQUIRED', $this -> defaults["ma_required"]);
            Configuration::updateValue('RTC_MA_TITLE', $this -> defaults["ma_title"]);
            Configuration::updateValue('RTC_MA_TITLE_HOVER', $this -> defaults["ma_title_hover"]);
            Configuration::updateValue('RTC_MA_ICON', $this -> defaults["ma_icon"]);
            Configuration::updateValue('RTC_MA_ICON_BORDER', $this -> defaults["ma_icon_border"]);
            Configuration::updateValue('RTC_MA_ICON_BORDER_HOVER', $this -> defaults["ma_icon_border_hover"]);
            Configuration::updateValue('RTC_MA_ICON_HOVER', $this -> defaults["ma_icon_hover"]);
            Configuration::updateValue('RTC_MA_FOOTER_SEPARATOR', $this -> defaults["ma_footer_separator"]);
            Configuration::updateValue('RTC_O_NUMBER_BG', $this -> defaults["o_number_bg"]);
            Configuration::updateValue('RTC_O_NUMBER_BORDER', $this -> defaults["o_number_border"]);
            Configuration::updateValue('RTC_O_NUMBER_BORDER_ACTIVE', $this -> defaults["o_number_border_active"]);
            Configuration::updateValue('RTC_O_NUMBER_BORDER_DONE', $this -> defaults["o_number_border_done"]);
            Configuration::updateValue('RTC_O_NUMBER_BORDER_DONE_HOVER', $this -> defaults["o_number_border_done_hover"]);
            Configuration::updateValue('RTC_O_NUMBER_COLOR', $this -> defaults["o_number_color"]);
            Configuration::updateValue('RTC_O_NUMBER_TITLE', $this -> defaults["o_number_title"]);
            Configuration::updateValue('RTC_O_NUMBER_BG_ACTIVE', $this -> defaults["o_number_bg_active"]);
            Configuration::updateValue('RTC_O_NUMBER_COLOR_ACTIVE', $this -> defaults["o_number_color_active"]);
            Configuration::updateValue('RTC_O_NUMBER_TITLE_ACTIVE', $this -> defaults["o_number_title_active"]);
            Configuration::updateValue('RTC_O_NUMBER_BG_DONE', $this -> defaults["o_number_bg_done"]);
            Configuration::updateValue('RTC_O_NUMBER_COLOR_DONE', $this -> defaults["o_number_color_done"]);
            Configuration::updateValue('RTC_O_NUMBER_TITLE_DONE', $this -> defaults["o_number_title_done"]);
            Configuration::updateValue('RTC_O_NUMBER_BG_DONE_HOVER', $this -> defaults["o_number_bg_done_hover"]);
            Configuration::updateValue('RTC_O_NUMBER_COLOR_DONE_HOVER', $this -> defaults["o_number_color_done_hover"]);
            Configuration::updateValue('RTC_O_NUMBER_TITLE_DONE_HOVER', $this -> defaults["o_number_title_done_hover"]);
            Configuration::updateValue('RTC_O_IMG_BORDER', $this -> defaults["o_img_border"]);
            Configuration::updateValue('RTC_O_PRODUCT_NAME', $this -> defaults["o_product_name"]);
            Configuration::updateValue('RTC_O_PRODUCT_ATTS', $this -> defaults["o_product_atts"]);
            Configuration::updateValue('RTC_O_REMOVE', $this -> defaults["o_remove"]);
            Configuration::updateValue('RTC_O_REMOVE_HOVER', $this -> defaults["o_remove_hover"]);
            Configuration::updateValue('RTC_O_TOTAL_TITLE', $this -> defaults["o_total_title"]);
            Configuration::updateValue('RTC_O_TOTAL_PRICE', $this -> defaults["o_total_price"]);
            Configuration::updateValue('RTC_O_DEL_TITLE', $this -> defaults["o_del_title"]);
            Configuration::updateValue('RTC_O_DEL_ITEM_BG', $this -> defaults["o_del_item_bg"]);
            Configuration::updateValue('RTC_O_DEL_ITEM_TEXT', $this -> defaults["o_del_item_text"]);
            Configuration::updateValue('RTC_O_PAY_ITEM_BG', $this -> defaults["o_pay_item_bg"]);
            Configuration::updateValue('NC_O_PAY_ITEM_BG_HOVER', $this -> defaults["nc_o_pay_item_bg_hover"]);
            Configuration::updateValue('NC_O_PAY_ITEM_C_HOVER', $this -> defaults["nc_o_pay_item_c_hover"]);
            Configuration::updateValue('NC_F_UNDERLINE', $this -> defaults["nc_f_underline"]);
            Configuration::updateValue('RTC_O_PAY_ITEM_TITLE', $this -> defaults["o_pay_item_title"]);
            Configuration::updateValue('RTC_O_PAY_ITEM_DESC', $this -> defaults["o_pay_item_desc"]);
            Configuration::updateValue('RTC_O_PAY_ITEM_CHEVRON', $this -> defaults["o_pay_item_chevron"]);
            Configuration::updateValue('RTC_BL_BG', $this -> defaults["bl_bg"]);
            Configuration::updateValue('RTC_BL_HEADING', $this -> defaults["bl_heading"]);
            Configuration::updateValue('RTC_BL_DATE', $this -> defaults["bl_date"]);
            Configuration::updateValue('RTC_BL_BORDER', $this -> defaults["bl_border"]);
            Configuration::updateValue('RTC_BL_MARK', $this -> defaults["bl_mark"]);
            Configuration::updateValue('RTC_BL_RM_COLOR', $this -> defaults["bl_rm_color"]);
            Configuration::updateValue('RTC_BL_RM_BG', $this -> defaults["bl_rm_bg"]);
            Configuration::updateValue('RTC_BL_RM_BORDER', $this -> defaults["bl_rm_border"]);
            Configuration::updateValue('RTC_BL_RM_BG_ICON', $this -> defaults["bl_rm_bg_icon"]);
            Configuration::updateValue('RTC_BL_RM_BORDER_ICON', $this -> defaults["bl_rm_border_icon"]);
            Configuration::updateValue('RTC_BL_RM_BG_HOVER', $this -> defaults["bl_rm_bg_hover"]);
            Configuration::updateValue('RTC_BL_RM_BORDER_HOVER', $this -> defaults["bl_rm_border_hover"]);
            Configuration::updateValue('RTC_BL_RM_HOVER', $this -> defaults["bl_rm_hover"]);
            Configuration::updateValue('RTC_BL_TITLE', $this -> defaults["bl_title"]);
            Configuration::updateValue('RTC_BL_TITLE_HOVER', $this -> defaults["bl_title_hover"]);
            Configuration::updateValue('RTC_BL_BG_CONTENT', $this -> defaults["bl_bg_content"]);
            Configuration::updateValue('RTC_BL_META', $this -> defaults["bl_meta"]);
            Configuration::updateValue('RTC_BL_COM_BG', $this -> defaults["bl_com_bg"]);
            Configuration::updateValue('RTC_BL_COM_NAME', $this -> defaults["bl_com_name"]);
            Configuration::updateValue('RTC_MENU_BORDER', $this -> defaults["menu_border"]);
            Configuration::updateValue('RTC_MENU_IMG_EXT', $this -> defaults["menu_img_ext"]);
            Configuration::updateValue('RTC_MENU_LINK_BG_COLOR', $this -> defaults["menu_link_bg_color"]);
            Configuration::updateValue('RTC_MENU_LINK_BG_HOVER', $this -> defaults["menu_link_bg_hover"]);
            Configuration::updateValue('RTC_MENU_LINK_BG_ACTIVE', $this -> defaults["menu_link_bg_active"]);
            Configuration::updateValue('RTC_MENU_LINK_BORDER_COLOR', $this -> defaults["menu_link_border_color"]);
            Configuration::updateValue('RTC_MENU_LINK_BORDER_HOVER', $this -> defaults["menu_link_border_hover"]);
            Configuration::updateValue('RTC_MENU_LINK_BORDER_ACTIVE', $this -> defaults["menu_link_border_active"]);
            Configuration::updateValue('RTC_MENU_LINK_COLOR', $this -> defaults["menu_link_color"]);
            Configuration::updateValue('RTC_MENU_LINK_ACTIVE', $this -> defaults["menu_link_active"]);
            Configuration::updateValue('RTC_MENU_HOVER_COLOR', $this -> defaults["menu_hover_color"]);
            Configuration::updateValue('RTC_SUBMENU_BG_COLOR', $this -> defaults["submenu_bg_color"]);
            Configuration::updateValue('RTC_SUBMENU_SHADOW', $this -> defaults["submenu_shadow"]);
            Configuration::updateValue('NC_STICKY_MENU', $this -> defaults["nc_sticky_menu"]);
            Configuration::updateValue('RTC_SUBMENU_LINK_COLOR', $this -> defaults["submenu_link_color"]);
            Configuration::updateValue('NC_ST_UP', $this -> defaults["nc_st_up"]);
            Configuration::updateValue('NC_ST_UP_BG', $this -> defaults["nc_st_up_bg"]);
            Configuration::updateValue('NC_ST_UP_BORDER', $this -> defaults["nc_st_up_border"]);
            Configuration::updateValue('RTC_SUBMENU_HOVER_COLOR', $this -> defaults["submenu_hover_color"]);
            Configuration::updateValue('RTC_SUBMENU_BEFORE_LINE', $this -> defaults["submenu_before_line"]);
            Configuration::updateValue('RTC_SUBMENU_BORDER_TOP', $this -> defaults["submenu_border_top"]);
            Configuration::updateValue('RTC_SEARCH_BOX_BG', $this -> defaults["search_box_bg"]);
            Configuration::updateValue('RTC_SEARCH_BORDER', $this -> defaults["search_border"]);
            Configuration::updateValue('RTC_SEARCH_INPUT_COLOR', $this -> defaults["search_input_color"]);
            Configuration::updateValue('NC_SEARCH_BORDER_BUT', $this -> defaults["nc_search_border_but"]);
            Configuration::updateValue('RTC_SEARCH_BUTTON', $this -> defaults["search_button"]);
            Configuration::updateValue('RTC_SEARCH_POPUP_BG', $this -> defaults["search_popup_bg"]);
            Configuration::updateValue('RTC_SEARCH_POPUP_BORDER', $this -> defaults["search_popup_border"]);
            Configuration::updateValue('RTC_SEARCH_SHADOW', $this -> defaults["search_shadow"]);
            Configuration::updateValue('RTC_SEARCH_ITEM_BG', $this -> defaults["search_item_bg"]);
            Configuration::updateValue('RTC_SEARCH_ITEM_BG_HOVER', $this -> defaults["search_item_bg_hover"]);
            Configuration::updateValue('RTC_SIDEBAR_TITLE_BG', $this -> defaults["sidebar_title_bg"]);
            Configuration::updateValue('RTC_SIDEBAR_TITLE_BORDER', $this -> defaults["sidebar_title_border"]);
            Configuration::updateValue('RTC_SIDEBAR_TITLE_COLOR', $this -> defaults["sidebar_title_color"]);
            Configuration::updateValue('RTC_SIDEBAR_TITLE_LINK', $this -> defaults["sidebar_title_link"]);
            Configuration::updateValue('RTC_SIDEBAR_BLOCK_CONTENT_BG', $this -> defaults["sidebar_block_content_bg"]);
            Configuration::updateValue('RTC_SIDEBAR_BLOCK_CONTENT_BORDER', $this -> defaults["sidebar_block_content_border"]);
            Configuration::updateValue('RTC_SIDEBAR_BLOCK_TEXT_COLOR', $this -> defaults["sidebar_block_text_color"]);
            Configuration::updateValue('RTC_SIDEBAR_BLOCK_LINK', $this -> defaults["sidebar_block_link"]);
            Configuration::updateValue('RTC_SIDEBAR_BLOCK_LINK_HOVER', $this -> defaults["sidebar_block_link_hover"]);
            Configuration::updateValue('RTC_SIDEBAR_BUTTON_BG', $this -> defaults["sidebar_button_bg"]);
            Configuration::updateValue('RTC_SIDEBAR_BUTTON_BORDER', $this -> defaults["sidebar_button_border"]);
            Configuration::updateValue('RTC_SIDEBAR_BUTTON_COLOR', $this -> defaults["sidebar_button_color"]);
            Configuration::updateValue('RTC_SIDEBAR_ITEM_SEPARATOR', $this -> defaults["sidebar_item_separator"]);
            Configuration::updateValue('RTC_SIDEBAR_PRODUCT_IMG_BORDER', $this -> defaults["sidebar_product_img_border"]);
            Configuration::updateValue('RTC_SIDEBAR_CATEGORIES_ITEM', $this -> defaults["sidebar_categories_item"]);
            Configuration::updateValue('RTC_SIDEBAR_CATEGORIES_ITEM_HOVER', $this -> defaults["sidebar_categories_item_hover"]);
            Configuration::updateValue('RTC_SIDEBAR_CATEGORIES_SEPARATOR', $this -> defaults["sidebar_categories_separator"]);
            Configuration::updateValue('RTC_CMS_TITLE', $this -> defaults["cms_title"]);
            Configuration::updateValue('RTC_CMS_TITLE_BORDER', $this -> defaults["cms_title_border"]);
            Configuration::updateValue('RTC_CMS_TITLE_BORDER_MARK', $this -> defaults["cms_title_border_mark"]);
            Configuration::updateValue('RTC_PAGE_TEXT_COLOR', $this -> defaults["page_text_color"]);
            Configuration::updateValue('RTC_PAGE_HEADINGS', $this -> defaults["page_headings"]);
            Configuration::updateValue('RTC_PAGE_LINK', $this -> defaults["page_link"]);
            Configuration::updateValue('RTC_PAGE_LINK_HOVER', $this -> defaults["page_link_hover"]);
            Configuration::updateValue('RTC_CONTACT_FORM_BG', $this -> defaults["contact_form_bg"]);
            Configuration::updateValue('RTC_CONTACT_FORM_BORDER', $this -> defaults["contact_form_border"]);
            Configuration::updateValue('RTC_WARNING_MESSAGE_BG', $this -> defaults["warning_message_bg"]);
            Configuration::updateValue('RTC_WARNING_MESSAGE_COLOR', $this -> defaults["warning_message_color"]);
            Configuration::updateValue('RTC_SUCCESS_MESSAGE_BG', $this -> defaults["success_message_bg"]);
            Configuration::updateValue('RTC_SUCCESS_MESSAGE_COLOR', $this -> defaults["success_message_color"]);
            Configuration::updateValue('RTC_INFO_MESSAGE_BG', $this -> defaults["info_message_bg"]);
            Configuration::updateValue('RTC_INFO_MESSAGE_COLOR', $this -> defaults["info_message_color"]);
            Configuration::updateValue('RTC_DANGER_MESSAGE_BG', $this -> defaults["danger_message_bg"]);
            Configuration::updateValue('RTC_DANGER_MESSAGE_COLOR', $this -> defaults["danger_message_color"]);
            Configuration::updateValue('RTC_PL_HEADING_COLOR', $this -> defaults["pl_heading_color"]);
            Configuration::updateValue('RTC_PL_HEADING_TEXT', $this -> defaults["pl_heading_text"]);
            Configuration::updateValue('RTC_PL_NAV_TOP_BG', $this -> defaults["pl_nav_top_bg"]);
            Configuration::updateValue('RTC_PL_NAV_TOP_BORDER', $this -> defaults["pl_nav_top_border"]);
            Configuration::updateValue('RTC_PL_NAV_GRID', $this -> defaults["pl_nav_grid"]);
            Configuration::updateValue('RTC_PL_NAV_SORT', $this -> defaults["pl_nav_sort"]);
            Configuration::updateValue('RTC_PL_NUMBER_BG', $this -> defaults["pl_number_bg"]);
            Configuration::updateValue('RTC_PL_NUMBER_BG_HOVER', $this -> defaults["pl_number_bg_hover"]);
            Configuration::updateValue('RTC_PL_NUMBER_COLOR', $this -> defaults["pl_number_color"]);
            Configuration::updateValue('RTC_PL_NUMBER_COLOR_HOVER', $this -> defaults["pl_number_color_hover"]);
            Configuration::updateValue('RTC_PL_PAG_NAV_BG', $this -> defaults["pl_pag_nav_bg"]);
            Configuration::updateValue('RTC_PL_PAG_NAV_BG_HOVER', $this -> defaults["pl_pag_nav_bg_hover"]);
            Configuration::updateValue('RTC_PL_PAG_NAV_COLOR', $this -> defaults["pl_pag_nav_color"]);
            Configuration::updateValue('RTC_PL_PAG_NAV_COLOR_HOVER', $this -> defaults["pl_pag_nav_color_hover"]);
            Configuration::updateValue('RTC_PL_PAG_ACTIVE_BG', $this -> defaults["pl_pag_active_bg"]);
            Configuration::updateValue('RTC_PL_PAG_ACTIVE_COLOR', $this -> defaults["pl_pag_active_color"]);
            Configuration::updateValue('RTC_PL_SHOW_PER_PAGE', $this -> defaults["pl_show_per_page"]);
            Configuration::updateValue('RTC_PL_SHOW_ITEMS', $this -> defaults["pl_show_items"]);
            Configuration::updateValue('RTC_PL_FILTER_SEPARATOR', $this -> defaults["pl_filter_separator"]);
            Configuration::updateValue('RTC_PL_FILTER_RANGE', $this -> defaults["pl_filter_range"]);
            Configuration::updateValue('RTC_PL_FILTER_RANGE_OUT', $this -> defaults["pl_filter_range_out"]);
            Configuration::updateValue('RTC_PL_FILTER_HANDLE_BG', $this -> defaults["pl_filter_handle_bg"]);
            Configuration::updateValue('RTC_PL_FILTER_HANDLE_BORDER', $this -> defaults["pl_filter_handle_border"]);
            Configuration::updateValue('RTC_PL_ITEM_BG', $this -> defaults["pl_item_bg"]);
            Configuration::updateValue('RTC_PL_ITEM_BORDER', $this -> defaults["pl_item_border"]);
            Configuration::updateValue('RTC_PL_PRODUCT_NAME', $this -> defaults["pl_product_name"]);
            Configuration::updateValue('RTC_PL_PRODUCT_PRICE', $this -> defaults["pl_product_price"]);
            Configuration::updateValue('RTC_PL_PRODUCT_OLDPRICE', $this -> defaults["pl_product_oldprice"]);
            Configuration::updateValue('RTC_PL_PRODUCT_PERCENT', $this -> defaults["pl_product_percent"]);
            Configuration::updateValue('RTC_PL_PRODUCT_PERCENT_BG', $this -> defaults["pl_product_percent_bg"]);
            Configuration::updateValue('RTC_PL_PRODUCT_CART', $this -> defaults["pl_product_cart"]);
            Configuration::updateValue('RTC_PL_PRODUCT_CART_BORDER', $this -> defaults["pl_product_cart_border"]);
            Configuration::updateValue('RTC_PL_PRODUCT_CART_COLOR', $this -> defaults["pl_product_cart_color"]);
            Configuration::updateValue('RTC_PL_PRODUCT_CART_ACTIVE', $this -> defaults["pl_product_cart_active"]);
            Configuration::updateValue('RTC_PL_PRODUCT_CART_ACTIVE_BORDER', $this -> defaults["pl_product_cart_active_border"]);
            Configuration::updateValue('RTC_PL_PRODUCT_CART_ACTIVE_COLOR', $this -> defaults["pl_product_cart_active_color"]);
            Configuration::updateValue('RTC_PL_PRODUCT_CART_HOVER', $this -> defaults["pl_product_cart_hover"]);
            Configuration::updateValue('RTC_PL_PRODUCT_CART_HOVER_BORDER', $this -> defaults["pl_product_cart_hover_border"]);
            Configuration::updateValue('RTC_PL_PRODUCT_CART_HOVER_COLOR', $this -> defaults["pl_product_cart_hover_color"]);
            Configuration::updateValue('RTC_PL_PRODUCT_QUICKVIEW', $this -> defaults["pl_product_quickview"]);
            Configuration::updateValue('RTC_PL_PRODUCT_QUICKVIEW_HOVER', $this -> defaults["pl_product_quickview_hover"]);
            Configuration::updateValue('RTC_PL_PRODUCT_QUICKVIEW_COLOR', $this -> defaults["pl_product_quickview_color"]);
            Configuration::updateValue('RTC_PL_PRODUCT_VIEW_BORDER', $this -> defaults["pl_product_view_border"]);
            Configuration::updateValue('RTC_PL_PRODUCT_VIEW_BORDER_HOVER', $this -> defaults["pl_product_view_border_hover"]);
            Configuration::updateValue('RTC_PL_PRODUCT_COMPARE', $this -> defaults["pl_product_compare"]);
            Configuration::updateValue('RTC_PL_PRODUCT_COMPARE_HOVER', $this -> defaults["pl_product_compare_hover"]);
            Configuration::updateValue('RTC_PL_PRODUCT_COMPARE_ICON', $this -> defaults["pl_product_compare_icon"]);
            Configuration::updateValue('RTC_PL_PRODUCT_COMPARE_ICON_ACTIVE', $this -> defaults["pl_product_compare_icon_active"]);
            Configuration::updateValue('RTC_PL_PRODUCT_WISH_ICON', $this -> defaults["pl_product_wish_icon"]);
            Configuration::updateValue('RTC_PL_PRODUCT_WISH_ICON_ACTIVE', $this -> defaults["pl_product_wish_icon_active"]);
            Configuration::updateValue('RTC_PL_PRODUCT_NEW_BG', $this -> defaults["pl_product_new_bg"]);
            Configuration::updateValue('RTC_PL_PRODUCT_NEW_BORDER', $this -> defaults["pl_product_new_border"]);
            Configuration::updateValue('RTC_PL_PRODUCT_SALE_BORDER', $this -> defaults["pl_product_sale_border"]);
            Configuration::updateValue('RTC_PL_PRODUCT_NEW_COLOR', $this -> defaults["pl_product_new_color"]);
            Configuration::updateValue('RTC_PL_PRODUCT_SALE_BG', $this -> defaults["pl_product_sale_bg"]);
            Configuration::updateValue('RTC_PL_PRODUCT_SALE_COLOR', $this -> defaults["pl_product_sale_color"]);
            Configuration::updateValue('RTC_PL_PRODUCT_WHITE_GRAD', $this -> defaults["pl_product_white_grad"]);
            Configuration::updateValue('RTC_PL_PRODUCT_QWTEXT', $this -> defaults["pl_product_qwtext"]);
            Configuration::updateValue('RTC_PL_PRODUCT_DISPLAY_QUICKVIEW', $this -> defaults["pl_product_display_quickview"]);
            Configuration::updateValue('RTC_PL_PRODUCT_DISPLAY_VIEW', $this -> defaults["pl_product_display_view"]);
            Configuration::updateValue('RTC_PL_PRODUCT_DISPLAY_NEW', $this -> defaults["pl_product_display_new"]);
            Configuration::updateValue('RTC_PL_PRODUCT_DISPLAY_SALE', $this -> defaults["pl_product_display_sale"]);
            Configuration::updateValue('RTC_PL_LIST_IMG_BORDER', $this -> defaults["pl_list_img_border"]);
            Configuration::updateValue('RTC_PL_LIST_BG', $this -> defaults["pl_list_bg"]);
            Configuration::updateValue('RTC_PL_LIST_SEPARATOR', $this -> defaults["pl_list_separator"]);
            Configuration::updateValue('RTC_PL_LIST_DESCRIPTION', $this -> defaults["pl_list_description"]);
            Configuration::updateValue('RTC_C_LEFT_COLUMN', $this -> defaults["c_left_column"]);
            Configuration::updateValue('RTC_C_RIGHT_COLUMN', $this -> defaults["c_right_column"]);
            Configuration::updateValue('RTC_C_LEFT_COLOR', $this -> defaults["c_left_color"]);
            Configuration::updateValue('RTC_C_RIGHT_COLOR', $this -> defaults["c_right_color"]);
            Configuration::updateValue('RTC_C_IMG_BORDER', $this -> defaults["c_img_border"]);
            Configuration::updateValue('RTC_C_REMOVE', $this -> defaults["c_remove"]);
            Configuration::updateValue('RTC_C_REMOVE_HOVER', $this -> defaults["c_remove_hover"]);
            Configuration::updateValue('RTC_PP_IMG_BORDER', $this -> defaults["pp_img_border"]);
            Configuration::updateValue('RTC_PP_ICON_BORDER', $this -> defaults["pp_icon_border"]);
            Configuration::updateValue('RTC_PP_ICON_BORDER_HOVER', $this -> defaults["pp_icon_border_hover"]);
            Configuration::updateValue('RTC_PP_ICON_NAV_BG', $this -> defaults["pp_icon_nav_bg"]);
            Configuration::updateValue('RTC_PP_ICON_NAV_BG_HOVER', $this -> defaults["pp_icon_nav_bg_hover"]);
            Configuration::updateValue('RTC_PP_SOCIAL_BG', $this -> defaults["pp_social_bg"]);
            Configuration::updateValue('RTC_PP_SOCIAL_COLOR', $this -> defaults["pp_social_color"]);
            Configuration::updateValue('RTC_PP_USEFUL_COLOR', $this -> defaults["pp_useful_color"]);
            Configuration::updateValue('RTC_PP_USEFUL_COLOR_HOVER', $this -> defaults["pp_useful_color_hover"]);
            Configuration::updateValue('RTC_PP_USEFUL_ICON', $this -> defaults["pp_useful_icon"]);
            Configuration::updateValue('RTC_PP_DISPLAY_SOCIAL', $this -> defaults["pp_display_social"]);
            Configuration::updateValue('RTC_PP_DISPLAY_WISH', $this -> defaults["pp_display_wish"]);
            Configuration::updateValue('RTC_PP_DISPLAY_SEND', $this -> defaults["pp_display_send"]);
            Configuration::updateValue('RTC_PP_DISPLAY_PRINT', $this -> defaults["pp_display_print"]);
            Configuration::updateValue('RTC_PP_NAME', $this -> defaults["pp_name"]);
            Configuration::updateValue('RTC_PP_DESC', $this -> defaults["pp_desc"]);
            Configuration::updateValue('RTC_PP_INFO_LABEL', $this -> defaults["pp_info_label"]);
            Configuration::updateValue('RTC_PP_INFO_VALUE', $this -> defaults["pp_info_value"]);
            Configuration::updateValue('RTC_PP_DISPLAY_REFER', $this -> defaults["pp_display_refer"]);
            Configuration::updateValue('RTC_PP_DISPLAY_COND', $this -> defaults["pp_display_cond"]);
            Configuration::updateValue('RTC_PP_DISPLAY_AVAIL', $this -> defaults["pp_display_avail"]);
            Configuration::updateValue('RTC_PP_ATT_LABEL', $this -> defaults["pp_att_label"]);
            Configuration::updateValue('RTC_PP_ATT_INPUT_BG', $this -> defaults["pp_att_input_bg"]);
            Configuration::updateValue('RTC_PP_ATT_COLOR', $this -> defaults["pp_att_color"]);
            Configuration::updateValue('RTC_PP_ATT_COLOR_ACTIVE', $this -> defaults["pp_att_color_active"]);
            Configuration::updateValue('RTC_PP_ATT_QUAN_INPUT_BG', $this -> defaults["pp_att_quan_input_bg"]);
            Configuration::updateValue('RTC_PP_ATT_QUAN_PM_BG', $this -> defaults["pp_att_quan_pm_bg"]);
            Configuration::updateValue('RTC_PP_ATT_QUAN_PM_BG_HOVER', $this -> defaults["pp_att_quan_pm_bg_hover"]);
            Configuration::updateValue('RTC_PP_ATT_QUAN_PM_COLOR', $this -> defaults["pp_att_quan_pm_color"]);
            Configuration::updateValue('RTC_PP_ATT_QUAN_PM_COLOR_HOVER', $this -> defaults["pp_att_quan_pm_color_hover"]);
            Configuration::updateValue('NC_PP_ADD_BG', $this -> defaults["nc_pp_add_bg"]);
            Configuration::updateValue('NC_PP_ADD_BORDER', $this -> defaults["nc_pp_add_border"]);
            Configuration::updateValue('NC_PP_ADD_COLOR', $this -> defaults["nc_pp_add_color"]);
            Configuration::updateValue('RTC_PP_QW_BG', $this -> defaults["pp_qw_bg"]);
            Configuration::updateValue('RTC_PP_PRICE_BOX', $this -> defaults["pp_price_box"]);
            Configuration::updateValue('RTC_PP_PRICE_BORDER', $this -> defaults["pp_price_border"]);
            Configuration::updateValue('RTC_PP_PRICE_SEPARATOR', $this -> defaults["pp_price_separator"]);
            Configuration::updateValue('RTC_PP_PRICE_COLOR', $this -> defaults["pp_price_color"]);
            Configuration::updateValue('RTC_PP_TABS_BG', $this -> defaults["pp_tabs_bg"]);
            Configuration::updateValue('RTC_PP_TABS_BG_HOVER', $this -> defaults["pp_tabs_bg_hover"]);
            Configuration::updateValue('RTC_PP_TABS_COLOR', $this -> defaults["pp_tabs_color"]);
            Configuration::updateValue('RTC_PP_TABS_COLOR_HOVER', $this -> defaults["pp_tabs_color_hover"]);
            Configuration::updateValue('RTC_PP_TABS_SHEETS_BG', $this -> defaults["pp_tabs_sheets_bg"]);
            Configuration::updateValue('RTC_PP_TABS_SHEETS_COLOR', $this -> defaults["pp_tabs_sheets_color"]);
            Configuration::updateValue('RTC_PP_TABS_TABLE_LEFT', $this -> defaults["pp_tabs_table_left"]);
            Configuration::updateValue('RTC_PP_TABS_TABLE_RIGHT', $this -> defaults["pp_tabs_table_right"]);
            Configuration::updateValue('RTC_PP_TABS_TABLE_LEFT_COLOR', $this -> defaults["pp_tabs_table_left_color"]);
            Configuration::updateValue('RTC_PP_TABS_TABLE_RIGHT_COLOR', $this -> defaults["pp_tabs_table_right_color"]);
            Configuration::updateValue('RTC_PP_REVIEWS_STARON', $this -> defaults["pp_reviews_staron"]);
            Configuration::updateValue('RTC_PP_REVIEWS_STAROFF', $this -> defaults["pp_reviews_staroff"]);
            Configuration::updateValue('RTC_PP_REVIEWS_NAME', $this -> defaults["pp_reviews_name"]);
            Configuration::updateValue('RTC_PP_REVIEWS_DATE', $this -> defaults["pp_reviews_date"]);
            Configuration::updateValue('RTC_PP_REVIEWS_NAME_SEPARATOR', $this -> defaults["pp_reviews_name_separator"]);
            Configuration::updateValue('RTC_PP_REVIEWS_BLOCK_SEPARATOR', $this -> defaults["pp_reviews_block_separator"]);
            Configuration::updateValue('RTC_PP_REVIEWS_USEFUL', $this -> defaults["pp_reviews_useful"]);
            Configuration::updateValue('RTC_PP_REVIEWS_REPORT', $this -> defaults["pp_reviews_report"]);
            Configuration::updateValue('RTC_PP_REVIEWS_YN', $this -> defaults["pp_reviews_yn"]);
            Configuration::updateValue('RTC_PP_REVIEWS_YN_BORDER', $this -> defaults["pp_reviews_yn_border"]);
            Configuration::updateValue('RTC_PP_AC_NAME', $this -> defaults["pp_ac_name"]);
            Configuration::updateValue('RTC_PP_AC_PRICE', $this -> defaults["pp_ac_price"]);
            Configuration::updateValue('RTC_PP_AC_DESC', $this -> defaults["pp_ac_desc"]);
            Configuration::updateValue('RTC_C_TITLE', $this -> defaults["c_title"]);
            Configuration::updateValue('NC_C_TITLE_HOVER', $this -> defaults["nc_c_title_hover"]);
            Configuration::updateValue('NC_SOLDOUT_BG', $this -> defaults["nc_soldout_bg"]);
            Configuration::updateValue('NC_SOLDOUT_BORDER', $this -> defaults["nc_soldout_border"]);
            Configuration::updateValue('NC_SOLDOUT_COLOR', $this -> defaults["nc_soldout_color"]);
            Configuration::updateValue('RTC_C_PRODUCTS', $this -> defaults["c_products"]);
            Configuration::updateValue('RTC_C_BG', $this -> defaults["c_bg"]);
            Configuration::updateValue('RTC_C_BG_HOVER', $this -> defaults["c_bg_hover"]);
            Configuration::updateValue('RTC_C_BORDER', $this -> defaults["c_border"]);
            Configuration::updateValue('RTC_C_BG_ICON', $this -> defaults["c_bg_icon"]);
            Configuration::updateValue('RTC_C_BORDER_ICON', $this -> defaults["c_border_icon"]);
            Configuration::updateValue('RTC_C_DISPLAY_ARROW', $this -> defaults["c_display_arrow"]);
            Configuration::updateValue('RTC_C_POPUP_BG', $this -> defaults["c_popup_bg"]);
            Configuration::updateValue('RTC_C_POPUP_BORDER', $this -> defaults["c_popup_border"]);
            Configuration::updateValue('RTC_C_POPUP_SHADOW', $this -> defaults["c_popup_shadow"]);
            Configuration::updateValue('RTC_C_PRODUCT_Q', $this -> defaults["c_product_q"]);
            Configuration::updateValue('RTC_C_PRODUCT_NAME', $this -> defaults["c_product_name"]);
            Configuration::updateValue('RTC_C_PRODUCT_NAME_HOVER', $this -> defaults["c_product_name_hover"]);
            Configuration::updateValue('RTC_C_PRODUCT_ATTS', $this -> defaults["c_product_atts"]);
            Configuration::updateValue('RTC_C_PRODUCT_PRICE', $this -> defaults["c_product_price"]);
            Configuration::updateValue('RTC_C_PRODUCT_REMOVE', $this -> defaults["c_product_remove"]);
            Configuration::updateValue('RTC_C_PRODUCT_REMOVE_HOVER', $this -> defaults["c_product_remove_hover"]);
            Configuration::updateValue('RTC_C_PRODUCT_SEPARATOR', $this -> defaults["c_product_separator"]);
            Configuration::updateValue('RTC_C_PRODUCT_SUMMARY_BG', $this -> defaults["c_product_summary_bg"]);
            Configuration::updateValue('RTC_C_PRODUCT_SUMMARY_TITLE', $this -> defaults["c_product_summary_title"]);
            Configuration::updateValue('RTC_C_PRODUCT_SUMMARY_VALUE', $this -> defaults["c_product_summary_value"]);
            Configuration::updateValue('RTC_C_SUMMARY_BORDER', $this -> defaults["c_summary_border"]);
            Configuration::updateValue('RTC_C_ARROW_COLOR', $this -> defaults["c_arrow_color"]);
            Configuration::updateValue('RTC_LC_BG', $this -> defaults["lc_bg"]);
            Configuration::updateValue('RTC_LC_V_SEPARATOR', $this -> defaults["lc_v_separator"]);
            Configuration::updateValue('RTC_LC_H_SEPARATOR', $this -> defaults["lc_h_separator"]);
            Configuration::updateValue('RTC_LC_SUCCESS_BG', $this -> defaults["lc_success_bg"]);
            Configuration::updateValue('RTC_LC_SUCCESS_COLOR', $this -> defaults["lc_success_color"]);
            Configuration::updateValue('RTC_LC_IMG_BORDER', $this -> defaults["lc_img_border"]);
            Configuration::updateValue('RTC_LC_PRODUCT_NAME', $this -> defaults["lc_product_name"]);
            Configuration::updateValue('RTC_LC_PRODUCT_ATTS', $this -> defaults["lc_product_atts"]);
            Configuration::updateValue('RTC_LC_PRODUCT_ATTS_LABEL', $this -> defaults["lc_product_atts_label"]);
            Configuration::updateValue('RTC_LC_IN_CART_BG', $this -> defaults["lc_in_cart_bg"]);
            Configuration::updateValue('RTC_LC_IN_CART_COLOR', $this -> defaults["lc_in_cart_color"]);
            Configuration::updateValue('RTC_LC_TOTAL_BG', $this -> defaults["lc_total_bg"]);
            Configuration::updateValue('RTC_LC_TOTAL_LABEL', $this -> defaults["lc_total_label"]);
            Configuration::updateValue('RTC_LC_TOTAL_COLOR', $this -> defaults["lc_total_color"]);
            Configuration::updateValue('RTC_LC_CROSS_TITLE', $this -> defaults["lc_cross_title"]);
            Configuration::updateValue('RTC_LC_CLOSE', $this -> defaults["lc_close"]);
            Configuration::updateValue('RTC_LC_CLOSE_HOVER', $this -> defaults["lc_close_hover"]);
            Configuration::updateValue('RTC_FOOTER_BACKGROUND_COLOR', $this -> defaults["footer_background_color"]);
            Configuration::updateValue('RTC_FOOTER_TOP_LINE', $this -> defaults["footer_top_line"]);
            Configuration::updateValue('RTC_FOOTER_TOP_LINE_HEADINGS', $this -> defaults["footer_top_line_headings"]);
            Configuration::updateValue('RTC_NS_BORDER', $this -> defaults["ns_border"]);
            Configuration::updateValue('RTC_FOOTER_NEWS_INPUT', $this -> defaults["footer_news_input"]);
            Configuration::updateValue('NC_FOOTER_NEWS_BORDER', $this -> defaults["nc_footer_news_border"]);
            Configuration::updateValue('NC_FOOTER_CI_BG', $this -> defaults["nc_footer_ci_bg"]);
            Configuration::updateValue('NC_LOADER_COLOR', $this -> defaults["nc_loader_color"]);
            Configuration::updateValue('RTC_FOOTER_NEWS_BUTTON', $this -> defaults["footer_news_button"]);
            Configuration::updateValue('RTC_FOOTER_NEWS_BUTTON_BG', $this -> defaults["footer_news_button_bg"]);
            Configuration::updateValue('RTC_FOOTER_NEWS_BUTTON_BORDER', $this -> defaults["footer_news_button_border"]);
            Configuration::updateValue('RTC_FOOTER_NEWS_DISPLAY', $this -> defaults["footer_news_display"]);
            Configuration::updateValue('RTC_FOOTER_SOCIAL_DISPLAY', $this -> defaults["footer_social_display"]);
            Configuration::updateValue('NC_FOOTER_HEADINGS', $this -> defaults["nc_footer_headings"]);
            Configuration::updateValue('RTC_FOOTER_TXT_COLOR', $this -> defaults["footer_txt_color"]);
            Configuration::updateValue('RTC_FOOTER_LINK_COLOR', $this -> defaults["footer_link_color"]);
            Configuration::updateValue('RTC_FOOTER_HOVER_COLOR', $this -> defaults["footer_hover_color"]);
            Configuration::updateValue('RTC_FOOTER_ACCOUNT_DISC', $this -> defaults["footer_account_disc"]);
            Configuration::updateValue('RTC_FOOTER_UP_BG', $this -> defaults["footer_up_bg"]);
            Configuration::updateValue('RTC_FOOTER_UP_DISPLAY', $this -> defaults["footer_up_display"]);
            Configuration::updateValue('RTC_FOOTER_CONTACT_DISPLAY', $this -> defaults["footer_contact_display"]);
            Configuration::updateValue('RTC_FOOTER_ACCOUNT_DISPLAY', $this -> defaults["footer_account_display"]);
            Configuration::updateValue('RTC_FOOTER_CATEGORIES_DISPLAY', $this -> defaults["footer_categories_display"]);
            Configuration::updateValue('RTC_FOOTER_INFO_DISPLAY', $this -> defaults["footer_info_display"]);
            Configuration::updateValue('RTC_FOOTER_BOTTOM_LINE', $this -> defaults["footer_bottom_line"]);
            Configuration::updateValue('RTC_FOOTER_PAYMENT_DISPLAY', $this -> defaults["footer_payment_display"]);
            Configuration::updateValue('RTC_FOOTER_PL_VISA', $this -> defaults["footer_pl_visa"]);
            Configuration::updateValue('RTC_FOOTER_PL_MASTERCARD', $this -> defaults["footer_pl_mastercard"]);
            Configuration::updateValue('RTC_FOOTER_PL_MAESTRO', $this -> defaults["footer_pl_maestro"]);
            Configuration::updateValue('RTC_FOOTER_PL_DISCOVER', $this -> defaults["footer_pl_discover"]);
            Configuration::updateValue('RTC_FOOTER_PL_PAYPAL', $this -> defaults["footer_pl_paypal"]);
            Configuration::updateValue('RTC_FOOTER_COPYRIGHT_DISPLAY', $this -> defaults["footer_copyright_display"]);
            Configuration::updateValue('RTC_FOOTER_BOTTOM_TEXT', $this -> defaults["footer_bottom_text"]);
            Configuration::updateValue('RTC_LATIN_EXT', $this -> defaults["latin_ext"]);
            Configuration::updateValue('RTC_CYRILLIC', $this -> defaults["cyrillic"]);
            Configuration::updateValue('NC_PP_ATT_RIGHT', $this -> defaults["nc_pp_att_right"]);
            Configuration::updateValue('NC_LONG_PRICES', $this -> defaults["nc_long_prices"]);
            Configuration::updateValue('NC_SHOW_IP', $this -> defaults["nc_show_ip"]);
            Configuration::updateValue('NC_MAN_TEXT', $this -> defaults["nc_man_text"]);
            Configuration::updateValue('NC_MAN_LOGO', $this -> defaults["nc_man_logo"]);
            Configuration::updateValue('NC_RGRID', $this -> defaults["nc_rgrid"]);
            Configuration::updateValue('NC_RNUM', $this -> defaults["nc_rnum"]);
            Configuration::updateValue('NC_RTOP', $this -> defaults["nc_rtop"]);
            Configuration::updateValue('NC_RBG', $this -> defaults["nc_rbg"]);
            Configuration::updateValue('NC_RLIST', $this -> defaults["nc_rlist"]);
            Configuration::updateValue('NC_RHIDE', $this -> defaults["nc_rhide"]);
            Configuration::updateValue('NC_COUNT', $this -> defaults["nc_count"]);
            Configuration::updateValue('NC_COUNT_DAYS', $this -> defaults["nc_count_days"]);
            Configuration::updateValue('NC_COUNT_BG', $this -> defaults["nc_count_bg"]);
            Configuration::updateValue('NC_COUNT_COLOR', $this -> defaults["nc_count_color"]);
            Configuration::updateValue('NC_COUNT_SEP', $this -> defaults["nc_count_sep"]);
            Configuration::updateValue('NC_COUNT_PR_TITLE', $this -> defaults["nc_count_pr_title"]);
            Configuration::updateValue('NC_COUNT_PR_TITLEBG', $this -> defaults["nc_count_pr_titlebg"]);
            Configuration::updateValue('NC_COUNT_PR_BG', $this -> defaults["nc_count_pr_bg"]);
            Configuration::updateValue('NC_COUNT_PR_COLOR', $this -> defaults["nc_count_pr_color"]);
            Configuration::updateValue('NC_COUNT_PR_SEP', $this -> defaults["nc_count_pr_sep"]);
            Configuration::updateValue('NC_M_MODE', $this -> defaults["nc_m_mode"]);
            Configuration::updateValue('NC_PRODUCT_SWITCH', $this -> defaults["nc_product_switch"]);
            Configuration::updateValue('NC_CAROUSEL_FEATURED', $this -> defaults["nc_carousel_featured"]);
            Configuration::updateValue('NC_AUTO_FEATURED', $this -> defaults["nc_auto_featured"]);
            Configuration::updateValue('NC_ITEMS_FEATURED', $this -> defaults["nc_items_featured"]);
            Configuration::updateValue('NC_CAROUSEL_NEW', $this -> defaults["nc_carousel_new"]);
            Configuration::updateValue('NC_AUTO_NEW', $this -> defaults["nc_auto_new"]);
            Configuration::updateValue('NC_ITEMS_NEW', $this -> defaults["nc_items_new"]);
            Configuration::updateValue('NC_CAROUSEL_BEST', $this -> defaults["nc_carousel_best"]);
            Configuration::updateValue('NC_AUTO_BEST', $this -> defaults["nc_auto_best"]);
            Configuration::updateValue('NC_ITEMS_BEST', $this -> defaults["nc_items_best"]);
            Configuration::updateValue('NC_CAROUSEL_SALE', $this -> defaults["nc_carousel_sale"]);
            Configuration::updateValue('NC_AUTO_SALE', $this -> defaults["nc_auto_sale"]);
            Configuration::updateValue('NC_ITEMS_SALE', $this -> defaults["nc_items_sale"]);
            Configuration::updateValue('NC_UP_MENU', $this -> defaults["nc_up_menu"]);
            Configuration::updateValue('NC_UP_HEAD', $this -> defaults["nc_up_head"]);
            Configuration::updateValue('NC_UP_BUT', $this -> defaults["nc_up_but"]);
            Configuration::updateValue('NC_M_CHEV', $this -> defaults["nc_m_chev"]);
            Configuration::updateValue('NC_M_BT', $this -> defaults["nc_m_bt"]);
            Configuration::updateValue('NC_M_BR', $this -> defaults["nc_m_br"]);
            Configuration::updateValue('NC_M_BB', $this -> defaults["nc_m_bb"]);
            Configuration::updateValue('NC_M_BL', $this -> defaults["nc_m_bl"]);
            Configuration::updateValue('NC_M_RADIUS', $this -> defaults["nc_m_radius"]);
            Configuration::updateValue('NC_M_NOTE', $this -> defaults["nc_m_note"]);
            Configuration::updateValue('NC_M_ICON', $this -> defaults["nc_m_icon"]);
            Configuration::updateValue('NC_MV_BG', $this -> defaults["nc_mv_bg"]);
            Configuration::updateValue('NC_MV_COLOR', $this -> defaults["nc_mv_color"]);
            Configuration::updateValue('NC_MV_ICON', $this -> defaults["nc_mv_icon"]);
            Configuration::updateValue('NC_MV_BG_HOVER', $this -> defaults["nc_mv_bg_hover"]);
            Configuration::updateValue('NC_MV_HOVER', $this -> defaults["nc_mv_hover"]);
            Configuration::updateValue('NC_MV_TAB', $this -> defaults["nc_mv_tab"]);
            Configuration::updateValue('NC_MV_BOR', $this -> defaults["nc_mv_bor"]);
            Configuration::updateValue('NC_CSS', $this -> defaults["nc_css"]);
            Configuration::updateValue('RTC_COPYRIGHT_TEXT', array('1' => 'Copyright 2014 RoyThemes. All Rights Reserved.', '2' => 'Copyright 2014 RoyThemes. All Rights Reserved.'));

            $this -> generateCss();
        }

        if ($errors)
            $output .= $this -> displayError($errors);

        return $output . $this -> displayForm();
    }


    public function displayForm() {
        $defaultLanguage = (int)(Configuration::get('PS_LANG_DEFAULT'));
        $languages = Language::getLanguages(false);
        $divLangName = 'text¤title';
        $html="";
        $html .= '
		<script type="text/javascript">
			id_language = Number(' . $defaultLanguage . ');
		</script>

		<form action="' . Tools::safeOutput($_SERVER['REQUEST_URI']) . '" method="post" enctype="multipart/form-data" class="roytc_form">
			<fieldset class="roytc_filedset" style="margin-bottom: 20px;">

            <div style="display:table; width:100%;">
                <div style="display:table-row">
                    <div class="roytc_navigation">
                        <ul id="#sidenav" class="ulnav">
                            <li class="rtc_menu1">
                                <a data-toggle="tab" title="Gradient schemes and Backgrounds" href="#tab-gradient">Gradient schemes<br /> and Backgrounds</a>
                            </li>
                            <li class="rtc_menu2">
                                <a data-toggle="tab" title="Some Globals" href="#tab-global">Some Globals</a>
                            </li>
                            <li class="rtc_menu3">
                                <a data-toggle="tab" title="Fonts and Buttons" href="#tab-fonts">Fonts<br /> and Buttons</a>
                            </li>
                            <li class="rtc_menu4">
                                <a data-toggle="tab" title="Homepage and Top content" href="#tab-homepage">Homepage<br /> and Top content</a>
                                <span class="new_label" style="top:24%">New!</span>
                            </li>
                            <li class="rtc_menu5">
                                <a data-toggle="tab" title="Menu and Search" href="#tab-menu">Menu<br /> and Search</a>
                            </li>
                            <li class="rtc_menu6">
                                <a data-toggle="tab" title="Page elements" href="#tab-page">Page elements</a>
                            </li>
                            <li class="rtc_menu7">
                                <a data-toggle="tab" title="Product list" href="#tab-productlist">Product<br /> list</a>
                                <span class="new_label">New!</span>
                            </li>
                            <li class="rtc_menu8">
                                <a data-toggle="tab" title="Product page and Quick view" href="#tab-productpage">Product<br /> page</a>
                            </li>
                            <li class="rtc_menu9">
                                <a data-toggle="tab" title="Cart and buy message" href="#tab-cart">Cart<br /> and buy message</a>
                            </li>
                            <li class="rtc_menu10">
                                <a data-toggle="tab" title="Order steps" href="#tab-order">Order steps</a>
                            </li>
                            <li class="rtc_menu11">
                                <a data-toggle="tab" title="Registration and My Account" href="#tab-reg">Registration<br /> and My Account</a>
                            </li>
                            <li class="rtc_menu12">
                                <a data-toggle="tab" title="Footer" href="#tab-footer">Footer</a>
                            </li>
                            <li class="rtc_menu13">
                                <a data-toggle="tab" title="Blog" href="#tab-blog">Blog</a>
                            </li>
                            <li class="rtc_menu14">
                                <a data-toggle="tab" title="Ratings and reviews" href="#tab-ratings">Ratings<br /> and reviews</a>
                                <span class="hot_label">Hot!</span>
                            </li>
                            <li class="rtc_menu15">
                                <a data-toggle="tab" title="Custom CSS" href="#tab-css">Custom CSS</a>
                            </li>
                            <li class="rtc_menu16">
                                <a data-toggle="tab" title="Import / Export config" href="#tab-ie">Import / Export config</a>
                            </li>
                        </ul>
                    </div>


                <div class="roytc_content">
                    <div class="tab-pane" id ="tab-gradient">
                    <h2 class="rtc_title1">' . $this->l('Gradient schemes and Backgrounds') . '</h2>
                    <div class="roytc_row">
                        <label>' . $this->l('Gradient schemes') . '</label>
                        <div class="margin-form">
                        <label class="gradicon flameicon" for="gradient_scheme1">flame
                        <input type="radio" name="gradient_scheme"   value="flame" id="gradient_scheme1" ' . ((Configuration::get('RTC_GRADIENT_SCHEME') == "flame") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="gradicon watericon" for="gradient_scheme2">water
                        <input type="radio" name="gradient_scheme"   value="water" id="gradient_scheme2" ' . ((Configuration::get('RTC_GRADIENT_SCHEME') == "water") ? 'checked="checked" ' : '') . ' />
                        </label>

                        <label class="gradicon natureicon" for="gradient_scheme3">nature
                        <input type="radio" name="gradient_scheme"   value="nature" id="gradient_scheme3" ' . ((Configuration::get('RTC_GRADIENT_SCHEME') == "nature") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="gradicon lilacicon" for="gradient_scheme4">lilac
                        <input type="radio" name="gradient_scheme"   value="lilac" id="gradient_scheme4" ' . ((Configuration::get('RTC_GRADIENT_SCHEME') == "lilac") ? 'checked="checked" ' : '') . ' />
                        </label>

                        <label class="gradicon goldenicon" for="gradient_scheme5">golden
                        <input type="radio" name="gradient_scheme"   value="golden" id="gradient_scheme5" ' . ((Configuration::get('RTC_GRADIENT_SCHEME') == "golden") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="gradicon sunnyicon" for="gradient_scheme6">sunny
                        <input type="radio" name="gradient_scheme"   value="sunny" id="gradient_scheme6" ' . ((Configuration::get('RTC_GRADIENT_SCHEME') == "sunny") ? 'checked="checked" ' : '') . ' />
                        </label>

                        <label class="gradicon easyicon" for="gradient_scheme7">easy
                        <input type="radio" name="gradient_scheme"   value="easy" id="gradient_scheme7" ' . ((Configuration::get('RTC_GRADIENT_SCHEME') == "easy") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="gradicon foresticon" for="gradient_scheme8">forest
                        <input type="radio" name="gradient_scheme"   value="forest" id="gradient_scheme8" ' . ((Configuration::get('RTC_GRADIENT_SCHEME') == "forest") ? 'checked="checked" ' : '') . ' />
                        </label>

                        <label class="gradicon azureicon" for="gradient_scheme9">azure
                        <input type="radio" name="gradient_scheme"   value="azure" id="gradient_scheme9" ' . ((Configuration::get('RTC_GRADIENT_SCHEME') == "azure") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="gradicon retroicon" for="gradient_scheme10">retro
                        <input type="radio" name="gradient_scheme"   value="retro" id="gradient_scheme10" ' . ((Configuration::get('RTC_GRADIENT_SCHEME') == "retro") ? 'checked="checked" ' : '') . ' />
                        </label>

                        <label class="gradicon nighticon" for="gradient_scheme11">night
                        <input type="radio" name="gradient_scheme"   value="night" id="gradient_scheme11" ' . ((Configuration::get('RTC_GRADIENT_SCHEME') == "night") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="gradicon monoicon" for="gradient_scheme12">mono
                        <input type="radio" name="gradient_scheme"   value="mono" id="gradient_scheme12" ' . ((Configuration::get('RTC_GRADIENT_SCHEME') == "mono") ? 'checked="checked" ' : '') . ' />
                        </label>
                    </div></div>
                    <div class="roytc_row" style="margin-top:10px;">
                        <label>' . $this->l('Textures') . '</label>
                        <div class="margin-form">
                        <label class="paticon pat1" for="gradient_scheme13">
                        <input type="radio" name="gradient_scheme"   value="1" id="gradient_scheme13" ' . ((Configuration::get('RTC_TEXTURES') == "1") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat2" for="gradient_scheme14">
                        <input type="radio" name="gradient_scheme"   value="2" id="gradient_scheme14" ' . ((Configuration::get('RTC_TEXTURES') == "2") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat3" for="gradient_scheme15">
                        <input type="radio" name="gradient_scheme"   value="3" id="gradient_scheme15" ' . ((Configuration::get('RTC_TEXTURES') == "3") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat4" for="gradient_scheme16">
                        <input type="radio" name="gradient_scheme"   value="4" id="gradient_scheme16" ' . ((Configuration::get('RTC_TEXTURES') == "4") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat5" for="gradient_scheme17">
                        <input type="radio" name="gradient_scheme"   value="5" id="gradient_scheme17" ' . ((Configuration::get('RTC_TEXTURES') == "5") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat6" for="gradient_scheme18">
                        <input type="radio" name="gradient_scheme"   value="6" id="gradient_scheme18" ' . ((Configuration::get('RTC_TEXTURES') == "6") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat7" for="gradient_scheme19">
                        <input type="radio" name="gradient_scheme"   value="7" id="gradient_scheme19" ' . ((Configuration::get('RTC_TEXTURES') == "7") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat8" for="gradient_scheme20">
                        <input type="radio" name="gradient_scheme"   value="8" id="gradient_scheme20" ' . ((Configuration::get('RTC_TEXTURES') == "8") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat9" for="gradient_scheme21">
                        <input type="radio" name="gradient_scheme"   value="9" id="gradient_scheme21" ' . ((Configuration::get('RTC_TEXTURES') == "9") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat10" for="gradient_scheme22">
                        <input type="radio" name="gradient_scheme"   value="10" id="gradient_scheme22" ' . ((Configuration::get('RTC_TEXTURES') == "10") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat11" for="gradient_scheme23">
                        <input type="radio" name="gradient_scheme"   value="11" id="gradient_scheme23" ' . ((Configuration::get('RTC_TEXTURES') == "11") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat12" for="gradient_scheme24">
                        <input type="radio" name="gradient_scheme"   value="12" id="gradient_scheme24" ' . ((Configuration::get('RTC_TEXTURES') == "12") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat13" for="gradient_scheme25">
                        <input type="radio" name="gradient_scheme"   value="13" id="gradient_scheme25" ' . ((Configuration::get('RTC_TEXTURES') == "13") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat14" for="gradient_scheme26">
                        <input type="radio" name="gradient_scheme"   value="14" id="gradient_scheme26" ' . ((Configuration::get('RTC_TEXTURES') == "14") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat15" for="gradient_scheme27">
                        <input type="radio" name="gradient_scheme"   value="15" id="gradient_scheme27" ' . ((Configuration::get('RTC_TEXTURES') == "15") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat16" for="gradient_scheme28">
                        <input type="radio" name="gradient_scheme"   value="16" id="gradient_scheme28" ' . ((Configuration::get('RTC_TEXTURES') == "16") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat17" for="gradient_scheme29">
                        <input type="radio" name="gradient_scheme"   value="17" id="gradient_scheme29" ' . ((Configuration::get('RTC_TEXTURES') == "17") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat18" for="gradient_scheme30">
                        <input type="radio" name="gradient_scheme"   value="18" id="gradient_scheme30" ' . ((Configuration::get('RTC_TEXTURES') == "18") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat19" for="gradient_scheme31">
                        <input type="radio" name="gradient_scheme"   value="19" id="gradient_scheme31" ' . ((Configuration::get('RTC_TEXTURES') == "19") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat20" for="gradient_scheme32">
                        <input type="radio" name="gradient_scheme"   value="20" id="gradient_scheme32" ' . ((Configuration::get('RTC_TEXTURES') == "20") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat21" for="gradient_scheme33">
                        <input type="radio" name="gradient_scheme"   value="21" id="gradient_scheme33" ' . ((Configuration::get('RTC_TEXTURES') == "21") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat22" for="gradient_scheme34">
                        <input type="radio" name="gradient_scheme"   value="22" id="gradient_scheme34" ' . ((Configuration::get('RTC_TEXTURES') == "22") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat23" for="gradient_scheme35">
                        <input type="radio" name="gradient_scheme"   value="23" id="gradient_scheme35" ' . ((Configuration::get('RTC_TEXTURES') == "23") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat24" for="gradient_scheme36">
                        <input type="radio" name="gradient_scheme"   value="24" id="gradient_scheme36" ' . ((Configuration::get('RTC_TEXTURES') == "24") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat25" for="gradient_scheme37">
                        <input type="radio" name="gradient_scheme"   value="25" id="gradient_scheme37" ' . ((Configuration::get('RTC_TEXTURES') == "25") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat26" for="gradient_scheme38">
                        <input type="radio" name="gradient_scheme"   value="26" id="gradient_scheme38" ' . ((Configuration::get('RTC_TEXTURES') == "26") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat27" for="gradient_scheme39">
                        <input type="radio" name="gradient_scheme"   value="27" id="gradient_scheme39" ' . ((Configuration::get('RTC_TEXTURES') == "27") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat28" for="gradient_scheme40">
                        <input type="radio" name="gradient_scheme"   value="28" id="gradient_scheme40" ' . ((Configuration::get('RTC_TEXTURES') == "28") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat29" for="gradient_scheme41">
                        <input type="radio" name="gradient_scheme"   value="29" id="gradient_scheme41" ' . ((Configuration::get('RTC_TEXTURES') == "29") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat30" for="gradient_scheme42">
                        <input type="radio" name="gradient_scheme"   value="30" id="gradient_scheme42" ' . ((Configuration::get('RTC_TEXTURES') == "30") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat31" for="gradient_scheme43">
                        <input type="radio" name="gradient_scheme"   value="31" id="gradient_scheme43" ' . ((Configuration::get('RTC_TEXTURES') == "31") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat32" for="gradient_scheme44">
                        <input type="radio" name="gradient_scheme"   value="32" id="gradient_scheme44" ' . ((Configuration::get('RTC_TEXTURES') == "32") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat33" for="gradient_scheme45">
                        <input type="radio" name="gradient_scheme"   value="33" id="gradient_scheme45" ' . ((Configuration::get('RTC_TEXTURES') == "33") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat34" for="gradient_scheme46">
                        <input type="radio" name="gradient_scheme"   value="34" id="gradient_scheme46" ' . ((Configuration::get('RTC_TEXTURES') == "34") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat35" for="gradient_scheme47">
                        <input type="radio" name="gradient_scheme"   value="35" id="gradient_scheme47" ' . ((Configuration::get('RTC_TEXTURES') == "35") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat36" for="gradient_scheme48">
                        <input type="radio" name="gradient_scheme"   value="36" id="gradient_scheme48" ' . ((Configuration::get('RTC_TEXTURES') == "36") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat37" for="gradient_scheme49">
                        <input type="radio" name="gradient_scheme"   value="37" id="gradient_scheme49" ' . ((Configuration::get('RTC_TEXTURES') == "37") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat38" for="gradient_scheme50">
                        <input type="radio" name="gradient_scheme"   value="38" id="gradient_scheme50" ' . ((Configuration::get('RTC_TEXTURES') == "38") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat39" for="gradient_scheme51">
                        <input type="radio" name="gradient_scheme"   value="39" id="gradient_scheme51" ' . ((Configuration::get('RTC_TEXTURES') == "39") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat40" for="gradient_scheme52">
                        <input type="radio" name="gradient_scheme"   value="40" id="gradient_scheme52" ' . ((Configuration::get('RTC_TEXTURES') == "40") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat41" for="gradient_scheme53">
                        <input type="radio" name="gradient_scheme"   value="41" id="gradient_scheme53" ' . ((Configuration::get('RTC_TEXTURES') == "41") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat42" for="gradient_scheme54">
                        <input type="radio" name="gradient_scheme"   value="42" id="gradient_scheme54" ' . ((Configuration::get('RTC_TEXTURES') == "42") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat43" for="gradient_scheme55">
                        <input type="radio" name="gradient_scheme"   value="43" id="gradient_scheme55" ' . ((Configuration::get('RTC_TEXTURES') == "43") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat44" for="gradient_scheme56">
                        <input type="radio" name="gradient_scheme"   value="44" id="gradient_scheme56" ' . ((Configuration::get('RTC_TEXTURES') == "44") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat45" for="gradient_scheme57">
                        <input type="radio" name="gradient_scheme"   value="45" id="gradient_scheme57" ' . ((Configuration::get('RTC_TEXTURES') == "45") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat46" for="gradient_scheme58">
                        <input type="radio" name="gradient_scheme"   value="46" id="gradient_scheme58" ' . ((Configuration::get('RTC_TEXTURES') == "46") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat47" for="gradient_scheme59">
                        <input type="radio" name="gradient_scheme"   value="47" id="gradient_scheme59" ' . ((Configuration::get('RTC_TEXTURES') == "47") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat48" for="gradient_scheme60">
                        <input type="radio" name="gradient_scheme"   value="48" id="gradient_scheme60" ' . ((Configuration::get('RTC_TEXTURES') == "48") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat49" for="gradient_scheme61">
                        <input type="radio" name="gradient_scheme"   value="49" id="gradient_scheme61" ' . ((Configuration::get('RTC_TEXTURES') == "49") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat50" for="gradient_scheme62">
                        <input type="radio" name="gradient_scheme"   value="50" id="gradient_scheme62" ' . ((Configuration::get('RTC_TEXTURES') == "50") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat51" for="gradient_scheme63">
                        <input type="radio" name="gradient_scheme"   value="51" id="gradient_scheme63" ' . ((Configuration::get('RTC_TEXTURES') == "51") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat52" for="gradient_scheme64">
                        <input type="radio" name="gradient_scheme"   value="52" id="gradient_scheme64" ' . ((Configuration::get('RTC_TEXTURES') == "52") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat53" for="gradient_scheme65">
                        <input type="radio" name="gradient_scheme"   value="53" id="gradient_scheme65" ' . ((Configuration::get('RTC_TEXTURES') == "53") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat54" for="gradient_scheme66">
                        <input type="radio" name="gradient_scheme"   value="54" id="gradient_scheme66" ' . ((Configuration::get('RTC_TEXTURES') == "54") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat55" for="gradient_scheme67">
                        <input type="radio" name="gradient_scheme"   value="55" id="gradient_scheme67" ' . ((Configuration::get('RTC_TEXTURES') == "55") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat56" for="gradient_scheme68">
                        <input type="radio" name="gradient_scheme"   value="56" id="gradient_scheme68" ' . ((Configuration::get('RTC_TEXTURES') == "56") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat57" for="gradient_scheme69">
                        <input type="radio" name="gradient_scheme"   value="57" id="gradient_scheme69" ' . ((Configuration::get('RTC_TEXTURES') == "57") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat58" for="gradient_scheme70">
                        <input type="radio" name="gradient_scheme"   value="58" id="gradient_scheme70" ' . ((Configuration::get('RTC_TEXTURES') == "58") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat59" for="gradient_scheme71">
                        <input type="radio" name="gradient_scheme"   value="59" id="gradient_scheme71" ' . ((Configuration::get('RTC_TEXTURES') == "59") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat60" for="gradient_scheme72">
                        <input type="radio" name="gradient_scheme"   value="60" id="gradient_scheme72" ' . ((Configuration::get('RTC_TEXTURES') == "60") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat61" for="gradient_scheme73">
                        <input type="radio" name="gradient_scheme"   value="61" id="gradient_scheme73" ' . ((Configuration::get('RTC_TEXTURES') == "61") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat62" for="gradient_scheme74">
                        <input type="radio" name="gradient_scheme"   value="62" id="gradient_scheme74" ' . ((Configuration::get('RTC_TEXTURES') == "62") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat63" for="gradient_scheme75">
                        <input type="radio" name="gradient_scheme"   value="63" id="gradient_scheme75" ' . ((Configuration::get('RTC_TEXTURES') == "63") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat64" for="gradient_scheme76">
                        <input type="radio" name="gradient_scheme"   value="64" id="gradient_scheme76" ' . ((Configuration::get('RTC_TEXTURES') == "64") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat65" for="gradient_scheme77">
                        <input type="radio" name="gradient_scheme"   value="65" id="gradient_scheme77" ' . ((Configuration::get('RTC_TEXTURES') == "65") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat66" for="gradient_scheme78">
                        <input type="radio" name="gradient_scheme"   value="66" id="gradient_scheme78" ' . ((Configuration::get('RTC_TEXTURES') == "66") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat67" for="gradient_scheme79">
                        <input type="radio" name="gradient_scheme"   value="67" id="gradient_scheme79" ' . ((Configuration::get('RTC_TEXTURES') == "67") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat68" for="gradient_scheme80">
                        <input type="radio" name="gradient_scheme"   value="68" id="gradient_scheme80" ' . ((Configuration::get('RTC_TEXTURES') == "68") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat69" for="gradient_scheme81">
                        <input type="radio" name="gradient_scheme"   value="69" id="gradient_scheme81" ' . ((Configuration::get('RTC_TEXTURES') == "69") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat70" for="gradient_scheme82">
                        <input type="radio" name="gradient_scheme"   value="70" id="gradient_scheme82" ' . ((Configuration::get('RTC_TEXTURES') == "70") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat71" for="gradient_scheme83">
                        <input type="radio" name="gradient_scheme"   value="71" id="gradient_scheme83" ' . ((Configuration::get('RTC_TEXTURES') == "71") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat72" for="gradient_scheme84">
                        <input type="radio" name="gradient_scheme"   value=72"" id="gradient_scheme84" ' . ((Configuration::get('RTC_TEXTURES') == "72") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat73" for="gradient_scheme85">
                        <input type="radio" name="gradient_scheme"   value="73" id="gradient_scheme85" ' . ((Configuration::get('RTC_TEXTURES') == "73") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat74" for="gradient_scheme86">
                        <input type="radio" name="gradient_scheme"   value="74" id="gradient_scheme86" ' . ((Configuration::get('RTC_TEXTURES') == "74") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat75" for="gradient_scheme87">
                        <input type="radio" name="gradient_scheme"   value="75" id="gradient_scheme87" ' . ((Configuration::get('RTC_TEXTURES') == "75") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat76" for="gradient_scheme88">
                        <input type="radio" name="gradient_scheme"   value="76" id="gradient_scheme88" ' . ((Configuration::get('RTC_TEXTURES') == "76") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat77" for="gradient_scheme89">
                        <input type="radio" name="gradient_scheme"   value="77" id="gradient_scheme89" ' . ((Configuration::get('RTC_TEXTURES') == "77") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat78" for="gradient_scheme90">
                        <input type="radio" name="gradient_scheme"   value="78" id="gradient_scheme90" ' . ((Configuration::get('RTC_TEXTURES') == "78") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <label class="paticon pat79" for="gradient_scheme91">
                        <input type="radio" name="gradient_scheme"   value="79" id="gradient_scheme91" ' . ((Configuration::get('RTC_TEXTURES') == "79") ? 'checked="checked" ' : '') . ' />
                        </label>
                        <p class="clear link">Textures taken from the <a href="http://subtlepatterns.com/" target="_blank">subtlepatterns.com</a></p>
                    </div></div>

                ';

        $html .= $this -> backgroundOptions($panel="body", $panelupper="BODY");

        $html .= '
             <div class="roytc_row">
                    <label>' . $this->l('Display Gradients, Textures or Images?') . '</label>
				    <div class="margin-form">
					<input type="radio" class="regular-radio" name="display_gradient" id="display_gradient_1" value="1" ' . ((Configuration::get('RTC_DISPLAY_GRADIENT') == 1) ? 'checked="checked" ' : '') . '/>
					<label class="t" for="display_gradient_1"> Yes</label>
					<input type="radio" class="regular-radio" name="display_gradient" id="display_gradient_0" value="0" ' . ((Configuration::get('RTC_DISPLAY_GRADIENT') == 0) ? 'checked="checked" ' : '') . '/>
					<label class="t" for="display_gradient_0"> No</label>
					<p class="clear helpcontent">' . $this->l('If you want to show only Main Background Color, then turn it off') . '</p>
		     </div></div>

            <div class="roytc_row">
                    <label>' . $this->l('Main Background Color') . '</label>
			    	<div class="margin-form">
					<input type="color" name="main_background_color"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_MAIN_BACKGROUND_COLOR') . '" />
				</div></div>
                <div class="roytc_row">
                    <label>' . $this->l('Content Background') . '</label>
			    	<div class="margin-form">
					<input type="color" name="content_background_color"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_CONTENT_BACKGROUND_COLOR') . '" />
				</div></div>
				';
        $html .= '
		    	</div>


            <div class="tab-pane" id ="tab-global">
                    <h2 class="rtc_title2">' . $this->l('Some Globals') . '</h2>
                        <div class="roytc_row">
                        <label>' . $this->l('Display Loader?') . '</label>
                        <div class="margin-form">
                            <input type="radio" class="regular-radio" name="nc_loader" id="nc_loader_1" value="1" ' . ((Configuration::get('NC_LOADER') == 1) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="nc_loader_1"> Yes</label>
                            <input type="radio" class="regular-radio" name="nc_loader" id="nc_loader_0" value="0" ' . ((Configuration::get('NC_LOADER') == 0) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="nc_loader_0"> No</label>
                        </div></div>

                <div class="roytc_row">
                    <label>' . $this->l('Loader color') . '</label>
			    	<div class="margin-form">
					<input type="color" name="nc_loader_color"  class="colorpicker" data-hex="true" value="' . Configuration::get('NC_LOADER_COLOR') . '" />
				</div></div>
                <div class="roytc_row">
                    <label>' . $this->l('Body text color') . '</label>
			    	<div class="margin-form">
					<input type="color" name="nc_g_body_text"  class="colorpicker" data-hex="true" value="' . Configuration::get('NC_G_BODY_TEXT') . '" />
				</div></div>
                <div class="roytc_row">
                    <label>' . $this->l('Body link color') . '</label>
			    	<div class="margin-form">
					<input type="color" name="g_body_link"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_G_BODY_LINK') . '" />
				</div></div>
                <div class="roytc_row">
                    <label>' . $this->l('Body hover link color') . '</label>
			    	<div class="margin-form">
					<input type="color" name="g_body_link_hover"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_G_BODY_LINK_HOVER') . '" />
				</div></div>
                <div class="roytc_row">
                    <label>' . $this->l('Body table background') . '</label>
			    	<div class="margin-form">
					<input type="color" name="g_table_bg"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_G_TABLE_BG') . '" />
				</div></div>
                <div class="roytc_row">
                    <label>' . $this->l('Body table title background') . '</label>
			    	<div class="margin-form">
					<input type="color" name="g_table_title_bg"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_G_TABLE_TITLE_BG') . '" />
				</div></div>
                <div class="roytc_row">
                    <label>' . $this->l('Body table title color') . '</label>
			    	<div class="margin-form">
					<input type="color" name="g_table_title_color"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_G_TABLE_TITLE_COLOR') . '" />
				</div></div>
                <div class="roytc_row">
                    <label>' . $this->l('Body table total background') . '</label>
			    	<div class="margin-form">
					<input type="color" name="g_table_total"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_G_TABLE_TOTAL') . '" />
				</div></div>
                <div class="roytc_row">
                    <label>' . $this->l('Body box background') . '</label>
			    	<div class="margin-form">
					<input type="color" name="g_box"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_BOX') . '" />
				</div></div>
                <div class="roytc_row">
                    <label>' . $this->l('Body box title') . '</label>
			    	<div class="margin-form">
					<input type="color" name="g_box_title"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_BOX_TITLE') . '" />
				</div></div>
                <div class="roytc_row">
                    <label>' . $this->l('Body box title border') . '</label>
			    	<div class="margin-form">
					<input type="color" name="g_box_title_border"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_BOX_TITLE_BORDER') . '" />
				</div></div>
                <div class="roytc_row">
                    <label>' . $this->l('Body label') . '</label>
			    	<div class="margin-form">
					<input type="color" name="g_label"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_LABEL') . '" />
				</div></div>
                <div class="roytc_row">
                    <label>' . $this->l('Body checkbox label') . '</label>
			    	<div class="margin-form">
					<input type="color" name="g_checkbox_label"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_CHECKBOX_LABEL') . '" />
				</div></div>
                <div class="roytc_row">
                    <label>' . $this->l('Body input background') . '</label>
			    	<div class="margin-form">
					<input type="color" name="g_input_bg"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_INPUT_BG') . '" />
				</div></div>
                <div class="roytc_row">
                    <label>' . $this->l('Body input border') . '</label>
			    	<div class="margin-form">
					<input type="color" name="g_input_border"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_INPUT_BORDER') . '" />
				</div></div>
                <div class="roytc_row">
                    <label>' . $this->l('Body input color') . '</label>
			    	<div class="margin-form">
					<input type="color" name="g_input_color"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_INPUT_COLOR') . '" />
				</div></div>
                <div class="roytc_row">
                    <label>' . $this->l('Body form background') . '</label>
			    	<div class="margin-form">
					<input type="color" name="g_form"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_FORM') . '" />
				</div></div>
                <div class="roytc_row">
                    <label>' . $this->l('Body form grey background') . '</label>
			    	<div class="margin-form">
					<input type="color" name="g_form_grey"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_FORM_GREY') . '" />
				</div></div>
            </div>

            <div class="tab-pane" id ="tab-fonts">
                    <h2 class="rtc_title3">' . $this->l('Fonts and buttons') . '</h2>
                    <div class="roytc_row">
		        		<label>' . $this->l('Headings, menu links and buttons font') . '</label>
                        <div class="margin-form">
                        ';
        $html .= $this -> fontOptions($panel="f_headings", $panelupper="RTC_F_HEADINGS");
        $html .= '
                                <p id="headingexample" class="fontshow" style="text-transform:uppercase;">' . $this->l('Headings font now looks like this ... ( Latin ext: ą, ć, ž, Š ... Cyrillic: я, ж, Щ, Ю )') . '</p>
                                <p class="clear helpcontent" style="margin-top:0.5em">' . $this->l('Choose font for headings, menu links and buttons. Default: Oswald') . '</p>
                                </div>

                                <label>' . $this->l('Text font') . '</label>
                                <div class="margin-form">
                                ';
        $html .= $this -> fontOptions($panel="f_text", $panelupper="RTC_F_TEXT");
        $html .= '
                                <p id="textexample" class="fontshow">' . $this->l('Text font now looks like this ... ( Latin ext: ą, ć, ž, Š ... Cyrillic: я, ж, Щ, Ю )') . '</p>
                                <p class="clear helpcontent" style="margin-top:0.5em">' . $this->l('Choose font for body text. Default: Roboto') . '</p>
                                </div>

                                <label>' . $this->l('Price font') . '</label>
                                <div class="margin-form">
                                ';
        $html .= $this -> fontOptions($panel="f_price", $panelupper="RTC_F_PRICE");
        $html .= '
                                <p id="priceexample" class="fontshow">' . $this->l('98$ 134,25€ 786£ 455Руб') . '</p>
                                <p class="clear helpcontent" style="margin-top:0.5em">' . $this->l('Choose special font for price. Default: Oswald') . '</p>
                        </div>

                    </div>
                    <div class="roytc_row">
                        <label>' . $this->l('Latin extended support') . '</label>
                        <div class="margin-form">
                            <input type="radio" class="regular-radio" name="latin_ext" id="latin_ext_1" value="1" ' . ((Configuration::get('RTC_LATIN_EXT') == 1) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="latin_ext_1"> Yes</label>
                            <input type="radio" class="regular-radio" name="latin_ext" id="latin_ext_0" value="0" ' . ((Configuration::get('RTC_LATIN_EXT') == 0) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="latin_ext_0"> No</label>
                            <p class="clear helpcontent">' . $this->l('Include Google fonts with Latin extended support ') . ' <br/ >You can check your selected font whether support Latin ext here: <a href="http://www.google.com/webfonts" target="_blank">www.google.com/webfonts</a> or on preview</p>
                        </div>
                    </div>
                    <div class="roytc_row">
					    <label>' . $this->l('Cyrylic support') . '</label>
                        <div class="margin-form">
                            <input type="radio" class="regular-radio" name="cyrillic" id="cyrillic_1" value="1" ' . ((Configuration::get('RTC_CYRILLIC') == 1) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="cyrillic_1"> Yes</label>
                            <input type="radio" class="regular-radio" name="cyrillic" id="cyrillic_0" value="0" ' . ((Configuration::get('RTC_CYRILLIC') == 0) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="cyrillic_0"> No</label>
                            <p class="clear helpcontent">' . $this->l('Include Google fonts with Cyrylic support. ') . ' <br/ >You can check your selected font whether support Cyrillic here: <a href="http://www.google.com/webfonts" target="_blank">www.google.com/webfonts</a> or on preview</p>
                        </div>
                    </div>
                    <div class="roytc_row">
                         <label>' . $this->l('Body font size') . '</label>
                         <div class="margin-form">
                            <input type="text" name="font_size_body" id="font_size_body" value="' . Configuration::get('RTC_FONT_SIZE_BODY') . '" />px
                            <p class="clear helpcontent" style="margin-top:6px;">' . $this->l('Default: 13px') . '</p>
                         </div>
                    </div>
                    <div class="roytc_row">
                        <label>' . $this->l('Menu links, headings and titles') . '</label>
                        <div class="margin-form">
                        <input type="text" name="font_size_menu" id="font_size_menu" value="' . Configuration::get('RTC_FONT_SIZE_MENU') . '" />px
                        <p class="clear helpcontent" style="margin-top:6px;">' . $this->l('Default: 20px') . '</p>
                        </div>
                    </div>
                    <div class="roytc_row">
                        <label>' . $this->l('Buttons font size') . '</label>
                        <div class="margin-form">
                        <input type="text" name="font_size_buttons" id="font_size_buttons" value="' . Configuration::get('RTC_FONT_SIZE_BUTTONS') . '" />px
                        <p class="clear helpcontent" style="margin-top:6px;">' . $this->l('Default: 16px') . '</p>
                        </div>
                    </div>
                    <div class="roytc_row">
                        <label>' . $this->l('Product list price') . '</label>
                        <div class="margin-form">
                        <input type="text" name="font_size_price" id="font_size_price" value="' . Configuration::get('RTC_FONT_SIZE_PRICE') . '" />px
                        <p class="clear helpcontent" style="margin-top:6px;">' . $this->l('Default: 20px') . '</p>
                        </div>
                    </div>

                 <h3>' . $this->l('UPPERCASE or normal text?') . ' &nbsp;<span class="new_label">New!</span></h3>
                     <div class="roytc_row">
                        <label>' . $this->l('Top Menu elements') . '</label>
                        <div class="margin-form" style="margin-top:70px; padding-top:10px;">
                            <input type="radio" class="regular-radio" name="nc_up_menu" value="1" id="nc_up_menu1" ' . ((Configuration::get('NC_UP_MENU') == "1") ? 'checked="checked" ' : '') . ' />
                            <label class="up_mode upmode1 t" for="nc_up_menu1"> <span></span></label>
                            <input type="radio" class="regular-radio" name="nc_up_menu" value="2" id="nc_up_menu2" ' . ((Configuration::get('NC_UP_MENU') == "2") ? 'checked="checked" ' : '') . ' />
                            <label class="up_mode upmode2 t" for="nc_up_menu2"> <span style="color:#00a380"></span></label>
                     </div></div>
                     <div class="roytc_row">
                        <label>' . $this->l('Headings') . '</label>
                        <div class="margin-form" style="margin-top:70px; padding-top:10px;">
                            <input type="radio" class="regular-radio" name="nc_up_head" value="1" id="nc_up_head1" ' . ((Configuration::get('NC_UP_HEAD') == "1") ? 'checked="checked" ' : '') . ' />
                            <label class="up_mode upmode1 t" for="nc_up_head1"> <span></span></label>
                            <input type="radio" class="regular-radio" name="nc_up_head" value="2" id="nc_up_head2" ' . ((Configuration::get('NC_UP_HEAD') == "2") ? 'checked="checked" ' : '') . ' />
                            <label class="up_mode upmode2 t" for="nc_up_head2"> <span style="color:#00a380"></span></label>
                     </div></div>
                     <div class="roytc_row">
                        <label>' . $this->l('Buttons') . '</label>
                        <div class="margin-form" style="margin-top:70px; padding-top:10px;">
                            <input type="radio" class="regular-radio" name="nc_up_but" value="1" id="nc_up_but1" ' . ((Configuration::get('NC_UP_BUT') == "1") ? 'checked="checked" ' : '') . ' />
                            <label class="up_mode upmode1 t" for="nc_up_but1"> <span></span></label>
                            <input type="radio" class="regular-radio" name="nc_up_but" value="2" id="nc_up_but2" ' . ((Configuration::get('NC_UP_BUT') == "2") ? 'checked="checked" ' : '') . ' />
                            <label class="up_mode upmode2 t" for="nc_up_but2"> <span style="color:#00a380"></span></label>
                     </div></div>

                 <h3>' . $this->l('Buttons') . '</h3>
				 <div class="roytc_row">
                    <label>' . $this->l('Normal button background') . '</label>
                    <div class="margin-form">
                    <input type="color" name="b_normal_bg"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_B_NORMAL_BG') . '" /></div>
                 </div>
				 <div class="roytc_row">
                    <label>' . $this->l('Normal button border') . '</label>
                    <div class="margin-form">
                    <input type="color" name="b_normal_border"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_B_NORMAL_BORDER') . '" /></div>
                 </div>
				 <div class="roytc_row">
                    <label>' . $this->l('Normal button color') . '</label>
                    <div class="margin-form">
                    <input type="color" name="b_normal_color"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_B_NORMAL_COLOR') . '" /></div>
                 </div>
				 <div class="roytc_row">
                    <label>' . $this->l('Exclusive button background') . '</label>
                    <div class="margin-form">
                    <input type="color" name="b_ex_bg"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_B_EX_BG') . '" /></div>
                 </div>
				 <div class="roytc_row">
                    <label>' . $this->l('Exclusive button border') . '</label>
                    <div class="margin-form">
                    <input type="color" name="b_ex_border"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_B_EX_BORDER') . '" /></div>
                 </div>
				 <div class="roytc_row">
                    <label>' . $this->l('Exclusive button color') . '</label>
                    <div class="margin-form">
                    <input type="color" name="b_ex_color"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_B_EX_COLOR') . '" /></div>
                 </div>
				 <div class="roytc_row">
                    <label>' . $this->l('Buttons hover background') . '</label>
                    <div class="margin-form">
                    <input type="color" name="b_normal_bg_hover"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_B_NORMAL_BG_HOVER') . '" /></div>
                 </div>
				 <div class="roytc_row">
                    <label>' . $this->l('Buttons hover border') . '</label>
                    <div class="margin-form">
                    <input type="color" name="b_normal_border_hover"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_B_NORMAL_BORDER_HOVER') . '" /></div>
                 </div>
				 <div class="roytc_row">
                    <label>' . $this->l('Buttons hover color') . '</label>
                    <div class="margin-form">
                    <input type="color" name="b_normal_color_hover"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_B_NORMAL_COLOR_HOVER') . '" /></div>
                 </div>
            </div>


            <div class="tab-pane" id ="tab-homepage">
                 <h2 class="rtc_title4">' . $this->l('Homepage and top content') . '</h2>
				 <div class="roytc_row">
                    <label>' . $this->l('Top Line Background') . '</label>
                    <div class="margin-form">
                    <input type="color" name="top_line_background"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_TOP_LINE_BACKGROUND') . '" /></div>
                 </div>

                 <h3>' . $this->l('Currency and Language') . '</h3>
				 <div class="roytc_row">
                    <label>' . $this->l('Labels') . '</label>
                    <div class="margin-form">
                    <input type="color" name="cl_label"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_CL_LABEL') . '" /></div>
                 </div>
				 <div class="roytc_row">
                    <label>' . $this->l('Current value') . '</label>
                    <div class="margin-form">
                    <input type="color" name="cl_value"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_CL_VALUE') . '" /></div>
                 </div>
				 <div class="roytc_row">
                    <label>' . $this->l('Popup background') . '</label>
                    <div class="margin-form">
                    <input type="color" name="cl_popup_bg"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_CL_POPUP_BG') . '" /></div>
                 </div>
				 <div class="roytc_row">
                    <label>' . $this->l('Popup border color') . '</label>
                    <div class="margin-form">
                    <input type="color" name="cl_popup_border"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_CL_POPUP_BORDER') . '" /></div>
                 </div>
				 <div class="roytc_row">
                    <label>' . $this->l('Display popup shadow?') . '</label>
                    <div class="margin-form">
                            <input type="radio" class="regular-radio" name="cl_popup_shadow" id="cl_popup_shadow_1" value="1" ' . ((Configuration::get('RTC_CL_POPUP_SHADOW') == 1) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="cl_popup_shadow_1"> Yes</label>
                            <input type="radio" class="regular-radio" name="cl_popup_shadow" id="cl_popup_shadow_0" value="0" ' . ((Configuration::get('RTC_CL_POPUP_SHADOW') == 0) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="cl_popup_shadow_0"> No</label>
                 </div></div>
				 <div class="roytc_row">
                    <label>' . $this->l('Popup link') . '</label>
                    <div class="margin-form">
                    <input type="color" name="cl_popup_item"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_CL_POPUP_ITEM') . '" />
                 </div></div>
				 <div class="roytc_row">
                    <label>' . $this->l('Popup link hover') . '</label>
                    <div class="margin-form">
                    <input type="color" name="cl_popup_item_hover"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_CL_POPUP_ITEM_HOVER') . '" />
                 </div></div>
				 <div class="roytc_row">
                    <label>' . $this->l('Display Currency choice?') . '</label>
                    <div class="margin-form">
                            <input type="radio" class="regular-radio" name="cl_display_cur" id="cl_display_cur_1" value="1" ' . ((Configuration::get('RTC_CL_DISPLAY_CUR') == 1) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="cl_display_cur_1"> Yes</label>
                            <input type="radio" class="regular-radio" name="cl_display_cur" id="cl_display_cur_0" value="0" ' . ((Configuration::get('RTC_CL_DISPLAY_CUR') == 0) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="cl_display_cur_0"> No</label>
                 </div></div>
				 <div class="roytc_row">
                    <label>' . $this->l('Display Language choice?') . '</label>
                    <div class="margin-form">
                            <input type="radio" class="regular-radio" name="cl_display_lan" id="cl_display_lan_1" value="1" ' . ((Configuration::get('RTC_CL_DISPLAY_LAN') == 1) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="cl_display_lan_1"> Yes</label>
                            <input type="radio" class="regular-radio" name="cl_display_lan" id="cl_display_lan_0" value="0" ' . ((Configuration::get('RTC_CL_DISPLAY_LAN') == 0) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="cl_display_lan_0"> No</label>
                 </div></div>

                 <h3>' . $this->l('My account top block') . '</h3>
				 <div class="roytc_row">
                    <label>' . $this->l('Account links') . '</label>
                    <div class="margin-form">
                    <input type="color" name="ta_link"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_TA_LINK') . '" />
                 </div></div>
				 <div class="roytc_row">
                    <label>' . $this->l('Account links hover') . '</label>
                    <div class="margin-form">
                    <input type="color" name="ta_link_hover"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_TA_LINK_HOVER') . '" />
                 </div></div>
				 <div class="roytc_row">
                    <label>' . $this->l('Account links separator') . '</label>
                    <div class="margin-form">
                    <input type="color" name="ta_separator"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_TA_SEPARATOR') . '" />
                 </div></div>
				 <div class="roytc_row">
                    <label>' . $this->l('Welcome') . '</label>
                    <div class="margin-form">
                    <input type="color" name="ta_welcome"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_TA_WELCOME') . '" />
                 </div></div>
				 <div class="roytc_row">
                    <label>' . $this->l('Customer name') . '</label>
                    <div class="margin-form">
                    <input type="color" name="ta_name"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_TA_NAME') . '" />
                 </div></div>

                 <h3>' . $this->l('Info Panel') . '</h3>
				 <div class="roytc_row">
                    <label>' . $this->l('Panel background') . '</label>
                    <div class="margin-form">
                    <input type="color" name="ip_bg"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_IP_BG') . '" />
                 </div></div>
				 <div class="roytc_row">
                    <label>' . $this->l('Panel separators') . '</label>
                    <div class="margin-form">
                    <input type="color" name="ip_border"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_IP_BORDER') . '" />
                 </div></div>
				 <div class="roytc_row">
                    <label>' . $this->l('Panel title color') . '</label>
                    <div class="margin-form">
                    <input type="color" name="ip_title"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_IP_TITLE') . '" />
                 </div></div>
				 <div class="roytc_row">
                    <label>' . $this->l('Panel text color') . '</label>
                    <div class="margin-form">
                    <input type="color" name="ip_text"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_IP_TEXT') . '" />
                 </div></div>

                        <label>' . $this->l('Order by phone icon') . '</label>
                        <div class="margin-form">
                                <input id="ip_tel_field2" type="file" name="ip_tel_field2">
                                <input id="ip_tel_button2" type="submit" class="button" name="ip_tel_button2" value="' . $this->l('Upload') . '">
                                <p class="clear helpcontent">' . $this->l('You can upload your image in transparent .png format. For best result change color of default image:') . ' <a href="' . $this -> _path . 'images/defaults/icons-tel.png">Download PNG</a>
                                <br /><br />' . $this->l('You can also find this icon in PSD folder. It is layered and easy to change.') . '
                                <br /><br />' . $this->l('If you accidentally delete default image, you can always download it from the link above, and upload.') . '
                                </p>
                            </div>';
        $ip_tel_ext = Configuration::get('RTC_IP_TEL_EXT');
        if ($ip_tel_ext != "") {
            if (Shop::getContext() == Shop::CONTEXT_SHOP)
                $adv_imgname = 'icons-tel'.'-'.(int)$this->context->shop->getContextShopID();

            $html .= '<label>' . $this->l('Order by phone icon') . '</label>
                                            <div class="margin-form">
                                            <img class="imgback" src="' . $this -> _path .'upload/'.$adv_imgname.'.' . $ip_tel_ext . '" /><br /><br />
                                            <input id="ip_tel_delete2" type="submit" class="button" value="' . $this->l('Delete image') . '" name="ip_tel_delete2">
                                            </div>';
        }
        $html .= '
                        <label>' . $this->l('Working Time icon') . '</label>
                        <div class="margin-form">
                                <input id="ip_time_field2" type="file" name="ip_time_field2">
                                <input id="ip_time_button2" type="submit" class="button" name="ip_time_button2" value="' . $this->l('Upload') . '">
                                <p class="clear helpcontent">' . $this->l('You can upload your image in transparent .png format. For best result change color of default image:') . ' <a href="' . $this -> _path . 'images/defaults/icons-time.png">Download PNG</a>
                                <br /><br />' . $this->l('You can also find this icon in PSD folder. It is layered and easy to change.') . '
                                <br /><br />' . $this->l('If you accidentally delete default image, you can always download it from the link above, and upload.') . '
                                </p>
                            </div>';
        $ip_time_ext = Configuration::get('RTC_IP_TIME_EXT');
        if ($ip_time_ext != "") {
            if (Shop::getContext() == Shop::CONTEXT_SHOP)
                $adv_imgname = 'icons-time'.'-'.(int)$this->context->shop->getContextShopID();

            $html .= '<label>' . $this->l('Working Time icon') . '</label>
                                            <div class="margin-form">
                                            <img class="imgback" src="' . $this -> _path .'upload/'.$adv_imgname.'.' . $ip_time_ext . '" /><br /><br />
                                            <input id="ip_time_delete2" type="submit" class="button" value="' . $this->l('Delete image') . '" name="ip_time_delete2">
                                            </div>';
        }
        $html .= '
                        <label>' . $this->l('Delivery icon') . '</label>
                        <div class="margin-form">
                                <input id="ip_truck_field2" type="file" name="ip_truck_field2">
                                <input id="ip_truck_button2" type="submit" class="button" name="ip_truck_button2" value="' . $this->l('Upload') . '">
                                <p class="clear helpcontent">' . $this->l('You can upload your image in transparent .png format. For best result change color of default image:') . ' <a href="' . $this -> _path . 'images/defaults/icons-truck.png">Download PNG</a>
                                <br /><br />' . $this->l('You can also find this icon in PSD folder. It is layered and easy to change.') . '
                                <br /><br />' . $this->l('If you accidentally delete default image, you can always download it from the link above, and upload.') . '
                                </p>
                            </div>';
        $ip_truck_ext = Configuration::get('RTC_IP_TRUCK_EXT');
        if ($ip_truck_ext != "") {
            if (Shop::getContext() == Shop::CONTEXT_SHOP)
                $adv_imgname = 'icons-truck'.'-'.(int)$this->context->shop->getContextShopID();

            $html .= '<label>' . $this->l('Delivery icon') . '</label>
                                            <div class="margin-form">
                                            <img class="imgback" src="' . $this -> _path .'upload/'.$adv_imgname.'.' . $ip_truck_ext . '" /><br /><br />
                                            <input id="ip_truck_delete2" type="submit" class="button" value="' . $this->l('Delete image') . '" name="ip_truck_delete2">
                                            </div>';
        }
        $html .= '
                        <label>' . $this->l('Money back icon') . '</label>
                        <div class="margin-form">
                                <input id="ip_money_field2" type="file" name="ip_money_field2">
                                <input id="ip_money_button2" type="submit" class="button" name="ip_money_button2" value="' . $this->l('Upload') . '">
                                <p class="clear helpcontent">' . $this->l('You can upload your image in transparent .png format. For best result change color of default image:') . ' <a href="' . $this -> _path . 'images/defaults/icons-money.png">Download PNG</a>
                                <br /><br />' . $this->l('You can also find this icon in PSD folder. It is layered and easy to change.') . '
                                <br /><br />' . $this->l('If you accidentally delete default image, you can always download it from the link above, and upload.') . '
                                </p>
                            </div>';
        $ip_money_ext = Configuration::get('RTC_IP_MONEY_EXT');
        if ($ip_money_ext != "") {
            if (Shop::getContext() == Shop::CONTEXT_SHOP)
                $adv_imgname = 'icons-money'.'-'.(int)$this->context->shop->getContextShopID();

            $html .= '<label>' . $this->l('Money back icon') . '</label>
                                            <div class="margin-form">
                                            <img class="imgback" src="' . $this -> _path .'upload/'.$adv_imgname.'.' . $ip_money_ext . '" /><br /><br />
                                            <input id="ip_money_delete2" type="submit" class="button" value="' . $this->l('Delete image') . '" name="ip_money_delete2">
                                            </div>';
        }
        $html .= '
                 <div class="roytc_row">
                 <label>' . $this->l('Display icons animation on hover?') . '</label>
                 <div class="margin-form">
                            <input type="radio" class="regular-radio" name="ip_anim" id="ip_anim_1" value="1" ' . ((Configuration::get('RTC_IP_ANIM') == 1) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="ip_anim_1"> Yes</label>
                            <input type="radio" class="regular-radio" name="ip_anim" id="ip_anim_0" value="0" ' . ((Configuration::get('RTC_IP_ANIM') == 0) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="ip_anim_0"> No</label>
                            <p class="clear helpcontent">To configure Info Panel, just click here <a class="configure_button" href="'.$this->context->link->getAdminLink('AdminModules', true).'&configure=royinfoblock&tab_module=front_office_features&module_name=royinfoblock" target="_blank">'.$this->l('Configure').' <i class="icon-external-link"></i></a> and click Edit</p>
                 </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Hide Info panel?') . '</label>
                            <div class="margin-form">
                            <input type="radio" class="regular-radio" name="nc_show_ip" id="nc_show_ip_1" value="1" ' . ((Configuration::get('NC_SHOW_IP') == 1) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="nc_show_ip_1"> Yes</label>
                            <input type="radio" class="regular-radio" name="nc_show_ip" id="nc_show_ip_0" value="0" ' . ((Configuration::get('NC_SHOW_IP') == 0) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="nc_show_ip_0"> No</label>
                            <p class="clear helpcontent">' . $this->l('If you want to totally disable info blocks on top - you should disable Roy Info block in modules list, then switch this to NO') . '
                            </p>
                        </div></div>

                 <h3>' . $this->l('Slider') . '</h3>
                 <div class="roytc_row">
                    <label>' . $this->l('Slider layout') . '</label>
                    <div class="margin-form" style="margin-top:70px; padding-top:10px;">
                        <input type="radio" class="regular-radio" name="slider_mode"   value="1" id="slider_mode1" ' . ((Configuration::get('RTC_SLIDER_MODE') == "1") ? 'checked="checked" ' : '') . ' />
                        <label class="slider_mode smode1 t" for="slider_mode1"> <span>Page width slider</span></label>
                        <input type="radio" class="regular-radio" name="slider_mode"   value="2" id="slider_mode2" ' . ((Configuration::get('RTC_SLIDER_MODE') == "2") ? 'checked="checked" ' : '') . ' />
                        <label class="slider_mode smode2 t" for="slider_mode2"> <span>Full screen width slider</span></label>
                        <p class="clear helpcontent">Attention! If you want to set homepage slider to <strong>Fullscreen width</strong>. Set it in Revolution Slider module, and set Slider layout here to second mode. It will stretch the entire width of the container.</p>
                 </div></div>
				 <div class="roytc_row">
                    <div class="margin-form">
                        <p class="clear helpcontent">To configure Homepage slider, just click here <a class="configure_button" href="'.$this->context->link->getAdminLink('AdminModules', true).'&configure=revsliderprestashop&tab_module=front_office_features&module_name=revsliderprestashop" target="_blank">'.$this->l('Configure').' <i class="icon-external-link"></i></a></p>
                 </div></div>

                <h3>' . $this->l('Banners') . '</h3>
                 <div class="roytc_row">
                 <label>' . $this->l('Display banners hover effect?') . '</label>
                 <div class="margin-form">
                            <input type="radio" class="regular-radio" name="banners_anim" id="banners_anim_1" value="1" ' . ((Configuration::get('RTC_BANNERS_ANIM') == 1) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="banners_anim_1"> Yes</label>
                            <input type="radio" class="regular-radio" name="banners_anim" id="banners_anim_0" value="0" ' . ((Configuration::get('RTC_BANNERS_ANIM') == 0) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="banners_anim_0"> No</label>
                 </div></div>
                 <div class="roytc_row">
                    <label>' . $this->l('Banners background') . '</label>
                    <div class="margin-form">
                    <input type="color" name="ban_bg"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_BAN_BG') . '" />
                 </div></div>
                 <div class="roytc_row">
                    <label>' . $this->l('Banners title color') . '</label>
                    <div class="margin-form">
                    <input type="color" name="ban_title"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_BAN_TITLE') . '" />
                 </div></div>
                 <div class="roytc_row">
                    <label>' . $this->l('Banners description color') . '</label>
                    <div class="margin-form">
                    <input type="color" name="ban_text"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_BAN_TEXT') . '" />
                 </div></div>
                 <div class="roytc_row">
                    <label>' . $this->l('Banners button background') . '</label>
                    <div class="margin-form">
                    <input type="color" name="ban_button"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_BAN_BUTTON') . '" />
                 </div></div>
                 <div class="roytc_row">
                    <label>' . $this->l('Banners button border') . '</label>
                    <div class="margin-form">
                    <input type="color" name="ban_border"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_BAN_BORDER') . '" />
                 </div></div>
                 <div class="roytc_row">
                    <label>' . $this->l('Banners button color') . '</label>
                    <div class="margin-form">
                    <input type="color" name="ban_button_text"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_BAN_BUTTON_TEXT') . '" />
                     <p class="clear helpcontent">To configure Banners, just click here <a class="configure_button" href="'.$this->context->link->getAdminLink('AdminModules', true).'&configure=roybanners&tab_module=front_office_features&module_name=roybanners" target="_blank">'.$this->l('Configure').' <i class="icon-external-link"></i></a></p>
                 </div></div>


                 <h3>' . $this->l('Controls') . '</h3>

				 <div class="roytc_row">
                    <label>' . $this->l('Controls background') . '</label>
                    <div class="margin-form">
                    <input type="color" name="con_bg"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_CON_BG') . '" />
                 </div></div>
				 <div class="roytc_row">
                    <label>' . $this->l('Controls border') . '</label>
                    <div class="margin-form">
                    <input type="color" name="con_border"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_CON_BORDER') . '" />
                 </div></div>
				 <div class="roytc_row">
                    <label>' . $this->l('Controls color') . '</label>
                    <div class="margin-form">
                    <input type="color" name="con_color"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_CON_COLOR') . '" />
                 </div></div>

				 <div class="roytc_row">
                    <label>' . $this->l('Slider controls background') . '</label>
                    <div class="margin-form">
                    <input type="color" name="s_con_bg"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_S_CON_BG') . '" />
                 </div></div>
				 <div class="roytc_row">
                    <label>' . $this->l('Slider controls border') . '</label>
                    <div class="margin-form">
                    <input type="color" name="s_con_border"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_S_CON_BORDER') . '" />
                 </div></div>
				 <div class="roytc_row">
                    <label>' . $this->l('Slider controls color') . '</label>
                    <div class="margin-form">
                    <input type="color" name="s_con_color"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_S_CON_COLOR') . '" />
                 </div></div>

				 <div class="roytc_row">
                    <label>' . $this->l('Controls hover background') . '</label>
                    <div class="margin-form">
                    <input type="color" name="con_bg_hover"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_CON_BG_HOVER') . '" />
                 </div></div>
				 <div class="roytc_row">
                    <label>' . $this->l('Controls hover border') . '</label>
                    <div class="margin-form">
                    <input type="color" name="con_border_hover"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_CON_BORDER_HOVER') . '" />
                 </div></div>
				 <div class="roytc_row">
                    <label>' . $this->l('Controls hover color') . '</label>
                    <div class="margin-form">
                    <input type="color" name="con_color_hover"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_CON_COLOR_HOVER') . '" />
                 </div></div>

				 
                 <h3>' . $this->l('Featured Products carousel') . ' <span class="new_label">New!</span></h3>
                <div class="roytc_row">
				<label>' . $this->l('Enable carousel for homepage Featured products?') . '</label>
				<div class="margin-form">
					<input type="radio" class="regular-radio" name="nc_carousel_featured" id="nc_carousel_featured_1" value="1" ' . ((Configuration::get('NC_CAROUSEL_FEATURED') == "1") ? 'checked="checked" ' : '') . '/>
					<label class="t" for="nc_carousel_featured_1"> Yes</label>
					<input type="radio" class="regular-radio" name="nc_carousel_featured" id="nc_carousel_featured_2" value="2" ' . ((Configuration::get('NC_CAROUSEL_FEATURED') == "2") ? 'checked="checked" ' : '') . '/>
					<label class="t" for="nc_carousel_featured_2"> No</label>
				</div></div>
                <div class="roytc_row">
				<label>' . $this->l('Enable autoscroll for Featured carousel?') . '</label>
				<div class="margin-form">
					<input type="radio" class="regular-radio" name="nc_auto_featured" id="nc_auto_featured_1" value="true" ' . ((Configuration::get('NC_AUTO_FEATURED') == "true") ? 'checked="checked" ' : '') . '/>
					<label class="t" for="nc_auto_featured_1"> Yes</label>
					<input type="radio" class="regular-radio" name="nc_auto_featured" id="nc_auto_featured_0" value="false" ' . ((Configuration::get('NC_AUTO_FEATURED') == "false") ? 'checked="checked" ' : '') . '/>
					<label class="t" for="nc_auto_featured_0"> No</label>
				</div></div>
                <div class="roytc_row">
				<label>' . $this->l('How much product in row to show?') . '</label>
				<div class="margin-form">
					<input type="radio" class="regular-radio" name="nc_items_featured" id="nc_items_featured_1" value="3" ' . ((Configuration::get('NC_ITEMS_FEATURED') == "3") ? 'checked="checked" ' : '') . '/>
					<label class="t" for="nc_items_featured_1"> 3</label>
					<input type="radio" class="regular-radio" name="nc_items_featured" id="nc_items_featured_2" value="4" ' . ((Configuration::get('NC_ITEMS_FEATURED') == "4") ? 'checked="checked" ' : '') . '/>
					<label class="t" for="nc_items_featured_2"> 4</label>
					<input type="radio" class="regular-radio" name="nc_items_featured" id="nc_items_featured_3" value="5" ' . ((Configuration::get('NC_ITEMS_FEATURED') == "5") ? 'checked="checked" ' : '') . '/>
					<label class="t" for="nc_items_featured_3"> 5</label>
				</div></div>		
				
                 <h3>' . $this->l('Top sellers Products carousel') . ' <span class="new_label">New!</span></h3>
                <div class="roytc_row">
				<label>' . $this->l('Enable carousel for homepage Top sellers products?') . '</label>
				<div class="margin-form">
					<input type="radio" class="regular-radio" name="nc_carousel_best" id="nc_carousel_best_1" value="1" ' . ((Configuration::get('NC_CAROUSEL_BEST') == "1") ? 'checked="checked" ' : '') . '/>
					<label class="t" for="nc_carousel_best_1"> Yes</label>
					<input type="radio" class="regular-radio" name="nc_carousel_best" id="nc_carousel_best_2" value="2" ' . ((Configuration::get('NC_CAROUSEL_BEST') == "2") ? 'checked="checked" ' : '') . '/>
					<label class="t" for="nc_carousel_best_2"> No</label>
				</div></div>
                <div class="roytc_row">
				<label>' . $this->l('Enable autoscroll for Top sellers carousel?') . '</label>
				<div class="margin-form">
					<input type="radio" class="regular-radio" name="nc_auto_best" id="nc_auto_best_1" value="true" ' . ((Configuration::get('NC_AUTO_BEST') == "true") ? 'checked="checked" ' : '') . '/>
					<label class="t" for="nc_auto_best_1"> Yes</label>
					<input type="radio" class="regular-radio" name="nc_auto_best" id="nc_auto_best_0" value="false" ' . ((Configuration::get('NC_AUTO_BEST') == "false") ? 'checked="checked" ' : '') . '/>
					<label class="t" for="nc_auto_best_0"> No</label>
				</div></div>
                <div class="roytc_row">
				<label>' . $this->l('How much product in row to show?') . '</label>
				<div class="margin-form">
					<input type="radio" class="regular-radio" name="nc_items_best" id="nc_items_best_1" value="3" ' . ((Configuration::get('NC_ITEMS_BEST') == "3") ? 'checked="checked" ' : '') . '/>
					<label class="t" for="nc_items_best_1"> 3</label>
					<input type="radio" class="regular-radio" name="nc_items_best" id="nc_items_best_2" value="4" ' . ((Configuration::get('NC_ITEMS_BEST') == "4") ? 'checked="checked" ' : '') . '/>
					<label class="t" for="nc_items_best_2"> 4</label>
					<input type="radio" class="regular-radio" name="nc_items_best" id="nc_items_best_3" value="5" ' . ((Configuration::get('NC_ITEMS_BEST') == "5") ? 'checked="checked" ' : '') . '/>
					<label class="t" for="nc_items_best_3"> 5</label>
				</div></div>
								
                 <h3>' . $this->l('New Products carousel') . ' <span class="new_label">New!</span></h3>
                <div class="roytc_row">
				<label>' . $this->l('Enable carousel for homepage New products?') . '</label>
				<div class="margin-form">
					<input type="radio" class="regular-radio" name="nc_carousel_new" id="nc_carousel_new_1" value="1" ' . ((Configuration::get('NC_CAROUSEL_NEW') == "1") ? 'checked="checked" ' : '') . '/>
					<label class="t" for="nc_carousel_new_1"> Yes</label>
					<input type="radio" class="regular-radio" name="nc_carousel_new" id="nc_carousel_new_2" value="2" ' . ((Configuration::get('NC_CAROUSEL_NEW') == "2") ? 'checked="checked" ' : '') . '/>
					<label class="t" for="nc_carousel_new_2"> No</label>
				</div></div>
                <div class="roytc_row">
				<label>' . $this->l('Enable autoscroll for New carousel?') . '</label>
				<div class="margin-form">
					<input type="radio" class="regular-radio" name="nc_auto_new" id="nc_auto_new_1" value="true" ' . ((Configuration::get('NC_AUTO_NEW') == "true") ? 'checked="checked" ' : '') . '/>
					<label class="t" for="nc_auto_new_1"> Yes</label>
					<input type="radio" class="regular-radio" name="nc_auto_new" id="nc_auto_new_0" value="false" ' . ((Configuration::get('NC_AUTO_NEW') == "false") ? 'checked="checked" ' : '') . '/>
					<label class="t" for="nc_auto_new_0"> No</label>
				</div></div>
                <div class="roytc_row">
				<label>' . $this->l('How much product in row to show?') . '</label>
				<div class="margin-form">
					<input type="radio" class="regular-radio" name="nc_items_new" id="nc_items_new_1" value="3" ' . ((Configuration::get('NC_ITEMS_NEW') == "3") ? 'checked="checked" ' : '') . '/>
					<label class="t" for="nc_items_new_1"> 3</label>
					<input type="radio" class="regular-radio" name="nc_items_new" id="nc_items_new_2" value="4" ' . ((Configuration::get('NC_ITEMS_NEW') == "4") ? 'checked="checked" ' : '') . '/>
					<label class="t" for="nc_items_new_2"> 4</label>
					<input type="radio" class="regular-radio" name="nc_items_new" id="nc_items_new_3" value="5" ' . ((Configuration::get('NC_ITEMS_NEW') == "5") ? 'checked="checked" ' : '') . '/>
					<label class="t" for="nc_items_new_3"> 5</label>
				</div></div>
								
                 <h3>' . $this->l('Sale carousel') . ' <span class="new_label">New!</span></h3>
                <div class="roytc_row">
				<label>' . $this->l('Enable carousel for homepage Sale products?') . '</label>
				<div class="margin-form">
					<input type="radio" class="regular-radio" name="nc_carousel_sale" id="nc_carousel_sale_1" value="1" ' . ((Configuration::get('NC_CAROUSEL_SALE') == "1") ? 'checked="checked" ' : '') . '/>
					<label class="t" for="nc_carousel_sale_1"> Yes</label>
					<input type="radio" class="regular-radio" name="nc_carousel_sale" id="nc_carousel_sale_2" value="2" ' . ((Configuration::get('NC_CAROUSEL_SALE') == "2") ? 'checked="checked" ' : '') . '/>
					<label class="t" for="nc_carousel_sale_2"> No</label>
				</div></div>
                <div class="roytc_row">
				<label>' . $this->l('Enable autoscroll for Sale carousel?') . '</label>
				<div class="margin-form">
					<input type="radio" class="regular-radio" name="nc_auto_sale" id="nc_auto_sale_1" value="true" ' . ((Configuration::get('NC_AUTO_SALE') == "true") ? 'checked="checked" ' : '') . '/>
					<label class="t" for="nc_auto_sale_1"> Yes</label>
					<input type="radio" class="regular-radio" name="nc_auto_sale" id="nc_auto_sale_0" value="false" ' . ((Configuration::get('NC_AUTO_SALE') == "false") ? 'checked="checked" ' : '') . '/>
					<label class="t" for="nc_auto_sale_0"> No</label>
				</div></div>
                <div class="roytc_row">
				<label>' . $this->l('How much product in row to show?') . '</label>
				<div class="margin-form">
					<input type="radio" class="regular-radio" name="nc_items_sale" id="nc_items_sale_1" value="3" ' . ((Configuration::get('NC_ITEMS_SALE') == "3") ? 'checked="checked" ' : '') . '/>
					<label class="t" for="nc_items_sale_1"> 3</label>
					<input type="radio" class="regular-radio" name="nc_items_sale" id="nc_items_sale_2" value="4" ' . ((Configuration::get('NC_ITEMS_SALE') == "4") ? 'checked="checked" ' : '') . '/>
					<label class="t" for="nc_items_sale_2"> 4</label>
					<input type="radio" class="regular-radio" name="nc_items_sale" id="nc_items_sale_3" value="5" ' . ((Configuration::get('NC_ITEMS_SALE') == "5") ? 'checked="checked" ' : '') . '/>
					<label class="t" for="nc_items_sale_3"> 5</label>
				</div></div>
				
				
                 <h3>' . $this->l('Homepage Products carousels design') . '</h3>
				 <div class="roytc_row">
                    <label>' . $this->l('Home products title') . '</label>
                    <div class="margin-form">
                    <input type="color" name="hp_title"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_HP_TITLE') . '" />
                 </div></div>
				 <div class="roytc_row">
                    <label>' . $this->l('Home products title hover') . '</label>
                    <div class="margin-form">
                    <input type="color" name="hp_title_hover"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_HP_TITLE_HOVER') . '" />
                 </div></div>

                 <label>' . $this->l('Home products icon') . '</label>
                        <div class="margin-form">
                                <input id="hp_field2" type="file" name="hp_field2">
                                <input id="hp_button2" type="submit" class="button" name="hp_button2" value="' . $this->l('Upload') . '">
                                <p class="clear helpcontent">' . $this->l('You can upload your image in transparent .png format. For best result change color of default image:') . ' <a href="' . $this -> _path . 'images/defaults/icons-homeproducts.png">Download PNG</a>
                                <br /><br />' . $this->l('You can also find this icon in PSD folder. It is layered and easy to change.') . '
                                <br /><br />' . $this->l('If you accidentally delete default image, you can always download it from the link above, and upload.') . '
                                </p>
                            </div>';
        $hp_ext = Configuration::get('RTC_HP_EXT');
        if ($hp_ext != "") {
            if (Shop::getContext() == Shop::CONTEXT_SHOP)
                $adv_imgname = 'icons-homeproducts'.'-'.(int)$this->context->shop->getContextShopID();

            $html .= '<label>' . $this->l('Home products icon') . '</label>
                                        <div class="margin-form">
                                        <img class="imgback" src="' . $this -> _path .'upload/'.$adv_imgname.'.' . $hp_ext . '" /><br /><br />
                                        <input id="hp_delete2" type="submit" class="button" value="' . $this->l('Delete image') . '" name="hp_delete2">
                                        </div>';
        }
        $html .= '

                 <h3>' . $this->l('Brand / Manufacturer logo carousel') . '</h3>
				 <div class="roytc_row">
                    <label>' . $this->l('Carousel background') . '</label>
                    <div class="margin-form">
                    <input type="color" name="brand_bg"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_BRAND_BG') . '" />
                 </div></div>
				 <div class="roytc_row">
                    <label>' . $this->l('Carousel border') . '</label>
                    <div class="margin-form">
                    <input type="color" name="brand_border"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_BRAND_BORDER') . '" />
                 </div></div>

                 <h3>' . $this->l('Bottom section') . '</h3>
				 <div class="roytc_row">
                    <label>' . $this->l('Bottom section height on Home Page?') . '</label>
                    <div class="margin-form">
                            <input type="text" name="bottom_section"  value="' . Configuration::get('RTC_BOTTOM_SECTION') . '" />px
                            <p class="clear helpcontent">Change this only if you don`t want to display bottom blocks, but want to display empty bottom section.
                            <br />If you want to hide bottom section, set it to "0"
                            </p>
                 </div></div>
                    <div class="roytc_row">
                    <label>' . $this->l('Enable bottom section on other pages?') . '</label>
                    <div class="margin-form">
                        <input type="radio" class="regular-radio" name="nc_bottom_section_sw" id="nc_bottom_section_sw_1" value="1" ' . ((Configuration::get('NC_BOTTOM_SECTION_SW') == 1) ? 'checked="checked" ' : '') . '/>
                        <label class="t" for="nc_bottom_section_sw_1"> Yes</label>
                        <input type="radio" class="regular-radio" name="nc_bottom_section_sw" id="nc_bottom_section_sw_0" value="0" ' . ((Configuration::get('NC_BOTTOM_SECTION_SW') == 0) ? 'checked="checked" ' : '') . '/>
                        <label class="t" for="nc_bottom_section_sw_0"> No</label>
                    </div></div>
				 <div class="roytc_row">
                    <label>' . $this->l('Bottom section height on other pages?') . '</label>
                    <div class="margin-form">
                            <input type="text" name="nc_bottom_section_other"  value="' . Configuration::get('NC_BOTTOM_SECTION_OTHER') . '" />px
                            <p class="clear helpcontent">This can change gradient/image/background-color height at the bottom section on all pages except home.
                            <br />Default for gradients: 120
                            </p>
                 </div></div>
            </div>


            <div class="tab-pane" id="tab-menu">
                <h2 class="rtc_title5">' . $this->l('Menu and Search') . '</h2>
                        ';
        $html .='

                    <h3 style="color:#f45435; text-transform:none; font-size:16px; padding: 26px 24px;"><span class="hot_label" style="font-size:16px;">' . $this->l('ATTENTION!! Here you must choose what menu module to use as your main menu! ') . '</span><br /><br />
                    <span style="border-left:4px solid #eec25f; padding-left:12px; color:#333333;">' . $this->l('Modez support 2 menu modules. Top horizontal menu (improved) and Final Menu. After new installation you have Top Horizontal Menu by default. This menu used in MODEZ Demo. It is simple and fast. If you want you can switch to Final Menu module.') . '</span><br /><br />
                    <span style="border-left:4px solid #eec25f; padding-left:12px; color:#333333;">' . $this->l('To configure Top Horizontal menu - go to Modules - Top Horizontal menu - click configure. To configure Final Menu - go to green element in you main back office menu on the left side.') . '</span>
                    </h3>
                     <div class="roytc_row">

                        <label>' . $this->l('What menu to use as your main menu?') . '</label>
                        <div class="margin-form" style="margin-top:70px; padding-top:10px;">
                            <input type="radio" class="regular-radio" name="nc_m_mode" value="1" id="nc_m_mode1" ' . ((Configuration::get('NC_M_MODE') == "1") ? 'checked="checked" ' : '') . ' />
                            <label class="menu_mode mmode1 t" for="nc_m_mode1"> <span>Top Horizontal Menu</span></label>
                            <input type="radio" class="regular-radio" name="nc_m_mode" value="2" id="nc_m_mode2" ' . ((Configuration::get('NC_M_MODE') == "2") ? 'checked="checked" ' : '') . ' />
                            <label class="menu_mode mmode2 t" for="nc_m_mode2"> <span style="color:#00a380">FINAL MENU</span></label>
                     </div></div>

                    <h3>' . $this->l('Main Menu design') . '</h3>
                    <div class="roytc_row">
                    <label>' . $this->l('Menu top border width') . '</label>
                    <div class="margin-form">




                     <input type="text" name="nc_m_bt" value="' . Configuration::get('NC_M_BT') . '" />px
                    </div></div>
                    <div class="roytc_row">

                    <label>' . $this->l('Menu right border width') . '</label>
                    <div class="margin-form">

                     <input type="text" name="nc_m_br" value="' . Configuration::get('NC_M_BR') . '" />px
                    </div></div>
                    <div class="roytc_row">

                    <label>' . $this->l('Menu bottom border width') . '</label>
                    <div class="margin-form">

                     <input type="text" name="nc_m_bb" value="' . Configuration::get('NC_M_BB') . '" />px
                    </div></div>
                    <div class="roytc_row">

                    <label>' . $this->l('Menu left border width') . '</label>
                    <div class="margin-form">

                     <input type="text" name="nc_m_bl" value="' . Configuration::get('NC_M_BL') . '" />px
                    </div></div>
                    <div class="roytc_row">
                    <label>' . $this->l('Menu border radius') . '</label>
                    <div class="margin-form">
                     <input type="text" name="nc_m_radius" value="' . Configuration::get('NC_M_RADIUS') . '" />px
                    </div></div>
                    <div class="roytc_row">
                    <label>' . $this->l('Menu Notes color') . '</label>
                    <div class="margin-form">
                     <input type="color" name="nc_m_note"  class="colorpicker" data-hex="true" value="' . Configuration::get('NC_M_NOTE') . '" />
                     <p class="clear helpcontent">' . $this->l('You can set individual background color for each Tab Note in each menu element settings of Final Menu.') . '
                    </div></div>
                    <div class="roytc_row">
                    <label>' . $this->l('Menu Icons color') . '</label>
                    <div class="margin-form">
                     <input type="color" name="nc_m_icon"  class="colorpicker" data-hex="true" value="' . Configuration::get('NC_M_ICON') . '" />
                    </div></div>

                    <div class="roytc_row">
                    <label>' . $this->l('Menu line background') . '</label>
                    <div class="margin-form">
                     <input type="color" name="menu_line_bg"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_MENU_LINE_BG') . '" />
                    </div></div>
                    <div class="roytc_row">
                    <label>' . $this->l('Menu line border') . '</label>
                    <div class="margin-form">
                     <input type="color" name="menu_line_border"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_MENU_LINE_BORDER') . '" />
                    </div></div>


                    <div class="roytc_row">
                    <label>' . $this->l('Link background') . '</label>
                    <div class="margin-form">
                     <input type="color" name="menu_link_bg_color"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_MENU_LINK_BG_COLOR') . '" />
                    </div></div>
                    <div class="roytc_row">
                    <label>' . $this->l('Hover link background') . '</label>
                    <div class="margin-form">
                     <input type="color" name="menu_link_bg_hover"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_MENU_LINK_BG_HOVER') . '" />
                    </div></div>
                    <div class="roytc_row">
                    <label>' . $this->l('Active link background') . '</label>
                    <div class="margin-form">
                     <input type="color" name="menu_link_bg_active"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_MENU_LINK_BG_ACTIVE') . '" />
                    </div></div>

                    <div class="roytc_row">
                    <label>' . $this->l('Link border') . '</label>
                    <div class="margin-form">
                     <input type="color" name="menu_link_border_color"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_MENU_LINK_BORDER_COLOR') . '" />
                    </div></div>
                    <div class="roytc_row">
                    <label>' . $this->l('Hover link border') . '</label>
                    <div class="margin-form">
                     <input type="color" name="menu_link_border_hover"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_MENU_LINK_BORDER_HOVER') . '" />
                    </div></div>
                    <div class="roytc_row">
                    <label>' . $this->l('Active link border') . '</label>
                    <div class="margin-form">
                     <input type="color" name="menu_link_border_active"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_MENU_LINK_BORDER_ACTIVE') . '" />
                    </div></div>

                    <div class="roytc_row">
                    <label>' . $this->l('Link color') . '</label>
                    <div class="margin-form">
                     <input type="color" name="menu_link_color"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_MENU_LINK_COLOR') . '" />
                    </div></div>
                    <div class="roytc_row">
                    <label>' . $this->l('Hover link color') . '</label>
                    <div class="margin-form">
                     <input type="color" name="menu_hover_color"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_MENU_HOVER_COLOR') . '" />
                    </div></div>
                    <div class="roytc_row">
                    <label>' . $this->l('Active link color') . '</label>
                    <div class="margin-form">
                     <input type="color" name="menu_link_active"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_MENU_LINK_ACTIVE') . '" />
                    </div></div>
                    <div class="roytc_row">
                    <label>' . $this->l('Hide chevron icon?') . '</label>
                    <div class="margin-form">
                        <input type="radio" class="regular-radio" name="nc_m_chev" id="nc_m_chev_1" value="1" ' . ((Configuration::get('NC_M_CHEV') == 1) ? 'checked="checked" ' : '') . '/>
                        <label class="t" for="nc_m_chev_1"> Yes</label>
                        <input type="radio" class="regular-radio" name="nc_m_chev" id="nc_m_chev_0" value="0" ' . ((Configuration::get('NC_M_CHEV') == 0) ? 'checked="checked" ' : '') . '/>
                        <label class="t" for="nc_m_chev_0"> No</label>
                    </div></div>
					
                    <h3>' . $this->l('Submenu popup colors') . '</h3>
                    <div class="roytc_row">
                    <label>' . $this->l('Submenu box background') . '</label>
                    <div class="margin-form">
                     <input type="color" name="submenu_bg_color"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_SUBMENU_BG_COLOR') . '" />
                     <p class="clear helpcontent">' . $this->l('THIS is only for simple tabs of FINAL menu. If you use Advanced tab view - You can choose custom background color for each tab in the edit page of each tab.') . '
                    </div></div>
                    <div class="roytc_row">
                    <label>' . $this->l('Submenu box Shadow') . '</label>
                    <div class="margin-form">
                        <input type="radio" class="regular-radio" name="submenu_shadow" id="submenu_shadow_1" value="1" ' . ((Configuration::get('RTC_SUBMENU_SHADOW') == 1) ? 'checked="checked" ' : '') . '/>
                        <label class="t" for="submenu_shadow_1"> Yes</label>
                        <input type="radio" class="regular-radio" name="submenu_shadow" id="submenu_shadow_0" value="0" ' . ((Configuration::get('RTC_SUBMENU_SHADOW') == 0) ? 'checked="checked" ' : '') . '/>
                        <label class="t" for="submenu_shadow_0"> No</label>
                    </div></div>
                    <div class="roytc_row">
                    <label>' . $this->l('Submenu box Border color') . '</label>
                    <div class="margin-form">
                     <input type="color" name="submenu_border_top"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_SUBMENU_BORDER_TOP') . '" />
                    </div></div>

                    <div class="roytc_row">
                    <label>' . $this->l('Submenu Link color') . '</label>
                    <div class="margin-form">
                     <input type="color" name="submenu_link_color"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_SUBMENU_LINK_COLOR') . '" />
                    </div></div>
                    <div class="roytc_row">
                    <label>' . $this->l('Submenu hover Link color') . '</label>
                    <div class="margin-form">
                     <input type="color" name="submenu_hover_color"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_SUBMENU_HOVER_COLOR') . '" />
                    </div></div>
                    <div class="roytc_row">
                    <label>' . $this->l('Submenu before line color') . '</label>
                    <div class="margin-form">
                     <input type="color" name="submenu_before_line"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_SUBMENU_BEFORE_LINE') . '" />

                    </div></div>


                    <h3>' . $this->l('VERTICAL menu design') . '</h3>
                    <div class="roytc_row">
                    <label>' . $this->l('Menu link background') . '</label>
                    <div class="margin-form">
                     <input type="color" name="nc_mv_bg"  class="colorpicker" data-hex="true" value="' . Configuration::get('NC_MV_BG') . '" />
                    </div></div>
                    <div class="roytc_row">
                    <label>' . $this->l('Menu link color') . '</label>
                    <div class="margin-form">
                     <input type="color" name="nc_mv_color"  class="colorpicker" data-hex="true" value="' . Configuration::get('NC_MV_COLOR') . '" />
                    </div></div>
                    <div class="roytc_row">
                    <label>' . $this->l('Menu link icon color') . '</label>
                    <div class="margin-form">
                     <input type="color" name="nc_mv_icon"  class="colorpicker" data-hex="true" value="' . Configuration::get('NC_MV_ICON') . '" />
                    </div></div>
                    <div class="roytc_row">
                    <label>' . $this->l('Menu link background hover') . '</label>
                    <div class="margin-form">
                     <input type="color" name="nc_mv_bg_hover"  class="colorpicker" data-hex="true" value="' . Configuration::get('NC_MV_BG_HOVER') . '" />
                    </div></div>
                    <div class="roytc_row">
                    <label>' . $this->l('Menu link and icon color hover') . '</label>
                    <div class="margin-form">
                     <input type="color" name="nc_mv_hover"  class="colorpicker" data-hex="true" value="' . Configuration::get('NC_MV_HOVER') . '" />
                    </div></div>
                    <div class="roytc_row">
                    <label>' . $this->l('Menu Tab Note color') . '</label>
                    <div class="margin-form">
                     <input type="color" name="nc_mv_tab"  class="colorpicker" data-hex="true" value="' . Configuration::get('NC_MV_TAB') . '" />
                     <p class="clear helpcontent">' . $this->l('You can set individual background color for each Tab Note in each menu element settings of Final Menu.') . '
                    </div></div>
                    <div class="roytc_row">
                    <label>' . $this->l('Menu border and separators color') . '</label>
                    <div class="margin-form">
                     <input type="color" name="nc_mv_bor"  class="colorpicker" data-hex="true" value="' . Configuration::get('NC_MV_BOR') . '" />
                    </div></div>


                    <h3>' . $this->l('Top Horizontal menu options') . '&nbsp;<span class="hot_label">This section ONLY FOR STANDART TOP HORIZONTAL MENU MODULE. If you use FINALMENU - just skip it</span></h3>

                    <div class="roytc_row">
                    <label>' . $this->l('Enable Sticky Menu?') . '</label>
                    <div class="margin-form">
                        <input type="radio" class="regular-radio" name="nc_sticky_menu" id="nc_sticky_menu_1" value="1" ' . ((Configuration::get('NC_STICKY_MENU') == 1) ? 'checked="checked" ' : '') . '/>
                        <label class="t" for="nc_sticky_menu_1"> Yes</label>
                        <input type="radio" class="regular-radio" name="nc_sticky_menu" id="nc_sticky_menu_0" value="0" ' . ((Configuration::get('NC_STICKY_MENU') == 0) ? 'checked="checked" ' : '') . '/>
                        <label class="t" for="nc_sticky_menu_0"> No</label>
                    </div></div>
                    <div class="roytc_row">
                    <label>' . $this->l('Sticky up background') . '</label>
                    <div class="margin-form">
                     <input type="color" name="nc_st_up_bg"  class="colorpicker" data-hex="true" value="' . Configuration::get('NC_ST_UP_BG') . '" />
                    </div></div>
                    <div class="roytc_row">
                    <label>' . $this->l('Sticky up border') . '</label>
                    <div class="margin-form">
                     <input type="color" name="nc_st_up_border"  class="colorpicker" data-hex="true" value="' . Configuration::get('NC_ST_UP_BORDER') . '" />
                    </div></div>
                    <div class="roytc_row">
                    <label>' . $this->l('Sticky up color') . '</label>
                    <div class="margin-form">
                     <input type="color" name="nc_st_up"  class="colorpicker" data-hex="true" value="' . Configuration::get('NC_ST_UP') . '" />
                    </div></div>
                    <label>' . $this->l('Home image') . '</label>
                            <div class="margin-form">
                                <input id="menu_image_field2" type="file" name="menu_image_field2" value="upload">
                                <input id="menu_image_button2" type="submit" class="button" name="menu_image_button2">
                                <p class="clear helpcontent">' . $this->l('You can upload your image in transparent .png format. For best result change color of default home image:') . ' <a href="' . $this -> _path . 'images/defaults_digital/icons-home.png" >Download PNG</a>
                                <br /><br />' . $this->l('You can also find this icon in PSD folder. It is layered and easy to change.') . '
                                <br /><br />' . $this->l('If you accidentally delete default image, you can always download it from the link above, and upload.') . '
                                </p>
                            </div>';

        $menu_img_ext = Configuration::get('RTC_MENU_IMG_EXT');
        if ($menu_img_ext != "") {
            if (Shop::getContext() == Shop::CONTEXT_SHOP)
                $adv_imgname = 'icons-home'.'-'.(int)$this->context->shop->getContextShopID();

            $html .= '<label>' . $this->l('Home image') . '</label>
                                <div class="margin-form">
                                <img class="imgback" src="' . $this -> _path . 'upload/' .$adv_imgname.'.' . $menu_img_ext . '" /><br /><br />
                                <input id="menu_image_delete2" type="submit" class="button" value="' . $this->l('Delete image') . '" name="menu_image_delete2">
                                </div>';
        }
        $html .='



                    <h3>' . $this->l('Search box') . '</h3>
                    <div class="roytc_row">
                    <label>' . $this->l('Search box background') . '</label>
                    <div class="margin-form">
                     <input type="color" name="search_box_bg"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_SEARCH_BOX_BG') . '" />
                    </div></div>
                    <div class="roytc_row">
                    <label>' . $this->l('Search box border') . '</label>
                    <div class="margin-form">
                     <input type="color" name="search_border"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_SEARCH_BORDER') . '" />
                    </div></div>
                    <div class="roytc_row">
                    <label>' . $this->l('Search input color') . '</label>
                    <div class="margin-form">
                     <input type="color" name="search_input_color"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_SEARCH_INPUT_COLOR') . '" />
                    </div></div>
                    <div class="roytc_row">
                    <label>' . $this->l('Search button background') . '</label>
                    <div class="margin-form">
                     <input type="color" name="search_button"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_SEARCH_BUTTON') . '" />
                    </div></div>
                    <div class="roytc_row">
                    <label>' . $this->l('Search button border') . '</label>
                    <div class="margin-form">
                     <input type="color" name="nc_search_border_but"  class="colorpicker" data-hex="true" value="' . Configuration::get('NC_SEARCH_BORDER_BUT') . '" />
                    </div></div>

                        <label>' . $this->l('Magnifier icon') . '</label>
                        <div class="margin-form">
                                <input id="s_lens_field2" type="file" name="s_lens_field2">
                                <input id="s_lens_button2" type="submit" class="button" name="s_lens_button2" value="' . $this->l('Upload') . '">
                                <p class="clear helpcontent">' . $this->l('You can upload your image in transparent .png format. For best result change color of default image:') . ' <a href="' . $this -> _path . 'images/defaults/icons-lens.png">Download PNG</a>
                                <br /><br />' . $this->l('You can also find this icon in PSD folder. It is layered and easy to change.') . '
                                <br /><br />' . $this->l('If you accidentally delete default image, you can always download it from the link above, and upload.') . '
                                </p>
                            </div>';
        $s_lens_ext = Configuration::get('RTC_S_LENS_EXT');
        if ($s_lens_ext != "") {
            if (Shop::getContext() == Shop::CONTEXT_SHOP)
                $adv_imgname = 'icons-lens'.'-'.(int)$this->context->shop->getContextShopID();

            $html .= '<label>' . $this->l('Magnifier icon') . '</label>
                                <div class="margin-form">
                                <img class="imgback" src="' . $this -> _path .'upload/'.$adv_imgname.'.' . $s_lens_ext . '" /><br /><br />
                                <input id="s_lens_delete2" type="submit" class="button" value="' . $this->l('Delete image') . '" name="s_lens_delete2">
                                </div>';
        }
        $html .= '

                    <div class="roytc_row">
                    <label>' . $this->l('Search popup background') . '</label>
                    <div class="margin-form">
                     <input type="color" name="search_popup_bg"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_SEARCH_POPUP_BG') . '" />
                    </div></div>
                    <div class="roytc_row">
                    <label>' . $this->l('Search popup border color') . '</label>
                    <div class="margin-form">
                     <input type="color" name="search_popup_border"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_SEARCH_POPUP_BORDER') . '" />
                    </div></div>
                    <div class="roytc_row">
                    <label>' . $this->l('Search popup Shadow') . '</label>
                    <div class="margin-form">
                        <input type="radio" class="regular-radio" name="search_shadow" id="search_shadow_1" value="1" ' . ((Configuration::get('RTC_SEARCH_SHADOW') == 1) ? 'checked="checked" ' : '') . '/>
                        <label class="t" for="search_shadow_1"> Yes</label>
                        <input type="radio" class="regular-radio" name="search_shadow" id="search_shadow_0" value="0" ' . ((Configuration::get('RTC_SEARCH_SHADOW') == 0) ? 'checked="checked" ' : '') . '/>
                        <label class="t" for="search_shadow_0"> No</label>
                    </div></div>
                    <div class="roytc_row">
                    <label>' . $this->l('Search popup item background') . '</label>
                    <div class="margin-form">
                     <input type="color" name="search_item_bg" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_SEARCH_ITEM_BG') . '" />
                    </div></div>
                    <div class="roytc_row">
                    <label>' . $this->l('Search popup hover item background') . '</label>
                    <div class="margin-form">
                     <input type="color" name="search_item_bg_hover" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_SEARCH_ITEM_BG_HOVER') . '" />
                    </div></div>
		    </div>


            <div class="tab-pane" id ="tab-page">
                    <h2 class="rtc_title6">' . $this->l('Page elements') . '</h2>
                        <div class="roytc_row">
                        <label>' . $this->l('Display Breadcrumb?') . '</label>
                        <div class="margin-form">
                            <input type="radio" class="regular-radio" name="breadcrumb" id="breadcrumb_1" value="1" ' . ((Configuration::get('RTC_BREADCRUMB') == 1) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="breadcrumb_1"> Yes</label>
                            <input type="radio" class="regular-radio" name="breadcrumb" id="breadcrumb_0" value="0" ' . ((Configuration::get('RTC_BREADCRUMB') == 0) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="breadcrumb_0"> No</label>
                        </div></div>
                <div class="roytc_row">
                    <label>' . $this->l('Breadcrumb text') . '</label>
			    	<div class="margin-form">
					<input type="color" name="b_text"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_B_TEXT') . '" />
				</div></div>
                <div class="roytc_row">
                    <label>' . $this->l('Breadcrumb link') . '</label>
			    	<div class="margin-form">
					<input type="color" name="b_link"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_B_LINK') . '" />
				</div></div>
                <div class="roytc_row">
                    <label>' . $this->l('Breadcrumb link hover') . '</label>
			    	<div class="margin-form">
					<input type="color" name="b_link_hover"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_B_LINK_HOVER') . '" />
				</div></div>
                <div class="roytc_row">
                    <label>' . $this->l('Breadcrumb separator') . '</label>
			    	<div class="margin-form">
					<input type="color" name="b_separator"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_B_SEPARATOR') . '" />
				</div></div>

                        <label>' . $this->l('Breadcrumb icon') . '</label>
                        <div class="margin-form">
                                <input id="b_field2" type="file" name="b_field2">
                                <input id="b_button2" type="submit" class="button" name="b_button2" value="' . $this->l('Upload') . '">
                                <p class="clear helpcontent">' . $this->l('You can upload your image in transparent .png format. For best result change color of default image:') . ' <a href="' . $this -> _path . 'images/defaults/bread_home.png">Download PNG</a>
                                <br /><br />' . $this->l('You can also find this icon in PSD folder. It is layered and easy to change.') . '
                                <br /><br />' . $this->l('If you accidentally delete default image, you can always download it from the link above, and upload.') . '
                                </p>
                            </div>';
        $b_ext = Configuration::get('RTC_B_EXT');
        if ($b_ext != "") {
            if (Shop::getContext() == Shop::CONTEXT_SHOP)
                $adv_imgname = 'bread_home'.'-'.(int)$this->context->shop->getContextShopID();

            $html .= '<label>' . $this->l('Breadcrumb icon') . '</label>
                                            <div class="margin-form">
                                            <img class="imgback" src="' . $this -> _path .'upload/'.$adv_imgname.'.' . $b_ext . '" /><br /><br />
                                            <input id="b_delete2" type="submit" class="button" value="' . $this->l('Delete image') . '" name="b_delete2">
                                            </div>';
        }
        $html .= '
                    <h3>' . $this->l('Sidebar block titles ') . '</h3>
                        <div class="roytc_row">
                             <label>' . $this->l('Sidebar title background') . '</label>
                             <div class="margin-form">
                             <input type="color" name="sidebar_title_bg" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_SIDEBAR_TITLE_BG') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Sidebar title border') . '</label>
                             <div class="margin-form">
                             <input type="color" name="sidebar_title_border" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_SIDEBAR_TITLE_BORDER') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Sidebar title color') . '</label>
                             <div class="margin-form">
                             <input type="color" name="sidebar_title_color" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_SIDEBAR_TITLE_COLOR') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Sidebar title link') . '</label>
                             <div class="margin-form">
                             <input type="color" name="sidebar_title_link" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_SIDEBAR_TITLE_LINK') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Sidebar hover title link') . '</label>
                             <div class="margin-form">
                             <input type="color" name="sidebar_title_link_hover" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_SIDEBAR_TITLE_LINK_HOVER') . '" />
                        </div></div>
                        <h3>' . $this->l('Sidebar block content') . '</h3>
                        <div class="roytc_row">
                             <label>' . $this->l('Sidebar block content background') . '</label>
                             <div class="margin-form">
                             <input type="color" name="sidebar_block_content_bg" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_SIDEBAR_BLOCK_CONTENT_BG') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Sidebar block content border') . '</label>
                             <div class="margin-form">
                             <input type="color" name="sidebar_block_content_border" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_SIDEBAR_BLOCK_CONTENT_BORDER') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Sidebar block text color') . '</label>
                             <div class="margin-form">
                             <input type="color" name="sidebar_block_text_color" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_SIDEBAR_BLOCK_TEXT_COLOR') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Sidebar block link') . '</label>
                             <div class="margin-form">
                             <input type="color" name="sidebar_block_link" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_SIDEBAR_BLOCK_LINK') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Sidebar block hover link') . '</label>
                             <div class="margin-form">
                             <input type="color" name="sidebar_block_link_hover" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_SIDEBAR_BLOCK_LINK_HOVER') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Sidebar button background') . '</label>
                             <div class="margin-form">
                             <input type="color" name="sidebar_button_bg" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_SIDEBAR_BUTTON_BG') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Sidebar button border') . '</label>
                             <div class="margin-form">
                             <input type="color" name="sidebar_button_border" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_SIDEBAR_BUTTON_BORDER') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Sidebar button color') . '</label>
                             <div class="margin-form">
                             <input type="color" name="sidebar_button_color" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_SIDEBAR_BUTTON_COLOR') . '" />
                        </div></div>
                        <h3>' . $this->l('Sidebar block products') . '</h3>
                        <div class="roytc_row">
                             <label>' . $this->l('Sidebar product separator') . '</label>
                             <div class="margin-form">
                             <input type="color" name="sidebar_item_separator" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_SIDEBAR_ITEM_SEPARATOR') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Sidebar product image border') . '</label>
                             <div class="margin-form">
                             <input type="color" name="sidebar_product_img_border" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_SIDEBAR_PRODUCT_IMG_BORDER') . '" />
                        </div></div>
                        <h3>' . $this->l('Sidebar block categories') . '</h3>
                        <div class="roytc_row">
                             <label>' . $this->l('Sidebar categories item color') . '</label>
                             <div class="margin-form">
                             <input type="color" name="sidebar_categories_item" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_SIDEBAR_CATEGORIES_ITEM') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Sidebar categories hover item color ') . '</label>
                             <div class="margin-form">
                             <input type="color" name="sidebar_categories_item_hover" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_SIDEBAR_CATEGORIES_ITEM_HOVER') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Sidebar categories separator ') . '</label>
                             <div class="margin-form">
                             <input type="color" name="sidebar_categories_separator" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_SIDEBAR_CATEGORIES_SEPARATOR') . '" />
                        </div></div>

                        <h3>' . $this->l('Pages content') . '</h3>
                        <div class="roytc_row">
                             <label>' . $this->l('Pages title') . '</label>
                             <div class="margin-form">
                             <input type="color" name="cms_title" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_CMS_TITLE') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Pages title border') . '</label>
                             <div class="margin-form">
                             <input type="color" name="cms_title_border" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_CMS_TITLE_BORDER') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Pages title marked border') . '</label>
                             <div class="margin-form">
                             <input type="color" name="cms_title_border_mark" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_CMS_TITLE_BORDER_MARK') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Page text color') . '</label>
                             <div class="margin-form">
                             <input type="color" name="page_text_color" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PAGE_TEXT_COLOR') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Page headings') . '</label>
                             <div class="margin-form">
                             <input type="color" name="page_headings" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PAGE_HEADINGS') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Page link') . '</label>
                             <div class="margin-form">
                             <input type="color" name="page_link" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PAGE_LINK') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Page hover link') . '</label>
                             <div class="margin-form">
                             <input type="color" name="page_link_hover" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PAGE_LINK_HOVER') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Contact form background') . '</label>
                             <div class="margin-form">
                             <input type="color" name="contact_form_bg" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_CONTACT_FORM_BG') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Contact form border color') . '</label>
                             <div class="margin-form">
                             <input type="color" name="contact_form_border" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_CONTACT_FORM_BORDER') . '" />
                        </div></div>

                        <h3>' . $this->l('Alert messages') . '</h3>
                        <div class="roytc_row">
                             <label>' . $this->l('Warning message background') . '</label>
                             <div class="margin-form">
                             <input type="color" name="warning_message_bg" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_WARNING_MESSAGE_BG') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Warning message color') . '</label>
                             <div class="margin-form">
                             <input type="color" name="warning_message_color" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_WARNING_MESSAGE_COLOR') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Success message background') . '</label>
                             <div class="margin-form">
                             <input type="color" name="success_message_bg" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_SUCCESS_MESSAGE_BG') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Success message color') . '</label>
                             <div class="margin-form">
                             <input type="color" name="success_message_color" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_SUCCESS_MESSAGE_COLOR') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Info message background') . '</label>
                             <div class="margin-form">
                             <input type="color" name="info_message_bg" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_INFO_MESSAGE_BG') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Info message color') . '</label>
                             <div class="margin-form">
                             <input type="color" name="info_message_color" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_INFO_MESSAGE_COLOR') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Danger message background') . '</label>
                             <div class="margin-form">
                             <input type="color" name="danger_message_bg" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_DANGER_MESSAGE_BG') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Danger message color') . '</label>
                             <div class="margin-form">
                             <input type="color" name="danger_message_color" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_DANGER_MESSAGE_COLOR') . '" />
                        </div></div>
            </div>


            <div class="tab-pane" id ="tab-productlist">
                    <h2 class="rtc_title7">' . $this->l('Product list') . '</h2>
					
                    <h3>' . $this->l('How much products in a row you want to show on category page?') . ' <span class="new_label">New!</span></h3>
					<div class="roytc_row">
                    <label>' . $this->l('Number of products in row?') . '</label>
                    <div class="margin-form">
                        <input type="radio" class="regular-radio" name="nc_product_switch" id="nc_product_switch_1" value="1" ' . ((Configuration::get('NC_PRODUCT_SWITCH') == 1) ? 'checked="checked" ' : '') . '/>
                        <label class="t" for="nc_product_switch_1"> 3</label>
                        <input type="radio" class="regular-radio" name="nc_product_switch" id="nc_product_switch_2" value="2" ' . ((Configuration::get('NC_PRODUCT_SWITCH') == 2) ? 'checked="checked" ' : '') . '/>
                        <label class="t" for="nc_product_switch_2"> 4</label>
                        <input type="radio" class="regular-radio" name="nc_product_switch" id="nc_product_switch_3" value="3" ' . ((Configuration::get('NC_PRODUCT_SWITCH') == 3) ? 'checked="checked" ' : '') . '/>
                        <label class="t" for="nc_product_switch_3"> 5</label>
                    </div></div>

                    <h3>' . $this->l('Second Image of product on hover') . '</h3>
                        <div class="roytc_row">
                        <label>' . $this->l('Enable Second Image on hover?') . '</label>
                        <div class="margin-form">
                            <input type="radio" class="regular-radio" name="nc_second_img" id="nc_second_img_1" value="1" ' . ((Configuration::get('NC_SECOND_IMG') == 1) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="nc_second_img_1"> Yes</label>
                            <input type="radio" class="regular-radio" name="nc_second_img" id="nc_second_img_0" value="0" ' . ((Configuration::get('NC_SECOND_IMG') == 0) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="nc_second_img_0"> No</label>
                        <p class="clear helpcontent">' . $this->l('If you turn it on, second images of each product will shows on mouse over') . '</p>
                        </div></div>
                    <h3>' . $this->l('Category top content') . '</h3>
                        <div class="roytc_row">
                        <label>' . $this->l('Display category image, description?') . '</label>
                        <div class="margin-form">
                            <input type="radio" class="regular-radio" name="nc_cat" id="nc_cat_1" value="1" ' . ((Configuration::get('NC_CAT') == 1) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="nc_cat_1"> Yes</label>
                            <input type="radio" class="regular-radio" name="nc_cat" id="nc_cat_0" value="0" ' . ((Configuration::get('NC_CAT') == 0) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="nc_cat_0"> No</label>
                        <p class="clear helpcontent">' . $this->l('If you turn it on, Category name, image and description will be display on the top of category page') . '</p>
                        </div></div>
                    <h3>' . $this->l('Subcategories') . '</h3>
                        <div class="roytc_row">
                        <label>' . $this->l('Display subcategories thumbnails?') . '</label>
                        <div class="margin-form">
                            <input type="radio" class="regular-radio" name="nc_subcat" id="nc_subcat_1" value="1" ' . ((Configuration::get('NC_SUBCAT') == 1) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="nc_subcat_1"> Yes</label>
                            <input type="radio" class="regular-radio" name="nc_subcat" id="nc_subcat_0" value="0" ' . ((Configuration::get('NC_SUBCAT') == 0) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="nc_subcat_0"> No</label>
                        <p class="clear helpcontent">' . $this->l('If you turn it on, thumbnails and names of subcategories will be display on the top of category page') . '</p>
                        </div></div>
                    <h3>' . $this->l('Headings') . '</h3>
                        <div class="roytc_row">
                             <label>' . $this->l('Heading color') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pl_heading_color" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PL_HEADING_COLOR') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Heading number of items color') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pl_heading_text" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PL_HEADING_TEXT') . '" />
                        </div></div>

                        <h3>' . $this->l('Navigation') . '</h3>
                        <div class="roytc_row">
                             <label>' . $this->l('Top and bottom navigation background') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pl_nav_top_bg" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PL_NAV_TOP_BG') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Top and bottom navigation border') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pl_nav_top_border" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PL_NAV_TOP_BORDER') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Grid and list button color') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pl_nav_grid" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PL_NAV_GRID') . '" />
                        </div></div>

                        <label>' . $this->l('Grid-list icon') . '</label>
                        <div class="margin-form">
                                <input id="pl_gl_field2" type="file" name="pl_gl_field2">
                                <input id="pl_gl_button2" type="submit" class="button" name="pl_gl_button2" value="' . $this->l('Upload') . '">
                                <p class="clear helpcontent">' . $this->l('You can upload your image in transparent .png format. For best result change color of default image:') . ' <a href="' . $this -> _path . 'images/defaults/gridlist.png">Download PNG</a>
                                <br /><br />' . $this->l('You can also find this icon in PSD folder. It is layered and easy to change.') . '
                                <br /><br />' . $this->l('If you accidentally delete default image, you can always download it from the link above, and upload.') . '
                                </p>
                        </div>';
        $pl_gl_ext = Configuration::get('RTC_PL_GL_EXT');
        if ($pl_gl_ext != "") {
            if (Shop::getContext() == Shop::CONTEXT_SHOP)
                $adv_imgname = 'gridlist'.'-'.(int)$this->context->shop->getContextShopID();

            $html .= '<label>' . $this->l('Grid-list icon') . '</label>
                            <div class="margin-form">
                            <img class="imgback" src="' . $this -> _path .'upload/'.$adv_imgname.'.' . $pl_gl_ext . '" /><br /><br />
                            <input id="pl_gl_delete2" type="submit" class="button" value="' . $this->l('Delete image') . '" name="pl_gl_delete2">
                            </div>';
        }
        $html .= '
                        <div class="roytc_row">
                             <label>' . $this->l('Compare separator') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pl_nav_compare_border" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PL_NAV_COMPARE_BORDER') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Sort color') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pl_nav_sort" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PL_NAV_SORT') . '" />
                        </div></div>

                        <h3>' . $this->l('Bottom navigation') . '</h3>
                        <div class="roytc_row">
                             <label>' . $this->l('Pagination number background') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pl_number_bg" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PL_NUMBER_BG') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Pagination hover number background') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pl_number_bg_hover" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PL_NUMBER_BG_HOVER') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Pagination number color') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pl_number_color" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PL_NUMBER_COLOR') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Pagination hover number color') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pl_number_color_hover" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PL_NUMBER_COLOR_HOVER') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Pagination active number background') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pl_pag_active_bg" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PL_PAG_ACTIVE_BG') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Pagination active number color') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pl_pag_active_color" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PL_PAG_ACTIVE_COLOR') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Pagination arrows background') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pl_pag_nav_bg" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PL_PAG_NAV_BG') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Pagination hover arrows background') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pl_pag_nav_bg_hover" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PL_PAG_NAV_BG_HOVER') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Pagination arrows color') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pl_pag_nav_color" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PL_PAG_NAV_COLOR') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Pagination hover arrows color') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pl_pag_nav_color_hover" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PL_PAG_NAV_COLOR_HOVER') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Pagination show per page color') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pl_show_per_page" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PL_SHOW_PER_PAGE') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Pagination show number of items color') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pl_show_items" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PL_SHOW_ITEMS') . '" />
                        </div></div>

                        <h3>' . $this->l('Sidebar Filter') . '</h3>
                        <div class="roytc_row">
                             <label>' . $this->l('Filters separator') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pl_filter_separator" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PL_FILTER_SEPARATOR') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Price range color') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pl_filter_range" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PL_FILTER_RANGE') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Price range out color') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pl_filter_range_out" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PL_FILTER_RANGE_OUT') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Price range handle color') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pl_filter_handle_bg" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PL_FILTER_HANDLE_BG') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Price range handle border') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pl_filter_handle_border" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PL_FILTER_HANDLE_BORDER') . '" />
                        </div></div>

                        <h3>' . $this->l('Product item') . '</h3>
                        <div class="roytc_row">
                             <label>' . $this->l('Product item background') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pl_item_bg" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PL_ITEM_BG') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Product item border') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pl_item_border" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PL_ITEM_BORDER') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Product name') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pl_product_name" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PL_PRODUCT_NAME') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Product price') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pl_product_price" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PL_PRODUCT_PRICE') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Product old price') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pl_product_oldprice" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PL_PRODUCT_OLDPRICE') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Product percent reduction') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pl_product_percent" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PL_PRODUCT_PERCENT') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Product percent reduction background') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pl_product_percent_bg" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PL_PRODUCT_PERCENT_BG') . '" />
                        </div></div>

                        <h3>' . $this->l('Product list: display LIST-style only') . '</h3>
                        <div class="roytc_row">
                             <label>' . $this->l('Product image border color') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pl_list_img_border" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PL_LIST_IMG_BORDER') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Product item background') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pl_list_bg" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PL_LIST_BG') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Product description') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pl_list_description" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PL_LIST_DESCRIPTION') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Separators color') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pl_list_separator" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PL_LIST_SEPARATOR') . '" />
                        </div></div>

                        <h3>' . $this->l('Special price countdown') . ' &nbsp;<span class="new_label">New!</span></h3>
                        <label>' . $this->l('Display countdown?') . '</label>
                            <div class="margin-form">
                            <input type="radio" class="regular-radio" name="nc_count" id="nc_count_1" value="1" ' . ((Configuration::get('NC_COUNT') == 1) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="nc_count_1"> Yes</label>
                            <input type="radio" class="regular-radio" name="nc_count" id="nc_count_0" value="0" ' . ((Configuration::get('NC_COUNT') == 0) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="nc_count_0"> No</label>
                        </div>
                        <label>' . $this->l('Hide days?') . '</label>
                            <div class="margin-form">
                            <input type="radio" class="regular-radio" name="nc_count_days" id="nc_count_days_1" value="1" ' . ((Configuration::get('NC_COUNT_DAYS') == 1) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="nc_count_days_1"> Yes</label>
                            <input type="radio" class="regular-radio" name="nc_count_days" id="nc_count_days_0" value="0" ' . ((Configuration::get('NC_COUNT_DAYS') == 0) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="nc_count_days_0"> No</label>
                        </div>
                         <div class="roytc_row">
                             <label>' . $this->l('Countdown background') . '</label>
                             <div class="margin-form">
                             <input type="color" name="nc_count_bg" class="colorpicker" data-hex="true" value="' . Configuration::get('NC_COUNT_BG') . '" />
                        </div></div>
                         <div class="roytc_row">
                             <label>' . $this->l('Countdown text color') . '</label>
                             <div class="margin-form">
                             <input type="color" name="nc_count_color" class="colorpicker" data-hex="true" value="' . Configuration::get('NC_COUNT_COLOR') . '" />
                        </div></div>
                         <div class="roytc_row">
                             <label>' . $this->l('Countdown separators color') . '</label>
                             <div class="margin-form">
                             <input type="color" name="nc_count_sep" class="colorpicker" data-hex="true" value="' . Configuration::get('NC_COUNT_SEP') . '" />
                        </div></div>

                        <h3>' . $this->l('Product item buttons') . '</h3>
                         <div class="roytc_row">
                             <label>' . $this->l('Add to cart button background') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pl_product_cart" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PL_PRODUCT_CART') . '" />
                        </div></div>
                         <div class="roytc_row">
                             <label>' . $this->l('Add to cart button border') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pl_product_cart_border" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PL_PRODUCT_CART_BORDER') . '" />
                        </div></div>
                         <div class="roytc_row">
                             <label>' . $this->l('Add to cart button color') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pl_product_cart_color" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PL_PRODUCT_CART_COLOR') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Active Add to cart button background') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pl_product_cart_active" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PL_PRODUCT_CART_ACTIVE') . '" />
                        </div></div>
                         <div class="roytc_row">
                             <label>' . $this->l('Active Add to cart button border') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pl_product_cart_active_border" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PL_PRODUCT_CART_ACTIVE_BORDER') . '" />
                        </div></div>
                         <div class="roytc_row">
                             <label>' . $this->l('Active Add to cart button color') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pl_product_cart_active_color" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PL_PRODUCT_CART_ACTIVE_COLOR') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Hover Add to cart button') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pl_product_cart_hover" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PL_PRODUCT_CART_HOVER') . '" />
                        </div></div>
                         <div class="roytc_row">
                             <label>' . $this->l('Hover Add to cart button border') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pl_product_cart_hover_border" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PL_PRODUCT_CART_HOVER_BORDER') . '" />
                        </div></div>
                         <div class="roytc_row">
                             <label>' . $this->l('Hover Add to cart button color') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pl_product_cart_hover_color" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PL_PRODUCT_CART_HOVER_COLOR') . '" />
                        </div></div>

                        <div class="roytc_row">
                             <label>' . $this->l('View and Quick view button background') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pl_product_quickview" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PL_PRODUCT_QUICKVIEW') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('View and Quick view button background hover') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pl_product_quickview_hover" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PL_PRODUCT_QUICKVIEW_HOVER') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('View and Quick view text color') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pl_product_quickview_color" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PL_PRODUCT_QUICKVIEW_COLOR') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('View and Quick view button border') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pl_product_view_border" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PL_PRODUCT_VIEW_BORDER') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('View and Quick view button border hover') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pl_product_view_border_hover" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PL_PRODUCT_VIEW_BORDER_HOVER') . '" />
                        </div></div>

                        <div class="roytc_row">
                        <label>' . $this->l('Display Quick view and More Info text on hover?') . '</label>
                        <div class="margin-form">
                            <input type="radio" class="regular-radio" name="pl_product_qwtext" id="pl_product_qwtext_1" value="1" ' . ((Configuration::get('RTC_PL_PRODUCT_QWTEXT') == 1) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="pl_product_qwtext_1"> Yes</label>
                            <input type="radio" class="regular-radio" name="pl_product_qwtext" id="pl_product_qwtext_0" value="0" ' . ((Configuration::get('RTC_PL_PRODUCT_QWTEXT') == 0) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="pl_product_qwtext_0"> No</label>
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Product Compare button') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pl_product_compare" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PL_PRODUCT_COMPARE') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Product Compare button hover') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pl_product_compare_hover" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PL_PRODUCT_COMPARE_HOVER') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Product Compare and Wishlist buttons text') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pl_product_compare" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PL_PRODUCT_COMPARE') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Product Compare and Wishlist buttons hover text') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pl_product_compare_hover" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PL_PRODUCT_COMPARE_HOVER') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Product Compare icon') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pl_product_compare_icon" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PL_PRODUCT_COMPARE_ICON') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Product Compare icon selected') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pl_product_compare_icon_active" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PL_PRODUCT_COMPARE_ICON_ACTIVE') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Product Wish icon') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pl_product_wish_icon" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PL_PRODUCT_WISH_ICON') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Product Wish icon selected') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pl_product_wish_icon_active" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PL_PRODUCT_WISH_ICON_ACTIVE') . '" />
                        </div></div>

                        <label>' . $this->l('View and Quick view icons') . '</label>
                        <div class="margin-form">
                                <input id="pl_view_field2" type="file" name="pl_view_field2">
                                <input id="pl_view_button2" type="submit" class="button" name="pl_view_button2" value="' . $this->l('Upload') . '">
                                <p class="clear helpcontent">' . $this->l('You can upload your image in transparent .png format. For best result change color of default image:') . ' <a href="' . $this -> _path . 'images/defaults/product_view.png">Download PNG</a>
                                <br /><br />' . $this->l('You can also find this icon in PSD folder. It is layered and easy to change.') . '
                                <br /><br />' . $this->l('If you accidentally delete default image, you can always download it from the link above, and upload.') . '
                                </p>
                        </div>';
        $pl_view_ext = Configuration::get('RTC_PL_VIEW_EXT');
        if ($pl_view_ext != "") {
            if (Shop::getContext() == Shop::CONTEXT_SHOP)
                $adv_imgname = 'product_view'.'-'.(int)$this->context->shop->getContextShopID();

            $html .= '<label>' . $this->l('View and Quick view icons') . '</label>
                            <div class="margin-form">
                            <img class="imgback" src="' . $this -> _path .'upload/'.$adv_imgname.'.' . $pl_view_ext . '" /><br /><br />
                            <input id="pl_view_delete2" type="submit" class="button" value="' . $this->l('Delete image') . '" name="pl_view_delete2">
                            </div>';
        }
        $html .= '
                        <label>' . $this->l('Wishlist and Compare icons') . '</label>
                        <div class="margin-form">
                                <input id="pl_wc_field2" type="file" name="pl_wc_field2">
                                <input id="pl_wc_button2" type="submit" class="button" name="pl_wc_button2" value="' . $this->l('Upload') . '">
                                <p class="clear helpcontent">' . $this->l('You can upload your image in transparent .png format. For best result change color of default image:') . ' <a href="' . $this -> _path . 'images/defaults/product_wishcomp.png">Download PNG</a>
                                <br /><br />' . $this->l('You can also find this icon in PSD folder. It is layered and easy to change.') . '
                                <br /><br />' . $this->l('If you accidentally delete default image, you can always download it from the link above, and upload.') . '
                                </p>
                            </div>';
        $pl_wc_ext = Configuration::get('RTC_PL_WC_EXT');
        if ($pl_wc_ext != "") {
            if (Shop::getContext() == Shop::CONTEXT_SHOP)
                $adv_imgname = 'product_wishcomp'.'-'.(int)$this->context->shop->getContextShopID();

            $html .= '<label>' . $this->l('Wishlist and Compare icons') . '</label>
                                    <div class="margin-form">
                                    <img class="imgback" src="' . $this -> _path .'upload/'.$adv_imgname.'.' . $pl_wc_ext . '" /><br /><br />
                                    <input id="pl_wc_delete2" type="submit" class="button" value="' . $this->l('Delete image') . '" name="pl_wc_delete2">
                                    </div>';
        }
        $html .= '

                        <h3>' . $this->l('Product labels') . '</h3>
                        <div class="roytc_row">
                             <label>' . $this->l('New label background') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pl_product_new_bg" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PL_PRODUCT_NEW_BG') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('New label border') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pl_product_new_border" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PL_PRODUCT_NEW_BORDER') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('New label color') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pl_product_new_color" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PL_PRODUCT_NEW_COLOR') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Sale label background') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pl_product_sale_bg" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PL_PRODUCT_SALE_BG') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Sale label border') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pl_product_sale_border" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PL_PRODUCT_SALE_BORDER') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Sale label color') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pl_product_sale_color" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PL_PRODUCT_SALE_COLOR') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Sold Out label background') . '<span class="new_label">New!</span></label>
                             <div class="margin-form">
                             <input type="color" name="nc_soldout_bg" class="colorpicker" data-hex="true" value="' . Configuration::get('NC_SOLDOUT_BG') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Sold Out label border') . '<span class="new_label">New!</span></label>
                             <div class="margin-form">
                             <input type="color" name="nc_soldout_border" class="colorpicker" data-hex="true" value="' . Configuration::get('NC_SOLDOUT_BORDER') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Sold Out label color') . '<span class="new_label">New!</span></label>
                             <div class="margin-form">
                             <input type="color" name="nc_soldout_color" class="colorpicker" data-hex="true" value="' . Configuration::get('NC_SOLDOUT_COLOR') . '" />
                        </div></div>

                        <h3>' . $this->l('Display elements') . '</h3>
                        <div class="roytc_row">
                        <label>' . $this->l('My products have long names!') . '</label>
                        <div class="margin-form">
                            <input type="radio" class="regular-radio" name="desc_height" id="desc_height_1" value="1" ' . ((Configuration::get('RTC_DESC_HEIGHT') == 1) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="desc_height_1"> Yes</label>
                            <input type="radio" class="regular-radio" name="desc_height" id="desc_height_0" value="0" ' . ((Configuration::get('RTC_DESC_HEIGHT') == 0) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="desc_height_0"> No</label>
                        <p class="clear helpcontent">' . $this->l('If you turn it on, all product items will increase the height designated for the product name') . '</p>
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Display White gradient on image hover?') . '</label>
                        <div class="margin-form">
                            <input type="radio" class="regular-radio" name="pl_product_white_grad" id="pl_product_white_grad_1" value="1" ' . ((Configuration::get('RTC_PL_PRODUCT_WHITE_GRAD') == 1) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="pl_product_white_grad_1"> Yes</label>
                            <input type="radio" class="regular-radio" name="pl_product_white_grad" id="pl_product_white_grad_0" value="0" ' . ((Configuration::get('RTC_PL_PRODUCT_WHITE_GRAD') == 0) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="pl_product_white_grad_0"> No</label>
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Display Quick view button?') . '</label>
                        <div class="margin-form">
                            <input type="radio" class="regular-radio" name="pl_product_display_quickview" id="pl_product_display_quickview_1" value="1" ' . ((Configuration::get('RTC_PL_PRODUCT_DISPLAY_QUICKVIEW') == 1) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="pl_product_display_quickview_1"> Yes</label>
                            <input type="radio" class="regular-radio" name="pl_product_display_quickview" id="pl_product_display_quickview_0" value="0" ' . ((Configuration::get('RTC_PL_PRODUCT_DISPLAY_QUICKVIEW') == 0) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="pl_product_display_quickview_0"> No</label>
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Display View button?') . '</label>
                        <div class="margin-form">
                            <input type="radio" class="regular-radio" name="pl_product_display_view" id="pl_product_display_view_1" value="1" ' . ((Configuration::get('RTC_PL_PRODUCT_DISPLAY_VIEW') == 1) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="pl_product_display_view_1"> Yes</label>
                            <input type="radio" class="regular-radio" name="pl_product_display_view" id="pl_product_display_view_0" value="0" ' . ((Configuration::get('RTC_PL_PRODUCT_DISPLAY_VIEW') == 0) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="pl_product_display_view_0"> No</label>
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Display New label?') . '</label>
                        <div class="margin-form">
                            <input type="radio" class="regular-radio" name="pl_product_display_new" id="pl_product_display_new_1" value="1" ' . ((Configuration::get('RTC_PL_PRODUCT_DISPLAY_NEW') == 1) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="pl_product_display_new_1"> Yes</label>
                            <input type="radio" class="regular-radio" name="pl_product_display_new" id="pl_product_display_new_0" value="0" ' . ((Configuration::get('RTC_PL_PRODUCT_DISPLAY_NEW') == 0) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="pl_product_display_new_0"> No</label>
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Display Sale label?') . '</label>
                        <div class="margin-form">
                            <input type="radio" class="regular-radio" name="pl_product_display_sale" id="pl_product_display_sale_1" value="1" ' . ((Configuration::get('RTC_PL_PRODUCT_DISPLAY_SALE') == 1) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="pl_product_display_sale_1"> Yes</label>
                            <input type="radio" class="regular-radio" name="pl_product_display_sale" id="pl_product_display_sale_0" value="0" ' . ((Configuration::get('RTC_PL_PRODUCT_DISPLAY_SALE') == 0) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="pl_product_display_sale_0"> No</label>
                        </div></div>

                        <h3>' . $this->l('Compare page') . '</h3>
                        <div class="roytc_row">
                        <label>' . $this->l('Left column background') . '</label>
                             <div class="margin-form">
                             <input type="color" name="c_left_column" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_C_LEFT_COLUMN') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Right column background') . '</label>
                             <div class="margin-form">
                             <input type="color" name="c_right_column" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_C_RIGHT_COLUMN') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Left column color') . '</label>
                             <div class="margin-form">
                             <input type="color" name="c_left_color" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_C_LEFT_COLOR') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Right column color') . '</label>
                             <div class="margin-form">
                             <input type="color" name="c_right_color" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_C_RIGHT_COLOR') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Product image border') . '</label>
                             <div class="margin-form">
                             <input type="color" name="c_img_border" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_C_IMG_BORDER') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Product remove link') . '</label>
                             <div class="margin-form">
                             <input type="color" name="c_remove" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_C_REMOVE') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Product remove link hover') . '</label>
                             <div class="margin-form">
                             <input type="color" name="c_remove_hover" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_C_REMOVE_HOVER') . '" />
                        </div></div>
            </div>


            <div class="tab-pane" id ="tab-productpage">
                    <h2 class="rtc_title8">' . $this->l('Product page and Quick view') . '</h2>
                      <h3>' . $this->l('Left column') . '</h3>
                        <div class="roytc_row">
                        <label>' . $this->l('Product image border') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pp_img_border" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PP_IMG_BORDER') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Image thumbnails border') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pp_icon_border" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PP_ICON_BORDER') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Image thumbnails border hover') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pp_icon_border_hover" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PP_ICON_BORDER_HOVER') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Image thumbnails navigation color') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pp_icon_nav_bg" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PP_ICON_NAV_BG') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Image thumbnails navigation color hover') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pp_icon_nav_bg_hover" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PP_ICON_NAV_BG_HOVER') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Social buttons background') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pp_social_bg" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PP_SOCIAL_BG') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Social buttons color') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pp_social_color" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PP_SOCIAL_COLOR') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Useful bottom links color') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pp_useful_color" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PP_USEFUL_COLOR') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Useful bottom links color hover') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pp_useful_color_hover" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PP_USEFUL_COLOR_HOVER') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Useful links icons background') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pp_useful_icon" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PP_USEFUL_ICON') . '" />
                        </div></div>

                        <label>' . $this->l('Useful links icons') . '</label>
                        <div class="margin-form">
                                <input id="pp_use_field2" type="file" name="pp_use_field2">
                                <input id="pp_use_button2" type="submit" class="button" name="pp_use_button2" value="' . $this->l('Upload') . '">
                                <p class="clear helpcontent">' . $this->l('You can upload your image in transparent .png format. For best result change color of default image:') . ' <a href="' . $this -> _path . 'images/defaults/product_useful.png">Download PNG</a>
                                <br /><br />' . $this->l('You can also find this icon in PSD folder. It is layered and easy to change.') . '
                                <br /><br />' . $this->l('If you accidentally delete default image, you can always download it from the link above, and upload.') . '
                                </p>
                            </div>';
        $pp_use_ext = Configuration::get('RTC_PP_USE_EXT');
        if ($pp_use_ext != "") {
            if (Shop::getContext() == Shop::CONTEXT_SHOP)
                $adv_imgname = 'product_useful'.'-'.(int)$this->context->shop->getContextShopID();

            $html .= '<label>' . $this->l('Useful links icons') . '</label>
                            <div class="margin-form">
                            <img class="imgback" src="' . $this -> _path .'upload/'.$adv_imgname.'.' . $pp_use_ext . '" /><br /><br />
                            <input id="pp_use_delete2" type="submit" class="button" value="' . $this->l('Delete image') . '" name="pp_use_delete2">
                            </div>';
        }
        $html .= '
                        <div class="roytc_row">
                        <label>' . $this->l('Display social links?') . '</label>
                            <div class="margin-form">
                            <input type="radio" class="regular-radio" name="pp_display_social" id="pp_display_social_1" value="1" ' . ((Configuration::get('RTC_PP_DISPLAY_SOCIAL') == 1) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="pp_display_social_1"> Yes</label>
                            <input type="radio" class="regular-radio" name="pp_display_social" id="pp_display_social_0" value="0" ' . ((Configuration::get('RTC_PP_DISPLAY_SOCIAL') == 0) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="pp_display_social_0"> No</label>
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Display Wishlist button?') . '</label>
                            <div class="margin-form">
                            <input type="radio" class="regular-radio" name="pp_display_wish" id="pp_display_wish_1" value="1" ' . ((Configuration::get('RTC_PP_DISPLAY_WISH') == 1) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="pp_display_wish_1"> Yes</label>
                            <input type="radio" class="regular-radio" name="pp_display_wish" id="pp_display_wish_0" value="0" ' . ((Configuration::get('RTC_PP_DISPLAY_WISH') == 0) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="pp_display_wish_0"> No</label>
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Display Send to friends button?') . '</label>
                            <div class="margin-form">
                            <input type="radio" class="regular-radio" name="pp_display_send" id="pp_display_send_1" value="1" ' . ((Configuration::get('RTC_PP_DISPLAY_SEND') == 1) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="pp_display_send_1"> Yes</label>
                            <input type="radio" class="regular-radio" name="pp_display_send" id="pp_display_send_0" value="0" ' . ((Configuration::get('RTC_PP_DISPLAY_SEND') == 0) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="pp_display_send_0"> No</label>
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Display Print button?') . '</label>
                            <div class="margin-form">
                            <input type="radio" class="regular-radio" name="pp_display_print" id="pp_display_print_1" value="1" ' . ((Configuration::get('RTC_PP_DISPLAY_PRINT') == 1) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="pp_display_print_1"> Yes</label>
                            <input type="radio" class="regular-radio" name="pp_display_print" id="pp_display_print_0" value="0" ' . ((Configuration::get('RTC_PP_DISPLAY_PRINT') == 0) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="pp_display_print_0"> No</label>
                        </div></div>

                      <h3>' . $this->l('Right column') . '</h3>
                        <div class="roytc_row">
                        <label>' . $this->l('Product name') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pp_name" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PP_NAME') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Product description') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pp_desc" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PP_DESC') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Product info label') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pp_info_label" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PP_INFO_LABEL') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Product info value') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pp_info_value" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PP_INFO_VALUE') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Display manufacturer label?') . '<span class="new_label">New!</span></label>
                            <div class="margin-form">
                            <input type="radio" class="regular-radio" name="nc_man_text" id="nc_man_text_1" value="1" ' . ((Configuration::get('NC_MAN_TEXT') == 1) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="nc_man_text_1"> Yes</label>
                            <input type="radio" class="regular-radio" name="nc_man_text" id="nc_man_text_0" value="0" ' . ((Configuration::get('NC_MAN_TEXT') == 0) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="nc_man_text_0"> No</label>
                            <p class="clear helpcontent">' . $this->l('If you want to display manufacturer label on product page - turn it to YES') . '
                            </p>
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Display manufacturer logo?') . '<span class="new_label">New!</span></label>
                            <div class="margin-form">
                            <input type="radio" class="regular-radio" name="nc_man_logo" id="nc_man_logo_1" value="1" ' . ((Configuration::get('NC_MAN_LOGO') == 1) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="nc_man_logo_1"> Yes</label>
                            <input type="radio" class="regular-radio" name="nc_man_logo" id="nc_man_logo_0" value="0" ' . ((Configuration::get('NC_MAN_LOGO') == 0) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="nc_man_logo_0"> No</label>
                            <p class="clear helpcontent">' . $this->l('If you want to display manufacturer logo on product page - turn it to YES') . '
                            </p>
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Display Reference?') . '</label>
                            <div class="margin-form">
                            <input type="radio" class="regular-radio" name="pp_display_refer" id="pp_display_refer_1" value="1" ' . ((Configuration::get('RTC_PP_DISPLAY_REFER') == 1) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="pp_display_refer_1"> Yes</label>
                            <input type="radio" class="regular-radio" name="pp_display_refer" id="pp_display_refer_0" value="0" ' . ((Configuration::get('RTC_PP_DISPLAY_REFER') == 0) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="pp_display_refer_0"> No</label>
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Display Condition?') . '</label>
                            <div class="margin-form">
                            <input type="radio" class="regular-radio" name="pp_display_cond" id="pp_display_cond_1" value="1" ' . ((Configuration::get('RTC_PP_DISPLAY_COND') == 1) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="pp_display_cond_1"> Yes</label>
                            <input type="radio" class="regular-radio" name="pp_display_cond" id="pp_display_cond_0" value="0" ' . ((Configuration::get('RTC_PP_DISPLAY_COND') == 0) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="pp_display_cond_0"> No</label>
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Display Availability?') . '</label>
                            <div class="margin-form">
                            <input type="radio" class="regular-radio" name="pp_display_avail" id="pp_display_avail_1" value="1" ' . ((Configuration::get('RTC_PP_DISPLAY_AVAIL') == 1) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="pp_display_avail_1"> Yes</label>
                            <input type="radio" class="regular-radio" name="pp_display_avail" id="pp_display_avail_0" value="0" ' . ((Configuration::get('RTC_PP_DISPLAY_AVAIL') == 0) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="pp_display_avail_0"> No</label>
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Product attribute label') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pp_att_label" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PP_ATT_LABEL') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Product attribute selector background') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pp_att_input_bg" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PP_ATT_INPUT_BG') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('I have long attribute names and they not aligned properly!') . '</label>
                            <div class="margin-form">
                            <input type="radio" class="regular-radio" name="nc_pp_att_right" id="nc_pp_att_right_1" value="1" ' . ((Configuration::get('NC_PP_ATT_RIGHT') == 1) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="nc_pp_att_right_1"> Yes</label>
                            <input type="radio" class="regular-radio" name="nc_pp_att_right" id="nc_pp_att_right_0" value="0" ' . ((Configuration::get('NC_PP_ATT_RIGHT') == 0) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="nc_pp_att_right_0"> No</label>
                            <p class="clear helpcontent">' . $this->l('If you turn it on - selectors of you attributes on product page will be aligned to the right side. ') . '
                            </p>
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Color square border') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pp_att_color" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PP_ATT_COLOR') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Color selected square border') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pp_att_color_active" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PP_ATT_COLOR_ACTIVE') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Quantity input background') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pp_att_quan_input_bg" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PP_ATT_QUAN_INPUT_BG') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Quantity plus-minus background') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pp_att_quan_pm_bg" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PP_ATT_QUAN_PM_BG') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Quantity plus-minus background hover') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pp_att_quan_pm_bg_hover" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PP_ATT_QUAN_PM_BG_HOVER') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Quantity plus-minus color') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pp_att_quan_pm_color" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PP_ATT_QUAN_PM_COLOR') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Quantity plus-minus color hover') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pp_att_quan_pm_color_hover" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PP_ATT_QUAN_PM_COLOR_HOVER') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Add to cart product background') . '</label>
                             <div class="margin-form">
                             <input type="color" name="nc_pp_add_bg" class="colorpicker" data-hex="true" value="' . Configuration::get('NC_PP_ADD_BG') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Add to cart product border') . '</label>
                             <div class="margin-form">
                             <input type="color" name="nc_pp_add_border" class="colorpicker" data-hex="true" value="' . Configuration::get('NC_PP_ADD_BORDER') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Add to cart product color') . '</label>
                             <div class="margin-form">
                             <input type="color" name="nc_pp_add_color" class="colorpicker" data-hex="true" value="' . Configuration::get('NC_PP_ADD_COLOR') . '" />
                        </div></div>

                      <h3>' . $this->l('Special price Countdown') . ' &nbsp;<span class="new_label">New!</h3>
                        <div class="roytc_row">
                        <label>' . $this->l('Countdown title color') . '</label>
                             <div class="margin-form">
                             <input type="color" name="nc_count_pr_title" class="colorpicker" data-hex="true" value="' . Configuration::get('NC_COUNT_PR_TITLE') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Countdown title background') . '</label>
                             <div class="margin-form">
                             <input type="color" name="nc_count_pr_titlebg" class="colorpicker" data-hex="true" value="' . Configuration::get('NC_COUNT_PR_TITLEBG') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Countdown main background') . '</label>
                             <div class="margin-form">
                             <input type="color" name="nc_count_pr_bg" class="colorpicker" data-hex="true" value="' . Configuration::get('NC_COUNT_PR_BG') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Countdown main text color') . '</label>
                             <div class="margin-form">
                             <input type="color" name="nc_count_pr_color" class="colorpicker" data-hex="true" value="' . Configuration::get('NC_COUNT_PR_COLOR') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Countdown border and separators') . '</label>
                             <div class="margin-form">
                             <input type="color" name="nc_count_pr_sep" class="colorpicker" data-hex="true" value="' . Configuration::get('NC_COUNT_PR_SEP') . '" />
                        </div></div>

                      <h3>' . $this->l('Price and Cart button box') . '</h3>
                        <div class="roytc_row">
                        <label>' . $this->l('Price box background') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pp_price_box" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PP_PRICE_BOX') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Price box border') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pp_price_border" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PP_PRICE_BORDER') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Price box separator') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pp_price_separator" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PP_PRICE_SEPARATOR') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Price color') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pp_price_color" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PP_PRICE_COLOR') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('I have long prices and they do not fit to container!') . '</label>
                            <div class="margin-form">
                            <input type="radio" class="regular-radio" name="nc_long_prices" id="nc_long_prices_1" value="1" ' . ((Configuration::get('NC_LONG_PRICES') == 1) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="nc_long_prices_1"> Yes</label>
                            <input type="radio" class="regular-radio" name="nc_long_prices" id="nc_long_prices_0" value="0" ' . ((Configuration::get('NC_LONG_PRICES') == 0) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="nc_long_prices_0"> No</label>
                            <p class="clear helpcontent">' . $this->l('If you turn it on - prices with reduction percent and old price will be displayed on three rows, not one.') . '
                            </p>
                        </div></div>

                      <h3>' . $this->l('More info tabs') . '</h3>
                        <div class="roytc_row">
                        <label>' . $this->l('Tabs background') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pp_tabs_bg" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PP_TABS_BG') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Tabs background hover') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pp_tabs_bg_hover" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PP_TABS_BG_HOVER') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Tabs color') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pp_tabs_color" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PP_TABS_COLOR') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Tabs color hover') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pp_tabs_color_hover" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PP_TABS_COLOR_HOVER') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Sheets background') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pp_tabs_sheets_bg" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PP_TABS_SHEETS_BG') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Sheets color') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pp_tabs_sheets_color" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PP_TABS_SHEETS_COLOR') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Sheets table left column') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pp_tabs_table_left" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PP_TABS_TABLE_LEFT') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Sheets table right column') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pp_tabs_table_right" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PP_TABS_TABLE_RIGHT') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Sheets table left column color') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pp_tabs_table_left_color" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PP_TABS_TABLE_LEFT_COLOR') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Sheets table right column color') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pp_tabs_table_right_color" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PP_TABS_TABLE_RIGHT_COLOR') . '" />
                        </div></div>

                        <h3>' . $this->l('Accessories tab') . '</h3>
                        <div class="roytc_row">
                        <label>' . $this->l('Product name') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pp_ac_name" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PP_AC_NAME') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Product price') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pp_ac_price" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PP_AC_PRICE') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Product description') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pp_ac_desc" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PP_AC_DESC') . '" />
                        </div></div>

                        <h3>' . $this->l('Quick-view') . '</h3>
                        <div class="roytc_row">
                        <label>' . $this->l('Quick-view background') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pp_qw_bg" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PP_QW_BG') . '" />
                        </div></div>
            </div>



            <div class="tab-pane" id ="tab-cart">
                <h2 class="rtc_title9">' . $this->l('Cart and buy message') . '</h2>
                        <h3>' . $this->l('Cart in Header') . '</h3>
                        <div class="roytc_row">
                        <label>' . $this->l('Cart background') . '</label>
                             <div class="margin-form">
                             <input type="color" name="c_bg" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_C_BG') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Cart border') . '</label>
                             <div class="margin-form">
                             <input type="color" name="c_border" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_C_BORDER') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Cart background hover') . '</label>
                             <div class="margin-form">
                             <input type="color" name="c_bg_hover" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_C_BG_HOVER') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Cart title') . '</label>
                             <div class="margin-form">
                             <input type="color" name="c_title" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_C_TITLE') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Cart title hover') . '</label>
                             <div class="margin-form">
                             <input type="color" name="nc_c_title_hover" class="colorpicker" data-hex="true" value="' . Configuration::get('NC_C_TITLE_HOVER') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Number of products in cart') . '</label>
                             <div class="margin-form">
                             <input type="color" name="c_products" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_C_PRODUCTS') . '" />
                        </div></div>


                        <div class="roytc_row">
                        <label>' . $this->l('Cart icon background') . '</label>
                             <div class="margin-form">
                             <input type="color" name="c_bg_icon" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_C_BG_ICON') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Cart icon border') . '</label>
                             <div class="margin-form">
                             <input type="color" name="c_border_icon" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_C_BORDER_ICON') . '" />
                        </div></div>
                       <label>' . $this->l('Cart icon') . '</label>
                            <div class="margin-form">
                                <input id="cart_icon_field2" type="file" name="cart_icon_field2">
                                <input id="cart_icon_button2" type="submit" class="button" name="cart_icon_button2" value="' . $this->l('Upload') . '">
                                <p class="clear helpcontent">' . $this->l('You can upload your image in transparent .png format. For best result change color of default image:') . ' <a href="' . $this -> _path . 'images/defaults/carticon.png" >Download PNG</a>
                                <br /><br />' . $this->l('You can also find this icon in PSD folder. It is layered and easy to change.') . '
                                <br /><br />' . $this->l('If you accidentally delete default image, you can always download it from the link above, and upload.') . '
                                </p>
                            </div>';

        $cart_img_ext = Configuration::get('RTC_CART_ICON_EXT');
        if ($cart_img_ext != "") {
            if (Shop::getContext() == Shop::CONTEXT_SHOP)
                $adv_imgname = 'carticon'.'-'.(int)$this->context->shop->getContextShopID();

            $html .= '<label>' . $this->l('Cart icon') . '</label>
                                    <div class="margin-form">
                                    <img class="imgback" src="' . $this -> _path .'upload/'.$adv_imgname.'.' . $cart_img_ext . '" /><br /><br />
                                    <input id="cart_icon_delete2" type="submit" class="button" value="' . $this->l('Delete image') . '" name="cart_icon_delete2">
                                    </div>';
        }

        $html .= '

                        <div class="roytc_row">
                        <label>' . $this->l('Arrow icon color') . '</label>
                             <div class="margin-form">
                             <input type="color" name="c_arrow_color" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_C_ARROW_COLOR') . '" />
                        </div></div>

                        <div class="roytc_row">
                        <label>' . $this->l('Display arrow icon?') . '</label>
                             <div class="margin-form">
                            <input type="radio" class="regular-radio" name="c_display_arrow" id="c_display_arrow_1" value="1" ' . ((Configuration::get('RTC_C_DISPLAY_ARROW') == 1) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="c_display_arrow_1"> Yes</label>
                            <input type="radio" class="regular-radio" name="c_display_arrow" id="c_display_arrow_0" value="0" ' . ((Configuration::get('RTC_C_DISPLAY_ARROW') == 0) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="c_display_arrow_0"> No</label>
                        </div></div>

                        <h3>' . $this->l('Cart POPUP in header') . '</h3>
                        <div class="roytc_row">
                        <label>' . $this->l('Popup background') . '</label>
                             <div class="margin-form">
                             <input type="color" name="c_popup_bg" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_C_POPUP_BG') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Popup border color') . '</label>
                             <div class="margin-form">
                             <input type="color" name="c_popup_border" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_C_POPUP_BORDER') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Display popup shadow?') . '</label>
                             <div class="margin-form">
                            <input type="radio" class="regular-radio" name="c_popup_shadow" id="c_popup_shadow_1" value="1" ' . ((Configuration::get('RTC_C_POPUP_SHADOW') == 1) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="c_popup_shadow_1"> Yes</label>
                            <input type="radio" class="regular-radio" name="c_popup_shadow" id="c_popup_shadow_0" value="0" ' . ((Configuration::get('RTC_C_POPUP_SHADOW') == 0) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="c_popup_shadow_0"> No</label>
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Popup product quantity') . '</label>
                             <div class="margin-form">
                             <input type="color" name="c_product_q" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_C_PRODUCT_Q') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Popup product name link') . '</label>
                             <div class="margin-form">
                             <input type="color" name="c_product_name" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_C_PRODUCT_NAME') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Popup product name link hover') . '</label>
                             <div class="margin-form">
                             <input type="color" name="c_product_name_hover" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_C_PRODUCT_NAME_HOVER') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Popup product attributes') . '</label>
                             <div class="margin-form">
                             <input type="color" name="c_product_atts" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_C_PRODUCT_ATTS') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Popup product price') . '</label>
                             <div class="margin-form">
                             <input type="color" name="c_product_price" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_C_PRODUCT_PRICE') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Popup product remove') . '</label>
                             <div class="margin-form">
                             <input type="color" name="c_product_remove" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_C_PRODUCT_REMOVE') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Popup product remove hover') . '</label>
                             <div class="margin-form">
                             <input type="color" name="c_product_remove_hover" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_C_PRODUCT_REMOVE_HOVER') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Popup product separator') . '</label>
                             <div class="margin-form">
                             <input type="color" name="c_product_separator" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_C_PRODUCT_SEPARATOR') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Popup summary background') . '</label>
                             <div class="margin-form">
                             <input type="color" name="c_product_summary_bg" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_C_PRODUCT_SUMMARY_BG') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Popup summary title') . '</label>
                             <div class="margin-form">
                             <input type="color" name="c_product_summary_title" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_C_PRODUCT_SUMMARY_TITLE') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Popup summary value') . '</label>
                             <div class="margin-form">
                             <input type="color" name="c_product_summary_value" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_C_PRODUCT_SUMMARY_VALUE') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Summary and images border') . '</label>
                             <div class="margin-form">
                             <input type="color" name="c_summary_border" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_C_SUMMARY_BORDER') . '" />
                        </div></div>


                        <h3>' . $this->l('Buy message') . '</h3>
                        <div class="roytc_row">
                        <label>' . $this->l('Buy message background') . '</label>
                             <div class="margin-form">
                             <input type="color" name="lc_bg" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_LC_BG') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Vertical separator') . '</label>
                             <div class="margin-form">
                             <input type="color" name="lc_v_separator" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_LC_V_SEPARATOR') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Horizontal separator') . '</label>
                             <div class="margin-form">
                             <input type="color" name="lc_h_separator" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_LC_H_SEPARATOR') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Success message background') . '</label>
                             <div class="margin-form">
                             <input type="color" name="lc_success_bg" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_LC_SUCCESS_BG') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Success message color') . '</label>
                             <div class="margin-form">
                             <input type="color" name="lc_success_color" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_LC_SUCCESS_COLOR') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Image border') . '</label>
                             <div class="margin-form">
                             <input type="color" name="lc_img_border" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_LC_IMG_BORDER') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Product name') . '</label>
                             <div class="margin-form">
                             <input type="color" name="lc_product_name" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_LC_PRODUCT_NAME') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Product attributes') . '</label>
                             <div class="margin-form">
                             <input type="color" name="lc_product_atts" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_LC_PRODUCT_ATTS') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Product attributes label') . '</label>
                             <div class="margin-form">
                             <input type="color" name="lc_product_atts_label" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_LC_PRODUCT_ATTS_LABEL') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Products in cart background') . '</label>
                             <div class="margin-form">
                             <input type="color" name="lc_in_cart_bg" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_LC_IN_CART_BG') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Products in cart color') . '</label>
                             <div class="margin-form">
                             <input type="color" name="lc_in_cart_color" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_LC_IN_CART_COLOR') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Total row background') . '</label>
                             <div class="margin-form">
                             <input type="color" name="lc_total_bg" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_LC_TOTAL_BG') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Total row label') . '</label>
                             <div class="margin-form">
                             <input type="color" name="lc_total_label" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_LC_TOTAL_LABEL') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Total row value') . '</label>
                             <div class="margin-form">
                             <input type="color" name="lc_total_color" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_LC_TOTAL_COLOR') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Cross selling title') . '</label>
                             <div class="margin-form">
                             <input type="color" name="lc_cross_title" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_LC_CROSS_TITLE') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Buy message close icon') . '</label>
                             <div class="margin-form">
                             <input type="color" name="lc_close" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_LC_CLOSE') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Buy message close icon') . '</label>
                             <div class="margin-form">
                             <input type="color" name="lc_close_hover" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_LC_CLOSE_HOVER') . '" />
                        </div></div>
            </div>


            <div class="tab-pane" id ="tab-reg">
                    <h2 class="rtc_title11">' . $this->l('Registration and My account') . '</h2>
                        <div class="roytc_row">
                             <label>' . $this->l('Required fields color') . '</label>
                             <div class="margin-form">
                             <input type="color" name="ma_required" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_MA_REQUIRED') . '" />
                        </div></div>

                        <label>' . $this->l('Autentification icons') . '</label>
                        <div class="margin-form">
                            <input id="i_aut_field2" type="file" name="i_aut_field2">
                            <input id="i_aut_button2" type="submit" class="button" name="i_aut_button2" value="' . $this->l('Upload') . '">
                            <p class="clear helpcontent">' . $this->l('You can upload your image in transparent .png format. For best result change color of default image:') . ' <a href="' . $this -> _path . 'images/defaults/icons-autentification.png">Download PNG</a>
                            <br /><br />' . $this->l('You can also find this icon in PSD folder. It is layered and easy to change.') . '
                            <br /><br />' . $this->l('If you accidentally delete default image, you can always download it from the link above, and upload.') . '
                            </p>
                        </div>';

        $i_aut_ext = Configuration::get('RTC_I_AUT_EXT');
        if ($i_aut_ext != "") {
            if (Shop::getContext() == Shop::CONTEXT_SHOP)
                $adv_imgname = 'icons-autentification'.'-'.(int)$this->context->shop->getContextShopID();

            $html .= '<label>' . $this->l('Autentification icons') . '</label>
                            <div class="margin-form">
                            <img class="imgback" src="' . $this -> _path .'upload/'.$adv_imgname.'.' . $i_aut_ext . '" /><br /><br />
                            <input id="i_aut_delete2" type="submit" class="button" value="' . $this->l('Delete image') . '" name="i_aut_delete2">
                            </div>';
        }
        $html .= '
                        <h3>' . $this->l('My Account') . '</h3>
                        <div class="roytc_row">
                             <label>' . $this->l('Title color') . '</label>
                             <div class="margin-form">
                             <input type="color" name="ma_title" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_MA_TITLE') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Title hover color') . '</label>
                             <div class="margin-form">
                             <input type="color" name="ma_title_hover" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_MA_TITLE_HOVER') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Icon background') . '</label>
                             <div class="margin-form">
                             <input type="color" name="ma_icon" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_MA_ICON') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Icon border') . '</label>
                             <div class="margin-form">
                             <input type="color" name="ma_icon_border" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_MA_ICON_BORDER') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Icon background hover') . '</label>
                             <div class="margin-form">
                             <input type="color" name="ma_icon_hover" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_MA_ICON_HOVER') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Icon border hover') . '</label>
                             <div class="margin-form">
                             <input type="color" name="ma_icon_border_hover" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_MA_ICON_BORDER_HOVER') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Footer buttons separator') . '</label>
                             <div class="margin-form">
                             <input type="color" name="ma_footer_separator" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_MA_FOOTER_SEPARATOR') . '" />
                        </div></div>

                        <label>' . $this->l('My account icons') . '</label>
                        <div class="margin-form">
                            <input id="i_ma_field2" type="file" name="i_ma_field2">
                            <input id="i_ma_button2" type="submit" class="button" name="i_ma_button2" value="' . $this->l('Upload') . '">
                            <p class="clear helpcontent">' . $this->l('You can upload your image in transparent .png format. For best result change color of default image:') . ' <a href="' . $this -> _path . 'images/defaults/icons-myaccount.png">Download PNG</a>
                            <br /><br />' . $this->l('You can also find this icon in PSD folder. It is layered and easy to change.') . '
                            <br /><br />' . $this->l('If you accidentally delete default image, you can always download it from the link above, and upload.') . '
                            </p>
                        </div>';

        $i_ma_ext = Configuration::get('RTC_I_MA_EXT');
        if ($i_ma_ext != "") {
            if (Shop::getContext() == Shop::CONTEXT_SHOP)
                $adv_imgname = 'icons-myaccount'.'-'.(int)$this->context->shop->getContextShopID();

            $html .= '<label>' . $this->l('My account icons') . '</label>
                            <div class="margin-form">
                            <img class="imgback" src="' . $this -> _path .'upload/'.$adv_imgname.'.' . $i_ma_ext . '" /><br /><br />
                            <input id="i_ma_delete2" type="submit" class="button" value="' . $this->l('Delete image') . '" name="i_ma_delete2">
                            </div>';
        }
        $html .= '
            </div>


            <div class="tab-pane" id ="tab-order">
                    <h2 class="rtc_title10">' . $this->l('Order steps') . '</h2>
                        <div class="roytc_row">
                             <label>' . $this->l('Step number icon background') . '</label>
                             <div class="margin-form">
                             <input type="color" name="o_number_bg" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_O_NUMBER_BG') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Step number icon border') . '</label>
                             <div class="margin-form">
                             <input type="color" name="o_number_border" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_O_NUMBER_BORDER') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Step number icon color') . '</label>
                             <div class="margin-form">
                             <input type="color" name="o_number_color" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_O_NUMBER_COLOR') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Step title') . '</label>
                             <div class="margin-form">
                             <input type="color" name="o_number_title" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_O_NUMBER_TITLE') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Current Step number icon background') . '</label>
                             <div class="margin-form">
                             <input type="color" name="o_number_bg_active" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_O_NUMBER_BG_ACTIVE') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Current Step number icon border') . '</label>
                             <div class="margin-form">
                             <input type="color" name="o_number_border_active" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_O_NUMBER_BORDER_ACTIVE') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Current Step number icon color') . '</label>
                             <div class="margin-form">
                             <input type="color" name="o_number_color_active" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_O_NUMBER_COLOR_ACTIVE') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Current Step title') . '</label>
                             <div class="margin-form">
                             <input type="color" name="o_number_title_active" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_O_NUMBER_TITLE_ACTIVE') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Done Step number icon background') . '</label>
                             <div class="margin-form">
                             <input type="color" name="o_number_bg_done" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_O_NUMBER_BG_DONE') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Done Step number icon border') . '</label>
                             <div class="margin-form">
                             <input type="color" name="o_number_border_done" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_O_NUMBER_BORDER_DONE') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Done Step number icon color') . '</label>
                             <div class="margin-form">
                             <input type="color" name="o_number_color_done" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_O_NUMBER_COLOR_DONE') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Done Step title') . '</label>
                             <div class="margin-form">
                             <input type="color" name="o_number_title_done" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_O_NUMBER_TITLE_DONE') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Done Step hover number icon background') . '</label>
                             <div class="margin-form">
                             <input type="color" name="o_number_bg_done_hover" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_O_NUMBER_BG_DONE_HOVER') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Done Step hover number icon border') . '</label>
                             <div class="margin-form">
                             <input type="color" name="o_number_border_done_hover" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_O_NUMBER_BORDER_DONE_HOVER') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Done Step hover number icon color') . '</label>
                             <div class="margin-form">
                             <input type="color" name="o_number_color_done_hover" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_O_NUMBER_COLOR_DONE_HOVER') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Done Step hover title') . '</label>
                             <div class="margin-form">
                             <input type="color" name="o_number_title_done_hover" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_O_NUMBER_TITLE_DONE_HOVER') . '" />
                        </div></div>

                        <h3>' . $this->l('Details table') . '</h3>
                        <div class="roytc_row">
                             <label>' . $this->l('Product image border') . '</label>
                             <div class="margin-form">
                             <input type="color" name="o_img_border" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_O_IMG_BORDER') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Product name') . '</label>
                             <div class="margin-form">
                             <input type="color" name="o_product_name" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_O_PRODUCT_NAME') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Product attributes') . '</label>
                             <div class="margin-form">
                             <input type="color" name="o_product_atts" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_O_PRODUCT_ATTS') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Product remove icon') . '</label>
                             <div class="margin-form">
                             <input type="color" name="o_remove" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_O_REMOVE') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Product remove icon hover') . '</label>
                             <div class="margin-form">
                             <input type="color" name="o_remove_hover" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_O_REMOVE_HOVER') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Table total title') . '</label>
                             <div class="margin-form">
                             <input type="color" name="o_total_title" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_O_TOTAL_TITLE') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Table total price') . '</label>
                             <div class="margin-form">
                             <input type="color" name="o_total_price" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_O_TOTAL_PRICE') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Delivery page title') . '</label>
                             <div class="margin-form">
                             <input type="color" name="o_del_title" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_O_DEL_TITLE') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Delivery item background') . '</label>
                             <div class="margin-form">
                             <input type="color" name="o_del_item_bg" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_O_DEL_ITEM_BG') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Delivery item text') . '</label>
                             <div class="margin-form">
                             <input type="color" name="o_del_item_text" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_O_DEL_ITEM_TEXT') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Payment method background') . '</label>
                             <div class="margin-form">
                             <input type="color" name="o_pay_item_bg" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_O_PAY_ITEM_BG') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Payment method hover background') . '</label>
                             <div class="margin-form">
                             <input type="color" name="nc_o_pay_item_bg_hover" class="colorpicker" data-hex="true" value="' . Configuration::get('NC_O_PAY_ITEM_BG_HOVER') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Payment method hover border') . '</label>
                             <div class="margin-form">
                             <input type="color" name="nc_o_pay_item_c_hover" class="colorpicker" data-hex="true" value="' . Configuration::get('NC_O_PAY_ITEM_C_HOVER') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Payment method title') . '</label>
                             <div class="margin-form">
                             <input type="color" name="o_pay_item_title" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_O_PAY_ITEM_TITLE') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Payment method description') . '</label>
                             <div class="margin-form">
                             <input type="color" name="o_pay_item_desc" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_O_PAY_ITEM_DESC') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Payment method chevron') . '</label>
                             <div class="margin-form">
                             <input type="color" name="o_pay_item_chevron" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_O_PAY_ITEM_CHEVRON') . '" />
                        </div></div>

            </div>


            <div class="tab-pane" id ="tab-footer">
                    <h2 class="rtc_title12">' . $this->l('Footer') . '</h2>
                        <h3>' . $this->l('Footer Top line') . '</h3>
                        <div class="roytc_row">
                             <label>' . $this->l('Top Line background') . '</label>
                             <div class="margin-form">
                             <input type="color" name="footer_top_line" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_FOOTER_TOP_LINE') . '" />
                        </div></div>

                        <div class="roytc_row">
                        <label>' . $this->l('Up arrow background') . '</label>
                        <div class="margin-form">
                         <input type="color" name="footer_up_bg"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_FOOTER_UP_BG') . '" />
                        </div></div>
                        <div class="roytc_row">
                                <label>' . $this->l('Up arrow border color') . '</label>
                                <div class="margin-form">
                                    <input type="color" name="up_arrow_border"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_UP_ARROW_BORDER') . '" /></div>
                        </div>
                        <div class="roytc_row">
                                <label>' . $this->l('Up arrow color') . '</label>
                                <div class="margin-form">
                                    <input type="color" name="up_arrow_color"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_UP_ARROW_COLOR') . '" /></div>
                        </div>
                        <div class="roytc_row">
                             <label>' . $this->l('Display Up arrow?') . '</label>
                             <div class="margin-form">
                                <input type="radio" class="regular-radio" name="footer_up_display" id="footer_up_display_1" value="1" ' . ((Configuration::get('RTC_FOOTER_UP_DISPLAY') == 1) ? 'checked="checked" ' : '') . '/>
                                <label class="t" for="footer_up_display_1"> Yes</label>
                                <input type="radio" class="regular-radio" name="footer_up_display" id="footer_up_display_0" value="0" ' . ((Configuration::get('RTC_FOOTER_UP_DISPLAY') == 0) ? 'checked="checked" ' : '') . '/>
                                <label class="t" for="footer_up_display_0"> No</label>
                        </div></div>

                        <h3>' . $this->l('Footer Main content') . '</h3>
                        <div class="roytc_row">
                             <label>' . $this->l('Footer main background') . '</label>
                             <div class="margin-form">
                             <input type="color" name="footer_background_color" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_FOOTER_BACKGROUND_COLOR') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Headings color') . '</label>
                        <div class="margin-form">
                         <input type="color" name="nc_footer_headings" class="colorpicker" data-hex="true" value="' . Configuration::get('NC_FOOTER_HEADINGS') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Footer headings underline color') . '</label>
                        <div class="margin-form">
                         <input type="color" name="nc_f_underline" class="colorpicker" data-hex="true" value="' . Configuration::get('NC_F_UNDERLINE') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Text color') . '</label>
                        <div class="margin-form">
                         <input type="color" name="footer_txt_color" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_FOOTER_TXT_COLOR') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Link color') . '</label>
                        <div class="margin-form">
                         <input type="color" name="footer_link_color" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_FOOTER_LINK_COLOR') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Link hover color') . '</label>
                        <div class="margin-form">
                         <input type="color" name="footer_hover_color"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_FOOTER_HOVER_COLOR') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('My account disc color') . '</label>
                        <div class="margin-form">
                         <input type="color" name="footer_account_disc"  class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_FOOTER_ACCOUNT_DISC') . '" />
                        </div></div>




                            <label>' . $this->l('Contact icons') . '</label>
                            <div class="margin-form">
                                <input id="f_contacts_field2" type="file" name="f_contacts_field2">
                                <input id="f_contacts_button2" type="submit" class="button" name="f_contacts_button2" value="' . $this->l('Upload') . '">
                                <p class="clear helpcontent">' . $this->l('You can upload your image in transparent .png format. For best result change color of default image:') . ' <a href="' . $this -> _path . 'images/defaults/icons-contacts.png">Download PNG</a>
                                <br /><br />' . $this->l('You can also find this icon in PSD folder. It is layered and easy to change.') . '
                                <br /><br />' . $this->l('If you accidentally delete default image, you can always download it from the link above, and upload.') . '
                                </p>
                            </div>';

        $f_contacts_ext = Configuration::get('RTC_F_CONTACTS_EXT');
        if ($f_contacts_ext != "") {
            if (Shop::getContext() == Shop::CONTEXT_SHOP)
                $adv_imgname = 'icons-contacts'.'-'.(int)$this->context->shop->getContextShopID();

            $html .= '<label>' . $this->l('Contact icons') . '</label>
                                <div class="margin-form">
                                <img class="imgback" src="' . $this -> _path .'upload/'.$adv_imgname.'.' . $f_contacts_ext . '" /><br /><br />
                                <input id="f_contacts_delete2" type="submit" class="button" value="' . $this->l('Delete image') . '" name="f_contacts_delete2">
                                </div>';
        }
        $html .= '
                        <div class="roytc_row">
                        <label>' . $this->l('Contact icons background') . '</label>
                        <div class="margin-form">
                         <input type="color" name="nc_footer_ci_bg"  class="colorpicker" data-hex="true" value="' . Configuration::get('NC_FOOTER_CI_BG') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Display My account block?') . '</label>
                             <div class="margin-form">
                                <input type="radio" class="regular-radio" name="footer_account_display" id="footer_account_display_1" value="1" ' . ((Configuration::get('RTC_FOOTER_ACCOUNT_DISPLAY') == 1) ? 'checked="checked" ' : '') . '/>
                                <label class="t" for="footer_account_display_1"> Yes</label>
                                <input type="radio" class="regular-radio" name="footer_account_display" id="footer_account_display_0" value="0" ' . ((Configuration::get('RTC_FOOTER_ACCOUNT_DISPLAY') == 0) ? 'checked="checked" ' : '') . '/>
                                <label class="t" for="footer_account_display_0"> No</label>
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Display Categories block?') . '</label>
                             <div class="margin-form">
                                <input type="radio" class="regular-radio" name="footer_categories_display" id="footer_categories_display_1" value="1" ' . ((Configuration::get('RTC_FOOTER_CATEGORIES_DISPLAY') == 1) ? 'checked="checked" ' : '') . '/>
                                <label class="t" for="footer_categories_display_1"> Yes</label>
                                <input type="radio" class="regular-radio" name="footer_categories_display" id="footer_categories_display_0" value="0" ' . ((Configuration::get('RTC_FOOTER_CATEGORIES_DISPLAY') == 0) ? 'checked="checked" ' : '') . '/>
                                <label class="t" for="footer_categories_display_0"> No</label>
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Display Info block?') . '</label>
                             <div class="margin-form">
                                <input type="radio" class="regular-radio" name="footer_info_display" id="footer_info_display_1" value="1" ' . ((Configuration::get('RTC_FOOTER_INFO_DISPLAY') == 1) ? 'checked="checked" ' : '') . '/>
                                <label class="t" for="footer_info_display_1"> Yes</label>
                                <input type="radio" class="regular-radio" name="footer_info_display" id="footer_info_display_0" value="0" ' . ((Configuration::get('RTC_FOOTER_INFO_DISPLAY') == 0) ? 'checked="checked" ' : '') . '/>
                                <label class="t" for="footer_info_display_0"> No</label>
                        <p class="clear helpcontent">To configure Info block, just click here <a class="configure_button" href="'.$this->context->link->getAdminLink('AdminModules', true).'&configure=blockcms&tab_module=front_office_features&module_name=blockcms" target="_blank">'.$this->l('Configure').' <i class="icon-external-link"></i></a></p>
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Display Contact us block?') . '</label>
                             <div class="margin-form">
                                <input type="radio" class="regular-radio" name="footer_contact_display" id="footer_contact_display_1" value="1" ' . ((Configuration::get('RTC_FOOTER_CONTACT_DISPLAY') == 1) ? 'checked="checked" ' : '') . '/>
                                <label class="t" for="footer_contact_display_1"> Yes</label>
                                <input type="radio" class="regular-radio" name="footer_contact_display" id="footer_contact_display_0" value="0" ' . ((Configuration::get('RTC_FOOTER_CONTACT_DISPLAY') == 0) ? 'checked="checked" ' : '') . '/>
                                <label class="t" for="footer_contact_display_0"> No</label>
                        <p class="clear helpcontent">To configure Contact us block, just click here <a class="configure_button" href="'.$this->context->link->getAdminLink('AdminModules', true).'&configure=blockcontactinfos&tab_module=front_office_features&module_name=blockcontactinfos" target="_blank">'.$this->l('Configure').' <i class="icon-external-link"></i></a></p>
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Newsletter and Social headings') . '</label>
                             <div class="margin-form">
                             <input type="color" name="footer_top_line_headings" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_FOOTER_TOP_LINE_HEADINGS') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Newsletter and Social separator') . '</label>
                             <div class="margin-form">
                             <input type="color" name="ns_border" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_NS_BORDER') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Newsletter input background') . '</label>
                             <div class="margin-form">
                             <input type="color" name="footer_news_input" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_FOOTER_NEWS_INPUT') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Newsletter input border') . '</label>
                             <div class="margin-form">
                             <input type="color" name="nc_footer_news_border" class="colorpicker" data-hex="true" value="' . Configuration::get('NC_FOOTER_NEWS_BORDER') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Newsletter button background') . '</label>
                             <div class="margin-form">
                             <input type="color" name="footer_news_button_bg" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_FOOTER_NEWS_BUTTON_BG') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Newsletter button border') . '</label>
                             <div class="margin-form">
                             <input type="color" name="footer_news_button_border" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_FOOTER_NEWS_BUTTON_BORDER') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Newsletter button color') . '</label>
                             <div class="margin-form">
                             <input type="color" name="footer_news_button" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_FOOTER_NEWS_BUTTON') . '" />
                        </div></div>
                         <div class="roytc_row">
                             <label>' . $this->l('Display Newsletter block?') . '</label>
                             <div class="margin-form">
                                <input type="radio" class="regular-radio" name="footer_news_display" id="footer_news_display_1" value="1" ' . ((Configuration::get('RTC_FOOTER_NEWS_DISPLAY') == 1) ? 'checked="checked" ' : '') . '/>
                                <label class="t" for="footer_news_display_1"> Yes</label>
                                <input type="radio" class="regular-radio" name="footer_news_display" id="footer_news_display_0" value="0" ' . ((Configuration::get('RTC_FOOTER_NEWS_DISPLAY') == 0) ? 'checked="checked" ' : '') . '/>
                                <label class="t" for="footer_news_display_0"> No</label>
                        <p class="clear helpcontent">To configure Newsletter block, just click here <a class="configure_button" href="'.$this->context->link->getAdminLink('AdminModules', true).'&configure=blocknewsletter&tab_module=front_office_features&module_name=blocknewsletter" target="_blank">'.$this->l('Configure').' <i class="icon-external-link"></i></a></p>
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Display Social block?') . '</label>
                             <div class="margin-form">
                                <input type="radio" class="regular-radio" name="footer_social_display" id="footer_social_display_1" value="1" ' . ((Configuration::get('RTC_FOOTER_SOCIAL_DISPLAY') == 1) ? 'checked="checked" ' : '') . '/>
                                <label class="t" for="footer_social_display_1"> Yes</label>
                                <input type="radio" class="regular-radio" name="footer_social_display" id="footer_social_display_0" value="0" ' . ((Configuration::get('RTC_FOOTER_SOCIAL_DISPLAY') == 0) ? 'checked="checked" ' : '') . '/>
                                <label class="t" for="footer_social_display_0"> No</label>
                        <p class="clear helpcontent">To configure Social block, just click here <a class="configure_button" href="'.$this->context->link->getAdminLink('AdminModules', true).'&configure=royblocksocial&tab_module=front_office_features&module_name=royblocksocial" target="_blank">'.$this->l('Configure').' <i class="icon-external-link"></i></a></p>
                        </div></div>

                        <div class="roytc_row">
                             <label>' . $this->l('Display Payment block?') . '</label>
                             <div class="margin-form">
                                <input type="radio" class="regular-radio" name="footer_payment_display" id="footer_payment_display_1" value="1" ' . ((Configuration::get('RTC_FOOTER_PAYMENT_DISPLAY') == 1) ? 'checked="checked" ' : '') . '/>
                                <label class="t" for="footer_payment_display_1"> Yes</label>
                                <input type="radio" class="regular-radio" name="footer_payment_display" id="footer_payment_display_0" value="0" ' . ((Configuration::get('RTC_FOOTER_PAYMENT_DISPLAY') == 0) ? 'checked="checked" ' : '') . '/>
                                <label class="t" for="footer_payment_display_0"> No</label>
                        <p class="clear helpcontent">To configure Payment logos link, just click here <a class="configure_button" href="'.$this->context->link->getAdminLink('AdminModules', true).'&configure=roypaymentlogo&tab_module=front_office_features&module_name=roypaymentlogo" target="_blank">'.$this->l('Configure').' <i class="icon-external-link"></i></a></p>
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Display ') . '<img src="../themes/modez/img/paymentlogo_visa.png" class="pl_img" alt="visa">' . $this->l(' Payment logo?') . '</label>
                             <div class="margin-form">
                                <input type="radio" class="regular-radio" name="footer_pl_visa" id="footer_pl_visa_1" value="1" ' . ((Configuration::get('RTC_FOOTER_PL_VISA') == 1) ? 'checked="checked" ' : '') . '/>
                                <label class="t" for="footer_pl_visa_1"> Yes</label>
                                <input type="radio" class="regular-radio" name="footer_pl_visa" id="footer_pl_visa_0" value="0" ' . ((Configuration::get('RTC_FOOTER_PL_VISA') == 0) ? 'checked="checked" ' : '') . '/>
                                <label class="t" for="footer_pl_visa_0"> No</label>
                        </div></div>
                        <div class="roytc_row">
                            <label>' . $this->l('Display ') . '<img src="../themes/modez/img/paymentlogo_mastercard.png" class="pl_img" alt="mastercard">' . $this->l(' Payment logo?') . '</label>
                            <div class="margin-form">
                                <input type="radio" class="regular-radio" name="footer_pl_mastercard" id="footer_pl_mastercard_1" value="1" ' . ((Configuration::get('RTC_FOOTER_PL_MASTERCARD') == 1) ? 'checked="checked" ' : '') . '/>
                                <label class="t" for="footer_pl_mastercard_1"> Yes</label>
                                <input type="radio" class="regular-radio" name="footer_pl_mastercard" id="footer_pl_mastercard_0" value="0" ' . ((Configuration::get('RTC_FOOTER_PL_MASTERCARD') == 0) ? 'checked="checked" ' : '') . '/>
                                <label class="t" for="footer_pl_mastercard_0"> No</label>
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Display ') . '<img src="../themes/modez/img/paymentlogo_maestro.png" class="pl_img" alt="maestro">' . $this->l(' Payment logo?') . '</label>
                             <div class="margin-form">
                                <input type="radio" class="regular-radio" name="footer_pl_maestro" id="footer_pl_maestro_1" value="1" ' . ((Configuration::get('RTC_FOOTER_PL_MAESTRO') == 1) ? 'checked="checked" ' : '') . '/>
                                <label class="t" for="footer_pl_maestro_1"> Yes</label>
                                <input type="radio" class="regular-radio" name="footer_pl_maestro" id="footer_pl_maestro_0" value="0" ' . ((Configuration::get('RTC_FOOTER_PL_MAESTRO') == 0) ? 'checked="checked" ' : '') . '/>
                                <label class="t" for="footer_pl_maestro_0"> No</label>
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Display ') . '<img src="../themes/modez/img/paymentlogo_discover.png" class="pl_img" alt="discover">' . $this->l(' Payment logo?') . '</label>
                             <div class="margin-form">
                                <input type="radio" class="regular-radio" name="footer_pl_discover" id="footer_pl_discover_1" value="1" ' . ((Configuration::get('RTC_FOOTER_PL_DISCOVER') == 1) ? 'checked="checked" ' : '') . '/>
                                <label class="t" for="footer_pl_discover_1"> Yes</label>
                                <input type="radio" class="regular-radio" name="footer_pl_discover" id="footer_pl_discover_0" value="0" ' . ((Configuration::get('RTC_FOOTER_PL_DISCOVER') == 0) ? 'checked="checked" ' : '') . '/>
                                <label class="t" for="footer_pl_discover_0"> No</label>
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Display ') . '<img src="../themes/modez/img/paymentlogo_paypal.png" class="pl_img" alt="paypal">' . $this->l(' Payment logo?') . '</label>
                             <div class="margin-form">
                                <input type="radio" class="regular-radio" name="footer_pl_paypal" id="footer_pl_paypal_1" value="1" ' . ((Configuration::get('RTC_FOOTER_PL_PAYPAL') == 1) ? 'checked="checked" ' : '') . '/>
                                <label class="t" for="footer_pl_paypal_1"> Yes</label>
                                <input type="radio" class="regular-radio" name="footer_pl_paypal" id="footer_pl_paypal_0" value="0" ' . ((Configuration::get('RTC_FOOTER_PL_PAYPAL') == 0) ? 'checked="checked" ' : '') . '/>
                                <label class="t" for="footer_pl_paypal_0"> No</label>
                        </div></div>

                        <h3>' . $this->l('Footer Bottom line') . '</h3>
                        <div class="roytc_row">
                             <label>' . $this->l('Footer bottom line background') . '</label>
                             <div class="margin-form">
                             <input type="color" name="footer_bottom_line" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_FOOTER_BOTTOM_LINE') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Footer bottom text color') . '</label>
                             <div class="margin-form">
                             <input type="color" name="footer_bottom_text" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_FOOTER_BOTTOM_TEXT') . '" />
                        </div></div>
                        <div class="roytc_row" style="min-height:30px;">
                             <label>' . $this->l('Copyright Text') . '</label>
                             <div class="margin-form">';
        foreach ($languages as $language)
            $html .= '<div id="text_' . $language['id_lang'] . '" style="display: ' . ($language['id_lang'] == $defaultLanguage ? 'block' : 'none') . '; float: left;">
                                                              <input type="text" style="width: 500px;" name="text_' . $language['id_lang'] . '" id="textInput_' . $language['id_lang'] . '" value="' . Configuration::get('RTC_COPYRIGHT_TEXT', $language['id_lang']) . '" />
                                                              </div>
                                                       ';
        $html .= $this -> displayFlags($languages, $defaultLanguage, $divLangName, 'text', true);

        $html .= '
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Display Copyright block?') . '</label>
                             <div class="margin-form">
                                <input type="radio" class="regular-radio" name="footer_copyright_display" id="footer_copyright_display_1" value="1" ' . ((Configuration::get('RTC_FOOTER_COPYRIGHT_DISPLAY') == 1) ? 'checked="checked" ' : '') . '/>
                                <label class="t" for="footer_copyright_display_1"> Yes</label>
                                <input type="radio" class="regular-radio" name="footer_copyright_display" id="footer_copyright_display_0" value="0" ' . ((Configuration::get('RTC_FOOTER_COPYRIGHT_DISPLAY') == 0) ? 'checked="checked" ' : '') . '/>
                                <label class="t" for="footer_copyright_display_0"> No</label>
                        </div></div>
                    </div>


            <div class="tab-pane" id ="tab-blog">
                    <h2 class="rtc_title13">' . $this->l('Blog') . '</h2>
                        <div class="roytc_row">
                             <label>' . $this->l('Latest news heading') . '</label>
                             <div class="margin-form">
                             <input type="color" name="bl_heading" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_BL_HEADING') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Home item background') . '</label>
                             <div class="margin-form">
                             <input type="color" name="bl_bg" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_BL_BG') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Home item date') . '</label>
                             <div class="margin-form">
                             <input type="color" name="bl_date" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_BL_DATE') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Home item border') . '</label>
                             <div class="margin-form">
                             <input type="color" name="bl_border" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_BL_BORDER') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Post title mark border') . '</label>
                             <div class="margin-form">
                             <input type="color" name="bl_mark" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_BL_MARK') . '" />
                        </div></div>

                        <h3>' . $this->l('Read more') . '</h3>
                        <div class="roytc_row">
                             <label>' . $this->l('More background') . '</label>
                             <div class="margin-form">
                             <input type="color" name="bl_rm_bg" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_BL_RM_BG') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('More border') . '</label>
                             <div class="margin-form">
                             <input type="color" name="bl_rm_border" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_BL_RM_BORDER') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('More icon background') . '</label>
                             <div class="margin-form">
                             <input type="color" name="bl_rm_bg_icon" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_BL_RM_BG_ICON') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('More icon border') . '</label>
                             <div class="margin-form">
                             <input type="color" name="bl_rm_border_icon" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_BL_RM_BORDER_ICON') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('More color') . '</label>
                             <div class="margin-form">
                             <input type="color" name="bl_rm_color" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_BL_RM_COLOR') . '" />
                        </div></div>

                        <div class="roytc_row">
                             <label>' . $this->l('More hover background') . '</label>
                             <div class="margin-form">
                             <input type="color" name="bl_rm_bg_hover" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_BL_RM_BG_HOVER') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('More hover border') . '</label>
                             <div class="margin-form">
                             <input type="color" name="bl_rm_border_hover" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_BL_RM_BORDER_HOVER') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('More hover color') . '</label>
                             <div class="margin-form">
                             <input type="color" name="bl_rm_hover" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_BL_RM_HOVER') . '" />
                        </div></div>

                        <h3>' . $this->l('Blog category') . '</h3>
                        <div class="roytc_row">
                             <label>' . $this->l('Item title') . '</label>
                             <div class="margin-form">
                             <input type="color" name="bl_title" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_BL_TITLE') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Item title hover') . '</label>
                             <div class="margin-form">
                             <input type="color" name="bl_title_hover" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_BL_TITLE_HOVER') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Item background') . '</label>
                             <div class="margin-form">
                             <input type="color" name="bl_bg_content" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_BL_BG_CONTENT') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Item meta') . '</label>
                             <div class="margin-form">
                             <input type="color" name="bl_meta" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_BL_META') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Item comments bg') . '</label>
                             <div class="margin-form">
                             <input type="color" name="bl_com_bg" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_BL_COM_BG') . '" />
                        </div></div>
                        <div class="roytc_row">
                             <label>' . $this->l('Item commentator name') . '</label>
                             <div class="margin-form">
                             <input type="color" name="bl_com_name" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_BL_COM_NAME') . '" />
                        </div></div>

            </div>
            <div class="tab-pane" id ="tab-ratings">
                    <h2 class="rtc_title14">' . $this->l('Ratings and reviews') . '</h2>
                        <h3>' . $this->l('Stars') . '</h3>
                        <div class="roytc_row">
                        <label>' . $this->l('Reviews star-on color') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pp_reviews_staron" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PP_REVIEWS_STARON') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Reviews star-off color') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pp_reviews_staroff" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PP_REVIEWS_STAROFF') . '" />
                        </div></div>

                        <h3>' . $this->l('Product list appearance') . '</h3>
                        <div class="roytc_row">
                        <label>' . $this->l('Display rating in grid view?') . '</label>
                            <div class="margin-form">
                            <input type="radio" class="regular-radio" name="nc_rgrid" id="nc_rgrid_1" value="1" ' . ((Configuration::get('NC_RGRID') == 1) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="nc_rgrid_1"> Yes</label>
                            <input type="radio" class="regular-radio" name="nc_rgrid" id="nc_rgrid_0" value="0" ' . ((Configuration::get('NC_RGRID') == 0) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="nc_rgrid_0"> No</label>
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Display number of reviews in grid view?') . '</label>
                            <div class="margin-form">
                            <input type="radio" class="regular-radio" name="nc_rnum" id="nc_rnum_1" value="1" ' . ((Configuration::get('NC_RNUM') == 1) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="nc_rnum_1"> Yes</label>
                            <input type="radio" class="regular-radio" name="nc_rnum" id="nc_rnum_0" value="0" ' . ((Configuration::get('NC_RNUM') == 0) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="nc_rnum_0"> No</label>
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Rating view in grid modes:') . '</label>
                        <div class="margin-form" style="margin-top:70px; padding-top:10px;">
                            <input type="radio" class="regular-radio" name="nc_rtop" id="nc_rtop_0" value="0" ' . ((Configuration::get('NC_RTOP') == "0") ? 'checked="checked" ' : '') . '/>
                            <label class="t rmode rm0" for="nc_rtop_0"> <span>Classic <br />Under Name</span></label>
                            <input type="radio" class="regular-radio" name="nc_rtop" id="nc_rtop_1" value="1" ' . ((Configuration::get('NC_RTOP') == "1") ? 'checked="checked" ' : '') . '/>
                            <label class="t rmode rm1" for="nc_rtop_1"> <span>Above the name <br />over the picture</span></label>
                            <input type="radio" class="regular-radio" name="nc_rtop" id="nc_rtop_2" value="2" ' . ((Configuration::get('NC_RTOP') == "2") ? 'checked="checked" ' : '') . '/>
                            <label class="t rmode rm2" for="nc_rtop_2"> <span>At the top <br />over the picture</span></label>
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Background color of top stars') . '</label>
                             <div class="margin-form">
                             <input type="color" name="nc_rbg" class="colorpicker" data-hex="true" value="' . Configuration::get('NC_RBG') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Show rating only on mouse over product?') . '</label>
                            <div class="margin-form">
                            <input type="radio" class="regular-radio" name="nc_rhide" id="nc_rhide_1" value="1" ' . ((Configuration::get('NC_RHIDE') == 1) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="nc_rhide_1"> Yes</label>
                            <input type="radio" class="regular-radio" name="nc_rhide" id="nc_rhide_0" value="0" ' . ((Configuration::get('NC_RHIDE') == 0) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="nc_rhide_0"> No</label>
                            <p class="clear helpcontent">Works only for 2 and 3 rating view modes</p>
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Display rating in list view?') . '</label>
                            <div class="margin-form">
                            <input type="radio" class="regular-radio" name="nc_rlist" id="nc_rlist_1" value="1" ' . ((Configuration::get('NC_RLIST') == 1) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="nc_rlist_1"> Yes</label>
                            <input type="radio" class="regular-radio" name="nc_rlist" id="nc_rlist_0" value="0" ' . ((Configuration::get('NC_RLIST') == 0) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="nc_rlist_0"> No</label>
                        </div></div>

                        <h3>' . $this->l('Product page appearance') . '</h3>
                        <div class="roytc_row">
                        <label>' . $this->l('Display rating under product name?') . '</label>
                            <div class="margin-form">
                            <input type="radio" class="regular-radio" name="pp_reviews_display_top" id="pp_reviews_display_top_1" value="1" ' . ((Configuration::get('RTC_PP_REVIEWS_DISPLAY_TOP') == 1) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="pp_reviews_display_top_1"> Yes</label>
                            <input type="radio" class="regular-radio" name="pp_reviews_display_top" id="pp_reviews_display_top_0" value="0" ' . ((Configuration::get('RTC_PP_REVIEWS_DISPLAY_TOP') == 0) ? 'checked="checked" ' : '') . '/>
                            <label class="t" for="pp_reviews_display_top_0"> No</label>
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Reviewer name') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pp_reviews_name" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PP_REVIEWS_NAME') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Review date') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pp_reviews_date" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PP_REVIEWS_DATE') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Review usefulness') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pp_reviews_useful" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PP_REVIEWS_USEFUL') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Review report') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pp_reviews_report" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PP_REVIEWS_REPORT') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Review usefulness YES | NO') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pp_reviews_yn" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PP_REVIEWS_YN') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Review usefulness YES | NO border') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pp_reviews_yn_border" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PP_REVIEWS_YN_BORDER') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Reviewer name separator') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pp_reviews_name_separator" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PP_REVIEWS_NAME_SEPARATOR') . '" />
                        </div></div>
                        <div class="roytc_row">
                        <label>' . $this->l('Review block separator') . '</label>
                             <div class="margin-form">
                             <input type="color" name="pp_reviews_block_separator" class="colorpicker" data-hex="true" value="' . Configuration::get('RTC_PP_REVIEWS_BLOCK_SEPARATOR') . '" />
                        </div></div>

            </div>

            <div class="tab-pane" id ="tab-css">
                    <h2 class="rtc_title15">' . $this->l('Custom CSS') . '</h2>
                        <div class="roytc_row">
                             <label>' . $this->l('Custom CSS') . '</label>
                             <div class="margin-form">
                             <textarea name="nc_css" id="code" cols="70" rows="10">' . Configuration::get('NC_CSS') . '</textarea>
                             <p class="clear helpcontent">Here you can put you custom CSS code to override theme CSS</p>
                             <p class="clear link">Highlighting CSS editor by <a href="http://codemirror.net/" target="_blank">codemirror</a></p>
                        </div></div>
            </div>

            <div class="tab-pane" id ="tab-ie">
                    <h2 class="rtc_title16">' . $this->l('Import / Export config') . '</h2>
                        <div class="roytc_row">
                             <div class="margin-form-ie">
                             <label>' . $this->l('Export config') . '</label>
                                 <input id="export_changes" type="submit" class="button save_button" value="' . $this->l('Export config') . '" name="export_changes">
                             </div>
                             <div class="margin-form-ie" style="float:right;">
                             <label>' . $this->l('Import config') . '</label>
                                 <input id="modez_import_file" type="file" name="modez_import_file">
                                 <input id="modez_import_submit" type="submit" class="button" name="modez_import_submit" value="' . $this->l('Import config') . '">
                            </div>
                             <p class="clear helpcontent">After customize your design of MODEZ, you can EXPORT your config and save it on your computer. <br /> Then you can import it and set your design of MODEZ theme in one click. <br /> It is useful if you need to transfer your shop without database, or just want a backup of your work.</p>
                             <p class="clear helpcontent">Do not forget to Save Changes after Import.</p>
                             <p class="clear helpcontent">Exported config include all your settings except uploaded images.</p>
                        </div>
            </div>
                </div>
               </div>
              </div>
        <div class="roytc_save">
            <input id="reset_changes" type="submit" class="button reset_button" value="' . $this->l('Reset changes') . '" name="reset_changes">
            <p class="helpcontent">WARNING! RESET CHANGES button resets all the tabs (!) of customizer module to defaults!</p>
	        <input id="save_changes" type="submit" class="button save_button" value="' . $this->l('Apply changes') . '" name="save_changes">
	    </div>

			</fieldset>
			</form>
			';

        return $html;
    }

    public function generateCss() {
        $css ='';

// ****************  GRADIENT SCHEMES and BACKGROUNDS styles start

        if (Configuration::get('RTC_DISPLAY_GRADIENT') == "0") {
            $css .= '
                header {
                background-image:none!important; }
                .bottom_line_bg {
                background-image:none!important; }
                #index .homeproducts_line_bg {
                background-image:none!important; }
                .columns-container-bottom {
                background-image:none!important; }
        ';
        }
        if ((Configuration::get('RTC_MAIN_BACKGROUND_COLOR')) && (Configuration::get('RTC_DISPLAY_GRADIENT') == "0")) {
            $css .= '
                header {
                background-color: ' . Configuration::get('RTC_MAIN_BACKGROUND_COLOR') . ' }
                .bottom_line_bg {
                background-color: ' . Configuration::get('RTC_MAIN_BACKGROUND_COLOR') . ' }
                #index .homeproducts_line_bg {
                background-color: ' . Configuration::get('RTC_MAIN_BACKGROUND_COLOR') . ' }
                .columns-container-bottom {
                background-color: ' . Configuration::get('RTC_MAIN_BACKGROUND_COLOR') . ' }
			';
        }

        if (Configuration::get('RTC_TOP_LINE_BACKGROUND')) {
            $css .= '
                header .nav {
                background: ' . Configuration::get('RTC_TOP_LINE_BACKGROUND') . '}
			';
        }


        if (Configuration::get('RTC_CONTENT_BACKGROUND_COLOR')) {
            $css .= '
                .columns-container-top {
                background: ' . Configuration::get('RTC_CONTENT_BACKGROUND_COLOR') . '}
                .columns-container-middle {
                background-color: ' . Configuration::get('RTC_CONTENT_BACKGROUND_COLOR') . '}
                #index .columns-container-middle {
                background-color: ' . Configuration::get('RTC_CONTENT_BACKGROUND_COLOR') . '}
                #view_scroll_left, #view_scroll_right {
                border-color: ' . Configuration::get('RTC_CONTENT_BACKGROUND_COLOR') . '}
                #index .columns-container-top .modezroundtop {
                background-color: ' . Configuration::get('RTC_CONTENT_BACKGROUND_COLOR') . '}
			';
        }
        if ((Configuration::get('RTC_GRADIENT_SCHEME') == "flame") or (Configuration::get('RTC_GRADIENT_SCHEME') == "water") or (Configuration::get('RTC_GRADIENT_SCHEME') == "nature") or (Configuration::get('RTC_GRADIENT_SCHEME') == "lilac") or (Configuration::get('RTC_GRADIENT_SCHEME') == "golden") or (Configuration::get('RTC_GRADIENT_SCHEME') == "sunny") or (Configuration::get('RTC_GRADIENT_SCHEME') == "easy") or (Configuration::get('RTC_GRADIENT_SCHEME') == "forest") or (Configuration::get('RTC_GRADIENT_SCHEME') == "azure") or (Configuration::get('RTC_GRADIENT_SCHEME') == "retro") or (Configuration::get('RTC_GRADIENT_SCHEME') == "night") or (Configuration::get('RTC_GRADIENT_SCHEME') == "mono") && (Configuration::get('RTC_DISPLAY_GRADIENT') == "1")) {
            $css .= '
                header {
                background-image: url(../images/gradient_schemes/' . Configuration::get('RTC_GRADIENT_SCHEME') . '_head.png);
                background-repeat:repeat;
                background-position:30% 53px; }
                @media (max-width: 479px) {
                header { background-position: 25% 90px; } }
                .bottom_line_bg {
                background-image: url(../images/gradient_schemes/' . Configuration::get('RTC_GRADIENT_SCHEME') . '_bottom.png);
                background-repeat:repeat-x;
                background-position:bottom center; }
                #index .homeproducts_line_bg {
                background-image: url(../images/gradient_schemes/' . Configuration::get('RTC_GRADIENT_SCHEME') . '_middle.png);
                background-repeat:repeat-x;
                background-position:top center; }
                .columns-container-bottom {
                background-image: url(../images/gradient_schemes/' . Configuration::get('RTC_GRADIENT_SCHEME') . '_bottom_index.png);
                background-repeat:repeat;
                background-position:top center; }
                ';
        }
        else {
            $css .= '
                header {
                background-image: url(../images/textures/pat' . Configuration::get('RTC_TEXTURES') . '.png);
                background-repeat:repeat;
                background-position:top left; }
                @media (max-width: 479px) {
                header { background-position: top left; } }
                .bottom_line_bg {
                background-image: url(../images/textures/pat' . Configuration::get('RTC_TEXTURES') . '.png);
                background-repeat:repeat;
                background-position:top left; }
                #index .homeproducts_line_bg {
                background-image: url(../images/textures/pat' . Configuration::get('RTC_TEXTURES') . '.png);
                background-repeat:repeat;
                background-position:top left; }
                .columns-container-bottom {
                background-image: url(../images/textures/pat' . Configuration::get('RTC_TEXTURES') . '.png);
                background-repeat:repeat;
                background-position:top left; }
                ';
        }

        if ((Configuration::get('RTC_BODY_BG_PATTERN')) && (Configuration::get('RTC_BODY_BG_EXT') == "")) {
            $css .= '
                html{background-image: url(../images/patterns/' . Configuration::get('RTC_BODY_BG_PATTERN') . '.png);}
        ';
        }
        if (Configuration::get('RTC_BODY_BG_EXT')) {
            if (Shop::getContext() == Shop::CONTEXT_SHOP)
                $adv_imgname = 'body_background'.'-'.(int)$this->context->shop->getContextShopID();

            $css .= '
                header {
                background-image: url(../upload/'.$adv_imgname.'.' . Configuration::get('RTC_BODY_BG_EXT') . ');
                background-color:' . Configuration::get('RTC_MAIN_BACKGROUND_COLOR') . '; }
                .bottom_line_bg {
                background-image: url(../upload/'.$adv_imgname.'.' . Configuration::get('RTC_BODY_BG_EXT') . ');
                background-color:' . Configuration::get('RTC_MAIN_BACKGROUND_COLOR') . '; }
                #index .homeproducts_line_bg {
                background-image: url(../upload/'.$adv_imgname.'.' . Configuration::get('RTC_BODY_BG_EXT') . ');
                background-color:' . Configuration::get('RTC_MAIN_BACKGROUND_COLOR') . '; }
                .columns-container-bottom {
                background-image: url(../upload/'.$adv_imgname.'.' . Configuration::get('RTC_BODY_BG_EXT') . ');
                background-color:' . Configuration::get('RTC_MAIN_BACKGROUND_COLOR') . '; }
                ';

            if (Configuration::get('RTC_BODY_BG_FIXED')) {
                $css .= '
                header {
                background-attachment:fixed;}
                .bottom_line_bg {
                background-attachment:fixed;}
                #index .homeproducts_line_bg {
                background-attachment:fixed;}
                .columns-container-bottom {
                background-attachment:fixed;}
                ';
            }

        }
        if (Configuration::get('RTC_BODY_BG_REPEAT')) {
            switch(Configuration::get('RTC_BODY_BG_REPEAT')) {
                case 1 :
                    $repeat_option = 'repeat-x';
                    break;
                case 2 :
                    $repeat_option = 'repeat-y';
                    break;
                case 3 :
                    $repeat_option = 'no-repeat';
                    break;
                default :
                    $repeat_option = 'repeat';
            }

            $css .= '
                header {
                background-repeat: ' . $repeat_option . ';}
                .bottom_line_bg {
                background-repeat: ' . $repeat_option . ';}
                #index .homeproducts_line_bg {
                background-repeat: ' . $repeat_option . ';}
                .columns-container-bottom {
                background-repeat: ' . $repeat_option . ';}
            ';
        }
        if (Configuration::get('RTC_BODY_BG_POSITION')) {
            switch(Configuration::get('RTC_BODY_BG_POSITION')) {
                case 1 :
                    $position_option = 'center top';
                    break;
                case 2 :
                    $position_option = 'right top';
                    break;
                default :
                    $position_option = 'left top';
            }

            $css .= '
                header {
                background-position: ' . $position_option . ';}
                .bottom_line_bg {
                background-position: ' . $position_option . ';}
                #index .homeproducts_line_bg {
                background-position: ' . $position_option . ';}
                .columns-container-bottom {
                background-position: ' . $position_option . ';}
            ';
        }


// ****************  SOME GLOBALS styles start

        if (Configuration::get('NC_LOADER') == 0) {
            $css .= '
            .loaderbg { display:none!important; }
			';
        }
        if (Configuration::get('NC_LOADER_COLOR')) {
            $css .= '
            .loader { border-left-color: ' . Configuration::get('NC_LOADER_COLOR') . ' }
            ';
        }
        if (Configuration::get('NC_G_BODY_TEXT')) {
            $css .= 'body { color: ' . Configuration::get('NC_G_BODY_TEXT') . ' }
            ';
        }
        if (Configuration::get('RTC_G_BODY_LINK')) {
            $css .= 'a { color: ' . Configuration::get('RTC_G_BODY_LINK') . ' }
            ';
        }
        if (Configuration::get('RTC_G_BODY_LINK_HOVER')) {
            $css .= 'a:hover, a:focus { color: ' . Configuration::get('RTC_G_BODY_LINK_HOVER') . ' }
            ';
        }
        if (Configuration::get('RTC_G_TABLE_BG')) {
            $css .= '.table-bordered { background-color: ' . Configuration::get('RTC_G_TABLE_BG') . ' }
            ';
        }
        if (Configuration::get('RTC_G_TABLE_TITLE_BG')) {
            $css .= '.table > thead > tr > th { background-color: ' . Configuration::get('RTC_G_TABLE_TITLE_BG') . ' }
            ';
        }
        if (Configuration::get('RTC_G_TABLE_TITLE_COLOR')) {
            $css .= '.table > thead > tr > th { color: ' . Configuration::get('RTC_G_TABLE_TITLE_COLOR') . ' }
            ';
        }
        if (Configuration::get('RTC_G_TABLE_TOTAL')) {
            $css .= '.table tfoot tr { background-color: ' . Configuration::get('RTC_G_TABLE_TOTAL') . ' }
            ';
        }
        if (Configuration::get('RTC_BOX')) {
            $css .= '.box { background-color: ' . Configuration::get('RTC_BOX') . ' }
            ';
        }
        if (Configuration::get('RTC_BOX_TITLE')) {
            $css .= '.page-subheading { color: ' . Configuration::get('RTC_BOX_TITLE') . ' }
            ';
        }
        if (Configuration::get('RTC_BOX_TITLE_BORDER')) {
            $css .= '.page-subheading { border-color: ' . Configuration::get('RTC_BOX_TITLE_BORDER') . ' }
            ';
        }
        if (Configuration::get('RTC_LABEL')) {
            $css .= 'label { color: ' . Configuration::get('RTC_LABEL') . ' }
            ';
        }
        if (Configuration::get('RTC_CHECKBOX_LABEL')) {
            $css .= '.checkbox label { color: ' . Configuration::get('RTC_CHECKBOX_LABEL') . ' }
            ';
        }
        if (Configuration::get('RTC_INPUT_BG')) {
            $css .= '
            #address .form-group .form-control, #identity .form-group .form-control, #account-creation_form .form-group .form-control, #new_account_form .form-group .form-control, #opc_account_form .form-group .form-control, #authentication .form-group .form-control { background-color: ' . Configuration::get('RTC_INPUT_BG') . ' }
            div.selector select { background-color: ' . Configuration::get('RTC_INPUT_BG') . ' }
            ';
        }
        if (Configuration::get('RTC_INPUT_BORDER')) {
            $css .= '
            div.selector select { border-color: ' . Configuration::get('RTC_INPUT_BORDER') . ' }
            .form-control { border-color: ' . Configuration::get('RTC_INPUT_BORDER') . ' }
            input.uniform-input, select.uniform-multiselect, textarea.uniform { border-color: ' . Configuration::get('RTC_INPUT_BORDER') . ' }
            #attributes .attribute_list div.selector { border-right-color: ' . Configuration::get('RTC_INPUT_BORDER') . ' }
            #quantity_wanted_p input { border-color: ' . Configuration::get('RTC_INPUT_BORDER') . ' !important }
            ';
        }
        if (Configuration::get('RTC_INPUT_COLOR')) {
            $css .= '
            .form-control { color: ' . Configuration::get('RTC_INPUT_COLOR') . ' }
            input.uniform-input, select.uniform-multiselect, textarea.uniform { color: ' . Configuration::get('RTC_INPUT_COLOR') . ' }
            ';
        }
        if (Configuration::get('RTC_FORM')) {
            $css .= '
            .form-control { background-color: ' . Configuration::get('RTC_FORM') . ' }
            ';
        }
        if (Configuration::get('RTC_FORM_GREY')) {
            $css .= '
            .form-control.grey { background-color: ' . Configuration::get('RTC_FORM_GREY') . ' }
            ';
        }



// ****************  FONTS and BUTTONS styles start


        if (Configuration::get('RTC_FONT_SIZE_BODY')) {
            $css .='body {font-size: ' . Configuration::get('RTC_FONT_SIZE_BODY') . 'px; }
            .footer-wrapper #footer ul li a {font-size: ' . Configuration::get('RTC_FONT_SIZE_BODY') . 'px; }
            ';
        }

        if (Configuration::get('RTC_FONT_SIZE_MENU')) {
            $lineheight =	Configuration::get('RTC_FONT_SIZE_MENU')+2;
            $fontsubmenu =	Configuration::get('RTC_FONT_SIZE_MENU')-2;
            $realsubmenu =	Configuration::get('RTC_FONT_SIZE_MENU')-6;
            $newrealsubmenu =	Configuration::get('RTC_FONT_SIZE_MENU')-7;
            $newrealsubmenulh =	Configuration::get('RTC_FONT_SIZE_MENU')-5;
            $fontproducthome =	Configuration::get('RTC_FONT_SIZE_MENU')+2;
            $fontcmshome =	Configuration::get('RTC_FONT_SIZE_MENU')+10;
            $fontcmshomelh =	Configuration::get('RTC_FONT_SIZE_MENU')+16;
            $fontnewsoc =	Configuration::get('RTC_FONT_SIZE_MENU')-4;
            $fontfootertitle =	Configuration::get('RTC_FONT_SIZE_MENU')-2;
            $fontfootertitlelh =	Configuration::get('RTC_FONT_SIZE_MENU');
            $fontproductname =	Configuration::get('RTC_FONT_SIZE_MENU')+8;
            $fontproductnameh =	Configuration::get('RTC_FONT_SIZE_MENU')+12;
            $fontmenutablets =	Configuration::get('RTC_FONT_SIZE_MENU')-3;
            $css .='
            .block .title_block a, .sds_title_block a, .sds_title_block a:hover, .sdstitle_block, #royinfoblock h3, .block h4 a, .page-heading, #cms #center_column h2, .block .title_block, .block h4 {font-size: ' . $fontproducthome . 'px; line-height:' . $fontproducthome . 'px; }
            @media (min-width:992px) and (max-width: 1199px) { #royinfoblock h3 {font-size: ' . $fontsubmenu . 'px!important; line-height:' . $fontsubmenu . 'px!important; } }
            @media (min-width:480px) and (max-width: 767px) { #royinfoblock h3 {font-size: ' . $fontnewsoc . 'px!important; line-height:' . $fontnewsoc . 'px!important; } }
            @media (max-width: 479px) { #royinfoblock h3 {font-size: ' . $realsubmenu . 'px!important; line-height:' . $realsubmenu . 'px!important; } }
            .sf-menu > li > a {font-size: ' . Configuration::get('RTC_FONT_SIZE_MENU') . 'px!important; }
            @media (min-width: 768px) and (max-width: 1199px) {
                .sf-menu > li > a,
                .sf-menu > li.sfHover > a,
                .sf-menu > li > a:hover {
                font-size: ' . $fontmenutablets . 'px!important; } }
            .sf-menu > li > ul > li > a {font-size: ' . $fontsubmenu . 'px!important; line-height:' . $fontsubmenu . 'px!important; }
            .home_products_title span, .home_products_title a > span, .brandstitle {font-size: ' . $fontproducthome . 'px; }
            .shopping_cart > a:first-child > span.cartname {font-size: ' . $fontsubmenu . 'px; line-height:' . $lineheight . 'px; }
            #bottominfo_block p {font-size: ' . $fontsubmenu . 'px; line-height:' . $fontsubmenu . 'px; }
            #bottominfo_block h3 {font-size: ' . $fontcmshome . 'px; line-height:' . $fontcmshomelh . 'px; }
            #footer #newsletter_block_left h4, .footer-wrapper #footer #social_block h4 {font-size: ' . $fontnewsoc . 'px; line-height:' . $fontnewsoc . 'px; }
            @media (min-width:992px) {
            .footer-wrapper #footer h4 {font-size: ' . $fontfootertitle . 'px; line-height:' . $fontfootertitlelh . 'px; } }
            ul.step, .idTabs > li a {font-size: ' . $fontsubmenu . 'px; line-height:' . Configuration::get('RTC_FONT_SIZE_MENU') . 'px; }
            .page-subheading, #my-account ul.myaccount-link-list li a {font-size: ' . $fontsubmenu . 'px ; line-height:' . $lineheight . 'px; }
            .pb-center-column h1 {font-size: ' . $fontproductname . 'px ; line-height:' . $fontproductnameh . 'px; }
            .box-info-product #our_price_display {font-size: ' . $fontproductname . 'px ; line-height:' . $fontfootertitlelh . 'px; }
            ';
        }

        if (Configuration::get('RTC_FONT_SIZE_PRICE')) {
            $fontpricelh =	Configuration::get('RTC_FONT_SIZE_PRICE')+4;
            $fontpricelist =	Configuration::get('RTC_FONT_SIZE_PRICE')+2;
            $fontpricelistmedia =	Configuration::get('RTC_FONT_SIZE_PRICE')-2;
            $css .='
            .price.product-price, .price-percent-reduction, .old-price.product-price {font-size: ' . Configuration::get('RTC_FONT_SIZE_PRICE') . 'px; line-height: ' . $fontpricelh . 'px;}
            ul.product_list.list li .right-block .content_price span {font-size: ' . $fontpricelist . 'px; line-height: ' . $fontpricelh . 'px;}
             @media (max-width: 1199px) {
            ul.product_list.list li .right-block .content_price span {font-size: ' . $fontpricelistmedia . 'px; line-height: ' . Configuration::get('RTC_FONT_SIZE_PRICE') . 'px;} }
            ';
        }

        if (Configuration::get('RTC_FONT_SIZE_BUTTONS')) {
            $fontbuttonslh =	Configuration::get('RTC_FONT_SIZE_BUTTONS')+1;
            $css .='
            .btn, .cart_navigation .continue_shoping span, .cart_navigation .button-medium span {font-size: ' . Configuration::get('RTC_FONT_SIZE_BUTTONS') . 'px; line-height: ' . $fontbuttonslh . 'px;}
            ';
        }

        $sfontHeadings = Configuration::get('RTC_F_HEADINGS');
        $fontHeadings = substr($sfontHeadings, 0, strpos($sfontHeadings, ":"));

        $sfontText = Configuration::get('RTC_F_TEXT');
        $fontText = substr($sfontText, 0, strpos($sfontText, ":"));

        $sfontPrice = Configuration::get('RTC_F_PRICE');
        $fontPrice = substr($sfontPrice, 0, strpos($sfontPrice, ":"));

        if($fontText == '')
            $fontText = $sfontText;
        if($fontPrice == '')
            $fontPrice = $sfontPrice;
        if($fontHeadings  == '')
            $fontHeadings  = $sfontHeadings ;
        if(Configuration::get('RTC_F_HEADINGS') or Configuration::get('RTC_F_TEXT') or Configuration::get('RTC_F_PRICE'))
        {
            $css .="
            h1, h2, h3, h4, h5, h6 {
            font-family: '".$fontHeadings."', Verdana, sans-serif; }
            ";
            $css .="
            .sds_title_block a, .sds_title_block a:hover, .brandstitle span, .soldout-label, #royinfoblock h3, .sdstitle_block, .sdsreadMore .more a, .breadcrumb, .breadcrumb a, #my-account ul.myaccount-link-list li a, .box-cart-bottom .ajax_add_to_cart_button span, .idTabs > li a, .pb-center-column h1, .content_sortPagiBar .sortPagiBar label, .cart_block .cart-prices .cart-prices-line, .cart_block .cart-prices .cart-prices-line .price, .bottom-pagination-content .nbrItemPage label, ul.product_list.list li .product-container .button-container .ajax_add_to_cart_button span, .sf-menu > li > a, .sf-menu > li > ul > li > a, .block .title_block, .block h4, #categories_block_left li a, #layered_block_left .layered_subtitle, .home_products_title span, #homepage-slider .homeslider-description h2, #bottominfo_block h3, #bottominfo_block p, .footer-wrapper #footer h4, .footer-wrapper #footer h4, .footer-wrapper #footer h4, .shopping_cart > a:first-child > span.cartname, #homepage-slider .homeslider-description button, .btn, .page-subheading, .page-heading, ul.step, .table > thead > tr > th, #cart_summary tfoot td.total_price_container span {
            font-family: '".$fontHeadings."', Verdana, sans-serif!important; }
            ";
            $css .="
            html, body, .FINALmenu-tab-content, #usefull_link_block li a, .resetimg #wrapResetImages a, .buttons_bottom_block #wishlist_button, #royinfoblock h4, .sf-menu li li li a, .new-label, .sale-label, ul.product_list .functional-buttons div a, ul.product_list .functional-buttons div label, #layer_cart .crossseling h2, #layer_cart .layer_cart_product h2, #layer_cart .layer_cart_cart h2, .product-name, #categories_block_left li li a {
            font-family:'".$fontText."', Verdana, sans-serif !important; }
            ";
            $css .="
            .price, .price-percent-reduction, .old-price, .price.product-price, .box-info-product #our_price_display, #cart_summary tfoot td#total_price_container {
            font-family:'".$fontPrice."', Verdana, sans-serif !important; }
            ";
        }


        if (Configuration::get('NC_UP_MENU') =="2") {

            $css .= '
            #FINALmenu #FINALmenu-desktop-nav > li, .sf-menu > li > a, .sf-menu > li > ul > li > a { text-transform: none!important; }
            ';
        }
        if (Configuration::get('NC_UP_HEAD') =="2") {
            $css .= '
            .pb-center-column h1, #htmlcontent_top .bview h2, #htmlcontent_home .bview h2, .breadcrumb, .cart_block .cart-prices .cart-prices-line, #articleComments h4, .comment-reply-title, .related, .soldout-label, .shopping_cart > a:first-child > span.cartname, .block .title_block, .block h4, #categories_block_left li a, .footer-wrapper #footer h4, #footer #newsletter_block_left h4, .footer-wrapper #footer #social_block h4, #layered_block_left .layered_subtitle, .home_products_title span, .home_products_title a > span, .brandstitle, .sds_title_block a, .sds_title_block a:hover, .idTabs > li a, h3.page-product-heading, #royinfoblock h3, .breadcrumb a, .page-heading, #my-account ul.myaccount-link-list li a, .table > thead > tr > th, .page-subheading { text-transform: none!important; }
            ';
        }
        if (Configuration::get('NC_UP_BUT') =="2") {
            $css .= '
            input.button_mini, .cart_block .cart-buttons a#button_order_cart span, input.button_small, input.button, input.button_large, input.button_mini_disabled, input.button_small_disabled, input.button_disabled, input.button_large_disabled, input.exclusive_mini, input.exclusive_small, input.exclusive, input.exclusive_large, input.exclusive_mini_disabled, input.exclusive_small_disabled, input.exclusive_disabled, input.exclusive_large_disabled, a.button_mini, a.button_small, a.button, a.button_large, a.exclusive_mini, a.exclusive_small, a.exclusive, a.exclusive_large, span.button_mini, span.button_small, span.button, span.button_large, span.exclusive_mini, span.exclusive_small, span.exclusive, span.exclusive_large, span.exclusive_large_disabled, .block .products-block a.btn, .block .blockstore a.btn, a.news_more, #htmlcontent_top .bview .binfo, #htmlcontent_home .bview .binfo { text-transform: none!important; }
            ';
        }
        if (Configuration::get('RTC_B_NORMAL_BG')) {
            $css .= '
            .btn { background-color: ' . Configuration::get('RTC_B_NORMAL_BG') . ' }
            .button.button-medium { background-color: ' . Configuration::get('RTC_B_NORMAL_BG') . ' }
            .button.button-small { background-color: ' . Configuration::get('RTC_B_NORMAL_BG') . ' }
            .button.button-large { background-color: ' . Configuration::get('RTC_B_NORMAL_BG') . ' }
            .button { background-color: ' . Configuration::get('RTC_B_NORMAL_BG') . ' }
            .fancybox-wrap button, #fancybox-wrap button { background-color: ' . Configuration::get('RTC_B_NORMAL_BG') . ' }
            ';
        }
        if (Configuration::get('RTC_B_NORMAL_BORDER')) {
            $css .= '
            .btn { border-color: ' . Configuration::get('RTC_B_NORMAL_BORDER') . ' }
            .button.button-medium { border-color: ' . Configuration::get('RTC_B_NORMAL_BORDER') . ' }
            .button.button-small { border-color: ' . Configuration::get('RTC_B_NORMAL_BORDER') . ' }
            .button.button-large { border-color: ' . Configuration::get('RTC_B_NORMAL_BORDER') . ' }
            .button { border-color: ' . Configuration::get('RTC_B_NORMAL_BORDER') . ' }
            .fancybox-wrap button, #fancybox-wrap button { border-color: ' . Configuration::get('RTC_B_NORMAL_BORDER') . ' }
            ';
        }
        if (Configuration::get('RTC_B_NORMAL_COLOR')) {
            $css .= '
            .btn { color: ' . Configuration::get('RTC_B_NORMAL_COLOR') . ' }
            .button.button-medium { color: ' . Configuration::get('RTC_B_NORMAL_COLOR') . ' }
            .button.button-small { color: ' . Configuration::get('RTC_B_NORMAL_COLOR') . ' }
            .button.button-large { color: ' . Configuration::get('RTC_B_NORMAL_COLOR') . ' }
            .button { color: ' . Configuration::get('RTC_B_NORMAL_COLOR') . ' }
            .fancybox-wrap button, #fancybox-wrap button { color: ' . Configuration::get('RTC_B_NORMAL_COLOR') . ' }
            ';
        }



        if (Configuration::get('RTC_B_NORMAL_BG_HOVER')) {
            $css .= '
            .button.button-medium:hover { background-color: ' . Configuration::get('RTC_B_NORMAL_BG_HOVER') . ' }
            .button.button-small:hover { background-color: ' . Configuration::get('RTC_B_NORMAL_BG_HOVER') . ' }
            .button.button-medium.exclusive:hover { background-color: ' . Configuration::get('RTC_B_NORMAL_BG_HOVER') . ' }
            .button.exclusive-medium { background-color: ' . Configuration::get('RTC_B_NORMAL_BG_HOVER') . ' }
            .block .block_content a.button-small:hover { background-color: ' . Configuration::get('RTC_B_NORMAL_BG_HOVER') . ' }
            #product .addcustom:hover { background-color: ' . Configuration::get('RTC_B_NORMAL_BG_HOVER') . ' }
            .fancybox-wrap button, #fancybox-wrap button { background-color: ' . Configuration::get('RTC_B_NORMAL_BG_HOVER') . ' }
            ';
        }

        if (Configuration::get('RTC_B_NORMAL_BORDER_HOVER')) {
            $css .= '
            .button.button-medium:hover { border-color: ' . Configuration::get('RTC_B_NORMAL_BORDER_HOVER') . ' }
            .button.button-small:hover { border-color: ' . Configuration::get('RTC_B_NORMAL_BORDER_HOVER') . ' }
            .button.button-medium.exclusive:hover { border-color: ' . Configuration::get('RTC_B_NORMAL_BORDER_HOVER') . ' }
            .button.exclusive-medium { border-color: ' . Configuration::get('RTC_B_NORMAL_BORDER_HOVER') . ' }
            .block .block_content a.button-small:hover { border-color: ' . Configuration::get('RTC_B_NORMAL_BORDER_HOVER') . ' }
            #product .addcustom:hover { border-color: ' . Configuration::get('RTC_B_NORMAL_BORDER_HOVER') . ' }
            .fancybox-wrap button, #fancybox-wrap button { border-color: ' . Configuration::get('RTC_B_NORMAL_BORDER_HOVER') . ' }
            ';
        }
        if (Configuration::get('RTC_B_NORMAL_COLOR_HOVER')) {
            $css .= '
            .button.button-medium:hover { color: ' . Configuration::get('RTC_B_NORMAL_COLOR_HOVER') . ' }
            .button.button-small:hover { color: ' . Configuration::get('RTC_B_NORMAL_COLOR_HOVER') . ' }
            .button.button-medium.exclusive:hover { color: ' . Configuration::get('RTC_B_NORMAL_COLOR_HOVER') . ' }
            .button.exclusive-medium { color: ' . Configuration::get('RTC_B_NORMAL_COLOR_HOVER') . ' }
            .block .block_content a.button-small:hover { color: ' . Configuration::get('RTC_B_NORMAL_COLOR_HOVER') . ' }
            #product .addcustom:hover { color: ' . Configuration::get('RTC_B_NORMAL_COLOR_HOVER') . ' }
            .fancybox-wrap button, #fancybox-wrap button { color: ' . Configuration::get('RTC_B_NORMAL_COLOR_HOVER') . ' }
            ';
        }



        if (Configuration::get('RTC_B_EX_BG')) {
            $css .= '
            .button.exclusive-medium { background-color: ' . Configuration::get('RTC_B_EX_BG') . ' }
            .button.button-medium.exclusive { background-color: ' . Configuration::get('RTC_B_EX_BG') . ' }
            ';
        }
        if (Configuration::get('RTC_B_EX_BORDER')) {
            $css .= '
            .button.exclusive-medium { border-color: ' . Configuration::get('RTC_B_EX_BORDER') . ' }
            .button.button-medium.exclusive { border-color: ' . Configuration::get('RTC_B_EX_BORDER') . ' }
            ';
        }
        if (Configuration::get('RTC_B_EX_COLOR')) {
            $css .= '
            .button.exclusive-medium { color: ' . Configuration::get('RTC_B_EX_COLOR') . ' }
            .button.button-medium.exclusive { color: ' . Configuration::get('RTC_B_EX_COLOR') . ' }
            ';
        }




// ****************  HOMEPAGE and TOP CONTENT styles start
		// Featured 
		
		if (Configuration::get('NC_CAROUSEL_FEATURED') =="1") {
			$css .= '
				ul#homefeatured.rv_carousel li {
					width: auto!important;
					padding: 0!important;
					position: relative;
				}	
			';
		}
		
		if (Configuration::get('NC_CAROUSEL_FEATURED') =="2") {
			$css .= '
				#index ul#homefeatured.rv_carousel {
					margin-left: -15px;
					margin-right: -15px;
				}
				#index ul#homefeatured.product_list.tab-pane > li {
					padding-bottom:40px!important; 
					padding-left: 15px;
					padding-right: 15px;
				}		
				@media (min-width:480px) and (max-width:991px) {
				#index ul#homefeatured.product_list.grid > li:nth-child(2n+1) {
					clear:left;
				} }	
			';
		}
			
        if ((Configuration::get('NC_CAROUSEL_FEATURED') =="2") && (Configuration::get('NC_ITEMS_FEATURED') == "3")) {
            $css .= '
			@media (min-width:992px) {
			#index ul#homefeatured.product_list.grid > li {
				width:33.33333%;
			}
			#index ul#homefeatured.product_list.grid > li:nth-child(3n+1) {
				clear:left;
			} }
            ';
        }		
        if ((Configuration::get('NC_CAROUSEL_FEATURED') =="2") && (Configuration::get('NC_ITEMS_FEATURED') == "4")) {
            $css .= '
			@media (min-width:992px) {
			#index ul#homefeatured.product_list.grid > li {
				width:25%;
			}
			ul#homefeatured.product_list .functional-buttons div.compare a:before,
			ul#homefeatured.product_list .functional-buttons div.wishlist a:before {
				display:none!important;
			}
			#index ul#homefeatured.product_list.grid > li:nth-child(4n+1) {
				clear:left;
			} }
            ';
        }		
        if ((Configuration::get('NC_CAROUSEL_FEATURED') =="2") && (Configuration::get('NC_ITEMS_FEATURED') == "5")) {
            $css .= '
			@media (min-width:992px) {
			ul#homefeatured.product_list.grid > li {
				width:20%;
			}
			ul#homefeatured.product_list .functional-buttons div.compare a:before,
			ul#homefeatured.product_list .functional-buttons div.wishlist a:before {
				display:none!important;
			}
			#index ul#homefeatured.product_list.grid > li:nth-child(5n+1) {
				clear:left;
			} }
            ';
        }

		// BEST
		
		if (Configuration::get('NC_CAROUSEL_BEST') =="1") {
			$css .= '
				ul#blockbestsellers.rv_carousel li {
					width: auto!important;
					padding: 0!important;
					position: relative;
				}	
			';
		}
		
		if (Configuration::get('NC_CAROUSEL_BEST') =="2") {
			$css .= '
				#index ul#blockbestsellers.rv_carousel {
					margin-left: -15px;
					margin-right: -15px;
				}
				#index ul#blockbestsellers.product_list.tab-pane > li {
					padding-bottom:40px!important; 
					padding-left: 15px;
					padding-right: 15px;
				}		
				@media (min-width:480px) and (max-width:991px) {
				#index ul#blockbestsellers.product_list.grid > li:nth-child(2n+1) {
					clear:left;
				} }	
			';
		}
			
        if ((Configuration::get('NC_CAROUSEL_BEST') =="2") && (Configuration::get('NC_ITEMS_BEST') == "3")) {
            $css .= '
				@media (min-width:992px) {
				#index ul#blockbestsellers.product_list.grid > li {
					width:33.33333%;
				}
				#index ul#blockbestsellers.product_list.grid > li:nth-child(3n+1) {
					clear:left;
				} }
            ';
        }		
        if ((Configuration::get('NC_CAROUSEL_BEST') =="2") && (Configuration::get('NC_ITEMS_BEST') == "4")) {
            $css .= '
				@media (min-width:992px) {
				#index ul#blockbestsellers.product_list.grid > li {
					width:25%;
				}
				ul#blockbestsellers.product_list .functional-buttons div.compare a:before,
				ul#blockbestsellers.product_list .functional-buttons div.wishlist a:before {
					display:none!important;
				}
				#index ul#blockbestsellers.product_list.grid > li:nth-child(4n+1) {
					clear:left;
				} }
            ';
        }		
        if ((Configuration::get('NC_CAROUSEL_BEST') =="2") && (Configuration::get('NC_ITEMS_BEST') == "5")) {
            $css .= '
				@media (min-width:992px) {
				ul#blockbestsellers.product_list.grid > li {
					width:20%;
				}
				ul#blockbestsellers.product_list .functional-buttons div.compare a:before,
				ul#blockbestsellers.product_list .functional-buttons div.wishlist a:before {
					display:none!important;
				}
				#index ul#blockbestsellers.product_list.grid > li:nth-child(5n+1) {
					clear:left;
				} }
            ';
        }

		// NEW
		
		if (Configuration::get('NC_CAROUSEL_NEW') =="1") {
			$css .= '
				ul#blocknewproducts.rv_carousel li {
					width: auto!important;
					padding: 0!important;
					position: relative;
				}	
			';
		}
		
		if (Configuration::get('NC_CAROUSEL_NEW') =="2") {
			$css .= '
				#index ul#blocknewproducts.rv_carousel {
					margin-left: -15px;
					margin-right: -15px;
				}
				#index ul#blocknewproducts.product_list.tab-pane > li {
					padding-bottom:40px!important; 
					padding-left: 15px;
					padding-right: 15px;
				}		
				@media (min-width:480px) and (max-width:991px) {
				#index ul#blocknewproducts.product_list.grid > li:nth-child(2n+1) {
					clear:left;
				} }	
			';
		}
			
        if ((Configuration::get('NC_CAROUSEL_NEW') =="2") && (Configuration::get('NC_ITEMS_NEW') == "3")) {
            $css .= '
				@media (min-width:992px) {
				#index ul#blocknewproducts.product_list.grid > li {
					width:33.33333%;
				}
				#index ul#blocknewproducts.product_list.grid > li:nth-child(3n+1) {
					clear:left;
				} }
            ';
        }		
        if ((Configuration::get('NC_CAROUSEL_NEW') =="2") && (Configuration::get('NC_ITEMS_NEW') == "4")) {
            $css .= '
				@media (min-width:992px) {
				#index ul#blocknewproducts.product_list.grid > li {
					width:25%;
				}
				ul#blocknewproducts.product_list .functional-buttons div.compare a:before,
				ul#blocknewproducts.product_list .functional-buttons div.wishlist a:before {
					display:none!important;
				}
				#index ul#blocknewproducts.product_list.grid > li:nth-child(4n+1) {
					clear:left;
				} }
            ';
        }		
        if ((Configuration::get('NC_CAROUSEL_NEW') =="2") && (Configuration::get('NC_ITEMS_NEW') == "5")) {
            $css .= '
				@media (min-width:992px) {
				ul#blocknewproducts.product_list.grid > li {
					width:20%;
				}
				ul#blocknewproducts.product_list .functional-buttons div.compare a:before,
				ul#blocknewproducts.product_list .functional-buttons div.wishlist a:before {
					display:none!important;
				}
				#index ul#blocknewproducts.product_list.grid > li:nth-child(5n+1) {
					clear:left;
				} }
            ';
        }

		// SALE
		
		if (Configuration::get('NC_CAROUSEL_SALE') =="1") {
			$css .= '
				ul#royspecials.rv_carousel li {
					width: auto!important;
					padding: 0!important;
					position: relative;
				}	
			';
		}
		
		if (Configuration::get('NC_CAROUSEL_SALE') =="2") {
			$css .= '
				#index ul#royspecials.rv_carousel {
					margin-left: -15px;
					margin-right: -15px;
				}
				#index ul#royspecials.product_list.tab-pane > li {
					padding-bottom:40px!important; 
					padding-left: 15px;
					padding-right: 15px;
				}		
				@media (min-width:480px) and (max-width:991px) {
				#index ul#royspecials.product_list.grid > li:nth-child(2n+1) {
					clear:left;
				} }	
			';
		}
			
        if ((Configuration::get('NC_CAROUSEL_SALE') =="2") && (Configuration::get('NC_ITEMS_SALE') == "3")) {
            $css .= '
				@media (min-width:992px) {
				#index ul#royspecials.product_list.grid > li {
					width:33.33333%;
				}
				#index ul#royspecials.product_list.grid > li:nth-child(3n+1) {
					clear:left;
				} }
            ';
        }		
        if ((Configuration::get('NC_CAROUSEL_SALE') =="2") && (Configuration::get('NC_ITEMS_SALE') == "4")) {
            $css .= '
				@media (min-width:992px) {
				#index ul#royspecials.product_list.grid > li {
					width:25%;
				}
				ul#royspecials.product_list .functional-buttons div.compare a:before,
				ul#royspecials.product_list .functional-buttons div.wishlist a:before {
					display:none!important;
				}
				#index ul#royspecials.product_list.grid > li:nth-child(4n+1) {
					clear:left;
				} }
            ';
        }		
        if ((Configuration::get('NC_CAROUSEL_SALE') =="2") && (Configuration::get('NC_ITEMS_SALE') == "5")) {
            $css .= '
				@media (min-width:992px) {
				ul#royspecials.product_list.grid > li {
					width:20%;
				}
				ul#royspecials.product_list .functional-buttons div.compare a:before,
				ul#royspecials.product_list .functional-buttons div.wishlist a:before {
					display:none!important;
				}
				#index ul#royspecials.product_list.grid > li:nth-child(5n+1) {
					clear:left;
				} }
            ';
        }



        if (Configuration::get('RTC_CL_LABEL')) {
            $css .= '
            #currencies-block-top div.current .cur-label { color: ' . Configuration::get('RTC_CL_LABEL') . ' }
            #languages-block-top div.current .lang-label { color: ' . Configuration::get('RTC_CL_LABEL') . ' }
            ';
        }
        if (Configuration::get('RTC_CL_VALUE')) {
            $css .= '
            #currencies-block-top div.current { color: ' . Configuration::get('RTC_CL_VALUE') . ' }
            #languages-block-top div.current { color: ' . Configuration::get('RTC_CL_VALUE') . ' }
            ';
        }
        if (Configuration::get('RTC_CL_POPUP_BG')) {
            $css .= '
            #currencies-block-top ul { background-color: ' . Configuration::get('RTC_CL_POPUP_BG') . ' }
            #languages-block-top ul { background-color: ' . Configuration::get('RTC_CL_POPUP_BG') . ' }
            ';
        }
        if (Configuration::get('RTC_CL_POPUP_BORDER')) {
            $css .= '
            #currencies-block-top ul { border-color: ' . Configuration::get('RTC_CL_POPUP_BORDER') . ' }
            #languages-block-top ul { border-color: ' . Configuration::get('RTC_CL_POPUP_BORDER') . ' }
            ';
        }

        if (Configuration::get('RTC_CL_POPUP_SHADOW') == 1) {
            $css .= '
            #currencies-block-top ul {
			-webkit-box-shadow: rgba(0, 0, 0, 0.2) 0px 5px 13px !important;
            -moz-box-shadow: rgba(0, 0, 0, 0.2) 0px 5px 13px !important;
            box-shadow: rgba(0, 0, 0, 0.2) 0px 5px 13px !important; }
            #languages-block-top ul {
			-webkit-box-shadow: rgba(0, 0, 0, 0.2) 0px 5px 13px !important;
            -moz-box-shadow: rgba(0, 0, 0, 0.2) 0px 5px 13px !important;
            box-shadow: rgba(0, 0, 0, 0.2) 0px 5px 13px !important; }
            ';
        }
        if (Configuration::get('RTC_CL_POPUP_ITEM')) {
            $css .= '
            #currencies-block-top ul li a, #currencies-block-top ul li > span { color: ' . Configuration::get('RTC_CL_POPUP_ITEM') . ' }
            #languages-block-top ul li a, #languages-block-top ul li > span { color: ' . Configuration::get('RTC_CL_POPUP_ITEM') . ' }
            ';
        }
        if (Configuration::get('RTC_CL_POPUP_ITEM_HOVER')) {
            $css .= '
            #currencies-block-top ul li.selected a { color: ' . Configuration::get('RTC_CL_POPUP_ITEM_HOVER') . ' }
            #currencies-block-top ul li:hover a { color: ' . Configuration::get('RTC_CL_POPUP_ITEM_HOVER') . ' }
            #languages-block-top ul li.selected span { color: ' . Configuration::get('RTC_CL_POPUP_ITEM_HOVER') . ' }
            #languages-block-top ul li:hover a { color: ' . Configuration::get('RTC_CL_POPUP_ITEM_HOVER') . ' }
            ';
        }
        if (Configuration::get('RTC_CL_DISPLAY_CUR') == 0) {
            $css .= '
            #currencies-block-top { display:none!important; }
            #languages-block-top div.current { padding-left:0; }
            @media (max-width: 767px) {
                #languages-block-top {
                position:relative;
                float:right;
                text-align:center;
                margin: 18px 0 0 0;
                width: 100%; }
               #languages-block-top ul {
               left:50%;
               margin-left:-70px; }
            }
            ';
        }
        if (Configuration::get('RTC_CL_DISPLAY_LAN') == 0) {
            $css .= '
            #languages-block-top { display:none!important; }
            @media (max-width: 767px) {
                #currencies-block-top {
                position:relative;
                float:left;
                text-align:center;
                margin: 18px 0 0 0;
                width: 100%; }
               #currencies-block-top ul {
               left:50%;
               margin-left:-70px; }
            }
                @media (min-width:480px) and (max-width: 767px) {
                  #currencies-block-top div.current {
                    text-align: center; } }
            ';
        }

        if (Configuration::get('RTC_TA_LINK')) {
            $css .= '
            #header_user_info a { color: ' . Configuration::get('RTC_TA_LINK') . ' }
            ';
        }
        if (Configuration::get('RTC_TA_LINK_HOVER')) {
            $css .= '
            #header_user_info a:hover, .header_user_info a.active { color: ' . Configuration::get('RTC_TA_LINK_HOVER') . ' }
            ';
        }
        if (Configuration::get('RTC_TA_SEPARATOR')) {
            $css .= '
            #header_user_info ul li { border-left-color: ' . Configuration::get('RTC_TA_SEPARATOR') . ' }
            @media (max-width:479px) {
            #header_user_info ul li:last-child { border-left-color: ' . Configuration::get('RTC_TA_SEPARATOR') . ' } }
            #currencies-block-top div.current .cur-label {border-right-color: ' . Configuration::get('RTC_TA_SEPARATOR') . ' }
            #languages-block-top div.current .lang-label {border-right-color: ' . Configuration::get('RTC_TA_SEPARATOR') . ' }
            ';
        }
        if (Configuration::get('RTC_TA_WELCOME')) {
            $css .= '
            #header_user_info span.userwelcome { color: ' . Configuration::get('RTC_TA_WELCOME') . ' }
            ';
        }
        if (Configuration::get('RTC_TA_NAME')) {
            $css .= '
            #header_user_info span.usercustomer { color: ' . Configuration::get('RTC_TA_NAME') . ' }
            ';
        }

        if (Configuration::get('RTC_IP_BG')) {
            $css .= '
            .infopanel { background-color: ' . Configuration::get('RTC_IP_BG') . ' }
            ';
        }
        if (Configuration::get('RTC_IP_BORDER')) {
            $css .= '
            #royinfoblock > div:before { background-color: ' . Configuration::get('RTC_IP_BORDER') . ' }
            .infopanel { border-color: ' . Configuration::get('RTC_IP_BORDER') . ' }
            ';
        }
        if (Configuration::get('RTC_IP_TITLE')) {
            $css .= '
            #royinfoblock h3 { color: ' . Configuration::get('RTC_IP_TITLE') . ' }
            ';
        }
        if (Configuration::get('RTC_IP_TEXT')) {
            $css .= '
            #royinfoblock h4 { color: ' . Configuration::get('RTC_IP_TEXT') . ' }
            ';
        }
        if (Configuration::get('RTC_IP_TEL_EXT')) {

            if (Shop::getContext() == Shop::CONTEXT_SHOP)
                $adv_imgname = 'icons-tel'.'-'.(int)$this->context->shop->getContextShopID();

            $css .= '
			#royinfoblock div > div.info-tel {	background-image: url(../upload/'. $adv_imgname.'.' . Configuration::get('RTC_IP_TEL_EXT') . ') !important; }';
        }
        if (Configuration::get('RTC_IP_TIME_EXT')) {

            if (Shop::getContext() == Shop::CONTEXT_SHOP)
                $adv_imgname = 'icons-time'.'-'.(int)$this->context->shop->getContextShopID();

            $css .= '
			#royinfoblock div > div.info-time {	background-image: url(../upload/'. $adv_imgname.'.' . Configuration::get('RTC_IP_TIME_EXT') . ') !important; }';
        }
        if (Configuration::get('RTC_IP_TRUCK_EXT')) {

            if (Shop::getContext() == Shop::CONTEXT_SHOP)
                $adv_imgname = 'icons-truck'.'-'.(int)$this->context->shop->getContextShopID();

            $css .= '
			#royinfoblock div > div.info-truck {	background-image: url(../upload/'. $adv_imgname.'.' . Configuration::get('RTC_IP_TRUCK_EXT') . ') !important; }';
        }
        if (Configuration::get('RTC_IP_MONEY_EXT')) {

            if (Shop::getContext() == Shop::CONTEXT_SHOP)
                $adv_imgname = 'icons-money'.'-'.(int)$this->context->shop->getContextShopID();

            $css .= '
			#royinfoblock div > div.info-money {	background-image: url(../upload/'. $adv_imgname.'.' . Configuration::get('RTC_IP_TRUCK_EXT') . ') !important; }';
        }
        if (Configuration::get('RTC_IP_ANIM') == 0) {
            $css .= '
            #royinfoblock div:hover > div {
            -webkit-transform:none;
            -moz-transform:none;
            -ms-transform:none;
            -o-transform:none;
            transform:none; }
            ';
        }
        if (Configuration::get('NC_SHOW_IP') == 0) {
            $css .= '
            ';
        }
        if (Configuration::get('NC_SHOW_IP') == 1) {
            $css .= '
            .infopanel {
            display:none!important;
            height:0!important;
            min-height:0;
            max-height:0;
            }
            ';
        }

        if (Configuration::get('RTC_SLIDER_MODE') == "1") {
            $css .= '
            ';
        }
        if (Configuration::get('RTC_SLIDER_MODE') == "2") {
            $css .= '
            #index .columns-container-top .container {
                padding:0;
                max-width:100%; }

            #index .columns-container-top #top_column {
                padding:0!important; }
            #index .columns-container-top .row {
                margin:0!important; }

            #htmlcontent_top {
                margin-top:10px;
                float:none;
                width:100%;
                text-align:center;
                max-width:100%; }
            #htmlcontent_top ul li {
                max-width:32%;
                width:auto; }
            #htmlcontent_top ul {
                display:inline-block!important; }

             @media (min-width: 480px) and (max-width: 1199px) {
             #htmlcontent_top ul li {
                    max-width:32%;
                    width: auto; } }
             @media (max-width: 479px) {
             #htmlcontent_top ul li {
                    max-width:100%;
                    width: auto; } }

            ';
        }

        if (Configuration::get('RTC_BANNERS_ANIM') == 0) {
            $css .= '
            #htmlcontent_top .bview .mask {display:none!important }
            #htmlcontent_home .bview .mask {display:none!important }
            ';
        }

        if (Configuration::get('RTC_BAN_BG')) {
            $css .= '
            #htmlcontent_top .bview-first .mask { background-color: ' . Configuration::get('RTC_BAN_BG') . '!important }
            #htmlcontent_home .bview-first .mask { background-color: ' . Configuration::get('RTC_BAN_BG') . '!important }
            ';
        }
        if (Configuration::get('RTC_BAN_TITLE')) {
            $css .= '
            #htmlcontent_top .bview h2 { color: ' . Configuration::get('RTC_BAN_TITLE') . '!important }
            #htmlcontent_home .bview h2 { color: ' . Configuration::get('RTC_BAN_TITLE') . '!important }
            ';
        }
        if (Configuration::get('RTC_BAN_TEXT')) {
            $css .= '
            #htmlcontent_top .bview p { color: ' . Configuration::get('RTC_BAN_TEXT') . '!important }
            #htmlcontent_home .bview p { color: ' . Configuration::get('RTC_BAN_TEXT') . '!important }
            ';
        }
        if (Configuration::get('RTC_BAN_BUTTON')) {
            $css .= '
            #htmlcontent_top .bview .binfo { background-color: ' . Configuration::get('RTC_BAN_BUTTON') . '!important }
            #htmlcontent_home .bview .binfo { background-color: ' . Configuration::get('RTC_BAN_BUTTON') . '!important }
            ';
        }
        if (Configuration::get('RTC_BAN_BORDER')) {
            $css .= '
            #htmlcontent_top .bview .binfo { border-color: ' . Configuration::get('RTC_BAN_BORDER') . '!important }
            #htmlcontent_home .bview .binfo { border-color: ' . Configuration::get('RTC_BAN_BORDER') . '!important }
            ';
        }
        if (Configuration::get('RTC_BAN_BUTTON_TEXT')) {
            $css .= '
            #htmlcontent_top .bview .binfo { color: ' . Configuration::get('RTC_BAN_BUTTON_TEXT') . '!important }
            #htmlcontent_home .bview .binfo { color: ' . Configuration::get('RTC_BAN_BUTTON_TEXT') . '!important }
            ';
        }


        if (Configuration::get('RTC_CON_BG')) {
            $css .= '
            #center_column .tab-content .bx-controls a, .owl-controls .owl-nav div { background-color: ' . Configuration::get('RTC_CON_BG') . ' }
            #roybrandscarousel .bx-controls a { background-color: ' . Configuration::get('RTC_CON_BG') . '!important }
            ';
        }
        if (Configuration::get('RTC_CON_BORDER')) {
            $css .= '
            #center_column .tab-content .bx-controls a, .owl-controls .owl-nav div { border-color: ' . Configuration::get('RTC_CON_BORDER') . ' }
            #roybrandscarousel .bx-controls a { border-color: ' . Configuration::get('RTC_CON_BORDER') . '!important }
            ';
        }
        if (Configuration::get('RTC_CON_COLOR')) {
            $css .= '
            #center_column .tab-content .bx-controls .bx-next:before, .owl-controls .owl-next:before { color: ' . Configuration::get('RTC_CON_COLOR') . ' }
            #center_column .tab-content .bx-controls .bx-prev:before, .owl-controls .owl-prev:before  { color: ' . Configuration::get('RTC_CON_COLOR') . ' }
            #roybrandscarousel .bx-controls a.bx-prev:before { color: ' . Configuration::get('RTC_CON_COLOR') . '!important }
            #roybrandscarousel .bx-controls a.bx-next:before { color: ' . Configuration::get('RTC_CON_COLOR') . '!important }
            ';
        }

        if (Configuration::get('RTC_CON_BG_HOVER')) {
            $css .= '
            #center_column .tab-content .bx-controls a:hover, .owl-controls .owl-nav div:hover { background-color: ' . Configuration::get('RTC_CON_BG_HOVER') . ' }
            .tparrows:hover { background-color: ' . Configuration::get('RTC_CON_BG_HOVER') . '!important }
            #roybrandscarousel .bx-controls a:hover { background-color: ' . Configuration::get('RTC_CON_BG_HOVER') . '!important }
            ';
        }
        if (Configuration::get('RTC_CON_BORDER_HOVER')) {
            $css .= '
            #center_column .tab-content .bx-controls a:hover, .owl-controls .owl-nav div:hover { border-color: ' . Configuration::get('RTC_CON_BORDER_HOVER') . ' }
            .tparrows:hover { border-color: ' . Configuration::get('RTC_CON_BORDER_HOVER') . '!important }
            #roybrandscarousel .bx-controls a:hover { border-color: ' . Configuration::get('RTC_CON_BORDER_HOVER') . '!important }
            ';
        }
        if (Configuration::get('RTC_CON_COLOR_HOVER')) {
            $css .= '
            #center_column .tab-content .bx-controls .bx-next:hover:before, .owl-controls .owl-next:hover:before  { color: ' . Configuration::get('RTC_CON_COLOR_HOVER') . ' }
            #center_column .tab-content .bx-controls .bx-prev:hover:before, .owl-controls .owl-prev:hover:before  { color: ' . Configuration::get('RTC_CON_COLOR_HOVER') . ' }
            .tp-leftarrow:hover:before { color: ' . Configuration::get('RTC_CON_COLOR_HOVER') . ' }
            .tp-rightarrow:hover:before { color: ' . Configuration::get('RTC_CON_COLOR_HOVER') . ' }
            #roybrandscarousel .bx-controls a.bx-prev:hover:before { color: ' . Configuration::get('RTC_CON_COLOR_HOVER') . '!important }
            #roybrandscarousel .bx-controls a.bx-next:hover:before { color: ' . Configuration::get('RTC_CON_COLOR_HOVER') . '!important }
            ';
        }

        if (Configuration::get('RTC_S_CON_BG')) {
            $css .= '
            .tparrows { background-color: ' . Configuration::get('RTC_S_CON_BG') . '!important }
            ';
        }
        if (Configuration::get('RTC_S_CON_BORDER')) {
            $css .= '
            .tparrows { border-color: ' . Configuration::get('RTC_S_CON_BORDER') . '!important }
            ';
        }
        if (Configuration::get('RTC_S_CON_COLOR')) {
            $css .= '
            .tp-leftarrow:before { color: ' . Configuration::get('RTC_S_CON_COLOR') . '!important }
            .tp-rightarrow:before { color: ' . Configuration::get('RTC_S_CON_COLOR') . '!important }
            ';
        }



        if (Configuration::get('RTC_HP_TITLE')) {
            $css .= '
            .home_products_title span, .home_products_title a > span { color: ' . Configuration::get('RTC_HP_TITLE') . ' }
            ';
        }

        if (Configuration::get('RTC_HP_TITLE_HOVER')) {
            $css .= '
            .home_products_title a:hover > span { color: ' . Configuration::get('RTC_HP_TITLE_HOVER') . ' }
            ';
        }

        if (Configuration::get('RTC_HP_EXT')) {

            if (Shop::getContext() == Shop::CONTEXT_SHOP)
                $adv_imgname = 'icons-homeproducts'.'-'.(int)$this->context->shop->getContextShopID();

            $css .= '
			.hfeatured .home_products_title i {	background-image: url(../upload/'. $adv_imgname.'.' . Configuration::get('RTC_HP_EXT') . ') !important; }
            .hbest .home_products_title i {	background-image: url(../upload/'. $adv_imgname.'.' . Configuration::get('RTC_HP_EXT') . ') !important; }
			.hnew .home_products_title i {	background-image: url(../upload/'. $adv_imgname.'.' . Configuration::get('RTC_HP_EXT') . ') !important; }
			.hspecials .home_products_title i {	background-image: url(../upload/'. $adv_imgname.'.' . Configuration::get('RTC_HP_EXT') . ') !important; }
			';
        }


        if (Configuration::get('RTC_BOTTOM_SECTION')) {
            $css .= '
            #bottomcolumns { min-height:' . Configuration::get('RTC_BOTTOM_SECTION') . 'px!important; }
            ';
        }
        if (Configuration::get('NC_BOTTOM_SECTION_OTHER')) {
            $css .= '
            .bottom_line_bg { height:' . Configuration::get('NC_BOTTOM_SECTION_OTHER') . 'px!important; }
            .columns-container-middle { padding-bottom:' . Configuration::get('NC_BOTTOM_SECTION_OTHER') . 'px; }
            ';
        }
        if (Configuration::get('NC_BOTTOM_SECTION_SW') == 1) {
            $css .= '
            .bottom_line_bg { display:none!important; }
            .columns-container-middle { padding-bottom:0; }
            ';
        }


        if (Configuration::get('RTC_BRAND_BG')) {
            $css .= '
            #roybrandscarousel { background-color: ' . Configuration::get('RTC_BRAND_BG') . ' }
            ';
        }
        if (Configuration::get('RTC_BRAND_BORDER')) {
            $css .= '
            #roybrandscarousel { border-color: ' . Configuration::get('RTC_BRAND_BORDER') . ' }
            ';
        }

// ****************  MENU and SEARCH styles start


        if (Configuration::get('NC_STICKY_MENU') ==0) {
            $css .= '
            #block_top_menu { -o-transition-property: none !important;
             -moz-transition-property: none !important;
             -ms-transition-property: none !important;
             -webkit-transition-property: none !important;
             transition-property: none !important;
             -o-transform: none !important;
             -moz-transform: none !important;
             -ms-transform: none !important;
             -webkit-transform: none !important;
             transform: none !important;
             -webkit-animation: none !important;
             -moz-animation: none !important;
             -o-animation: none !important;
             -ms-animation: none !important;
             animation: none !important;
            }
			';
        }
        if (Configuration::get('NC_STICKY_MENU') ==1) {
            $css .='
            #block_top_menu.fixed {
                position: fixed;
                top: 0;
                text-align:center;
                margin:0;
                padding:0;
                -webkit-border-radius: 0;
                -moz-border-radius: 0;
                -ms-border-radius: 0;
                -o-border-radius: 0;
                border-radius: 0;
                -webkit-box-shadow: rgba(0, 0, 0, 0.15) 0 4px 9px !important;
                -moz-box-shadow: rgba(0, 0, 0, 0.15) 0 4px 9px !important;
                -o-box-shadow: rgba(0, 0, 0, 0.15) 0 4px 9px !important;
                box-shadow: rgba(0, 0, 0, 0.15) 0 4px 9px !important;
                -webkit-transition: -webkit-box-shadow 1s linear;
                -moz-transition: -moz-box-shadow 1s linear;
                -o-transition: -o-box-shadow 1s linear;
                transition: box-shadow 1s linear;
                z-index:1000;
            }
            @media (min-width:992px) and (max-width:1199px) {
                #block_top_menu.fixed {
                    position: fixed;
                    margin:0;
                    left:0;
                    max-width:100%; }
            }
            @media (max-width:991px) {
                #block_top_menu.fixed {
                    position: fixed; }
            }

            #block_top_menu.fixed ul.sf-menu {
                width:1170px;
                margin:0 auto;
                text-align:left;
                position:relative;
            }
            @media (min-width:992px) and (max-width:1199px) {
                #block_top_menu.fixed ul.sf-menu {
                    width:940px;
                    margin:0 auto;
                    text-align:left;
                    position:relative; }
            }
            @media (min-width:768px) and (max-width:991px) {
                #block_top_menu.fixed ul.sf-menu {
                    width:720px;
                    margin:0 auto;
                    text-align:left;
                    position:relative; }
            }

            @media (max-width:767px) {
                #block_top_menu.fixed ul.sf-menu {
                    width:auto;
                    margin:0 auto;
                    text-align:left;
                    position:relative; }
            }

            #block_top_menu.fixed .menu_up_li {
                display:inline-block;
                float:right;
                padding-top:14px;
            }
            #block_top_menu.fixed .menu_up {
                display:inline-block;
            }


            @media (max-width:991px) {
                #block_top_menu.fixed .menu_up_li {
                    display:none;
                }
                #block_top_menu.fixed .menu_up {
                    display:none;
                }
            }
            #block_top_menu.fixed .sf-menu > li > a.menuhomelink {
                -webkit-border-radius: 0!important;
                -moz-border-radius: 0!important;
                -ms-border-radius: 0!important;
                -o-border-radius: 0!important;
                border-radius: 0!important;
            }
            .animatedfast {
                -webkit-animation-duration: 0.5s;
                animation-duration: 0.5s;
                -webkit-animation-fill-mode: both;
                animation-fill-mode: both;
            }
            ';
        }

        if (Configuration::get('NC_M_MODE') =="1") {
            $css .= '
            #FINALmenu { display:none!important; }
            .topmenu_container { display:none; }
            ';
        }
        if (Configuration::get('NC_M_MODE') =="2") {
            $css .= '
            .sf-contener { display:none!important; }
			';
        }
        if (Configuration::get('NC_M_CHEV') ==1) {
            $css .= '
            #FINALmenu .show-items-icon { display:none!important; }
			';
        }
        if (Configuration::get('NC_M_BT')) {
            $css .= '
            .sf-contener, #FINALmenu {
                border-top-width: ' . Configuration::get('NC_M_BT') . 'px !important; }
            ';
        }
        if (Configuration::get('NC_M_BR')) {
            $css .= '
            .sf-contener, #FINALmenu {
                border-right-width: ' . Configuration::get('NC_M_BR') . 'px !important; }
            ';
        }
        if (Configuration::get('NC_M_BB')) {
            $css .= '
            .sf-contener, #FINALmenu {
                border-bottom-width: ' . Configuration::get('NC_M_BB') . 'px !important; }
            ';
        }
        if (Configuration::get('NC_M_BL')) {
            $css .= '
            .sf-contener, #FINALmenu {
                border-left-width: ' . Configuration::get('NC_M_BL') . 'px !important; }
            ';
        }
        if (Configuration::get('NC_M_RADIUS')) {
            $css .= '
            .sf-contener, #FINALmenu,
            #FINALmenu-desktop-nav .FINALmenu-tab-content,
            #FINALmenu-vertical .FINALmenu-tab-content,
            #FINALmenu-desktop-nav .FINALmenu-simple-tab .FINALmenu-tab-content ul,
            #FINALmenu-vertical .FINALmenu-simple-tab .FINALmenu-tab-content ul,
            #FINALmenu-vertical #FINALmenu-vertical-nav .hidden-categories, #FINALmenu #FINALmenu-desktop-nav .hidden-categories {
                -webkit-border-radius: ' . Configuration::get('NC_M_RADIUS') . 'px !important;
                -moz-border-radius: ' . Configuration::get('NC_M_RADIUS') . 'px !important;
                border-radius: ' . Configuration::get('NC_M_RADIUS') . 'px !important; }
            .sf-menu > li > a.menuhomelink,
            #FINALmenu #FINALmenu-desktop-nav > li:first-child {
                -webkit-border-radius: ' . Configuration::get('NC_M_RADIUS') . 'px 0 0 ' . Configuration::get('NC_M_RADIUS') . 'px !important;
                -moz-border-radius: ' . Configuration::get('NC_M_RADIUS') . 'px 0 0 ' . Configuration::get('NC_M_RADIUS') . 'px !important;
                border-radius: ' . Configuration::get('NC_M_RADIUS') . 'px 0 0 ' . Configuration::get('NC_M_RADIUS') . 'px !important; }
            #FINALmenu #FINALmenu-desktop-nav > li.right-tabs.first {
                -webkit-border-radius: 0 ' . Configuration::get('NC_M_RADIUS') . 'px ' . Configuration::get('NC_M_RADIUS') . 'px 0 !important;
                -moz-border-radius: 0 ' . Configuration::get('NC_M_RADIUS') . 'px ' . Configuration::get('NC_M_RADIUS') . 'px 0 !important;
                border-radius: 0 ' . Configuration::get('NC_M_RADIUS') . 'px ' . Configuration::get('NC_M_RADIUS') . 'px 0 !important; }
            #FINALmenu.sticky_menu,
            #FINALmenu.sticky_menu #FINALmenu-desktop-nav > li:first-child,
            #FINALmenu.sticky_menu #FINALmenu-desktop-nav > li.right-tabs.first {
                -webkit-border-radius: 0 !important;
                -moz-border-radius: 0 !important;
                border-radius: 0 !important; }
            ';
        }
        if (Configuration::get('NC_M_NOTE')) {
            $css .= '
            body #FINALmenu .container #FINALmenu-desktop-nav > li:hover div.top-link-wrapper span.tab-note, body #FINALmenu #FINALmenu-desktop-nav > li .top-link-wrapper .tab-note { color: ' . Configuration::get('NC_M_NOTE') . ' !important; }
            ';
        }
        if (Configuration::get('NC_M_ICON')) {
            $css .= '
            #FINALmenu #FINALmenu-desktop-nav .top-link-wrapper i { color: ' . Configuration::get('NC_M_ICON') . ' !important; }
            ';
        }

        if (Configuration::get('NC_MV_BG')) {
            $css .= '
            #FINALmenu-vertical #FINALmenu-vertical-nav > li { background: ' . Configuration::get('NC_MV_BG') . ' !important; }
            ';
        }
        if (Configuration::get('NC_MV_COLOR')) {
            $css .= '
            #FINALmenu-vertical .top-link-wrapper a, #FINALmenu-vertical .top-link-wrapper span { color: ' . Configuration::get('NC_MV_COLOR') . ' !important; }
            ';
        }
        if (Configuration::get('NC_MV_COLOR')) {
            $css .= '
            #FINALmenu-vertical .top-link-wrapper a, #FINALmenu-vertical .top-link-wrapper span { color: ' . Configuration::get('NC_MV_COLOR') . ' !important; }
            ';
        }
        if (Configuration::get('NC_MV_ICON')) {
            $css .= '
            #FINALmenu-vertical .top-link-wrapper i { color: ' . Configuration::get('NC_MV_ICON') . ' !important; }
            ';
        }
        if (Configuration::get('NC_MV_BG_HOVER')) {
            $css .= '
            #FINALmenu-vertical #FINALmenu-vertical-nav > li:hover { background: ' . Configuration::get('NC_MV_BG_HOVER') . ' !important; }
            ';
        }
        if (Configuration::get('NC_MV_HOVER')) {
            $css .= '
            #FINALmenu-vertical #FINALmenu-vertical-nav > li:hover .top-link-wrapper i, #FINALmenu-vertical #FINALmenu-vertical-nav > li:hover .top-link-wrapper a, #FINALmenu-vertical #FINALmenu-vertical-nav > li:hover .top-link-wrapper span { color: ' . Configuration::get('NC_MV_HOVER') . ' !important; }
            ';
        }
        if (Configuration::get('NC_MV_TAB')) {
            $css .= '
            #FINALmenu-vertical-nav > li .tab-note { color: ' . Configuration::get('NC_MV_TAB') . ' !important; }
            body #FINALmenu-vertical #FINALmenu-vertical-nav > li:hover .top-link-wrapper .tab-note { color: ' . Configuration::get('NC_MV_TAB') . ' !important; }
            ';
        }
        if (Configuration::get('NC_MV_BOR')) {
            $css .= '
            #FINALmenu-vertical-nav .top-link-wrapper > .top-level-link:before { background: ' . Configuration::get('NC_MV_BOR') . ' !important; }
            #FINALmenu-vertical { border-color: ' . Configuration::get('NC_MV_BOR') . ' !important; }
            ';
        }


        if (Configuration::get('RTC_MENU_LINE_BG')) {
            $css .= '
            .sf-contener { background-color: ' . Configuration::get('RTC_MENU_LINE_BG') . ' !important }
            @media (max-width: 767px) {
                .cat-title { background-color: ' . Configuration::get('RTC_MENU_LINE_BG') . ' !important } }
            #FINALmenu { background-color: ' . Configuration::get('RTC_MENU_LINE_BG') . ' !important }
            ';
        }
        if (Configuration::get('RTC_MENU_LINE_BORDER')) {
            $css .= '
            .sf-contener { border-color: ' . Configuration::get('RTC_MENU_LINE_BORDER') . ' !important }
            @media (max-width: 767px) {
                .cat-title { border-color: ' . Configuration::get('RTC_MENU_LINE_BORDER') . ' !important } }
            #FINALmenu { border-style:solid; }
            #FINALmenu { border-color: ' . Configuration::get('RTC_MENU_LINE_BORDER') . ' !important }
            ';
        }

        if (Configuration::get('RTC_MENU_LINK_BG_COLOR')) {
            $css .= '.sf-menu > li > a { background-color: ' . Configuration::get('RTC_MENU_LINK_BG_COLOR') . ' !important; }
            #FINALmenu #FINALmenu-desktop-nav > li { background-color: ' . Configuration::get('RTC_MENU_LINK_BG_COLOR') . '; }
            ';
        }

        if (Configuration::get('RTC_MENU_LINK_BG_HOVER')) {
            $css .= '.sf-menu > li.sfHover > a, .sf-menu > li > a:hover { background-color: ' . Configuration::get('RTC_MENU_LINK_BG_HOVER') . ' !important; }
            #FINALmenu #FINALmenu-desktop-nav > li:hover { background-color: ' . Configuration::get('RTC_MENU_LINK_BG_HOVER') . ' !important; }
            ';
        }
        if (Configuration::get('RTC_MENU_LINK_BG_ACTIVE')) {
            $css .= '.sf-menu > li.sfHoverForce > a { background-color: ' . Configuration::get('RTC_MENU_LINK_BG_ACTIVE') . ' !important; }
            ';
        }

        if (Configuration::get('RTC_MENU_LINK_BORDER_COLOR')) {
            $css .= '
            .sf-menu > li > a { border-color: ' . Configuration::get('RTC_MENU_LINK_BORDER_COLOR') . ' !important; }
            .sf-menu > li.sfHover > a { border-color: ' . Configuration::get('RTC_MENU_LINK_BORDER_COLOR') . ' !important; }
            ';
        }

        if (Configuration::get('RTC_MENU_LINK_BORDER_HOVER')) {
            $css .= '
            .sf-menu > li.sfHover > a { border-color: ' . Configuration::get('RTC_MENU_LINK_BORDER_HOVER') . ' !important; }
            .sf-menu > li > a:hover { border-color: ' . Configuration::get('RTC_MENU_LINK_BORDER_HOVER') . ' !important; }
            ';
        }
        if (Configuration::get('RTC_MENU_LINK_BORDER_ACTIVE')) {
            $css .= '
            .sf-menu > li.sfHoverForce > a { border-color: ' . Configuration::get('RTC_MENU_LINK_BORDER_ACTIVE') . ' !important; }
            .sf-menu > li.sfHoverForce > a:hover { border-color: ' . Configuration::get('RTC_MENU_LINK_BORDER_ACTIVE') . ' !important; }
            ';
        }

        if (Configuration::get('RTC_MENU_LINK_COLOR')) {
            $css .= '
            .sf-menu > li > a { color: ' . Configuration::get('RTC_MENU_LINK_COLOR') . ' !important; }
            @media (max-width: 767px) {
                .cat-title { color: ' . Configuration::get('RTC_MENU_LINK_COLOR') . ' !important } }
            @media (max-width: 767px) {
                .sf-menu > li span:after { color: ' . Configuration::get('RTC_MENU_LINK_COLOR') . ' !important } }
            #FINALmenu #FINALmenu-desktop-nav > li { color: ' . Configuration::get('RTC_MENU_LINK_COLOR') . ' !important; }
            #FINALmenu #FINALmenu-desktop-nav > li > a { color: ' . Configuration::get('RTC_MENU_LINK_COLOR') . ' !important; }
            #FINALmenu #FINALmenu-desktop-nav .top-link-wrapper a, #FINALmenu #FINALmenu-desktop-nav .top-link-wrapper span { color: ' . Configuration::get('RTC_MENU_LINK_COLOR') . ' !important; }
            #FINALmenu #FINALmenu-desktop-nav .top-link-wrapper i.show-items-icon { color: ' . Configuration::get('RTC_MENU_LINK_COLOR') . ' !important; }
			';
        }

        if (Configuration::get('RTC_MENU_HOVER_COLOR')) {
            $css .= '.sf-menu > li.sfHover > a, .sf-menu > li > a:hover { color: ' . Configuration::get('RTC_MENU_HOVER_COLOR') . ' !important; }
            @media (max-width: 767px) {
                .sf-menu > li.sfHover span:after { color: ' . Configuration::get('RTC_MENU_LINK_COLOR') . ' !important }
                .sf-menu > li:hover span:after { color: ' . Configuration::get('RTC_MENU_LINK_COLOR') . ' !important } }
                #FINALmenu #FINALmenu-desktop-nav > li:hover { color: ' . Configuration::get('RTC_MENU_LINK_COLOR') . ' !important }
                #FINALmenu #FINALmenu-desktop-nav > li:hover > a { color: ' . Configuration::get('RTC_MENU_LINK_COLOR') . ' !important }
                #FINALmenu #FINALmenu-desktop-nav > li:hover .top-link-wrapper a, #FINALmenu #FINALmenu-desktop-nav > li:hover .top-link-wrapper span { color: ' . Configuration::get('RTC_MENU_LINK_COLOR') . ' !important }
            ';
        }
        if (Configuration::get('RTC_MENU_LINK_ACTIVE')) {
            $css .= '.sf-menu > li.sfHoverForce > a { color: ' . Configuration::get('RTC_MENU_LINK_ACTIVE') . ' !important; }
            @media (max-width: 767px) {
                .sf-menu > li.sfHoverForce span:after { color: ' . Configuration::get('RTC_MENU_LINK_COLOR') . ' !important } }
            ';
        }


        if (Configuration::get('RTC_MENU_IMG_EXT')) {

            if (Shop::getContext() == Shop::CONTEXT_SHOP)
                $adv_imgname = 'icons-home'.'-'.(int)$this->context->shop->getContextShopID();

            $css .= '
			.sf-menu > li > a.menuhomelink:before {	background-image: url(../upload/'. $adv_imgname.'.' . Configuration::get('RTC_MENU_IMG_EXT') . ') !important; }';
        }
        if (Configuration::get('RTC_SUBMENU_BG_COLOR')) {
            $css .= '
			.sf-menu li ul.submenu-container { background-color: ' . Configuration::get('RTC_SUBMENU_BG_COLOR') . ' !important; }
            .sf-menu li ul.menu-mobile { background-color: ' . Configuration::get('RTC_SUBMENU_BG_COLOR') . ' !important; }
            #FINALmenu-desktop-nav .FINALmenu-simple-tab ul { background-color: ' . Configuration::get('RTC_SUBMENU_BG_COLOR') . ' !important; }
			';
        }
        if (Configuration::get('RTC_SUBMENU_SHADOW') ==1) {
            $css .= '
			.sf-menu li ul.submenu-container,
			.FINALmenu-tab-content {
			-webkit-box-shadow: rgba(0, 0, 0, 0.2) 0px 5px 13px !important;
            -moz-box-shadow: rgba(0, 0, 0, 0.2) 0px 5px 13px !important;
            box-shadow: rgba(0, 0, 0, 0.2) 0px 5px 13px !important; }
            @media (max-width:767px) {
            ul.sf-menu {
			-webkit-box-shadow: rgba(0, 0, 0, 0.2) 0px 5px 13px !important;
            -moz-box-shadow: rgba(0, 0, 0, 0.2) 0px 5px 13px !important;
            box-shadow: rgba(0, 0, 0, 0.2) 0px 5px 13px !important; }
            }
			';
        }
        else {
            $css .= '
			.sf-menu li ul.submenu-container {
			-webkit-box-shadow: none !important;
            -moz-box-shadow: none !important;
            box-shadow: none !important; }
			';
        }

        if (Configuration::get('NC_ST_UP')) {
            $css .= '
			#block_top_menu.fixed .menu_up span:before { color: ' . Configuration::get('NC_ST_UP') . ' !important; }';
        }
        if (Configuration::get('NC_ST_UP_BG')) {
            $css .= '
			#block_top_menu.fixed .menu_up span { background-color: ' . Configuration::get('NC_ST_UP_BG') . ' !important; }';
        }
        if (Configuration::get('NC_ST_UP_BORDER')) {
            $css .= '
			#block_top_menu.fixed .menu_up span { border-color: ' . Configuration::get('NC_ST_UP_BORDER') . ' !important; }';
        }

        if (Configuration::get('RTC_SUBMENU_LINK_COLOR')) {
            $css .= '
			.sf-menu ul a, .sf-menu ul a:visited { color: ' . Configuration::get('RTC_SUBMENU_LINK_COLOR') . ' !important; }
            #FINALmenu-desktop-nav .FINALmenu-simple-tab a { color: ' . Configuration::get('RTC_SUBMENU_LINK_COLOR') . ' !important; }
            ';
        }
        if (Configuration::get('RTC_SUBMENU_HOVER_COLOR')) {
            $css .= '
			.sf-menu > li > ul > li > a:hover, .sf-menu li li li a:hover {	color: ' . Configuration::get('RTC_SUBMENU_HOVER_COLOR') . ' !important; }
            #FINALmenu-desktop-nav .FINALmenu-simple-tab a:hover { color: ' . Configuration::get('RTC_SUBMENU_HOVER_COLOR') . ' !important; }
            ';
        }

        if (Configuration::get('RTC_SUBMENU_BEFORE_LINE')) {
            $css .= '
			.sf-menu li li li a:before,
			#FINALmenu-vertical .cms-pages a:before, #FINALmenu-vertical .categories a:before, #FINALmenu-vertical .suppliers a:before, #FINALmenu-vertical .manufacturers a:before, #FINALmenu-vertical .suppliers span:before, #FINALmenu-vertical .manufacturers span:before, #FINALmenu .cms-pages a:before, #FINALmenu .categories a:before, #FINALmenu .suppliers a:before, #FINALmenu .manufacturers a:before, #FINALmenu .suppliers span:before, #FINALmenu .manufacturers span:before { color: ' . Configuration::get('RTC_SUBMENU_BEFORE_LINE') . ' !important; }
			#FINALmenu-vertical .FINALmenu-tab-content .second-level-item .show-items-icon, #FINALmenu .FINALmenu-tab-content .second-level-item .show-items-icon { color: ' . Configuration::get('RTC_SUBMENU_BEFORE_LINE') . ' !important; }
			';
        }

        if (Configuration::get('RTC_SUBMENU_BORDER_TOP')) {
            $css .= '
			.sf-menu li ul.submenu-container:before { border-color: ' . Configuration::get('RTC_SUBMENU_BORDER_TOP') . ' !important; }
			#FINALmenu-desktop-nav .FINALmenu-advance-tab .FINALmenu-tab-content { border-color: ' . Configuration::get('RTC_SUBMENU_BORDER_TOP') . ' !important; }
			#FINALmenu-desktop-nav .FINALmenu-simple-tab .FINALmenu-tab-content ul { border-color: ' . Configuration::get('RTC_SUBMENU_BORDER_TOP') . ' !important; }
			#FINALmenu-vertical .FINALmenu-advance-tab .FINALmenu-tab-content { border-color: ' . Configuration::get('RTC_SUBMENU_BORDER_TOP') . ' !important; }
			#FINALmenu-vertical .FINALmenu-simple-tab .FINALmenu-tab-content ul { border-color: ' . Configuration::get('RTC_SUBMENU_BORDER_TOP') . ' !important; }
			.FINALmenu-simple-tab ul li a:after, #FINALmenu-vertical #FINALmenu-vertical-nav ul li a:after { background: ' . Configuration::get('RTC_SUBMENU_BORDER_TOP') . ' !important; }
			';
        }

        if (Configuration::get('RTC_SEARCH_BOX_BG')) {
            $css .= '
            #search_block_top #searchbox { background: ' . Configuration::get('RTC_SEARCH_BOX_BG') . ' !important; }
			';
        }
        if (Configuration::get('RTC_SEARCH_BORDER')) {
            $css .= '
			#search_block_top #searchbox { border-color: ' . Configuration::get('RTC_SEARCH_BORDER') . ' !important; }
			';
        }
        if (Configuration::get('NC_SEARCH_BORDER_BUT')) {
            $css .= '
			#search_block_top .btn.button-search { border-color: ' . Configuration::get('NC_SEARCH_BORDER_BUT') . ' !important; }
			';
        }
        if (Configuration::get('RTC_SEARCH_INPUT_COLOR')) {
            $css .= '
			#search_block_top #searchbox input { color: ' . Configuration::get('RTC_SEARCH_INPUT_COLOR') . ' !important; }
			';
        }
        if (Configuration::get('RTC_SEARCH_BUTTON')) {
            $css .= '
			#search_block_top .btn.button-search { background-color: ' . Configuration::get('RTC_SEARCH_BUTTON') . ' !important; }
			';
        }
        if (Configuration::get('RTC_S_LENS_EXT')) {

            if (Shop::getContext() == Shop::CONTEXT_SHOP)
                $adv_imgname = 'icons-lens'.'-'.(int)$this->context->shop->getContextShopID();

            $css .= '
            #search_block_top .btn.button-search span { background-image: url(../upload/'.$adv_imgname.'.' . Configuration::get('RTC_S_LENS_EXT') . ') !important;}
            .pb-left-column #image-block #view_full_size .span_link { background-image: url(../upload/'.$adv_imgname.'.' . Configuration::get('RTC_S_LENS_EXT') . ') !important;}
            #sdssearch_block_top .btn.button-search { background-image: url(../upload/'.$adv_imgname.'.' . Configuration::get('RTC_S_LENS_EXT') . ') !important;}
            ';
        }
        if (Configuration::get('RTC_SEARCH_POPUP_BG')) {
            $css .= '
			.ac_results { background-color: ' . Configuration::get('RTC_SEARCH_POPUP_BG') . ' !important; }
			';
        }
        if (Configuration::get('RTC_SEARCH_POPUP_BORDER')) {
            $css .= '
			.ac_results { border-color: ' . Configuration::get('RTC_SEARCH_POPUP_BORDER') . ' !important; }
			';
        }

        if (Configuration::get('RTC_SEARCH_SHADOW') ==1) {
            $css .= '
			.ac_results {
			-webkit-box-shadow: rgba(0, 0, 0, 0.2) 0px 7px 11px !important;
            -moz-box-shadow: rgba(0, 0, 0, 0.2) 0px 7px 11px !important;
            box-shadow: rgba(0, 0, 0, 0.2) 0px 7px 11px !important; }
			';
        }
        else {
            $css .= '
			.ac_results {
			-webkit-box-shadow: none !important;
            -moz-box-shadow: none !important;
            box-shadow: none !important; }
			';
        }
        if (Configuration::get('RTC_SEARCH_ITEM_BG')) {
            $css .= '
			.ac_results li { background-color: ' . Configuration::get('RTC_SEARCH_ITEM_BG') . ' !important; }
			';
        }
        if (Configuration::get('RTC_SEARCH_ITEM_BG_HOVER')) {
            $css .= '
			.ac_results li:hover, .ac_results li.ac_over { background-color: ' . Configuration::get('RTC_SEARCH_ITEM_BG_HOVER') . ' !important; }
			';
        }

// ****************  PAGE ELEMENTS styles start

        if (Configuration::get('RTC_BREADCRUMB') == 0) {
            $css .= '
            .breadcrumb {
            display: none !important; }
            .columns-container-top {
            padding-bottom:15px; }
			';
        }
        if (Configuration::get('RTC_B_TEXT')) {
            $css .= '
			.breadcrumb { color: ' . Configuration::get('RTC_B_TEXT') . ' }
			';
        }
        if (Configuration::get('RTC_B_LINK')) {
            $css .= '
			.breadcrumb a { color: ' . Configuration::get('RTC_B_LINK') . ' }
			';
        }
        if (Configuration::get('RTC_B_LINK_HOVER')) {
            $css .= '
			.breadcrumb a:hover { color: ' . Configuration::get('RTC_B_LINK_HOVER') . ' }
			';
        }
        if (Configuration::get('RTC_B_SEPARATOR')) {
            $css .= '
			.breadcrumb a:after { color: ' . Configuration::get('RTC_B_SEPARATOR') . ' }
			';
        }
        if (Configuration::get('RTC_B_EXT')) {

            if (Shop::getContext() == Shop::CONTEXT_SHOP)
                $adv_imgname = 'bread_home'.'-'.(int)$this->context->shop->getContextShopID();

            $css .= '
            .breadcrumb a.home span.bread_home { background-image: url(../upload/'.$adv_imgname.'.' . Configuration::get('RTC_B_EXT') . ') !important;}
            ';
        }

        if (Configuration::get('RTC_SIDEBAR_TITLE_BG')) {
            $css .= '
			.block .title_block, .block h4 { background-color: ' . Configuration::get('RTC_SIDEBAR_TITLE_BG') . ' }
			.hfeatured .home_products_title i { background-color: ' . Configuration::get('RTC_SIDEBAR_TITLE_BG') . ' }
			.hbest .home_products_title i { background-color: ' . Configuration::get('RTC_SIDEBAR_TITLE_BG') . ' }
			.hnew .home_products_title i { background-color: ' . Configuration::get('RTC_SIDEBAR_TITLE_BG') . ' }
			.hspecials .home_products_title i { background-color: ' . Configuration::get('RTC_SIDEBAR_TITLE_BG') . ' }
			';
        }
        if (Configuration::get('RTC_SIDEBAR_TITLE_BORDER')) {
            $css .= '
			.block .title_block, .block h4 { border-color: ' . Configuration::get('RTC_SIDEBAR_TITLE_BORDER') . ' }
			.home_products_title i { border-color: ' . Configuration::get('RTC_SIDEBAR_TITLE_BORDER') . ' }
			';
        }
        if (Configuration::get('RTC_SIDEBAR_TITLE_COLOR')) {
            $css .= '
			.block .title_block, .block h4 { color: ' . Configuration::get('RTC_SIDEBAR_TITLE_COLOR') . ' }
			';
        }
        if (Configuration::get('RTC_SIDEBAR_TITLE_LINK')) {
            $css .= '
			.block .title_block a, .block h4 a { color: ' . Configuration::get('RTC_SIDEBAR_TITLE_LINK') . ' }
			';
        }
        if (Configuration::get('RTC_SIDEBAR_TITLE_LINK_HOVER')) {
            $css .= '
			.block .title_block a:hover, .block h4 a:hover { color: ' . Configuration::get('RTC_SIDEBAR_TITLE_LINK_HOVER') . ' }
			';
        }

        if (Configuration::get('RTC_SIDEBAR_BLOCK_CONTENT_BG')) {
            $css .= '
			.block .block_content { background-color: ' . Configuration::get('RTC_SIDEBAR_BLOCK_CONTENT_BG') . ' }
			';
        }
        if (Configuration::get('RTC_SIDEBAR_BLOCK_CONTENT_BORDER')) {
            $css .= '
			.block .block_content { border-color: ' . Configuration::get('RTC_SIDEBAR_BLOCK_CONTENT_BORDER') . ' }
			';
        }
        if (Configuration::get('RTC_SIDEBAR_BLOCK_TEXT_COLOR')) {
            $css .= '
			.block .block_content { color: ' . Configuration::get('RTC_SIDEBAR_BLOCK_TEXT_COLOR') . ' }
			';
        }
        if (Configuration::get('RTC_SIDEBAR_BLOCK_LINK')) {
            $css .= '
			.block .block_content a  { color: ' . Configuration::get('RTC_SIDEBAR_BLOCK_LINK') . ' }
			';
        }
        if (Configuration::get('RTC_SIDEBAR_BLOCK_LINK_HOVER')) {
            $css .= '
			.block .block_content a:hover { color: ' . Configuration::get('RTC_SIDEBAR_BLOCK_LINK_HOVER') . ' }
			';
        }
        if (Configuration::get('RTC_SIDEBAR_BUTTON_BG')) {
            $css .= '
			.block .block_content a.button-small { background-color: ' . Configuration::get('RTC_SIDEBAR_BUTTON_BG') . ' }
			';
        }
        if (Configuration::get('RTC_SIDEBAR_BUTTON_BORDER')) {
            $css .= '
			.block .block_content a.button-small { border-color: ' . Configuration::get('RTC_SIDEBAR_BUTTON_BORDER') . ' }
			';
        }
        if (Configuration::get('RTC_SIDEBAR_BUTTON_COLOR')) {
            $css .= '
			.block .block_content a.button-small  { color: ' . Configuration::get('RTC_SIDEBAR_BUTTON_COLOR') . ' }
			';
        }
        if (Configuration::get('RTC_SIDEBAR_ITEM_SEPARATOR')) {
            $css .= '
			.block .products-block li, .block .products-block .products_item  { border-color: ' . Configuration::get('RTC_SIDEBAR_ITEM_SEPARATOR') . ' }
			';
        }
        if (Configuration::get('RTC_SIDEBAR_PRODUCT_IMG_BORDER')) {
            $css .= '
			.block .products-block .products-block-image { border-color: ' . Configuration::get('RTC_SIDEBAR_PRODUCT_IMG_BORDER') . ' }
			';
        }

        if (Configuration::get('RTC_SIDEBAR_CATEGORIES_ITEM')) {
            $css .= '
			#categories_block_left li a, #categories_block_left li li a { color: ' . Configuration::get('RTC_SIDEBAR_CATEGORIES_ITEM') . ' }
			';
        }
        if (Configuration::get('RTC_SIDEBAR_CATEGORIES_ITEM_HOVER')) {
            $css .= '
			#categories_block_left li li a:hover { color: ' . Configuration::get('RTC_SIDEBAR_CATEGORIES_ITEM_HOVER') . ' }
			#categories_block_left li span.grower:hover + a, #categories_block_left li a:hover, #categories_block_left li a.selected { color: ' . Configuration::get('RTC_SIDEBAR_CATEGORIES_ITEM_HOVER') . ' }
			';
        }
        if (Configuration::get('RTC_SIDEBAR_CATEGORIES_SEPARATOR')) {
            $css .= '
			#categories_block_left li a:before { background-color: ' . Configuration::get('RTC_SIDEBAR_CATEGORIES_SEPARATOR') . ' }
			';
        }

        if (Configuration::get('RTC_CMS_TITLE')) {
            $css .= '
			#cms #center_column h1 { color: ' . Configuration::get('RTC_CMS_TITLE') . ' }
			';
        }
        if (Configuration::get('RTC_CMS_TITLE_BORDER')) {
            $css .= '
			#cms #center_column h1:before, #cms #center_column h2:before { background-color: ' . Configuration::get('RTC_CMS_TITLE_BORDER') . ' }
			div.home_products_title:before { background-color: ' . Configuration::get('RTC_CMS_TITLE_BORDER') . ' }
			.brandstitle:before { background-color: ' . Configuration::get('RTC_CMS_TITLE_BORDER') . ' }
			#index .newsblock h4:before { background-color: ' . Configuration::get('RTC_CMS_TITLE_BORDER') . ' }
			.news_p_more { border-color: ' . Configuration::get('RTC_CMS_TITLE_BORDER') . ' }
			.pb-center-column h1 { border-color: ' . Configuration::get('RTC_CMS_TITLE_BORDER') . ' }
			.page-heading:before { border-color: ' . Configuration::get('RTC_CMS_TITLE_BORDER') . ' }
			.footer-wrapper #footer h4 { border-color: ' . Configuration::get('RTC_CMS_TITLE_BORDER') . ' }
			';
        }
        if (Configuration::get('RTC_CMS_TITLE_BORDER_MARK')) {
            $css .= '
			.footer-wrapper #footer h4:before { background-color: ' . Configuration::get('RTC_CMS_TITLE_BORDER_MARK') . ' }
			.brandstitle span:before { background-color: ' . Configuration::get('RTC_CMS_TITLE_BORDER_MARK') . ' }
			.home_products_title span:after { background-color: ' . Configuration::get('RTC_CMS_TITLE_BORDER_MARK') . ' }
			#cms #center_column h1:after, #cms #center_column h2:after { background-color: ' . Configuration::get('RTC_CMS_TITLE_BORDER_MARK') . ' }
			.page-heading:after { background-color: ' . Configuration::get('RTC_CMS_TITLE_BORDER_MARK') . ' }
			';
        }

        if (Configuration::get('RTC_PAGE_TEXT_COLOR')) {
            $css .= '
			#page .rte { color: ' . Configuration::get('RTC_PAGE_TEXT_COLOR') . ' }
			';
        }
        if (Configuration::get('RTC_PAGE_HEADINGS')) {
            $css .= '
			#cms #center_column h2 { color: ' . Configuration::get('RTC_PAGE_HEADINGS') . ' }
			#cms #center_column h3 { color: ' . Configuration::get('RTC_PAGE_HEADINGS') . ' }
			';
        }
        if (Configuration::get('RTC_PAGE_LINK')) {
            $css .= '
			#page .rte a { color: ' . Configuration::get('RTC_PAGE_LINK') . ' }
			';
        }
        if (Configuration::get('RTC_PAGE_LINK_HOVER')) {
            $css .= '
			#page .rte a:hover { color: ' . Configuration::get('RTC_PAGE_LINK_HOVER') . ' }
			';
        }
        if (Configuration::get('RTC_CONTACT_FORM_BG')) {
            $css .= '
			.contact-form-box fieldset { background-color: ' . Configuration::get('RTC_CONTACT_FORM_BG') . ' }
			';
        }
        if (Configuration::get('RTC_CONTACT_FORM_BORDER')) {
            $css .= '
			.contact-form-box fieldset { border-color: ' . Configuration::get('RTC_CONTACT_FORM_BORDER') . ' }
			';
        }
        if (Configuration::get('RTC_WARNING_MESSAGE_BG')) {
            $css .= '
			.alert-warning { background-color: ' . Configuration::get('RTC_WARNING_MESSAGE_BG') . ' }
			';
        }
        if (Configuration::get('RTC_WARNING_MESSAGE_COLOR')) {
            $css .= '
			.alert-warning { color: ' . Configuration::get('RTC_WARNING_MESSAGE_COLOR') . ' }
			';
        }
        if (Configuration::get('RTC_SUCCESS_MESSAGE_BG')) {
            $css .= '
			.success-warning { background-color: ' . Configuration::get('RTC_SUCCESS_MESSAGE_BG') . ' }
			';
        }
        if (Configuration::get('RTC_SUCCESS_MESSAGE_COLOR')) {
            $css .= '
			.success-warning { color: ' . Configuration::get('RTC_SUCCESS_MESSAGE_COLOR') . ' }
			';
        }
        if (Configuration::get('RTC_INFO_MESSAGE_BG')) {
            $css .= '
			.info-warning { background-color: ' . Configuration::get('RTC_INFO_MESSAGE_BG') . ' }
			';
        }
        if (Configuration::get('RTC_INFO_MESSAGE_COLOR')) {
            $css .= '
			.info-warning { color: ' . Configuration::get('RTC_INFO_MESSAGE_COLOR') . ' }
			';
        }
        if (Configuration::get('RTC_DANGER_MESSAGE_BG')) {
            $css .= '
			.danger-warning { background-color: ' . Configuration::get('RTC_DANGER_MESSAGE_BG') . ' }
			';
        }
        if (Configuration::get('RTC_DANGER_MESSAGE_COLOR')) {
            $css .= '
			.danger-warning { color: ' . Configuration::get('RTC_DANGER_MESSAGE_COLOR') . ' }
			';
        }


// ****************  PRODUCT LIST styles start

        if (Configuration::get('NC_PRODUCT_SWITCH') =="1") {
            $css .= '
			@media (min-width:992px) {
			ul.product_list.grid li.first-in-line {
				clear:left;
			}
			#index ul.product_list.grid li.first-in-line {
				clear:none;
			} }

			@media (min-width:480px) and (max-width:991px) {
			ul.product_list.grid li.first-item-of-tablet-line {
				clear:left;
			}
			#index ul.product_list.grid li.first-item-of-tablet-line {
				clear:none;
			} }
            ';
        }		
        if (Configuration::get('NC_PRODUCT_SWITCH') =="2") {
            $css .= '
			@media (min-width:992px) {
			ul.product_list.grid li {
				width:25%;
			}
			ul.product_list .functional-buttons div.compare a:before,
			ul.product_list .functional-buttons div.wishlist a:before {
				display:none!important;
			}
			ul.product_list.grid li:nth-child(4n+1) {
				clear:left;
			}
			#index ul.product_list.grid li:nth-child(4n+1) {
				clear:none;
			} }

			@media (min-width:480px) and (max-width:991px) {
			ul.product_list.grid li.first-item-of-tablet-line {
				clear:left;
			}
			#index ul.product_list.grid li.first-item-of-tablet-line {
				clear:none;
			} }
            ';
        }		
        if (Configuration::get('NC_PRODUCT_SWITCH') =="3") {
            $css .= '
			@media (min-width:992px) {
			ul.product_list.grid li {
				width:20%;
			}
			ul.product_list .functional-buttons div.compare a:before,
			ul.product_list .functional-buttons div.wishlist a:before {
				display:none!important;
			}
			ul.product_list.grid li:nth-child(5n+1) {
				clear:left;
			}
			#index ul.product_list.grid li:nth-child(5n+1) {
				clear:none;
			} }

			@media (min-width:480px) and (max-width:991px) {
			ul.product_list.grid li.first-item-of-tablet-line {
				clear:left;
			}
			#index ul.product_list.grid li.first-item-of-tablet-line {
				clear:none;
			} }
            ';
        }
		
		
        if (Configuration::get('NC_CAT') == 0) {
            $css .= '
            .subcategoriestitle { display:none; }
            .content_scene_cat { display:none; }
			';
        }
        if (Configuration::get('NC_CAT') == 1) {
            $css .= '
            .subcategoriestitle { display:inline-block; }
            .content_scene_cat { display:block; }
			';
        }
        if (Configuration::get('NC_SUBCAT') == 1) {
            $css .= '
            #subcategories { display:inline-block; }
			';
        }
        if (Configuration::get('NC_SUBCAT') == 0) {
            $css .= '
            #subcategories { display:none; }
			';
        }
        if (Configuration::get('NC_SECOND_IMG') == 0) {
            $css .= '
            .product_list .product-image-container .second-img { display:none!important; }
			';
        }
        if (Configuration::get('RTC_PL_HEADING_COLOR')) {
            $css .= '
			.page-heading { color: ' . Configuration::get('RTC_PL_HEADING_COLOR') . ' }
			.page-heading span.lighter { color: ' . Configuration::get('RTC_PL_HEADING_COLOR') . ' }
			';
        }
        if (Configuration::get('RTC_PL_HEADING_TEXT')) {
            $css .= '
			.page-heading span.heading-counter { color: ' . Configuration::get('RTC_PL_HEADING_TEXT') . ' }
			';
        }
        if (Configuration::get('RTC_PL_NAV_TOP_BG')) {
            $css .= '
			.content_sortPagiBar .sortPagiBar { background-color: ' . Configuration::get('RTC_PL_NAV_TOP_BG') . ' }
			.bottom-pagination-content { background-color: ' . Configuration::get('RTC_PL_NAV_BOTTOM_BG') . ' }
			.module-smartblog-category .blog_pag { background-color: ' . Configuration::get('RTC_PL_NAV_BOTTOM_BG') . ' }
			.module-smartblog-category .blog_show { background-color: ' . Configuration::get('RTC_PL_NAV_BOTTOM_BG') . ' }
			';
        }
        if (Configuration::get('RTC_PL_NAV_TOP_BORDER')) {
            $css .= '
			.content_sortPagiBar .sortPagiBar { border-color: ' . Configuration::get('RTC_PL_NAV_TOP_BORDER') . ' }
			.top-pagination-content, .bottom-pagination-content { border-color: ' . Configuration::get('RTC_PL_NAV_TOP_BORDER') . ' }
			';
        }
        if (Configuration::get('RTC_PL_NAV_GRID')) {
            $css .= '
			.content_sortPagiBar .display li.selected, .content_sortPagiBar .display_m li.selected { background-color: ' . Configuration::get('RTC_PL_NAV_GRID') . ' }
			';
        }
        if (Configuration::get('RTC_PL_NAV_COMPARE_BORDER')) {
            $css .= '
			.content_sortPagiBar .sortPagiBar .compare-form { border-left-color: ' . Configuration::get('RTC_PL_NAV_COMPARE_BORDER') . ' }
			';
        }
        if (Configuration::get('RTC_PL_NAV_SORT')) {
            $css .= '
			.content_sortPagiBar .sortPagiBar label { color: ' . Configuration::get('RTC_PL_NAV_SORT') . ' }
			';
        }

        if (Configuration::get('RTC_PL_NUMBER_BG')) {
            $css .= '
			.top-pagination-content ul.pagination li > a span, .top-pagination-content ul.pagination li > span span, .bottom-pagination-content ul.pagination li > a span, .bottom-pagination-content ul.pagination li > span span { background-color: ' . Configuration::get('RTC_PL_NUMBER_BG') . ' }
			.module-smartblog-category .pagination > li > a { background-color: ' . Configuration::get('RTC_PL_NUMBER_BG') . ' }
			';
        }
        if (Configuration::get('RTC_PL_NUMBER_BG_HOVER')) {
            $css .= '
			.top-pagination-content ul.pagination li > a:hover span, .bottom-pagination-content ul.pagination li > a:hover span { background-color: ' . Configuration::get('RTC_PL_NUMBER_BG_HOVER') . ' }
			.module-smartblog-category .pagination > li > a:hover { background-color: ' . Configuration::get('RTC_PL_NUMBER_BG_HOVER') . ' }
			';
        }
        if (Configuration::get('RTC_PL_NUMBER_COLOR')) {
            $css .= '
			.top-pagination-content ul.pagination li > a span, .top-pagination-content ul.pagination li > span span, .bottom-pagination-content ul.pagination li > a span, .bottom-pagination-content ul.pagination li > span span { color: ' . Configuration::get('RTC_PL_NUMBER_COLOR') . ' }
			.module-smartblog-category .pagination > li > a { color: ' . Configuration::get('RTC_PL_NUMBER_COLOR') . ' }
			';
        }
        if (Configuration::get('RTC_PL_NUMBER_COLOR_HOVER')) {
            $css .= '
			.top-pagination-content ul.pagination li > a:hover span, .bottom-pagination-content ul.pagination li > a:hover span { color: ' . Configuration::get('RTC_PL_NUMBER_COLOR_HOVER') . ' }
			.module-smartblog-category .pagination > li > a:hover { color: ' . Configuration::get('RTC_PL_NUMBER_COLOR_HOVER') . ' }
			';
        }
        if (Configuration::get('RTC_PL_PAG_ACTIVE_BG')) {
            $css .= '
			.top-pagination-content ul.pagination li.active > span span, .bottom-pagination-content ul.pagination li.active > span span { background-color: ' . Configuration::get('RTC_PL_PAG_ACTIVE_BG') . ' }
			.module-smartblog-category .pagination > li > span { background-color: ' . Configuration::get('RTC_PL_PAG_ACTIVE_BG') . ' }
			';
        }
        if (Configuration::get('RTC_PL_PAG_ACTIVE_COLOR')) {
            $css .= '
			.top-pagination-content ul.pagination li.active > span span, .bottom-pagination-content ul.pagination li.active > span span { color: ' . Configuration::get('RTC_PL_PAG_ACTIVE_COLOR') . ' }
			.module-smartblog-category .pagination > li > span { color: ' . Configuration::get('RTC_PL_PAG_ACTIVE_COLOR') . ' }
			';
        }
        if (Configuration::get('RTC_PL_PAG_NAV_BG')) {
            $css .= '
			.top-pagination-content ul.pagination li.pagination_previous, .top-pagination-content ul.pagination li.pagination_next, .bottom-pagination-content ul.pagination li.pagination_previous, .bottom-pagination-content ul.pagination li.pagination_next { background-color: ' . Configuration::get('RTC_PL_PAG_NAV_BG') . ' }
			';
        }
        if (Configuration::get('RTC_PL_PAG_NAV_BG_HOVER')) {
            $css .= '
			.bottom-pagination-content ul.pagination li.pagination_previous:hover, .bottom-pagination-content ul.pagination li.pagination_next:hover { background-color: ' . Configuration::get('RTC_PL_PAG_NAV_BG_HOVER') . ' }
			';
        }
        if (Configuration::get('RTC_PL_PAG_NAV_COLOR')) {
            $css .= '
			.top-pagination-content ul.pagination li.pagination_previous > a, .top-pagination-content ul.pagination li.pagination_previous > span, .top-pagination-content ul.pagination li.pagination_next > a, .top-pagination-content ul.pagination li.pagination_next > span, .bottom-pagination-content ul.pagination li.pagination_previous > a, .bottom-pagination-content ul.pagination li.pagination_previous > span, .bottom-pagination-content ul.pagination li.pagination_next > a, .bottom-pagination-content ul.pagination li.pagination_next > span { color: ' . Configuration::get('RTC_PL_PAG_NAV_COLOR') . ' }
			';
        }
        if (Configuration::get('RTC_PL_PAG_NAV_COLOR_HOVER')) {
            $css .= '
			.bottom-pagination-content ul.pagination li.pagination_previous > a:hover, .bottom-pagination-content ul.pagination li.pagination_next > a:hover { color: ' . Configuration::get('RTC_PL_PAG_NAV_COLOR_HOVER') . ' }
			';
        }
        if (Configuration::get('RTC_PL_SHOW_PER_PAGE')) {
            $css .= '
			.bottom-pagination-content .nbrItemPage label { color: ' . Configuration::get('RTC_PL_SHOW_PER_PAGE') . ' }
			.bottom-pagination-content .nbrItemPage .clearfix > span { color: ' . Configuration::get('RTC_PL_SHOW_PER_PAGE') . ' }
			.post-page .results { color: ' . Configuration::get('RTC_PL_SHOW_PER_PAGE') . ' }
			';
        }
        if (Configuration::get('RTC_PL_SHOW_ITEMS')) {
            $css .= '
			.content_sortPagiBar .product-count, .content_sortPagiBar .product-count { color: ' . Configuration::get('RTC_PL_SHOW_ITEMS') . ' }
			';
        }

        if (Configuration::get('RTC_PL_FILTER_SEPARATOR')) {
            $css .= '
			.layered_filter { border-top-color: ' . Configuration::get('RTC_PL_FILTER_SEPARATOR') . ' }
			#layered_block_left #enabled_filters, #layered_url_filter_block { border-bottom-color: ' . Configuration::get('RTC_PL_FILTER_SEPARATOR') . ' }
			';
        }
        if (Configuration::get('RTC_PL_FILTER_RANGE')) {
            $css .= '
			.ui-slider-horizontal .ui-widget-header { background-color: ' . Configuration::get('RTC_PL_FILTER_RANGE') . ' }
			';
        }
        if (Configuration::get('RTC_PL_FILTER_RANGE_OUT')) {
            $css .= '
			.ui-slider-horizontal, .ui-slider-horizontal .ui-widget-content { background-color: ' . Configuration::get('RTC_PL_FILTER_RANGE_OUT') . ' }
			';
        }
        if (Configuration::get('RTC_PL_FILTER_HANDLE_BG')) {
            $css .= '
			#layered_block_left .ui-slider .ui-slider-handle { background-color: ' . Configuration::get('RTC_PL_FILTER_HANDLE_BG') . ' }
			';
        }
        if (Configuration::get('RTC_PL_FILTER_HANDLE_BORDER')) {
            $css .= '
			#layered_block_left .ui-slider .ui-slider-handle { border-color: ' . Configuration::get('RTC_PL_FILTER_HANDLE_BORDER') . ' }
			';
        }

        if (Configuration::get('RTC_PL_ITEM_BG')) {
            $css .= '
			ul.product_list.grid li .product-container { background-color: ' . Configuration::get('RTC_PL_ITEM_BG') . ' }
			.product_list .product-image-container .second-img { background-color: ' . Configuration::get('RTC_PL_ITEM_BG') . ' }
			';
        }
        if (Configuration::get('RTC_PL_ITEM_BORDER')) {
            $css .= '
			ul.product_list.grid li .product-container { border-color: ' . Configuration::get('RTC_PL_ITEM_BORDER') . ' }
			ul.product_list.list li .product-container { border-color: ' . Configuration::get('RTC_PL_ITEM_BORDER') . ' }
			';
        }
        if (Configuration::get('RTC_PL_PRODUCT_NAME')) {
            $css .= '
			.product-name { color: ' . Configuration::get('RTC_PL_PRODUCT_NAME') . ' }
			';
        }
        if (Configuration::get('RTC_PL_PRODUCT_NAME_HOVER')) {
            $css .= '
			ul.product_list.grid li.hovered h5 .product-name { color: ' . Configuration::get('RTC_PL_PRODUCT_NAME_HOVER') . ' }
			';
        }
        if (Configuration::get('RTC_PL_PRODUCT_NAME')) {
            $css .= '
			.product-name { color: ' . Configuration::get('RTC_PL_PRODUCT_NAME') . ' }
			';
        }
        if (Configuration::get('RTC_PL_PRODUCT_NAME_HOVER')) {
            $css .= '
			ul.product_list.grid li.hovered h5 .product-name { color: ' . Configuration::get('RTC_PL_PRODUCT_NAME_HOVER') . ' }
			@media (min-width:768px) and (max-width: 1199px) {
			ul.product_list.grid li:hover h5 .product-name { color: ' . Configuration::get('RTC_PL_PRODUCT_NAME_HOVER') . ' }
			ul.product_list.list li h5 a.product-name:hover { color: ' . Configuration::get('RTC_PL_PRODUCT_NAME_HOVER') . ' }
			}
			';
        }
        if (Configuration::get('RTC_PL_PRODUCT_PRICE')) {
            $css .= '
			.price { color: ' . Configuration::get('RTC_PL_PRODUCT_PRICE') . ' }
			.price.product-price { color: ' . Configuration::get('RTC_PL_PRODUCT_PRICE') . ' }
			';
        }
        if (Configuration::get('RTC_PL_PRODUCT_PRICE_HOVER')) {
            $css .= '
			ul.product_list.grid li.hovered .product-container .content_price span.price { color: ' . Configuration::get('RTC_PL_PRODUCT_PRICE_HOVER') . ' }
			@media (min-width:768px) and (max-width: 1199px) {
			ul.product_list.grid li:hover .product-container .content_price span.price { color: ' . Configuration::get('RTC_PL_PRODUCT_PRICE_HOVER') . ' }
			}
			';
        }
        if (Configuration::get('RTC_PL_PRODUCT_OLDPRICE')) {
            $css .= '
            .old-price { color: ' . Configuration::get('RTC_PL_PRODUCT_OLDPRICE') . ' }
			ul.product_list.grid li .product-container .old-price { color: ' . Configuration::get('RTC_PL_PRODUCT_OLDPRICE') . ' }
			';
        }
        if (Configuration::get('RTC_PL_PRODUCT_PERCENT')) {
            $css .= '
			.price-percent-reduction { color: ' . Configuration::get('RTC_PL_PRODUCT_PERCENT') . ' }
			';
        }
        if (Configuration::get('RTC_PL_PRODUCT_PERCENT_BG')) {
            $css .= '
			.price-percent-reduction { background-color: ' . Configuration::get('RTC_PL_PRODUCT_PERCENT_BG') . ' }
			.box-info-product #reduction_percent, .box-info-product #reduction_amount { background-color: ' . Configuration::get('RTC_PL_PRODUCT_PERCENT_BG') . ' }
			';
        }

        if (Configuration::get('RTC_PL_LIST_IMG_BORDER')) {
            $css .= '
			ul.product_list.list li .product-image-container { background-color: ' . Configuration::get('RTC_PL_LIST_IMG_BORDER') . ' }
			';
        }
        if (Configuration::get('RTC_PL_LIST_BG')) {
            $css .= '
			ul.product_list.list li .product-container { background-color: ' . Configuration::get('RTC_PL_LIST_BG') . ' }
			';
        }
        if (Configuration::get('RTC_PL_LIST_DESCRIPTION')) {
            $css .= '
			ul.product_list.list li .product-desc { color: ' . Configuration::get('RTC_PL_LIST_DESCRIPTION') . ' }
			';
        }
        if (Configuration::get('RTC_PL_LIST_SEPARATOR')) {
            $css .= '
			ul.product_list.list li .product-image-container:before { background-color: ' . Configuration::get('RTC_PL_LIST_SEPARATOR') . ' }
			ul.product_list.list li .right-block .button-wrapper:before { background-color: ' . Configuration::get('RTC_PL_LIST_SEPARATOR') . ' }
			';
        }
        if (Configuration::get('NC_COUNT') == 0) {
            $css .= '
            .countcontainer { display:none!important; }
            .product_count_block { display:none!important; }
			';
        }
        if (Configuration::get('NC_COUNT_DAYS') == 1) {
            $css .= '
            .countcontainer .county .county-days-wrapper { display:none!important }
            .countcontainer .county .county-hours-wrapper:before { display:none!important }
            .countcontainer .county .county-label-days { display:none!important }
            .countcontainer .county > span { width: 33.3% !important }
            .countcontainer .county .titles > span { width: 33.3% !important }
			';
        }
        if (Configuration::get('NC_COUNT_BG')) {
            $css .= '
			.roycountdown:before, .roycountoff:before { background-color: ' . Configuration::get('NC_COUNT_BG') . '!important }
			'; }
        if (Configuration::get('NC_COUNT_COLOR')) {
            $css .= '
			.county .county-days-wrapper, .county .county-hours-wrapper, .county .county-minutes-wrapper, .county .county-seconds-wrapper { color: ' . Configuration::get('NC_COUNT_COLOR') . '!important }
			.county-label-days, .county-label-hours, .county-label-minutes, .county-label-seconds { color: ' . Configuration::get('NC_COUNT_COLOR') . '!important }
			.roycountoff { color: ' . Configuration::get('NC_COUNT_COLOR') . '!important }
			'; }
        if (Configuration::get('NC_COUNT_SEP')) {
            $css .= '
			.county > span:before { background-color: ' . Configuration::get('NC_COUNT_SEP') . '!important }
			';
        }


        if (Configuration::get('RTC_PL_PRODUCT_CART')) {
            $css .= '
			ul.product_list.grid li .product-container .button-container .ajax_add_to_cart_button, ul.product_list.list li .product-container .button-container .ajax_add_to_cart_button { background-color: ' . Configuration::get('RTC_PL_PRODUCT_CART') . ' }
			';
        }
        if (Configuration::get('RTC_PL_PRODUCT_CART_BORDER')) {
            $css .= '
			ul.product_list.grid li .product-container .button-container .ajax_add_to_cart_button, ul.product_list.list li .product-container .button-container .ajax_add_to_cart_button { border-color: ' . Configuration::get('RTC_PL_PRODUCT_CART_BORDER') . ' }
			';
        }
        if (Configuration::get('RTC_PL_PRODUCT_CART_COLOR')) {
            $css .= '
			ul.product_list.grid li .product-container .button-container .ajax_add_to_cart_button, ul.product_list.list li .product-container .button-container .ajax_add_to_cart_button { color: ' . Configuration::get('RTC_PL_PRODUCT_CART_COLOR') . ' }
			';
        }
        if (Configuration::get('RTC_PL_PRODUCT_CART_ACTIVE')) {
            $css .= '
            ul.product_list.grid li:hover .product-container .button-container .ajax_add_to_cart_button { background-color: ' . Configuration::get('RTC_PL_PRODUCT_CART_ACTIVE') . ' }
			';
        }
        if (Configuration::get('RTC_PL_PRODUCT_CART_ACTIVE_BORDER')) {
            $css .= '
			ul.product_list.grid li:hover .product-container .button-container .ajax_add_to_cart_button { border-color: ' . Configuration::get('RTC_PL_PRODUCT_CART_ACTIVE_BORDER') . ' }
			';
        }
        if (Configuration::get('RTC_PL_PRODUCT_CART_ACTIVE_COLOR')) {
            $css .= '
			ul.product_list.grid li:hover .product-container .button-container .ajax_add_to_cart_button { color: ' . Configuration::get('RTC_PL_PRODUCT_CART_ACTIVE_COLOR') . ' }
			';
        }
        if (Configuration::get('RTC_PL_PRODUCT_CART_HOVER')) {
            $css .= '
			ul.product_list.list li .product-container .button-container .ajax_add_to_cart_button:hover { background-color: ' . Configuration::get('RTC_PL_PRODUCT_CART_HOVER') . ' }
			ul.product_list.grid li .product-container .button-container .ajax_add_to_cart_button:hover { background-color: ' . Configuration::get('RTC_PL_PRODUCT_CART_HOVER') . ' }
			';
        }
        if (Configuration::get('RTC_PL_PRODUCT_CART_HOVER_BORDER')) {
            $css .= '
			ul.product_list.list li .product-container .button-container .ajax_add_to_cart_button:hover { border-color: ' . Configuration::get('RTC_PL_PRODUCT_CART_HOVER_BORDER') . ' }
			ul.product_list.grid li .product-container .button-container .ajax_add_to_cart_button:hover { border-color: ' . Configuration::get('RTC_PL_PRODUCT_CART_HOVER_BORDER') . ' }
			';
        }
        if (Configuration::get('RTC_PL_PRODUCT_CART_HOVER_COLOR')) {
            $css .= '
			ul.product_list.list li .product-container .button-container .ajax_add_to_cart_button:hover { color: ' . Configuration::get('RTC_PL_PRODUCT_CART_HOVER_COLOR') . ' }
			ul.product_list.grid li .product-container .button-container .ajax_add_to_cart_button:hover { color: ' . Configuration::get('RTC_PL_PRODUCT_CART_HOVER_COLOR') . ' }
			';
        }

        if (Configuration::get('RTC_PL_PRODUCT_QUICKVIEW')) {
            $css .= '
			ul.product_list li .product-container .product-image-container .lnk_view { background-color: ' . Configuration::get('RTC_PL_PRODUCT_QUICKVIEW') . ' }
			ul.product_list li .product-container .product-image-container .quick-view { background-color: ' . Configuration::get('RTC_PL_PRODUCT_QUICKVIEW') . ' }
			';
        }
        if (Configuration::get('RTC_PL_PRODUCT_QUICKVIEW_HOVER')) {
            $css .= '
			ul.product_list li .product-container .product-image-container .lnk_view:hover { background-color: ' . Configuration::get('RTC_PL_PRODUCT_QUICKVIEW_HOVER') . ' }
			ul.product_list li .product-container .product-image-container .quick-view:hover { background-color: ' . Configuration::get('RTC_PL_PRODUCT_QUICKVIEW_HOVER') . ' }
			';
        }
        if (Configuration::get('RTC_PL_PRODUCT_QUICKVIEW_COLOR')) {
            $css .= '
			ul.product_list li .product-container .product-image-container .lnk_view:hover span { color: ' . Configuration::get('RTC_PL_PRODUCT_QUICKVIEW_COLOR') . ' }
			ul.product_list li .product-container .product-image-container .quick-view:hover span { color: ' . Configuration::get('RTC_PL_PRODUCT_QUICKVIEW_COLOR') . ' }
			';
        }
        if (Configuration::get('RTC_PL_PRODUCT_VIEW_BORDER')) {
            $css .= '
			ul.product_list li .product-container .product-image-container .lnk_view { border-color: ' . Configuration::get('RTC_PL_PRODUCT_VIEW_BORDER') . ' }
			ul.product_list li .product-container .product-image-container .quick-view { border-color: ' . Configuration::get('RTC_PL_PRODUCT_VIEW_BORDER') . ' }
			';
        }
        if (Configuration::get('RTC_PL_PRODUCT_VIEW_BORDER_HOVER')) {
            $css .= '
			ul.product_list li .product-container .product-image-container .lnk_view:hover { border-color: ' . Configuration::get('RTC_PL_PRODUCT_VIEW_BORDER_HOVER') . ' }
			ul.product_list li .product-container .product-image-container .quick-view:hover { border-color: ' . Configuration::get('RTC_PL_PRODUCT_VIEW_BORDER_HOVER') . ' }
			';
        }

        if (Configuration::get('RTC_PL_PRODUCT_COMPARE')) {
            $css .= '
			ul.product_list .functional-buttons div a, ul.product_list .functional-buttons div label { color: ' . Configuration::get('RTC_PL_PRODUCT_COMPARE') . ' }
			';
        }
        if (Configuration::get('RTC_PL_PRODUCT_COMPARE_HOVER')) {
            $css .= '
			ul.product_list .functional-buttons div a:hover, ul.product_list .functional-buttons div label:hover { color: ' . Configuration::get('RTC_PL_PRODUCT_COMPARE_HOVER') . ' }
			';
        }
        if (Configuration::get('RTC_PL_PRODUCT_COMPARE_ICON')) {
            $css .= '
			ul.product_list .functional-buttons div.compare a:before { background-color: ' . Configuration::get('RTC_PL_PRODUCT_COMPARE_ICON') . ' }
			';
        }
        if (Configuration::get('RTC_PL_PRODUCT_COMPARE_ICON_ACTIVE')) {
            $css .= '
			ul.product_list .functional-buttons div.compare a.checked:before { background-color: ' . Configuration::get('RTC_PL_PRODUCT_COMPARE_ICON_ACTIVE') . ' }
			';
        }
        if (Configuration::get('RTC_PL_PRODUCT_WISH_ICON')) {
            $css .= '
			ul.product_list .functional-buttons div.wishlist a:before { background-color: ' . Configuration::get('RTC_PL_PRODUCT_WISH_ICON') . ' }
			ul.product_list.list li .center-block .functional-buttons .wishlist a:before { background-color: ' . Configuration::get('RTC_PL_PRODUCT_WISH_ICON') . ' }
			';
        }
        if (Configuration::get('RTC_PL_PRODUCT_WISH_ICON_ACTIVE')) {
            $css .= '
			ul.product_list .functional-buttons div.wishlist a.checked:before { background-color: ' . Configuration::get('RTC_PL_PRODUCT_WISH_ICON_ACTIVE') . ' }
			ul.product_list.list li .center-block .functional-buttons .wishlist a.checked:before { background-color: ' . Configuration::get('RTC_PL_PRODUCT_WISH_ICON_ACTIVE') . ' }
			';
        }

        if (Configuration::get('RTC_PL_PRODUCT_NEW_BG')) {
            $css .= '
			.new-label { background-color: ' . Configuration::get('RTC_PL_PRODUCT_NEW_BG') . ' }
			';
        }
        if (Configuration::get('RTC_PL_PRODUCT_NEW_BORDER')) {
            $css .= '
			.new-label { border-color: ' . Configuration::get('RTC_PL_PRODUCT_NEW_BORDER') . ' }
			';
        }
        if (Configuration::get('RTC_PL_PRODUCT_NEW_COLOR')) {
            $css .= '
			.new-label { color: ' . Configuration::get('RTC_PL_PRODUCT_NEW_COLOR') . ' }
			';
        }
        if (Configuration::get('RTC_PL_PRODUCT_SALE_BG')) {
            $css .= '
			.sale-label { background-color: ' . Configuration::get('RTC_PL_PRODUCT_SALE_BG') . ' }
			';
        }
        if (Configuration::get('RTC_PL_PRODUCT_SALE_BORDER')) {
            $css .= '
			.sale-label { border-color: ' . Configuration::get('RTC_PL_PRODUCT_SALE_BORDER') . ' }
			';
        }
        if (Configuration::get('RTC_PL_PRODUCT_SALE_COLOR')) {
            $css .= '
			.sale-label { color: ' . Configuration::get('RTC_PL_PRODUCT_SALE_COLOR') . ' }
			';
        }
        if (Configuration::get('NC_SOLDOUT_BG')) {
            $css .= '
			.soldout-label { background-color: ' . Configuration::get('NC_SOLDOUT_BG') . ' }
			';
        }
        if (Configuration::get('NC_SOLDOUT_BORDER')) {
            $css .= '
			.soldout-label { border-color: ' . Configuration::get('NC_SOLDOUT_BORDER') . ' }
			';
        }
        if (Configuration::get('NC_SOLDOUT_COLOR')) {
            $css .= '
			.soldout-label { color: ' . Configuration::get('NC_SOLDOUT_COLOR') . ' }
			';
        }

        if (Configuration::get('RTC_DESC_HEIGHT') == 1) {
            $css .= '
            ul.product_list.grid li .product-container h5 {
              min-height: 40px; }

@media (min-width:1200px) {
    #index #center_column .tab-content .bx-viewport {
        height:425px!important;
    }
}
@media (min-width:992px) and (max-width:1199px) {
    #index #center_column .tab-content .bx-viewport {
        height:370px!important;
    }
}
@media (min-width:768px) and (max-width:991px) {
    #index #center_column .tab-content .bx-viewport {
        height:410px!important;
    }
}
@media (max-width:767px) {
    #index #center_column .tab-content .bx-viewport {
        height:445px!important;
    }
}

              ';
        }
        if (Configuration::get('RTC_PL_PRODUCT_WHITE_GRAD') == 0) {
            $css .= '
            ul.product_list.grid li .product-container .product-image-container .img_grad { display: none !important; }
            ul.product_list.list li .product-container .product-image-container .img_grad { display: none !important; }
			';
        }
        if (Configuration::get('RTC_PL_PRODUCT_QWTEXT') == 0) {
            $css .= '
            ul.product_list li .product-container .product-image-container .lnk_view span { display: none !important; }
            ul.product_list li .product-container .product-image-container .quick-view span { display: none !important; }
			';
        }
        if (Configuration::get('RTC_PL_PRODUCT_DISPLAY_QUICKVIEW') == 0) {
            $css .= '
            ul.product_list li .product-container .product-image-container .quick-view { display: none !important; }
            ul.product_list.list li .product-container .product-image-container .quick-view { display: none !important; }
			';
        }
        if (Configuration::get('RTC_PL_PRODUCT_DISPLAY_VIEW') == 0) {
            $css .= '
            ul.product_list li .product-container .product-image-container .lnk_view { display: none !important; }
            ul.product_list.list li .product-container .product-image-container .lnk_view { display: none !important; }
			';
        }
        if (Configuration::get('RTC_PL_PRODUCT_DISPLAY_NEW') == 0) {
            $css .= '
            .new-label { display: none !important; }
			';
        }
        if (Configuration::get('RTC_PL_PRODUCT_DISPLAY_SALE') == 0) {
            $css .= '
            .sale-label { display: none !important; }
			';
        }
        if (Configuration::get('RTC_C_LEFT_COLUMN')) {
            $css .= '
			table#product_comparison tbody tr td.td_empty, table#product_comparison tbody tr td.feature-name, table#product_comparison tbody tr.comparison_header { background-color: ' . Configuration::get('RTC_C_LEFT_COLUMN') . ' }
			';
        }
        if (Configuration::get('RTC_C_RIGHT_COLUMN')) {
            $css .= '
			table#product_comparison tbody tr td.comparison_infos { background-color: ' . Configuration::get('RTC_C_RIGHT_COLUMN') . ' }
			';
        }
        if (Configuration::get('RTC_C_LEFT_COLOR')) {
            $css .= '
			table#product_comparison tbody tr td.td_empty, table#product_comparison tbody tr td.feature-name, table#product_comparison tbody tr.comparison_header { color: ' . Configuration::get('RTC_C_LEFT_COLOR') . ' }
			';
        }
        if (Configuration::get('RTC_C_RIGHT_COLOR')) {
            $css .= '
			table#product_comparison tbody tr td { color: ' . Configuration::get('RTC_C_RIGHT_COLOR') . ' }
			';
        }
        if (Configuration::get('RTC_C_IMG_BORDER')) {
            $css .= '
			table#product_comparison .product-image-block { background-color: ' . Configuration::get('RTC_C_IMG_BORDER') . ' }
			';
        }
        if (Configuration::get('RTC_C_REMOVE')) {
            $css .= '
			table#product_comparison .remove a i { background-color: ' . Configuration::get('RTC_C_REMOVE') . ' }
			';
        }
        if (Configuration::get('RTC_C_REMOVE_HOVER')) {
            $css .= '
			table#product_comparison .remove a:hover i { background-color: ' . Configuration::get('RTC_C_REMOVE_HOVER') . ' }
			';
        }
        if (Configuration::get('RTC_PL_VIEW_EXT')) {

            if (Shop::getContext() == Shop::CONTEXT_SHOP)
                $adv_imgname = 'product_view'.'-'.(int)$this->context->shop->getContextShopID();

            $css .= '
            ul.product_list li .product-container .product-image-container .lnk_view { background-image: url(../upload/'.$adv_imgname.'.' . Configuration::get('RTC_PL_VIEW_EXT') . ') !important;}
            ul.product_list li .product-container .product-image-container .quick-view { background-image: url(../upload/'.$adv_imgname.'.' . Configuration::get('RTC_PL_VIEW_EXT') . ') !important;}
            ul.product_list li .product-container .product-image-container .lnk_view_mobile span { background-image: url(../upload/'.$adv_imgname.'.' . Configuration::get('RTC_PL_VIEW_EXT') . ') !important;}
            ul.product_list li .product-container .product-image-container .lnk_view_list span { background-image: url(../upload/'.$adv_imgname.'.' . Configuration::get('RTC_PL_VIEW_EXT') . ') !important;}
            ';
        }
        if (Configuration::get('RTC_PL_GL_EXT')) {

            if (Shop::getContext() == Shop::CONTEXT_SHOP)
                $adv_imgname = 'gridlist'.'-'.(int)$this->context->shop->getContextShopID();

            $css .= '
            .content_sortPagiBar .display li span.products_grid_switcher, .content_sortPagiBar .display_m li span.products_grid_switcher { background-image: url(../upload/'.$adv_imgname.'.' . Configuration::get('RTC_PL_GL_EXT') . ') !important;}
            .content_sortPagiBar .display li span.products_list_switcher, .content_sortPagiBar .display_m li span.products_list_switcher { background-image: url(../upload/'.$adv_imgname.'.' . Configuration::get('RTC_PL_GL_EXT') . ') !important;}
            ';
        }
        if (Configuration::get('RTC_PL_WC_EXT')) {

            if (Shop::getContext() == Shop::CONTEXT_SHOP)
                $adv_imgname = 'product_wishcomp'.'-'.(int)$this->context->shop->getContextShopID();

            $css .= '
            ul.product_list.list li .center-block .functional-buttons .wishlist a:before { background-image: url(../upload/'.$adv_imgname.'.' . Configuration::get('RTC_PL_WC_EXT') . ') !important;}
            ul.product_list .functional-buttons div.compare a:before { background-image: url(../upload/'.$adv_imgname.'.' . Configuration::get('RTC_PL_WC_EXT') . ') !important;}
            ul.product_list .functional-buttons div.wishlist a:before { background-image: url(../upload/'.$adv_imgname.'.' . Configuration::get('RTC_PL_WC_EXT') . ') !important;}
            #wishlist_button:before { background-image: url(../upload/'.$adv_imgname.'.' . Configuration::get('RTC_PL_WC_EXT') . ') !important;}
            ';
        }




// ****************  PRODUCT PAGE styles start

        if (Configuration::get('RTC_PP_USE_EXT')) {

            if (Shop::getContext() == Shop::CONTEXT_SHOP)
                $adv_imgname = 'product_useful'.'-'.(int)$this->context->shop->getContextShopID();

            $css .= '
            #usefull_link_block li.sendtofriend a:before { background-image: url(../upload/'.$adv_imgname.'.' . Configuration::get('RTC_PP_USE_EXT') . ') !important;}
            #usefull_link_block li.print a:before { background-image: url(../upload/'.$adv_imgname.'.' . Configuration::get('RTC_PP_USE_EXT') . ') !important;}
            ';
        }

        if (Configuration::get('RTC_PP_IMG_BORDER')) {
            $css .= '
			.pb-left-column #image-block { background-color: ' . Configuration::get('RTC_PP_IMG_BORDER') . ' }
			#thumbs_list li a { border-color: ' . Configuration::get('RTC_PP_IMG_BORDER') . ' }
			';
        }
        if (Configuration::get('RTC_PP_ICON_BORDER')) {
            $css .= '
			#thumbs_list li { border-color: ' . Configuration::get('RTC_PP_ICON_BORDER') . ' }
			#thumbs_list li a:hover, #thumbs_list li a.shown img { border-color: ' . Configuration::get('RTC_PP_ICON_BORDER') . ' }
			';
        }
        if (Configuration::get('RTC_PP_ICON_BORDER_HOVER')) {
            $css .= '
			#thumbs_list li a:hover, #thumbs_list li a.shown img { border-color: ' . Configuration::get('RTC_PP_ICON_BORDER_HOVER') . ' }
			';
        }
        if (Configuration::get('RTC_PP_ICON_NAV_BG')) {
            $css .= '
			#view_scroll_left, #view_scroll_right { background-color: ' . Configuration::get('RTC_PP_ICON_NAV_BG') . ' }
			';
        }
        if (Configuration::get('RTC_PP_ICON_NAV_BG_HOVER')) {
            $css .= '
			#views_block:hover #view_scroll_left, #views_block:hover #view_scroll_right { background-color: ' . Configuration::get('RTC_PP_ICON_NAV_BG_HOVER') . ' }
			';
        }
        if (Configuration::get('RTC_PP_SOCIAL_BG')) {
            $css .= '
			.socialsharing_product button { background-color: ' . Configuration::get('RTC_PP_SOCIAL_BG') . ' }
			';
        }
        if (Configuration::get('RTC_PP_SOCIAL_COLOR')) {
            $css .= '
			.socialsharing_product button { color: ' . Configuration::get('RTC_PP_SOCIAL_COLOR') . ' }
			';
        }
        if (Configuration::get('RTC_PP_USEFUL_COLOR')) {
            $css .= '
			.buttons_bottom_block #wishlist_button { color: ' . Configuration::get('RTC_PP_USEFUL_COLOR') . ' }
			#usefull_link_block li a { color: ' . Configuration::get('RTC_PP_USEFUL_COLOR') . ' }
			.resetimg #wrapResetImages a { color: ' . Configuration::get('RTC_PP_USEFUL_COLOR') . ' }
			';
        }
        if (Configuration::get('RTC_PP_USEFUL_COLOR_HOVER')) {
            $css .= '
			.buttons_bottom_block #wishlist_button:hover { color: ' . Configuration::get('RTC_PP_USEFUL_COLOR_HOVER') . ' }
			#usefull_link_block li a:hover { color: ' . Configuration::get('RTC_PP_USEFUL_COLOR_HOVER') . ' }
			.resetimg #wrapResetImages a:hover { color: ' . Configuration::get('RTC_PP_USEFUL_COLOR_HOVER') . ' }
			';
        }
        if (Configuration::get('RTC_PP_USEFUL_ICON')) {
            $css .= '
			.resetimg #wrapResetImages a i:before { background-color: ' . Configuration::get('RTC_PP_USEFUL_ICON') . ' }
			#wishlist_button:before { background-color: ' . Configuration::get('RTC_PP_USEFUL_ICON') . ' }
			#usefull_link_block li.sendtofriend a:before { background-color: ' . Configuration::get('RTC_PP_USEFUL_ICON') . ' }
			#usefull_link_block li.print a:before { background-color: ' . Configuration::get('RTC_PP_USEFUL_ICON') . ' }
			';
        }
        if (Configuration::get('RTC_PP_DISPLAY_SOCIAL') == 0) {
            $css .= '
			.pb-left-column p.socialsharing_product { display:none!important; }
			';
        }
        if (Configuration::get('RTC_PP_DISPLAY_WISH') == 0) {
            $css .= '
			.buttons_bottom_block #wishlist_button { display:none!important; }
			';
        }
        if (Configuration::get('RTC_PP_DISPLAY_SEND') == 0) {
            $css .= '
			#usefull_link_block li.sendtofriend { display:none!important; }
			';
        }
        if (Configuration::get('RTC_PP_DISPLAY_PRINT') == 0) {
            $css .= '
			#usefull_link_block li.print { display:none!important; }
			';
        }
        if (Configuration::get('RTC_PP_NAME')) {
            $css .= '
			.pb-center-column h1 { color: ' . Configuration::get('RTC_PP_NAME') . ' }
			';
        }
        if (Configuration::get('RTC_PP_DESC')) {
            $css .= '
			.pb-center-column #short_description_block #short_description_content p { color: ' . Configuration::get('RTC_PP_DESC') . ' }
			';
        }
        if (Configuration::get('RTC_PP_INFO_LABEL')) {
            $css .= '
			.pb-center-column #product_condition label, .pb-center-column #availability_statut label, .pb-center-column .online_only label, .pb-center-column #product_reference label { color: ' . Configuration::get('RTC_PP_INFO_LABEL') . ' }
			';
        }
        if (Configuration::get('RTC_PP_INFO_VALUE')) {
            $css .= '
			.pb-center-column #product_condition span, .pb-center-column #availability_statut span, .pb-center-column #product_reference span { color: ' . Configuration::get('RTC_PP_INFO_VALUE') . ' }
			';
        }
        if (Configuration::get('RTC_PP_DISPLAY_REFER') == 0) {
            $css .= '
			.product_attributes #product_reference { display:none!important; }
			';
        }
        if (Configuration::get('NC_MAN_TEXT') == 0) {
            $css .= '
			#product_manufacturer { display:none!important; }
			';
        }
        if (Configuration::get('NC_MAN_LOGO') == 0) {
            $css .= '
			.product_manufacturer_logo { display:none!important; }
			';
        }
        if (Configuration::get('RTC_PP_DISPLAY_COND') == 0) {
            $css .= '
			.product_attributes #product_condition { display:none!important; }
			';
        }
        if (Configuration::get('RTC_PP_DISPLAY_AVAIL') == 0) {
            $css .= '
			.product_attributes #availability_statut { display:none!important; }
			.product_attributes #availability_date { display:none!important; }
			';
        }
        if (Configuration::get('RTC_PP_ATT_LABEL')) {
            $css .= '
			.product_attributes label { color: ' . Configuration::get('RTC_PP_ATT_LABEL') . ' }
			';
        }
        if (Configuration::get('RTC_PP_ATT_INPUT_BG')) {
            $css .= '
			#attributes .attribute_list select { background-color: ' . Configuration::get('RTC_PP_ATT_INPUT_BG') . ' }
			';
        }
        if (Configuration::get('NC_PP_ATT_RIGHT') == 1) {
            $css .= '
			#attributes .attribute_list div.selector { float:right; }
			';
        }
        if (Configuration::get('NC_LONG_PRICES') == 1) {
            $css .= '
			.box-info-product #old_price {
            padding: 4px 2px;
            display: block; }
			';
        }
        if (Configuration::get('RTC_PP_ATT_COLOR')) {
            $css .= '
			#attributes .attribute_list #color_to_pick_list li { border-color: ' . Configuration::get('RTC_PP_ATT_COLOR') . ' }
			';
        }
        if (Configuration::get('RTC_PP_ATT_COLOR_ACTIVE')) {
            $css .= '
			#attributes .attribute_list #color_to_pick_list li.selected { border-color: ' . Configuration::get('RTC_PP_ATT_COLOR_ACTIVE') . ' }
			';
        }
        if (Configuration::get('RTC_PP_ATT_QUAN_INPUT_BG')) {
            $css .= '
			#quantity_wanted_p input { background-color: ' . Configuration::get('RTC_PP_ATT_QUAN_INPUT_BG') . ' }
			';
        }
        if (Configuration::get('RTC_PP_ATT_QUAN_PM_BG')) {
            $css .= '
			.btn.button-plus span, .btn.button-minus span { background-color: ' . Configuration::get('RTC_PP_ATT_QUAN_PM_BG') . ' }
			#order-opc .btn.button-plus span, #order-opc .btn.button-minus span, #order .btn.button-plus span, #order .btn.button-minus span { background-color: ' . Configuration::get('RTC_PP_ATT_QUAN_PM_BG') . ' }
			';
        }
        if (Configuration::get('RTC_PP_ATT_QUAN_PM_BG_HOVER')) {
            $css .= '
			.btn.button-plus:hover span, .btn.button-minus:hover span { background-color: ' . Configuration::get('RTC_PP_ATT_QUAN_PM_BG_HOVER') . ' }
			#order-opc .btn.button-plus:hover span, #order-opc .btn.button-minus:hover span, #order .btn.button-plus:hover span, #order .btn.button-minus:hover span { background-color: ' . Configuration::get('RTC_PP_ATT_QUAN_PM_BG_HOVER') . ' }
			';
        }
        if (Configuration::get('RTC_PP_ATT_QUAN_PM_COLOR')) {
            $css .= '
			.btn.button-plus, .btn.button-minus { color: ' . Configuration::get('RTC_PP_ATT_QUAN_PM_COLOR') . ' }
			#order-opc .btn.button-plus, #order-opc .btn.button-minus, #order .btn.button-plus, #order .btn.button-minus { color: ' . Configuration::get('RTC_PP_ATT_QUAN_PM_COLOR') . ' }
			';
        }
        if (Configuration::get('RTC_PP_ATT_QUAN_PM_COLOR_HOVER')) {
            $css .= '
			.btn.button-plus:hover, .btn.button-minus:hover { color: ' . Configuration::get('RTC_PP_ATT_QUAN_PM_COLOR_HOVER') . ' }
			#order-opc .btn.button-plus:hover, #order-opc .btn.button-minus:hover, #order .btn.button-plus:hover, #order .btn.button-minus:hover { color: ' . Configuration::get('RTC_PP_ATT_QUAN_PM_COLOR_HOVER') . ' }
			';
        }

        if (Configuration::get('NC_PP_ADD_BG')) {
            $css .= '
			#product .addcustom { background-color: ' . Configuration::get('NC_PP_ADD_BG') . ' }
			';
        }
        if (Configuration::get('NC_PP_ADD_BORDER')) {
            $css .= '
			#product .addcustom { border-color: ' . Configuration::get('NC_PP_ADD_BORDER') . ' }
			';
        }
        if (Configuration::get('NC_PP_ADD_COLOR')) {
            $css .= '
			#product .addcustom { color: ' . Configuration::get('NC_PP_ADD_COLOR') . ' }
			';
        }

        if (Configuration::get('NC_COUNT_PR_TITLE')) {
            $css .= '
			.product_count_block .countcontainer .roycounttitle, .product_count_block .countcontainer .roycountoff { color: ' . Configuration::get('NC_COUNT_PR_TITLE') . '!important }
			';
        }
        if (Configuration::get('NC_COUNT_PR_TITLEBG')) {
            $css .= '
			.product_count_block .countcontainer .roycounttitle, .product_count_block .countcontainer .roycountoff { background-color: ' . Configuration::get('NC_COUNT_PR_TITLEBG') . '!important }
			';
        }
        if (Configuration::get('NC_COUNT_PR_BG')) {
            $css .= '
			.product_count_block .roycountdown:before, .product_count_block .roycountoff:before { background-color: ' . Configuration::get('NC_COUNT_PR_BG') . '!important }
			'; }
        if (Configuration::get('NC_COUNT_PR_COLOR')) {
            $css .= '
			.product_count_block .county .county-days-wrapper, .product_count_block .county .county-hours-wrapper, .product_count_block .county .county-minutes-wrapper, .product_count_block .county .county-seconds-wrapper { color: ' . Configuration::get('NC_COUNT_PR_COLOR') . '!important }
			.product_count_block .county-label-days, .product_count_block .county-label-hours, .product_count_block .county-label-minutes, .product_count_block .county-label-seconds { color: ' . Configuration::get('NC_COUNT_PR_COLOR') . '!important }
			.product_count_block .roycountoff { color: ' . Configuration::get('NC_COUNT_PR_COLOR') . '!important }
			'; }
        if (Configuration::get('NC_COUNT_PR_SEP')) {
            $css .= '
			.product_count_block .county > span:before { background-color: ' . Configuration::get('NC_COUNT_PR_SEP') . '!important }
			';
        }


        if (Configuration::get('RTC_PP_PRICE_BOX')) {
            $css .= '
			.box-info-product { background-color: ' . Configuration::get('RTC_PP_PRICE_BOX') . ' }
			';
        }
        if (Configuration::get('RTC_PP_PRICE_BORDER')) {
            $css .= '
			.pb-center-column #buy_block { border-color: ' . Configuration::get('RTC_PP_PRICE_BORDER') . ' }
			';
        }
        if (Configuration::get('RTC_PP_PRICE_SEPARATOR')) {
            $css .= '
			.box-cart-bottom { border-left-color: ' . Configuration::get('RTC_PP_PRICE_SEPARATOR') . ' }
			';
        }
        if (Configuration::get('RTC_PP_PRICE_COLOR')) {
            $css .= '
			.box-info-product #our_price_display { color: ' . Configuration::get('RTC_PP_PRICE_COLOR') . ' }
			';
        }
        if (Configuration::get('RTC_PP_TABS_BG')) {
            $css .= '
			.idTabs > li a { background-color: ' . Configuration::get('RTC_PP_TABS_BG') . ' }
			';
        }
        if (Configuration::get('RTC_PP_TABS_BG_HOVER')) {
            $css .= '
			.idTabs .selected  { background-color: ' . Configuration::get('RTC_PP_TABS_BG_HOVER') . ' }
			.nav > li > a:hover, .nav > li > a:focus { background-color: ' . Configuration::get('RTC_PP_TABS_BG_HOVER') . ' }
			';
        }
        if (Configuration::get('RTC_PP_TABS_COLOR')) {
            $css .= '
			.idTabs > li a { color: ' . Configuration::get('RTC_PP_TABS_COLOR') . ' }
			';
        }
        if (Configuration::get('RTC_PP_TABS_COLOR_HOVER')) {
            $css .= '
			.idTabs > li a.selected { color: ' . Configuration::get('RTC_PP_TABS_COLOR_HOVER') . ' }
			';
        }
        if (Configuration::get('RTC_PP_TABS_SHEETS_BG')) {
            $css .= '
			#more_info_sheets { background-color: ' . Configuration::get('RTC_PP_TABS_SHEETS_BG') . ' }
			';
        }
        if (Configuration::get('RTC_PP_TABS_SHEETS_COLOR')) {
            $css .= '
			#more_info_sheets { color: ' . Configuration::get('RTC_PP_TABS_SHEETS_COLOR') . ' }
			';
        }
        if (Configuration::get('RTC_PP_TABS_TABLE_LEFT')) {
            $css .= '
			.table-data-sheet tr td:first-child { background-color: ' . Configuration::get('RTC_PP_TABS_TABLE_LEFT') . ' }
			';
        }
        if (Configuration::get('RTC_PP_TABS_TABLE_LEFT_COLOR')) {
            $css .= '
			.table-data-sheet tr td:first-child { color: ' . Configuration::get('RTC_PP_TABS_TABLE_LEFT_COLOR') . ' }
			';
        }
        if (Configuration::get('RTC_PP_TABS_TABLE_RIGHT')) {
            $css .= '
			.table-data-sheet tr td { background-color: ' . Configuration::get('RTC_PP_TABS_TABLE_RIGHT') . ' }
			';
        }
        if (Configuration::get('RTC_PP_TABS_TABLE_RIGHT_COLOR')) {
            $css .= '
			.table-data-sheet tr td { color: ' . Configuration::get('RTC_PP_TABS_TABLE_RIGHT_COLOR') . ' }
			';
        }

        if (Configuration::get('RTC_PP_AC_NAME')) {
            $css .= '
			.page-product-box .accessories_block .block_content .product_desc .s_title_block a { color: ' . Configuration::get('RTC_PP_AC_NAME') . ' }
			';
        }
        if (Configuration::get('RTC_PP_AC_PRICE')) {
            $css .= '
			.page-product-box .accessories_block .block_content .product_desc .s_title_block .price { color: ' . Configuration::get('RTC_PP_AC_PRICE') . ' }
			';
        }
        if (Configuration::get('RTC_PP_AC_DESC')) {
            $css .= '
			.page-product-box .accessories_block .block_content .product_desc .product_description { color: ' . Configuration::get('RTC_PP_AC_DESC') . ' }
			';
        }

        if (Configuration::get('RTC_PP_QW_BG')) {
            $css .= '
			#product.content_only div.primary_block { background-color: ' . Configuration::get('RTC_PP_QW_BG') . ' }
			';
        }


// ****************  CART and BUY MESSAGE styles start


        if (Configuration::get('RTC_C_TITLE')) {
            $css .= '
			.shopping_cart > a:first-child > span.cartname { color: ' . Configuration::get('RTC_C_TITLE') . ' }
			';
        }
        if (Configuration::get('NC_C_TITLE_HOVER')) {
            $css .= '
			.shopping_cart:hover > a:first-child > span.cartname { color: ' . Configuration::get('NC_C_TITLE_HOVER') . ' }
			.shopping_cart:hover > a:first-child > span { color: ' . Configuration::get('NC_C_TITLE_HOVER') . ' }
			';
        }
        if (Configuration::get('RTC_C_PRODUCTS')) {
            $css .= '
			.shopping_cart > a:first-child > span { color: ' . Configuration::get('RTC_C_PRODUCTS') . ' }
			';
        }
        if (Configuration::get('RTC_C_BG')) {
            $css .= '
			.shopping_cart > a:first-child { background-color: ' . Configuration::get('RTC_C_BG') . ' }
			';
        }
        if (Configuration::get('RTC_C_BG_HOVER')) {
            $css .= '
			.shopping_cart:hover > a:first-child { background-color: ' . Configuration::get('RTC_C_BG_HOVER') . ' }
			.shopping_cart:hover > a:first-child { border-color: ' . Configuration::get('RTC_C_BG_HOVER') . ' }
			#header .shopping_cart:hover > a:first-child > .carticon { background-color: ' . Configuration::get('RTC_C_BG_HOVER') . ' }
			#header .shopping_cart:hover > a:first-child > .carticon { border-color: ' . Configuration::get('RTC_C_BG_HOVER') . ' }
			';
        }
        if (Configuration::get('RTC_C_BORDER')) {
            $css .= '
			.shopping_cart > a:first-child { border-color: ' . Configuration::get('RTC_C_BORDER') . ' }
			';
        }
        if (Configuration::get('RTC_C_BG_ICON')) {
            $css .= '
			#header .shopping_cart > a:first-child .carticon { background-color: ' . Configuration::get('RTC_C_BG_ICON') . ' }
			';
        }
        if (Configuration::get('RTC_C_BORDER_ICON')) {
            $css .= '
			#header .shopping_cart > a:first-child .carticon { border-color: ' . Configuration::get('RTC_C_BORDER_ICON') . ' }
			';
        }

        if (Configuration::get('RTC_CART_ICON_EXT')) {

            if (Shop::getContext() == Shop::CONTEXT_SHOP)
                $adv_imgname = 'carticon'.'-'.(int)$this->context->shop->getContextShopID();

            $css .= '#header .shopping_cart > a:first-child > span.carticon { background-image: url(../upload/'.$adv_imgname.'.' . Configuration::get('RTC_CART_ICON_EXT') . ') !important;}
                ';
        }



        if (Configuration::get('RTC_C_ARROW_COLOR')) {
            $css .= '
			#header .shopping_cart > a:first-child > span.cartarrow:before { color: ' . Configuration::get('RTC_C_ARROW_COLOR') . ' }
			';
        }

        if (Configuration::get('RTC_C_DISPLAY_ARROW') == 0) {
            $css .= '
			#header .shopping_cart > a:first-child > span.cartarrow { display: none!important; }
			';
        }

        if (Configuration::get('RTC_C_POPUP_BG')) {
            $css .= '
			#header .block_content { background-color: ' . Configuration::get('RTC_C_POPUP_BG') . ' }
			#header .cart_block { background-color: ' . Configuration::get('RTC_C_POPUP_BG') . ' }
			';
        }
        if (Configuration::get('RTC_C_POPUP_BORDER')) {
            $css .= '
			#header .cart_block { border-color: ' . Configuration::get('RTC_C_POPUP_BORDER') . ' }
			#header .block_content { border-color: ' . Configuration::get('RTC_C_POPUP_BORDER') . ' }
			';
        }

        if (Configuration::get('RTC_C_POPUP_SHADOW') == 1) {
            $css .= '
			#header .cart_block {
			-webkit-box-shadow: rgba(0, 0, 0, 0.2) 0px 7px 11px !important;
            -moz-box-shadow: rgba(0, 0, 0, 0.2) 0px 7px 11px !important;
            box-shadow: rgba(0, 0, 0, 0.2) 0px 7px 11px !important; }
			';
        }
        if (Configuration::get('RTC_C_PRODUCT_Q')) {
            $css .= '
			.cart_block .cart-info .quantity-formated { color: ' . Configuration::get('RTC_C_PRODUCT_Q') . ' }
			';
        }
        if (Configuration::get('RTC_C_PRODUCT_NAME')) {
            $css .= '
			#header .cart_block a { color: ' . Configuration::get('RTC_C_PRODUCT_NAME') . ' }
			';
        }
        if (Configuration::get('RTC_C_PRODUCT_NAME_HOVER')) {
            $css .= '
			#header .cart_block a:hover { color: ' . Configuration::get('RTC_C_PRODUCT_NAME_HOVER') . ' }
			';
        }
        if (Configuration::get('RTC_C_PRODUCT_ATTS')) {
            $css .= '
			#header .cart_block .product-atributes a { color: ' . Configuration::get('RTC_C_PRODUCT_ATTS') . ' }
			';
        }
        if (Configuration::get('RTC_C_PRODUCT_PRICE')) {
            $css .= '
			#header .cart_block .price { color: ' . Configuration::get('RTC_C_PRODUCT_PRICE') . ' }
			';
        }
        if (Configuration::get('RTC_C_PRODUCT_REMOVE')) {
            $css .= '
			#header .cart_block .cart_block_list .remove_link a, #header .cart_block .cart_block_list .ajax_cart_block_remove_link { color: ' . Configuration::get('RTC_C_PRODUCT_REMOVE') . ' }
			';
        }
        if (Configuration::get('RTC_C_PRODUCT_REMOVE_HOVER')) {
            $css .= '
			#header .cart_block .cart_block_list .remove_link a:hover, #header .cart_block .cart_block_list .ajax_cart_block_remove_link:hover { color: ' . Configuration::get('RTC_C_PRODUCT_REMOVE_HOVER') . ' }
			';
        }
        if (Configuration::get('RTC_C_PRODUCT_SEPARATOR')) {
            $css .= '
			#header .cart_block dt { border-top-color: ' . Configuration::get('RTC_C_PRODUCT_SEPARATOR') . ' }
			';
        }
        if (Configuration::get('RTC_C_PRODUCT_SUMMARY_BG')) {
            $css .= '
			#header .cart_block .cart-prices { background-color: ' . Configuration::get('RTC_C_PRODUCT_SUMMARY_BG') . ' }
			';
        }
        if (Configuration::get('RTC_C_PRODUCT_SUMMARY_TITLE')) {
            $css .= '
			.cart_block .cart-prices .cart-prices-line { color: ' . Configuration::get('RTC_C_PRODUCT_SUMMARY_TITLE') . ' }
			';
        }
        if (Configuration::get('RTC_C_SUMMARY_BORDER')) {
            $css .= '
			#header .cart_block .cart-prices { border-color: ' . Configuration::get('RTC_C_SUMMARY_BORDER') . ' }
			#header .cart_block img { border-color: ' . Configuration::get('RTC_C_SUMMARY_BORDER') . ' }
			';
        }
        if (Configuration::get('RTC_C_PRODUCT_SUMMARY_VALUE')) {
            $css .= '
			.cart_block .cart_block_shipping_cost,
            .cart_block .cart_block_tax_cost,
            .cart_block .cart_block_total,
            .cart_block .cart_block_wrapping_cost { color: ' . Configuration::get('RTC_C_PRODUCT_SUMMARY_VALUE') . '!important; }
			';
        }

        if (Configuration::get('RTC_LC_BG')) {
            $css .= '
            #layer_cart { background-color: ' . Configuration::get('RTC_LC_BG') . ' }
			';
        }
        if (Configuration::get('RTC_LC_V_SEPARATOR')) {
            $css .= '
            #layer_cart .layer_cart_cart { border-left-color: ' . Configuration::get('RTC_LC_V_SEPARATOR') . ' }
			';
        }
        if (Configuration::get('RTC_LC_H_SEPARATOR')) {
            $css .= '
            #layer_cart .crossseling .crossseling-content { border-top-color: ' . Configuration::get('RTC_LC_H_SEPARATOR') . ' }
			';
        }
        if (Configuration::get('RTC_LC_SUCCESS_BG')) {
            $css .= '
            #layer_cart .layer_cart_product h2 { background-color: ' . Configuration::get('RTC_LC_SUCCESS_BG') . ' }
			';
        }
        if (Configuration::get('RTC_LC_SUCCESS_COLOR')) {
            $css .= '
            #layer_cart .layer_cart_product h2 { color: ' . Configuration::get('RTC_LC_SUCCESS_COLOR') . ' }
			';
        }
        if (Configuration::get('RTC_LC_IMG_BORDER')) {
            $css .= '
            #layer_cart .layer_cart_product .product-image-container { border-color: ' . Configuration::get('RTC_LC_IMG_BORDER') . ' }
            #layer_cart .crossseling #blockcart_list ul li .product-image-container { border-color: ' . Configuration::get('RTC_LC_IMG_BORDER') . ' }
			';
        }
        if (Configuration::get('RTC_LC_PRODUCT_NAME')) {
            $css .= '
            #layer_cart .layer_cart_product .layer_cart_product_info #layer_cart_product_title { color: ' . Configuration::get('RTC_LC_PRODUCT_NAME') . ' }
            #layer_cart .crossseling #blockcart_list ul li .product-name a { color: ' . Configuration::get('RTC_LC_PRODUCT_NAME') . ' }
            #layer_cart .crossseling #blockcart_list ul li .price { color: ' . Configuration::get('RTC_LC_PRODUCT_NAME') . ' }
			';
        }
        if (Configuration::get('RTC_LC_PRODUCT_ATTS')) {
            $css .= '
            #layer_cart .layer_cart_product { color: ' . Configuration::get('RTC_LC_PRODUCT_ATTS') . ' }
			';
        }
        if (Configuration::get('RTC_LC_PRODUCT_ATTS_LABEL')) {
            $css .= '
            #layer_cart .layer_cart_product .layer_cart_product_info > div strong, #layer_cart .layer_cart_product .layer_cart_cart > div strong { color: ' . Configuration::get('RTC_LC_PRODUCT_ATTS_LABEL') . ' }
			';
        }
        if (Configuration::get('RTC_LC_IN_CART_BG')) {
            $css .= '
            #layer_cart .layer_cart_cart h2 { background-color: ' . Configuration::get('RTC_LC_IN_CART_BG') . ' }
			';
        }
        if (Configuration::get('RTC_LC_IN_CART_COLOR')) {
            $css .= '
            #layer_cart .layer_cart_cart h2 { color: ' . Configuration::get('RTC_LC_IN_CART_COLOR') . ' }
			';
        }
        if (Configuration::get('RTC_LC_TOTAL_BG')) {
            $css .= '
            #layer_cart .layer_cart_cart .layer_cart_row { background-color: ' . Configuration::get('RTC_LC_TOTAL_BG') . ' }
			';
        }
        if (Configuration::get('RTC_LC_TOTAL_LABEL')) {
            $css .= '
               #layer_cart .layer_cart_cart .layer_cart_row .ajax_block_products_total,
               #layer_cart .layer_cart_cart .layer_cart_row .ajax_block_shipping_cost,
               #layer_cart .layer_cart_cart .layer_cart_row .price,
               #layer_cart .layer_cart_cart .layer_cart_row .ajax_cart_tax_cost,
               #layer_cart .layer_cart_cart .layer_cart_row .ajax_block_cart_total { color: ' . Configuration::get('RTC_LC_TOTAL_LABEL') . ' }
			';
        }
        if (Configuration::get('RTC_LC_TOTAL_COLOR')) {
            $css .= '
            #layer_cart .layer_cart_cart .layer_cart_row { color: ' . Configuration::get('RTC_LC_TOTAL_COLOR') . ' }
			';
        }
        if (Configuration::get('RTC_LC_CROSS_TITLE')) {
            $css .= '
            #layer_cart .crossseling h2 { color: ' . Configuration::get('RTC_LC_CROSS_TITLE') . ' }
			';
        }
        if (Configuration::get('RTC_LC_CLOSE')) {
            $css .= '
            #layer_cart .cross { color: ' . Configuration::get('RTC_LC_CLOSE') . ' }
			';
        }
        if (Configuration::get('RTC_LC_CLOSE_HOVER')) {
            $css .= '
            #layer_cart .cross:hover { color: ' . Configuration::get('RTC_LC_CLOSE_HOVER') . ' }
			';
        }



// ****************  REGISTRATION and MY ACCOUNT styles start

        if (Configuration::get('RTC_MA_REQUIRED')) {
            $css .= '
			#address p.required, #identity p.required, #account-creation_form p.required, #new_account_form p.required, #opc_account_form p.required, #authentication p.required { color: ' . Configuration::get('RTC_MA_REQUIRED') . ' }
			';
        }
        if (Configuration::get('RTC_MA_TITLE')) {
            $css .= '
			#my-account ul.myaccount-link-list li a { color: ' . Configuration::get('RTC_MA_TITLE') . ' }
			';
        }
        if (Configuration::get('RTC_MA_TITLE_HOVER')) {
            $css .= '
			#my-account ul.myaccount-link-list li a:hover { color: ' . Configuration::get('RTC_MA_TITLE_HOVER') . ' }
			';
        }
        if (Configuration::get('RTC_MA_ICON')) {
            $css .= '
			#my-account ul.myaccount-link-list li a i { background-color: ' . Configuration::get('RTC_MA_ICON') . ' }
			';
        }
        if (Configuration::get('RTC_MA_ICON_BORDER')) {
            $css .= '
			#my-account ul.myaccount-link-list li a i { border-color: ' . Configuration::get('RTC_MA_ICON_BORDER') . ' }
			';
        }
        if (Configuration::get('RTC_MA_ICON_HOVER')) {
            $css .= '
			#my-account ul.myaccount-link-list li a:hover i { background-color: ' . Configuration::get('RTC_MA_ICON_HOVER') . ' }
			';
        }
        if (Configuration::get('RTC_MA_ICON_BORDER_HOVER')) {
            $css .= '
			#my-account ul.myaccount-link-list li a:hover i { border-color: ' . Configuration::get('RTC_MA_ICON_BORDER_HOVER') . ' }
			';
        }
        if (Configuration::get('RTC_MA_FOOTER_SEPARATOR')) {
            $css .= '
			ul.footer_links { border-top-color: ' . Configuration::get('RTC_MA_FOOTER_SEPARATOR') . ' }
			';
        }

        if (Configuration::get('RTC_I_MA_EXT')) {

            if (Shop::getContext() == Shop::CONTEXT_SHOP)
                $adv_imgname = 'icons-myaccount'.'-'.(int)$this->context->shop->getContextShopID();

            $css .= '
            .icon-addaddress:before { background-image: url(../upload/'.$adv_imgname.'.' . Configuration::get('RTC_I_MA_EXT') . ') !important;}
            .icon-list-ol:before { background-image: url(../upload/'.$adv_imgname.'.' . Configuration::get('RTC_I_MA_EXT') . ') !important;}
            .icon-ban-circle:before { background-image: url(../upload/'.$adv_imgname.'.' . Configuration::get('RTC_I_MA_EXT') . ') !important;}
            .icon-building:before { background-image: url(../upload/'.$adv_imgname.'.' . Configuration::get('RTC_I_MA_EXT') . ') !important;}
            .icon-user:before { background-image: url(../upload/'.$adv_imgname.'.' . Configuration::get('RTC_I_MA_EXT') . ') !important;}
            .icon-heart:before { background-image: url(../upload/'.$adv_imgname.'.' . Configuration::get('RTC_I_MA_EXT') . ') !important;}
            ';
        }
        if (Configuration::get('RTC_I_AUT_EXT')) {

            if (Shop::getContext() == Shop::CONTEXT_SHOP)
                $adv_imgname = 'icons-autentification'.'-'.(int)$this->context->shop->getContextShopID();

            $css .= '
            .button.button-medium span i.icon-user { background-image: url(../upload/'.$adv_imgname.'.' . Configuration::get('RTC_I_AUT_EXT') . ') !important;}
            .button.button-medium span i.icon-lock { background-image: url(../upload/'.$adv_imgname.'.' . Configuration::get('RTC_I_AUT_EXT') . ') !important;}
            ';
        }



// ****************  ORDER STEPS styles start

        if (Configuration::get('RTC_O_NUMBER_BG')) {
            $css .= '
			ul.step li em { background-color: ' . Configuration::get('RTC_O_NUMBER_BG') . ' }
			';
        }
        if (Configuration::get('RTC_O_NUMBER_BORDER')) {
            $css .= '
			ul.step li em { border-color: ' . Configuration::get('RTC_O_NUMBER_BORDER') . ' }
			';
        }
        if (Configuration::get('RTC_O_NUMBER_COLOR')) {
            $css .= '
			ul.step li em { color: ' . Configuration::get('RTC_O_NUMBER_COLOR') . ' }
			';
        }
        if (Configuration::get('RTC_O_NUMBER_TITLE')) {
            $css .= '
			ul.step li.step_todo span { color: ' . Configuration::get('RTC_O_NUMBER_TITLE') . ' }
			';
        }
        if (Configuration::get('RTC_O_NUMBER_BG_ACTIVE')) {
            $css .= '
			ul.step li.step_current em { background-color: ' . Configuration::get('RTC_O_NUMBER_BG_ACTIVE') . ' }
			';
        }
        if (Configuration::get('RTC_O_NUMBER_BORDER_ACTIVE')) {
            $css .= '
			ul.step li.step_current em { border-color: ' . Configuration::get('RTC_O_NUMBER_BORDER_ACTIVE') . ' }
			';
        }
        if (Configuration::get('RTC_O_NUMBER_COLOR_ACTIVE')) {
            $css .= '
			ul.step li.step_current em { color: ' . Configuration::get('RTC_O_NUMBER_COLOR_ACTIVE') . ' }
			';
        }
        if (Configuration::get('RTC_O_NUMBER_TITLE_ACTIVE')) {
            $css .= '
			ul.step li.step_current span { color: ' . Configuration::get('RTC_O_NUMBER_TITLE_ACTIVE') . ' }
			';
        }
        if (Configuration::get('RTC_O_NUMBER_BG_DONE')) {
            $css .= '
			ul.step li.step_done a em { background-color: ' . Configuration::get('RTC_O_NUMBER_BG_DONE') . ' }
			';
        }
        if (Configuration::get('RTC_O_NUMBER_BORDER_DONE')) {
            $css .= '
			ul.step li.step_done a em { border-color: ' . Configuration::get('RTC_O_NUMBER_BORDER_DONE') . ' }
			';
        }
        if (Configuration::get('RTC_O_NUMBER_COLOR_DONE')) {
            $css .= '
			ul.step li.step_done a em { color: ' . Configuration::get('RTC_O_NUMBER_COLOR_DONE') . ' }
			';
        }
        if (Configuration::get('RTC_O_NUMBER_TITLE_DONE')) {
            $css .= '
			ul.step li.step_done a { color: ' . Configuration::get('RTC_O_NUMBER_TITLE_DONE') . ' }
			';
        }
        if (Configuration::get('RTC_O_NUMBER_BG_DONE_HOVER')) {
            $css .= '
			ul.step li.step_done a:hover em { background-color: ' . Configuration::get('RTC_O_NUMBER_BG_DONE_HOVER') . ' }
			';
        }
        if (Configuration::get('RTC_O_NUMBER_BORDER_DONE_HOVER')) {
            $css .= '
			ul.step li.step_done a:hover em { border-color: ' . Configuration::get('RTC_O_NUMBER_BORDER_DONE_HOVER') . ' }
			';
        }
        if (Configuration::get('RTC_O_NUMBER_COLOR_DONE_HOVER')) {
            $css .= '
			ul.step li.step_done a:hover em { color: ' . Configuration::get('RTC_O_NUMBER_COLOR_DONE_HOVER') . ' }
			';
        }
        if (Configuration::get('RTC_O_NUMBER_TITLE_DONE_HOVER')) {
            $css .= '
			ul.step li.step_done a:hover { color: ' . Configuration::get('RTC_O_NUMBER_TITLE_DONE_HOVER') . ' }
			';
        }

        if (Configuration::get('RTC_O_IMG_BORDER')) {
            $css .= '
			#cart_summary tbody td.cart_product img { border-color: ' . Configuration::get('RTC_O_IMG_BORDER') . ' }
			';
        }
        if (Configuration::get('RTC_O_PRODUCT_NAME')) {
            $css .= '
			#cart_summary tbody td.cart_description .product-name a { color: ' . Configuration::get('RTC_O_PRODUCT_NAME') . ' }
			';
        }
        if (Configuration::get('RTC_O_PRODUCT_ATTS')) {
            $css .= '
			#cart_summary tbody td.cart_description small { color: ' . Configuration::get('RTC_O_PRODUCT_ATTS') . ' }
			#cart_summary tbody td.cart_description small a, #cart_summary tbody td.cart_description small a:hover { color: ' . Configuration::get('RTC_O_PRODUCT_ATTS') . ' }
			';
        }
        if (Configuration::get('RTC_O_REMOVE')) {
            $css .= '
			.cart_delete a.cart_quantity_delete i, a.price_discount_delete i { background-color: ' . Configuration::get('RTC_O_REMOVE') . ' }
			';
        }
        if (Configuration::get('RTC_O_REMOVE_HOVER')) {
            $css .= '
			.cart_delete a.cart_quantity_delete:hover i, a.price_discount_delete:hover i { background-color: ' . Configuration::get('RTC_O_REMOVE_HOVER') . ' }
			';
        }
        if (Configuration::get('RTC_O_TOTAL_TITLE')) {
            $css .= '
			#cart_summary tfoot td.total_price_container span { color: ' . Configuration::get('RTC_O_TOTAL_TITLE') . ' }
			#cart_summary tfoot td.text-right { color: ' . Configuration::get('RTC_O_TOTAL_TITLE') . ' }
			';
        }
        if (Configuration::get('RTC_O_DEL_TITLE')) {
            $css .= '
			.order_carrier_content .carrier_title { color: ' . Configuration::get('RTC_O_DEL_TITLE') . ' }
			#cart_summary tfoot td#total_price_container { color: ' . Configuration::get('RTC_O_DEL_TITLE') . ' }
			';
        }
        if (Configuration::get('RTC_O_DEL_ITEM_BG')) {
            $css .= '
			#order .delivery_option > div > table, #order-opc .delivery_option > div > table { background-color: ' . Configuration::get('RTC_O_DEL_ITEM_BG') . ' }
			';
        }
        if (Configuration::get('RTC_O_DEL_ITEM_TEXT')) {
            $css .= '
			#order .delivery_option > div > table.resume td, #order-opc .delivery_option > div > table.resume td { color: ' . Configuration::get('RTC_O_DEL_ITEM_TEXT') . ' }
			';
        }
        if (Configuration::get('RTC_O_PAY_ITEM_BG')) {
            $css .= '
			p.payment_module a { background-color: ' . Configuration::get('RTC_O_PAY_ITEM_BG') . ' }
			';
        }
        if (Configuration::get('NC_O_PAY_ITEM_BG_HOVER')) {
            $css .= '
			p.payment_module a:hover { background-color: ' . Configuration::get('NC_O_PAY_ITEM_BG_HOVER') . ' }
			';
        }
        if (Configuration::get('NC_O_PAY_ITEM_C_HOVER')) {
            $css .= '
			p.payment_module a:hover { border-color: ' . Configuration::get('NC_O_PAY_ITEM_C_HOVER') . ' }
			p.payment_module a:hover:after { color: ' . Configuration::get('NC_O_PAY_ITEM_C_HOVER') . ' }
			';
        }
        if (Configuration::get('RTC_O_PAY_ITEM_TITLE')) {
            $css .= '
			p.payment_module a { color: ' . Configuration::get('RTC_O_PAY_ITEM_TITLE') . ' }
			';
        }
        if (Configuration::get('RTC_O_PAY_ITEM_DESC')) {
            $css .= '
			p.payment_module a span { color: ' . Configuration::get('RTC_O_PAY_ITEM_DESC') . ' }
			';
        }
        if (Configuration::get('RTC_O_PAY_ITEM_CHEVRON')) {
            $css .= '
			p.payment_module a.cheque:after, p.payment_module a.bankwire:after, p.payment_module a.cash:after { color: ' . Configuration::get('RTC_O_PAY_ITEM_CHEVRON') . ' }
			';
        }




// ****************  FOOTER styles start


        if (Configuration::get('RTC_FOOTER_TOP_LINE')) {
            $css .= '
            .footer-wrapper .footer_topline_bg { background-color: ' . Configuration::get('RTC_FOOTER_TOP_LINE') . '}
			';
        }
        if (Configuration::get('RTC_FOOTER_TOP_LINE_HEADINGS')) {
            $css .= '
            #footer #newsletter_block_left h4 { color: ' . Configuration::get('RTC_FOOTER_TOP_LINE_HEADINGS') . '}
            .footer-wrapper #footer #social_block h4 { color: ' . Configuration::get('RTC_FOOTER_TOP_LINE_HEADINGS') . '}
			';
        }
        if (Configuration::get('RTC_NS_BORDER')) {
            $css .= '
            #footer #newsletter_block_left { border-color: ' . Configuration::get('RTC_NS_BORDER') . '}
            .footer-wrapper #footer #social_block { border-color: ' . Configuration::get('RTC_NS_BORDER') . '}
			';
        }
        if (Configuration::get('RTC_FOOTER_NEWS_INPUT')) {
            $css .= '
            #footer #newsletter_block_left .form-group .form-control { background-color: ' . Configuration::get('RTC_FOOTER_NEWS_INPUT') . '}
			';
        }
        if (Configuration::get('RTC_FOOTER_NEWS_BUTTON')) {
            $css .= '
            #footer #newsletter_block_left .form-group .button-small:before { color: ' . Configuration::get('RTC_FOOTER_NEWS_BUTTON') . '}
			';
        }
        if (Configuration::get('RTC_FOOTER_NEWS_BUTTON_BG')) {
            $css .= '
            #footer #newsletter_block_left .form-group .button-small { background-color: ' . Configuration::get('RTC_FOOTER_NEWS_BUTTON_BG') . '}
			';
        }
        if (Configuration::get('RTC_FOOTER_NEWS_BUTTON_BORDER')) {
            $css .= '
            #footer #newsletter_block_left .form-group .button-small { border-color: ' . Configuration::get('RTC_FOOTER_NEWS_BUTTON_BORDER') . '}
			';
        }
        if (Configuration::get('RTC_FOOTER_NEWS_DISPLAY') == 0) {
            $css .= '
            #footer #newsletter_block_left { display: none !important; }
            .footer-wrapper #footer #social_block {
                padding:16px 30px; }
            @media (min-width: 768px) and (max-width: 1199px) {
                .footer-wrapper #footer #social_block {
                    margin-top:20px;
                    margin-bottom:20px;
                    width:100%; }
                .footer-wrapper #footer #social_block .social_block_container {
                    float:none; } }
			';
        }
        if (Configuration::get('RTC_FOOTER_SOCIAL_DISPLAY') == 0) {
            $css .= '
            .footer-wrapper #footer #social_block { display: none !important; }
            @media (min-width: 768px) and (max-width: 1199px) {
                #footer #newsletter_block_left {
                    width: 100%; } }
			';
        }
        if ((Configuration::get('RTC_FOOTER_NEWS_DISPLAY') == 0) && (Configuration::get('RTC_FOOTER_SOCIAL_DISPLAY') == 0)) {
            $css .= '
            @media (max-width:767px) {
            .footer-wrapper #footer .displayresp { padding-top:140px; }
            }
			';
        }


        if (Configuration::get('RTC_FOOTER_BACKGROUND_COLOR')) {
            $css .= '
            .footer-wrapper { background-color: ' . Configuration::get('RTC_FOOTER_BACKGROUND_COLOR') . '}
            .modezuparrow { background-color: ' . Configuration::get('RTC_FOOTER_BACKGROUND_COLOR') . '}
			';
        }
        if (Configuration::get('NC_FOOTER_HEADINGS')) {
            $css .= '
            .footer-wrapper #footer h4 { color: ' . Configuration::get('NC_FOOTER_HEADINGS') . '}
            .footer-wrapper #footer h4 a,
            .footer-wrapper #footer h4 a,
            .footer-wrapper #footer h4 a:link,
            .footer-wrapper #footer h4 a:visited { color: ' . Configuration::get('NC_FOOTER_HEADINGS') . '}
			';
        }
        if (Configuration::get('NC_F_UNDERLINE')) {
            $css .= '
            .footer-wrapper #footer h4:before { background-color: ' . Configuration::get('NC_F_UNDERLINE') . '!important }
			';
        }
        if (Configuration::get('RTC_FOOTER_TXT_COLOR')) {
            $css .= '
			.footer-wrapper #footer { color: ' . Configuration::get('RTC_FOOTER_TXT_COLOR') . ' }';
        }
        if (Configuration::get('RTC_FOOTER_LINK_COLOR')) {
            $css .= '
			.footer-wrapper #footer a:link { color: ' . Configuration::get('RTC_FOOTER_LINK_COLOR') . ' }
			.footer-wrapper #footer a:visited {	color: ' . Configuration::get('RTC_FOOTER_LINK_COLOR') . ' }';
        }
        if (Configuration::get('RTC_FOOTER_HOVER_COLOR')) {
            $css .= '
			.footer-wrapper #footer a:hover { color: ' . Configuration::get('RTC_FOOTER_HOVER_COLOR') . ' }';
        }
        if (Configuration::get('RTC_FOOTER_UP_BG')) {
            $css .= '
			.modezuparrow span { background-color: ' . Configuration::get('RTC_FOOTER_UP_BG') . ' }';
        }
        if (Configuration::get('RTC_FOOTER_ACCOUNT_DISC')) {
            $css .= '
			.footer-wrapper #footer .footer-block ul.bullet li:before { color: ' . Configuration::get('RTC_FOOTER_ACCOUNT_DISC') . ' }';
        }
        if (Configuration::get('NC_FOOTER_CI_BG')) {
            $css .= '
			.footer-wrapper #footer #block_contact_infos > div ul li i { background-color: ' . Configuration::get('NC_FOOTER_CI_BG') . ' }';
        }
        if (Configuration::get('NC_FOOTER_NEWS_BORDER')) {
            $css .= '
			#footer #newsletter_block_left .block_content { border-color: ' . Configuration::get('NC_FOOTER_NEWS_BORDER') . ' }';
        }



        if (Configuration::get('RTC_UP_ARROW_BORDER')) {
            $css .= '
            .modezuparrow span {
            border-color: ' . Configuration::get('RTC_UP_ARROW_BORDER') . ' }
            ';
        }
        if (Configuration::get('RTC_UP_ARROW_COLOR')) {
            $css .= '
            .modezuparrow span:before { color: ' . Configuration::get('RTC_UP_ARROW_COLOR') . ' }
            ';
        }
        if (Configuration::get('RTC_FOOTER_UP_DISPLAY') == 0) {
            $css .= '
            .modezuparrow { display: none !important; }
			';
        }

        if (Configuration::get('RTC_F_CONTACTS_EXT') && Configuration::get('RTC_FOOTER_CONTACT_DISPLAY') == 1) {

            if (Shop::getContext() == Shop::CONTEXT_SHOP)
                $adv_imgname = 'icons-contacts'.'-'.(int)$this->context->shop->getContextShopID();

            $css .= '
            .icon-map-marker:before { background-image: url(../upload/'.$adv_imgname.'.' . Configuration::get('RTC_F_CONTACTS_EXT') . ') !important;}
            .icon-phone:before { background-image: url(../upload/'.$adv_imgname.'.' . Configuration::get('RTC_F_CONTACTS_EXT') . ') !important;}
            .icon-envelope-alt:before { background-image: url(../upload/'.$adv_imgname.'.' . Configuration::get('RTC_F_CONTACTS_EXT') . ') !important;}
            ';
        }

        if (Configuration::get('RTC_FOOTER_CONTACT_DISPLAY') == 0) {
            $css .= '
            .footer-wrapper #footer #block_contact_infos { display: none !important; }
			';
        }
        if (Configuration::get('RTC_FOOTER_ACCOUNT_DISPLAY') == 0) {
            $css .= '
            .footer-wrapper #footer #block_myaccount_footer { display: none !important; }
			';
        }
        if (Configuration::get('RTC_FOOTER_CATEGORIES_DISPLAY') == 0) {
            $css .= '
            .footer-wrapper #footer .blockcategories_footer { display: none !important; }
			';
        }
        if (Configuration::get('RTC_FOOTER_INFO_DISPLAY') == 0) {
            $css .= '
            .footer-wrapper #footer #block_various_links_footer { display: none !important; }
			';
        }

        if (Configuration::get('RTC_FOOTER_BOTTOM_LINE')) {
            $css .= '
            .footer-wrapper .footer_bottomline_bg { background-color: ' . Configuration::get('RTC_FOOTER_BOTTOM_LINE') . ' }
            @media (max-width: 767px) {
            #roy_payment_logo_block_footer { background-color: ' . Configuration::get('RTC_FOOTER_BOTTOM_LINE') . ' }
            #copyright_footer { background-color: ' . Configuration::get('RTC_FOOTER_BOTTOM_LINE') . ' }
            .footer-wrapper .footer_bottomline_bg { display:none; }
            }
            ';
        }
        if (Configuration::get('RTC_FOOTER_BOTTOM_TEXT')) {
            $css .= '
            #copyright_footer { color: ' . Configuration::get('RTC_FOOTER_BOTTOM_TEXT') . ' }
            ';
        }
        if (Configuration::get('RTC_FOOTER_COPYRIGHT_DISPLAY') == 0) {
            $css .= '
            #copyright_footer { display: none !important; }
			';
        }
        if (Configuration::get('RTC_FOOTER_PAYMENT_DISPLAY') == 0) {
            $css .= '
            #roy_payment_logo_block_footer { display: none !important; }
			';
        }
        if ((Configuration::get('RTC_FOOTER_COPYRIGHT_DISPLAY') == 0) && (Configuration::get('RTC_FOOTER_PAYMENT_DISPLAY') == 0)) {
            $css .= '
            .footer-wrapper .footer_bottomline_bg { display:none!important; }
			';
        }
        if (Configuration::get('RTC_FOOTER_PL_VISA') == 0) {
            $css .= '
            #roy_payment_logo_block_footer .pl_visa { display: none !important; }
			';
        }
        if (Configuration::get('RTC_FOOTER_PL_MASTERCARD') == 0) {
            $css .= '
            #roy_payment_logo_block_footer .pl_mastercard { display: none !important; }
			';
        }
        if (Configuration::get('RTC_FOOTER_PL_MAESTRO') == 0) {
            $css .= '
            #roy_payment_logo_block_footer .pl_maestro { display: none !important; }
			';
        }
        if (Configuration::get('RTC_FOOTER_PL_DISCOVER') == 0) {
            $css .= '
            #roy_payment_logo_block_footer .pl_discover { display: none !important; }
			';
        }
        if (Configuration::get('RTC_FOOTER_PL_PAYPAL') == 0) {
            $css .= '
            #roy_payment_logo_block_footer .pl_paypal { display: none !important; }
			';
        }

        if (Configuration::get('RTC_BL_HEADING')) {
            $css .= '
            .sds_title_block a, .sds_title_block a:hover { color: ' . Configuration::get('RTC_BL_HEADING') . '!important }
            ';
        }
        if (Configuration::get('RTC_BL_BG')) {
            $css .= '
            .sds_blog_post .newsblock { background-color: ' . Configuration::get('RTC_BL_BG') . '!important }
            ';
        }
        if (Configuration::get('RTC_BL_DATE')) {
            $css .= '
            .news_date { color: ' . Configuration::get('RTC_BL_DATE') . '!important }
            ';
        }
        if (Configuration::get('RTC_BL_BORDER')) {
            $css .= '
            .sds_blog_post .newsblock { border-color: ' . Configuration::get('RTC_BL_BORDER') . '!important }
            .sdsarticleCat > div { border-color: ' . Configuration::get('RTC_BL_BORDER') . '!important }
            ';
        }
        if (Configuration::get('RTC_BL_MARK')) {
            $css .= '
            #index .newsblock h4 a:before { background-color: ' . Configuration::get('RTC_BL_MARK') . '!important }
            .sdstitle_block a:before { background-color: ' . Configuration::get('RTC_BL_MARK') . '!important }
            ';
        }

        if (Configuration::get('RTC_BL_RM_BG')) {
            $css .= '
            a.news_more { background-color: ' . Configuration::get('RTC_BL_RM_BG') . '!important }
            .sdsreadMore .more a { background-color: ' . Configuration::get('RTC_BL_RM_BG') . '!important }
            ';
        }
        if (Configuration::get('RTC_BL_RM_BORDER')) {
            $css .= '
            a.news_more { border-color: ' . Configuration::get('RTC_BL_RM_BORDER') . '!important }
            .sdsreadMore .more a { border-color: ' . Configuration::get('RTC_BL_RM_BORDER') . '!important }
            ';
        }

        if (Configuration::get('RTC_BL_RM_BG_ICON')) {
            $css .= '
            a.news_more:before { background-color: ' . Configuration::get('RTC_BL_RM_BG_ICON') . '!important }
            .sdsreadMore .more a:before { background-color: ' . Configuration::get('RTC_BL_RM_BG_ICON') . '!important }
            ';
        }
        if (Configuration::get('RTC_BL_RM_BORDER_ICON')) {
            $css .= '
            a.news_more:before { border-color: ' . Configuration::get('RTC_BL_RM_BORDER_ICON') . '!important }
            .sdsreadMore .more a:before { border-color: ' . Configuration::get('RTC_BL_RM_BORDER_ICON') . '!important }
            ';
        }

        if (Configuration::get('RTC_BL_RM_COLOR')) {
            $css .= '
            a.news_more { color: ' . Configuration::get('RTC_BL_RM_COLOR') . '!important }
            a.news_more:before { color: ' . Configuration::get('RTC_BL_RM_COLOR') . '!important }
            .sdsreadMore .more a { color: ' . Configuration::get('RTC_BL_RM_COLOR') . ' !important}
            .sdsreadMore .more a:before { color: ' . Configuration::get('RTC_BL_RM_COLOR') . '!important }
            ';
        }


        if (Configuration::get('RTC_BL_RM_BG_HOVER')) {
            $css .= '
            a.news_more:hover { background-color: ' . Configuration::get('RTC_BL_RM_BG_HOVER') . '!important }
            a.news_more:hover:before { background-color: ' . Configuration::get('RTC_BL_RM_BG_HOVER') . '!important }
            .sdsreadMore .more a:hover { background-color: ' . Configuration::get('RTC_BL_RM_BG_HOVER') . '!important }
            .sdsreadMore .more a:hover:before { background-color: ' . Configuration::get('RTC_BL_RM_BG_HOVER') . '!important }
            ';
        }
        if (Configuration::get('RTC_BL_RM_BORDER_HOVER')) {
            $css .= '
            a.news_more:hover { border-color: ' . Configuration::get('RTC_BL_RM_BORDER_HOVER') . '!important }
            a.news_more:hover:before { border-color: ' . Configuration::get('RTC_BL_RM_BORDER_HOVER') . '!important }
            .sdsreadMore .more a:hover { border-color: ' . Configuration::get('RTC_BL_RM_BORDER_HOVER') . '!important }
            .sdsreadMore .more a:hover:before { border-color: ' . Configuration::get('RTC_BL_RM_BORDER_HOVER') . '!important }
            ';
        }
        if (Configuration::get('RTC_BL_RM_HOVER')) {
            $css .= '
            a.news_more:hover { color: ' . Configuration::get('RTC_BL_RM_HOVER') . '!important }
            a.news_more:hover:before { color: ' . Configuration::get('RTC_BL_RM_HOVER') . '!important }
            .sdsreadMore .more a:hover { color: ' . Configuration::get('RTC_BL_RM_HOVER') . '!important }
            .sdsreadMore .more a:hover:before { color: ' . Configuration::get('RTC_BL_RM_HOVER') . '!important }
            ';
        }

        if (Configuration::get('RTC_BL_TITLE')) {
            $css .= '
            .sdstitle_block a { color: ' . Configuration::get('RTC_BL_TITLE') . '!important }
            #index .newsblock h4 a { color: ' . Configuration::get('RTC_BL_TITLE') . '!important }
            ';
        }
        if (Configuration::get('RTC_BL_TITLE_HOVER')) {
            $css .= '
            .sdstitle_block a:hover { color: ' . Configuration::get('RTC_BL_TITLE_HOVER') . '!important }
            ';
        }


        if (Configuration::get('RTC_BL_BG_CONTENT')) {
            $css .= '
            .sdsarticleCat > div { background-color: ' . Configuration::get('RTC_BL_BG_CONTENT') . '!important }
            ';
        }
        if (Configuration::get('RTC_BL_META')) {
            $css .= '
            .blogpost-content .meta, .blogpost-content .meta a { color: ' . Configuration::get('RTC_BL_META') . '!important }
            ';
        }
        if (Configuration::get('RTC_BL_COM_BG')) {
            $css .= '
            #articleComments { background-color: ' . Configuration::get('RTC_BL_COM_BG') . '!important }
            .smartblogcomments { background-color: ' . Configuration::get('RTC_BL_COM_BG') . '!important }
            ';
        }
        if (Configuration::get('RTC_BL_COM_NAME')) {
            $css .= '
            .commentList li .name, .commentList li .name a { color: ' . Configuration::get('RTC_BL_COM_NAME') . '!important }
            ';
        }


// ****************  RATINGS styles start


        if (Configuration::get('NC_RGRID') == 0) {
            $css .= '
            ul.product_list.grid li .product-container .comments_note { display: none !important; }
			';
        }
        if (Configuration::get('NC_RNUM') == 0) {
            $css .= '
            ul.product_list.grid .comments_note .nb-comments { display: none !important; }
			';
        }
        if ((Configuration::get('NC_RTOP') == "0") && (Configuration::get('NC_RGRID') == "1")) {
            $css .= '
            ul.product_list.grid li .reviews-container {
                min-height:28px; }
			';
        }
        if (Configuration::get('NC_RTOP') == "1") {
            $css .= '
            ul.product_list.grid li .product-container .comments_note {
            position: absolute;
            top: 0;
            margin-top:-32px;
            background: #ffffff;
            left: 50%;
            margin-left:-47px;
            padding: 4px 10px;
            -webkit-border-radius: 5px 5px 0 0;
            -moz-border-radius: 5px 5px 0 0;
            -ms-border-radius: 5px 5px 0 0;
            -o-border-radius:5px 5px 0 0;
            border-radius: 5px 5px 0 0;
            z-index:2;
            }
            ul.product_list.grid li .product-container .right-block { position:relative; }
            ul.product_list.grid .comments_note .nb-comments { display: none !important; }
			';
        }
        if (Configuration::get('NC_RTOP') == "2") {
            $css .= '
            ul.product_list.grid li .product-container .comments_note {
            position: absolute;
            top: 0;
            background: #ffffff;
            left: 50%;
            margin-left:-47px;
            padding: 4px 10px;
            -webkit-border-radius: 0 0 5px 5px;
            -moz-border-radius: 0 0 5px 5px;
            -ms-border-radius: 0 0 5px 5px;
            -o-border-radius: 0 0 5px 5px;
            border-radius: 0 0 5px 5px;
            z-index:2;
            }
            ul.product_list.grid .comments_note .nb-comments { display: none !important; }
			';
        }
        if (Configuration::get('NC_RBG') && (Configuration::get('NC_RTOP') == "1") || (Configuration::get('NC_RTOP') == "2")) {
            $css .= '
			ul.product_list.grid li .product-container .comments_note { background: ' . Configuration::get('NC_RBG') . '!important }
			';
        }
        if (Configuration::get('NC_RHIDE') == 1 && (Configuration::get('NC_RTOP') == "1") || Configuration::get('NC_RHIDE') == 1 && (Configuration::get('NC_RTOP') == "2")) {
            $css .= '
            ul.product_list.grid li .product-container .comments_note {
            opacity:0;
            -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
                -webkit-transition: opacity 0.2s linear;
                -moz-transition: opacity 0.2s linear;
                -o-transition: opacity 0.2s linear;
                transition: opacity 0.2s linear;
            }
            ul.product_list.grid li:hover .product-container .comments_note {
            opacity:1;
            -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
            }
			';
        }
        if (Configuration::get('NC_RLIST') == 0) {
            $css .= '
            ul.product_list.list li .center-block .comments_note { display: none !important; }
			';
        }
        if (Configuration::get('RTC_PP_REVIEWS_STARON')) {
            $css .= '
			#product_comments_block_tab div.star_on:after { color: ' . Configuration::get('RTC_PP_REVIEWS_STARON') . ' !important }
			div.star.star_on:after { color: ' . Configuration::get('RTC_PP_REVIEWS_STARON') . ' !important }
			';
        }
        if (Configuration::get('RTC_PP_REVIEWS_STAROFF')) {
            $css .= '
			#product_comments_block_tab div.star:after { color: ' . Configuration::get('RTC_PP_REVIEWS_STAROFF') . ' }
			';
        }
        if (Configuration::get('RTC_PP_REVIEWS_NAME')) {
            $css .= '
			#product_comments_block_tab .comment_author_infos strong { color: ' . Configuration::get('RTC_PP_REVIEWS_NAME') . ' }
			';
        }
        if (Configuration::get('RTC_PP_REVIEWS_DATE')) {
            $css .= '
			#product_comments_block_tab .comment_author_infos em { color: ' . Configuration::get('RTC_PP_REVIEWS_DATE') . ' }
			';
        }
        if (Configuration::get('RTC_PP_REVIEWS_NAME_SEPARATOR')) {
            $css .= '
			#product_comments_block_tab div.comment .comment_details { border-left-color: ' . Configuration::get('RTC_PP_REVIEWS_NAME_SEPARATOR') . ' }
			';
        }
        if (Configuration::get('RTC_PP_REVIEWS_BLOCK_SEPARATOR')) {
            $css .= '
			#product_comments_block_tab div.comment { border-top-color: ' . Configuration::get('RTC_PP_REVIEWS_BLOCK_SEPARATOR') . ' }
			';
        }
        if (Configuration::get('RTC_PP_REVIEWS_DISPLAY_TOP') == 0) {
            $css .= '
			.pb-center-column .comments_note { display:none!important; }
			';
        }
        if (Configuration::get('RTC_PP_REVIEWS_USEFUL')) {
            $css .= '
			#product_comments_block_tab div.comment .comment_details ul li { color: ' . Configuration::get('RTC_PP_REVIEWS_USEFUL') . ' }
			';
        }
        if (Configuration::get('RTC_PP_REVIEWS_REPORT')) {
            $css .= '
			#product_comments_block_tab span.report_btn { color: ' . Configuration::get('RTC_PP_REVIEWS_REPORT') . ' }
			';
        }
        if (Configuration::get('RTC_PP_REVIEWS_YN')) {
            $css .= '
			#product_comments_block_tab button.usefulness_btn { color: ' . Configuration::get('RTC_PP_REVIEWS_YN') . ' }
			';
        }
        if (Configuration::get('RTC_PP_REVIEWS_YN_BORDER')) {
            $css .= '
			#product_comments_block_tab button.usefulness_yes { border-right-color: ' . Configuration::get('RTC_PP_REVIEWS_YN_BORDER') . ' }
			';
        }



// ****************  CSS styles start

        if (Configuration::get('NC_CSS') != "") {
            $css .= Configuration::get('NC_CSS');
        }
		

        if (Shop::getContext() == Shop::CONTEXT_SHOP)
            $this -> context -> controller -> addCSS(($this -> _path) . 'css/rt_customizer_'.(int)$this->context->shop->getContextShopID().'.css', 'all');
        $myFile = $this->local_path . "css/rt_customizer_".(int)$this->context->shop->getContextShopID().".css";

        $fh = fopen($myFile, 'w') or die("can't open file");
        fwrite($fh, $css);
        fclose($fh);

    }
	

    public function fontOptions($panel, $panelupper) {
        $html="";
        $html .='<select id="'.$panel.'" name="'.$panel.'">';

        $fonts = explode(';', $this->gfonts);
        foreach ($fonts as $f ){
            $html .='<option ' . ((Configuration::get($panelupper) == $f) ? 'selected="selected" ' : '') . 'value="'.$f.'">'.$f.'</option>';
        }

        $html .='</select>';

        return $html;
    }

    public function backgroundOptions($panel, $panelupper) {
        $html="";
        $html .='
                <div class="roytc_row">
				<label>' . $this->l('Background image') . '</label>
				<div class="margin-form">
					<input id="'.$panel.'_background_image_field" type="file" name="'.$panel.'_background_image_field">
					<input id="'.$panel.'_upload_background" type="submit" class="button" name="'.$panel.'_upload_background" value="upload">
				</div></div>';
        $theme_background_image = Configuration::get('RTC_'.$panelupper.'_BG_EXT');
        if ($theme_background_image != "") {

            if (Shop::getContext() == Shop::CONTEXT_SHOP)
                $adv_imgname = $panel.'_background'.'-'.(int)$this->context->shop->getContextShopID();


            $html .= '
					<label>' . $this->l('Background image') . '</label>
					<div class="margin-form">
					<img class="imgback" src="' . $this -> _path . 'upload/'.$adv_imgname.'.' . $theme_background_image . '" /><br /><br />
					<input id="'.$panel.'_background_image_delete" type="submit" class="button" value="' . $this->l('Delete image') . '" name="'.$panel.'_background_image_delete">
					<p class="clear helpcontent">' . $this->l('If you want to show Gradient schemes, Textures or Main Background Color, delete your background image') . '</p>
					</div>
					<label>' . $this->l('Background repeat') . '</label>
					<div class="margin-form">
					<input type="radio" name="'.$panel.'_bg_repeat" id="'.$panel.'_bg_repeat_0" value="0" ' . ((Configuration::get('RTC_'.$panelupper.'_BG_REPEAT') == 0) ? 'checked="checked" ' : '') . '/>
					<label class="t" for="'.$panel.'_bg_repeat_0">Repeat xy</label>

					<input type="radio" name="'.$panel.'_bg_repeat" id="'.$panel.'_bg_repeat_1" value="1" ' . ((Configuration::get('RTC_'.$panelupper.'_BG_REPEAT') == 1) ? 'checked="checked" ' : '') . '/>
					<label class="t" for="'.$panel.'_bg_repeat_1">Repeat x</label>

					<input type="radio" name="'.$panel.'_bg_repeat" id="'.$panel.'_bg_repeat_2" value="2" ' . ((Configuration::get('RTC_'.$panelupper.'_BG_REPEAT') == 2) ? 'checked="checked" ' : '') . '/>
					<label class="t" for="'.$panel.'_bg_repeat_2">Repeat y</label>

					<input type="radio" name="'.$panel.'_bg_repeat" id="'.$panel.'_bg_repeat_3" value="3" ' . ((Configuration::get('RTC_'.$panelupper.'_BG_REPEAT') == 3) ? 'checked="checked" ' : '') . '/>
					<label class="t" for="'.$panel.'_bg_repeat_3">No repeat</label>
					</div>

					<label>' . $this->l('Background position') . '</label>
					<div class="margin-form">
					<input type="radio" name="'.$panel.'_bg_position" id="'.$panel.'_bg_position_0" value="0" ' . ((Configuration::get('RTC_'.$panelupper.'_BG_POSITION') == 0) ? 'checked="checked" ' : '') . '/>
					<label class="t" for="'.$panel.'_bg_position_0">left</label>

					<input type="radio" name="'.$panel.'_bg_position" id="'.$panel.'_bg_position_1" value="1" ' . ((Configuration::get('RTC_'.$panelupper.'_BG_POSITION') == 1) ? 'checked="checked" ' : '') . '/>
					<label class="t" for="'.$panel.'_bg_position_1">center</label>

					<input type="radio" name="'.$panel.'_bg_position" id="'.$panel.'_bg_position_2" value="2" ' . ((Configuration::get('RTC_'.$panelupper.'_BG_POSITION') == 2) ? 'checked="checked" ' : '') . '/>
					<label class="t" for="'.$panel.'_bg_position_2">right</label>
					</div>

					';
            if($panel=="body"){

                $html .= '<label>' . $this->l('Fixed background attachment') . '</label>
				<div class="margin-form">
					<input type="radio" name="'.$panel.'_bg_fixed" id="'.$panel.'_bg_fixed_1" value="1" ' . ((Configuration::get('RTC_'.$panelupper.'_BG_FIXED') == 1) ? 'checked="checked" ' : '') . '/>
					<label class="t" for="'.$panel.'_bg_fixed_1"> Yes</label>
					<input type="radio" name="'.$panel.'_bg_fixed" id="'.$panel.'_bg_fixed_0" value="0" ' . ((Configuration::get('RTC_'.$panelupper.'_BG_FIXED') == 0) ? 'checked="checked" ' : '') . '/>
					<label class="t" for="'.$panel.'_bg_fixed_0"> No</label>
				</div>';
            }

        }

        return $html;
    }

    function hookHeader($params) {

        if (isset($_SERVER['HTTP_USER_AGENT']) &&
            (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false))
            header('X-UA-Compatible: IE=edge,chrome=1');

        $fontHeadings = Configuration::get('RTC_F_HEADINGS');
        $fontText = Configuration::get('RTC_F_TEXT');
        $fontPrice = Configuration::get('RTC_F_PRICE');

        $ffsuport='';

        if((Configuration::get('RTC_LATIN_EXT') ==1) || (Configuration::get('RTC_CYRILLIC') ==1)){
            $ffsuport.='&subset=';
        }

        if((Configuration::get('RTC_LATIN_EXT')) ==1){
            $ffsuport.='latin,latin-ext';

        }
        if((Configuration::get('RTC_LATIN_EXT') ==1) && (Configuration::get('RTC_CYRILLIC') ==1)){
            $ffsuport.=',';
        }
        if((Configuration::get('RTC_CYRILLIC')) ==1){
            $ffsuport.='cyrillic,cyrillic-ext';
        }

        $font_include='';
        if($fontHeadings == $fontText)
        {
            if (!(in_array($fontHeadings, $this->systemFonts))) {
                $fontHeadingsc = str_replace(' ', '+', $fontHeadings);
                $font_include ="<link href='//fonts.googleapis.com/css?family=".$fontHeadingsc.$ffsuport."' rel='stylesheet' type='text/css'>";
            }
        }
        else{
            if (!(in_array($fontHeadings, $this->systemFonts))) {
                $fontHeadingsc = str_replace(' ', '+', $fontHeadings);

                $font_include ="<link href='//fonts.googleapis.com/css?family=".$fontHeadingsc.$ffsuport."' rel='stylesheet' type='text/css'>";
            }
            if (!(in_array($fontText, $this->systemFonts))) {
                $fontTextc = str_replace(' ', '+', $fontText);
                $font_include .="<link href='//fonts.googleapis.com/css?family=".$fontTextc.$ffsuport."' rel='stylesheet' type='text/css'>";
            }
            if (!(in_array($fontPrice, $this->systemFonts))) {
                $fontPricec = str_replace(' ', '+', $fontPrice);
                $font_include .="<link href='//fonts.googleapis.com/css?family=".$fontPricec.$ffsuport."' rel='stylesheet' type='text/css'>";
            }

        }

        $theme_settings = array(		
			'nc_carousel_featured' => (Configuration::get('NC_CAROUSEL_FEATURED')), 
			'nc_auto_featured' => (Configuration::get('NC_AUTO_FEATURED')), 
			'nc_items_featured' => (Configuration::get('NC_ITEMS_FEATURED')), 
			'nc_carousel_best' => (Configuration::get('NC_CAROUSEL_BEST')), 
			'nc_auto_best' => (Configuration::get('NC_AUTO_BEST')), 
			'nc_items_best' => (Configuration::get('NC_ITEMS_BEST')), 
			'nc_carousel_new' => (Configuration::get('NC_CAROUSEL_NEW')), 
			'nc_auto_new' => (Configuration::get('NC_AUTO_NEW')), 
			'nc_items_new' => (Configuration::get('NC_ITEMS_NEW')), 
			'nc_carousel_sale' => (Configuration::get('NC_CAROUSEL_SALE')), 
			'nc_auto_sale' => (Configuration::get('NC_AUTO_SALE')), 
			'nc_items_sale' => (Configuration::get('NC_ITEMS_SALE')), 
            'font_include' => $font_include,
            'copyright_text' => Configuration::get('RTC_COPYRIGHT_TEXT', $this -> context -> language -> id));

        $this -> context -> smarty -> assign('roythemes', $theme_settings);
        if (Shop::getContext() == Shop::CONTEXT_SHOP)
            $this -> context -> controller -> addCSS(($this -> _path) . 'css/rt_customizer_'.(int)$this->context->shop->getContextShopID().'.css', 'all');
    }

}