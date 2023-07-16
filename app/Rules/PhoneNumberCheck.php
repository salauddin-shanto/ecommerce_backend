<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class PhoneNumberCheck implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
    }

    protected $clientId;
    protected $phoneNumber;
    protected $attribute;

    public function __construct($clientId, $phoneNumber, $attribute)
    {
        $this->clientId = $clientId;
        $this->phoneNumber = $phoneNumber;
        $this->attribute = $attribute;
    }

    public function passes($attribute, $value)
    {
        $phoneNumber = $this->phoneNumber;

        $count = DB::table('clients')
            ->where(function ($query) use ($value, $attribute, $phoneNumber) {
                $query->where(function ($query) use ($attribute, $value) {
                    $query->where($attribute, $value);
                })
                ->orWhere(function ($query) use ($attribute, $value, $phoneNumber) {
                    $query->where('phone', $value)
                        ->where($attribute, '<>', $phoneNumber);
                });
            })
            ->where('id', '<>', $this->clientId)
            ->count();

        return $count === 0;
    }

    public function message()
    {
        return "The {$this->attribute} number is already taken.";
    }
}