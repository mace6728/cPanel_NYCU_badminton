(function () {
    'use strict';

    // Confirm before any destructive form.
    document.querySelectorAll('form[data-confirm]').forEach(function (form) {
        form.addEventListener('submit', function (e) {
            if (!window.confirm(form.getAttribute('data-confirm'))) {
                e.preventDefault();
            }
        });
    });

    // List view: instant search + category filter.
    var rows = document.querySelectorAll('#rows tr');
    if (rows.length) {
        var search = document.getElementById('search');
        var chips = document.querySelectorAll('#chips .chip');
        var empty = document.getElementById('no-match');
        var category = '';

        var apply = function () {
            var q = search.value.trim().toLowerCase();
            var shown = 0;
            rows.forEach(function (row) {
                var ok = (!category || row.dataset.cat === category) && (!q || row.dataset.title.indexOf(q) !== -1);
                row.hidden = !ok;
                if (ok) shown++;
            });
            empty.hidden = shown !== 0;
        };

        search.addEventListener('input', apply);
        chips.forEach(function (chip) {
            chip.addEventListener('click', function () {
                chips.forEach(function (c) { c.classList.remove('is-active'); });
                chip.classList.add('is-active');
                category = chip.dataset.cat;
                apply();
            });
        });
    }

    // Editor view.
    var form = document.getElementById('editor-form');
    if (form && window.tinymce) {
        var dirty = false;
        var submitting = false;

        tinymce.init({
            selector: '#content',
            language: 'zh_TW',
            language_url: '../tinymce/js/tinymce/langs/zh_TW.js',
            height: 460,
            plugins: 'link lists image table code paste autolink fullscreen charmap',
            toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright | bullist numlist | link image table | code fullscreen',
            relative_urls: false,
            convert_urls: false,
            setup: function (editor) {
                editor.on('change keyup', function () { dirty = true; });
            }
        });

        form.addEventListener('input', function () { dirty = true; });
        form.addEventListener('submit', function () {
            submitting = true;
            tinymce.triggerSave();
        });
        window.addEventListener('beforeunload', function (e) {
            if (dirty && !submitting) {
                e.preventDefault();
                e.returnValue = '';
            }
        });
    }
})();
