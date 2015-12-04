<?php
return  array(
    'columns'=>array(
        'enterapply_id'=>array(
            'type'=>'number',
            //'pkey' => true,
            'autoincrement' => true,
            'required' => true,
            'order' => 1,
            'label' => app::get('sysshop')->_('入驻申请 id'),
            'comment' => app::get('sysshop')->_('入驻申请id 自增'),
        ),
        'status'=>array(
            'type'=>array(
                'active'=>'未审核',
                'locked'=>'审核中',
                'successful'=>'审核通过',
                'failing'=>'审核驳回',
                'finish'=>'开店完成',
            ),
            'required'=>true,
            'in_list'=>true,
            'default_in_list'=>true,
            'label' => app::get('sysshop')->_('申请状态'),
            'comment' => app::get('sysshop')->_('申请状态'),
            'order' => 5,
        ),
        'seller_id'=>array(
            'type'=>'table:account@sysshop',
            'required'=>true,
            'in_list'=>true,
            'default_in_list'=>true,
            'label' => app::get('sysshop')->_('企业账号'),
            'comment' => app::get('sysshop')->_('提交申请的账号'),
            'order' => 6,
        ),
        'shop_name'=>array(
            //'type'=>'varchar(20)',
            'type' => 'string',
            'length' => 20,
            'required'=>true,
            'in_list'=>true,
            'default_in_list'=>true,
            'searchtype' => 'has',
            'filtertype' => false,
            'filterdefault' => 'true',
            'label' => app::get('sysshop')->_('企业名称'),
            'comment' => app::get('sysshop')->_('企业名称'),
            'order' => 7,
        ),
        'shop_type'=>array(
            'type'=>array(
                'flag'=>'品牌旗舰店',
                'brand'=>'品牌专卖店',
                'cat'=>'类目专营店',
            ),
            'required'=>true,
            'in_list'=>true,
            'default_in_list'=>true,
            'filtertype' => false,
            'filterdefault' => 'true',
            'label' => app::get('sysshop')->_('企业类型'),
            'comment' => app::get('sysshop')->_('企业类型'),
            'order' => 8,
        ),
        'shop' => array(
            'type'=> 'text',
            'comment' => app::get('sysshop')->_('企业相关信息'),
        ),
        'shop_info' => array(
            'type'=> 'text',
            'comment' => app::get('sysshop')->_('企业相关信息'),
        ),
        'new_brand' => array(
            //'type' => 'varchar(20)',
            'type' => 'string',
            'length' => 20,

            'comment' => app::get('sysshop')->_('企业新增品牌'),
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
            'order' => 9,
        ),
        'company_name'=>array(
            //'type'=>'varchar(50)',
            'type' => 'string',
            'length' => 50,

            'required'=>true,
            'in_list'=>true,
            'default_in_list'=>true,
            'filtertype' => false,
            'filterdefault' => 'true',
            'label' => app::get('sysshop')->_('公司名称'),
            'comment' => app::get('sysshop')->_('公司名称'),
            'order' => 10,
        ),
        'add_time' => array(
            'type'=>'time',
            'in_list'=>true,
            'default_in_list'=>true,
            'label' => app::get('sysshop')->_('修改时间'),
            'comment' => app::get('sysshop')->_('修改时间'),
            'order' => 13,

        ),
        'refuse_time' => array(
            'type'=>'time',
            'in_list'=>true,
            'default_in_list'=>true,
            'label' => app::get('sysshop')->_('拒绝时间'),
            'comment' => app::get('sysshop')->_('拒绝时间'),
            'order' => 13,

        ),
        'agree_time' => array(
            'type'=>'time',
            'in_list'=>true,
            'default_in_list'=>true,
            'label' => app::get('sysshop')->_('同意时间'),
            'comment' => app::get('sysshop')->_('同意时间'),
            'order' => 13,
        ),
        'enterlog' => array(
            //'type' => 'longtext',
            'type' => 'text',
            'comment' => app::get('sysshop')->_('操作日志'),
        ),
        'reason'=>array(
            //'type'=>'varchar(500)',
            'type' => 'string',
            'length' => 500,
            'in_list'=>true,
            'default_in_list'=>true,
            'label' => app::get('sysshop')->_('不通过原因'),
            'comment' => app::get('sysshop')->_('审核不通过原因'),
            'order' => 12,
        ),
    ),
    'primary' => 'enterapply_id',
    'index' => array(
        'ind_seller_id' => ['columns' => ['seller_id']],
    ),
    'comment' => app::get('sysshop')->_('入驻申请表'),

);


