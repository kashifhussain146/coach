<?php
namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use App\Models\Modules;
use App\Models\ModulesData;
class OnlineClassesController extends Controller
{
  
    public function create($slug) {
        $data = array();
        $data['module'] = Modules::where('slug', $slug)->firstOrFail();

        if(null!==($data['module']->parent_id)){
            $data['categories'] = ModulesData::select('title', 'id')->where('module_id',$data['module']->parent_id)->where('status','active')->pluck('title', 'id')->toArray();
        }

        return view('admin.modules_data.add')->with($data);
    }

    public function store(Request $request)
    {
       
        $this->validate($request, [
            'title' => 'required',
        ], [
            'title.required' => 'Title is required.',
        ]);


        $check = ModulesData::where('module_id',29)->first();
        if($check){
            return redirect()->route('admin.modules.edit',['module'=>'online-class','id'=>$check->module_id]);
        }

        $slug = $request->slug;
        $slugs = unique_slug($slug, 'modules_data', $field = 'slug', $key = NULL, $value = NULL);
        $data = new ModulesData();
        $data->title = $request->title;
        $data->slug = $slugs;
        $data->description = $request->description;
        $data->category = $request->category;

        $data->module_id = $request->module_id;

        if (null!==($request->category_ids)) {
            $modules_id = [];
            foreach($request->module_ids as $k=>$v){
                if(isset($request->category_ids[$v])){
                    $modules_id[] = $v;
                }
            }
            $data->module_ids = implode(',',$modules_id);
            $data->category_ids =  json_encode($request->category_ids); //implode(",", $request->category_ids);
        }

        $data->extra_field_1 = $request->extra_field_1;
        $data->extra_field_2 = $request->extra_field_2;
        $data->extra_field_3 = $request->extra_field_3;
        $data->extra_field_4 = $request->extra_field_4;
        $data->extra_field_5 = $request->extra_field_5;
        $data->extra_field_6 = $request->extra_field_6;
        $data->extra_field_7 = $request->extra_field_7;
        $data->extra_field_8 = $request->extra_field_8;
        $data->extra_field_9 = $request->extra_field_9;
        $data->extra_field_10 = $request->extra_field_10;
        $data->extra_field_11 = $request->extra_field_11;
        $data->extra_field_12 = $request->extra_field_12;
        $data->extra_field_13 = $request->extra_field_13;
        $data->extra_field_14 = $request->extra_field_14;
        $data->extra_field_15 = $request->extra_field_15;

        $data->extra_field_date_1 = $request->extra_field_date_1;
        $data->extra_field_date_2 = $request->extra_field_date_2;
        $data->extra_field_date_3 = $request->extra_field_date_3;

        for($i=1;$i<=5;$i++){
            $desc = 'extra_field_desc_'.$i;
            $data->$desc = $request->$desc;
        }

        for($i=1;$i<=5;$i++){
            if($request->has('extra_field_files_'.$i)){
                $filesname = $request->file('extra_field_files_'.$i);
                $files = 'files_'.$i.time().'.'.$filesname->extension();
                $filesname->move(public_path('uploads/images'),$files);
                $files = "uploads/images/".$files;
                $column = 'extra_field_files_'.$i;
                $data->$column = $files;
            }
        }

        if (null!==($request->tag_ids)) {
            $data->tag_ids = implode(",", $request->tag_ids);
        }

        $data->meta_title = $request->meta_title;
        $data->meta_keywords = $request->meta_keywords;
        $data->meta_description = $request->meta_description;
        if($request->attached_file!=''){
            $data->image = $request->attached_file;
        }
        if($request->attached_files!=''){
            $data->images = $request->attached_files;
        }
       
        $data->save();

        


        $request->session()->flash('message.added', 'success');
        $request->session()->flash('message.content', $request->module_term.' has been successfully Created!');
        
        return redirect()->route('admin.modules.edit',['module'=>'online-class','id'=>$data->module_id]);
    }

