<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for oba details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Theme OBA Mobile.
 *
 * Each setting that is defined in the parent theme Clean should be
 * defined here too, and use the exact same config name. The reason
 * is that theme_obam does not define any layout files to re-use the
 * ones from theme_clean. But as those layout files use the function
 * {@link theme_clean_get_html_for_temp} that belong to Clean,
 * we have to make sure it works as expected by having the same temp
 * in our theme.
 *
 * @see        theme_clean_get_html_for_temp
 * @package    theme_obam
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$settings = null;

defined('MOODLE_INTERNAL') || die;


	$ADMIN->add('themes', new admin_category('theme_obam', 'OBA Mobile'));

    // "geneictemp" settingpage
    $temp = new admin_settingpage('theme_obam_generic',  get_string('geneicsettings', 'theme_obam'));
    // Font Selector.
    $name = 'theme_obam/fontselect';
    $title = get_string('fontselect' , 'theme_obam');
    $description = get_string('fontselectdesc', 'theme_obam');
    $default = '1';
    $choices = array(
    	'1'=>'Oswald & PT Sans', 
    	'2'=>'Lobster & Cabin', 
    	'3'=>'Raleway & Goudy', 
    	'4'=>'Allerta & Crimson Text', 
    	'5'=>'Arvo & PT Sans',
    	'6'=>'Dancing Script & Josefin Sans',
    	'7'=>'Allan & Cardo',
    	'8'=>'Molengo & Lekton',
    	'9'=>'Droid Serif & Droid Sans',
    	'10'=>'Corbin & Nobile',
    	'11'=>'Ubuntu & Vollkorn',
    	'12'=>'Bree Serif & Open Sans', 
    	'13'=>'Bevan & Pontano Sans', 
    	'14'=>'Abril Fatface & Average', 
    	'15'=>'Playfair Display and Muli', 
    	'16'=>'Sansita One & Kameron',
    	'17'=>'Istok Web & Lora',
    	'18'=>'Pacifico & Arimo',
    	'19'=>'Nixie One & Ledger',
    	'20'=>'Cantata One & Imprima',
    	'21'=>'Rancho & Gudea',
    	'22'=>'DISABLE Google Fonts');
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Invert Navbar to dark background.
    $name = 'theme_obam/invert';
    $title = get_string('invert', 'theme_obam');
    $description = get_string('invertdesc', 'theme_obam');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Logo file setting.
    $name = 'theme_obam/logosmall';
    $title = get_string('logo','theme_obam');
    $description = get_string('logodesc', 'theme_obam');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'logosmall');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Custom CSS file.
    $name = 'theme_obam/customcss';
    $title = get_string('customcss', 'theme_obam');
    $description = get_string('customcssdesc', 'theme_obam');
    $default = null;
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // General Alert setting
    $name = 'theme_obam/generalalert';
    $title = get_string('generalalert','theme_obam');
    $description = get_string('generalalertdesc', 'theme_obam');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    // Snow Alert setting
    $name = 'theme_obam/snowalert';
    $title = get_string('snowalert','theme_obam');
    $description = get_string('snowalertdesc', 'theme_obam');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    // Footnote setting.
    $name = 'theme_obam/footnote';
    $title = get_string('footnote', 'theme_obam');
    $description = get_string('footnotedesc', 'theme_obam');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $ADMIN->add('theme_obam', $temp);

    $temp = new admin_settingpage('theme_obam_themecolors',  get_string('themecolorsettings', 'theme_obam'));

 // @textColor setting.
    $name = 'theme_obam/textcolor';
    $title = get_string('textcolor', 'theme_obam');
    $description = get_string('textcolor_desc', 'theme_obam');
    $default = '#3d3d3d';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, null, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // @linkColor setting.
    $name = 'theme_obam/linkcolor';
    $title = get_string('linkcolor', 'theme_obam');
    $description = get_string('linkcolor_desc', 'theme_obam');
    $default = '#415FFB';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, null, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

	 // Main content background color.
    $name = 'theme_obam/contentbackground';
    $title = get_string('contentbackground', 'theme_obam');
    $description = get_string('contentbackground_desc', 'theme_obam');
    $default = '#FFFFFF';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, null, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Secondary background color.
    $name = 'theme_obam/secondarybackground';
    $title = get_string('secondarybackground', 'theme_obam');
    $description = get_string('secondarybackground_desc', 'theme_obam');
    $default = '#B6EBFF';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, null, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Topic and Week Background setting.
    $name = 'theme_obam/topicweekcolor';
    $title = get_string('topicweekcolor', 'theme_obam');
    $description = get_string('topicweekcolor_desc', 'theme_obam');
    $default = '#FFFFFF';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, null, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // @bodyBackground setting.
    $name = 'theme_obam/bodybackground';
    $title = get_string('bodybackground', 'theme_obam');
    $description = get_string('bodybackground_desc', 'theme_obam');
    $default = '#00adee';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, null, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Background image setting.
    $name = 'theme_obam/backgroundimage';
    $title = get_string('backgroundimage', 'theme_obam');
    $description = get_string('backgroundimage_desc', 'theme_obam');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'backgroundimage');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Background repeat setting.
    $name = 'theme_obam/backgroundrepeat';
    $title = get_string('backgroundrepeat', 'theme_obam');
    $description = get_string('backgroundrepeat_desc', 'theme_obam');;
    $default = 'repeat-x';
    $choices = array(
        '0' => get_string('default'),
        'repeat' => get_string('backgroundrepeatrepeat', 'theme_obam'),
        'repeat-x' => get_string('backgroundrepeatrepeatx', 'theme_obam'),
        'repeat-y' => get_string('backgroundrepeatrepeaty', 'theme_obam'),
        'no-repeat' => get_string('backgroundrepeatnorepeat', 'theme_obam'),
    );
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Background position setting.
    $name = 'theme_obam/backgroundposition';
    $title = get_string('backgroundposition', 'theme_obam');
    $description = get_string('backgroundposition_desc', 'theme_obam');
    $default = 'left_bottom';
    $choices = array(
        '0' => get_string('default'),
        'left_top' => get_string('backgroundpositionlefttop', 'theme_obam'),
        'left_center' => get_string('backgroundpositionleftcenter', 'theme_obam'),
        'left_bottom' => get_string('backgroundpositionleftbottom', 'theme_obam'),
        'right_top' => get_string('backgroundpositionrighttop', 'theme_obam'),
        'right_center' => get_string('backgroundpositionrightcenter', 'theme_obam'),
        'right_bottom' => get_string('backgroundpositionrightbottom', 'theme_obam'),
        'center_top' => get_string('backgroundpositioncentertop', 'theme_obam'),
        'center_center' => get_string('backgroundpositioncentercenter', 'theme_obam'),
        'center_bottom' => get_string('backgroundpositioncenterbottom', 'theme_obam'),
    );
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Background fixed setting.
    $name = 'theme_obam/backgroundfixed';
    $title = get_string('backgroundfixed', 'theme_obam');
    $description = get_string('backgroundfixed_desc', 'theme_obam');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Background cover setting.
    $name = 'theme_obam/backgroundcover';
    $title = get_string('backgroundcover', 'theme_obam');
    $description = get_string('backgroundcover_desc', 'theme_obam');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $ADMIN->add('theme_obam', $temp);

    /* Custom Menu temp */
    $temp = new admin_settingpage('theme_obam_custommenu', get_string('custommenuheading', 'theme_obam'));

    // Toggle courses display in custommenu.
    $name = 'theme_obam/displaymycourses';
    $title = get_string('displaymycourses', 'theme_obam');
    $description = get_string('displaymycoursesdesc', 'theme_obam');
    $default = true;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Set terminology for dropdown course list
	$name = 'theme_obam/mycoursetitle';
	$title = get_string('mycoursetitle','theme_obam');
	$description = get_string('mycoursetitledesc', 'theme_obam');
	$default = 'course';
	$choices = array(
		'course' => get_string('mycourses', 'theme_obam'),
		'unit' => get_string('myunits', 'theme_obam'),
		'class' => get_string('myclasses', 'theme_obam'),
		'module' => get_string('mymodules', 'theme_obam')
	);
	$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
	$setting->set_updatedcallback('theme_reset_all_caches');
	$temp->add($setting);
