<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view( 'admin.categories.index' );
    }

    /**
     * @param Request $request
     */
    public function allCategories( Request $request ) {

        $columns = [
            0 => 'id',
            1 => 'name',
            2 => 'description',
            3 => 'created_at',
            4 => 'id',
        ];

        $totalData = Category::count();

        $totalFiltered = $totalData;

        $limit = $request->input( 'length' );
        $start = $request->input( 'start' );
        $order = $columns[$request->input( 'order.0.column' )];
        $dir   = $request->input( 'order.0.dir' );

        if ( empty( $request->input( 'search.value' ) ) ) {
            $categories = Category::offset( $start )
                ->limit( $limit )
                ->orderBy( $order, $dir )
                ->get();
        } else {
            $search = $request->input( 'search.value' );

            $categories = Category::where( 'id', 'LIKE', "%{$search}%" )
                ->orWhere( 'name', 'LIKE', "%{$search}%" )
                ->offset( $start )
                ->limit( $limit )
                ->orderBy( $order, $dir )
                ->get();

            $totalFiltered = Category::where( 'id', 'LIKE', "%{$search}%" )
                ->orWhere( 'name', 'LIKE', "%{$search}%" )
                ->count();
        }

        $data = [];
        if ( !empty( $categories ) ) {
            foreach ( $categories as $category ) {
                $show   = route( 'categories.show', $category->id );
                $edit   = route( 'categories.edit', $category->id );
                $delete = route( 'categories.destroy', $category->id );
                $token  = csrf_token();

                $nestedData['id']          = $category->id;
                $nestedData['name']        = $category->name;
                $nestedData['description'] = $category->description;
                // $nestedData['body']       = substr( strip_tags( $category->body ), 0, 50 ) . "...";
                $nestedData['created_at'] = date( 'j M Y h:i a', strtotime( $category->created_at ) );
                $nestedData['options']    = "
                                          &emsp;<a href='{$show}' title='SHOW' ><span class='far fa-eye'></span></a>
                                          &emsp;<a href='{$edit}' title='EDIT' ><span class='far fa-edit'></span></a>
                                          &emsp;<a href='#' onclick='deleteStore({$category->id})' title='DELETE' ><span class='fas fa-trash'></span></a>
                                          <form id='delete-form-{$category->id}' action='{$delete}' method='POST' style='display: none;'>
                                          <input type='hidden' name='_token' value='{$token}'>
                                          <input type='hidden' name='_method' value='DELETE'>
                                          </form>
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
        return view( 'admin.categories.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store( StoreCategoryRequest $request ) {
        Category::create( $request->all() );

        toast( 'Category successfully created', 'success' );

        return to_route( 'categories.index' );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category        $category
     * @return \Illuminate\Http\Response
     */
    public function show( Category $category ) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category        $category
     * @return \Illuminate\Http\Response
     */
    public function edit( Category $category ) {
        return view( 'admin.categories.edit', compact( 'category' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest $request
     * @param  \App\Models\Category                     $category
     * @return \Illuminate\Http\Response
     */
    public function update( UpdateCategoryRequest $request, Category $category ) {
        $category->update( $request->all() );

        Alert::toast( 'Category successfully updated', 'success' );

        return to_route( 'categories.index' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category        $category
     * @return \Illuminate\Http\Response
     */
    public function destroy( Category $category ) {
        //
    }
}