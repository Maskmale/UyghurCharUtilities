<?php

/**
 * Extend Uyghur characters Class for the mobile wap pages
 *
 * @author Alim Boyaq<boyaq@otkur.biz>
 * @version 1.0.2
 * @link 
 * @license http://opensource.org/licenses/mit-license.php MIT License
 */


class ExtendUyghurCharacters
{
	/**
	 * devices that not support uyghur language by default
	 *
	 * @var array
	 **/
	private $devices;

	/**
	 * systems that not support uyghur language by default
	 *
	 * @var array
	 **/
	private $systems;

	/**
	 * browsers that not support uyghur language by default
	 *
	 * @var array
	 **/
	private $browsers;

	/**
	 * user agent of the client
	 *
	 * @var string
	 **/
	private $ua;


	private static $instance;

	public static function getInstance()
	{
		if (null === static::$instance) {
			static::$instance = new static();
		}

		return static::$instance;
	}


	protected function __construct()
	{

		$this->devices = require_once(dirname(__FILE__) . "/config/devices.php");
		$this->systems = require_once(dirname(__FILE__) . "/config/systems.php");
		$this->browsers = require_once(dirname(__FILE__) . "/config/browsers.php");

	}

	private function __clone()
	{
	}

	private function __wakeup()
	{
	}



	public function getExtendedMessage($text){
		$this->ua  = $_SERVER['HTTP_USER_AGENT'];
		if( $this->isUnsupportedBrowser() || $this->isUnsupportedSystem() || $this->isUnsupportedDevice() ){
			$text = $this->replaceSymbles($text);
			$uyghurCharUtilities = new UyghurCharUtilities();
			return $uyghurCharUtilities->getUyPFStr($text);
		}

		return $text;



		
	}

	public function replaceSymbles($text){
		if(empty($text)) return $text;
		$text = preg_replace("/،/", ", ", $text);
		$text = preg_replace("/ـ/", "", $text);
		$text = preg_replace("/؟/", "?", $text);
		$text = preg_replace("/؛/", ";", $text);
		$text = preg_replace("/»/", ">>", $text);
		$text = preg_replace("/«/", "<<", $text);
		$text = preg_replace("/&amp;nbsp;/",' ', $text);
		return $text;
	}

	protected function isUnsupportedBrowser(){
		foreach($this->browsers as $browserUA){
			if(strpos($this->ua, $browserUA) !== false){
				return true;
			}
		}

		return false;
	}

	protected function isUnsupportedSystem(){
		foreach($this->systems as $systemUA){
			if(strpos($this->ua, $systemUA) !== false){
				return true;
			}
		}

		return false;
	}

	protected function isUnsupportedDevice(){
		foreach($this->devices as $deviceUA){
			if(strpos($this->ua, $deviceUA) !== false){
				return true;
			}
		}

		return false;
	}

}