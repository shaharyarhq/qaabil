<x-filament::section :aside="true" heading="Delete Account" description="Delete your account permanently. This action cannot be undone.">
    <form wire:submit.prevent="submit" class="space-y-6">

        {{ $this->form }}

        <div class="text-right">
            <x-filament::button type="submit" form="submit" class="align-right">
                Delete Account
            </x-filament::button>
        </div>
    </form>
</x-filament::section>
