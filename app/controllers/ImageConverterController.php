<?php

class ImageConverterController extends BaseController {

	public function services()
	{
		$services = Service::all();

		$this->convert($services, array(940, 463), array(436,273));
	}

	public function projects()
	{
		$projects = Project::all();

		$this->convert($projects, array(940, 463), array(436,273));
	}

	public function sliders()
	{
		$sliders = Slider::all();

		$this->convert($sliders, array(620, 305), array(712, 351));
	}

	private function convert( $models , $from, $to )
	{
		foreach ($models as $model)
		{
			foreach($model->getImages($from[0], $from[1]) as $image)
			{
				# first convert to absolute path
				$image = str_replace(URL::to(''), public_path(), $image->getSource());

				$directory = public_path() . '/albums/'. Str::plural(strtolower(get_class( $model ))) .'/' . implode('x', $to);

				if(!file_exists($directory)) mkdir($directory);

				$destination = $directory . '/' . basename($image);

				$mm = ImageHandler::make( $image );

				$mm->grab($to[0], $to[1]);

				$mm->save( $destination );
			}
		}
	}
}