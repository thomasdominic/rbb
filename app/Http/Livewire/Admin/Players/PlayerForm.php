<?php

namespace App\Http\Livewire\Admin\Players;

use App\Enums\BatingPosition;
use App\Enums\ClubLevel;
use App\Enums\Gender;
use App\Enums\MediaCollectionName;
use App\Enums\ThrowingHand;
use App\Models\Club;
use App\Models\Player;
use App\Models\Post;
use CodencoDev\CodencoFaster\Http\Livewire\ModelFormComponent;
use CodencoDev\CodencoFaster\Http\Livewire\Traits\HasAutocompleteFields;
use Illuminate\Validation\Rule;
use Spatie\MediaLibraryPro\Http\Livewire\Concerns\WithMedia;

class PlayerForm extends ModelFormComponent
{
    use HasAutocompleteFields;
    protected array $autocompleteFields = [
        'Club'
        ];
    use WithMedia;
    public $mediaComponentNames = [
        'profil',

    ];
    public $profil;
    public $current = null;
    public $clubs;

    public string $modelClass = Player::class;

    protected $rules = [
        'current.name' => ['required','max:255','string'],
        'current.firstname' => ['required','max:255','string'],
        'current.size' => ['nullable','integer'],
        'current.weight' => ['nullable','integer'],
        'current.born_at' => ['nullable','date'],
        'current.place_of_born' => ['nullable','string'],
        'current.arriving_year' => ['nullable','string'],
        'profil' => 'nullable',

    ];

    public function rules()
    {
        return array_merge([
            'current.gender' => ['nullable','string',Rule::in(Gender::asArray())],
            'current.throwing_hand' => ['nullable','string',Rule::in(ThrowingHand::asArray())],
            'current.bating_position' => ['nullable','string',Rule::in(BatingPosition::asArray())],
            ], $this->rules);
    }

    protected function afterSave(): bool
    {

        $this->current->syncFromMediaLibraryRequest($this->profil)
            ->toMediaCollection(MediaCollectionName::PLAYER_PROFILE);

        $this->current->clubs()->sync($this->clubs->pluck('id'));

        return parent::afterSave(); // TODO: Change the autogenerated stub
    }

    public function mount(?int $id = null)
    {
        parent::mount($id); // TODO: Change the autogenerated stub
        $this->current->load(['clubs']);

        $this->clubs = $this->current->clubs;

    }

    public function setClubAutocomplete($object)
    {
        if(!is_null($object['value'])){
            $this->emptyAutocomplete($object['name']);
            $this->clubs->push(Club::find($object['value']));
        }
    }


}




