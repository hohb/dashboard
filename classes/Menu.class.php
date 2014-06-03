<?php
/**
 * Login Class
 *
 * @category  Login System
 * @package   LoginDb
 * @author    Jeroen Kruiper <jeroen@hohb.nl>
 * @copyright Copyright (c) 2014
 * @license   http://opensource.org/licenses/gpl-3.0.html GNU Public License
 * @version   0.1
 **/
include_once('MysqliDb.class.php');

class Menu {
	Private $db;

    public function __construct () {
            $this->db = new MysqliDb('localhost', 'root', '', 'dashboard');

        } 

	public function getMenu() {
		$output = '';
		$this->db->where('parent_id', 0);
		$menuitems = $this->db->get('menu');
		foreach($menuitems as $menuitem) {
				$output .= '<li class="'.$menuitem['icon'].'"><a href="#" title="'.$menuitem['name'].'">'.$menuitem['name'].'</a>';
				$this->db->where('parent_id', $menuitem['id']);
				$subitems = $this->db->get('menu');
				if ($this->db->count > 0) {
					$output .= '<ul>';
					foreach($subitems as $subitem) {
						$output .= '<li><a href="#" title="'.$subitem['name'].'">'.$subitem['name'].'</a></li>';
					}
					$output .= '</ul>';						
				}
				$output .= '</li>';	

		}
		echo $output;
		//<li class="home current"><a href="#" title="Home">Home</a>
	}
}
?>