<?php
return  array(
    'columns'=>array(
        'shop_id'=>array(
            'type'=>'number',
            //'pkey'=>true,
            'autoincrement' => true,
            'required' => true,
            'label' => 'id',
            'comment' => app::get('sysshop')->_('企业编号id 自增'),
            'order' => 1,
        ),
        'shop_name'=>array(
            //'type'=>'varchar(50)',
            'type' => 'string',
            'required'=>true,
            'in_list'=>true,
            'default_in_list'=>true,
            'is_title' => true,
            'searchtype' => 'has',
            'filtertype' => false,
            'filterdefault' => 'true',
            'label' => app::get('sysshop')->_('企业名称'),
            'comment' => app::get('sysshop')->_('企业名称'),
            'order' => 5,
        ),
        'shop_descript'=>array(
            'type'=>'text',
            'is_title' => true,
            'searchtype' => 'has',
            'filtertype' => false,
            'filterdefault' => 'true',
            'label' => app::get('sysshop')->_('企业描述'),
            'comment' => app::get('sysshop')->_('企业描述'),
            'order' => 14,
        ),
        'is_third' => array(
            'type' => array(
                '0'=>'否',
                '1'=>'是',
            ),
            'label' => app::get('sysshop')->_('是否是第三方企业'),
            'comment' => app::get('sysshop')->_('是否是第三方企业'),
            'default'=>'0',
            'in_list'=>true,
            'default_in_list'=>true,
            'order' => 2,
        ),
        'shop_type'=>array(
            'type'=>'string',
            // 'required'=>true,
            'filtertype' => false,
            'filterdefault' => 'true',
            'label' => app::get('sysshop')->_('企业类型'),
            'comment' => app::get('sysshop')->_('企业类型'),
            'order' => 6,
        ),
        'seller_id'=>array(
            'type'=>'table:account@sysshop',
            'required'=>true,
            'in_list'=>true,
            'default_in_list'=>true,
            'label' => app::get('sysshop')->_('企业登录账号'),
            'comment' => app::get('sysshop')->_('企业登录账号'),
            'order' => 7,
        ),
        'status'=>array(
            'type'=>array(
                'active'=>app::get('sysshop')->_('已开启企业'),
                'dead'=>app::get('sysshop')->_('未开启企业'),
            ),
            'default'=>'active',
            'in_list'=>true,
            'default_in_list'=>true,
            'filtertype' => false,
            'filterdefault' => 'true',
            'label' => app::get('sysshop')->_('企业状态'),
            'comment' => app::get('sysshop')->_('提交状态'),
            'order' => 8,
        ),
        'open_time'=>array(
            'type'=>'time',
            'required'=>true,
            'filtertype' => false,
            'filterdefault' => 'true',
            'label' => app::get('sysshop')->_('开店时间'),
            'comment' => app::get('sysshop')->_('开店时间'),
            'order' => 9,
        ),
        'close_time'=>array(
            'type'=>'time',
            'filtertype' => false,
            'filterdefault' => 'true',
            'label' => app::get('sysshop')->_('关店时间'),
            'comment' => app::get('sysshop')->_('关店时间'),
            'order' => 9,
        ),
        'close_reason' => array(
            //'type' => 'varchar(500)',
            'type' => 'string',
            'length' => 500,
            'in_list'=>true,
            'default_in_list'=>true,
            'label' => app::get('sysshop')->_('企业关闭原因'),
            'comment' => app::get('sysshop')->_('企业关闭原因'),
        ),
        'shop_logo'=>array(
            //'type'=>'varchar(500)',
            'type' => 'string',
            'label' => app::get('sysshop')->_('企业logo'),
            'comment' => app::get('sysshop')->_('提交logo'),

            'order' => 10,
        ),
        'shopuser_name'=>array(
            //'type'=>'varchar(20)',
            'type' => 'string',
            'length' => 20,
            'required'=>true,
            'searchtype' => 'has',
            'filtertype' => false,
            'filterdefault' => 'true',
            'label' => app::get('sysshop')->_('店主姓名'),
            'comment' => app::get('sysshop')->_('店主姓名'),
            'order' => 11,
        ),
        'qq'=> array(
            'type' => 'string',
            'comment' => app::get('sysshop')->_('即时通讯qq账号配置'),
        ),
        'wangwang'=> array(
            'type' => 'string',
            'comment' => app::get('sysshop')->_('即时通讯wangwang账号配置'),
        ),
        'email'=>array(
            //'type'=>'varchar(200)',
            'type' => 'string',
            'length' => 200,
            'required'=>true,
            'in_list'=>true,
            'default_in_list'=>false,
            'filtertype' => false,
            'filterdefault' => 'true',
            'label' => app::get('sysshop')->_('邮箱'),
            'comment' => app::get('sysshop')->_('邮箱'),
            'order' => 12,
        ),
        'mobile'=>array(
            //'type'=>'varchar(50)',
            'type' => 'string',
            'length' => 50,
            'required'=>true,
            'in_list'=>true,
            'default_in_list'=>false,
            'filtertype' => false,
            'filterdefault' => 'true',
            'label' => app::get('sysshop')->_('手机号'),
            'comment' => app::get('sysshop')->_('手机号'),
            'order' => 13,
        ),
        'shopuser_identity'=>array(
            //'type'=>'char(18)',
            'type' => 'string',
            'length' => 18,
            'fixed' => true,

            // 'required'=>true,
            'label' => app::get('sysshop')->_('店主身份证号'),
            'comment' => app::get('sysshop')->_('店主身份证号'),
        ),
        'shopuser_identity_img'=>array(
            //'type'=>'varchar(32)',
            'type' => 'string',
            'label' => app::get('sysshop')->_('店主身份证电子版'),
            'comment' => app::get('sysshop')->_('店主身份证电子版'),
        ),
        'shop_area'=>array(
            'type'=>'region',
            'required'=>true,
            'label' => app::get('sysshop')->_('企业所在地区'),
            'comment' => app::get('sysshop')->_('企业所在地区'),
        ),
        'shop_addr'=>array(
            'type'=>'text',
            'required'=>true,
            'label' => app::get('sysshop')->_('企业所在地址'),
            'comment' => app::get('sysshop')->_('企业所在地址'),
        ),
        'bulletin'=>array(
            //'type'=>'varchar(50)',
            'type' => 'string',
            'length' => 50,
            'label' => app::get('sysshop')->_('企业公告'),
            'comment' => app::get('sysshop')->_('企业公告'),
        ),
        'is_shopcenter' => array(
            'type' => array(
                '0'=>'未开通企业展台',
                '1'=>'已开通企业展台',
            ),
            'label' => app::get('sysshop')->_('是否开通企业展台'),
            'comment' => app::get('sysshop')->_('是否开通企业展台'),
            'required' => true,
            'default'=>'0',
            'in_list'=>true,
            'default_in_list'=>true,
        ),
        'background_img'=>array(
            //'type'=>'varchar(500)',
            'type' => 'string',
            'label' => app::get('sysshop')->_('企业背景'),
            'comment' => app::get('sysshop')->_('企业背景'),
            'order' => 80,
        ),
        'gongying_count'=>array(
            //'type'=>'varchar(500)',
            'type' => 'number',
            'label' => app::get('sysshop')->_('供应发布限制'),
            'comment' => app::get('sysshop')->_('供应发布限制'),
            'in_list'=>true,
            'default_in_list'=>true,
            'order' => 90,
        ),
         'qiugou_count'=>array(
            //'type'=>'varchar(500)',
            'type' => 'number',
            'label' => app::get('sysshop')->_('求购发布限制'),
            'comment' => app::get('sysshop')->_('求购发布限制'),
            'in_list'=>true,
            'default_in_list'=>true,
            'order' => 100,
        ),

         'map_img'=>array(
            //'type'=>'varchar(500)',
            'type' => 'string',
            'label' => app::get('sysshop')->_('地图'),
            'comment' => app::get('sysshop')->_('地图'),
            'order' => 80,
        ),
         'score'=>array(
            //'type'=>'varchar(500)',
            'type' => 'float',
            'label' => app::get('sysshop')->_('综合评分'),
            'comment' => app::get('sysshop')->_('综合评分'),
            'order' => 80,
        ),

    ),
    'primary' => 'shop_id',
    'index' => array(
        'ind_seller_id' => ['columns' => ['seller_id']],
        'ind_shop_type' => ['columns' => ['shop_type']],
    ),
    'comment' => app::get('sysshop')->_('企业表'),

);

