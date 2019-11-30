<?php

    //展示商品内容的的方法
    public function showlist() {

        $book_name = D('book_name');
        $book_list = $book_name->order('book_id')->select();


        $this->assign('book_list', $book_list);
        $this->display();
    }

    //展示已添加到购物车的商品的方法
    public function shop_cart() {

        session_start();
        $GET_book_name = I('get.book_name');
        $GET_book_id = I('get.book_id');

        $shop_cart = I('session.shop_cart');
        //判断session数组中是否存在过该添加购物车的商品
        if (array_key_exists($GET_book_name, $shop_cart)) {
            //该商品已经添加过购物车，进行shop_cart数组中的该商品数量加1的操作
            $shop_cart[$GET_book_name]['book_num'] ++;
        } else {
            //该商品为新商品，进行数据库查询该商品具体信息，并存入shop_cart数组
            $book_name = D('book_name');
            $result = $book_name->where(array('book_id' => array('eq', $GET_id)))->select();

            $arr0 = array($GET_book_name => array('book_id' => $GET_book_id, 'book_num' => 1, 'book_name' => $GET_book_name, 'book_sale_price' => $result[0]['book_sale_price']));

            foreach ($arr0 as $key => $value) {
                $shop_cart[$key] = $value;
            }
        }


        session('shop_cart', $shop_cart);  //赋值给session
        //var_dump($shop_cart);
        $this->assign('shop_cart', $shop_cart);
        $this->display();
    }

    //清空当前购物车的方法
    public function clean_cart() {
        session('shop_cart', null);
        redirect(U('book_list'), 2, '已成功清空购物车，正在跳转到商城首页...');
    }

    //结算方法
    public function finish() {
        //通过session['user_name']判断是否登录。如果已登录则把数据写入数据库,并提示成功跳转到商品展示页
        //如果未登录 ，提示进行登录，并且跳转至登录页面
        session_start();  //开启session
        $buy = D('buy');
        $shop_cart = session('shop_cart');  //从session中读取购物车二维数组
        $user_name = session('user_name');    //从session中读取用户的信息

        if (isset($user_name)) {
            //已经登录,从session中取出数据来写入数据库
            foreach ($shop_cart as $v => $val) {

                $data['buy_book_id'] = $val['book_id'];
                $data['buy_book_name'] = $val['book_name'];
                $data['buy_book_num'] = $val['book_num'];
                $data['buy_book_price'] = $val['book_sale_price'];
                $data['user_name'] = $user_name;

                $rs = $buy->add($data);
            }
            if ($rs)
                $this->success('结算成功！现在返回首页', U('showlist'), 2);  //成功写入数据则提示并2秒后跳转
            else
                $this->error('结算失败，正在返回购物车！', U('shop_cart'), 3); //失败写入数据则提示并3秒后跳转
        }else {
            //未登录则重定向到登录页面
            redirect(U('Index/login'), 2, '请登录后再进行结算，界面正跳转到登录界面...');
        }
    }

}

?>
