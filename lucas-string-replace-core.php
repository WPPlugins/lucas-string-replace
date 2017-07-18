<?php

if ( lsr_enabled() ) {
	
    // take that, wordpress svn!
    $lsr_replace_from = get_option('lsr_from');
    $lsr_replace_to   = get_option('lsr_to');
    
	if ( !empty($lsr_replace_to) && !empty($lsr_replace_from) ) {
        
        function lsr_callback($lsr_buffer) {
            
            $lsr_replace_from = get_option('lsr_from');
            $lsr_replace_to   = get_option('lsr_to');

            $lsr_replace_from = explode('||', $lsr_replace_from);

            $lsr_buffer = str_replace($lsr_replace_from,$lsr_replace_to,$lsr_buffer);

            return($lsr_buffer);
            
        }

        function lsr_buffer_start() {ob_start("lsr_callback"); }

        function lsr_buffer_end() {ob_end_flush(); }

        add_action('wp_loaded','lsr_buffer_start');
        add_action('shutdown','lsr_buffer_end');

	}
	
}

// Überprüft, ob LSR eingesetzt werden soll
function lsr_enabled() {
    
    if ($_GET['page'] == "lucas-string-replace") {
        
        // Auf der Pluginseite selbst natürlich nicht
        return(false);
        
    } else if (is_admin() || lsr_is_wplogin()) {
        
        // Falls es eine wp-admin-Seite ist oder der Login
        if (lsr_work_on_admin_pages()) {
            
            // Es ist ausdrücklich erwünscht, also Okay
            return(true);
            
        } else {
            
            // ... oder halt nicht
            return(false);
            
        }
        
    } else {
        
        // Sonst soll es ja immer laufen
        return(true);
        
    }
}

/**
*	lsr_is_wplogin()
*	Checks if current page is wp-login page
*/
function lsr_is_wplogin() {
	
	if (in_array( $GLOBALS['pagenow'], array( 'wp-login.php', 'wp-register.php'))) {
		return(true);
	} else {
		return(false);
	}
	
}

function lsr_work_on_admin_pages() {
    if (get_option('lsr_workonadminpages') == "1") {
        return(true);
    } else {
        return(false);
    }
}