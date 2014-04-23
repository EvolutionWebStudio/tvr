<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Post Controller class
 * 
 * @author Igor Golub
 * @class Post
 * 
 */
class Post extends RE_Controller {
	
	/**
	 * Funkcija koja provjerava da li je korisnik ulogovan.
	 */
	public function check_login()
	{
		if (!$this->session->userdata("prijavljen"))
		{
			redirect(site_url("admin"));
		}
		
	}
	
	/**
	 * Akcija index, prikazuje aktuelne clanke, slajder
	 */
	public function action_index()
	{
		
		
		$this->load->model("mdes");
		$this->load->model("mpost");
		$this->load->model("mkategorija");
		
		
		
		$posts = $this->mpost->return_topical_posts();
		
		$this->slider = $this->mpost->return_slider_posts();
		
		$allPosts = $this->mpost->return_all_active_posts();
		//vracanje kategorija koje imaju aktivnu ponudu
		$unique = $this->mpost->return_unique_categories();
		$cids = makeCategoryList($unique);
		$categories = $this->mkategorija->return_active_categories($cids);
		$destinations = $this->mdes->return_destinations();
		
		
		
		
		$this->render(array(
		   "name" => "pocetna",
		   "data" =>  array(
		  		"posts" => $posts,
		  		"categories" => $categories,
		  		"destinations" => $destinations
		  		)
		));
	}
	
	/**
	 * Akcija jedan clanak
	 * sadrzaj clanka
	 * meni sa ostalim kategorijama
	 * meni sa ostalim clancima iz te kategorije
	 */
	public function action_clanak($id)
	{
		
		$this->load->model("mpost");
		$this->load->model("mkategorija");
		
		$post = $this->mpost->return_post($id);
		$category = $this->mkategorija->return_category($post->kategorija_id);
		$posts = $this->mpost->return_posts($category->id);
		//vracanje kategorija koje imaju aktivnu ponudu
		$unique = $this->mpost->return_unique_categories();
		$cids = makeCategoryList($unique,$category->id);
		$categories = $this->mkategorija->return_active_categories($cids);
		
		$this->page_title = $post->naslov." | Turisticka agencija Tavor - Pale";
		$this->section_title = $category->naziv;
		if($post->opis) $this->meta_description = $post->opis;
		if($category->link) $this->background_picture = $category->link;
		
		$this->render(array(
		   "name" => "clanak.php",
		   "data" =>  array(
		   "post" =>$post,
		   "posts" => $posts,
		   "category" => $category,
		   "categories" => $categories
		  		
		  		)
		));
	
	}
	
	/**
	 * Akcija ljetovanje prikazuje jedno ljetovanje
	 */
	public function action_ljetovanje($id)
	{
		
		$this->load->model("moffer");
		
		$offer = $this->moffer->return_offer($id);
		$offers = $this->moffer->return_offers("ljetovanje", "sve", "svi");
		$offer_menu = $this->moffer->return_offers("ljetovanje",$offer->zemlja,"svi");
		$offers_menu = find_offers($offers);
		
		$this->page_title = $offer->naslov." | Turisticka agencija Tavor - Pale";
		$this->section_title = $offer->zemlja;
		if($offer->opis) $this->meta_description = $offer->opis;
		
		$this->render(array(
		   "name" => "ljetovanje",
		   "data" =>  array(
		   "offer" =>$offer,
		   "menu" => $offers_menu,
		   "offers_menu" => $offer_menu
		  		
		  		)
		));
	
	}
	
