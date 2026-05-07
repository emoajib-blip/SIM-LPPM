# Fix: Add MD5 Diagnostic Logging for PDF Merge Cross-Contamination

## File: `app/Services/ProposalPdfService.php`

### Change: Lines 40-44

**Current code:**
```php
Log::debug('Downloaded S3 media to temp for PDF merge', [
    'media_id' => $media->id,
    'temp_path' => $tempFile,
    'file_size' => strlen($content),
]);
```

**Replace with:**
```php
Log::debug('Downloaded S3 media to temp for PDF merge', [
    'media_id' => $media->id,
    's3_path' => $media->getPath(),
    'file_name' => $media->file_name,
    'temp_path' => $tempFile,
    'file_size' => strlen($content),
    'md5' => md5($content),
]);
```

### Purpose
Add MD5 hash and S3 path to diagnostic logs to detect if the same physical file is being used across different proposals (causing cross-contamination in merged PDFs).

### Deployment Steps
```bash
# Local
git add app/Services/ProposalPdfService.php
git commit -m "diagnostic: add MD5 hash logging to S3 PDF merge downloads"
git push origin main

# Production
git pull origin main
rm -rf storage/app/public/pdf_cache/proposals/*
php artisan optimize:clear
```

### Expected Log Output
```json
{
  "media_id": 38,
  "s3_path": "substance_file/communityservice-019dfeca/38/RrlNs3Nq0rxBrRJOJhetJzsAMcoJgCvCdmvuvOvh.pdf",
  "file_name": "substance-pkm.pdf",
  "temp_path": "/tmp/pdf_merge_xxx.pdf",
  "file_size": 66544,
  "md5": "a1b2c3d4e5f6..."
}
```

### Interpretation
- **Same MD5 across different proposals** = User uploaded identical files (data entry issue)
- **Different MD5 but wrong content** = Logic bug in file selection
- **Wrong S3 path** = Media library configuration bug
