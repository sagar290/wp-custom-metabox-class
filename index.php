<?php
error_reporting(E_ALL);
/**
 * @wordpress-plugin
 * Plugin Name:			ALPINE META BOX
 * Plugin URI:			https://www.sagardash.com
 * Description:       	Best Metabox ever.
 * Version:           	1.0.0
 * Author:       		Sagar Dash
 * Author URI:       	https://www.sagardash.com
 * Text Domain:       	tutme
 * License:           	GPL-2.0+
 * License URI:       	http://www.gnu.org/licenses/gpl-2.0.txt
 */

 class Jw_movies_post_type {
    public function __construct()
    {
        $this->register_post_type();
        $this->taxonomies();
        $this->metaboxes();
    }

    public function register_post_type() {
        $args = [
            "labels" => [
                "name" => "Movies",
                "singular_name" => "Movie",
                "add_new" => "Add New Movie",
                "add_new_item" => "Add New Movie",
                "edit_item" => "Edit Item",
                "new_item" => "Add New Item",
                "view_item" => "View Movie",
                "search_items" => "Search Items",
                "not_found" => "No Movies Found",
                "not_found_in_trash" => "No Movies Found in Trash",
                "query_var" => "movies",
            ],
            "rewrite" => [
                "slug" => "movies/"
            ],
            "public" => true,
            "supports" => [
                "title",
                "thumbnai",
                "excerpt",
                "custom-fields"
            ],
//            "menu_position" => 5
        ];
        register_post_type('jw_movie', $args);
    }


    public function taxonomies() {
        $taxonomies = [];

        $taxonomies["genre"] = [
            "hierarchical" => true,
            'query_var' => 'movie_genre',
            "rewrite" => [
                "slug" => "movies/genre",
            ],
            "labels" => [
                "name" => "Genre",
                "singular_name" => "Genre",
                "edit_item" => "Edit Genre",
                "update_item" => "Update Genre",
                "add_new_item" => "Add Genre",
                "new_item_name" => "Add New Genre",
                "all_items" => "All Genre",
                "search_items" => "Search Genres",
                "popular_items" => "Popular Genres",
                "separate_items_with_comments" => "Separate Genre with commas",
                "add_or_remove_items" => "Add or Remove Genres",
                "choose_from_most_used" => "Choose from most used Genres"
            ]
        ];

        $taxonomies["studio"] = [
            "hierarchical" => true,
            'query_var' => 'movie_studio',
            "rewrite" => [
                "slug" => "movies/studio",
            ],
            "labels" => [
                "name" => "studio",
                "singular_name" => "studio",
                "edit_item" => "Edit studio",
                "update_item" => "Update studio",
                "add_new_item" => "Add studio",
                "new_item_name" => "Add New studio",
                "all_items" => "All studio",
                "search_items" => "Search studio",
                "popular_items" => "Popular studio",
                "separate_items_with_comments" => "Separate studio with commas",
                "add_or_remove_items" => "Add or Remove studio",
                "choose_from_most_used" => "Choose from most used studio"
            ]
        ];

        $this->registerAllTaxonomies($taxonomies);
    }

    public function registerAllTaxonomies($taxonomies) {

        foreach ($taxonomies as $name => $arr) {
            register_taxonomy($name, ['jw_movie'], $arr);
        }
    }

    public function metaboxes() {
        add_action("add_meta_boxes", function () {

            add_meta_box("jw_movie_length", "Movie length", "movie_length", "jw_movie");
        });

        function movie_length($post) {
            $length = get_post_meta($post->ID, 'jw_movie_length', true)
            ?>
            <p>
                <label for="jw_movie_length">
                    Length:
                </label>
                <input type="text" class="widefat" name="jw_movie_length" id="jw_movie_length" value="<?php echo $length; ?>" />
            </p>
            <?php
        }

        add_action("save_post", function ($id) {
            if (isset($_POST['jw_movie_length'])) {
                update_post_meta(
                    $id,
                    'jw_movie_length',
                    strip_tags($_POST['jw_movie_length'])
                );
            }
        });
    }

 }

 add_action("init", function() {
    new Jw_movies_post_type();
 });

