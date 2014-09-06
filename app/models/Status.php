<?php
class Status extends Eloquent{

	protected $table = 'statuses';

	protected $fillable = array(
        'status',
        'slug',
    );

}