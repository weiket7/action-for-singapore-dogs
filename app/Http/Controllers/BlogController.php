<?php namespace App\Http\Controllers;

use App\Helpers\BackendHelper;
use App\Http\Requests\BlogRequest;
use App\Models\Adopt;
use App\Models\Enums\BlogStat;
use App\Models\Enums\BlogType;
use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BlogController extends Controller {
  public function save(BlogRequest $request, $blog_id = null) {
    $blog = new Blog();
    if ($blog_id) {
      $blog = Blog::find($request->blog_id);
    }
    $blog_id = $blog->saveBlog(BackendHelper::processInput($request->all()));
    if ($request->image_new) {
      $image_name = "blog-".str_slug($blog->name)."-".Carbon::now()->format("YmdHis");
      $image_name = BackendHelper::uploadImage("blog", $image_name, $request->image_new);
      $blog->image = $image_name;
      $blog->save();
    }
    return $blog_id;
  }
  
  public function all(Request $request) {
    $data['blogs'] = Blog::orderBy('posted_on', 'desc')->get();
    $data['blog_types'] = BlogType::$values;
    return $data;
  }
  
  public function get(Request $request, $blog_id) {
    $blog = null;
    if (is_numeric($blog_id)) {
      $blog = Blog::where('blog_id', $blog_id)->first();
    } else {
      $slug = $blog_id;
      $blog = Blog::where('slug', $slug)->first();
    }
    $data['blog'] = $blog;
    $data['blog_types'] = BlogType::$values;
    return $data;
  }
  
  public function filter(Request $request) {
    $query = Blog::orderBy("date", "desc");
    if (count($request->showing) == 1) {
      if ($request->showing == 'upcoming') {
        $query->where('date', '>=', Carbon::now());
      } else if ($request->showing == 'past') {
        $query->where('date', '<', Carbon::now());
      }
    }
    
    if ($request->type) {
      $query->whereIn('type', $request->type);
    }
    $data['blogs'] = $query->get();
    
    return $data;
  }
}
