$(function () {
    const keywordsTextarea = document.getElementById('keywords');
    const saveButton = document.getElementById('saveButton');

    // Disable save button initially
    saveButton.disabled = true;

    // Add an event listener to the text area
    keywordsTextarea.addEventListener('input', function () {
        // Enable the save button if the text area has input, otherwise disable it
        saveButton.disabled = keywordsTextarea.value == '';
    });

    saveButton.addEventListener('click', function () {
        // Replace this with your save functionality
        let k = $('#keywords').val();

        $.post('api/save_keyword.php', { k }, function (d) {
            getKeywords();
        })
    });

    // You should perform proper validation before sending data to the serve
    const getKeywords = function () {
        $.get('api/view_keyword.php', function (d) {
            let data = JSON.parse(d)
            if (data.success) {
                let rows = []
                itr = 0;
                data.keywords.forEach(keyword => {
                    rows[itr++] = "<tr>"
                    rows[itr++] = "<td>"
                        + "<a class='edit-kword js-modal-trigger' data-target='upd_kwords_form' data-kid='" + keyword.keyword_id + "' href='#'><i class='fa fa-edit'></i></a>"
                        + "<a class='del-kword' data-kid='" + keyword.keyword_id + "' href='#'><i class='fa fa-trash'></i></a>"
                        + "</td>"
                    rows[itr++] = "<td>" + keyword.keywords + "</td>"
                    rows[itr++] = "<td>" + keyword.keywords + "</td>"
                    rows[itr++] = "</tr>"
                });

                $('table tbody#keywordTableBody').html(rows.join());

                createModal();
                $('#keyword-tbl').DataTable();

                editKeyword(data.keywords)
                deleteKeyword()
            } else {
                alert('No Data')
            }
        })
    }
    getKeywords();

    const deleteKeyword = function () {
        $('a.del-kword').unbind('click').click(function () {
            let c = confirm("Are you sure do you want to remove this keyword?")
            if (c) {
                let id = $(this).data('kid')
                $.post('api/delete_keyword.php', { id }, function (d) {
                    alert('Keyword is successfully removed')
                    getKeywords();
                })
            }
        });
    }

    const editKeyword = function (data) {
        $('a.edit-kword').unbind('click').click(function () {
            let id = $(this).data('kid')
            let k = data.find((f) => f.keyword_id == id);

            $('#upd_kwords_form textarea#keywords').val(k.keywords);

            $('#upd_keyword').on('click', function (e) {
                e.preventDefault();

                let kword = $('#upd_kwords_form textarea#keywords').val();

                $.post('api/update_keyword.php', { id, kword }, function (d) {
                    alert('Keyword is successfully updated')
                    getKeywords();
                })
            });
        });
    }

    function openModal($el) {
        $el.classList.add('is-active');
    }

    function closeModal($el) {
        $el.classList.remove('is-active');
    }

    function closeAllModals() {
        (document.querySelectorAll('.modal') || []).forEach(($modal) => {
            closeModal($modal);
        });
    }

    function createModal() {
        // Add a click event on buttons to open a specific modal
        (document.querySelectorAll('.js-modal-trigger') || []).forEach(($trigger) => {
            const modal = $trigger.dataset.target;
            const $target = document.getElementById(modal);

            $trigger.addEventListener('click', () => {
                openModal($target);
            });
        });

        // Add a click event on various child elements to close the parent modal
        (document.querySelectorAll('.modal-background, .modal-close, .modal-card-head .delete, .modal-card-foot .button') || []).forEach(($close) => {
            const $target = $close.closest('.modal');

            $close.addEventListener('click', () => {
                closeModal($target);
            });
        });

        // Add a keyboard event to close all modals
        document.addEventListener('keydown', (event) => {
            if (event.code === 'Escape') {
                closeAllModals();
            }
        });
    }
})