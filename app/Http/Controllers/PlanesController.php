<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\Planes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PlanesController extends Controller
{


    public function all(){
        $brands = Brands::all();
        $planes = Planes::paginate(10);
        $planes->load('brand');
        return view('planes.list',compact('planes'));
    }

    public function addNew(){
        $brands = Brands::all();
        return view('planes.add', compact('brands'));
    }

    public function saveNew(Request $request){
        $validator = Validator::make($request->all(),[
            'brand_id' => 'required',
            'name' => 'required|unique:planes,name',
            'image'=>'required'
        ],
        [
            'brand_id.required' => 'Vui lòng chọn hãng sản xuất',
            'name.required' => 'Vui lòng nhập tên',
            'image.required' => 'Vui lòng chọn ảnh',
            'name.unique' => 'Tên đã tồn tại'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }
        $model = new Planes();
        $model->fill($request->all());
        if($request->hasFile('image')){
            $newFileName = uniqid(). '-' . $request->image->getClientOriginalName();
            $path = $request->image->storeAs('public/uploads/planes', $newFileName);
            $model->image = str_replace('public/', '', $path);
        }
        $model->save();

        return redirect()->route('plane-list');
    }

    public function edit($id){
        $brands = Brands::all();
        $data = Planes::find($id);
        if(!$data){
            return redirect()->back();
        }
        return view('planes.edit',compact('data','brands'));
    }

    public function saveEdit($id ,Request $request){
        $validator = Validator::make($request->all(),[
            'brand_id' => 'required',
            'name' => 'required|unique:planes,name'
        ],
        [
            'brand_id.required' => 'Vui lòng chọn hãng sản xuất',
            'name.required' => 'Vui lòng nhập tên',
            'name.unique' => 'Tên đã tồn tại'

        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }
        $model = Planes::find($id);
        if(!$model){
            return redirect()->back();
        }
        $model->fill($request->all());
        if($request->hasFile('image')){
            $newFileName = uniqid(). '-' . $request->image->getClientOriginalName();
            $path = $request->image->storeAs('public/uploads/planes', $newFileName);
            $model->image = str_replace('public/', '', $path);
        }
        $model->save();
        return redirect()->route('plane-list');
    }

    public function delete($id){
        Planes::destroy($id);
        return redirect()->back();
    }
}
