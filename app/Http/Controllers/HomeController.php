<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Category;
use App\Models\AssignmentCategory;
use DB;
use App\Models\Subject;
use App\Models\SubjectCategory;
use App\Models\Questions;
use App\Models\ModulesData;
use App\Models\Modules;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $banner = module(18);
        $category = Category::where('status','active')->latest()->get();
        $testimonial = module(12);
        $howWork =   module(10);
        $chooseUs =    module(20);
        $helpFaqs =    module(23);


        return view('home',compact('banner','category','testimonial','howWork','chooseUs','helpFaqs'));
    }

    public function freelancerLogout()
    {
       
        \Auth::guard('admin')->logout();
    
        // Redirect to the desired location after logout
        return redirect()->route('home');
    }  

    public function faq(Request $request){

        $categopry = DB::table('modules_data')->where('module_id',17);
        $array = $categopry->pluck('id')->toArray();
        $faqData = DB::table('modules_data')->whereIn('category',$array)->get();
        $categopry = $categopry->get();
        //dd($categopry);
        return view('faq',compact('faqData','categopry'));
    }

    public function privacypolicy(Request $request){
        $privacypolicy = DB::table('widgets_data')->where('widget_id',9)->first();
        return view('privacy',compact('privacypolicy'));
    }

    public function termsconditions(Request $request){
        $termsconditions = DB::table('widgets_data')->where('widget_id',8)->first();
        return view('terms-conditions',compact('termsconditions'));
    }

    public function takeMyOnlineClass(Request $request){

        //$module_data_id = Modules::findorfail(29)->id;

        $category = ModulesData::where('module_id',29)->first();
        $modules = explode(',',$category->module_ids);
        $works = array();
        $services = array();
        $faqs = array();
        $testimonials = array();
        $colleges = array();

        if(count($modules) > 0){
            $modulesIDS = json_decode($category->category_ids);
            foreach($modules as $k=>$v){
               
                $modDataId = $modulesIDS->{$modules[$k]};
                
                switch ($v) {

                    case '30':
                        //->whereIn('id',$modDataId)
                        $works = ModulesData::select('id','title','module_id','description','image')->where('status','active')->where('module_id',30)->get();
                    break;

                    case '31':
                        //->whereIn('id',$modDataId)
                        $services = ModulesData::select('id','title','module_id','description','image')->where('status','active')->where('module_id',31)->get();
                    break;

                    case '32':
                        //->whereIn('id',$modDataId)
                        $faqs = ModulesData::select('id','title','module_id','description','image')->where('status','active')->where('module_id',32)->get();
                    break;

                    case '33':
                        //->whereIn('id',$modDataId)
                        $testimonials = ModulesData::select('id','title','module_id','description','image')->where('status','active')->where('module_id',33)->get();
                    break;

                    case '35':
                        //->whereIn('id',$modDataId)
                        $colleges = ModulesData::select('id','title','module_id','description','image')->where('status','active')->where('module_id',35)->get();
                    break;
                }
            }
        }
        //dd($portfolio);

        return view('online-class.index',compact('category','works','services','faqs','testimonials','colleges'));
    }
    
    public function solutionsLibrary(Request $request,$subject_category_id=null,$topic_id=null){

        $subjectcategory = SubjectCategory::Activated()->orderBy('category_name','ASC');
        $subjectcategory = $subjectcategory->get();
        $courseCode      = \App\Models\CourseCode::Activated()->get();
        $questions       = Questions::with(['category','subjects','college'])->whereHas('subjects')->whereHas('category')->latest()->Activated();
        
        $topics = [];

        if($request->subject_category!=''){
            $questions = $questions->SubjectCategoryFilter($request->subject_category);
            $topics   = Subject::select('subject_name','id')->where('subject_category',$request->subject_category)->Activated()->get();  
        }

        if($subject_category_id!=''){
            $questions = $questions->SubjectCategoryFilter($subject_category_id);
        }

        if($request->subject_code!=''){
            $subject_code = $request->subject_code;
            $questions = $questions->where('coursesid',$subject_code);
        }

        if($request->subject!=''){
            $questions = $questions->SubjectFilter($request->subject);
        }
        
        if($topic_id!=''){
            $questions = $questions->SubjectFilter($topic_id);
        }

        if($request->search!=''){
            $search = $request->search;
            $questions = $questions->SearchFilter($search);
        }

        if( ($request->subject_category==null && $request->subject==null && $request->search==null) && ($subject_category_id==null && $topic_id==null)){
            $questions = $questions->take(10);
        }
        $questions = $questions->paginate(25)
                                ->groupBy('category.category_name')
                                ->map(function ($products, $categoryName) {
                                    $data =  [
                                        'category_name' =>$categoryName,
                                        'questions' => $products,
                                    ];

                                    return $data;
                                })
                                ->sortKeys()
                                ->values();
        //dd($questions);

        $subjectsCategory = SubjectCategory::TopicsData()->Activated()->get();
        return view('solutions-library.index',compact('courseCode','subject_category_id','topic_id','subjectcategory','topics','questions','subjectsCategory'));
    }

    public function getSubcategory(Request $request){
        $subject   = Subject::select('subject_name','id')->where('subject_category',$request->category_id)->Activated()->get();        
        return response()->json(['subject'=>$subject]);
    }

    public function solutionsLibrarySubjectPage(Request $request){
        
        $subjectsCategory = SubjectCategory::TopicsData()->get();

    }

    public function getSubjects(Request $request){
        $questions = Questions::latest()->Activated();
        if($request->category_id!=''){
            $questions = $questions->where('subject_category',$request->category_id);
        }
        if($request->subject_id!=''){
            $questions = $questions->where('subject',$request->subject_id);
        }
        if($request->search!=''){
            $search = $request->search;
            $questions = $questions->whereHas('subjects',function($query) use ($search){
                            $query->where('subject_name','LIKE','%'.$search.'%');
                        });
        }
        $questions = $questions->paginate(20);


        $view = view('sections.solution-library',compact('questions'))->render();
        return response()->json(['html'=>$view]);
    }

    public function questionDetails(Request  $request,$question_id){
        $question = Questions::FindOrFail($question_id);
        $relatedQuestions = Questions::select('id','question','answer')->where('subject_category',$question->subject_category)->where('id','!=',$question_id)->get();
        return view('solutions-library.question',compact('question','relatedQuestions'));
    }

    public function login(Request $request){
        return response()->json(['status'=>true]);
    }


    public function blogs(Request $request){

        $blogs = ModulesData::whereHas('modelable')
                            ->where('module_id',15);

        
        $category = null;
        $search = '';

        if($request->category!=""){
            
           $category = SubjectCategory::find($request->category);

           $blogs = $blogs->where('category',$request->category);

        }

        if($request->search!=""){
            $search = $request->search;
            $blogs = $blogs->where('title','like','%'.$request->search.'%');
        }

        $blogs = $blogs->latest()->paginate(10)->withQueryString();
        // dd($blogs);
        $subjectsCategory = SubjectCategory::whereHas('blogs')->withCount('blogs')->Activated()->orderBy('category_name')->get();
        // dd($subjectsCategory)

        return view('blog',compact('blogs','subjectsCategory','category','search'));
    }
}
