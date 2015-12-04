<?php
// 商品招标
return array (
    'columns' =>
    array (
        'tender_id' =>
        array (
            'type' => 'number',
            'required' => true,
            'autoincrement' => true,
            'editable' => false,
            'comment' => app::get('sysshoppubt')->_('商品招标主键'),
        ),
        
       'shop_id' => array(
            'type' => 'table:shop@sysshop',
            'required' => true,
            'comment' => app::get('sysshoppubt')->_('所属企业'),
             'label' => app::get('sysshoppubt')->_('所属企业'),
        ),
        'uniqid'=>array(
            'type' => 'string',
            'length' => 190,
            'label' => app::get('sysshoppubt')->_('id'),
            'comment' => app::get('sysshoppubt')->_('id'),
        ),
         'shop_name'=>array(
            //'type'=>'varchar(50)',
            'type' => 'string',
            'length' => 50,
            'in_list'=>true,
            'width' => 110,
            'default_in_list'=>true,
            'is_title' => true,
            'searchtype' => 'has',
            'filtertype' => true,
            'filterdefault' => 'true',
            'label' => app::get('sysshoppubt')->_('企业名称'),
             'label' => app::get('sysshoppubt')->_('企业名称'),
            'order' => 13,
        ),
        'trading_title' => array(
            //'type' => 'varchar(60)',
            'type' => 'string',
            'length' => 90,
            'width' => 210,
            'required' => true,
            'default' => '',
            'in_list'=>true,
            'default_in_list'=>true,
            'is_title' => true,
            'searchtype' => 'has',
            'filtertype' => true,
            'filterdefault' => 'true',
            'comment' => app::get('sysshoppubt')->_('交易标题'),
             'label' => app::get('sysshoppubt')->_('交易标题'),
            'order' =>2,
        ),

        'start_time' => array(
            'type' => 'time',
            'comment' => app::get('sysshoppubt')->_('招标开始时间'),
             'label' => app::get('sysshoppubt')->_('招标开始时间'),
            'width' => 110,
            'in_list'=>true,
            'default_in_list'=>true,
            'is_title' => true,
            'filtertype' => true,
            'filterdefault' => 'true',
            'order' => 5,
        ),
        'stop_time' => array(
            'type' => 'time',
            'comment' => app::get('sysshoppubt')->_('招标结束时间'),
             'label' => app::get('sysshoppubt')->_('招标结束时间'),
            'width' => 110,
            'in_list'=>true,
            'default_in_list'=>true,
            'is_title' => true,
            'filtertype' => true,
            'filterdefault' => 'true',
            'order' => 6,
        ),
         'advice' =>
        array (
            'type' => array(
                '1' => app::get('sysshoppubt')->_('否'),
                '2' => app::get('sysshoppubt')->_('是'),
            ),
            'default' => '1',
            'label' => app::get('sysshoppubt')->_('是否需要价格建议'),
            'width' => 110,
            'in_list'=>true,
            'default_in_list'=>true,
            'is_title' => true,
            'filtertype' => true,
            'filterdefault' => 'true',
            'order' =>10,
        ),

        'is_through' => array(
            'type' => array(
                1 => app::get('sysshoppubt')->_('是'),
                2 => app::get('sysshoppubt')->_('否'),
            ),
            'default' => 2,
            'comment' => app::get('sysshoppubt')->_('是否审核通过'),
            'label' => app::get('sysshoppubt')->_('是否审核通过'),
            'width' => 110,
            'in_list'=>true,
            'default_in_list'=>true,
            'is_title' => true,
            'order' => 20,
        ),
        
     'through_time' => array(
            'type' => 'time',
            'label' => app::get('sysshoppubt')->_('审核通过时间'),
            'comment' => app::get('sysshoppubt')->_('审核通过时间'),
            'in_list' => true,
            'default_in_list' => false,
            'order'=>21,
        ),
        'trade_type' =>
        array (
            'type' => array(
                '1' => app::get('sysshoppubt')->_('一次出货'),
                '2' => app::get('sysshoppubt')->_('多次出货'),
            ),
            'default' => '1',
            'label' => app::get('sysshoppubt')->_('出货方式'),
            'width' => 110,
            'in_list'=>true,
            'default_in_list'=>true,
            'is_title' => true,
            'filtertype' => true,
            'filterdefault' => 'true',
            'order' => 9,
        ),
        'add_price' => array(
            'type' => 'float',
            'label' => app::get('sysshoppubt')->_('最小加价幅度百分比'),
            'width' => 110,
            'in_list'=>true,
            'default_in_list'=>true,
            'is_title' => true,
            'filtertype' => true,
            'filterdefault' => 'true',
            'order' => 11,
        ),
        'ensurence' => array(
            'type' => 'money',
            'label' => app::get('sysshoppubt')->_('保证金'),
            'width' => 110,
            'in_list'=>true,
            'default_in_list'=>true,
            'is_title' => true,
            'filtertype' => true,
            'filterdefault' => 'true',
            'order' => 12,
        ),
        'fund_trend' => array(
            'type' => array(
                '1' => app::get('sysshoppubt')->_('平台担保交易'),
                '2' => app::get('sysshoppubt')->_('自行线下支付'),
            ),
            'default' => '2',
            'label' => app::get('sysshoppubt')->_('资金走向'),
            'width' => 110,
            'in_list'=>true,
            'default_in_list'=>true,
            'is_title' => true,
            'filtertype' => true,
            'filterdefault' => 'true',
            'order' => 14,
        ),
        'public_item' => array(
            'type' => 'string',
            'length' => 90,
            'width' => 210,
            'required' => true,
            'default' => '',
            'in_list'=>true,
            'default_in_list'=>true,
            'is_title' => true,
            'searchtype' => 'has',
            'filtertype' => true,
            'filterdefault' => 'true',
            'comment' => app::get('sysshoppubt')->_('公开要素'),
             'label' => app::get('sysshoppubt')->_('公开要素'),
            'order' =>15,
        ),

        'limitation' =>
        array (
            'type' => array(
                '1' => app::get('sysshoppubt')->_('否'),
                '2' => app::get('sysshoppubt')->_('是'),
            ),
            'default' => '1',
            'label' => app::get('sysshoppubt')->_('是否限制与企业'),
            'width' => 110,
            'in_list'=>true,
            'default_in_list'=>true,
            'is_title' => true,
            'filtertype' => true,
            'filterdefault' => 'true',
            'order' =>17,
        ),


        'attendcount' => array(
            'type' => 'string',
            'length' => 10,
            'default' => 0,
            'comment' => app::get('sysshoppubt')->_('參加看样人数'),
            'label' => app::get('sysshoppubt')->_('參加看样人数'),

        ),


        'seegoods_stime' => array(
            'type' => 'time',
            'label' => app::get('sysshoppubt')->_('看样结束时间'),
            'comment' => app::get('sysshoppubt')->_('看样结束时间'),
            'in_list' => true,
            'default_in_list' => false,
            'order'=>8,
        ),
    'create_time' => array(
            'type' => 'time',
            'label' => app::get('sysshoppubt')->_('提交时间'),
            'comment' => app::get('sysshoppubt')->_('提交时间'),
            'in_list' => true,
            'default_in_list' => false,
            'order'=>18,
        ),
    'isok' => array( 
            'type' => array(
                0 => app::get('sysshoppubt')->_('待定'), 
                1 => app::get('sysshoppubt')->_('是'),
                2 => app::get('sysshoppubt')->_('否'),
            ),
            'default' => 0,
            'comment' => app::get('sysshoppubt')->_('是否成功'),
            'label' => app::get('sysshoppubt')->_('是否成功'),
            'width' => 110,
            'in_list'=>true,
            'default_in_list'=>true,
            'is_title' => true,
            'order' => 20,
        ),
    'text' => array(
            'type' => 'text',
            'label' => app::get('sysshoppubt')->_('意见描述'),
            'comment' => app::get('sysshoppubt')->_('意见描述'),
            'in_list' => true,
            'default_in_list' => false,
            'order'=>21,
        ),
    ),
    'primary' => 'tender_id',
    'comment' => app::get('sysshoppubt')->_('招标'),
);
