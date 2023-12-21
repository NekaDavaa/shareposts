<?php
class Pages extends Controller {
public function __construct() {

}

public function index() {
 $data = [
   'title' => 'SharePosts',
   'description' => 'Big thanks to TserovoMVC Team'
 ];
 $this->view('pages/index', $data);
}
public function about() {
 $data = [
   'title' => 'About Us',
   'description' => 'App for social media'
 ];
 $this->view('pages/about', $data);
}
}