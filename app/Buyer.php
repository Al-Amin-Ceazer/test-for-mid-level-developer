<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    protected $appends = ['total_diary','total_eraser','total_pen', 'total_item'];

    public function diaries()
    {
        return $this->hasMany(DiaryTaken::class);
    }

    public function erasers()
    {
        return $this->hasMany(EraserTaken::class);
    }

    public function pens()
    {
        return $this->hasMany(PenTaken::class);
    }

    public function getTotalDiaryAttribute()
    {
        return $this->diaries()->sum('amount');
    }

    public function getTotalEraserAttribute()
    {
        return $this->erasers()->sum('amount');
    }

    public function getTotalPenAttribute()
    {
        return $this->pens()->sum('amount');
    }

    public function getTotalItemAttribute()
    {
        return $this->getTotalDiaryAttribute() + $this->getTotalEraserAttribute() + $this->getTotalPenAttribute();
    }
}
