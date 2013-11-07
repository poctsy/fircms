<?php
/**
* @version   UploadController.php  15:01 2013年09月18日
* @author    poctsy <poctsy@foxmail.com>
* @copyright Copyright (c) 2013 poctsy
* @link      http://www.fircms.com
*/
class UploadController extends FAdminController
{

	public $layout='application.modules.admin.views.layouts.column2';

        public function filters()
        {
            return array(
                    'rights',
                );
        }



    public function actions()
    {
        return array(

            'kupload'=>array('class'=>'application.extensions.KEditor.KEditorUpload'),
            'kmanageJson'=>array('class'=>'application.extensions.KEditor.KEditorManage'),
        );
    }
    /**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Upload']))
		{
			$model->attributes=$_POST['Upload'];
			if($model->save())
				$this->redirect(array('admin'));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
            if(file_exists(dirname(Yii::app()->basePath).DIRECTORY_SEPARATOR.$this->loadModel($id)->path))
            unlink(dirname(Yii::app()->basePath).DIRECTORY_SEPARATOR.$this->loadModel($id)->path);
            
            $this->loadModel($id)->delete();
                
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}



	/**
	 * Uploads all models.
	 */
	public function actionAdmin()
	{
		$model=new Upload('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Upload']))
			$model->attributes=$_GET['Upload'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Upload the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Upload::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Upload $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='upload-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    protected function beforeAction($action) {
        ob_clean(); // clear output buffer to avoid rendering anything else
        foreach (Yii::app()->log->routes as $route) {

            if($route instanceof XWebDebugRouter) {
                $route->enabled = false; // disable any weblogroutes
            }
        }
       // header('Content-type: application/json'); // set content type header as json
        return parent::beforeAction($action);
    }
}
