(function($) {
    "use strict";

    document.querySelectorAll('[data-year]').forEach((el) => {
        el.textContent = " " + new Date().getFullYear();
    });

    let dropdown = document.querySelectorAll('[data-dropdown]'),
        dropdownV2 = document.querySelectorAll('[data-dropdown-v2]'),
        itemHeight = 45;

    if (dropdown !== null) {
        dropdown.forEach((el) => {
            let dropdownFunc = () => {
                let sideBarLinksMenu = el.querySelector('.vironeer-sidebar-link-menu');
                if (el.classList.contains('active')) {
                    sideBarLinksMenu.style.height = sideBarLinksMenu.children.length * itemHeight + 'px';
                } else {
                    sideBarLinksMenu.style.height = 0;
                }
            };

            el.querySelector('.vironeer-sidebar-link-title').onclick = () => {
                el.classList.toggle('active');
                dropdownFunc();
            };
            window.addEventListener('load', dropdownFunc);
        });
    }

    if (dropdownV2 !== null) {
        dropdownV2.forEach(function(el) {
            window.addEventListener('click', function(e) {
                if (el.contains(e.target)) {
                    el.classList.toggle('active');
                    setTimeout(function() {
                        el.classList.toggle('animated');
                    }, 0);
                } else {
                    el.classList.remove('active');
                    el.classList.remove('animated');
                }
            });
        });
    }

    let counterCards = document.querySelectorAll('.counter-card');
    let dashCountersOP = () => {
        counterCards.forEach((el) => {
            let itemWidth = 350,
                clientWidthX = el.clientWidth;
            if (clientWidthX > itemWidth) {
                el.classList.remove('active');
            } else {
                el.classList.add('active');
            }
        });
    };

    window.addEventListener('load', dashCountersOP);
    window.addEventListener('resize', dashCountersOP);

    let sideBar = document.querySelector('.vironeer-sidebar'),
        pageContent = document.querySelector('.vironeer-page-content'),
        sideBarIcon = document.querySelector('.vironeer-sibebar-icon');
    if (sideBar !== null) {
        sideBarIcon.onclick = () => {
            sideBar.classList.toggle('active');
            pageContent.classList.toggle('active');
            setTimeout(dashCountersOP, 150);

        };
        sideBar.querySelector('.overlay').onclick = () => {
            sideBar.classList.remove('active');
            pageContent.classList.remove('active');
        };
        window.addEventListener('resize', () => {
            if (window.innerWidth < 1200) {
                sideBar.classList.remove('active');
                pageContent.classList.remove('active');
            }
        });
    }

    let sidebarLinkCounter = document.querySelectorAll(".vironeer-sidebar-link-title .counter");
    if (sidebarLinkCounter) {
        sidebarLinkCounter.forEach((el) => {
            if (el.innerHTML == 0) {
                el.classList.add("disabled");
            }
        });
    }

    let navbarLinkCounter = document.querySelectorAll(".vironeer-notifications-title .counter");
    if (navbarLinkCounter) {
        navbarLinkCounter.forEach((el) => {
            if (el.innerHTML == 0) {
                el.classList.add("disabled");
            } else {
                el.classList.add("flashit");
            }
        });
    }

    let actionConfirm = $('.action-confirm');
    if (actionConfirm.length) {
        actionConfirm.on('click', function(e) {
            if (!confirm(config.translates.actionConfirm)) {
                e.preventDefault();
            }
        });
    }

    let dataTable = $('.datatable'),
        DataTable2 = $('.datatable2');
    if (dataTable.length || DataTable2.length) {
        let dataTableConfig = {
            "language": {
                emptyTable: config.translates.emptyTable,
                searchPlaceholder: config.translates.searchPlaceholder,
                search: "",
                zeroRecords: config.translates.zeroRecords,
                sLengthMenu: config.translates.sLengthMenu,
                info: config.translates.info,
                infoEmpty: config.translates.infoEmpty,
                infoFiltered: config.translates.infoFiltered,
                paginate: {
                    first: config.translates.paginate.first,
                    previous: config.translates.paginate.previous,
                    next: config.translates.paginate.next,
                    last: config.translates.paginate.last,
                },
            },
            "dom": '<"top"f><"table-wrapper"rt><"bottom"ilp><"clear">',
            drawCallback: function() {
                document.querySelector('.dataTables_wrapper .pagination').classList.add('pagination-sm');
                $('.dataTables_filter input').attr('type', 'text');
            }
        }

        if (dataTable.length) {
            dataTable.DataTable($.extend({}, dataTableConfig, {
                pageLength: 50,
                order: [
                    [0, "desc"]
                ],
            }));
        }

        if (DataTable2.length) {
            DataTable2.DataTable($.extend({}, dataTableConfig, {
                pageLength: 50,
            }));
        }
    }


    let ckeditor = document.querySelector('.ckeditor');
    if (ckeditor) {
        function UploadAdapterPlugin(editor) {
            editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
                return new UploadAdapter(loader);
            };
        }
        ClassicEditor.create(ckeditor, {
            language: config.lang,
            extraPlugins: [UploadAdapterPlugin],
            mediaEmbed: {
                previewsInData: true
            }
        }).catch(error => {
            alert(error);
        });
    }


    let selectFileBtn = $('#selectFileBtn'),
        selectedFileInput = $("#selectedFileInput"),
        filePreviewBox = $('.file-preview-box'),
        filePreviewImg = $('#filePreview');

    selectFileBtn.on('click', function() {
        selectedFileInput.trigger('click');
    });

    selectedFileInput.on('change', function() {
        var file = true,
            readLogoURL;
        if (file) {
            readLogoURL = function(input_file) {
                if (input_file.files && input_file.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        filePreviewBox.removeClass('d-none');
                        filePreviewImg.attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input_file.files[0]);
                }
            }
        }
        readLogoURL(this);
    });

    let createSlug = $("#create_slug"),
        showSlug = $('#show_slug');

    createSlug.on('input', function() {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'GET',
            url: GET_SLUG_URL,
            data: {
                content: $(this).val(),
            },
            success: function(data) {
                showSlug.val(data.slug);
            }
        });
    });

    let SelectImageButton = $('.vironeer-select-image-button');
    SelectImageButton.on('click', function() {
        var dataId = $(this).data('id');
        let targetedImageInput = $('#vironeer-image-targeted-input-' + dataId),
            targetedImagePreview = $('#vironeer-preview-img-' + dataId);
        targetedImageInput.trigger('click');
        targetedImageInput.on('change', function() {
            var file = true,
                readLogoURL;
            if (file) {
                readLogoURL = function(input_file) {
                    if (input_file.files && input_file.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            targetedImagePreview.attr('src', e.target.result);
                        }
                        reader.readAsDataURL(input_file.files[0]);
                    }
                }
            }
            readLogoURL(this);
        });
    });

    let selectpicker = $('.selectpicker');
    if (selectpicker.length) {
        selectpicker.selectpicker({
            noneSelectedText: config.translates.noneSelectedText,
            noneResultsText: config.translates.noneResultsText,
            countSelectedText: config.translates.countSelectedText
        });
    }

    let removeSpaces = $(".remove-spaces");
    removeSpaces.on('input', function() {
        $(this).val($(this).val().replace(/\s/g, ""));
    });

    var cssEditor = document.getElementById("css-editor");
    if (cssEditor) {
        var editor = CodeMirror.fromTextArea(cssEditor, {
            lineNumbers: true,
            mode: "text/css",
            theme: "monokai",
            keyMap: "sublime",
            autoCloseBrackets: true,
            matchBrackets: true,
            showCursorWhenSelecting: true,
        });
        editor.setSize(null, 700);
    }

    let sortableTable = $('.sortable-table');
    if (sortableTable.length) {
        let sortableTableIds = $('#sortable-table-ids');
        sortableTable.sortable({
            handle: '.sortable-table-handle',
            placeholder: 'sortable-table-placeholder',
            axis: "y",
            update: function() {
                const sortableTabletData = sortableTable.sortable('toArray', {
                    attribute: 'data-id'
                })
                sortableTableIds.attr('value', sortableTabletData.join(','));
            }
        });
    }

    let vironeerTargetMenu = $('.vironeer-sort-menu'),
        nestable = $('.nestable'),
        idsInput = $('#ids');

    if (vironeerTargetMenu.length) {
        vironeerTargetMenu.sortable({
            handle: '.vironeer-navigation-handle',
            placeholder: 'vironeer-navigation-placeholder',
            axis: "y",
            update: function() {
                const vironeerSortData = vironeerTargetMenu.sortable('toArray', {
                    attribute: 'data-id'
                })
                idsInput.attr('value', vironeerSortData.join(','));
            }
        });
    }

    if (nestable.length) {
        nestable.nestable({ maxDepth: 2 });
        nestable.on('change', function() {
            var data = JSON.stringify(nestable.nestable('serialize'));
            idsInput.attr('value', data);
        });
    }

    let inputNumeric = document.querySelectorAll('.input-numeric');
    if (inputNumeric) {
        inputNumeric.forEach((el) => {
            el.oninput = () => {
                el.value = el.value.replace(/[^0-9]/g, '').substr(0, 6);
            };
        });
    }

    let clipboardBtn = document.querySelector("#copy-btn");
    if (clipboardBtn) {
        let clipboard = new ClipboardJS(clipboardBtn);
        clipboard.on('success', function(e) {
            toastr.success('Copied to clipboard');
        });
    }

    function generatePassword(length) {
        var charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        var password = "";
        for (var i = 0; i < length; i++) {
            var randomIndex = Math.floor(Math.random() * charset.length);
            password += charset.charAt(randomIndex);
        }
        return password;
    }


    let randomPasswordBtn = $('#randomPasswordBtn'),
        randomPasswordInput = $('#randomPasswordInput');
    randomPasswordBtn.on('click', function(e) {
        e.preventDefault();
        randomPasswordInput.val(generatePassword(16));
    });

    randomPasswordInput.val(generatePassword(16));

    let colorpicker = $('.colorpicker');
    if (colorpicker.length) {
        Coloris({ el: '.coloris' });
        Coloris.setInstance('.coloris', {
            theme: 'pill',
            themeMode: 'light',
            formatToggle: true,
            closeButton: true,
            clearButton: true,
            swatches: ['#067bc2', '#84bcda', '#80e377', '#ecc30b', '#f37748', '#d56062']
        });
    }

    let i = 1,
        attachments = $('.attachments'),
        addAttachment = $('#addAttachment');

    addAttachment.on('click', function(e) {
        e.preventDefault();
        i++;
        attachments.append('<div class="attachment-box-' + i + ' mt-3">' +
            '<div class="input-group">' +
            '<input type="file" name="attachments[]" class="form-control form-control-lg">' +
            '<button class="btn btn-danger attachment-remove" data-id="' + i + '" type="button">' +
            '<i class="fa-regular fa-trash-can"></i>' +
            '</button>' +
            '</div>' +
            '</div>');
    });

    $(document).on('click', '.attachment-remove', function() {
        let id = $(this).data("id");
        i--;
        $('.attachment-box-' + id).remove();
    });


    const multipleSelectSearchForm = $('.multiple-select-search-form');
    const multipleSelectDeleteForm = $('.multiple-select-delete-form');
    const multipleSelectDeleteIds = $('.multiple-select-delete-ids');
    const multipleSelectCheckAll = $('.multiple-select-check-all');
    const multipleSelectCheckbox = $('.multiple-select-checkbox');

    let multipleSelectDeleteIdsArr = [];

    function updateMultipleDeleteUI() {
        const isCheckedAll = multipleSelectCheckbox.length === $('.multiple-select-checkbox:checked').length;
        multipleSelectCheckAll.prop('checked', isCheckedAll);

        if (isCheckedAll || $('.multiple-select-checkbox:checked').length > 0) {
            multipleSelectSearchForm.addClass('d-none');
            multipleSelectDeleteForm.removeClass('d-none');
        } else {
            multipleSelectSearchForm.removeClass('d-none');
            multipleSelectDeleteForm.addClass('d-none');
        }
    }

    function updateDeleteIds() {
        multipleSelectDeleteIdsArr = [];
        $(".multiple-select-checkbox:checked").each(function() {
            multipleSelectDeleteIdsArr.push($(this).data('id'));
        });
        multipleSelectDeleteIds.val(multipleSelectDeleteIdsArr);
    }

    multipleSelectCheckAll.on('click', function() {
        const isChecked = $(this).is(':checked');
        multipleSelectCheckbox.prop('checked', isChecked);
        updateDeleteIds();
        updateMultipleDeleteUI();
    });

    multipleSelectCheckbox.on('click', function() {
        updateDeleteIds();
        updateMultipleDeleteUI();
    });

    updateMultipleDeleteUI();
})(jQuery);