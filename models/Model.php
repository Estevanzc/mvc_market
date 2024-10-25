<?php

namespace Model;

abstract class Model {

    abstract public function selectAll($vo);

    abstract public function selectOne($vo);

    abstract public function insert($vo);

    abstract public function update($vo);

    abstract public function delete($vo);

}