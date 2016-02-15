<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    public function index()
    {
        $allUser = User::all();

        return view('user.index', [
            'userList' => $allUser
        ]);
    }

    public function add()
    {
        return view('user.add');
    }

    public function postAdd(Request $request)
    {
        $nama = $request->input('nama');
        $this->userService->save($nama);

        return redirect()->action('UserController@index');
    }
}