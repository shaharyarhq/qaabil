<?php

use App\Enums\CountryCode;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

new class extends Component
{
    public string $name = '';
    public string $email = '';
    public string $phone = '';
    public string $country_code = '';
    public string $topic = '';
    public string $message = '';
    public bool $sent = false;

    public function mount(): void
    {
        $this->country_code = CountryCode::default()->value;
    }

    public function send(): void
    {
        $this->validate();

        $fullPhone = null;
        if ($this->phone && $this->country_code) {
            $iso = CountryCode::from($this->country_code)->name;
            $fullPhone = phone($this->phone, $iso)->formatE164();
        }

        Mail::to(config('app.admin_email'))->send(new ContactFormMail([
            'name'    => $this->name,
            'email'   => $this->email,
            'phone'   => $fullPhone,
            'topic'   => $this->topic,
            'message' => $this->message,
        ]));

        $this->sent = true;
    }

    protected function rules(): array
    {
        $iso = $this->country_code
            ? CountryCode::from($this->country_code)->name
            : 'AUTO';

        return [
            'name'         => 'required|string|max:100',
            'email'        => 'required|email',
            'country_code' => 'nullable|string',
            'phone'        => ['nullable', "phone:{$iso}"],
            'topic'        => 'nullable|string|max:100',
            'message'      => 'required|string|max:2000',
        ];
    }

    protected function messages(): array
    {
        return [
            'phone.phone' => 'Please enter a valid phone number for the selected country.',
        ];
    }
};
