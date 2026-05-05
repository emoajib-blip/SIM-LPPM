#!/bin/bash
echo "Restoring assets from backup..."
cp -r storage/backups/assets-backup-$(ls storage/backups/ | grep assets-backup | sort -r | head -1 | cut -d'-' -f3)/* public/build/assets/
echo "Assets restored!"
