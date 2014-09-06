<?php namespace Impl\Repo;

use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider{

	public function register()
	{
		// $this->app->bind('Impl\Repo\Tag\TagInterface', function($app)
		// {
		// 	return new EloquentTag( new Tag );
		// });

		// $this->app->bind('Impl\Repo\Article\ArticleInterface', function($app)
		// {
		// 	return new EloquentArticle(
		// 				new Article,
		// 				$app->make('Impl\Repo\Tag\TagInterface')
		// 				);
		// });

		 $this->one();
		 $this->two();


		
	}

	public function one(){
		$this->app->bind('Impl\Repo\Tag\TagInterface', 'Impl\Repo\Tag\EloquentTag');
	}

	public function two(){
		return $this->app->bind('Impl\Repo\Article\ArticleInterface', 'Impl\Repo\Article\EloquentArticle');
	}


}