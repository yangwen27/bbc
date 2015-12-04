<?php
return array(
    'columns' => array(
        'pointlog_id' => array(
            'type' => 'number',
            //'pkey' => true,
            'autoincrement' => true,
            'label' => app::get('sysuser')->_('积分记录id'),
        ),
        'user_id' => array(
            'type' => 'table:user',
            'in_list' => false,
            'required' => true,
            'default_in_list' => false,
            'label' => app::get('sysuser')->_('会员'),
        ),
        'modified_time' => array(
            'type' => 'last_modify',
            'in_list' => true,
            'default_in_list' => true,
            'comment' => app::get('sysuser')->_('记录时间'),
            'label' => app::get('sysuser')->_('记录时间'),
        ),
        'behavior_type' => array(
            'type' => array(
                'obtain' => app::get('sysuser')->_('获得'),
                'consume' => app::get('sysuser')->_('消费'),
            ),
            'in_list' => true,
            'default_in_list' => true,
            'default' => 'obtain',
            'label' => app::get('sysuser')->_('行为类型'),
            'comment' => app::get('sysuser')->_('行为类型'),
        ),
        'behavior' => array(
            //'type' => 'varchar(100)',
            'type' => 'string',
            'length' => 100,
            'in_list' => true,
            'default_in_list' => true,
            'required' => true,
            'comment' => app::get('sysuser')->_('行为描述'),
            'label' => app::get('sysuser')->_('行为描述'),
        ),
        'point' => array(
            'type' => 'number',
            'in_list' => true,
            'default_in_list' => true,
            'default' => 0,
            'comment' => app::get('sysuser')->_('积分值'),
            'label' => app::get('sysuser')->_('积分值'),
        ),
        'remark' => array(
            //'type' => 'varchar(500)',
            'type' => 'string',
            'length' => 500,
            'in_list' => true,
            'default_in_list' => true,
            'comment' => app::get('sysuser')->_('备注(记录订单号)'),
            'label' => app::get('sysuser')->_('备注'),
        ),
        'expiration_time' => array(
            'type' => 'time',
            'in_list' => false,
            'default_in_list' => false,
            'default' => 0,
            'comment' => app::get('sysuser')->_('积分过期时间'),
            'label' => app::get('sysuser')->_('积分过期时间'),
        ),
    ),
    'primary' => 'pointlog_id',
    'comment' => app::get('sysuser')->_('会员积分值明细表'),
);