	public function action_ljetovanja()
	{
		$this->page_title = "Ljetovanja"." | Turisticka agencija Tavor - Pale";
		
		
		$this->load->model("moffer");
		$this->load->model("mlocation");
		if($this->input->get("country"))
		{
			$country = $this->input->get("country");
			$this->section_title = $this->mlocation->return_country($country)->name;
			$cities = $this->moffer->return_cities_from($country);
			$this->render(array(
			   "name" => "ljetovanja",
			   "data" =>  array(
			   		"countries" => null,
			   		"offers" => null,
			   		"cities" => $cities,
			  		)
			));
		}
		elseif ($this->input->get("city")) 
		{
			$city = $this->input->get("city");
			$this->section_title = $this->mlocation->return_city($city)->name;
			$offers = $this->moffer->return_ljetovanja($city);
			$this->render(array(
			   "name" => "ljetovanja",
			   "data" =>  array(
			   		"countries" => null,
			   		"offers" => $offers,
			   		"cities" => null,
			  		)
			));
		}
		else
		{
			$this->section_title = "Ljetovanja";
			$countries = $this->moffer->return_countries();
			$this->render(array(
			   "name" => "ljetovanja",
			   "data" =>  array(
			   		"countries" => $countries,
			   		"offers" => null,
			   		"cities" => null,
			  		)
			));	
		}
		
	}
	
	/**
	 * Akcija ljetovanja prikazuje sva ljetoovanja
	 * meni sa izborom zemlje
	 */
/*	
	public function action_ljetovanja($country = "sve", $smjestaj = "hotel")
	{
		$this->page_title = "Ljetovanja"." | Turisticka agencija Tavor - Pale";
		$this->section_title = "Ljetovanja";
		
		$this->load->model("moffer");
		
		$offers = $this->moffer->return_offers("ljetovanje", "sve", "hotel");
		$offers_menu = find_offers($offers);
		$smjestaji = $this->moffer->return_smjestaj("ljetovanje");
		
		if($this->input->get("country"))
		{
			$country = $this->input->get("country");
		}
		
		if($this->input->get("accomodation-type"))
		{
			$smjestaj = $this->input->get("accomodation-type");
		}
		if($smjestaj == "svi" AND $country == "sve")
			$offers = $this->moffer->return_promoted_offers("ljetovanje");
		else if($smjestaj == "svi" AND $country != "sve")
			$offers = $this->moffer->return_offers("ljetovanje", $country, "hotel");
		else 
		{
			$offers = $this->moffer->return_offers("ljetovanje", $country, $smjestaj);
		}
		$this->meta_description = "Specijalna sezonska ponuda za ljetovanje, odmor na moru, krstarenje, aktivni ljetni turizam";
		
		$this->render(array(
		   "name" => "ljetovanjaBeck",
		   "data" =>  array(
		   		"offers" => $offers,
		   		"offersMenu" => $offers_menu,
		   		"country" => $country,
		   		"smjestaj" => $smjestaj,
		   		"smjestaji" => $smjestaji
		  		)
		));
	
	}
	*/
	/**
	 * Akcija Zimovanje prikazuje jedno Zimovanje
	 */
	public function action_zimovanje($id)
	{
		
		$this->load->model("moffer");
		
		$offer = $this->moffer->return_offer($id);
		$offers = $this->moffer->return_offers("zimovanje", "sve", "svi");
		$offer_menu = $this->moffer->return_offers("zimovanje",$offer->zemlja,"svi");
		$offers_menu = find_offers($offers);
		
		$this->page_title = $offer->naslov." | Turisticka agencija Tavor - Pale";
		$this->section_title = $offer->zemlja;
		if($offer->opis) $this->meta_description = $offer->opis;
		
		$this->render(array(
		   "name" => "zimovanje",
		   "data" =>  array(
		   "offer" =>$offer,
		   "menu" => $offers_menu,
		   "offers_menu" => $offer_menu
		  		
		  		)
		));
	
	}
	
	
	/**
	 * Akcija Zimovanja prikazuje sva Zimovanja
	 * meni sa izborom zemlje
	 */
	
