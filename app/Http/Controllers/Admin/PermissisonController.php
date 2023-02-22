<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use DB;

class PermissisonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','store']]);
        $this->middleware('permission:user-create', ['only' => ['create','store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $permissions = Permission::all();
        if ($request->ajax()) {
            return response()->json([
                'permissions'=>$permissions,
            ]);
        }
        // dd("");
        return view('admin.permissions.index', compact('permissions'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return redirect()->route('permissions.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {            
        
        $this->validate($request, [
            'name' => 'required|unique:permissions',
        ]);
        Permission::Create(
            [
                'name' => $request->name,
            ]
        );

        $notification = array(            
            'message' => 'Permission added successfully',
            'alert-type' => 'success'            
        );
        
        return redirect()->route('permissions.index')
                        ->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
         return redirect()->route('permissions.index');
    }

    public function edit($id)
    {
        return redirect()->route('permissions.index');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => [
                'required',
                Rule::unique('permissions','name')->ignore($id)
            ]
        ]);
        $permission = Permission::find($id); 
        $permission->name = $request->name;        
        $permission->save();
    
        return redirect()->route('permissions.index')
                        ->with('success','Permission updated successfully');
    }

    public function destroy($id)
    {
        DB::table("permissions")->where('id',$id)->delete();        
        return response()->json([
            'message' => 'Record deleted successfully!'
          ]);
        /* $notification = array(            
            'message' => 'Permissions deleted successfully',
            'alert-type' => 'success'            
        );
        return redirect()->route('permissions.index')
                        ->with($notification); */

    }
}
