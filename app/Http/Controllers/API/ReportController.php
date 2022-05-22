<?php

namespace App\Http\Controllers\API;


use App\Http\Controllers\API\BaseController;
use App\Models\Survivor;
use App\Models\Robot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Validator;


class ReportController extends BaseController
{


    public function getSurvivorsList(Request $request)
    {
        $survivors = Survivor::with('inventory','zombie_report')->paginate(30);
        return $this->sendResponse($survivors, 'List of Survivors ');
    }

    public function getInfectedSurvivorsList(Request $request)
    {
        $survivors = Survivor::where('infected_status',1)->paginate(30);
        return $this->sendResponse($survivors, 'List of Infected Survivors ');
    }

    public function getNonInfectedList(Request $request)
    {
        $survivors = Survivor::where('infected_status',0)->paginate(30);
        return $this->sendResponse($survivors, 'List of Non Infected Survivors ');
    }

    public function getPercentage(Request $request)
    {
        $nonInfectedCount = Survivor::where('infected_status',0)->count();
        $infectedCount = Survivor::where('infected_status',1)->count();
        $total = Survivor::count();
        $infectedPercentage = ($infectedCount/$total)*100;
        $nonInfectedPercentage = ($nonInfectedCount/$total)*100;
        $data['nonInfectedCount'] = $nonInfectedCount;
        $data['infectedCount'] = $infectedCount;
        $data['infectedPercentage'] = $infectedPercentage;
        $data['nonInfectedPercentage'] = $nonInfectedPercentage;
        $data['total'] = $total;
        return $this->sendResponse($data, 'Count and Percentage of Survivors ');
    }

    public function getRobotsList(Request $request)
    {
        $robots = Robot::paginate(30);
        return $this->sendResponse($robots, 'List of Robots ');
    }



}
