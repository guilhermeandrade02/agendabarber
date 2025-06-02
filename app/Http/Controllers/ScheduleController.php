<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\Employee;
use App\Models\Services;
use App\Models\Times;
use App\Models\CategoryService;
use App\Models\ScheduledTime;
use Illuminate\Http\Request;
class ScheduleController extends Controller
{
    public function home(){
        $semanaAtual = Carbon::now()->startOfWeek();
    
        // Inicializa um array para armazenar os dias da semana
        $diasDaSemana = [];
    
        // Preenche o array com os dias da semana
        for ($i = 0; $i < 7; $i++) {
            $diasDaSemana[] = $semanaAtual->copy()->addDays($i);
        }
        $service = Services::where('status', 'enabled')->get();
        $employee = Employee::orderby('id', 'desc')->get();
        $category = CategoryService::where('status', 'enabled')->with('service')->get();
       $time = Times::all();
        return view('schedule.home', [
            'employee' => $employee,
            'category' => $category,
            'time' => $time,
            'diasDaSemana' => $diasDaSemana
        ]);
    }

    public function schedule($service){
        $service = Services::where('id', $service)->first();
        $employees = Employee::orderby('id', 'desc')->get();
        $time = Times::all();
        return view('schedule.schedule', [
            'time' => $time,
            'employees' => $employees,
          'service' => $service,
        ]);

    }

    public function getHorarios($employeeId, Request $request){

        $serviceId = $request->input('service'); // Obtém o ID do serviço do request
        // Obtém a data do request (mes e dia)
        $mes = $request->input('mes');
        $dia = $request->input('dia');
        // Formata a data no formato esperado para comparação no banco de dados
        $date = sprintf('%04d-%02d-%02d', date('Y'), $mes, $dia);
        // Busca os horários já agendados para o funcionário, serviço e data específicos
        $scheduledTimes = ScheduledTime::where('employee_id', $employeeId)
            
            ->whereDate('date', $date)
            ->pluck('time_id') // Obtém apenas os IDs dos horários agendados
            ->toArray();
        // Se houver horários agendados, exclui esses horários da consulta de Times
        $times = Times::whereNotIn('id', $scheduledTimes)->get();
        // Obtém apenas os horários disponíveis
        $horariosArray = $times->pluck('time')->toArray();
        return response()->json($horariosArray);
    }

    public function agendarHorario(Request $request) {
        $employeeId = $request->input('employeeId');
        $mes = $request->input('mes');
        $dia = $request->input('dia');
        $service = $request->input('service');
        $horario = $request->input('horario');
    
        $services = Services::where('id', $service)->first();
        // Verifica e ajusta o formato do horário se necessário
        if (strlen($horario) === 5) {
            $horario .= ':00';
        }
    
        // Verifica se o horário existe na tabela Times
        $times = Times::where('time', $horario)->first();
        if (!$times) {
            return response()->json(['success' => false, 'error' => 'Horário não encontrado']);
        }
    
        // Formata a data para o formato esperado
        $date = sprintf('%04d-%02d-%02d', date('Y'), $mes, $dia);
    
        // Cria um novo objeto de ScheduledTime
        $scheduledTimes = new ScheduledTime();
        $scheduledTimes->employee_id = $employeeId;
        $scheduledTimes->date = $date;
        $scheduledTimes->service_id = $service;
        $scheduledTimes->service_name = $services->name;
        $scheduledTimes->time = $horario;
        $scheduledTimes->time_id = $times->id;
        $scheduledTimes->client_name = 'Guilherme';
        // Tenta salvar o agendamento
       
        if ($scheduledTimes->save()) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'error' => 'Erro ao salvar o horário']);
        }
        
    }
    
    


}
