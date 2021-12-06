<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    public function getDetail()
    {
        $txt = $this->id . $this->fullname . $this->gender . $this->email . $this->postcode . $this->address . $this->buildingname . $this->opinion;
        return $txt;
    }
}
