<x-filament-panels::page>
    <style>
        .dropdown-group {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            margin-bottom: 1.5rem;
            width: 100%;
            max-width: 400px;
        }
        .dropdown-label {
            font-size: 0.95rem;
            font-weight: 500;
            margin-bottom: 0.4rem;
            color: #374151;
            letter-spacing: 0.01em;
        }
        .modern-dropdown {
            width: 100%;
            max-width: 300px;
            padding: 0.6rem 2.2rem 0.6rem 0.8rem;
            border: 1.5px solid #d1d5db;
            border-radius: 0.5rem;
            background: #f9fafb;
            font-size: 1rem;
            color: #111827;
            outline: none;
            transition: border-color 0.2s;
            box-shadow: 0 1px 2px rgba(0,0,0,0.03);
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url('data:image/svg+xml;utf8,<svg fill="none" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5" stroke="%236366f1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>');
            background-repeat: no-repeat;
            background-position: right 0.8rem center;
            background-size: 1.2em;
        }
        .modern-dropdown:focus {
            border-color: #6366f1;
            background: #fff;
        }
        @media (max-width: 600px) {
            .dropdown-group {
                max-width: 100%;
            }
            .modern-dropdown {
                max-width: 100%;
                width: 100%;
            }
        }
    </style>
    <div class="dropdown-group">
        <label for="pageDropdown" class="dropdown-label">Ir a la página</label>
        <select id="pageDropdown" class="modern-dropdown"></select>
    </div>
    <div id="surveyContainer"></div>
    <!-- SurveyJS CDN -->
    <link href="https://unpkg.com/survey-core/survey-core.min.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="https://unpkg.com/survey-core/survey.core.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/survey-js-ui/survey-js-ui.min.js"></script>
    <script src="https://unpkg.com/survey-core/survey.i18n.min.js"></script>
    <!-- SweetAlert2 Toast CDN -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->

    <script>
        const survey = new Survey.Model(@json($jsonDefinition));
        const formId = {{ $formId }};
        const formValue = @json($formValue);
        const lastSeenPage = "{{$lastSeenPage}}";
        console.log(formValue)
        if (formValue && formValue !== '{}') {
            try {
                survey.data = JSON.parse(formValue);
            } catch (e) {
                // fallback: ignore if invalid json
            }
        }
        // Set initial page if lastSeenPage is set
        if (lastSeenPage && lastSeenPage !== "") {
            const pageIndex = survey.pages.findIndex(p => p.name === lastSeenPage);
            if (pageIndex !== -1) {
                survey.currentPageNo = pageIndex;
            }
        }
        let saveTimeout = null;
        let isSaving = false;
        let saveQueued = false;
        const autosaveStatus = document.getElementById('autosave-status');
        const autosaveSaved = document.getElementById('autosave-saved');

        // Remove all Swal toast logic, just save silently
        function saveSurveyData() {
            if (isSaving) {
                saveQueued = true;
                return;
            }
            isSaving = true;
            const currentPageName = survey.currentPage?.name || '';
            fetch(`/forms/${formId}/update-json-value`, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    json_value: JSON.stringify(survey.data),
                    last_seen_page: currentPageName
                })
            })
            .finally(() => {
                isSaving = false;
                if (saveQueued) {
                    saveQueued = false;
                    saveSurveyData();
                }
            });
        }
        function debouncedSave() {
            if (saveTimeout) clearTimeout(saveTimeout);
            saveTimeout = setTimeout(saveSurveyData, 1500);
        }
        function populateDropdown() {
            const dropdown = document.getElementById('pageDropdown');
            dropdown.innerHTML = '';
            survey.pages.forEach((page, idx) => {
                const option = document.createElement('option');
                option.value = idx;
                option.text = page.title || `Página ${idx + 1}`;
                dropdown.appendChild(option);
            });
            dropdown.value = survey.currentPageNo;
        }

        document.addEventListener("DOMContentLoaded", function() {
            survey.render(document.getElementById("surveyContainer"));
            populateDropdown();
            survey.onCurrentPageChanged.add(function() {
                document.getElementById('pageDropdown').value = survey.currentPageNo;
                saveSurveyData(); // Save immediately on page change
            });
            survey.onValueChanged.add(function() {
                debouncedSave(); // Debounced save on value change
            });
            document.getElementById('pageDropdown').addEventListener('change', function(e) {
                survey.currentPageNo = parseInt(e.target.value);
            });
        });
    </script>
</x-filament-panels::page>
