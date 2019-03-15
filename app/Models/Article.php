<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\RevisionScope;

/**
 * An Eloquent Model: 'Article'
 *
 * @property integer $id
 * @property string $title
 * @property string $text
 * @property integer $category_id
 * @property integer $revision_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property-read Category $category
 * @property-read Revision $revision
 */
class Article extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'text', 'category_id', 'revision_id'];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new RevisionScope);
    }

    /**
     * Relation with category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Relation with tags.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * Relation with comment.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Relation with revision.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function revision()
    {
        return $this->belongsTo(Revision::class);
    }

}
