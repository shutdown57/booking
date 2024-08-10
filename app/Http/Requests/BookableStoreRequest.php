<?php

namespace App\Http\Requests;

use App\Enums\BookableStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class BookableStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if (Gate::authorize('create', \App\Models\Bookable::class)) {
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'min:3', 'max:255'],
            'bookableType' => ['required', 'exists:bookable_types,id'],
            'perHourRate' => ['required', 'min:1', 'max:2000000000'],
            'status' => ['required', Rule::enum(BookableStatus::class)],
            'image' => ['nullable', 'extensions:jpg,png,jpeg']
        ];
    }
}
