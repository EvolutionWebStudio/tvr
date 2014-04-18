<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Post Model klasa
 * 
 * @author Igor Golub
 * @class Ekskurzija
 * 
 */
class MEkskurzija extends CI_Model 
{
	public function __construct()
    {
        parent::__construct();
    }
	
	/**
	 * Vraca post odredjen id-om
	 */
	public function return_ekskurziju($id)
	{
		$query = $this->db
			->select("*")
			->where(array("eid" => $id))
			->get("ekskurzija");
			
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
	public function return_ekskurzije($kategorija)
	{
		if(!$kategorija)
			return $this->return_all_ekskurzije();
		else
		$query = $this->db
			->select("*")
			->where(array("kategorija" => $kategorija, "status" => 1))
			->get("ekskurzija");
			
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
	public function return_all_ekskurzije()
	{
		$query = $this->db
			->select("*")
			->where(array("status" => 1))
			->get("ekskurzija");
			
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
	public function return_admin_ekskurzije()
	{
		$query = $this->db
			->select("*")
			->get("ekskurzija");
			
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return null;
		}
	}
	
	public function return_categories()
	{
		$query = $this->db
			->select("kategorija")
			->where(array("status" => 1))
			->distinct("kategorija")
			->get("ekskurzija");
			
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
	 public function write_ekskurziju($post)
	 {
	 	$this->db->insert("ekskurzija",$post);
	 }
	 /**
	  * Azurira post
	  */
	public function update_ekskurziju($post)
	{
		$this->db
			->where('eid', $post['eid'])
			->update("ekskurzija", $post);
	}
	/**
	 * Obrisi post
	 */
	 public function delete_ekskurziju($id)
	 {
	 	$this->db
	 		->where('eid', $id)
			->delete("ekskurzija");
	 }
	 
	  public function filter(array $args)
	 {
	 	$default = array(
        "kategorija" => null,
        "status" => -1
    	);
    // overwrite all the defaults with the arguments
    $args = array_merge($default, $args);
		
	 	$sql = "SELECT * FROM ekskurzija WHERE";
		if ($args['kategorija'] != "sve") {$sql .=" kategorija = ?"; $data[]=$args['kategorija'];}
		if ($args['status'] != -1) { if($args['kategorija'] != "sve")$sql .=" AND"; $sql .=" status = ?"; $data[]=$args['status'];}
		
		
		
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
}
/* End of file mpost.php */
/* Location: ./application/mmodels/mpost.php */
