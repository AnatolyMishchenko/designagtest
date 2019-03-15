<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * An Eloquent Model: 'Comment'
 *
 * @property integer $id
 * @property string $text
 * @property string $author
 * @property integer $article_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property-read Article $article
 */
class Comment extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['text', 'author', 'article_id'];

    /**
     * Relation with article.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
