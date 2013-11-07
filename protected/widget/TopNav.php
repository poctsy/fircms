<?php
class TopNav extends CWidget
{
    //暂时为二级菜单，后期再加参数
    public $id;
    public $name;
    public $rootUlCss;
    public $childULCss;
    private  $roots=array();

    public function init()
    {

       $this->id=$this->id.'_nav';
       $this->roots=Navigation::navCatalog($this->name);

    }

    public function run()
    {
        $this->renderNav($this->roots);

    }


    public function renderNav($roots){
        echo CHtml::openTag('ul',array('class'=>$this->rootUlCss,'id'=>$this->id)) . "\n";
        foreach ($roots as $root){
            $a=Catalog::model()->findByPk($root);

            echo CHtml::openTag('li');
            echo CHtml::openTag('a', array('href' => Yii::app()->createUrl("/post/post/index", array("catalog" => $a->url))));
            echo CHtml::openTag('span');

            echo CHtml::encode($a->name);



            echo CHtml::closeTag('span');
            echo CHtml::closeTag('a');
            echo CHtml::closeTag('span');

            $level = 0;
            $catalogs=Catalog::model()->findByPk($a->id)->children()->findAll();

            foreach ($catalogs as $n => $catalog) {
               // echo CHtml::openTag('ul',array('class'=>$this->childULCss)) . "\n";
                if ($catalog->level == $level)
                    echo CHtml::closeTag('li') . "\n";
                else if ($catalog->level > $level)
                    echo CHtml::openTag('ul',array('class'=>$this->childULCss)) . "\n";
                else {
                    echo CHtml::closeTag('li') . "\n";

                    for ($i = $level - $catalog->level; $i; $i--) {
                        echo CHtml::closeTag('ul') . "\n";
                        echo CHtml::closeTag('li') . "\n";
                    }
                }

                echo CHtml::openTag('li');
                echo CHtml::openTag('a', array('href' => Yii::app()->createUrl("/post/post/index", array("catalog" => $catalog->url))));
                echo CHtml::openTag('span');
                echo CHtml::encode($catalog->name);



                echo CHtml::closeTag('span');
                echo CHtml::closeTag('a');


                $level = $catalog->level;
            }

            for ($i = $level; $i; $i--) {
                echo CHtml::closeTag('li') . "\n";
                echo CHtml::closeTag('ul') . "\n";
            }
           // echo CHtml::closeTag('li') . "\n";

        }

    }

}