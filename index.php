<?php
/*
Plugin Name: Skysa Pinterest "Pin It" App
Plugin URI: http://wordpress.org/extend/plugins/skysa-pinterest-pin-it-app
Description: Let people share (pin) images from your site on Pinterest.com
Version: 1.4
Author: Skysa
Author URI: http://www.skysa.com
*/

/*
*************************************************************
*                 This app was made using the:              *
*                       Skysa App SDK                       *
*    http://wordpress.org/extend/plugins/skysa-app-sdk/     *
*************************************************************
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
MA  02110-1301, USA.
*/

// Make sure we don't expose any info if called directly
if ( !function_exists( 'add_action' ) ) exit;

// Skysa App plugins require the skysa-req subdirectory,
// and the index file in that directory to be included.
// Here is where we make sure it is included in the project.
include_once dirname( __FILE__ ) . '/skysa-required/index.php';


// PINTEREST PIN IT APP
$GLOBALS['SkysaApps']->RegisterApp(array( 
    'id' => '501c7a85eef18',
    'label' => 'Pinterest Pin It',
	'options' => array(
		'bar_label' => array( // key is the field name
            'label' => 'Button Label',
			'info' => 'What would you like the bar link label name to be?',
			'type' => 'text',
			'value' => 'Pin It',
			'size' => '30|1'
		),
        'icon' => array(
            'label' => 'Button Icon URL',
            'info' => 'Enter a URL for the an Icon Image. (You can leave this blank for none)',
			'type' => 'image',
			'value' => plugins_url( '/icons/pinterest-icon-wp.png', __FILE__ ),
			'size' => '50|1'
        ),
        'title' => array(
            'label' => 'Tooltip Text',
            'info' => 'Text which displays when the app button is hovered over.',
			'type' => 'text',
			'value' => 'Pin an Image From This Page on Pinterest!',
			'size' => '30|1'
        )
	),
    'html' => '<div id="$button_id" class="bar-button SKYUI-menuoff" apptitle="$app_title">$app_icon<span class="label">$app_bar_label</span></div>',
    'js' => "
        S.on('click',function(){
            var e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','//assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e);
            S.saveAction('click');
        });
     "
));
?>