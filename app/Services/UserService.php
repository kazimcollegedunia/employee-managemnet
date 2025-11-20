<?php

namespace App\Services;

use App\Repositories\Contracts\EmployeeRepositoryInterface;
use App\Models\ContactNumber;
use App\Models\Address;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserService
{
    public function prepareUsersData(array $payload)
    {
        return $payload;
    }   
    
    public function getActiveUsers()
    {
        return User::get();
    }

}
