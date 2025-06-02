<?php

namespace App\Http\Controllers\painel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Services;
use App\Models\CategoryService;
use App\Models\Employee;
use App\Models\Event;
use App\Models\ScheduledTime;
use DateTime;
use Faker\Factory as Faker;


class ServicesController extends Controller
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
        $service = Services::orderBy('name', 'asc')->with('categories')->get();
     
        return view('painel.services.show' ,[
            'service' => $service,
        ]);
        
    }

    public function create()
    {       
        $category = CategoryService::where('status', 'enabled')->with('service')->get();
        return view('painel.services.create', [
            'category' => $category,
        ]);
    }

    public function edit($id)
    {      
        $service = Services::where('id', $id)->first();
        $category = CategoryService::where('status', 'enabled')->with('service')->get();
        return view('painel.services.edit', [

            'service' => $service,
            'category' => $category,

        ]);
        
    }

    public function store(Request $request)
    {        
    
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'value' => 'required|string',  
            'category_id' => 'required|int',  
            'status' => 'required|string',            
        ]);
       
        $employee = Services::create($validatedData);
             
        return view('painel.service-show');
    }

    public function update(Request $request, $id)
    {       

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'value' => 'required|string',  
            'category_id' => 'required|int',  
            'status' => 'required|string', 
        ]);
        
        $service = Services::findOrFail($id);
        $service->update($validatedData);
       
        return redirect()->route('service-edit', $service)->with('success', 'Funcionário atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $Services = Services::findOrFail($id);
        $Services->delete();

        return redirect()->route('service-show')->with('success', 'Funcionário excluído com sucesso!');
    }


    
}
