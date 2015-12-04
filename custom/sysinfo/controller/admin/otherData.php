<?php
/**
 * ShopEx licence
 *
 * @copyright  Copyright (c) 2005-2010 ShopEx Technologies Inc. (http://www.shopex.cn)
 * @license  http://ecos.shopex.cn/ ShopEx License
 */
 

/*
 * @package content
 * @subpackage article
 * @copyright Copyright (c) 2010, shopex. inc
 * @author edwin.lzh@gmail.com
 * @license 
 */

class sysinfo_ctl_admin_otherData extends desktop_controller
{
    var $workground = 'sysinfo.wrokground.theme';
    public function index() 
    {
        return $this->finder('sysinfo_mdl_otherData', array(
            'title'=>app::get('sysinfo')->_('行情其他数据'),
            'use_buildin_set_tag' => true,
            'use_buildin_filter' => true,
            ));
    }
}
