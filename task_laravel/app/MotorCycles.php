<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MotorCycles extends Model
{
    public function employee() {
    return $this->belongsTo('App\Employee', 'employee_id');
  }
}
