<?php
// *   Аўтар: "БуслікДрэў" ( https://buslikdrev.by/ )
// *   © 2016-2021; BuslikDrev - Усе правы захаваныя.
// *   Спецыяльна для сайта: "OpenCart.pro" ( https://opencart.pro/ )

// Heading
$_['heading_title']                              = '<b>Buslik Cache <span style="color:blue">Lite</span></b> v' . (isset($this->data['bus_cache_version']) ? $this->data['bus_cache_version'] : '1.0');
$_['heading_description']                        = '';

// Tab
$_['tab_setting']                                = 'Settings';
$_['tab_cache']                                  = 'Кэширование';
$_['tab_pagespeed']                              = 'PageSpeed';
$_['tab_support']                                = 'Technical Support';

// Text
$_['text_extension']                             = 'Extensions';
$_['text_module']                                = 'Modules';
$_['text_edit']                                  = 'Editing';
$_['text_min']                                   = 'Min';
$_['text_max']                                   = 'Max';
$_['text_yes']                                   = 'Yes';
$_['text_no']                                    = 'No';
$_['text_enabled']                               = 'Enabled';
$_['text_disabled']                              = 'Disabled';
$_['text_all']                                   = ' --- All --- ';
$_['text_none']                                  = ' --- None --- ';
$_['text_select']                                = ' --- Please Select --- ';
$_['text_select_all']                            = 'Select All';
$_['text_width']                                 = 'Width';
$_['text_height']                                = 'Height';
$_['text_install']                               = 'Installing module...';
$_['text_uninstall']                             = 'Uninstalling module...';
$_['text_uninstall_files']                       = 'Removing module files...';
$_['text_uninstall_files_log']                   = 'Report on deleting module files';
$_['text_ocmod_clear']                           = 'Clearing modification...';
$_['text_ocmod_clearlog']                        = 'Clearing modification log...';
$_['text_ocmod_refresh']                         = 'Updating modification...';
$_['text_cache_clear']                           = 'Clearing the cache...';
$_['text_processing']                            = 'Processing';
$_['text_loading']                               = 'Loading';
$_['text_start']                                 = 'Start';
$_['text_continue']                              = 'Continue';
$_['text_pause']                                 = 'Pause';
$_['text_restart']                               = 'Restart';
$_['text_link']                                  = 'Link';
$_['text_default']                               = 'Default';
$_['text_guest']                                 = 'Guest';
$_['text_dir_1']                                 = 'Right to Left';
$_['text_dir_2']                                 = 'Left to Right';
$_['text_time_php']                              = 'Затрачено времени PHP: %s секунд';
$_['text_time_js']                               = 'Затрачено времени JavaScript: %s секунд';
$_['text_total']                                 = 'Всего файлов обработано:';
$_['text_path']                                  = 'Path';
$_['text_no_results']                            = 'No results';
$_['text_confirm']                               = 'Are you sure?';
$_['text_author']                                = 'Author: <a href="https://buslikdrev.by/" title="Handicraft products" rel="noreferrer noopener" target="_blank">BuslickDrev</a>. Those. Support: <a href="https://liveopencart.ru/buslikdrev" title="Technical help on solving problems associated with the module "rel="noreferrer noopener" target="_blank">HERE</a>. Theme of support: <a href="https://forum.opencart.pro/topic/6191-буслік-кэш-buslik-cache/" title="Technical help on solving the problems associated with the module" rel="noreferrer noopener" target="_blank">HERE</a>.';
$_['text_corp']                                  = '© 2016-' . date('d.m.Y') . '; <a href="https://buslikdrev.by/" title="BuslikDrev" rel="noreferrer noopener" target="_blank">BuslikDrev</a> - All rights reserved.';

// Entry
$_['entry_status']                               = 'Status';
$_['entry_store']                                = 'Store';
$_['entry_cache_status']                         = 'Enable Caching';
$_['entry_cache_customer']                       = 'Caching for logged in customers?';
$_['entry_cache_oc']                             = 'Monitor OpenCart Cache';
$_['entry_cache_engine']                         = 'Cache Type';
$_['entry_cache_expire']                         = 'Cache lifetime';
$_['entry_cache_ses']                            = 'Session Parameters';
$_['entry_cache_onrot']                          = 'Work parameters';
$_['entry_cache_rot']                            = 'Exception Options';
$_['entry_cache_device']                         = 'Enable mobile device detection';
$_['entry_pagespeed_status']                     = 'Enable Optimization (PageSpeed)';
$_['entry_pagespeed_preload_logo']               = 'Preload Site Logo';
$_['entry_pagespeed_attribute_w_h']              = 'Enable Width and Height Attributes';
$_['entry_pagespeed_lazy_load']                  = 'Enable Lazy load';
$_['entry_pagespeed_html_min']                   = 'Compress html code';
$_['entry_pagespeed_css_min']                    = 'Compress css code';
$_['entry_pagespeed_css_min_links']              = 'Links to css files';
$_['entry_pagespeed_css_min_download']           = 'Links to css files for download';
$_['entry_pagespeed_css_min_exception']          = 'Exception from css compression';
$_['entry_pagespeed_css_min_font']               = 'Preload fonts or images';
$_['entry_pagespeed_css_min_display']            = 'Font-Display';
$_['entry_pagespeed_js_min']                     = 'Compress js code';
$_['entry_pagespeed_js_min_links']               = 'Links to js files';
$_['entry_pagespeed_js_min_exception']           = 'Exception from js compression';
$_['entry_pagespeed_rot']                        = 'Exception Options';
$_['entry_debug']                                = 'Enable Debug';

