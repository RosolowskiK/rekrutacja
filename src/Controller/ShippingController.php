<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\Zone;
use Cake\ORM\TableRegistry;

/**
 * Shipping Controller
 *
 * @property \App\Model\Table\ShippingTable $Shipping
 * @method \App\Model\Entity\Shipping[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ShippingController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $shipping = $this->paginate($this->Shipping);

        $this->set(compact('shipping'));
    }

    /**
     * View method
     *
     * @param string|null $id Shipping id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $shipping = $this->Shipping->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('shipping'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $shipping = $this->Shipping->newEmptyEntity();
        if ($this->request->is('post')) {
            $shippingData = $this->request->getData();
            $zonePrice = $this->calculateZonePrice($shippingData['postcode']);
            $shippingPrice = $this->calculateShippingPrice($shippingData,$zonePrice);
            $shippingData['shipping_price'] = $shippingPrice;

            $shipping = $this->Shipping->patchEntity($shipping, $shippingData);
            if ($this->Shipping->save($shipping)) {
                $this->Flash->success(__('The shipping has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The shipping could not be saved. Please, try again.'));
        }
        $this->set(compact('shipping'));
    }

    private function calculateZonePrice($postCode) {
        $zone = substr($postCode,0,2);
        $zones = TableRegistry::getTableLocator()->get('Zones');
        $result = $zones->find()->where(['zone',$zone])->toList();
        $price = $result[0]->price;

        return $price;
    }

    private function calculateShippingPrice($shippingData,$zonePrice) {
        $shippingPrice = $zonePrice + 1995 * $shippingData['long_product'];
        $this->addDiscount($shippingPrice);

        return $shippingPrice;
    }

    private function addDiscount(&$price){
        if($price >= 12500 )
            $price = $price * 0.95;
    }

    /**
     * Edit method
     *
     * @param string|null $id Shipping id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $shipping = $this->Shipping->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $shipping = $this->Shipping->patchEntity($shipping, $this->request->getData());
            if ($this->Shipping->save($shipping)) {
                $this->Flash->success(__('The shipping has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The shipping could not be saved. Please, try again.'));
        }
        $this->set(compact('shipping'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Shipping id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $shipping = $this->Shipping->get($id);
        if ($this->Shipping->delete($shipping)) {
            $this->Flash->success(__('The shipping has been deleted.'));
        } else {
            $this->Flash->error(__('The shipping could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
