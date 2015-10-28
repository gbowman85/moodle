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
 * Theme OBA.
 *
 * Each setting that is defined in the parent theme Clean should be
 * defined here too, and use the exact same config name. The reason
 * is that theme_oba does not define any layout files to re-use the
 * ones from theme_clean. But as those layout files use the function
 * {@link theme_clean_get_html_for_temp} that belong to Clean,
 * we have to make sure it works as expected by having the same temp
 * in our theme.
 *
 * @see        theme_clean_get_html_for_temp
 * @package    theme_oba
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$settings = null;

defined('MOODLE_INTERNAL') || die;


	$ADMIN->add('themes', new admin_category('theme_oba', 'OBA'));

    // "geneictemp" settingpage
    $temp = new admin_settingpage('theme_oba_generic',  get_string('geneicsettings', 'theme_oba'));
    // Font Selector.
    $name = 'theme_oba/fontselect';
    $title = get_string('fontselect' , 'theme_oba');
    $description = get_string('fontselectdesc', 'theme_oba');
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
    $name = 'theme_oba/invert';
    $title = get_string('invert', 'theme_oba');
    $description = get_string('invertdesc', 'theme_oba');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Logo file setting.
    $name = 'theme_oba/logosmall';
    $title = get_string('logo','theme_oba');
    $description = get_string('logodesc', 'theme_oba');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'logosmall');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Custom CSS file.
    $name = 'theme_oba/customcss';
    $title = get_string('customcss', 'theme_oba');
    $description = get_string('customcssdesc', 'theme_oba');
    $default = null;
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // General Alert setting
    $name = 'theme_oba/generalalert';
    $title = get_string('generalalert','theme_oba');
    $description = get_string('generalalertdesc', 'theme_oba');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    // Snow Alert setting
    $name = 'theme_oba/snowalert';
    $title = get_string('snowalert','theme_oba');
    $description = get_string('snowalertdesc', 'theme_oba');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    // Footnote setting.
    $name = 'theme_oba/footnote';
    $title = get_string('footnote', 'theme_oba');
    $description = get_string('footnotedesc', 'theme_oba');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $ADMIN->add('theme_oba', $temp);

    $temp = new admin_settingpage('theme_oba_themecolors',  get_string('themecolorsettings', 'theme_oba'));

 // @textColor setting.
    $name = 'theme_oba/textcolor';
    $title = get_string('textcolor', 'theme_oba');
    $description = get_string('textcolor_desc', 'theme_oba');
    $default = '#3d3d3d';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, null, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // @linkColor setting.
    $name = 'theme_oba/linkcolor';
    $title = get_string('linkcolor', 'theme_oba');
    $description = get_string('linkcolor_desc', 'theme_oba');
    $default = '#415FFB';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, null, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

	 // Main content background color.
    $name = 'theme_oba/contentbackground';
    $title = get_string('contentbackground', 'theme_oba');
    $description = get_string('contentbackground_desc', 'theme_oba');
    $default = '#FFFFFF';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, null, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Secondary background color.
    $name = 'theme_oba/secondarybackground';
    $title = get_string('secondarybackground', 'theme_oba');
    $description = get_string('secondarybackground_desc', 'theme_oba');
    $default = '#B6EBFF';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, null, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Topic and Week Background setting.
    $name = 'theme_oba/topicweekcolor';
    $title = get_string('topicweekcolor', 'theme_oba');
    $description = get_string('topicweekcolor_desc', 'theme_oba');
    $default = '#FFFFFF';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, null, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // @bodyBackground setting.
    $name = 'theme_oba/bodybackground';
    $title = get_string('bodybackground', 'theme_oba');
    $description = get_string('bodybackground_desc', 'theme_oba');
    $default = '#00adee';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, null, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Background image setting.
    $name = 'theme_oba/backgroundimage';
    $title = get_string('backgroundimage', 'theme_oba');
    $description = get_string('backgroundimage_desc', 'theme_oba');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'backgroundimage');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Background repeat setting.
    $name = 'theme_oba/backgroundrepeat';
    $title = get_string('backgroundrepeat', 'theme_oba');
    $description = get_string('backgroundrepeat_desc', 'theme_oba');;
    $default = 'repeat-x';
    $choices = array(
        '0' => get_string('default'),
        'repeat' => get_string('backgroundrepeatrepeat', 'theme_oba'),
        'repeat-x' => get_string('backgroundrepeatrepeatx', 'theme_oba'),
        'repeat-y' => get_string('backgroundrepeatrepeaty', 'theme_oba'),
        'no-repeat' => get_string('backgroundrepeatnorepeat', 'theme_oba'),
    );
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Background position setting.
    $name = 'theme_oba/backgroundposition';
    $title = get_string('backgroundposition', 'theme_oba');
    $description = get_string('backgroundposition_desc', 'theme_oba');
    $default = 'left_bottom';
    $choices = array(
        '0' => get_string('default'),
        'left_top' => get_string('backgroundpositionlefttop', 'theme_oba'),
        'left_center' => get_string('backgroundpositionleftcenter', 'theme_oba'),
        'left_bottom' => get_string('backgroundpositionleftbottom', 'theme_oba'),
        'right_top' => get_string('backgroundpositionrighttop', 'theme_oba'),
        'right_center' => get_string('backgroundpositionrightcenter', 'theme_oba'),
        'right_bottom' => get_string('backgroundpositionrightbottom', 'theme_oba'),
        'center_top' => get_string('backgroundpositioncentertop', 'theme_oba'),
        'center_center' => get_string('backgroundpositioncentercenter', 'theme_oba'),
        'center_bottom' => get_string('backgroundpositioncenterbottom', 'theme_oba'),
    );
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Background fixed setting.
    $name = 'theme_oba/backgroundfixed';
    $title = get_string('backgroundfixed', 'theme_oba');
    $description = get_string('backgroundfixed_desc', 'theme_oba');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Background cover setting.
    $name = 'theme_oba/backgroundcover';
    $title = get_string('backgroundcover', 'theme_oba');
    $description = get_string('backgroundcover_desc', 'theme_oba');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $ADMIN->add('theme_oba', $temp);

    /* Custom Menu temp */
    $temp = new admin_settingpage('theme_oba_custommenu', get_string('custommenuheading', 'theme_oba'));

    // Toggle courses display in custommenu.
    $name = 'theme_oba/displaymycourses';
    $title = get_string('displaymycourses', 'theme_oba');
    $description = get_string('displaymycoursesdesc', 'theme_oba');
    $default = true;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Set terminology for dropdown course list
	$name = 'theme_oba/mycoursetitle';
	$title = get_string('mycoursetitle','theme_oba');
	$description = get_string('mycoursetitledesc', 'theme_oba');
	$default = 'course';
	$choices = array(
		'course' => get_string('mycourses', 'theme_oba'),
		'unit' => get_string('myunits', 'theme_oba'),
		'class' => get_string('myclasses', 'theme_oba'),
		'module' => get_string('mymodules', 'theme_oba')
	);
	$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
	$setting->set_updatedcallback('theme_reset_all_caches');
	$temp->add($setting);
