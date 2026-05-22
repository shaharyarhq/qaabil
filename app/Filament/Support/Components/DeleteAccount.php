<?php

namespace App\Filament\Support\Components;

use Filament\Actions\Action;
use Filament\Facades\Filament;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Jeffgreco13\FilamentBreezy\Livewire\MyProfileComponent;

class DeleteAccount extends MyProfileComponent
{
    protected string $view = 'filament.support.components.delete-account';

    public ?array $data = [];

    public $user;

    public static $sort = 20;

    public function mount(): void
    {
        $this->user = Filament::getCurrentOrDefaultPanel()->auth()->user();
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                 Section::make(__('profile.sections.delete_account.title'))
                    ->description(__('profile.sections.delete_account.description'))
                    ->aside()
                    ->schema([
                        TextEntry::make('deleteAccountNotice')
                            ->hiddenLabel()
                            ->state(fn (): string|array => __('profile.sections.delete_account.notice')),
                        Actions::make([
                            Action::make('deleteAccount')
                                ->label(__('profile.actions.delete_account'))
                                ->color('danger')
                                ->requiresConfirmation()
                                ->modalHeading(__('profile.sections.delete_account.title'))
                                ->modalDescription(__('profile.modals.delete_account.notice'))
                                ->modalSubmitActionLabel(__('profile.actions.delete_account'))
                                ->modalCancelAction(false)
                                ->action(fn (array $data): Redirector|RedirectResponse|null => $this->deleteAccount($data['password'] ?? null)),
                        ]),
                    ]),
            ])
            ->statePath('data');
    }
}
