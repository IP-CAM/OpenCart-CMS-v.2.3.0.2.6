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
span[data-toggle="tooltip"]:after {font-family:'Font Awesome 5 Free';color:#1E91CF;content:"\f059";margin-left:4px}
input.form-control:read-only,
select.form-control:read-only {background-color: #ffffff}
button.close {padding:0;background:transparent;border:0;-webkit-appearance:none}
.close {float:right;font-size:18px;font-weight:bold;line-height:1;color:#000;text-shadow:0 1px 0 #fff;opacity:0.2;filter:alpha(opacity=20)}
.close:hover,
.close:focus {color:#000;text-decoration:none;cursor:pointer;opacity:0.5;filter:alpha(opacity=50)}
</style>
<?php echo $column_left; ?>
<!-- // *   Аўтар: "БуслікДрэў" ( https://buslikdrev.by/ )
     // *   © 2016-2022; BuslikDrev - Усе правы захаваныя.
     // *   Спецыяльна для сайта: "OpenCart.pro" ( https://opencart.pro/ ) -->
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right float-end">
        <button type="button" onclick="window.location.href = '<?php echo $clear; ?>&caches=1';" data-toggle="tooltip" data-html="true" data-bs-toggle="tooltip" data-bs-html="true" title="<?php echo $button_clear; ?> HTML, TWIG, DATA" class="btn btn-default btn-outline-primary" style="margin-bottom:10px;"><i class="fa fa-eraser"></i></button>
        <button type="button" onclick="window.location.href = '<?php echo $clear; ?>&minify=1';" data-toggle="tooltip" data-html="true" data-bs-toggle="tooltip" data-bs-html="true" title="<?php echo $button_clear; ?> HTML, TWIG, DATA + CSS, JS" class="btn btn-warning" style="margin-bottom:10px;"><i class="fa fa-eraser"></i></button>
        <button type="button" onclick="window.location.href = '<?php echo $clear; ?>&images=1';" data-toggle="tooltip" data-html="true" data-bs-toggle="tooltip" data-bs-html="true" title="<?php echo $button_clear; ?> HTML, TWIG, DATA + IMAGES" class="btn btn-info" style="margin-bottom:10px;"><i class="fa fa-eraser"></i> <i class="fa fa-picture-o"></i></button>
        <button type="button" onclick="window.location.href = '<?php echo $clear; ?>&logs=1';" data-toggle="tooltip" data-html="true" data-bs-toggle="tooltip" data-bs-html="true" title="<?php echo $button_clear; ?> LOGS" class="btn btn-danger" style="margin-bottom:10px;"><i class="fa fa-eraser"></i> <i class="fa fa-exclamation-triangle"></i></button>
        <button type="button" onclick="window.location.href = '<?php echo $clear; ?>&modifications=1';" data-toggle="tooltip" data-html="true" data-bs-toggle="tooltip" data-bs-html="true" title="<?php echo $button_clear; ?> HTML, TWIG, DATA + MODIFICATIONS" class="btn btn-warning" style="margin-bottom:10px;"><i class="fa fa-eraser"></i> <i class="fa fa-refresh"></i></button>
        <button type="button" onclick="confirm('<?php echo $text_confirm; ?>') ? window.location.href = '<?php echo $clear; ?>&view_products=1' : false;" data-toggle="tooltip" data-html="true" data-bs-toggle="tooltip" data-bs-html="true" title="<?php echo $button_clear; ?> VIEW PRDOCUTS" class="btn btn-primary" style="margin-bottom:10px;"><i class="fa fa-eraser"></i> <i class="fa fa-eye"></i></button>
        <button type="button" onclick="confirm('<?php echo $text_confirm; ?>') ? window.location.href = '<?php echo $clear; ?>&customer_search=1' : false;" data-toggle="tooltip" data-html="true" data-bs-toggle="tooltip" data-bs-html="true" title="<?php echo $button_clear; ?> CUSTOMER SEARCH QUERY" class="btn btn-default btn-outline-primary" style="margin-bottom:10px;"><i class="fa fa-eraser"></i> <i class="fa fa-search"></i></button>
        <?php if ($clear_blog_search) { ?>
        <button type="button" onclick="confirm('<?php echo $text_confirm; ?>') ? window.location.href = '<?php echo $clear; ?>&customer_blog_search=1' : false;" data-toggle="tooltip" data-html="true" data-bs-toggle="tooltip" data-bs-html="true" title="<?php echo $button_clear; ?> CUSTOMER BLOG SEARCH QUERY" class="btn btn-default btn-outline-primary" style="margin-bottom:10px;"><i class="fa fa-eraser"></i> <i class="fa fa-search"></i></button>
        <?php } ?>
        <button type="button" onclick="confirm('<?php echo $text_confirm; ?>') ? window.location.href = '<?php echo $clear; ?>&customer_activity=1' : false;" data-toggle="tooltip" data-html="true" data-bs-toggle="tooltip" data-bs-html="true" title="<?php echo $button_clear; ?> CUSTOMER ACTIVITY" class="btn btn-default btn-outline-primary" style="margin-bottom:10px;"><i class="fa fa-eraser"></i> <i class="fa fa-trophy"></i></button>
        <button type="button" onclick="confirm('<?php echo $text_confirm; ?>') ? window.location.href = '<?php echo $clear; ?>&customer_session=1' : false;" data-toggle="tooltip" data-html="true" data-bs-toggle="tooltip" data-bs-html="true" title="<?php echo $button_clear; ?> CUSTOMER AND API SESSION (file or DB)" class="btn btn-danger" style="margin-bottom:10px;"><i class="fa fa-eraser"></i> <i class="fa fa-unlock"></i></button>
        <?php if ($clear_pwa) { ?>
        <button type="button" onclick="window.location.href = '<?php echo $clear_pwa; ?>';" data-toggle="tooltip" data-html="true" data-bs-toggle="tooltip" data-bs-html="true" title="<?php echo $button_clear; ?> PWA" class="btn btn-primary" style="margin-bottom:10px;background-color:#570fc2;"><i class="fa fa-eraser"></i> <i class="fa fa-chrome"></i></button>
        <?php } ?>
        <button type="button" onclick="$('form input[name=\'apply\']').val('1'); $('#form-bus-app').submit();" data-toggle="tooltip" data-html="true" data-bs-toggle="tooltip" data-bs-html="true" title="<?php echo $button_clear; ?> HTML, TWIG, DATA + <?php echo $button_apply; ?> <?php echo $tab_setting; ?>" class="btn btn-success" style="margin-bottom:10px;"><i class="fa fa-save"></i></button>
        <button type="submit" form="form-bus-app" data-toggle="tooltip" data-html="true" data-bs-toggle="tooltip" data-bs-html="true" title="<?php echo $button_clear; ?> HTML, TWIG, DATA + <?php echo $button_save; ?> <?php echo $tab_setting; ?>" class="btn btn-primary" style="margin-bottom:10px;"><i class="fa fa-save"></i></button>
        <a href="<?php echo $cancel; ?>" data-toggle="tooltip" data-html="true" data-bs-toggle="tooltip" data-bs-html="true" title="<?php echo $button_cancel; ?>" class="btn btn-default btn-outline-primary" style="margin-bottom:10px;"><i class="fa fa-reply"></i></a>
      </div>
      <h1><?php echo $heading_title; ?></h1>
      <ul class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <li class="breadcrumb-item"><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
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
    <div class="panel panel-default card">
      <div class="panel-heading card-header">
        <h3 class="panel-title card-title"><i class="fa fa-pencil"></i> <?php echo $text_edit; ?></h3>
      </div>
      <div class="panel-body card-body">
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-bus-app" class="form-horizontal">
          <input type="hidden" id="apply" name="apply" value="0">
          <legend><b><?php echo $tab_setting; ?></b></legend>
          <div class="form-group row mb-3">
            <label class="col-sm-2 control-label col-form-label" for="input-status"><span title="<?php echo $help_status; ?>" data-toggle="tooltip" data-html="true" data-bs-toggle="tooltip" data-bs-html="true"><?php echo $entry_status; ?></span></label>
            <div class="col-sm-10">
              <select name="status" id="input-status" class="form-control">
                <option value="1"<?php if ($status == 1) { ?> selected="selected"<?php } ?>><?php echo $text_enabled; ?></option>
                <option value="0"<?php if (!$status) { ?> selected="selected"<?php } ?>><?php echo $text_disabled; ?></option>
              </select>
            </div>
          </div>
          <div class="form-group row mb-3">
            <label class="col-sm-2 control-label col-form-label"><span title="<?php echo $help_store; ?>" data-toggle="tooltip" data-html="true" data-bs-toggle="tooltip" data-bs-html="true"><?php echo $entry_store; ?></span></label>
            <div class="col-sm-10">
              <div class="well well-sm form-control" style="height: 150px; overflow: auto;">
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
          <div class="form-group row mb-3">
            <label class="col-sm-2 control-label col-form-label" for="input-cache-status"><span title="<?php echo $help_cache_status; ?>" data-toggle="tooltip" data-html="true" data-bs-toggle="tooltip" data-bs-html="true"><?php echo $entry_cache_status; ?></span></label>
            <div class="col-sm-10">
              <select name="cache_status" id="input-cache-status" class="form-control">
                <option value="1"<?php if ($cache_status == 1) { ?> selected="selected"<?php } ?>><?php echo $text_yes; ?></option>
                <option value="2"<?php if ($cache_status == 2) { ?> selected="selected"<?php } ?>><?php echo $text_cache_status_2; ?></option>
                <option value="0"<?php if (!$cache_status) { ?> selected="selected"<?php } ?>><?php echo $text_no; ?></option>
              </select>
            </div>
          </div>
          <div class="form-group row mb-3">
            <label class="col-sm-2 control-label col-form-label" for="input-cache-con"><b style="color:red">(навінка)</b> <span title="<?php echo $help_cache_con; ?>" data-toggle="tooltip" data-html="true" data-bs-toggle="tooltip" data-bs-html="true"><?php echo $entry_cache_con; ?></span></label>
            <div class="col-sm-10">
              <textarea name="cache_con" rows="5" placeholder="<?php echo $entry_cache_con; ?>" id="input-cache-con" class="form-control"><?php echo $cache_con; ?></textarea>
            </div>
          </div>
          <div class="form-group row mb-3">
            <label class="col-sm-2 control-label col-form-label" for="input-cache-ses"><span title="<?php echo $help_cache_ses; ?>" data-toggle="tooltip" data-html="true" data-bs-toggle="tooltip" data-bs-html="true"><?php echo $entry_cache_ses; ?></span></label>
            <div class="col-sm-10">
              <textarea name="cache_ses" rows="5" placeholder="<?php echo $entry_cache_ses; ?>" id="input-cache-ses" class="form-control"><?php echo $cache_ses; ?></textarea>
            </div>
          </div>
          <div class="form-group row mb-3">
            <label class="col-sm-2 control-label col-form-label" for="input-cache-cok"><b style="color:red">(навінка)</b> <span title="<?php echo $help_cache_cok; ?>" data-toggle="tooltip" data-html="true" data-bs-toggle="tooltip" data-bs-html="true"><?php echo $entry_cache_cok; ?></span></label>
            <div class="col-sm-10">
              <textarea name="cache_cok" rows="5" placeholder="<?php echo $entry_cache_cok; ?>" id="input-cache-cok" class="form-control"><?php echo $cache_cok; ?></textarea>
            </div>
          </div>
          <div class="form-group row mb-3">
            <label class="col-sm-2 control-label col-form-label" for="input-cache-par"><b style="color:red">(навінка)</b> <span title="<?php echo $help_cache_par; ?>" data-toggle="tooltip" data-html="true" data-bs-toggle="tooltip" data-bs-html="true"><?php echo $entry_cache_par; ?></span></label>
            <div class="col-sm-10">
              <textarea name="cache_par" rows="5" placeholder="<?php echo $entry_cache_par; ?>" id="input-cache-par" class="form-control"><?php echo $cache_par; ?></textarea>
            </div>
          </div>
          <div class="form-group row mb-3">
            <label class="col-sm-2 control-label col-form-label" for="input-cache-onrot"><span title="<?php echo $help_cache_onrot; ?>" data-toggle="tooltip" data-html="true" data-bs-toggle="tooltip" data-bs-html="true"><?php echo $entry_cache_onrot; ?></span></label>
            <div class="col-sm-10">
              <textarea name="cache_onrot" rows="5" placeholder="<?php echo $entry_cache_onrot; ?>" id="input-cache-onrot" class="form-control"><?php echo $cache_onrot; ?></textarea>
            </div>
          </div>
          <div class="form-group row mb-3">
            <label class="col-sm-2 control-label col-form-label" for="input-cache-rot"><span title="<?php echo $help_cache_rot; ?>" data-toggle="tooltip" data-html="true" data-bs-toggle="tooltip" data-bs-html="true"><?php echo $entry_cache_rot; ?></span></label>
            <div class="col-sm-10">
              <textarea name="cache_rot" rows="5" placeholder="<?php echo $entry_cache_rot; ?>" id="input-cache-rot" class="form-control"><?php echo $cache_rot; ?></textarea>
            </div>
          </div>
          <div class="form-group row mb-3">
            <label class="col-sm-2 control-label col-form-label" for="input-cache-customer"><?php echo $entry_cache_customer; ?></label>
            <div class="col-sm-10">
              <select name="cache_customer" id="input-cache-customer" class="form-control">
                <option value="1"<?php if ($cache_customer == 1) { ?> selected="selected"<?php } ?>><?php echo $text_yes; ?></option>
                <option value="0"<?php if (!$cache_customer) { ?> selected="selected"<?php } ?>><?php echo $text_no; ?></option>
              </select>
            </div>
          </div>
          <!-- <div class="form-group row mb-3">
            <label class="col-sm-2 control-label col-form-label" for="input-cache-cart"><b style="color:red">(навінка)</b> <span title="<?php echo $help_cache_cart; ?>" data-toggle="tooltip" data-html="true" data-bs-toggle="tooltip" data-bs-html="true"><?php echo $entry_cache_cart; ?></span></label>
            <div class="col-sm-10">
              <select name="cache_cart" id="input-cache-cart" class="form-control">
                <option value="1"<?php if ($cache_cart == 1) { ?> selected="selected"<?php } ?>><?php echo $text_yes; ?></option>
                <option value="0"<?php if (!$cache_cart) { ?> selected="selected"<?php } ?>><?php echo $text_no; ?></option>
              </select>
            </div>
          </div> -->
          <div class="form-group row mb-3">
            <label class="col-sm-2 control-label col-form-label" for="input-cache-cart-count"><b style="color:red">(навінка)</b> <span title="<?php echo $help_cache_cart_count; ?>" data-toggle="tooltip" data-html="true" data-bs-toggle="tooltip" data-bs-html="true"><?php echo $entry_cache_cart_count; ?></span></label>
            <div class="col-sm-10">
              <input type="number" name="cache_cart_count" value="<?php echo $cache_cart_count; ?>" placeholder="<?php echo $entry_cache_cart_count; ?>" id="input-cache-cart-count" class="form-control" />
            </div>
          </div>
          <div class="form-group row mb-3">
            <label class="col-sm-2 control-label col-form-label" for="input-cache-oc"><span title="<?php echo $help_cache_oc; ?>" data-toggle="tooltip" data-html="true" data-bs-toggle="tooltip" data-bs-html="true"><?php echo $entry_cache_oc; ?></span></label>
            <div class="col-sm-10">
              <select name="cache_oc" id="input-cache-oc" class="form-control">
                <option value="1"<?php if ($cache_oc == 1) { ?> selected="selected"<?php } ?>><?php echo $text_yes; ?></option>
                <option value="0"<?php if (!$cache_oc) { ?> selected="selected"<?php } ?>><?php echo $text_no; ?></option>
              </select>
            </div>
          </div>
          <div class="form-group row mb-3">
            <label class="col-sm-2 control-label col-form-label" for="input-cache-controller"><b style="color:red">(навінка)</b> <span title="<?php echo $help_cache_controller; ?>" data-toggle="tooltip" data-html="true" data-bs-toggle="tooltip" data-bs-html="true"><?php echo $entry_cache_controller; ?></span></label>
            <div class="col-sm-10">
              <textarea name="cache_controller" rows="5" placeholder="<?php echo $entry_cache_controller; ?>" id="input-cache-controller" class="form-control"><?php echo $cache_controller; ?></textarea>
            </div>
          </div>
          <div class="form-group row mb-3">
            <label class="col-sm-2 control-label col-form-label" for="input-cache-model"><b style="color:red">(навінка)</b> <span title="<?php echo $help_cache_model; ?>" data-toggle="tooltip" data-html="true" data-bs-toggle="tooltip" data-bs-html="true"><?php echo $entry_cache_model; ?></span></label>
            <div class="col-sm-10">
              <textarea name="cache_model" rows="5" placeholder="<?php echo $entry_cache_model; ?>" id="input-cache-model" class="form-control"><?php echo $cache_model; ?></textarea>
            </div>
          </div>
          <div class="form-group row mb-3">
            <label class="col-sm-2 control-label col-form-label" for="input-cache-engine"><span title="<?php echo $help_cache_engine; ?>" data-toggle="tooltip" data-html="true" data-bs-toggle="tooltip" data-bs-html="true"><?php echo $entry_cache_engine; ?></span></label>
            <div class="col-sm-10">
              <select name="cache_engine" id="input-cache-engine" class="form-control">
                <?php foreach ($cache_engines as $engine) { ?>
                <option value="<?php echo $engine['code']; ?>"<?php if ($cache_engine == $engine['code']) { ?> selected="selected"<?php } ?><?php if (!$engine['status']) { ?> disabled="disabled"<?php } ?>><?php echo $engine['name']; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group row mb-3">
            <label class="col-sm-2 control-label col-form-label" for="input-cache-engine-mine"><span title="<?php echo $help_cache_engine_mine; ?>" data-toggle="tooltip" data-html="true" data-bs-toggle="tooltip" data-bs-html="true"><?php echo $entry_cache_engine_mine ?></span></label>
            <div class="col-sm-10">
              <input type="number" name="cache_engine_mine" value="<?php echo $cache_engine_mine; ?>" placeholder="<?php echo $entry_cache_engine_mine; ?>" id="input-cache-engine-mine" class="form-control" />
            </div>
          </div>
          <div class="form-group row mb-3">
            <label class="col-sm-2 control-label col-form-label" for="input-cache-expire"><span title="<?php echo $help_cache_expire; ?>" data-toggle="tooltip" data-html="true" data-bs-toggle="tooltip" data-bs-html="true"><?php echo $entry_cache_expire; ?></span></label>
            <div class="col-sm-10">
              <input type="number" name="cache_expire" value="<?php echo $cache_expire; ?>" placeholder="<?php echo $entry_cache_expire; ?>" id="input-cache-expire" class="form-control" />
            </div>
          </div>
          <div class="form-group row mb-3">
            <label class="col-sm-2 control-label col-form-label" for="input-cache-expire-controller"><b style="color:red">(навінка)</b> <span title="<?php echo $help_cache_expire_controller; ?>" data-toggle="tooltip" data-html="true" data-bs-toggle="tooltip" data-bs-html="true"><?php echo $entry_cache_expire_controller; ?></span></label>
            <div class="col-sm-10">
              <input type="number" name="cache_expire_controller" value="<?php echo $cache_expire_controller; ?>" placeholder="<?php echo $entry_cache_expire_controller; ?>" id="input-cache-expire-controller" class="form-control" />
            </div>
          </div>
          <div class="form-group row mb-3">
            <label class="col-sm-2 control-label col-form-label" for="input-cache-expire-model"><b style="color:red">(навінка)</b> <span title="<?php echo $help_cache_expire_model; ?>" data-toggle="tooltip" data-html="true" data-bs-toggle="tooltip" data-bs-html="true"><?php echo $entry_cache_expire_model; ?></span></label>
            <div class="col-sm-10">
              <input type="number" name="cache_expire_model" value="<?php echo $cache_expire_model; ?>" placeholder="<?php echo $entry_cache_expire_model; ?>" id="input-cache-expire-model" class="form-control" />
            </div>
          </div>
          <div class="form-group row mb-3">
            <label class="col-sm-2 control-label col-form-label" for="input-cache-expire-all"><b style="color:red">(навінка)</b> <span title="<?php echo $help_cache_expire_all; ?>" data-toggle="tooltip" data-html="true" data-bs-toggle="tooltip" data-bs-html="true"><?php echo $entry_cache_expire_all; ?></span></label>
            <div class="col-sm-10">
              <input type="number" name="cache_expire_all" value="<?php echo $cache_expire_all; ?>" placeholder="<?php echo $entry_cache_expire_all; ?>" id="input-cache-expire-all" class="form-control" />
            </div>
          </div>
          <legend><b><?php echo $tab_pagespeed; ?></b></legend>
          <div class="form-group row mb-3">
            <label class="col-sm-2 control-label col-form-label" for="input-pagespeed-status"><span title="<?php echo $help_pagespeed_status; ?>" data-toggle="tooltip" data-html="true" data-bs-toggle="tooltip" data-bs-html="true"><?php echo $entry_pagespeed_status; ?></span></label>
            <div class="col-sm-10">
              <select name="pagespeed_status" id="input-pagespeed-status" class="form-control">
                <option value="1"<?php if ($pagespeed_status == 1) { ?> selected="selected"<?php } ?>><?php echo $text_yes; ?></option>
                <option value="0"<?php if (!$pagespeed_status) { ?> selected="selected"<?php } ?>><?php echo $text_no; ?></option>
              </select>
            </div>
          </div>
          <div class="form-group row mb-3">
            <label class="col-sm-2 control-label col-form-label" for="input-pagespeed-onrot"><b style="color:red">(навінка)</b> <span title="<?php echo $help_pagespeed_onrot; ?>" data-toggle="tooltip" data-html="true" data-bs-toggle="tooltip" data-bs-html="true"><?php echo $entry_pagespeed_onrot; ?></span></label>
            <div class="col-sm-10">
              <textarea name="pagespeed_onrot" rows="5" placeholder="<?php echo $entry_pagespeed_onrot; ?>" id="input-pagespeed-onrot" class="form-control"><?php echo $pagespeed_onrot; ?></textarea>
            </div>
          </div>
          <div class="form-group row mb-3">
            <label class="col-sm-2 control-label col-form-label" for="input-pagespeed-rot"><span title="<?php echo $help_pagespeed_rot; ?>" data-toggle="tooltip" data-html="true" data-bs-toggle="tooltip" data-bs-html="true"><?php echo $entry_pagespeed_rot; ?></span></label>
            <div class="col-sm-10">
              <textarea name="pagespeed_rot" rows="5" placeholder="<?php echo $entry_pagespeed_rot; ?>" id="input-pagespeed-rot" class="form-control"><?php echo $pagespeed_rot; ?></textarea>
            </div>
          </div>
          <div class="form-group row mb-3">
            <label class="col-sm-2 control-label col-form-label" for="input-pagespeed-attribute-w-h"><span title="<?php echo $help_pagespeed_attribute_w_h; ?>" data-toggle="tooltip" data-html="true" data-bs-toggle="tooltip" data-bs-html="true"><?php echo $entry_pagespeed_attribute_w_h; ?></span></label>
            <div class="col-sm-10">
              <select name="pagespeed_attribute_w_h" id="input-pagespeed-attribute-w-h" class="form-control">
                <option value="1"<?php if ($pagespeed_attribute_w_h == 1) { ?> selected="selected"<?php } ?>><?php echo $text_yes; ?></option>
                <option value="0"<?php if (!$pagespeed_attribute_w_h) { ?> selected="selected"<?php } ?>><?php echo $text_no; ?></option>
              </select>
            </div>
          </div>
          <div class="form-group row mb-3">
            <label class="col-sm-2 control-label col-form-label" for="input-pagespeed-lazy-load-images"><span title="<?php echo $help_pagespeed_lazy_load_images; ?>" data-toggle="tooltip" data-html="true" data-bs-toggle="tooltip" data-bs-html="true"><?php echo $entry_pagespeed_lazy_load_images; ?></span></label>
            <div class="col-sm-10">
              <select name="pagespeed_lazy_load_images" id="input-pagespeed-lazy-load-images" class="form-control">
                <option value="0"<?php if (!$pagespeed_lazy_load_images) { ?> selected="selected"<?php } ?>><?php echo $text_no; ?></option>
                <option value="1"<?php if ($pagespeed_lazy_load_images == 1) { ?> selected="selected"<?php } ?>>loading="lazy"</option>
                <option value="2"<?php if ($pagespeed_lazy_load_images == 2) { ?> selected="selected"<?php } ?>>bus-loading="lazy" (universal)</option>
              </select>
            </div>
          </div>
          <div class="form-group row mb-3">
            <label class="col-sm-2 control-label col-form-label" for="input-pagespeed-lazy-load-html"><b style="color:red">(навінка)</b> <span title="<?php echo $help_pagespeed_lazy_load_html; ?>" data-toggle="tooltip" data-html="true" data-bs-toggle="tooltip" data-bs-html="true"><?php echo $entry_pagespeed_lazy_load_html; ?></span></label>
            <div class="col-sm-10">
              Ручной запуск: busLoadingLazy.start({element:'[data-busloadinglazy-id=\'309b58a6256d898adcd1923369df72bf\']', lazy:true});
              <textarea name="pagespeed_lazy_load_html" rows="5" placeholder="<?php echo $entry_pagespeed_lazy_load_html; ?>" id="input-pagespeed-lazy-load-html" class="form-control"><?php echo $pagespeed_lazy_load_html; ?></textarea>
            </div>
          </div>
          <div class="form-group row mb-3">
            <label class="col-sm-2 control-label col-form-label" for="input-pagespeed-html-replace"><span title="<?php echo $help_pagespeed_html_replace; ?>" data-toggle="tooltip" data-html="true" data-bs-toggle="tooltip" data-bs-html="true"><?php echo $entry_pagespeed_html_replace; ?></span></label>
            <div class="col-sm-10">
              <textarea name="pagespeed_html_replace" rows="10" placeholder="<?php echo $entry_pagespeed_html_replace; ?>" id="input-pagespeed-html-replaces" class="form-control"><?php echo $pagespeed_html_replace; ?></textarea>
            </div>
          </div>
          <div class="form-group row mb-3">
            <label class="col-sm-2 control-label col-form-label" for="input-pagespeed-html-min"><span title="<?php echo $help_pagespeed_html_min; ?>" data-toggle="tooltip" data-html="true" data-bs-toggle="tooltip" data-bs-html="true"><?php echo $entry_pagespeed_html_min; ?></span></label>
            <div class="col-sm-10">
              <input type="number" name="pagespeed_html_min" value="<?php echo $pagespeed_html_min; ?>" placeholder="<?php echo $entry_pagespeed_html_min; ?>" id="input-pagespeed-html-min" class="form-control" />
            </div>
          </div>
          <div class="form-group row mb-3">
            <label class="col-sm-2 control-label col-form-label" for="input-pagespeed-css-replace"><b style="color:red">(навінка)</b> <span title="<?php echo $help_pagespeed_css_replace; ?>" data-toggle="tooltip" data-html="true" data-bs-toggle="tooltip" data-bs-html="true"><?php echo $entry_pagespeed_css_replace; ?></span></label>
            <div class="col-sm-10">
              <textarea name="pagespeed_css_replace" rows="10" placeholder="<?php echo $entry_pagespeed_css_replace; ?>" id="input-pagespeed-css-replaces" class="form-control"><?php echo $pagespeed_css_replace; ?></textarea>
            </div>
          </div>
          <div class="form-group row mb-3">
            <label class="col-sm-2 control-label col-form-label" for="input-pagespeed-css-min"><span title="<?php echo $help_pagespeed_css_min; ?>" data-toggle="tooltip" data-html="true" data-bs-toggle="tooltip" data-bs-html="true"><?php echo $entry_pagespeed_css_min; ?></span></label>
            <div class="col-sm-10">
              <input type="number" name="pagespeed_css_min" value="<?php echo $pagespeed_css_min; ?>" placeholder="<?php echo $entry_pagespeed_css_min; ?>" id="input-pagespeed-css-min" class="form-control" />
            </div>
          </div>
          <div class="form-group row mb-3">
            <label class="col-sm-2 control-label col-form-label" for="input-pagespeed-css-min-links"><span title="<?php echo $help_pagespeed_css_min_links; ?>" data-toggle="tooltip" data-html="true" data-bs-toggle="tooltip" data-bs-html="true"><?php echo $entry_pagespeed_css_min_links; ?></span></label>
            <div class="col-sm-10">
              <!--[header] [footer] [async] [defer] [prelod] [prefetch] [dns-prefetch] [preconnect] [event] [event-2000] [critical]-->
              чтобы отложить загрузку после ссылки пропишите "|after"
              <textarea name="pagespeed_css_min_links" rows="10" placeholder="<?php echo $entry_pagespeed_css_min_links; ?>" id="input-pagespeed-css-min-links" class="form-control"><?php echo $pagespeed_css_min_links; ?></textarea>
            </div>
          </div>
          <div class="form-group row mb-3">
            <label class="col-sm-2 control-label col-form-label" for="input-pagespeed-css-min-download"><span title="<?php echo $help_pagespeed_css_min_download; ?>" data-toggle="tooltip" data-html="true" data-bs-toggle="tooltip" data-bs-html="true"><?php echo $entry_pagespeed_css_min_download; ?></span></label>
            <div class="col-sm-10">
              <textarea name="pagespeed_css_min_download" rows="5" placeholder="<?php echo $entry_pagespeed_css_min_download; ?>" id="input-pagespeed-css-min-download" class="form-control"><?php echo $pagespeed_css_min_download; ?></textarea>
            </div>
          </div>
          <div class="form-group row mb-3">
            <label class="col-sm-2 control-label col-form-label" for="input-pagespeed-css-min-exception"><span title="<?php echo $help_pagespeed_css_min_exception; ?>" data-toggle="tooltip" data-html="true" data-bs-toggle="tooltip" data-bs-html="true"><?php echo $entry_pagespeed_css_min_exception; ?></span></label>
            <div class="col-sm-10">
              <!--[header] [footer] [async] [defer] [prelod] [prefetch] [dns-prefetch] [preconnect] [event] [event-2000] [critical]-->
              чтобы отложить загрузку после ссылки пропишите "|after"
              <textarea name="pagespeed_css_min_exception" rows="10" placeholder="<?php echo $entry_pagespeed_css_min_exception; ?>" id="input-pagespeed-css-min-exception" class="form-control"><?php echo $pagespeed_css_min_exception; ?></textarea>
            </div>
          </div>
          <div class="form-group row mb-3">
            <label class="col-sm-2 control-label col-form-label" for="input-pagespeed-css-min-font"><span title="<?php echo $help_pagespeed_css_min_font; ?>" data-toggle="tooltip" data-html="true" data-bs-toggle="tooltip" data-bs-html="true"><?php echo $entry_pagespeed_css_min_font; ?></span></label>
            <div class="col-sm-10">
              <textarea name="pagespeed_css_min_font" rows="10" placeholder="<?php echo $entry_pagespeed_css_min_font; ?>" id="input-pagespeed-css-min-font" class="form-control"><?php echo $pagespeed_css_min_font; ?></textarea>
            </div>
          </div>
          <div class="form-group row mb-3">
            <label class="col-sm-2 control-label col-form-label" for="input-pagespeed-css-min-display"><span title="<?php echo $help_pagespeed_css_min_display; ?>" data-toggle="tooltip" data-html="true" data-bs-toggle="tooltip" data-bs-html="true"><?php echo $entry_pagespeed_css_min_display; ?></span></label>
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
          <div class="form-group row mb-3">
            <label class="col-sm-2 control-label col-form-label" for="input-pagespeed-css-critical"><span title="<?php echo $help_pagespeed_css_critical; ?>" data-toggle="tooltip" data-html="true" data-bs-toggle="tooltip" data-bs-html="true"><?php echo $entry_pagespeed_css_critical; ?></span></label>
            <div class="col-sm-10">
              <select name="pagespeed_css_critical" id="input-pagespeed-css-critical" class="form-control">
                <option value="0"<?php if (!$pagespeed_css_critical) { ?> selected="selected"<?php } ?>><?php echo $text_no; ?></option>
                <option value="1"<?php if ($pagespeed_css_critical == 1) { ?> selected="selected"<?php } ?>><?php echo $text_yes; ?></option>
              </select>
            </div>
          </div>
          <div class="form-group row mb-3">
            <label class="col-sm-2 control-label col-form-label" for="input-pagespeed-css-critical-time"><span title="<?php echo $help_pagespeed_css_critical_time; ?>" data-toggle="tooltip" data-html="true" data-bs-toggle="tooltip" data-bs-html="true"><?php echo $entry_pagespeed_css_critical_time; ?></span></label>
            <div class="col-sm-10">
              <input type="number" name="pagespeed_css_critical_time" value="<?php echo $pagespeed_css_critical_time; ?>" placeholder="<?php echo $entry_pagespeed_css_critical_time; ?>" id="input-pagespeed-css-critical-time" class="form-control" />
            </div>
          </div>
          <div class="form-group row mb-3">
            <label class="col-sm-2 control-label col-form-label" for="input-pagespeed-css-critical-elements"><span title="<?php echo $help_pagespeed_css_critical_elements; ?>" data-toggle="tooltip" data-html="true" data-bs-toggle="tooltip" data-bs-html="true"><?php echo $entry_pagespeed_css_critical_elements; ?></span></label>
            <div class="col-sm-10">
              <textarea name="pagespeed_css_critical_elements" rows="5" placeholder="<?php echo $entry_pagespeed_css_critical_elements; ?>" id="input-pagespeed-css-critical-elements" class="form-control"><?php echo $pagespeed_css_critical_elements; ?></textarea>
            </div>
          </div>
          <div class="form-group row mb-3">
            <label class="col-sm-2 control-label col-form-label" for="input-pagespeed-css-inline-transfer"><span title="<?php echo $help_pagespeed_css_inline_transfer; ?>" data-toggle="tooltip" data-html="true" data-bs-toggle="tooltip" data-bs-html="true"><?php echo $entry_pagespeed_css_inline_transfer; ?></span></label>
            <div class="col-sm-10">
              <select name="pagespeed_css_inline_transfer" id="input-pagespeed-css-inline-transfer" class="form-control">
                <option value="0"<?php if (!$pagespeed_css_inline_transfer) { ?> selected="selected"<?php } ?>><?php echo $text_no; ?></option>
                <option value="1"<?php if ($pagespeed_css_inline_transfer == 1) { ?> selected="selected"<?php } ?>><?php echo $text_pagespeed_inline_transfer_1; ?></option>
                <option value="2"<?php if ($pagespeed_css_inline_transfer == 2) { ?> selected="selected"<?php } ?>><?php echo $text_pagespeed_inline_transfer_2; ?></option>
                <option value="3"<?php if ($pagespeed_css_inline_transfer == 3) { ?> selected="selected"<?php } ?>><?php echo $text_pagespeed_inline_transfer_3; ?></option>
              </select>
            </div>
          </div>
          <div class="form-group row mb-3">
            <label class="col-sm-2 control-label col-form-label" for="input-pagespeed-css-events"><span title="<?php echo $help_pagespeed_css_events; ?>" data-toggle="tooltip" data-html="true" data-bs-toggle="tooltip" data-bs-html="true"><?php echo $entry_pagespeed_css_events; ?></span></label>
            <div class="col-sm-10">
              <textarea name="pagespeed_css_events" rows="5" placeholder="<?php echo $entry_pagespeed_css_events; ?>" id="input-pagespeed-css-events" class="form-control"><?php echo $pagespeed_css_events; ?></textarea>
            </div>
          </div>
          <div class="form-group row mb-3">
            <label class="col-sm-2 control-label col-form-label" for="input-pagespeed-css-style"><span title="<?php echo $help_pagespeed_css_style; ?>" data-toggle="tooltip" data-html="true" data-bs-toggle="tooltip" data-bs-html="true"><?php echo $entry_pagespeed_css_style; ?></span></label>
            <div class="col-sm-10">
              <textarea name="pagespeed_css_style" rows="10" placeholder="<?php echo $entry_pagespeed_css_style; ?>" id="input-pagespeed-css-style" class="form-control"><?php echo $pagespeed_css_style; ?></textarea>
            </div>
          </div>
          <div class="form-group row mb-3">
            <label class="col-sm-2 control-label col-form-label" for="input-pagespeed-js-replace"><b style="color:red">(навінка)</b> <span title="<?php echo $help_pagespeed_js_replace; ?>" data-toggle="tooltip" data-html="true" data-bs-toggle="tooltip" data-bs-html="true"><?php echo $entry_pagespeed_js_replace; ?></span></label>
            <div class="col-sm-10">
              <textarea name="pagespeed_js_replace" rows="10" placeholder="<?php echo $entry_pagespeed_js_replace; ?>" id="input-pagespeed-js-replaces" class="form-control"><?php echo $pagespeed_js_replace; ?></textarea>
            </div>
          </div>
          <div class="form-group row mb-3">
            <label class="col-sm-2 control-label col-form-label" for="input-pagespeed-js-min"><span title="<?php echo $help_pagespeed_js_min; ?>" data-toggle="tooltip" data-html="true" data-bs-toggle="tooltip" data-bs-html="true"><?php echo $entry_pagespeed_js_min; ?></span></label>
            <div class="col-sm-10">
              <input type="number" name="pagespeed_js_min" value="<?php echo $pagespeed_js_min; ?>" placeholder="<?php echo $entry_pagespeed_js_min; ?>" id="input-pagespeed-js-min" class="form-control" />
            </div>
          </div>
          <div class="form-group row mb-3">
            <label class="col-sm-2 control-label col-form-label" for="input-pagespeed-js-min-links"><span title="<?php echo $help_pagespeed_js_min_links; ?>" data-toggle="tooltip" data-html="true" data-bs-toggle="tooltip" data-bs-html="true"><?php echo $entry_pagespeed_js_min_links; ?></span></label>
            <div class="col-sm-10">
              <!--[header] [footer] [async] [defer] [prelod] [prefetch] [dns-prefetch] [preconnect] [event] [event-2000]-->
              чтобы отложить загрузку после ссылки пропишите "|after"
              <textarea name="pagespeed_js_min_links" rows="10" placeholder="<?php echo $entry_pagespeed_js_min_links; ?>" id="input-pagespeed-js-min-links" class="form-control"><?php echo $pagespeed_js_min_links; ?></textarea>
            </div>
          </div>
          <div class="form-group row mb-3">
            <label class="col-sm-2 control-label col-form-label" for="input-pagespeed-js-min-download"><span title="<?php echo $help_pagespeed_js_min_download; ?>" data-toggle="tooltip" data-html="true" data-bs-toggle="tooltip" data-bs-html="true"><?php echo $entry_pagespeed_js_min_download; ?></span></label>
            <div class="col-sm-10">
              <textarea name="pagespeed_js_min_download" rows="5" placeholder="<?php echo $entry_pagespeed_js_min_download; ?>" id="input-pagespeed-js-min-download" class="form-control"><?php echo $pagespeed_js_min_download; ?></textarea>
            </div>
          </div>
          <div class="form-group row mb-3">
            <label class="col-sm-2 control-label col-form-label" for="input-pagespeed-js-min-exception"><span title="<?php echo $help_pagespeed_js_min_exception; ?>" data-toggle="tooltip" data-html="true" data-bs-toggle="tooltip" data-bs-html="true"><?php echo $entry_pagespeed_js_min_exception; ?></span></label>
            <div class="col-sm-10">
              <!--[header] [footer] [async] [defer] [prelod] [prefetch] [dns-prefetch] [preconnect] [event] [event-2000]-->
              чтобы отложить загрузку после ссылки пропишите "|after"
              <textarea name="pagespeed_js_min_exception" rows="10" placeholder="<?php echo $entry_pagespeed_js_min_exception; ?>" id="input-pagespeed-js-min-exception" class="form-control"><?php echo $pagespeed_js_min_exception; ?></textarea>
            </div>
          </div>
          <div class="form-group row mb-3">
            <label class="col-sm-2 control-label col-form-label" for="input-pagespeed-js-inline-event"><span title="<?php echo $help_pagespeed_js_inline_event; ?>" data-toggle="tooltip" data-html="true" data-bs-toggle="tooltip" data-bs-html="true"><?php echo $entry_pagespeed_js_inline_event; ?></span></label>
            <div class="col-sm-10">
              <textarea name="pagespeed_js_inline_event" rows="10" placeholder="<?php echo $entry_pagespeed_js_inline_event; ?>" id="input-pagespeed-js-inline-event" class="form-control"><?php echo $pagespeed_js_inline_event; ?></textarea>
            </div>
          </div>
          <div class="form-group row mb-3">
            <label class="col-sm-2 control-label col-form-label" for="input-pagespeed-js-inline-event-time"><span title="<?php echo $help_pagespeed_js_inline_event_time; ?>" data-toggle="tooltip" data-html="true" data-bs-toggle="tooltip" data-bs-html="true"><?php echo $entry_pagespeed_js_inline_event_time; ?></span></label>
            <div class="col-sm-10">
              <input type="number" name="pagespeed_js_inline_event_time" value="<?php echo $pagespeed_js_inline_event_time; ?>" placeholder="<?php echo $entry_pagespeed_js_inline_event_time; ?>" id="input-pagespeed-js-inline-event-time" class="form-control" />
            </div>
          </div>
          <div class="form-group row mb-3">
            <label class="col-sm-2 control-label col-form-label" for="input-pagespeed-js-inline-transfer"><span title="<?php echo $help_pagespeed_js_inline_transfer; ?>" data-toggle="tooltip" data-html="true" data-bs-toggle="tooltip" data-bs-html="true"><?php echo $entry_pagespeed_js_inline_transfer; ?></span></label>
            <div class="col-sm-10">
              <select name="pagespeed_js_inline_transfer" id="input-pagespeed-js-inline-transfer" class="form-control">
                <option value="0"<?php if (!$pagespeed_js_inline_transfer) { ?> selected="selected"<?php } ?>><?php echo $text_no; ?></option>
                <option value="1"<?php if ($pagespeed_js_inline_transfer == 1) { ?> selected="selected"<?php } ?>><?php echo $text_pagespeed_inline_transfer_1; ?></option>
                <option value="2"<?php if ($pagespeed_js_inline_transfer == 2) { ?> selected="selected"<?php } ?>><?php echo $text_pagespeed_inline_transfer_2; ?></option>
                <option value="3"<?php if ($pagespeed_js_inline_transfer == 3) { ?> selected="selected"<?php } ?>><?php echo $text_pagespeed_inline_transfer_3; ?></option>
                <option value="4"<?php if ($pagespeed_js_inline_transfer == 4) { ?> selected="selected"<?php } ?>><?php echo $text_pagespeed_inline_transfer_4; ?></option>
              </select>
            </div>
          </div>
          <div class="form-group row mb-3">
            <label class="col-sm-2 control-label col-form-label" for="input-pagespeed-js-inline-transfer-onrot"><b style="color:red">(навінка)</b> <span title="<?php echo $help_pagespeed_js_inline_transfer_onrot; ?>" data-toggle="tooltip" data-html="true" data-bs-toggle="tooltip" data-bs-html="true"><?php echo $entry_pagespeed_js_inline_transfer_onrot; ?></span></label>
            <div class="col-sm-10">
              <textarea name="pagespeed_js_inline_transfer_onrot" rows="5" placeholder="<?php echo $entry_pagespeed_js_inline_transfer_onrot; ?>" id="input-pagespeed-js-inline-transfer-onrot" class="form-control"><?php echo $pagespeed_js_inline_transfer_onrot; ?></textarea>
            </div>
          </div>
          <div class="form-group row mb-3">
            <label class="col-sm-2 control-label col-form-label" for="input-pagespeed-js-inline-exception"><b style="color:red">(навінка)</b> <span title="<?php echo $help_pagespeed_js_inline_exception; ?>" data-toggle="tooltip" data-html="true" data-bs-toggle="tooltip" data-bs-html="true"><?php echo $entry_pagespeed_js_inline_exception; ?></span></label>
            <div class="col-sm-10">
              <textarea name="pagespeed_js_inline_exception" rows="5" placeholder="<?php echo $entry_pagespeed_js_inline_exception; ?>" id="input-pagespeed-js-inline-exception" class="form-control"><?php echo $pagespeed_js_inline_exception; ?></textarea>
            </div>
          </div>
          <div class="form-group row mb-3">
            <label class="col-sm-2 control-label col-form-label" for="input-pagespeed-js-events"><span title="<?php echo $help_pagespeed_js_events; ?>" data-toggle="tooltip" data-html="true" data-bs-toggle="tooltip" data-bs-html="true"><?php echo $entry_pagespeed_js_events; ?></span></label>
            <div class="col-sm-10">
              <textarea name="pagespeed_js_events" rows="5" placeholder="<?php echo $entry_pagespeed_js_events; ?>" id="input-pagespeed-js-events" class="form-control"><?php echo $pagespeed_js_events; ?></textarea>
            </div>
          </div>
          <div class="form-group row mb-3">
            <label class="col-sm-2 control-label col-form-label" for="input-pagespeed-js-script"><span title="<?php echo $help_pagespeed_js_script; ?>" data-toggle="tooltip" data-html="true" data-bs-toggle="tooltip" data-bs-html="true"><?php echo $entry_pagespeed_js_script; ?></span></label>
            <div class="col-sm-10">
              <textarea name="pagespeed_js_script" rows="10" placeholder="<?php echo $entry_pagespeed_js_script; ?>" id="input-pagespeed-js-script" class="form-control"><?php echo $pagespeed_js_script; ?></textarea>
            </div>
          </div>
          <legend><b><?php echo $tab_support; ?></b></legend>
          <div class="form-group row mb-3">
            <label class="col-sm-2 control-label col-form-label" style="padding:0;"><b style="color:red">(навінка)</b> <?php echo $text_cache_total; ?></label>
            <div class="col-sm-10"><?php echo $cache_total; ?></div>
          </div>
          <div class="form-group row mb-3">
            <label class="col-sm-2 control-label col-form-label" style="padding:0;"><b style="color:red">(навінка)</b> <?php echo $text_cache_size; ?></label>
            <div class="col-sm-10"><?php echo $cache_size; ?></div>
          </div>
          <div class="form-group row mb-3">
            <label class="col-sm-2 control-label col-form-label" style="padding:0;"><b style="color:red">(навінка)</b> <?php echo $text_disc_free; ?></label>
            <div class="col-sm-10"><?php echo $disc_free; ?></div>
          </div>
          <div class="form-group row mb-3">
            <label class="col-sm-2 control-label col-form-label" for="input-debug"><span title="<?php echo $help_debug; ?>" data-toggle="tooltip" data-html="true" data-bs-toggle="tooltip" data-bs-html="true"><?php echo $entry_debug; ?></span></label>
            <div class="col-sm-10">
              <select name="debug" id="input-debug" class="form-control">
                <option value="0"<?php if (!$debug) { ?> selected="selected"<?php } ?>><?php echo $text_no; ?></option>
                <option value="1"<?php if ($debug == 1) { ?> selected="selected"<?php } ?>><?php echo $text_yes; ?></option>
                <option value="2"<?php if ($debug == 2) { ?> selected="selected"<?php } ?>><?php echo $text_debug_2; ?></option>
                <option value="3"<?php if ($debug == 3) { ?> selected="selected"<?php } ?>><?php echo $text_debug_3; ?></option>
                <option value="4"<?php if ($debug == 4) { ?> selected="selected"<?php } ?>><?php echo $text_debug_4; ?></option>
                <option value="5"<?php if ($debug == 5) { ?> selected="selected"<?php } ?>><?php echo $text_debug_5; ?></option>
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
		if ($('select[name="cache_status"]').val() > 0) {
			$('textarea[name="cache_ses"]').parent().parent().fadeIn();
			$('textarea[name="cache_onrot"]').parent().parent().fadeIn();
			$('textarea[name="cache_rot"]').parent().parent().fadeIn();
			$('select[name="cache_customer"]').parent().parent().fadeIn();
			$('input[name="cache_cart_count"]').parent().parent().fadeIn();
			$('input[name="cache_expire_all"]').parent().parent().fadeIn();
		} else {
			$('textarea[name="cache_ses"]').parent().parent().fadeOut(1);
			$('textarea[name="cache_onrot"]').parent().parent().fadeOut(1);
			$('textarea[name="cache_rot"]').parent().parent().fadeOut(1);
			$('select[name="cache_customer"]').parent().parent().fadeOut(1);
			$('input[name="cache_cart_count"]').parent().parent().fadeOut(1);
			$('input[name="cache_expire_all"]').parent().parent().fadeOut(1);
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

	var elements, i;
	elements = document.querySelectorAll('textarea');

	for (i = 0; i < elements.length; i++) {
		elements[i].addEventListener('keydown', function(e) {
			if (e.key == 'Tab') {
				e.preventDefault();
				this.value = this.value.substring(0, this.selectionStart) + "\t" + this.value.substring(this.selectionEnd);
				this.selectionStart = this.selectionEnd = this.selectionStart + 1;
			}
		});
	}

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