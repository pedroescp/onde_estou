<div>
    <div>
        <x-input-label for="name" :value="__('Nome da empresa')" />
        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
            value="{{ $companie->name ?? old('name') }}" required autofocus autocomplete="name" />
        <x-input-error class="mt-2" :messages="$errors->get('name')" />
    </div>
    @unless ($companie)
        {{-- <br>
        <div>
            <x-input-label for="parent_id" :value="__('Nome da empresa')" />
            <x-text-input id="parent_id" name="parent_id" type="text" class="mt-1 block w-full" :value="old('parent_id')"
                autofocus autocomplete="parent_id" />
            <x-input-error class="mt-2" :messages="$errors->get('parent_id')" />
        </div> --}}
    @endunless
    <br>

    <x-primary-button>{{ __('Salvar') }}</x-primary-button>

</div>
