<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Contact;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';
    protected $fillable = ['course_name', 'course_duration', 'courseID'];

    public function contacts()
    {
        return $this->hasMany(Contact::class, 'courseID');
    }
}
