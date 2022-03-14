<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;
    protected $table= 'posts';
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

    public function getStatusTextAttribute(){
        if($this->status = 1){
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
        return $this->belongsTo( User::class );
    }

}
