<x-filament-panels::page>
    <form wire:submit.prevent="submitAction">
        {{ $this->form }}
    </form>

    {{-- Form Data Modal --}}
    <x-filament::modal id="form-data-modal" width="lg">
        <x-slot name="heading">
            {{ __('filemanager::messages.form_data_preview') }}
        </x-slot>

        <x-slot name="description">
            {{ __('filemanager::messages.submitted_form_data') }}
        </x-slot>

        <div class="space-y-4">
            @php
                $formData = $this->getFormData();
            @endphp

            <div class="rounded-lg border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 p-4">
                <h3 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('filemanager::messages.name') }}</h3>
                <p class="text-gray-900 dark:text-white">{{ $formData['title'] ?? __('filemanager::messages.not_set') }}</p>
            </div>

            <div class="rounded-lg border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 p-4">
                <h3 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">{{ __('filemanager::messages.raw_data') }}</h3>
                <pre class="text-xs text-gray-600 dark:text-gray-400 overflow-x-auto">{{ json_encode($formData, JSON_PRETTY_PRINT) }}</pre>
            </div>
        </div>

        <x-slot name="footerActions">
            <x-filament::button
                    x-on:click="$dispatch('close-modal', { id: 'form-data-modal' })"
                    color="primary"
            >
                {{ __('filemanager::messages.back_to_example') }}
            </x-filament::button>
        </x-slot>
    </x-filament::modal>
</x-filament-panels::page>