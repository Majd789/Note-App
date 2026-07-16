<?php

namespace App\Http\Requests\Note;

use Illuminate\Foundation\Http\FormRequest;

class StoreNoteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string'],
        ];
    }

    protected function prepareForValidation(): void
    {
        // Support legacy form field name "description"
        if ($this->has('description') && ! $this->has('body')) {
            $this->merge([
                'body' => $this->input('description'),
            ]);
        }
    }
}
