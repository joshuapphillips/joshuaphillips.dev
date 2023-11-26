<div {{ $attributes->merge(['class' => 'relative flex gap-x-3']) }}>
    <div class="flex h-6 items-center">
        <input id="comments" name="comments" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
    </div>
    <div class="text-sm leading-6">
        <label for="comments" class="font-medium text-gray-900">Terms & Conditions</label>
        <p class="text-gray-500 text-xs">By submitting your details, you confirm that you agree to the storing and processing of your personal data by {{ config('app.name')}} as described in the <a href="{{ route('terms-and-conditions') }}" target="_blank" class="underline">Terms & Conditions</a>.</p>
    </div>
</div>