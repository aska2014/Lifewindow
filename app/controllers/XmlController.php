<?php

class XmlController extends BaseController {

	/**
	 * Get the service as an xml file
	 *
	 * @return void 
	 */
	public function services()
	{
		$xml = chr(60).chr(63)."xml version='1.0' encoding='utf-8' ".chr(63).chr(62);

		$xml .= '<main>';

		$xml .= $this->sliderXml();

		$xml .= $this->itemsXml( Service::getByType( SERVICE::SERVICE, 9 ) );

		$xml .= '</main>';

		return Response::make($xml, 200, array('Content-type' => 'text/xml'));
	}

	/**
	 * Get the project as an xml file
	 *
	 * @return void 
	 */
	public function projects()
	{
		$xml = chr(60).chr(63)."xml version='1.0' encoding='utf-8' ".chr(63).chr(62);

		$xml .= '<main>';

		$xml .= $this->sliderXml();

		$xml .= $this->itemsXml( Project::latest(9) );

		$xml .= '</main>';

		return Response::make($xml, 200, array('Content-type' => 'text/xml'));
	}

	protected function itemsXml( $projects )
	{
		$xml  = '<items>';

		foreach ($projects as $project)
		{
			$type = strtolower(get_class( $project ));

			if($image = $project->getRotatorImage())
			{
				$xml .= '<item>';
				$xml .= '<title>' . $project->getTitle()     . '</title>';
				$xml .= '<link>'  . URL::$type($project)   . '</link>';
				$xml .= '<image>' . $project->getRotatorImage()->getSource() . '</image>';
				$xml .= '</item>';
			}
		}

		$xml .= '</items>';

		return $xml;
	}

	/**
	 * Slider xml
	 *
	 * @return string
	 */
	protected function sliderXml()
	{
		$xml  = '<slider>';
		$xml .= '<radius>250</radius>';
		$xml .= '<speed>10</speed>';
		$xml .= '<zoom></zoom>';
		$xml .= '</slider>';

		return $xml;
	}
}