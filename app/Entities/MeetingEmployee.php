<?php

namespace SisCad\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Venturecraft\Revisionable\Revisionable;

use SisCad\Entities\Employee;
use SisCad\Entities\Meeting;

/**
 * Class MeetingMember.
 *
 * @package namespace SisCad\Entities;
 */
class MeetingEmployee extends Revisionable
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
        'meeting_id' => 'Evento', 
        'employee_id' => 'Funcionário', 
        'expected_qty' => 'Funcionário Qte Previsto',
		'expected_qty_companion' => 'Funcionário Qte Acomp Previsto',
		'expected_qty_companion_extra' => 'Funcionário Qte Acomp Extra Previsto',
		'confirmed_qty' => 'Funcionário Qte Confirmado',
		'confirmed_qty_companion' => 'Funcionário Qte Acomp Confirmado',
		'confirmed_qty_companion_extra' => 'Funcionário Qte Acomp Extra Confirmado',
        'comments' => 'Observações',
        'deleted_at' => 'Excluído'
    ];
    protected $revisionNullString = 'nada';
    protected $revisionUnknownString = 'desconhecido';

    public function identifiableName() 
    {
        return $this->description;
    }

    protected $fillable = [
        'meeting_id', 
        'employee_id', 
        'checked', 
        'expected_qty',
		'expected_qty_companion',
		'expected_qty_companion_extra',
		'confirmed_qty',
		'confirmed_qty_companion',
		'confirmed_qty_companion_extra',
        'comments'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);   
    }

    public function meeting()
    {
        return $this->belongsTo(Meeting::class);   
    }
}

