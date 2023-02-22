<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Elasticquent\ElasticquentTrait;

class Tag extends Model
{
    use HasFactory;
    use Sluggable, ElasticquentTrait;

    protected $fillable = [
        'name',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source'   => 'name',
                'unique'   => true,
                'onUpdate' => true,
            ]
        ];
    }

    public function articles()
    {
        return $this->belongsToMany(Article::class, 'article_tag');
    }
}
