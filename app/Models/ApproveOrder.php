<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class ApproveOrder extends Model
{
    use HasFactory;

    public function agent()
    {
        return $this->belongsTo(AgentInfo::class, "Agent_Info_Id");
    }
   
}
