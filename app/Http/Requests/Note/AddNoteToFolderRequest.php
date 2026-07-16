<?php

namespace App\Http\Requests\Note;

use App\Models\Folder;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AddNoteToFolderRequest extends FormRequest
{
    public function authorize(): bool
    {
        $note = $this->route('note');

        return $note && $this->user()?->can('update', $note);
    }

    public function rules(): array
    {
        return [
            'folder_id' => [
                'required',
                'integer',
                Rule::exists('folders', 'id')->where(fn ($query) => $query->where('user_id', $this->user()->id)),
            ],
        ];
    }

    protected function prepareForValidation(): void
    {
        if ($this->route('folder')) {
            $this->merge([
                'folder_id' => $this->route('folder') instanceof Folder
                    ? $this->route('folder')->id
                    : $this->route('folder'),
            ]);
        }
    }
}
