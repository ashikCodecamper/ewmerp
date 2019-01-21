<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class LeaveResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
          'id'       => $this->id,
          'name'     => $this->user->name,
          'leaveType'=> $this->leavetype->leave_name,
          'desc'     => $this->leave_desc,
          'from'     => $this->from_date,
          'to'       => $this->to_date,
          'status'   => $this->status,
        ];
    }
}
