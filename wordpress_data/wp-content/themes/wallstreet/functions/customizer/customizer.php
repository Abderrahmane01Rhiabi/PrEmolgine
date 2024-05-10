<?php

/* * *********************** Theme Customizer with Sanitize function ******************************** */

function wallstreet_sanitize_fn($wp_customize) {

    //checkbox box sanitization function
    function wallstreet_sanitize_checkbox($checked) {
        // Boolean check.
        return ( ( isset($checked) && true == $checked ) ? 1 : 0 );
    }

    function wallstreet_sanitize_select( $input, $setting ) {
            //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
            $input = sanitize_key($input);
            //get the list of possible radio box options
            $choices = $setting->manager->get_control( $setting->id )->choices;
            //return input if valid or return default option
            return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
    }

}

add_action('customize_register', 'wallstreet_sanitize_fn');
