<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\Project;
use Illuminate\Http\Request;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Requests\StorePostRequest;



class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $posts = Project::All();
       return view ('admin.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( 'admin.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        // $request->validate([
        //     'title'=>'required|unique:projects|max:100'
        // ],
        // [
        //    'title.required'=>'Il campo è obbligatorio',
        //    'title.unique'=>'Il dato è già presente',
        //    'title-max'=>'Il titolo supera il valore massimo' 
        // ]);

        $form_data = $request->all();

        $new_project = new Project();

        $new_project->fill( $form_data );
        
                $new_project->save();
        
                return redirect()->route( 'admin.index.index' );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $project = Project::find($id);
        return view('admin.show', compact( 'project' ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mod_post =  Project::find($id);
        return view('admin.edit',compact('mod_post'));
        //return view('admin.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, $id)
    {
        // $request->validate([
        //     'title'=>'required|unique:projects|max:100'
        // ],
        // [
        //     'title.required'=>'Il campo è obbligatorio',
        //     'title.unique'=>'Il dato è già presente',
        //     'title-max'=>'Il titolo supera il valore massimo' 
        //  ]);

        $form_data = $request->all();
        $mod_post =  Project::find($id);
        $mod_post->update($form_data);

        return redirect()->route('admin.index.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mod_post =  Project::find($id);
        $mod_post->delete();

        return redirect()->route('admin.index.index');
    }
}
