<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\Planes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;




class BrandsController extends Controller
{
    public function all(){
        $brands = Brands::paginate(10);
        return view('brands.list-brands',compact('brands'));
    }

    public function addNew(){
        return view('brands.add-brands');
    }

    public function saveNew(Request $request){
        $request->validate([
            'name' => 'required|unique:brands,name',
            'address' => 'required',
            'image' => 'required'
        ],
        [
            'name.required' => 'Tên không được để trống',
            'name.unique' => 'Tên đã tồn tại',
            'address.required' => 'Địa chỉ không được để trống',
            'image.required' => 'Vui lòng chọn ảnh'
        ]);
        $data = $request->all();
        $model = new Brands();
        $model->fill($data);
        if($request->hasFile('image')){
            $newFileName = uniqid(). '-' . $request->image->getClientOriginalName();
            $path = $request->image->storeAs('public/uploads/brands', $newFileName);
            $model->image = str_replace('public/', '', $path);
        }
        $model->save();

        return redirect()->route('brand-list');
    }

    public function edit($id){
        $data = Brands::find($id);
        if(!$data){
            return redirect()->back();
        }
        return view('brands.edit',compact('data'));
    }

    public function saveEdit($id ,Request $request){
        $request->validate([
            'name' => 'required|unique:brands,name',
            'address' => 'required'
        ],
        [
            'name.required' => 'Tên không được để trống',
            'name.unique' => 'Tên đã tồn tại',
            'address.required' => 'Địa chỉ không được để trống'
        ]);
        $model = Brands::find($id);
        if(!$model){
            return redirect()->back();
        }
        $model->fill($request->all());
        if($request->hasFile('image')){
            $newFileName = uniqid(). '-' . $request->image->getClientOriginalName();
            $path = $request->image->storeAs('public/uploads/brands', $newFileName);
            $model->image = str_replace('public/', '', $path);
        }
        $model->save();
        return redirect()->route('brand-list');
    }

    public function delete($id){
        Planes::where('brand_id', $id)->delete();
        Brands::destroy($id);
        return redirect()->back();
    }
}
