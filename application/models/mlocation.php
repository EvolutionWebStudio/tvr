<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Post Model klasa
 * 
 * @author Igor Golub
 * @class Page
 * 
 */
class MLocation extends CI_Model 
{
	public function __construct()
    {
        parent::__construct();
    }
	
	/**
	 * Vraca post odredjen id-om
	 */
	public function return_country($id)
	{
		$query = $this->db
			->select("*")
			->where(array("zemlja_id" => $id))
			->get("zemlja");
			
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
	 * Vraca sve postove iz jedne kategorije
	 */
	public function return_countries()
	{
		$query = $this->db
			->select("*")
			->get("zemlja");
			
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
	 public function write_country($post)
	 {
	 	$this->db->insert("zemlja",$post);
	 }
	 /**
	  * Azurira post
	  */
	public function update_country($post)
	{
		$this->db
			->where('zemlja_id', $post['zemlja_id'])
			->update("zemlja", $post);
	}
	/**
	 * Obrisi post
	 */
	 public function delete_country($cid)
	 {
	 	$this->db
	 		->where('zemlja_id', $cid)
			->delete("zemlja");
	 }
	 /*
	  * Vraca post odredjen id-om
	 */
	public function return_city($id)
	{
		$query = $this->db
			->select("*")
			->where(array("grad_id" => $id))
			->get("grad");
			
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
	 * Vraca sve postove iz jedne kategorije
	 */
	public function return_cities()
	{
		$query = $this->db
			->select("*")
			->get("grad");
			
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return null;
		}
	}
	
	public function return_cities_from($id)
	{
		$query = $this->db
			->select("*")
			->where("zemlja_id",$id)
			->get("grad");
			
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
	 public function write_city($post)
	 {
	 	$this->db->insert("grad",$post);
	 }
	 /**
	  * Azurira post
	  */
	public function update_city($post)
	{
		$this->db
			->where('grad_id', $post['grad_id'])
			->update("grad", $post);
	}
	/**
	 * Obrisi post
	 */
	 public function delete_city($cid)
	 {
	 	$this->db
	 		->where('grad_id', $cid)
			->delete("grad");
	 }
	 
	 
	 
	 
}
/* End of file mpost.php */
/* Location: ./application/mmodels/mpost.php */
