<?php

namespace SisCad\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Venturecraft\Revisionable\Revisionable;
use Carbon\Carbon;
use DB;

class Payment extends Revisionable
{
    use SoftDeletes;
    protected $dates = [
        'payment_date',
        'deleted_at'];

    protected $revisionEnabled = true;
    protected $revisionCleanup = true; //Remove old revisions (works only when used with $historyLimit)
    protected $historyLimit = 9999999; //Maintain a maximum of 500 changes at any point of time, while cleaning up old revisions.
    protected $revisionCreationsEnabled = true;
    protected $dontKeepRevisionOf = [];
    #protected $revisionFormattedFields = array('title'  => 'string:<strong>%s</strong>', 'public' => 'boolean:No|Yes', 'deleted_at' => 'isEmpty:Active|Deleted');
    protected $revisionFormattedFieldNames = [
        'payment_date' => 'Data',
        'payment_reason_id' => 'Finalidade',
        'payment_method_id' => 'Meio',
        'payment_status_id' => 'Situação', 
        'payment_value' => 'Valor', 
        'deleted_at' => 'Excluído'
    ];
    protected $revisionFormattedFields = [
        'payment_date' => 'datetime:d/m/Y'
        ];

    protected $revisionNullString = 'nada';
    protected $revisionUnknownString = 'desconhecido';

    protected $fillable = [
        'member_id',
        'payment_date',
        'payment_year',
        'payment_month',
        'payment_day',
        'payment_reason_id',
        'payment_method_id',
        'payment_status_id',
        'payment_value',
        'payment_value_01',
        'payment_value_02',
        'payment_value_03',
        'payment_value_04',
        'payment_value_05',
        'payment_value_06',
        'payment_value_07',
        'payment_value_08',
        'payment_value_09',
        'payment_value_10',
        'payment_value_11',
        'payment_value_12'
    ];

    public function payment_reason()
    {
        return $this->belongsTo('SisCad\Entities\PaymentReason'); 
    }

    public function payment_method()
    {
        return $this->belongsTo('SisCad\Entities\PaymentMethod'); 
    }

    public function member()
    {
        return $this->belongsTo('SisCad\Entities\Member'); 
    }
}
