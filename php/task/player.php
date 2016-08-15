<?php
  class Player {
  private $name, $blood, $mana;

  function __construct($name){
    $this->name = $name;
    $this->blood = 100;
    $this->mana = 40;
  }

 public function attack(){
    $this->manna = $this->mana - 10;
  }

  public function defend(){
    $this->blood = $this->blood - 25;
  }

}


  class Menu{
      private $players = ["ade", "test"];
      
      public function main() {
        echo '
        # ============================== #
        # Welcome to the Battle Arena #
        # ------------------------------------------------- ---- #
        # Description: #
        # 1 type "new" to create a character #
        # 2. type "start" to begin the fight #
        # ------------------------------------------------- ---- #
        # * Max player 2 or 3 #
        # ------------------------------------------------- ---- #
        # Current Player: #
        ';
        fscanf(STDIN, "%s\n", $input);
        switch ($input) {
           case "new": echo $this->add_player();
             break;
           case "start": echo $this->start();
             break;
           default: echo "wrong input!!!\n";
           echo $this->main();
         } //(strcmp($input, "new" )) {
//            echo $this->add_player();
  //        } elseif (strcmp($input, "start" )){
    //        echo $this->start();
      //    } else {
        //    echo "wrong input !!!!";
          //  echo $this->main();
            //}
      }



      function add_player() {
        echo "type your name here : ";
        fscanf(STDIN, "%s\n" , $name);
        $this->players[$name] = new Player($name);
        $this->main();
      }

      function start(){
        if ($this->player == null) {
          echo "Pemain Tidak Ada!!! Silahkan Buat Pemain Baru!!!";
          echo $this->add_player();
        } else {
        echo '
        # ============================== #</br>
        # Welcome to the Battle Arena #</br>
        # ------------------------------------------------- ---- #</br>
        # Battle Start #';
        echo '
        who will attack =';
        return $this->player["ade"];
        echo '
        who attacked';
        return $this->player["test"];
      }
    }
} 

  $game = new Menu;
  echo $game->main();
?>