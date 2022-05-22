<?php

namespace App\Http\Controllers\API;


use App\Http\Controllers\API\BaseController;
use App\Models\Survivor;
use Illuminate\Http\Request;
use App\Models\ZombieReport;
use App\Models\Inventory;
use Illuminate\Support\Facades\Auth;

use Validator;


class SurvivorController extends BaseController
{


    public function getSurvivorsList(Request $request)
    {
        $survivors = Survivor::paginate(30);
        return $this->sendResponse($survivors, 'List of Survivors ');
    }

    public function addSurvivor(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'latitude' => '',
            'longitude' => '',
            'inventory_resource' => '',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Error validation', $validator->errors());
        }

        try {

            $survivor = Survivor::create([
                'name' =>  $request->name,
                'age' =>  $request->age,
                'gender' =>  $request->gender,
                'latitude' =>  $request->latitude,
                'longitude' =>  $request->longitude,
            ]);
            if($survivor){

                $inventory_resource= '';
                if($request->has('inventory_resource')){
                    foreach($request->inventory_resource as $inventory){
                       $inventory = Inventory::create([
                            'survivor_id' =>  $survivor->id,
                            'name' => $inventory,
                        ]);
                    }
                }

                return $this->sendResponse($survivor, 'survivor added successfully');
            }
            else{
                return $this->sendError( ['error' => 'something went wrong']);
            }
        } catch (\Exception $e) {
            return $this->sendError( ['error' => $e->getMessage() ]);
        }
    }

    public function editSurvivor(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'survivor_id' => 'required',
            'name' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'latitude' => '',
            'longitude' => '',


        ]);

        if ($validator->fails()) {
            return $this->sendError('Error validation', $validator->errors());
        }

        try {
            $inventory_resource= '';
            if($request->has('inventory_resource')){
                $inventory_resource=json_encode($request->inventory_resource);
            }

            $survivor = Survivor::find($request->survivor_id);
            if($survivor){
                $survivor->update([
                    'name' =>  $request->name,
                    'age' =>  $request->age,
                    'gender' =>  $request->gender,
                    'latitude' =>  $request->latitude,
                    'longitude' =>  $request->longitude,
                    'inventory_resource' => $inventory_resource,
                ]);

                $inventory_resource= '';
                if($request->has('inventory_resource')){
                    foreach($request->inventory_resource as $inventory){
                        Inventory::where('survivor_id',$request->survivor_id)->delete();
                        $inventory = Inventory::create([
                            'survivor_id' =>  $survivor->id,
                            'name' => $inventory,
                        ]);
                    }
                }
            }
            else{
                return $this->sendError( ['error' => 'sunvivor not found']);
            }

            if($survivor){
                return $this->sendResponse($survivor, 'survivor updated successfully');
            }
            else{
                return $this->sendError( ['error' => 'something went wrong']);
            }
        } catch (\Exception $e) {
            return $this->sendError( ['error' => $e->getMessage() ]);
        }
    }


    public function updateLocation(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'survivor_id' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',


        ]);

        if ($validator->fails()) {
            return $this->sendError('Error validation', $validator->errors());
        }

        try {
            $survivor = Survivor::find($request->survivor_id);
            if($survivor){
                $survivor->update([
                    'latitude' =>  $request->latitude,
                    'longitude' =>  $request->longitude,
                ]);
                return $this->sendResponse($survivor, 'survivor updated successfully');
            }
            else{
                return $this->sendError( ['error' => 'sunvivor not found']);
            }

        } catch (\Exception $e) {
            return $this->sendError( ['error' => $e->getMessage() ]);
        }
    }


    public function updateInfectionDetails(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'survivor_id' => 'required',
            'infected_survivor_id' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Error validation', $validator->errors());
        }

        try {
            $survivor = Survivor::find($request->survivor_id);
            if($survivor){

                $infected = Survivor::find($request->infected_survivor_id);
                if($infected){
                    $reportedInfection = ZombieReport::where('infected_survivor_id',$request->infected_survivor_id)->where('survivor_id',$request->survivor_id)->first();
                    if(!$reportedInfection){
                        $reportedInfection = ZombieReport::create([
                            'infected_survivor_id' =>  $request->infected_survivor_id,
                            'survivor_id' =>  $request->survivor_id,
                        ]);
                        $infectedCount = ZombieReport::where('infected_survivor_id',$request->infected_survivor_id)->count();
                        if($infectedCount>=3 && $infected->infected_status == 0){
                            $infected->update([
                                'infected_status' =>  1,
                            ]);
                        }
                        return $this->sendResponse($survivor, 'survivor updated successfully');
                    }
                    else{
                        return $this->sendError( ['error' => 'Already reported infection']);
                    }

                }
                else{
                    return $this->sendError( ['error' => 'Survivor not found']);
                }
            }
            else{
                return $this->sendError( ['error' => 'You are not a valid survivor']);
            }

        } catch (\Exception $e) {
            return $this->sendError( ['error' => $e->getMessage() ]);
        }
    }

}
