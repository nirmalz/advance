<?php

use Impl\Repo\Article\ArticleInterface;

class ContentController extends BaseController {

	protected $article;  //Article Interface


	public function __construct(ArticleInterface $article)
	{
		$this->article = $article;
	}

	public function home()
	{
		$page = Input::get('page', 1);
		$perPage = 10;

		// Get 10 latest articles with pagination
		// Still get "arrayable" collection of articles
		$pagiData = $this->article->byPage($page, $perPage);

		// Pagination made here, it's not the responsibility
		// of the repository. See section on cacheing layer.
		$articles = Paginator::make(
						$pagiData->items,
						$pagiData->totalItems,
						$perPage
					);

	 	return View::make('home')->with('articles', $articles);
	}

	public function article($slug){
		return $slug;
	}	


}