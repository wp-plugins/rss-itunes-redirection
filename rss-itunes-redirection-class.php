<?php
class iTunesRSSRedirection {

	/**
	 * loads the translations into wordpress
	 */
	function load_translation() {
		$path = dirname( plugin_basename( __FILE__ ) );
		//$path = str_replace('/includes', '/lang/', $path);
		load_plugin_textdomain( 'itunes-rss-redirection', false, $path . '/lang' );
	}

	public function init_translation() {
		// call the load_translation function into the action hook
		add_action( 'init', array( $this, 'load_translation' ) );
	}

	public function create_wp_menu() {
		add_action( 'admin_menu', array( $this, 'wp_menu' ) );
	}

	public function wp_menu( $id ) {
		add_options_page( __( 'iTunes Redirect', 'itunes-rss-redirection' ), __( 'iTunes Redirect', 'itunes-rss-redirection' ), 'administrator', __FILE__, array( $this, 'settings_page' ) );
	}

	function settings_page() {
		?>
		<div class="wrap">
			<div class="icon32" id="icon-options-general"><br></div>
			<h2><?php echo __( 'iTunes Redirect' ) ?></h2>
			<?php
			echo '<div style="float: right; border: 1px solid black; padding: 20px; width: 300px; margin-left: 10px;">';
			echo '<h3>' . __( 'If you like this plugin, please click: ', 'itunes-rss-redirection' ) . '</h3>';
			echo '<p><iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fsocial2business.com%2Findex.php%2Fwordpress-plugins%2Fitunes-rss-redirection%2F&amp;send=false&amp;layout=standard&amp;width=300&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=35&amp;appId=199493520090897" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:300px; height:35px;" allowTransparency="true"></iframe></p>';

			echo '<p><g:plusone style="width: 200px;" annotation="inline" href="http://social2business.com/index.php/wordpress-plugins/itunes-rss-redirection/"></g:plusone><script type="text/javascript">
			  (function() {
			    var po = document.createElement(\'script\'); po.type = \'text/javascript\'; po.async = true;
			    po.src = \'https://apis.google.com/js/plusone.js\';
			    var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(po, s);
			  })();
			</script></p>';
			echo "<script type=\"text/javascript\">
/* <![CDATA[ */
    (function() {
        var s = document.createElement('script'), t = document.getElementsByTagName('script')[0];
        s.type = 'text/javascript';
        s.async = true;
        s.src = 'http://api.flattr.com/js/0.6/load.js?mode=auto';
        t.parentNode.insertBefore(s, t);
    })();
/* ]]> */</script>";
			echo '<p><a class="FlattrButton" style="display:none;" rev="flattr;button:compact;" href="http://social2business.com/index.php/wordpress-plugins/itunes-rss-redirection/"></a>
<noscript><a href="http://flattr.com/thing/558788/iTunes-RSS-Redirection-Weiterleitung" target="_blank">
<img src="http://api.flattr.com/button/flattr-badge-large.png" alt="Flattr this" title="Flattr this" border="0" /></a></noscript></p>';
			echo '<p><a href="https://twitter.com/share" class="twitter-share-button" data-url="http://social2business.com/index.php/wordpress-plugins/itunes-rss-redirection/" data-via="floriansimeth" data-lang="de" data-related="floriansimeth">Twittern</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></p>';
			echo '</div>';

			echo __( 'If you have submitted an RSS-Feed to iTunes and want to change the url to a new feed address you may know that iTunes does not provide a form or something like this. Instead you need a little code-snippet in your RSS 2.0-Feed to change the URL. This plugin will help you to do this.', 'itunes-rss-redirection' );

			?>
			<form action="options.php" method="post">
				<?php settings_fields( 'rss_itunes_redirect_options' ); ?>
				<?php do_settings_sections( __FILE__ ); ?>
				<p class="submit">
					<input name="Submit" type="submit" class="button-primary" value="<?php esc_attr_e( 'Save Changes' ); ?>" />
				</p>
			</form>
			<form action="http://validator.w3.org/feed/check.cgi" method="get" target="_blank">
				<input type="hidden" name="url" value="<?php echo urlencode( get_bloginfo( 'rss2_url' ) ); ?>" />

				<p>
					<input name="Submit" type="submit" class="button-primary" value="<?php echo __( 'Check my feed with the W3C Feed Validator', 'itunes-rss-redirection' ); ?>" />
				</p>
			</form>
		</div>
	<?php
	}

	public function create_wp_settings() {
		add_action( 'admin_init', array( $this, 'wp_settings' ) );
	}

	function wp_settings() {
		register_setting( 'rss_itunes_redirect_options', 'rss_itunes_redirect_options' );

		add_settings_section( 'rss_itunes_redirect_section', __( 'RSS iTunes Redirection Settings', 'itunes-rss-redirection' ), array( $this, 'sectionText' ), __FILE__ );
		add_settings_field( 'iTRSSR_url', __( 'New URL to redirect', 'itunes-rss-redirection' ), array( $this, 'iTRSSR_url' ), __FILE__, 'rss_itunes_redirect_section' );
		add_settings_field( 'iTRSSR_namespace_add', __( 'Add the namespace?', 'itunes-rss-redirection' ), array( $this, 'iTRSSR_namespace_add' ), __FILE__, 'rss_itunes_redirect_section' );
	}

	function iTRSSR_url() {
		$options = get_option( 'rss_itunes_redirect_options' );
		echo "<input id='iTRSSR_url' name='rss_itunes_redirect_options[iTRSSR_url]' size='40' type='text' value='{$options['iTRSSR_url']}' />";
	}

	function iTRSSR_namespace_add() {
		$options = get_option( 'rss_itunes_redirect_options' );
		$checked = '';
		if ( isset( $options['iTRSSR_namespace_add'] ) && $options['iTRSSR_namespace_add'] == 1 ) {
			$checked = 'checked="checked"';
		}
		echo "<input id='iTRSSR_namespace_add' name='rss_itunes_redirect_options[iTRSSR_namespace_add]' type='checkbox' value='1' " . $checked . " /><br />";
		echo __( 'Will add the namespace', 'itunes-rss-redirection' ) . ': <strong>xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd"</strong>';
	}

	function sectionText() {
		echo '<p>' . __( 'If you are using a podcast plugin please check if this plugin adds the namespace. If so, you do not need it again. If you are not using any of these plugins you normally need the namespace. Just check your feed whether you get an error or not:', 'itunes-rss-redirection' ) . ' <a href="http://validator.w3.org/feed/check.cgi?url=' . urlencode( get_bloginfo( 'rss2_url' ) ) . '">' . __( 'Check my feed with the W3C Feed Validator', 'itunes-rss-redirection' ) . '</a></p>';
		echo '<p>' . __( 'If you are using feedburner: Click on Troubleshootize -> Resync to update your feed on this platform as well.', 'itunes-rss-redirection' ) . '</p>';
	}

	function add_itunes_namespace_fn() {
		$options = get_option( 'rss_itunes_redirect_options' );
		if ( isset( $options['iTRSSR_namespace_add'] ) && $options['iTRSSR_namespace_add'] == 1 ) {
			echo 'xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd"' . "\n";
		}
	}

	function add_itunes_redirection_fn() {
		$options = get_option( 'rss_itunes_redirect_options' );
		if ( isset( $options['iTRSSR_url'] ) && ! empty( $options['iTRSSR_url'] ) ) {
			echo "<itunes:new-feed-url>" . $options['iTRSSR_url'] . "</itunes:new-feed-url>\n";
		}
	}

	public function redirection() {
		add_action( 'rss2_ns', array( $this, 'add_itunes_namespace_fn' ) );
		add_action( 'rss2_head', array( $this, 'add_itunes_redirection_fn' ) );
	}

}