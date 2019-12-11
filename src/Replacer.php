<?php

namespace Vdhicts\Dicms\Replacer;

class Replacer
{
    /**
     * Holds the open delimiter for the tokens.
     * @var string
     */
    private $openDelimiter = '[';

    /**
     * Holds the close delimiter for the tokens.
     * @var string
     */
    private $closeDelimiter = ']';

    /**
     * Replacer constructor.
     * @param string $openDelimiter
     * @param string $closeDelimiter
     */
    public function __construct(string $openDelimiter = '[', string $closeDelimiter = ']')
    {
        $this->setOpenDelimiter($openDelimiter);
        $this->setCloseDelimiter($closeDelimiter);
    }

    /**
     * Holds the open delimiter for the tokens.
     * @return string
     */
    private function getOpenDelimiter(): string
    {
        return $this->openDelimiter;
    }

    /**
     * Stores the open delimiter for the tokens.
     * @param string $openDelimiter
     * @return Replacer
     */
    public function setOpenDelimiter(string $openDelimiter = '['): self
    {
        $this->openDelimiter = $openDelimiter;

        return $this;
    }

    /**
     * Returns the close delimiter for the tokens.
     * @return string
     */
    private function getCloseDelimiter(): string
    {
        return $this->closeDelimiter;
    }

    /**
     * Stores the close delimiter for the tokens.
     * @param string $closeDelimiter
     * @return Replacer
     */
    public function setCloseDelimiter(string $closeDelimiter = ']'): self
    {
        $this->closeDelimiter = $closeDelimiter;

        return $this;
    }

    /**
     * Formats the token and adds the delimiters.
     * @param string $token
     * @return string
     */
    private function formatToken(string $token): string
    {
        return sprintf(
            '%s%s%s',
            $this->getOpenDelimiter(),
            strtoupper($token),
            $this->getCloseDelimiter()
        );
    }

    /**
     * Returns the tokens.
     * @param array $data
     * @return array
     */
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
     * Returns the values of the tokens.
     * @param array $data
     * @return array
     */
    private function getTokenValues(array $data = []): array
    {
        return array_values($data);
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
        $replaceValues = $this->getTokenValues($data);

        // Replace the tokens with the values
        return str_replace($replaceTokens, $replaceValues, $text);
    }
}
