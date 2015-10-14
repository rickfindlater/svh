<?php

/********************************
** adamrob.co.uk - 2OCT2014
** Parallax Scroll Wordpress Plugin
**
** For Help and Support please visit www.adamrob.co.uk
**
** Custom Post Options
********************************/
/*
    V0.2 - 7OCT2014 - Added Header Style Parameter
    V0.4 - 31OCT2014 - Added 2 Mobile Turn Off Parameters. Added full width option
    V1.2 - 3FEB2015 - Added parallax image size option
                        Removed blurb text
    V1.4 - 24FEB2015 - Added mobile size option
*/


    // Add the custom Meta Box
    function addnew_meta_parallax_scroll() {
        add_meta_box(
            'parallax_scroll_meta', // $id
            esc_html__('Parallax Scroll Options'), // $title - Translate and escape html
            'show_meta_parallax_scroll', // $callback
            PARALLAX_POSTTYPE, // $page / Post type
            'normal', // $context
            'high'); // $priority - Place as high as we can
    }
    add_action('add_meta_boxes', 'addnew_meta_parallax_scroll');


    // Field Array
    $prefix = 'parallax_meta_';
    $custom_meta_fields = array(
        array(
            'label'=> 'Parallax Height',
            'desc'  => 'The height the parallax element should be in pixels. Set to 0 to auto set the height based on the post content. Minimum height is always 100px',
            'id'    => $prefix.'height',
            'type'  => 'number'
        ),
        array(
            'label'=> 'Parallax Image Size',
            'desc'  => 'The parallax image size will be scaled based on this value. Specify the width in pixels. Set to 0 to auto set the size of the image (recommended)',
            'id'    => $prefix.'pheight',
            'type'  => 'number'
        ),
        array(
            'label'=> 'Horizontal Position',
            'desc'  => 'The horizontal position of the header on the parallax background.',
            'id'    => $prefix.'hpos',
            'type'  => 'select',
            'options' => array (
                'one' => array (
                    'label' => 'Left',
                    'value' => 'left'
                ),
                'two' => array (
                    'label' => 'Centre',
                    'value' => 'center'
                ),
                'three' => array (
                    'label' => 'Right',
                    'value' => 'right'
                )
            )
        ),
        array(
            'label'=> 'Vertical Position',
            'desc'  => 'The vertical position of the header on the parallax background. This setting is ignored if post content is specified.',
            'id'    => $prefix.'vpos',
            'type'  => 'select',
            'options' => array (
                'one' => array (
                    'label' => 'Top',
                    'value' => 'top'
                ),
                'two' => array (
                    'label' => 'Middle',
                    'value' => 'middle'
                ),
                'three' => array (
                    'label' => 'Bottom',
                    'value' => 'bottom'
                )
            )
        ),
        array(
            'label'=> 'Header Style',
            'desc'  => 'Enter the inline CSS style required for the header eg. font-weight: bold; font-size: large;',
            'id'    => $prefix.'hstyle',
            'type'  => 'textarea'
        ),
        array(
            'label'=> 'Full Width',
            'desc'  => 'Display the parallax across the full width of the page. This is a work around to get a full width parallax if its not already. This may not work on some themes.',
            'id'    => $prefix.'FullWidth',
            'type'  => 'checkbox'
        ),
        array(
            'label'=> 'Mobile: Disable Parallax Image',
            'desc'  => 'Select this option if you would rather the background image not display at all on mobile devices.',
            'id'    => $prefix.'DisableParImg',
            'type'  => 'checkbox'
        ),
        array(
            'label'=> 'Mobile: Disable Entire Parallax',
            'desc'  => 'Select this option if you would rather not display any of the parallax content when on mobile device.',
            'id'    => $prefix.'DisableParallax',
            'type'  => 'checkbox'
        ),
        array(
            'label'=> 'Mobile: Image Size',
            'desc'  => 'Set a size here to scale the image size when on a mobile device. Specify the width in pixels. Set to 0 to auto set the size of the image.',
            'id'    => $prefix.'pheightmob',
            'type'  => 'number'
        )
    );

    // The Callback
    function show_meta_parallax_scroll() {
        global $custom_meta_fields, $post;
        // Use nonce for verification
        echo '<input type="hidden" name="parallax_scroll_meta_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';
         
        // Begin the field table and loop
        echo '<table class="form-table">';

        //Display message first
        echo '<tr/><td colspan="2">';
        echo '<p style="">';
        echo '<strong>Parallax Scroll by adamrob.co.uk</strong>';
        echo '<br/>Parallax scroll wil use the information in this post to build a parallax element on your site. This element can then be used in any page/post on your site by using a shortcode.';
        echo '</p>';
        echo '<p style="">';
        echo "<br/><b>What's New?</b><br/>";
        echo "> All help text has now been moved to the help menus. Try clicking the help link in the top right hand corner!";
        echo '</p>';
        echo '<hr>';
        echo '</td></tr>';

        foreach ($custom_meta_fields as $field) {
            // get value of this field if it exists for this post
            $meta = esc_attr(get_post_meta($post->ID, $field['id'], true));
            // begin a table row with
            echo '<tr>
                    <th><label for="'.$field['id'].'">'.$field['label'].'</label></th>
                    <td>';
                    switch($field['type']) {
                        // Text field
                        case 'text':
                            echo '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="30" />
                                <br /><span class="description">'.$field['desc'].'</span>';
                        break;
                        //Number field
                        case 'number':
                            echo '<input type="number" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="30" />
                                <br /><span class="description">'.$field['desc'].'</span>';
                        break;
                        // textarea
                        case 'textarea':
                            echo '<textarea name="'.$field['id'].'" id="'.$field['id'].'" cols="60" rows="4">'.$meta.'</textarea>
                                <br /><span class="description">'.$field['desc'].'</span>';
                        break;

                        // checkbox
                        case 'checkbox':
                            echo '<input type="checkbox" name="'.$field['id'].'" id="'.$field['id'].'" ',$meta ? ' checked="checked"' : '','/>
                                <label for="'.$field['id'].'">'.$field['desc'].'</label>';
                        break;

                        // select
                        case 'select':
                            echo '<select name="'.$field['id'].'" id="'.$field['id'].'">';
                            foreach ($field['options'] as $option) {
                                echo '<option', $meta == $option['value'] ? ' selected="selected"' : '', ' value="'.$option['value'].'">'.$option['label'].'</option>';
                            }
                            echo '</select><br /><span class="description">'.$field['desc'].'</span>';
                        break;

                    } //end switch
            echo '</td></tr>';
        } // end foreach
        echo '</table>'; // end table
    }

    // Save the Data
    function save_meta_parallax_scroll($post_id) {
        global $custom_meta_fields;
         
        // verify nonce
        if (!wp_verify_nonce($_POST['parallax_scroll_meta_nonce'], basename(__FILE__))) 
            return $post_id;
        // check autosave
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
            return $post_id;
        // check permissions
        if ('parallax_scroll' == $_POST['post_type']) {
            if (!current_user_can('edit_page', $post_id))
                return $post_id;
            } elseif (!current_user_can('edit_post', $post_id)) {
                return $post_id;
        }
         
        // loop through fields and save the data
        foreach ($custom_meta_fields as $field) {
            $old = esc_attr(get_post_meta($post_id, $field['id'], true));
            $new = esc_attr($_POST[$field['id']]);
            
            if (isset($new) && $new != $old) {
                update_post_meta($post_id, $field['id'], $new);
            } elseif ('' == $new && $old) {
                delete_post_meta($post_id, $field['id'], $old);
            }
        } // end foreach
    }
    add_action('save_post', 'save_meta_parallax_scroll');

?>