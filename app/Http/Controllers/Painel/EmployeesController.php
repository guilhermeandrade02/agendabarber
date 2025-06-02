<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeesController extends Controller
{
      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function show()
    {       
        $employee = Employee::orderBy('name', 'asc')->get();
        return view('painel.employees.show' ,[
            'employee' => $employee,
        ]);
        
    }

    public function create()
    {       
        return view('painel.employees.create');
    }

    public function edit($id)
    {       
        $employee = Employee::where('id', $id)->first();

        return view('painel.employees.edit', [

            'employee' => $employee,

        ]);
        
    }

    public function store(Request $request)
    {        
     
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|string',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'birthdate' => 'required|date',
            'address' => 'required|string|max:255',
        ]);
       
        $employee = Employee::create($validatedData);
             
        return view('painel.employees.store', ['employee' => $employee]);
    }

    public function update(Request $request, $id)
    {       

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'birthdate' => 'required|date',
            'address' => 'required|string|max:255',
        ]);
        
        $employee = Employee::findOrFail($id);
        $employee->update($validatedData);
       
        return redirect()->route('employees-edit', $employee)->with('success', 'Funcionário atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('employees-show')->with('success', 'Funcionário excluído com sucesso!');
    }



    

   
}
