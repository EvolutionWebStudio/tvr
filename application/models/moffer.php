<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Offer Model klasa
 * 
 * @author Igor Golub
 * @class Offer
 * 
 */
class MOffer extends CI_Model 
{
	public function __construct()
    {
        parent::__construct();
    }
	/**
	 * Vraca ponudu odredjenu id-om
	 */
	public function return_offer($id)
	{
		$query = $this->db
			->select("*")
			->where(array("pid" => $id, "status" => 1))
			->get("ponuda");
			
		if ($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return null;
		}
	}


	public function return_eny_offer($id)
	{
		$query = $this->db
			->select("*")
			->where(array("pid" => $id))
			->get("ponuda");
			
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
	 * Vraca sve ponude za odredjenu sezonu i zemlju
	 */
	public function return_offers($sezona, $country, $accomodation)
	{
		if($country != "sve" and $accomodation != "svi")
			$query = $this->db
				->select("*")
				->where(array("sezona" => $sezona, "status" => 1, "zemlja" => $country, "smjestaj" => $accomodation))
				->get("ponuda");
		else if($country != "sve")
			$query = $this->db
				->select("*")
				->where(array("sezona" => $sezona, "status" => 1, "zemlja" => $country))
				->get("ponuda");
		else if($accomodation != "svi")
		{
			$query = $this->db
				->select("*")
				->where(array("sezona" => $sezona, "status" => 1, "smjestaj" => $accomodation))
				->get("ponuda");
		}
		else 
		{
			$query = $this->db
				->select("*")
				->where(array("sezona" => $sezona, "status" => 1))
				->get("ponuda");
			
		}	
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
	 * Vraca sve aktuelne ponude
	 */
	public function return_promoted_offers($sezona)
	{
		$query = $this->db
			->select("*")
			->where(array("sezona" => $sezona, "status" => 1, "aktuelno" => 1))
			->get("ponuda");
			
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
	 * Vraca sve ponude
	 */
	public function return_all_offers($sezona)
	{
		$query = $this->db
			->select("*")
			->where(array("sezona" => $sezona, "status" => 1))
			->get("ponuda");
			
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
	 * Vraca sve ponude
	 */
	public function return_all_season_offers()
	{
		$query = $this->db
			->select("*")
			->get("ponuda");
			
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return null;
		}
	}
	
	public function return_smjestaj($sezona)
	{
		$query = $this->db
			->select("smjestaj")
			->where(array("status" => 1, "sezona" => $sezona))
			->distinct("smjestaj")
			->get("ponuda");
			
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return null;
		}
	}
	
	public function return_countries()
	{
		$query = $this->db
			->select("zemlja.name, zemlja.zemlja_id, zemlja.link")
			->join("grad","t.grad_id = grad.grad_id")
			->join("zemlja", "grad.zemlja_id = zemlja.zemlja_id")
			->distinct("zemlja.zemlja_id")
			->get("ponuda t");
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return null;
		}
	}
	
	public function return_cities_from($country)
	{
		$query = $this->db
			->select("grad.name, grad.grad_id, grad.link")
			->join("grad","t.grad_id = grad.grad_id")
			->where("grad.zemlja_id",$country)
			->distinct("grad.grad_id")
			->get("ponuda t");
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return null;
		}	
	}
	
	public function return_ljetovanja($city,$sezona = 'ljetovanje')
	{
		$query = $this->db
			->select("*")
			->where(array("status" => 1, "sezona" => $sezona, "grad_id" => $city))
			->get("ponuda");
			
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return null;
		}
	}
	
	public function return_all_zemlje()
	{
		$query = $this->db
			->select("zemlja")
			->distinct("zemlja")
			->get("ponuda");
			
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
	 * Upisuje ponudu u bazu
	 */
	 public function write_offer($post)
	 {
	 	$this->db->insert("ponuda",$post);
	 }
	 /**
	  * Azurira ponudu
	  */
	public function update_offer($post)
	{
		$this->db
			->where('pid', $post['pid'])
			->update("ponuda", $post);
	}
	/**
	 * Obrisi ponudu
	 */
	 public function delete_offer($cid)
	 {
	 	$this->db
	 		->where('pid', $cid)
			->delete("ponuda");
	 }
	 
	  public function filter(array $args)
	 {
	 	$default = array(
        "sezona" => null,
        "status" => -1,
        "zemlja" => null
    	);
    // overwrite all the defaults with the arguments
    $args = array_merge($default, $args);
		
	 	$sql = "SELECT * FROM ponuda WHERE";
		if ($args['sezona'] != "sve") {$sql .=" sezona = ?"; $data[]=$args['sezona'];}
		if ($args['status'] != -1) { if($args['sezona'] != "sve")$sql .=" AND"; $sql .=" status = ?"; $data[]=$args['status'];}
		if ($args['zemlja'] != "sve"){ if($args['status'] != -1 or $args['sezona'] != "sve")$sql .=" AND"; $sql .=" zemlja = ?"; $data[]=$args['zemlja'];} 
		
		
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
/* End of file moffer.php */
/* Location: ./application/mmodels/moffer.php */
