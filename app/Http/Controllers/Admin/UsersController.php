<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
       
    }

    public function index(Request $request){
        if($request->search){
        //serch data
        $all_users = $this->user->orderBy('name')->where('name', 'LIKE', '%'.$request->search.'%')->paginate(10);
        
        }else{
        // get all users, ordered by (sort by) name
        $all_users = $this->user->orderBy('name')->withTrashed()->paginate(10);
        //paginate(n) - show n items of a list(per page)
        //twithTrashed() - show records including soft-delted ones
        }


        return view('admin.users.index')
                ->with('all_users', $all_users)
                ->with('search', $request->search);
    }

    public function deactive($id){
        $this->user->destroy($id);

        return redirect()->back();
    }

    public function activate($id){
        $this->user->onlyTrashed()->findOrFail($id)->restore();
        
        return redirect()->back();
    }
    

}
