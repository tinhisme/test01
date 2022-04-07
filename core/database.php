<?php
abstract class database{
    abstract public function get($limit = 15,$offset = 0);
    abstract public function getID($id);
    abstract public function insert($data);
    abstract public function update($id, $data);
    abstract public function delete($id);
}