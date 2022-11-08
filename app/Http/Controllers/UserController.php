<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return View( 'admin.users.index' );
    }

    /**
     * @param Request $request
     */
    public function allUsers( Request $request ) {

        $columns = [
            0 => 'id',
            1 => 'name',
            2 => 'phone',
            3 => 'email',
            4 => 'status',
            5 => 'type',
            6 => 'created_at',
            7 => 'id',
        ];

        $totalData = User::count();

        $totalFiltered = $totalData;

        $limit = $request->input( 'length' );
        $start = $request->input( 'start' );
        $order = $columns[$request->input( 'order.0.column' )];
        $dir   = $request->input( 'order.0.dir' );

        if ( empty( $request->input( 'search.value' ) ) ) {
            $users = User::offset( $start )
                ->limit( $limit )
                ->orderBy( $order, $dir )
                ->get();
        } else {
            $search = $request->input( 'search.value' );

            $users = User::where( 'id', 'LIKE', "%{$search}%" )
                ->orWhere( 'name', 'LIKE', "%{$search}%" )
                ->offset( $start )
                ->limit( $limit )
                ->orderBy( $order, $dir )
                ->get();

            $totalFiltered = User::where( 'id', 'LIKE', "%{$search}%" )
                ->orWhere( 'name', 'LIKE', "%{$search}%" )
                ->count();
        }

        $data = [];
        if ( !empty( $users ) ) {
            foreach ( $users as $user ) {
                $show       = route( 'users.show', $user->id );
                $edit       = route( 'users.edit', $user->id );
                $delete     = route( 'users.destroy', $user->id );
                $profile    = "profile";
                $token      = csrf_token();
                $user_type  = $user->type === 1 ? 'Admin' : 'Manager';
                $userStatus = $user->status;
                if ( $userStatus == 1 ) {
                    $userStatus = 'Open';
                }if ( $userStatus == 2 ) {
                    $userStatus = 'Pending';
                }if ( $userStatus == 3 ) {
                    $userStatus = 'Close';
                }

                $nestedData['id']         = $user->id;
                $nestedData['name']       = $user->name;
                $nestedData['phone']      = $user->phone;
                $nestedData['email']      = $user->email;
                $nestedData['status']     = $userStatus;
                $nestedData['type']       = $user_type;
                $nestedData['created_at'] = date( 'j M Y h:i a', strtotime( $user->created_at ) );
                $nestedData['options']    = "
                                          &emsp;<a href='{$show}' title='SHOW' ><span class='far fa-eye'></span></a>
                                          &emsp;<a href='{$edit}' title='EDIT' ><span class='far fa-edit'></span></a>
                                          &emsp;<a href='#' onclick='deleteStore({$user->id})' title='DELETE' ><span class='fas fa-trash'></span></a>
                                          <form id='delete-form-{$user->id}' action='{$delete}' method='POST' style='display: none;'>
                                          <input type='hidden' name='_token' value='{$token}'>
                                          <input type='hidden' name='_method' value='DELETE'>
                                          </form>
                                          &emsp;<a href='{$profile}' title='PROFILE' ><span class='fas fa-user-tie'></span></a>
                                          ";
                $data[] = $nestedData;

            }
        }

        $json_data = [
            "draw"            => intval( $request->input( 'draw' ) ),
            "recordsTotal"    => intval( $totalData ),
            "recordsFiltered" => intval( $totalFiltered ),
            "data"            => $data,
        ];

        echo json_encode( $json_data );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view( 'admin.users.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\UserStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store( UserStoreRequest $request ) {

        $request['password']          = Hash::make( $request->password );
        $request['email_verified_at'] = now()->format( 'Y-m-d H:i:s' );

        User::create( $request->all() );

        Alert::toast( 'User successfully created', 'success' );

        return to_route( 'users.index' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int                         $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id ) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Models\User     $user
     * @return \Illuminate\Http\Response
     */
    public function edit( User $user ) {
        return view( 'admin.users.edit', compact( 'user' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UserUpdateRequest $request
     * @param  \App\Models\Models\User              $user
     * @return \Illuminate\Http\Response
     */
    public function update( UserUpdateRequest $request, User $user ) {

        $request['password'] = Hash::make( $request->password );
        $user->update( $request->all() );

        toast( 'User successfully updated', 'success' );

        return redirect()->route( 'users.index' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int                         $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id ) {
        //
    }
}