/*
    // Toggle dashboard display in custommenu.
    $name = 'theme_obam/displaymydashboard';
    $title = get_string('displaymydashboard', 'theme_obam');
    $description = get_string('displaymydashboarddesc', 'theme_obam');
    $default = true;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
*/
$ADMIN->add('theme_obam', $temp);

    /* Marketing Spot Settings temp*/
    $temp = new admin_settingpage('theme_obam_marketing', get_string('marketingheading', 'theme_obam'));

    // @Marketing Box background color setting.
    $name = 'theme_obam/marketboxcolor';
    $title = get_string('marketboxcolor', 'theme_obam');
    $description = get_string('marketboxcolor_desc', 'theme_obam');
    $default = '#FFFFFF';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, null, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Toggle Marketing Spots.
    $name = 'theme_obam/togglemarketing';
    $title = get_string('togglemarketing' , 'theme_obam');
    $description = get_string('togglemarketingdesc', 'theme_obam');
    $alwaysdisplay = get_string('alwaysdisplay', 'theme_obam');
    $displaybeforelogin = get_string('displaybeforelogin', 'theme_obam');
    $displayafterlogin = get_string('displayafterlogin', 'theme_obam');
    $dontdisplay = get_string('dontdisplay', 'theme_obam');
    $default = '0';
    $choices = array('1'=>$alwaysdisplay, '2'=>$displaybeforelogin, '3'=>$displayafterlogin, '0'=>$dontdisplay);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // This is the descriptor for Marketing Spot One
    $name = 'theme_obam/marketing1info';
    $heading = get_string('marketing1', 'theme_obam');
    $information = get_string('marketinginfodesc', 'theme_obam');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);
    
    // Marketing Spot One
    $name = 'theme_obam/marketing1';
    $title = get_string('marketingtitle', 'theme_obam');
    $description = get_string('marketingtitledesc', 'theme_obam');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_obam/marketing1icon';
    $title = get_string('marketingicon', 'theme_obam');
    $description = get_string('marketingicondesc', 'theme_obam');
    $default = 'star';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_obam/marketing1content';
    $title = get_string('marketingcontent', 'theme_obam');
    $description = get_string('marketingcontentdesc', 'theme_obam');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_obam/marketing1buttontext';
    $title = get_string('marketingbuttontext', 'theme_obam');
    $description = get_string('marketingbuttontextdesc', 'theme_obam');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_obam/marketing1buttonurl';
    $title = get_string('marketingbuttonurl', 'theme_obam');
    $description = get_string('marketingbuttonurldesc', 'theme_obam');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_obam/marketing1target';
    $title = get_string('marketingurltarget' , 'theme_obam');
    $description = get_string('marketingurltargetdesc', 'theme_obam');
    $target1 = get_string('marketingurltargetself', 'theme_obam');
    $target2 = get_string('marketingurltargetnew', 'theme_obam');
    $target3 = get_string('marketingurltargetparent', 'theme_obam');
    $default = 'target1';
    $choices = array('_self'=>$target1, '_blank'=>$target2, '_parent'=>$target3);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // This is the descriptor for Marketing Spot Two
    $name = 'theme_obam/marketing2info';
    $heading = get_string('marketing2', 'theme_obam');
    $information = get_string('marketinginfodesc', 'theme_obam');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);
    
    // Marketing Spot Two.
    $name = 'theme_obam/marketing2';
    $title = get_string('marketingtitle', 'theme_obam');
    $description = get_string('marketingtitledesc', 'theme_obam');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_obam/marketing2icon';
    $title = get_string('marketingicon', 'theme_obam');
    $description = get_string('marketingicondesc', 'theme_obam');
    $default = 'star';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_obam/marketing2content';
    $title = get_string('marketingcontent', 'theme_obam');
    $description = get_string('marketingcontentdesc', 'theme_obam');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_obam/marketing2buttontext';
    $title = get_string('marketingbuttontext', 'theme_obam');
    $description = get_string('marketingbuttontextdesc', 'theme_obam');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_obam/marketing2buttonurl';
    $title = get_string('marketingbuttonurl', 'theme_obam');
    $description = get_string('marketingbuttonurldesc', 'theme_obam');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_obam/marketing2target';
    $title = get_string('marketingurltarget' , 'theme_obam');
    $description = get_string('marketingurltargetdesc', 'theme_obam');
    $target1 = get_string('marketingurltargetself', 'theme_obam');
    $target2 = get_string('marketingurltargetnew', 'theme_obam');
    $target3 = get_string('marketingurltargetparent', 'theme_obam');
    $default = 'target1';
    $choices = array('_self'=>$target1, '_blank'=>$target2, '_parent'=>$target3);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // This is the descriptor for Marketing Spot Three
    $name = 'theme_obam/marketing3info';
    $heading = get_string('marketing3', 'theme_obam');
    $information = get_string('marketinginfodesc', 'theme_obam');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);
    
    // Marketing Spot Three.
    $name = 'theme_obam/marketing3';
    $title = get_string('marketingtitle', 'theme_obam');
    $description = get_string('marketingtitledesc', 'theme_obam');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_obam/marketing3icon';
    $title = get_string('marketingicon', 'theme_obam');
    $description = get_string('marketingicondesc', 'theme_obam');
    $default = 'star';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_obam/marketing3content';
    $title = get_string('marketingcontent', 'theme_obam');
    $description = get_string('marketingcontentdesc', 'theme_obam');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_obam/marketing3buttontext';
    $title = get_string('marketingbuttontext', 'theme_obam');
    $description = get_string('marketingbuttontextdesc', 'theme_obam');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_obam/marketing3buttonurl';
    $title = get_string('marketingbuttonurl', 'theme_obam');
    $description = get_string('marketingbuttonurldesc', 'theme_obam');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_obam/marketing3target';
    $title = get_string('marketingurltarget' , 'theme_obam');
    $description = get_string('marketingurltargetdesc', 'theme_obam');
    $target1 = get_string('marketingurltargetself', 'theme_obam');
    $target2 = get_string('marketingurltargetnew', 'theme_obam');
    $target3 = get_string('marketingurltargetparent', 'theme_obam');
    $default = 'target1';
    $choices = array('_self'=>$target1, '_blank'=>$target2, '_parent'=>$target3);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $ADMIN->add('theme_obam', $temp);



