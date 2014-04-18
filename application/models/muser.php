<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Korisnik Model klasa
 * 
 * @author Igor Golub
 * @class User
 * 
 */
class MUser extends CI_Model 
{
	public function __construct()
    {
        parent::__construct();
    }
	
	/**
	 * Vrati podatke o korisniku.
	 * @param int $id ID korisnika 
	 * @return DBResult Vraca podatke o korisniku
	 */
	public function return_user($id)
	{
		$query = $this->db
		->select('kid, ime, username, password')
		->where(array('kid' => $id))
		->get('korisnik');
		
		if ($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return null;
		}
	}
	
	
	
	
	public function check_user($username, $password)
	{
			$query = $this->db
			->select('kid, ime, username, password')
			->where(array("username" => $username, "password" => $password))
			->get('korisnik');
		
		if ($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return null;
		}
	}
}

/* End of file korisnik.php */
/* Location: ./application/models/korisnik.php */
