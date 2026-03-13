# ADR 003: Automated Conflict of Interest (CoI) Mitigation

## Status
Accepted

## Context
Assigning reviewers who are part of the research team or are the submitters themselves creates a fundamental breach of academic integrity.

## Decision
Introduce hard validation rules in the `AssignReviewersAction` to block any assignment where the `reviewer_id` matches the `submitter_id` or any `user_id` in the `proposal_user` pivot table.

## Consequences
- **Positive:** Institutional credibility for grant management.
- **Positive:** Complies with national research guidelines (DIKTI/SINTA).
- **Negative:** Requires Admin LPPM to find alternate qualified reviewers.

## Scientific/Technical Foundation
Based on Social Network Analysis (SNA) principles regarding "Closeness Centrality" where direct connections/incentives invalidate objectivity.
