$(function () {
    const keywordsTextarea = document.getElementById('keywords');
    const saveButton = document.getElementById('saveButton');

    // Disable save button initially
    saveButton.disabled = true;

    // Add an event listener to the text area
    keywordsTextarea.addEventListener('input', function () {
        // Enable the save button if the text area has input, otherwise disable it
        saveButton.disabled = keywordsTextarea.value.trim() === '';
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
                        + "<a class='edit-kword' data-kid='" + keyword.keyword_id + "' href='#'><i class='fa fa-edit'></i></a>"
                        + "<a class='del-kword' data-kid='" + keyword.keyword_id + "' href='#'><i class='fa fa-trash'></i></a>"
                        + "</td>"
                    rows[itr++] = "<td>" + keyword.keywords + "</td>"
                    rows[itr++] = "</tr>"
                });

                $('table tbody#keywordTableBody').html(rows.join())
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
})