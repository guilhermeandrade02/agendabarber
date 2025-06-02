<?php

namespace App\Http\Controllers\painel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Services;
use App\Models\Times;
use App\Models\ScheduledTime;
use Carbon\Carbon;

class CalendarController extends Controller
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
        $service = Services::orderBy('name', 'asc')->get();

         return view('painel.calendar.show' ,[

            'service' => $service,
            'employee' => $employee,
            
         ]);
         
     }

     public function getEvents(Request $request)
     {
         $employeeId = $request->query('employeeId');
             
         $events = ScheduledTime::where('employee_id', $employeeId)->get();
 
         return response()->json($events);
 
     }

     public function storeEvents(Request $request)
     {
      
          // Criar um objeto Carbon combinado com data e hora
           $eventDateTime = Carbon::createFromFormat('d-m-Y H:i:s', $request->event_date . ' ' . $request->event_time);


        $service = Services::where('id', $request->service_id)->first();
        $time = Times::where('time', $request->event_time)->first();
        // Criação de um novo evento
        $event = new ScheduledTime();
        $event->employee_id = $request->employee_id;
        $event->service_id = $request->service_id;
        $event->service_name = $service->name;
        $event->time = $request->event_time;
        $event->time_id = $time->id;
        $event->client_name = $request->client_name;
        $event->date = $eventDateTime;
        // Salva o evento no banco de dados
        $event->save();

        // Retorna uma resposta JSON de sucesso
        return response()->json($request->employee_id);
    
     }





     public function timesEvents(Request $request)
{
    $employeeId = $request->input('employee_id');
    $eventDate = $request->input('event_date');

   
    $formattedDate = date('Y-m-d', strtotime($eventDate));

    // Horários disponíveis padrão (por exemplo, de 9h às 17h com intervalos de 30 minutos)
    $horariosSalvos = Times::pluck('time')->toArray();

    // Buscar os eventos já marcados para o dia e funcionário específicos
    $events = ScheduledTime::where('employee_id', $employeeId)
                           ->whereDate('date', $formattedDate)
                           ->pluck('time') // Pluck para obter apenas os horários marcados
                           ->toArray();
    
    // Filtrar os horários disponíveis removendo os horários já marcados
    $availableTimes = array_diff($horariosSalvos, $events);
    
    // // Retornar os horários disponíveis como JSON
    return response()->json(['times' => array_values($availableTimes)]);
}

    

}
