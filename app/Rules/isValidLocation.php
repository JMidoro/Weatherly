<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Contracts\Validation\DataAwareRule;
use App\Http\Controllers\WeatherMapController;
use App\Models\Location;

class isValidLocation implements Rule, DataAwareRule
{

    protected $data = [];
    protected $message = 'This does not appear to be a valid zip.';
 
    public function setData($data)
    {
        $this->data = $data;
 
        return $this;
    }

    public function passes($attribute, $value)
    {
        $countries = new Location;
        $country_codes = array_keys((array) $countries->all_countries());

        if (!in_array($this->data['country'], $country_codes)) {
            $this->message = "Can't find zip for an invalid country.";
            return false;
        }

        $user_location = (object) array(
            'zip' => $value,
            'country' => $this->data['country']
        );

        $geocoded_location = WeatherMapController::geocoded($user_location);
        if (isset($geocoded_location['cod'])) {
            return false;
        }

        return true;
    }

    public function message()
    {
        return $this->message;
    }
}
