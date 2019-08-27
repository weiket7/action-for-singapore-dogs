<?php namespace App\Models;

use App\Helpers\BackendHelper;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public $table = 'blog';
    protected $primaryKey = 'blog_id';
    public $timestamps = false;

    public function saveBlog($input)
    {
        $this->title = $input['title'];
        $this->slug = str_slug($this->title);
        $this->type = $input['type'];
        $this->posted_on = BackendHelper::isDateTime($input['posted_on']) ? Carbon::createFromFormat('Y-m-d H:i:s', $input['posted_on']) : Carbon::createFromFormat('Y-m-d', $input['posted_on']);
        if ($this->blog_id == null) {
            $this->image = "";
        }
        $this->content = $input['content'];
        $this->save();

        return $this->blog_id;
    }
}