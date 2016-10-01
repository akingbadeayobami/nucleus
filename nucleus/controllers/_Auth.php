<?php

class _Auth extends Controller{

	public function signin(){

		$this->middleWare('guest');

		$this->action('signIn','User','signin',Input::all());

		return $this->view('auth.signin');

	}

	public function signup(){

		$this->middleWare('guest');

		$this->action('signUp','User','signup',Input::all());

		return $this->view('auth.signup');

	}

	public function forgotpassword(){

		$this->middleWare('guest');

		$this->action('forgotPassword','User','recoverPassword',Input::all());

		return $this->view('auth.forgotpassword');

	}

	public function terms(){

		return $this->view('terms');

	}

	public function activate($activatecode){

		$_POST['token'] = Token::generate();

		$_POST['activate'] = '1';

		$return = $this->processForm('activate','User','activateAccount',["activatecode" => $activatecode]);

		$this->render('views/activateaccount',[

			'confirmed' => $return->status,

			'name' => $return->data,

			'title' => 'Account Activation'

		]);

	}

}