/*
    // Toggle dashboard display in custommenu.
    $name = 'theme_oba/displaymydashboard';
    $title = get_string('displaymydashboard', 'theme_oba');
    $description = get_string('displaymydashboarddesc', 'theme_oba');
    $default = true;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
*/
$ADMIN->add('theme_oba', $temp);

    /* Marketing Spot Settings temp*/
    $temp = new admin_settingpage('theme_oba_marketing', get_string('marketingheading', 'theme_oba'));

    // @Marketing Box background color setting.
    $name = 'theme_oba/marketboxcolor';
    $title = get_string('marketboxcolor', 'theme_oba');
    $description = get_string('marketboxcolor_desc', 'theme_oba');
    $default = '#FFFFFF';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, null, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Toggle Marketing Spots.
    $name = 'theme_oba/togglemarketing';
    $title = get_string('togglemarketing' , 'theme_oba');
    $description = get_string('togglemarketingdesc', 'theme_oba');
    $alwaysdisplay = get_string('alwaysdisplay', 'theme_oba');
    $displaybeforelogin = get_string('displaybeforelogin', 'theme_oba');
    $displayafterlogin = get_string('displayafterlogin', 'theme_oba');
    $dontdisplay = get_string('dontdisplay', 'theme_oba');
    $default = '0';
    $choices = array('1'=>$alwaysdisplay, '2'=>$displaybeforelogin, '3'=>$displayafterlogin, '0'=>$dontdisplay);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // This is the descriptor for Marketing Spot One
    $name = 'theme_oba/marketing1info';
    $heading = get_string('marketing1', 'theme_oba');
    $information = get_string('marketinginfodesc', 'theme_oba');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);
    
    // Marketing Spot One
    $name = 'theme_oba/marketing1';
    $title = get_string('marketingtitle', 'theme_oba');
    $description = get_string('marketingtitledesc', 'theme_oba');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_oba/marketing1icon';
    $title = get_string('marketingicon', 'theme_oba');
    $description = get_string('marketingicondesc', 'theme_oba');
    $default = 'star';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_oba/marketing1content';
    $title = get_string('marketingcontent', 'theme_oba');
    $description = get_string('marketingcontentdesc', 'theme_oba');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_oba/marketing1buttontext';
    $title = get_string('marketingbuttontext', 'theme_oba');
    $description = get_string('marketingbuttontextdesc', 'theme_oba');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_oba/marketing1buttonurl';
    $title = get_string('marketingbuttonurl', 'theme_oba');
    $description = get_string('marketingbuttonurldesc', 'theme_oba');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_oba/marketing1target';
    $title = get_string('marketingurltarget' , 'theme_oba');
    $description = get_string('marketingurltargetdesc', 'theme_oba');
    $target1 = get_string('marketingurltargetself', 'theme_oba');
    $target2 = get_string('marketingurltargetnew', 'theme_oba');
    $target3 = get_string('marketingurltargetparent', 'theme_oba');
    $default = 'target1';
    $choices = array('_self'=>$target1, '_blank'=>$target2, '_parent'=>$target3);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // This is the descriptor for Marketing Spot Two
    $name = 'theme_oba/marketing2info';
    $heading = get_string('marketing2', 'theme_oba');
    $information = get_string('marketinginfodesc', 'theme_oba');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);
    
    // Marketing Spot Two.
    $name = 'theme_oba/marketing2';
    $title = get_string('marketingtitle', 'theme_oba');
    $description = get_string('marketingtitledesc', 'theme_oba');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_oba/marketing2icon';
    $title = get_string('marketingicon', 'theme_oba');
    $description = get_string('marketingicondesc', 'theme_oba');
    $default = 'star';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_oba/marketing2content';
    $title = get_string('marketingcontent', 'theme_oba');
    $description = get_string('marketingcontentdesc', 'theme_oba');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_oba/marketing2buttontext';
    $title = get_string('marketingbuttontext', 'theme_oba');
    $description = get_string('marketingbuttontextdesc', 'theme_oba');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_oba/marketing2buttonurl';
    $title = get_string('marketingbuttonurl', 'theme_oba');
    $description = get_string('marketingbuttonurldesc', 'theme_oba');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_oba/marketing2target';
    $title = get_string('marketingurltarget' , 'theme_oba');
    $description = get_string('marketingurltargetdesc', 'theme_oba');
    $target1 = get_string('marketingurltargetself', 'theme_oba');
    $target2 = get_string('marketingurltargetnew', 'theme_oba');
    $target3 = get_string('marketingurltargetparent', 'theme_oba');
    $default = 'target1';
    $choices = array('_self'=>$target1, '_blank'=>$target2, '_parent'=>$target3);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // This is the descriptor for Marketing Spot Three
    $name = 'theme_oba/marketing3info';
    $heading = get_string('marketing3', 'theme_oba');
    $information = get_string('marketinginfodesc', 'theme_oba');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);
    
    // Marketing Spot Three.
    $name = 'theme_oba/marketing3';
    $title = get_string('marketingtitle', 'theme_oba');
    $description = get_string('marketingtitledesc', 'theme_oba');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_oba/marketing3icon';
    $title = get_string('marketingicon', 'theme_oba');
    $description = get_string('marketingicondesc', 'theme_oba');
    $default = 'star';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_oba/marketing3content';
    $title = get_string('marketingcontent', 'theme_oba');
    $description = get_string('marketingcontentdesc', 'theme_oba');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_oba/marketing3buttontext';
    $title = get_string('marketingbuttontext', 'theme_oba');
    $description = get_string('marketingbuttontextdesc', 'theme_oba');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_oba/marketing3buttonurl';
    $title = get_string('marketingbuttonurl', 'theme_oba');
    $description = get_string('marketingbuttonurldesc', 'theme_oba');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_oba/marketing3target';
    $title = get_string('marketingurltarget' , 'theme_oba');
    $description = get_string('marketingurltargetdesc', 'theme_oba');
    $target1 = get_string('marketingurltargetself', 'theme_oba');
    $target2 = get_string('marketingurltargetnew', 'theme_oba');
    $target3 = get_string('marketingurltargetparent', 'theme_oba');
    $default = 'target1';
    $choices = array('_self'=>$target1, '_blank'=>$target2, '_parent'=>$target3);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $ADMIN->add('theme_oba', $temp);



