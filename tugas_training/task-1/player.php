<?php

class Player {
  public $name;
  public $blood = 100;
  public $manna = 40;

  function index(){
    echo '
    # ============================== #</br>
    # Welcome to the Battle Arena #</br>
    # ------------------------------------------------- ---- #</br>
    # Description: #</br>
    # 1 type "new" to create a character #</br>
    # 2. type "start" to begin the fight #</br>
    # ------------------------------------------------- ---- #</br>
    # Current Player: # ';
    # - #
    echo '# * Max player 2 or 3 #</br>
    # ------------------------------------------------- ---- #</br>
    ';
  }

  public function new_player($name_input){
    $this->name = $name_input;
  }



  static function start($start_input){
    echo '
    # ============================== #</br>
    # Welcome to the Battle Arena #</br>
    # ------------------------------------------------- ---- #</br>
    # Battle Start #';
     echo '
     who will attack =';
     echo $name;
     echo '
     who attacked';
     echo $name;
     
  }

  public function attack(){
    $this->manna -= 10;
    Player::result;
  }

  public function defend(){
    $this->blood -= 20;
    $this->manna += 10;
    Player::result;
  }

  static function result(){
    echo '
    # ============================== #</br>
    # Welcome to the Battle Arena #</br>
    # ------------------------------------------------- ---- #</br>
    # Battle Start # </br>';
     echo 'who will attack =</br>';
     echo $this->name;
     echo 'who attacked';
     echo $this->name;
     echo 'Description=';
     echo $this->name, '==== manna = ';
     echo $this->manna, ', blood = ';
     echo $this->blood;
  }

  function end(){
    echo '
    # Battle Royal #</br>
    # Game Over #
    ';
  }

}

$player = new Player;
echo $player->index();

while ($player->blood = 0){
  echo $player->end();
} 

?>