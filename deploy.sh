#!/usr/bin/env bash
# Quick deploy script for SIM-LPPM Cloud Run
# Usage: ./deploy.sh "Commit message" [--seed]

set -euo pipefail

COMMIT_MSG=${1:-"Update deploy"}
SEED_FLAG=${2:-""}

# commit local changes
git add .
git commit -m "$COMMIT_MSG" || true

echo "Pushing to remote..."
git push origin HEAD

# Determine DB_SEED value
if [[ "$SEED_FLAG" == "--seed" ]]; then
  DB_SEED=true
else
  DB_SEED=false
fi

# Run gcloud deploy (ensure gcloud is authenticated and project set)

gcloud run deploy sim-lppm \
  --source . \
  --region asia-southeast2 \
  --set-env-vars "APP_KEY=base64:wR54BxUsOi/ILFPFYSFic+0/ttVExD8jY/wQiQg4R4w=,APP_DEBUG=false,APP_ENV=production,DB_SEED=$DB_SEED" \
  --quiet

echo "Deployment complete. DB_SEED was set to $DB_SEED."
