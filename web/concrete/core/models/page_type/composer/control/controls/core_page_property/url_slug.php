<?php defined('C5_EXECUTE') or die("Access Denied.");

class Concrete5_Model_UrlSlugCorePagePropertyPageTypeComposerControl extends CorePagePropertyPageTypeComposerControl {
	
	public function __construct() {
		$this->setCorePagePropertyHandle('url_slug');
		$this->setPageTypeComposerControlName(t('URL Slug'));
		$this->setPageTypeComposerControlIconSRC(ASSETS_URL . '/models/attribute/types/text/icon.png');
	}

	public function publishToPage(PageDraft $d, $data, $controls) {
		$this->addPageTypeComposerControlRequestValue('cHandle', $data['url_slug']);
		parent::publishToPage($d, $data, $controls);
	}

	public function validate($data, ValidationErrorHelper $e) {
		$vt = Loader::helper('validation/strings');
		if (!($vt->notempty($data['url_slug']))) {
			$e->add(t('You must specify a URL slug.'));
		}
	}

	public function getPageTypeComposerControlDraftValue() {
		if (is_object($this->pDraftObject)) {
			$c = $this->pDraftObject->getPageDraftCollectionObject();
			return $c->getCollectionHandle();
		}
	}
	


}