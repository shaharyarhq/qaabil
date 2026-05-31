<?php

use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

new class extends Component
{
    public string $name = '';
    public string $email = '';
    public string $phone = '';
    public string $phone_number = '';
    public string $country_code = '';
    public string $topic = '';
    public string $message = '';
    public bool $sent = false;

    public function send(): void
    {
        // merge first, then validate
        $this->phone = empty($this->phone)
            ? ''
            : $this->country_code . ltrim(trim($this->phone), '+0');

        $this->validate();

        Mail::to('info@qaabil.com')->send(new ContactFormMail([
            'name'    => $this->name,
            'email'   => $this->email,
            'phone'   => $this->phone ?: null,
            'topic'   => $this->topic,
            'message' => $this->message,
        ]));

        $this->sent = true;
    }

    protected function rules(): array
    {
        return [
            'name'         => 'required|string|max:100',
            'email'        => 'required|email',
            'country_code' => 'nullable|string|max:10',
            'phone'        => ['nullable', 'phone:AUTO'],
            'topic'        => 'nullable|string|max:100',
            'message'      => 'required|string|max:2000',
        ];
    }

    protected function messages(): array
    {
        return [
            'phone.phone' => 'Please enter a valid phone number for the selected country code.',
        ];
    }
};
