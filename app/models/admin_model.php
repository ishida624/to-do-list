<?php
use  Illuminate\Database\Eloquent\Model  as Eloquent;

class Admin extends Eloquent
{
    protected $table = 'admin';
    //public $incrementing = 'false';
    public $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable =['admin','password','user_info'];
}
