<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Page Model klasa
 * 
 * @author Igor Golub
 * @class Page
 * 
 */
class MPage extends CI_Model 
{
	public function __construct()
    {
        parent::__construct();
    }
	/**
	 * Vraca stranicu odredjenu id-om
	 */
	public function return_page($id)
	{
		$query = $this->db
			->select("*")
			->where(array("stranica_id" => $id))
			->get("stranica");
			
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
	 * Vraca sve stranice
	 */
	public function return_pages()
	{
		$query = $this->db
			->select("*")
			->get("stranica");
			
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
	 public function write_page($post)
	 {
	 	$this->db->insert("stranica",$post);
	 }
	 /**
	  * Azurira post
	  */
	public function update_page($post)
	{
		$this->db
			->where('stranica_id', $post['stranica_id'])
			->update("stranica", $post);
	}
	/**
	 * Obrisi post
	 */
	 public function delete_page($id)
	 {
	 	$this->db
	 		->where('stranica_id', $id)
			->delete("stranica");
	 }
}
/* End of file mpage.php */
/* Location: ./application/mmodels/mpage.php */
