import os
import glob
import re

directories = ['app/Livewire', 'app/Services', 'app/Actions', 'resources/views', 'tests/Feature']
status_words = ['draft', 'submitted', 'approved', 'rejected', 'under_review', 'reviewed', 'revision_needed', 'need_assignment', 'completed', 'waiting_reviewer']

pattern = re.compile(r"'(?:" + "|".join(status_words) + r")'")

matches = []

for d in directories:
    for root, _, files in os.walk(d):
        for file in files:
            if file.endswith('.php'):
                filepath = os.path.join(root, file)
                with open(filepath, 'r', encoding='utf-8') as f:
                    for i, line in enumerate(f, 1):
                        if pattern.search(line):
                            # Skip likely CSS classes
                            if "'completed'" in line and "step-item" in line:
                                continue
                            matches.append(f"{filepath}:{i}:{line.strip()}")

with open('status_matches.txt', 'w', encoding='utf-8') as f:
    f.write('\n'.join(matches))

print(f"Found {len(matches)} matches. See status_matches.txt")
