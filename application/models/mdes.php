<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Destination Model klasa
 * 
 * @author Igor Golub
 * @class Page
 * 
 */
class MDes extends CI_Model  
{
	public function __construct()
    {
        parent::__construct();
    }
	/**
	 * Vraca post odredjen id-om
	 */
	public function return_destination($id)
	{
		$query = $this->db
			->select("*")
			->where(array("did" => $id, "status" => 1))
			->get("destinacija");
			
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
	 * Vraca post odredjen id-om
	 */
	public function return_admin_destination($id)
	{
		$query = $this->db
			->select("*")
			->where(array("did" => $id))
			->get("destinacija");
			
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
	 * Vraca sve postove iz kategorije
	 */
	public function return_destinations()
	{
		$query = $this->db
			->select("*")
			->where(array("status" => 1))
			->get("destinacija");
			
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return null;
		}
	}
	
	
	/**
	 * Vraca sve postove
	 */
	public function return_all_destinations()
	{
		$query = $this->db
			->select("*")
			->get("destinacija");
			
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return null;
		}
	}
	
	/**
	 * Upisuje post u bazu
	 */
	 public function write_destinaciju($post)
	 {
	 	$this->db->insert("destinacija",$post);
	 }
	 /**
	  * Azurira post
	  */
	public function update_destinaciju($post)
	{
		$this->db
			->where('did', $post['did'])
			->update("destinacija", $post);
	}
	/**
	 * Obrisi post
	 */
	 public function delete_destinaciju($cid)
	 {
	 	$this->db
	 		->where('did', $cid)
			->delete("destinacija");
	 }
}
/* End of file mpost.php */
/* Location: ./application/mmodels/mpost.php */
