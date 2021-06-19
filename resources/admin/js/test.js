
$(document).ready(function () {
    window._token = $('meta[name="csrf-token"]').attr('content')

    $('.lfm_image').each(function () {
        $(this).filemanager('image');
    });
    $('.lfm_file').each(function () {
        $(this).filemanager('file');
    });
    // moment.updateLocale('en', {
    //     week: {dow: 1} // Monday is the first day of the week
    // })
    //
    // $('.date').datetimepicker({
    //     format: 'YYYY-MM-DD',
    //     locale: 'en'
    // })
    //
    // $('.datetime').datetimepicker({
    //     format: 'YYYY-MM-DD HH:mm:ss',
    //     locale: 'en',
    //     sideBySide: true
    // })
    //
    // $('.timepicker').datetimepicker({
    //     format: 'HH:mm:ss'
    // })

    $('.select-all').click(function () {
        let $select2 = $(this).parent().siblings('.select2')
        $select2.find('option').prop('selected', 'selected')
        $select2.trigger('change')
    })
    $('.deselect-all').click(function () {
        let $select2 = $(this).parent().siblings('.select2')
        $select2.find('option').prop('selected', '')
        $select2.trigger('change')
    })

    $('.select2').select2()

    $('.treeview').each(function () {
        var shouldExpand = false
        $(this).find('li').each(function () {
            if ($(this).hasClass('active')) {
                shouldExpand = true
            }
        })
        if (shouldExpand) {
            $(this).addClass('active')
        }
    })
    var editor_config = {
        path_absolute : "/",
        selector: '.tinymce-editor',
        apply_source_formatting: false,
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table directionality",
            "emoticons template paste textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        relative_urls: false,
        file_browser_callback : function(field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + 'filemanager?field_name=' + fiel_dname;
            if (type == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.open({
                url : cmsURL,
                title : 'Filemanager',
                width : x * 0.8,
                height : y * 0.8,
                resizable : "yes",
                close_previous : "no",
                // onMessage: (api, message) => {
                //     callback(message.content);
                // }
            });
        }
    };

    tinymce.init(editor_config);

    function RemoveTinymce()
    {
        if ( tinymce.editors.length > 0 ) {
            for ( let el in tinymce.editors) {
                tinyMCE.editors[ el].remove();
            }
        }
    }
    const multiple_inputs = $('.multiple-input');
    multiple_inputs.each(function () {
        if ($(this).find('.multiple-input-row').length < 2) {
            $(this).find('.multiple-input-remove').hide();
        }
    })
    multiple_inputs.on('click','.multiple-input-remove',function (e) {

        const widget = $(this).closest('.multiple-input');
        $(this).closest('.multiple-input-row').remove();


        if (widget.find('.multiple-input-row').length < 2) {
            widget.find('.multiple-input-remove').each(function () {
                $(this).hide();
            });
        }
    })
    multiple_inputs.on('click','.multiple-input-add',function (e) {
        RemoveTinymce();
        const widget = $(this).closest('.multiple-input');
        const rows = widget.find('.multiple-input-row');

        const count = rows.length;
        const last_number = count - 1;
        const last_row = rows[last_number];
        // const last_row=rows[0];
        let tmpl = last_row.outerHTML;
        const regex1 = new RegExp('\_' + last_number + '\_','g');
        const regex2 = new RegExp('\\[' + last_number + '\\]','g');
        const regex3 = new RegExp('value="(.)*"','g');
        const regex4 = new RegExp('src="(.)*"','g');

        tmpl = tmpl
            .replaceAll(regex1,'_' + count + '_')
            .replaceAll(regex2,'[' + count + ']')
        // .replace(regex3,'value=""')
        // .replace(regex4,'src=""');

        widget.find('.multiple-input-content').append(tmpl);
        if (widget.find('.multiple-input-row').length > 1) {
            widget.find('.multiple-input-remove').each(function () {
                $(this).show();
            });
        }
        tinymce.init(editor_config);
        $('.lfm_image').each(function () {
            $(this).filemanager('image');
        });
        $('.lfm_file').each(function () {
            $(this).filemanager('file');
        });
    })
    $(document).on('change','[data-img]',function () {


        const target = $(this).data('img');

        $('#' + target + ' img').attr('src',$(this).val());
    })
})
$('[data-widget="pushmenu"]').on('click',function () {
    Cookies.set('sidebar_collapsed', !$('body').hasClass('sidebar-collapse'));
    return true;
})

// jQuery(document).ready(function () {
//     /* =============== DEMO =============== */
//     // menu items
//     var arrayjson = JSON.parse($("[name='items']").val());
//     arrayjson = Array(arrayjson)
//     // icon picker options
//     var iconPickerOptions = {};
//     // sortable list options
//     var sortableListOptions = {
//         placeholderCss: {'background-color': "#cccccc"}
//     };
//
//     var editor = new MenuEditor('myEditor', {listOptions: sortableListOptions, iconPicker: iconPickerOptions});
//     editor.setForm($('#frmEdit'));
//     editor.setUpdateButton($('#btnUpdate'));
//     editor.setData(arrayjson);
//     $('#btnReload').on('click', function () {
//         editor.setData(arrayjson);
//     });
//
//     $('#btnOutput').on('click', function () {
//         var str = editor.getString();
//         $("#out").text(str);
//         $("[name='items']").val(str);
//     });
//
//     $("#btnUpdate").click(function () {
//         editor.update();
//         var str = editor.getString();
//         $("#out").text(str);
//         $("[name='items']").val(str);
//     });
//
//     $('#btnAdd').click(function () {
//         editor.add();
//         var str = editor.getString();
//         $("#out").text(str);
//         $("[name='items']").val(str);
//     });
//     /* ====================================== */
//
//     /** PAGE ELEMENTS **/
//     // $('[data-toggle="tooltip"]').tooltip();
//     // $.getJSON( "https://api.github.com/repos/davicotico/jQuery-Menu-Editor", function( data ) {
//     //     $('#btnStars').html(data.stargazers_count);
//     //     $('#btnForks').html(data.forks_count);
//     // });
// });
