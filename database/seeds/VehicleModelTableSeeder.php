<?php

use Illuminate\Database\Seeder;
use App\Models\VehicleMakes;
use App\Models\VehicleModels;

class VehicleModelTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run(){
    $vehicleMakes = VehicleMakes::all();
    $models = [
      [
        'make'  => 'Dodge',
        'model' => 'Ram 1500'
      ],
      [
        'make'  => 'Dodge',
        'model' => 'Ram Rebel'
      ],
      [
        'make'  => 'Toyota',
        'model' => 'Ranger'
      ],
      [
        'make'  => 'Toyota',
        'model' => 'Tacoma'
      ],
    ];
    foreach($models AS $model){
      $v_id = $vehicleMakes->where('title',$model['make'])->first()->id;
      VehicleModels::firstOrCreate([
        'vehicle_make_id' => $v_id,
        'title'           => $model['model']
      ]);
    }
  }
}