// Help
$_['help_status']                                = 'If disabled, then all functionality below will be disabled.';
$_['help_store']                                 = 'Select stores where the module will work.';
$_['help_cache_status']                          = 'If yes, whole pages will be cached.';
$_['help_cache_oc']                              = 'If yes, then the cache of other modules will be controlled by the Buslik Cache settings.';
$_['help_cache_engine']                          = 'The default File.<br />APC is a cache of opcodes and data storage using RAM, suitable for those who do not have the OPCache extension;<br />APCu is the new version of APC intended only for storing data using RAM. It is recommended to enable OPCache on the server;<br />Buslik - the same as File, but allows you to store cache files by dividing them into folders depending on the store, language, customer group, device, category and manufacturer, thereby speeding up the search for the desired cache file and allows you to store more;<br />File - standard storage of cache files in system/storage/cache/;<br />Memcache - caching data in RAM based on a hash table;<br />Memcached - a new version of Memcache for caching data in RAM based on a hash table; <br /> Redis is the same as Memcached, but with more features;';
$_['help_cache_expire']                          = 'The default is 3600 seconds. The cache lifetime is specified in seconds.';
$_['help_cache_ses']                             = 'Specify session parameters to change the cache.';
$_['help_cache_onrot']                           = 'Specify the route of the modules or their keyword (seo_url) for the exact operation of the module (When filling in, the exclusion parameters will not work).';
$_['help_cache_rot']                             = 'Specify the module route or their keyword (seo_url) to exclude from the cache.';
$_['help_cache_device']                          = 'If yes, the cache will be created separately for different devices.';
$_['help_pagespeed_status']                      = 'Enabling optimization should speed up the delivery of content, thereby making your site fall in love with search robots, which means that the position in the search results should be higher.';
$_['help_pagespeed_preload_logo']                = 'Enabling this feature should help remove design shifts due to logo loading during design loading.';
$_['help_pagespeed_attribute_w_h']               = 'Enabling this function will add width and height attributes to all images that have their dimensions in their names, for example, image-100x100.jpg';
$_['help_pagespeed_lazy_load']                   = 'Choose an option to upload images.';
$_['help_pagespeed_html_min']                    = 'Choose the option to compress html code. 0 - no compression, 4 maximum compression.';
$_['help_pagespeed_css_min']                     = 'Select the css compression option. 0 - no assembly, 1 - no compression assembly, 5 maximum compression. If enabled, then all style files that OpenCart processes according to the standard will be combined into one file and compressed as much as possible.';
$_['help_pagespeed_css_min_links']               = 'Add a link to the css style that is not included in the general style file (to work from other sites, include the link in the download field as well). The value is set starting on a new line. If you do not want to delete, then set \' ; \'.';
//$_['help_pagespeed_css_min_links']               = 'Add a link to the css style that is not included in the general style file (to work from other sites, include the link in the download field as well). The value is set starting on a new line. If you do not want to delete, then set \' ; \'. If you want to specify your own attributes, then after the link set \' | \'and fill in the attributes, for example, catalog/style.css|type=&quot;text/css&quot; rel="preload"<br />You can also specify the following parameters at the beginning of the link (the attributes are up above the parameters):<br />[footer] - send the link to the bottom of the site;<br />[prelod] - asks the browser preload;<br />[prefetch] - asks the browser to postpone the download to the end;<br />[dns-prefetch] - asks the browser to perform DNS resolving for the domain in advance;<br />[preconnect] - asks the browser to connect to domain;';
$_['help_pagespeed_css_min_download']            = 'Add a link to the css style that you want to download to your site (it will download when you save the settings, it is recommended to save the current settings first). If you do not want to delete, then set \' ; \'.';
$_['help_pagespeed_css_min_exception']           = 'Add a link to the css style you want to exclude and send along your way. The value is set starting on a new line. If you do not want to delete, then set \' ; \'.';
$_['help_pagespeed_css_min_font']                = 'Add a link to the font or picture that Pagespeed swears at - asks to preload. The value is set starting on a new line. If you do not want to delete, then set \' ; \'. You can also specify the domain name of third-party fonts along with the style link in which the fonts are loaded by separating \' | \' then this domain name will be predefined (dns-prefetch, preconnect), e.g. https://fonts.gstatic.com/|https://fonts.googleapis.com/css?family=Open+Sans:400,400i,300,700&display=swap';
$_['help_pagespeed_css_min_display']             = 'Enable this feature so that the font-display property is set to 100% for fonts so that no invisible text is shown.';
$_['help_pagespeed_js_min']                      = 'Select the js code compression option. 0 - no assembly, 1 - assembly without compression, 4 - maximum compression. If enabled, then all script files processed by OpenCart according to the standard will be combined into one file and compressed as much as possible.';
$_['help_pagespeed_js_min_links']                = 'Add a link to a js script that is not included in the general script file. The value is set starting on a new line. If you do not want to delete, then install \' ; \'.';
//$_['help_pagespeed_js_min_links']                = 'Add a link to a js script that is not included in the general script file. The value is set starting on a new line. If you do not want to delete, then install \' ; \'. If you want to specify your own attributes, then after the link set \' | \'and fill in the attributes, for example, catalog/style.css|type=&quot;text/css&quot; rel="preload"<br />You can also specify the following parameters at the beginning of the link (the attributes are up above the parameters):<br />[footer] - send the link to the bottom of the site;<br />[prelod] - asks the browser preload;<br />[prefetch] - asks the browser to postpone the download to the end;<br />[dns-prefetch] - asks the browser to perform DNS resolving for the domain in advance;<br />[preconnect] - asks the browser to connect to domain;';
$_['help_pagespeed_js_min_exception']            = 'Add a link to the js script you want to exclude and send along your path. For example, there are scripts that are completely independent and do not block the rendering of the page, so you should not compress them with others. this can aggravate optimization. The value is set starting on a new line. If you do not want to delete, then set \' ; \'.';
$_['help_pagespeed_rot']                         = 'Specify the route of modules or their keyword (seo_url) to exclude from optimization.';
$_['help_debug']                                 = 'If yes, then the information about the page load time will be displayed for the administrator above the site header, and the cache will start working.';

