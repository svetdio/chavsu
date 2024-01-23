$(function () {
    if (typeof localStorage['chavsu_admin'] == 'undefined') {
        alert("Please log in");
        window.location = 'login.php';
    }

    const keywordsTextarea = document.getElementById('keywords');
    const responseTextarea = document.getElementById('response');
    const saveButton = document.getElementById('saveButton');

    // Disable save button initially
    saveButton.disabled = true;

    // Add an event listener to the text area
    keywordsTextarea.addEventListener('input', function () {
        // Enable the save button if the text area has input, otherwise disable it
        saveButton.disabled = keywordsTextarea.value == '' || responseTextarea.value == '';
    });

    responseTextarea.addEventListener('input', function () {
        // Enable the save button if the text area has input, otherwise disable it
        saveButton.disabled = keywordsTextarea.value == '' || responseTextarea.value == '';
    });

    saveButton.addEventListener('click', function () {
        // Replace this with your save functionality
        let k = $('#keywords').val();
        let r = $('#response').val();

        $.post('api/save_keyword.php', { k, r }, function (d) {
            alert('New data has succesfully added')
            getKeywords();
        })
    });

    // You should perform proper validation before sending data to the serve
    const getKeywords = function () {
        $.get('api/view_keyword.php', function (d) {
            let data = JSON.parse(d);
            if (data.success) {
                let rows = [];
                let itr = 0;
    
                data.keywords.forEach(keyword => {
                    rows[itr++] = "<tr>";
                    rows[itr++] = "<td>"
                        + "<a class='edit-kword js-modal-trigger' data-target='upd_kwords_form' data-kid='" + keyword.id + "' href='#'><i class='fa fa-edit'></i></a>"
                        + "<a class='del-kword' data-kid='" + keyword.id + "' href='#'><i class='fa fa-trash'></i></a>"
                        + "</td>";
                    rows[itr++] = "<td>" + keyword.keywords + "</td>";
                    rows[itr++] = "<td>" + keyword.response + "</td>";
                    rows[itr++] = "</tr>";
                });
    
                $('table tbody#keywordTableBody').html(rows.join());
    
                createModal();
                $('#keyword-tbl').DataTable();
    
                editKeyword(data.keywords);
                deleteKeyword();  // Move this here to ensure proper event delegation
            } else {
                alert('No Data');
            }
        });
    };
    getKeywords();    
s
    const deleteKeyword = function () {
        $('a.del-kword').on('click').click(function () {
            let c = confirm("Are you sure do you want to remove this data?")
            if (c) {
                let id = $(this).data('kid')
                $.post('api/delete_keyword.php', { id }, function (d) {
                    alert('Data is successfully removed')
                    getKeywords();
                })
            }
        });
    }

    const editKeyword = function (data) {
        $('a.edit-kword').on('click').click(function () {
            let id = $(this).data('kid')
            let k = data.find((f) => f.id == id);

            $('#upd_kwords_form textarea#keywords').val(k.keywords);
            $('#upd_kwords_form textarea#response').val(k.response);

            $('#upd_keyword').on('click', function (e) {
                e.preventDefault();

                let kword = $('#upd_kwords_form textarea#keywords').val();
                let resp = $('#upd_kwords_form textarea#response').val();

                $.post('api/update_keyword.php', { id, kword, resp }, function (d) {
                    alert('Data is successfully updated')
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
    $('#logout').unbind('click').click(function () {
        let c = confirm("Are you sure do you want to log out?")
        if (c) {
            localStorage.removeItem('chavsu_admin')
            window.location = 'login.php';
        }
    });
})