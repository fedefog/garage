<?php 

/* Image Sizes */

if ( function_exists ( 'add_image_size' ) ) 
{
	add_image_size( 'featured-video', 598, 300, true );
	add_image_size( 'featured-video-side', 292, 150, true );
	add_image_size( 'featured-video-sidebar', 262, 150, true );
    add_image_size( 'preview-video', 890, 300, true );
	add_image_size( 'hl-medium', 327, 229, true );
    add_image_size( 'hl-small', 226, 229, true );
    add_image_size( 'hl-big', 276, 322, true );
    add_image_size( 'hl-medium-2', 277, 229, true );
    add_image_size( 'hl-medium-3', 327, 322, true );
    add_image_size( 'hl-extrabig', 569, 322, true );
}

/* TITLES */

function change_post_menu_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Videos';
    $submenu['edit.php'][5][0] = 'Videos';
    $submenu['edit.php'][10][0] = 'Agregar Videos';
    $submenu['edit.php'][15][0] = 'Categoria Videos'; // Change name for categories
    $submenu['edit.php'][16][0] = 'Tags'; // Change name for tags
    echo '';
}

function change_post_object_label() {
        global $wp_post_types;
        $labels = &$wp_post_types['post']->labels;
        $labels->name = 'Videos';
        $labels->singular_name = 'Video';
        $labels->add_new = 'Agregar Video';
        $labels->add_new_item = 'Agregar Video';
        $labels->edit_item = 'Editar Video';
        $labels->new_item = 'Video';
        $labels->view_item = 'Ver Video';
        $labels->search_items = 'Buscar Videos';
        $labels->not_found = 'No hay videos encontrados';
        $labels->not_found_in_trash = 'No hay videos encontrados en la Papelera';
    }
    add_action( 'init', 'change_post_object_label' );
    add_action( 'admin_menu', 'change_post_menu_label' );

/* Highlights */

function highlights_posttype  ( ) 
{
    register_post_type( 'highlights',
        array(
            'labels' => array(
                'name' => __( 'Highlights' ),
                'singular_name' => __( 'Highlight' )
            ),
            'public' => true,
            'supports' => array( 'title', 'editor', 'thumbnail', 'comments' ),
            'capability_type' => 'post',
            'rewrite' => array('slug' => 'highlights'),
            'menu_position' => 4,
            'taxonomies' => array ( 'post_tag' ),
            'register_meta_box_cb' => 'add_highlights_metaboxes'
        )
    );
    
    register_taxonomy( 'cat_highlights' , array ( 'highlights' ) , array (
        'hierarchical' => true ,
        'show_ui' => true ,
        'query_var' => true ,
        'rewrite' => array( 'slug' => 'cat_highlights' ) ,
    ));
    
    
}
 
add_action ( 'init', 'highlights_posttype' );

function add_highlights_metaboxes ( )
{
    add_meta_box ( 'highlights_meta', 'Highlights', 'highlights_meta', 'highlights', 'normal' );
}
 
function highlights_meta ( )
{
    global $post;
    
    echo '<input type="hidden" name="meta_noncename" id="meta_noncename" value="' .
    wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
    
    $vimeo = get_post_meta ( $post->ID , '_vimeo' , true );
    
    echo '<table width="100%" cellpadding="4" cellspacing="10" >';
    
    echo '<tr>';
    
    echo '<td><label for="_vimeo" >ID VIMEO</label></td>';
        
    echo '</tr>';
    
    echo '<tr>';
    
    echo '<td><input type="text" name="_vimeo" name="_vimeo" value="' . $vimeo . '" class="widefat" /></td>';
    
    echo '</tr>';
    
    echo '</table>';
 
} 
 
function highlights_save_meta ( $post_id , $post )
{
    
    if ( !wp_verify_nonce( $_POST['meta_noncename'], plugin_basename(__FILE__) ))
    {
        return $post->ID;
    }
    
    if ( !current_user_can( 'edit_post', $post->ID ))
        return $post->ID;
 
    $highlights_meta['_vimeo'] = $_POST['_vimeo'];
     
    foreach ( $highlights_meta as $key => $value ) 
    {
        if( $post->post_type == 'revision' ) return;
        
        $value = implode(',', (array)$value);
        
        if(get_post_meta($post->ID, $key, FALSE)) 
        {
            update_post_meta($post->ID, $key, $value);
        } 
        else
        {
            add_post_meta($post->ID, $key, $value);
        }
        
        if(!$value) delete_post_meta($post->ID, $key);
    }
 
}
 
add_action ( 'save_post' , 'highlights_save_meta' , 1 , 2 );

function not_blank ( $value )
{
    if ( $value == "" ) $value = "-";
    
    return $value;  
}


/* VIMEO */

function vimeo_add_meta_box() {

    $screens = array( 'post' );

    foreach ( $screens as $screen ) {

        add_meta_box(
            'vimeo_sectionid',
            __( 'Vimeo', 'vimeo_textdomain' ),
            'vimeo_meta_box_callback',
            $screen
        );
    }
}
add_action( 'add_meta_boxes', 'vimeo_add_meta_box' );

/**
 * Prints the box content.
 * 
 * @param WP_Post $post The object for the current post/page.
 */
function vimeo_meta_box_callback( $post ) {

    // Add an nonce field so we can check for it later.
    wp_nonce_field( 'vimeo_meta_box', 'vimeo_meta_box_nonce' );

    /*
     * Use get_post_meta() to retrieve an existing value
     * from the database and use the value for the form.
     */
    $vimeo_value = get_post_meta( $post->ID, 'vimeo_value_key', true );

    echo '<label for="vimeo_new_field">';
    _e( '', 'vimeo_textdomain' );
    echo '</label> ';
    echo '<input type="text" style="width:100%;" id="vimeo_new_field" name="vimeo_new_field" value="' . esc_attr( $vimeo_value ) . '" size="25" />';
}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function vimeo_save_meta_box_data( $post_id ) {

    /*
     * We need to verify this came from our screen and with proper authorization,
     * because the save_post action can be triggered at other times.
     */

    // Check if our nonce is set.
    if ( ! isset( $_POST['vimeo_meta_box_nonce'] ) ) {
        return;
    }

    // Verify that the nonce is valid.
    if ( ! wp_verify_nonce( $_POST['vimeo_meta_box_nonce'], 'vimeo_meta_box' ) ) {
        return;
    }

    // If this is an autosave, our form has not been submitted, so we don't want to do anything.
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    // Check the user's permissions.
    if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

        if ( ! current_user_can( 'edit_page', $post_id ) ) {
            return;
        }

    } else {

        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }
    }

    /* OK, its safe for us to save the data now. */
    
    // Make sure that it is set.
    if ( ! isset( $_POST['vimeo_new_field'] ) ) {
        return;
    }

    // Sanitize user input.
    $vimeo_data = sanitize_text_field( $_POST['vimeo_new_field'] );

    // Update the meta field in the database.
    update_post_meta( $post_id, 'vimeo_value_key', $vimeo_data );
}
add_action( 'save_post', 'vimeo_save_meta_box_data' );