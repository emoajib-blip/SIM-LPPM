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

# --- CONFIGURATION (MUST BE CONFIGURED IN GOOGLE CLOUD) ---
# PERINGATAN: Jika password mengandung karakter koma (,), gcloud akan error.
CLOUDSQL_CONNECTION=${CLOUDSQL_CONNECTION:-"gen-lang-client-0704185463:asia-southeast2:sim-lppm-db"}
DB_NAME=${DB_NAME:-"sim_lppm"}
DB_USER=${DB_USER:-"root"}
DB_PASS=${DB_PASS:-"1212"}

echo "Deploying to Cloud Run using Cloud SQL: $CLOUDSQL_CONNECTION"

# Menggunakan format list agar lebih aman dari parsing error
ENV_VARS="APP_KEY=base64:wR54BxUsOi/ILFPFYSFic+0/ttVExD8jY/wQiQg4R4w="
ENV_VARS+=",APP_DEBUG=false"
ENV_VARS+=",APP_ENV=production"
ENV_VARS+=",APP_URL=https://sim-lppm-969068032676.asia-southeast2.run.app"
ENV_VARS+=",DB_CONNECTION=mysql"
ENV_VARS+=",DB_SOCKET=/cloudsql/$CLOUDSQL_CONNECTION"
ENV_VARS+=",DB_DATABASE=$DB_NAME"
ENV_VARS+=",DB_USERNAME=$DB_USER"
ENV_VARS+=",DB_PASSWORD=$DB_PASS"
ENV_VARS+=",SESSION_DRIVER=database"
ENV_VARS+=",DB_SEED=$DB_SEED"

gcloud run deploy sim-lppm \
  --source . \
  --region asia-southeast2 \
  --set-env-vars "$ENV_VARS" \
  --add-cloudsql-instances "$CLOUDSQL_CONNECTION" \
  --quiet

echo "Deployment complete. DB_SEED was set to $DB_SEED."
