<?php

$file = 'resources/views/livewire/settings/proposal-template.blade.php';
$path = '/Volumes/WORK/PROJECT PROTOTYPE/sim-lppm-itsnu-main/'.$file;
$content = file_get_contents($path);

// Pattern for templates in ProposalTemplate
$patterns = [
    'researchTemplateMedia' => 'downloadResearchTemplate',
    'communityServiceTemplateMedia' => 'downloadCommunityServiceTemplate',
    'proposalApprovalPageTemplateMedia' => 'downloadProposalApprovalPageTemplate',
    'reportApprovalPageTemplateMedia' => 'downloadReportApprovalPageTemplate',
    'partnerCommitmentTemplateMedia' => 'downloadPartnerCommitmentTemplate',
    'monevBeritaAcaraTemplateMedia' => 'downloadMonevBeritaAcaraTemplate',
    'monevBorangTemplateMedia' => 'downloadMonevBorangTemplate',
    'monevRekapPenilaianTemplateMedia' => 'downloadMonevRekapPenilaianTemplate',
];

foreach ($patterns as $mediaVar => $method) {
    // Match the button
    $pattern = '/<button\s+wire:click=["\']'.$method.'["\']\s+class=["\']([^"\']+)["\']>(.*?)<\/button>/is';

    $content = preg_replace_callback($pattern, function ($m) use ($mediaVar) {
        $class = $m[1];
        $inner = $m[2];

        return '<a href="{{ \Illuminate\Support\Facades\URL::signedRoute(\'media.download\', [\'media\' => $this->'.$mediaVar.']) }}" class="'.$class.'" data-navigate-ignore="true" download="{{ $this->'.$mediaVar.'->file_name }}">
            '.trim($inner).'
        </a>';
    }, $content);
}

file_put_contents($path, $content);
