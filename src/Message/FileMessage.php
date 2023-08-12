<?php

declare(strict_types=1);

namespace Atakde\DiscordWebhook\Message;

use CURLFile;
use finfo;
use SplFileObject;

class FileMessage extends Message
{
    private SplFileObject $file;
    private bool $tts = false;
    private string $content = '';

    /**
     * @param SplFileObject $file
     * @return FileMessage
     */

    public function setFile(SplFileObject $file): self
    {
        $this->file = $file;
        return $this;
    }

    /**
     * @param bool $tts
     * @return FileMessage
     */

    public function setTts(bool $tts): self
    {
        $this->tts = $tts;
        return $this;
    }

    /**
     * @param string $content
     * @return FileMessage
     */

    public function setContent(string $content): self
    {
        $this->content = $content;
        return $this;
    }

    public function toJson(): string
    {
        return json_encode($this->toArray());
    }

    public function toArray(): array
    {
        $data = [
            'tts' => json_encode($this->tts),
            'content' => $this->content,
            'file' => $this->prepareFile(),
        ];

        return $data;
    }

    private function prepareFile(): CURLFile
    {
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $mime = $finfo->file($this->file->getRealPath());
        $fileName = $this->file->getFilename();

        // if file name does not contain extension, add it
        if (strpos($fileName, '.') === false) {
            $fileName .= '.' . (!empty($mime) ? str_replace('image/', '', $mime) : 'jpg');
        }

        return curl_file_create(
            $this->file->getRealPath(),
            $mime,
            $fileName
        );
    }

    public function isMultiPart(): bool
    {
        return true;
    }

    public function setFileFromURL(string $url): self
    {
        $tempFile = tempnam(sys_get_temp_dir(), 'file_');
        file_put_contents($tempFile, file_get_contents($url));
        $this->setFile(new SplFileObject($tempFile));

        return $this;
    }
}
