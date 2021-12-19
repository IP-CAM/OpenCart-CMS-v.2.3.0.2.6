<?php echo $header; ?>
<style type="text/css">
#form-bus-app option:disabled {
    color: rgb(200 200 200);
}
.tooltip {
    font-size: 12px;
}
.tooltip-inner {
    max-width: 300px;
    padding: 3px 8px;
    color: #fff;
    text-align: center;
    background-color: #000;
    border-radius: 3px;
}
</style>
<?php echo $column_left; ?>
<!-- // *   Аўтар: "БуслікДрэў" ( https://buslikdrev.by/ )
     // *   © 2016-2022; BuslikDrev - Усе правы захаваныя.
     // *   Спецыяльна для сайта: "OpenCart.pro" ( https://opencart.pro/ ) -->
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button type="button" onclick="location.href = '<?php echo $clear; ?>';" data-toggle="tooltip" title="<?php echo $button_clear; ?>" class="btn btn-default"><i class="fa fa-eraser"></i></button>
        <button type="button" onclick="location.href = '<?php echo $clear_minify; ?>';" data-toggle="tooltip" title="<?php echo $button_clear; ?> CSS, JS" class="btn btn-warning"><i class="fa fa-eraser"></i></button>
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
            <label class="col-sm-2 control-label" for="input-cache-ses"><span title="<?php echo $help_cache_ses; ?>" data-toggle="tooltip"><?php echo $entry_cache_ses; ?></span></label>
            <div class="col-sm-10">
              <textarea name="cache_ses" rows="5" placeholder="<?php echo $entry_cache_ses; ?>" id="input-cache-ses" class="form-control"><?php echo $cache_ses; ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-cache-onrot"><span title="<?php echo $help_cache_onrot; ?>" data-toggle="tooltip"><?php echo $entry_cache_onrot; ?></span></label>
            <div class="col-sm-10">
              <textarea name="cache_onrot" rows="5" placeholder="<?php echo $entry_cache_onrot; ?>" id="input-cache-onrot" class="form-control"><?php echo $cache_onrot; ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-cache-rot"><span title="<?php echo $help_cache_rot; ?>" data-toggle="tooltip"><?php echo $entry_cache_rot; ?></span></label>
            <div class="col-sm-10">
              <textarea name="cache_rot" rows="5" placeholder="<?php echo $entry_cache_rot; ?>" id="input-cache-rot" class="form-control"><?php echo $cache_rot; ?></textarea>
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
            <label class="col-sm-2 control-label" for="input-pagespeed-rot"><span title="<?php echo $help_pagespeed_rot; ?>" data-toggle="tooltip"><?php echo $entry_pagespeed_rot; ?></span></label>
            <div class="col-sm-10">
              <textarea name="pagespeed_rot" rows="5" placeholder="<?php echo $entry_cache_rot; ?>" id="input-pagespeed-rot" class="form-control"><?php echo $pagespeed_rot; ?></textarea>
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
            <label class="col-sm-2 control-label" for="input-pagespeed-replace"><span title="<?php echo $help_pagespeed_replace; ?>" data-toggle="tooltip"><?php echo $entry_pagespeed_replace; ?></span></label>
            <div class="col-sm-10">
              <textarea name="pagespeed_replace" rows="10" placeholder="<?php echo $entry_pagespeed_replace; ?>" id="input-pagespeed-replaces" class="form-control"><?php echo $pagespeed_replace; ?></textarea>
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
              Чтобы отложить по взаимодействию, после ссылки установить "|after"
              <textarea name="pagespeed_css_min_links" rows="10" placeholder="<?php echo $entry_pagespeed_css_min_links; ?>" id="input-pagespeed-css-min-links" class="form-control"><?php echo $pagespeed_css_min_links; ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-pagespeed-css-min-download"><span title="<?php echo $help_pagespeed_css_min_download; ?>" data-toggle="tooltip"><?php echo $entry_pagespeed_css_min_download; ?></span></label>
            <div class="col-sm-10">
              <textarea name="pagespeed_css_min_download" rows="5" placeholder="<?php echo $entry_pagespeed_css_min_download; ?>" id="input-pagespeed-css-min-download" class="form-control"><?php echo $pagespeed_css_min_download; ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-pagespeed-css-min-exception"><span title="<?php echo $help_pagespeed_css_min_exception; ?>" data-toggle="tooltip"><?php echo $entry_pagespeed_css_min_exception; ?></span></label>
            <div class="col-sm-10">
              Чтобы отложить по взаимодействию, после ссылки установить "|after"
              <textarea name="pagespeed_css_min_exception" rows="10" placeholder="<?php echo $entry_pagespeed_css_min_exception; ?>" id="input-pagespeed-css-min-exception" class="form-control"><?php echo $pagespeed_css_min_exception; ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-pagespeed-css-min-font"><span title="<?php echo $help_pagespeed_css_min_font; ?>" data-toggle="tooltip"><?php echo $entry_pagespeed_css_min_font; ?></span></label>
            <div class="col-sm-10">
              <textarea name="pagespeed_css_min_font" rows="10" placeholder="<?php echo $entry_pagespeed_css_min_font; ?>" id="input-pagespeed-css-min-font" class="form-control"><?php echo $pagespeed_css_min_font; ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-pagespeed-css-min-display"><span title="<?php echo $help_pagespeed_css_min_display; ?>" data-toggle="tooltip"><?php echo $entry_pagespeed_css_min_display; ?></span></label>
            <div class="col-sm-10">
              <select name="pagespeed_css_min_display" id="input-pagespeed-css-min-display" class="form-control">
                <option value="auto"<?php if ($pagespeed_css_min_display == 'auto') { ?> selected="selected"<?php } ?>>auto</option>
                <option value="block"<?php if ($pagespeed_css_min_display == 'block') { ?> selected="selected"<?php } ?>>block</option>
                <option value="swap"<?php if ($pagespeed_css_min_display == 'swap') { ?> selected="selected"<?php } ?>>swap</option>
                <option value="fallback"<?php if ($pagespeed_css_min_display == 'fallback') { ?> selected="selected"<?php } ?>>fallback</option>
                <option value="optional"<?php if ($pagespeed_css_min_display == 'optional') { ?> selected="selected"<?php } ?>>optional</option>
                <option value="0"<?php if (!$pagespeed_css_min_display) { ?> selected="selected"<?php } ?>><?php echo $text_no; ?></option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-pagespeed-css-inline-transfer"><span title="<?php echo $help_pagespeed_css_inline_transfer; ?>" data-toggle="tooltip"><?php echo $entry_pagespeed_css_inline_transfer; ?></span></label>
            <div class="col-sm-10">
              <select name="pagespeed_css_inline_transfer" id="input-pagespeed-css-inline-transfer" class="form-control">
                <option value="0"<?php if (!$pagespeed_css_inline_transfer) { ?> selected="selected"<?php } ?>><?php echo $text_no; ?></option>
                <option value="1"<?php if ($pagespeed_css_inline_transfer == 1) { ?> selected="selected"<?php } ?>><?php echo $text_pagespeed_inline_transfer_1; ?></option>
                <option value="2"<?php if ($pagespeed_css_inline_transfer == 2) { ?> selected="selected"<?php } ?>><?php echo $text_pagespeed_inline_transfer_2; ?></option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-pagespeed-css-style"><span title="<?php echo $help_pagespeed_css_style; ?>" data-toggle="tooltip"><?php echo $entry_pagespeed_css_style; ?></span></label>
            <div class="col-sm-10">
              <textarea name="pagespeed_css_style" rows="10" placeholder="<?php echo $entry_pagespeed_css_style; ?>" id="input-pagespeed-css-style" class="form-control"><?php echo $pagespeed_css_style; ?></textarea>
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
              Чтобы отложить по взаимодействию, после ссылки установить "|after"
              <textarea name="pagespeed_js_min_links" rows="10" placeholder="<?php echo $entry_pagespeed_js_min_links; ?>" id="input-pagespeed-js-min-links" class="form-control"><?php echo $pagespeed_js_min_links; ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-pagespeed-js-min-download"><span title="<?php echo $help_pagespeed_js_min_download; ?>" data-toggle="tooltip"><?php echo $entry_pagespeed_js_min_download; ?></span></label>
            <div class="col-sm-10">
              <textarea name="pagespeed_js_min_download" rows="5" placeholder="<?php echo $entry_pagespeed_js_min_download; ?>" id="input-pagespeed-js-min-download" class="form-control"><?php echo $pagespeed_js_min_download; ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-pagespeed-js-min-exception"><span title="<?php echo $help_pagespeed_js_min_exception; ?>" data-toggle="tooltip"><?php echo $entry_pagespeed_js_min_exception; ?></span></label>
            <div class="col-sm-10">
              Чтобы отложить по взаимодействию, после ссылки установить "|after"
              <textarea name="pagespeed_js_min_exception" rows="10" placeholder="<?php echo $entry_pagespeed_js_min_exception; ?>" id="input-pagespeed-js-min-exception" class="form-control"><?php echo $pagespeed_js_min_exception; ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-pagespeed-js-inline-event"><span title="<?php echo $help_pagespeed_js_inline_event; ?>" data-toggle="tooltip"><?php echo $entry_pagespeed_js_inline_event; ?></span></label>
            <div class="col-sm-10">
              <textarea name="pagespeed_js_inline_event" rows="10" placeholder="<?php echo $entry_pagespeed_js_inline_event; ?>" id="input-pagespeed-js-inline-event" class="form-control"><?php echo $pagespeed_js_inline_event; ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-pagespeed-js-inline-event-time"><span title="<?php echo $help_pagespeed_js_inline_event_time; ?>" data-toggle="tooltip"><?php echo $entry_pagespeed_js_inline_event_time; ?></span></label>
            <div class="col-sm-10">
              <input type="number" name="pagespeed_js_inline_event_time" value="<?php echo $pagespeed_js_inline_event_time; ?>" placeholder="<?php echo $entry_pagespeed_js_inline_event_time; ?>" id="input-pagespeed-js-inline-event-time" class="form-control" />
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-pagespeed-js-inline-transfer"><span title="<?php echo $help_pagespeed_js_inline_transfer; ?>" data-toggle="tooltip"><?php echo $entry_pagespeed_js_inline_transfer; ?></span></label>
            <div class="col-sm-10">
              <select name="pagespeed_js_inline_transfer" id="input-pagespeed-js-inline-transfer" class="form-control">
                <option value="0"<?php if (!$pagespeed_js_inline_transfer) { ?> selected="selected"<?php } ?>><?php echo $text_no; ?></option>
                <option value="1"<?php if ($pagespeed_js_inline_transfer == 1) { ?> selected="selected"<?php } ?>><?php echo $text_pagespeed_inline_transfer_1; ?></option>
                <option value="2"<?php if ($pagespeed_js_inline_transfer == 2) { ?> selected="selected"<?php } ?>><?php echo $text_pagespeed_inline_transfer_2; ?></option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-pagespeed-js-events"><span title="<?php echo $help_pagespeed_js_events; ?>" data-toggle="tooltip"><?php echo $entry_pagespeed_js_events; ?></span></label>
            <div class="col-sm-10">
              <textarea name="pagespeed_js_events" rows="5" placeholder="<?php echo $entry_pagespeed_js_events; ?>" id="input-pagespeed-js-events" class="form-control"><?php echo $pagespeed_js_events; ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-pagespeed-js-script"><span title="<?php echo $help_pagespeed_js_script; ?>" data-toggle="tooltip"><?php echo $entry_pagespeed_js_script; ?></span></label>
            <div class="col-sm-10">
              <textarea name="pagespeed_js_script" rows="10" placeholder="<?php echo $entry_pagespeed_js_script; ?>" id="input-pagespeed-js-script" class="form-control"><?php echo $pagespeed_js_script; ?></textarea>
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
			$('textarea[name="cache_ses"]').parent().parent().fadeIn();
			$('textarea[name="cache_onrot"]').parent().parent().fadeIn();
			$('textarea[name="cache_rot"]').parent().parent().fadeIn();
			$('select[name="cache_customer"]').removeAttr('disabled').parent().parent().fadeIn();
			$('select[name="cache_device"]').removeAttr('disabled').parent().parent().fadeIn();
		} else {
			$('textarea[name="cache_ses"]').parent().parent().fadeOut(1);
			$('textarea[name="cache_onrot"]').parent().parent().fadeOut(1);
			$('textarea[name="cache_rot"]').parent().parent().fadeOut(1);
			$('select[name="cache_customer"]').attr('disabled', true).parent().parent().fadeOut(1);
			$('select[name="cache_device"]').attr('disabled', true).parent().parent().fadeOut(1);
		}
	});
	$('select[name="cache_status"]').trigger("change");

	$('select[name="pagespeed_status"]').change(function() {
		if ($('select[name="pagespeed_status"]').val() == 1) {
			$('textarea[name="pagespeed_rot"]').parent().parent().fadeIn();
			$('select[name="pagespeed_preload_logo"]').parent().parent().fadeIn();
			$('select[name="pagespeed_attribute_w_h"]').parent().parent().fadeIn();
			$('select[name="pagespeed_lazy_load"]').parent().parent().fadeIn();
			$('textarea[name="pagespeed_replace"]').parent().parent().fadeIn();
			$('input[name="pagespeed_html_min"]').parent().parent().fadeIn();
			$('input[name="pagespeed_css_min"]').parent().parent().fadeIn();
			$('textarea[name="pagespeed_css_min_links"]').parent().parent().fadeIn();
			$('textarea[name="pagespeed_css_min_download"]').parent().parent().fadeIn();
			$('textarea[name="pagespeed_css_min_exception"]').parent().parent().fadeIn();
			$('textarea[name="pagespeed_css_min_font"]').parent().parent().fadeIn();
			$('select[name="pagespeed_css_min_display"]').parent().parent().fadeIn();
			$('select[name="pagespeed_css_critical"]').parent().parent().fadeIn();
			$('select[name="pagespeed_css_inline_transfer"]').parent().parent().fadeIn();
			$('textarea[name^="pagespeed_css_events"]').parent().parent().fadeIn();
			$('textarea[name="pagespeed_css_style"]').parent().parent().fadeIn();
			$('input[name="pagespeed_js_min"]').parent().parent().fadeIn();
			$('textarea[name="pagespeed_js_min_links"]').parent().parent().fadeIn();
			$('textarea[name="pagespeed_js_min_download"]').parent().parent().fadeIn();
			$('textarea[name="pagespeed_js_min_exception"]').parent().parent().fadeIn();
			$('textarea[name="pagespeed_js_inline_event"]').parent().parent().fadeIn();
			$('input[name="pagespeed_js_inline_event_time"]').parent().parent().fadeIn();
			$('select[name="pagespeed_js_inline_transfer"]').parent().parent().fadeIn();
			$('textarea[name^="pagespeed_js_events"]').parent().parent().fadeIn();
			$('textarea[name="pagespeed_js_script"]').parent().parent().fadeIn();
		} else {
			$('textarea[name="pagespeed_rot"]').parent().parent().fadeOut(1);
			$('select[name="pagespeed_preload_logo"]').parent().parent().fadeOut(1);
			$('select[name="pagespeed_attribute_w_h"]').parent().parent().fadeOut(1);
			$('select[name="pagespeed_lazy_load"]').parent().parent().fadeOut(1);
			$('textarea[name="pagespeed_replace"]').parent().parent().fadeOut(1);
			$('input[name="pagespeed_html_min"]').parent().parent().fadeOut(1);
			$('input[name="pagespeed_css_min"]').parent().parent().fadeOut(1);
			$('textarea[name="pagespeed_css_min_links"]').parent().parent().fadeOut(1);
			$('textarea[name="pagespeed_css_min_download"]').parent().parent().fadeOut(1);
			$('textarea[name="pagespeed_css_min_exception"]').parent().parent().fadeOut(1);
			$('textarea[name="pagespeed_css_min_font"]').parent().parent().fadeOut(1);
			$('select[name="pagespeed_css_min_display"]').parent().parent().fadeOut(1);
			$('select[name="pagespeed_css_critical"]').parent().parent().fadeOut(1);
			$('select[name="pagespeed_css_inline_transfer"]').parent().parent().fadeOut(1);
			$('textarea[name^="pagespeed_css_events"]').parent().parent().fadeOut(1);
			$('textarea[name="pagespeed_css_style"]').parent().parent().fadeOut(1);
			$('input[name="pagespeed_js_min"]').parent().parent().fadeOut(1);
			$('textarea[name="pagespeed_js_min_links"]').parent().parent().fadeOut(1);
			$('textarea[name="pagespeed_js_min_download"]').parent().parent().fadeOut(1);
			$('textarea[name="pagespeed_js_min_exception"]').parent().parent().fadeOut(1);
			$('textarea[name="pagespeed_js_inline_event"]').parent().parent().fadeOut(1);
			$('input[name="pagespeed_js_inline_event_time"]').parent().parent().fadeOut(1);
			$('select[name="pagespeed_js_inline_transfer"]').parent().parent().fadeOut(1);
			$('textarea[name^="pagespeed_js_events"]').parent().parent().fadeOut(1);
			$('textarea[name="pagespeed_js_script"]').parent().parent().fadeOut(1);
		}
	});
	$('select[name="pagespeed_status"]').trigger("change");
});
//--></script>
<!-- // *   Аўтар: "БуслікДрэў" ( https://buslikdrev.by/ )
     // *   © 2016-2022; BuslikDrev - Усе правы захаваныя.
     // *   Спецыяльна для сайта: "OpenCart.pro" ( https://opencart.pro/ ) -->
<?php echo $footer; ?>