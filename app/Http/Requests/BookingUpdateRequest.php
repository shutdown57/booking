<?php

namespace App\Http\Requests;

use App\Enums\BookableUserStatus;
use App\Rules\BookOut;
use App\Services\BookingService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class BookingUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @param BookingService $service BookingService object
     */
    public function authorize(BookingService $service): bool
    {
        if (Gate::authorize('edit', $service->book($this->route('id')))) {
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
            'bookIn' => ['required', 'date', 'after_or_equal:today'],
            'bookOut' => ['required', 'date', new BookOut()],
            'status' => ['nullable', 'int', Rule::enum(BookableUserStatus::class)],
            'bookable' => ['required', 'integer', 'exists:bookables,id'],
        ];
    }
}
