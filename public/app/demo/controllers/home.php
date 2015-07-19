<?php

class Home extends \Controller
{
	public function index($name = 'alex', $mood = 'happy')
	{
		$user = $this->model('user');
		$user->name = $name;

		$this->view('homepage', [
			'name' => $user->name,
			'mood' => $mood
			]);
			
	}
}
