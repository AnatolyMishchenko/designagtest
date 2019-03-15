<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * An Eloquent Model: 'Revision'
 *
 * @property integer $id
 * @property string $name
 */
class Revision extends Model
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
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function article()
    {
        return $this->hasOne(Article::class);
    }
}