/* Frontpage Settings temp*/
    $temp = new admin_settingpage('theme_oba_frontpage', get_string('frontpageheading', 'theme_oba'));


// Toggle custom frontpage on or off.
    $name = 'theme_oba/togglefp';
    $title = get_string('togglefp' , 'theme_oba');
    $description = get_string('togglefpdesc', 'theme_oba');
    $fpon = get_string('fpon', 'theme_oba');
    $fpoff = get_string('fpoff', 'theme_oba');
    $default = '2';
    $choices = array('1'=>$fpon, '2'=>$fpoff);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

// Frontpage fullscreen image  file setting.
    $name = 'theme_oba/fpbkg';
    $title = get_string('fpbkg','theme_oba');
    $description = get_string('fpbkgdesc', 'theme_oba');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'fpbkg');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
// Slide Show Background Images for Login Page
    // fullscreen image slideshow file setting.
    // Toggle custom frontpage on or off.
    $name = 'theme_oba/fpslideshow';
    $title = get_string('fpslideshow' , 'theme_oba');
    $description = get_string('fpslideshowdesc', 'theme_oba');
    $fpslideshowon = get_string('fpslideshowon', 'theme_oba');
    $fpslideshowoff = get_string('fpslideshowoff', 'theme_oba');
    $default = '2';
    $choices = array('1'=>$fpslideshowon, '2'=>$fpslideshowoff);
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $name = 'theme_oba/back1';
    $title = get_string('back1','theme_oba');
    $description = get_string('backdesc', 'theme_oba');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'back1');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    // fullscreen image slideshow file setting.
    $name = 'theme_oba/back2';
    $title = get_string('back2','theme_oba');
    $description = get_string('backdesc', 'theme_oba');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'back2');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    // fullscreen image slideshow file setting.
    $name = 'theme_oba/back3';
    $title = get_string('back3','theme_oba');
    $description = get_string('backdesc', 'theme_oba');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'back3');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    // fullscreen image slideshow file setting.
    $name = 'theme_oba/back4';
    $title = get_string('back4','theme_oba');
    $description = get_string('backdesc', 'theme_oba');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'back4');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

