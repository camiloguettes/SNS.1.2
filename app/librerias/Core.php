<?php
/* traer la url ingresada al navegador
    1 controlador
    2 metodo
    3 paramentro
    */
    class Core{
        protected $controladorActual = 'index';
        protected $medotoActual = "index";
        protected $parametros = [];
        public function __construct(){
           // print_r($this->getUrl());
            $url=$this->getUrl();
        //buscar el controlador 
            if(file_exists("../app/controller/".ucwords($url[0]).".php")){
                $this->controladorActual = ucwords($url[0]);
                unset($url[0]);
            }
            require_once("../app/controller/".$this->controladorActual.".php");
            $this->controladorActual = new $this->controladorActual;


        //chequear si hay un metodo acutual
            if(isset($url[1])){
                if(method_exists($this->controladorActual,$url[1])){
                    //chequear el metodo actual
                    $this->medotoActual=$url[1];
                    unset($url[1]);
                }
            }
        //traer los posibles paramentros
        $this->parametros = $url ? array_values($url) : [];
        //llamar callback con parametros de un array
        call_user_func_array([$this->controladorActual, $this->medotoActual],$this->parametros);
        }

        public function getUrl(){
            

            if(isset($_GET['url'])){ //si hay una url 
                $url =rtrim($_GET['url'],'/');// toma la url y la combierte en un array 
                $url =filter_var($url,FILTER_SANITIZE_URL);//valida si cumple con una url
                $url = explode('/',$url);//une el array en un string wabox/casa/valor
                //retorna la url para ser reutlizada
                return $url;
            }
        }/*fin del medo getUrl*/
    }
?>