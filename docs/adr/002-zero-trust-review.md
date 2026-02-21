# ADR 002: Zero Trust Security in Review Actions

## Status
Accepted

## Context
Initial implementation lacked strict ownership and integrity checks for review submissions, potentially allowing unauthorized modifications or incomplete data entry (ghost reviews).

## Decision
Implement a Zero Trust policy at the Action layer. Every review submission must:
1. Validate `Auth::id()` against `ProposalReviewer->user_id`.
2. Ensure specific prerequisite data (`review_scores`) exists before state change.
3. Wrap all operations in an atomic database transaction.

## Consequences
- **Positive:** Guaranteed data integrity and auditability.
- **Positive:** Protection against ID-guessing (Insecure Direct Object Reference) attacks.
- **Negative:** Increased code complexity and slight overhead from count() queries.

## Scientific/Technical Foundation
Adheres to the "Principle of Least Privilege" and NIST Zero Trust Architecture (ZTA) standards by verifying every request explicitly at the point of fulfillment.
