<? defined('C5_EXECUTE') or die(_("Access Denied.")); ?>
<? $f = Loader::helper('form'); ?>
<? $co = Loader::helper('lists/countries'); ?>
<?=$der?>
<fieldset class="ccm-attribute-address-<?=$key->getAttributeKeyID()?>">
<div class="ccm-attribute-address-line">
<?=$f->label($this->field('address1'), t('Address 1'))?>
<?=$f->text($this->field('address1'), $address1)?>
</div>
<div class="ccm-attribute-address-line">
<?=$f->label($this->field('address2'), t('Address 2'))?>
<?=$f->text($this->field('address2'), $address2)?>
</div>
<div class="ccm-attribute-address-line">
<?=$f->label($this->field('city'), t('City'))?>
<?=$f->text($this->field('city'), $city)?>
</div>

<div class="ccm-attribute-address-line ccm-attribute-address-state-province">
<?=$f->label($this->field('state_province'), t('State/Province'))?>
<?
$spreq = $f->getRequestValue($this->field('state_province'));
if ($spreq != false) {
	$state_province = $spreq;
}
$creq = $f->getRequestValue($this->field('country'));
if ($creq != false) {
	$country = $creq;
}

?>
<?=$f->select($this->field('state_province_select'), array('' => t('Choose State/Province')), $state_province, array('ccm-attribute-address-field-name' => $this->field('state_province')))?>
<?=$f->text($this->field('state_province_text'), $state_province, array('style' => 'display: none', 'ccm-attribute-address-field-name' => $this->field('state_province')))?>
</div>
<? if (!$country && !$search) {
	$country = 'US';
} 

$countries = array_merge(array('' => t('Choose Country')), $co->getCountries());
?>

<div class="ccm-attribute-address-line ccm-attribute-address-country">
<?=$f->label($this->field('country'), t('Country'), $country)?>
<?=$f->select($this->field('country'), $countries, $country); ?>
</div>

<div class="ccm-attribute-address-line">
<?=$f->label($this->field('postal_code'), t('Postal Code'))?>
<?=$f->text($this->field('postal_code'), $postal_code)?>
</div>

</fieldset>

<script type="text/javascript">
$(function() {
	ccm_setupAttributeTypeAddressSetupStateProvinceSelector('ccm-attribute-address-<?=$key->getAttributeKeyID()?>');
});
</script>