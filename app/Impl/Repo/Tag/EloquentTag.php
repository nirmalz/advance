<?php namespace Impl\Repo\Tag;

use Tag;

class EloquentTag implements TagInterface{

	protected $tag;

    // Class expects an Eloquent model
    public function __construct(Tag $tag)
    {
        $this->tag = $tag;
    }	

}