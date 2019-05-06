<?php

namespace SisCad\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Venturecraft\Revisionable\Revisionable;
use DB;

class AccountingAccount extends Revisionable
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
        'parent_id' => 'Conta Sintética',
        'code' => 'Código', 
        'code_short' => 'Código Reduzido', 
        'account_type_id' => 'Tipo',
        'account_balance_type_id' => 'Tipo Saldo', 
        'account_coverage_type_id' => 'Abrangência',
        'description' => 'Descrição', 
        'deleted_at' => 'Excluído'
    ];
    protected $revisionNullString = 'nada';
    protected $revisionUnknownString = 'desconhecido';

    public function identifiableName() 
    {
        return $this->description;
    }

    protected $fillable = [
    	'parent_id',
        'code',
        'code_short',
    	'description',
        'account_type_id',
        'account_balance_type_id',
        'account_coverage_type_id'
    ];

    public function getCodeDescriptionAttribute()
    {
        return $this->code.' - '.$this->description.' ('.$this->code_short.')';
    }

    public function patrimonials()
    {
        return $this->hasMany('SisCad\Entities\Patrimonial');   
    }

    public function account_coverage_type()
    {
        return $this->belongsTo('SisCad\Entities\AccountCoverageType');   
    }

    public function account_type()
    {
        return $this->belongsTo('SisCad\Entities\AccountType');   
    }

    public function account_balance_type()
    {
        return $this->belongsTo('SisCad\Entities\AccountBalanceType');   
    }

    public function patrimonial_sub_type()
    {
        return $this->belongsTo('SisCad\Entities\PatrimonilSubType', 'asset_accounting_accont_id');   
    }

    public function balance_sheet()
    {
        return $this->belongsTo('SisCad\Entities\BalanceSheet');   
    }

    public function balance_sheet_previous()
    {
        return $this->belongsTo('SisCad\Entities\BalanceSheetPrevious');   
    }
}