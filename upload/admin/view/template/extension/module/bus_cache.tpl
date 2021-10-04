<?php echo $header; ?>
<style type="text/css">
#form-bus-app option:disabled {
    color: rgb(200 200 200);
}
</style>
<?php echo $column_left; ?>
<!-- // *   Аўтар: "БуслікДрэў" ( https://buslikdrev.by/ )
     // *   © 2016-2021; BuslikDrev - Усе правы захаваныя.
     // *   Спецыяльна для сайта: "OpenCart.pro" ( https://opencart.pro/ ) -->
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button type="button" onclick="location.href = '<?php echo $clear; ?>';" data-toggle="tooltip" title="<?php echo $button_clear; ?>" class="btn btn-default"><i class="fa fa-eraser"></i></button>
        <?php if ($clear_pwa) { ?>
        <button type="button" onclick="location.href = '<?php echo $clear_pwa; ?>';" data-toggle="tooltip" title="<?php echo $button_clear; ?> PWA" class="btn btn-primary" style="background-color:#570fc2;"><i class="fa fa-eraser"></i></button>
        <?php } ?>
        <button type="button" onclick="$('form input[name=\'apply\']').val('1'); $('#form-bus-app').submit();" data-toggle="tooltip" title="<?php echo $button_apply; ?>" class="btn btn-success"><i class="fa fa-save"></i></button>
        <button type="submit" form="form-bus-app" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
        <a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a>
      </div>
      <h1><?php echo $heading_title; ?></h1>
      <ul class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
  <div class="container-fluid">
    <?php if ($error) { ?>
    <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error; ?>
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    <?php } ?>
    <?php if ($success) { ?>
    <div class="alert alert-success"><i class="fa fa-check-circle"></i> <?php echo $success; ?>
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    <?php } ?>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $text_edit; ?></h3>
      </div>
      <div class="panel-body">
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-bus-app" class="form-horizontal">
          <input type="hidden" id="apply" name="apply" value="0">
          <legend><b><?php echo $tab_setting; ?></b></legend>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-status"><span title="<?php echo $help_status; ?>" data-toggle="tooltip"><?php echo $entry_status; ?></span></label>
            <div class="col-sm-10">
              <select name="status" id="input-status" class="form-control">
                <option value="1"<?php if ($status == 1) { ?> selected="selected"<?php } ?>><?php echo $text_enabled; ?></option>
                <option value="0"<?php if (!$status) { ?> selected="selected"<?php } ?>><?php echo $text_disabled; ?></option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label"><span title="<?php echo $help_store; ?>" data-toggle="tooltip"><?php echo $entry_store; ?></span></label>
            <div class="col-sm-10">
              <div class="well well-sm" style="height: 150px; overflow: auto;">
                <div class="checkbox">
                  <label>
                    <?php if (in_array(0, $store)) { ?>
                    <input type="checkbox" name="store[]" value="0" checked="checked" />
                    <?php echo $text_default; ?>
                    <?php } else { ?>
                    <input type="checkbox" name="store[]" value="0" />
                    <?php echo $text_default; ?>
                    <?php } ?>
                  </label>
                </div>
                <?php foreach ($stores as $store_data) { ?>
                <div class="checkbox">
                  <label>
                    <?php if (in_array($store_data['store_id'], $store)) { ?>
                    <input type="checkbox" name="store[]" value="<?php echo $store_data['store_id']; ?>" checked="checked" />
                    <?php echo $store_data['name']; ?>
                    <?php } else { ?>
                    <input type="checkbox" name="store[]" value="<?php echo $store_data['store_id']; ?>" />
                    <?php echo $store_data['name']; ?>
                    <?php } ?>
                  </label>
                </div>
                <?php } ?>
              </div>
              <a onclick="$(this).parent().find(':checkbox').prop('checked', true);"><?php echo $text_select_all; ?></a> / <a onclick="$(this).parent().find(':checkbox').prop('checked', false);"><?php echo $text_unselect_all; ?></a>
            </div>
          </div>
          <legend><b><?php echo $tab_cache; ?></b></legend>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-cache-status"><span title="<?php echo $help_cache_status; ?>" data-toggle="tooltip"><?php echo $entry_cache_status; ?></span></label>
            <div class="col-sm-10">
              <select name="cache_status" id="input-cache-status" class="form-control">
                <option value="1"<?php if ($cache_status == 1) { ?> selected="selected"<?php } ?>><?php echo $text_yes; ?></option>
                <option value="0"<?php if (!$cache_status) { ?> selected="selected"<?php } ?>><?php echo $text_no; ?></option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-cache-customer"><?php echo $entry_cache_customer; ?></label>
            <div class="col-sm-10">
              <select name="cache_customer" id="input-cache-customer" class="form-control">
                <option value="1"<?php if ($cache_customer == 1) { ?> selected="selected"<?php } ?>><?php echo $text_yes; ?></option>
                <option value="0"<?php if (!$cache_customer) { ?> selected="selected"<?php } ?>><?php echo $text_no; ?></option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-cache-oc"><span title="<?php echo $help_cache_oc; ?>" data-toggle="tooltip"><?php echo $entry_cache_oc; ?></span></label>
            <div class="col-sm-10">
              <select name="cache_oc" id="input-cache-oc" class="form-control">
                <option value="1"<?php if ($cache_oc == 1) { ?> selected="selected"<?php } ?>><?php echo $text_yes; ?></option>
                <option value="0"<?php if (!$cache_oc) { ?> selected="selected"<?php } ?>><?php echo $text_no; ?></option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-cache-engine"><span title="<?php echo $help_cache_engine; ?>" data-toggle="tooltip"><?php echo $entry_cache_engine; ?></span></label>
            <div class="col-sm-10">
              <select name="cache_engine" id="input-cache-engine" class="form-control">
                <?php foreach ($cache_engines as $engine) { ?>
                <option value="<?php echo $engine['code']; ?>"<?php if ($cache_engine == $engine['code']) { ?> selected="selected"<?php } ?><?php if (!$engine['status']) { ?> disabled="disabled"<?php } ?>><?php echo $engine['name']; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-cache-expire"><span title="<?php echo $help_cache_expire; ?>" data-toggle="tooltip"><?php echo $entry_cache_expire; ?></span></label>
            <div class="col-sm-10">
              <input type="number" name="cache_expire" value="<?php echo $cache_expire; ?>" placeholder="<?php echo $entry_cache_expire; ?>" id="input-cache-expire" class="form-control" />
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-cache-ses"><span title="<?php echo $help_cache_ses; ?>" data-toggle="tooltip"><?php echo $entry_cache_ses; ?></span></label>
            <div class="col-sm-10">
              <textarea name="cache_ses" rows="5" placeholder="<?php echo $entry_cache_ses; ?>" id="input-cache-ses" class="form-control"><?php echo $cache_ses; ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-cache-rot"><span title="<?php echo $help_cache_rot; ?>" data-toggle="tooltip"><?php echo $entry_cache_rot; ?></span></label>
            <div class="col-sm-10">
              <textarea name="cache_rot" rows="5" placeholder="<?php echo $entry_cache_rot; ?>" id="input-cache-rot" class="form-control"><?php echo $cache_rot; ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-cache-device"><span title="<?php echo $help_cache_device; ?>" data-toggle="tooltip"><?php echo $entry_cache_device; ?></span></label>
            <div class="col-sm-10">
              <select name="cache_device" id="input-cache-device" class="form-control">
                <option value="1"<?php if ($cache_device == 1) { ?> selected="selected"<?php } ?>><?php echo $text_yes; ?></option>
                <option value="0"<?php if (!$cache_device) { ?> selected="selected"<?php } ?>><?php echo $text_no; ?></option>
              </select>
            </div>
          </div>
          <legend><b><?php echo $tab_pagespeed; ?></b></legend>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-pagespeed-status"><span title="<?php echo $help_pagespeed_status; ?>" data-toggle="tooltip"><?php echo $entry_pagespeed_status; ?></span></label>
            <div class="col-sm-10">
              <select name="pagespeed_status" id="input-pagespeed-status" class="form-control">
                <option value="1"<?php if ($pagespeed_status == 1) { ?> selected="selected"<?php } ?>><?php echo $text_yes; ?></option>
                <option value="0"<?php if (!$pagespeed_status) { ?> selected="selected"<?php } ?>><?php echo $text_no; ?></option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-pagespeed-preload-logo"><span title="<?php echo $help_pagespeed_preload_logo; ?>" data-toggle="tooltip"><?php echo $entry_pagespeed_preload_logo; ?></span></label>
            <div class="col-sm-10">
              <select name="pagespeed_preload_logo" id="input-pagespeed-preload-logo" class="form-control">
                <option value="1"<?php if ($pagespeed_preload_logo == 1) { ?> selected="selected"<?php } ?>><?php echo $text_yes; ?></option>
                <option value="0"<?php if (!$pagespeed_preload_logo) { ?> selected="selected"<?php } ?>><?php echo $text_no; ?></option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-pagespeed-attribute-w-h"><span title="<?php echo $help_pagespeed_attribute_w_h; ?>" data-toggle="tooltip"><?php echo $entry_pagespeed_attribute_w_h; ?></span></label>
            <div class="col-sm-10">
              <select name="pagespeed_attribute_w_h" id="input-pagespeed-attribute-w-h" class="form-control">
                <option value="1"<?php if ($pagespeed_attribute_w_h == 1) { ?> selected="selected"<?php } ?>><?php echo $text_yes; ?></option>
                <option value="0"<?php if (!$pagespeed_attribute_w_h) { ?> selected="selected"<?php } ?>><?php echo $text_no; ?></option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-pagespeed-lazy-load"><span title="<?php echo $help_pagespeed_lazy_load; ?>" data-toggle="tooltip"><?php echo $entry_pagespeed_lazy_load; ?></span></label>
            <div class="col-sm-10">
              <select name="pagespeed_lazy_load" id="input-pagespeed-lazy-load" class="form-control">
                <option value="2"<?php if ($pagespeed_lazy_load == 2) { ?> selected="selected"<?php } ?>>bus-loading="lazy" (universal)</option>
                <option value="1"<?php if ($pagespeed_lazy_load == 1) { ?> selected="selected"<?php } ?>>loading="lazy"</option>
                <option value="0"<?php if (!$pagespeed_lazy_load) { ?> selected="selected"<?php } ?>><?php echo $text_no; ?></option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-pagespeed-html-min"><span title="<?php echo $help_pagespeed_html_min; ?>" data-toggle="tooltip"><?php echo $entry_pagespeed_html_min; ?></span></label>
            <div class="col-sm-10">
              <input type="number" name="pagespeed_html_min" value="<?php echo $pagespeed_html_min; ?>" placeholder="<?php echo $entry_pagespeed_html_min; ?>" id="input-pagespeed-html-min" class="form-control" />
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-pagespeed-css-min"><span title="<?php echo $help_pagespeed_css_min; ?>" data-toggle="tooltip"><?php echo $entry_pagespeed_css_min; ?></span></label>
            <div class="col-sm-10">
              <input type="number" name="pagespeed_css_min" value="<?php echo $pagespeed_css_min; ?>" placeholder="<?php echo $entry_pagespeed_css_min; ?>" id="input-pagespeed-css-min" class="form-control" />
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-pagespeed-css-min-links"><span title="<?php echo $help_pagespeed_css_min_links; ?>" data-toggle="tooltip"><?php echo $entry_pagespeed_css_min_links; ?></span></label>
            <div class="col-sm-10">
              <textarea name="pagespeed_css_min_links" rows="5" placeholder="<?php echo $entry_pagespeed_css_min_links; ?>" id="input-pagespeed-css-min-links" class="form-control"><?php echo $pagespeed_css_min_links; ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-pagespeed-js-min"><span title="<?php echo $help_pagespeed_js_min; ?>" data-toggle="tooltip"><?php echo $entry_pagespeed_js_min; ?></span></label>
            <div class="col-sm-10">
              <input type="number" name="pagespeed_js_min" value="<?php echo $pagespeed_js_min; ?>" placeholder="<?php echo $entry_pagespeed_js_min; ?>" id="input-pagespeed-js-min" class="form-control" />
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-pagespeed-js-min-links"><span title="<?php echo $help_pagespeed_js_min_links; ?>" data-toggle="tooltip"><?php echo $entry_pagespeed_js_min_links; ?></span></label>
            <div class="col-sm-10">
              <textarea name="pagespeed_js_min_links" rows="5" placeholder="<?php echo $entry_pagespeed_js_min_links; ?>" id="input-pagespeed-js-min-links" class="form-control"><?php echo $pagespeed_js_min_links; ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-pagespeed-rot"><span title="<?php echo $help_pagespeed_rot; ?>" data-toggle="tooltip"><?php echo $entry_pagespeed_rot; ?></span></label>
            <div class="col-sm-10">
              <textarea name="pagespeed_rot" rows="5" placeholder="<?php echo $entry_pagespeed_rot; ?>" id="input-pagespeed-rot" class="form-control"><?php echo $pagespeed_rot; ?></textarea>
            </div>
          </div>
          <legend><b><?php echo $tab_support; ?></b></legend>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-debug"><span title="<?php echo $help_debug; ?>" data-toggle="tooltip"><?php echo $entry_debug; ?></span></label>
            <div class="col-sm-10">
              <select name="debug" id="input-debug" class="form-control">
                <option value="1"<?php if ($debug == 1) { ?> selected="selected"<?php } ?>><?php echo $text_yes; ?></option>
                <option value="0"<?php if (!$debug) { ?> selected="selected"<?php } ?>><?php echo $text_no; ?></option>
              </select>
            </div>
          </div>
          <div class="text-center">
            <b><?php echo $text_author; ?><br /><?php echo $text_corp; ?></b>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript"><!--
$(document).ready(function() {
	$('select[name="cache_status"]').change(function() {
		if ($('select[name="cache_status"]').val() == 1) {
			$('select[name="cache_customer"]').removeAttr('disabled').parent().parent().fadeIn();
			$('textarea[name="cache_ses"]').parent().parent().fadeIn();
			$('textarea[name="cache_rot"]').parent().parent().fadeIn();
			$('select[name="cache_device"]').removeAttr('disabled').parent().parent().fadeIn();
		} else {
			$('select[name="cache_customer"]').attr('disabled', true).parent().parent().fadeOut(1);
			$('textarea[name="cache_ses"]').parent().parent().fadeOut(1);
			$('textarea[name="cache_rot"]').parent().parent().fadeOut(1);
			$('select[name="cache_device"]').attr('disabled', true).parent().parent().fadeOut(1);
		}
	});
	$('select[name="cache_status"]').trigger("change");

	$('select[name="pagespeed_status"]').change(function() {
		if ($('select[name="pagespeed_status"]').val() == 1) {
			$('select[name="pagespeed_preload_logo"]').removeAttr('disabled').parent().parent().fadeIn();
			$('select[name="pagespeed_attribute_w_h"]').removeAttr('disabled').parent().parent().fadeIn();
			$('select[name="pagespeed_lazy_load"]').removeAttr('disabled').parent().parent().fadeIn();
			$('input[name="pagespeed_html_min"]').removeAttr('disabled').parent().parent().fadeIn();
			$('input[name="pagespeed_css_min"]').removeAttr('disabled').parent().parent().fadeIn();
			$('textarea[name="pagespeed_css_min_links"]').parent().parent().fadeIn();
			$('input[name="pagespeed_js_min"]').removeAttr('disabled').parent().parent().fadeIn();
			$('textarea[name="pagespeed_js_min_links"]').parent().parent().fadeIn();
			$('textarea[name="pagespeed_rot"]').parent().parent().fadeIn();
		} else {
			$('select[name="pagespeed_preload_logo"]').attr('disabled', true).parent().parent().fadeOut(1);
			$('select[name="pagespeed_attribute_w_h"]').attr('disabled', true).parent().parent().fadeOut(1);
			$('select[name="pagespeed_lazy_load"]').attr('disabled', true).parent().parent().fadeOut(1);
			$('input[name="pagespeed_html_min"]').attr('disabled', true).parent().parent().fadeOut(1);
			$('input[name="pagespeed_css_min"]').attr('disabled', true).parent().parent().fadeOut(1);
			$('textarea[name="pagespeed_css_min_links"]').parent().parent().fadeOut(1);
			$('input[name="pagespeed_js_min"]').attr('disabled', true).parent().parent().fadeOut(1);
			$('textarea[name="pagespeed_js_min_links"]').parent().parent().fadeOut(1);
			$('textarea[name="pagespeed_rot"]').parent().parent().fadeOut(1);
		}
	});
	$('select[name="pagespeed_status"]').trigger("change");
});
//--></script>
<!-- // *   Аўтар: "БуслікДрэў" ( https://buslikdrev.by/ )
     // *   © 2016-2021; BuslikDrev - Усе правы захаваныя.
     // *   Спецыяльна для сайта: "OpenCart.pro" ( https://opencart.pro/ ) -->
<?php echo $footer; ?>