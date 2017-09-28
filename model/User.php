<?php

	class User 
	{
		public $user;
		public $isAdmin;

		public function __construct($p_user, $p_isAdmin)
		{
			$this->user = $p_user;
			$this->isAdmin = $p_isAdmin;
		}
	}