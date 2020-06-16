<?php


namespace app\controllers;


use app\models\Cart;
use app\models\Order;
use app\models\OrderProduct;
use app\models\Product;

class CartController extends AppHomeController
{


    public function actionAdd($id, $qty = 1)
    {
        $product = Product::findOne($id);
        if(empty($product)) {
            return false;
        }
        $session = \Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->addToCart($product, $qty);
        if (\Yii::$app->request->isAjax){
            return $this->renderPartial('cart-modal',
                                compact('session'));
        }
        return $this->redirect(\Yii::$app->request->referrer);
    }


    public function actionShow()
    {
        $session = \Yii::$app->session;
        $session->open();
        return $this->renderPartial('cart-modal',
                            compact('session'));
    }

    public function actionDelItem()
    {
        $id =\Yii::$app->request->get('id');
        $session = \Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->recalc($id);
        if(\Yii::$app->request->isAjax){
            return $this->renderPartial('cart-modal',
                                compact('session'));
        }
        return $this->redirect(\Yii::$app->request->referrer);
    }

    public function actionClear()
    {
        $session = \Yii::$app->session;
        $session->open();
        $session->remove('cart');
        $session->remove('cart.qty');
        $session->remove('cart.sum');

        return $this->renderPartial('cart-modal',
                            compact('session'));
    }

    public function actionCheckout()
    {
        $this->setMeta("Оформление заказа");

        $session = \Yii::$app->session;
        $session->open();
        $order = new Order();
        $order_product = new OrderProduct();
        if($order->load(\Yii::$app->request->post())) {
            $order->qty = $session['cart.qty'];
            $order->sum = $session['cart.sum'];
            //transaction
            $transaction = \Yii::$app->getDb()->beginTransaction();
            if(!$order->save() || !$order_product->
                saveOrderProducts($session['cart'], $order->id)) {
                \Yii::$app->session->setFlash('error', 'Ошибка оформления заказа');
                $transaction->rollBack();
            }else{
                $transaction->commit();
                //transaction
                \Yii::$app->session->setFlash('success', 'Ваш заказ успешно оформлен!');

                try{
                    //sendMail
                    \Yii::$app->mailer->compose('orderUser', ['session' => $session,
                        'orderId' => $order->id])
//                                                               'imageFileName' => '@product_img/11.png'])
                        ->setFrom([\Yii::$app->params['senderEmail'] =>
                            \Yii::$app->params['senderName']])
                        ->setTo([\Yii::$app->params['adminEmail'], $order['email']])
                        ->setSubject("Заказ №{$order->id} оформлен")
                        ->send();
                    //sendMail
                }catch (\Swift_TransportException $e) {
//                    var_dump($e); die;
                }

                //removeCart
                $session->remove('cart');
                $session->remove('cart.qty');
                $session->remove('cart.sum');
                //removeCart
                return $this->refresh();
            }
        }
        return $this->render('checkout',
                     compact('session',
                                  'order',
                                     'order_product'));
    }

    public function actionChangeCart()
    {
        $id =\Yii::$app->request->get('id');
        $qty =\Yii::$app->request->get('qty');
        $product = Product::findOne($id);
        if(empty($product)) {
            return false;
        }
        $session = \Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->addToCart($product, $qty);

        return $this->renderPartial('cart-modal',
                            compact('session'));
    }
}