	public function action_zimovanja($country = "sve", $smjestaj = "hotel")
	{
		$this->page_title = "Zimovanja"." | Turisticka agencija Tavor - Pale";
		$this->section_title = "Zimovanja";
		$this->meta_description = "Specijalna sezonska ponuda za zimovanje, odmor na planini, skijanje, aktivni zimski turizam";
		
		$this->load->model("moffer");
		
		$offers = $this->moffer->return_offers("zimovanje", "sve", "hotel");
		$offers_menu = find_offers($offers);
		$smjestaji = $this->moffer->return_smjestaj("zimovanje");
		
		if($this->input->get("country"))
		{
			$country = $this->input->get("country");
		}
		
		if($this->input->get("accomodation-type"))
		{
			$smjestaj = $this->input->get("accomodation-type");
		}
		if($smjestaj == "svi")
			$offers = $this->moffer->return_offers("zimovanje", $country, "hotel");
		else 
		{
			$offers = $this->moffer->return_offers("zimovanje", $country, $smjestaj);
		}
		
		$this->render(array(
		   "name" => "zimovanja", 
		   "data" =>  array(
		   		"offers" => $offers,
		   		"offersMenu" => $offers_menu,
		   		"country" => $country,
		   		"smjestaj" => $smjestaj,
		   		"smjestaji" => $smjestaji
		  		)
		));
	
	}
	
	
	/**
	 * Akcija ponude vraca sve clanke
	 * meni sa kategorijama clanaka
	 */
	public function action_ponude($cid = null)
	{
		$this->page_title = "Ponude"." | Turisticka agencija Tavor - Pale";
		$this->section_title = "Ponude";
		
		$this->load->model("mpost");
		$this->load->model("mkategorija");
		
		
		$allPosts = $this->mpost->return_all_active_posts();
		//vracanje kategorija koje imaju aktivnu ponudu
		$unique = $this->mpost->return_unique_categories();
		$cids = makeCategoryList($unique);
		$categories = $this->mkategorija->return_active_categories($cids);
		$this->meta_description = "Sve ponude i aranzmani turisticke agencije Tavor na Palama";
		
		
		
		if($this->input->get("id"))
		{
			$cid = $this->input->get("id");
		}
		
		if ($cid)
		{
			$posts = $this->mpost->return_posts($cid);
			if($this->mkategorija->return_category($cid)->opis) $this->meta_description = $this->mkategorija->return_category($cid)->opis;
			if($this->mkategorija->return_category($cid)->link)
				$this->background_picture = $this->mkategorija->return_category($cid)->link;	
		} else {
			
			$posts = $this->mpost->return_topical_posts();
		}
		
		
		$this->render(array(
		   "name" => "ponude",
		   "data" =>  array(
		   		"posts" => $posts,
		   		"categories" => $categories,
		   		"cid" => $cid
		  	)
		));
	
	}
	
// Administracija----------------------------------------------------------

		/**
		 * Akcija spisak clanaka prikazuje sve clanke
		 */
		public function action_spisak_clanaka()
		{
			$this->check_login();
			$this->page_title = "Spisak Članaka";
			$this->layout = "admin_layout";
			
			$this->load->model("mpost");
			$this->load->model("mkategorija");
			
			if($this->input->post('admin-filter'))
			{
				$data['status'] = (int)$this->input->post('status');
				$data['category'] = (int)$this->input->post('category');
				$data['aktuelno'] = (int)$this->input->post('aktuelno');
			}
			else 
			{
				$data['status'] = -1;
				$data['category'] = -1;
				$data['aktuelno'] = -1;	
			}
			
			
			if($data['status'] != -1 or $data['category'] != -1 or $data['aktuelno'] != -1)
			{
				$posts = $this->mpost->filter($data);
			}
			else
			{
				$posts = $this->mpost->return_all_posts();
			}
			
			$unique = $this->mpost->return_unique_categories();
			$cids = makeCategoryList($unique);
			$categories = $this->mkategorija->return_active_categories($cids);
			
	
			

			
			$this->render(array(
			"name" => "admin_clanci",
			"data" => array(
				"posts" => $posts,
				"categories" => $categories,
				"status" => $data['status'],
				"cat" => $data['category'],
				"aktuelno" => $data['aktuelno']
			
			 )
			));
		}
		
		
		
		/**
		 *Akcija izmjeni clanak otvara postojeci clanak u formi
		 */
		
