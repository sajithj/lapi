<?php

namespace App\Http\Controllers\API;

use App\Models\Channel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChannelRequest;
use App\Http\Resources\Channel\ChannelResource;

class ChannelController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:api')->except('index', 'show');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ChannelResource::collection(Channel::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChannelRequest $request)
    {
        $channel = new Channel();
        
        $channel->channel_no = $request->channel_no;
        $channel->channel_name = $request->channel_name;
        $channel->epg_date = $request->epg_date;
        $channel->program_id = $request->program_id;
        $channel->epg_start_time = $request->epg_start_time;
        $channel->epg_end_time = $request->epg_end_time;
        
        $channel->save();
        
        return response([
            'data' => new ChannelResource($channel)
        ],
        201        
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Channel $channel)
    {
        return new ChannelResource($channel);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Channel $channel)
    {
        $channel->update($request->all());
        
        return response([
            'data' => new ChannelResource($channel)
        ],
        200        
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Channel $channel)
    {
        $channel->delete();
        
        return response(null,
        204      
        );
    }
}
