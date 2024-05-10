<?php
// Theme Layout Setting
function wallstreet_theme_mode_customizer( $wp_customize ) {

    if(get_option('wallstreet_user', 'new_user') == 'new_user') {
        $default_theme_mode = 'advance_mode';
    }
    else{
        $default_theme_mode = 'legacy_mode';
    }
    

    $wp_customize->add_section('wallstreet_theme_mode_section',
        array(
            'title'     => esc_html__('Theme Mode','wallstreet'),
            'priority'  => 2
        )
    );

    //Column Layout
    $wp_customize->add_setting('wallstreet_theme_mode',
        array(
            'default'               =>  $default_theme_mode,
            'sanitize_callback'     =>  'wallstreet_sanitize_select',
        )
    );  
    $wp_customize->add_control( 'wallstreet_theme_mode',
        array(
            'type'      =>  'radio',
            'label'     =>  esc_html__('Choose Mode Option','wallstreet'),
            'section'   =>  'wallstreet_theme_mode_section',
            'choices'   =>  array(
                                'advance_mode'  =>  __('Advance Mode ( Elementor based )','wallstreet'),
                                'legacy_mode'   =>  __('Legacy Mode ( Customizer based )','wallstreet')
                            ),
        )
    );

}
add_action( 'customize_register', 'wallstreet_theme_mode_customizer' );

// callback function for the theme mode
function wallstreet_theme_mode_callback() {
    $type = get_theme_mod( 'wallstreet_theme_mode','legacy_mode' );

    if ( 'legacy_mode' == $type ) {
        return true;
    } else {
        return false;
    }
}