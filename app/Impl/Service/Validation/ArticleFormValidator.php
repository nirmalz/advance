<?php namespace Impl\Service\Validation;

use Impl\Service\Validation\AbstractLaravelValidator;

class ArticleFormValidator extends AbstractLaravelValidator {


	protected $rules = array(
					'title' => 'required',
					'user_id' => 'required|exists:users,id',
					'status_id' => 'required|exists:statuses,id',
					'excerpt' => 'required',
					'content' => 'required',
					'tags' => 'required',
					);

	protected $messages = array(
					'user_id.exists' => 'That user does not exist',
					'status_id.exists' => 'That status does not exist',
					);	


}