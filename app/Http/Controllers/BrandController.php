<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBrandRequest;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\UpdateBrandRequest;

class BrandController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view( 'admin.brands.index' );
    }

    /**
     * @param Request $request
     */
    public function allBrands( Request $request ) {

        $columns = [
            0 => 'id',
            1 => 'name',
            2 => 'description',
            3 => 'created_at',
            4 => 'id',
        ];

        $totalData = Brand::count();

        $totalFiltered = $totalData;

        $limit = $request->input( 'length' );
        $start = $request->input( 'start' );
        $order = $columns[$request->input( 'order.0.column' )];
        $dir   = $request->input( 'order.0.dir' );

        if ( empty( $request->input( 'search.value' ) ) ) {
            $brands = Brand::offset( $start )
                ->limit( $limit )
                ->orderBy( $order, $dir )
                ->get();
        } else {
            $search = $request->input( 'search.value' );

            $brands = Brand::where( 'id', 'LIKE', "%{$search}%" )
                ->orWhere( 'name', 'LIKE', "%{$search}%" )
                ->offset( $start )
                ->limit( $limit )
                ->orderBy( $order, $dir )
                ->get();

            $totalFiltered = Brand::where( 'id', 'LIKE', "%{$search}%" )
                ->orWhere( 'name', 'LIKE', "%{$search}%" )
                ->count();
        }

        $data = [];
        if ( !empty( $brands ) ) {
            foreach ( $brands as $brand ) {
                $show   = route( 'brands.show', $brand->id );
                $edit   = route( 'brands.edit', $brand->id );
                $delete = route( 'brands.destroy', $brand->id );
                $token  = csrf_token();

                $nestedData['id']          = $brand->id;
                $nestedData['name']        = $brand->name;
                $nestedData['description'] = $brand->description;
                // $nestedData['body']       = substr( strip_tags( $brand->body ), 0, 50 ) . "...";
                $nestedData['created_at'] = date( 'j M Y h:i a', strtotime( $brand->created_at ) );
                $nestedData['options']    = "
                                          &emsp;<a href='{$show}' title='SHOW' ><span class='far fa-eye'></span></a>
                                          &emsp;<a href='{$edit}' title='EDIT' ><span class='far fa-edit'></span></a>
                                          &emsp;<a href='#' onclick='deleteStore({$brand->id})' title='DELETE' ><span class='fas fa-trash'></span></a>
                                          <form id='delete-form-{$brand->id}' action='{$delete}' method='POST' style='display: none;'>
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
        return view( 'admin.brands.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBrandRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store( StoreBrandRequest $request ) {

        Brand::create( $request->all() );

        toast( 'Brand successfully created', 'success' );

        return to_route( 'brands.index' );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand           $brand
     * @return \Illuminate\Http\Response
     */
    public function show( Brand $brand ) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand           $brand
     * @return \Illuminate\Http\Response
     */
    public function edit( Brand $brand ) {
        return view( 'admin.brands.edit', compact( 'brand' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBrandRequest $request
     * @param  \App\Models\Brand                     $brand
     * @return \Illuminate\Http\Response
     */
    public function update( UpdateBrandRequest $request, Brand $brand ) {

        $brand->update( $request->all() );

        Alert::toast( 'Brand successfully updated', 'success' );

        return redirect()->route( 'brands.index' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand           $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy( Brand $brand ) {
        //
    }
}