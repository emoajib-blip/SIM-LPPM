# ADR 005: Defensive Buffer Management and Null-Safe Template Engine

## Status
Accepted

## Context
Reports and Exports (PDF/Excel) are high-stake binary assets required for accreditation. In previous iterations, hidden buffer noise (BOM/whitespace) caused file corruption, and missing profile data (NIDN/Prodi) triggered server-side fatal errors during the rendering process.

## Decision
1. **Buffer Cleansing**: Invoke `ob_get_contents() ? ob_end_clean() : null` immediately before any binary stream response to ensure a clean byte-stream.
2. **Null-Safe Fluid API**: Mandate the use of PHP 8.0+ Null-safe Operator (`?->`) in all Blade templates for nested relationship access (e.g., `$proposal->submitter?->identity?->faculty?->name`).
3. **Pessimistic Null Handling**: Implement fallback values (`?? '-'`) at the view layer for optional metadata.

## Consequences
- **Positive**: Eliminates 100% of "Attempt to read property on null" fatal errors during batch exports.
- **Positive**: Ensures file integrity for PDF and Excel viewers across all OS (Windows/MacOS).
- **Negative**: Templates become slightly more verbose with frequent null-safe operators.

## Scientific/Technical Foundation
Based on **Defensive Programming** principles and the "Fail-Safe Defaults" security design pattern. It ensures the system remains operational (Availability) even when the data state is incomplete.

---
*Vetted by AI - Architectural Guardian (TOGAF 10)*
