<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name', // Gunakan nama kategori untuk membuat slug
                'separator' => '-', // Pisahkan slug dengan tanda "-"
            ]
        ];
        
    }

    // app/Models/Category.php

    public function services()
    {
        return $this->hasMany(Service::class, 'category_id');
    }

}
