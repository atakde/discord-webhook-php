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

        // Get the default extension based on mime type
        $defaultExtension = $this->getDefaultExtension($mime);

        // if file name does not contain extension, add it
        if (strpos($fileName, '.') === false) {
            $fileName .= '.' . (!empty($defaultExtension) ? $defaultExtension : 'dat');
        }

        return curl_file_create(
            $this->file->getRealPath(),
            $mime,
            $fileName
        );
    }

    private function getDefaultExtension($mime): ?string
    {
        $mimeToExtensionMap = [
            'image/jpeg' => 'jpg',
            'image/png' => 'png',
            'image/gif' => 'gif',
            'application/pdf' => 'pdf',
            'application/msword' => 'doc',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document' => 'docx',
            'application/vnd.ms-excel' => 'xls',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' => 'xlsx',
            'application/vnd.ms-powerpoint' => 'ppt',
            'application/vnd.openxmlformats-officedocument.presentationml.presentation' => 'pptx',
            'text/plain' => 'txt',
            'application/json' => 'json',
            'application/xml' => 'xml',
        ];

        return $mimeToExtensionMap[$mime] ?? null;
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
