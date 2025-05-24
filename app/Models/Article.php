<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Fournisseur;
use App\Models\Emplacement;
use App\Models\User;
use App\Models\Facture;

class Article extends Model
{
    use HasFactory;

    protected $table = 'articles';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'description',
        'prix',
        'quantite',
        'category_id',
        'fournisseur_id',
        'emplacement_id',
        'created_by'
    ];

    public function factures()
    {
        return $this->belongsToMany(Facture::class, 'article_facture')
                    ->withPivot('quantite', 'prix_unitaire')
                    ->withTimestamps();
    }

    public function scopeSearch($query, $search)
    {
        return $query->where('name', 'like', "%{$search}%")
            ->orWhere('description', 'like', "%{$search}%")
            ->orWhere('prix', 'like', "%{$search}%")
            ->orWhere('quantite', 'like', "%{$search}%")
            ->orWhere('category_id', 'like', "%{$search}%")
            ->orWhere('fournisseur_id', 'like', "%{$search}%")
            ->orWhere('emplacement_id', 'like', "%{$search}%");
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%")
                ->orWhere('prix', 'like', "%{$search}%")
                ->orWhere('quantite', 'like', "%{$search}%")
                ->orWhere('category_id', 'like', "%{$search}%")
                ->orWhere('fournisseur_id', 'like', "%{$search}%")
                ->orWhere('emplacement_id', 'like', "%{$search}%");
        });
    }

    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'category_id');
    }

    public function fournisseur()
    {
        return $this->belongsTo(Fournisseur::class, 'fournisseur_id');
    }

    public function emplacement()
    {
        return $this->belongsTo(Emplacement::class, 'emplacement_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

}
