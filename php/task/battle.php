<?php

include('player.php');

class Battle extends Player{
	
	function __construct(){
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
		Battle::result;
	}

	public function defend(){
		$this->blood -= 20;
		$this->manna += 10;
		Battle::result;
	}

	function result(){
		echo '
    # ============================== #</br>
    # Welcome to the Battle Arena #</br>
    # ------------------------------------------------- ---- #</br>
    # Battle Start # ';
		 echo '
		 who will attack =';
		 echo $name;
		 echo '
		 who attacked';
		 echo $name;
		 echo '
		 Description=';
		 echo $name, '==== manna = ';
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


if ($blood>0){
	Battle::result;
} else {
	Battle::end;
}

?>