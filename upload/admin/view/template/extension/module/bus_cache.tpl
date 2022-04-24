<?php echo $header; ?>
<style type="text/css">
#form-bus-app option:disabled {color:rgb(200 200 200);}
.tooltip {font-size:12px;}
.tooltip-inner {max-width:300px;padding:3px 8px;color:#fff;text-align:center;background-color:#000;border-radius:3px;}
.scroll-top-wrapper {position:fixed;opacity:0;text-align:center;z-index:9998;background-color:#777;color:#fefefe;width:40px;height:40px;line-height:40px;right:10px;bottom:30px;border-radius:4px;-webkit-transition:all 0.3s ease-in-out;-moz-transition:all 0.3s ease-in-out;-ms-transition:all 0.3s ease-in-out;-o-transition:all 0.3s ease-in-out;transition:all 0.3s ease-in-out;}
.scroll-top-wrapper i.fa {line-height:inherit;font-size:18px;}
.scroll-top-wrapper.show {cursor:pointer;opacity:0.6;right:15px;bottom:80px;}
.loading{position:relative;width:100%;height:200px;text-align:center;margin-top:15%;z-index:1}
.loading svg{width:50px;height:50px}
.loading svg .gear-one, .loading svg .gear-two{-webkit-animation:spin-me-right-round-baby 4s infinite linear forwards;animation:spin-me-right-round-baby 4s infinite linear forwards;-webkit-animation-play-state:running;animation-play-state:running}
.loading svg .gear-one{-webkit-transform-origin:33.505px 67.195px 0;transform-origin:33.505px 67.195px 0}
.loading svg .gear-two{-webkit-transform-origin:69.35px 29.93px 0;transform-origin:69.35px 29.93px 0;animation-direction:reverse}
.loading svg:hover .gear-one, .loading svg:hover .gear-two{-webkit-animation-play-state:paused;animation-play-state:paused}
@-webkit-keyframes spin-me-right-round-baby {to{-webkit-transform:rotate(360deg);transform:rotate(360deg)}}
@keyframes spin-me-right-round-baby {to{-webkit-transform:rotate(360deg);transform:rotate(360deg)}}
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
                <option value="2"<?php if ($cache_status == 2) { ?> selected="selected"<?php } ?>><?php echo $text_yes; ?>, если не кэшируются контроллеры и модели (у платнай версіі)</option>
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
            <label class="col-sm-2 control-label" for="input-cache-onrot"><b style="color:red">(у платнай версіі)</b> <span title="<?php echo $help_cache_onrot; ?>" data-toggle="tooltip"><?php echo $entry_cache_onrot; ?></span></label>
            <div class="col-sm-10">
              <textarea rows="5" placeholder="<?php echo $entry_cache_onrot; ?>" id="input-cache-onrot" class="form-control"><?php echo $cache_onrot; ?></textarea>
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
          <!-- <div class="form-group">
            <label class="col-sm-2 control-label" for="input-cache-cart"><b style="color:red">(навінка)</b> <span title="<?php echo $help_cache_cart; ?>" data-toggle="tooltip"><?php echo $entry_cache_cart; ?></span></label>
            <div class="col-sm-10">
              <select name="cache_cart" id="input-cache-cart" class="form-control">
                <option value="1"<?php if ($cache_cart == 1) { ?> selected="selected"<?php } ?>><?php echo $text_yes; ?></option>
                <option value="0"<?php if (!$cache_cart) { ?> selected="selected"<?php } ?>><?php echo $text_no; ?></option>
              </select>
            </div>
          </div> -->
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-cache-cart-count"><b style="color:red">(навінка)</b> <span title="<?php echo $help_cache_cart_count; ?>" data-toggle="tooltip"><?php echo $entry_cache_cart_count; ?></span></label>
            <div class="col-sm-10">
              <input type="number" value="<?php echo $cache_cart_count; ?>" placeholder="<?php echo $entry_cache_cart_count; ?>" id="input-cache-cart-count" class="form-control" />
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
            <label class="col-sm-2 control-label" for="input-cache-controller"><b style="color:red">(у платнай версіі)</b> <span title="<?php echo $help_cache_controller; ?>" data-toggle="tooltip"><?php echo $entry_cache_controller; ?></span></label>
            <div class="col-sm-10">
              <textarea rows="5" placeholder="<?php echo $entry_cache_controller; ?>" id="input-cache-controller" class="form-control"><?php echo $cache_controller; ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-cache-model"><b style="color:red">(у платнай версіі)</b> <span title="<?php echo $help_cache_model; ?>" data-toggle="tooltip"><?php echo $entry_cache_model; ?></span></label>
            <div class="col-sm-10">
              <textarea rows="5" placeholder="<?php echo $entry_cache_model; ?>" id="input-cache-model" class="form-control"><?php echo $cache_model; ?></textarea>
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
            <label class="col-sm-2 control-label" for="input-cache-expire-controller"><b style="color:red">(у платнай версіі)</b> <span title="<?php echo $help_cache_expire_controller; ?>" data-toggle="tooltip"><?php echo $entry_cache_expire_controller; ?></span></label>
            <div class="col-sm-10">
              <input type="number" value="<?php echo $cache_expire_controller; ?>" placeholder="<?php echo $entry_cache_expire_controller; ?>" id="input-cache-expire-controller" class="form-control" />
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-cache-expire-model"><b style="color:red">(у платнай версіі)</b> <span title="<?php echo $help_cache_expire_model; ?>" data-toggle="tooltip"><?php echo $entry_cache_expire_model; ?></span></label>
            <div class="col-sm-10">
              <input type="number" value="<?php echo $cache_expire_model; ?>" placeholder="<?php echo $entry_cache_expire_model; ?>" id="input-cache-expire-model" class="form-control" />
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-cache-expire-all"><span title="<?php echo $help_cache_expire_all; ?>" data-toggle="tooltip"><?php echo $entry_cache_expire_all; ?></span></label>
            <div class="col-sm-10">
              <input type="number" name="cache_expire_all" value="<?php echo $cache_expire_all; ?>" placeholder="<?php echo $entry_cache_expire_all; ?>" id="input-cache-expire-all" class="form-control" />
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
            <label class="col-sm-2 control-label" for="input-pagespeed-onrot"><b style="color:red">(у платнай версіі)</b> <span title="<?php echo $help_pagespeed_onrot; ?>" data-toggle="tooltip"><?php echo $entry_pagespeed_onrot; ?></span></label>
            <div class="col-sm-10">
              <textarea rows="5" placeholder="<?php echo $entry_pagespeed_onrot; ?>" id="input-pagespeed-onrot" class="form-control"><?php echo $pagespeed_onrot; ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-pagespeed-rot"><span title="<?php echo $help_pagespeed_rot; ?>" data-toggle="tooltip"><?php echo $entry_pagespeed_rot; ?></span></label>
            <div class="col-sm-10">
              <textarea name="pagespeed_rot" rows="5" placeholder="<?php echo $entry_pagespeed_rot; ?>" id="input-pagespeed-rot" class="form-control"><?php echo $pagespeed_rot; ?></textarea>
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
            <label class="col-sm-2 control-label" for="input-pagespeed-device"><b style="color:red">(у платнай версіі)</b> <span title="<?php echo $help_pagespeed_device; ?>" data-toggle="tooltip"><?php echo $entry_pagespeed_device; ?></span></label>
            <div class="col-sm-10">
              <textarea rows="5" placeholder="<?php echo $entry_pagespeed_device; ?>" id="input-pagespeed-device" class="form-control"><?php echo $pagespeed_device; ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-pagespeed-lazy-load-images"><span title="<?php echo $help_pagespeed_lazy_load_images; ?>" data-toggle="tooltip"><?php echo $entry_pagespeed_lazy_load_images; ?></span></label>
            <div class="col-sm-10">
              <select name="pagespeed_lazy_load_images" id="input-pagespeed-lazy-load-images" class="form-control">
                <option value="2"<?php if ($pagespeed_lazy_load_images == 2) { ?> selected="selected"<?php } ?>>bus-loading="lazy" (universal)</option>
                <option value="1"<?php if ($pagespeed_lazy_load_images == 1) { ?> selected="selected"<?php } ?>>loading="lazy"</option>
                <option value="0"<?php if (!$pagespeed_lazy_load_images) { ?> selected="selected"<?php } ?>><?php echo $text_no; ?></option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-pagespeed-lazy-load-html"><b style="color:red">(у платнай версіі)</b> <span title="<?php echo $help_pagespeed_lazy_load_html; ?>" data-toggle="tooltip"><?php echo $entry_pagespeed_lazy_load_html; ?></span></label>
            <div class="col-sm-10">
              <textarea rows="5" placeholder="<?php echo $entry_pagespeed_lazy_load_html; ?>" id="input-pagespeed-lazy-load-html" class="form-control"><?php echo $pagespeed_lazy_load_html; ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-pagespeed-html-replace"><span title="<?php echo $help_pagespeed_html_replace; ?>" data-toggle="tooltip"><?php echo $entry_pagespeed_html_replace; ?></span></label>
            <div class="col-sm-10">
              <textarea name="pagespeed_html_replace" rows="10" placeholder="<?php echo $entry_pagespeed_html_replace; ?>" id="input-pagespeed-html-replaces" class="form-control"><?php echo $pagespeed_html_replace; ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-pagespeed-html-min"><span title="<?php echo $help_pagespeed_html_min; ?>" data-toggle="tooltip"><?php echo $entry_pagespeed_html_min; ?></span></label>
            <div class="col-sm-10">
              <input type="number" name="pagespeed_html_min" value="<?php echo $pagespeed_html_min; ?>" placeholder="<?php echo $entry_pagespeed_html_min; ?>" id="input-pagespeed-html-min" class="form-control" />
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-pagespeed-css-replace"><b style="color:red">(у платнай версіі)</b> <span title="<?php echo $help_pagespeed_css_replace; ?>" data-toggle="tooltip"><?php echo $entry_pagespeed_css_replace; ?></span></label>
            <div class="col-sm-10">
              <textarea rows="10" placeholder="<?php echo $entry_pagespeed_css_replace; ?>" id="input-pagespeed-css-replaces" class="form-control"><?php echo $pagespeed_css_replace; ?></textarea>
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
              <!--[header] [footer] [async] [defer] [prelod] [prefetch] [dns-prefetch] [preconnect] [event] [event-2000] [critical]-->
              чтобы отложить загрузку после ссылки пропишите "|after"
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
              <!--[header] [footer] [async] [defer] [prelod] [prefetch] [dns-prefetch] [preconnect] [event] [event-2000] [critical]-->
              чтобы отложить загрузку после ссылки пропишите "|after"
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
            <label class="col-sm-2 control-label" for="input-pagespeed-css-critical"><b style="color:red">(у платнай версіі)</b> <span title="<?php echo $help_pagespeed_css_critical; ?> Данная функция будет работать при включённом сжатии и рекомендуется в таком случае не откладывать стили по событию." data-toggle="tooltip"><?php echo $entry_pagespeed_css_critical; ?></span></label>
            <div class="col-sm-10">
              <select id="input-pagespeed-css-critical" class="form-control">
                <option value="0"<?php if (!$pagespeed_css_critical) { ?> selected="selected"<?php } ?>><?php echo $text_no; ?></option>
                <option value="1"<?php if ($pagespeed_css_critical == 1) { ?> selected="selected"<?php } ?>><?php echo $text_yes; ?></option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-pagespeed-css-critical-time"><b style="color:red">(у платнай версіі)</b> <span title="Отсрочка времени срабатывания сборщика стилей." data-toggle="tooltip">Отсрочка времени</span></label>
            <div class="col-sm-10">
              <input type="number" value="<?php echo $pagespeed_css_critical_time; ?>" placeholder="Отсрочка времени" id="input-pagespeed-css-critical-time" class="form-control" />
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-pagespeed-css-critical-elements"><b style="color:red">(у платнай версіі)</b> <span title="Укажите название элементов (теги, классы, идентификаторы) которые нужно поместить в файл критических стилей из основного. Данная функция будет работать при включённом сжатии и рекомендуется в таком случае не откладывать стили по событию. Значение указывается с новой строки." data-toggle="tooltip">Элементы стилей</span></label>
            <div class="col-sm-10">
              <textarea rows="5" placeholder="Элементы стилей" id="input-pagespeed-css-critical-elements" class="form-control"><?php echo $pagespeed_css_critical_elements; ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-pagespeed-css-inline-transfer"><span title="<?php echo $help_pagespeed_css_inline_transfer; ?>" data-toggle="tooltip"><?php echo $entry_pagespeed_css_inline_transfer; ?></span></label>
            <div class="col-sm-10">
              <select name="pagespeed_css_inline_transfer" id="input-pagespeed-css-inline-transfer" class="form-control">
                <option value="0"<?php if (!$pagespeed_css_inline_transfer) { ?> selected="selected"<?php } ?>><?php echo $text_no; ?></option>
                <option value="1"<?php if ($pagespeed_css_inline_transfer == 1) { ?> selected="selected"<?php } ?>><?php echo $text_pagespeed_inline_transfer_1; ?></option>
                <option value="2"<?php if ($pagespeed_css_inline_transfer == 2) { ?> selected="selected"<?php } ?>><?php echo $text_pagespeed_inline_transfer_2; ?></option>
                <option value="3"<?php if ($pagespeed_css_inline_transfer == 3) { ?> selected="selected"<?php } ?>><?php echo $text_pagespeed_inline_transfer_3; ?> (у платнай версіі)</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-pagespeed-css-events"><b style="color:red">(у платнай версіі)</b> <span title="<?php echo $help_pagespeed_css_events; ?>" data-toggle="tooltip"><?php echo $entry_pagespeed_css_events; ?></span></label>
            <div class="col-sm-10">
              <textarea rows="5" placeholder="<?php echo $entry_pagespeed_css_events; ?>" id="input-pagespeed-css-events" class="form-control"><?php echo $pagespeed_css_events; ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-pagespeed-css-style"><span title="<?php echo $help_pagespeed_css_style; ?>" data-toggle="tooltip"><?php echo $entry_pagespeed_css_style; ?></span></label>
            <div class="col-sm-10">
              <textarea name="pagespeed_css_style" rows="10" placeholder="<?php echo $entry_pagespeed_css_style; ?>" id="input-pagespeed-css-style" class="form-control"><?php echo $pagespeed_css_style; ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-pagespeed-js-replace"><b style="color:red">(у платнай версіі)</b> <span title="<?php echo $help_pagespeed_js_replace; ?>" data-toggle="tooltip"><?php echo $entry_pagespeed_js_replace; ?></span></label>
            <div class="col-sm-10">
              <textarea rows="10" placeholder="<?php echo $entry_pagespeed_js_replace; ?>" id="input-pagespeed-js-replaces" class="form-control"><?php echo $pagespeed_js_replace; ?></textarea>
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
              <!--[header] [footer] [async] [defer] [prelod] [prefetch] [dns-prefetch] [preconnect] [event] [event-2000]-->
              чтобы отложить загрузку после ссылки пропишите "|after"
              <textarea name="pagespeed_js_min_links" rows="10" placeholder="<?php echo $entry_pagespeed_js_min_links; ?>" id="input-pagespeed-js-min-links" class="form-control"><?php echo $pagespeed_js_min_links; ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-pagespeed-js-min-download"><b style="color:red">(у платнай версіі)</b> <span title="<?php echo $help_pagespeed_js_min_download; ?>" data-toggle="tooltip"><?php echo $entry_pagespeed_js_min_download; ?></span></label>
            <div class="col-sm-10">
              <textarea rows="5" placeholder="<?php echo $entry_pagespeed_js_min_download; ?>" id="input-pagespeed-js-min-download" class="form-control"><?php echo $pagespeed_js_min_download; ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-pagespeed-js-min-exception"><span title="<?php echo $help_pagespeed_js_min_exception; ?>" data-toggle="tooltip"><?php echo $entry_pagespeed_js_min_exception; ?></span></label>
            <div class="col-sm-10">
              <!--[header] [footer] [async] [defer] [prelod] [prefetch] [dns-prefetch] [preconnect] [event] [event-2000]-->
              чтобы отложить загрузку после ссылки пропишите "|after"
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
                <option value="3"<?php if ($pagespeed_js_inline_transfer == 3) { ?> selected="selected"<?php } ?>><?php echo $text_pagespeed_inline_transfer_3; ?> (у платнай версіі)</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-pagespeed-js-inline-exception"><b style="color:red">(у платнай версіі)</b> <span title="<?php echo $help_pagespeed_js_inline_exception; ?>" data-toggle="tooltip"><?php echo $entry_pagespeed_js_inline_exception; ?></span></label>
            <div class="col-sm-10">
              <textarea name="pagespeed_js_inline_exception" rows="5" placeholder="<?php echo $entry_pagespeed_js_inline_exception; ?>" id="input-pagespeed-js-inline-exception" class="form-control"><?php echo $pagespeed_js_inline_exception; ?></textarea>
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
            <label class="col-sm-2 control-label" style="padding:0;"><b style="color:red">(навінка)</b> <?php echo $text_cache_total; ?></label>
            <div class="col-sm-10"><?php echo $cache_total; ?></div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" style="padding:0;"><b style="color:red">(навінка)</b> <?php echo $text_cache_size; ?></label>
            <div class="col-sm-10"><?php echo $cache_size; ?></div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" style="padding:0;"><b style="color:red">(навінка)</b> <?php echo $text_disc_free; ?></label>
            <div class="col-sm-10"><?php echo $disc_free; ?></div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-debug"><span title="<?php echo $help_debug; ?>" data-toggle="tooltip"><?php echo $entry_debug; ?></span></label>
            <div class="col-sm-10">
              <select name="debug" id="input-debug" class="form-control">
                <option value="0"<?php if (!$debug) { ?> selected="selected"<?php } ?>><?php echo $text_no; ?></option>
                <option value="1"<?php if ($debug == 1) { ?> selected="selected"<?php } ?>><?php echo $text_yes; ?></option>
                <option value="2"<?php if ($debug == 2) { ?> selected="selected"<?php } ?>><?php echo $text_debug_2; ?></option>
                <option value="3"<?php if ($debug == 3) { ?> selected="selected"<?php } ?>><?php echo $text_debug_2; ?> Скорость контроллеров</option>
                <option value="4"<?php if ($debug == 4) { ?> selected="selected"<?php } ?>><?php echo $text_debug_2; ?> Скорость моделей</option>
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
<div class="scroll-top-wrapper" onclick="scrollToTop()"><i class="fa fa-2x fa-arrow-circle-up"></i></div>
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
			$('[name*="pagespeed"]:not([name="pagespeed_status"])').parent().parent().fadeIn();
		} else {
			$('[name*="pagespeed"]:not([name="pagespeed_status"])').parent().parent().fadeOut(1);
		}
	});
	$('select[name="pagespeed_status"]').trigger("change");

	$(document).on('scroll', function() {
		if ($(window).scrollTop() > 100) {
			$('.scroll-top-wrapper').addClass('show');
		} else {
			$('.scroll-top-wrapper').removeClass('show');
		}
	});
});

	function scrollToTop() {
		var element = $('html');
		var offset = element.offset();
		element.animate({scrollTop: offset.top}, 200, 'linear');
	};
//--></script>
<!-- // *   Аўтар: "БуслікДрэў" ( https://buslikdrev.by/ )
     // *   © 2016-2022; BuslikDrev - Усе правы захаваныя.
     // *   Спецыяльна для сайта: "OpenCart.pro" ( https://opencart.pro/ ) -->
<?php echo $footer; ?>