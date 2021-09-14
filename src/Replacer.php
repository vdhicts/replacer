<?php

namespace Vdhicts\Replacer;

class Replacer
{
    /**
     * Holds the open delimiter for the tokens.
     * @var string
     */
    private string $openDelimiter;

    /**
     * Holds the close delimiter for the tokens.
     * @var string
     */
    private string $closeDelimiter;

    public function __construct(string $openDelimiter = '[', string $closeDelimiter = ']')
    {
        $this->openDelimiter = $openDelimiter;
        $this->closeDelimiter = $closeDelimiter;
    }

    public function setOpenDelimiter(string $openDelimiter = '['): self
    {
        $this->openDelimiter = $openDelimiter;
        return $this;
    }

    public function setCloseDelimiter(string $closeDelimiter = ']'): self
    {
        $this->closeDelimiter = $closeDelimiter;
        return $this;
    }

    private function formatToken(string $token): string
    {
        return sprintf(
            '%s%s%s',
            $this->openDelimiter,
            strtoupper($token),
            $this->closeDelimiter
        );
    }

    private function getTokens(array $data = []): array
    {
        return array_map(
            function ($token) {
                return $this->formatToken($token);
            },
            array_keys($data)
        );
    }

    /**
     * Replaces the token with its values in the provided text.
     * @param string $text
     * @param array $data
     * @return string
     */
    public function process(string $text = '', array $data = []): string
    {
        // Determine the tokens which should be replaced
        $replaceTokens = $this->getTokens($data);
        if (count($replaceTokens) === 0) {
            return $text;
        }

        // Determine the values with which the tokens should be replaced
        $replaceValues = array_values($data);

        // Replace the tokens with the values
        return str_replace($replaceTokens, $replaceValues, $text);
    }
}
