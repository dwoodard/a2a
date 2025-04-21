<?php

use Dwoodard\A2A\Contracts\TaskHandler;

test('TaskHandler contract basic test', function () {
    expect(true)->toBeTrue();
});

describe('TaskHandler contract', function () {
    it('can be implemented and invoked', function () {
        // Create a simple implementation
        $handler = new class implements TaskHandler
        {
            public function __invoke(array $params): mixed
            {
                return $params['value'] ?? null;
            }
        };

        expect($handler(['value' => 42]))->toBe(42);
        expect($handler([]))->toBeNull();
    });
});
