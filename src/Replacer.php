<?php

namespace Vdhicts\Dicms\Replacer;

class Replacer
{

    /**
     * Holds the tokens and values which should be replaced.
     * @var array
     */
    private $data = [];

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
     * @param array $data
     * @param string $openDelimiter
     * @param string $closeDelimiter
     */
    public function __construct(array $data = [], string $openDelimiter = '[', string $closeDelimiter = ']')
    {
        $this->setData($data);
        $this->setOpenDelimiter($openDelimiter);
        $this->setCloseDelimiter($closeDelimiter);
    }

    /**
     * Returns the tokens and values which should be replaced.
     * @return array
     */
    private function getData(): array
    {
        return $this->data;
    }

    /**
     * Stores the tokens and values which should be replaced.
     * @param array $data
     */
    public function setData(array $data = [])
    {
        $this->data = $data;
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
     */
    public function setOpenDelimiter(string $openDelimiter = '[')
    {
        $this->openDelimiter = $openDelimiter;
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
     */
    public function setCloseDelimiter(string $closeDelimiter = ']')
    {
        $this->closeDelimiter = $closeDelimiter;
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
     * @return array
     */
    private function getTokens(): array
    {
        return array_map(
            function ($token) {
                return $this->formatToken($token);
            },
            array_keys($this->getData())
        );
    }

    /**
     * Returns the values of the tokens.
     * @return array
     */
    private function getTokenValues(): array
    {
        return array_values($this->getData());
    }

    /**
     * Replaces the token with its values in the provided text.
     * @param string $text
     * @return string
     */
    public function process(string $text = ''): string
    {
        $tokens = $this->getTokens();
        if (count($tokens) === 0) {
            return $text;
        }

        return str_replace($tokens, $this->getTokenValues(), $text);
    }
}