		public function action_izmjeni_clanak($pid)
		{
			$this->check_login();
			$this->page_title = "Izmjeni Članak";
			$this->layout = "admin_layout";
			
			$this->load->model("mpost");
			$post = $this->mpost->return_post($pid);
			$this->load->model("mkategorija");
			$categories = $this->mkategorija->return_categories();
			
			$this->render(array(
			"name" => "_admin_izmjeni_clanak",
			"data" => array(
				"post" => $post,
				"categories" => $categories
				)
			));
		}
		
		/**
		*Akcija novi clanak otvara formu za unos novog clanka
		**/
		
		public function action_novi_clanak()
		{
			$this->check_login();
			$this->page_title = "Novi Clanak";
			$this->layout = "admin_layout";
			
			$this->load->model("mkategorija");
			$this->load->model("mpost");
			$categories = $this->mkategorija->return_categories();
			$prioritet = $this->mpost->return_prioritet()->prioritet + 1;
			$this->render(array(
			"name" => "_admin_novi_clanak",
			"data" => array(
				"categories" => $categories,
				"prioritet" => $prioritet,
				)
			));
		}
		
		
		/**
		 * Akcija update calnak kupi podatke iz foreme metodom POST
		 * i upisuje ih u bazu
		 */
		public function action_update_clanak()
		{
			$this->check_login();
			$this->load->model("mpost");
			//$this->load->library('upload');
		    //$img = $this->upload_file(TRUE);
			if (!$this->input->post("slika-clanka")) 
			{
				$img = $this->mpost->return_post($this->input->post("id"))->link;
			}
			else 
				$img = substr($this->input->post("slika-clanka"),1);
			
			$this->reorder($this->input->post("prioritet-clanka"),$this->mpost->return_post($this->input->post("id"))->prioritet);
			
			$post = array(
				"cid" => $this->input->post("id"),
				"naslov" => $this->input->post("naslov-clanka"),
				"tekst" => $this->input->post("sadrzaj-clanka"),
				"prioritet" => $this->input->post("prioritet-clanka"), 
				"link" => $img,
				"status" => $this->input->post("status"),
				"kategorija_id" => $this->input->post("destinacija"),
				"aktuelno" => $this->input->post("aktuelno"),
				"slider" => $this->input->post("slider"),
				"slider_naslov" => $this->input->post("naslov-slider"),
				"slider_tekst" => $this->input->post("tekst-slider"),
				"opis" => $this->input->post("opis")
			);
			$this->mpost->update_post($post);
			redirect(site_url("post/spisak_clanaka"));
		}
		
		/**
		 * Akcija add clanak kupi podatke iz foreme metodom POST
		 * i upisuje ih u bazu
		 */
		public function action_add_clanak()
		{
			$this->check_login();
			$this->load->model("mpost");
			//$this->load->library('upload');
		   //$img = $this->upload_file(TRUE);
		   //$img = "konj";
			$this->reorder($this->input->post("prioritet-clanka"));
			$post = array(
				"naslov" => $this->input->post("naslov-clanka"),
				"tekst" => $this->input->post("sadrzaj-clanka"), 
				"link" => substr($this->input->post("slika-clanka"),1),
				"status" => $this->input->post("status"),
				"prioritet" => $this->input->post("prioritet-clanka"),
				"kategorija_id" => $this->input->post("destinacija"),
				"aktuelno" => $this->input->post("aktuelno"),
				"slider" => $this->input->post("slider"),
				"slider_naslov" => $this->input->post("naslov-slider"),
				"slider_tekst" => $this->input->post("tekst-slider"),
				"opis" => $this->input->post("opis")				
			);
			$this->mpost->write_post($post);
			redirect(site_url("post/spisak_clanaka"));
		}
		
		/**
		 * Akcija delete calnak brise red u bazi odredjen id-om
		 */
		public function action_delete_clanak($id)
		{
			$this->check_login();
			$this->load->model("mpost");
			
			
			$this->mpost->delete_post($id);
			redirect(site_url("post/spisak_clanaka"));
		}

