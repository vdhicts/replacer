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
    public function __construct(array $data = [], $openDelimiter = '[', $closeDelimiter = ']')
    {
        $this->setData($data);
        $this->setOpenDelimiter($openDelimiter);
        $this->setCloseDelimiter($closeDelimiter);
    }

    /**
     * Returns the tokens and values which should be replaced.
     * @return array
     */
    private function getData()
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
    private function getOpenDelimiter()
    {
        return $this->openDelimiter;
    }

    /**
     * Stores the open delimiter for the tokens.
     * @param string $openDelimiter
     */
    public function setOpenDelimiter($openDelimiter = '[')
    {
        if (is_string($openDelimiter)) {
            $this->openDelimiter = $openDelimiter;
        }
    }

    /**
     * Returns the close delimiter for the tokens.
     * @return string
     */
    private function getCloseDelimiter()
    {
        return $this->closeDelimiter;
    }

    /**
     * Stores the close delimiter for the tokens.
     * @param string $closeDelimiter
     */
    public function setCloseDelimiter($closeDelimiter = ']')
    {
        if (is_string($closeDelimiter)) {
            $this->closeDelimiter = $closeDelimiter;
        }
    }

    /**
     * Formats the token and adds the delimiters.
     * @param string $token
     * @return string
     */
    private function formatToken($token)
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
    private function getTokens()
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
    private function getTokenValues()
    {
        return array_values($this->getData());
    }

    /**
     * Replaces the token with its values in the provided text.
     * @param string $text
     * @return string|null
     */
    public function process($text = '')
    {
        if (! is_string($text)) {
            return null;
        }

        $tokens = $this->getTokens();
        if (count($tokens) === 0) {
            return $text;
        }

        return str_replace($tokens, $this->getTokenValues(), $text);
    }
}
