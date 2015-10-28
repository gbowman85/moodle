<?php

/**
 * @package   theme_obadesktop
 * @copyright 2013 G Bowman gbowman85@gmail.com
 */

$logourl = $OUTPUT->pix_url('logo', 'theme');
 
// Get the HTML for the settings bits.
$html = theme_obadesktop_get_html_for_settings($OUTPUT, $PAGE);

$left = (!right_to_left());  // To know if to add 'pull-right' and 'desktop-first-column' classes in the layout for LTR.

echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes(); ?>>
<head>
    <title><?php echo $OUTPUT->page_title(); ?></title>
    <link rel=icon href=<?php echo $OUTPUT->pix_url('favicon128', 'theme')?> sizes="128x128" type="image/png">
    <link rel=icon href="<?php echo $OUTPUT->pix_url('favicon', 'theme')?>" type="image/vnd.microsoft.icon" />
    <link rel="apple-touch-icon" href=<?php echo $OUTPUT->pix_url('favicon57', 'theme')?> />
    <link rel="apple-touch-icon" sizes="72x72" href=<?php echo $OUTPUT->pix_url('favicon72', 'theme')?> />
    <link rel="apple-touch-icon" sizes="114x114" href=<?php echo $OUTPUT->pix_url('favicon114', 'theme')?> />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
    <?php echo $OUTPUT->standard_head_html() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="apple-mobile-web-app-title" content="OBA VLE">
</head>

<body <?php echo $OUTPUT->body_attributes('two-column'); ?>>

<?php echo $OUTPUT->standard_top_of_body_html() ?>

<header role="banner" class="navbar navbar-fixed-top<?php echo $html->navbarclass ?> moodle-has-zindex">
    <nav role="navigation" class="navbar-inner">
        <div class="container-fluid">
            <a class="logo" href="<?php echo $CFG->wwwroot; ?>" title="<?php print_string('home'); ?>">
                <img src="<?php echo $logourl ?>" alt="logo" />
            </a>
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <?php echo $OUTPUT->user_menu(); ?>
            <!--<div class="btn-group pull-right">
             <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
               <i class="icon-user"></i> <?php echo fullname($USER, true); ?>
               <span class="caret"></span>
             </a>
             <ul class="dropdown-menu">
               <li><a href="<?php echo $CFG->wwwroot.'/user/profile.php?id='.$USER->id; ?>" title="View profile" >Profile</a></li>
               <li><a href="<?php echo $CFG->wwwroot.'/blog/index.php?userid='.$USER->id; ?>" title="View blog posts" >Blog posts</a></li>
               <li class="divider"></li>
               <li><a href="<?php echo $CFG->wwwroot.'/user/edit.php?id='.$USER->id.'&course='.$COURSE->id; ?>" title="Edit profile" >Edit profile</a></li>
               <li><a href="<?php echo $CFG->wwwroot.'/message/edit.php?id='.$USER->id; ?>" title="Edit notifications" >Notifications</a></li>
               <li class="divider"></li>
               <li><a href="<?php echo $CFG->wwwroot.'/login/logout.php?sesskey='.sesskey() ?>">Sign Out</a></li>
             </ul>
            </div>-->
            <div class="nav-collapse collapse">
                <?php echo $OUTPUT->custom_menu(); ?>
            </div>
        </div>
    </nav>
</header>

<div id="page" class="container-fluid">

    <header id="page-header" class="clearfix">
        <div id="page-navbar" class="clearfix">
            <nav class="breadcrumb-nav"><?php echo $OUTPUT->navbar(); ?></nav>
            <div class="breadcrumb-button"><?php echo $OUTPUT->page_heading_button(); ?></div>
        </div>
        <div id="course-header">
            <?php echo $OUTPUT->course_header(); ?>
        </div>
    </header>

    <div id="page-content" class="row-fluid">
        <section id="region-main" class="span9<?php if ($left) { echo ' pull-right'; } ?>">
            <?php
            echo $OUTPUT->course_content_header();
            echo $OUTPUT->main_content();
            echo $OUTPUT->course_content_footer();
            ?>
        </section>
        <?php
        $classextra = '';
        if ($left) {
            $classextra = ' desktop-first-column';
        }
        echo $OUTPUT->blocks('side-pre', 'span3'.$classextra);
        ?>
    </div>

    <footer id="page-footer">
        <div id="course-footer"><?php echo $OUTPUT->course_footer(); ?></div>
        <p class="helplink"><?php echo $OUTPUT->page_doc_link(); ?></p>
        <?php
        echo $html->footnote;
        echo $OUTPUT->standard_footer_html();
        ?>
    </footer>

    <?php echo $OUTPUT->standard_end_of_body_html() ?>

</div>
</body>
</html>
