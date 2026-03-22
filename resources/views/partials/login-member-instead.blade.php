<x-filament::button color="gray">
    <x-filament::link href="{{ filament()->getPanel('member')->getLoginUrl() }}" color="primary">
        Login as Member instead
    </x-filament::link>
</x-filament::button>