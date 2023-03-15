<?php

    class item {

        protected $id;
        protected $content;
        protected $tags;
        protected $time_created;

        public function __get($var){

            return $this->$var;
        }

        public function __set($var, $value){

            $this->$var = $value;
        }

        // public function __toString(){

        //     $format = 'ID: %s<br>Content: %s<br>Tags: %s<br>Created: %s<hr class="border-small border-black">';

        //     return sprintf($format, $this->__get('id'), $this->__get('content'),
        //             $this->__get('tags'), $this->__get('time_created'));
        // }

    }

?>