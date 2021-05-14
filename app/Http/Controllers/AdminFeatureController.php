<?php

namespace App\Http\Controllers;
use App\Models\Feature;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class AdminFeatureController extends Controller
{
    
    public function index(){
        $features = Feature::latest()->paginate(10);
        return view('admin.feature.index', compact('features'));
    }

    public function create(){

        return view('admin.feature.add');

    }

    public function store(Request $request){

        if($request->polyester == null){
            $polyester = 0;
        } else {
            $polyester = 1;
        }
        if($request->hood == null){
            $hood = 0;
        } else {
            $hood = 1;
        }
        if($request->zipper == null){
            $zipper = 0;
        } else {
            $zipper = 1;
        }
        if($request->mint_blue == null){
            $mint_blue = 0;
        } else {
            $mint_blue = 1;
        }
        if($request->mild_weather == null){
            $mild_weather = 0;
        } else {
            $mild_weather = 1;
        }
        if($request->fleece == null){
            $fleece = 0;
        } else {
            $fleece = 1;
        }
        if($request->white == null){
            $white = 0;
        } else {
            $white = 1;
        }
        if($request->pink == null){
            $pink = 0;
        } else {
            $pink = 1;
        }
        if($request->cold_weather == null){
            $cold_weather = 0;
        } else {
            $cold_weather = 1;
        }
        if($request->windproof == null){
            $windproof = 0;
        } else {
            $windproof = 1;
        }
        if($request->water_resistant == null){
            $water_resistant = 0;
        } else {
            $water_resistant = 1;
        }
        if($request->blue == null){
          
           $blue = 0;
        } else {
            $blue = 1;
        }
        if($request->gray == null){
            $gray = 0;
        } else {
            $gray = 1;
        }
        if($request->half_zipper == null){
            $half_zipper = 0;
        } else {
            $half_zipper = 1;
        }
        if($request->brown == null){
            $brown = 0;
        } else {
            $brown = 1;
        }
        if($request->purple == null){
            $purple = 0;
        } else {
            $purple = 1;
        }
        if($request->high_collar == null){
            $high_collar = 0;
        } else {
            $high_collar = 1;
        }

        // dd($request->all());
        Feature::create([
            'feature_name' => $request->feature_name,
            'polyester' => $polyester,
            'hood' => $hood,
            'zipper' => $zipper,
            'mint_blue' => $mint_blue,
            'mild_weather' => $mild_weather,
            'fleece' => $fleece,
            'white' => $white,
            'pink' => $pink,
            'cold_weather' => $cold_weather,
            'windproof' => $windproof,
            'water_resistant' => $water_resistant,
            'blue' => $blue,
            'gray' => $gray,
            'half_zipper' => $half_zipper,
            'brown' => $brown,
            'purple' => $purple,
            'high_collar' => $high_collar,
        ]);

        //tất cả return sẽ trả về 1 đường dẫn
        return Redirect::to('feature');
    }
    public function edit($id){
        $features = Feature::find($id);
        // dd($features);
        //RETURN view trả về đường dẫn của trang view
        return view('admin.feature.edit', compact('features'));

    }
    public function update(Request $request, $id){
        // dd($request);

        if($request->polyester == null){
            $polyester = 0;
        } else {
            $polyester = 1;
        }
        if($request->hood == null){
            $hood = 0;
        } else {
            $hood = 1;
        }
        if($request->zipper == null){
            $zipper = 0;
        } else {
            $zipper = 1;
        }
        if($request->mint_blue == null){
            $mint_blue = 0;
        } else {
            $mint_blue = 1;
        }
        if($request->mild_weather == null){
            $mild_weather = 0;
        } else {
            $mild_weather = 1;
        }
        if($request->fleece == null){
            $fleece = 0;
        } else {
            $fleece = 1;
        }
        if($request->white == null){
            $white = 0;
        } else {
            $white = 1;
        }
        if($request->pink == null){
            $pink = 0;
        } else {
            $pink = 1;
        }
        if($request->cold_weather == null){
            $cold_weather = 0;
        } else {
            $cold_weather = 1;
        }
        if($request->windproof == null){
            $windproof = 0;
        } else {
            $windproof = 1;
        }
        if($request->water_resistant == null){
            $water_resistant = 0;
        } else {
            $water_resistant = 1;
        }
        if($request->blue == null){
          
           $blue = 0;
        } else {
            $blue = 1;
        }
        if($request->gray == null){
            $gray = 0;
        } else {
            $gray = 1;
        }
        if($request->half_zipper == null){
            $half_zipper = 0;
        } else {
            $half_zipper = 1;
        }
        if($request->brown == null){
            $brown = 0;
        } else {
            $brown = 1;
        }
        if($request->purple == null){
            $purple = 0;
        } else {
            $purple = 1;
        }
        if($request->high_collar == null){
            $high_collar = 0;
        } else {
            $high_collar = 1;
        }

        Feature::find($id)->update([
            'feature_name' => $request->feature_name,
            'polyester' => $polyester,
            'hood' => $hood,
            'zipper' => $zipper,
            'mint_blue' => $mint_blue,
            'mild_weather' => $mild_weather,
            'fleece' => $fleece,
            'white' => $white,
            'pink' => $pink,
            'cold_weather' => $cold_weather,
            'windproof' => $windproof,
            'water_resistant' => $water_resistant,
            'blue' => $blue,
            'gray' => $gray,
            'half_zipper' => $half_zipper,
            'brown' => $brown,
            'purple' => $purple,
            'high_collar' => $high_collar,
            
        ]);
        return Redirect::to('feature');

    }
    public function delete($id){
        Feature::find($id)->delete();
        
        return Redirect::to('feature');
    }


}
