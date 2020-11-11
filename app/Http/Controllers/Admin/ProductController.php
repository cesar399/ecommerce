<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\SaveProduct;
use App\Product;
use App\Image;

class ProductController extends Controller
{
   public function index()
    {
        $products = Product::orderBy('id', 'ASC')->where('user_id', auth()->user()->id)->with('image')->paginate();
            return view('admin/products.index', [
            'products' => $products,
        ]);
    }
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin/products.create',[
            'product' => new Product
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::create($request->all());

      //  return redirect()->route('products.index')->with('status', 'Producto agregado');
        $max_size= (int)ini_get('upload_max_filesize') * 10240;
        $images = $request->file('images');
       // $user_id =Auth::id();

        if ($request->hasFile('images')) {
            foreach ($images as $image) {
                $fileName = encrypt($image->getClientOriginalName()) . '.' . $image->getClientOriginalExtension();
                if (Storage::putFileAs('/public/' . 'Gallery' . '/', $image, $fileName)) {
                    $product->image()->create(['url' => $fileName]);
                   $product->save();
               }
            }
        Alert::success('Success Title', 'Success Message');
        return redirect()->route('products.index');
        }else{
             Alert::Error('¡Error!', 'Debes subir uno o mas archivos');
        return back();
        }
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Product::find($id)->where('user_id', auth()->user()->id);
        return view('admin/products.show', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

        return view('admin/products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        //$product->fill($request->all());
       // dd($product);
        $product->fill($request->all());
        $max_size= (int)ini_get('upload_max_filesize') * 10240;
        $images = $request->file('images');
       // $user_id =Auth::id();

        if ($request->hasFile('images')) {
            foreach ($images as $image) {
                $fileName = encrypt($image->getClientOriginalName()) . '.' . $image->getClientOriginalExtension();
                if (Storage::putFileAs('/public/' . 'Gallery' . '/', $image, $fileName)) {
                    $product->image()->create(['url' => $fileName]);
                   $updated = $product->save();
               }
            }
        $message =$updated ? 'Categoria actualizada correctamente!' : 'La categoria no se pudo actualizar';
        return redirect()->route('admin/products.index')->with('message', $message);
        }else{
            $updated = $product->save();

            $message =$updated ? 'Categoria actualizada correctamente!' : 'La categoria no se pudo actualizar';
            return redirect()->route('admin/products.index')->with('message', $message);
        }
        //return redirect()->route('products.index', $product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id)->delete();
       return redirect()->route('products.index')->with('status', 'El producto fue eliminado');
    }
}
