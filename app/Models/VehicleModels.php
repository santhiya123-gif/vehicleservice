<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleModels extends Model {
  protected $guarded = ['id'];

  public function vmodels()
  {
    return $this->belongsTo(VehicleMakes::class);
  }
}
