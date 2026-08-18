<?php

declare(strict_types=1);

namespace Modules\Media\Actions\Diagnostic\S3;

use Modules\Xot\Actions\Cast\SafeStringCastAction;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

use function Safe\json_encode;

class FormatDebugOutputAction
{
    use QueueableAction;

    /**
     * @param  array<string, mixed>  $debugResults
     */
    public function execute(array $debugResults, string $emptyMessage): string
    {
        if ($debugResults === []) {
            return $emptyMessage;
        }

        $output = [];
        foreach ($debugResults as $result) {
            $block = $this->formatResultBlock($result);
            if ($block !== []) {
                array_push($output, ...$block);
            }
        }

        return implode("\n", $output);
    }

    /**
     * @return list<string>
     */
    private function formatResultBlock(mixed $result): array
    {
        if (! is_array($result) || ! isset($result['title'], $result['status'], $result['data'])) {
            return [];
        }

        $lines = [
            '=== '.SafeStringCastAction::cast($result['title']).' ===',
            'Status: '.SafeStringCastAction::cast($result['status']),
            '',
        ];

        if (is_array($result['data'])) {
            array_push($lines, ...$this->formatDataLines($result['data']));
        }

        $lines[] = '';
        $lines[] = str_repeat('-', 50);
        $lines[] = '';

        return $lines;
    }

    /**
     * @param  array<mixed, mixed>  $data
     * @return list<string>
     */
    private function formatDataLines(array $data): array
    {
        $lines = [];
        foreach ($data as $key => $value) {
            $lines[] = $this->formatDataLine((string) $key, $value);
        }

        return $lines;
    }

    private function formatDataLine(string $key, mixed $value): string
    {
        if (is_array($value)) {
            return $key.': '.json_encode($value, JSON_PRETTY_PRINT);
        }

        return $key.': '.SafeStringCastAction::cast($value);
    }
}
