# ADR 004: Weighted Linear Scoring Algorithm

## Status
Accepted

## Context
Scientific review requires a numerical foundation to rank and approve proposals. While complex models like GMM (Gaussian Mixture Models) can provide deeper statistical insights into reviewer distributions, they introduce significant implementation and interpretability overhead for non-technical stakeholders (LPPM staff).

## Decision
We implement a **Weighted Linear Scoring Model** for the initial version. 
Algorithm: `Total Score = Σ (Criteria Score * Criteria Weight)`.
Validation: Scores are limited to a discrete range (1-5).

## Consequences
- **Positive:** High transparency; reviewers and lecturers can easily audit their final score.
- **Positive:** Low computational overhead for real-time Livewire updates.
- **Negative:** Less resilient to "Reviewer Bias" (outliers) compared to probabilistic models.

## Scientific/Technical Foundation
The model is based on Multi-Criteria Decision Analysis (MCDA), specifically the Simple Additive Weighting (SAW) method, which is the institutional standard for DIKTI-based research grants in Indonesia.
