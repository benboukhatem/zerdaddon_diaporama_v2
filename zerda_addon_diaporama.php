<?php

/**
* Zerda Blog Plugin.
*
* @package   Zerda Addon diaporama v2
* @copyright Copyright (C) 2023 Zerda Group - support@zerda.digital
* @license   http://www.gnu.org/licenses/gpl-3.0.html GNU General Public License, version 3 or higher
*
* @elementor-plugin
* Plugin Name: Zerda Addon diaporama v2
* Version:     2.0.0
* Plugin URI:  https://zerda.digital/ (lien vers service Developement web site zerda)
* Description: Internal component specific to the Zerda group, An Elementor widget allowing to create a dynamic blog. Easy and simple to use through an admin interface.
* Author:      Team developer Zerda 
* Author URI:  https://zerda.digital/
* Text Domain: elementor-zerda-blog 
* License:     GPL v2
* Requires at least: 6.0
* Requires PHP: 5.6.20
*/

class zerdAddondiaporama { // blog A CHANGER PAR LE NOM DE NNOUVEAU ADDON

    public function __construct()
    {
        add_action('elementor/widgets/register',array($this,'register_zerda_diaporam_v2_widget')); 
		
		
		
		add_action("wp_enqueue_scripts", array($this,"AddonZerdaGet_diaporama_Css"));//css
		add_action('wp_enqueue_scripts', array($this,'AddonZerdaGet_diaporam_js'));


      
      
		
		 
    }


	//*************************register******************************************************* */
	function register_zerda_diaporam_v2_widget( $widgets_manager ) {

		require_once( __DIR__ . '/widgets/diaporam_zerda.php' );
	
		$widgets_manager->register( new \zerdaWedgetsdiapv2() );
	
	}
    //get js and css*****************************************************************************/

    //CSS ADD
    public function AddonZerdaGet_diaporama_Css(){
        wp_register_style("csszerdadiaporama_v2",plugins_url("zerdaddon_diaporama_v2/assets/css/diap.css"));
	
        wp_enqueue_style("csszerdadiaporama_v2");
	
       
    }

	public function AddonZerdaGet_diaporam_js() {
        wp_register_script("jszerdadiaporama_v2",plugins_url("zerdaddon_diaporama_v2/assets/js/diap.js"));
      
	    wp_enqueue_script("jszerdadiaporama_v2"); 
       
    } 

	/////*************************************************************************************** */


	public function createAddonZerd_diaporama(){



		
	}
	

 
}
new zerdAddondiaporama();

?>
