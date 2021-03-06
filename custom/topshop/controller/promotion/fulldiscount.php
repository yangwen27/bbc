<?php
/**
 * ShopEx licence
 *
 * @copyright  Copyright (c) 2005-2015 ShopEx Technologies Inc. (http://www.shopex.cn)
 * @license  http://ecos.shopex.cn/ ShopEx License
 * @author lujunyi@shopex.cn
 */


class topshop_ctl_promotion_fulldiscount extends topshop_controller {

    public function list_fulldiscount()
    {
        $this->contentHeaderTitle = app::get('topshop')->_('满折管理');
        $filter = input::get();
        if(!$filter['pages'])
        {
            $filter['pages'] = 1;
        }
        $pageSize = 10;
        $params = array(
            'page_no' => $pageSize*($filter['pages']-1),
            'page_size' => $pageSize,
            'fields' =>'*',
            'shop_id'=> $this->shopId,
        );
        $fulldiscountListData = app::get('topshop')->rpcCall('promotion.fulldiscount.list', $params,'seller');
        $count = $fulldiscountListData['total'];
        $pagedata['fulldiscountList'] = $fulldiscountListData['data'];

        //处理翻页数据
        $current = $filter['pages'] ? $filter['pages'] : 1;
        $filter['pages'] = time();
        if($count>0) $total = ceil($count/$pageSize);
        $pagedata['pagers'] = array(
            'link'=>url::action('topshop_ctl_promotion_fulldiscount@list_fulldiscount', $filter),
            'current'=>$current,
            'total'=>$total,
            'token'=>$filter['pages'],
        );

        $gradeList = app::get('topshop')->rpcCall('user.grade.list');
        // 组织会员等级的key,value的数组，方便取会员等级名称
        $gradeKeyValue = array_bind_key($gradeList, 'grade_id');

        // 增加列表中会员等级名称字段
        foreach($pagedata['fulldiscountList'] as &$v)
        {
            $valid_grade = explode(',', $v['valid_grade']);

            $checkedGradeName = array();
            foreach($valid_grade as $gradeId)
            {
                $checkedGradeName[] = $gradeKeyValue[$gradeId]['grade_name'];
            }
            $v['valid_grade_name'] = implode(',', $checkedGradeName);
            $v['condition_value'] = $this->condition($v['condition_value']);
        }

        $pagedata['now'] = time();
        $pagedata['total'] = $count;

        return $this->page('topshop/promotion/fulldiscount/index.html', $pagedata);
    }


    public function edit_fulldiscount()
    {
        $this->contentHeaderTitle = app::get('topshop')->_('添加/编辑满折促销');

        $apiData['fulldiscount_id'] = input::get('fulldiscount_id');
        $apiData['fulldiscount_itemList'] = true;
        if($apiData['fulldiscount_id'])
        {
            $pagedata = app::get('topshop')->rpcCall('promotion.fulldiscount.get', $apiData);
            $pagedata['valid_time'] = date('Y/m/d', $pagedata['start_time']) . '-' . date('Y/m/d', $pagedata['end_time']);
            if($pagedata['shop_id']!=$this->shopId)
            {
                return $this->splash('error','','您没有权限编辑此满折促销',true);
            }
            $objMdlFulldiscountItem = app::get('syspromotion')->model('fulldiscount_item');
            $notEndItem = $objMdlFulldiscountItem->getList('item_id', array('end_time|than'=>time() ) );
            $notItems = array_column($notEndItem, 'item_id');
            $pagedata['notEndItem'] =  json_encode($notItems,true);
        }
        $valid_grade = explode(',', $pagedata['valid_grade']);
        $pagedata['gradeList'] = app::get('topshop')->rpcCall('user.grade.list');
        foreach($pagedata['gradeList'] as &$v)
        {
            if( in_array($v['grade_id'], $valid_grade) )
            {
                $v['is_checked'] = true;
            }
        }

        $shopId = shopAuth::getShopId();
        $pagedata['shopCatList'] = app::get('topshop')->rpcCall('shop.authorize.cat',array('shop_id'=>$shopId));
        $pagedata['condition_value'] = $this->condition($pagedata['condition_value']);
        return $this->page('topshop/promotion/fulldiscount/edit.html', $pagedata);
    }

    public function condition($condition)
    {
        $condList = explode(',',$condition);
        foreach ($condList as $key => $value)
        {
            $condList[$key] = explode('|',$value);
        }
        return $condList;
    }

