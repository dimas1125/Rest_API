<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Libraries\BaseApi;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = (new BaseApi)->index('/user');

        return view('user.index')->with(['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = (new BaseApi)->index('/user');
        
        return view('user.create')->with(['users' => $users]);;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $payload = [
            'firstName' => $request->input('nama_depan'),
            'lastName' => $request->input('nama_belakang'),
            'email' => $request->input('email'),
        ];

        $baseApi = new BaseApi;
        $response = $baseApi->create('/user/create', $payload);

        if ($response->failed()) {
            return redirect()->back()->with('failed', "Can't create user, Something is wrong");
        }

        return redirect()->route('users.index')->with('success', 'User Has Been Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //kalian bisa coba untuk dd($response) untuk test apakah api nya sudah benar atau belum
        //sesuai documentasi api detail user akan menshow data detail seperti `email` yg tidak dimunculkan di api list index
        $response = (new BaseApi)->detail('/user', $id);
        return view('user.edit')->with([
            'user' => $response->json()
        ]);
    }

    public function update(Request $request, $id)
    {
    //column yg bisa di update sesuai dengan documentasi dummyapi.io hanyalah
    // `fisrtName`, `lastName`
        $payload = [
            'firstName' => $request->input('nama_depan'),
            'lastName' => $request->input('nama_belakang'),
        ];
        
        $response = (new BaseApi)->update('/user', $id, $payload);

        if ($response->failed()) {
            return redirect()->back()->with('failed', "Can't create user, Something is wrong");
        }

        return redirect('users')->with('success', 'User Has Been Updated');
    }

    public function destroy(Request $request, $id)
    {
        $response = (new BaseApi)->delete('/user', $id);

        if ($response->failed()) {
            $request->session()->flash(
                'message',
                'Data gagal dihapus'
            );

            return redirect('users');
        }

        $request->session()->flash(
            'message',
            'Data berhasil dihapus',
        );

        return redirect('users');
    }
}