    /**
     * Akcija prikaz u slideru clanak stavlja clanak u slider ili ga brise iz njega
     */
//TODO uraditi funkciju za toggle stavljanje u slider
//    public function action_prikaz_u_slideru_clanak()
//    {
//        $this->check_login();
//        $this->load->model('mpost');
//
//        $post = array(
//            "cid" => $this->input->post("id"),
//        );
//
//        $this->mpost->
//    }

//ponude		
    /**
		 * Akcija spisak ponuda prikazuje sve ponude
		 */
		public function action_spisak_ponuda()
		{
			$this->check_login();
			$this->page_title = "Spisak Ponuda";
			$this->layout = "admin_layout";
			
			$this->load->model("moffer");
			$zemlje = $this->moffer->return_all_zemlje();
			
			if($this->input->post('admin-filter'))
			{
				$data['status'] = (int)$this->input->post('status');
				$data['zemlja'] = $this->input->post('zemlja');
				$data['sezona'] = $this->input->post('sezona');
			}
			else 
			{
				$data['status'] = -1;
				$data['zemlja'] = "sve";
				$data['sezona'] = "sve";	
			}
			
			
			if($data['status'] != -1 or $data['zemlja'] != "sve" or $data['sezona'] != "sve")
			{
				$offers = $this->moffer->filter($data);
			}
			else
			{
				$offers = $this->moffer->return_all_season_offers();
			}

			$this->render(array(
			"name" => "admin_ponude",
			"data" => array(
				"offers" => $offers,
				"status" => $data['status'],
				"zem" => $data['zemlja'],
				"sezona" => $data['sezona'],
				"zemlje" => $zemlje
			 )
			));
		}
		
		
		
		/**
		 *Akcija izmjeni ponudu otvara postojeci ponudu u formi
		 */
		
		public function action_izmjeni_ponudu($id)
		{
			$this->check_login();
			$this->page_title = "Izmjeni Ponudu";
			$this->layout = "admin_layout";
			
			$this->load->model("moffer");
			$offer = $this->moffer->return_eny_offer($id);
			
			$this->load->model("mlocation");
			$cities = $this->mlocation->return_cities();
			
			$this->render(array(
			"name" => "_admin_izmjeni_specijalnu_ponudu",
			"data" => array(
				"offer" => $offer,
				"cities" => $cities,
				)
			));
		}
		
		/**
		*Akcija nova ponuda otvara formu za unos nove ponude
		**/
		
		public function action_nova_ponuda()
		{
			$this->check_login();
			$this->page_title = "Nova Ponuda";
			$this->layout = "admin_layout";
		
			
			$this->load->model("mkategorija");
			$categories = $this->mkategorija->return_categories();
			
			$this->load->model("mlocation");
			$cities = $this->mlocation->return_cities();
			
			$this->render(array(
			"name" => "_admin_nova_specijalna_ponuda",
			"data" => array(
				"categories" => $categories,
				"cities" => $cities,
				)
			));
		}
		
		
		/**
		 * Akcija update ponuda kupi podatke iz foreme metodom POST
		 * i upisuje ih u bazu
		 */
		public function action_update_ponudu()
		{
			$this->check_login();
			$this->load->model("moffer");
			//$this->load->library('upload');
		    //$img = $this->upload_file(TRUE);
		    if (!$this->input->post("slika-clanka")) 
			{
				$img = $this->moffer->return_eny_offer($this->input->post("id"))->link;
			}
			else 
				$img = substr($this->input->post("slika-clanka"),1);
			
			$offer = array(
				"pid" => $this->input->post("id"),
				"naslov" => $this->input->post("naslov-specijalne-ponude"),
				"tekst" => $this->input->post("sadrzaj-specijalne-punude"),
				"status" => $this->input->post("status"),
				"link" => $img,
				"aktuelno" => $this->input->post("aktuelno"),
				"sezona" => $this->input->post("sezona"),
				"smjestaj" => $this->input->post("smjestaj"),
				"opis" => $this->input->post("opis"),
				"zemlja" => $this->input->post("zemlja"),
				"grad_id" => $this->input->post("grad")
			);
			$this->moffer->update_offer($offer);
			redirect(site_url("post/spisak_ponuda"));
		}
		
