<?php

use yii\helpers\Html;
use \app\models\Enseignant;

$enseignants = Enseignant::find()->orderBy("nom ASC")->all();


//foreach ($enseignants as $enseignant)
    echo '<div class="row">
             <div class="col-md-4">
                 <div class="card mb-4 text-white bg-dark">
                    <div class="front">
                        <img class="card-img-top" src="//placeimg.com/290/180/any" alt="Card image cap">
                        <div class="card-body bg-dark">
                           <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card\'s content.</p>
                        </div>
                    </div>
                    <div class="bg-success">
                        something
                    </div>  
                 </div>
             </div>
        </div>';