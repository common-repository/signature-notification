<?php
/**
 * @license BSD-3-Clause
 *
 * Modified by notification on 02-October-2024 using {@see https://github.com/BrianHenryIE/strauss}.
 */ declare(strict_types=1);

namespace BracketSpace\Notification\Signature\Dependencies\PhpParser\Lexer\TokenEmulator;

use BracketSpace\Notification\Signature\Dependencies\PhpParser\PhpVersion;

/**
 * Reverses emulation direction of the inner emulator.
 */
final class ReverseEmulator extends TokenEmulator {
    /** @var TokenEmulator Inner emulator */
    private TokenEmulator $emulator;

    public function __construct(TokenEmulator $emulator) {
        $this->emulator = $emulator;
    }

    public function getPhpVersion(): PhpVersion {
        return $this->emulator->getPhpVersion();
    }

    public function isEmulationNeeded(string $code): bool {
        return $this->emulator->isEmulationNeeded($code);
    }

    public function emulate(string $code, array $tokens): array {
        return $this->emulator->reverseEmulate($code, $tokens);
    }

    public function reverseEmulate(string $code, array $tokens): array {
        return $this->emulator->emulate($code, $tokens);
    }

    public function preprocessCode(string $code, array &$patches): string {
        return $code;
    }
}
