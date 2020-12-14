<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;
use phpDocumentor\Reflection\Type;

/**
 * Zones Controller
 *
 * @property \App\Model\Table\ZonesTable $Zones
 * @method \App\Model\Entity\Zone[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ZonesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $zones = $this->paginate($this->Zones);

        $this->set(compact('zones'));
    }

    /**
     * View method
     *
     * @param string|null $id Zone id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $zone = $this->Zones->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('zone'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $zone = $this->Zones->newEmptyEntity();
        if ($this->request->is('post')) {
            $this->saveNewZonesFile();
            $this->insertNewZoneFile();
            $this->Flash->success(__('The zones file has been saved.'));

        }
        $this->set(compact('zone'));
    }

    private function saveNewZonesFile(){
        $fileName = $this->getUploadFileName();
        $uploadFile = $this->getUploadFile();
        $uploadFile['zonesFile']->moveTo('webroot\uploads\ ' . $fileName);
    }

    private function getUploadFileName() {
        $uploadFile = $this->getUploadFile();
        return $uploadFile['zonesFile']->getClientFilename();
    }

    private function getUploadFile() {
        return $this->request->getUploadedFiles();
    }

    private function insertNewZoneFile() {
        $fileName = $this->getUploadFileName();
        $file = fopen('webroot\uploads\ ' . $fileName,'r');
        while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
            $zoneTable= $this->getTableLocator()->get('zones');
            $zoneRecord = $zoneTable->find()->where(['zone ' => intval($data[0])])->all()->toList();
            if($zoneRecord) {
                foreach ($zoneRecord as $zone) {
                    $zone->price = intval($data[1]);
                    $zoneTable->save($zone);
                }
            } else {
                $newZonesTable = $this->getTableLocator()->get('zones');
                $newZone = $newZonesTable->newEmptyEntity();

                $newZone->zone = intval($data[0]);
                $newZone->price = intval($data[1]);
                $newZonesTable->save($newZone);
            }
        }
        fclose($file);
    }

    /**
     * Edit method
     *
     * @param string|null $id Zone id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $zone = $this->Zones->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $zone = $this->Zones->patchEntity($zone, $this->request->getData());
            if ($this->Zones->save($zone)) {
                $this->Flash->success(__('The zone has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The zone could not be saved. Please, try again.'));
        }
        $this->set(compact('zone'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Zone id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $zone = $this->Zones->get($id);
        if ($this->Zones->delete($zone)) {
            $this->Flash->success(__('The zone has been deleted.'));
        } else {
            $this->Flash->error(__('The zone could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
