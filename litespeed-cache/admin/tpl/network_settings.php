<?php
if (!defined('WPINC')) die;

$menuArr = array(
	'general' => __('General', 'litespeed-cache'),
	'excludes' => __('Do Not Cache Rules', 'litespeed-cache'),
	'advanced' => __('Advanced', 'litespeed-cache'),
);

$_options = LiteSpeed_Cache_Config::get_instance()->get_site_options();

?>

<div class="wrap">
	<h2>
		<?=__('LiteSpeed Cache Network Settings', 'litespeed-cache')?>
		<span class="litespeed-desc">
			v<?=LiteSpeed_Cache::PLUGIN_VERSION?>
		</span>
	</h2>
</div>
<div class="wrap">
	<h2 class="nav-tab-wrapper">
	<?php
		foreach ($menuArr as $tab => $val){
			echo "<a class='nav-tab litespeed-tab' href='?page=lscache-settings#$tab' data-litespeed-tab='$tab'>$val</a>";
		}
	?>
	</h2>
	<div class="litespeed-cache-welcome-panel">
		<form method="post" action="options.php" id="ls_form_options">
			<input type="hidden" name="<?=LiteSpeed_Cache::ACTION_KEY?>" value="<?=LiteSpeed_Cache::ACTION_SAVE_SETTINGS_NETWORK?>" />
todo: settings_fields(LiteSpeed_Cache_Config::OPTION_NAME); or wp_nonce_field();
	<?php

	// include all tpl for faster UE
	foreach ($menuArr as $tab => $val) {
		echo "<div data-litespeed-layout='$tab'>";
		if($tab == 'advanced') {
			require LSWCP_DIR . 'admin/tpl/settings_advanced.php';
		}else{
			require LSWCP_DIR . "admin/tpl/network_settings_$tab.php";
		}
		echo "</div>";
	}

	echo "<div class='litespeed-top20'></div>";

	submit_button();

	?>
	</div>
</div>