/* Frontpage Settings temp*/
    $temp = new admin_settingpage('theme_obam_frontpage', get_string('frontpageheading', 'theme_obam'));


// Toggle custom frontpage on or off.
    $name = 'theme_obam/togglefp';
    $title = get_string('togglefp' , 'theme_obam');
    $description = get_string('togglefpdesc', 'theme_obam');
    $fpon = get_string('fpon', 'theme_obam');
    $fpoff = get_string('fpoff', 'theme_obam');
    $default = '2';
    $choices = array('1'=>$fpon, '2'=>$fpoff);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

// Frontpage fullscreen image  file setting.
    $name = 'theme_obam/fpbkg';
    $title = get_string('fpbkg','theme_obam');
    $description = get_string('fpbkgdesc', 'theme_obam');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'fpbkg');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
// Slide Show Background Images for Login Page
    // fullscreen image slideshow file setting.
    // Toggle custom frontpage on or off.
    $name = 'theme_obam/fpslideshow';
    $title = get_string('fpslideshow' , 'theme_obam');
    $description = get_string('fpslideshowdesc', 'theme_obam');
    $fpslideshowon = get_string('fpslideshowon', 'theme_obam');
    $fpslideshowoff = get_string('fpslideshowoff', 'theme_obam');
    $default = '2';
    $choices = array('1'=>$fpslideshowon, '2'=>$fpslideshowoff);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $name = 'theme_obam/back1';
    $title = get_string('back1','theme_obam');
    $description = get_string('backdesc', 'theme_obam');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'back1');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    // fullscreen image slideshow file setting.
    $name = 'theme_obam/back2';
    $title = get_string('back2','theme_obam');
    $description = get_string('backdesc', 'theme_obam');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'back2');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    // fullscreen image slideshow file setting.
    $name = 'theme_obam/back3';
    $title = get_string('back3','theme_obam');
    $description = get_string('backdesc', 'theme_obam');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'back3');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    // fullscreen image slideshow file setting.
    $name = 'theme_obam/back4';
    $title = get_string('back4','theme_obam');
    $description = get_string('backdesc', 'theme_obam');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'back4');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

