<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends BaseModel
{
    use HasFactory;
    protected $fillable = ['logo', 'title', 'email', 'address', 'contact', 'description', 'work_description', 'facebook_url', 'twitter_url', 'github_url', 'instagram_url', 'welcome_image', 'about_image'];
    public function getLogoUrlAttributes()
    {
        return $this->logo;
    }
    public function getLogoAttribute()
    {
        return '/uploads/' . $this->attributes['logo'];
    }
}
