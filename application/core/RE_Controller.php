<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Default Controller
 * 
 * @author Igor Golub
 */
class RE_Controller extends CI_Controller  {
	
	/**
	 * Default layout for the site
	 * @var string
	 */
	public $layout = 'layout';
	
	/**
	 * slider
	 * @var string
	 */
	public $slider = null;
	
	/**
	 * seksn tajtle
	 */
	
	public $section_title = null;
	
	
	/**
	 * Title of the page which will be shown
	 * @var string
	 */
	public $page_title = "Turisticka agencija Tavor - Pale";
	
	/**
	 * Meta
	 */
	 public $meta_title = "turisticka agencija Tavor Pale";
	 public $meta_description = "Turisticka agencija TAVOR - Turisticka agencija Pale agencija se nalazi na Palama i prvenstveno se bavi ponudom turistickih aranzmana";
	 
	 /**
	  * sezona
	  */
	 public $season = "Ljetovanja";
	 public $background_picture;
	 
	/**
	 * Main AO_Controller constructor
	 */
	public function __construct()
	{
		parent::__construct();
		/*$driver_list = $this->config->item('drivers');
		
		// Load drivers
		foreach($driver_list as $item)
			$this->load->driver($item);
		*/
	}
	
	
	/**
	 * Renders view based on input $view_data
	 * @param mixed $view_data Data which will be sent for input, can be an array.
	 * @param boolean $return_data If true, data will not be outputted but returned.
	 */
	public function render($view_data, $return_data = false)
	{
		$contents = "";
			
		if (isset($view_data['data']))
			$contents = $this->load->view($view_data['name'], $view_data['data'], true);
		else
			$contents = $this->load->view($view_data['name'], array(), true);
	
		if ($return_data == false)
		{
			echo $this->load->view($this->layout, array(
					"page_title" => $this->page_title,
					"meta_title" => $this->meta_title,
					"meta_description" => $this->meta_description,
					"contents" => $contents
			), true);
		}
		else
		{
			if ($this->layout == "")
				return $contents = $this->load->view($view_data['name'], $view_data['data'],false);
			else
				return $this->load->view($this->layout, array(
						"page_title" => $this->page_title,
						"meta_title" => $this->meta_title,
						"meta_description" => $this->meta_description,
						"contents" => $contents
				), true);
		}	
	}
	
	public function _remap($method, $params = array())
	{
		$method = 'action_' . $method;
		if (method_exists($this, $method))
		{
			return call_user_func_array(array($this, $method), $params);
		}
		show_404();
	}
	
	public function main_config()
	{
		$this->load->model("mconfig");
		
		$this->season = $this->mconfig->return_season();
		$this->background_picture = $this->mconfig->return_season();
	}
	
}

/* End of file RE_Controller.php */
/* Location: ./application/core/RE_Controller.php */
