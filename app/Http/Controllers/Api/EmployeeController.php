<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Http\Resources\EmployeeResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $posts = Employee::latest()->paginate(5);

        return new EmployeeResource(true, 'List Data Employees', $posts);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            'address' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $image = $request->file('image');
        $image->storeAs('public/employees', $image->hashName());

        $employee = Employee::create([
            'image' => $image->hashName(),
            'name' => $request->name,
            'address' => $request->address,
        ]);

        return new EmployeeResource(true, 'Data Berhasil Berhasil Ditambahkan!', $employee);
    }

    public function show($id)
    {
        $post = Employee::find($id);

        return new EmployeeResource(true, 'Detail Data Employee!', $post);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required',
            'address'   => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $employee = Employee::find($id);

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $image->storeAs('public/employees', $image->hashName());

            Storage::delete('public/employees/'.basename($employee->image));

            $employee->update([
                'image'     => $image->hashName(),
                'name'     => $request->name,
                'address'   => $request->address,
            ]);

        } else {

            $employee->update([
                'name'     => $request->name,
                'address'   => $request->address,
            ]);
        }

        return new EmployeeResource(true, 'Data Employee Berhasil Diubah!', $employee);
    }


    public function destroy($id)
    {

        $employee = Employee::find($id);

        Storage::delete('public/employees/'.basename($employee->image));

        $employee->delete();

        return new EmployeeResource(true, 'Data Employee Berhasil Dihapus!', null);
    }
}
