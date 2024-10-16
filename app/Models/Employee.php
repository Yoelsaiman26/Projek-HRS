<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_number';

    protected $fillable = [
        'id_number',
        'full_name',
        'nickname',
        'contract_date',
        'work_date',
        'status',
        'position',
        'nuptk',
        'gender',
        'place_birth',
        'birth_date',
        'religion',
        'email',
        'hobby',
        'marital_status',
        'residence_address',
        'phone',
        'address_emergency',
        'phone_emergency',
        'blood_type',
        'last_education',
        'agency',
        'graduation_year',
        'competency_training_place',
        'organizational_experience',
        'archived'
    ];

    public function employeeRecord()
    {
        return $this->hasMany(Employee_record::class, 'id_number', 'id_number');
    }

    public function familyData()
    {
        return $this->hasOne(FamilyData::class, 'id_number', 'id_number');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'email', 'email');
    }
}

