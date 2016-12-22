<?php //<meta name=“camponent” content=“type=pannellum|file=/image/sample.jpg|size=title-special”>
	  //<span class="camponent_pannellum_vr"></span>
class camponent_pannellum_vr extends camPonents

{
	protected $trigger = 'pannellum'; //content="type=pannellum"
	protected $method  = 'replace';	
	protected $needle  = 'camponent_pannellum_vr'; //class="camponent_pannellum_vr"	
	private   $config  =  null;

	protected function configure($config=null)
	{
		$this->config = new stdClass();
		$r = false;
		if(is_array($config))
		{
			foreach($config as $config_item)
			{
				$c = explode("=",$config_item);
				if(is_array($c) && count($c) == 2)
				{
					$this->config->$c[0] = $c[1];
				}
			}
		}
		//file
			if(isset($this->config->file) && is_string($this->config->file))
		{
			$r = true;
		}
		if(isset($this->config->width) && is_string($this->config->width))
		{
			$width = $this->config->width;
			$height = intval($width * .6666);
			$this->config->height = $height;
		}
		else{
			$this->config->width = 650;
			$this->config->height = 500;
		}
		
		return $r;
	}
	protected function preprocess()
	{

		return null;
	}

	protected function process()
	{
		$script = '
		<iframe width="'.$this->config->width.'px;" height="'.$this->config->height.'"
		allowfullscreen style="border-style:none;" src="https://cdn.pannellum.org/2.3/pannellum.htm?panorama='.$this->config->file.'"></iframe>
		';
		return $script;
	}
	protected function postprocess()
	{
		return null;
	}
}
?>