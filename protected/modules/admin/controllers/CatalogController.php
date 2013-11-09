<?php

/**
* @version   CatalogController.php  16:58 2013年09月13日
* @author    poctsy <poctsy@foxmail.com>
* @copyright Copyright (c) 2013 poctsy
* @link      http://www.fircms.com
*/
class CatalogController extends FAdminController {

    public $layout = 'application.modules.admin.views.layouts.column2';

    public function filters() {
        return array(
            'rights',
        );
    }
  

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionAdmin() {


        $this->render('admin', array(
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Catalog the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Catalog::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }


    public function actionCreate() {

        Catalog::createRoot();
        $model = new Catalog;
        $model->scenario='update';


        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Catalog'])) {
            $model->attributes = $_POST['Catalog'];
            $thumbUpload = CUploadedFile::getInstance($model,'thumb_file');
            if(!empty($thumbUpload))
            {
                $model->thumb = Fircms::createFile($thumbUpload,'thumb','create','',array(
                    Yii::app()->config->get('thumbWidth'),Yii::app()->config->get('thumbHeight')
                ));
            }
            $parentModel = $this->loadModel($model->parent);
            if ($model->appendTo($parentModel)) {

                    $this->redirect(array('admin'));
            }



             
        }


        $this->render('create', array(
            'model' => $model ,
        ));
    }



    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {


        //获取原node
        $model = $this->loadModel($id);
        //获取catalog表单
        $model = $this->loadModel($id);
        $model->scenario='update';
        $beforeModel = $model;
        $beforeParent = NULL;
        $beforeParent = $model->getParent()->id;
        $model->parent = $beforeParent;


        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Catalog']) ) {
            $model->attributes = $_POST['Catalog'];

            $thumbUpload = CUploadedFile::getInstance($model,'thumb_file');

            if(!empty($thumbUpload))
            {
                $model->thumb = Fircms::createFile($thumbUpload,'thumb','update',$model->thumb,array(
                    Yii::app()->config->get('thumbWidth'),Yii::app()->config->get('thumbHeight')
                ));
            }


            //  不等于自身id                 不等于当前父节点                 
            if ($model->parent != $model->id && $model->parent != $beforeParent) {

                //不允许是自身的子节点
                if (!$this->loadModel($model->parent)->isDescendantOf($beforeModel)) {

                    @$model->moveAsLast($this->loadModel($model->parent));
                }
            }
            if($model->saveNode())
             $this->redirect(array('admin'));
        }

        $this->render('update', array(
            'model' => $model
        ));
    }

    public function actionPrevUp($id) {
        $id = (int) $id;
        $model = $this->loadModel($id);
        $prevSibling = $model->prevSibling;
        if (is_object($prevSibling))
            $model->moveBefore($prevSibling);
        $this->redirect(array('admin'));
    }

    public function actionNextUp($id) {
        $id = (int) $id;
        $model = $this->loadModel($id);
        $nextSibling = $model->nextSibling;
        if (is_object($nextSibling))
            $model->moveAfter($nextSibling);
        $this->redirect(array('admin'));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
      // if (Yii::app()->request->isPostRequest) {
            $count=Catalog::model()->findByPk($id)->descendants()->count();

           if($count>0){
               $this->redirect(array('admin'));
           }elseif($model = $this->loadModel($id)){

               $model->deleteNavigation();
               $model->deleteNode();
           }


    //  }
        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'catalog-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}