<?php
    class Enemy {
        public $name;
        public $stamina;
        public $attack;
        public static $count = 0;

        public function __construct($name,$stamina = 100,$attack = 10) {
            $this->name = $name;
            $this->stamina = $stamina;
            $this->attack = $attack;
            Self::$count += 1;
        }

        public function sayMyName(){
            echo $this->name.'があらわれた!<br>';
        }

        public function powerup(){
            $this->attack += 10;
            echo '攻撃力が'.$this->attack.'になった。<br>';
        }

        public static function getEnemyCount(){
            echo Self::$count.'体の敵をつくりました！！！<br>';
        }
    }
    //Ememyクラスを継承してボスをつくる
        class Boss extends Enemy {
            public function sayMyName(){
                echo 'ボスの'.$this->name.'があらわれた！！！！！！<br>';
            }

            public function specialAttack(){
                echo 'すごい強い一撃！！！！！<br>';
            }
        }

    $boss = new Boss('竜王',10000000,5000000);
        $boss->sayMyName();
        echo '体力'.$boss->stamina.'<br>';
        echo '攻撃力'.$boss->attack.'<br>';        
        $boss->specialAttack();


    //Ememyクラスからスライムをつくる
    $slime = new Enemy('スライム');
        echo '体力'.$slime->stamina.'<br>';
        echo '攻撃力'.$slime->attack.'<br>';
        $slime->sayMyName();
        $slime->powerUp();
        $slime->powerUp();
        $slime->powerUp();
        $slime->powerUp();
        $slime->powerUp();
        $slime->powerUp();
        $slime->powerUp();

        echo '<br>';

    //Ememyクラスからクリボーをつくる
    $kuribo = new Enemy('クリボー',200,15);
        echo '体力'.$kuribo->stamina.'<br>';
        echo '攻撃力'.$kuribo->attack.'<br>';
        $kuribo->sayMyName();
        $kuribo->powerUp();
        $kuribo->powerUp();
        $kuribo->powerUp();
        $kuribo->powerUp();
        $kuribo->powerUp();
        $kuribo->powerUp();
        $kuribo->powerUp();

Enemy::getEnemyCount();
        $slime_A = new Enemy('スライム');
        $slime_B = new Enemy('スライム');
        $slime_C = new Enemy('スライム');
        $kuribo_A = new Enemy('クリボー');
        $kuribo_B = new Enemy('クリボー');
Enemy::getEnemyCount();
        $slime_B = new Enemy('スライム');
        $slime_C = new Enemy('スライム');
        $kuribo_A = new Enemy('クリボー');
        $kuribo_B = new Enemy('クリボー');
Enemy::getEnemyCount();
?>