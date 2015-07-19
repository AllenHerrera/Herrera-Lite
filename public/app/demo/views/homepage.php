<?php

class homepageView extends \Loader {

	public function index($view, $data) {

		$body =$this->view(PACKAGE.APPLICATION.$view.'.html',$data);
		//echo $body;
	}
}
?>
