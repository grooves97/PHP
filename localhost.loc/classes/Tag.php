<?php

include_once "attributes.php";
include_once "body.php";

class Tag{

    private $name;
    private $attributes;
    private $isSelfClosing;
    private $body;

    public function __construct($name, array $attributes = []){
        $this->name = $name;
        $this->isSelfClosing = false;
        $this->attributes = new Attributes($attributes);
        $this->body = new Body();
    }

    public function setAttribute($key, $default = null){
        return $this->attributes->setAttribute($key, $default);
    }

    public function appendAttributes($key, $value){
        return $this->attributes->setAttribute($key, $this->attributes->getAttribute($key) . $value);
    }

    public function prependAttributes($key, $value){
        return $this->attributes->setAttribute($key, $value . $this->attributes->getAttribute($key));
    }

    public function clear(){
        $this->attributes = [];
        return $this;
    }

    public function selfClosing(){
        $this->isSelfClosing = true;
        return $this;
    }

    public function appendBody($value){
        $this->body->appendBody($value);
        return $this;
    }

    public function prependBody($value){
        $this->body->prependBody($value);
        return $this;
    }

    public function __toString(){
        $tag = "<{$this->name}{$this->attributes}";

        if($this->isSelfClosing === false){
            $tag .= ">" . $this->body . "</{$this->name}>";
        }
        else{
            $tag .= " />";
        }

        return $tag;
    }

}