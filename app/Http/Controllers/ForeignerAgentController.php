<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ForeignerAgent;
use DB;


class ForeignerAgentController extends Controller
{
    public function index()
    {
        $foreigner_agents = DB::table('foreigner_agents')->paginate(15);
        return view('foreigner-agent.index' , compact('foreigner_agents'));
    }
    public function create()
    {
        return view('foreigner-agent.form');
    }
    public function store(Request $request)
    {   
            $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|min:10|',
            'commission' => 'required',
        ]);
            $foreigner_agent=new ForeignerAgent();
            $foreigner_agent->name=$request->input('name');
            $foreigner_agent->email=$request->input('email');
            $foreigner_agent->mobile=$request->input('phone');
            $foreigner_agent->commission=$request->input('commission');
            $foreigner_agent->save();
            return redirect('foreigner-agent') ->with('user','Foreigner Agent Added successfully');

    }
    public function show()
    {
        //
    } 
    public function edit($id)
    {
            $foreigner_agents = ForeignerAgent::find($id);
            return view('foreigner-agent.form',compact('foreigner_agents'));
    }
    public function update(Request $request ,$id)
    {
            
               $validatedData = $request->validate([
                'name' => 'required|max:255',
                'email' => 'required',
                'phone' => 'required|min:10',
                'commission' => 'required',
            ]);
                $foreigner_agent=ForeignerAgent::find($id);
                $foreigner_agent->name=$request->input('name');
                $foreigner_agent->email=$request->input('email');
                $foreigner_agent->mobile=$request->input('phone');
                $foreigner_agent->commission=$request->input('commission');
                $foreigner_agent->save();
                return redirect('foreigner-agent')->with('update', 'Content has been updated successfully!');
              
            
    }
    public function destroy($id)
    {
                $foreigner_agent = ForeignerAgent::find($id);
                $foreigner_agent->delete();
                return redirect()->route('foreigner-agent.index')
                ->with('delete','User deleted successfully');
    }
    
}
