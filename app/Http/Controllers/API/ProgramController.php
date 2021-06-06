<?php

namespace App\Http\Controllers\API;

use App\Models\Program;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProgramRequest;
use App\Http\Resources\Program\ProgramResource;

class ProgramController extends Controller
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
        return ProgramResource::collection(Program::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProgramRequest $request)
    {
        $program = new Program();
        
        $program->program_title = $request->program_title;
        $program->program_age_rating = $request->program_age_rating;
        $program->program_description = $request->program_description;
        $program->program_type = $request->program_type;
        
        $program->save();
        
        return response([
            'data' => new ProgramResource($program)
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
    public function show(Program $program)
    {
        return new ProgramResource($program);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Program $program)
    {
        $program->update($request->all());
        
        return response([
            'data' => new ProgramResource($program)
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
    public function destroy(Program $program)
    {
        $program->delete();
        
        return response(null,
        204      
        );
    }
}
