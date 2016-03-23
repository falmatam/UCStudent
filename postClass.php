<?php
  class Post {
    var $title;
    var $price;
    var $location;
    var $description;

    function __construct($titlePar, $pricePar, $locationPar, $descriptionPar) {
      $this->title = $titlePar;
      $this->price = $pricePar;
      $this->location = $locationPar;
      $this->description = $descriptionPar;
    }

    function getTitle() {
      echo $this->title ."<br/>";
    }

    function getPrice() {
      echo $this->price ."<br/>";
    }

    function getLocation() {
      echo $this->location ."<br/>";
    }

    function getDescription() {
      echo $this->description ."<br/>";
    }
  }
?> 