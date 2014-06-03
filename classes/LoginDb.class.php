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

class LoginDb {
	Private $db;

    public function __construct () {
            $this->db = new MysqliDb('localhost', 'root', '', 'dashboard');

        } 
	
	function hashPassword($password){
			$hashed_password = crypt($password, 'rl');
			return $hashed_password;
	}
	
	function checkLogin($userid,$hash) {
		$this->db->where("id", $userid);
		$user = $this->db->getOne("users");
		if ($this->db->count > 0) {
			if ($hash == crypt($user['id'], $user['password'])) {
				return true;	
			}
		}
	}
		
	public function loginAttempt($username,$password) {
		$this->db->where("username", $username);
		$this->db->where("password", $this->hashPassword($password));
		$this->db->where("active", 1);		
		$user = $this->db->getOne("users");
		if ($this->db->count > 0) {
			$_SESSION['userid'] = $user['id'];
			$_SESSION['userhash'] = crypt($user['id'], $user['password']);
			return true;
		} else {
			return false;
		}
		
	}
}

?>