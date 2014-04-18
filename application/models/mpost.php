<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Post Model klasa
 * 
 * @author Igor Golub
 * @class Page
 * 
 */
class MPost extends CI_Model 
{
	public function __construct()
    {
        parent::__construct();
    }
	
	/**
	 * Vraca post odredjen id-om
	 */
	public function return_post($id)
	{
		$query = $this->db
			->select("*")
			->where(array("cid" => $id))
			->get("clanak");
			
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
	public function return_posts($kid)
	{
		$query = $this->db
			->select("*")
			->where(array("kategorija_id" => $kid, "status" => 1))
			->order_by("prioritet")
			->get("clanak");
			
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
	 * Vraca sve postove za slider
	 */
	public function return_slider_posts()
	{
		$query = $this->db
			->select("*")
			->where(array("slider" => 1, "status" => 1))
			->order_by("prioritet")
			->get("clanak");
			
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return null;
		}
	}
	
	public function return_topical_posts()
	{
		$query = $this->db
			->select("*")
			->where(array("aktuelno" => 1, "status" => 1))
			->order_by("prioritet")
			->get("clanak");
			
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
	public function return_all_active_posts()
	{
		$query = $this->db
			->select("*")
			->where(array("status" => 1))
			->order_by("prioritet")
			->get("clanak");
			
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
	public function return_all_posts()
	{
		$query = $this->db
			->select("*")
			->order_by("prioritet")
			->get("clanak");
			
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return null;
		}
	}
	
	public function return_unique_categories()
	{
		$query = $this->db
			->select("kategorija_id")
			->where(array("status" => 1))
			->distinct("kategorija_id")
			->get("clanak");
			
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
	 public function write_post($post)
	 {
	 	$this->db->insert("clanak",$post);
	 }
	 /**
	  * Azurira post
	  */
	public function update_post($post)
	{
		$this->db
			->where('cid', $post['cid'])
			->update("clanak", $post);
	}
	/**
	 * Obrisi post
	 */
	 public function delete_post($cid)
	 {
	 	$this->db
	 		->where('cid', $cid)
			->delete("clanak");
	 }
	 
	 public function filter(array $args)
	 {
	 	$default = array(
        "aktuelno" => -1,
        "status" => -1,
        "category" => -1
    	);
    // overwrite all the defaults with the arguments
    $args = array_merge($default, $args);
		
	 	$sql = "SELECT * FROM clanak WHERE";
		if ($args['aktuelno'] != -1) {$sql .=" aktuelno = ?"; $data[]=$args['aktuelno'];}
		if ($args['status'] != -1) { if($args['aktuelno'] != -1)$sql .=" AND"; $sql .=" status = ?"; $data[]=$args['status'];}
		if ($args['category'] != -1){ if($args['status'] != -1 or $args['aktuelno'] != -1)$sql .=" AND"; $sql .=" kategorija_id = ?"; $data[]=$args['category'];} 
		

		$query = $this->db->query($sql, $data);
		
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return null;
		} 
	 }
	 
	 public function return_prioritet()
	 {
	 	$query = $this->db
			->select("prioritet")
			->order_by("prioritet DESC")
			->limit("1")
			->get("clanak");
			
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
/* End of file mpost.php */
/* Location: ./application/mmodels/mpost.php */
