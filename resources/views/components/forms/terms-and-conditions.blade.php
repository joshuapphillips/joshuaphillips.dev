<label for="terms-and-conditions"><input id="terms-and-conditions" type="checkbox" wire:model="{{ $wire }}">
    By submitting your details, you confirm that you agree to the storing and processing of your personal data by {{ config('app.name')}} as described in the <a href="{{ route('terms-and-conditions') }}" target="_blank">Terms & Conditions</a>
</label>