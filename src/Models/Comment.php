<?php

namespace KirschbaumDevelopment\NovaComments\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "comments";

    protected $fillable = ["comment","author_id","commentable_id","commentable_type"];

    protected $appends = ["username"];

    /**
     * The "booting" method of the model.
     */
    public static function boot()
    {
        parent::boot();

        static::creating(
            function ($comment) {
                if (auth()->check()) {
                    $comment->author_id = auth()->id();
                }
            }
        );
    }

    public function getUsernameAttribute() {
        return ($this->user) ? $this->user->name : __("user.name.deleted");
    }

    public function commenter() {
        return $this->belongsTo("\App\User","author_id")->select("id","name","email");
    }

    public function thread() {
        return $this->belongsTo("\App\Comment","comment_id");
    }

    public function commentable() {
        return $this->morphTo();
    }

}
