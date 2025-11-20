<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CrudService;

class AdminController extends Controller
{
    private $crud;

    public function __construct(CrudService $crud)
    {
        $this->crud = $crud;
    }

    public function roles()
    {
        return $this->crud->getAll(\App\Models\Role::class);
    }

    public function createRole(Request $req)
    {
        return $this->crud->create(\App\Models\Role::class, $req->all());
    }

    public function permissions()
    {
        return $this->crud->getAll(\App\Models\Permission::class);
    }

    public function createPermissions(Request $req)
    {
        return $this->crud->create(\App\Models\Permission::class, $req->all());
    }

    public function modal()
    {
        return $this->crud->getAll(\App\Models\Modal::class);
    }   

    public function createModal(Request $req)
    {
        return $this->crud->create(\App\Models\Modal::class, $req->all());
    }   
    
}
