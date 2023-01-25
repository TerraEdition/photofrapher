tinymce.init(
    {
        selector: 'textarea.textarea',
        forced_root_block: false,
        deprecation_warnings: false
    }
);
tinymce.init(
    {
        selector: 'textarea.textarea-disabled',
        forced_root_block: false,
        deprecation_warnings: false,
        readonly: 1,
    }
);
tinymce.init(
    {
        selector: 'textarea.no-textarea',
        toolbar: false,
        menubar: false,
        forced_root_block: false,
        deprecation_warnings: false
    }
);
tinymce.init(
    {
        selector: 'textarea.no-textarea-full-width',
        toolbar: false,
        menubar: false,
        width: '100%',
        deprecation_warnings: false
    }
);