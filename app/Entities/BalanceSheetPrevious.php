<?php

namespace SisCad\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Venturecraft\Revisionable\Revisionable;
use DB;

class BalanceSheetPrevious extends Revisionable
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $revisionEnabled = true;
    protected $revisionCleanup = true; //Remove old revisions (works only when used with $historyLimit)
    protected $historyLimit = 9999999; //Maintain a maximum of 500 changes at any point of time, while cleaning up old revisions.
    protected $revisionCreationsEnabled = true;
    protected $dontKeepRevisionOf = [];
    #protected $revisionFormattedFields = array('title'  => 'string:<strong>%s</strong>', 'public' => 'boolean:No|Yes', 'deleted_at' => 'isEmpty:Active|Deleted');
    protected $revisionFormattedFieldNames = [
        'management_unit_id' => 'Unid.Gestora', 
        'accounting_account_id' => 'Conta',
        'balance_previous' => 'Saldo Anterior',
        'deleted_at' => 'Excluído'
    ];
    protected $revisionNullString = 'nada';
    protected $revisionUnknownString = 'desconhecido';

    public function identifiableName() 
    {
        return $this->description;
    }

    protected $fillable = [
    	'management_unit_id',
    	'accounting_account_id',
    	'balance_previous'
    ];

    public function management_unit()
    {
        return $this->belongsTo('SisCad\Entities\ManagementUnit'); 
    }

    public function accounting_account()
    {
        return $this->belongsTo('SisCad\Entities\AccountingAccount'); 
    }
}