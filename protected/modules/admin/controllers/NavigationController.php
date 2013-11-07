<?php
/**
 * @version   NavigationController.php  16:58 2013年09月13日
 * @author    poctsy <poctsy@foxmail.com>
 * @copyright Copyright (c) 2013 poctsy
 * @link      http://www.fircms.com
 */
class NavigationController extends FAdminController {

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
     * @return Navigation the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Navigation::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }



    public function actionCreate() {

        $model = new Navigation;
        $model->scenario='parent';

        if (isset($_POST['Navigation'])) {

            $model->attributes = $_POST['Navigation'];

            if($model->validate($model->attributes)){
                    if($model->saveNode()){
                        $this->redirect(array('admin'));

                    }


            }




        }


        $this->render('create', array(
            'model' => $model
        ));
    }

//顶级nav不允许继承其他子节点，链接允许继承，所以做成2个控制器，来添加父导航，跟子链接
    public function actionCreateChild() {

        $model = new Navigation;

        $model->scenario='child';

        if (isset($_POST['Navigation'])) {
            $model->attributes = $_POST['Navigation'];
            if($model->parent == NULL){
                $this->redirect(array('create'));}

            elseif($model->catalog_id != NULL){

                $parentModel = $this->loadModel($model->parent);

                if ($model->appendTo($parentModel)) {
                    if($model->save())
                        $this->redirect(array('admin'));
                }

            }


        }


        $this->render('create_child', array(
            'model' => $model
        ));
    }


    public function actionUpdate($id) {

        $model = $this->loadModel($id);
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Navigation']) ) {
            $model->attributes = $_POST['Navigation'];

            if($model->saveNode())
                $this->redirect(array('admin'));
        }


            $this->render('update', array(
                'model' => $model
            ));


    }
    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdateChild($id) {


        $model = $this->loadModel($id);

        $model->parent = $model->getParent()->id;
        $beforeModel=$model;
        $beforeModelParent=$model->parent;


        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Navigation']) ) {
            $model->attributes = $_POST['Navigation'];



            //  不等于自身id                 不等于当前父节点
            if ($model->parent != $model->id && $model->parent != $beforeModelParent) {

                //不允许是自身的子节点
                if (!$this->loadModel($model->parent)->isDescendantOf($beforeModel)) {

                    $model->moveAsLast($this->loadModel($model->parent));
                }
            }
            if($model->saveNode())
                $this->redirect(array('admin'));
        }


            $this->render('update_child', array(
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
        if (Yii::app()->request->isPostRequest) {
            $count=Navigation::model()->findByPk($id)->descendants()->count();

            if($count>0){
                $this->redirect(array('admin'));
            }elseif($model = $this->loadModel($id)){
                    $model->deleteNode();
            }

        }
        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'navigation-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}