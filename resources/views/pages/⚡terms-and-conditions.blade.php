<?php

use Livewire\Component;

new class extends Component {
    protected $termsAndConditionsSettings;

    public function mount()
    {
        $this->termsAndConditionsSettings = getTermsAndConditionsPageSettings();
    }
};
?>

<div>
    {{-- It is never too late to be what you might have been. - George Eliot --}}
    {!! str($this->termsAndConditionsSettings->content)->sanitizeHtml() !!}

</div>
