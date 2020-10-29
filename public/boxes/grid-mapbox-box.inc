<?php

class grid_mapbox_box extends grid_static_base_box
{
	public function __construct()
	{
		parent::__construct();
		$this->content->coordinates = new StdClass();
		$this->content->coordinates->lat = "";
		$this->content->coordinates->lng = "";
	}

	public function type()
	{
		return 'mapbox';
	}

	public function build($editmode) {
		return $this->content;
	}

	public function contentStructure() {
		$cs = array();
		$cs[] = array(
			'key' => 'coordinates',
			'label'=>t('Lat & long'),
			'type'=>'coordinates',
		);
		$cs[] = array(
			"key" => "title",
			"label" => t("Title"),
			"type" => 'text'
		);
		$cs[] = array(
			'key' => 'address',
			'label' => t("Address"),
			"type" => "text",
		);
		return $cs;
	}

}