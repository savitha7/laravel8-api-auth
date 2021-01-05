<?php

namespace App\Http\Controllers\API\Courses;

use App\Http\Controllers\API\ApiBaseController as ApiBaseController;
use Illuminate\Http\Request;
use App\Models\Courses\Course;
use Validator;
use App\Http\Resources\Courses\Course as CourseResource;

class CourseController extends ApiBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $course = Course::all();
    
        return $this->sendResponse(CourseResource::collection($course), 'Courses retrieved successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'title' => 'required',
            'description' => 'required',
            'content' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $course = Course::create($input);
   
        return $this->sendResponse(new CourseResource($course), 'Course created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::find($id);
  
        if (is_null($course)) {
            return $this->sendError('Course not found.');
        }
   
        return $this->sendResponse(new CourseResource($course), 'Course retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $course = Course::find($id);
 
        if (!$course) {
            return $this->sendError('Course not found.');
        }
 
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'title' => 'required',
            'description' => 'required',
            'content' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $course->title = $input['title'];
        $course->description = $input['description'];
        $course->content = $input['content'];
        $course->save();
   
        return $this->sendResponse(new CourseResource($course), 'Course updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);
 
        if (!$course) {
            return $this->sendError('Course not found.');
        }
 
        if ($course->delete()) {
            return $this->sendResponse([], 'Course deleted successfully.');
        } else {
            return $this->sendError('Course can not be deleted.',[],500);            
        }   
    }
}
