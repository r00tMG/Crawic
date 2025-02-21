<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Mail\Register;
use App\Mail\Restore;
use App\Models\Country;
use App\Models\User;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use File;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use Redirect;
use Sentinel;
use URL;
use Validator;
use Yajra\DataTables\DataTables;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    protected $countries = [
        'FR' => 'France',
        'US' => 'United States',
        'GB' => 'United Kingdom',
        'DE' => 'Germany',
        'IT' => 'Italy',
        'ES' => 'Spain',
        // Ajoutez d'autres pays selon vos besoins
    ];
    /**
     * Show a list of all the users.
     *
     * @return View
     */
    private $user_activation = false;
    public function __construct()
    {
        $this->countries = Country::all()->pluck('name', 'sortname')->toArray();
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $users = User::with('roles')->get();
            
            return datatables()
                ->of($users)
                ->addColumn('actions', function ($user) {
                    $actions = '<a href="' . route('users.show', $user) . '" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a> ';
                    $actions .= '<a href="' . route('users.edit', $user) . '" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a> ';
                    
                    if (auth()->id() !== $user->id) {
                        $actions .= '<form method="POST" action="' . route('users.destroy', $user) . '" style="display:inline">
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm(\'Are you sure?\')">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>';
                    }
                    
                    return $actions;
                })
                ->rawColumns(['actions'])
                ->make(true);
        }

        return view('admin.users.index');
    }

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Get all available roles using Spatie Permission
        $roles = Role::all();
        $countries = $this->countries;

        return view('admin.users.create', compact('roles', 'countries'));
    }

    /**
     * Store a newly created user
     *
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request)
    {
        try {
            // Create the user
            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'gender' => $request->gender,
                'dob' => $request->dob,
                'country' => $request->country,
                'state' => $request->state,
                'city' => $request->city,
                'address' => $request->address,
                'postal' => $request->postal,
                'email_verified_at' => now() // Marquer comme vérifié par défaut
            ]);

            // Assign roles if provided
            if ($request->has('roles')) {
                $user->assignRole($request->roles);
            }

            // Handle profile picture upload if provided
            if ($request->hasFile('pic')) {
                $file = $request->file('pic');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/users'), $filename);
                $user->pic = $filename;
                $user->save();
            }

            return redirect()
                ->route('users.index')
                ->with('success', trans('users/message.success.create'));

        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', trans('users/message.error.create'));
        }
    }

    /**
     * Display specified user profile.
     *
     * @param  User $user
     * @return \Illuminate\View\View
     */
    public function show(User $user)
    {
        if ($user->country) {
            $user->country = $this->countries[$user->country] ?? $user->country;
        }

        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param  User $user
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {
        // Get this user roles using Spatie Permission
        $userRoles = $user->roles->pluck('name', 'id')->all();
        
        // Get all available roles
        $roles = Role::all();

        $status = $user->email_verified_at ? 'Verified' : 'Pending';
        
        // Get countries list from protected property
        $countries = $this->countries;
        
        return view('admin.users.edit', compact('user', 'roles', 'userRoles', 'countries', 'status'));
    }

    /**
     * Update the specified user.
     *
     * @param  UserRequest $request
     * @param  User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, User $user)
    {
        try {
            $user->fill($request->except('password', 'roles'));

            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }

            $user->save();

            // Update roles if provided
            if ($request->has('roles')) {
                $user->syncRoles($request->roles);
            }

            return redirect()
                ->route('users.show', $user)
                ->with('success', trans('users/message.success.update'));

        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', trans('users/message.error.update'));
        }
    }

    /**
     * Show a list of all the deleted users.
     *
     * @return View
     */
    public function getDeletedUsers()
    {
        // Grab deleted users
        $users = User::onlyTrashed()->get();
        // Show the page
        return view('admin.deleted_users', compact('users'));
    }

    /**
     * Delete Confirm
     *
     * @param  int $id
     *
     * @return View
     */
    public function getModalDelete($id)
    {
        $model = 'users';
        $confirm_route = $error = null;
        try {
            // Get user information
            $user = Sentinel::findById($id);
            // Check if we are not trying to delete ourselves
            if ($user->id === Sentinel::getUser()->id) {
                // Prepare the error message
                $error = trans('users/message.error.delete');
                return view('admin.layouts.modal_confirmation', compact('error', 'model', 'confirm_route'));
            }
        } catch (UserNotFoundException $e) {
            // Prepare the error message
            $error = trans('users/message.user_not_found', compact('id'));
            return view('admin.layouts.modal_confirmation', compact('error', 'model', 'confirm_route'));
        }
        $confirm_route = route('admin.users.delete', ['id' => $user->id]);
        return view('admin.layouts.modal_confirmation', compact('error', 'model', 'confirm_route'));
    }

    /**
     * Remove the specified user from storage.
     *
     * @param  User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
            return redirect()
                ->route('users.index')
                ->with('success', trans('users/message.success.delete'));

        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', trans('users/message.error.delete'));
        }
    }

    /**
     * Reset user password.
     *
     * @param  Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function passwordReset(Request $request)
    {
        try {
            $user = User::findOrFail($request->id);
            $user->password = Hash::make($request->password);
            $user->save();

            return response()->json(['success' => true]);

        } catch (\Exception $e) {
            return response()->json(['success' => false], 500);
        }
    }

    public function import()
    {
        return view('admin.users.import_users');
    }
    public function downloadExcel($type)
    {
        return response()->download(base_path('resources/excel-templates/users.xlsx'));
    }

    public function importInsert(Request $request)
    {
        if ($request->hasFile('import_file')) {
            $activate = $this->user_activation;
            $path = $request->file('import_file')->getRealPath();
            $users = Excel::selectSheets('users')->load(
    $path,
    function ($reader) {
    }
)->get();
            if (! empty($users) && $users->count()) {
                foreach ($users->toArray() as $key => $row) {
                    $my_data = [
                        'email' => $row['email'],
                        'first_name' => $row['first_name'],
                        'last_name' => $row['last_name'],
                        'password' => $row['password'],
                    ];
                    $validator = Validator::make(
    $my_data,
    [
                            'email' => 'email',
                            'first_name' => 'required|min:3',
                            'last_name' => 'required|min:3',
                            'password' => 'required|min:3',
                        ]
);
                    if (isset($row['first_name']) && trim($row['first_name']) !== '' && ! $validator->fails()) {
                        $selected_user = User::where(
                            [
                                ['email', $row['email']],
                            ]
                        )->first();
                        if ($selected_user) {
                            $user = $selected_user->update(
                                [
                                    'email' => $row['email'],
                                    'first_name' => $row['first_name'],
                                    'last_name' => $row['last_name'],
                                    'password' => Hash::make($row['password']),
                                    'created_at' => date('Y-m-d H:i:s'),
                                    'updated_at' => date('Y-m-d H:i:s'),
                                ]
                            );
                            activity($selected_user->full_name)
                                ->performedOn($selected_user)
                                ->causedBy($selected_user)
                                ->log('User Updated by '.Sentinel::getUser()->full_name);
                        } else {
                            $user = Sentinel::register(
                                [
                                    'email' => $row['email'],
                                    'first_name' => $row['first_name'],
                                    'last_name' => $row['last_name'],
                                    'password' => Hash::make($row['password']),
                                    'created_at' => date('Y-m-d H:i:s'),
                                    'updated_at' => date('Y-m-d H:i:s'),
                                ],
                                $activate
                            );
                            activity($user->full_name)
                                ->performedOn($user)
                                ->causedBy($user)
                                ->log('User Registered by '.Sentinel::getUser()->full_name);
                            // login user automatically
                            $role = Sentinel::findRoleById(2);
                            //add user to 'User' role

                            $role->users()->attach($user);
                            if (! $activate) {
                                // Data to be used on the email view

                                $data = [
                                    'user_name' => $user->first_name .' '. $user->last_name,
                                    'activationUrl' => URL::route('activate', [$user->id, Activation::create($user)->code]),
                                ];
                                // Send the activation code through email
                                Mail::to($user->email)->send(new Register($data));
                            }
                        }
                    }
                }

                return back()->with('success', 'Inserted Record Successfully');
            }
        }
        return back()->with('error', 'Please Check your file, Something is wrong there.');
    }
}
