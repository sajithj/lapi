<?php

namespace App\Http\Resources\Channel;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ChannelCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'channel_no' => $this->channel_no,
            'channel_name' => $this->channel_name,
            'epg_date' => $this->epg_date,
            'program_id ' => $this->program_id,
            'program_type' => $this->program_type
        ];
    }
}
