<?php

namespace Modules\Admin\App\Http\Controllers;

use App\Http\Requests\StoreAccountRequest;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::whereNotIn('id', ['1', '2'])->get();
        return view('admin::contents.authentication.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::whereNotIn('id', ['1', '2'])->get();
        return view('admin::contents.authentication.create', compact('roles'));
    }

    public function uploadFile($file)
    {
        $filename = time() . '_' . $file->getClientOriginalName();
        return $file->storeAs('users_image', $filename, 'public');
    }

    public function store(StoreAccountRequest $request): RedirectResponse
    {
        $data = $request->all();
        $data = $request->except('img');
        $data = $request->except('password');
        if ($request->hasFile('img') && $request->file('img')->isValid()) {
            $data['user_image'] = $this->uploadFile($request->file('img'));
        } else {
            $data['user_image'] = null;
        }
        $data['status'] = 'active';
        $data['verify'] = '1';
        $data['password'] = Hash::make($request->password);
        // dd($data);

        $res = User::create($data);
        if ($res) {
            // Redirect về trang danh sách với thông báo thành công
            return redirect()->route('admin.accounts.index')->with('success', ' account đã được thêm mới!');
        } else {
            // Redirect về trang danh sách với thông báo không thành công
            return redirect()->route('admin.accounts.index')->with('error', ' account không được thêm mới!');
        }
    }

    public function show($id)
    {
        $user = User::find($id);
        // dd($user);
        if ($user) {
            return view('admin::contents.authentication.show', compact('user'));
        } else {
            return redirect()->route('admin.accounts.index')->with('info', 'Tài khoản không tồn tại.');
        }
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::whereNotIn('id', ['1', '2'])->get();
        if ($user) {
            return view('admin::contents.authentication.edit', compact('roles', 'user'));
        } else {
            return redirect()->route('admin.accounts.index')->with('info', 'Tài khoản không tồn tại.');
        }
    }

    public function update(Request $request): RedirectResponse
    {
        $data = $request->except('img');
        if ($request->hasFile('img') && $request->file('img')->isValid()) {
            $data['img'] = $this->uploadFile($request->file('img'));
        }

        dd($request->all());

        $data = $request->validated();

        $res = User::create($data);
        if ($res) {
            // Redirect về trang danh sách với thông báo thành công
            return redirect()->route('admin.accounts.index')->with('success', ' account đã được thêm mới!');
        } else {
            // Redirect về trang danh sách với thông báo không thành công
            return redirect()->route('admin.accounts.index')->with('error', ' account không được thêm mới!');
        }
    }
}
