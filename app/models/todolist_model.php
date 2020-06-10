<?php
use  Illuminate\Database\Eloquent\Model  as Eloquent;

class T1 extends Eloquent
{
    protected $table = 't1';
    public $incrementing = 'false';
    public $primaryKey = 'no';
    public $timestamps = false;
    protected $fillable =['item','status','update_user'];
}
