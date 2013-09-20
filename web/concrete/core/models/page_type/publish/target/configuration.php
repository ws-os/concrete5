<?
defined('C5_EXECUTE') or die("Access Denied.");
class Concrete5_Model_PageTypePublishTargetConfiguration extends Object {

	public function getPageTypePublishTargetTypeID() {return $this->ptPublishTargetTypeID;}
	public function getPageTypePublishTargetTypeHandle() {return $this->ptPublishTargetTypeHandle;}

	public function __construct(PageTypePublishTargetType $type) {
		$this->ptPublishTargetTypeID = $type->getPageTypePublishTargetTypeID();
		$this->ptPublishTargetTypeHandle = $type->getPageTypePublishTargetTypeHandle();
		$this->pkgHandle = $type->getPackageHandle();
	}

	public function export($cxml) {
		$target = $cxml->addChild('target');
		$target->addAttribute('handle', $this->getPageTypePublishTargetTypeHandle());
		$target->addAttribute('package', $this->pkgHandle);
		return $target;
	}


	public function includeChooseTargetForm($pagetype = false, $draft = false) {
		Loader::element(DIRNAME_PAGE_TYPES . '/' . DIRNAME_ELEMENTS_PAGE_TYPES_PUBLISH_TARGET_TYPES . '/' . DIRNAME_ELEMENTS_PAGE_TYPES_PUBLISH_TARGET_TYPES_FORM . '/' . $this->getPageTypePublishTargetTypeHandle(), array('draft' => $draft, 'pagetype' => $pagetyp), $this->pkgHandle);
	}

	public function getPageTypePublishTargetConfiguredTargetParentPageID() {
		return 0;
	}
	
}
