<?php namespace Impl\Repo\Article;

use Impl\Repo\Tag\TagInterface;
use Article;

class EloquentArticle implements ArticleInterface{

	protected $article;		//Article Model
	protected $tag; 		//Taginterface


	public function __construct(Article $article, TagInterface $tag){
		$this->article = $article;
		$this->tag = $tag;
	}


	public function byPage($page=1, $limit=2){

		$result = new \StdClass;		//sample class

		$result->page = $page;			//set page
		$result->limit = $limit;		//set page limit
		$result->totalItems = 0;		//initialzie totalitems to 0
		$result->items = array();		//initialize array

		$articles = $this->article->with('tags')
					->where('status_id', 3)
					->orderBy('created_at', 'desc')
					->skip( $limit * ($page-1) )
					->take($limit)
					->get();

		// Create object to return data useful
		// for pagination
		$result->items = $articles->all();
		$result->totalItems = $this->totalArticles();
		return $result;
	}

	public function bySlug($slug){

		// Include tags using Eloquent relationships
		return $this->article->with('tags')
				->where('status_id', 3)
				->where('slug', $slug)
				->first();

	}

	public function byTag($tag, $page=1, $limit=2){

 		$foundTag = $this->tag->where('slug', $tag)->first();

   		$result = new \StdClass;
   		$result->page = $page;
   		$result->limit = $limit;
   		$result->totalItems = 0;
   		$result->items = array();

		if( !$foundTag )
		{
			return $result;
		}		

		 $articles = $this->tag->articles()
					->where('articles.status_id', 3)
					->orderBy('articles.created_at', 'desc')
					->skip( $limit * ($page-1) )
					->take($limit)
					->get();		

		$result->totalItems = $this->totalByTag();
		$result->items = $articles->all();

		return $result;
	}

	protected function totalArticles()
	{
		return $this->article->where('status_id', 3)->count();
	}

	protected function totalByTag($tag)
	{
		return $this->tag->bySlug($tag)
			->articles()
			->where('status_id', 3)
			->count();
	}	


}