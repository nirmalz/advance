<?php

use Impl\Service\Validation\ArticleFormValidator;

class ArticleController extends BaseController {

	protected $validator;

	public function __construct(ArticleFormValidator $validator)
	{
		$this->validator = $validator;
	}

	public function create()
	{
		return View::make('admin.article_create', array(
						'input' => Input::old()
						));
	}

	public function store()
	{
		if( $this->validator->with( Input::all() )->passes() )
		{
			// FORM PROCESSING
			return 'Form Processed !';
		} else {
			return View::make('admin.article_create')
				->withInput( Input::all() )
				->withErrors($this->validator->errors());
		}
	}			

}