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

class Users {
	Private $db;

    public function __construct () {
            $this->db = new MysqliDb('localhost', 'root', '', 'dashboard');

        } 
		
		
	public function getUser($id,$type) {
		$this->db->where ("id", $id);
		$user = $this->db->getOne ("users");
		echo ucfirst($user[$type]);
	}
}
?>