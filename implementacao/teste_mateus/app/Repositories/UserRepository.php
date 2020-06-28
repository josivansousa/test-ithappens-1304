<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Pnae\Contracts\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
	private $model;

	public function __construct(User $model)
	{
		$this->model = $model;
	}

}
