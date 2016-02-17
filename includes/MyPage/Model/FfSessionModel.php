<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/src/Sessions/SegmentFactory.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/src/Sessions/SessionFactory.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/src/Sessions/Phpfunc.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/src/Sessions/CsrfToken.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/src/Sessions/CsrfTokenFactory.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/src/Sessions/Exception.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/src/Sessions/RandvalInterface.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/src/Sessions/Randval.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/src/Sessions/SegmentInterface.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/src/Sessions/Segment.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/src/Sessions/Session.php';


class FpSessionModel {
	private $sessionFactory = null;
	private $session = null;

	const SEGMENT_ROOT = 'FarmPortal';


	public function __construct()
	{
		$this->factory = new Aura\Session\SessionFactory;
		$this->session = $this->factory->newInstance($_COOKIE);
	}

	public function setValue($segment, $key, $value)
	{
		$segmentName = SEGMENT_ROOT.$segment;
		$segment = $this->session->getSegment($segmentName);
		$segment->set($key, $value);
	}

	public function getValue($segment, $key, $notSetMsg = null)
	{
		$segmentName = SEGMENT_ROOT.$segment;
		$segment = $this->session->getSegment($segmentName);
		return $segment->get($key, $notSetMsg);
	}

	public function setCookieLife($seconds)
	{
		$this->session->setCookieParams(array("lifetime" => $seconds));
	}

	public function commit()
	{
		$this->session->commit();
	}

	public function clear()
	{
		$this->session->clear();
	}

	public function destroy()
	{
		$this->session->destroy();
	}

	public function regenerateId()
	{
		$this->session->regenerateId();
	}

	public function setFlash($segment, $key, $value)
	{
		$segmentName = SEGMENT_ROOT.$segment;
		$segment = $this->session->getSegment($segmentName);
		$segment->setFlash($key, $value);
	}

	public function setFlashNow($segment, $key, $value)
	{
		$segmentName = SEGMENT_ROOT.$segment;
		$segment = $this->session->getSegment($segmentName);
		$segment->setFlashNow($key, $value);
	}

	public function getFlash($segment, $key, $notSetMsg = null)
	{
		$segmentName = SEGMENT_ROOT.$segment;
		$segment = $this->session->getSegment($segmentName);
		$segment->getFlash($key, $notSetMsg);
	}

	public function getFlashNext($segment, $key, $notSetMsg = null)
	{
		$segmentName = SEGMENT_ROOT.$segment;
		$segment = $this->session->getSegment($segmentName);
		$segment->getFlashNext($key, $notSetMsg);
	}

	public function keepSegmentFlash($segment)
	{
		$segmentName = SEGMENT_ROOT.$segment;
		$segment = $this->session->getSegment($segmentName);
		$segment->keepFlash();
	}

	public function keepSessionFlash()
	{
		$this->session->keepFlash();
	}

	public function clearSegmentFlash($segment)
	{
		$segmentName = SEGMENT_ROOT.$segment;
		$segment = $this->session->getSegment($segmentName);
		$segment->clearFlash();
	}
}
