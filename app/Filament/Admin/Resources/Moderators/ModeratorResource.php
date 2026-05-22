<?php

namespace App\Filament\Admin\Resources\Moderators;

use App\Enums\UserRole;
use App\Filament\Admin\Resources\Moderators\Pages\CreateModerator;
use App\Filament\Admin\Resources\Moderators\Pages\EditModerator;
use App\Filament\Admin\Resources\Moderators\Pages\ListModerators;
use App\Filament\Admin\Resources\Moderators\Pages\ViewModerator;
use App\Filament\Admin\Resources\Moderators\Schemas\ModeratorForm;
use App\Filament\Admin\Resources\Moderators\Schemas\ModeratorInfolist;
use App\Filament\Admin\Resources\Moderators\Tables\ModeratorsTable;
use App\Models\User;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ModeratorResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $slug = 'moderators';

    protected static ?string $label = 'Moderator';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::UserGroup;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return ModeratorForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ModeratorInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ModeratorsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListModerators::route('/'),
            'create' => CreateModerator::route('/create'),
            'view' => ViewModerator::route('/{record}'),
            'edit' => EditModerator::route('/{record}/edit'),
        ];
    }

    // In UserResource — filter to show only moderators
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->role(UserRole::MODERATOR);
    }
}
