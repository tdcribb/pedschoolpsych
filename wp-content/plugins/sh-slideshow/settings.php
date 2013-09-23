<div class="wrap">
    <div id="icon-options-general" class="icon32"><br></div>
    <h2>SH Slideshow Settings</h2>
    <div style="float:right">
    	<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
            <input type="hidden" name="cmd" value="_donations" />
            <input type="hidden" name="business" value="samhoamt@gmail.com" />
            <input type="hidden" name="item_name" value="SH Slideshow" />
            <input type="hidden" name="currency_code" value="USD" />
            <input type="image" src="<?php echo WP_PLUGIN_URL; ?>/sh-slideshow/donate_btn.gif" name="submit" alt="Make payments with payPal - it's fast, free and secure!" />
        </form>
    </div>
    <?php
		if($_REQUEST['submit']){
			// Update Settings
			update_option('sh_ss_permission',$_REQUEST['permission']);
			update_option('sh_ss_drop_database',$_REQUEST['drop_database']);

			// Message
			echo '<div id="message" class="updated fade">Successfully updated!</div>';
		}

		$permission = get_option('sh_ss_permission', 8);
		$drop_database = get_option('sh_ss_drop_database', 0);
	?>
    <form method="post">
      <table class="form-table">
      	<tbody>
          <tr valign="top">
            <th scope="row"><label for="permission">User Permissions</label></th>
            <td>
							<select id="permission" name="permission">
								<option value="8" <?php if($permission == 8){ echo 'selected="selected"'; } ?>>Administrator only</option>
								<option value="3" <?php if($permission == 3){ echo 'selected="selected"'; } ?>>Administrator, Editor</option>
								<option value="2" <?php if($permission == 2){ echo 'selected="selected"'; } ?>>Administrator, Editor, Author</option>
								<option value="1" <?php if($permission == 1){ echo 'selected="selected"'; } ?>>Administrator, Editor, Author, Contributor</option>
							</select>
						</td>
          </tr>
          <tr valign="top">
            <th scope="row"><label for="drop_database">Delete database when deactivated</label></th>
            <td>
							<select id="drop_database" name="drop_database">
								<option value="1" <?php if($drop_database){ echo 'selected="selected"'; } ?>>Yes</option>
								<option value="0"<?php if(!$drop_database){ echo 'selected="selected"'; } ?>>No</option>
							</select>
						</td>
          </tr>
        </tbody>
      </table>
      <p class="submit">
    		<input type="submit" name="submit" value="Update" />
    	</p>
    </form>
</div>