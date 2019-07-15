<?php
function mytheme_customize_register( $wp_customize ){

//  =============================
//  = Panel One               =
//  =============================    
    $wp_customize->add_panel( 'panel_id', array(
        'title'          => 'Height8 customize',
        'priority'       => 20,
        'theme_supports' => '',
        'description'    => '',
    ));

//  =============================
//  = Section One               =
//  =============================    
	$wp_customize->add_section('Home_label', array(
        'panel'     =>  'panel_id',
		'title'    =>__('Home Page','height8'),
        'description' => '',
        'priority' => 20
    ));

//  =============================
//  = Section two Color         =
//  =============================    
    $wp_customize->add_section('Color', array(
        'panel'     =>  'panel_id',
        'title'    =>__('Color Option','height8'),
        'description' => '',
        'priority' => 21
    ));
//  =============================
//  = Section three Color         =
//  =============================  
    $wp_customize->add_section('font_manage', array(
        'panel'     =>  'panel_id',
        'title'    =>__('Font & Border Manage','height8'),
        'description' => '',
        'priority' => 21
    ));
// --------------------------------------------------------
		$wp_customize->add_setting('Home_label_Name', array(
            'default' => 'Mobile :',
            'transport' => 'refresh',
        ));

		$wp_customize->add_control(new WP_Customize_control($wp_customize,'callout-section-headline-control', array(
			'label'      => __('Label Name :','height8'),
			'section'    => 'Home_label',
			'settings'   => 'Home_label_Name',
			'type'		 =>	'text'
		)));
	// --------------------------------------------------------
		$wp_customize->add_setting('Home_textbox_placeholder', array(
            'default' => 'Mobile Number',    
            'transport' => 'refresh',
		));
		$wp_customize->add_control(new WP_Customize_control($wp_customize,'callout-section-Home_textbox_placeholder-controll', array(
			'label'      => 'Textbox Placeholder Name :',
			'section'    => 'Home_label',
			'settings'   => 'Home_textbox_placeholder'
		)));
	// --------------------------------------------------------
		$wp_customize->add_setting('Home_login_button', array(
            'default' => 'Login',
            'transport' => 'refresh',
		));
		$wp_customize->add_control(new WP_Customize_control($wp_customize,'callout-section-Home_login_button-controll', array(
			'label'      => 'Login button :',
			'section'    => 'Home_label',
			'settings'   => 'Home_login_button'
		)));
	// --------------------------------------------------------
		$wp_customize->add_setting('Home_button1', array(
            'default' => 'PLANS',
            'transport' => 'refresh',
		));
		$wp_customize->add_control(new WP_Customize_control($wp_customize,'callout-section-Home_button1-controll', array(
			'label'      => 'Button(Plans) 1 :',
			'section'    => 'Home_label',
			'settings'   => 'Home_button1'
		)));
	// --------------------------------------------------------
		$wp_customize->add_setting('Home_button2', array(
            'default' => 'PAID PACK',
            'transport' => 'refresh',
		));
		$wp_customize->add_control(new WP_Customize_control($wp_customize,'callout-section-Home_button2-controll', array(
			'label'      => 'Button(PaidPack) 2 :',
			'section'    => 'Home_label',
			'settings'   => 'Home_button2'
		)));
	// --------------------------------------------------------
		$wp_customize->add_setting('Home_button3', array(
            'default' => 'VOCHER',
            'transport' => 'refresh',
		));
		$wp_customize->add_control(new WP_Customize_control($wp_customize,'callout-section-Home_button3-controll', array(
			'label'      => 'Button(Vocher) 3 :',
			'section'    => 'Home_label',
			'settings'   => 'Home_button3'
		)));
//  =============================
//  = Text Color                =
//  =============================
        $wp_customize->add_setting('text-color' , array(
            'default'   => '#000000',
            'transport' => 'refresh',
        ));
        $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'text-color-control', array(
            'label'      => __('Text Color','height8'),
            'section'    => 'Color',
            'settings'   => 'text-color'
        )));
//  =============================
//  = link Color                =
//  =============================
        $wp_customize->add_setting('Link-color' , array(
            'default'   => '#0831c9',
            'transport' => 'refresh',
        ));

        $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'Link-color-control', array(
            'label'      => __('Link Color','Height8'),
            'section'    => 'Color',
            'settings'   => 'Link-color'
        )));
//  =============================
//  = Button BG Color           =
//  =============================
        $wp_customize->add_setting('btn-color' , array(
            'default'   => '#008CBA',
            'transport' => 'refresh',
        ));

        $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'btn-color-control', array(
            'label'      => __('Button Color','Height8'),
            'section'    => 'Color',
            'settings'   => 'btn-color'
        )));

//  ====================
//  = Text Color       =
//  ====================
        $wp_customize->add_setting('textcolor-btn-color' , array(
            'default'   => '#000000',
            'transport' => 'refresh',
        ));

        $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'btn-textcolor-btn-control', array(
            'label'      => __('Button Text Color','Height8'),
            'section'    => 'Color',
            'settings'   => 'textcolor-btn-color'
        )));

//  =============================
//  = Button border Color       =
//  =============================
        $wp_customize->add_setting('Border-btn-color' , array(
            'default'   => '#be1dd3',
            'transport' => 'refresh',
        ));

        $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'btn-border-color-control', array(
            'label'      => __('Button Border Color','Height8'),
            'section'    => 'Color',
            'settings'   => 'Border-btn-color'
        )));
//  =============================
//  = Button Hover BG Color     =
//  =============================
        $wp_customize->add_setting('btn-hover-color' , array(
            'default'   => '#3ed1c2',
            'transport' => 'refresh',
        ));

        $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize,'btn-hover-color-control', array(
            'label'      => __('Button hover Color','Height8'),
            'section'    => 'Color',
            'settings'   => 'btn-hover-color'
        )));
