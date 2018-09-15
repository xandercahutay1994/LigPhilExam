<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;

class AdminController extends Controller
{
    /**
    * Create a new controller instance for auth.
    * Can't view/visit article pages if not login.
    * @return void
    */
    public function __construct(){
        $this->middleware('auth');
    }

    /*
    *   Get all article post in
    *   the database,orderby desc,and take only latest 5 article posts.
    *   This function will just call by other method who needs this data.
    *   Date format is Month-Day-Year
    */
    public function getAllArticle(){
        $getAllArticle = Post::select('*')
                        ->orderBy('updated_at','desc')
                        ->paginate(5);

        return $getAllArticle;
    }

    /**
     * Display a listing of the resource 'with images'. 
     * 
     * Get list of data from "getAllArticle()"
     */
    public function index()
    {
        return view('admin.index')->with('allArticle', $this->getAllArticle());
    }

    /*
    *   RENDER admin_list.blade
    *   List of all article posts 'without image'
    *   call getAllArticle method and pass to this function
    */
    public function adminLists(Request $request){
        $listOfArticle = Post::select('*')
                        ->orderBy('updated_at','desc')
                        ->get();

        return view('admin.admin_list')->with('listOfArticle', $listOfArticle);
    }

    /*
    *   RENDER archive.blade
    *   List of all articles with images & pagination.
    *   call getAllArticle method and pass to the page
    */
    public function archive(){
        return view('admin.archive')->with('article',$this->getAllArticle());
    }

    /** 
     * Route/Url name is "adminPosts"
     * Show the form for creating a new resource. Save a new article post
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admin_post');
    }

    /**
     * Post Route/Url is "postSubmit"
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Get all the request name in input
        $title = $request->title;
        $inquiry = $request->inquiry;
        $user_id = $request->user_id;
        $curr_date = Carbon::now('Asia/Manila')->toDateTimeString(); //get current_date
        $rn = str_random(5); // random char to avoid duplication of image in folder

        /*
        *  Validate in backend if all input is not empty.
        *  For not existing article in database;
        */
        if(empty($user_id)){
            $this->validate($request,[
                'image' => 'required',
                'title' => 'required',
                'inquiry' => 'required'
            ]);
        }else{
            $this->validate($request,[
                'title' => 'required',
                'inquiry' => 'required'
            ]);
        }
        
        // Check if newly article, if no id
        if(empty($user_id)){
            // Instantiate post for saving
            $post = new Post;
            if(Input::hasFile('image')){
                $file = Input::file('image');
                $file->move(public_path() . '/articleImages/' , $rn . '-' . time() . '-' . $file->getClientOriginalName()); //example 93kwi-232932-ex.jpeg

                $post->image = $rn . '-' . time() . '-' . $file->getClientOriginalName(); //avoid duplication
            }
            $post->title = $title;
            $post->content = $inquiry; 
            $post->save();
        }else{
            // If already exist, update data
            $hasId = Post::find($user_id);

            // check if there is an image then update
            if($request->hasFile('image')){
                $file = Input::file('image');
                $file->move(public_path() . '/articleImages/' , $rn . '-' . time() . '-' . $file->getClientOriginalName()); //example 93kwi-232932-ex.jpeg

                $hasId->image = $rn . '-' . time() . '-' . $file->getClientOriginalName(); //avoid duplication
            }
            $hasId->title = $title;
            $hasId->content = $inquiry;
            $hasId->save(); //update data
        }

        //redirect to admin_post.blade page if success saving
        return redirect('/adminPosts')->with('success','Article posted');
    }

    /**
     * Route/Url name is "single/{id}"
     * Display the specified resource. 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $showArticle = Post::select('*')
                       ->where('id',$id)
                       ->get();

        return view('admin.single')->with('showArticle',$showArticle);
    }

    /**
    * RENDER admin_post.blade with URL ID
    * 
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        $post_id = Post::find($id);
        return view('admin.admin_post')->with('id',$post_id);
    }
}
