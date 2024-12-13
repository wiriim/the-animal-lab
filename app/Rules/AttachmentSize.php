<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class AttachmentSize implements ValidationRule
{
    protected $maxSize;

    /**
     * Create a new rule instance.
     *
     * @param int $maxSizeInMB Maximum allowed size in MB.
     */

    public function __construct($maxSizeInMB = 5)
    {
        $this->maxSize = $maxSizeInMB * 1024 * 1024; // Convert MB to bytes
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $totalSize = 0;

        // Ensure value is an array of files
        if (is_array($value)) {
            foreach ($value as $file) {
                $totalSize += $file->getSize(); // Calculate total size
            }
        }

        // Fail if total size exceeds the limit
        if ($totalSize > $this->maxSize) {
            $fail('The total size of attachments must not exceed ' . ($this->maxSize / (1024 * 1024)) . ' MB.');
        }
    }
}
