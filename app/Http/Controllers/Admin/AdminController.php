<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Image;

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
                        ->orderBy('posted_at','desc')
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
        $allArticle = Post::all();
        return view('admin.index')->with('allArticle', $allArticle);
    }

    /*
    *   RENDER admin_list.blade
    *   List of all article posts 'without image'
    *   call getAllArticle method and pass to this function
    */
    public function adminLists(Request $request){
        $listOfArticle = Post::select('*')
                        ->orderBy('posted_at','desc')
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

        $file = Input::file('image');
        $img = Image::make($file);
        Response::make($img->encode('jpeg'));

        // Get all the request name in input
        $title = $request->title;
        $inquiry = $request->inquiry;
        $user_id = $request->user_id;
        $curr_date = Carbon::now('Asia/Manila')->toDateTimeString(); //get current_date

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



        // // Check if has file image in the input
        // if($request->hasFile('image')){
        //     $filenameWithExt = $request->file('image')->getClientOriginalName(); //get filename with extension
        //     $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //     $rn = str_random(5); // avoid duplication of image in folder
        //     $extension = $request->file('image')->getClientOriginalExtension();
        //     // $filenameToStore =  $filename . '-' . $rn . '-' . time() . '.' . $extension; //example: ligPhil-321d2.png
        //     $filenameToStore = $filename . '.'  . $extension;
        // }
     
        // // Check if newly article, if no id
        // if(empty($user_id)){
        //     // Instantiate post for saving
            $post = new Post;
            if(Input::hasFile('image')){
                $file = Input::file('image');
                $file->move(public_path() . '/articleImages/' , $file->getClientOriginalName());

                $post->image = $file->getClientOriginalName();
            }
            $post->title = $title;
            $post->content = $inquiry; 
            $post->posted_at = $curr_date;
            $post->save();
        //     // store the file to public folder after save
        //     // if($post->save())
        //     //     $path = $request->file('image')->storeAs('public/assets/images/articleImages', $filenameWithExt);

        // }else{

        //     // If already exist, update data
        //     $hasId = Post::find($user_id);

        //     // check if there is an image then update
        //     if($request->hasFile('image')){
        //         $hasId->image = $filenameToStore;
        //         $path = $request->file('image')->storeAs('public/articleImages', $filenameWithExt); //store image
        //     }
        //     $hasId->title = $title;
        //     $hasId->content = $inquiry;
        //     $hasId->posted_at = $curr_date;
        //     $hasId->save(); //update data
        // }

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
        // $picture = Post::findOrFail($id);
        // $pic = Image::make($picture->image);
                       ->where('id',$id)
                       ->get();
        // $response = Response::make($pic->encode('jpeg'));

        // //setting content-type
        // $response->header('Content-Type', 'image/jpeg');

        // return $response;
        // return view('admin.single')->with('response',$response);

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