// CustomFP Text setting.
    $name = 'theme_obam/fptext';
    $title = get_string('fptext', 'theme_obam');
    $description = get_string('fptextdesc', 'theme_obam');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

//Custom Navigation Icons on homepage
    
    // This is the descriptor for icon One
    $name = 'theme_obam/navicon1info';
    $heading = get_string('navicon1', 'theme_obam');
    $information = get_string('navicondesc', 'theme_obam');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    // icon One
    $name = 'theme_obam/nav1icon';
    $title = get_string('navicon', 'theme_obam');
    $description = get_string('navicondesc', 'theme_obam');
    $default = 'home';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_obam/nav1buttontext';
    $title = get_string('naviconbuttontext', 'theme_obam');
    $description = get_string('naviconbuttontextdesc', 'theme_obam');
    $default = 'Dashboard';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_obam/nav1buttonurl';
    $title = get_string('naviconbuttonurl', 'theme_obam');
    $description = get_string('naviconbuttonurldesc', 'theme_obam');
    $default = 'my/';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // icon two
    // This is the descriptor for icon One
    $name = 'theme_obam/navicon2info';
    $heading = get_string('navicon2', 'theme_obam');
    $information = get_string('navicondesc', 'theme_obam');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    $name = 'theme_obam/nav2icon';
    $title = get_string('navicon', 'theme_obam');
    $description = get_string('navicondesc', 'theme_obam');
    $default = 'calendar';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_obam/nav2buttontext';
    $title = get_string('naviconbuttontext', 'theme_obam');
    $description = get_string('naviconbuttontextdesc', 'theme_obam');
    $default = 'Calendar';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_obam/nav2buttonurl';
    $title = get_string('naviconbuttonurl', 'theme_obam');
    $description = get_string('naviconbuttonurldesc', 'theme_obam');
    $default = 'calendar/view.php?view=month';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // icon three
    // This is the descriptor for icon three
    $name = 'theme_obam/navicon3info';
    $heading = get_string('navicon3', 'theme_obam');
    $information = get_string('navicondesc', 'theme_obam');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    $name = 'theme_obam/nav3icon';
    $title = get_string('navicon', 'theme_obam');
    $description = get_string('navicondesc', 'theme_obam');
    $default = 'bookmark';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_obam/nav3buttontext';
    $title = get_string('naviconbuttontext', 'theme_obam');
    $description = get_string('naviconbuttontextdesc', 'theme_obam');
    $default = 'Badges';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_obam/nav3buttonurl';
    $title = get_string('naviconbuttonurl', 'theme_obam');
    $description = get_string('naviconbuttonurldesc', 'theme_obam');
    $default = 'badges/mybadges.php';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);


    // Marketing Spot Four
    // This is the descriptor for icon four
    $name = 'theme_obam/navicon4info';
    $heading = get_string('navicon4', 'theme_obam');
    $information = get_string('navicondesc', 'theme_obam');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    $name = 'theme_obam/nav4icon';
    $title = get_string('navicon', 'theme_obam');
    $description = get_string('navicondesc', 'theme_obam');
    $default = 'table';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_obam/nav4buttontext';
    $title = get_string('naviconbuttontext', 'theme_obam');
    $description = get_string('naviconbuttontextdesc', 'theme_obam');
    $default = 'Grades';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_obam/nav4buttonurl';
    $title = get_string('naviconbuttonurl', 'theme_obam');
    $description = get_string('naviconbuttonurldesc', 'theme_obam');
    $default = 'grade/report/overview/';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

        // Marketing Spot five
    // This is the descriptor for icon four
    $name = 'theme_obam/navicon5info';
    $heading = get_string('navicon5', 'theme_obam');
    $information = get_string('navicondesc', 'theme_obam');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    $name = 'theme_obam/nav5icon';
    $title = get_string('navicon', 'theme_obam');
    $description = get_string('navicondesc', 'theme_obam');
    $default = 'bell';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_obam/nav5buttontext';
    $title = get_string('naviconbuttontext', 'theme_obam');
    $description = get_string('naviconbuttontextdesc', 'theme_obam');
    $default = 'Notifications';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_obam/nav5buttonurl';
    $title = get_string('naviconbuttonurl', 'theme_obam');
    $description = get_string('naviconbuttonurldesc', 'theme_obam');
    $default = 'message/edit.php';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

        // Marketing Spot six
    // This is the descriptor for icon six
    $name = 'theme_obam/navicon6info';
    $heading = get_string('navicon6', 'theme_obam');
    $information = get_string('navicondesc', 'theme_obam');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    $name = 'theme_obam/nav6icon';
    $title = get_string('navicon', 'theme_obam');
    $description = get_string('navicondesc', 'theme_obam');
    $default = 'pencil-square-o';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_obam/nav6buttontext';
    $title = get_string('naviconbuttontext', 'theme_obam');
    $description = get_string('naviconbuttontextdesc', 'theme_obam');
    $default = 'Edit Profile';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_obam/nav6buttonurl';
    $title = get_string('naviconbuttonurl', 'theme_obam');
    $description = get_string('naviconbuttonurldesc', 'theme_obam');
    $default = 'user/edit.php';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

        // Marketing Spot Seven
    // This is the descriptor for icon seven
    $name = 'theme_obam/navicon7info';
    $heading = get_string('navicon7', 'theme_obam');
    $information = get_string('navicondesc', 'theme_obam');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    $name = 'theme_obam/nav7icon';
    $title = get_string('navicon', 'theme_obam');
    $description = get_string('navicondesc', 'theme_obam');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_obam/nav7buttontext';
    $title = get_string('naviconbuttontext', 'theme_obam');
    $description = get_string('naviconbuttontextdesc', 'theme_obam');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_obam/nav7buttonurl';
    $title = get_string('naviconbuttonurl', 'theme_obam');
    $description = get_string('naviconbuttonurldesc', 'theme_obam');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

        // Marketing Spot eight
    // This is the descriptor for icon eight
    $name = 'theme_obam/navicon8info';
    $heading = get_string('navicon8', 'theme_obam');
    $information = get_string('navicondesc', 'theme_obam');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    $name = 'theme_obam/nav8icon';
    $title = get_string('navicon', 'theme_obam');
    $description = get_string('navicondesc', 'theme_obam');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_obam/nav8buttontext';
    $title = get_string('naviconbuttontext', 'theme_obam');
    $description = get_string('naviconbuttontextdesc', 'theme_obam');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_obam/nav8buttonurl';
    $title = get_string('naviconbuttonurl', 'theme_obam');
    $description = get_string('naviconbuttonurldesc', 'theme_obam');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

