<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    public function motor_cycle() {
    return $this->hasOne('App\MotorCycle', 'employee_id');
  }
}
