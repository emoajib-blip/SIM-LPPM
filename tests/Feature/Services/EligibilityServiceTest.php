<?php

use App\Models\Identity;
use App\Models\ResearchScheme;
use App\Services\EligibilityService;

beforeEach(function () {
    $this->service = app(EligibilityService::class);
});

describe('EligibilityService', function () {
    describe('checkEligibility', function () {
        it('returns eligible when all requirements are met', function () {
            $identity = Identity::factory()->create([
                'sinta_score_v3_overall' => 500,
                'scopus_h_index' => 10,
                'functional_position' => 'Lektor',
            ]);

            $rules = [
                'min_sinta_score' => 400,
                'min_scopus_score' => 8,
                'allowed_functional_positions' => ['Lektor', 'Guru Besar'],
            ];

            $status = $this->service->getEligibilityStatus($identity, $rules);

            expect($status['eligible'])->toBeTrue();
            expect($status['passed_checks'])->toHaveCount(3);
            expect($status['failed_checks'])->toHaveCount(0);
        });

        it('returns ineligible when SINTA score is below minimum', function () {
            $identity = Identity::factory()->create([
                'sinta_score_v3_overall' => 300,
                'scopus_h_index' => 10,
                'functional_position' => 'Lektor',
            ]);

            $rules = [
                'min_sinta_score' => 500,
            ];

            $status = $this->service->getEligibilityStatus($identity, $rules);

            expect($status['eligible'])->toBeFalse();
            expect($status['failed_checks'])->toHaveCount(1);
            expect($status['failed_checks'][0]['name'])->toBe('SINTA Score');
        });

        it('returns ineligible when Scopus H-Index is below minimum', function () {
            $identity = Identity::factory()->create([
                'sinta_score_v3_overall' => 500,
                'scopus_h_index' => 5,
            ]);

            $rules = [
                'min_scopus_score' => 10,
            ];

            $status = $this->service->getEligibilityStatus($identity, $rules);

            expect($status['eligible'])->toBeFalse();
            expect($status['failed_checks'][0]['name'])->toBe('Scopus H-Index');
        });

        it('returns ineligible when functional position not in allowed list', function () {
            $identity = Identity::factory()->create([
                'functional_position' => 'Asisten Ahli',
            ]);

            $rules = [
                'allowed_functional_positions' => ['Lektor', 'Guru Besar'],
            ];

            $status = $this->service->getEligibilityStatus($identity, $rules);

            expect($status['eligible'])->toBeFalse();
            expect($status['failed_checks'][0]['name'])->toBe('Posisi Fungsional');
        });

        it('returns ineligible when multiple requirements fail', function () {
            $identity = Identity::factory()->create([
                'sinta_score_v3_overall' => 300,
                'scopus_h_index' => 5,
                'functional_position' => 'Asisten Ahli',
            ]);

            $rules = [
                'min_sinta_score' => 500,
                'min_scopus_score' => 10,
                'allowed_functional_positions' => ['Lektor', 'Guru Besar'],
            ];

            $status = $this->service->getEligibilityStatus($identity, $rules);

            expect($status['eligible'])->toBeFalse();
            expect($status['failed_checks'])->toHaveCount(3);
        });

        it('validates Scopus document count requirement', function () {
            $identity = Identity::factory()->create([
                'scopus_documents' => 5,
            ]);

            $rules = [
                'min_scopus_documents' => 10,
            ];

            $status = $this->service->getEligibilityStatus($identity, $rules);

            expect($status['eligible'])->toBeFalse();
            expect($status['failed_checks'][0]['name'])->toBe('Scopus Documents');
        });

        it('validates Scopus citations requirement', function () {
            $identity = Identity::factory()->create([
                'scopus_citations' => 20,
            ]);

            $rules = [
                'min_scopus_citations' => 50,
            ];

            $status = $this->service->getEligibilityStatus($identity, $rules);

            expect($status['eligible'])->toBeFalse();
            expect($status['failed_checks'][0]['name'])->toBe('Scopus Citations');
        });

        it('validates education level requirement', function () {
            $identity = Identity::factory()->create([
                'last_education' => 'S1',
            ]);

            $rules = [
                'min_education_level' => 'S3',
            ];

            $status = $this->service->getEligibilityStatus($identity, $rules);

            expect($status['eligible'])->toBeFalse();
            expect($status['failed_checks'][0]['name'])->toBe('Tingkat Pendidikan');
        });

        it('passes education level when equal to requirement', function () {
            $identity = Identity::factory()->create([
                'last_education' => 'S2',
            ]);

            $rules = [
                'min_education_level' => 'S2',
            ];

            $status = $this->service->getEligibilityStatus($identity, $rules);

            expect($status['eligible'])->toBeTrue();
        });

        it('validates affiliation score requirement', function () {
            $identity = Identity::factory()->create([
                'affil_score_v3_overall' => 300,
            ]);

            $rules = [
                'min_affiliation_score' => 500,
            ];

            $status = $this->service->getEligibilityStatus($identity, $rules);

            expect($status['eligible'])->toBeFalse();
            expect($status['failed_checks'][0]['name'])->toBe('Skor Afiliasi');
        });
    });

    describe('canSubmitResearchProposal', function () {
        it('returns true when eligible', function () {
            $identity = Identity::factory()->create([
                'sinta_score_v3_overall' => 500,
            ]);

            $scheme = ResearchScheme::factory()->create([
                'eligibility_rules' => [
                    'min_sinta_score' => 400,
                ],
            ]);

            $result = $this->service->canSubmitResearchProposal($identity, $scheme);

            expect($result)->toBeTrue();
        });

        it('returns false when ineligible', function () {
            $identity = Identity::factory()->create([
                'sinta_score_v3_overall' => 300,
            ]);

            $scheme = ResearchScheme::factory()->create([
                'eligibility_rules' => [
                    'min_sinta_score' => 500,
                ],
            ]);

            $result = $this->service->canSubmitResearchProposal($identity, $scheme);

            expect($result)->toBeFalse();
        });
    });

    describe('getEligibleResearchSchemes', function () {
        it('returns only schemes dosen is eligible for', function () {
            $identity = Identity::factory()->create([
                'sinta_score_v3_overall' => 500,
                'scopus_h_index' => 10,
            ]);

            ResearchScheme::factory()->count(3)->create([
                'eligibility_rules' => ['min_sinta_score' => 400],
            ]);

            ResearchScheme::factory()->count(2)->create([
                'eligibility_rules' => ['min_sinta_score' => 600],
            ]);

            $eligible = $this->service->getEligibleResearchSchemes($identity);

            expect($eligible)->toHaveCount(3);
        });
    });

    describe('countEligibleForResearchScheme', function () {
        it('counts dosen eligible for scheme', function () {
            // Create 5 eligible identities
            Identity::factory()->count(5)->create([
                'sinta_score_v3_overall' => 500,
            ]);

            // Create 3 ineligible identities
            Identity::factory()->count(3)->create([
                'sinta_score_v3_overall' => 300,
            ]);

            $scheme = ResearchScheme::factory()->create([
                'eligibility_rules' => [
                    'min_sinta_score' => 400,
                ],
            ]);

            $count = $this->service->countEligibleForResearchScheme($scheme);

            expect($count)->toBe(5);
        });
    });

    describe('getResearchSchemeEligibilityBreakdown', function () {
        it('provides breakdown of eligibility status', function () {
            // Create diverse identities
            Identity::factory()->count(5)->create([
                'sinta_score_v3_overall' => 500,
                'scopus_h_index' => 10,
            ]);

            Identity::factory()->count(3)->create([
                'sinta_score_v3_overall' => 300,
                'scopus_h_index' => 10,
            ]);

            Identity::factory()->count(2)->create([
                'sinta_score_v3_overall' => 500,
                'scopus_h_index' => 5,
            ]);

            $scheme = ResearchScheme::factory()->create([
                'eligibility_rules' => [
                    'min_sinta_score' => 400,
                    'min_scopus_score' => 8,
                ],
            ]);

            $breakdown = $this->service->getResearchSchemeEligibilityBreakdown($scheme);

            expect($breakdown['total_dosen'])->toBe(10);
            expect($breakdown['eligible'])->toBe(5);
            expect($breakdown['ineligible'])->toBe(5);
            expect($breakdown['ineligible_by_reason']['SINTA Score'])->toBe(3);
            expect($breakdown['ineligible_by_reason']['Scopus H-Index'])->toBe(2);
        });
    });

    describe('getDetailedResearchSchemeEligibility', function () {
        it('returns detailed eligibility for each dosen', function () {
            Identity::factory()->count(5)->create([
                'sinta_score_v3_overall' => 500,
            ]);

            $scheme = ResearchScheme::factory()->create([
                'eligibility_rules' => [
                    'min_sinta_score' => 400,
                ],
            ]);

            $detailed = $this->service->getDetailedResearchSchemeEligibility($scheme);

            expect($detailed)->toHaveCount(5);
            expect($detailed->first())->toHaveKeys(['identity', 'user', 'name', 'nip', 'eligible', 'passed_checks', 'failed_checks']);
        });
    });
});