//  ====================
//  = Image upload     =
//  ====================
        $wp_customize->add_setting('image_upload', array(
            'default' => ''
        ));
        $wp_customize->add_control(new WP_Customize_Image_control($wp_customize,'image_upload', array(
            'label'      => 'Image Upload',
            'section'    => 'font_manage',
            'settings'   => 'image_upload',        
        )));
//  =============================
//  = Checkbox                  =
//  =============================
    // Font Bold
        $wp_customize->add_setting('chack_Bold', array(
            'default' => 'false'
        ));
        $wp_customize->add_control(new WP_Customize_control($wp_customize,'bold', array(
            'label'      => 'Bold',
            'section'    => 'font_manage',
            'settings'   => 'chack_Bold',
            'type'		 =>	'checkbox'
        )));

    // Font Underline
        $wp_customize->add_setting('chack_Underline', array(
            'default' => 'false'
        ));
        $wp_customize->add_control(new WP_Customize_control($wp_customize,'underline', array(
            'label'      => 'Underline',
            'section'    => 'font_manage',
            'settings'   => 'chack_Underline',
            'type'		 =>	'checkbox'
        )));
    
    // Font Underline
    $wp_customize->add_setting('chack_italic', array(
        'default' => 'false'
    ));
    $wp_customize->add_control(new WP_Customize_control($wp_customize,'italic', array(
        'label'      => 'Italic',
        'section'    => 'font_manage',
        'settings'   => 'chack_italic',
        'type'		 =>	'checkbox'
    )));

//  =============================
//  = Button border Size        =
//  =============================
    $wp_customize->add_setting('Home_border_value', array(
        'default' => ''
    ));
    $wp_customize->add_control(new WP_Customize_control($wp_customize,'callout-section-border-control', array(
        'label'      => 'Border Size :',
        'section'    => 'font_manage',
        'settings'   => 'Home_border_value',
        'type'		 =>	'number',
            'input_attrs' => array( 'min' => 0, 'max' => 10, 'step'  => 1 )
    )));
    
//  =============================
//  = Button border radius      =
//  =============================
$wp_customize->add_setting('border_radius', array(
    'default' => '0px'
));
$wp_customize->add_control(new WP_Customize_control($wp_customize,'callout-section-border_radius-control', array(
    'label'      => 'Border radius :',
    'section'    => 'font_manage',
    'settings'   => 'border_radius',
    'type'		 =>	'number',
    'input_attrs' => array( 'min' => 0, 'max' => 10, 'step'  => 1 )
)));

//  =============================
//  = Select                    =
//  =============================
    $wp_customize->add_setting('border_select', array(
        'default' => ''
    ));
    $wp_customize->add_control(new WP_Customize_control($wp_customize,'select_border', array(
        'label'      => 'Border style',
        'section'    => 'font_manage',
        'settings'   => 'border_select',
        'type'		 =>	'select',
        'choices'    => array(
            'None'  => 'None',
            'Hidden'  => 'Hidden',
            'Solid'  => 'Solid',
            'Dashed'  => 'Dashed',
            'Dotted'  => 'Dotted',
            'Double'  => 'Double',
            'Groove'  => 'Groove',
            'Ridge'  => 'Ridge',
            'Inset'  => 'Inset',
            'Outset'  => 'Outset',
            'Dotted'  => 'Dotted dashed solid double'   
        )
    )));

}
add_action( 'customize_register', 'mytheme_customize_register' );

function linkcss(){
    ?>
        <style>
        /* Link Color */       
            a:link,
            a:visited{
                color: <?php echo get_theme_mod('Link-color') ?>;
            }

        /* font Color */        
            body {
                color: <?php echo get_theme_mod('text-color') ?>;
            }

        /* Button Color */        
            input[id="otp_send"],
            .paid_btn,
            .paid_pack_btn,
            .paid_voucher{
                background-color: <?php echo get_theme_mod('btn-color') ?>
            } 

        /* Button Border */
            input[id="otp_send"],
            .paid_btn,
            .paid_pack_btn,
            .paid_voucher,
            .form-input-username,
            .country{
                color: <?php echo get_theme_mod('textcolor-btn-color') ?>;
                border-style: <?php echo get_theme_mod('border_select') ?>;             /*   Select   */
                border-width: <?php echo get_theme_mod('Home_border_value') . px ?>;
                border-color: <?php echo get_theme_mod('Border-btn-color') ?>;
                border-radius: <?php echo get_theme_mod('border_radius') . px ?>;
            }
            input[id="otp_send"]:hover,
            .paid_btn:hover,
            .paid_pack_btn:hover,
            .paid_voucher:hover{
                background-color: <?php echo get_theme_mod('btn-hover-color') ?>;
            }
        </style>
<!-- ------------------------------------------------------------------------------------------------------------------------- -->
    <!-- checkbox Font size Bold -->
        <?php  if(true === get_theme_mod('chack_Bold')) :  ?>
            <style>
                body{font-weight: bold;}
            </style>
        <?php   endif;  ?>

    <!-- checkbox Font size Underline -->
        <?php  if(true === get_theme_mod('chack_Underline')) :  ?>
            <style>
                body{text-decoration: underline;}
            </style>
        <?php   endif;  ?>
    
    <!-- checkbox Font size italic -->
        <?php  if(true === get_theme_mod('chack_italic')) :  ?>
            <style>
                body{font-style: italic;}
            </style>
        <?php   endif;  ?>
<!-- ------------------------------------------------------------------------------------------------------------------------- -->
    <?php
    }
    add_action( 'wp_head', 'linkcss' );

?>