<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view( 'admin.products.index' );
    }

    /**
     * @param Request $request
     */
    public function allProducts( Request $request ) {

        $columns = [
            0  => 'id',
            1  => 'name',
            2  => 'slug',
            3  => 'featured_image',
            4  => 'origin_price',
            5  => 'price',
            6  => 'quantity',
            7  => 'supplier_id',
            8  => 'brand_id',
            9  => 'category_id',
            10 => 'description',
            11 => 'created_at',
            12 => 'id',
        ];

        $totalData = Product::count();

        $totalFiltered = $totalData;

        $limit = $request->input( 'length' );
        $start = $request->input( 'start' );
        $order = $columns[$request->input( 'order.0.column' )];
        $dir   = $request->input( 'order.0.dir' );

        if ( empty( $request->input( 'search.value' ) ) ) {
            $products = Product::offset( $start )
                ->limit( $limit )
                ->orderBy( $order, $dir )
                ->get();
        } else {
            $search = $request->input( 'search.value' );

            $products = Product::where( 'id', 'LIKE', "%{$search}%" )
                ->orWhere( 'name', 'LIKE', "%{$search}%" )
                ->offset( $start )
                ->limit( $limit )
                ->orderBy( $order, $dir )
                ->get();

            $totalFiltered = Product::where( 'id', 'LIKE', "%{$search}%" )
                ->orWhere( 'name', 'LIKE', "%{$search}%" )
                ->orWhere( 'brand', 'LIKE', "%{$search}%" )
                ->count();
        }

        $data = [];
        if ( !empty( $products ) ) {
            foreach ( $products as $products ) {
                $show   = route( 'products.show', $products->id );
                $edit   = route( 'products.edit', $products->id );
                $delete = route( 'products.destroy', $products->id );
                $token  = csrf_token();

                $nestedData['id']          = $products->id;
                $nestedData['name']        = $products->name;
                $nestedData['description'] = $products->description;
                // $nestedData['body']       = substr( strip_tags( $products->body ), 0, 50 ) . "...";
                $nestedData['created_at'] = date( 'j M Y h:i a', strtotime( $products->created_at ) );
                $nestedData['options']    = "
                                          &emsp;<a href='{$show}' title='SHOW' ><span class='far fa-eye'></span></a>
                                          &emsp;<a href='{$edit}' title='EDIT' ><span class='far fa-edit'></span></a>
                                          &emsp;<a href='#' onclick='deleteStore({$products->id})' title='DELETE' ><span class='fas fa-trash'></span></a>
                                          <form id='delete-form-{$products->id}' action='{$delete}' method='POST' style='display: none;'>
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
        $products = Product::get();
        $brands     = Brand::get();
        $suppliers  = Supplier::get();
        return view( 'admin.products.create', compact( 'products', 'brands', 'suppliers' ) );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store( StoreProductRequest $request ) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product         $product
     * @return \Illuminate\Http\Response
     */
    public function show( Product $product ) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product         $product
     * @return \Illuminate\Http\Response
     */
    public function edit( Product $product ) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest $request
     * @param  \App\Models\Product                     $product
     * @return \Illuminate\Http\Response
     */
    public function update( UpdateProductRequest $request, Product $product ) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product         $product
     * @return \Illuminate\Http\Response
     */
    public function destroy( Product $product ) {
        //
    }
}