<?php
class Loader {

	private $registry;

	public function __construct ($registry) {
		$this->registry = $registry;
	}

	//shows the output
	public function view ($file, $data = array()) {

		if(file_exists($file)) {
			extract($data);
			require($file);

		} else {
			trigger_error("Failed to find file: $file", E_USER_ERROR);
			exit();
		}

	}
	//returns the value of the output
	public function setView ($file, $data = array()) {

		if(file_exists($file)) {
			extract($data);

			ob_start();
			require($file);
			$output = ob_get_contents();
			ob_end_clean();
			return $output;
		} else {
			trigger_error("failed to find file: $file", E_USER_ERROR);
			exit();
		}

	}

}
