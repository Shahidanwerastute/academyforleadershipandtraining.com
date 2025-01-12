$(function() {
    altair_wysiwyg._tinymce()
}), altair_wysiwyg = {
    _tinymce: function() {
        function i(i, e, t) {
            return tinymce.activeEditor.windowManager.open({
                file: "/file_manager/fm_tinymce.html",
                title: "File Manager",
                width: 920,
                height: 440,
                resizable: "yes"
            }, {
                oninsert: function(e, n) {
                    var l, a, c;
                    for (l = e.url, a = /\/[^\/]+?\/\.\.\//; l.match(a);) l = l.replace(a, "/");
                    c = e.name + " (" + n.formatSize(e.size) + ")", "file" == t.filetype && i(l, {
                        text: c,
                        title: c
                    }), "image" == t.filetype && i(l, {
                        alt: c
                    }), "media" == t.filetype && i(l)
                }
            }), !1
        }
        var e = ".wysiwyg_tinymce";
        $(e).length && tinymce.init({
            skin_url: base_url+"/public/assets/assets/skins/tinymce/material_design",
            selector: ".wysiwyg_tinymce",
            plugins: ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste"],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
            file_picker_callback: i
        })
    }
};