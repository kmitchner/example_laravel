<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
     /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Whether or not to enable timestamps.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * Defines an inverse one-to-many relationship.
     *
     * @see http://laravel.com/docs/eloquent#one-to-many
     */
    public function user_id()
    {
        return $this->belongsTo('User', 'id');
    }

    /**
     * Return the user that owns the comment.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

     /**
     * Whitelisted model properties for mass assignment.
     *
     * @var array
     */
    protected $fillable = array('content');
}
