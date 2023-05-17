<?php

namespace App\Repositories;

use App\Models\UserAdmin;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class UserRepository.
 */
class UserRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return UserAdmin::class;
    }

    public function allUser()
    {
        return $this->model->all();
    }
}
