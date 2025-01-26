<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreChatRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Authorization is handled by the ChatPolicy
        return true;
    }

    /**
     * Validation rules for the chat message.
     */
    public function rules(): array
    {
        return [
            'message' => 'required|string|max:500',
            'article_id' => 'required|exists:articles,id',
        ];
    }
}