<?php
/**
 * ShopEx licence
 *
 * @copyright  Copyright (c) 2005-2010 ShopEx Technologies Inc. (http://www.shopex.cn)
 * @license  http://ecos.shopex.cn/ ShopEx License
 */

return array (
    'columns' =>
    array (
        'essay_id' =>array (
            'type' => 'number',
            'required' => true,
            'comment'=> app::get('syscase')->_('解决方案文章ID'),
            'autoincrement' => true,   //序号自增
            'width' => 50,
            'order'=>1,
            ),
        'title' =>array (
            'type' => 'string',     //字段类型
            'searchtype' => 'has',    //搜索的类型
            'filtertype' => 'normal', //高级筛选的过滤类型，normal按type来生成过滤
            'filterdefault' => 'true',//默认在高级筛选中显示
            'required' => true,   //必填项，不能为空，默认为falsse
            'in_list' => true,  //显示在列表项中
            'default_in_list' => true,  //默认显示在列表项中
            'label' => app::get('syscase')->_('文章名称'),  //显示的名称
            'order'=>2,   //列表中的权重，越小越靠前！
            ),
        'essaycat_id' => array(
            'type' => 'table:essaycat@syscase',
            'filtertype' => 'normal',
            'filterdefault' => 'true',
            'required' => true,
            'in_list' => true,  //显示在列表项中
            'default_in_list' => true,  //默认显示在列表项中
            'label' => app::get('syscase')->_('类型'),
            'comment' => app::get('syscase')->_('类型'),
            'order'=>5,
            ),
        'essay_logo' => array(
            'type' => 'string',
            'in_list' => true,
            'label' => app::get('syscase')->_('列表图片'),
            'order'=>9,
            'comment' => app::get('syscase')->_('列表图片'),
            ),
        'pubtime' => array(
            'type' => 'time',
            'in_list' => true,
            'default_in_list' => true,
            'comment' => app::get('syscase')->_('发布时间（无需精确到秒）'),
            'label' => app::get('syscase')->_('发布时间'),
            'editable' => true,
            'width' => 130,
            'order'=>6,
            ),
        'modified'=> array (
            'type' => 'time',
            'editable' => true,
            'in_list' => true,
            'label' => app::get('syscase')->_('修改时间'),
            'comment' => app::get('syscase')->_('修改时间'),
            ),
        'towhere' =>array(
            'type' => array(
                '0' => app::get('syscase')->_('否'),
                '1' => app::get('syscase')->_('是'),
            ),
            'default' => '0',
            'required' => true,
            'in_list' => true,
            'default_in_list' => true,
            'comment' => app::get('syscase')->_('是否发布'),
            'label' => app::get('syscase')->_('是否发布'),
            'width' => 40,
            'order'=>11,
            ),
        'click_count' =>array (
            'type' => 'number',
            'in_list' => true,
            'default' => 0,
            'default_in_list' => true,
            'label' => app::get('sysplan')->_('点击量'),
            'comment'=> app::get('sysplan')->_('点击量'),
            'order'=>10,
            ),
        'abstract' => array(
            'type' => 'text',
            'required' => true,
            'in_list' => true,
            'label' => app::get('syscase')->_('摘要'),
            'comment' => app::get('syscase')->_('摘要'),
            'order'=>7,
            ),
        'context' => array(
            'type' => 'text',
            'required' => true,
            'in_list' => true,
            'label' => app::get('syscase')->_('文章内容'),
            'comment' => app::get('syscase')->_('文章内容'),
            'order'=>5,
        ),

        'istop' =>array(
            'type' => array(
                '0' => app::get('sysexpert')->_('否'),
                '1' => app::get('sysexpert')->_('是'),
            ),
            'default' => '0',
            'in_list' => true,
            'default_in_list' => true,
            'comment' => app::get('sysexpert')->_('是否置顶'),
            'label' => app::get('sysexpert')->_('是否置顶'),
            'width' => 40,
            'order'=>11,
            ),
        'ishot'=>array(
            'type' => array(
                '0' => app::get('sysexpert')->_('否'),
                '1' => app::get('sysexpert')->_('是'),
            ),
            'default' => '0',
            'in_list' => true,
            'default_in_list' => true,
            'comment' => app::get('sysexpert')->_('是否热门'),
            'label' => app::get('sysexpert')->_('是否热门'),
            'width' => 40,
            'order'=>11,
            ),
       

  ),
    'primary' => 'essay_id',
    'comment' => app::get('syscase')->_('解决方案文章表'),
);
