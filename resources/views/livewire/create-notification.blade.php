<form wire:submit.prevent="createNotification">
    <div class="mb-4">
        <label for="icon">{{ __('Icon') }}</label>
        <select class="form-control" wire:model="icon" id="icon">
            @foreach($iconList as $icon)
                <option>{{ $icon }}</option>
            @endforeach
        </select>
        <span class="text-danger">
            {{ $errors->first('icon') }}
        </span>
    </div>
    <div class="mb-4">
        <label for="message">{{ __('Message') }}</label>
        <input type="text" class="form-control" wire:model="message" id="message">
        <span class="text-danger">
            {{ $errors->first('message') }}
        </span>
    </div>
    <div class="mb-4">
        <button type="submit" class="btn btn-success">
            {{ __('Create') }}
        </button>
    </div>
</form>
