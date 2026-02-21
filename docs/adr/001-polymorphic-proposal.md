# ADR 001: Polymorphic Proposal Architecture

## Status
Accepted

## Context
The system needs to manage both Research (Penelitian) and Community Service (Pengabdian Masyarakat) activities. These activities share common metadata (title, status, budget summaries) but have distinct detailed requirements (TKT for Research, Social Impact for PKM).

## Decision
We utilize a Polymorphic relationship where a central `Proposal` model acts as the "Parent" and morphs to a `detailable` model (`Research` or `CommunityService`).

## Consequences
- **Positive:** Centralized workflow logic (status transitions, reviewer assignments) for both types.
- **Positive:** Easier reporting on aggregate grant data.
- **Negative:** Slightly more complex queries and the need to handle type-specific logic in Livewire components.
- **Technical Justification:** This aligns with the "Single Table Inheritance" vs "Class Table Inheritance" trade-off, optimized for shared status management while preserving structural integrity for specialized data.

## Scientific/Technical Foundation
Based on relational database normalization principles and the Liskov Substitution Principle (LSP) at the application layer.
