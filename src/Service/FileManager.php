<?php

namespace App\Service;

class FileManager
{
    /**
     * Deletes a given pdf file
     * @return bool
     */
    public function deletePDF(string $filename): bool
    {
        if (
            substr($filename, -4) === '.pdf' &&
            (
                substr($filename, 0, 15) === 'assets/contact/' ||
                substr($filename, 0, 17) === 'assets/estimates/' ||
                substr($filename, 0, 16) === 'assets/partners/'
            )
        ) {
            return unlink($filename);
        }
        return false;
    }
}
