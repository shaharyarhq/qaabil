<?php

use Livewire\Component;

new class extends Component {
    protected $privacyPolicySettings;

    public function mount()
    {
        $this->privacyPolicySettings = getPrivacyPolicyPageSettings();
    }
};
?>

<div>
    {{-- It is never too late to be what you might have been. - George Eliot --}}
    {!! str($this->privacyPolicySettings->content)->sanitizeHtml() !!}

</div>
