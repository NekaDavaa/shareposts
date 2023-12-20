<?php
/*
* App Core class
* Creates URL & Load core controller
* URL Format - website.com/controller/method/params
*/
class Core {
	protected $currentController = 'Pages';
	protected $currentMethod = 'index';
	protected $params = [];

    public function __construct() {
  
      $url = $this->getURL();
      if (!empty($url)) {
      if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
      	$this->currentController = ucwords($url[0]);
      	unset($url[0]);
      }
      }

      //Require controller
      require_once '../app/controllers/' . $this->currentController . '.php';

      //Instance controller class
      $this->currentController = new $this->currentController;

      //Check for index1/method
      if(isset($url[1])) {
      	if(method_exists($this->currentController, $url[1])) {
      		$this->currentMethod = $url[1];
          unset($url[1]);
      	}
      }
     //Params
      $this->params = $url ? array_values($url) : [];
      
      call_user_func([$this->currentController, $this->currentMethod], $this->params);

    }

	public function getURL() {
      if (isset($_GET['url'])) {
     $url = rtrim($_GET['url'], '/');
     $url = filter_var($url, FILTER_SANITIZE_URL);
     $url = explode('/', $url);
	}
	else {
        $url = [];
    }
   return $url;
}
}