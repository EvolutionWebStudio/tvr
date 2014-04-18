<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Kategorija Model klasa
 * 
 * @author Igor Golub
 * @class Kategorija
 * 
 */
class MKategorija extends CI_Model 
{
	public function __construct()
    {
        parent::__construct();
    }
	/**
	 * Vraca kategoriju odredjen id-om
	 */
	public function return_category($id)
	{
		$query = $this->db
			->select("*")
			->where(array("id" => $id))
			->get("kategorija");
			
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
	 * Vraca sve kategorije
	 */
	public function return_categories()
	{
		$query = $this->db
			->select("*")
			->where_not_in("id",1)
			->order_by("naziv")
			->get("kategorija");
			
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
	 * Vraca sve kategorije
	 */
	public function return_active_categories($cids)
	{
		$query = $this->db
			->select("*")
			->where_in("id" , $cids)
			->order_by("naziv")
			->get("kategorija");
			
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
	 * Vraca id kategorije
	 */
	public function return_category_id($name)
	{
		$query = $this->db
			->select("*")
			->where(array("naziv" => $name))
			->get("kategorija");
			
		if ($query->num_rows() > 0)
		{
			return $query->row()->id;
		}
		else
		{
			return null;
		}
	}
	
	
	/**
	 * Upisuje post u bazu
	 */
	 public function write_category($category)
	 {
	 	$this->db->insert("kategorija",$category);
	 }
	 /**
	  * Azurira post
	  */
	public function update_category($category)
	{
		$this->db
			->where('id', $category['id'])
			->update("kategorija", $category);
	}
	/**
	 * Obrisi post
	 */
	 public function delete_category($cid)
	 {
	 	$this->db
	 		->where('id', $cid)
			->delete("kategorija");
	 }
}
/* End of file mpost.php */
/* Location: ./application/mmodels/mpost.php */
