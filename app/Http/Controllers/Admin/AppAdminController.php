<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\Models\Admin;
use App\Models\Position;



use DataTables;
use CHelper;

class AppAdminController extends Controller
{


    public function __construct(Request $request)
    {
    }


    public function index(Request $request)
    {

        $user = $request->user();
        if(! $user->isAllowed(["SUPER_ADMIN"])){
            return "Access Restricted";
        }
        return view('admin.admins');

    }



    public function data(Request $request)
    {

        $user = $request->user();
        if(! $user->isAllowed(["SUPER_ADMIN"])){
            return "Access Restricted";
        }

        $model = Admin::select('admin_id', 'fname', 'lname', 'email', 'phone', 'role');

        return DataTables::of($model)
            ->make(false);
    }



    public function addAdmin(Request $request)
    {

        $user = $request->user();
        if(! $user->isAllowed(["SUPER_ADMIN"])){
            return "Access Restricted";
        }


        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:admins,email',
            'phone' => 'nullable|string|max:12',
            'fname' => 'required|string|min:3|max:50',
            'lname' => 'required|string|min:3|max:50',
            'password' => 'required|string|min:6|max:20',
            'role' => 'required|string|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validator->errors()
            ], 400);
        }

        $admin = new Admin();
        $admin->role = $request->role;
        $admin->phone = $request->phone;
        $admin->fname = $request->fname;
        $admin->lname = $request->lname;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->save();

        return response()->json([
            'status' => true,
            'message' => 'successful',
            'data' => $admin,
        ], 200);
    }



    public function updateAdmin(Request $request)
    {

        $user = $request->user();
        if(! $user->isAllowed(["SUPER_ADMIN"])){
            return "Access Restricted";
        }

        $validator = Validator::make($request->all(), [
            'admin_id' => 'required|exists:admins,admin_id',
            'email' => 'required|email|unique:users,email|unique:admins,email,' . $request->admin_id.',admin_id',
            'phone' => 'nullable|string|max:12',
            'fname' => 'required|string|min:3|max:50',
            'lname' => 'required|string|min:3|max:50',
            'password' => 'nullable|string|min:6|max:20',
            'role' => 'required|string|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validator->errors()
            ], 400);
        }


        $admin = Admin::where("admin_id", $request->admin_id)->first();

        if ($request->admin_id == 1) {
            $admin->role = 1;
        } else {
            $admin->role = $request->role;
        }
        $admin->phone = $request->phone;
        $admin->fname = $request->fname;
        $admin->lname = $request->lname;
        $admin->email = $request->email;

        if (trim($request->password) != "") {
            $admin->password = Hash::make($request->password);
        }

        $admin->save();

        return response()->json([
            'status' => true,
            'message' => 'successful',
            'data' => $admin,
        ], 200);
    }


    public function deleteAdmin(Request $request, $admin_id)
    {

        $user = $request->user();
        if(! $user->isAllowed(["SUPER_ADMIN"])){
            return "Access Restricted";
        }

        $validator = Validator::make(["admin_id" => $admin_id], [
            'admin_id' => 'required|exists:admins,admin_id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validator->errors()
            ], 400);
        }


        if ($admin_id == 1) {
            return response()->json([
                'status' => false,
                'message' => "Vous ne pouvez pas supprimer cet utilisateur. Utilisateur de base",
            ], 400);

        }

        $admin = Admin::where("admin_id", $admin_id)->first();

        $admin->delete();

        return response()->json([
            'status' => true,
            'message' => 'successful',
        ], 200);
    }


    


}
