<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees',
            'department_id' => 'required|exists:departments,id',
            'contacts' => 'array',
            'addresses' => 'array'
        ]);

        $employee = Employee::create($data);

        if (!empty($data['contacts'])) {
            foreach ($data['contacts'] as $contact) {
                $employee->contactNumbers()->create($contact);
            }
        }

        if (!empty($data['addresses'])) {
            foreach ($data['addresses'] as $address) {
                $employee->addresses()->create($address);
            }
        }

        return new EmployeeResource($employee->load('contactNumbers', 'addresses', 'department'));
    }

    public function search(Request $request)
    {
        $query = Employee::query();

        if ($request->name) {
            $query->where('name', 'like', "%{$request->name}%");
        }

        if ($request->email) {
            $query->where('email', $request->email);
        }

        if ($request->department_id) {
            $query->where('department_id', $request->department_id);
        }

        return EmployeeResource::collection(
            $query->with('department')->paginate(10)
        );
    }

}
