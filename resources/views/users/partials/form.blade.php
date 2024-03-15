<div>
    <div>
        <x-input-label for="name" :value="__('Nome do funcionário')" />
        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
            value="{{ $user->name ?? old('name') }}" required autofocus autocomplete="name" />
        <x-input-error class="mt-2" :messages="$errors->get('name')" />
    </div>
    <br>

    <x-primary-button>{{ __('Atualizar nome') }}</x-primary-button>

</div>
