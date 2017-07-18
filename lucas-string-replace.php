<?php

    /*
     Plugin Name: Lucas String Replace
     Plugin URI: https://lucas-stadelmeyer.de/plugin/lucas-string-replace
     Description: Lucas String Replace replaces any given string with another string
     Version: 1.2
     Author: Lucas Stadelmeyer
     Author URI: https://lucas-stadelmeyer.de
     License: GPL2
	 
	 Lucas String Replace is free software: you can redistribute it and/or modify
	 it under the terms of the GNU General Public License as published by
	 the Free Software Foundation, either version 2 of the License, or
	 any later version.
	 
  	 Lucas String Replace is distributed in the hope that it will be useful,
	 but WITHOUT ANY WARRANTY; without even the implied warranty of
	 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
	 GNU General Public License for more details.
	 
     You should have received a copy of the GNU General Public License
 	 along with Lucas String Replace. If not, see https://www.google.com/?q=GNU+General+Public+License
		
    */
    
    defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

	/*
	*	Lets get shit done...
	*/

	if ( is_admin() ) {

		/* Call the html code */
		add_action('admin_menu', 'lsr_admin_menu');

		function lsr_admin_menu() {
		add_options_page('Lucas String Replace', 'Lucas String Replace', 'administrator',
		'lucas-string-replace', 'lsr_optionpage');
		}

	}

	add_action( 'admin_init', 'register_lsr_settings' );

	// Settings
	function register_lsr_settings() {
		register_setting( 'lsr_settings', 'lsr_from' );
		register_setting( 'lsr_settings', 'lsr_to' );
        register_setting( 'lsr_settings', 'lsr_workonadminpages' );
	}


	/*
	*	Admin Page
	*/
	require("lucas-string-replace-optionpage.php");

	/*
	*	Core
	*/
	require("lucas-string-replace-core.php");