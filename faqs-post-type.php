<?php
 
if ( ! function_exists( 'faq_cpt' ) ) {
 
// register custom post type
    function faq_cpt() {
 
        // these are the labels in the admin interface, edit them as you like
        $labels = array(
            'name'                => _x(
 'FAQs', 'Post Type General Name', 'tanveer' ),
            'singular_name'       => _x(
 'FAQ', 'Post Type Singular Name', 'tanveer' ),
            'menu_name'           => __( 'FAQ', 'tanveer' ),
            'parent_item_colon'   => __( 'Parent FAQ:', 'tanveer' ),
            'all_items'           => __( 'All FAQs', 'tanveer' ),
            'view_item'           => __( 'View FAQs', 'tanveer' ),
            'add_new_item'        => __( 'Add New FAQ', 'tanveer' ),
            'add_new'             => __( 'Add New FAQ', 'tanveer' ),
            'edit_item'           => __( 'Edit FAQ', 'tanveer' ),
            'update_item'         => __( 'Update FAQ', 'tanveer' ),
            'search_items'        => __( 'Search FAQ', 'tanveer' ),
            'not_found'           => __( 'Not found', 'tanveer' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'tanveer' ),
        );
        $args = array(
            // use the labels above
            'labels'              => $labels,
            // we'll only need the title, the Visual editor and the excerpt fields for our post type
            'supports'            => array( 'title', 'editor', 'excerpt', ),
            // we're going to create this taxonomy in the next section, but we need to link our post type to it now
            'taxonomies'          => array( 'faq_tax' ),
            // make it public so we can see it in the admin panel and show it in the front-end
            'public'              => true,
            // show the menu item under the Pages item
            'menu_position'       => 20,
            // show archives, if you don't need the shortcode
            'has_archive'         => true,
        );
        register_post_type( 'faq', $args );
 
    }
 
    // hook into the 'init' action
    add_action( 'init', 'faq_cpt', 0 );
 
}
 
?>

<?php
 
if ( ! function_exists( 'faq_tax' ) ) {
 
    // register custom taxonomy
    function faq_tax() {
 
        // again, labels for the admin panel
        $labels = array(
            'name'                       => _x(
 'FAQ Categories', 'Taxonomy General Name', 'tanveer' ),
            'singular_name'              => _x(
 'FAQ Category', 'Taxonomy Singular Name', 'tanveer' ),
            'menu_name'                  => __( 'FAQ Categories', 'tanveer' ),
            'all_items'                  => __( 'All FAQ Cats', 'tanveer' ),
            'parent_item'                => __( 'Parent FAQ Cat', 'tanveer' ),
            'parent_item_colon'          => __( 'Parent FAQ Cat:', 'tanveer' ),
            'new_item_name'              => __( 'New FAQ Cat', 'tanveer' ),
            'add_new_item'               => __( 'Add New FAQ Cat', 'tanveer' ),
            'edit_item'                  => __( 'Edit FAQ Cat', 'tanveer' ),
            'update_item'                => __( 'Update FAQ Cat', 'tanveer' ),
            'separate_items_with_commas' => __( 'Separate items with commas', 'tanveer' ),
            'search_items'               => __( 'Search FAQ', 'tanveer' ),
            'add_or_remove_items'        => __( 'Add or remove FAQ', 'tanveer' ),
            'choose_from_most_used'      => __( 'Choose from the most used FAQ', 'tanveer' ),
            'not_found'                  => __( 'Not Found', 'tanveer' ),
        );
        $args = array(
            // use the labels above
            'labels'                     => $labels,
            // taxonomy should be hierarchial so we can display it like a category section
            'hierarchical'               => true,
            // again, make the taxonomy public (like the post type)
            'public'                     => true,
        );
        // the contents of the array below specifies which post types should the taxonomy be linked to
        register_taxonomy( 'faq_tax', array( 'faq' ), $args );
 
    }
 
    // hook into the 'init' action
    add_action( 'init', 'faq_tax', 0 );
 
}
 
?>