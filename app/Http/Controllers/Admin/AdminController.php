<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Post;
use DB;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;

class AdminController extends Controller
{

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('auth');
    }

    /*
    *   Get all article post in
    *   the database,orderby desc,and take only latest 5 posts.
    *   This function will just call by other method who needs this data.
    *   Date format is Month-Day-Year
    */
    public function getAllArticle(){
        $getAllArticle = Post::select('*')
                        ->orderBy('posted_at','desc')
                        ->paginate(5);

        return $getAllArticle;
    }

    /*
    *   RENDER index.blade page
    *   call getAllArticle method and pass to this function
    */
    public function index(){
        return view('admin.index')->with('allArticle', $this->getAllArticle());
    }    

    /*
    *	RENDER admin_list.blade
    *	list of all article posts
    *   call getAllArticle method and pass to this function
    */
    public function adminLists(Request $request){
        $listOfArticle = Post::select('*')
                        ->orderBy('posted_at','desc')
                        ->get();

    	return view('admin.admin_list')->with('allArticle', $listOfArticle);
    }

    /*
    *	RENDER admin_post.blade
    *	for fill input
    */
    public function adminPosts($findId=""){
        $id = Post::find($findId);
        return view('admin.admin_post')->with('id',$id);
    }

    /*
    *   RENDER archive.blade
    *   call getAllArticle method and pass to the page
    */
    public function archive(){
        return view('admin.archive')->with('article',$this->getAllArticle());
    }

    /*
    *   RENDER single.blade
    *   only display specific article post to the page
    */
    public function single(Request $request,$id){
       $matchArticle = Post::select('*')
                       ->where('id',$id)
                       ->get();

        return view('admin.single')->with('matchArticle',$matchArticle);
    }

    /*
	*	FUNCTION TO SAVE  
	*	ADMIN POST ARTICLE IN admin_post.blade
    */
    public function postSubmit(Request $request){

        // Validate in backend if all input is not empty
		$this->validate($request,[
            'image' => 'required',
    		'title' => 'required',
    		'inquiry' => 'required'
    	]);

        // Get all the request name in input
    	$title = $request->title;
    	$inquiry = $request->inquiry;
        $user_id = $request->user_id;

    	// check if a file has image
        if($request->hasFile('image')){
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $rn = str_random(5); // avoid duplication of image in folder
            $extension = $request->file('image')->getClientOriginalExtension();
            $filenameToStore =  $filename . '-' . $rn . '.' . $extension; //example: ligPhil-321d2.png

            // check if newly save
            if($user_id == ""){
                // Instantiate post for saving
                $post = new Post;
                $post->image = $filenameToStore;
                $post->title = $title;
                $post->content = $inquiry;
                $post->posted_at = Carbon::now('Asia/Manila')->toDateTimeString();
                $post->save();

            }else{
                // if already exist, update data
                $hasId = Post::find($user_id);
                $updateId = DB::table('posts')
                            ->where('id', $hasId->id)
                            ->update([
                                'image' => $filenameToStore,
                                'title' => $title,
                                'content' => $inquiry
                            ]);
            }
            // store the file to public folder after save
            // secure to save first in the database before saving to public folder
            $path = Storage::disk('public')->put('uploads/', $filenameToStore);

            //redirect to admin_post.blade page if success saving
            return redirect('/adminPosts')->with('success','Article posted');
        }
    }
}
