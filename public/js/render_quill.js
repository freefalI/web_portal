$(() => {
    var editors = $('.editor');
    $.each(editors, function (a, editor) {
        content = $(editor).html();
        $(editor).html('');
        $(editor).fadeToggle(1000);
        let quill = new Quill(editor, {
            modules: {
                toolbar: false,
            },
            theme: 'snow',
            readOnly: true
        });

        quill.setContents(JSON.parse(content));
    });
});

