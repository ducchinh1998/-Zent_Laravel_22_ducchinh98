<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;
    protected $table= 'posts';
    protected $fillable = ['title','slug','image_url','content','user_created_id','category_id','status'];
    public $timestamps=true;
    const CREATED_AT='created_at';
    const UPDATED_AT='updated_at';
    const STATUS_HIDE = 0;
    const STATUS_SHOW = 1;

    // protected $statusArr = [
    //     '0' => 'Draft',
    //     '1' => 'Public'
    // ];

    // public function getStatusTextAttribute(){
    //     // if($this->status = 1){
    //     //     $name = 'Public';
    //     // }else{
    //     //     $name = 'Draft';
    //     // }
    //     return $this->statusArr[$this->status];
    // }
    public function getImageUrlFullAttribute(){
        $url = Storage::disk($this->disk)->url($this->image);
        return $url;
        // return url(\Illuminate\Support\Facades\Storage::url($this->image));
    }

    public function getStatusTextAttribute(){
        if($this->status == self::STATUS_SHOW ){
             $name = 'Public';
        }else{
             $name = 'Draft';
        }
        return $name;
    }

    public function setTitleAttribute($title)
    {
        $this->attributes['title']= $title;
        $this->attributes['slug'] = Str::slug($title);
    }

    public function category()
    {
        return $this->belongsTo( Category::class ,'category_id');
    }

    public function user()
    {
        return $this->belongsTo( User::class,'user_created_id','id');
    }

    // public function userUpdate(){
    //     return $this->belongsTo(User::class, 'user_updated_id');
    // }


    public function tags()
    {
        return $this->belongsToMany( Tag::class );
    }

}