// CustomFP Text setting.
    $name = 'theme_oba/fptext';
    $title = get_string('fptext', 'theme_oba');
    $description = get_string('fptextdesc', 'theme_oba');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

//Custom Navigation Icons on homepage
    
    // This is the descriptor for icon One
    $name = 'theme_oba/navicon1info';
    $heading = get_string('navicon1', 'theme_oba');
    $information = get_string('navicondesc', 'theme_oba');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    // icon One
    $name = 'theme_oba/nav1icon';
    $title = get_string('navicon', 'theme_oba');
    $description = get_string('navicondesc', 'theme_oba');
    $default = 'home';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_oba/nav1buttontext';
    $title = get_string('naviconbuttontext', 'theme_oba');
    $description = get_string('naviconbuttontextdesc', 'theme_oba');
    $default = 'Dashboard';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_oba/nav1buttonurl';
    $title = get_string('naviconbuttonurl', 'theme_oba');
    $description = get_string('naviconbuttonurldesc', 'theme_oba');
    $default = 'my/';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // icon two
    // This is the descriptor for icon One
    $name = 'theme_oba/navicon2info';
    $heading = get_string('navicon2', 'theme_oba');
    $information = get_string('navicondesc', 'theme_oba');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    $name = 'theme_oba/nav2icon';
    $title = get_string('navicon', 'theme_oba');
    $description = get_string('navicondesc', 'theme_oba');
    $default = 'calendar';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_oba/nav2buttontext';
    $title = get_string('naviconbuttontext', 'theme_oba');
    $description = get_string('naviconbuttontextdesc', 'theme_oba');
    $default = 'Calendar';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_oba/nav2buttonurl';
    $title = get_string('naviconbuttonurl', 'theme_oba');
    $description = get_string('naviconbuttonurldesc', 'theme_oba');
    $default = 'calendar/view.php?view=month';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // icon three
    // This is the descriptor for icon three
    $name = 'theme_oba/navicon3info';
    $heading = get_string('navicon3', 'theme_oba');
    $information = get_string('navicondesc', 'theme_oba');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    $name = 'theme_oba/nav3icon';
    $title = get_string('navicon', 'theme_oba');
    $description = get_string('navicondesc', 'theme_oba');
    $default = 'bookmark';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_oba/nav3buttontext';
    $title = get_string('naviconbuttontext', 'theme_oba');
    $description = get_string('naviconbuttontextdesc', 'theme_oba');
    $default = 'Badges';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_oba/nav3buttonurl';
    $title = get_string('naviconbuttonurl', 'theme_oba');
    $description = get_string('naviconbuttonurldesc', 'theme_oba');
    $default = 'badges/mybadges.php';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);


    // Marketing Spot Four
    // This is the descriptor for icon four
    $name = 'theme_oba/navicon4info';
    $heading = get_string('navicon4', 'theme_oba');
    $information = get_string('navicondesc', 'theme_oba');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    $name = 'theme_oba/nav4icon';
    $title = get_string('navicon', 'theme_oba');
    $description = get_string('navicondesc', 'theme_oba');
    $default = 'table';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_oba/nav4buttontext';
    $title = get_string('naviconbuttontext', 'theme_oba');
    $description = get_string('naviconbuttontextdesc', 'theme_oba');
    $default = 'Grades';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_oba/nav4buttonurl';
    $title = get_string('naviconbuttonurl', 'theme_oba');
    $description = get_string('naviconbuttonurldesc', 'theme_oba');
    $default = 'grade/report/overview/';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

        // Marketing Spot five
    // This is the descriptor for icon four
    $name = 'theme_oba/navicon5info';
    $heading = get_string('navicon5', 'theme_oba');
    $information = get_string('navicondesc', 'theme_oba');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    $name = 'theme_oba/nav5icon';
    $title = get_string('navicon', 'theme_oba');
    $description = get_string('navicondesc', 'theme_oba');
    $default = 'bell';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_oba/nav5buttontext';
    $title = get_string('naviconbuttontext', 'theme_oba');
    $description = get_string('naviconbuttontextdesc', 'theme_oba');
    $default = 'Notifications';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_oba/nav5buttonurl';
    $title = get_string('naviconbuttonurl', 'theme_oba');
    $description = get_string('naviconbuttonurldesc', 'theme_oba');
    $default = 'message/edit.php';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

        // Marketing Spot six
    // This is the descriptor for icon six
    $name = 'theme_oba/navicon6info';
    $heading = get_string('navicon6', 'theme_oba');
    $information = get_string('navicondesc', 'theme_oba');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    $name = 'theme_oba/nav6icon';
    $title = get_string('navicon', 'theme_oba');
    $description = get_string('navicondesc', 'theme_oba');
    $default = 'pencil-square-o';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_oba/nav6buttontext';
    $title = get_string('naviconbuttontext', 'theme_oba');
    $description = get_string('naviconbuttontextdesc', 'theme_oba');
    $default = 'Edit Profile';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_oba/nav6buttonurl';
    $title = get_string('naviconbuttonurl', 'theme_oba');
    $description = get_string('naviconbuttonurldesc', 'theme_oba');
    $default = 'user/edit.php';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

        // Marketing Spot Seven
    // This is the descriptor for icon seven
    $name = 'theme_oba/navicon7info';
    $heading = get_string('navicon7', 'theme_oba');
    $information = get_string('navicondesc', 'theme_oba');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    $name = 'theme_oba/nav7icon';
    $title = get_string('navicon', 'theme_oba');
    $description = get_string('navicondesc', 'theme_oba');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_oba/nav7buttontext';
    $title = get_string('naviconbuttontext', 'theme_oba');
    $description = get_string('naviconbuttontextdesc', 'theme_oba');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_oba/nav7buttonurl';
    $title = get_string('naviconbuttonurl', 'theme_oba');
    $description = get_string('naviconbuttonurldesc', 'theme_oba');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

        // Marketing Spot eight
    // This is the descriptor for icon eight
    $name = 'theme_oba/navicon8info';
    $heading = get_string('navicon8', 'theme_oba');
    $information = get_string('navicondesc', 'theme_oba');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    $name = 'theme_oba/nav8icon';
    $title = get_string('navicon', 'theme_oba');
    $description = get_string('navicondesc', 'theme_oba');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_oba/nav8buttontext';
    $title = get_string('naviconbuttontext', 'theme_oba');
    $description = get_string('naviconbuttontextdesc', 'theme_oba');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_oba/nav8buttonurl';
    $title = get_string('naviconbuttonurl', 'theme_oba');
    $description = get_string('naviconbuttonurldesc', 'theme_oba');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

