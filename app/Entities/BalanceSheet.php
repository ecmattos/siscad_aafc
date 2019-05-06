<?php

namespace SisCad\Entities;

use Illuminate\Database\Eloquent\Model;

class BalanceSheet extends Model
{
    public $timestamps = false;

    protected $dates = [
        'date_start',
        'date_end'
    ];

    protected $fillable = [
    	'user_id',
    	'management_unit_id', 
        'accounting_account_id',
        'balance_previous',
        'credit',
        'debit',
        'balance_current'
    ];

    public function getDateStartAttribute($value)
    {
        return $this->attributes['date_start'] = Carbon::parse($value)->format('Y-m-d');
    }

    public function management_units()
    {
        return $this->hasMany('SisCad\Entities\ManagementUnit'); 
    }

    public function accounting_accounts()
    {
        return $this->hasMany('SisCad\Entities\AccountingAccount'); 
    }

    public function account_coverage_type()
    {
        return $this->belongsTo('SisCad\Entities\AccountCoverageType');   
    }

    public function account_balance_type()
    {
        return $this->belongsTo('SisCad\Entities\AccountBalanceType');   
    }
}