		/**
		 * Akcija add ponudu kupi podatke iz foreme metodom POST
		 * i upisuje ih u bazu
		 */
		public function action_add_ponudu()
		{
			$this->check_login();
			$this->load->model("moffer");
			//$this->load->library('upload');
		   	//$img = $this->upload_file(TRUE);
			
			$offer = array(
				"naslov" => $this->input->post("naslov-specijalne-ponude"),
				"tekst" => $this->input->post("sadrzaj-specijalne-punude"),
				"status" => $this->input->post("status"),
				"link" => substr($this->input->post("slika-clanka"),1),
				"sezona" => $this->input->post("sezona"),
				"aktuelno" => $this->input->post("aktuelno"),
				"smjestaj" => $this->input->post("smjestaj"),
				"opis" => $this->input->post("opis"),
				"zemlja" => $this->input->post("zemlja"),
				"grad_id" => $this->input->post("grad")
			);
			$this->moffer->write_offer($offer);
			redirect(site_url("post/spisak_ponuda"));
		}
		
		/**
		 * Akcija delete ponudu brise red u bazi odredjen id-om
		 */
		public function action_delete_ponudu($id)
		{
			$this->check_login();
			$this->load->model("moffer");
			
			
			$this->moffer->delete_offer($id);
			redirect(site_url("post/spisak_ponuda"));
		}
		
		
		//test
		public function action_test()
	{
		$this->page_title = "Ponude";
		$this->section_title = "Ponude";
		
		$this->load->model("mpost");
		$this->load->model("mkategorija");
		
		
		//$allPosts = $this->mpost->return_unique_categories();
		//$cids = makeCategoryList($allPosts);
		//$categories = $this->mkategorija->return_active_categories($cids);
		//$categories = isNotEmpity($categories,$allPosts);
		$data['status'] = 1;
		//$data['category'] = 2;
		$data['aktuelno'] = 1;
		$posts = $this->mpost->filter($data);
		
		
		
		
		$this->render(array(
		   "name" => "test",
		   "data" =>  array(
		   		"posts" => $posts
		  	)
		));
	
	}
	
	
	
	/**
	 * funkcija za upload file
	 */
	 function upload_file($upload_type,$path= null)
		{
			$this->load->library('upload');
    		//upload file
    		if($upload_type)
			{
				
            	$config['upload_path'] = "images/clanci";
            	$config['allowed_types'] = 'gif|jpg|jpg|png|pdf';
            	$config['max_width'] = '609';
            	$config['max_height'] = '289';
				 $this->upload->initialize($config);
			}
			else {
				$config['upload_path'] = $path;
            	$config['allowed_types'] = 'pdf';
            	$config['max_size'] = '3145728';
			
				 $this->upload->initialize($config);
			}
    
			
			

			if($upload_type)
			{
				if ( ! $this->upload->do_upload("slika-clanka"))
				{
					//echo  $this->upload->display_errors();
				}
				/*else 
				{
					$data = $this->upload->do_upload();
				}*/
			}
			
			else
			{
				if ( ! $this->upload->do_upload("pdf"))
				{
					echo  $this->upload->display_errors();
				}
				else 
				{
					$data = $this->upload->do_upload("pdffile");
				}
			}
				
			
			
			 $data = $this->upload->data();
			 return $data["file_name"];
		}

	public function reorder($newNum,$oldNum=0){
		$this->load->model("mpost");
		$posts = $this->mpost->return_all_posts();
		foreach ($posts as $post) {
			//print_r($newNum." ".$oldNum." ".$prioritet);
			if($post->prioritet == $oldNum)
				return;
			if($post->prioritet == $newNum) {
				$newNum++;
				$clanak = array(
					"cid" => $post->cid,
					"prioritet" => $newNum,
				);
				$this->mpost->update_post($clanak);
			}
		}
	}
}

/* End of file post.php */
/* Location: ./application/controllers/post.php */
