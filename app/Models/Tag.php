<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * An Eloquent Model: 'Tag'
 *
 * @property integer $id
 * @property string $name
 */
class Tag extends Model
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Relation with article.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function article()
    {
        return $this->belongsToMany(Article::class);
    }
}
