<?php

class SocialSharingURLGenerator {

	private $sUrl;
	private $sTitle;

	public function __construct($sUrl, $sTitle) {
		$this->sUrl = urlencode($sUrl);
		$this->sTitle = $sTitle;
	}

	public function generateTwitterUrl($sTwitterVia, $sHashtag = '') {
		$sUrl = "https://twitter.com/intent/tweet?url=".$this->sUrl;
		$sUrl .="&text={$this->sTitle}&via={$sTwitterVia}";
		if (!empty($sHashtag)) {
			$sUrl .= "&hashtags={$sHashtag}";
		}

		return $sUrl;
	}

	public function generateWhatsAppUrl() {
		return "whatsapp://send?text=".urlencode($this->sTitle.": ").$this->sUrl;
	}

	public function generateFacebookUrl($sImage, $sDesc='') {
		$sUrl = "https://www.facebook.com/sharer.php?s=100&p[url]={$this->sUrl}&p[images][0]={$sImage}";
		$sUrl .= "&p[title]={$this->sTitle}&p[summary]={$sDesc}";
		return $sUrl;
	}

	public function generateGooglePlusUrl() {
		return "https://plus.google.com/share?url=".$this->sUrl;
	}
}
