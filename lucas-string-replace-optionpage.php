<?php

function lsr_optionpage() { ?>
	<div class="wrap">
        
		<style type="text/css">

			.lsr_table {
				width:100%;
			}
			.lsr_label {
				width:40%;
				padding:1%;
			}
			.lsr_area {
				padding:1%;
			}
			.lsr_area textarea {
				width:100%;
				height:100%;
			}
            .lsr_hidden {
                display: none;
            }
            .lsr_paypal {
                float: right;
            }
            .lsr_icon {
                font-size: 1.2em;
                padding-right: 10px;
                padding-top: 2px;
            }
		</style>

	<h1><span class="dashicons dashicons-randomize lsr_icon"></span>Lucas String Replace</h1>
		
		<p><strong>Lucas String Replace replaces any given string on any WordPress processed page with another string.</strong></p>
        <p>
            <a href="https://lucas-stadelmeyer.de/plugins/lucas-string-replace" target="_blank">About</a> | 
            <a href="https://lucas-stadelmeyer.de/plugins/lucas-string-replace#help" target="_blank">Help</a>
        </p>

	<form method="post" action="options.php">
		
		<?php settings_fields( 'lsr_settings' ); ?>
		<?php do_settings_sections( 'lsr_settings' ); ?>
			
			<table class="lsr_table">
				<tr>
					<td class="lsr_label">
						<h3>String(s) to replace</h3>
						<em>Tipp:</em> Add multiple strings to replace by seperating them with ||
					</td>
                    <!--<td></td>-->
					<td class="lsr_label">
						<h3>Replace string(s) with</h3>
					</td>
				</tr>
                
                <tr class="lsr_form">
                    <td class="lsr_area">
                        <textarea name="lsr_from" type="text" id="lsr_rules" placeholder="a||b||c"><?php echo(esc_attr(get_option('lsr_from'))); ?></textarea>
                    </td>
                    <td class="lsr_area">
                        <textarea name="lsr_to" type="text" id="lsr_rules" placeholder="z"><?php echo(esc_attr(get_option('lsr_to'))); ?></textarea>
                    </td>					
                </tr>
				
                <tr>
                    <td style="padding-left: 1%;">
                        <input type="checkbox"
                        id="lsr_workonadminpages"
                        name="lsr_workonadminpages"
                        value="1"
                        <?php echo(checked( 1, get_option( 'lsr_workonadminpages' ), false )); ?>
                        > Work on admin pages, too <small>(except this page)</small>
                    </td>
                </tr>
                
			</table>
		
		<p>
			<?php submit_button(); ?>
		</p>
	</form>
        
        <!-- PayPal Donate Button -->
        <div class="lsr_paypal">
            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
                <input type="hidden" name="cmd" value="_s-xclick">
                <input type="hidden" name="hosted_button_id" value="HYBDX9VDEHANC">
                <span class="dashicons dashicons-smiley"></span> <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                <img alt="" border="0" src="https://www.paypalobjects.com/de_DE/i/scr/pixel.gif" width="1" height="1">
            </form>
        </div>
        
</div>

<?php
} // end option page