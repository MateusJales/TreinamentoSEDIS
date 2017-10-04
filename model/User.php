<?php

	class User 
	{
		public $user;
		public $isAdmin;
		public $photo;

		public function __construct($p_user, $p_isAdmin, $p_photo)
		{
			$this->user = $p_user;
			$this->isAdmin = $p_isAdmin;
			$this->photo = $p_photo;
		}
	}