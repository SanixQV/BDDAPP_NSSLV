<?php


namespace bddapp\model;


class friends
{
    protected $table = 'Friends';
    protected $primaryKey = ['char1_id','char2_id'];
    public $timestamps = false;

}