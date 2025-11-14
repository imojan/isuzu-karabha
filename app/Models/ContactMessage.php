<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'phone', 'subject', 'message', 'status',
    ];

    /** Contoh helper sederhana untuk status */
    public function markAs(string $status): void
    {
        $this->status = $status; // new|read|replied (sesuai migrasi)
        $this->save();
    }
}
