<?php
//funkcija koja pravi listu
function makeCategoryList($array, $curent = 0)
{
	$i = 0;
	foreach ($array as $a)
	{
		if($curent != $a->kategorija_id)
			$niz[$i++] = $a->kategorija_id;
	}
	
	
	return $niz;
	
}

//funkcija koja pravi listu
function makeList($array)
{
	$i = 0;
	foreach ($array as $a)
	{
			$niz[$i++] = $a->kategorija;
	}
	
	
	return $niz;
	
}

//funkcija koja vraca zemlje
function find_offers($offers)
{
	if(!$offers) return null;
	$i = 0;
	foreach ($offers as $offer)
	{
		$zemlja[$i] = $offer->zemlja;
		$i++;
	}
	$s = 0;
	for($k=0;$k<$i;$k++)
	{
		$t=0;
		for ($j=$k+1; $j < $i; $j++) 
		{ 
			if($zemlja[$k] == $zemlja[$j])
			{
				$t=1;
			}
		}
		if($t == 0)
		{
			$pom[$s++] = $zemlja[$k];
		}
	}
	return $pom;
}

/**
 * Funkcija koja generise linkove za dijeljenje sadrzaja na odabranoj socijalnoj mrezi
 * 
 */
function socialLinks($network, $contentURL, $title, $text, $image, $hashtags = null)
{
	$contentURL = urlencode($contentURL);
	$title = urlencode($title);
	$text = urlencode($text);
	$hashtags = urlencode($hashtags);
	$image = urlencode($image);
	
	if ($network == 'facebook')
	{
		$socialURL = 'http://www.facebook.com/sharer.php?s=100&amp;p[title]=' . $title . '&amp;p[summary]=' . $text . '&amp;p[url]=' . $contentURL . '&amp;&amp;p[images][0]=' . $image;
	
	}
	else if ($network == 'twitter')
	{
		$socialURL = 'http://twitter.com/share?url=' . $contentURL . '&text=' . $title . '&count=horiztonal';
	}
	
	return $socialURL;
}

function findImages()
{
	$imgdir = './images/clanci/'; //Pick your folder    
	$allowed_types = array('png','jpg','jpeg','gif'); //Allowed types of files
	$dimg = opendir($imgdir);//Open directory
	while($imgfile = readdir($dimg))
	{

		if( in_array(strtolower(substr($imgfile,-3)),$allowed_types) OR
		in_array(strtolower(substr($imgfile,-4)),$allowed_types) )
		/*If the file is an image add it to the array*/
		{$a_img[] = $imgfile;}
	}
	return $a_img;
}

 ?>