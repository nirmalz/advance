<?php
class Article extends Eloquent{

   protected $table = 'articles';

    protected $fillable = array(
        'user_id',
        'status_id',
        'title',
        'slug',
        'excerpt',
        'content',
    );

    protected $softDelete = true;

    public function author()
    {
        return $this->belongsTo('User');
    }

    public function status()
    {
        return $this->belongsTo('Status');
    }

    public function tags()
    {
        return $this->belongsToMany('Tag', 'articles_tags', 'article_id', 'tag_id')->withTimestamps();
    }

}