    public function edit($slug,$id) {
        $data = array();$data['module'] = Modules::where('slug', $slug)->firstOrFail();
        $data['module_data'] = ModulesData::findorFail($id);
        if(null!==($data['module']->parent_id)){
            $data['categories'] = ModulesData::select('title', 'id')->where('module_id',$data['module']->parent_id)->where('status','active')->pluck('title', 'id')->toArray();
        }
        return view('admin.modules_data.edit')->with($data);
    }


    public function update(Request $request)
    {
    
         $this->validate($request, [
            'title' => 'required',
        ], [
            'title.required' => 'Title is required.',
        ]);

        $check = ModulesData::where('module_id',4)->where('title',$request->title)->where('id','!=',$request->id)->where('category',$request->category)->count();
        if($check > 0){
                \Session::flash('error','There is already exists expert name of category ! Please try another one');
                return redirect()->back()->withInput();
        }

        

        $slug = $request->slug;
        //$slugs = unique_slug($slug, 'modules_data', $field = 'slug', $key = NULL, $value = NULL);
        $data = ModulesData::findorFail($request->id);
        $data->title = $request->title;
        $data->slug = $slug;
        $data->description = $request->description;
        $data->category = $request->category;

        $data->module_id = $request->module_id;





        if (null!==($request->category_ids)) {
            $modules_id = [];
            foreach($request->module_ids as $k=>$v){
                if(isset($request->category_ids[$v])){
                    $modules_id[] = $v;
                }
            }
            $data->module_ids = implode(',',$modules_id);
            $data->category_ids =  json_encode($request->category_ids); //implode(",", $request->category_ids);
        }

        $data->extra_field_1 = $request->extra_field_1;
        $data->extra_field_2 = $request->extra_field_2;
        $data->extra_field_3 = $request->extra_field_3;
        $data->extra_field_4 = $request->extra_field_4;
        $data->extra_field_5 = $request->extra_field_5;
        $data->extra_field_6 = $request->extra_field_6;
        $data->extra_field_7 = $request->extra_field_7;
        $data->extra_field_8 = $request->extra_field_8;
        $data->extra_field_9 = $request->extra_field_9;
        $data->extra_field_10 = $request->extra_field_10;
        $data->extra_field_11 = $request->extra_field_11;
        $data->extra_field_12 = $request->extra_field_12;
        $data->extra_field_13 = $request->extra_field_13;
        $data->extra_field_14 = $request->extra_field_14;
        $data->extra_field_15 = $request->extra_field_15;

        if (null!==($request->tag_ids)) {
            $data->tag_ids = implode(",", $request->tag_ids);
        }

        $data->extra_field_date_1 = $request->extra_field_date_1;
        $data->extra_field_date_2 = $request->extra_field_date_2;
        $data->extra_field_date_3 = $request->extra_field_date_3;


        for($i=1;$i<=5;$i++){
            if($request->has('extra_field_files_'.$i)){
                
                $filesname = $request->file('extra_field_files_'.$i);
                $files = 'files_'.$i.time().'.'.$filesname->extension();
                $filesname->move(public_path('uploads/images'),$files);
                $files = "uploads/images/".$files;
                $column = 'extra_field_files_'.$i;
                $data->$column = $files;
            }
        }

        for($i=1;$i<=5;$i++){
            $desc = 'extra_field_desc_'.$i;
            $data->$desc = $request->$desc;
        }
        
        $data->meta_title = $request->meta_title;
        $data->meta_keywords = $request->meta_keywords;
        $data->meta_description = $request->meta_description;
        if($request->attached_file!=''){
            $data->image = $request->attached_file;
        }

        if($request->attached_files!=''){
            $data->images = $request->attached_files;
        }
       
        $data->update();
        $request->session()->flash('message.added', 'success');
        $request->session()->flash('message.content', $request->module_term.' has been successfully Updated!');
        return redirect(route('online-classes-edit',$request->module_slug));
    }
}