    public function save_fulldiscount()
    {
        $params = input::get();

        $apiData['fulldiscount_id'] = $params['fulldiscount_id'];
        $apiData['fulldiscount_name'] = $params['fulldiscount_name'];
        $apiData['join_limit'] = intval($params['join_limit']);
        $apiData['used_platform'] = intval($params['used_platform']);
        $apiData['free_postage'] = intval($params['free_postage']);

        if( !is_array($params['full']) && count($params['full']) && !is_array($params['discount']) && count($params['discount']) )
        {
            return $this->splash('error','','满折条件至少添加一个',true);
        }
        $full = $params['full'];
        $discount = $params['discount'];
        $joinfulldiscount = array();
        foreach($full as $k=>$v)
        {
            $joinfulldiscount[] = $v.'|'.$discount[$k];
        }
        $apiData['condition_value'] = implode(',', $joinfulldiscount);
        $apiData['shop_id'] = $this->shopId;
        $timeArray = explode('-', $params['valid_time']);
        $apiData['start_time']  = strtotime($timeArray[0]. ' 00:00:00');
        $apiData['end_time'] = strtotime($timeArray[1]. ' 23:59:59');
        $apiData['valid_grade'] = implode(',', $params['grade']);

        $apiData['fulldiscount_rel_itemids'] = implode(',', array_unique($params['item_id'])); // 满折关联的商品id,格式 商品id  '23,99,103',以逗号分割
        try
        {
            if($params['fulldiscount_id'])
            {
                // 修改满折促销
                $result = app::get('topshop')->rpcCall('promotion.fulldiscount.update', $apiData);
            }
            else
            {
                // 新添满折促销
                $result = app::get('topshop')->rpcCall('promotion.fulldiscount.add', $apiData);
            }
        }
        catch(\LogicException $e)
        {
            $msg = $e->getMessage();
            if($params['fulldiscount_id'])
            {
                $url = url::action('topshop_ctl_promotion_fulldiscount@edit_fulldiscount', array('fulldiscount_id'=>$params['fulldiscount_id']));
            }
            else{
                $url = url::action('topshop_ctl_promotion_fulldiscount@list_fulldiscount');
            }
            return $this->splash('error',$url,$msg,true);
        }
        $url = url::action('topshop_ctl_promotion_fulldiscount@list_fulldiscount');
        $msg = app::get('topshop')->_('保存满折促销成功');
        return $this->splash('success',$url,$msg,true);
    }

    public function delete_fulldiscount()
    {
        $apiData['shop_id'] = $this->shopId;
        $apiData['fulldiscount_id'] = input::get('fulldiscount_id');
        $url = url::action('topshop_ctl_promotion_fulldiscount@list_fulldiscount');
        try
        {
            app::get('topshop')->rpcCall('promotion.fulldiscount.delete', $apiData);
        }
        catch(\LogicException $e)
        {
            $msg = $e->getMessage();
            return $this->splash('error', $url, $msg, true);
        }
        $msg = app::get('topshop')->_('删除满折促销成功');
        return $this->splash('success', $url, $msg, true);
    }

    //根据企业id的获取企业所经营的所有类目
    // public function getCatList()
    // {
    //     $shopId = shopAuth::getShopId();
    //     $catInfo = app::get('topshop')->rpcCall('shop.authorize.cat',array('shop_id'=>$shopId));
    //     return response::json($catInfo);
    // }

    //根据企业id和3级分类id获取企业所经营的所有品牌
    public function getBrandList()
    {
        $shopId = $this->shopId;
        $catId = input::get('catId');
        $params = array(
            'shop_id'=>$shopId,
            'cat_id'=>$catId,
            'fields'=>'brand_id,brand_name,brand_url'
        );
        $brands = app::get('topshop')->rpcCall('category.get.cat.rel.brand',$params);
        return response::json($brands);
    }

    //根据企业类目id的获取企业所经营类目下的所有商品
    public function searchItem()
    {
        $shopId = $this->shopId;
        $catId = input::get('catId');
        $brandId = input::get('brandId');
        $keywords = input::get('searchname');
        $fulldiscountId = input::get('fulldiscountId');
        if($brandId)
        {
            $searchParams = array(
                'shop_id' => $shopId,
                'cat_id' => $catId,
                'brand_id' => $brandId,
                'search_keywords' =>$keywords,
                'page_size' => 1000,
            );
        }
        else
        {
            $searchParams = array(
                'shop_id' => $shopId,
                'cat_id' => $catId,
                'search_keywords' =>$keywords,
                'page_size' => 1000,
            );
        }

        $searchParams['fields'] = 'item_id,title,image_default_id,price,brand_id';
        $itemsList = app::get('topshop')->rpcCall('item.search',$searchParams);
        $pagedata['itemsList'] = $itemsList['list'];
        $pagedata['image_default_id'] = app::get('image')->getConf('image.set');
        if($fulldiscountId)
        {
            $objMdlFulldiscountItem = app::get('syspromotion')->model('fulldiscount_item');
            $notEndItem = $objMdlFulldiscountItem->getList('item_id', array('end_time|than'=>time() ) );
            $pagedata['notEndItem'] = array_column($notEndItem, 'item_id');
        }
        else
        {
             $pagedata['notEndItem'] = array();
        }

        return response::json($pagedata);
    }


}