//Button
$_['button_files_clear']                         = 'Delete also module files? - if not, just refresh the page from sin. See the file deletion report in the modifier logs.';
$_['button_add']                                 = 'Add';
$_['button_delete']                              = 'Delete';
$_['button_clear']                               = 'Clear cache';
$_['button_save']                                = 'Save';
$_['button_apply']                               = 'Apply';
$_['button_apply_piecemeal']                     = 'Apply in parts';
$_['button_export']                              = 'Export';
$_['button_import']                              = 'Import';
$_['button_start']                               = 'Start download';
$_['button_continue']                            = 'Continue loading from where it stopped';
$_['button_pause']                               = 'Pause download';
$_['button_restart']                             = 'Restart download - start over';
$_['button_search']                              = 'Search';
$_['button_edit']                                = 'Edit';

// Error
$_['error_permission']                           = 'You do not have permission to make changes!';
$_['error_warning']                              = 'Carefully check the form for errors!';
$_['error_install']                              = 'Something went wrong!';
$_['error_uninstall']                            = 'Something went wrong!';
$_['error_name']                                 = 'The name must contain from 3 to 64 characters!';
$_['error_width']                                = 'Specify the Width!';
$_['error_height']                               = 'Specify Height!';
$_['error_max_input_vars']                       = '<b>Warning! The %s parameter limit will be exceeded</b>, if exceeded, the data may not be saved. Increase the value on the server or contact the hoster with this request to increase the limit. Or use the apply parts button.<br>Server limit: %s <br>Module limit: %s - cutoff %s to avoid data loss<br>Current value: ';
$_['error_setting_import']                       = 'The file does not contain the module settings, import is denied!';
$_['error_setting_import_format']                = 'The module does not know about this format, import is denied! - the module sent you softly.';
$_['error_not_required']                         = 'Not required!';

// Success
$_['success_install']                            = ' - successfully installed!';
$_['success_uninstall']                          = ' - successfully uninstalled!';
$_['success_uninstall_data_base']                = '◄ DataBase uninstalled ►: ';
$_['success_uninstall_modification']             = '◄ Modification uninstalled ►: ';
$_['success_uninstall_folder']                   = '◄ Folder uninstalled because there are no files ►: ';
$_['success_uninstall_file']                     = '◄ File uninstalled ►: ';
$_['success_update']                             = ' - successfully updated!';
$_['success_setting']                            = 'Settings changed successfully!';
$_['success_setting_apply']                      = 'Settings changed apply!';
$_['success_setting_save']                       = 'Settings changed save!';
$_['success_setting_new']                        = 'New module added successfully!';
$_['success_setting_redirect']                   = 'You have been redirected to the desired settings page!';
$_['success_setting_import']                     = 'Module settings "%s" were successfully imported into the module, you just have to apply them!';
$_['success_add']                                = 'Successfully added!';
$_['success_delete']                             = 'Successfully deleted!';
$_['success_clear']                              = 'Successfully cleared!';