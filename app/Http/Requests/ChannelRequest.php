<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChannelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "channel_no" => "required",
            "channel_name" => "required | unique:channels",
            "epg_date" => "required",
            "program_id" => "required",
            "epg_start_time" => "required",
            "epg_end_time" => "required"
        ];
    }
}