$ADMIN->add('theme_obam', $temp);


/*Socialwall Settings temp*/
$temp = new admin_settingpage('theme_obam_socialwall', get_string('socialwallheading', 'theme_obam'));

    // Label Post
    $name = 'theme_obam/swlabelpost';
    $title = get_string('swlabelpost','theme_obam');
    $description = get_string('swlabelpost_desc', 'theme_obam');
    $default = '\f086  Post';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    // Label Message
    $name = 'theme_obam/swlabelmessage';
    $title = get_string('swlabelmessage','theme_obam');
    $description = get_string('swlabelmessage_desc', 'theme_obam');
    $default = '\f0e5  Message';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    // Label comment
    $name = 'theme_obam/swlabelcomment';
    $title = get_string('swlabelcomment','theme_obam');
    $description = get_string('swlabelcomment_desc', 'theme_obam');
    $default = '\f0e6  Comments';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    // Label Attachment
    $name = 'theme_obam/swlabelattachment';
    $title = get_string('swlabelattachment','theme_obam');
    $description = get_string('swlabelattachment_desc', 'theme_obam');
    $default = '\f0c6  Attachments';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);


    // Socialwall add a post bkg color.
    $name = 'theme_obam/swaddpost';
    $title = get_string('swaddpost', 'theme_obam');
    $description = get_string('swaddpost_desc', 'theme_obam');
    $default = '#FFFFFF';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, null, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Socialwall post color.
    $name = 'theme_obam/swpost';
    $title = get_string('swpost', 'theme_obam');
    $description = get_string('swpost_desc', 'theme_obam');
    $default = '#FFFFFF';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, null, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Socialwall Message color.
    $name = 'theme_obam/swmessage';
    $title = get_string('swmessage', 'theme_obam');
    $description = get_string('swmessage_desc', 'theme_obam');
    $default = '#F0F3F7';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, null, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Socialwall Attachment color.
    $name = 'theme_obam/swattach';
    $title = get_string('swattach', 'theme_obam');
    $description = get_string('swattach_desc', 'theme_obam');
    $default = '#F6FAA0';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, null, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Socialwall Attachment color.
    $name = 'theme_obam/swcomment';
    $title = get_string('swcomment', 'theme_obam');
    $description = get_string('swcomment_desc', 'theme_obam');
    $default = '#FFFFFF';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, null, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Socialwall Icon and text color.
    $name = 'theme_obam/swicontext';
    $title = get_string('swicontext', 'theme_obam');
    $description = get_string('swicontext_desc', 'theme_obam');
    $default = '#A83116';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, null, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Multilanguage CSS.
    $name = 'theme_obam/swmultilangcss';
    $title = get_string('swmultilangcss', 'theme_obam');
    $description = get_string('swmultilangcss_desc', 'theme_obam');
    $default = '.lang-es.format-socialwall ul.section.tl-postattachment:before { content: "\f0c6  Anexos"; }