$ADMIN->add('theme_oba', $temp);


/*Socialwall Settings temp*/
$temp = new admin_settingpage('theme_oba_socialwall', get_string('socialwallheading', 'theme_oba'));

    // Label Post
    $name = 'theme_oba/swlabelpost';
    $title = get_string('swlabelpost','theme_oba');
    $description = get_string('swlabelpost_desc', 'theme_oba');
    $default = '\f086  Post';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    // Label Message
    $name = 'theme_oba/swlabelmessage';
    $title = get_string('swlabelmessage','theme_oba');
    $description = get_string('swlabelmessage_desc', 'theme_oba');
    $default = '\f0e5  Message';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    // Label comment
    $name = 'theme_oba/swlabelcomment';
    $title = get_string('swlabelcomment','theme_oba');
    $description = get_string('swlabelcomment_desc', 'theme_oba');
    $default = '\f0e6  Comments';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    // Label Attachment
    $name = 'theme_oba/swlabelattachment';
    $title = get_string('swlabelattachment','theme_oba');
    $description = get_string('swlabelattachment_desc', 'theme_oba');
    $default = '\f0c6  Attachments';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);


    // Socialwall add a post bkg color.
    $name = 'theme_oba/swaddpost';
    $title = get_string('swaddpost', 'theme_oba');
    $description = get_string('swaddpost_desc', 'theme_oba');
    $default = '#FFFFFF';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, null, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Socialwall post color.
    $name = 'theme_oba/swpost';
    $title = get_string('swpost', 'theme_oba');
    $description = get_string('swpost_desc', 'theme_oba');
    $default = '#FFFFFF';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, null, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Socialwall Message color.
    $name = 'theme_oba/swmessage';
    $title = get_string('swmessage', 'theme_oba');
    $description = get_string('swmessage_desc', 'theme_oba');
    $default = '#F0F3F7';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, null, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Socialwall Attachment color.
    $name = 'theme_oba/swattach';
    $title = get_string('swattach', 'theme_oba');
    $description = get_string('swattach_desc', 'theme_oba');
    $default = '#F6FAA0';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, null, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Socialwall Attachment color.
    $name = 'theme_oba/swcomment';
    $title = get_string('swcomment', 'theme_oba');
    $description = get_string('swcomment_desc', 'theme_oba');
    $default = '#FFFFFF';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, null, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Socialwall Icon and text color.
    $name = 'theme_oba/swicontext';
    $title = get_string('swicontext', 'theme_oba');
    $description = get_string('swicontext_desc', 'theme_oba');
    $default = '#A83116';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, null, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Multilanguage CSS.
    $name = 'theme_oba/swmultilangcss';
    $title = get_string('swmultilangcss', 'theme_oba');
    $description = get_string('swmultilangcss_desc', 'theme_oba');
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

$ADMIN->add('theme_oba', $temp);
