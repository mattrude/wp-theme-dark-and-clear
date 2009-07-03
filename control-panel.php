<?php

class ControlPanel
{
	var $Name = null;
	var $Options = array();
	var $Settings = null;
	
	/* Constructor */
	function ControlPanel($Name)
	{
		$this->Name = $Name;
	}
	
	/* Initializing all the settings, and adding all the hooks */
	function Initialize()
	{
		add_action('admin_menu', array(&$this, 'AdminMenu'));
		add_action('admin_head', array(&$this, 'AdminHead'));
		
		/* Get Current Settings */
		$this->Settings = get_option($this->Name . 'Settings');
		if($this->Settings) $this->Settings = unserialize($this->Settings);
		
		/* Initialize Options */
		$this->SetDefaultSettings();
		
		/* Saving Settings */
		if ( $_GET['page'] == basename(__FILE__) )
		{
		
			if ( 'save' == $_REQUEST['action'] )
			{
				$NewSettings = array();
				foreach($this->Options as $Option)
				{
					if(isset($Option['ID']))
					{
						if(isset($_POST[$Option['ID']]))
							$NewSettings [$Option['ID']] = $_POST[$Option['ID']];
						elseif($Option['Type'] == 'CheckBox') // Nothing is POST'ed if a checkbox is unchecked
							$NewSettings [$Option['ID']] = 'false';
					}
				}
				print_r($NewSettings);
				update_option($this->Name . 'Settings', serialize($NewSettings));
				if($_REQUEST['mode'] == 'ajax')
				die($this->Theme . ' Settings Saved Successfully.');
				else
				header('Location: themes.php?page=control-panel.php&saved=true');
				die;
				
			}
			elseif( 'reset' == $_REQUEST['action'] )
			{
				
				header('Location: themes.php?page=control-panel.php&reset=true');
				die;
			
			}
		}
		wp_enqueue_script('control-panel', get_bloginfo('template_url').'/js/control-panel.js', array('jquery'), '1.0');
		wp_enqueue_script('jquery-form', get_bloginfo('template_url').'/js/jquery.form.js', array('jquery'), '1.0');
	}
	function AdminMenu()
	{
		add_theme_page($this->Name . ' Control Panel', $this->Name . ' Control Panel', 'edit_themes', basename(__FILE__), array(&$this, 'OptionsMenu'));
	}
	
	function AdminHead()
	{
	/*	echo '<link rel="stylesheet" href="'.get_bloginfo('template_url').'/control-panel.css" type="text/css" media="screen" />';*/	
	}
	function SetOptions($Options)
	{
		$this->Options = $Options;
	}
	
	function SetDefaultSettings()
	{
		{
			if(isset($Option['ID']))
			{
				if(!isset($this->Settings[$Option['ID']]) && isset($Option['Default']))
				{
					$this->Settings[$Option['ID']] = $Option['Default'];
				}
			}
		}
	}

	/* Print the options page */
	function OptionsMenu()
	{
		echo '<div class="ajaxmessage updated fade below-h2 message"><p></p></div>';
		echo '<div class="metabox-holder wrap" id="poststuff" class="stuffbox">';
		echo '<h2 class="custom">' . $this->Name . ' Settings</h2>';
		if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade below-h2" style="background-color: rgb(255, 251, 204); margin-bottom:16px;"><p style="font-style:normal;font-size:13px;">' . $this->Name . ' Settings Saved Successfully.</p></div>';
		echo '<form method="post" action="themes.php?page=' . basename(__FILE__) . '" id="settings">';
		$Settings = $this->Settings;
		foreach( $this->Options as $Option)
		{
			$Type = $Option['Type'];
			$Label = $Option['Label'];
			$ID = $Option['ID'];
			$Description = $Option['Description'];
			$Value = $Option['Value'];
			$Values = $Option['Values'];
			$ToPrint = '';

			/* Print Options */
			switch ($Type)
			{
				case 'Title':
					$ToPrint .= '<div class="stuffbox custom"><h3 class="hndle">' . $Value . '</h3><div class="inside">';
					break;
				case 'Close':
					$ToPrint .= '<p class="submit custom"><input name="save" type="submit" value="Save All Changes" /><input type="hidden" name="action" value="save" /></p>';
					$ToPrint .= "</div></div>";
					break;
				case 'Text':
					if(isset($Label)) $ToPrint .= '<label for="' .  $ID . '">' . $Label . '<br>';
					$ToPrint .= '<input class="textbox" id="' . $ID . '" name="' .  $ID . '"  type="text" value="' . ($Settings[$ID]) . '"/>';
					if(isset($Label)) $ToPrint .= '</label>';
					if(isset($Description)) $ToPrint .= '<p class="description">' .  $Description . '</p>';
					break;
				case 'TextArea':
					if(isset($Label)) $ToPrint .= '<label for="' .  $ID . '">' . $Label . '<br><br>';
					$ToPrint .= '<textarea  class="textarea" id="' .  $ID . '" name="' .  $ID . '" type="textarea">' . ($Settings[$ID]) . '</textarea>';
					if(isset($Label)) $ToPrint .=  '</label>';
					if(isset($Description)) $ToPrint .= '<p class="description">' .  $Description . '</p>';
					break;
				case 'Select':
					if(isset($Label)) $ToPrint .= '<label for="' .  $ID . '">' . $Label . '<br>';
					$ToPrint .= '<select class="select" name="' .  $ID . '" id="' .  $ID . ' name="' .  $ID . '">' ;
					foreach($Values as $Key => $Value)
						$ToPrint .= '<option value="' . $Key . '" ' . (($Settings[$ID] == $Key)? 'selected="selected"' : '') . '>' .  $Value . '</option>';
					$ToPrint.= '</select>';
					if(isset($Label)) $ToPrint .= '</label>';
					if(isset($Description)) $ToPrint .= '<p class="description">' .  $Description . '</p>';
					break;
				case 'CheckBox':          
					if(isset($Label)) $ToPrint .= '<label for="' .  $ID . '">';
					$ToPrint .= '<input class="checkbox" id="' . $ID . '" name="' . $ID . '"  type="checkbox" value="true"' . 
					($Settings[$ID] == 'true' ? 'checked="checked"': '') . '/> ';
					if(isset($Label)) $ToPrint .= $Label . '</label>';
					if(isset($Description)) $ToPrint .= '<p class="description">' .  $Description . '</p>';
					break; 
			}
			if($ToPrint) echo $ToPrint . '<br>';
		}
		echo '</form>';
	}
	function Settings($Option)
	{
		return $this->Settings[$Option];
	}
}
?>
