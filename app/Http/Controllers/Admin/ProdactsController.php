<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\DataTables\ProdactsDatatable;
use App\DataTables\RestorDatatable;

use Illuminate\Http\Request;

use App\Model\Product;
use App\Model\RelatedProduct;
use App\Model\OtherData;
use App\Model\MallProduct;
use App\File as FileTbl;
use App\Model\Size;
use App\Model\Weight;
use Illuminate\Support\Facades\Storage;

class ProdactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProdactsDatatable $prodact)
    {
        return $prodact->render('admin.prodacts.index', ['title'=> atrans('prodacts')]);
    }


    public function prepare_weight_size()
    {
        if(request()->ajax() && request()->has('dep_id'))
        {
            $dep_list = array_diff( explode(',', get_parent(request('dep_id'))), [request('dep_id')]);

            $sizes = Size::where('is_public','yes')
                            ->whereIn('department_id',$dep_list)
                            ->orWhere('department_id',request('dep_id'))
                            ->pluck('name_'.session('lang'),'id');

            // $size_2 = Size::where('department_id',request('dep_id'))->pluck('name_'.session('lang'),'id');
            // $sizes = array_merge(json_decode($size_1, true), json_decode($size_2, true));



            $weight= Weight::pluck('name_'.session('lang'),'id');

            return view('admin.prodacts.ajax.size_weight',[
                'sizes'     =>$sizes,
                'weight'    =>$weight,
                'product'   =>Product::find(request('product_id'))
                ])->render();

        }else{
            return atrans('size_weight_mess');
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Admin Create
        $product = Product::create(['title' =>'',]);

            if (!empty($product)) {
                return redirect(aurl('prodacts/' . $product->id .'/edit'));
            }
    }


///////////////////////////////////////////////////////////////////////////////////////////

    public function copy_product($id)
    {
        if(request()->ajax()){


            $relration_data = Product::find($id);
            $copy           = Product::find($id)->toArray();
            unset($copy['id']);
            $create         = Product::create($copy);
            if(!empty($copy['photo']))
            {
                $ext        = \File::extension($copy['photo']);
                $new_path   = 'products/'.$create->id.'/'.str_random(40).'.'.$ext;
                Storage::copy($copy['photo'],$new_path);
                $create->photo = $new_path;
                $create->save();
            }

            // Mall Product //

                foreach($relration_data->mallproduct()->get() as $mall)
                {
                    MallProduct::create([
                        'product_id'    => $create->id,
                        'molls_id'      => $mall->molls_id,
                        ]);
                }
            // Mall Product //

             // Other Data k=>v Product//

                foreach ($relration_data->other_data()->get() as $otherdata)
                {
                    OtherData::create([
                        'product_id'    => $create->id,
                        'data_key'      => $otherdata->data_key ,
                        'data_value'    => $otherdata->data_value ,
                        ]);

                }
            // Other Data k=>v Product//

            // File Product//
            foreach($relration_data->files()->get() as $file)
            {
                $hashname   = str_random(40);
                $ext        = \File::extension($file->full_file);
                $new_path   = 'products/'.$create->id.'/'.$hashname.'.'.$ext;
                Storage::copy($file->full_file,$new_path);
                $add = FileTbl::create([
                    'name'          => $file->name ,
                    'size'          => $file->size,
                    'file'          => $hashname,
                    'path'          => 'products/'.$create->id,
                    'full_file'     => 'products/'.$create->id.'/'.$hashname.'.'.$ext,
                    'mime_type'     => $file->mime_type,
                    'file_type'     => 'product',
                    'relation_id'   => $create->id,
                ]);
            }
            // File Product//


            return response([
                'status'=>true ,
                'message'=>atrans('product_crrated'),
                'id'=>$create->id
            ], 200);
        }else{
            return redirect(aurl('/'));
        }
    }

    public function update_product_image($id)
    {
        $product = Product::where('id',$id)->update([
            'photo'=>up()->upload([
                    'file'          =>'file',
                    'path'          =>'products/'.$id,
                    'upload_type'   =>'single',
                    'delete_file'   =>'',
            ])
        ]);

        //, 'photo' => $product->photo
        return response(['status' => true], 200);
    }


    public function delete_min_image($id)
    {
        $product = Product::find($id);

        Storage::delete($product->photo);

        $product->photo = null;

        $product->save();
        return response(['status' => true], 200);
    }

///////////////////////////////////////////////////////////////////////////////////////////

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {

        // $data = $this->validate(request(),
        //     [
        //         'prodacts_name_ar'      =>  'required',
        //         'prodacts_name_en'      =>  'required',
        //         'mob'                   =>  'required',
        //         'code'                  =>  'required',
        //         'logo'                  =>  'required|'.v_image(),
        //     ],[],
        //     [
        //         'prodacts_name_ar'      =>  atrans('prodacts_name_ar'),
        //         'prodacts_name_en'      =>  atrans('prodacts_name_en'),
        //         'mob'                   =>  atrans('mob'),
        //         'code'                  =>  atrans('code'),
        //         'logo'                  =>  atrans('logo'),
        //     ]);

        // if (request()->hasFile('logo'))
        // {
        //     $data['logo'] =  up()->upload([
        //         //'new_name'      =>'',
        //         'file'          =>'logo',
        //         'path'          =>'prodacts',
        //         'upload_type'   =>'single',
        //         'delete_file'   =>'',
        //     ]);
        // }
        // Product::create($data);

        // session()->flash('success',atrans('record_added'));

        // return redirect(aurl('prodacts'));
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $product = Product::find($id);
        //$title = atrans('edit');
        //return view('admin.prodacts.edit',compact('prodact','title'));
        return view('admin.prodacts.protuct',['title'=>atrans('creat_or_edit_products',['title'=>$product->title]),'product'=>$product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( $id)
    {

        $data = $this->validate(request(),
            [
                'title'         =>'required',
                'content'       =>'required',
                'department_id' =>'required|numeric',
                'trade_id'      =>'sometimes|nullable|numeric',
                'manu_id'       =>'sometimes|nullable|numeric',
                'color_id'      =>'sometimes|nullable|numeric',
                'size'          =>'sometimes|nullable',
                'size_id'       =>'sometimes|nullable|numeric',
                'currency_id'   =>'sometimes|nullable|numeric',
                'price'         =>'required|numeric',
                'stock'         =>'required|numeric',
                'start_at'      =>'required|date',
                'end_at'        =>'required|date',
                'start_offer_at'=>'sometimes|nullable|date',
                'price_offer'   =>'sometimes|nullable|numeric',
                'end_offer_at'  =>'sometimes|nullable|date',
                'weight'        =>'sometimes|nullable',
                'weight_id'     =>'sometimes|nullable|numeric',
                'status'        =>'sometimes|nullable|in:pending,refused,active',
                'reson'         =>'sometimes|nullable',
                'other_data'    =>'sometimes|nullable',
            ],[],
            [
                'title'         => atrans('product_title'),
                'content'       => atrans('product_content'),
                'department_id' => atrans('department_id'),
                'trade_id'      => atrans('trade_id'),
                'manu_id'       => atrans('Manu_id'),
                'color_id'      => atrans('color_id'),
                'size'          => atrans('size'),
                'size_id'       => atrans('size_id'),
                'currency_id'   => atrans('currency_id'),
                'price'         => atrans('product_price'),
                'stock'         => atrans('product_stock'),
                'start_at'      => atrans('product_start_at'),
                'end_at'        => atrans('product_end_at'),
                'start_offer_at'=> atrans('product_start_offer_at'),
                'price_offer'   => atrans('product_price_offer'),
                'end_offer_at'  => atrans('product_end_offer_at'),
                'weight'        => atrans('weight'),
                'weight_id'     => atrans('weight_id'),
                'status'        => atrans('product_status'),
                'reson'         => atrans('product_reson'),
                'other_data'    => atrans('other_data'),
            ]);

            if(request()->has('mall') )
            {
                MallProduct::where('product_id',$id)->delete();
                foreach(request('mall') as $mall)
                {
                    MallProduct::create([
                        'product_id' => $id,
                        'molls_id' => $mall,
                        ]);
                }
            }else{
                MallProduct::where('product_id',$id)->delete();
            }

            if(request()->has('related') )
            {
                RelatedProduct::where('product_id',$id)->delete();
                foreach(request('related') as $related)
                {
                    RelatedProduct::create([
                        'product_id' => $id,
                        'related_product' => $related,
                        ]);
                }
            }else{
                RelatedProduct::where('product_id',$id)->delete();
            }

            if(request()->has('input_value') && request()->has('input_key') )
            {
                $i =0;
                $other_data ='';

                OtherData::where('product_id',$id)->delete();
                foreach (request('input_key') as $key)
                {
                    $data_value = !empty(request('input_value')[$i])?request('input_value')[$i]:'';
                    OtherData::create([
                        'product_id'    => $id,
                        'data_key'      => $key,
                        'data_value'    => $data_value ,
                        ]);
                    $i++;
                }
                $data['other_data'] = rtrim($other_data, '|');
            }else{
                OtherData::where('product_id',$id)->delete();
            }

        Product::where('id',$id)->update($data);
        return response(['status'=>true ,'message'=>atrans('record_edit')], 200);

    }


///////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////// Product Search ///////////////////////////////////////

public function product_search()
{
    if (request()->ajax()) {

        if(!empty(request('search') && request()->has('search') ))
        {

            $related_prodcut    = RelatedProduct::where('product_id',request('id'))->get(['related_product']);
            $products           = Product::where('title','LIKE','%'.request('search').'%')
            ->where('id','!=',request('id'))
            ->whereNotIn('id',$related_prodcut)
            ->limit(10)
            ->orderBy('id', 'DESC')
            ->get();

            return response([
                'status'       =>true,
                'result'       =>count($products)>0?$products:'',
                'count' =>count($products)
                ] ,200);
        }
    }

}

//////////////////////////////////// Product Search ///////////////////////////////////////
//////////////////////////////////// Product Search ///////////////////////////////////////

public function product_search_vue($id)
{
    if(!empty(request('title') && request()->has('title') ))
    {

        $related_prodcut    = RelatedProduct::where('product_id',$id)->get(['related_product']);
        $products           = Product::where('title','LIKE','%'.request('title').'%')
        ->where('id','!=',$id)
        ->whereNotIn('id',$related_prodcut)
        ->limit(10)
        ->orderBy('id', 'DESC')
        ->get();

        return response([
            'status'        =>true,
            'result'        =>count($products)>0?$products:'',
            'count'         =>count($products),
            ] ,200);
    }
    $product = Product::find($id)->related()->get();
    return response(['related' => $product  ] ,200);

}

//////////////////////////////////// Product Search ///////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////

public function upload_files($id)
{

        if (request()->hasFile('files'))
        {

            $fid  =  up()->upload([
                //'new_name'      =>'',
                'file'          =>'files',
                'path'          =>'products/' . $id,
                'upload_type'   =>'files',
                'file_type'     =>'product',
                'relation_id'   =>$id,
                ]);

                return response(['status'=>true , 'id' => $fid], 200);
        }
    }


    public function delete_file()
    {
        if(request()->has('id'))
        {
            up()->delete(request('id'));
        }
    }

///////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function restor(RestorDatatable $restor)
    {
        return $restor->render('admin.prodacts.restor', ['title'=> atrans('restor')]);
    }

    public function restoreProduct($id)
    {
        Product::where('id',$id)->restore();

        session()->flash('success',atrans('restored'));
        return redirect(aurl('prodacts/soft/deleted'));

    }

    public function softProduct($id)
    {
        if($id !=null)
        {
            $prodacts = Product::find($id);
            $prodacts->delete();
            session()->flash('success',atrans('record_deleted'));
        }
        return redirect(aurl('prodacts'));
    }


    //////////////////////////////////////////////////////////////////////////////////////

    public function  soft_prod($id)
    {
        $prodacts = Product::where('id',$id);
        // Storage::delete($prodacts->photo);
        up()->delete_files($id);
        $prodacts->forceDelete($id);
    }

    //////////////////////////////////////////////////////////////////////////////////////

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function delete_trash_Product($id)
    {
        if($id != null)
        {
            $this->soft_prod($id);
            session()->flash('success',atrans('record_deleted'));
        }

        return redirect(aurl('prodacts/soft/deleted'));
    }



    public function multi_soft_delete()
    {
        if (is_array(request('item')))
        {
            foreach (request('item') as $id)
            {
                $this->soft_prod($id);
            }
        }else {
            $this->soft_prod(request('item'));
        }
        session()->flash('success',atrans('record_deleted'));
        return redirect(aurl('prodacts/soft/deleted'));
    }


//////////////////////////////////////////////////////////////////////////////////////


    public function deleteProduct($id)
    {
        $prodacts = Product::find($id);
        Storage::delete($prodacts->photo);
        up()->delete_files($id);
        $prodacts->forceDelete();
    }

//////////////////////////////////////////////////////////////////////////////////////


        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

        $this->deleteProduct($id);

        session()->flash('success',atrans('record_deleted'));

        return redirect(aurl('prodacts'));
    }

    public function multi_delete()
    {
        if (is_array(request('item')))
        {
            // Product::destroy(request('item'));
            foreach (request('item') as $id)
            {
                $this->deleteProduct($id);
            }
        }else {
                $this->deleteProduct(request('item'));

        }

        session()->flash('success',atrans('record_deleted'));

        return redirect(aurl('prodacts'));
    }


}
