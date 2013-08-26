<?php

class ContactController extends BaseController {

	public function getIndex()
	{
        $view = View::make('contact.english');

		$view->title   = 'Life window | contact us';
		$view->contact = Contact::onlyOne();

		$view->postUrl = URL::route('contact');

		$view->nest('addressWidget', 'master.address');
	
		return $view;
	}

	public function postIndex()
	{
		$data = $_POST;
		$data['created_at'] = date('Y-m-d H:i:s');

		$this->fillData( $data, array('name', 'email', 'phone', 'company', 'content', 'created_at') );

		Mail::send('emails.contact', $data, function($m)
		{
		    $m->to('a.kareem_3d@yahoo.com', 'Life window')->subject('Message from life window contact us form!');
		});
	}

	private function fillData( &$data, $keys )
	{
		foreach ($keys as $key)
		{
			if(!isset($data[$key])) {
				$data[$key] = '';
			}
		}
	}
}