<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Config Model klasa
 * 
 * @author Igor Golub
 * @class Page
 * 
 */
class MConfig extends CI_Model  
{
	public function __construct()
    {
        parent::__construct();
    }
	/**
	 * Vraca sezonu
	 */
	public function return_season()
	{
		$query = $this->db
			->select("season")
			->get("config");
			
		if ($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return null;
		}
	}
	
	/**
	 * Vraca sliku za pozadinu
	 */
	public function return_picture()
	{
		$query = $this->db
			->select("beckground_picture")
			->get("config");
			
		if ($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return null;
		}
	}
	
	
	
	/**
	 * Upisuje post u bazu
	 */
	 public function write_post($post)
	 {
	 	$this->db->insert("destinacija",$post);
	 }
	 /**
	  * Azurira post
	  */
	public function update_post($post)
	{
		$this->db
			->where('did', $post['did'])
			->update("destinacija", $post);
	}
	/**
	 * Obrisi post
	 */
	 public function delete_post($cid)
	 {
	 	$this->db
	 		->where('did', $cid)
			->delete("destinacija");
	 }
}
/* End of file mpost.php */
/* Location: ./application/mmodels/mpost.php */