.lang-es.format-socialwall .tl-comments:before { content: "\f0e6  Comentarios"; }
.lang-es.format-socialwall .tl-posttext:before{ content: "\f0e5  Mensaje"; }
.lang-es.format-socialwall .tl-post:before{ content: "\f086  Publicación" }

.lang-de.format-socialwall ul.section.tl-postattachment:before { content: "\f0c6  Zubehör"; }
.lang-de.format-socialwall .tl-comments:before { content: "\f0e6  Comments"; }
.lang-de.format-socialwall .tl-posttext:before{ content: "\f0e5  Nachricht"; }
.lang-de.format-socialwall .tl-post:before{ content: "\f086  Post" }

.lang-es_mx.format-socialwall ul.section.tl-postattachment:before { content: "\f0c6  Anexos"; }
.lang-es_mx.format-socialwall .tl-comments:before { content: "\f0e6  Comentarios"; }
.lang-es_mx.format-socialwall .tl-posttext:before{ content: "\f0e5  Mensaje"; }
.lang-es_mx.format-socialwall .tl-post:before{ content: "\f086  Publicación" }

.lang-fr.format-socialwall ul.section.tl-postattachment:before { content: "\f0c6  Pièces jointes"; }
.lang-fr.format-socialwall .tl-comments:before { content: "\f0e6  Commentaires"; }
.lang-fr.format-socialwall .tl-posttext:before{ content: "\f0e5  Message"; }
.lang-fr.format-socialwall .tl-post:before{ content: "\f086  Poste" }

.lang-it.format-socialwall ul.section.tl-postattachment:before { content: "\f0c6  Allegati"; }
.lang-it.format-socialwall .tl-comments:before { content: "\f0e6  Commenti"; }
.lang-it.format-socialwall .tl-posttext:before{ content: "\f0e5  Messaggio"; }
.lang-it.format-socialwall .tl-post:before{ content: "\f086  Posta" }';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

$ADMIN->add('theme_obam', $temp);
