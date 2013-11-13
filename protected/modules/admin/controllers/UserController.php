<?php

/**
 * @author   poctsy  <poctsy@foxmail.com>
 * @copyright Copyright (c) 2013 poctsy
 * @link      http://www.fircms.com
 * @version   UserController.php  9:20 2013年09月25日
 */
class UserController extends FAdminController {

    public $layout = 'application.modules.admin.views.layouts.column2';

    public function filters() {
        return array(
            array('auth.filters.AuthFilter'),
        );
    }
    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new User;
        $model->setScenario('ucreate');
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['User'])) {

            $model->attributes = $_POST['User'];
            if ($model->save())
                $this->redirect(array('admin'));

        }
        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {



        $model = $this->loadModel($id);
        $model->password="";
        
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            $model->salt= $model->generate_salt(32);
            $model->password= $model->hashPassword($model->password, $model->salt);
            if ($model->password == "") {
                $model->password = $model->oldpassword;
            } 
            if ($model->save())
                $this->redirect(array('admin'));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {



        $load = $this->loadModel($id);


        $criteria = new CDbCriteria;
        $criteria->with = 'authassignments';
        $criteria->addCondition("authassignments.itemname=:a", 'OR');//创始人 
        $criteria->addCondition("authassignments.itemname='Admin'", 'OR');//超级管理员 
        $criteria->addCondition("authassignments.itemname=:b", 'OR');//后台管理组 
        $criteria->addCondition("LOWER(username)=:username", 'AND');
        $criteria->params = array(':a' => $this->SuperAdminUse,':b' => $this->GeneralAdmins, ':username' => strtolower($load->username));
        $user = User::model()->find($criteria);

        if ($user == NULL) {
           $load->delete(); 
        } 

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Users all models.
     */
    public function actionAdmin() {
        $model = new User('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['User']))
            $model->attributes = $_GET['User'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return User the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = User::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param User $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'user-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

 

    public function getGeneralAdmins() {
        return Yii::app()->params['generalAdmins'];
    }
    
    public function getSuperAdminUse() {
        return Yii::app()->params['superAdminUse'];
    }

}
