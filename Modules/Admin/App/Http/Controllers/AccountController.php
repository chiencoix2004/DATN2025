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
use Illuminate\Support\Facades\Storage;

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
        $user = User::query()
            ->select(
                'users.id as id',
                'users.user_name as user_name',
                'users.full_name as full_name',
                'users.phone as phone',
                'users.email as email',
                'users.password as password',
                'users.address as address',
                'users.user_image as user_image',
                'users.roles_id as roles_id',
                'roles.role_type as role_type',
                'users.status as status',
                'users.verify as verify'
            )
            ->join('roles', 'users.roles_id', '=', 'roles.id')
            ->where('users.id', '=', $id)
            ->first();

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

    public function update(Request $request, $id): RedirectResponse
    {
        $check = User::find($id);
        $imageOld = $check->user_image;
        $data = $request->except("img");
        if ($check) {
            if ($request->hasFile('img') && $request->file('img')->isValid()) {
                $data['user_image'] = $this->uploadFile($request->file('img'));
                $res = User::find($id)->update($data);
                if ($res) {
                    if (isset($imageOld) && Storage::disk('public')->exists($imageOld)) {
                        Storage::disk('public')->delete($imageOld);
                    }
                    return redirect()->route('admin.accounts.edit', ['id' => $id])->with('success', 'Sửa thành công');
                }
            } else {
                $data['user_image'] = $imageOld;
                $res = User::find($id)->update($data);
                if ($res) {
                    return redirect()->route('admin.accounts.edit', ['id' => $id])->with('success', 'Sửa thành công');
                }
            }
        } else {
            return redirect()->route('admin.accounts.index')->with('info', 'Không tìm thấy tài khoản');
        }
    }
}
