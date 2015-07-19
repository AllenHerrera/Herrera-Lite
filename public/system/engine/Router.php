<?php

class Router
{
	protected $controller ='home';

	protected $method = 'index';

	protected $params = [];

	public function __construct($registry)
	{
		$this->registry = $registry;
		$url = $this->parseUrl();

		if(file_exists(APP.APPLICATION.'/controllers/' . $url[0].'.php'))
		{
			$this->controller = $url[0];
			unset($url[0]);
  	}

		require_once APP.APPLICATION.'/controllers/' . $this->controller.'.php';

		$this->controller = new $this->controller($this->registry);

		/* uncomment if you want to run a different method besides index */
		// if(isset($url[1]))
		// {
		// 	if(method_exists(($this->controller), $url[1]))
		// 	{
		// 		$this->method = $url[1];
		// 		unset($url[1]);
		// 		echo "<br>overwriting method: "; print_r($this->method);
		// 	}
		// }

		/* Allows you to pass params via url that arnt get variables  */
		//$this->params = $url? array_values($url): [];

		call_user_func_array([$this->controller,$this->method], $this->params);
	}

	public function parseUrl()
	{
		if(isset($_GET['url']))
		{
			return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
		}
	}
}
