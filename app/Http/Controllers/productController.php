<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class productController extends Controller
{
    
     protected $products;
    public function __construct(){
        $this->products = new Product();
    }   
    public function index()
    {
        $products = $this->products->all();      
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'productname'=>'required',
            'description'=>'required',
            'price'=>'required',
            'photo'=>'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('photo')){
            $fileName = time().$request->file('photo')->getClientOriginalName();
            $request->file('photo')->move(public_path('images'),$fileName);
            $validateData['photo']=$fileName;
        }
        Product:: create($validateData);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
