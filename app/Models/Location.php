<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $all_countries;

    public function __construct(array $attributes = array()) {
        parent::__construct($attributes);
        $this->all_countries = json_decode(file_get_contents(base_path('resources/json/country_codes.json')));
    }

    public function countryCode($country_name) {
        
    }

    public function all_countries() {
        return $this->all_countries;
    }
}
