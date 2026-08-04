<?php

declare(strict_types=1);

namespace Modules\Media\Actions\Diagnostic\S3;

use Spatie\QueueableAction\QueueableAction;
<<<<<<< HEAD
use Webmozart\Assert\Assert;
=======
>>>>>>> be7d0c3 (.)

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

<<<<<<< HEAD
        $title = $result['title'];
        $status = $result['status'];
        Assert::string($title);
        Assert::string($status);

        $lines = [
            '=== '.$title.' ===',
            'Status: '.$status,
=======
        $lines = [
            '=== '.(string) $result['title'].' ===',
            'Status: '.(string) $result['status'],
>>>>>>> be7d0c3 (.)
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

<<<<<<< HEAD
        if (is_string($value) || is_int($value) || is_float($value) || is_bool($value) || $value === null) {
            return $key.': '.(string) $value;
        }

        Assert::isInstanceOf($value, \Stringable::class);

        return $key.': '.$value;
=======
        return $key.': '.(string) $value;
>>>>>>> be7d0c3 (.)
    }
}
